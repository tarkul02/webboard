<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\ShowdetailController;
use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\PostHomeController;
use App\Http\Controllers\Admin\CommentHomeController;
use App\Http\Controllers\Admin\RoomHomeController;
use App\Http\Controllers\Admin\TypeHomeController;

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
        Route::post('/admineditpost', [PostHomeController::class, 'editpost'])->name('admineditpost');
        Route::post('/adminupdatepost', [PostHomeController::class, 'updatepost'])->name('adminupdatepost');
        Route::post('/admindeletepost', [PostHomeController::class, 'deletepost'])->name('admindeletepost');

        Route::get('/comment', [AdminHomeController::class, 'comment'])->name('admin.comment');
        Route::post('/admineditcomment', [CommentHomeController::class, 'editcomment'])->name('admineditcomment');
        Route::post('/adminupdatecomment', [CommentHomeController::class, 'updatecomment'])->name('adminupdatecomment');
        Route::post('/admindeletecomment', [CommentHomeController::class, 'deletecomment'])->name('admindeletecomment');

        Route::get('/room', [AdminHomeController::class, 'room'])->name('admin.room');
        Route::post('/admineditroom', [RoomHomeController::class, 'editroom'])->name('admineditroom');
        Route::post('/adminupdateroom', [RoomHomeController::class, 'updateroom'])->name('adminupdateroom');
        Route::post('/admindeleteroom', [RoomHomeController::class, 'deleteroom'])->name('admindeleteroom');
        Route::post('/createroom', [RoomHomeController::class, 'createroom'])->name('createroom');

        Route::get('/type', [AdminHomeController::class, 'type'])->name('admin.type');
        Route::post('/adminedittype', [TypeHomeController::class, 'edittype'])->name('adminedittype');
        Route::post('/adminupdatetype', [TypeHomeController::class, 'updatetype'])->name('adminupdatetype');
        Route::post('/admindeletetype', [TypeHomeController::class, 'deletetype'])->name('admindeletetype');
        Route::post('/createtype', [TypeHomeController::class, 'createtype'])->name('createtype');
    });
});

Route::group([
    'prefix' => 'post'
], function () {
    Route::post('/', [App\Http\Controllers\HomeController::class, 'createpost'])->name('createpost');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/{id}', [ShowdetailController::class, 'index'])->name('detail');
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
