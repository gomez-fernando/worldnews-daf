<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Section;
use App\User;

class ArticleController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }

    public function create(){
//        $sections = Section::orderBy('id', 'desc');
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
//        dd($sections);

        return view('article.create', [
            'sections' => $sections
        ]);
    }

    public function save(Request $request){
//        dd($request);

        // validacion
        $validate = $this->validate($request, [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'section' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            // 'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'required|image',
            'text' => 'required|string',
        ]);


        // recoger los datos
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $section = $request->input('section');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $image_path = $request->file('image_path');
        $text = $request->input('text');


        //asignar valores al objeto
        // $user = \Auth::user(); si no funciona del otro modo hay que poner la barra delante de Auth
        $user = Auth::user();
        $article = new Article();
        $article->author = $user->id;
        $article->edited_by = null;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $subtitle;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'review';

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

    public function getArticleImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id){
        $publishedArticle = Article::find($id);
//        dd($publishedArticle);

        return view('article.detail', [
            'publishedArticle' => $publishedArticle
        ]);
    }

    public function delete($id){
        $user = \Auth::user();
        $article = Article::find($id);

        $comments = Comment::where('Article_id', $id)->get();
        $likes = Like::where('Article_id', $id)->get();
        $ratings = Rating::where('Article_id', $id)->get();

        if ($user  && $article && $article->user->id == $user->id){
            // eliminar comentarios
            if ($comments && count($comments) >= 1){
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            // eliminar likes
            if ($likes && count($likes) >= 1){
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            // eliminar ratings
            if ($ratings && count($ratings) >= 1){
                foreach ($ratings as $rating) {
                    $rating->delete();
                }
            }

            // eliminar ficheros de imagen del storage
            Storage::disk('images')->delete($article->image_path);

            // eliminar registro de Articlee en db
            $article->delete();
            $message = array('message' => 'El Articlee se ha borrado correctamente');

        } else{
            $message = array('message' => 'El Articlee NO se ha borrado');
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id){
        $user = \Auth::user();
        $article = Article::find($id);

        if ($user && $article && $article->user->id == $user->id){
            return view('image.edit', [
                'article' => $article
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request){

        // validacion
        $validate = $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            // 'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'required|image',
            'description' => 'required',
        ]);

        // recoger los datos
        $article_id = $request->input('Article_id');
        $category = $request->input('category_id');
        $name = $request->input('name');
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // conseguir objeto Article
        $user = Auth::user();
        $article = Article::find($article_id);
        $article->category_id = $category;
        $article->user_id = $user->id;
        $article->name = $name;
        $article->description = $description;

        ///////// debug ////////////////
        // echo ('  es igual a: ');
        // var_dump($image_id);
        // var_dump($description);
        // die();
        ///////// end debug /////////

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }

        // actualizar registro
        $article->update();
        return redirect()->route('Article.detail', ['id' => $article_id])
            ->with(['message' => 'Articlee actulizado con exito']);
    }
}



