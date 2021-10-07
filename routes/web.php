<?php

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

    return view('home');
})->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admins');

Route::get('/adminca', [App\Http\Controllers\AdminHomeController::class, 'admins'])->name('admin');

Route::get('/redaction', [App\Http\Controllers\NewsController::class, 'RedactionNews'])->name('redaction');

Route::get('/redactionuser', [App\Http\Controllers\NewsController::class, 'RedactionUserNews'])->name('redactionuser');

Route::get('/delete', [App\Http\Controllers\NewsController::class, 'DeleteNews'])->name('delete');



// Регистарция
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@create');

//Авторизация
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');

// Выход
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');



Route::post('/news', 'App\Http\Controllers\NewsController@News')->name('news');

Route::post('/redact', [App\Http\Controllers\NewsController::class, 'Redact'])->name('redact');



Route::get('/append_news', [App\Http\Controllers\NewsController::class, 'add_posts'])->name('append_news');

Route::get('/posts{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('posts');

Route::get('/back', [App\Http\Controllers\NewsController::class, 'back'])->name('back');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/index', function () {

        return view('admin/home');
    })->name('index');

    Route::get('/admin/admin', function () {

        return view('admin/admin');
    })->name('adminius');
});
