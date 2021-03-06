<?php

namespace App\Http\Controllers;

# use Illuminate\Http\Request;
# use Illuminate\Http\Response;
use App\Services\PostService;
use App\Http\Requests;
use App\Model\Post;
use App;
use Debugbar;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $postService = App::make(App\Services\PostService::class);
    $postService = app(App\Services\PostService::class);
    $posts = $postService->index();
    return response()->json($posts);
//    $posts = Post::all();
//    Debugbar::info($posts);
//    return response()->json($posts);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $post = new Post;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();
    return response()->json($post, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return response()->json($post);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int                      $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $post = Post::find($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();
    return response()->json($post);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Post::destroy($id);
    return response()->json([], 204);
  }
}
