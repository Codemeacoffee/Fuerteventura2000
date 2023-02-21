@extends('layout')
@section('header')
@section('title')Política de Seguridad - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($securityPolicyTexts['text-1']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$securityPolicyTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$securityPolicyTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- S E C U R I T Y   P O L I C Y  -->

<div>
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-1">{!! $securityPolicyTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0 ed-text" data-ed="text-1">
                            {!! $securityPolicyTexts['text-1'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   S E C U R I T Y   P O L I C Y -->

@stop
@section('footer')
