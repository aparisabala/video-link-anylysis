@extends('admin.layouts.main-layout',["tabTitle" => config('i.service_name')." | ".pxLang($data['lang'],'breadCum.title') ])
@section('page')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                @include('admin.pages.user-history.dt.user-visit-history.fragments._breadcum')
                <div class="page-block-body">
                    <div class="card rounded page-block">

                        <div id="defaultPage" class="table-list pages">
                            <div class="mt-2 p-2 p-md-4">
                                <input type="hidden" id="page-lang" value="{{ json_encode(Lang::get(config('pxcommands.language')[$data['lang']])) }}" />
                                @if(count($data['items']) > 0)
                                    @include('common.view.fragments._show-selected')
                                    @include('common.view.fragments._pdf-layout',['docTitle' => 'UserVisitHistory List'])
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="dtUserVisitHistory"></table>
                                    </div>
                                @else
                                    @include('common.view.fragments._no-list-data')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
