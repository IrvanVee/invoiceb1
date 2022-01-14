<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    
    protected $fillable = ['product_name', 'vendor', 'price', 'stock','deskripsi'];
}
