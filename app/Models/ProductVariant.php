<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory;
    
    protected $fillable = ['product_id', 'name', 'value', 'additional_price', 'stock'];
    public function product() { return $this->belongsTo(Product::class); }

}
