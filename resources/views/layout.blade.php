@section('header')
    <!DOCTYPE html>
<html itemscope lang="es" dir="ltr" itemtype="https://schema.org/WebSite">
<head>
    <title>@yield('title')</title>
    <meta name="author" content="<?php echo env("AUTHOR", "Inversiones Borma S.L."); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="_d2NjGe7XD5xnGPCGFQkrc1TMIR7gubqSWMZTKE4oTc" />
    <!-- SEO -->
    <meta name="keywords" content="@yield('keyword')formación, cursos, estudios, educación, enseñanza,
        aprendizaje, formación gratuita, formación gratis, formación profesional, profesional, empleo, gratuita,
        gratuito, islas canarias, cursos sepe, sepe, cursos fundae, fundae, servicio canario empleo,
        cursos servicio canario empleo, certificado, certificado profesionalidad, compromiso de contratación,
        módulo formativo, módulos formativos, módulo, módulos, unidad formativa, unidades formativas,
        unidad, unidades">
    <meta name="description" content="@yield('description')">
    <meta property="og:site_name" content="Fuerteventura2000">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" itemprop="image" content="@yield('img')">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:updated_time" content="{{strtotime(date('Y-m-d'))}}"/>
    <!-- SEO -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrapAdaptation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/quilljsSnow.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/effects.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/utils.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/style.css')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/ftv2000favicon.png')}}"/>
    <link rel="preload" href="{{asset('images/loading.svg')}}" as="image">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/swiper.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/cookies.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quilljs.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quill-image-resize-module-master/image-resize.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quill-video-resize-module-master/video-resize.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/utils.js')}}" defer></script>
    <script type="text/javascript" src="https://www.googletagmanager.com/gtag/js?id=UA-122331451-1" async></script>
    <script type="text/javascript" src="{{asset('js/googleAnalytics.js')}}"></script>
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

<div id="cookie_directive_container" class="container-fluid position-fixed cookies bg-deep-blue">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-inner navbar-content-center" id="cookie_accept">
                        <p class="text-white pt-2">
                            Bienvenida/o a la información básica sobre las cookies de la página web responsabilidad de la entidad:
                        </p>
                        <p class="text-white">
                             <strong>FUERTEVENTURA 2000, S.L.</strong>
                        </p>
                        <p class="text-white">
                            Una cookie o galleta informática es un pequeño archivo de información que se guarda en tu ordenador, “smartphone” o tableta cada vez que visitas nuestra página web. 
                            Algunas cookies son nuestras y otras pertenecen a empresas externas que prestan servicios para nuestra página web.
                            Las cookies pueden ser de varios tipos: las cookies técnicas son necesarias para que nuestra página web pueda funcionar, no necesitan de tu autorización y son las 
                            únicas que tenemos activadas por defecto. Por tanto, son las únicas cookies que estarán activas si solo pulsas el botón ACEPTAR.
                            El resto de cookies sirven para mejorar nuestra página, para personalizarla en base a tus preferencias, o para poder mostrarte publicidad ajustada a tus búsquedas, 
                            gustos e intereses personales. Todas ellas las tenemos desactivadas por defecto, pero puedes activarlas en nuestro apartado <strong>CONFIGURACIÓN DE COOKIES: 
                            toma el control y disfruta de una navegación personalizada en nuestra página, con un paso tan sencillo y rápido como la marcación de las casillas que tú quieras.</strong>      
                        </p>
                        <p class="text-white">
                             Si quieres más información, consulta la <strong><a class="alternateLink" target="_blank" href="{{url('cookiesPolicy')}}">POLÍTICA DE COOKIES</a></strong> de nuestra página web.
                        </p>
                        </p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0">
                                     <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6 col-12">
                                                <button class="btn bg-grey mr-4 mb-4 acceptCookies cookiesBtnHover w-100"><strong class="color-deep-blue">Aceptar</strong></button>
                                            </div>
                                             <div class="col-sm-6 col-12">
                                                <a href="{{url('configCookies')}}"><button class="btn bg-grey mb-4 cookiesBtnHover w-100"><strong class="color-deep-blue">Configuración de cookies</strong></button></a>
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
    <a href="https://www.un.org/sustainabledevelopment/es/sustainable-development-goals/" target="_blank">
        <div><img alt="Icono de Sustainable Development Goals" src="{{asset('images/SDG-Wheel_Transparent_WEB.PNG')}}"></div>
    </a>
    <a href="{{url('certificates')}}">
        <div><img alt="Icono representando a una persona discapacitada en silla de ruedas" src="{{asset('images/accesibilidad.png')}}"></div>
        <div><img alt="Icono de la certificación EFQM+500" src="{{asset('images/EFQM+500.png')}}"></div>
        <div><img alt="Icono de la certificación ISO" src="{{asset('images/ISO.png')}}"></div>
        <div><img alt="Icono de la certificación EMAS" src="{{asset('images/EMAS.png')}}"></div>
        <div><img alt="Icono de la certificación ISO" src="{{asset('images/ISO 27001.png')}}"></div>
    </a>
</div>

<!-- C E R T I F Y   B A R -->

<!-- N A V B A R -->

<div id="navbar" class="fixed-top">
    <div class="container-fluid bg-deep-blue d-lg-block d-none">
        <div class="row">
            <div class="col-12 text-right mt-2">
                <a class="px-xl-3 px-lg-2 px-md-1" href="https://www.gesforcan.com/login/index.php" target="_blank"><strong class="text-white">Campus virtual</strong></a>
                <a class="px-xl-3 px-lg-2 px-md-1" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f text-white"></i></a>
                <!--<a class="px-xl-3 px-lg-2 px-md-1" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter text-white"></i></a>-->
                <a class="px-xl-3 px-lg-2 px-md-1" href="https://www.instagram.com/ftv_2000" target="_blank"><i class="icon-instagram text-white"></i></a>
                <a class="px-xl-3 px-lg-2 px-md-1" href="https://www.linkedin.com/company/ftv-2000" target="_blank"><i class="icon-linkedin-in text-white"></i></a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-deep-blue pt-lg-0 pt-2 pl-lg-5 px-0">
        <div class="container-fluid px-0">
            <div class="row align-items-center w-100 mx-0">
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
                                    <div class="row align-items-center justify-content-around">
                                        <div class="flex-grow-1 pr-2">
                                            <select class="form-control btn float-right bg-grey w-100" name="location">
                                                <option selected>Fuerteventura</option>
                                                <option>Gran Canaria</option>
                                                <option>Tenerife</option>
                                                <option>Lanzarote</option>
                                                <option>La Palma</option>
                                                <option>La Gomera</option>
                                                <option>El Hierro</option>
                                            </select>
                                        </div>
                                        <div class="flex-grow-1 pr-2">
                                            <select class="form-control btn float-right bg-grey w-100" name="receiver">
                                                <option value="Todos" selected>Todos</option>
                                                <option value="Trabajadores">Trabajadores/as</option>
                                                <option value="Desempleados">Desempleados/as</option>
                                                <option value="Privado">Privados</option>
                                                <option value="Teleformación">Teleformación</option>
                                            </select>
                                        </div>
                                        <div class="flex-grow-0">
                                            <button class="btn float-right bg-grey text-black-50" type="submit"><strong class="noWrap">Ver cursos</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-4 d-flex align-items-center justify-content-end d-lg-none d-md-block mobileDismiss">
                            <a class="d-sm-block d-none text-right mx-2" href="https://www.gesforcan.com/login/index.php" target="_blank"><strong class="text-white">Campus virtual</strong></a>
                            <div class="float-right d-sm-flex d-none align-items-center mt-xl-2 mt-0">
                                <a class="mx-2" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f text-white"></i></a>
                                <!--<a class="mx-2" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter text-white"></i></a>-->
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
                    <div class="collapse navbar-collapse float-right w-100" id="navbarSupportedContent">
                        <nav class="navbar navbar-expand-lg mobileFullView navbar-dark px-0 w-100 d-lg-none d-inline-block mt-3 border-top">
                            <form action="{{url('search')}}" method="GET" class="form-inline w-100 my-2 my-lg-0">
                                <div class="container-fluid pl-0">
                                    <div class="row">
                                        <div class="col-sm-5 col-7 pr-0">
                                            <select class="form-control bg-grey w-100 mr-sm-2" name="location">
                                                <option selected>Fuerteventura</option>
                                                <option>Gran Canaria</option>
                                                <option>Tenerife</option>
                                                <option>Lanzarote</option>
                                                <option>La Palma</option>
                                                <option>La Gomera</option>
                                                <option>El Hierro</option>
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
                                <div class="row align-items-center w-100 m-0">
                                    <div class="col-12 my-2 px-0">
                                        <div>
                                            <div class="d-sm-flex text-center d-block justify-content-around w-100">
                                                <a class="mobileBigText d-block my-3" href="{{url('/')}}"><strong <?php if($page == 'index') echo'class="selected"' ?>>Inicio</strong></a>
                                                <div class="showFloatingBox position-relative my-3">
                                                    <strong class="text-white mobileBigText <?php if($page == 'aboutUs' || $page == 'certificates' || $page == 'joinUs' || $page == 'offices') echo'selected' ?>">Conócenos <i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                                                    <div class="floatingBox mobileFloatingBox shadow">
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('aboutUs')}}"><strong <?php if($page == 'aboutUs')  echo'class="selected"' ?>>¿Quiénes somos?</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('certificates')}}"><strong <?php if($page == 'certificates')  echo'class="selected"' ?>>Nuestros certificados</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('joinUs')}}"><strong <?php if($page == 'joinUs') echo'class="selected"' ?>>Únete a nosotros</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('offices')}}"><strong <?php if($page == 'offices')  echo'class="selected"' ?>>Ofertas de trabajo</strong></a>
                                                        <a class="mobileBigText d-block noWrap m-3" href="{{url('transparencyPortal')}}"><strong <?php if($page == 'transparencyPortal')  echo'class="selected"' ?>>Portal de transparencia</strong></a>
                                                    </div>
                                                </div>
                                                <a class="mobileBigText d-block my-3" href="{{url('courses')}}"><strong class="<?php if($page == 'courses') echo'selected' ?>">Cursos</strong></a>
                                                <!--<a class="mobileBigText d-block my-3" href="#" target="_blank"><strong >Master</strong></a>-->
                                                <a class="mobileBigText d-block my-3" href="https://fuerteventura2000.agenciascolocacion.com" target="_blank"><strong >Agencia de colocación</strong></a>
                                                <a class="mobileBigText d-block my-3" href="{{url('news')}}"><strong <?php if($page == 'news') echo'class="selected"' ?>>Noticias</strong></a>
                                                <a class="mobileBigText d-block my-3" href="{{url('contact')}}"><strong <?php if($page == 'contact') echo'class="selected"' ?>>Contacto</strong></a>
                                                <a class="mobileBigText d-sm-none d-block my-3 " href="https://www.gesforcan.com/login/index.php" target="_blank"><strong class="text-white">Campus virtual</strong></a>
                                            </div>
                                            <div class="centerHorizontal w-fit d-sm-none d-flex mt-4">
                                                <a class="mobileBigText px-3" href="https://www.facebook.com/fuerteventura2000" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <!--<a class="mobileBigText px-3" href="https://twitter.com/fv2000?lang=en" target="_blank"><i class="icon-twitter"></i></a>-->
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
        <div class="container-fluid">
            <div class="row align-items-center w-100">
                <div class="col-12">
                    <div class="d-flex float-right">
                        <a class="pl-xl-4 pl-lg-3 pl-md-2 <?php if($page == 'index') echo'selected' ?>" href="{{url('/')}}"><strong>Inicio</strong></a>
                        <div class="pl-xl-4 pl-lg-3 pl-md-2 showFloatingBox position-relative">
                            <strong class="color-slate-blue <?php if($page == 'aboutUs' || $page == 'certificates' || $page == 'joinUs' || $page == 'offices') echo'selected' ?>">Conócenos<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                            <div class="floatingBox">
                                <div class="bg-grey shadow mt-2">
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('aboutUs')}}"><strong class="color-slate-blue <?php if($page == 'aboutUs') echo'selected' ?>">¿Quiénes somos?</strong></a>
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('certificates')}}"><strong class="color-slate-blue <?php if($page == 'certificates') echo'selected' ?>">Nuestros certificados</strong></a>
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('joinUs')}}"><strong class="color-slate-blue <?php if($page == 'joinUs') echo'selected' ?>">Únete a nosotros</strong></a>
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('offices')}}"><strong class="color-slate-blue <?php if($page == 'offices') echo'selected' ?>">Ofertas de trabajo</strong></a>
                                    <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('transparencyPortal')}}"><strong class="color-slate-blue <?php if($page == 'transparencyPortal') echo'selected' ?>">Portal de transparencia</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="pl-xl-4 pl-lg-3 pl-md-2 showFloatingBox position-relative">
                            <a href="{{url('courses')}}"><strong class="color-slate-blue <?php if($page == 'courses' || $page == 1) echo'selected' ?>">Cursos<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong></a>
                            <div class="floatingBox">
                                <div class="bg-grey shadow mt-2">
                                    <div class="showFloatingBox position-relative">
                                        <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Desempleados')}}"><strong class="color-slate-blue">Desempleados/as<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong></a>
                                        <div class="floatingBox rightFloatingBox">
                                            <div class="bg-grey shadow mt-2">
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Desempleados')}}"><strong class="color-slate-blue">Fuerteventura</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Gran Canaria/Desempleados')}}"><strong class="color-slate-blue">Gran Canaria</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Tenerife/Desempleados')}}"><strong class="color-slate-blue">Tenerife</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Lanzarote/Desempleados')}}"><strong class="color-slate-blue">Lanzarote</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Palma/Desempleados')}}"><strong class="color-slate-blue">La Palma</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Gomera/Desempleados')}}"><strong class="color-slate-blue">La Gomera</strong></a>
                                                <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('courses/El Hierro/Desempleados')}}"><strong class="color-slate-blue">El Hierro</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="showFloatingBox position-relative">
                                        <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Trabajadores')}}"><strong class="color-slate-blue">Trabajadores/as<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong></a>
                                        <div class="floatingBox rightFloatingBox">
                                            <div class="bg-grey shadow mt-2">
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Trabajadores')}}"><strong class="color-slate-blue">Fuerteventura</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Gran Canaria/Trabajadores')}}"><strong class="color-slate-blue">Gran Canaria</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Tenerife/Trabajadores')}}"><strong class="color-slate-blue">Tenerife</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Lanzarote/Trabajadores')}}"><strong class="color-slate-blue">Lanzarote</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Palma/Trabajadores')}}"><strong class="color-slate-blue">La Palma</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Gomera/Trabajadores')}}"><strong class="color-slate-blue">La Gomera</strong></a>
                                                <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('courses/El Hierro/Trabajadores')}}"><strong class="color-slate-blue">El Hierro</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="showFloatingBox position-relative">
                                        <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Privado')}}"><strong class="color-slate-blue">Privados<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong></a>
                                        <div class="floatingBox rightFloatingBox">
                                            <div class="bg-grey shadow mt-2">
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Privado')}}"><strong class="color-slate-blue">Fuerteventura</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Gran Canaria/Privado')}}"><strong class="color-slate-blue">Gran Canaria</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Tenerife/Privado')}}"><strong class="color-slate-blue">Tenerife</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Lanzarote/Privado')}}"><strong class="color-slate-blue">Lanzarote</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Palma/Privado')}}"><strong class="color-slate-blue">La Palma</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Gomera/Privado')}}"><strong class="color-slate-blue">La Gomera</strong></a>
                                                <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('courses/El Hierro/Privado')}}"><strong class="color-slate-blue">El Hierro</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="showFloatingBox position-relative">
                                        <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Teleformación')}}"><strong class="color-slate-blue">Teleformación<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong></a>
                                        <div class="floatingBox rightFloatingBox">
                                            <div class="bg-grey shadow mt-2">
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Fuerteventura/Teleformación')}}"><strong class="color-slate-blue">Fuerteventura</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Gran Canaria/Teleformación')}}"><strong class="color-slate-blue">Gran Canaria</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Tenerife/Teleformación')}}"><strong class="color-slate-blue">Tenerife</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/Lanzarote/Teleformación')}}"><strong class="color-slate-blue">Lanzarote</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Palma/Teleformación')}}"><strong class="color-slate-blue">La Palma</strong></a>
                                                <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('courses/La Gomera/Teleformación')}}"><strong class="color-slate-blue">La Gomera</strong></a>
                                                <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('courses/El Hierro/Teleformación')}}"><strong class="color-slate-blue">El Hierro</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="mobileBigText d-block noWrap py-3 px-3" href="http://formacion.fuerteventura2000.com" target="_blank"><strong class="color-slate-blue">Cursos online</strong></a>
                                </div>
                            </div>
                        </div>
                        <!--<a class="pl-xl-4 pl-lg-3 pl-md-2" href="#" target="_blank"><strong>Master</strong></a>-->
                        <a class="pl-xl-4 pl-lg-3 pl-md-2" href="https://fuerteventura2000.agenciascolocacion.com" target="_blank"><strong>Agencia de colocación</strong></a>
                        <a class="pl-xl-4 pl-lg-3 pl-md-2 <?php if($page == 'news') echo'selected' ?>" href="{{url('news')}}"><strong>Noticias</strong></a>
                        <a class="pl-xl-4 pl-lg-3 pl-md-2 <?php if($page == 'contact') echo'selected' ?>" href="{{url('contact')}}"><strong>Contacto</strong></a>
                    </div>
                </div>
                <a class="position-absolute right mr-4 pr-2" href="https://app.fuerteventura2000.com/" target="_blank"><i title="Acceso" class="glyphicon glyphicon-log-in"></i></a>
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

    <!-- E X T R A   C O N T E N T -->

    <div class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="generic-title-2">{!! $genericTexts['generic-title-2'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row my-5 align-items-center">
                        <div class="col-xl-4 col-12 noScriptFullView">
                            <img class="w-lg-25 w-50 w-xs-75 noScriptW25 ed-img" data-ed="generic-img-1" src="{{asset('images/uploads/'.$genericTexts['generic-img-1'])}}">
                            <div class="mt-3">
                                <div class="ed-text w-100" data-ed="generic-text-3">
                                    {!! $genericTexts['generic-text-3'] !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12 noScriptDisplayNone">
                            <div id="jobs" class="swiper-container mt-4">
                                <div class="swiper-wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- E N D   E X T R A   C O N T E N T -->

    <!-- P A R T N E R S -->

    <div id="partners" class="container-fluid mb-6">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex mb-5">
                    <h1 class="color-slate-blue noWrap w-xs-100 text-xs-center pr-sm-4 pr-0"><strong class="ed-text-minus" data-ed="generic-title-1">{!! $genericTexts['generic-title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div  class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
                            <div id="partnersSwiper" class="swiper-container">
                                <div class="swiper-wrapper ">
                                    <?php

                                    foreach ($partners as $partner){
                                        echo '<div class="swiper-slide noScriptW25" data-index="'.$partner['id'].'">';
                                        if(strlen($partner['anchor']) > 0) echo '<a href="'.$partner['anchor'].'" target="_blank">';
                                        echo'<img class="swiper-lazy w-100" data-src="'.asset('images/uploads/'.$partner['logo']).'">
                                        <div class="swiper-lazy-preloader"></div>';
                                        if(strlen($partner['anchor']) > 0) echo '</a>';
                                        echo'</div>';
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

    <!-- E N D   P A R T N E R S -->

    <!-- F O O T E R -->

    <footer class="page-footer font-small blue pt-4 bg-grey">
        <div class="container-fluid mb-3">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <h4 class="color-black"><strong>Conócenos</strong></h4>
                    <div class="ed-text mb-2" data-ed="generic-text-1">
                        {!! $genericTexts['generic-text-1'] !!}
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <h4 class="color-black"><strong>Formación</strong></h4>
                    <div class="ed-text mb-2" data-ed="generic-text-4">
                        {!! $genericTexts['generic-text-4'] !!}
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <h4 class="color-black"><strong>Contacto</strong></h4>
                    <div class="ed-text mb-2" data-ed="generic-text-2">
                        {!! $genericTexts['generic-text-2'] !!}
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <h4 class="color-black"><strong>Legal</strong></h4>
                    <div><a class="ed-anchor" data-ed="{{url('controlPanel/privacyPolicy')}}" href="{{url('privacyPolicy')}}">Compromiso con la Protección de Datos Personales</a></div>
                    <div><a class="ed-anchor" data-ed="{{url('controlPanel/cookiesPolicy')}}" href="{{url('cookiesPolicy')}}">Política de Cookies</a></div>
                    <div><a class="ed-anchor" data-ed="{{url('controlPanel/securityPolicy')}}" href="{{url('securityPolicy')}}">Política de Privacidad</a></div>
                    <div><a class="ed-anchor" data-ed="{{url('controlPanel/configCookies')}}" href="{{url('configCookies')}}">Configuración De Cookies</a></div>
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
