<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'name', 'slug', 'description'];
    public function user() { return $this->belongsTo(User::class); }
    public function products() { return $this->hasMany(Product::class); }
    public function orderItems() { return $this->hasMany(OrderItem::class); }

}
