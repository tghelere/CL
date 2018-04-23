<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Banner;
use App\Http\Resources\Banner as BannerResource;
use App\Http\Controllers\Controller;

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
        
        $banner = $request->isMethod('put') ? Banner::findOrFail($request->banner_id) : new Banner;
        
        $banner->id = $request->input('banner_id');
        $banner->page = $request->input('page');
        $banner->status = $request->input('status');
        $banner->image = $request->input('image');
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
