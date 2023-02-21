@extends('layout')
@section('header')
@section('title')Noticias - Fuerteventura2000 @endsection
@section('description')Descubre la actualidad en Fuerteventura2000, tu portal de formación en Canarias @endsection
@section('img'){{asset('images/uploads/'.$newsTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$newsTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- O P T I O N S -->

<div id="genericOptions" class="overlapTop overlap0-tablet-mobile mb-md-0 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-12 offset-0 px-md-2 px-0">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 bg-grey rounded shadow">
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                                      <div class="py-md-5 py-4 px-md-4 px-0">
                                          <h4 class="color-deep-blue text-center"><strong class="ed-text-minus" data-ed="title-1">{!! $newsTexts['title-1'] !!}</strong></h4>
                                          <br>
                                          <form class="mt-4" method="post" action="{{url('subscribeToNewsletter')}}">
                                              {{csrf_field()}}
                                              <input class="HPInput" type="email" name="HPInput">
                                              <input class="w-100 bg-grey styledInput" type="email" name="email" placeholder="Email" required>
                                              <div class="d-flex mt-4">
                                                  <input id="acceptPrivacyPolicy" type="checkbox" class="mt-2 mr-2" name="acceptPolicy" required>
                                                  <label for="acceptPrivacyPolicy">He leído y acepto la política de <a class="color-deep-blue" href="{{url('privacyPolicy')}}">protección de datos.</a></label>
                                              </div>
                                              <button class="btn color-deep-blue border-deep-blue centerHorizontal px-4 mt-5"><strong>Subscribirse</strong></button>
                                          </form>
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

<!-- E N D   O P T I O N S -->

<!-- N E W S -->

<div id="news" class="moveTop mt0-tablet-mobile">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-2">{!! $newsTexts['title-2'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
                            <div class="container-fluid p-0">
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
                                                echo '<div class="d-lg-inline-block d-none mb-4 ';

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
                                        <?php

                                        if(empty($news)){
                                            echo'<div class="col-md-4 col-sm-6 p-0 mb-3">
                                            <div class="w-100 rounded">
                                            <div>
                                            <img class="w-100" alt="Imagen de un aula caricaturesca." src="'.asset('images/noCourses.svg').'">
                                            <div class="bg-deep-blue shadow">
                                            <div class="container-fluid">
                                            <p class="text-white pt-3 mb-0 pb-3"><small>Actualmente no disponemos de ninguna noticia en esta sección.</small></p>
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

<!-- E N D   N E W S -->

<!-- D I S C O V E R   U S -->

<div id="discoverUs">
    <div class="container-fluid">
        <div class="row position-relative z-index-0">
            <div class="w-100 z-index-0">
                <img class="w-100 h-400 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$newsTexts['img-2'])}}">
                <div class="textBox absoluteCenterBoth w-xs-100 px-sm-0 px-3">
                    <h1 class="text-white text-center ed-text-minus" data-ed="title-3">{!! $newsTexts['title-3'] !!}</h1>
                    <h4 class="text-center text-white font-weight-light ed-text-minus" data-ed="subTitle-1">{!! $newsTexts['subTitle-1'] !!}</h4>
                </div>
                <div class="layer"></div>
            </div>
        </div>
        <div class="accessBox bg-deep-blue rounded w-50 w-md-75 w-xs-100 shadow">
            <div class="container-fluid">
                <div class="row align-items-center py-md-5 py-4 px-md-0 px-2">
                    <div class="col-md-6 offset-md-1 px-lg-4 px-md-0">
                        <p class="text-white ed-text-minus" data-ed="text-1">{!! strip_tags($newsTexts['text-1']) !!}</p>
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

<!-- U P C O M I N G   C O U R S E S -->

<div class="courses">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="title-4">{!! $newsTexts['title-4'] !!}</strong></h1>
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

@stop
@section('footer')
