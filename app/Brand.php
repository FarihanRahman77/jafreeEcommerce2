<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\PrintBookCategory;

class Brand extends Model
{
    //protected $fillable =['tbl_brand_id ','categoryName','categoryStatus','comments'];
    protected $table ='tbl_brands';

    protected $fillable = ['brandName', 'brand_logo'];

    public function printBookCategories()
    {
        return $this->hasMany(PrintBookCategory::class, 'tbl_brand_id');
    }
}
