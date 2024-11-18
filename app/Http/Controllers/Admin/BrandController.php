<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
   

    public function index()
    {
        $brands = Brand::where('deleted','No')->orderBy('id', 'DESC')->get();
        return view('admin.home.brand.index',['brands'=>$brands]);
    }
    public function getBrands(){
		$data = "";
		$brands = Brand::where('deleted','No')->orderBy('id', 'DESC')->get();
		$output = array('data' => array());
		$i=1;
		foreach ($brands as $brand) {
            $status = "";
            if($brand->status == 'Active'){
                $status = '<center><i class="fas fa-check-circle" style="color:green; font-size:16px;" title="'.$brand->status.'"></i></center>';
            }else{
                $status = '<center><i class="fas fa-times-circle" style="color:red; font-size:16px;" title="'.$brand->status.'"></i></center>';
            }
            $imageUrl = url('brandLogo/'.$brand->brand_logo);
            $button = '<td style="width: 12%;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                <li class="action" onclick="editBrand('.$brand->id.')"  ><a  class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                </li>
                            </li> 
                                <li class="action"><a   class="btn"  onclick="confirmDelete('.$brand->id.')" ><i class="fas fa-trash-alt"></i> Delete </a></li>
                                </li>
                                </ul>
                            </div>
                        </td>';
			$output['data'][] = array(
				$i++. '<input type="hidden" name="id" id="id" value="'.$brand->id.'" />',
				$brand->brandName,
				'<img style="width:40px;" src="'.$imageUrl.'" alt="'.$brand->brandName.'" />',
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
            
            // $request->validate([
            //     'brand_logo'   =>  'brand_logo|max:2048'
            // ]);
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
        $request->validate([
            'brandName' => 'required|max:255|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u|unique:tbl_brands,brandName,'.$request->id
        ]);
        $brand =Brand::find($request->id);
        $brand->brandName = $request->brandName;

        if ($request->removeImage == "1"){
			$brand->image = "no_image.png";
		}
        else if($request->hasFile('image')){
            $request->validate([
                'image'   =>  'image|max:2048'
            ]);
            $brandImage = $request->file('image');
            $name = $brandImage->getClientOriginalName();
            $uploadPath = 'brandLogo/';
            $imageUrl = $uploadPath.$name;
            $imageName = time().$name;
            $brandImage->move($uploadPath, $imageName);
            $brand->brand_logo = $imageName;
        }

		$brand->status = $request->status;
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