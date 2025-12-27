@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')])
@section('page')
@php
    $data['items'] = [1,2,3,4,5,6,7,8,9,10];
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <div class="page-header">
                    <h1 class="fw-bold text-white"> Header </h1>
                </div>
                <div class="row">
                    @foreach ($data['items'] as $item)
                        <div class="col-6 mb-3 p-1">
                            <div>
                                <img src="https://placehold.co/640X360" class="img-fluid" />
                            </div>
                            <h5><a href="#"> Title of the video </a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
