<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Category;
use App\manufacturer;
use App\product;
use App\subCategory;
use App\productSpecialOffer;
use App\productspecification;
use App\Models\ShopSetting;
use App\Orders;
use App\Users;
use App\Models\LocationCarringCost;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use Image;
use function Sodium\increment;

class productController extends Controller {
  protected $name;
  /* function for admin panel*/
  public function productView() {



    return view('admin.home.products.productsView', ['products' => $products]);
  }
  /* //function for admin panel*/

  

      public function productEdit($id) {

      $product = Product::find($id);
      $productImages = ProductImage::where('productId',$id)->get();
        return view('admin.home.products.manageProduct', ['product' => $product,'productImages' => $productImages,'id'=>$id]);
      }

      
      

    public function productUpdate(Request $request) {
      
      if($request->hasFile('productImage')){
        $productimg = $request->file('productImage');
       $name = $productimg->getClientOriginalName();
       $uploadPath = 'website\images\products';
       $imageUrl = $uploadPath.$name;
       $imageName = time().$name;
       Image::make($productimg)->resize(360,360)->save($imageUrl);
        $productimg->move($uploadPath, $imageName);
      }
    
      $image = new ProductImage();
      $image->productImage=$imageName;
      $image->productId = $request->id;
      $image->createdBy = auth()->user()->id;
      $image->created_date = date('Y-m-d');
      $image->save();

    return back()->with('message', 'Product updated successfully');

  }

     
  public function productVideoUrlUpdate(Request $request){
    $product = Product::find($request->id);
    $product->video_url=$request->video_url;
    $product->save();
    return back()->with('message', 'Product Video Url updated successfully.');
  }



  public function toggleStatus($id)
  {
      $productImage = ProductImage::find($id);

      // Toggle the status between 'Active' and 'Inactive'
      $productImage->status = ($productImage->status == 'Active') ? 'Inactive' : 'Active';
      $productImage->save();

      // Return back with a message
      return back()->with('message', 'Product image status updated successfully.');
  }


    }
