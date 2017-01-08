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
    return view('acceuil');
});
Route::get('acceuil', function () {
    return view('acceuil');
});
Route::get('time', function () {
    return view('index');
});


Route::resource('news', 'UserController');


route::group(['namespace'=>'Admin','prefix'=>'Admin'], function(){
  route::resource('user',"Usercontroller");
});


Route::get('deconnexion', 'Deconnexion@logout');

Auth::routes();
//Route::get('/home', 'HomeController@index');

Route::get('Activite/education',function(){
	return view('activite/education');
});
Route::get('Activite/sport',function(){
	return view('activite/sport');
});

Route::get('Activite/culture',function(){
	return view('activite/culture');
});

Route::get('Presentation/bureau',function(){
	return view('Presentation/bureau');
});
Route::get('Presentation/statut',function(){
	return view('Presentation/statut');
});
Route::put('recive/{id}', 'MessageriesController@recive_msg');
/*
Route::get('contact','ContactController@create');
Route::post('contact','ContactController@store');*/
Route::get('contact', 
  ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('contact', 
  ['as' => 'send', 'uses' => 'ContactController@store']);
Route::post('send', 'MessageriesController@send');
Route::resource('type-formation', 'TypeFormationController');
Route::resource('formation', 'FormationController');
Route::resource('inscription', 'InscriptionController');
Route::resource('domaine', 'DomaineController');
Route::resource('niveau-etude', 'NiveauEtudeController');            
Route::resource('aide-scolaire', 'AideScolaireController');
Route::resource('statut', 'StatutController');                               
Route::resource('amis', 'AmisController');                               
Route::resource('messagerie', 'MessageriesController');





/*Route::get('messagerie', 'MessageriesController@strore');                               
Route::post('messagerie', 'MessageriesController@create');*/                               
                               

Route::get('profil', 'Admin\Usercontroller@profil');

Route::get('recherche', 'Admin\Usercontroller@recherche');
Route::get('show-aide/{id}', 'Admin\Usercontroller@showAide')->where('id','[0-9]+');
