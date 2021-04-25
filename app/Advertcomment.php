<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Advert;

class Advertcomment extends Model
{

    protected $table = 'advertcomments';

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function advert()
    {

        return $this->belongsTo(Advert::class);

    }

}
