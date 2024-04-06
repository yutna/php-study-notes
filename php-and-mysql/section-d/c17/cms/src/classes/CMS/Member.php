<?php

namespace PhpBook\CMS;

use Exception;

class Member
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function get(int $id)
    {
        $sql = "SELECT id, forename, surname, email, joined, picture, role
                FROM member
                WHERE id = :id";

        return $this->db->runSQL($sql, [$id])->fetch();
    }

    public function getAll(): array
    {
        $sql = "SELECT id, forename, surname, email, joined, picture, role
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

    public function count(): int
    {
        $sql = "SELECT COUNT(id) FROM member;";
        return $this->db->runSQL($sql)->fetchColumn();
    }

    public function getIdByEmail(string $email)
    {
        $sql = "SELECT id
                FROM member
                WHERE email = :email;";

        return $this->db->runSQL($sql, [$email])->fetchColumn();
    }

    public function login(string $email, string $password)
    {
        $sql = "SELECT id, forename, surname, joined, email, password, picture, role
                FROM member
                WHERE email = :email;";

        $member = $this->db->runSQL($sql, [$email])->fetch();

        if (!$member) {
            return false;
        }

        $authenticated = password_verify($password, $member['password']);

        return $authenticated ? $member : false;
    }

    public function passwordUpdate(int $id, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE member
                SET password = :password
                WHERE id = :id;";

        $this->db->runSQL($sql, ['id' => $id, 'password' => $hash]);

        return true;
    }

    public function pictureCreate(int $id, string $filename, string $temporary, string $destination): bool
    {
        if ($temporary) {
            $image = new \Imagick($temporary);
            $image->cropThumbnailImage(350, 350);
            $saved = $image->writeImage($destination);

            if ($saved == false) {
                throw new Exception('Unable to save image');
            }
        }

        $filename = basename($destination);
        $sql = "UPDATE member
                SET picture = :picture
                WHERE id = :id;";

        $this->db->runSQL($sql, ['id' => $id, 'picture' => $filename]);

        return true;
    }

    public function pictureDelete(int $id, string $path): bool
    {
        $unlink = unlink($path);

        if ($unlink === false) {
            throw new Exception('Unable to delete image or image is missing');
        }

        $sql = "UPDATE member
                SET picture = null
                WHERE id = :id;";

        $this->db->runSQL($sql, [$id]);

        return true;
    }

    public function update(array $member): bool
    {
        unset($member['joined'], $member['picture']);

        try {
            $sql = "UPDATE member
                    SET forename = :forename,
                        surname = :surname,
                        email = :email,
                        role = :role
                    WHERE id = :id;";

            $this->db->runSQL($sql, $member);
            return true;
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                return false;
            }

            throw $e;
        }

        return true;
    }
}
