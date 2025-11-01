<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Program routes
Route::get('/program', function () {
    return view('program');
});

// harga routes
Route::get('/harga', function () {
    return view('harga');
});
Route::get('/program/reguler', function () {
    return view('program.reguler');
});
Route::get('/program/grammatik', function () {
    return view('program.grammatik');
});
Route::get('/program/prep-ex-goethe', function () {
    return view('program.prep-ex-goethe');
});
Route::get('/program/muttersprachler', function () {
    return view('program.muttersprachler');
});
Route::get('/program/kinder', function () {
    return view('program.kinder');
});
Route::get('/program/flexilearn', function () {
    return view('program.flexilearn');
});

// product routes
Route::get('/product', function () {
    return view('product');
});
Route::get('/product/netzwerk', function () {
    return view('product.netzwerk');
});
Route::get('/product/deutschkit', function () {
    return view('product.deutschkit');
});

// Au Pair
Route::get('/au-pair', function () {
    return view('au-pair');
});

// Blog routes
Route::prefix('blog')->name('blog.')->group(function () {
Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category');
Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
//Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// Detail page uses slug binding and points to showDetailed
//Route::get('/blog/{post:slug}', [BlogController::class, 'showDetailed'])->name('blog.show');

// Teachers route
//Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/{teacher:slug}', [TeacherController::class, 'show'])->name('show');
});
