<?php


use App\Http\Controllers\GroupController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/',[PageController::class,'index'])
    ->name('home');

Route::get('/dashboard',[PageController::class,'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/users', [TestController::class,'user'])
    ->middleware('auth');

Route::get('/LoginPage',[PageController::class,'loginPage'])
    ->name('LoginPage');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('groups', GroupController::class);
    Route::resource('groups.posts', PostController::class)->shallow()->middleware('AuthPost');
});




Route::get('/test2',[TestController::class,'test2']);
require __DIR__.'/auth.php';
