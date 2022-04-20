<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    protected $table = "customer";

    protected $fillable = ['instance','customer_name','contact','address'];

    public function quotation(){
        return $this->hasOne(Quotation::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
