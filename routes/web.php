<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    $posts = DB::select('SELECT * FROM posts');
    return view('/home', ['posts' => $posts]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/home/post', [App\Http\Controllers\HomeController::class, 'createpost'])->name('createpost');
Route::post('/home/comment', [App\Http\Controllers\ShowdetailController::class, 'createcomment'])->name('createcomment');
Route::get('/home/{id}', [App\Http\Controllers\ShowdetailController::class, 'index'])->name('detail');

// Route::group([
//     'middleware' => 'web.auth',
// ], function () {
//     Route::get('/home/checklogin', [App\Http\Controllers\LoginController::class, 'checklogin'])->name('checklogin');
// });