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
use App\InReviewPublished;
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
//            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'image_path' => 'required|mimes:jpg,jpeg,png,gif',
//            'image_path' => 'image',
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
        $article->state = $state;
        // subir fichero

        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }
//        dd($article);

        $article->save();

//        return json_encode([
//            'status' => '1'
//        ]);
        if ($state == 'en revisión'){
            if ($user->usertype == 'journalist'){
                return redirect()->route('journalist.controlPanelView')->with([
                    'message' => 'El artículo se ha enviado a revisión. Será publicado cuando el editor lo apruebe'
                ]);
            } else{
                return redirect()->route('admin.controlPanelView')->with([
                    'message' => 'El artículo se ha enviado a revisión. Será publicado cuando el editor lo apruebe'
                ]);
            }

        }else {
            if ($user->usertype == 'journalist'){
                return redirect()->route('journalist.controlPanelView')->with([
                    'message' => 'El artículo se ha guardado correctamente.'
                ]);
            } else{
                return redirect()->route('admin.controlPanelView')->with([
                    'message' => 'El artículo se ha guardado correctamente.'
                ]);
            }
        }
    }

    public function publishView($id){
//        $sections = Section::orderBy('id', 'desc');
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
        $article = Article::find($id);
//        dd($sections);

        return view('editor.publishView', [
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

        $inReviewArticles = Article::orderBy('id', 'asc')
            ->where('author', Auth::user()->id)
            ->where('state', 'en revisión')
            ->get();
//        dd($commentedArticles);

        return view('journalist.controlPanelView', [
//            'sections' => $sections,
            'inProcessArticles' => $inProcessArticles,
            'inReviewArticles' => $inReviewArticles,
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

    public function editPublishedView($id){
        $user = \Auth::user();
        $article = Article::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

//        if (($user && $user->usertype != 'journalist')  || ($user && $user->id == $article->author)){
//                    dd($sections);

            return view('article.editPublishedView', [
                'article' => $article,
                'sections' => $sections
            ]);
//        }else{
//            return redirect()->route('home');
//        }
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

        if ($state != 'publicado'){
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
            $article->state = $state;

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
                ->with(['message' => 'Artículo enviado a revisión']);
        } else {
            //        asignamos valores al artículo que se guardará en `in_review_published`
            $publicadoYEnRevision = new inReviewPublished();
            $publicadoYEnRevision->article_id = $id;
            $publicadoYEnRevision->edited_by = $user->id;
            $publicadoYEnRevision->section_id = $section;
            $publicadoYEnRevision->title = $title;
            $publicadoYEnRevision->sub_title = $sub_title;
//            $publicadoYEnRevision->image_path = $image_path;
            $publicadoYEnRevision->text = $originalArticle->text;
            $publicadoYEnRevision->keywords = $originalArticle->keywords;
            $publicadoYEnRevision->slug = $originalArticle->slug;
            $publicadoYEnRevision->state = $originalArticle->state;

            if ($image_path){
                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('images')->put($image_path_name, File::get($image_path));
                $publicadoYEnRevision->image_path = $image_path_name;
            } else {
                $image_path = $originalArticle->image_path;
            }

//        dd($publicadoYEnRevision);

            //        guardamos el $publicadoYEnRevision
            $publicadoYEnRevision->save();
//        die();
//
//            // actualizar objeto Article
//            $article = Article::find($id);
//            $article->author = $author;
//            $article->edited_by = $user->id;
//            $article->section_id = $section;
//            $article->title = $title;
//            $article->sub_title = $sub_title;
//            $article->text = $text;
//            $article->keywords = $keywords;
//            $article->slug = $slug;
//            $article->state = 'en revisión';
//            $article->editor_comments = $originalArticle->editor_comments;
////        $article->published_at = $originalArticle->published_at;
//
//            // subir fichero
//            if ($image_path){
//                $image_path_name = time().$image_path->getClientOriginalName();
//                Storage::disk('images')->put($image_path_name, File::get($image_path));
//                $article->image_path = $image_path_name;
//            } else{
//                $article->image_path = $originalArticle->image_path;
//            }
//
////        dd($article);
//
//            // actualizar registro
//            $article->update();
            return redirect()->route('article.detail', ['id' => $id])
                ->with(['message' => 'La versión enviada está en revisión. La versión original sigue publicada sin cambios hasta que los apruebe el editor.']);
        }




    }

    public function editInProcessInReviewView($id){
        $user = \Auth::user();
        $article = Article::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

//        if (($user && $user->usertype != 'journalist')  || ($user && $user->id == $article->author)){
//                    dd($sections);

        return view('article.editInProcessInReviewView', [
            'article' => $article,
            'sections' => $sections
        ]);
//        }else{
//            return redirect()->route('home');
//        }
    }

    public function editInProcessInReview(Request $request){
                        dd($request);

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
    }

    public function editorControlPanelView(){
        $inReviewArticles = Article::orderBy('id', 'asc')
            ->where('state', 'en revisión')
            ->get();

        $inReviewPublishedArticles = InReviewPublished::orderBy('id')->get();

        return view('editor.controlPanelView', [
            'inReviewArticles' => $inReviewArticles,
            'inReviewPublishedArticles' => $inReviewPublishedArticles,
        ]);
    }

    public function adminControlPanelView(){
        $inReviewArticles = Article::orderBy('id', 'asc')
            ->where('state', 'en revisión')
            ->get();
        $deletedArticles = Article::orderBy('id')
            ->where('state', 'inactivo')
            ->get();

        $inReviewPublishedArticles = InReviewPublished::orderBy('id')->get();

        return view('admin.controlPanelView', [
            'inReviewArticles' => $inReviewArticles,
            'deletedArticles' => $deletedArticles,
            'inReviewPublishedArticles' => $inReviewPublishedArticles,
        ]);
    }

    public function publish(Request $request){

//                dd($request);

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
//            'author' => 'required|string|max:255',
            'editedBy' => 'string|max:255',
            'section' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'created_at' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'editorComments' => 'required|string|max:2000',
        ]);

//        dd($request);



        // recoger los datos
        $id = $request->input('id');

        //encontrar usuario actual el articulo
        $user = Auth::user();
        $article = Article::find($id);
        //----------------
        $author = $article->author;
        $editedBy = $request->input('editedBy');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $editorComments = $request->input('editorComments');

//        dd($title);
        // actualizar el articulo
        $article->edited_by = $editedBy;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'publicado';
        $article->editor_comments = $editorComments;
        $article->published_at = date("Y-m-d H:i:s");

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }

//        dd($article);

        // actualizar registro
        $article->update();


    }

    public function authorizeRePublications(){
        $articles = inReviewPublished::orderBy('id', 'asc')
            ->get();

        return view('editor.authorizeRePublications', [
            'articles' => $articles,
        ]);
    }

    public function rePublish(Request $request){

//                dd($request);

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
            'articleId' => 'required|string|max:255',
            'editedBy' => 'required|string|max:255',
            'section' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
//            'editorComments' => 'string|max:2000',
//            'state' => 'required|string|max:255',
        ]);

//        dd($request);

        // recoger los datos
        $id = $request->input('id');
        $articleId = $request->input('articleId');
        $editedBy = $request->input('editedBy');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        $editorComments = $request->input('slug');
//        $state = $request->input('publicado');

//        dd($title);
        $user = Auth::user();
        $originalArticle = Article::find($articleId);
        $newArticle = InReviewPublished::find($id);

//        dd($originalArticle);

        // actualizar objeto Articulo original
        $originalArticle->edited_by = $editedBy;
        $originalArticle->section_id = $section;
        $originalArticle->title = $title;
        $originalArticle->sub_title = $sub_title;
        $originalArticle->text = $text;
        $originalArticle->keywords = $keywords;
        $originalArticle->slug = $slug;
//        $originalArticle->state = 'publicado';
        $originalArticle->editor_comments = $editorComments;
//        $article->published_at = $originalArticle->published_at;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $originalArticle->image_path = $image_path_name;
        }
        else{
            $originalArticle->image_path = $newArticle->image_path;
        }

//        dd($originalArticle);

        // actualizar el articulo original
        $originalArticle->update();

        // eliminar l aversión provisional ya revisada
        $newArticle->delete();

        return redirect()->route('article.detail', ['id' => $originalArticle->id])
            ->with(['message' => 'Artículo republicado con éxito']);
    }

    public function publicadoARevisionRepublicar(Request $request){
//                        dd($request);

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
        $articleId = $request->input('id');
        $author = $request->input('author');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
//        $state = $request->input('publicado');

        $user = Auth::user();
        $originalArticle = Article::find($articleId);

        // creamos el nuevo artículo en in_review_published
        $article = new InReviewPublished();
        $article->article_id = $articleId;
        $article->edited_by = Auth::user()->id;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = 'publicado';

//        dd($article);

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        } else{
            $article->image_path = $originalArticle->image_path;
        }

//        dd($article);

        $article->save();

        if (Auth::user()->role == 'journalist'){
            return redirect()->route('journalist.controlPanelView')
                ->with(['message' => 'Artículo registrado con éxito']);
        } elseif(Auth::user()->role == 'admin'){
            return redirect()->route('admin.controlPanelView')
                ->with(['message' => 'Artículo registrado con éxito']);
        } else{
            return redirect()->route('editor.controlPanelView')
                ->with(['message' => 'Artículo registrado con éxito']);
        }
    }

    public function tagsSearchResult($search = null) {
       if (!empty($search)){
           $articles = Article::where('keywords', 'LIKE', '%'.$search.'%')
               ->where('state', 'publicado')
               ->orderBy('id', 'desc')
               ->paginate(6);
//           dd($articles);
           return view('article.tagsSearchResult', [
               'articles' => $articles,
               'search' => $search
           ]);
       }else{
           return redirect()->route('home')->with([
               'message' => 'Ningún artículo coincide con la búsqueda'
           ]);
       }
    }


}



