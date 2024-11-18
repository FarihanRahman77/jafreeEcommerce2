<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class categoryController extends Controller
{
    public function categoryView(){
        $category = Category::select('tbl_category.id', 
                                    'tbl_category.categoryName',
                                    'tbl_category.status',
                                    'tbl_category.createdDate',
                                    'tbl_category.logo',
                                    'tbl_category.image')
                    ->where('tbl_category.deleted', 'No')
                    ->whereIn('tbl_category.id', function ($query) {
                        $query->select('tbl_category_id')
                            ->distinct()
                            ->from('tbl_printbook_category')
                            ->where('tbl_printbook_category.is_website', 'Yes')
                            ->where('tbl_printbook_category.deleted', 'No');
                    })
                    ->orderBy('tbl_category.categoryName', 'ASC')
                    ->get();
        return view('admin.home.category.categoryView',['categories'=>$category]);
    }

    public function categoryAdd(){
        return view('admin.home.category.createCategory');
    }

    public function categorySave(Request $request){
        $this->validate($request,[
            'Categoryname'=>'required|max:255|unique:categories,categoryName|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u',
            'CategoryStatus'=>'required',
        ]);
        $category= new Category();
        $category->categoryName =$request->Categoryname;
        $category->categoryStatus =$request->CategoryStatus;
        $category->comments =$request->comments;
        $category->status = 'Active';
        $category->createdBy = auth()->user()->id;
        $category->deleted ='No';
        $category->save();
        return redirect('/category/view')->with('message','Category save secessfully');
        
    }
    public function categoryEdit($id){
        $categoryById = Category:: Where ('id',$id)->first();
        return view('admin.home.category.manageCategory',['categoryById'=>$categoryById]);
    }

    public function updateCategory(Request $request){
        $category =  Category:: find($request->id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=> 'mimes:jpeg,jpg,png,gif,webp|max:1000',
              ]);
            $categoryImage = $request->file('image');
            $name = $categoryImage->getClientOriginalName();
            $uploadPath = 'website/images/categories/';
            $imageUrl = $uploadPath . $name;
            $imageName = time() . $name;
            $categoryImage->move($uploadPath, $imageName);
            $category->image = $imageName;
       
        }

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo'=> 'mimes:jpeg,jpg,png,gif,webp|max:1000',
              ]);
              
            $categorylogo = $request->file('logo');
            $logo = $categorylogo->getClientOriginalName();
            $uploadPath = 'website/images/categories/';
            $logoUrl = $uploadPath . $logo;
            $logoName = time() . $logo;
            $categorylogo->move($uploadPath, $logoName);
            $category->logo = $logoName;
        }
       
        
        $category->save();
        return redirect('/category/view')->with('message','Category Updated secessfully');
    }
}
