<?php
namespace Blog\Repository\Post;

use NotORM;
use Blog\Hydrate;
use Blog\Author;
use Blog\Post;
use Blog\Tag;

class SqlRepository implements PostRepository
{
    protected $db;

    public function __construct(NotORM $db)
    {
        $this->db = $db;
    }

    public function find($id)
    {
        $article = $this->getArticleRow($id);
        return $this->buildPost($article);
    }

    public function save(Post $post)
    {
        if ($post->getId() > 0) {
            $this->update($post);
        } else {
            $this->insert($post);
        }
    }

    protected function insert($post)
    {
        $data = array(
            'title' => $post->getTitle(),
            'body' => $post->getBody(),
            'source_id' => $post->getSource()->getId(),
        );
        $row = $this->db->article()->insert($data);
        Hydrate::set($post, 'id', $row['id']);
    }

    protected function update($post)
    {
        $row = $this->getArticleRow($post->getId());
        if ($row) {
            $data = array(
                'title' => $post->getTitle(),
                'body' => $post->getBody(),
                'source_id' => $post->getSource()->getId(),
            );
            return $row->update($data);
        }
        return false;
    }

    protected function getArticleRow($id)
    {
        $row = $this->db->article[$id];
        return $row;
    }

    public function findBy(array $fields)
    {
    }

    public function findAll()
    {
        $articles = $this->db->article()
            ->limit(100)
            ;
        $posts = array();
        foreach ($articles as $article) {
            $posts[] = $this->buildPost($article);
        }
        return $posts;
    }

    protected function buildPost($article)
    {
        $tags = array();
        foreach ($article->article_tag() as $atag) {
            $tags[] = new Tag($atag->tag['name'], $atag->tag['id']);
        }
        return new Post($article['title'], $article['body'], $tags, $article['id']);
    }
}
