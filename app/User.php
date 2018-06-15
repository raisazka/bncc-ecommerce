<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notification\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id','dob','email', 'password', 'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wishlist(){
        return $this->hasMany('App\Wishlist');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function getId()
    {
        return $this->id;
    }

}
