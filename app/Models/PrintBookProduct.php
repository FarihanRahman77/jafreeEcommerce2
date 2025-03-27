<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\product;
use App\Models\PrintBookCategory;

class PrintBookProduct extends Model
{
    use HasFactory;
    protected $table = 'tbl_print_book_product';

    public function product()
    {
        return $this->belongsTo(product::class, 'tbl_product_id');
    }

    public function printBookCategory()
    {
        return $this->belongsTo(PrintBookCategory::class, 'tbl_print_book_category_id');
    }
}
