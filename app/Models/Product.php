<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product';
    public $guarded = [];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategoryTest::class, 'product_category_id');
    }

}
