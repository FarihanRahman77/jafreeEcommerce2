<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\subCategory;
use App\Models\ShopSetting;
use DB;


class subCategoryController extends Controller
{
    public function subCategoryView(){
        
        return view('admin.home.subCategory.subCategoryView');
    }

    public function getData(){
        $data = "";
        $subCategory = DB::table('sub_categories')
                ->leftjoin('tbl_category','tbl_category.id','=','sub_categories.category_id')
                ->select('sub_categories.*','tbl_category.categoryName')
                ->where('sub_categories.deleted','No')
                ->get();
        $settings=ShopSetting::where('status', 'Active')->first();
        $output = array('data' => array());
        $i=1;
        foreach ($subCategory as $sub) {
            $button = ' <td style="width: 12%;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                <li class="action"><a href="#" class="btn" onclick="editBrand('.$sub->id.')"><i class="fas fa-edit"></i> Edit </a></li>
                            </ul>
                        </div>
                        </td>';
            $status = "";
            if($sub->status == 'Active'){
                $status = '<center><i class="fas fa-check-circle" style="color:green; font-size:16px;" title="'.$sub->status.'"></i></center>';
            }else{
                $status = '<center><i class="fas fa-times-circle" style="color:red; font-size:16px;" title="'.$sub->status.'"></i></center>';
            }
            
            $imageUrl = asset('ecomas/images/brand/'.$sub->brand_image);
        
            $output['data'][] = array(
                $i++. '<input type="hidden" name="id" id="id" value="'.$sub->id.'" />',
                '<img style="width:40px;" src="'.$imageUrl.'" alt="'.$sub->brandName.'" />',
                $sub->name,
                $sub->categoryName,
                $sub->is_website,
                $status,
                $button
            );               
        }	
        return $output;
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
