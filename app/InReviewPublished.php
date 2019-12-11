<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InReviewPublished extends Model
{
    protected $table = 'in_review_published';

    // relacion ONE TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'author');
    }

    // relacion MANY TO ONE
    public function article(){
        return $this->belongsTo('App\Article', 'article_id');
    }

    // relacion ONE TO ONE
    public function editor(){
        return $this->belongsTo('App\User', 'edited_by');
    }
}
