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

Route::controller(BookController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/getvote', 'getvote');
    Route::get('/test', 'test')->name('test');
    Route::get('/famous', 'famous')->name('famous');
    
 });

 Route::controller(RatingController::class)->group(function(){
   Route::get('/rating', 'index');
   Route::post('/save-rating', 'store');
   Route::get('/getBook/{author_id}', 'getBook')->name('getBook');
});