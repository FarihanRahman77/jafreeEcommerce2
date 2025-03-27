<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\PrintBookCategory;
use App\Models\SubCategory;

class Category extends Model
{
    //protected $fillable =['tbl_brand_id ','categoryName','categoryStatus','comments'];
    protected $table = 'tbl_category';

    public function printBookCategories()
    {
        return $this->hasMany(PrintBookCategory::class, 'tbl_category_id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class,'category_id');
    }


    public function product()
    {
        return $this->hasMany(product::class,'categoryId');
    }
}
