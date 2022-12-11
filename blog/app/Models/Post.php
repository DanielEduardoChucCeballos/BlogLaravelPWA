<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'perex',
        'published_at',
        'enabled',
        'user_id',
        'category_id',

    ];


    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }

    public function users(){ //$libro->categoria->nombre
        return $this->belongsTo(User::class); //Pertenece a una categoría.
    }
}
