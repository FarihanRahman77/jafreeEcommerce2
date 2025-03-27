<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\PrintBookProduct;
use App\Models\ProductImage;

class product extends Model
{
    protected $table="tbl_products";

    protected $appends = ['brand_name', 'category_name'];

    public function printBookProduct()
    {
        return $this->hasOne(PrintBookProduct::class, 'tbl_product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'tbl_brandsId','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId','id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id','id');
    }

    

    public function getBrandNameAttribute()
    {
        return optional($this->brand)->brandName;
    }

    public function getCategoryNameAttribute()
    {
        return optional($this->category)->categoryName;
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'tbl_productsId');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'productId');
    }
}
