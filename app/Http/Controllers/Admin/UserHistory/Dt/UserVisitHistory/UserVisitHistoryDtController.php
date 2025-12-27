<?php

namespace App\Http\Controllers\Admin\UserHistory\Dt\UserVisitHistory;
use App\Http\Controllers\Controller;
use App\Models\IpTracking;
use App\Models\IpTrackingIp;
use App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\IUserVisitHistoryDtRepository;
use App\Traits\BaseTrait;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class UserVisitHistoryDtController extends Controller {

    use BaseTrait;
    public function __construct(private IUserVisitHistoryDtRepository $iUserVisitHistoryDtRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth','SetAdminLanguage']);
        $this->lang= 'admin.user-history.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });

    }

    /**
     * Index page for uservisithistory crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iUserVisitHistoryDtRepo->index($request);
        $data['lang'] = $this->lang;
        $date = Carbon::now()->format('Y-m-d');
        $data['total_click'] = IpTracking::where([['query_date','=',$date]])->sum('click_count');
        $data['ids'] = IpTracking::where([['query_date','=',$date]])->pluck('id')->toArray();
        $data['total_ip'] = IpTrackingIp::whereIn('ip_tracking_id',$data['ids'])->count();
        return view('admin.pages.user-history.dt.user-visit-history.index',compact('data'));
    }

    /**
     * List items for yajra datatable for uservisithistory   crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iUserVisitHistoryDtRepo->list($request);
    }

}
