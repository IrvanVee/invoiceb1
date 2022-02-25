<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id','product_id','quantity','sum_product'];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
