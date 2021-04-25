<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Imageuser extends Model
{

    protected $table = 'imageusers';

    public function user()
    {

        return $this->belongsTo(User::class);

    }

}
