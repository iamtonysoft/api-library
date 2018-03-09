<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Books
Route::get('books','BooksController@index');
Route::get('book/{id}','BooksController@show');
Route::post('book','BooksController@store');
Route::put('book','BooksController@store');
Route::delete('book/{id}','BooksController@destroy');

// Authors
Route::get('authors','AuthorsController@index');
Route::get('author/{id}','AuthorsController@show');
Route::post('author','AuthorsController@store');
Route::put('author','AuthorsController@store');
Route::delete('author/{id}','AuthorsController@destroy');
