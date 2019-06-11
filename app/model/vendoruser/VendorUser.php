<?php

namespace App\model\VendorUser;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\User;
class VendorUser extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fname'
            ]
        ];
    }
    protected $fillable=[
        'fname',
        'lname',
        'slug',
        'mobile_number',        
        'profile_img',
        'cover_img',
        'secondary_email',
        'gender',
        'dob',
        'province',
        'city',
        'user_id',
        'postalcode',
        'address',
        'billingaddress'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
