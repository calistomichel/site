<?php

use Illuminate\Support\Facades\Route;
use MichelCalisto\Site\Http\Controllers\SiteController;

Route::middleware(['auth:sanctum', 'verified'])->resource('/sites', SiteController::class);