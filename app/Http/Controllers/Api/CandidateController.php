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
   
        if ($request->hasFile('curriculum')) {
            
            $filenameWithExt = $request->file('curriculum')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('curriculum')->getClientOriginalExtension();
            $newFilename = date('Y-m-d--H-m-s')."-".md5($filename).".".$ext;
            $path = $request->file('curriculum')->storeAs('public/curriculums', $newFilename);
            
        }

        // $candidate = $request->isMethod('put') ? Candidate::findOrFail($request->candidate_id) : new Candidate;
        $candidate = new Candidate;
        
        // $candidate->id = $request->json('candidate_id');
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->phone = $request->input('phone');
        $candidate->city_id = $request->input('city');
        $candidate->interest = $request->input('interest');
        $candidate->presentation = $request->input('description');
        $candidate->file_name = $newFilename;

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
