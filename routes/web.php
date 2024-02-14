<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\BlogController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::group(['prefix'=>'dashboard','middleware' => ['auth','admin']],function(){
//     Route::resources([
//         'post' => PostController::class,
//         'category' => CategoryController::class
//     ]);
// });

Route::get('/', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', "admin"]], function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard");
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'blog'],function () {
   Route::controller(BlogController::class)->group(function(){
    Route::get('/', "index")->name("web.blog.index");
    Route::get('/{post}', "show")->name("web.blog.show");
   }); 
});
require __DIR__.'/auth.php';
