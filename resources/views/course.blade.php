@extends('layout')
@section('header')
@section('title'){!! $course['title']  !!} - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($course['description']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$course['image'])}} @endsection
@section('keyword')<?php
    echo $course['sector'].', '.$course['type'].', '.$course['location'].', '.$course['onSite'].', ';
    if($course['level']) echo 'Nivel '.$course['level'].', ';
    if($course['type'] == 'Gratuito') echo $course['receiver'].', ';
    if($course['hours']) echo $course['hours'].' horas, ';
    if($course['teacher']) echo $course['teacher'].', ';

foreach ($course['modules'] as $module){
    echo $module[0]['code'].', '.$module[0]['title'].', ';

    foreach ($module[1] as $unit){
        echo $unit['code'].', '.$unit['title'].', ';
    }
}

foreach ($course['professionalDepartures'] as $professionalDeparture){
    echo $professionalDeparture.', ';
}

?>@endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img alt="<?php echo $course['imageAlt'] ?>" class="w-100 h-75" src="{{asset('images/uploads/'.$course['image'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- C O U R S E   D A T A -->

<div id="courseData" class="overlapTop">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-12 px-sm-2 px-0">
                            <div class="w-100 bg-grey rounded shadow py-md-5 py-4 d-flex">
                                <div class="container-fluid px-sm-5 px-4 align-items-center">
                                   <div class="row">
                                       <div class="col-12 mb-4">
                                           <strong class="bg-deep-blue text-white rounded py-2 px-4 d-inline-block"><?php echo $course['sector']; ?></strong>
                                       </div>
                                   </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="color-slate-blue"><strong><?php echo $course['title'] ?></strong></h2>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 d-flex">
                                            <p class="color-slate-blue mr-4 mb-0">Curso
                                                <?php

                                                if($course['type'] == 'Gratuito') echo 'para '.$course['receiver'];
                                                else echo $course['type'];

                                                ?>
                                            </p>
                                            <?php

                                            if($course['level']) echo '<p class="color-slate-blue mb-0">Nivel '.$course['level'].'</p>';

                                            ?>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <?php

                                            echo '<p class="color-slate-blue mr-4 mb-0">'.$course['location'].'</p><p class="color-slate-blue mr-4 mb-0">'.$course['onSite'].'</p>';
                                            if($course['hours']) echo '<p class="color-slate-blue mb-0">'.$course['hours'].' Horas</p>';

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-md-0 mb-5 px-md-2 px-0">
                            <div class="w-100 h-100 bg-deep-blue rounded shadow d-flex align-items-center py-md-0 py-4 mt-md-0 mt-4">
                                <span class="w-100">
                                <?php

                                if($course['type'] == "Privado" && $course['price']) echo '<p class="text-center text-white mb-0"><strong>Precio:</strong></p><h2 class="text-center text-white">'.$course['price'].' €</h2>';
                                if($course['init_date'] && !$course['end_date']) echo '<h1 class="text-center text-white mb-4"><strong>'.$course['initDayParsed'].'</strong> '.$course['initMonthParsed'].'</h1>';
                                else if($course['init_date'] && $course['end_date'])
                                    echo '<h4 class="text-center text-white mb-4">
                                        <strong>'.$course['initDayParsed'].'</strong> '.$course['initMonthParsed'].' -
                                        <strong>'.$course['endDayParsed'].'</strong> '.$course['endMonthParsed'].'
                                        </h4>';
                                else if($course['promote']) echo '<h4 class="text-center text-white mb-4">Inicio Inmediato</h4>';
                                else echo '<h4 class="text-center text-white mb-4">Próximamente</h4>';


                                ?>
                                <button class="btn border-white centerHorizontal text-white noScriptDisplayNone px-4" data-toggle="modal" data-target="#courseInscriptionModal" ><strong>Preinscríbete</strong></button>
                                <noscript>
                                    <a href="#courseInscriptionModal"><button class="btn border-white centerHorizontal text-white px-4"><strong>Preinscríbete</strong></button></a>
                                </noscript>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="courseInscriptionModal" tabindex="-1" role="dialog" aria-labelledby="Modal for user inscription" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{url('courseInscription/'.$course['id'])}}">
            {{csrf_field()}}
                <input class="HPInput" type="email" name="HPInput">
                <input type="hidden" name="course" value="{{$course['id']}}">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center color-deep-blue">Preinscríbete en <strong>{{$course['title']}}</strong></h5>
                    <button type="button" class="close noScriptDisplayNone" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <noscript>
                        <a href="{{url()->full()}}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </noscript>
                </div>
                <div class="modal-body px-5">
                    <label for="inscriptionName" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionName" class="form-control mb-2" type="text" name="name" required>
                    <label for="inscriptionEmail" class="color-deep-blue"><h6 title="Este campo es obligatorio">Email<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionEmail" class="form-control mb-2" type="email" name="email" required>
                    <label for="inscriptionPhone" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionPhone" class="form-control mb-2" type="number" min="1" max="999999999999999" name="phone" required>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="consent" id="inscriptionConsent" required>
                        <label class="form-check-label" for="inscriptionConsent"><h6 title="Este campo es obligatorio" class="color-deep-blue ml-1">Consiento el uso de mis datos para los fines indicados en la <a target="_blank" href="{{url('privacyPolicy')}}"><u>política de privacidad</u></a>.<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" name="publicity" id="inscriptionPublicity">
                        <label class="form-check-label" for="inscriptionPublicity"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Quiero recibir ofertas y noticias de su entidad.</h6></label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 noScriptDisplayNone toggleGeneric" data-dismiss="modal"><strong>Cancelar</strong></button>
                    <noscript>
                        <a href="{{url()->full()}}"><button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleGeneric" ><strong>Cancelar</strong></button></a>
                    </noscript>
                    <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleContent" ><strong>Enviar</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- E N D   C O U R S E   D A T A -->

<!-- C O U R S E   D E S C R I P T I O N -->

<?php

    if(strlen(trim(strip_tags($course['description']))) > 0 || $course['schedule']) {
        echo '<div class="moveTop mt0-tablet-mobile">
            <div class="container-fluid mb-5">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
            <div class="d-flex mb-5">
            <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong>Descripción</strong></h1>
            <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0">';

            if(strlen(trim(strip_tags($course['description']))) > 0) echo $course['description'];
            if($course['schedule']) echo '<p class="color-slate-blue"><span class="bg-deep-blue text-white rounded py-2 px-4 mr-2"><strong>Horario:</strong> '.$course['schedule'].'</span>*El horario puede estar sujeto a cambios.</p>';

            echo'
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>';
    }

?>

<!-- E N D   C O U R S E   D E S C R I P T I O N -->

<!-- C O U R S E   T E A C H E R -->

<?php

if($course['teacher']) {
    echo '<div id="teacher">
            <div class="container-fluid mb-5">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
            <div class="d-flex mb-5">
            <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong>Docente</strong></h1>
            <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0">
            <h3 class="color-slate-blue mb-4"><strong>'.$course['teacher'].'</strong></h3>';
            if(strlen(trim(strip_tags($course['teacherDescription']))) > 0) echo $course['teacherDescription'];
        echo'</div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>';
}

?>

<!-- E N D   C O U R S E   T E A C H E R -->

<!-- P R O F E S S I O N A L   D E P A R T U R E S -->

<?php

if(Count($course['professionalDepartures']) > 0)
    echo '<div id="professionalDepartures">
        <div class="container-fluid mb-5">
        <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
        <div class="d-flex mb-5">
        <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong>Salidas profesionales</strong></h1>
        <hr class="titleHr w-100 mt-5">
        </div>
        <div class="container-fluid">
        <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0"><div class="container-fluid"><div class="row">';

        foreach ($course['professionalDepartures'] as $professionalDeparture){
            echo '<div class="col-lg-4 col-md-6 col-12 mb-2">
                  <div class="bg-grey rounded h-100" style="min-height: 200px;">

                  <h5 class="color-slate-blue w-100 h-100 text-center d-table p-4"><strong class="d-table-cell align-middle">'.$professionalDeparture['title'].'</strong></h5>

                  </div>
                 </div>';
        }

        echo'</div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>';

?>



<!-- E N D   P R O F E S S I O N A L   D E P A R T U R E S -->

<!-- C O N T E N T -->

<?php

    if($course['modules'])

        echo '<div id="courseContent">
                <div class="container-fluid mb-5">
                <div class="row">
                <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
                <div class="d-flex mb-5">
                <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong>Contenido</strong></h1>
                <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                <div class="row">
                <div class="col-xl-10 offset-xl-1 col-12 offset-0">';
                foreach ($course['modules'] as $module){

                echo '<div class="bg-grey rounded accordionHead mt-2">
                    <div class="container-fluid">
                    <div class="row align-items-center py-3 px-1">
                    <div class="col-10">
                    <h4 class="color-slate-blue"><strong>'.$module[0]['code'].' '.$module[0]['title'].'</strong></h4><h4 class="color-slate-blue">';
                    if($module[0]['hours']) echo $module[0]['hours'].' h';
                    echo'</h4></div>
                    <div class="col-2">';

                    if(Count($module[1]) > 0)
                        echo '<i title="Ver más" class="glyphicon glyphicon-plus float-right color-slate-blue d-inline"></i>
                              <i title="Ver menos" class="glyphicon glyphicon-minus float-right color-slate-blue d-none"></i>';

                    echo'</div>
                    </div>
                    </div>
                    </div>
                    <div class="accordionBody mb-2 px-2">';

                foreach ($module[1] as $unit){
                    echo '<div class="container-fluid mt-2">
                            <div class="row">
                                <div class="col-10 px-md-2 p-0">
                                    <h4 class="color-slate-blue">
                                        <strong>'.$unit['code'].' '.$unit['title'].'</strong>
                                    </h4>
                                </div>
                                <div class="col-2 px-md-2 p-0">
                                    <h4 class="color-slate-blue">
                                        <strong class="noWrap float-right">';
                                    if($unit['hours']) echo $unit['hours'].' h';
                                    else echo '&nbsp;';
                            echo'</strong>
                                    </h4>
                                </div>
                            </div>
                          </div>';
                }

                echo'</div>';
                }


                echo'</div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>';

?>

<!-- E N D   C O N T E N T -->

<!-- R E Q U I R E M E N T S -->


<?php

if(strlen(trim(strip_tags($course['requirements']))) > 0) {
    echo '<div id="requirements">
            <div class="container-fluid mb-5">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
            <div class="d-flex mb-5">
            <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong>Requisitos</strong></h1>
            <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0">';

        echo $course['requirements'];

        echo'</div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>';
}

?>

<!-- E N D   R E Q U I R E M E N T S -->

<!-- D I S C O V E R   U S -->

<div id="discoverUs">
    <div class="container-fluid">
        <div class="row position-relative z-index-0">
            <div class="w-100 z-index-0">
                <img class="w-100 h-400" alt="{{$course['imageAlt']}}" src="{{asset('images/uploads/'.$course['image'])}}">
                <div class="textBox absoluteCenterBoth w-md-75 w-xs-100 px-sm-0 px-3">
                    <h4 class="text-center text-white font-weight-light">Curso
                        <?php

                        if($course['type'] == 'Gratuito') echo 'para '.$course['receiver'];
                        else echo $course['type'];

                        if($course['level']) echo ' de nivel '.$course['level'];

                        ?>
                    </h4>
                    <h1 class="text-white text-center clamp"><?php echo $course['title'] ?></h1>
                    <h4 class="text-center text-white font-weight-light mb-5">
                        <?php

                        echo $course['location'].' '.$course['onSite'].' ';
                        if($course['hours']) echo $course['hours'].' Horas</p>';

                        ?>
                    </h4>
                </div>
                <div class="layer"></div>
            </div>
        </div>
        <div class="accessBox bg-deep-blue rounded w-50 w-md-75 w-xs-100 shadow">
            <div class="container-fluid">
                <div class="row align-items-center py-md-5 py-4 px-md-0 px-2">
                    <div class="col-md-6 offset-md-1 px-lg-4 px-md-0">
                        <p class="text-white">Matrícula abierta. Plazas limitadas. <br> ¡Solicita ya tu plaza sin compromiso!</p>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-md-4 offset-md-1">
                        <button class="btn border-white text-white px-4 noScriptDisplayNone centerHorizontal" data-toggle="modal" data-target="#courseInscriptionModal"><strong>Preinscríbete</strong></button>
                        <noscript>
                            <a href="#courseInscriptionModal"><button class="btn border-white text-white centerHorizontal px-4"><strong>Preinscríbete</strong></button></a>
                        </noscript>
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
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-5 px-0">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong>Noticias</strong></h1>
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

<script type="text/javascript" src="{{asset('js/course.js')}}"></script>

@stop
@section('footer')
