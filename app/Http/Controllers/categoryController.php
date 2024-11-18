<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class categoryController extends Controller
{
    public function categoryView(){
        $category = Category::Where('deleted','no')->get();
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
        if($request->hasFile('image')){
            
            $request->validate([
                'image'   =>  'image|max:2048'
            ]);
			$brandImage = $request->file('image');
            $name = $brandImage->getClientOriginalName();
            $uploadPath = 'brandLogo/';
            $imageUrl = $uploadPath.$name;
            $imageName = time().$name;
            $brandImage->move($uploadPath, $imageName);
        }else{
            $imageName = "no_image.png";
        }
        /*Eloquent ORM process*/
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
        $this->validate($request,[
            'Categoryname'=>'required',
            'CategoryStatus'=>'required',
        ]);
        //dd($request->all());
        $category =  Category:: find($request->id);
        $category->categoryName = $request->Categoryname;
        $category->categoryStatus = $request->CategoryStatus;
        $category->comments = $request->comments;
        $category->save();
        return redirect('/category/view')->with('message','Category Updated secessfully');
    }
}
