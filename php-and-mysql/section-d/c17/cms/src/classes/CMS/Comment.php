<?php

namespace PhpBook\CMS;

class Comment
{
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll(int $id): array
    {
        $sql = "SELECT c.id, c.comment, c.posted,
                       CONCAT(m.forename, ' ', m.surname) AS author,
                       m.picture
                FROM comment AS c
                JOIN member AS m ON c.member_id = m.id
                WHERE c.article_id = :id;";

        return $this->db->runSQL($sql, [$id])->fetchAll();
    }

    public function create(array $comment): bool
    {
        $sql = "INSERT INTO comment (comment, article_id, member_id)
                VALUES (:comment, :article_id, :member_id);";

        $this->db->runSQL($sql, $comment);
        return true;
    }
}
