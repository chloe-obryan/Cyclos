<?php

use Illuminate\Support\Facades\Route;

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




Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
});

/*topics-----------------------------------*/

Route::resource('topics','TopicController');
Route::post('/comments/{topic}','CommentController@store')->name('comments.store');
Route::post('/commentReply/{comment}','CommentController@storeCommentReply')->name('comments.storeReply');

/*annonces-----------------------*/

Auth::routes();
Route::get('acteurs/profil','ActeurController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('nouveau-diplome','DiplomeController@create');
Route::get('nouvelle-ville','VilleController@create');
Route::get('nouveau-secteur','SecteurController@create');
Route::get('nouveau-pays','PaysController@create');
Route::get('annonce/publier', [
    'as' => 'annonce/create',
    'uses' => 'AnnonceController@create'
]);
Route::get('entreprise/forme', [
    'as' => 'entreprise/create',
    'uses' => 'EntrepriseController@create'
]);

Route::get('profil/editer', [
    'as'=>'user/edit',
    'uses'=>'Auth\RegisterController@edit',
    'middleware' => 'auth'
]);
Route::resource('acteurs/user','ActeurController');



Route::post('ajouter-diplome', 'DiplomeController@store');
Route::post('ajouter-ville', 'VilleController@store');
Route::post('ajouter-secteur', 'SecteurController@store');
Route::post('ajouter-pays','PaysController@store');
Route::post('annonce/enregistrer',[
    'as' => 'annonce/store',
    'uses' => 'AnnonceController@store',
    'middleware' => 'auth'
]);
Route::post('entreprise/enregistrer',[
    'as' => 'entreprise/store',
    'uses' => 'EntrepriseController@store',
    'middleware' => 'auth'
]);

/*-------------------------------------------------------------*/
Route::get('notification',[
    'as'=>'notifier',
     'uses'=>'NotificationController@show',
     'middleware' => 'auth'
 ]);
 Route::get('notificationVu/{id}',[
     'as'=>'notificationVu',
     'uses'=>'NotificationController@notificationVu',
     'middleware' => 'auth'
 ])->where(['id' => '[0-9]+']);