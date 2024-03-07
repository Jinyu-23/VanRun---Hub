<?php

use App\Http\Controllers\LogInController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LogInController::class, 'submit']);
