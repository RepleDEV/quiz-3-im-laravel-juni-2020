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

Route::prefix('articles')->group(function() {
    Route::get('/','ArticleController@index');
    Route::post('/', 'ArticleController@add_article');

    Route::get('/create', function () {
        return view('articleform', ["method" => "POST"]);
    });

    Route::delete('/{id}', 'ArticleController@del_article');
    Route::put('/{id}', 'ArticleController@save_article_edit');
    Route::get('/{id}','ArticleController@show_article');
    Route::get('/{id}/edit', 'ArticleController@show_edit_page');
});

// Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
// Route::post('/items', 'ItemController@store'); // menyimpan data
// Route::get('/items', 'ItemController@index'); // menampilkan semua
// Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
// Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
// Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
// Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id