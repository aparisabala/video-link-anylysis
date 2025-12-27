<?php

namespace App\Repositories\Admin\UserHistory\Dt\UserVisitHistory;

use Illuminate\Http\JsonResponse;

interface IUserVisitHistoryDtRepository {

    public function index($request) : array;
    public function list($request) : JsonResponse;
}
