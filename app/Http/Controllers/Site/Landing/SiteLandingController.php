<?php

namespace App\Http\Controllers\Site\Landing;

use App\Http\Controllers\Controller;
use App\Models\DataKeyword;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\View\View;
use App\Traits\BaseTrait;
use App\Repositories\Site\Landing\ISiteLandingRepository;
//vpx_imports
class SiteLandingController extends Controller
{
    use BaseTrait;
    public function __construct(private ISiteLandingRepository $iSiteLandingRepo)
    {
        $this->lang = 'site.landing.index';
    }

    /**
     * View Site lading page
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->display($request)];
        return view('site.pages.landing.index')->with('data',$data);
    }

     /**
     * View Site lading page
     *
     * @param Request $request
     * @return View
     */
    public function vip(Request $request) : View
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->display($request)];
        $data['keyWord'] = DataKeyword::take(1)->inRandomOrder()->first();
        return view('site.pages.vip.index')->with('data',$data);
    }
     /**
     * View Site lading page
     *
     * @param Request $request
     * @return View
     */
    public function slider(Request $request) : View
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->display($request)];
        $data['keyWord'] = DataKeyword::take(1)->inRandomOrder()->first();
        return view('site.pages.slider.index')->with('data',$data);
    }

    //vpx_attach
}
