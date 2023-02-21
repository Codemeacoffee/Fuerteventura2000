@extends('layout')
@section('header')
@section('title')Convenios - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($covenantsTexts['text-1']), 0, 152).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$covenantsTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$covenantsTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- T R A N S P A R E N C Y   P O R T A L -->

<div>
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-1">{!! $covenantsTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0 ed-text" data-ed="text-1">
                            {!! $covenantsTexts['text-1'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
            <div class="d-flex mb-5">
                <h1 class="color-slate-blue noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-2">{!! $covenantsTexts['title-2'] !!}</strong></h1>
                <hr class="titleHr w-100 mt-5">
            </div>
        </div>
    </div>
    @include('transparencyPortalLinks')
</div>

@stop
@section('footer')
