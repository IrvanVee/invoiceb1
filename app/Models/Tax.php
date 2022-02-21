<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'tax';

    protected $fillable = ['name','tax_value'];
    
    public function quotation(){
        return $this->hasOne(Quotation::class);
    }
}
