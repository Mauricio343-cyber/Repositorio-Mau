<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoints publicos para registrar y loguear usuarios
Route::post('/register', [usercontroller::class, 'register']);
// Informacion para rgistrar usuario
/* 'name' => 'required|string|max:100|min:5',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => [
                'required',
                'string',
                Password::min(8)
                ->mixedCase() // mayus y minus
                ->numbers() // un numero
                ->symbols() //al menos un simbolo */

Route::post('/login', [usercontroller::class, 'login']);

// para hacer una orden se tendra que hacer un port con la siguiente data 
//*'user_id' => 'required|integer',
            //*'total_amount' => 'required|numeric',
           // 'status' => 'required|string|max:50',
           // 'order_number' => 'required|string|max:100|unique:orders'; *//


// Endpoints protegidos para crear y listar ordenes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [App\Http\Controllers\OrdersController::class, 'store']);
    Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index']);
    Route::get('/orders/{id}', [App\Http\Controllers\OrdersController::class, 'show']);
    Route::put('/orders/{id}', [App\Http\Controllers\OrdersController::class, 'update']);
    Route::delete('/orders/{id}', [App\Http\Controllers\OrdersController::class, 'destroy']);
        Route::delete('/payments/{id}', [App\Http\Controllers\PaymentsController::class, 'destroy']);
Route::post('/payments', [App\Http\Controllers\PaymentsController::class, 'store']);
    Route::get('/payments', [App\Http\Controllers\PaymentsController::class, 'index']);
    Route::get('/payments/{id}', [App\Http\Controllers\PaymentsController::class, 'show']);
    Route::put('/payments/{id}', [App\Http\Controllers\PaymentsController::class, 'update']);
    Route::delete('/products/{id}', [App\Http\Controllers\ProductsController::class, 'destroy']);
    Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store']);
    Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index']);
    Route::get('/products/{id}', [App\Http\Controllers\ProductsController::class, 'show']);
    Route::put('/products/{id}', [App\Http\Controllers\ProductsController::class, 'update']);
    });






//1|BBr29F7UjokGEyjaLXB5l4roHSZliTjKFtdEYVKF6f21d940