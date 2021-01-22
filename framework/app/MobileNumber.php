<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileNumber extends Model
{
    use SoftDeletes;

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
