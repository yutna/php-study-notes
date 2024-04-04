<?php

namespace PhpBook\CMS;

class Member
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function get(int $id)
    {
        $sql = "SELECT id, forename, surname, joined, picture
                FROM member
                WHERE id = :id";

        return $this->db->runSQL($sql, [$id])->fetch();
    }

    public function getAll(): array
    {
        $sql = "SELECT id, forename, surname, joined, picture
                FROM member";

        return $this->db->runSQL($sql)->fetchAll();
    }

    public function create($member): bool
    {
        $member['password'] = password_hash($member['password'], PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO member (forename, surname, email, password)
                    VALUES (:forename, :surname, :email, :password);";

            $this->db->runSQL($sql, $member);
            return true;
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                return false;
            }

            throw $e;
        }
    }
}
