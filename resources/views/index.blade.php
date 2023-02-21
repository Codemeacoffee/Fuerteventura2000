@extends('layout')
@section('header')
@section('title')Fuerteventura2000 - Tu formación empieza aquí @endsection
@section('description')Te ofrecemos cursos gratuitos para desempleados y trabajadores en Fuerteventura, Gran Canaria y Tenerife. Preinscríbete y comienza tu futuro profesional. @endsection
@section('img'){{asset('images/ftv2000SEO.jpg')}} @endsection
@section('content')


<!--popup-->
    <!--<div class="modal fade "  id="projectsModal" tabindex="-1" role="dialog" aria-hidden="true" style="opacity:1;">-->
    <!--    <div class="modal-dialog modal-lg" role="document">-->
    <!--        <div class="modal-content" style="margin-top: 18rem;">-->
    <!--            <div class="modal-header">-->
    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="transform: translateY(26%);">-->
    <!--                    <span aria-hidden="true" style="font-size: 40px;">&times;</span>-->
    <!--                </button>-->
    <!--            </div>-->
    <!--            <div class="modal-body p-0">-->
    <!--              <img class="w-100" src="{{asset('images/recogidadejuguetes_nformar.png')}}">-->
                    
    <!--            </div>-->
                
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <script type="text/javascript">
        // $(window).on('load', function () {
        //   $('#projectsModal').modal('toggle');
        // });
    </script>
<!--popup-->

<!-- B A N N E R -->

<div id="banner" class="swiper-container">
    <div class="swiper-wrapper">
        <?php

        foreach ($courses as $course){
           echo '<div class="swiper-slide">
                <img class="w-100 h-75 swiper-lazy" alt="'.$course['imageAlt'].'" data-src="'.asset('images/uploads/'.$course['image']).'">
                <div class="swiper-lazy-preloader"></div>
                <div class="textBox">
                <h1 class="text-white"><strong>'.$course['title'].'</strong></h1>
                <a class="text-white" href="'.url('courses').'/'.$course['location'].'/'.$course['type'].'/'.$course['title'].'?key='.$course['id'].'"><h4 class="font-weight-light">Ver más</h4></a>
                </div>
                <div class="layer"></div>
                </div>';
        }

        ?>
    </div>
    <div class="bannerContent absoluteCenterBoth w-sm-100 w-75 h-50">
        <div class="swiper-pagination centerHorizontal absoluteToBottom"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<!-- E N D   B A N N E R -->

<!-- B A N N E R   O P T I O N S -->

<div id="genericOptions" class="overlapTop d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-10 offset-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a class="h-100"  href="https://www.fuerteventura2000.com/new/Innobonos?key=24">
                                <div class="w-100 h-100 bg-grey rounded shadow centerHorizontal pb-4">
                                    <img style="height: 250px" class="w-100 centerHorizontal py-xl-5 py-4" src="{{asset('images/innobonos-logo.png')}}">
                                </div>
                            </a>
                        </div>
                        
                        <!-- <div class="col-4">
                            <a class="genericOptionsHover h-100 ed-anchor" data-ed="{{url('controlPanel/administrateCourses')}}"  href="{{url('courses')}}">
                                <div class="w-100 h-100 bg-grey rounded shadow centerHorizontal pb-4">
                                    <img class="w-50 centerHorizontal py-xl-5 py-4" src="{{asset('images/iconoGraduado.svg')}}">
                                    <h2 class="color-slate-blue text-center mx-4">Cursos gratuitos</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="genericOptionsHover h-100" target="_blank" href="http://formacion.fuerteventura2000.com">
                                <div class="w-100 h-100 bg-grey rounded shadow pb-4">
                                    <img class="w-50 centerHorizontal py-xl-5 py-4" src="{{asset('images/iconoRaton.svg')}}">
                                    <h2 class="color-slate-blue text-center mx-4">Formación online</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="genericOptionsHover h-100 ed-anchor" data-ed="{{url('controlPanel/oxfordTestOfEnglish')}}" href="{{url('oxfordTestOfEnglish')}}">
                                <div class="w-100 h-100 bg-grey rounded shadow pb-4">
                                    <img class="w-50 centerHorizontal py-xl-5 py-4" src="{{asset('images/iconoCertificado.svg')}}">
                                    <h2 class="color-slate-blue text-center mx-4">Oxford Test <br> of English</h2>
                                </div>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="overlap0-tablet-mobile d-md-none d-block mb-4">
    <div class="row">
        <div class="col-8 offset-2 bg-deep-blue rounded">
            <a class="d-block w-100 h-100 py-2" href="{{url('oxfordTestOfEnglish')}}">
                <h3 class="text-center text-white">Oxford Test of English</h3>
            </a>
        </div>
    </div>
</div>

<!-- E N D   B A N N E R   O P T I O N S -->

<!-- U P C O M I N G   C O U R S E S -->

<div class="courses moveTop mt0-tablet-mobile">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-1">{!! $indexTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0 pl-0">
                            <div class="container-fluid pl-0">
                                <div class="row mb-5">
                                    <div id="mobileCoursesSwiper" class="swiper-container d-md-inline-block d-lg-none">
                                        <div class="swiper-wrapper">
                                        <?php

                                        foreach ($courses as $course){
                                            echo '<div class="swiper-slide">
                                            <div class="col-12 offset-0">
                                            <a href="'.url('courses').'/'.$course['location'].'/'.$course['type'].'/'.$course['title'].'?key='.$course['id'].'">
                                            <div class="courseBox w-100 rounded">
                                            <div class="contentBox">
                                            <div class="bg-deep-blue w-75"><span class="text-white px-4">'.$course['location'].'</span></div>
                                            <div class="bg-grey shadow">
                                            <div class="container-fluid">
                                            <p class="color-slate-blue pt-3 mb-0"><small>Curso ';
                                            if($course['type'] == 'Gratuito') echo 'para '.$course['receiver'];
                                            else echo $course['type'];
                                            echo'</small></p>
                                            <div class="row">
                                            <div class="col-9">
                                            <h5 class="color-slate-blue clamp">'.$course['title'].'</h5>
                                            </div>
                                            <div class="col-3">
                                            <h3 class="color-slate-blue text-center mb-0">'.$course['initDayParsed'].'</h3>
                                            <h5 class="font-weight-light color-slate-blue text-center">'.$course['initMonthParsed'].'</h5>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <img class="h-100 swiper-lazy" alt="'.$course['imageAlt'].'" data-src="'.asset('images/uploads/'.$course['image']).'">
                                            <div class="swiper-lazy-preloader"></div>
                                            </div>
                                            </a>
                                            </div>
                                            </div>';
                                        }

                                    echo '</div></div>';

                                    $i = 0;

                                    foreach ($courses as $course){
                                        echo '<div class="col-md-4 col-sm-6 d-lg-inline-block d-none">
                                            <a href="'.url('courses').'/'.$course['location'].'/'.$course['type'].'/'.$course['title'].'?key='.$course['id'].'">
                                            <div class="courseBox w-100 rounded">
                                            <div class="contentBox">
                                            <div class="bg-deep-blue w-75"><span class="text-white px-4">'.$course['location'].'</span></div>
                                            <div class="bg-grey shadow">
                                            <div class="container-fluid">
                                            <p class="color-slate-blue pt-3 mb-0"><small>Curso ';
                                            if($course['type'] == 'Gratuito') echo 'para '.$course['receiver'];
                                            else echo $course['type'];
                                            echo'</small></p>
                                            <div class="row">
                                            <div class="col-9">
                                            <h5 class="color-slate-blue clamp">'.$course['title'].'</h5>
                                            </div>
                                            <div class="col-3">
                                            <h3 class="color-slate-blue text-center mb-0">'.$course['initDayParsed'].'</h3>
                                            <h5 class="font-weight-light color-slate-blue text-center">'.$course['initMonthParsed'].'</h5>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <img class="h-100" alt="'.$course['imageAlt'].'" src="'.asset('images/uploads/'.$course['image']).'">
                                            </div>
                                            </a>
                                            </div>';
                                            $i++;
                                            if($i == 3) break;
                                    }

                                    ?>
                                </div>
                                <a href="{{url('courses')}}"><button class="btn color-deep-blue border-deep-blue centerHorizontal px-4"><strong>Más cursos</strong></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   U P C O M I N G   C O U R S E S -->

<!-- D I S C O V E R   U S -->

<div id="discoverUs">
    <div class="container-fluid">
        <div class="row position-relative z-index-0">
            <div class="w-100 z-index-0">
                <img alt="Agencia de colocación" class="w-100 h-400 ed-img" data-ed="img-4" src="{{asset('images/uploads/'.$indexTexts['img-4'])}}">
                <div class="textBox absoluteCenterBoth w-xs-100 px-sm-0 px-3">
                    <h1 class="text-white text-center clamp ed-text-minus" data-ed="title-2">{!! $indexTexts['title-2'] !!}</h1>
                    <h4 class="text-center text-white font-weight-light mb-5 ed-text-minus" data-ed="subTitle-1">{!! $indexTexts['subTitle-1'] !!}</h4>
                </div>
                <div class="layer"></div>
            </div>
        </div>
        <div class="accessBox bg-deep-blue rounded w-50 w-md-75 w-xs-100 shadow">
            <div class="container-fluid">
                <div class="row align-items-center py-md-5 py-4 px-md-0 px-2">
                    <div class="col-md-6 offset-md-1 px-lg-4 px-md-0">
                        <p class="text-white ed-text-minus" data-ed="text-1">{!! strip_tags($indexTexts['text-1']) !!}</p>
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
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-3">{!! $indexTexts['title-3'] !!}</strong></h1>
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

<script type="text/javascript" src="{{asset('js/main.js')}}" defer></script>

@stop
@section('footer')
