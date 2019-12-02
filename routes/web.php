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
Route::get('/article/{id}', 'ArticleController@detail')->name('article.detail');
Route::get('/article/delete/{id}', 'ArticleController@delete')->name('article.delete');
Route::get('/article/editar/{id}', 'ArticleController@edit')->name('article.edit');
Route::post('/article/update', 'ArticleController@update')->name('article.update');
Route::post('/article/store', 'ArticleController@store')->name('article.store');

// EDITOR
Route::get('/editor/panel-de-control', 'ArticleController@editorControlPanelView')->name('editor.controlPanelView');
Route::get('/editor/republicar/{id}', 'InReviewPublishedController@rePublishView')->name('editor.re-publish');
Route::post('/editor/publicar', 'ArticleController@approvePublications')->name('editor.approve-publications');


Route::get('/editor/revisar-publicar-articulo/{id}', 'ArticleController@reviewPublishArticleView')->name('editor.review-publish-article');

// ADMIN
Route::get('/admin/panel-de-control', 'ArticleController@adminControlPanelView')->name('admin.controlPanelView');


//JOURNALIST
Route::get('periodista/panel-de-control', 'ArticleController@controlPanelJournalistView')->name('journalist.controlPanelView');





