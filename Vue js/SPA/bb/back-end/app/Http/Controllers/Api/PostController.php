<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $postList = PostResource::collection($posts);
        return response()->json(
            [
                'success'=>true,
                'data'=>$postList
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return new PostResource($post);
    }
      /**
     * Display the specified resource.
     */
    public function show(ShowPostRequest $request, $id)
    {
        $validateData = $request->validated();
        $post = Post::find($id);
        if(!$post){
            return response()->json([
                'success'=>false,
                'message'=>'Post not found with ID '.$id
            ]);
        }
        return new PostResource($post);
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => "post not found with ID " . $id
            ]);
        }

        $post->createOrUpdate($request, $id);

        return response()->json([
            'success' => true,
            'message' => "post updated successfully with ID " . $id,
            'data' => $post
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = post::find($id);
        if (!$post) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "post not found with ID " . $id
                ]
            );
        }
        $post->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Delete a post successfully the ID " . $id,
            ]
        );
    }
}
