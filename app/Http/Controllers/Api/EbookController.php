<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Ebook;
use App\Http\Resources\Ebook as EbookResource;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks = Ebook::get()->first();

        return new EbookResource($ebooks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ebook = Ebook::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $newFilename = Str::slug($request->input('title')).".".$ext;
            $folder = 'public/images/ebooks/';
            Storage::delete($folder.$ebook->image); //apagando imagem anterior
            $path = $request->file('image')->storeAs($folder, $newFilename); //salvando nova imagem
            $ebook->image = $newFilename;
        }else{
            $ebook->image = $request->input('image');
        }
        
        $ebook->id = $request->input('id');
        $ebook->title = $request->input('title');
        $ebook->url = $request->input('url');

        if ($ebook->save()) {
            return new EbookResource($ebook);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
