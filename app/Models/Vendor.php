<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendor";

    protected $fillable = ['vendor_name'];

    public function product(){
        return $this->hasOne(Product::class);
    }
    public function detailquotation(){
        return $this->hasMany(DetailQuotation::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
