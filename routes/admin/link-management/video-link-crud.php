<?php

use App\Http\Controllers\Admin\LinkManagement\Crud\VideoLinkCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('link-management',VideoLinkCrudController::class)->except(['destroy', 'show']);
    Route::post('link-management/list',[VideoLinkCrudController::class,'list']);
    Route::post('link-management/delete-list',[VideoLinkCrudController::class,'deleteList']);
    Route::post('link-management/update-list',[VideoLinkCrudController::class,'updateList']);
    //vpx_attach
});
