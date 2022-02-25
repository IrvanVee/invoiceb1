<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    
    protected $fillable = ['product_name', 'vendor_id', 'price', 'stock','deskripsi'];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    public function detailquotation(){
        return $this->hasMany(DetailQuotation::class,'quotation_id');
    }
    public function detailinvoice(){
        return $this->hasMany(DetailInvoice::class,'quotation_id');
    }
}
