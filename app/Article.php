<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    // relacion ONE TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'author');
    }

    // relacion ONE TO ONE
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
