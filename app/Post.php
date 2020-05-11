<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
      protected $fillable = [
         'title',
         'content',
      ];
    function category(){
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'category_id');
    }
}
