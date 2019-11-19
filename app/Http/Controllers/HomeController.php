<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Section;

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
     * @param $section_id
     * @return \Illuminate\Http\Response
     */
    public function index($section_id = null)
    {
//        se muestran los artículos por section si está definida en el get
        if(!empty($section_id)){
            // $publishedArticles = Article::all(); asi tambien funcionaria pero sin ordenarlos
            $publishedArticles = Article::orderBy('id', 'desc')
                ->where('state', 'publicado')
                ->where('section_id', $section_id)
                ->paginate(5);
            $sections = Section::orderBy('id')->get();
        } else {
            // $publishedArticles = Article::all(); asi tambien funcionaria pero sin ordenarlos
            $publishedArticles = Article::orderBy('id', 'desc')
                ->where('state', 'publicado')
//                ->where('section_id', $section_id)
                ->paginate(5);
            $sections = Section::orderBy('id')->get();
        }


        return view('home', [
            'publishedArticles' => $publishedArticles,
            'sections' => $sections
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
