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
  

    $products = DB::table('tbl_print_book_product')
    ->select(
        'tbl_products.*',
        'tbl_print_book_product.is_featured',
        'tbl_print_book_product.id as book_product_id',
        'tbl_brands.brandName',
        'tbl_brands.brand_logo',
        'tbl_category.categoryName'
    )
    ->distinct()
    ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
    ->join('tbl_printbook', 'tbl_printbook_category.tbl_printbook_id', '=', 'tbl_printbook.id')
    ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
    ->join('tbl_category', 'tbl_printbook_category.tbl_category_id', '=', 'tbl_category.id')
    ->join('tbl_products', 'tbl_print_book_product.tbl_product_id', '=', 'tbl_products.id')
    ->where('tbl_products.deleted', 'No')
    ->where('tbl_print_book_product.status', 'Active')
    ->where('tbl_print_book_product.deleted', 'No')
    ->where('tbl_printbook_category.is_website', 'Yes')
    ->where('tbl_printbook_category.status', 'Active')
    ->where('tbl_printbook_category.deleted', 'No') 
    ->where('tbl_printbook.status', 'Active')
    ->where('tbl_printbook.deleted', 'No')
    ->orderBy('tbl_products.id', 'desc')
    ->get();
    return view('admin.home.products.productsView', ['products' => $products]);
  }
 

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
