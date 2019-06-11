<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    public function reviews(){
        return $this->hasMany('Review');
    }
}
