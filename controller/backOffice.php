<?php
require_once('model/PostManager.php');

function listPostsAdmin()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/backOffice/listPostsEdit.php');
}
