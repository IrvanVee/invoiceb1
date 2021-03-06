<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    protected $table = 'marketing';
    // ini hanya untuk mendeklarasikan tabel bahwa
    // tabel itu ada

    protected $fillable = ['marketing_name','address','instance'];

    public function quotation(){
        return $this->hasOne(Quotation::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
