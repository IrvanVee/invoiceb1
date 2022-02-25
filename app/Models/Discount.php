<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';

    protected $fillable = ['name', 'nilai_discount'];

    public function quotation(){
        return $this->hasOne(Quotation::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
