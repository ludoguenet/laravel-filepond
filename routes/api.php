<?php

use App\Http\Controllers\SendFormController;
use Illuminate\Support\Facades\Route;

Route::post('send-form', SendFormController::class);
