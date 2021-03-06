<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
