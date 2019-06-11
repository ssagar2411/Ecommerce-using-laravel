<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\model\admin\Role;
use App\Notifications\CustomResetPasswordNotification;
class User extends Authenticatable
{
    use Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','role_id','active', 'activation_token'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activation_token'
    ];

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }

    public function checkIfUserRole($need_role){       
        return (strtolower($need_role)==strtolower($this->role->name))?true:false;
    }
    public function hasRole($types){
        if(is_array($types)){
            foreach ($types as $type) {
                if($this->checkIfUserRole($type)){
                    return true;
                }
            }
        }else{
            return $this->checkIfUserRole($types);
        }
        return false;
    }
    public function vendoruser(){
        return $this->hasOne('App\Model\VendorUser\VendorUser','user_id');
    }
    public function vendor(){
        return $this->hasOne('App\Model\Vendor\Vendor','user_id');
    }
    public function sendPasswordResetNotification($token){
        $this->notify(new CustomResetPasswordNotification($token));
    }
    public static function byEmail($email){
        return static::where('email', $email);
    }
    public function hasVerifiedEmail(){
        return $this->active;
    }
}
