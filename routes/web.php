<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');


});

// RUTAS GENERALES
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{section_id?}', 'HomeController@index')->name('home');

// USUARIO
Route::get('/configuracion', 'userController@config')->name('config');
Route::post('/user/update', 'userController@update')->name('user.update');
//Route::get('/user/avatar/{filename}', 'userController@getImage')->name('user.avatar');
Route::get('/perfil/{id}', 'userController@profile')->name('profile');
//Route::get('/gente/{search?}', 'userController@index')->name('user.index');

// ARTICLE
Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::post('/article/review', 'ArticleController@review')->name('article.review');
Route::get('/article/file/{filename}', 'ArticleController@getArticleImage')->name('article.file');
//buscador de tags
Route::get('/article/tags-search-result/{search?}', 'ArticleController@tagsSearchResult')->name('article.tagsSearchResult');
Route::get('/article/{id}', 'ArticleController@detail')->name('article.detail');
Route::get('/article/delete/{id}', 'ArticleController@delete')->name('article.delete');

Route::get('/article/editar/{id}', 'ArticleController@editInProcessInReviewView')->name('article.editInProcessInReviewView');
Route::post('/article/actualizar-articulo', 'ArticleController@editInProcessInReview')->name('article.editInProcessInReview');
Route::get('/article/editar-publicado/{id}', 'ArticleController@editPublishedView')->name('article.editPublishedView');
Route::post('/article/republicar', 'ArticleController@editPublished')->name('article.editPublished');
Route::get('/article/reeditar/{id}', 'InReviewPublishedController@editInReviewForRepublishingView')->name('article.editInReviewForRepublishingView');
Route::post('/article/en-revision-para-republicar', 'InReviewPublishedController@update')->name('inReviewPublished.update');



//Route::post('/article/update', 'ArticleController@update')->name('article.update');
Route::post('/article/store', 'ArticleController@store')->name('article.store');




// EDITOR
Route::get('/editor/panel-de-control', 'ArticleController@editorControlPanelView')->name('editor.controlPanelView');
Route::get('/editor/publicar/{id}', 'ArticleController@publishView')->name('editor.publishView');
Route::post('/editor/publicar', 'ArticleController@publish')->name('editor.publish');
Route::get('/editor/republicar/{id}', 'InReviewPublishedController@rePublishView')->name('editor.rePublishView');
Route::post('/editor/republicar', 'ArticleController@rePublish')->name('editor.rePublish');
// crear version provisional para republicar en in_review_published
Route::post('/editor/guardar-nueva-versión-provisionalmente', 'InReviewPublishedController@save')->name('save');


Route::get('/editor/revisar-publicar-articulo/{id}', 'ArticleController@reviewPublishArticleView')->name('editor.review-publish-article');
Route::get('/editor/revisar-publicar-articulo/{id}', 'ArticleController@reviewPublishArticleView')->name('editor.review-publish-article');

// ADMIN
Route::get('/admin/panel-de-control', 'ArticleController@adminControlPanelView')->name('admin.controlPanelView');


//JOURNALIST
Route::get('periodista/panel-de-control', 'ArticleController@controlPanelJournalistView')->name('journalist.controlPanelView');





