<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Solution;
use App\Http\Resources\Solution as SolutionResource;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::all();

        return SolutionResource::collection($solutions);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function titles()
    {
        $solutions = Solution::all()->pluck('title')->toArray();

        return $solutions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solution = $request->isMethod('put') ? Solution::findOrFail($request->solution_id) : new Solution;
        
        $solution->id = $request->input('solution_id');
        $solution->slug = $request->input('slug');
        $solution->title = $request->input('title');
        $solution->description = $request->input('description');
        $solution->thumb = $request->input('thumb');

        if ($solution->save()) {
            return new SolutionResource($solution);
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
        $solution = Solution::findOrFail($id);
        
        return new SolutionResource($solution);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solution = Solution::findOrFail($id);

        if ($solution->delete()) {
            return new SolutionResource($solution);    
        }
    }
}
