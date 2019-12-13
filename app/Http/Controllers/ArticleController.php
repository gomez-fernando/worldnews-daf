<?php

namespace App\Http\Controllers;

use Exception;
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
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function create(){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

        return view('article.create', [
            'sections' => $sections
        ]);
    }

    public function store(Request $request){
        if(!\Auth::check()){
            return redirect()->route('home');
        }

        // validacion
        $validate = $this->validate($request, [
//            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255|unique:articles,title,',
            'sub_title' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'submitState' => 'required|string|max:255',
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
        if($request->input('submitState') == 'Guardar y salir'){
            $state = 'en proceso';
        } else{
            $state = 'en revisión';
        }

        //asignar valores al objeto
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
        if(!\Auth::check()){
            return redirect()->route('home');
        }
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
        $article = Article::find($id);

        return view('editor.publishView', [
            'sections' => $sections,
            'article' => $article
        ]);
    }

    public function controlPanelJournalistView(){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
//        $sections = Section::orderBy('id', 'desc');
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
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
            ->where('editor_comments', null)
            ->get();

        $inReviewPublishedArticles = InReviewPublished::orderBy('id', 'asc')
            ->where('author', Auth::user()->id)
//            ->where('state', 'publicado')
            ->get();
//        dd($inReviewPublishedArticles);

        return view('journalist.controlPanelView', [
            'sections' => $sections,
            'inProcessArticles' => $inProcessArticles,
            'inReviewArticles' => $inReviewArticles,
            'commentedArticles' => $commentedArticles,
            'inReviewPublishedArticles' => $inReviewPublishedArticles
        ]);
    }


    public function getArticleImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id){
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();
        $publishedArticle = Article::find($id);
        $last6articles = Article::orderBy('id', 'desc')
                        ->where('section_id', $publishedArticle->section_id)
                        ->limit(6)
                        ->get();

        return view('article.detail', [
            'sections' => $sections,
            'publishedArticle' => $publishedArticle,
            'last6articles' => $last6articles
        ]);
    }

    public function delete($id){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
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
        if(!\Auth::check()){
            return redirect()->route('home');
        }
        $user = \Auth::user();
        $article = Article::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

            return view('article.editPublishedView', [
                'article' => $article,
                'sections' => $sections
            ]);
    }

//    public function update(Request $request){
//        if(!\Auth::check()){
//            return redirect()->route('home');
//        }
//
//        // validacion
//        $validate = $this->validate($request, [
//            'id' => 'required|string|max:255',
//            'author' => 'required|string|max:255',
//            'section' => 'required|string',
//            'title' => 'required|string|max:255',
//            'sub_title' => 'required|string|max:255',
//            'image_path' => 'image',
//            'text' => 'required|string',
//            'keywords' => 'required|string|max:255',
//            'slug' => 'required|string|max:255',
//            'state' => 'required|string|max:255',
//        ]);
//
//        // recoger los datos
//        $id = $request->input('id');
//        $author = $request->input('author');
//        $section = $request->input('section');
//        $title = $request->input('title');
//        $sub_title = $request->input('sub_title');
//        $image_path = $request->file('image_path');
//        $text = $request->input('text');
//        $keywords = $request->input('keywords');
//        $slug = $request->input('slug');
//        $state = $request->input('state');
//
//        $user = Auth::user();
//
////        obtenemos el articulo antiguo
//        $originalArticle = Article::find($id);
//
//        if ($state != 'publicado'){
//            //        asignamos valores al artículo que se guardará en `deleted_articles`
//            $deletedArticle = new DeletedArticle();
//            $deletedArticle->article_id = $originalArticle->id;
//            $deletedArticle->edited_by = $user->id;
//            $deletedArticle->section_id = $originalArticle->section_id;
//            $deletedArticle->title = $originalArticle->title;
//            $deletedArticle->sub_title = $originalArticle->sub_title;
//            $deletedArticle->image_path = $originalArticle->image_path;
//            $deletedArticle->text = $originalArticle->text;
//            $deletedArticle->keywords = $originalArticle->keywords;
//            $deletedArticle->slug = $originalArticle->slug;
//            $deletedArticle->state = $originalArticle->state;
//
//            //        guardamos el $deletedArticle
////            $deletedArticle->save();
//
//            // actualizar objeto Article
//            $article = Article::find($id);
//            $article->author = $author;
//            $article->edited_by = $user->id;
//            $article->section_id = $section;
////            $article->title = $title;
//            $article->title = 01;
//            dd($article->title);
//            $article->sub_title = $sub_title;
//            $article->text = $text;
//            $article->keywords = $keywords;
//            $article->slug = $slug;
//            $article->state = $state;
//
//            $article->editor_comments = $originalArticle->editor_comments;
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
//            // actualizar registros con transaccion
////            $deletedArticle->save();
////            $article->update();
//
////            DB::beginTransaction();
////            try{
//                $deletedArticle->save();
//                $article->update();
////            } catch(\Exception $e) {
////                DB::rollBack();
////                throw $e;
////            }
//
//            return redirect()->route('article.detail', ['id' => $id])
//                ->with(['message' => 'Artículo enviado a revisión']);
//        } else {
//            //        asignamos valores al artículo que se guardará en `in_review_published`
//            $publicadoYEnRevision = new inReviewPublished();
//            $publicadoYEnRevision->article_id = $id;
//            $publicadoYEnRevision->edited_by = $user->id;
//            $publicadoYEnRevision->section_id = $section;
//            $publicadoYEnRevision->title = $title;
//            $publicadoYEnRevision->sub_title = $sub_title;
////            $publicadoYEnRevision->image_path = $image_path;
//            $publicadoYEnRevision->text = $originalArticle->text;
//            $publicadoYEnRevision->keywords = $originalArticle->keywords;
//            $publicadoYEnRevision->slug = $originalArticle->slug;
//            $publicadoYEnRevision->state = $originalArticle->state;
//
//            if ($image_path){
//                $image_path_name = time().$image_path->getClientOriginalName();
//                Storage::disk('images')->put($image_path_name, File::get($image_path));
//                $publicadoYEnRevision->image_path = $image_path_name;
//            } else {
//                $image_path = $originalArticle->image_path;
//            }
//
//            //        guardamos el $publicadoYEnRevision
//            $publicadoYEnRevision->save();
//
////            // actualizar registro
////            $article->update();
//            return redirect()->route('article.detail', ['id' => $id])
//                ->with(['message' => 'La versión enviada está en revisión. La versión original sigue publicada sin cambios hasta que los apruebe el editor.']);
//        }
//
//
//
//
//    }

    public function editInProcessInReviewView($id){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
        $user = \Auth::user();
        $article = Article::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

        return view('article.editInProcessInReviewView', [
            'article' => $article,
            'sections' => $sections
        ]);
    }

    public function editInProcessInReview(Request $request){
        if(!\Auth::check()){
            return redirect()->route('home');
        }

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
//            'author' => 'required|string|max:255',
            'section' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'submitState' => 'required|string|max:255',
            'editorComments' => 'string|max:2000',
        ]);

        // recoger los datos
        $id = $request->input('id');
//        $author = $request->input('author');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        if ($request->input('submitState') == 'Guardar y salir'){
            $state = 'en proceso';
        }else{
            $state = 'en revisión';
        }
        $editorComments = $request->input('editorComments');


        $user = Auth::user();
//        asignamos valores al articulo
        $article = Article::find($id);
        $article->edited_by = $user->id;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        if ($image_path){
            $article->image_path = $image_path;
        }

        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = $state;
        $article->editor_comments = $editorComments;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }

        $article->update();


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



    public function editorControlPanelView(){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
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
        if(!\Auth::check()){
            return redirect()->route('home');
        }
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
        if(!\Auth::check()){
            return redirect()->route('home');
        }

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required|string|max:255',
//            'author' => 'required|string|max:255',
            'section' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image_path' => 'image',
            'text' => 'required|string',
            'keywords' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'submitState' => 'required|string|max:255',
            'editorComments' => 'required|string|max:255',
        ]);

        // recoger los datos
        $id = $request->input('id');
//        $author = $request->input('author');
        $section = $request->input('section');
        $title = $request->input('title');
        $sub_title = $request->input('sub_title');
        $image_path = $request->file('image_path');
        $text = $request->input('text');
        $keywords = $request->input('keywords');
        $slug = $request->input('slug');
        if ($request->input('submitState') == 'Devolver al autor'){
            $state = 'en revisión';
        }else{
            $state = 'publicado';
        }
        $editorComments = $request->input('editorComments');


        $user = Auth::user();
//        asignamos valores al articulo
        $article = Article::find($id);
        $article->edited_by = $user->id;
        $article->section_id = $section;
        $article->title = $title;
        $article->sub_title = $sub_title;
        if ($image_path){
            $article->image_path = $image_path;
        }

        $article->text = $text;
        $article->keywords = $keywords;
        $article->slug = $slug;
        $article->state = $state;
        $article->editor_comments = $editorComments;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        }

        if ($state == 'publicado'){
            $article->published_at = date("Y-m-d H:i:s");
        }

        $article->update();


        if ($state == 'en revisión'){
                return redirect()->route('editor.controlPanelView')->with([
                    'message' => 'El artículo se ha devuelto al autor para corregir'
                ]);


        }else {
                return redirect()->route('editor.controlPanelView')->with([
                    'message' => 'El artículo se ha publicado correctamente.'
                ]);

        }
    }

//    public function authorizeRePublications(){
//        if(!\Auth::check()){
//            return redirect()->route('home');
//        }
//        $articles = inReviewPublished::orderBy('id', 'asc')
//            ->get();
//
//        return view('editor.authorizeRePublications', [
//            'articles' => $articles,
//        ]);
//    }

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
            'editorComments' => 'required|string|max:255',
        ]);

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
        $editorComments = $request->input('editorComments');
        $submitState = $request->input('submitState');

        $newArticle = InReviewPublished::find($id);
        if ($submitState == 'Devolver al autor'){
            // actualizar objeto inReviewPublished
            $newArticle->edited_by = $editedBy;
            $newArticle->title = $section;
            $newArticle->title = $section;
            $newArticle->title = $title;
            $newArticle->sub_title = $sub_title;
            $newArticle->text = $text;
            $newArticle->keywords = $keywords;
            $newArticle->slug = $slug;
            $newArticle->editor_comments = $editorComments;

            // subir fichero
            if ($image_path){
                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('images')->put($image_path_name, File::get($image_path));
                $newArticle->image_path = $image_path_name;
            }

            // actualizar el articulo original
            $newArticle->update();

            return redirect()->route('editor.controlPanelView')
                ->with(['message' => 'El artículo se ha devuelto al autor para corregir']);
        }else{
            $user = Auth::user();
            $originalArticle = Article::find($articleId);

            // guardar una copia de la versión original
            $deletedArticle = new DeletedArticle();
            $deletedArticle->article_id = $originalArticle->id;
            $deletedArticle->edited_by = $originalArticle->edited_by;
            $deletedArticle->section_id = $originalArticle->section_id;
            $deletedArticle->title = $originalArticle->title;
            $deletedArticle->sub_title = $originalArticle->sub_title;
            $deletedArticle->image_path = $originalArticle->image_path;
            $deletedArticle->text = $originalArticle->text;
            $deletedArticle->keywords = $originalArticle->keywords;
            $deletedArticle->slug = $originalArticle->slug;
            $deletedArticle->state = $originalArticle->state;

//            llevado a transaccion
//            $deletedArticle->save();

            // actualizar objeto Articulo original
            $originalArticle->edited_by = $editedBy;
            $originalArticle->title = $section;
            $originalArticle->title = $section;
            $originalArticle->title = $title;
//            $originalArticle->title = $newArticle;
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

            // actualizar el articulo original
//            llevado a transaccion
//            $originalArticle->update();

            // eliminar l aversión provisional ya revisada
//            llevado a transaccion
//            $newArticle->delete();

//            $deletedArticle->save();
//            $originalArticle->update();
//            $newArticle->delete();

            DB::beginTransaction();
            try{
            $deletedArticle->save();
            $originalArticle->update();
            $newArticle->delete();
            DB::commit();
            } catch(Exception $e) {
                DB::rollBack();
//                throw $e;
                return redirect()->back()->with(['message' => 'Ha ocurrido un error en el servidor. Por favor inténtelo más tarde o contacte al administrador', 'status' => 'error']);
            }

            return redirect()->route('article.detail', ['id' => $originalArticle->id])
                ->with(['message' => 'Artículo republicado con éxito']);
        }

    }

    public function editPublished(Request $request){
        if(!\Auth::check()){
            return redirect()->route('home');
        }

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

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $article->image_path = $image_path_name;
        } else{
            $article->image_path = $originalArticle->image_path;
        }

        $article->save();

        if (Auth::user()->usertype == 'journalist'){
            return redirect()->route('journalist.controlPanelView')
                ->with(['message' => 'Artículo registrado con éxito']);
        } elseif(Auth::user()->usertype == 'admin'){
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



