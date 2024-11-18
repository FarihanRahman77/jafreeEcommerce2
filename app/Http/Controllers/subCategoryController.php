<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\subCategory;
use DB;


class subCategoryController extends Controller
{
    public function subCategoryView(){
        //$subCategory = subCategory::all();
        $subCategory = DB::table('sub_categories')
                ->leftjoin('categories','categories.id','=','sub_categories.tbl_CategoryID')
                ->select('sub_categories.id','sub_categories.subCategoryName','categories.categoryName','sub_categories.comments','sub_categories.status','sub_categories.created_at')
                ->where('sub_categories.deleted','No')
                ->get();
                //->toSql();
                //return $subCategory;
        return view('admin.home.subCategory.subCategoryView',['subCategories'=>$subCategory]);
    }
    public function subCategoryAdd(){
        
        $categories = Category::where('categoryStatus', 'Available')->where('deleted','no')->get();
        return view('admin.home.subCategory.subCreateCategory',['categories'=>$categories]);
    }
    public function subCategorySave(Request $request){
        //return $request->all(); /* Data pass check like echo */
        $this->validate($request,[
            'CategoryName'=>'required',
            'subCategoryname'=>'required',
            'subCategoryStatus'=>'required',
        ]);
        //return $request->all();
        /*Eloquent ORM process*/
        $subCategory= new subCategory();
        $subCategory->subCategoryName =$request->subCategoryname;
        $subCategory->tbl_CategoryID =$request->CategoryName;
        $subCategory->comments =$request->comments;
        $subCategory->status =$request->subCategoryStatus;
        $subCategory->createdBy = auth()->user()->id;
        $subCategory->save();
        return redirect('/sub-category/view')->with('message','Sub-category save secessfully');
        
        /*Query Builder process*/
        /*DB::table('categories')->insert([
            'tbl_brand_id' =>$request->brandsName,
            'categoryName' =>$request->Categoryname,
            'categoryStatus' =>$request->CategoryStatus,
            'comments' =>$request->comments,
            
        ]);
        return redirect('/category/add');
        //return redirect()->back();*/
        
    }
    public function subCategoryEdit($id){
        $categories = Category::where('categoryStatus', 'Available')->where('deleted','no')->get();
        $subCategoryById = DB::table('sub_categories')
                ->leftjoin('categories','categories.id','=','sub_categories.tbl_CategoryID')
                ->select('sub_categories.id','sub_categories.subCategoryName','sub_categories.tbl_CategoryID','categories.categoryName','sub_categories.comments','sub_categories.status','sub_categories.created_at')
                ->where('sub_categories.id',$id)
                ->first();
        return view('admin.home.subCategory.manageSubCategory',['subCategoryById'=>$subCategoryById,'categories'=>$categories]);
    }
    public function updateSubCategory(Request $request){
        $this->validate($request,[
            'CategoryName'=>'required',
            'subCategoryname'=>'required',
            'subCategoryStatus'=>'required',
        ]);
        //dd($request->all());
        $subCategory = subCategory:: find($request->id);
        $subCategory->subCategoryName =$request->subCategoryname;
        $subCategory->tbl_CategoryID =$request->CategoryName;
        $subCategory->comments =$request->comments;
        $subCategory->status =$request->subCategoryStatus;
        $subCategory->createdBy = auth()->user()->id;
        $subCategory->lastUpdatedBy = date('Y-m-d H:i:s');
        $subCategory->save();
        return redirect('/sub-category/view')->with('message','Sub Category Updated secessfully');
    }
    public function deleteSubCategory($id){
        $subCategory = subCategory:: find($id);
        $subCategory->deleted = 'Yes';
        $subCategory->deletedBy = auth()->user()->id;
        $subCategory->deletedDate = date('Y-m-d H:i:s');
        $subCategory->save();
        return redirect('/sub-category/view')->with('message', 'Sub Category deleted secessfully');
    }
}
