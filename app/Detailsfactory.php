<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Param;

use App\Userfactorycomment;

class Detailsfactory extends Model
{

    protected $table = 'detailsfactorys';

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function params()
    {

        return $this->belongsToMany(Param::class)->withPivot('value');

    }

    public function userfactorycomment()
    {

        return $this->hasMany(Userfactorycomment::class);

    }


}
