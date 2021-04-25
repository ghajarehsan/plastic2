<?php

namespace App;

use Faker\Provider\Image;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Mail;

use App\Mail\sendmailverify;

use App\Detailsfactory;

use App\Product;

use App\Advert;

use App\Imageuser;

use App\Veblog;

use App\Productcomment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {

        return $this->hasMany(Product::class);

    }

    public function advert()
    {

        return $this->hasMany(Advert::class);

    }

    public function detailfactory()
    {

        return $this->hasOne(Detailsfactory::class)->with('params');

    }

    public function imageuser()
    {

        return $this->hasOne(Imageuser::class);

    }

    public function veblog()
    {

        return $this->hasMany(Veblog::class);

    }

    public function productcomment()
    {

        return $this->hasMany(Productcomment::class);

    }



}
