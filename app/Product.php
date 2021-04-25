<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

use App\User;

use App\Imageproduct;

use App\Productcomment;

use App\Param;

use App\Detailsfactory;

class Product extends Model
{


    protected $table = 'products';

    public function category()
    {

        return $this->belongsTo(Category::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function imageproduct()
    {

        return $this->hasOne(Imageproduct::class);

    }

    public function productcomment()
    {

        return $this->hasMany(Productcomment::class);

    }

    public function params()
    {

        return $this->belongsToMany(Param::class)->withPivot('value');

    }

    public function userinfo()
    {

        return $this->belongsTo(Detailsfactory::class,'user_id','user_id');

    }


}
