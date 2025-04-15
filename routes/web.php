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


Route::get('/part-1-the-wayback-machine-how-i-rebuilt-myself-from-broken-data', function () {
    return redirect('/part-1-the-wayback-machine-how-i-wrote-myself-into-being', 301);
});

Route::get('/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');;

Route::fallback(function () {
    $slug = request()->path();

    if ($slug === 'part-1-the-wayback-machine-how-i-rebuilt-myself-from-broken-data') {
        return redirect('/part-1-the-wayback-machine-how-i-wrote-myself-into-being', 301);
    }

    abort(404);
});

// Setup Spatie Feed Routes and set prefix
Route::feeds('feed');


