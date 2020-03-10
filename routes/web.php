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

Route::get('/home', 'ClubsController@showUserClubs')->name('home');

Route::resource('clubs', 'ClubsController');

Route::put('/like/{club}', 'ClubsController@likeClub')->name('clubs.like');

Route::put('/dislike/{club}', 'ClubsController@dislikeClub')->name('clubs.dislike');

Route::post('/comments/store/{club}','CommentsController@store')->name('comments.store');

Route::put('/comments/update/{comment}','CommentsController@update')->name('comments.update');

Route::delete('/comments/{comment}','CommentsController@destroy')->name('comments.destroy');

Route::put('/comments/signal/{comment}', 'CommentsController@signal')->name('comments.signal');
