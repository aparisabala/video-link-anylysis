<?php

use App\Http\Controllers\Admin\Keyword\Crud\DataKeywordCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('keyword',DataKeywordCrudController::class)->except(['destroy', 'show']);
    Route::post('keyword/list',[DataKeywordCrudController::class,'list']);
    Route::post('keyword/delete-list',[DataKeywordCrudController::class,'deleteList']);
    Route::post('keyword/update-list',[DataKeywordCrudController::class,'updateList']);
    //vpx_attach
});
