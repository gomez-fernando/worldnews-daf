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

        if (Auth::user()->role == 'journalist'){
            return redirect()->route('journalist.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        } elseif(Auth::user()->role == 'admin'){
            return redirect()->route('admin.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        } else{
            return redirect()->route('editor.controlPanelView')
                ->with(['message' => 'Cambios guardados con éxito. Están pendientes de revisión']);
        }
    }
}
