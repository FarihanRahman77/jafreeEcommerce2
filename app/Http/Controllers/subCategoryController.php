<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Models\SubCategory;
use App\Models\ShopSetting;
use DB;


class subCategoryController extends Controller
{
    public function subCategoryView(){

        $categories = Category::select('tbl_category.id', 
                                    'tbl_category.categoryName'
                                    )
                    ->where('tbl_category.deleted', 'No')
                    ->where('tbl_category.status', 'Active')
                    ->whereIn('tbl_category.id', function ($query) {
                        $query->select('tbl_category_id')
                            ->distinct()
                            ->from('tbl_printbook_category')
                            ->where('tbl_printbook_category.is_website', 'Yes')
                            ->where('tbl_printbook_category.deleted', 'No');
                    })
                    ->orderBy('tbl_category.categoryName', 'ASC')
                    ->get();
        return view('admin.home.subCategory.subCategoryView',['categories'=>$categories]);
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
            $button = '<td style="width: 12%;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                <li class="action"><a href="#" class="btn" onclick="editBrand('.$sub->id.')"><i class="fas fa-edit"></i> Edit </a></li>
                                <li class="action"><a href="#" class="btn d-none" onclick="confirmDelete('.$sub->id.')"><i class="fas fa-trash"></i> Delete </a></li>
                            </ul>
                        </div>
                        </td>';

            $status = "";
            if($sub->status == 'Active'){
                $status = '<center><i class="fas fa-check-circle" style="color:green; font-size:16px;" title="'.$sub->status.'"></i></center>';
            }else{
                $status = '<center><i class="fas fa-times-circle" style="color:red; font-size:16px;" title="'.$sub->status.'"></i></center>';
            }
            
            $imageUrl = asset('ecomas/images/category/'.$sub->image);
        
            $output['data'][] = array(
                $i++. '<input type="hidden" name="id" id="id" value="'.$sub->id.'" />',
                '<img style="width:40px;" src="'.$imageUrl.'" alt="'.$sub->name.'" />',
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
       // return $request;
        $this->validate($request,[
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'category_id'=>'required',
            'priority'=>'required|numeric',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=> 'mimes:jpeg,jpg,png,gif,webp',
              ]);
            $categoryImage = $request->file('image');
            $name = $categoryImage->getClientOriginalName();
            $uploadPath = 'ecomas/images/category/';
            $imageUrl = $uploadPath . $name;
            $imageName = time() . $name;
            $categoryImage->move($uploadPath, $imageName);
            
        }else{
            $imageName='noimage.jpg';
        }
        $subCategory= new SubCategory();
        $subCategory->name =$request->name;
        $subCategory->image =$imageName;
        $subCategory->category_id =$request->category_id;
        $subCategory->priority =$request->priority;
        $subCategory->is_website =$request->is_website;
        $subCategory->status = 'Active';
        $subCategory->created_by = auth()->user()->id;
        $subCategory->created_date = date('Y-m-d H:i:s');
        $subCategory->deleted ='No';
        $subCategory->save();
        return response()->json(['success'=>'Saved updated successfully']);
    }



    public function subCategoryEdit(Request $request){
        $subCategories = DB::table('sub_categories')->select('*')
                ->where('sub_categories.id',$request->id)
                ->first();
        return $subCategories;
    }



    public function updateSubCategory(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'priority'=>'required',
            'priority'=>'required',
        ]);
        if ($request->hasFile('edit_image')) {
            $request->validate([
                'edit_image'=> 'mimes:jpeg,jpg,png,gif,webp',
              ]);
            $categoryImage = $request->file('edit_image');
            $name = $categoryImage->getClientOriginalName();
            $uploadPath = 'ecomas/images/category/';
            $imageUrl = $uploadPath . $name;
            $imageName = time() . $name;
            $categoryImage->move($uploadPath, $imageName);
            
        }
        $subCategory = SubCategory:: find($request->id);
        if ($request->hasFile('edit_image')) {
        }
        $subCategory->name =$request->name;
        $subCategory->category_id =$request->category_id;
        $subCategory->priority =$request->priority;
        $subCategory->is_website =$request->is_website;
        $subCategory->status =$request->status;
        $subCategory->updated_by = auth()->user()->id;
        $subCategory->updated_date = date('Y-m-d ');
        $subCategory->save();

        return redirect('/sub-category/view')->with('message','Sub Category Updated Successfully');
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
