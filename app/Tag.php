<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    protected $fillable = ['title'];
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts(){
//Много ко многим
        return $this->belongToMany(
            Post::class,
            'post_tags',
            'tag_id',
            'post_id'
        );
    }

}
