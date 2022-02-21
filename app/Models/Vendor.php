<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendor";

    protected $guarded = ['id','vendor_name'];

    public function product(){
        return $this->hasOne(Product::class);
    }
    public function detailquotation(){
        return $this->hasMany(DetailQuotation::class);
    }
}