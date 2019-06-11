<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $primaryKey = 'attribute_id';
    //
    public function attribute_group(){
        return $this->belongsTo('App\model\admin\Attribute_group');
    }
}
