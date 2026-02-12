<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 

// Route::get('/URL', [ControllerName::class, 'Function_Name']);

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/tour', [PageController::class, 'tour']);