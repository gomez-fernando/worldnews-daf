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
    public function section(){
        return $this->belongsTo('App\Section', 'section_id');
    }

    //relacion ONE TO MANY
    public function deleted_Article() {
        return $this->hasMany('App\DeletedArticle');
    }
}
