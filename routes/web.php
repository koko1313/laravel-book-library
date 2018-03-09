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
})->name('welcome');

Route::view('contacts','contacts')->name('contacts');
Route::post('contacts','ContactController@SendMail')->name('contacts.send');

Route::group(['middleware' => 'guest'], function() {
    Route::view('register', 'users\register')->name('register-user');
    Route::post('register', 'Auth\RegisterController@StoreUser')->name('register-store');
    Route::view('login', 'users\login')->name('login');
    Route::post('login', 'Auth\LoginController@Login');
});

Route::group(['middleware'=>'auth'], function() {
    Route::get('logout', 'Auth\LoginController@Logout')->name('logout');

    Route::group(['namespace' => 'Books'], function () {
        Route::get('book-list', 'BookController@Index')->name('books.list');
        Route::group(['middleware' => 'adminCheck'], function() {
            Route::get('book', 'BookController@Create')->name('books.create');
            Route::post('book', 'BookController@Store');
            Route::get('book/edit/{id}', 'BookController@Edit')->name('books.edit');
            Route::put('book/edit/{id}', 'BookController@Update');
            Route::delete('book/{id}', 'BookController@Delete')->name('books.delete');
        });
    });

    Route::group(['middleware' => 'adminCheck'], function() {
        Route::group(['namespace' => 'Authors'], function () {
            Route::get('author-list', 'AuthorController@Index')->name('authors.list');
            Route::get('author', 'AuthorController@Create')->name('authors.create');
            Route::post('author', 'AuthorController@Store');
            Route::get('author/edit/{id}', 'AuthorController@Edit')->name('authors.edit');
           
            Route::delete('author/{id}', 'AuthorController@Delete')->name('authors.delete');
         Route::put('author/edit/{id}', 'AuthorController@Update');
         });
    });

    Route::group(['namespace' => 'Files'], function () {
        Route::get('files-list', 'FileController@Index')->name('files.list');
        Route::get('files','FileController@Create')->name('files.create');
        Route::post('files','FileController@Store');
        Route::get('files/edit/{id}','FileController@Edit')->name('files.edit');
        Route::put('files/edit/{id}', 'FileController@Update');
        Route::delete('files/{id}', 'FileController@Delete')->name('files.delete');
    });
});

