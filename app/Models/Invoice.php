<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    // protected $guarded = ['id'];
    protected $fillable = ['id','vendor_id','customer_id','refrensi','duedate','discount_id','tax_id','pengiriman','ttd','total','status','note'];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function detailinvoice(){
        return $this->hasMany(DetailInvoice::class,'invoice_id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function tax(){
        return $this->belongsTo(Tax::class);
    }
}
