<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubscribeTransactionController;
use App\Http\Controllers\CourseVideoController;
use App\Models\SubscribeTransaction;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout')->middleware('role:student');
    Route::post('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store')->middleware('role:student');
    Route::get('/learning/{course}/{courseVideoId}', [FrontController::class, 'learning'])->name('front.learning')->middleware('role:student');
});

Route::get('/dashboard', function () {
    $stats = [
        'courses' => \App\Models\Course::count(),
        'categories' => \App\Models\Category::count(),
        'teachers' => \App\Models\Teacher::count(),
        'students' => \App\Models\User::role('student')->count(),
    ];
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class)
        ->middleware('role:owner');

    Route::resource('teachers', TeacherController::class)
        ->middleware('role:owner');

    Route::resource('courses', CourseController::class)
        ->middleware('role:owner|teacher');

    Route::resource('subscribe_transactions', SubscribeTransactionController::class)
        ->middleware('role:owner');

    Route::resource('course_videos', CourseVideoController::class)
        ->middleware('role:owner|teacher');

    Route::get('/add/video/{course_id}', [CourseVideoController::class, 'create'])
        ->middleware('role:teacher|owner')
        ->name('course.add_video');

    Route::post('/add/video/save/{course_id}', [CourseVideoController::class, 'store'])
        ->middleware('role:teacher|owner')
        ->name('course.add_video.save');
});

require __DIR__.'/auth.php';