<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Content;
use App\Http\Resources\Content as ContentResource;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();

        return ContentResource::collection($contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $content = $request->isMethod('put') ? Content::findOrFail($request->id) : new Content;
        $content->id = $request->input('id');
        $content->page = $request->input('page');
        $content->content = $request->input('content');

        try{
            if ($content->save()) {
                return new ContentResource($content);
            }            
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            $returnData = array(
                'status' => 'error',
                'message' => $errorCode,
            );
            return Response()->json($returnData);

        }

        if ($content->save()) {
            return new ContentResource($content);
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
        $content = Content::findOrFail($id);
        
        return new ContentResource($content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function page($page)
    {
        
        $content = Content::where('page', $page)->get()->first();
        
        return new ContentResource($content);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);

        if ($content->delete()) {
            return new ContentResource($content);    
        }
    }
}
