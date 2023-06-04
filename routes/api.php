<?php

use App\Http\Controllers\SendFormController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->as('api')
    ->post('send-form', SendFormController::class);
