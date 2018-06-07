<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Newsletter;
use App\Http\Resources\Newsletter as NewsletterResource;
use Symfony\Component\HttpFoundation\Response;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::all();

        return NewsletterResource::collection($newsletters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsletter = new Newsletter;
        
        $newsletter->email = $request->input('email');

        try{
            if ($newsletter->save()) {
                return new NewsletterResource($newsletter);
            }            
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $returnData = array(
                    'status' => 'error',
                    'message' => 'Este E-mail já foi cadastrado'
                );
                return Response()->json($returnData, 409);
            }

        }
        
    }   
}
