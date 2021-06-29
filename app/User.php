<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property string secure_key
 * @property string user_temp
 * @property string mobile
 * @property string email
 * @property string activation_code
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'mobile', 'user_temp', 'newsletter', 'ip_registration_newsletter',
        'newsletter_date_add', 'verified_at', 'type', 'password', 'secure_key', 'website','updated_at',
        'last_passwd_gen', 'activation_code', 'active', 'sex_id', 'about_me', 'avatar', 'user_ip', 'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_code'
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }


    public function hasVerified()
    {
        return !is_null($this->verified_at);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public function userthreads()
    {
        return $this->hasMany(Userthread::class);
    }


    /**
     * value of $field is mobile or email!
     * @param $field
     * @return bool
     */
    public function operationVerified($field)
    {
        return $this->forceFill([
            $field => $this->user_temp,
            'verified_at' => $this->freshTimestamp(),
            'user_temp' => 'verified' . $this->id,
        ])->save();
    }

//    public function setUser_tempAttribute($value)
//    {
//        dd($value);
//    }

    public function setUserTempAttribute($value)
    {
        $regexMobile = '~^(\+?98|0|0098)9[0-9]{9}$~';
        if (preg_match($regexMobile, $value, $matche)) {    //  $value is mobile and not email
            $value = '0' . substr($value, -10, 10);
            $this->attributes['user_temp'] = $value;
        }
        $this->attributes['user_temp'] = $value;
    }
    public function loves(){
        return $this->hasMany('App\LoveList','user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role=null)
    {
        if ($role == null){
            return !! $this->roles->count();
        }
        if (is_string($role)){
            return $this->roles->contains('role',$role);
        }
        return !! $this->roles->intersect($role)->count();
    }
}