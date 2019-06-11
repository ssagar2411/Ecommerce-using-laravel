<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_name',
        'cat_description',
        'cat_image',
    ];
    protected $guarded = [];
    use NodeTrait;

   
}
