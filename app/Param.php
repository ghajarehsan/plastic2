<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

use App\Detailsfactory;

use App\Advert;

class Param extends Model
{

    protected $table = 'params';

    public function products()
    {

        return $this->belongsToMany(Product::class);

    }

    public function detailfactory()
    {

        return $this->belongsToMany(Detailsfactory::class)->withPivot('value');

    }

    public function advert()
    {

        return $this->belongsToMany(Advert::class);

    }

}
