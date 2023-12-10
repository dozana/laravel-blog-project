<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/admin/login', [LoginController::class, 'showLogin'])->withoutMiddleware([Admin::class])->name('ShowLogin');
    Route::post('/admin/signin', [LoginController::class, 'login'])->withoutMiddleware([Admin::class])->name('AdminLogin');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('AdminLogout');

    Route::get('/', function () {
        return view('admin.index');
    })->name('AdminMainPage');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admins', AdminsController::class);

Route::resource('contacts', ContactsController::class, ['only' => ['edit','update']]);
Route::get('/contacts/cache', [ContactsController::class, 'cache'])->name('contacts.cache');

//Route::get('/', function () {
//    return view('landing.index');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
