<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Category;
use App\Http\Resources\Post as PostResource;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->paginate(6);

        return new PostResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->isMethod('put') ? Post::findOrFail($request->post_id) : new Post;
        
        $post->id = $request->input('post_id');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->image = $request->input('image');
        $post->slug = Str::slug($request->input('title'));

        if ($post->save()) {
            return new PostResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        $postBody = Post::where('body', 'LIKE', "%{$search}%")->with('categories')->paginate(6);
        
        return new PostResource($postBody);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function slug($slug)
    {
        $post = Post::where('slug', $slug)->with('categories')->get()->first();
        
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return new PostResource($post);
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $category = Category::withCount('posts')->get();
        return new PostResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
        $category = Category::where('slug', $category)->get()->first();        
        $posts = $category->posts()->with('categories')->paginate(6);
        return new PostResource($posts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->delete()) {
            return new PostResource($post);    
        }
    }
}
