<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ComponentController::class, 'home']);

Route::get('/addType', function () {
    return view ('addType');
  });
Route::get('/insert',[ComponentController::class, 'typedisp']);

Route::post('/component/store',[ComponentController::class, 'store']);

Route::post('/insert/typestore',[ComponentController::class, 'typestore']);

Route::post('/type/update/{id}',[ComponentController::class, 'typeupdate']);

Route::post('/save/{id}',[ComponentController::class, 'save']);

Route::post('/component/update/{id}',[ComponentController::class, 'updateitem']);

Route::get('/display/{id}',[ComponentController::class, 'index']);

Route::get('/saveItem/{id}',[ComponentController::class, 'saveitem']);

Route::get('/deleteitem/{id}',[ComponentController::class, 'deleteitem']);

Route::get('/typedelete/{id}',[ComponentController::class, 'deletetype']);

Route::get('/viewItems/{id}',[ComponentController::class, 'view']);

Route::get('/typeUpdate/{id}',[ComponentController::class, 'typeUpdate']);

Route::get('/itemType',  [ComponentController::class, 'itemType']);