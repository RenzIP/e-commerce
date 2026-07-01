<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['shop_id', 'category_id', 'name', 'slug', 'description', 'price', 'stock', 'is_active'];
    public function shop() { return $this->belongsTo(Shop::class); }
    public function category() { return $this->belongsTo(Category::class); }
    public function images() { return $this->hasMany(ProductImage::class); }
    public function variants() { return $this->hasMany(ProductVariant::class); }
    public function reviews() { return $this->hasMany(Review::class); }

}
