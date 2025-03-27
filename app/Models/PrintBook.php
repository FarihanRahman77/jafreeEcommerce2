<?php

namespace App\Models;

use App\product;
use App\Models\PrintBookCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintBook extends Model
{
    use HasFactory;
    protected $table='tbl_printbook';

    public function printBookCategories()
    {
        return $this->hasMany(PrintBookCategory::class, 'tbl_printbook_id');
    }
}
