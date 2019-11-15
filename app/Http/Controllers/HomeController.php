<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $publishedArticles = Article::all(); asi tambien funcionaria pero sin ordenarlos
        $publishedArticles = Article::orderBy('id', 'desc')->paginate(5);
//        $sections = Section::orderBy('id', 'desc');

        return view('home', [
            'publishedArticles' => $publishedArticles,
//            'section' => $sections
        ]);
    }

//    public function home() {
//        $publishedArticles = Article::orderBy('id', 'desc')->paginate(5);
//
//        return view('home', [
//            'publishedArticles' => $publishedArticles
//        ]);
//    }
}
