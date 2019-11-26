<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\DeletedArticle;
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

    public function store(Request $request){
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

    public function reviewPublishArticleView($id){
//        $sections = Section::orderBy('id', 'desc');
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
        $article = Article::find($id);
//        dd($sections);

        return view('editor.reviewPublishArticle', [
            'sections' => $sections,
            'article' => $article
        ]);
    }

    public function controlPanelJournalistView(){
//        $sections = Section::orderBy('id', 'desc');
//        $sections = DB::table('sections')
//            ->orderBy('id')
//            ->get();
        $inProcessArticles = Article::orderBy('id', 'asc')
                            ->where('author', Auth::user()->id)
                            ->where('state', 'en proceso')
                            ->get();

        $commentedArticles = Article::orderBy('id', 'asc')
            ->where('author', Auth::user()->id)
            ->where('state', 'en revisión')
            ->where('editor_comments', '!=', null)
            ->get();
//        dd($commentedArticles);

        return view('journalist.controlPanelView', [
//            'sections' => $sections,
            'inProcessArticles' => $inProcessArticles,
            'commentedArticles' => $commentedArticles
        ]);
    }

    public function publishArticle(Request $request){
//        dd($request);

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'section' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            // 'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'required|image',
            'text' => 'required|string',
            'editor_comments' => 'string'
        ]);


        // recoger los datos
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $section = $request->input('section');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $editorComments = $request->input('editor_comments');

//        recoger el objeto original
        $originalArticle = Article::find($id);


        //asignar valores al objeto
        // $user = \Auth::user(); si no funciona del otro modo hay que poner la barra delante de Auth
        $user = Auth::user();
        $article = Article::find($id);
        $article->author = $user->id;
        $article->edited_by = null;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'en revisión';
        $article->editor_comments = $editorComments;

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
        $last6articles = Article::orderBy('id', 'desc')
                        ->where('section_id', $publishedArticle->section_id)
                        ->limit(6)
                        ->get();
//        dd($last6articles);
//        dd($publishedArticle);

        return view('article.detail', [
            'publishedArticle' => $publishedArticle,
            'last6articles' => $last6articles
        ]);
    }

    public function delete($id){
        $user = \Auth::user();
        $article = Article::find($id);

        $article->edited_by = $user->id;
        $article->state = 'inactivo';

        if ($user  && $user->usertype == 'admin'){


            // cambiar 'state' en el artículo
            $article->update();
            $message = array('message' => 'El artículo se ha eliminado correctamente');

        } else{
            $message = array('message' => 'El artículo NO se ha eliminado');
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id){
        $user = \Auth::user();
        $article = Article::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

        if (($user && $user->usertype != 'journalist')  || ($user && $user->id == $article->author)){
//                    dd($sections);

            return view('article.edit', [
                'article' => $article,
                'sections' => $sections
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request){

//                dd($request);

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'section' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);

        // recoger los datos
        $id = $request->input('id');
        $author = $request->input('author');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $state = $request->input('state');

//        dd($title);
        $user = Auth::user();

//        obtenemos el articulo antiguo
        $originalArticle = Article::find($id);


//        asignamos valores al artículo que se guardará en `deleted_articles`
        $deletedArticle = new DeletedArticle();
        $deletedArticle->article_id = $originalArticle->id;
        $deletedArticle->edited_by = $user->id;
        $deletedArticle->section_id = $originalArticle->section_id;
        $deletedArticle->title = $originalArticle->title;
        $deletedArticle->sub_title = $originalArticle->sub_title;
        $deletedArticle->image_path = $originalArticle->image_path;
        $deletedArticle->text = $originalArticle->text;
        $deletedArticle->keywords = $originalArticle->keywords;
        $deletedArticle->slug = $originalArticle->slug;
        $deletedArticle->state = $originalArticle->state;

//        dd($deletedArticle);

        //        guardamos el $deletedArticle
        $deletedArticle->save();
//        die();

        // actualizar objeto Article
        $article = Article::find($id);
        $article->author = $author;
        $article->edited_by = $user->id;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        if($state == 'publicado'){
            $article->state = 'en revisión';
        } else{
            $article->state = $state;
        }
        $article->editor_comments = $originalArticle->editor_comments;
//        $article->published_at = $originalArticle->published_at;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        } else{
            $article->image_path = $originalArticle->image_path;
        }

//        dd($article);

        // actualizar registro
        $article->update();
        return redirect()->route('article.detail', ['id' => $id])
            ->with(['message' => 'Artículo actualizado con éxito']);
    }

    public function authorizePublications(){
        $articles = Article::orderBy('id', 'asc')
            ->where('state', 'en revisión')
            ->get();

        return view('editor.authorizePublications', [
            'articles' => $articles,
        ]);
    }

    public function approvePublications(Request $request){

//                dd($request);

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'section' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
//            'state' => 'required|string|max:255',
        ]);

        // recoger los datos
        $id = $request->input('id');
        $author = $request->input('author');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $state = $request->input('publicado');

//        dd($title);
        $user = Auth::user();
        $originalArticle = Article::find($id);

        // actualizar objeto Article
        $article = Article::find($id);
        $article->author = $author;
        $article->edited_by = $user->id;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'publicado';
        $article->editor_comments = $article->editor_comments;
//        $article->published_at = $originalArticle->published_at;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        } else{
            $article->image_path = $originalArticle->image_path;
        }

//        dd($article);

        // actualizar registro
        $article->update();
        return redirect()->route('article.detail', ['id' => $id])
            ->with(['message' => 'Artículo publicado con éxito']);
    }
}



