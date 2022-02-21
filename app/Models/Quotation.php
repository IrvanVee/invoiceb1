<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    // memberitahu nama tabel 
    protected $table = 'quotation';

    // untuk memberitahu tabel yang ditambahkan
    protected $fillable = ['id','marketing_id','customer_id','refrensi','duedate','discount_id','tax_id','pengiriman','total','note'];

    public function marketing(){
        return $this->belongsTo(Marketing::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    // public function product(){
    //     return $this->belongsTo(Product::class);
    // }
    public function tax(){
        return $this->belongsTo(Tax::class);
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function detailquotation(){
        return $this->hasMany(DetailQuotation::class,'quotation_id');
    }
}
