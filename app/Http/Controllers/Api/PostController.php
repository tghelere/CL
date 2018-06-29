<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Category;
use App\Http\Resources\Post as PostResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->get();

        return new PostResource($posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function limit($limit)
    {
        $posts = Post::latest()->offset(0)->limit($limit)->get();

        return new PostResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        try{
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $newFilename = Str::slug($request->input('title'))."_cover.".$ext;
                $folder = 'public/images/posts/'.$request->id.'/';
                Storage::delete($folder.$post->image); //apagando imagem anterior
                $path = $request->file('image')->storeAs($folder, $newFilename); //salvando nova imagem
                $post->image = $newFilename;
            }else{
                $post->image = $request->input('image');
            }
            $post->id = $request->input('id');
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->body = $request->input('body');
            $post->slug = Str::slug($request->input('title'));
            $post->status = $request->input('status');
            $post->updated_at = $request->input('updated_at');
            if ($request->input('action') == 'changeStatus') {
                $post->categories()->sync($request->input('categories'));
            } else {
                $cat = json_decode($request->input('categories'));
                $post->categories()->sync($cat);
            }
            
            if ($post->save()) {
                return new PostResource($post);
            }            
        }catch(\Illuminate\Database\QueryException $e){
            return Response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        try{
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $newFilename = Str::slug($request->input('title'))."_cover.".$ext;
            }
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->body = $request->input('body');
            $post->slug = Str::slug($request->input('title'));
            $post->status = $request->input('status');
            $post->image = $newFilename;
            $cat = json_decode($request->input('cat'));
            if ($post->save()) {
                $path = $request->file('image')->storeAs('public/images/posts/'.$post->id, $newFilename);
                $post->categories()->sync($cat);
                return new PostResource($post);
            }
        }catch(\Illuminate\Database\QueryException $e){
            return Response()->json($e);
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
    public function categoryLast($category)
    {
        $category = Category::where('slug', $category)->get()->first();        
        $post = $category->posts()->orderBy('created_at', 'desc')->get()->first();
        return new PostResource($post);
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
            // $pathFile = 'public/images/posts/'.$post->id.'/'.$post->image;
            // Storage::delete($pathFile); 
            $directory = 'public/images/posts/'.$post->id;
            Storage::deleteDirectory($directory);
            return new PostResource($post);    
        }
    }
}
