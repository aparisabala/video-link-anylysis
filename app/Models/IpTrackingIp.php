<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;

class IpTrackingIp extends Model
{
    use BaseTrait;
    protected $table = "ip_tracking_ips";
    protected $fillable = [
        'ip_tracking_id',
        'user_ip',
    ];
}
