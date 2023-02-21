@extends('layout')
@section('header')
@section('title')Ofertas de Trabajo - Fuerteventura2000 @endsection
@section('description')En Fuerteventura2000 disponemos de una gran selección de ofertas de trabajo tanto en Fuerteventura como en Gran Canaria y Tenerife. @endsection
@section('img'){{asset('images/uploads/'.$officesTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img alt="Imagen de cabecera del apartado Cursos" class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$officesTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!--  L O C A T I O N   O P T I O N S -->

<div id="genericOptions" class="overlapTop d-lg-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <a href="{{url('offices/Fuerteventura')}}">
                                <div class="w-100 bg-grey option rounded shadow <?php if($location == 'Fuerteventura') echo 'current' ?>">
                                    <i class="icon-FV d-inline-block color-slate-blue centerHorizontal py-5"></i>
                                    <h3 class="color-slate-blue text-center noWrap pb-5">Fuerteventura</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{url('offices/Gran Canaria')}}">
                                <div class="w-100 bg-grey option rounded shadow <?php if($location == 'Gran Canaria') echo 'current' ?>">
                                    <i class="icon-GC d-inline-block color-slate-blue centerHorizontal py-5"></i>
                                    <h3 class="color-slate-blue text-center noWrap pb-5">Gran Canaria</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{url('offices/Tenerife')}}">
                                <div class="w-100 bg-grey option rounded shadow <?php if($location == 'Tenerife') echo 'current' ?>">
                                    <i class="icon-TF d-inline-block color-slate-blue centerHorizontal py-5"></i>
                                    <h3 class="color-slate-blue text-center noWrap pb-5">Tenerife</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="w-100 bg-grey option rounded shadow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6 px-0">
                                            <a href="{{url('offices/Lanzarote')}}">
                                                <div <?php if($location == 'Lanzarote') echo 'class="current"' ?>>
                                                    <i class="icon-LNT d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">Lanzarote</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 px-0">
                                            <a href="{{url('offices/La Palma')}}">
                                                <div <?php if($location == 'La Palma') echo 'class="current"' ?>>
                                                    <i class="icon-PLM d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">La Palma</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 px-0">
                                            <a href="{{url('offices/La Gomera')}}">
                                                <div <?php if($location == 'La Gomera') echo 'class="current"' ?>>
                                                    <i class="icon-GMR d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">La Gomera</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 px-0">
                                            <a href="{{url('offices/El Hierro')}}">
                                                <div <?php if($location == 'El Hierro') echo 'class="current"' ?>>
                                                    <i class="icon-HRR d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">El Hierro</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   L O C A T I O N   O P T I O N S -->

<!-- M O B I L E   L O C A T I O N S -->

<div class="container-fluid d-lg-none d-block pb-4">
    <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
            <div class="d-flex mb-4">
                <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong>Localización</strong></h1>
                <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <a href="{{url('offices/Fuerteventura')}}">
                            <div class="w-100">
                                <i class="icon-FV d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Fuerteventura') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Fuerteventura') echo 'mobileLocationCurrent' ?>">Fuerteventura</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{url('offices/Gran Canaria')}}">
                            <div class="w-100">
                                <i class="icon-GC d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Gran Canaria') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Gran Canaria') echo 'mobileLocationCurrent' ?>">Gran Canaria</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{url('offices/Tenerife')}}">
                            <div class="w-100">
                                <i class="icon-TF d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Tenerife') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Tenerife') echo 'mobileLocationCurrent' ?>">Tenerife</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-3">
                        <a href="{{url('offices/Lanzarote')}}">
                            <div class="w-100">
                                <i class="icon-LNT d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Lanzarote') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Lanzarote') echo 'mobileLocationCurrent' ?>">Lanzarote</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('offices/La Palma')}}">
                            <div class="w-100">
                                <i class="icon-PLM d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'La Palma') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'La Palma') echo 'mobileLocationCurrent' ?>">La Palma</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('offices/La Gomera')}}">
                            <div class="w-100">
                                <i class="icon-GMR d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'La Gomera') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'La Gomera') echo 'mobileLocationCurrent' ?>">La Gomera</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('offices/El Hierro')}}">
                            <div class="w-100">
                                <i class="icon-HRR d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'El Hierro') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'El Hierro') echo 'mobileLocationCurrent' ?>">El Hierro</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   M O B I L E   L O C A T I O N S -->

<!-- O F F I C E S -->

<div id="news" class="moveTop mt0-tablet">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-1">{!! $officesTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
                            <div class="container-fluid p-0">
                                <div class="row mb-5">
                                    <div id="mobileCoursesSwiper" class="swiper-container d-md-inline-block d-lg-none">
                                        <div class="swiper-wrapper">
                                            <?php

                                            foreach ($offices as $office){
                                                echo '<div class="swiper-slide">
                                        <div class="col-12">
                                        <a href="'.url('offices/'.$office['location'].'/'.$office['title'].'?key='.$office['id']).'">
                                        <div class="w-100 rounded shadow new">
                                        <img alt="'.$office['imageAlt'].'" class="w-100 h-100 swiper-lazy" data-src="'.asset('images/uploads/'.$office['image']).'">
                                        <div class="swiper-lazy-preloader"></div>
                                        <h5 class="text-white"><strong>'.$office['title'].'</strong></h5>
                                        <div class="layer"></div>
                                        </div>
                                        </a>
                                        </div>
                                        </div>';
                                            }

                                            echo '</div></div>';

                                            foreach ($offices as $office){
                                                echo '<div class="d-lg-inline-block d-none mb-4 col-lg-3 col-md-4 col-6">
                                        <a href="'.url('offices/'.$office['location'].'/'.$office['title'].'?key='.$office['id']).'">
                                        <div class="w-100 rounded shadow new">
                                        <img alt="'.$office['imageAlt'].'" class="w-100 h-100" src="'.asset('images/uploads/'.$office['image']).'">
                                        <h5 class="text-white"><strong>'.$office['title'].'</strong></h5>
                                        <div class="layer"></div>
                                        </div>
                                        </a>
                                        </div>';
                                            }

                                            ?>
                                        </div>
                                        <?php

                                        if(empty($offices)){
                                            echo'<div class="col-md-4 col-sm-6 p-0 mb-3">
                                            <div class="w-100 rounded">
                                            <div>
                                            <img class="w-100" alt="Imagen de un aula caricaturesca." src="'.asset('images/noCourses.svg').'">
                                            <div class="bg-deep-blue shadow">
                                            <div class="container-fluid">
                                            <p class="text-white pt-3 mb-0 pb-3"><small>Actualmente no disponemos de ninguna oferta en esta sección.</small></p>
                                            </div>
                                            </div>
                                            </div>

                                            </div>
                                            </div>';
                                        }

                                        ?>
                                        <div class="container-fluid mt-4">
                                            <div class="row justify-content-center">
                                            <?php

                                            if($amountOfPages <= 5){
                                                for($i = 1; $i <= $amountOfPages; $i++){
                                                    echo '<a href="'.url()->current().'?page='.$i.'"><button class="btn color-deep-blue ';
                                                    if((isset($_GET['page']) &&  $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1)) echo 'border-deep-blue';
                                                    echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                                }
                                            }else{
                                                if(isset($_GET['page'])) $page = $_GET['page'];
                                                else $page = 1;

                                                if($page < 4){
                                                    for($i = 1; $i <= 5; $i++){
                                                        echo '<a href="'.url()->current().'?page='.$i.'"><button class="btn color-deep-blue ';
                                                        if((isset($_GET['page']) &&  $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1)) echo 'border-deep-blue';
                                                        echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                                    }echo '<strong class="mt-2 mr-2 pt-1">. . .</strong><a href="'.url()->current().'?page='.$amountOfPages.'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$amountOfPages.'</strong></button></a>';
                                                }else if($page < $amountOfPages-3){
                                                    echo '<a href="'.url()->current().'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>1</strong></button></a><strong class="mt-2 mr-2 pt-1">. . .</strong>';
                                                    for($i = $page-1; $i <= $page+1; $i++){
                                                        echo '<a href="'.url()->current().'?page='.$i.'"><button class="btn color-deep-blue ';
                                                        if((isset($_GET['page']) &&  $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1)) echo 'border-deep-blue';
                                                        echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                                    }echo '<strong class="mt-2 mr-2 pt-1">. . .</strong><a href="'.url()->current().'?page='.$amountOfPages.'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$amountOfPages.'</strong></button></a>';
                                                }else{
                                                    echo '<a href="'.url()->current().'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>1</strong></button></a><strong class="mt-2 mr-2 pt-1">. . .</strong>';
                                                    for($i = $amountOfPages-4; $i <= $amountOfPages; $i++){
                                                        echo '<a href="'.url()->current().'?page='.$i.'"><button class="btn color-deep-blue ';
                                                        if((isset($_GET['page']) &&  $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1)) echo 'border-deep-blue';
                                                        echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                                    }
                                                }
                                            }

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   O F F I C E S -->

<!-- D I S C O V E R   U S -->

<div id="discoverUs">
    <div class="container-fluid">
        <div class="row position-relative z-index-0">
            <div class="w-100 z-index-0">
                <img class="w-100 h-400 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$officesTexts['img-2'])}}">
                <div class="textBox absoluteCenterBoth w-xs-100 px-sm-0 px-3">
                    <h1 class="text-white text-center clamp ed-text-minus" data-ed="title-2">{!! $officesTexts['title-2'] !!}</h1>
                    <h4 class="text-center text-white font-weight-light mb-5 ed-text-minus" data-ed="subTitle-1">{!! $officesTexts['subTitle-1'] !!}</h4>
                </div>
                <div class="layer"></div>
            </div>
        </div>
        <div class="accessBox bg-deep-blue rounded w-50 w-md-75 w-xs-100 shadow">
            <div class="container-fluid">
                <div class="row align-items-center py-md-5 py-4 px-md-0 px-2">
                    <div class="col-md-6 offset-md-1 px-lg-4 px-md-0">
                        <p class="text-white ed-text-minus" data-ed="text-1">{!! strip_tags($officesTexts['text-1']) !!}</p>
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
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-3">{!! $officesTexts['title-3'] !!}</strong></h1>
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
