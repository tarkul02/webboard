<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;

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
Route::get('/dashboard/{id}', [HomeDashboardController::class, 'index'])->name('dashboard');
Auth::routes();

Route::group([
    'prefix' => 'admin'
], function () {
    Route::get('/login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class, 'login'])->name('admin.getLogin');
    Route::group([
        'middleware' => 'admin.auth',
    ], function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin');
    });
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [App\Http\Controllers\ShowdetailController::class, 'index'])->name('detail');

Route::group([
    'prefix' => 'post'
], function () {
    Route::post('/', [App\Http\Controllers\HomeController::class, 'createpost'])->name('createpost');

    Route::group([
        'middleware' => 'auth',
    ], function () {
        Route::post('/editpost', [App\Http\Controllers\HomeController::class, 'editpost'])->name('editpost');
        Route::post('/updatepost', [App\Http\Controllers\HomeController::class, 'updatepost'])->name('updatepost');
        Route::post('/deletepost', [App\Http\Controllers\HomeController::class, 'deletepost'])->name('deletepost');
    });
});

Route::group([
    'prefix' => 'comment'
], function () {
    Route::post('/', [App\Http\Controllers\ShowdetailController::class, 'createcomment'])->name('createcomment');
    Route::post('/select', [App\Http\Controllers\ShowdetailController::class, 'selectupdatecomment'])->name('selectupdatecomment');
    Route::group([
        'middleware' => 'auth',
    ], function () {
        Route::post('/update', [App\Http\Controllers\ShowdetailController::class, 'updatecomment'])->name('updatecomment');
        Route::post('/delete', [App\Http\Controllers\ShowdetailController::class, 'deletecomment'])->name('deletecomment');
    });
});
// Route::group([
//     'middleware' => 'web.auth',
// ], function () {
//     Route::get('/checklogin', [App\Http\Controllers\LoginController::class, 'checklogin'])->name('checklogin');
// });
