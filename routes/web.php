<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KonsultanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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
// Route::get('/index', App\Http\Livewire\Vendor\Index::class);
// Route::get('/create',App\Http\Livewire\Vendor\Create::class);
// Route::get('/edit/{id}',App\Http\Livewire\Vendor\Edit::class);
// Route::apiResource('customers', App\Http\Controllers\Api\CustomerController::class);
// Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
// Route::apiResource('vendors', App\Http\Controllers\Api\VendorController::class);
// Route::apiResource('konsultans', App\Http\Controllers\Api\KonsultanController::class);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	// Route::get('/user-management', [RegisterController::class, 'index']);
	// Route::get('/customer-management', [RegisterController::class, 'index']);
	// Route::get('/vendor-management', [RegisterController::class, 'index']);
	// Route::get('/konsultan-management', [KonsultanController::class, 'index']);
	// Route::get('user-management', function () {
	// 	return view('laravel-examples/user-management');
	// })->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('static-register-user', function () {
		return view('static-register-user');
	})->name('register-user');

	Route::get('register-user', function () {
		return view('register-user');
	})->name('register-user');

	Route::get('update-user', function () {
		return view('update-user');
	})->name('update-user');

	
    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/admin-profile', [InfoUserController::class, 'create']);
	Route::post('/admin-profile', [InfoUserController::class, 'store']);
	Route::resource('users', UserProfileController::class);
	Route::resource('konsultans', KonsultanController::class);
	Route::resource('vendors', VendorController::class);
	Route::resource('customers', CustomerController::class);
	Route::post('customers/update/{id}', [CustomerController::class, 'updateCustomer'])->name('updateCustomer')->middleware('auth');
	// Route::get('/user-profile/{id}', [UserProfileController::class, 'create']);
	// Route::get('/user-profile/{id}', [UserProfileController::class, 'edit']);
	// Route::get('/user-profile', [RegisterController::class, 'index']);
	// Route::post('/user-profile/{id}', [UserProfileController::class, 'store']);
	// Route::post('/user-profile{id}', [UserProfileController::class, 'update']);
	// Route::get('user-profile/delete/{id}', [UserProfileController::class, 'delete'])->name('delete')->middleware('auth');
	// Route::post('user-profile/update/{id}', [UserProfileController::class, 'update'])->name('update')->middleware('auth');
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

Route::get('/register-user', [RegisterUserController::class, 'create']);
Route::post('/register-user', [RegisterUserController::class, 'store']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');