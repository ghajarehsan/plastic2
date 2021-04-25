<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Veblog;

class Veblogcomment extends Model
{
    protected $table = 'veblogcomments';

    public function veblog()
    {

        return $this->belongsTo(Veblog::class);

    }
}
