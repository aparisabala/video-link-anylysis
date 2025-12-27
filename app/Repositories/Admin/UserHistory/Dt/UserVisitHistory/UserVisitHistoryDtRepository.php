<?php

namespace App\Repositories\Admin\UserHistory\Dt\UserVisitHistory;

use App\Models\IpTracking;
use App\Repositories\BaseRepository;
use App\Traits\BaseTrait;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\JsonResponse;
class UserVisitHistoryDtRepository extends BaseRepository implements IUserVisitHistoryDtRepository {

    use BaseTrait;
    public function __construct() {
        $this->LoadModels(['IpTracking']);
    }

    /**
     * Get the page default resource
     *
     * @param Request $request
     * @param integer|string $id
     * @return array
     */
    public function index($request) : array
    {
       return $this->getPageDefault(model: $this->IpTracking, id: null);
    }


    /**
     * Yajra datatbale list resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list($request) : JsonResponse
    {
        $model = IpTracking::with(['product'])->withCount('ips');
        $this->saveTractAction(
            $this->getTrackData(
                title: 'IpTracking was viewed by '.$request?->auth?->name.' at '.Carbon::now()->format('d M Y H:i:s A'),
                request: $request,
                onlyTitle: true
            )
        );
        return DataTables::of($model)
        ->editColumn('created_at', function($item) {
            return  Carbon::parse($item->created_at)->format('d-m-Y');
        })
        ->addColumn('image', function($item) {
            $image = getRowNoExtension(row: $item->product,col:'image');
            return  "<img src='$image'  style='width: 80px; height: 80px;'/>";
        })
        ->addColumn('ips_count', function($item) {
            return $item->ips_count; // comes from withCount('ips')
        })
        ->orderColumn('ips_count', function($query, $order) {
            $query->orderBy('ips_count', $order);
        })
        ->filterColumn('ips_count', function($query, $keyword) {
            $query->having('ips_count', 'like', "%{$keyword}%");
        })
        ->escapeColumns([])
        ->make(true);
    }
}
