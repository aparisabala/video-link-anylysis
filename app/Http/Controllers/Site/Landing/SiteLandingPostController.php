<?php

namespace App\Http\Controllers\Site\Landing;

use App\Http\Controllers\Controller;
use App\Models\IpTracking;
use App\Models\IpTrackingIp;
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
        $an = IpTracking::where([['query_date','=',$date],['video_link_id','=',$row->id]])->first();
        DB::beginTransaction();
        try {
            if($an == null) {
                $an =  new IpTracking;
                $an->query_date = $date;
                $an->video_link_id = $row->id;
                $an->click_count += 1;
                $an->save();
                $i = new IpTrackingIp;
                $i->ip_tracking_id = $an?->id;
                $i->user_ip = $ip;
                $i->save();
                $row->total_click += 1;
                $row->save();
            }
            // else {
            //     $an->click_count += 1;
            //     $an->save();
            // }
            $response['extraData'] = [
                'inflate' => pxLang('','','common.action_success'),
                'product' => $row
            ];
            DB::commit();
            return $this->response(['type' => 'success', 'data' => $response]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->saveError($this->getSystemError(['name' => 'UqProfession_store_error']), $e);
            return $this->response(['type' => 'wrong', 'lang' => 'server_wrong']);
        }
    }
    //vpx_attach
}
