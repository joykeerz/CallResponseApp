<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/call/recieves/{id}/show', 'RecieveController@callDetails')->name('callDetail');
Route::get('/call/recieves/{id}/edit', 'RecieveController@editCalls')->name('editCall');
Route::put('/call/recieves/{id}/', 'RecieveController@updateCalls')->name('updateCall');
Route::delete('/call/recieves/{id}', 'RecieveController@deleteCalls')->name('deleteCall');

//Call responses
//response crud
Route::get('/call/responses', 'ResponseController@dataResponses')->name('responseList');
Route::get('/call/responses/{id}/add', 'ResponseController@addResponses')->name('addResponse');
Route::post('/call/responses/add', 'ResponseController@createResponses')->name('createResponse');
Route::get('/call/responses/{id}/edit', 'ResponseController@editResponses')->name('editResponse');
Route::put('/call/responses/{id}/', 'ResponseController@updateResponses')->name('updateResponse');
Route::delete('/call/responses/{id}', 'ResponseController@deleteResponses')->name('deleteResponse');

//Open And Close ticket
Route::post('/call/responses/open', 'ResponseController@openTicket')->name('openResponse');
Route::put('/call/responses/{id}/close', 'ResponseController@closeTicket')->name('closeResponse');

//detail response
Route::get('/call/responses/{id}/detail/{recieve_id}/hardware', 'ResponseController@addResponsesDetailHardware')->name('addResDetailHard');
Route::post('/call/responses/add/detail/hardware', 'ResponseController@createResponsesDetailHardware')->name('createResDetailHard');
Route::get('/call/responses/{id}/detail/{recieve_id}/software', 'ResponseController@addResponsesDetailSoftware')->name('addResDetailSoft');
Route::post('/call/responses/add/detail/software', 'ResponseController@createResponsesDetailSoftware')->name('createResDetailSoft');

///Data
//hardware
Route::get('/hardware', 'HardwareController@index')->name('mainHardwareRoute');
Route::get('/hardware/add', 'HardwareController@addHardware')->name('addHardwareRoute');
Route::post('/hardware/add', 'HardwareController@createHardware')->name('createHardwareRoute');
Route::get('/hardware/{id}/edit', 'HardwareController@editHardware')->name('editHardwareRoute');
Route::put('/hardware/{id}/', 'HardwareController@updateHardware')->name('updateHardwareRoute');
Route::delete('/hardware/{id}/', 'HardwareController@deleteHardware')->name('deleteHardwareRoute');

//hardware type
Route::get('/hardware/type/add', 'HardwareController@addHardwareType')->name('addHardwareTypeRoute');
Route::post('/hardware/type/add', 'HardwareController@createHardwareType')->name('createHardwareTypeRoute');
Route::get('/hardware/type/{id}/edit', 'HardwareController@editHardwareType')->name('editHardwareTypeRoute');
Route::put('/hardware/type/{id}/', 'HardwareController@updateHardwareType')->name('updateHardwareTypeRoute');
Route::delete('/hardware/type/{id}/', 'HardwareController@deleteHardwareType')->name('deleteHardwareTypeRoute');
