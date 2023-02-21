@extends('layout')
@section('header')
@section('title')Configurar Cookies - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($configCookiesTexts['text-1']), 0, 152).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$configCookiesTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$configCookiesTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- C O O K I E S   C O N F I G U R A T I O N -->

<div>
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-1">{!! $configCookiesTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0 ed-text" data-ed="text-1">
                            {!! $configCookiesTexts['text-1'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-6">
    <div class="row">
        <div class="col-xl-8 offset-xl-2 col-12 offset-0 px-xl-0 px-lg-5">
             <div class="custom-control custom-switch">
                <input type="checkbox" class="cookiesConfigField custom-control-input" id="googleAnalyticsSwitch" name="Google Analytics" checked="true">
                <label class="custom-control-label" for="googleAnalyticsSwitch"><strong>Google Analytics</strong></label>
            </div>
            <div class="text-center mt-5">
                <button onclick="configCookies()" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
            </div>
        </div>
    </div>
</div>

<!-- E N D   C O O K I E S   C O N F I G U R A T I O N -->

@stop
@section('footer')
