<?php
declare(strict_types = 1);
?>
    <h1>Postagram</h1>
<?php

// IMPORTS
require_once 'SRC/DatabaseConnector.php';
$db = DatabaseConnector::connect();
require_once 'SRC/Models/PostsModel.php';
require_once 'SRC/Entities/Post.php';
require_once 'SRC/Services/PostService.php';
require_once 'SRC/Services/FeedService.php';

// INSTANTIATE MODEL
$postsModel = new PostsModel($db);

// PINNED POST
$posts = $postsModel->getPostById(41);
echo '<h2>Pinned Post</h2>';
echo PostService::displayPost($posts);

// NEW POST FORM
?>
    <h2>Make a post</h2>
    <pre>
        <form method="post">
            <label for="title">Title</label>
            <input type="text" id=title name="title" />

            <label for="content">Content</label>
            <input type="text" id=content name="content" />

            <label for="image">Image</label>
            <input type="text" id=image name="image" />

            <input type="submit" name="submitted" value="Post"/>
        </form>
    </pre>
<?php

// NEW POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
isset($_POST['submitted'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $postsModel->createPost($title, $content, $image);
}

// FEED
$feedService = new
FeedService($postsModel);
$feedService->displayFeed();