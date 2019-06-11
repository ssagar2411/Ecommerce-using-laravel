<?php

namespace App\model\Vendor;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\User;
class Vendor extends Model
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
                'source' => 'name'
            ]
        ];
    }
    protected $fillable=[
        'name',
        'slug',
        'phone_number',
        'secondary_phone_number',
        'logo',
        'cover_img',
        'secondary_email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'description',
        'verified',
        'verified_time',
        'user_id',
        'featured',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
