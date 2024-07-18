<?php

$db = new PDO('mysql:host=db;dbname=social', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$query = $db->prepare('SELECT `users`.`id` AS `user_id`, `users`.`username`, `posts`.`title`, `posts`.`image` 
                                FROM `users` 
                                LEFT JOIN `posts` 
                                ON `users`.`id` = `posts`.`user_id`;');

$query->execute();
$users = $query->fetchAll();


echo '<ul>';
foreach ($users as $user) {
    echo "<li>{$user['username']} - {$user['id']}</li>";
    echo "<li>{$user['title']} - {$user['user_id']}</li>";
    echo "<img alt='image' src='{$user['image']}'/>";
}
echo '</ul>';