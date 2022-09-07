<?php
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){

Route::any('/posts/search',[PostController::class,'search'])->name("search.post");
Route::get('/posts',[PostController::class,'index'])->name("index.post");

Route::get('/posts/create',[PostController::class,'create'])->name("create.post");
Route::post('/posts',[PostController::class,'store'])->name("store.post");

Route::put('/posts/{id}',[PostController::class,'update'])->name("update.post");
Route::delete("/posts/{id}",[PostController::class,'destroy'])->name("destroy.post");

Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name("edit.post");
Route::get('/posts/{id}',[PostController::class,'show'])->name('show.post');

});
require __DIR__.'/auth.php';
