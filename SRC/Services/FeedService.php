<?php

declare(strict_types = 1);

require_once 'SRC/Models/PostsModel.php';

class FeedService {
    private $postModel;

    public function __construct($postModel) {
        $this->postModel = $postModel;
    }

    public function displayFeed() {
        $feed = $this->postModel->getAllPosts();

        echo '<h2>Feed</h2>';
        echo '<div>';
        foreach ($feed as $post) {
            echo "<div>
                <h3>@{$post['username']}</h3>
                <h4>{$post['title']}</h4>
                <img alt='image' src='{$post['image']}' width='400px' height='400px'/>
                <p>{$post['content']}</p>
          </div>
        <br>";
        }
        echo '</div>';
    }
}