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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@update_avatar');

//propositions

Route::put('/updatepropositions','QcmController@updateProposition');
Route::delete('/deletepropositions/{id}','QcmController@deleteProposition');

Route::get('/getpropositions/{id}/show','QuestionController@getProposition');
Route::post('/addpropositions','QuestionController@addPropositions');
Route::get('/Quiz/{id1}/{id2}/show','QuestionController@getQuestionProposition');



//questions

Route::put('/updatequestions','QcmController@updateQuestion');
Route::delete('/deletequestions/{id}','QcmController@deleteQuestion');
Route::get('/getquestions/{id}','QcmController@getQuestions');
Route::get('/getpropositions/{id}','QcmController@getProposition');
Route::get('/getpropositions','QcmController@getAllProposition');
Route::post('/addquestions','QcmController@addQuestions');


Route::get('/404', function () {
    return view('404');
});


//routes for QCM Model
Route::get('Qcm','QcmController@index');
Route::get('Qcm/All','QcmController@indexAll');//afficher catalogue de Qcm partagee
Route::get('Qcm/{id}/show','QcmController@show');
Route::get('Qcm/create','QcmController@create');
Route::post('Qcm','QcmController@store');
Route::get('Qcm/{id}/edit','QcmController@edit');
Route::put('Qcm/{id}','QcmController@update');
Route::get('Qcm/delete/{id}','QcmController@destroy');

//routes for Groupe Model

Route::get('Groupe','GroupeController@index');
Route::get('Groupe/{id}/show','GroupeController@show');
Route::get('Groupe/create','GroupeController@create');
Route::post('Groupe','GroupeController@store');
Route::post('Groupe/{id}/show','GroupeController@storeqcm');
Route::get('Groupe/{id}/edit','GroupeController@edit');
Route::put('Groupe/{id}','GroupeController@update');
Route::get('Groupe/delete/{id}','GroupeController@destroy');
Route::get('Groupe/joindre','GroupeController@joindre');

//routes for QCM Model
Route::get('Question','QuestionController@index');
Route::get('Question/{id}/show','QuestionController@show');
Route::get('Question/create','QuestionController@create');
Route::post('Question','QuestionController@store');
Route::post('Question/{id}/show','QuestionController@storeqcm');
Route::get('Question/{id}/edit','QuestionController@edit');
Route::put('Question/{id}','QuestionController@update');
Route::get('Question/delete/{id}','QuestionController@destroy');
Route::get('Question/joindre','QuestionController@joindre');

Route::get('Inscription','UserController@index');
Route::post('Inscription/{id}','UserController@store');


Route::get('Quiz','UserController@indexQcm');
Route::get('Quiz/{id1}/{id2}/show','UserController@show');
Route::post('Quiz/{id1}/{id2}/show','UserController@NextQuestion');
Route::post('/Quiz/show','UserController@UserChoix');
