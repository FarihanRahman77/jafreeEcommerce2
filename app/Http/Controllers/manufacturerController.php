<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manufacturer;
use DB;
use Image;

class manufacturerController extends Controller
{
    public function manufacturerView()
    {
        $manufacturer = manufacturer::where('deleted', 'No')->get();
        //dd($manufacturer);
        return view('admin.home.settings.manufacturerView', ['manufacturers' => $manufacturer]);
    }
    public function manufacturerAdd()
    {
        return view('admin.home.settings.createManufacture');
    }
    public function manufacturerSave(Request $request)
    {
    //    return $request->all(); /* Data pass check like echo */
        $this->validate($request, [
            'Manufacturername' => 'required',
            'ManufacturerStatus' => 'required',
        ]);
        
        /*Eloquent ORM process*/
        $manufacturer = new manufacturer();
        
		if($request->hasFile('image')){
            $request->validate([
                'image'   =>  'image|max:2048'
              ]);
        	$image = $request->file('image');
            $name = $image->getClientOriginalName();
            $uploadPath = 'manufacturerImage/';
            $imageUrl = $uploadPath.$name;
            $imageName = time().$name;
            $categoryImage->move($uploadPath, $imageName);
			Image::make($image)->resize(360, 360)->save($imageUrl);
        
        }else{
            $imageName = "no_image.png";
        }
 
        
        $manufacturer->manufacturerName = $request->Manufacturername;
        $manufacturer->manufacturerStatus = $request->ManufacturerStatus;
        $manufacturer->image = $imageName;
        $manufacturer->comments = $request->comments;
        $manufacturer->createdBy = auth()->user()->id;
        $manufacturer->deleted = 'No';
        $manufacturer->save();
        return redirect('/manufacturer/view')->with('message', 'Manufacturer save secessfully');

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
    public function manufacturerEdit($id)
    {
        $manufacturerById = manufacturer::Where('id', $id)->where('deleted','No')->first();
        return view('admin.home.settings.manageManufacturerer', ['manufacturerById' => $manufacturerById]);
    }
    public function manufacturerUpdate(Request $request)
    {
        $this->validate($request, [
            'Manufacturername' => 'required',
            'ManufacturerStatus' => 'required',
        ]);
        //dd($request->all());
        $image = $request->file('image');

        if ($image) {
            $manufacturer = manufacturer::find($request->id);

            $name = $image->getClientOriginalName();
            $uploadPath = 'manufacturerImage/';
            $imageUrl = $uploadPath . $name;
            Image::make($image)->resize(360, 360)->save($imageUrl);


            $manufacturer->manufacturerName = $request->Manufacturername;
            $manufacturer->manufacturerStatus = $request->ManufacturerStatus;
            $manufacturer->image = $imageUrl;
            $manufacturer->comments = $request->comments;
            $manufacturer->save();
        } else {
            $manufacturer = manufacturer::find($request->id);

            $manufacturer->manufacturerName = $request->Manufacturername;
            $manufacturer->manufacturerStatus = $request->ManufacturerStatus;
            $manufacturer->comments = $request->comments;
            $manufacturer->save();
        }


        return redirect('/manufacturer/view')->with('message', 'Manufacturer Updated secessfully');
    }
    public function manufacturerDelete($id)
    {
        $manufacturer = manufacturer::find($id);
        $manufacturer->deleted = 'Yes';
        $manufacturer->deletedBy = auth()->user()->id;
        $manufacturer->deletedDate = date('Y-m-d H:i:s');
        $manufacturer->save();
        return redirect('/manufacturer/view/')->with('message', 'Manufacturer deleted secessfully');
    }
}
