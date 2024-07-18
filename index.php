<?php

declare(strict_types = 1);

require_once 'SRC/DatabaseConnector.php';
$db = DatabaseConnector::connect();
require_once 'SRC/Models/PostsModel.php';

$query = $db->prepare('SELECT `users`.`id` AS `user_id`, `users`.`username`, `posts`.`title`, `posts`.`image`, `posts`.`content` 
                                FROM `users` 
                                LEFT JOIN `posts` 
                                ON `users`.`id` = `posts`.`user_id`;');

$query->execute();
$users = $query->fetchAll();

$posts = $PostsModel->getAllPosts();

?><h1>Postagram</h1>
<?php

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