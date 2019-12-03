<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\InReviewPublished;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InReviewPublishedController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function rePublishView($id){

        $article = inReviewPublished::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

        return view('editor.reviewPublishView', [
            'article' => $article,
            'sections' => $sections,
        ]);
    }
}
