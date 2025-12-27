@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')])
@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <div class="page-header">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="swiper p-0">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{url('images/system/sld1.jpg')}}" class="img-fluid" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{url('images/system/sld2.jpg')}}" class="img-fluid"/>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($data['items'] as $item)
                        <div class="col-6 mb-3 mt-2">
                            <div>
                                <img src="{{getRowImage(row: $item,col:'image', ext: '640X360')}}" class="img-fluid" />
                            </div>
                            <h5 class="text-center fs-13"><span class="count-click" data-id="{{$item?->id}}"> {{$item?->name}} </span></h5>
                        </div>
                    @endforeach
                    <div class="col-6 mb-3 mt-2">
                        <div class="d-flex flex-row justify-content-center  vip-base">
                            <img class="img-vip" src="{{url('images/system/vip.jpg')}}" class="w-100 h-100" />
                        </div>
                        <h5 class="text-center fs-13"><span class="count-click"> dfgd </span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
