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
  

  public function productView() {

    return view('admin.home.products.productsView');

  }
 

  public function getData(Request $request, $filter)
{
    $settings = ShopSetting::where('status', 'Active')->where('deleted', 'No')->first();
    $filterArray = explode("@", $filter);
    $filters = [
        'is_website' => $filterArray[0] ?? null,
        'featured' => $filterArray[1] ?? null,
        'best_selling' => $filterArray[2] ?? null,
        'new_arrival' => $filterArray[3] ?? null,
        'top_rated' => $filterArray[4] ?? null,
        'special_offer' => $filterArray[5] ?? null,
        'category_id' => $filterArray[6] ?? null,
        'brand_id' => $filterArray[7] ?? null,
    ];

    $products = DB::table('tbl_products')
        ->select(
            'tbl_products.*',
            'tbl_brands.brandName',
            'tbl_brands.brand_logo',
            'tbl_category.categoryName',
            'sub_categories.name as subCategoryName',
        )
        ->leftjoin('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
        ->leftjoin('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
        ->leftjoin('sub_categories', 'tbl_products.sub_category_id', '=', 'sub_categories.id')
        ->where('tbl_products.deleted', 'No')
        ->where('tbl_brands.deleted', 'No')
        ->where('tbl_category.deleted', 'No')
        ->when($filters['is_website'], function ($query) use ($filters) {
            $query->where('tbl_products.is_website', '=', $filters['is_website']);
        })
        ->when($filters['featured'], function ($query) use ($filters) {
            $query->where('tbl_products.website_featured', '=', $filters['featured']);
        })
        ->when($filters['best_selling'], function ($query) use ($filters) {
            $query->where('tbl_products.website_best_selling', '=', $filters['best_selling']);
        })
        ->when($filters['new_arrival'], function ($query) use ($filters) {
            $query->where('tbl_products.website_new_arrival', '=', $filters['new_arrival']);
        })
        ->when($filters['top_rated'], function ($query) use ($filters) {
            $query->where('tbl_products.website_toprated', '=', $filters['top_rated']);
        })
        ->when($filters['special_offer'], function ($query) use ($filters) {
            $query->where('tbl_products.website_special_offer', '=', $filters['special_offer']);
        })
        ->when($filters['category_id'], function ($query) use ($filters) {
            $query->where('tbl_products.categoryId', '=', $filters['category_id']);
        })
        ->when($filters['brand_id'], function ($query) use ($filters) {
            $query->where('tbl_products.tbl_brandsId', '=', $filters['brand_id']);
        })
        ->orderBy('tbl_products.id', 'desc')
        ->get();

        $output = array('data' => array());
		    $i = 1;
        $imageUrl='';
        foreach($products as $product){
          $button = ' <td style="width: 12%;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                              <li class="action"><a href="#" class="btn" onclick="edit('.$product->id.')"><i class="fas fa-edit"></i> Edit </a></li>
                            </ul>
                        </div>
                      </td>';
          $imageUrl=$settings->erp_baseurl.'/images/products/thumb/'.$product->productImage;
          
          $output['data'][] = array(
            $i++ . '<input type="hidden" name="id" id="id" value="' . $product->id . '" />',
            '<img src = "'.$imageUrl.'" width="55" height="55" />',
            '<b>Name: </b>'.$product->productName.' <br> <b>Category: </b> '.$product->categoryName.'<br> <b>Sub Category: </b> '.$product->subCategoryName.' <br> <b>Brand: </b> '.$product->brandName,
            $product->modelNo,
            '<b>Featured: </b>'.$product->website_featured.' <br>
            <b>Best Selling: </b>'.$product->website_best_selling.' <br>
            <b>New Arrival: </b>'.$product->website_new_arrival.' <br>
            <b>Top Rated: </b>'.$product->website_toprated.' <br>
            <b>Special Offer: </b>'.$product->website_special_offer.' <br>
            <b>Is Website: </b>'.$product->is_website,
            $product->status,
            $product->created_at,
            $button
          );
        }
        return $output;
}




    public function productEdit($id) {
      $product = Product::find($id);
      $category=Category::find($product->categoryId);
      $productImages = ProductImage::where('productId',$id)->get();
      $subCategories = DB::table('sub_categories')
                ->where('category_id','=',$product->categoryId)
                ->where('deleted','No')
                ->where('status','Active')
                ->get();
      return view('admin.home.products.manageProduct', ['product' => $product,'productImages' => $productImages,'id'=>$id,'category'=>$category,'subCategories'=>$subCategories]);
    }

      
      

    public function productUpdate(Request $request) {
      
      if ($request->hasFile('productImage')) {
        $productimg = $request->file('productImage');
        $name = $productimg->getClientOriginalName();
    
        // Define upload path and generate a unique image name
        $uploadPath = 'website/images/products/';
        $imageName = time() . '_' . $name; // Unique image name
        $imageUrl = $uploadPath . $imageName;
    
        // Resize the image and save to the specified path
        Image::make($productimg)
            ->resize(360, 360)
            ->save(public_path($imageUrl)); // Use public_path() to resolve correctly
    
        // Optional: Move the original image if needed
        // $productimg->move($uploadPath, $imageName);
    
        // Image path is now stored in $imageUrl
    }
    
      $image = new ProductImage();
      $image->productImage=$imageName;
      $image->productId = $request->id;
      $image->createdBy = auth()->user()->id;
      $image->created_date = date('Y-m-d');
      $image->save();

      return back()->with('message', 'Product updated successfully');

    }

     
  public function productVideoUrlUpdate(Request $request)
  {
    $product = Product::find($request->id);
    $product->video_url=$request->video_url;
    $product->save();
    return back()->with('message', 'Product Video Url updated successfully.');
  }


  public function subCatUpdate(Request $request)
  {
    $product = Product::find($request->id);
    $product->sub_category_id=$request->sub_category_id;
    $product->save();
    return back()->with('message', 'Product Sub Category updated successfully.');
  }


  public function productWebsiteShowUpdate(Request $request){
    $product = Product::find($request->id);
    $product->website_featured=$request->featured;
    $product->website_best_selling=$request->best_selling;
    $product->website_new_arrival=$request->new_arrival;
    $product->website_toprated=$request->toprated;
    $product->website_special_offer=$request->special_offer;
    $product->is_website=$request->is_website;
    $product->save();
    return back()->with('message', 'Updated successfully.');
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
