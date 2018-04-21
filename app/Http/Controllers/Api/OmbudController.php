<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Ombud;
use App\Http\Resources\Ombud as OmbudResource;

class OmbudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ombuds = Ombud::all();

        return OmbudResource::collection($ombuds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ombud = new Ombud;
        
        $ombud->type = $request->input('type');
        $ombud->name = $request->input('name');
        $ombud->email = $request->input('email');
        $ombud->phone = $request->input('phone');
        $ombud->city_id = $request->input('city_id');
        $ombud->message = $request->input('message');
        
        if ($ombud->save()) {
            return new OmbudResource($ombud);
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
        $ombud = Ombud::findOrFail($id);
        
        return new OmbudResource($ombud);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ombud = Ombud::findOrFail($id);

        if ($ombud->delete()) {
            return new OmbudResource($ombud);    
        }
    }
}
