@extends('layout')
@section('header')
@section('title'){!! $new['title']  !!} - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($new['content']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$new['image'])}} @endsection
@section('keyword')<?php echo $new['title'].', '?>@endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75" alt="{{$new['imageAlt']}}" src="{{asset('images/uploads/'.$new['image'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- N E W -->

<div id="new" class="container-fluid mb-6">
    <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
            <div class="d-flex mb-5">
                <h1 class="color-slate-blue noWrap pr-4"><strong>{{$new['title']}}</strong></h1>
                <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-2 px-0">
                        <div class="container-fluid">
                            <div class="row mb-5">
                                <div class="col-md-6 col-12">
                                    {!! $new['content'] !!}
                                </div>
                                <div class="col-md-6 offset-md-0 col-sm-10 offset-sm-1 col-12 offset-0">
                                    <img class="w-100 fixedHeightImg rounded" alt="{{$new['imageAlt']}}" src="{{url('images/uploads/'.$new['image'])}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   N E W -->

<!-- N E W S -->

<div id="news">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap pr-4"><strong>Noticias</strong></h1>
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
