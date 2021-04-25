<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Param;

class Advert extends Model
{

    protected $table = 'adverts';


    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function param()
    {

        return $this->belongsToMany(Param::class)->withPivot('value');

    }

    public function advertcomment()
    {

        return $this->hasMany(Advertcomment::class);

    }

}
