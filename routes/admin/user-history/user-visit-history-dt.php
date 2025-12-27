<?php

use App\Http\Controllers\Admin\UserHistory\Dt\UserVisitHistory\UserVisitHistoryDtController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::get('user-history/user-visit-history/list',[UserVisitHistoryDtController::class,'index']);
    Route::post('user-history/user-visit-history/list',[UserVisitHistoryDtController::class,'list']);
    //vpx_attach
});
