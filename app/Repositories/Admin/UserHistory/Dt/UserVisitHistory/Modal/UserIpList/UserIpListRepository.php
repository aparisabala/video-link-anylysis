<?php

namespace App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\Modal\UserIpList;

use App\Models\IpTracking;
use App\Models\IpTrackingIp;
use App\Repositories\BaseRepository;

class UserIpListRepository extends BaseRepository implements IUserIpListRepository
{

    /**
     * Modal  data
     *
     * @param Request $request
     * @return array
     */
    public function display($request) : array
    {
        $data['item'] = IpTracking::find($request->id);
        $data['items'] = IpTrackingIp::where([['ip_tracking_id','=',$data['item']?->id]])->select(['id','user_ip','click_count','created_at'])->get();
        return $data;
    }
}
