<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }

    public function index($id){
        $publishedArticles = DB::table('articles')
            ->where('state', 'publicado')
            ->where('category_id', $id)
            ->orderBy('id')
            ->get();

        return view('article.create', [
            'publishedArticles' => $publishedArticles
        ]);
    }
}
