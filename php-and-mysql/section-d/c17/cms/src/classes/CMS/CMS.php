<?php

namespace PhpBook\CMS;

class CMS
{
    protected $db = null;
    protected $article = null;
    protected $category = null;
    protected $comment = null;
    protected $like = null;
    protected $member = null;
    protected $session = null;
    protected $token = null;

    public function __construct(string $dsn, string $username, string $password)
    {
        $this->db = new Database($dsn, $username, $password);
    }

    public function getArticle()
    {
        if ($this->article === null) {
            $this->article = new Article($this->db);
        }

        return $this->article;
    }

    public function getCategory()
    {
        if ($this->category === null) {
            $this->category = new Category($this->db);
        }

        return $this->category;
    }

    public function getComment()
    {
        if ($this->comment === null) {
            $this->comment = new Comment($this->db);
        }

        return $this->comment;
    }

    public function getLike()
    {
        if ($this->like === null) {
            $this->like = new Like($this->db);
        }

        return $this->like;
    }

    public function getMember()
    {
        if ($this->member === null) {
            $this->member = new Member($this->db);
        }

        return $this->member;
    }

    public function getSession()
    {
        if ($this->session === null) {
            $this->session = new Session();
        }

        return $this->session;
    }

    public function getToken()
    {
        if ($this->token === null) {
            $this->token = new Token($this->db);
        }

        return $this->token;
    }
}
