<?php

namespace App\Http\Controllers\Admin\LinkManagement\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LinkManagement\Crud\ValidateStoreVideoLink;
use App\Repositories\Admin\LinkManagement\Crud\IVideoLinkCrudRepository;
use App\Traits\BaseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class VideoLinkCrudController  extends Controller {

    use BaseTrait;
    public function __construct(private IVideoLinkCrudRepository $iVideoLinkCrudRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth','SetAdminLanguage']);
        $this->lang= 'admin.link-management.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });

    }

    /**
     * Index page for videolink crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iVideoLinkCrudRepo->index($request);
        $data['lang'] = $this->lang;
        return view('admin.pages.link-management.crud.index',compact('data'));
    }

    /**
     * List items for yajra datatable for videolink crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iVideoLinkCrudRepo->list($request);
    }

    /**
     * Store procedure for comapany crud
     *
     * @param ValidateStoreVideoLink $request
     * @return JsonResponse
     */
    public function store(ValidateStoreVideoLink $request): JsonResponse
    {
        return $this->iVideoLinkCrudRepo->store($request);
    }

    /**
     * Index page for view
     *
     * @param integer|string $id
     * @param Request $request
     * @return view
     */
    public function edit($id,Request $request) : view
    {
        $data = $this->iVideoLinkCrudRepo->index($request,$id);
        $data['lang'] = $this->lang;
        return view('admin.pages.link-management.crud.index', compact('data'));
    }

    /**
     * Update procedure for videolink
     *
     * @param Request $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return $this->iVideoLinkCrudRepo->update($request,$id);
    }

    /**
     * Bulk delete list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function deleteList(Request $request) : JsonResponse
    {
       return $this->iVideoLinkCrudRepo->deleteList($request);
    }


    /**
     * Bulk update list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function updateList(Request $request) : JsonResponse
    {
       return $this->iVideoLinkCrudRepo->updateList($request);
    }

}
