<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Banner;
use App\Http\Resources\Banner as BannerResource;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $banners = Banner::all();

        return BannerResource::collection($banners);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
        $banner = new Banner;

        try{
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $newFilename = Str::slug($filename)."_banner_". $request->input('page') .".".$ext;
            }
        
            $banner->id = $request->input('id');
            $banner->page = $request->input('page');
            // $banner->status = $request->input('status');
            $banner->image = $newFilename;
            $banner->title = $request->input('title');
            $banner->description = $request->input('description');
            $banner->link = $request->input('link');
            $banner->colorbox = $request->input('colorbox');
        
            if ($banner->save()) {
                $path = $request->file('image')->storeAs('public/images/banners/', $newFilename);
                return new BannerResource($banner);
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
    public function update(Request $request)
    {        
        $banner = Banner::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $newFilename = Str::slug($filename)."_banner_". $request->input('page') .".".$ext;
            $folder = 'public/images/banners/';
            Storage::delete($folder.$banner->image); //apagando imagem anterior
            $path = $request->file('image')->storeAs($folder, $newFilename); //salvando nova imagem
            $banner->image = $newFilename;
        }else{
            $banner->image = $request->input('image');
        }
        
        $banner->id = $request->input('id');
        $banner->page = $request->input('page');
        // $banner->status = $request->input('status');
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->link = $request->input('link');
        $banner->colorbox = $request->input('colorbox');

        if ($banner->save()) {
            return new BannerResource($banner);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $banner = Banner::findOrFail($id);
        
        return new BannerResource($banner);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function page($page)
    {
        
        $banners = Banner::where('page', $page)->get();
        
        return new BannerResource($banners);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $banner = Banner::findOrFail($id);

        if ($banner->delete()) {
            return new BannerResource($banner);    
        }
        
    }
}
