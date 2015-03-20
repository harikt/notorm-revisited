<?php
namespace Blog;

class Post
{
    protected $id;

    protected $title;

    protected $body;

    protected $tags = array();

    protected $author;

    public function __construct($title, $body, $tags = array(), $id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->tags = $tags;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }
}
