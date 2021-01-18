<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/setLocale/{lang}', function ($lang) {
    app()->setlocale($lang);
    session()->put('locale', $lang);
    return redirect()->back();
});

Route::get('/', [DashboardController::class, 'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/home/post', [App\Http\Controllers\HomeController::class, 'createpost'])->name('createpost');
Route::post('/home/comment', [App\Http\Controllers\ShowdetailController::class, 'createcomment'])->name('createcomment');
Route::get('/home/{id}', [App\Http\Controllers\ShowdetailController::class, 'index'])->name('detail');

Route::post('/home/editpost', [App\Http\Controllers\HomeController::class, 'editpost'])->name('editpost');
Route::post('/home/updatepost', [App\Http\Controllers\HomeController::class, 'updatepost'])->name('updatepost');
Route::post('/home/deletepost', [App\Http\Controllers\HomeController::class, 'deletepost'])->name('deletepost');

Route::post('/home/selectcomment', [App\Http\Controllers\ShowdetailController::class, 'selectupdatecomment'])->name('selectupdatecomment');
Route::post('/home/updatecomment', [App\Http\Controllers\ShowdetailController::class, 'updatecomment'])->name('updatecomment');
Route::post('/home/deletecomment', [App\Http\Controllers\ShowdetailController::class, 'deletecomment'])->name('deletecomment');

// Route::group([
//     'middleware' => 'web.auth',
// ], function () {
//     Route::get('/home/checklogin', [App\Http\Controllers\LoginController::class, 'checklogin'])->name('checklogin');
// });
