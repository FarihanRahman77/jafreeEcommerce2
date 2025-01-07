<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Brand;
use App\Models\ShopSetting;
use DB;

class Brandcontroller extends Controller
{
    

    public function index()
    {
        
        return view('admin.home.brand.viewbrand');
    }

    
    public function getBrands(){
		$data = "";
		$brands = DB::table('tbl_printbook_category')
                    ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
                    ->select('tbl_brands.id', 'tbl_brands.brandName', 'tbl_brands.brand_logo', 'tbl_brands.is_agent',
                    'tbl_brands.status','brand_image','tbl_brands.is_website','tbl_brands.is_top','tbl_brands.top_priority')
                    ->where('tbl_printbook_category.is_website', 'Yes')
                    ->where('tbl_printbook_category.deleted', 'No')
                    ->where('tbl_brands.deleted', 'No')
                    ->distinct()
                    ->get();
        $settings=ShopSetting::where('status', 'Active')->first();
		$output = array('data' => array());
		$i=1;
		foreach ($brands as $brand) {
            $button = ' <td style="width: 12%;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                              <li class="action"><a href="#" class="btn" onclick="editBrand('.$brand->id.')"><i class="fas fa-edit"></i> Edit </a></li>
                            </ul>
                        </div>
                      </td>';
            $status = "";
            if($brand->status == 'Active'){
                $status = '<center><i class="fas fa-check-circle" style="color:green; font-size:16px;" title="'.$brand->status.'"></i></center>';
            }else{
                $status = '<center><i class="fas fa-times-circle" style="color:red; font-size:16px;" title="'.$brand->status.'"></i></center>';
            }
            
            $logoUrl = asset('ecomas/images/brand/'.$brand->brand_logo);
            $imageUrl = asset('ecomas/images/brand/'.$brand->brand_image);
		
			$output['data'][] = array(
				$i++. '<input type="hidden" name="id" id="id" value="'.$brand->id.'" />',
                '<img style="width:40px;" src="'.$logoUrl.'" alt="'.$brand->brandName.'" />',
                '<img style="width:40px;" src="'.$imageUrl.'" alt="'.$brand->brandName.'" />',
				$brand->brandName,
				$brand->is_website,
				$brand->is_top,
				$brand->top_priority,
				$status,
                $button
			);               
		}	
		return $output;
    }



    public function categoryWiseBrands(Request $request){
        if($request->id != ""){
            if($request->type == "purchase"){
                $brands = DB::table('tbl_brands')
                            ->join('products', 'products.brand_id', '=', 'tbl_brands.id')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('tbl_brands.id', 'tbl_brands.name')
                            ->where('tbl_brands.deleted','No')
                            ->where('products.category_id',$request->id)
                            ->orderBy('tbl_brands.id', 'DESC')
                            ->distinct()
                            ->get();
            }else{
                $brands = DB::table('tbl_brands')
                            ->join('products', 'products.tbl_brands', '=', 'tbl_brands.id')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('tbl_brands.id', 'tbl_brands.name')
                            ->where('tbl_brands.deleted','No')
                            ->where('products.category_id',$request->id)
                            ->where('products.current_stock','>',0)
                            ->orderBy('tbl_brands.id', 'DESC')
                            ->distinct()
                            ->get();
            }
        }else{
            if($request->type == "purchase"){
                $brands = Brand::where('deleted','No')->orderBy('id', 'DESC')->get();
            }else{
                $brands = Brand::where('deleted','No')->where('products.current_stock','>',0)->orderBy('id', 'DESC')->get();
            }

        }
        return $brands;
    }
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'brandName' => 'required|max:255|unique:tbl_brands,brandName|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u'
          ]);

        if($request->hasFile('brand_logo')){
            
            $request->validate([
                'brand_logo'=> 'mimes:jpeg,jpg,png,gif|max:1000',
              ]);
			$brandImage = $request->file('brand_logo');
            $name = $brandImage->getClientOriginalName();
            $uploadPath = 'brandLogo/';
            $imageUrl = $uploadPath.$name;
            $imageName = time().$name;
            $brandImage->move($uploadPath, $imageName);
        }else{
            $imageName = "no_image.png";
        }

        $brand = new Brand();
        $brand->brandName = $request->brandName;
        $brand->brand_logo = $imageName;
        $brand->createdBy = auth()->user()->id;
        $brand->createdDate = date('Y-m-d H:i:s');
        $brand->deleted = 'No';
        $brand->save();
        return response()->json(['success'=>'Brand saved successfully']);
    }

    public function edit(Request $request){
		$brand = Brand::find($request->id);
		return $brand;
    }
    
    public function update(Request $request)
      {
        $brand =Brand::find($request->id);
        if($request->hasFile('brand_image')){
            $request->validate([
                'brand_image'=> 'mimes:jpeg,jpg,png,gif,webp',
              ]);
            $brandImage = $request->file('brand_image');
            $name = $brandImage->getClientOriginalName();
            $uploadPath = 'ecomas/images/brand/';
            $imageUrl = $uploadPath.$name;
            $imageName = time().$name;
            $brandImage->move($uploadPath, $imageName);
            $brand->brand_image = $imageName;
        }
        if($request->hasFile('brand_logo')){
            $request->validate([
                'brand_logo'=> 'mimes:jpeg,jpg,png,gif,webp',
              ]);
            $brandLogo = $request->file('brand_logo');
            $name = $brandLogo->getClientOriginalName();
            $uploadPath = 'ecomas/images/brand/';
            $logoUrl = $uploadPath.$name;
            $logoName = time().$name;
            $brandLogo->move($uploadPath, $logoName);
            $brand->brand_logo = $logoName;
        }
		$brand->is_website = $request->is_website;
		$brand->is_top = $request->is_top;
		$brand->top_priority = $request->top_priority;
		$brand->lastUpdatedBy = auth()->user()->id;
		$brand->lastUpdatedDate = date('Y-m-d H:i:s');
		$brand->save();
		return response()->json(['success'=>'Brand updated successfully']);
    }

    public function delete(Request $request)
    {
        $brand =Brand::find($request->id);
        $brand->deleted ='Yes';
        $brand->brandName = $brand->brandName.'-Deleted-'.$request->id;
        $brand->deletedBy = auth()->user()->id;
        $brand->deletedDate = date('Y-m-d H:i:s');
        $brand->save();
        return response()->json(['success'=>'Brand deleted successfully']);
    }
}