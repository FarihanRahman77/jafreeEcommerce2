<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrintBook;
use App\Brand;
use App\Category;

class PrintBookCategory extends Model
{
    use HasFactory;
    protected $table='tbl_printbook_category';

    public function printBook()
    {
        return $this->belongsTo(PrintBook::class, 'tbl_printbook_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'tbl_brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'tbl_category_id');
    }

   
    
}
