<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [

        'category_name',
        'slug',
        'status'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
