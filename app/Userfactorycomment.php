<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Detailsfactory;

class Userfactorycomment extends Model
{

    protected $table = 'userfactorycomments';


    public function detailfactorycomment()
    {

        return $this->belongsTo(Detailsfactory::class);

    }

}
