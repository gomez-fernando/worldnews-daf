<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    //relacion
    public function articles(){
        return $this->hasMany('App\Article')->orderBy('id', 'desc');
    }

    // relacion ONE TO ONE
    public function user(){
        return $this->belongsTo('App\User', '');
    }

    // relacion ONE TO ONE
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
