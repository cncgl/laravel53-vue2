<?php

namespace app\Services;
use App\Model\Post;
use Debugbar;

class PostService
{
  public function index()
  {
    $posts = Post::all();
    Debugbar::info($posts);
    return $posts;
  }
}