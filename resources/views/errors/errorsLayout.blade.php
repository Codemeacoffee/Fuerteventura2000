@section('header')
    <!DOCTYPE html>
<html itemscope lang="es" dir="ltr" itemtype="https://schema.org/WebSite">
<head>
    <title>Error @yield('title')</title>
    <meta name="author" content="Inversiones Borma S.L.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- SEO -->
    <meta name="description" content="Opps, Error @yield('title')">
    <meta property="og:site_name" content="Fuerteventura2000">
    <meta property="og:title" content="Error @yield('title')">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:description" content="Opps, Error @yield('title')">
    <meta property="og:image" itemprop="image" content="@yield('img')">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:updated_time" content="{{strtotime(date('Y-m-d'))}}"/>
    <!-- SEO -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrapAdaptation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/quilljsSnow.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/effects.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/utils.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/style.css')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/ftv2000favicon.png')}}"/>
    <link rel="preload" href="{{asset('images/loading.svg')}}" as="image">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/swiper.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/cookies.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quilljs.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/utils.js')}}" defer></script>
</head>
<body>

<!-- N O   S C R I P T -->

<noscript>
    <link rel="stylesheet" type="text/css" href="{{asset('css/scriptsDisabled.css')}}">
</noscript>

<!-- E N D   N O   S C R I P T -->

<!-- L O A D I N G   L A Y E R -->

<div class="loadingLayer noScriptDisplayNone">
    <div class="position-relative h-100">
        <img width="25%" height="25%" class="absoluteCenterBoth" alt="Icono de cargando (circulo azul que gira infinitamente)" src="{{asset('images/loading.svg')}}">
    </div>
</div>
<script id="loadingScript" type="text/javascript">
    $(window).on("load", function () {
        $('.loadingLayer').fadeOut("slow");
        $('#loadingScript').remove();
    });
</script>

<!-- E N D   L O A D I N G   L A Y E R  -->

<!-- C O O K I E S   P O P   U P -->

<div id="cookie_directive_container" class="container position-fixed cookies bg-deep-blue rounded shadow">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-inner navbar-content-center" id="cookie_accept">
                <a class="btn btn-default w-100 acceptCookies"><h5 class="theX interactive float-right hoverRed closeUserAccess text-white" data-dismiss="modal" aria-hidden="true">×</h5></a>
                <p class="text-white credit">
                    Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real Decreto-ley 13/2012.
                    Si continúa navegando consideramos que acepta el uso de cookies. <a target="_blank" href="{{url('cookiesPolicy')}}">Más Información.</a>
                </p>
                <br>
                <button class="btn bg-grey centerHorizontal mb-4 acceptCookies cookiesBtnHover"><strong class="px-4 color-deep-blue">Aceptar</strong></button>
            </div>
        </div>

    </nav>
</div>

<!-- E N D   C O O K I E S   P O P   U P  -->

@if($errors->any())

<!-- E R R O R S -->

<div id="errorModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content overflow-auto">
            <div class="modal-body">
                <h2 class="text-center ml-4 mb-4">
                    <strong>Error</strong>
                    <span class="theX interactive float-right hoverRed closeUserAccess" data-dismiss="modal" aria-hidden="true">×</span>
                </h2>
                <div class="row"><i id="modalSignal" class="glyphicon glyphicon-alert centerHorizontal pb-4"></i></div>
                <div class="row"><p class="text-center px-5 pb-2 w-100"><strong>{{$errors->first()}}</strong></p></div>
            </div>
        </div>
    </div>
</div>

<script id="errorScript" type="text/javascript">
    $('#errorModal').modal('toggle');
    $('#errorScript').remove();
</script>

<!-- E N D   E R R O R S -->

@endif

@if(Session::has('successMessage'))

<!-- O T H E R   M E S S A G E S   A N D   A L T E R N A T E   B E H A V I O U R S -->

<div id="messageModal" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-centered modal" role="document">
        <div class="modal-content overflow-auto">
            <div class="modal-body pt-1">
                <h2 class="text-center ml-3 mb-4">
                    <span class="theX interactive float-right hoverRed closeUserAccess dt-2" data-dismiss="modal" aria-hidden="true">×</span>
                </h2>
                <div class="row py-5"><i id="modalSignal" class="glyphicon glyphicon-ok centerHorizontal mb-4"></i></div>
                <div class="row">
                    <p class="text-center px-5 w-100">
                        <strong class="py-2 d-block">{{Session::get('successMessage')}}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="messageScript" type="text/javascript">
    $('#messageModal').modal('toggle');
    $('#messageScript').remove();
</script>

<!-- E N D   O T H E R   M E S S A G E S   A N D   A L T E R N A T E   B E H A V I O U R S -->

@endif

<!-- C E R T I F Y   B A R -->

<div id="certifyBar" class="d-lg-block d-none">
    <a href="{{url('certificates')}}">
        <div><img alt="Icono representando a una persona discapacitada en silla de ruedas" src="{{asset('images/accesibilidad.png')}}"></div>
        <div><img alt="Icono de la certificación EFQM+500" src="{{asset('images/EFQM+500.png')}}"></div>
        <div><img alt="Icono de la certificación ISO" src="{{asset('images/ISO.png')}}"></div>
        <div><img alt="Icono de la certificación EMAS" src="{{asset('images/EMAS.png')}}"></div>
    </a>
</div>

<!-- C E R T I F Y   B A R -->

<!-- N A V B A R -->

<div id="navbar" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-deep-blue px-lg-5 px-0">
        <div class="container-fluid px-0">
            <div class="row align-items-center w-100">
                <div class="col-12 mb-lg-0">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-6">
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img class="d-md-block d-none ml-lg-0 ml-sm-4 ml-0" src="{{asset('images/ftv2000logo.svg')}}" width="350" height="50" alt="Logo de Fuerteventura2000, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo azul marino.">
                                <img class="d-md-none d-block" src="{{asset('images/ftv2000logoResponsive.svg')}}" width="200" height="50" alt="Logo de Fuerteventura2000, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo azul marino.">
                            </a>
                        </div>
                        <div class="col-xl-6 offset-xl-3 col-lg-7 offset-lg-1 d-lg-block d-none">
                            <form action="{{url('search')}}" method="GET" class="form-inline w-100 my-2 my-lg-0 h-100">
                                <div class="container-fluid pl-0">
                                    <div class="row align-items-center">
                                        <div class="col-5 pr-0">
                                            <select class="form-control bg-grey w-100 mr-sm-2" name="location">
                                                <option value="Fuerteventura" selected>Fuerteventura</option>
                                                <option value="Gran Canaria">Gran Canaria</option>
                                                <option value="Tenerife">Tenerife</option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <select class="form-control bg-grey w-100 mr-sm-2" name="receiver">
                                                <option value="Todos" selected>Todos</option>
                                                <option value="Trabajadores">Trabajadores/as</option>
                                                <option value="Desempleados">Desempleados/as</option>
                                                <option value="Privado">Privados</option>
                                                <option value="Teleformación">Teleformación</option>
                                            </select>
                                        </div>
                                        <div class="col-2 pl-0">
                                            <button class="btn bg-grey text-black-50" type="submit"><strong class="noWrap">Ver cursos</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-xl-7 col-lg-6 col-4 d-flex align-items-center justify-content-end d-lg-none d-md-block mobileDismiss">
                            <div class="float-right h-100 d-sm-flex d-none align-items-center">
                                <a class="mx-2" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f text-white"></i></a>
                                <a class="mx-2" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter text-white"></i></a>
                                <a class="mx-2" href="https://www.instagram.com/ftv_2000" target="_blank"><i class="icon-instagram text-white"></i></a>
                                <a class="mx-2" href="https://www.linkedin.com/company/ftv-2000" target="_blank"><i class="icon-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                        <div class="col-2 d-lg-none d-md-block">
                            <button class="navbar-toggler float-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="glyphicon glyphicon-menu-hamburger text-white "></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-4 col-lg-8 offset-lg-2 col-12 pr-lg-2 pr-sm-0">
                    <div class="collapse navbar-collapse float-right w-100 pl-lg-0 pl-4" id="navbarSupportedContent">
                        <nav class="navbar navbar-expand-lg mobileFullView navbar-dark px-0 w-100 d-lg-none d-inline-block mt-3 border-top">
                            <form action="{{url('search')}}" method="GET" class="form-inline w-100 my-2 my-lg-0">
                                <div class="container-fluid pl-0">
                                    <div class="row">
                                        <div class="col-sm-5 col-7 pr-0">
                                            <select class="form-control bg-grey w-100 mr-sm-2" name="location">
                                                <option value="Fuerteventura" selected>Fuerteventura</option>
                                                <option value="Gran Canaria">Gran Canaria</option>
                                                <option value="Tenerife">Tenerife</option>
                                            </select>
                                        </div>
                                        <div class="col-5 d-sm-block d-none">
                                            <select class="form-control bg-grey w-100 mr-sm-2" name="receiver">
                                                <option value="Todos" selected>Todos</option>
                                                <option value="Trabajadores">Trabajadores/as</option>
                                                <option value="Desempleados">Desempleados/as</option>
                                                <option value="Privado">Privados</option>
                                                <option value="Teleformación">Teleformación</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-4 offset-sm-0 offset-1 px-0">
                                            <button class="btn bg-grey text-black-50 w-100" type="submit"><strong class="noWrap">Ver cursos</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="container-fluid px-xl-5 px-lg-0">
                                <div class="row align-items-center w-100">
                                    <div class="col-12 my-2 pr-0">
                                        <div>
                                            <div class="d-sm-flex text-center d-block justify-content-around w-100">
                                                <a class="mobileBigText d-block my-3" href="{{url('/')}}"><strong>Inicio</strong></a>
                                                <div class="showFloatingBox position-relative my-3">
                                                    <strong class="text-white mobileBigText">Conócenos <i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                                                    <div class="floatingBox mobileFloatingBox shadow">
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('aboutUs')}}"><strong>¿Quiénes somos?</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('certificates')}}"><strong>Nuestros certificados</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('joinUs')}}"><strong>Únete a nosotros</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('offices')}}"><strong>Ofertas de trabajo</strong></a>
                                                    </div>
                                                </div>
                                                <a class="mobileBigText d-block my-3" href="{{url('courses')}}"><strong class="text-white">Cursos</strong></a>
                                                <div class="showFloatingBox position-relative my-3">
                                                    <strong class="text-white mobileBigText">Formación <i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                                                    <div class="floatingBox mobileFloatingBox shadow">
                                                        <a class="mobileBigText d-block noWrap m-3" href="http://campus.fuerteventura2000.com" target="_blank"><strong>Campus virtual</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="http://formacion.fuerteventura2000.com" target="_blank"><strong>Cursos online</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="https://www.afsformacion.com/alumnado-en-practicas-para-tu-empresa" target="_blank"><strong>Alumnos en prácticas</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="https://fuerteventura2000.agenciascolocacion.com" target="_blank"><strong>Agencia de colocación</strong></a>
                                                    </div>
                                                </div>
                                                <a class="mobileBigText d-block my-3" href="{{url('news')}}"><strong class="text-white">Noticias</strong></a>
                                                <a class="mobileBigText d-block my-3" href="{{url('contact')}}"><strong class="text-white">Contacto</strong></a>
                                            </div>
                                            <div class="centerHorizontal w-fit d-sm-none d-flex mt-5">
                                                <a class="mobileBigText px-3" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a class="mobileBigText px-3" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter"></i></a>
                                                <a class="mobileBigText px-3" href="https://www.instagram.com/ftv_2000" target="_blank"><i class="icon-instagram"></i></a>
                                                <a class="mobileBigText px-3" href="https://www.linkedin.com/company/ftv-2000" target="_blank"><i class="icon-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-grey px-5 shadow d-lg-block d-none">
        <div class="container-fluid px-xl-5 px-lg-0">
            <div class="row align-items-center w-100">
                <div class="col-12">
                    <div class="d-flex float-right">
                        <a class="px-xl-4 px-lg-3 px-md-2" href="{{url('/')}}"><strong>Inicio</strong></a>
                        <div class="showFloatingBox position-relative">
                            <strong class="color-slate-blue">Conócenos<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                            <div class="floatingBox">
                                <div class="bg-grey shadow mt-2">
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('aboutUs')}}"><strong class="color-slate-blue">¿Quiénes somos?</strong></a>
                                    <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('certificates')}}"><strong class="color-slate-blue">Nuestros certificados</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="{{url('joinUs')}}"><strong class="color-slate-blue">Únete a nosotros</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="{{url('offices')}}"><strong class="color-slate-blue">Ofertas de trabajo</strong></a>
                                </div>
                            </div>
                        </div>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="{{url('courses')}}"><strong>Cursos</strong></a>
                        <div class="showFloatingBox position-relative">
                            <strong class="color-slate-blue">Formación<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                            <div class="floatingBox">
                                <div class="bg-grey shadow mt-2">
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="http://campus.fuerteventura2000.com" target="_blank"><strong class="color-slate-blue">Campus virtual</strong></a>
                                    <a class="mobileBigText d-block noWrap py-3 px-3" href="http://formacion.fuerteventura2000.com" target="_blank"><strong class="color-slate-blue">Cursos online</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="https://www.afsformacion.com/alumnado-en-practicas-para-tu-empresa" target="_blank"><strong class="color-slate-blue">Alumnos en prácticas</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="https://fuerteventura2000.agenciascolocacion.com" target="_blank"><strong class="color-slate-blue">Agencia de colocación</strong></a>
                                </div>
                            </div>
                        </div>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="{{url('news')}}"><strong>Noticias</strong></a>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="{{url('contact')}}"><strong>Contacto</strong></a>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter"></i></a>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="https://www.instagram.com/ftv_2000" target="_blank"><i class="icon-instagram"></i></a>
                        <a class="px-xl-4 px-lg-3 px-md-2" href="https://www.linkedin.com/company/ftv-2000" target="_blank"><i class="icon-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @if($errors->any())
        <noscript>
            <nav class="navbar navbar-expand-lg navbar-dark bg-red px-5 noScriptFade shadow">
                <div class="container-fluid px-5">
                    <div class="row align-items-center w-100">
                        <div class="col-12">
                            <p class="text-center text-white mb-0"><strong>{{$errors->first()}}</strong></p>
                        </div>
                    </div>
                </div>
            </nav>
        </noscript>
    @endif
    @if(Session::has('successMessage'))
        <noscript>
            <nav class="navbar navbar-expand-lg navbar-dark bg-green px-5 noScriptFade shadow">
                <div class="container-fluid px-5">
                    <div class="row align-items-center w-100">
                        <div class="col-12">
                            <p class="text-center text-white mb-0"><strong>{{Session::get('successMessage')}}</strong></p>
                        </div>
                    </div>
                </div>
            </nav>
        </noscript>
    @endif
</div>

<!-- E N D   N A V B A R -->


@show
@yield('content')
@section('footer')

<!-- F O O T E R -->

<footer class="page-footer font-small blue pt-4 bg-grey">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-4 offset-lg-1 offset-md-0 ml-lg-0 ml-md-5">
                <h4 class="color-black"><strong>Conócenos</strong></h4>
                <div class="ed-text mb-2" data-ed="generic-text-1">
                    {!! $genericTexts['generic-text-1'] !!}
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="color-black"><strong>Contacto</strong></h4>
                <div class="ed-text mb-2" data-ed="generic-text-2">
                    {!! $genericTexts['generic-text-2'] !!}
                </div>
            </div>
            <div class="col-xl-2 col-md-3 mb-2">
                <h4 class="color-black"><strong>Legal</strong></h4>
                <div><a class="ed-anchor" data-ed="{{url('controlPanel/termsAndConditions')}}" href="{{url('termsAndConditions')}}">Condiciones de uso</a></div>
                <div><a class="ed-anchor" data-ed="{{url('controlPanel/privacyPolicy')}}" href="{{url('privacyPolicy')}}">Protección de datos</a></div>
                <div><a class="ed-anchor" data-ed="{{url('controlPanel/cookiesPolicy')}}" href="{{url('cookiesPolicy')}}">Política de Cookies</a></div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3 bg-deep-blue">
        <span class="text-white">Copyright © {{date('Y')}} Fuerteventura 2000.<br class="d-md-none d-inline-block"> Todos los derechos reservados.</span>
    </div>
</footer>

<!-- E N D   F O O T E R -->

<script type="text/javascript" src="{{asset('js/layout.js')}}"></script>

</body>
</html>
@show
