<?php

namespace App\Repositories\Site\Landing;

use App\Models\VideoLink;
use App\Repositories\BaseRepository;

class SiteLandingRepository  extends BaseRepository implements ISiteLandingRepository
{

    /**
     * Landing  data
     *
     * @param Request $request
     * @return array
     */
    public function display($request) : array
    {
        $data['item'] = null;
        $data['items'] = VideoLink::orderBy('serial','ASC')->take(25)->get();
        return $data;
    }
}
