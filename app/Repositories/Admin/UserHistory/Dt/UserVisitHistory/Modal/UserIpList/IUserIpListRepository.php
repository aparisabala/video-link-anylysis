<?php

namespace App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\Modal\UserIpList;

use Illuminate\Http\JsonResponse;

interface IUserIpListRepository {

    public function display($request) : array;
}
