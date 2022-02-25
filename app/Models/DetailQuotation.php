<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailQuotation extends Model
{
    use HasFactory;

    protected $table = 'detail_quotations';

    protected $fillable = ['quotation_id','vendor_id','product_id','quantity','sum_product'];

    public function quotation(){
        return $this->belongsTo(Quotation::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
