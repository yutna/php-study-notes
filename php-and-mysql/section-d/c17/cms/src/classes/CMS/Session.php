<?php

namespace PhpBook\CMS;

class Session
{
    public $id;
    public $forename;
    public $role;

    public function __construct()
    {
        session_start();

        $this->id = $_SESSION['id'] ?? 0;
        $this->forename = $_SESSION['forename'] ?? '';
        $this->role = $_SESSION['role'] ?? 'public';
    }

    public function create($member)
    {
        session_regenerate_id(true);

        $_SESSION['id'] = $member['id'];
        $_SESSION['forename'] = $member['forename'];
        $_SESSION['role'] = $member['role'];
    }

    public function update($member)
    {
        $this->create($member);
    }

    public function delete()
    {
        $_SESSION = [];
        $param = session_get_cookie_params();

        setcookie(session_name(), '', time() - 2400, $param['path'], $param['domain'], $param['secure'], $param['httponly']);
        session_destroy();
    }
}
