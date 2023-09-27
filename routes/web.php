<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IventController;
use App\Http\Controllers\CommentController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'timeline')->name('timeline');
    Route::post('/posts/store', 'posts_store')->name('posts_store');
    Route::get('/posts/create', 'posts_create')->name('posts_create');
    Route::get('/posts/{post}', 'posts_show')->name('posts_show');
    Route::put('/posts/{post}', 'posts_update')->name('posts_update');
    Route::get('/posts/{post}/edit', 'posts_edit')->name('posts_edit');
    Route::delete('/posts/{post}','posts_delete')->name('posts_delete');
});

Route::controller(IventController::class)->middleware(['auth'])->group(function(){
   Route::get('/ivent', 'ivent')->name('ivent'); 
   Route::post('/ivents/store', 'ivents_store')->name('ivent_store');
   Route::get('/ivents/create', 'ivents_create')->name('ivent_create');
   Route::get('/ivents/{ivent}', 'ivents_show')->name('ivents_show');
   Route::put('/ivents/{ivent}', 'ivents_update')->name('ivents_update');
   Route::get('/ivents/{ivent}/edit', 'ivents_edit')->name('ivents_edit');
   Route::delete('/ivents/{ivent}','ivents_delete')->name('ivents_delete');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/post/{post}/comment', 'posts_comment')->name('posts_comment');
    Route::post('/ivent/{ivent}/comment','ivents_comment')->name('ivents_comment');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
