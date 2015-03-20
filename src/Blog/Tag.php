<?php
namespace Blog;

class Tag
{
    protected $id;

    protected $name;

    public function __construct($name, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }
}
