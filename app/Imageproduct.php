<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Imageproduct extends Model
{

    protected $table = 'imageproducts';

    public function product()
    {

        return $this->belongsTo(Product::class);

    }


}
