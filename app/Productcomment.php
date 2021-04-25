<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Product;

class Productcomment extends Model
{

    protected $table = 'productcomments';

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function product()
    {

        return $this->belongsTo(Product::class);

    }

}
