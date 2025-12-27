<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;

class IpTracking extends Model
{
    use BaseTrait;
    protected $table = "ip_trackings";
    protected $fillable = [
        'query_date',
        'video_link_id',
        'click_count',
    ];
    public function product()
    {
        return $this->hasOne(VideoLink::class,'id','video_link_id');
    }

    public function ips()
    {
        return $this->hasMany(IpTrackingIp::class,'ip_tracking_id','id');
    }
}
