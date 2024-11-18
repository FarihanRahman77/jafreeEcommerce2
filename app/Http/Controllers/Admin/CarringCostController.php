<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationCarringCost;

class CarringCostController extends Controller
{
    public function carringCostList(){

        $carringCostList = LocationCarringCost::where('deleted','no')->orderBy('id','desc')->get();
        return view('admin.home.location-carring-cost.carring-cost-list',compact('carringCostList'));

    }

    public function carringCostAdd(){
        return view('admin.home.location-carring-cost.create-carring-cost');
    }

    public function carringCostSave(Request $request) {
        //return $Request->all(); /* Data pass check like echo */
        $this->validate($request, [
            'location' => 'required',
            'cost' => 'required',
            'status' => 'required',
            
        ]);

        

        // beginTransaction();
        /* Eloquent ORM process */
        $carringCost = new LocationCarringCost();
        $carringCost->location = $request->location;
        $carringCost->cost = $request->cost;
        $carringCost->status = $request->status;
        $carringCost->deleted = 'No';
        $carringCost->save();




        // commitTransaction();
        return redirect('/manage/carring-cost')->with('message', 'Carring Cost saved successfully');
    }

    public function carringCostEdit($id){
        $carringCost = LocationCarringCost::find($id);
        return view('admin.home.location-carring-cost.edit-carring-cost',compact('carringCost'));

    }

    public function carringCostUpdate(Request $request){
        $carringCost = LocationCarringCost::find($request->id); 
        $carringCost->location = $request->location;
        $carringCost->cost = $request->cost;
        $carringCost->status = $request->status;
        $carringCost->save();
        return redirect('/manage/carring-cost')->with('message', 'Carring Cost updated successfully');

    }

    public function carringCostDelete($id) {
        $carringCost = LocationCarringCost:: find($id);
        $carringCost->deleted = 'Yes';
        $carringCost->deleted_by = auth()->user()->id;
        $carringCost->deleted_date = date('Y-m-d H:i:s');
        $carringCost->save();
        return redirect('/manage/carring-cost')->with('message', 'Carring Cost deleted successfully');
    }
}
