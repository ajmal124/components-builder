<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentController;

// routes/api.php
Route::get('/type', [ComponentController::class,'fetch']);




