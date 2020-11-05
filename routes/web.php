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
Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});
Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('projects', 'ProjectController', ["as" => 'admin']);
    Route::get('project/notes/{id}', 'ProjectController@notes')->name('project.notes');
    Route::resource('clients', 'ClientController', ["as" => 'admin']);
    Route::resource('roles', 'RoleController',["as" => 'admin']);
    Route::resource('users', 'UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

//Route::resource('users', 'UserController')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('notes', 'NoteController', ["as" => 'admin']);
    Route::get('note/create/{id}', 'NoteController@create', ['as' => 'admin'])->name('admin.note.create');
});

Route::get('file/upload/{project_id}', 'FileController@create')->name('create.file');
Route::post('file/upload/store', 'FileController@store');
Route::post('file/destroy', 'FileController@destroy');

