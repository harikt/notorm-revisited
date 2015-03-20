<?php
namespace Blog;

class Author
{
    protected $id;

    protected $name;

    protected $email;

    protected $password;

    public function __construct($name, $email, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
