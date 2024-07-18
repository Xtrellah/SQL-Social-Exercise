<?php

$db = new PDO('mysql:host=db;dbname=social', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$query = $db->prepare('SELECT `users`.`id` AS `user_id`, `users`.`username`, `posts`.`title`, `posts`.`image`, `posts`.`content` 
                                FROM `users` 
                                LEFT JOIN `posts` 
                                ON `users`.`id` = `posts`.`user_id`;');

$query->execute();
$users = $query->fetchAll();

// POST
echo '<ul>';
foreach ($users as $user) {
    echo "<div>
                <h3>{$user['username']}</h3>
                <h4>{$user['title']}</h4>
                <img alt='image' src='{$user['image']}'/>
                <li>{$user['content']}</li>
          </div>";
}
echo '</ul>';