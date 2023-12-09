<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/rating', function () {
//    return view('rating'); });

Route::controller(BookController::class)->group(function(){
   //  Route::get('/', 'hitung');
    Route::get('/', 'index')->name('index');

    Route::get('/getvote', 'getvote');
    Route::get('/test', 'test')->name('test');
    Route::get('/famous', 'famous')->name('famous');
    
 });

 Route::controller(RatingController::class)->group(function(){
   Route::get('/rating', 'index');
   Route::post('/save-rating', 'store');
   Route::get('/getBook/{author_id}', 'getBook')->name('getBook');

   // Route::get('/selectauthor', 'selectauthor');
   // Route::get('/selectbook/{id}', 'selectbook');
});




//  Route::get('/' , [BookController::class, 'index']);
// dalam web.php
// Route::get('/get-authors', 'BookController@getAuthors');
// Route::get('/get-books/{author}', 'BookController@getBooksByAuthor');
