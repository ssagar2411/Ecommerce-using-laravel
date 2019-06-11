<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function user(){
        return $this->belongsTo('User');
    }

    public function product(){
        return $this->belongsTo('model\admin\Product');
    }
}
