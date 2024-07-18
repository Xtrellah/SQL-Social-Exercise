<?php

declare(strict_types = 1);

// IMPORTS
require_once 'SRC/DatabaseConnector.php';
$db = DatabaseConnector::connect();
require_once 'SRC/Models/PostsModel.php';

// INSTANTIATE MODEL
$postsModel = new PostsModel($db);

?>
    <h1>Postagram</h1>

    <h2>Make a post</h2>
    <pre>
        <form method="post">
            <label for="title">Title</label>
            <input type="text" id=$title name="title" />

            <label for="content">Content</label>
            <input type="text" id=$content name="content" />

            <label for="image">Image</label>
            <input type="text" id=$image name="image" />

            <input type="submit" name="submitted" value="Post"/>
        </form>
    </pre>
<?php

// NEW POST
if (isset($_POST['submitted'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];
}

$postsModel->createPost('title', 'content', 'image');

// FEED
$posts = $postsModel->getAllPosts();

echo '<h2>Feed</h2>';
echo '<div>';
foreach ($posts as $user) {
    echo "<div>
                <h3>@{$user['username']}</h3>
                <h4>{$user['title']}</h4>
                <img alt='image' src='{$user['image']}'/>
                <p>{$user['content']}</p>
          </div>
        <br>";
}
echo '</div>';