<?php

namespace App\Http\Controllers\Admin\Keyword\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Keyword\Crud\ValidateStoreDataKeyword;
use App\Repositories\Admin\Keyword\Crud\IDataKeywordCrudRepository;
use App\Traits\BaseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class DataKeywordCrudController  extends Controller {

    use BaseTrait;
    public function __construct(private IDataKeywordCrudRepository $iDataKeywordCrudRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth']);
        $this->lang= 'admin.keyword.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });

    }

    /**
     * Index page for datakeyword crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iDataKeywordCrudRepo->index($request);
        $data['lang'] = $this->lang;
        return view('admin.pages.keyword.crud.index',compact('data'));
    }

    /**
     * List items for yajra datatable for datakeyword crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iDataKeywordCrudRepo->list($request);
    }

    /**
     * Store procedure for comapany crud
     *
     * @param ValidateStoreDataKeyword $request
     * @return JsonResponse
     */
    public function store(ValidateStoreDataKeyword $request): JsonResponse
    {
        return $this->iDataKeywordCrudRepo->store($request);
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
        $data = $this->iDataKeywordCrudRepo->index($request,$id);
        $data['lang'] = $this->lang;
        return view('admin.pages.keyword.crud.index', compact('data'));
    }

    /**
     * Update procedure for datakeyword
     *
     * @param Request $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return $this->iDataKeywordCrudRepo->update($request,$id);
    }

    /**
     * Bulk delete list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function deleteList(Request $request) : JsonResponse
    {
       return $this->iDataKeywordCrudRepo->deleteList($request);
    }


    /**
     * Bulk update list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function updateList(Request $request) : JsonResponse
    {
       return $this->iDataKeywordCrudRepo->updateList($request);
    }

}