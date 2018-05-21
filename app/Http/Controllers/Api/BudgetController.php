<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Budget;
use App\Http\Resources\Budget as BudgetResource;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budget::all();

        return BudgetResource::collection($budgets);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $budget = new Budget;
        
        $budget->solution_id = $request->json('segment.id');
        $budget->number_of_employees = $request->json('contributors');
        $budget->services = implode(', ', $request->json('modality'));
        $budget->name = $request->json('name');
        $budget->email = $request->json('email');
        $budget->phone = $request->json('phone');
        $budget->city_id = $request->json('city.id');
        
        if ($budget->save()) {
            return new BudgetResource($budget);
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
        $budget = Budget::findOrFail($id);
        
        return new BudgetResource($budget);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);

        if ($budget->delete()) {
            return new BudgetResource($budget);    
        }
    }
}
