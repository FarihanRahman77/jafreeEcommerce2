<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table='tbl_productspecification';

    protected $fillable = ['tbl_productsId', 'specification', 'deleted'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'tbl_productsId');
    }

}
