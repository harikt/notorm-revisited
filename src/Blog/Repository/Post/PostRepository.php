<?php
namespace Blog\Repository\Post;

interface PostRepository
{
    public function find($id);

    public function save(\Post $data);

    public function findBy(array $fields);

    public function findAll();
}
