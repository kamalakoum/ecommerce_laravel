<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;

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

Route::post('/insert_product',[ProductsController::class,'insert_product']);
Route::post('/update_product',[ProductsController::class,'update_product']);
Route::get('/products', [ProductsController::class,'get_product']);
Route::post('/delete_product', [ProductsController::class, 'delete_product']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);


// Route::post('/register', [ProductsController::class, 'register']);
// Route::post('/login', [ProductsController::class, 'login']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//not a good practice just used to test 
// Route::get('/hello', function(){
//     echo "hello from laravel api";
// });

// Route::post('/posting-from-laravel',function(){
//     echo "hello from post";
// });

// Route::get('/hello-from-controller/{name?}' ,[LaravelController::class , 'hello_controller']);

// Route::post('/hello-from-post' ,[LaravelController::class , 'post_example']);