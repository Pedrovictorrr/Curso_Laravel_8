<?php

use Illuminate\Support\Facades\Route;

use League\CommonMark\Extension\DescriptionList\Parser\DescriptionTermContinueParser;
use App\Http\Controllers\PostController;

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
Route::any('/posts/search',[PostController::class,'search'])->name("search.post");
Route::get('/posts',[PostController::class,'index'])->name("index.post");

Route::get('/posts/create',[PostController::class,'create'])->name("create.post");
Route::post('/posts',[PostController::class,'store'])->name("store.post");

Route::put('/posts/{id}',[PostController::class,'update'])->name("update.post");
Route::delete("/posts/{id}",[PostController::class,'destroy'])->name("destroy.post");

Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name("edit.post");
Route::get('/posts/{id}',[PostController::class,'show'])->name('show.post');

Route::get('/', function () {
    return view('welcome');
});
