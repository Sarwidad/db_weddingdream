<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OpenTalentController;
use App\Http\Controllers\Api\TalentController;
use App\Http\Controllers\MasterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('customers', App\Http\Controllers\Api\CustomerController::class);

// Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
Route::get("/users", [UserController::class, 'index']);
Route::post("/users/create", [UserController::class, 'store']);
Route::post("/users/login", [UserController::class, 'login']);
Route::put("/users/{id}", [UserController::class, 'update']);
Route::get("/users/get/{id}", [UserController::class, 'show']);
Route::apiResource('vendors', App\Http\Controllers\Api\VendorController::class);

Route::apiResource('konsultans', App\Http\Controllers\Api\KonsultanController::class);

Route::apiResource('talents', App\Http\Controllers\Api\TalentController::class);

// Route::apiResource('produks', App\Http\Controllers\Api\ProdukController::class);
Route::post("/produks/create", [ProdukController::class, 'store']);
Route::put("/produks/{id}", [ProdukController::class, 'update']);
Route::get("/produks/get/{id}", [ProdukController::class, 'show']);
Route::get("/produks", [ProdukController::class, 'index']);
Route::get("/produks-by-vendor/{vendor_id}", [ProdukController::class, 'myIndex']);
Route::delete("/produks/{id}", [ProdukController::class, 'destroy']);


Route::post("/talents/create", [TalentController::class, 'store']);
Route::post("/customers", [CustomerController::class, 'index']);
Route::get("/master/bidang", [MasterController::class, 'bidang']);
Route::get("/master/kategori", [MasterController::class, 'kategori']);
Route::get("/master/profesi", [MasterController::class, 'profesi']);
Route::post("/customers/{user_id}", [CustomerController::class, 'show']);

Route::post("/open-talent/create", [OpenTalentController::class, 'store']);
Route::put("/open-talent/{id}", [OpenTalentController::class, 'update']);
Route::get("/open-talent/get/{id}", [OpenTalentController::class, 'show']);
Route::get("/open-talent", [OpenTalentController::class, 'index']);
Route::get("/open-talent-by-vendor/{vendor_id}", [OpenTalentController::class, 'myVendorIndex']);
Route::get("/open-talent-by-talent/{talent_id}", [OpenTalentController::class, 'myTalentIndex']);
Route::delete("/open-talent/{id}", [OpenTalentController::class, 'destroy']);


// Route::get('/customers', CustomerController::class);
// Route::post('/customers/{customer}', CustomerController::class);
// Route::delete('/customers/{customer}', CustomerController::class);
