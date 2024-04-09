<?php

namespace PhpBook\CMS;

class Like
{
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function get(array $like): bool
    {
        $sql = "SELECT COUNT(*)
                FROM likes
                WHERE article_id = :id AND member_id = :member_id;";

        return $this->db->runSQL($sql, $like)->fetchColumn();
    }

    public function create(array $like): bool
    {
        $sql = "INSERT INTO likes (article_id, member_id)
                VALUES (:article_id, :member_id);";

        $this->db->runSQL($sql, $like);
        return true;
    }

    public function delete(array $like): bool
    {
        $sql = "DELETE FROM likes
                WHERE article_id = :article_id AND member_id = :member_id;";

        $this->db->runSQL($sql, $like);
        return true;
    }
}
