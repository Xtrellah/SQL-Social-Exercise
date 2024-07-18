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
        $query = $this->db->prepare('
            SELECT `users`.`id` AS `user_id`, `users`.`username`, `posts`.`title`, `posts`.`image`, `posts`.`content` 
                FROM `users` 
                LEFT JOIN `posts` 
                ON `users`.`id` = `posts`.`user_id`;');
        $query->execute();
        return $query->fetchAll();
    }

}