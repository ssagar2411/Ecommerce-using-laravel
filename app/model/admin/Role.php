<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $fillable=['name','description'];


    public function users(){
      $this->hasMany(User::class);
    }
}
