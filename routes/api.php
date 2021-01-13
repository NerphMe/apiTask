<?php

use App\Http\Controllers\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{id}', [ProductApiController::class, 'getProducts']);
Route::get('/categories', [ProductApiController::class, 'getСategorys']);
Route::post('/under_categories', [ProductApiController::class, 'createUnderCategory']);
Route::get('/get/products/under_categories/{id}', [ProductApiController::class, 'getUnderCategories']);
Route::post('/addSeller', [ProductApiController::class, 'addSeller']);
Route::put('/updateSeller/{id}', [ProductApiController::class, 'changeSellerCategory']);
Route::delete('/removeSeller/{id}', [ProductApiController::class, 'removeSeller']);
Route::get('/categories/products/{id}', [ProductApiController::class, 'getProductsInCategories']);
Route::get('/newProduct', [ProductApiController::class, 'newProduct']);
Route::delete('/removeProduct/{id}', [ProductApiController::class, 'removeProduct']);
