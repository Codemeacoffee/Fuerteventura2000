@extends('layout')
@section('header')
@section('title'){!! $office['title']  !!} - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($office['description']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$office['image'])}} @endsection
@section('keyword')<?php echo $office['title'].', '.$office['location'].', '?>@endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75" alt="{{$office['imageAlt']}}" src="{{asset('images/uploads/'.$office['image'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- O F F I C E -->

<div id="new" class="container-fluid mb-6">
    <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
            <div class="d-flex mb-5">
                <h1 class="color-slate-blue noWrap pr-4"><strong>{{$office['title']}}</strong></h1>
                <hr class="titleHr w-100 mt-5">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-md-2 px-0">
                        <div class="container-fluid">
                            <div class="row mb-5">
                                <div class="col-md-6 col-12">
                                    <h4 class="color-slate-blue mb-4"><strong>Oferta en {{$office['location']}}</strong></h4>
                                    {!! $office['description'] !!}
                                    <?php

                                    if(strlen($office['end_date'] > 0)) echo '<div><strong class="color-slate-blue">Oferta válida hasta el '.$office['end_date'].'</strong></div>'

                                    ?>
                                </div>
                                <div class="col-md-6 offset-md-0 col-sm-10 offset-sm-1 col-12 offset-0">
                                    <img class="w-100 fixedHeightImg rounded" alt="{{$office['imageAlt']}}" src="{{url('images/uploads/'.$office['image'])}}">
                                    <button class="btn border-deep-blue centerHorizontal color-deep-blue noScriptDisplayNone px-4 mt-4" data-toggle="modal" data-target="#officeInscriptionModal" ><strong>Inscríbete</strong></button>
                                    <noscript>
                                        <a href="#officeInscriptionModal"><button class="btn border-deep-blue centerHorizontal color-deep-blue px-4 mt-4"><strong>Inscríbete</strong></button></a>
                                    </noscript>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="officeInscriptionModal" tabindex="-1" role="dialog" aria-labelledby="Modal for user inscription" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" action="{{url('officeInscription/'.$office['id'])}}">
                {{csrf_field()}}
                <input class="HPInput" type="email" name="HPInput">
                <input type="hidden" name="office" value="{{$office['id']}}">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center color-deep-blue">Inscríbete en <strong>{{$office['title']}}</strong></h5>
                    <button type="button" class="close noScriptDisplayNone" data-dismiss="modal" aria-label="Close">
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
                    </button>
                </div>
                <div class="modal-body px-5">
                    <label for="inscriptionName" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionName" class="form-control mb-2" type="text" name="name" required>
                    <label for="inscriptionEmail" class="color-deep-blue"><h6 title="Este campo es obligatorio">Email<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionEmail" class="form-control mb-2" type="email" name="email" required>
                    <label for="inscriptionPhone" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionPhone" class="form-control mb-2" type="number" min="1" max="999999999999999" name="phone" required>
                    <label for="curriculumInput" class="color-deep-blue"><h6 title="Este campo es obligatorio">Curriculum<span class="text-danger">*</span></h6></label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subir</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" accept=".ppt, .pptx, .pdf, .doc , .docx" class="custom-file-input" id="curriculumInput" name="CV" required>
                            <label class="custom-file-label" for="curriculumInput">Curriculum</label>
                        </div>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="consent" id="inscriptionConsent" required>
                        <label class="form-check-label" for="inscriptionConsent"><h6 title="Este campo es obligatorio" class="color-deep-blue ml-1">Consiento el uso de mis datos para los fines indicados en la política de privacidad.<span class="text-danger">*</span></h6></label>
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

<!-- E N D  O F F I C E -->

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
                                        <img alt="'.$new['imageAlt'].'" class="w-100 h-100" src="'.asset('images/uploads/'.$new['image']).'">
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
