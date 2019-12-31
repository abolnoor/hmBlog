<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'user_id'
    ];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public function path()
    {
        return route('articles.show', $this->slug);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
