<?php

namespace App\Models;
use App\Models\Category;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[

        'name',


    ];
        public function category(){
            return $this->belongsToMany('App\Models\Category' , 'product_category');
        }
        public function images()
        {
            return $this->hasMany('App\Models\Image', 'product_id');
        }

}
