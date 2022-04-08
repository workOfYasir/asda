<?php

namespace App\Models;
use App\Models\Category;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
  
        'name',
        'category_id',
        'unit',
        'unit_name',
        'unit_price',
        'quantity'
        
    ];
        public function category(){
            return $this->belongsTo('App\Models\Category');
        }
   
}
