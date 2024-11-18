<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Brand;
use App\Warehouse;
use App\Paymentmethod;
use DB;

class unitController extends Controller {

    public function unitView(Request $request) {
        $type = $request->type;
        //dd(auth()->user()->id);
        if ($type == 'unit') {
            $unit = Unit::Where('deleted', 'No')->get();
        } else if ($type == 'brand') {
            $unit = Brand::Where('deleted', 'No')->get();
            foreach ($unit as $unit_data) {
                $unit_data->unitName = $unit_data->brand_name;
                $unit_data->unitDesc = $unit_data->brand_desc;
            }
        }else if($type == 'warehouse'){
            $unit = Warehouse::Where('deleted', 'No')->get();
            foreach ($unit as $unit_data) {
                $unit_data->unitName = $unit_data->house_name;
                $unit_data->unitDesc = $unit_data->house_desc;
            }
        }
        else if($type == 'paymentmethod'){
            $unit = Paymentmethod::Where('deleted', 'No')->get();
            foreach ($unit as $unit_data) {
                $unit_data->unitName = $unit_data->method_name;
                $unit_data->unitDesc = $unit_data->method_desc;
            }
        }
        return view('admin.home.settings.manageUnit', ['units' => $unit, 'type' => $type]);
    }

    public function unitAdd(Request $request) {
        return view('admin.home.settings.createUnit', ['type' => $request->type]);
    }

    public function unitSave(Request $request) {
        //return $Request->all(); /* Data pass check like echo */
        /* Eloquent ORM process */
        $type = $request->type;
        if ($type == 'unit') {
            $unit = new Unit();
            $unit->unitName = $request->unitName;
            $unit->unitDesc = $request->unitDesc;
        } else if ($type == 'brand') {
            $unit = new Brand();
            $unit->brand_name = $request->unitName;
            $unit->brand_desc = $request->unitDesc;
        }else if ($type == 'warehouse') {
            $unit = new Warehouse();
            $unit->house_name = $request->unitName;
            $unit->house_desc = $request->unitDesc;
        } else if ($type == 'paymentmethod') {
            $unit = new Paymentmethod();
            $unit->method_name = $request->unitName;
            $unit->method_desc = $request->unitDesc;
        }
        $unit->status = $request->status;
        $unit->createdBy = auth()->user()->id;
        $unit->save();
        return redirect('/unit/view/' . $type)->with('message', $type . ' save secessfully');
    }

    public function unitEdit($type, $id) {
        if ($type == 'unit') {
            $unitById = Unit:: Where('id', $id)->first();
        } else if ($type == 'brand') {
            $unitById = Brand:: Where('id', $id)->first();
            $unitById->unitName = $unitById->brand_name;
            $unitById->unitDesc = $unitById->brand_desc;
        }else if ($type == 'warehouse') {
            $unitById = Warehouse:: Where('id', $id)->first();
            $unitById->unitName = $unitById->house_name;
            $unitById->unitDesc = $unitById->house_desc;
        }else if ($type == 'paymentmethod') {
            $unitById = Paymentmethod:: Where('id', $id)->first();
            $unitById->unitName = $unitById->method_name;
            $unitById->unitDesc = $unitById->method_desc;
        }
        return view('admin.home.settings.editUnit', ['unitById' => $unitById, 'type' => $type]);
    }

    public function updateUnit(Request $request) {
        //dd($request->all());
        $type = $request->type;
        if ($type == 'unit') {
            $unit = Unit:: find($request->id);
            $unit->unitName = $request->unitName;
            $unit->unitDesc = $request->unitDesc;
        } else if ($type == 'brand') {
            $unit = Brand:: find($request->id);
            $unit->brand_name = $request->unitName;
            $unit->brand_desc = $request->unitDesc;
        }else if ($type == 'warehouse') {
            $unit = Warehouse:: find($request->id);
            $unit->house_name = $request->unitName;
            $unit->house_desc = $request->unitDesc;
        }else if ($type == 'paymentmethod') {
            $unit = Paymentmethod:: find($request->id);
            $unit->method_name = $request->unitName;
            $unit->method_desc = $request->unitDesc;
        }

        $unit->status = $request->status;
        $unit->lastUpdatedBy = auth()->user()->id;
        $unit->save();
        return redirect('/unit/view/' . $type)->with('message', $type . ' udpated secessfully');
    }

    public function deleteUnit($type, $id) {
        if ($type == 'unit') {
            $unit = Unit:: find($id);
        } else if ($type == 'brand') {
            $unit = Brand:: find($id);
        }else if ($type == 'warehouse') {
            $unit = Warehouse:: find($id);
        }else if ($type == 'paymentmethod') {
            $unit = Paymentmethod:: find($id);
        }
        $unit->deleted = 'yes';
        $unit->deletedBy = auth()->user()->id;
        $unit->deletedDate = date('Y-m-d H:i:s');
        $unit->save();
        return redirect('/unit/view/' . $type)->with('message', $type . ' deleted secessfully');
    }

}
