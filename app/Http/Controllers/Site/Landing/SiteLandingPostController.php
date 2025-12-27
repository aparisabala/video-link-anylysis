<?php

namespace App\Http\Controllers\Site\Landing;

use App\Http\Controllers\Controller;
use App\Models\IpTracking;
use App\Models\VideoLink;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\View\View;
use App\Traits\BaseTrait;
use App\Repositories\Site\Landing\ISiteLandingRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use DB;
//vpx_imports
class SiteLandingPostController extends Controller
{
    use BaseTrait;
    public function __construct()
    {
        $this->lang = 'site.landing.index';
    }
    /**
     * View Site lading page
     *
     * @param Request $request
     * @return View
     */
    public function postUrl(Request $request) : JsonResponse
    {
        $row = VideoLink::find($request->id);
        if(empty($row)) {
            return $this->response(['type'=>'noUpdate','title'=> pxLang($this->lang,'text.link_not_found')]);
        }
        $date = Carbon::now()->format('Y-m-d');
        $ip = $request->ip();
        $an = IpTracking::where([['user_ip','=',$ip],['query_date','=',$date]])->first();
        DB::beginTransaction();
        try {
            $row->total_click += 1;
            $row->save();
            if($an == null) {
                $an =  new IpTracking;
                $an->query_date = $date;
                $an->user_ip = $ip;
                $an->click_count += 1;
                $an->save();
            } else {
                $an->click_count += 1;
                $an->save();
            }
            $response['extraData'] = [
                'inflate' => pxLang('','','common.action_success'),
                'product' => $row
            ];
            DB::commit();
            return $this->response(['type' => 'success', 'data' => $response]);
        } catch (\Exception $e) {
            $this->saveError($this->getSystemError(['name' => 'UqProfession_store_error']), $e);
            return $this->response(['type' => 'wrong', 'lang' => 'server_wrong']);
        }
    }
    //vpx_attach
}
