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

Route::view('/', 'welcome')->name('home');

Route::get('/about-chrispian', function () {
    return redirect()->route('about');
})->name('about-chrispian');

Route::view('/about', 'about')->name('about');

Route::get('/feed', function () {
    return redirect()->to('/feed/blog');
});


Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');;


Route::get('/books/{isbn}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');;
Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');;


Route::get('/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');;


// Setup Spatie Feed Routes and set prefix
Route::feeds('feed');


