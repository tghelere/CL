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
        
        $ombud->type = $request->json('complaint');
        $ombud->name = $request->json('name');
        $ombud->email = $request->json('email');
        $ombud->phone = $request->json('phone');
        $ombud->city_id = $request->json('city.id');
        $ombud->message = $request->json('message');
        
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
