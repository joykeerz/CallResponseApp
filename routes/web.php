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
    if (Auth::check()) {
        return redirect('home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///calls Route
Route::get('/call', 'CallController@index')->name('mainCall');
//Call recieves
Route::get('/call/recieves', 'RecieveController@dataRecieve')->name('recieveList');
Route::get('/call/recieves/add', 'RecieveController@addCalls')->name('addCall');
Route::post('/call/recieves/add', 'RecieveController@createCalls')->name('createCall');
Route::get('/call/recieves/{id}/edit', 'RecieveController@editCalls')->name('editCall');
Route::put('/call/recieves/{id}/', 'RecieveController@updateCalls')->name('updateCall');
Route::delete('/call/recieves/{id}', 'RecieveController@deleteCalls')->name('deleteCall');
//Call responses
Route::get('/call/responses', 'ResponseController@dataRecieve')->name('responseList');
Route::get('/call/responses/add', 'ResponseController@addCalls')->name('AddResponse');
Route::post('/call/responses/add', 'ResponseController@createCalls')->name('CreateResponse');
Route::get('/call/responses/{id}/edit', 'ResponseController@editCalls')->name('editCall');
Route::put('/call/responses/{id}/', 'ResponseController@updateCalls')->name('updateCall');
Route::delete('/call/responses/{id}', 'ResponseController@deleteCalls')->name('DeleteResponse');
