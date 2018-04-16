<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Candidate;
use App\Http\Resources\Candidate as CandidateResource;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();

        return CandidateResource::collection($candidates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = $request->isMethod('put') ? Candidate::findOrFail($request->candidate_id) : new Candidate;
        
        $candidate->id = $request->input('candidate_id');
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->city_id = $request->input('city_id');
        $candidate->interest = $request->input('interest');
        $candidate->presentation = $request->input('presentation');
        $candidate->file_name = $request->input('file_name');        
        
        if ($candidate->save()) {
            return new CandidateResource($candidate);
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
        $candidate = Candidate::findOrFail($id);
        
        return new CandidateResource($candidate);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);

        if ($candidate->delete()) {
            return new CandidateResource($candidate);    
        }
    }
}
