<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Landing\SiteLandingController;
use App\Http\Controllers\Site\Landing\SiteLandingPostController;

//vpx_imports
    Route::get('/', [SiteLandingController::class,'index'])->name('site.index');
    Route::post('site/post-url', [SiteLandingPostController::class,'postUrl']);

//vpx_attach
