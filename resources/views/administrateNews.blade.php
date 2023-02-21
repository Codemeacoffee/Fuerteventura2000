@extends('adminLayout')
@section('header')
@section('title')Editor de Noticias - Panel de Control @endsection
@section('content')

<!-- A D M I N I S T R A T E   N E W S -->

<div class="container-fluid controlPanel">
    <div class="row h-100">
        <div class="col-12 overflow-auto">
            <div id="newFilter" class="row justify-content-center bg-grey p-2 pb-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <label for="newFilterTitle" class="color-deep-blue"><strong>Título</strong></label>
                    <input class="form-control" type="text" id="newFilterTitle">
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <label for="newFilterDate" class="color-deep-blue"><strong>Fecha de publicación</strong></label>
                    <input class="form-control" type="text" id="newFilterDate">
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <label for="newFilterContent" class="color-deep-blue"><strong>Contenido</strong></label>
                    <input class="form-control" type="text" id="newFilterContent">
                </div>
            </div>
            <div class="container-fluid courses mt-5">
                <div>
                    <i title="Añadir noticia" data-toggle="modal" data-target="#addNew" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal iconBig interactive mb-5 p-3"></i>
                    <div class="row mb-4">
                        <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                            <a class="float-right color-deep-blue" href="{{url('controlPanel/news')}}"><strong>Editar Página</strong></a>
                        </div>
                    </div>
                </div>

                <!-- Add Modal -->
                <div class="modal fade addNew" id="addNew" tabindex="-1" role="dialog" aria-labelledby="Herramienta para añadir noticias" aria-hidden="true">
                    <form class="form-group addNewForm mb-0" data-nn="{{$nextNew}}" action="{{url("addNew")}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Añadir Noticia<strong></strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-md-5 px-2">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <label for="newAddTitle" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                                <input id="newAddTitle" class="form-control mb-2" type="text" name="title" required>
                                                <label for="newAddPublishDate" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de publicación <small class="text-danger">(La noticia estará oculta hasta que llege la fecha seleccionada)</small></h6></label>
                                                <input id="newAddPublishDate" class="form-control mb-2" type="text" name="publishDate" autocomplete="off">
                                                <div>
                                                    <label for="newAddContent" class="color-deep-blue"><h6 title="Este campo es opcional">Contenido</h6></label>
                                                    <div id="newAddContent" class="mb-2 newAddContent"></div>
                                                    <input type="hidden" name="content">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="newAddImage" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                                                <div class="file-loading">
                                                    <input id="newAddImage" name="image" type="file" accept="image">
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" name="promote" id="promoteAddNew">
                                                    <label class="form-check-label" for="promoteAddNew"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia a la noticia con respecto al resto de noticias)</small></h6></label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" name="hidden" id="hiddenAddNew">
                                                    <label class="form-check-label" for="hiddenAddNew"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, la noticia no será visible para los usuarios)</small></h6></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid mt-4 mb-2">
                                        <div class="float-right mb-2">
                                            <button type="submit" id="addNewSubmit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific"><strong>Guardar</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <script type="text/javascript" id="newAddScript">
                    $(window).on("load", function(){
                        let uploaded = false;

                        $("#newAddImage").fileinput({
                            theme: "explorer",
                            uploadUrl: "{{url('uploadImage/'.$nextNew.'/new')}}",
                            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                            maxFileCount: 1,
                            maxFileSize: 10000,
                            showAjaxErrorDetails: false
                        }).on('fileuploaded', function () {
                            uploaded = true;
                        });

                        $('.addNewForm').on('submit', function () {
                            if(!uploaded){
                                alert('Debe subir una foto antes de publicar la noticia.');
                                return false;
                            }
                        });

                        textEditorFromReference("#newAddContent");

                        $("#newAddPublishDate").datepicker();

                        $("#newAddScript").remove();
                    });
                </script>

                <?php

                if(isset($news)){
                    foreach ($news as $new){
                        echo '<div class="row mb-4 new" data-title="'.$new['title'].'" data-publish-date="'.$new['publishDate'].'" data-content="'.strip_tags($new['content']).'">
                            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                            <div class="container-fluid bg-grey rounded shadow p-4';
                        if(!$new['display']) echo ' hidden';
                        echo'"><div class="row">
                            <div class="col-md-3 col-sm-5 offset-sm-0 col-12">
                            <img class="w-100 fixedHeightImg p-2 rounded" alt="'.$new['imageAlt'].'" data-src="'.asset('images/uploads/'.$new['image']).'">
                            </div>
                            <div class="col-md-5 col-sm-7 col-12">
                            <h4 class="color-deep-blue text-overflow-ellipsis pb-1"><strong>'.$new['title'].'</strong></h4>
                            <div class="color-deep-blue d-ld-inline-block d-none pr-3 text-overflow-ellipsis">'.$new['content'].'</div>
                            </div>
                            <div class="col-md-4 col-12 p-0 d-flex justify-content-center align-items-center">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-6">
                            <button class="btn cpBtn color-deep-blue border-deep-blue float-right px-4" data-toggle="modal" data-target="#deleteNewModal-'.$new['id'].'"><strong>Borrar</strong></button>
                            </div>
                            <div class="col-6">
                            <button class="btn cpBtn bg-deep-blue color-grey border-deep-blue px-4" data-toggle="modal" data-target="#editNewModal-'.$new['id'].'"><strong>Editar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade editNew" id="editNewModal-'.$new['id'].'" tabindex="-1" role="dialog" aria-labelledby="Editor de la noticia '.$new['title'].'" aria-hidden="true">
                            <form id="editNewForm'.$new['id'].'" class="form-group editNewForm mb-0" data-id="'.$new['id'].'" data-nn="'.$nextNew.'" action="'.url("editNew").'" method="post">';
                        echo csrf_field();
                        echo'<input type="hidden" name="new" value="'.$new["id"].'">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Editar <strong>'.$new['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body px-md-5 px-2">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-6 col-12">
                            <label for="newEditTitle'.$new['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                            <input id="newEditTitle'.$new['id'].'" class="form-control mb-2" type="text" value="'.$new['title'].'" name="title" required>
                            <label for="newEditPublishDate'.$new['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de publicación <small class="text-danger">(La noticia estará oculta hasta que llege la fecha seleccionada)</small></h6></label>
                            <input id="newEditPublishDate'.$new['id'].'" class="form-control mb-2" type="text" name="publishDate" value="'.$new['publishDate'].'" autocomplete="off">
                            <div>
                            <label for="newEditContent'.$new['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Contenido</h6></label>
                            <div id="newEditContent'.$new['id'].'" class="mb-2 newAddContent">'.$new['content'].'</div>
                            <input type="hidden" name="content">
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <label for="neweEditImage'.$new['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                            <div class="file-loading">
                            <input id="newEditImage'.$new['id'].'" name="image" type="file" accept="image">
                            </div>
                            <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="promote" id="promoteNew'.$new['id'].'" ';
                        if($new['promote'] > 0) echo 'checked="true"';
                        echo'>
                            <label class="form-check-label" for="promoteNew'.$new['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia a la noticia con respecto al resto de noticias)</small></h6></label>
                            </div>
                            <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="hidden" id="hiddenNew'.$new['id'].'" ';
                        if($new['display'] < 1) echo 'checked="true"';
                        echo'>
                            <label class="form-check-label" for="hiddenNew'.$new['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, la noticia no será visible para los usuarios)</small></h6></label>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="container-fluid mt-4 mb-2">
                            <div class="float-right mb-2">
                            <button id="editNewSubmit'.$new['id'].'" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteNewModal-'.$new['id'].'" tabindex="-1" role="dialog" aria-labelledby="Confirmación ¿desea borrar la noticia '.$new['title'].'?" aria-hidden="true">
                            <form action="'.url("deleteNew").'" method="post">';
                        echo csrf_field();
                        echo'<input type="hidden" name="new" value="'.$new["id"].'">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Borrar <strong>'.$new['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6 class="text-center px-4">¿Está seguro de que desea borrar la noticia <strong>'.$new['title'].'</strong>?</h6>
                            </div>
                            <div class="modal-footer border-0">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-3 offset-2">
                            <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4" data-dismiss="modal"><strong>Cancelar</strong></button>
                            </div>
                            <div class="col-3 offset-1">
                            <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Aceptar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            <script type="text/javascript" id="newEditScript'.$new['id'].'">
                                $(window).on("load", function(){
                                     $("#newEditImage'.$new['id'].'").fileinput({
                                        theme: "explorer",
                                        uploadUrl: "'.url('uploadImage/'.$new['id'].'/new').'",
                                        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                                        maxFileCount: 1,
                                        initialPreview: ["<img data-src=\\"'.asset("images/uploads/".$new['image']).'\\" class=\\"kv-preview-data file-preview-image\\" alt=\\"'.$new['imageAlt'].'\\">"],
                                        overwriteInitial: true,
                                        initialPreviewAsData: false,
                                        maxFileSize: 500,
                                    });

                                    textEditorFromReference("#newEditContent'.$new['id'].'");

                                    $("#newEditPublishDate'.$new['id'].'").datepicker();

                                    $("#newEditScript'.$new['id'].'").remove();
                                });
                            </script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- E N D   A D M I N I S T R A T E   N E W S -->

<script id="previewScript" type="text/javascript">
    $(window).on('load', function () {
        let previewUrl = "<?php echo url('/').'/news' ?>";
        $('.previewAnchor').attr('href', previewUrl);
        $('#previewScript').remove();
    })
</script>

@stop
@section('footer')
