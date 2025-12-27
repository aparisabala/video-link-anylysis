<?php

use App\Http\Controllers\Admin\UserHistory\Dt\UserVisitHistory\Modal\UserIpList\UserIpListModalController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::post('user-history/dt/user-visit-history/user-ip-list/display',[UserIpListModalController::class,'display']);
    //vpx_attach
});