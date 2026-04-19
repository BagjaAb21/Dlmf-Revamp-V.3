<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SurveyController;

// Welcome route

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
Route::get('/harga', [HargaController::class, 'index'])->name('harga');
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

// Payment routes - dengan parameter external_id
Route::get('/checkout', [PaymentController::class, 'showCheckout'])->name('payment.checkout');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment-success', [PaymentController::class, 'showSuccess'])->name('payment.success');
Route::get('/payment-failed', [PaymentController::class, 'showFailed'])->name('payment.failed');

// Survey routes
Route::get('/survey', [SurveyController::class, 'show'])->name('survey.show');
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');

// ── Student OTP Verification (guest route — no auth required) ─────────────
Route::get('/student/verify-otp', \App\Livewire\Student\VerifyOtp::class)
    ->name('filament.student.pages.verify-otp')
    ->middleware(['web']);

// ── Student Checkout (authenticated siswa only) ───────────────────────────
Route::post('/student/checkout/process', [\App\Http\Controllers\StudentPaymentController::class, 'process'])
    ->name('student.checkout.process')
    ->middleware(['web', 'auth', \App\Http\Middleware\EnsureUserIsSiswa::class]);

Route::get('/student/checkout/terms', function () {
    return view('student.checkout.terms');
})->name('student.checkout.terms')->middleware(['web']);

