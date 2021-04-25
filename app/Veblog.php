<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Veblogcomment;

class Veblog extends Model
{

    protected $table = 'veblogs';


    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function veblogcomment()
    {

        return $this->hasMany(Veblogcomment::class);

    }


}
