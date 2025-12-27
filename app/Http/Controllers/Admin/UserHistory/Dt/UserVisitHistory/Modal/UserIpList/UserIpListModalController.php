<?php

namespace App\Http\Controllers\Admin\UserHistory\Dt\UserVisitHistory\Modal\UserIpList;
use App\Http\Controllers\Controller;
use App\Traits\BaseTrait;
use Illuminate\Http\JsonResponse;
use View;
use Illuminate\Http\Request;
use App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\Modal\UserIpList\IUserIpListRepository;
//vpx_imports

class UserIpListModalController extends Controller {

    use BaseTrait;
    public function __construct(private IUserIpListRepository $iUserIpListRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth','SetAdminLanguage']);
        $this->lang= 'admin.user-history.dt.user-visit-history.modal.user-ip-list';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });

    }

    /**
     * Loaded page for useriplist
     *
     * @param Request $request
     * @return View
     */
    public function display(Request $request) : JsonResponse
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iUserIpListRepo->display($request)];
        $view = View::make('admin.pages.user-history.dt.user-visit-history.modal.user-ip-list._modal', compact('data'))->render();
        $response = ['extraData' => ['inflate' => pxLang($data['lang'],'','common.response_success')],'view' => $view];
        return $this->response(['type' => 'success', 'data' => $response]);
    }
    //vpx_attach

}
