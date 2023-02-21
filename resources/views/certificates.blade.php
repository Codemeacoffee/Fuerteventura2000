@extends('layout')
@section('header')
@section('title')Nuestros certificados - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($certificateTexts['text-1'].' '.
$certificateTexts['title-2'].', '.$certificateTexts['title-3'].', '.$certificateTexts['title-4']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$certificateTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$certificateTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong class="ed-text-minus" data-ed="title-1">{!! $certificateTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row px-sm-4 px-0 mb-4">
                        <div class="ed-text w-100" data-ed="text-1">{!! $certificateTexts['text-1'] !!}</div>
                    </div>
                    <div class="row align-items-center my-5">
                        <div class="col-lg-2 col-md-3 offset-md-0 col-sm-6 offset-sm-3 col-12 offset-0">
                            <img class="w-100 mb-md-0 mb-4 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$certificateTexts['img-2'])}}">
                        </div>
                        <div class="col-lg-8 col-md-7 offset-md-1 col-12 offset-0">
                            <div>
                                <h4 class="color-slate-blue mb-4">
                                    <strong class="ed-text-minus" data-ed="title-2">{!! $certificateTexts['title-2'] !!}</strong>
                                </h4>
                                <div class="ed-text w-100" data-ed="text-2">
                                    {!! $certificateTexts['text-2'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center my-5">
                        <div class="col-lg-8 col-md-7 col-12">
                            <div>
                                <h4 class="color-slate-blue mb-4">
                                    <strong class="ed-text-minus" data-ed="title-3">{!! $certificateTexts['title-3'] !!}</strong>
                                </h4>
                                <div class="ed-text" data-ed="text-4">
                                    {!! $certificateTexts['text-4'] !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 offset-md-1 col-sm-6 offset-sm-3 col-12 offset-0 mt-md-0 mt-4">
                            <img class="w-100 ed-img" data-ed="img-3" src="{{asset('images/uploads/'.$certificateTexts['img-3'])}}">
                        </div>
                    </div>
                    <div class="row align-items-center my-5">
                        <div class="col-lg-2 col-md-3 offset-md-0 col-sm-6 offset-sm-3 col-12 offset-0">
                            <img class="w-100 mb-md-0 mb-4 ed-img" data-ed="img-4" src="{{asset('images/uploads/'.$certificateTexts['img-4'])}}">
                        </div>
                        <div class="col-lg-8 col-md-7 offset-md-1 col-12 offset-0">
                            <div>
                                <h4 class="color-slate-blue mb-4">
                                    <strong class="ed-text-minus" data-ed="title-4">{!! $certificateTexts['title-4'] !!}</strong>
                                </h4>
                                <div class="ed-text w-100" data-ed="text-5">
                                    {!! $certificateTexts['text-5'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center my-5">
                        <div class="col-lg-8 col-md-7 col-12">
                            <div>
                                <h4 class="color-slate-blue mb-4">
                                    <strong class="ed-text-minus" data-ed="title-5">{!! $certificateTexts['title-5'] !!}</strong>
                                </h4>
                                <div class="ed-text" data-ed="text-6">
                                    {!! $certificateTexts['text-6'] !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 offset-md-1 col-sm-6 offset-sm-3 col-12 offset-0">
                            <img class="w-100 ed-img" data-ed="img-5" src="{{asset('images/uploads/'.$certificateTexts['img-5'])}}">
                        </div>
                    </div>
                    <div class="row align-items-center my-5">
                        <div class="col-lg-2 col-md-3 offset-md-0 col-sm-6 offset-sm-3 col-12 offset-0">
                            <img class="w-100 mb-md-0 mb-4 ed-img" data-ed="img-6" src="{{asset('images/uploads/'.$certificateTexts['img-6'])}}">
                        </div>
                        <div class="col-lg-8 col-md-7 offset-md-1 col-12 offset-0">
                            <div>
                                <h4 class="color-slate-blue mb-4">
                                    <strong class="ed-text-minus" data-ed="title-6">{!! $certificateTexts['title-6'] !!}</strong>
                                </h4>
                                <div class="ed-text w-100" data-ed="text-7">
                                    {!! $certificateTexts['text-7'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer')
