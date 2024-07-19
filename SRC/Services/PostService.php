<?php

require_once 'SRC/Entities/Post.php';

class PostService {

    public static function displayPost(Post $post): string
    {
        $output = "
            <div>
                <h1>{$post->getTitle()}</h1>
                <img src='{$post->getImage()}' width='600px' height='600px'/>
                <p>{$post->getCategory()} - {$post->getContent()}</p>
            </div>
            ";
        return $output;
    }
}
