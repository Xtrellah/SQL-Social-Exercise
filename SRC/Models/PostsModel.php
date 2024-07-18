<?php

declare(strict_types=1);

class PostsModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPosts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts`;');
        $query->execute();
        return $query->fetchAll();
    }

    public function getPostById(int $id): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function createPost(string $title, string $content, string $image): bool
    {
        $query = $this->db->prepare('INSERT INTO `posts` (`title`, `content`, `image`) VALUES (:title, :content, :image);');
        return $query->execute([
            'title' => $title,
            'content' => $content,
            'image' => $image
        ]);
    }
}