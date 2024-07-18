<?php

declare(strict_types = 1);

//
require_once 'SRC/DatabaseConnector.php';
$db = DatabaseConnector::connect();
require_once 'SRC/Models/PostsModel.php';

// ALL POSTS
$postsModel = new PostsModel($db);
$posts = $postsModel->getAllPosts();

?><h1>Postagram</h1>
<?php

// POST
echo '<ul>';
foreach ($posts as $user) {
    echo "<div>
                <h3>@{$user['username']}</h3>
                <h4>{$user['title']}</h4>
                <img alt='image' src='{$user['image']}'/>
                <li>{$user['content']}</li>
          </div>";
}
echo '</ul>';