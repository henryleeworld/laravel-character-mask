<?php

use App\Http\Controllers\MaskedController;
use Illuminate\Support\Facades\Route;

Route::get('redact-data/', [MaskedController::class, 'redactData']);
