<?php

namespace PhpBook\CMS;

class Article
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function get(int $id, bool $published = true)
    {
        $sql = "SELECT a.id, a.title, a.summary, a.content, a.created, a.category_id, a.member_id, a.published, a.seo_title,
                       c.name AS category,
                       c.seo_name AS seo_category,
                       CONCAT(m.forename, ' ', m.surname) AS author,
                       i.id AS image_id,
                       i.file AS image_file,
                       i.alt AS image_alt
                FROM article AS a
                JOIN category AS c ON a.category_id = c.id
                JOIN member AS m ON a.member_id = m.id
                LEFT JOIN image AS i ON a.image_id = i.id
                WHERE a.id = :id ";

        if ($published) {
            $sql .= "AND a.published = 1";
        }

        return $this->db->runSQL($sql, [$id])->fetch();
    }

    public function getAll($published = true, $category = null, $member = null, $limit = 10000): array
    {
        $arguments['category'] = $category;
        $arguments['category1'] = $category;
        $arguments['member'] = $member;
        $arguments['member1'] = $member;
        $arguments['limit'] = $limit;

        $sql = "SELECT a.id, a.title, a.summary, a.created, a.category_id, a.member_id, a.published, a.seo_title,
                       c.name AS category,
                       c.seo_name AS seo_category,
                       CONCAT(m.forename, ' ', m.surname) AS author,
                       i.file AS image_file,
                       i.alt AS image_alt
                FROM article AS a
                JOIN category AS c ON a.category_id = c.id
                JOIN member AS m ON a.member_id = m.id
                LEFT JOIN image AS i ON a.image_id = i.id
                WHERE (a.category_id = :category OR :category1 is NULL)
                  AND (a.member_id = :member OR :member1 is NULL) ";

        if ($published) {
            $sql .= "AND a.published = 1 ";
        }

        $sql .= "ORDER BY a.id DESC LIMIT :limit";

        return $this->db->runSQL($sql, $arguments)->fetchAll();
    }

    public function searchCount(string $term): int
    {
        $arguments['term1'] = "%$term%";
        $arguments['term2'] = "%$term%";
        $arguments['term3'] = "%$term%";

        $sql = "SELECT COUNT(title)
                FROM article
                WHERE title LIKE :term1
                   OR summary LIKE :term2
                   OR content LIKE :term3
                  AND published = 1";

        return $this->db->runSQL($sql, $arguments)->fetchColumn();
    }

    public function search(string $term, int $show = 3, int $from = 0): array
    {
        $arguments['term1'] = "%$term%";
        $arguments['term2'] = "%$term%";
        $arguments['term3'] = "%$term%";
        $arguments['show'] = $show;
        $arguments['from'] = $from;

        $sql = "SELECT a.id, a.title, a.summary, a.created, a.category_id, a.member_id, a.seo_title,
                       c.name AS category,
                       c.seo_name AS seo_category,
                       CONCAT(m.forename, ' ', m.surname) AS author,
                       i.file AS image_file,
                       i.alt AS image_alt
                FROM article AS a
                JOIN category AS c ON a.category_id = c.id
                JOIN member AS m ON a.member_id = m.id
                LEFT JOIN image AS i ON a.image_id = i.id
                WHERE a.title LIKE :term1
                   OR a.summary LIKE :term2
                   OR a.content LIKE :term3
                  AND a.published = 1
                ORDER BY a.id DESC
                LIMIT :show
                OFFSET :from";

        return $this->db->runSQL($sql, $arguments)->fetchAll();
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(id) FROM article";
        return $this->db->runSQL($sql)->fetchColumn();
    }

    public function create(array $article, string $temporary, string $destination): bool
    {
        try {
            $this->db->beginTransaction();

            if ($destination) {
                $imagick = new \Imagick($temporary);
                $imagick->cropThumbnailImage(1200, 700);
                $imagick->writeImage($destination);

                $sql = "INSERT INTO image (file, alt)
                        VALUES (:file, :alt)";

                $this->db->runSQL($sql, [$article['image_file'], $article['image_alt']]);
                $article['image_id'] = $this->db->lastInsertId();
            }

            $sql = "INSERT INTO article (title, summary, content, category_id, member_id, image_id, published, seo_title)
                    VALUES (:title, :summary, :content, :category_id, :member_id, :image_id, :published, :seo_title)";

            unset($article['image_file'], $article['image_alt']);

            $this->db->runSQL($sql, $article);
            $this->db->commit();

            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();

            if (file_exists($destination)) {
                unlink($destination);
            }

            // Integrity constraint error
            if (($e instanceof \PDOException) && ($e->errorInfo[1] === 1062)) {
                return false;
            } else {
                throw $e;
            }
        }
    }

    public function update(array $article, string $temporary, string $destination): bool
    {
        try {
            $this->db->beginTransaction();

            if ($destination) {
                $imagick = new \Imagick($temporary);
                $imagick->cropThumbnailImage(1200, 700);
                $imagick->writeImage($destination);

                $sql = "INSERT INTO image (file, alt)
                        VALUES (:file, :alt)";

                $this->db->runSQL($sql, [$article['image_file'], $article['image_alt']]);
                $article['image_id'] = $this->db->lastInsertId();
            }

            $sql = "UPDATE article
                    SET title = :title,
                        summary = :summary,
                        content = :content,
                        category_id = :category_id,
                        member_id = :member_id,
                        image_id = :image_id,
                        published = :published,
                        seo_title = :seo_title
                    WHERE id = :id";

            unset($article['category'], $article['seo_category'], $article['created'], $article['author'], $article['image_file'], $article['image_alt']);

            $this->db->runSQL($sql, $article)->rowCount();
            $this->db->commit();

            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();

            if (file_exists($destination)) {
                unlink($destination);
            }

            if (($e instanceof \PDOException) && ($e->errorInfo[1] === 1062)) {
                return false;
            } else {
                throw $e;
            }
        }
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $this->db->runSQL($sql, [$id]);

        return true;
    }

    public function imageDelete(int $image_id, string $path, int $article_id)
    {
        $sql = "UPDATE article
                SET image_id = null
                WHERE id = :article_id";
        $this->db->runSQL($sql, [$article_id]);

        $sql = "DELETE FROM image
                WHERE id = :image_id";
        $this->db->runSQL($sql, [$image_id]);

        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function altUpdate(int $image_id, string $alt)
    {
        $sql = "UPDATE image
                SET alt = :alt
                WHERE id = :image_id";

        $this->db->runSQL($sql, [$alt, $image_id]);
    }
}
