<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\InReviewPublished;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeletedArticleController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }

    public function save(Request $request){
        dd($request);


        // validacion
        $validate = $this->validate($request, [
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
//            'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'image',

            'text' => 'required|string',
        ]);

        // recoger los datos
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $section = $request->input('section');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $state = $request->input('state');





        //asignar valores al objeto
        // $user = \Auth::user(); si no funciona del otro modo hay que poner la barra delante de Auth
        $user = Auth::user();
        $article = new Article();
        $article->author = $user->id;
        $article->edited_by = null;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'en revisión';

        // subir fichero

        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }

        $article->save();
        return redirect()->route('home')->with([
            'message' => 'El Artículo se ha enviado para revisión'
        ]);
    }
}
