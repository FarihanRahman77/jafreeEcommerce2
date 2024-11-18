<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Validator;
use DB;
use DataTables;

class TopProductsController extends Controller
{
    public function manageProducts(){
        //$topProducts = product::where('is_top','=','on')->get();
       //$products = product::all();;

       $products = DB::table('products')
       ->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
       ->join('sub_categories', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
       ->select('products.id', 'products.productName', 'products.productImage','products.productStatus','products.availability', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName')
       ->where('products.deleted', 'no')
       ->get();

      
      

       if(request()->ajax())
       {
        $topProducts = DB::table('products')
       ->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
       ->join('sub_categories', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
       ->select('products.id', 'products.productName', 'products.productImage','products.productStatus','products.availability', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName', 'products.is_top', 'products.id as action')
       ->where('is_top','=','on')
       ->latest()->get();
       foreach($topProducts as $topProduct){
           $topProduct->action = '<a onclick="removeTopProducts('.$topProduct->id.')"><i class="fa fa-trash"></i></a>';
       }
      
        return datatables()->of($topProducts)->make(true);
    }
    return view('admin.home.products.manage-top-products2',compact('products'));
}



public function topProductUpdate(Request $request){

        // $product = product::find($request->id);
        // $product->is_top = "on";
        // $product->save();
        // return redirect()->back();
    $rules = array(
        'id'    =>  'required',
        'is_top'     =>  'required'
    );

    $error = Validator::make($request->all(), $rules);

    if($error->fails())
    {
        return response()->json(['errors' => $error->errors()->all()]);
    }

    $form_data = array(
        'is_top'        =>  $request->is_top,

    );


    product::whereId($request->id)->update($form_data);

    return response()->json(['success' => 'Data is successfully updated']);

}

public function removeTopProduct(Request $request){

        // $product = product::find($id);
        // $product->is_top = "off";
        // $product->save();
        // return redirect()->back();


    $form_data = array(
        'is_top'        =>  "off",

    );

    product::whereId($request->id)->update($form_data);

    return response()->json(['success' => 'Data is successfully updated']);

}
}

