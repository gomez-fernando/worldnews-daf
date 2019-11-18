<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedArticle extends Model
{
    protected $table = 'deleted_articles';

    // relacion MANY TO ONE
    public function article(){
        return $this->belongsTo('App\Article', 'article_id');
    }

    // relacion ONE TO ONE
    public function editor(){
        return $this->belongsTo('App\User', 'edited_by');
    }
}
