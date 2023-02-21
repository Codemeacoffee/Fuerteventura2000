@extends('layout')
@section('header')
@section('title')Contacto - Fuerteventura2000 @endsection
@section('description')Contacta con Fuerteventura2000, tenemos sede en Fuerteventura, Gran Canaria y Tenerife. @endsection
@section('img'){{asset('images/uploads/'.$contactTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$contactTexts['img-1'])}}">
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
                            <a href="{{url('contact/Fuerteventura')}}">
                                <div class="w-100 bg-grey option rounded shadow <?php if($location == 'Fuerteventura') echo 'current' ?>">
                                    <i class="icon-FV d-inline-block color-slate-blue centerHorizontal py-5"></i>
                                    <h3 class="color-slate-blue text-center noWrap pb-5">Fuerteventura</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{url('contact/Gran Canaria')}}">
                                <div class="w-100 bg-grey option rounded shadow <?php if($location == 'Gran Canaria') echo 'current' ?>">
                                    <i class="icon-GC d-inline-block color-slate-blue centerHorizontal py-5"></i>
                                    <h3 class="color-slate-blue text-center noWrap pb-5">Gran Canaria</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{url('contact/Tenerife')}}">
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
                                            <a href="{{url('contact/Lanzarote')}}">
                                                <div <?php if($location == 'Lanzarote') echo 'class="current"' ?>>
                                                    <i class="icon-LNT d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">Lanzarote</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 px-0">
                                            <a href="{{url('contact/La Palma')}}">
                                                <div <?php if($location == 'La Palma') echo 'class="current"' ?>>
                                                    <i class="icon-PLM d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">La Palma</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 px-0">
                                            <a href="{{url('contact/La Gomera')}}">
                                                <div <?php if($location == 'La Gomera') echo 'class="current"' ?>>
                                                    <i class="icon-GMR d-inline-block color-slate-blue centerHorizontal py-4"></i>
                                                    <h5 class="color-slate-blue text-center noWrap pb-3 mb-0">La Gomera</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 px-0">
                                            <a href="{{url('contact/El Hierro')}}">
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
                        <a href="{{url('contact/Fuerteventura')}}">
                            <div class="w-100">
                                <i class="icon-FV d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Fuerteventura') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Fuerteventura') echo 'mobileLocationCurrent' ?>">Fuerteventura</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{url('contact/Gran Canaria')}}">
                            <div class="w-100">
                                <i class="icon-GC d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Gran Canaria') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Gran Canaria') echo 'mobileLocationCurrent' ?>">Gran Canaria</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{url('contact/Tenerife')}}">
                            <div class="w-100">
                                <i class="icon-TF d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Tenerife') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Tenerife') echo 'mobileLocationCurrent' ?>">Tenerife</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-3">
                        <a href="{{url('contact/Lanzarote')}}">
                            <div class="w-100">
                                <i class="icon-LNT d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'Lanzarote') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'Lanzarote') echo 'mobileLocationCurrent' ?>">Lanzarote</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('contact/La Palma')}}">
                            <div class="w-100">
                                <i class="icon-PLM d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'La Palma') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'La Palma') echo 'mobileLocationCurrent' ?>">La Palma</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('contact/La Gomera')}}">
                            <div class="w-100">
                                <i class="icon-GMR d-inline-block color-slate-blue centerHorizontal pb-2 <?php if($location == 'La Gomera') echo 'mobileLocationCurrent' ?>"></i>
                                <h6 class="color-slate-blue text-center <?php if($location == 'La Gomera') echo 'mobileLocationCurrent' ?>">La Gomera</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('contact/El Hierro')}}">
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

<!-- E N D   L O C A T I O N   O P T I O N S -->

<!-- C O N T A C T -->

<div id="contact" class="moveTop mt0-tablet">
    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12 offset-0 ">
                <div class="d-flex mb-2">
                    <h1 class="color-slate-blue noWrap pr-4"><strong class="ed-text-minus" data-ed="title-1">{!! $contactTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-12 offset-lg-0 col-sm-10 offset-sm-1 col-12 offset-0 px-md-2 px-0">
                            <div>
                                <h5 class="text-center mb-4">INFORMACIÓN BÁSICA SOBRE PROTECCIÓN DE DATOS</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Responsable del tratamiento</th>
                                            <td>FUERTEVENTURA 2000 S.L.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Dirección del responsable</th>
                                            <td>Calle Cisneros, 82, Puerto del Rosario 35600</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Finalidad</th>
                                            <td>Sus datos serán usados para poder atender sus solicitudes y prestarle nuestros servicios.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Publicidad</th>
                                            <td>Solo le enviaremos publicidad con su autorización previa, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Legitimación</th>
                                            <td>Únicamente trataremos sus datos con su consentimiento previo, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Destinatarios</th>
                                            <td>Con carácter general, sólo el personal de nuestra entidad que esté debidamente autorizado podrá tener conocimiento de la información que le pedimos.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Derechos</th>
                                            <td>Tiene derecho a saber qué información tenemos sobre usted, corregirla y eliminarla, tal y como se explica en la información adicional disponible en nuestra página web.</td>
                                        </tr>
                                         <tr>
                                            <th scope="row">Información adicional</th>
                                            <td>Más información en el apartado “SUS DATOS SEGUROS” de nuestra página web.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-12 px-ml-5 px-2">
                                    <?php

                                    foreach ($contacts as $contact){
                                        echo '<div class="mb-5">
                                            <h6 class="my-4"><strong>'.$contact['name'].'</strong></h6>
                                            <noscript>
                                            <a target="_blank" href="https://www.google.com/search?q='.$contact['address'].'"><strong>Ver localización en Google</strong></a>
                                            </noscript>
                                            <iframe height="350" class="w-100 noScriptDisplayNone" src="https://maps.google.com/maps?q='.$contact['address'].'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>
                                            <div class="container-fluid">
                                            <div class="row mt-4">
                                            <div class="col-md-3 col-12">
                                            <div class="d-flex">
                                            <i class="icon-phone mr-2"></i><p><strong>'.$contact['phone'].'</strong></p>
                                            </div>
                                            </div>
                                            <div class="col-md-9 col-12">
                                            <div class="d-flex">
                                            <i class="icon-map mr-2"></i><p><strong>'.$contact['address'].'</strong></p>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>';
                                    }

                                    if(empty($contact)){
                                        echo'<div class="w-100 my-5 rounded px-2">
                                            <div>
                                            <img class="w-100 mt-5" alt="Imagen de un aula caricaturesca." src="'.asset('images/noCourses.svg').'">
                                            <div class="bg-deep-blue shadow">
                                            <div class="container-fluid">
                                            <p class="text-white pt-3 mb-0 pb-3"><small>Actualmente no disponemos de sede física en esta localización.</small></p>
                                            </div>
                                            </div>
                                            </div>
                                            </div>';
                                    }

                                    ?>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-12">
                                    <div class="bg-grey rounded shadow stickyBox mt-md-5 mt-0">
                                        <form method="post" action="{{url('contactUs/'.$location)}}">
                                            <div class="p-md-5 p-4">
                                                {{csrf_field()}}
                                                <input class="HPInput" type="email" name="HPInput">
                                                <input class="styledInput bg-grey w-100 mb-4" type="text" name="name" placeholder="Nombre" required>
                                                <input class="styledInput bg-grey w-100 mb-4" type="text" name="email" placeholder="Email" required>
                                                <input class="styledInput bg-grey w-100 mb-4" type="number" name="phone" placeholder="Teléfono" required>
                                                <textarea class="styledInput bg-grey w-100" rows="4" name="message" placeholder="Mensaje" required></textarea>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="" id="dataConsent" required>
                                                  <label class="form-check-label" for="dataConsent">
                                                   Consiento el uso de mis datos para los fines indicados en la política de privacidad “SUS DATOS SEGUROS”.
                                                  </label>
                                                </div>
                                                <button class="btn color-deep-blue border-deep-blue centerHorizontal px-4 mt-5"><strong>Enviar</strong></button>
                                            </div>
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

<!-- E N D   C O N T A C T -->

@stop
@section('footer')
