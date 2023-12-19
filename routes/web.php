<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]], function(){

    // Main page
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // Per article
    Route::get('/article/{id}', [IndexController::class, 'article'])->name('article');

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::post('/update_data', [UserController::class, 'update_data'])->name('update_data');
        Route::post('/update_password', [UserController::class, 'update_password'])->name('update_password');

//        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});

Route::group([
    'middleware' => ['admin'],
    'prefix' => 'admin'], function () {

    // Authorisation and sign out
    Route::get('/admin/login', [LoginController::class, 'showLogin'])->withoutMiddleware([Admin::class])->name('ShowLogin');
    Route::post('/admin/signin', [LoginController::class, 'login'])->withoutMiddleware([Admin::class])->name('AdminLogin');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('AdminLogout');

    // Admin Panel Dashboard
    Route::get('/', function () {
        return view('admin.index');
    })->name('AdminMainPage');

    // Administrators
    Route::resource('admins', AdminsController::class);

    // Contact info
    Route::resource('contacts', ContactsController::class, ['only' => ['edit','update']]);
    Route::get('/contacts/cache', [ContactsController::class, 'cache'])->name('contacts.cache');

    // Articles
    Route::resource('articles', ArticlesController::class);
});

require __DIR__.'/auth.php';
