<!DOCTYPE html>
<html itemscope lang="es" dir="ltr" itemtype="https://schema.org/WebSite">
<head>
    <title>Cuestionario - Fuerteventura 2000</title>
    <meta name="author" content="Inversiones Borma S.L.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- SEO -->
    <meta name="description" content="Acceso al cuestionario de Fuerteventura2000">
    <meta property="og:site_name" content="Fuerteventura2000">
    <meta property="og:title" content="Cuestionario - Fuerteventura 2000">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:description" content="Acceso al cuestionario de Fuerteventura2000">
    <meta property="og:image" itemprop="image" content="{{asset('images/ftv2000SEO.jpg')}}">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:updated_time" content="{{strtotime(date('Y-m-d'))}}"/>
    <!-- SEO -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/effects.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/utils.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/ftv2000favicon.png')}}"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/cookies.min.js')}}" defer></script>
</head>
<body id="adminAccessBody">

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

<div class="layer baseLayer"></div>
<div class="layer colorLayer"></div>

<div class="container-fluid absoluteCenterBoth">
    <div class="row">
        <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0 bg-white adminAccessBox rounded shadow">
            <form action="{{url('questionnaireLogin')}}" method="post" class="p-lg-5 p-4">
                <div>
                    {{csrf_field()}}
                    <h2 class="color-deep-blue text-center"><strong>Cuestionario</strong></h2>
                    <input autocomplete="on" class="styledInput w-100 mt-4" type="text" name="user" placeholder="Usuario" required>
                    <input autocomplete="off" class="styledInput  w-100 mt-5" type="password" name="password" placeholder="Contraseña" required>
                    <button class="btn color-deep-blue border-deep-blue centerHorizontal px-4 mt-5"><strong>Acceder</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
