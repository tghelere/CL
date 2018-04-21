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
        
        $budget->solution_id = $request->input('solution_id');
        $budget->number_of_employees = $request->input('number_of_employees');
        $budget->services = $request->input('services');
        $budget->name = $request->input('name');
        $budget->email = $request->input('email');
        $budget->phone = $request->input('phone');
        $budget->city_id = $request->input('city_id');
        
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
