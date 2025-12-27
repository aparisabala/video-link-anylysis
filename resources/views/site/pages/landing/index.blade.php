@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')])
@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">

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
                <div class="page-header mt-3 mb-2">
                    <div class="d-flex flex-row justify-content-start align-items-center">
                        <div class="vertical-line me-2"></div>
                        <h1 class="text-white fw bold fs-18 me-2 mt-1"> 免费领取会员 </h1>
                        <img src="{{url('images/system/video_img.png')}}" class="video-image" />
                    </div>
                </div>
                <div class="row">
                    @foreach ($data['items'] as $item)
                        <div class="col-6 mb-3 cursor-pointer onClickProduct" data-id="{{$item?->id}}">
                            <div>
                                <img src="{{getRowNoExtension(row: $item,col:'image')}}" class="display-image" />
                            </div>
                            <h5 class="text-center fs-13 mt-1"><span class="count-click" data-id="{{$item?->id}}"> {{$item?->name}} </span></h5>
                        </div>
                    @endforeach
                    <div class="col-6 mb-3 cursor-pointer">
                        <div class="d-flex flex-row justify-content-center vip-base">
                            <img class="img-vip" src="{{url('images/system/vip.jpg')}}" class="w-100 h-100" />
                        </div>
                        <h5 class="text-center fs-13  mt-1"><span class="count-click"> 免费领取会员 </span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
