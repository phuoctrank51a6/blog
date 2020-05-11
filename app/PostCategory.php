<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';
    protected $fillable = [
        'post_id', 
        'category_id', 
        'hot'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
