<?php
namespace Blog\Repository\Post;

class InMemoryRepository implements PostRepository
{
    private $data = array();

    public function __construct()
    {
    }

    public function find($id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }
        return null;
    }

    public function save($post)
    {
        if ($post->getId() > 0) {
            $this->update($post);
        } else {
            $this->insert($post);
        }
    }

    protected function insert($post)
    {
        if (isset($this->data[$post->getId()])) {
            throw new \Exception("Data already set");
        }
        $this->data[$post->getId()] = $post;
    }

    protected function update($data)
    {
        if (! isset($this->data[$post->getId()])) {
            throw new \Exception("Data not set");
        }
        $this->data[$post->getId()] = $post;
    }

    public function findBy(array $fields)
    {
    }

    public function findAll()
    {
    }
}
