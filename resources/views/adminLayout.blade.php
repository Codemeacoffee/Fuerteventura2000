@section('header')
    <!DOCTYPE html>
<html itemscope lang="es" dir="ltr" itemtype="https://schema.org/WebSite">
<head>
    <title>@yield('title')</title>
    <meta name="author" content="Inversiones Borma S.L.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- SEO -->
    <meta name="description" content="Administrador de Fuerteventura2000">
    <meta property="og:site_name" content="Fuerteventura2000">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:description" content="Administrador de Fuerteventura2000">
    <meta property="og:image" itemprop="image" content="{{asset('images/ftv2000SEO.jpg')}}">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:updated_time" content="{{strtotime(date('Y-m-d'))}}"/>
    <!-- SEO -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/controlPanel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrapAdaptation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/effects.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/utils.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/quilljsSnow.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fileinput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/explorer.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/style.css')}}">
    <link rel="shortcut icon" type="image/png" href= "{{asset('images/ftv2000favicon.png')}}"/>
    <link rel="preload" href="{{asset('images/loading.svg')}}" as="image">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/piexif.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fileinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/explorer.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/quilljs.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quill-image-resize-module-master/image-resize.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/quill-video-resize-module-master/video-resize.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/utils.js')}}" defer></script>
</head>
<body>

<!-- N O   S C R I P T -->

<noscript>
    <link rel="stylesheet" type="text/css" href="{{asset('css/scriptsDisabled.css')}}">
    <div class="container-fluid">
        <div class="col-xl-6 col-lg-8 col-md-10 col-12 absoluteCenterBoth bg-deep-blue rounded shadow py-5 px-xl-5 px-lg-5 px-md-5 px-3">
            <img alt="Logo de Fuerteventura2000, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo azul marino." class="centerHorizontal" src="{{asset('images/ftv2000logo.svg')}}">
            <h5 class="mt-4 text-white">El administrador de  Fuerteventura2000.com necesita Javascript para poder operar correctamente, por ello, le pedimos que active
                Javascript para poder continuar. <br><br> Esto lo puede hacer desde los siguientes enlaces segun su navegador:
            </h5>
            <div class="row mt-4">
                <div class="col-xl-3 col-lg-3 col-6">
                    <ul class="list-group">
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/chrome" target="_blank"><strong class="text-white">Chrome</strong></a></li>
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/safari-iphone" target="_blank"><strong class="text-white">Safari (iphone)</strong></a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-6">
                    <ul class="list-group">
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/firefox" target="_blank"><strong class="text-white">Firefox</strong></a></li>
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/safari-ipad" target="_blank"><strong class="text-white">Safari (ipad)</strong></a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-6">
                    <ul class="list-group">
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/opera" target="_blank"><strong class="text-white">Opera</strong></a></li>
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/edge" target="_blank"><strong class="text-white">Edge</strong></a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-6">
                    <ul class="list-group">
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/safari" target="_blank"><strong class="text-white">Safari</strong></a></li>
                        <li class="list-group-item bg-deep-blue border-0"><a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/internet-explorer" target="_blank"><strong class="text-white">Internet Explorer</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</noscript>

<!-- E N D   N O   S C R I P T -->

<!-- L O A D I N G   L A Y E R -->

<div class="loadingLayer">
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

<!-- N A V B A R -->

<div id="navbar" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-slate-blue px-lg-5 px-0">
        <div class="container-fluid px-0">
            <div class="row align-items-center w-100">
                <div class="col-12 mb-lg-0">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-6">
                            <a class="navbar-brand" href="{{url('controlPanel')}}">
                                <img class="d-md-block d-none ml-lg-0 ml-sm-4 ml-0" src="{{asset('images/ftv2000logo.svg')}}" width="350" height="50" alt="Logo de Fuerteventura2000 versión alternativa del apartado panel de control, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo gris.">
                                <img class="d-md-none d-block" src="{{asset('images/ftv2000logoResponsive.svg')}}" width="200" height="50" alt="Logo de Fuerteventura2000 versión alternativa del apartado panel de control, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo gris.">
                            </a>
                        </div>
                        <div class="col-xl-6 offset-xl-3 col-lg-7 offset-lg-1 d-lg-block d-none">
                            <div class="collapse navbar-collapse float-right w-100" id="navbarSupportedContent">
                                <div class="container-fluid">
                                    <div class="row float-right">
                                        <a target="_blank" class="previewAnchor mt-2 mr-4"><button class="btn bg-grey text-black-50"><strong>Ver Web</strong></button></a>
                                        <a href="{{url('closeSession')}}" class="mt-2"><button class="btn bg-grey text-black-50"><strong>Cerrar sesión</strong></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 offset-4 d-lg-none d-md-block">
                            <button class="navbar-toggler float-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="glyphicon glyphicon-menu-hamburger text-white "></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-4 col-lg-8 offset-lg-2 col-12 pr-lg-2 pr-sm-0">
                    <div class="collapse navbar-collapse float-right w-100 pl-lg-0 pl-4" id="navbarSupportedContent">
                        <nav class="navbar navbar-expand-lg mobileFullView navbar-dark px-0 w-100 d-lg-none d-inline-block mt-3 border-top">
                            <div class="container-fluid px-xl-5 px-lg-0">
                                <div class="row align-items-center w-100">
                                    <div class="col-12 my-2 pr-0">
                                        <div>
                                            <div class="d-sm-flex text-center d-block justify-content-around w-100">
                                                <a class="text-white mobileBigText d-md-inline d-block my-3" href="{{url('controlPanel')}}"><strong <?php if($page == '') echo 'class="selected"' ?>>Inicio</strong></a>
                                                <div class="showFloatingBox d-flex align-items-center position-relative">
                                                    <strong class="text-white w-100 my-3 mobileBigText <?php if($page == 'aboutUs' || $page == 'certificates' || $page == 'joinUs') echo 'selected' ?>">Conócenos<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                                                    <div class="floatingBox centerHorizontal">
                                                        <div class="bg-grey shadow py-2 px-4">
                                                            <a class="text-white mobileBigText d-block noWrap my-3" href="{{url('controlPanel/aboutUs')}}"><strong class="color-slate-blue <?php if($page == 'aboutUs') echo 'selected' ?>">¿Quiénes somos?</strong></a>
                                                            <a class="text-white mobileBigText d-block noWrap my-3" href="{{url('controlPanel/certificates')}}"><strong class="color-slate-blue <?php if($page == 'certificates') echo 'selected' ?>">Nuestros certificados</strong></a>
                                                            <a class="text-white mobileBigText d-block noWrap my-3" href="{{url('controlPanel/joinUs')}}"><strong class="color-slate-blue <?php if($page == 'joinUs') echo 'selected' ?>">Únete a nosotros</strong></a>
                                                            <a class="text-white mobileBigText d-block noWrap my-3" href="{{url('controlPanel/administrateOffices')}}"><strong class="color-slate-blue <?php if($page == 'offices') echo 'selected' ?>">Ofertas de trabajo</strong></a>
                                                            <a class="text-white mobileBigText d-block noWrap my-3" href="{{url('controlPanel/transparencyPortal')}}"><strong class="color-slate-blue <?php if($page == 'transparencyPortal') echo 'selected' ?>">Portal de transparencia</strong></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="text-white mobileBigText d-md-inline d-block my-3" href="{{url('controlPanel/administrateCourses?page=1')}}"><strong <?php if($page == 'courses') echo 'class="selected"' ?>>Cursos</strong></a>
                                                <a class="text-white mobileBigText d-md-inline d-block my-3" href="{{url('controlPanel/administrateNews')}}"><strong <?php if($page == 'news') echo 'class="selected"' ?>>Noticias</strong></a>
                                                <a class="text-white mobileBigText d-md-inline d-block my-3" href="{{url('controlPanel/administrateContacts')}}"><strong <?php if($page == 'contacts') echo 'class="selected"' ?>>Contacto</strong></a>
                                                <a class="text-white mobileBigText d-md-inline d-block my-3" href="{{url('controlPanel/administrateQuestionnaires')}}"><strong <?php if($page == 'questionnaires') echo 'class="selected"' ?>>Cuestionarios</strong></a>
                                                <div class="d-flex justify-content-center w-100">
                                                    <a class="text-white mobileBigText m-3 interactive" data-toggle="modal" data-target="#uploadFilesModal"><i title="Administrador de archivos" class="glyphicon glyphicon-folder-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid mt-4 pl-0">
                                <div class="centerHorizontal d-flex">
                                    <a class="previewAnchor" target="_blank"><button class="btn bg-grey text-black-50 noWrap mr-4"><strong>Ver Web</strong></button></a>
                                    <a href="{{url('closeSession')}}"><button class="btn bg-grey text-black-50 noWrap"><strong>Cerrar sesión</strong></button></a>
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
                        <a class="px-4" href="{{url('controlPanel')}}"><strong <?php if($page == '') echo 'class="selected"' ?>>Inicio</strong></a>
                        <div class="showFloatingBox position-relative">
                            <strong class="color-slate-blue <?php if($page == 'aboutUs' || $page == 'certificates' || $page == 'joinUs') echo 'selected' ?>">Conócenos<i class="glyphicon glyphicon-chevron-down ml-1 small"></i></strong>
                            <div class="floatingBox">
                                <div class="bg-grey shadow mt-2">
                                    <a class="mobileBigText d-block noWrap pt-3 px-3" href="{{url('controlPanel/aboutUs')}}"><strong class="color-slate-blue <?php if($page == 'aboutUs') echo 'selected' ?>">¿Quiénes somos?</strong></a>
                                    <a class="mobileBigText d-block noWrap py-3 px-3" href="{{url('controlPanel/certificates')}}"><strong class="color-slate-blue <?php if($page == 'certificates') echo 'selected' ?>">Nuestros certificados</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="{{url('controlPanel/joinUs')}}"><strong class="color-slate-blue <?php if($page == 'joinUs') echo 'selected' ?>">Únete a nosotros</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="{{url('controlPanel/administrateOffices')}}"><strong class="color-slate-blue <?php if($page == 'offices') echo 'selected' ?>">Ofertas de trabajo</strong></a>
                                    <a class="mobileBigText d-block noWrap pb-3 px-3" href="{{url('controlPanel/transparencyPortal')}}"><strong class="color-slate-blue <?php if($page == 'transparencyPortal') echo 'selected' ?>">Portal de transparencia</strong></a>
                                </div>
                            </div>
                        </div>
                        <a class="px-4" href="{{url('controlPanel/administrateCourses?page=1')}}"><strong <?php if($page == 'courses') echo 'class="selected"' ?>>Cursos</strong></a>
                        <a class="px-4" href="{{url('controlPanel/administrateNews')}}"><strong <?php if($page == 'news') echo 'class="selected"' ?>>Noticias</strong></a>
                        <a class="px-4" href="{{url('controlPanel/administrateContacts')}}"><strong <?php if($page == 'contacts') echo 'class="selected"' ?>>Contacto</strong></a>
                        <a class="px-4" href="{{url('controlPanel/administrateQuestionnaires')}}"><strong <?php if($page == 'questionnaires') echo 'class="selected"' ?>>Cuestionarios</strong></a>
                        <a class="pl-4 interactive" data-toggle="modal" data-target="#uploadFilesModal"><i title="Administrador de archivos" class="glyphicon glyphicon-folder-open"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="position-fixed statusBar bg-white shadow">
    <form id="editPageForm" method="post" enctype="multipart/form-data" action="{{url('editPage')}}">
        {{csrf_field()}}
        <input type="hidden" name="page" value="<?php if(isset($page)) echo $page; else echo 'generic'; ?>">
        <input id="editedData" type="hidden" name="value">
        <div class="float-right h-100 px-5 py-3 d-flex align-items-center">
            <i id="cancelEdition" title="Cancelar" class="glyphicon glyphicon-remove color-deep-blue hover-grey interactive iconBig mr-5"></i>
            <i id="saveEdition" title="Guardar" class="glyphicon glyphicon-ok color-deep-blue hover-grey interactive iconBig"></i>
        </div>
    </form>
</div>

<div class="modal fade" id="uploadFilesModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100">Administrador de Archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="{{url('fileManager')}}">
            <div class="modal-body">
                    {{csrf_field()}}
                    <div class="fileList">
                        <?php

                        foreach ($files as $file){
                            echo '<div class="container-fluid">
                                    <div class="row">
                                    <div class="col-md-1 col-2"><i title="Archivo '.$file.'" class="glyphicon glyphicon-file color-deep-blue mt-1"></i></div>
                                    <div class="col-md-9 col-6"><p>'.$file.'</p></div>
                                    <div class="col-md-1 col-2"><i title="Borrar" class="glyphicon glyphicon-remove color-deep-blue mt-1 fileDelete"></i></div>
                                    <div class="col-md-1 col-2"><i title="Copiar URL" class="glyphicon glyphicon-copy color-deep-blue mt-1 urlCopy"></i></div>
                                    <input class="fileDeleteTarget disappear" type="submit" name="delete" value="'.$file.'">
                                    <input class="urlCopyTarget disappear" value="'.url('files/source').'/'.$file.'">
                                    </div>
                                    </div>';
                        }
                        if(empty($files)) echo '<p>Actualmente no hay archivos subidos.</p>'

                        ?>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Subir</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Elegir Archivo</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn cpBtn color-deep-blue border-deep-blue px-4"><strong>Cancelar</strong></button>
                <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- E N D   N A V B A R -->

@show
@yield('content')
@section('footer')

<!-- F O O T E R -->

<footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3 bg-deep-blue">
        <span class="text-white">Copyright © {{date('Y')}} Fuerteventura 2000. Todos los derechos reservados.</span>
    </div>
</footer>

<!-- E N D   F O O T E R -->

<script type="text/javascript" src="{{asset('js/controlPanel.js')}}"></script>

</body>
</html>
@show

