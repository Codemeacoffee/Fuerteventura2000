@extends('layout')
@section('header')
@section('title')¿Quiénes Somos? - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($aboutUsTexts['text-1']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$aboutUsTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$aboutUsTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- O P T I O N S -->

<div id="genericOptions" class="overlapTop d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-10 offset-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="w-100 h-100 bg-grey rounded shadow pb-5">
                                <img class="w-50 centerHorizontal py-4 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$aboutUsTexts['img-2'])}}">
                                <h2 class="color-slate-blue text-center mx-4 ed-text-minus" data-ed="options-1">{!! $aboutUsTexts['options-1'] !!}</h2>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="w-100 h-100 bg-grey rounded shadow pb-5">
                                <img class="w-50 centerHorizontal py-4 ed-img" data-ed="img-3" src="{{asset('images/uploads/'.$aboutUsTexts['img-3'])}}">
                                <h2 class="color-slate-blue text-center mx-4 ed-text-minus" data-ed="options-2">{!! $aboutUsTexts['options-2'] !!}</h2>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="w-100 h-100 bg-grey rounded shadow pb-5">
                                <img class="w-50 centerHorizontal py-4 ed-img" data-ed="img-4" src="{{asset('images/uploads/'.$aboutUsTexts['img-4'])}}">
                                <h2 class="color-slate-blue text-center mx-4 ed-text-minus" data-ed="options-3">{!! $aboutUsTexts['options-3'] !!}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   O P T I O N S -->

<!-- A B O U T   U S -->

<div id="aboutUs" class="moveTop mt0-tablet-mobile">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid bg-slate-blue rounded">
                                <div class="row p-lg-5 py-4">
                                    <div class="col-lg-7 col-12">
                                        <img class="w-100 ed-img" data-ed="img-5" alt="Trazado con siluetas en blanco de diferentes personas" src="{{asset('images/uploads/'.$aboutUsTexts['img-5'])}}">
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <h1 class="text-white mt-4 ed-text-minus" data-ed="title-1">
                                            {!! $aboutUsTexts['title-1'] !!}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-4 mt-4">
                       <div class="ed-text w-100" data-ed="text-1">{!! $aboutUsTexts['text-1'] !!}</div>
                    </div>
                    <div class="row px-4 mt-4">
                        <div class="col-md-6 col-12 px-0 mb-md-0 mb-4">
                            <img class="w-100 h-400 ed-img" data-ed="img-6" src="{{asset('images/uploads/'.$aboutUsTexts['img-6'])}}">
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="m-lg-5 m-md-4 m-0">
                                <h4 class="color-slate-blue">
                                    <strong class="ed-text-minus" data-ed="title-2">{!! $aboutUsTexts['title-2'] !!}</strong>
                                </h4>
                                <br>
                                <div class="ed-text w-100" data-ed="text-2">
                                    {!! $aboutUsTexts['text-2'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-4 mt-4">
                        <div class="ed-text w-100" data-ed="text-3">{!! $aboutUsTexts['text-3'] !!}</div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6 col-12 px-4 mb-md-0 mb-4">
                                <h4 class="color-slate-blue">
                                    <strong class="ed-text-minus" data-ed="title-3">{!! $aboutUsTexts['title-3'] !!}</strong>
                                </h4>
                                <br>
                                <div class="ed-text" data-ed="text-4">
                                    {!! $aboutUsTexts['text-4'] !!}
                                </div>
                            </div>
                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                            <img class="w-100 h-400 ed-img" data-ed="img-7" src="{{asset('images/uploads/'.$aboutUsTexts['img-7'])}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   A B O U T   U S -->

<!-- D I S C O V E R   U S -->

<div id="discoverUs">
    <div class="container-fluid">
        <div class="row position-relative z-index-0">
            <div class="w-100 z-index-0">
                <img class="w-100 h-400 ed-img" data-ed="img-8" src="{{asset('images/uploads/'.$aboutUsTexts['img-8'])}}">
                <div class="textBox absoluteCenterBoth w-xs-100 px-sm-0 px-3">
                    <h1 class="text-white text-center clamp ed-text-minus" data-ed="title-4">{!! $aboutUsTexts['title-4'] !!}</h1>
                    <h4 class="text-center text-white font-weight-light mb-5 ed-text-minus" data-ed="subTitle-1">{!! $aboutUsTexts['subTitle-1'] !!}</h4>
                </div>
                <div class="layer"></div>
            </div>
        </div>
        <div class="accessBox bg-deep-blue rounded w-50 w-md-75 w-xs-100 shadow">
            <div class="container-fluid">
                <div class="row align-items-center py-md-5 py-4 px-md-0 px-2">
                    <div class="col-md-6 offset-md-1 px-lg-4 px-md-0">
                        <p class="text-white ed-text-minus" data-ed="text-5">{!! $aboutUsTexts['text-5'] !!}</p>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-md-4 offset-md-1">
                        <a href="https://fuerteventura2000.agenciascolocacion.com/" target="_blank"><button class="btn border-white text-white px-4 centerHorizontal"><strong>Acceder</strong></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   D I S C O V E R   U S -->

<!-- N E W S -->

<div id="news">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap pr-4"><strong class="ed-text-minus" data-ed="title-5">{!! $aboutUsTexts['title-5'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
                            <div class="container-fluid">
                                <div class="row mb-5">
                                    <div id="mobileNewsSwiper" class="swiper-container d-md-inline-block d-lg-none">
                                        <div class="swiper-wrapper">
                                            <?php

                                            foreach ($news as $new){
                                                echo '<div class="swiper-slide">
                                            <div class="col-12">
                                            <a href="'.url('new/'.$new['title'].'?key='.$new['id']).'">
                                            <div class="w-100 rounded shadow new">
                                            <img alt="'.$new['imageAlt'].'" class="w-100 h-100 swiper-lazy" data-src="'.asset('images/uploads/'.$new['image']).'">
                                            <div class="swiper-lazy-preloader"></div>
                                            <h5 class="text-white"><strong>'.$new['title'].'</strong></h5>
                                            <div class="layer"></div>
                                            </div>
                                            </a>
                                            </div>
                                            </div>';
                                            }

                                            echo '</div></div>';

                                            $first = true;

                                            foreach ($news as $new){
                                                echo '<div class="d-lg-inline-block d-none ';

                                                if($first) echo 'col-lg-6 col-md-4 col-sm-6';
                                                else echo 'col-lg-3 col-md-4 col-6';

                                                echo '">
                                            <a href="'.url('new/'.$new['title'].'?key='.$new['id']).'">
                                            <div class="w-100 rounded shadow new">
                                            <img alt="'.$new['imageAlt'].'" class="w-100 h-100" src="'.asset('images/uploads/'.$new['image']).'">
                                            <h5 class="text-white"><strong>'.$new['title'].'</strong></h5>
                                            <div class="layer"></div>
                                            </div>
                                            </a>
                                            </div>';
                                                $first = false;
                                            }

                                            ?>
                                        </div>
                                        <a href="{{url('news')}}"><button class="btn color-deep-blue border-deep-blue centerHorizontal px-4"><strong class="noWrap">Más noticias</strong></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- E N D   N E W S -->

@stop
@section('footer')
