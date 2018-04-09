<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Testimony;
use App\Http\Resources\Testimony as TestimonyResource;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::all();

        return TestimonyResource::collection($testimonies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimony = $request->isMethod('put') ? Testimony::findOrFail($request->testimony_id) : new Testimony;
        
        $testimony->id = $request->input('testimony_id');
        $testimony->name = $request->input('name');
        $testimony->institute = $request->input('institute');
        $testimony->sequence = $request->input('sequence');
        $testimony->testimony = $request->input('testimony');        

        if ($testimony->save()) {
            return new TestimonyResource($testimony);
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
        $testimony = Testimony::findOrFail($id);
        
        return new TestimonyResource($testimony);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimony = Testimony::findOrFail($id);

        if ($testimony->delete()) {
            return new TestimonyResource($testimony);    
        }
    }
}
