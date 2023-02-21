@extends('adminLayout')
@section('header')
@section('title')Editor de Ofertas de Trabajo - Panel de Control @endsection
@section('content')

    <!-- A D M I N I S T R A T E   O F F I C E S -->

    <div class="container-fluid controlPanel">
        <div class="row h-100">
            <div class="col-12 overflow-auto">
                <div id="officeFilter" class="row justify-content-center bg-grey p-2 pb-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label for="officeFilterTitle" class="color-deep-blue"><strong>Título</strong></label>
                        <input class="form-control" type="text" id="officeFilterTitle">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="officeFilterLocation" class="color-deep-blue"><strong>Localización</strong></label>
                        <select id="officeFilterLocation" class="form-control">
                            <option selected>Todos</option>
                            <option>Fuerteventura</option>
                            <option>Gran Canaria</option>
                            <option>Tenerife</option>
                            <option>Lanzarote</option>
                            <option>La Palma</option>
                            <option>La Gomera</option>
                            <option>El Hierro</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <label for="officeFilterDescription" class="color-deep-blue"><strong>Descripción</strong></label>
                        <input class="form-control" type="text" id="officeFilterDescription">
                    </div>
                </div>
                <div class="container-fluid offices mt-5">
                    <div>
                        <i title="Añadir oferta de trabajo" data-toggle="modal" data-target="#addOffice" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal iconBig interactive mb-5 p-3"></i>
                        <div class="row mb-4">
                            <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                                <a class="float-right color-deep-blue" href="{{url('controlPanel/offices')}}"><strong>Editar Página</strong></a>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade addOffice" id="addOffice" tabindex="-1" role="dialog" aria-labelledby="Herramienta para añadir ofertas de trabajo" aria-hidden="true">
                        <form class="form-group addOfficeForm mb-0" data-nn="{{$nextOffice}}" action="{{url("addOffice")}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Añadir oferta de trabajo<strong></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-md-5 px-2">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="officeAddTitle" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                                    <input id="officeAddTitle" class="form-control mb-2" type="text" name="title" required>
                                                    <label for="officeAddLocation" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                                    <select id="officeAddLocation" class="form-control mb-2" name="location" required>
                                                        <option selected>Fuerteventura</option>
                                                        <option>Gran Canaria</option>
                                                        <option>Tenerife</option>
                                                        <option>Lanzarote</option>
                                                        <option>La Palma</option>
                                                        <option>La Gomera</option>
                                                        <option>El Hierro</option>
                                                    </select>
                                                    <label for="officeAddPublishDate" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de fin <small class="text-danger">(La oferta de trabajo se ocultará pasada la fecha seleccionada)</small></h6></label>
                                                    <input id="officeAddPublishDate" class="form-control mb-2" type="text" name="endDate" autocomplete="off">
                                                    <div>
                                                        <label for="officeAddDescription" class="color-deep-blue"><h6 title="Este campo es opcional">Descripción</h6></label>
                                                        <div id="officeAddDescription" class="mb-2 officeAddDescription"></div>
                                                        <input type="hidden" name="description">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="officeAddImage" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                                                    <div class="file-loading">
                                                        <input id="officeAddImage" name="image" type="file" accept="image">
                                                    </div>
                                                    <div class="form-check mt-4">
                                                        <input class="form-check-input" type="checkbox" name="promote" id="promoteAddoffice">
                                                        <label class="form-check-label" for="promoteAddoffice"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia a la oferta de trabajo con respecto al resto de ofertas de trabajo)</small></h6></label>
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="checkbox" name="hidden" id="hiddenAddoffice">
                                                        <label class="form-check-label" for="hiddenAddoffice"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, la oferta de trabajo no será visible para los usuarios)</small></h6></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid mt-4 mb-2">
                                            <div class="float-right mb-2">
                                                <button type="submit" id="addOfficeSubmit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific"><strong>Guardar</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script type="text/javascript" id="officeAddScript">
                        $(window).on("load", function(){
                            let uploaded = false;

                            $("#officeAddImage").fileinput({
                                theme: "explorer",
                                uploadUrl: "{{url('uploadImage/'.$nextOffice.'/office')}}",
                                allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                                maxFileCount: 1,
                                maxFileSize: 10000,
                                showAjaxErrorDetails: false
                            }).on('fileuploaded', function () {
                                uploaded = true;
                            });

                            $('.addOfficeForm').on('submit', function () {
                                if(!uploaded){
                                    alert('Debe subir una foto antes de publicar la oferta de trabajo.');
                                    return false;
                                }
                            });

                            textEditorFromReference("#officeAddDescription");

                            $("#officeAddPublishDate").datepicker();

                            $("#officeAddScript").remove();
                        });
                    </script>

                    <?php

                    if(isset($offices)){
                        foreach ($offices as $office){
                            echo '<div class="row mb-4 office" data-title="'.$office['title'].'" data-location="'.$office['location'].'" data-description="'.strip_tags($office['description']).'">
                            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                            <div class="container-fluid bg-grey rounded shadow p-4';
                            if(!$office['display'] || ($office['end_date'] && strtotime(DateTime::createFromFormat('d/m/Y', $office['end_date'])->format('Y-m-d')) < strtotime(date('Y-m-d')))) echo ' hidden';
                            echo'"><div class="row">
                            <div class="col-md-3 col-sm-5 offset-sm-0 col-12">
                            <img class="w-100 fixedHeightImg p-2 rounded" alt="'.$office['imageAlt'].'" data-src="'.asset('images/uploads/'.$office['image']).'">
                            </div>
                            <div class="col-md-5 col-sm-7 col-12">
                            <h4 class="color-deep-blue text-overflow-ellipsis pb-1"><strong>'.$office['title'].'</strong></h4>
                            <div class="color-deep-blue d-ld-inline-block d-none pr-3 text-overflow-ellipsis">'.$office['description'].'</div>
                            </div>
                            <div class="col-md-4 col-12 p-0 d-flex justify-content-center align-items-center">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-6">
                            <button class="btn cpBtn color-deep-blue border-deep-blue float-right px-4" data-toggle="modal" data-target="#deleteOfficeModal-'.$office['id'].'"><strong>Borrar</strong></button>
                            </div>
                            <div class="col-6">
                            <button class="btn cpBtn bg-deep-blue color-grey border-deep-blue px-4" data-toggle="modal" data-target="#editOfficeModal-'.$office['id'].'"><strong>Editar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade editOffice" id="editOfficeModal-'.$office['id'].'" tabindex="-1" role="dialog" aria-labelledby="Editor de la oferta de trabajo '.$office['title'].'" aria-hidden="true">
                            <form id="editOfficeForm'.$office['id'].'" class="form-group editOfficeForm mb-0" data-id="'.$office['id'].'" data-nn="'.$nextOffice.'" action="'.url("editOffice").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="office" value="'.$office["id"].'">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Editar <strong>'.$office['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body px-md-5 px-2">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-6 col-12">
                            <label for="officeEditTitle'.$office['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                            <input id="officeEditTitle'.$office['id'].'" class="form-control mb-2" type="text" value="'.$office['title'].'" name="title" required>
                            <label for="officeEditLocation'.$office['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                            <select id="officeEditLocation'.$office['id'].'" class="form-control mb-2" name="location" required>
                            <option '; if($office['location'] == 'Gran Canaria') echo 'selected'; echo'>Gran Canaria</option>
                            <option '; if($office['location'] == 'Tenerife') echo 'selected'; echo'>Tenerife</option>
                            <option '; if($office['location'] == 'Lanzarote') echo 'selected'; echo'>Lanzarote</option>
                            <option '; if($office['location'] == 'La Palma') echo 'selected'; echo'>La Palma</option>
                            <option '; if($office['location'] == 'La Gomera') echo 'selected'; echo'>La Gomera</option>
                            <option '; if($office['location'] == 'El Hierro') echo 'selected'; echo'>El Hierro</option>
                            </select>
                            <label for="officeEditPublishDate'.$office['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de fin <small class="text-danger">(La oferta de trabajo se ocultará pasada la fecha seleccionada)</small></h6></label>
                            <input id="officeEditPublishDate'.$office['id'].'" class="form-control mb-2" type="text" name="endDate" value="'.$office['end_date'].'" autocomplete="off">
                            <div>
                            <label for="officeEditDescription'.$office['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Descripción</h6></label>
                            <div id="officeEditDescription'.$office['id'].'" class="mb-2 officeAddDescription">'.$office['description'].'</div>
                            <input type="hidden" name="description">
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <label for="officeeEditImage'.$office['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                            <div class="file-loading">
                            <input id="officeEditImage'.$office['id'].'" name="image" type="file" accept="image">
                            </div>
                            <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="promote" id="promoteoffice'.$office['id'].'" ';
                            if($office['promote'] > 0) echo 'checked="true"';
                            echo'>
                            <label class="form-check-label" for="promoteoffice'.$office['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia a la oferta de trabajo con respecto al resto de ofertas de trabajo)</small></h6></label>
                            </div>
                            <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="hidden" id="hiddenoffice'.$office['id'].'" ';
                            if($office['display'] < 1) echo 'checked="true"';
                            echo'>
                            <label class="form-check-label" for="hiddenOffice'.$office['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, la oferta de trabajo no será visible para los usuarios)</small></h6></label>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="container-fluid mt-4 mb-2">
                            <div class="float-right mb-2">
                            <button id="editOfficeSubmit'.$office['id'].'" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteOfficeModal-'.$office['id'].'" tabindex="-1" role="dialog" aria-labelledby="Confirmación ¿desea borrar la oferta de trabajo '.$office['title'].'?" aria-hidden="true">
                            <form action="'.url("deleteOffice").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="office" value="'.$office["id"].'">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Borrar <strong>'.$office['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6 class="text-center px-4">¿Está seguro de que desea borrar la oferta de trabajo <strong>'.$office['title'].'</strong>?</h6>
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
                            <script type="text/javascript" id="officeEditScript'.$office['id'].'">
                                $(window).on("load", function(){
                                     $("#officeEditImage'.$office['id'].'").fileinput({
                                        theme: "explorer",
                                        uploadUrl: "'.url('uploadImage/'.$office['id'].'/office').'",
                                        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                                        maxFileCount: 1,
                                        initialPreview: ["<img data-src=\\"'.asset("images/uploads/".$office['image']).'\\" class=\\"kv-preview-data file-preview-image\\" alt=\\"'.$office['imageAlt'].'\\">"],
                                        overwriteInitial: true,
                                        initialPreviewAsData: false,
                                        maxFileSize: 500,
                                    });

                                    textEditorFromReference("#officeEditDescription'.$office['id'].'");

                                    $("#officeEditPublishDate'.$office['id'].'").datepicker();

                                    $("#officeEditScript'.$office['id'].'").remove();
                                });
                            </script>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- E N D   A D M I N I S T R A T E   O F F I C E S -->

    <script id="previewScript" type="text/javascript">
        $(window).on('load', function () {
            let previewUrl = "<?php echo url('/').'/offices' ?>";
            $('.previewAnchor').attr('href', previewUrl);
            $('#previewScript').remove();
        })
    </script>

@stop
@section('footer')
