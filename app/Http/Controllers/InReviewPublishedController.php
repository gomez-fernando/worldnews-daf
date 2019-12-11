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

        return view('editor.rePublishView', [
            'article' => $article,
            'sections' => $sections,
        ]);
    }

    public function save(Request $request){

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
            'submitState' => 'required|string|max:255',
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

        // recuperamos el artículo original
        $originalArticle = Article::find($articleId);

        // creamos el artículo que se guardará en in_review_published
        $inReviewPublished = new InReviewPublished();
        $inReviewPublished->article_id = $articleId;
        $inReviewPublished->author = $author;
        $inReviewPublished->edited_by = \Auth::user()->id;
        $inReviewPublished->section_id = $section;
        $inReviewPublished->title = $title;
        $inReviewPublished->sub_title = $sub_title;
        $inReviewPublished->image_path = $image_path;
        $inReviewPublished->text = $text;
        $inReviewPublished->keywords = $keywords;
        $inReviewPublished->slug = $slug;
        $inReviewPublished->state = 'publicado';
        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $inReviewPublished->image_path = $image_path_name;
        }else{
            $inReviewPublished->image_path = $originalArticle->image_path;
        }

        $inReviewPublished->save();

        if (Auth::user()->usertype == 'journalist'){
            return redirect()->route('journalist.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        } elseif(Auth::user()->usertype == 'admin'){
            return redirect()->route('admin.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        } else{
            return redirect()->route('editor.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        }
    }

    public function editInReviewForRepublishingView($id){
        if(!\Auth::check()){
            return redirect()->route('home');
        }
        $user = \Auth::user();
        $article = InReviewPublished::find($id);
        $sections = DB::table('sections')
            ->orderBy('id')
            ->get();

        return view('article.editInReviewForRepublishingView', [
            'article' => $article,
            'sections' => $sections
        ]);
    }

    public function update(Request $request){
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
            'state' => 'required|string|max:255',
            'editorComments' => 'required|string|max:255',
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
        $editorComments = $request->input('editorComments');

        $user = Auth::user();

////        obtenemos el articulo antiguo
//        $originalArticle = Article::find($id);

            // actualizar objeto Article
            $article = InReviewPublished::find($id);
            $article->author = $author;
            $article->edited_by = $user->id;
            $article->section_id = $section;
            $article->title = $title;
            $article->sub_title = $sub_title;
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

            // actualizar registro
            $article->update();
            // redireccionar a panel de control
        if (Auth::user()->usertype == 'journalist'){
            return redirect()->route('journalist.controlPanelView')
                ->with(['message' => 'Artículo enviado a revisión']);
        } elseif(Auth::user()->usertype == 'admin'){
            return redirect()->route('admin.controlPanelView')
                ->with(['message' => 'Artículo enviado a revisión']);
        } else{
            return redirect()->route('editor.controlPanelView')
                ->with(['message' => 'Artículo enviado a revisión']);
        }





    }
}
