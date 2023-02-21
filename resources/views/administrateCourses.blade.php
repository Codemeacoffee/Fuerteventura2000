@extends('adminLayout')
@section('header')
@section('title')Editor de Cursos - Panel de Control @endsection
@section('content')

<!-- A D M I N I S T R A T E   C O U R S E S -->

<div class="container-fluid controlPanel">
    <div class="row h-100">
        <div class="col-12 overflow-auto">
            <form method="get" action="{{url('filterCourses')}}">
                <input type="hidden" name="page" value="{{$_GET['page']}}">
                <div class="row bg-grey p-2 pb-4">
                    <div class="col-xl-11 col-lg-10 col-12">
                        <div class="container-fluid">
                            <div id="courseFilter" class="row">
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterTitle" class="color-deep-blue"><strong>Título</strong></label>
                                    <input class="form-control" name="title" type="text" id="courseFilterTitle" <?php if(isset($_GET['title'])) echo 'value="'.$_GET['title'].'"'; ?>>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterLocation" class="color-deep-blue"><strong>Localización</strong></label>
                                    <select id="courseFilterLocation" name="location" class="form-control">
                                        <option>Todos</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'Fuerteventura') echo 'selected'; ?>>Fuerteventura</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'Gran Canaria') echo 'selected'; ?>>Gran Canaria</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'Tenerife') echo 'selected'; ?>>Tenerife</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'Lanzarote') echo 'selected'; ?>>Lanzarote</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'La Palma') echo 'selected'; ?>>La Palma</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'La Gomera') echo 'selected'; ?>>La Gomera</option>
                                        <option <?php if(isset($_GET['location']) && $_GET['location'] == 'El Hierro') echo 'selected'; ?>>El Hierro</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterSector" class="color-deep-blue"><strong>Sector</strong></label>
                                    <input class="form-control" name="sector" type="text" id="courseFilterSector" <?php if(isset($_GET['sector'])) echo 'value="'.$_GET['sector'].'"'; ?>>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterType" class="color-deep-blue"><strong>Tipo</strong></label>
                                    <select id="courseFilterType" name="type" class="form-control">
                                        <option>Todos</option>
                                        <option <?php if(isset($_GET['type']) && $_GET['type'] == 'Gratuito') echo 'selected'; ?>>Gratuito</option>
                                        <option <?php if(isset($_GET['type']) && $_GET['type'] == 'Privado') echo 'selected'; ?>>Privado</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterReceiver" class="color-deep-blue"><strong>Destinatario</strong></label>
                                    <select id="courseFilterReceiver" name="receiver" class="form-control">
                                        <option value="0">Todos</option>
                                        <option value="1" <?php if(isset($_GET['receiver']) && $_GET['receiver'] == '1') echo 'selected'; ?>>Desempleados/as</option>
                                        <option value="2" <?php if(isset($_GET['receiver']) && $_GET['receiver'] == '2') echo 'selected'; ?>>Trabajadores/as</option>
                                        <option value="3" <?php if(isset($_GET['receiver']) && $_GET['receiver'] == '3') echo 'selected'; ?>>Desempleados/as y Trabajadores/as</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                    <label for="courseFilterOnSite" class="color-deep-blue"><strong>Presencial</strong></label>
                                    <select id="courseFilterOnSite" name="onSite" class="form-control">
                                        <option>Todos</option>
                                        <option <?php if(isset($_GET['onSite']) && $_GET['onSite'] == 'Presencial') echo 'selected'; ?>>Presencial</option>
                                        <option <?php if(isset($_GET['onSite']) && $_GET['onSite'] == 'Semipresencial') echo 'selected'; ?>>Semipresencial</option>
                                        <option <?php if(isset($_GET['onSite']) && $_GET['onSite'] == 'Teleformación') echo 'selected'; ?>>Teleformación</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-2 col-12 mt-2 text-center">
                        <button class="btn bg-deep-blue text-white mt-4"><strong>Filtrar</strong></button>
                    </div>
                </div>
            </form>
            <div class="container-fluid courses mt-5">
                <div>
                    <i title="Añadir curso" data-toggle="modal" data-target="#addCourse" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal iconBig interactive mb-5 p-3"></i>
                    <div class="row mb-2">
                        <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                            <p class="text-right"><a class="color-deep-blue" href="{{url('controlPanel/courses')}}"><strong>Editar Página</strong></a></p>
                            <p class="text-right"><span class="color-deep-blue interactive" data-toggle="modal" data-target="#uploadCoursesFromExcel"><strong>Subir desde Excel</strong></span></p>
                        </div>
                    </div>
                </div>

                <!-- Upload from Excel modal -->
                <div class="modal fade" id="uploadCoursesFromExcel" tabindex="-1" role="dialog" aria-labelledby="Subir cursos desde un archivo de Excel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center">Subir cursos desde Excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('excelToCourses')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="excelTitlesLine" class="color-deep-blue"><h6 title="Este campo es obligatorio">Fila de títulos<span class="text-danger">*</span></h6></label>
                                        <input type="number" class="form-control" id="excelTitlesLine" aria-describedby="excelTitlesLineHelp" value="1" min="1" name="excelTitlesLine" required>
                                        <small id="excelTitlesLineHelp" class="form-text text-muted">¿Que fila de su excel contiene los títulos de las columnas?</small>
                                    </div>
                                    <h6 class="color-deep-blue mb-3" title="Este campo es obligatorio">Archivo de Excel<span class="text-danger">*</span></h6>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Subir</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" accept=".xlsx" class="custom-file-input" id="excelInput" name="excel" required>
                                            <label class="custom-file-label" for="excelInput">Archivo de excel</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4" data-dismiss="modal"><strong>Cancelar</strong></button>
                                    <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Continuar</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @if(Session::has('excelParseResponse'))

                <!-- Excel parse response modal-->
                <div class="modal fade" id="excelParseResponse" tabindex="-1" role="dialog" aria-labelledby="Parseo Excel a Cursos" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center">Parseo excel a cursos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('massiveUploadFromExcel')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" value='{{Session::get('excelParseResponse')}}' name="parsedData">
                                <div class="modal-body">
                                    <ul class="nav nav-tabs" id="excelSheetsTab" role="tablist">
                                        <?php

                                        foreach (json_decode(Session::get('excelParseResponse')) as $index => $value){
                                            echo '<li class="nav-item"><a class="nav-link';

                                            if($index == 0) echo ' active';

                                            echo'" id="excel-'.$index.'-tab" data-toggle="tab" href="#excel-'.$index.'" role="tab" aria-controls="excel-'.$index.'" aria-selected="';

                                            if($index == 0) echo 'true';
                                            else echo 'false';

                                            echo'">'.$value[0].'</a></li>';
                                        }

                                        $decodedErrors = json_decode(Session::get('excelParseErrors'));

                                        if(Count($decodedErrors) > 0){
                                            echo '<li class="showFloatingBox position-relative">
                                                  <i title="Errores" class="glyphicon glyphicon-alert text-danger iconBig mt-2"></i>

                                                  <div class="floatingBox bg-danger rounded left p-4">';

                                            foreach ($decodedErrors as $decodedError){
                                                echo '<p class="text-white noWrap"><strong>'.$decodedError.'</strong></p>';
                                            }

                                            echo'</div>
                                                </li>';
                                        }
                                        ?>
                                    </ul>
                                    <div class="tab-content" id="excelSheetsTabContent">
                                        <?php

                                        foreach (json_decode(Session::get('excelParseResponse')) as $index => $value){
                                            echo '<div class="tab-pane';

                                            if($index == 0) echo ' show active';

                                            echo'" id="excel-'.$index.'" role="tabpanel" aria-labelledby="excel-'.$index.'-tab">
                                            <div class="container-fluid mt-4">
                                            <div class="row">
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseTitle'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseTitle'.$index.'" name="title-'.$index.'">';
                                            foreach ($value[1] as $content){
                                               echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseSector'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Sector<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseSector'.$index.'" name="sector-'.$index.'">';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseLocation'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseLocation'.$index.'" name="location-'.$index.'">';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseType'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Tipo<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseType'.$index.'" name="type-'.$index.'">';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseReceiver'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Destinatario<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseReceiver'.$index.'" name="receiver-'.$index.'">';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseOnSite'.$index.'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Asistencia<span class="text-danger">*</span></h6></label>
                                            <select class="form-control" id="excelParseOnSite'.$index.'" name="onSite-'.$index.'">';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParsePrice'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Precio</h6></label>
                                            <select class="form-control" id="excelParsePrice'.$index.'" name="price-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseDescription'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Descripción</h6></label>
                                            <select class="form-control" id="excelParseDescription'.$index.'" name="description-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseLevel'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Nivel</h6></label>
                                            <select class="form-control" id="excelParseLevel'.$index.'" name="level-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseHours'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Horas</h6></label>
                                            <select class="form-control" id="excelParseHours'.$index.'" name="hours-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseInitDate'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Inicio</h6></label>
                                            <select class="form-control" id="excelParseInitDate'.$index.'" name="initDate-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseEndDate'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Fin</h6></label>
                                            <select class="form-control" id="excelParseEndDate'.$index.'" name="endDate-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseSchedule'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Horario</h6></label>
                                            <select class="form-control" id="excelParseSchedule'.$index.'" name="schedule-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseTeacher'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Docente</h6></label>
                                            <select class="form-control" id="excelParseTeacher'.$index.'" name="teacher-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseTeacherDescription'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Información adicional sobre el docente</h6></label>
                                            <select class="form-control" id="excelParseTeacherDescription'.$index.'" name="teacherDescription-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>
                                            <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                            <label for="excelParseRequirements'.$index.'" class="color-deep-blue"><h6 title="Este campo es opcional">Requisitos</h6></label>
                                            <select class="form-control" id="excelParseRequirements'.$index.'" name="requirements-'.$index.'">
                                            <option value="" selected>Dejar vacío</option>';
                                            foreach ($value[1] as $content){
                                                echo '<option>'.$content[1].'</option>';
                                            }
                                            echo'</select></div></div>';

                                            echo'</div>
                                                 </div>
                                                 </div>';

                                        }

                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4" data-dismiss="modal"><strong>Cancelar</strong></button>
                                    <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Subir cursos</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script id="excelParseResponseScript" type="text/javascript">
                    $('#excelParseResponse').modal('toggle');
                    $('#excelParseResponseScript').remove();
                </script>

            @endif

                <!-- Add Modal -->
                <div class="modal fade addCourse" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="Herramienta para añadir cursos" aria-hidden="true">
                    <form class="form-group addCourseForm mb-0" data-nm="{{$nextModule}}" data-nu="{{$nextUnit}}" action="{{url("addCourse")}}" method="post">
                     {{csrf_field()}}
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Añadir Curso <strong></strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-md-5 px-2">
                                    <ul class="nav nav-pills d-sm-flex d-block mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link text-center active" id="pills-generic-tab-add" data-toggle="pill" href="#pills-generic-add" role="tab" aria-controls="pills-generic" aria-selected="true"><strong>General</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-center" id="pills-specific-tab-add" data-toggle="pill" href="#pills-specific-add" role="tab" aria-controls="pills-specific" aria-selected="false"><strong>Específico</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-center" id="pills-content-tab-add" data-toggle="pill" href="#pills-content-add" role="tab" aria-controls="pills-content" aria-selected="false"><strong>Contenidos</strong></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-generic-add" role="tabpanel" aria-labelledby="pills-generic-tab">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <label for="courseAddTitle" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                                        <input id="courseAddTitle" class="form-control mb-2" type="text" name="title" required>
                                                        <label for="courseAddSector" class="color-deep-blue"><h6 title="Este campo es obligatorio">Sector<span class="text-danger">*</span></h6></label>
                                                        <input id="courseAddSector" class="form-control mb-2" type="text" name="sector" required>
                                                        <label for="courseAddLocation" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                                        <select id="courseAddLocation" class="form-control mb-2" name="location" required>
                                                            <option selected>Fuerteventura</option>
                                                            <option>Gran Canaria</option>
                                                            <option>Tenerife</option>
                                                            <option>Lanzarote</option>
                                                            <option>La Palma</option>
                                                            <option>La Gomera</option>
                                                            <option>El Hierro</option>
                                                        </select>
                                                        <label for="courseAddType" class="color-deep-blue"><h6 title="Este campo es obligatorio">Tipo<span class="text-danger">*</span></h6></label>
                                                        <select id="courseAddType" class="form-control mb-2" name="type" required>
                                                            <option value="Gratuito" selected>Gratuito</option>
                                                            <option value="Privado">Privado</option>
                                                        </select>
                                                        <div id="courseReceiverBlock">
                                                        <label for="courseAddReceiver" class="color-deep-blue"><h6 title="Este campo es obligatorio">Destinatario<span class="text-danger">*</span></h6></label>
                                                        <select id="courseAddReceiver" class="form-control mb-2" name="receiver" required>
                                                            <option value="Desempleados/as" selected>Desempleados/as</option>
                                                            <option value="Trabajadores/as">Trabajadores/as</option>
                                                            <option value="Desempleados/as y Trabajadores/as">Desempleados/as y Trabajadores/as</option>
                                                        </select>
                                                    </div>
                                                    <div id="coursePriceBlock" class="d-none">
                                                    <label for="courseAddPrice" class="color-deep-blue"><h6 title="Este campo es opcional">Precio</h6></label>
                                                    <input id="courseAddPrice" type="number" step="0.01" class="form-control mb-2" name="price">
                                                </div>
                                                <label for="courseAddOnSite" class="color-deep-blue"><h6 title="Este campo es obligatorio">Asistencia<span class="text-danger">*</span></h6></label>
                                                <select id="courseAddOnSite" class="form-control mb-2" name="onSite" required>
                                                    <option value="Presencial" selected>Presencial</option>
                                                    <option value="Semipresencial">Semipresencial</option>
                                                    <option value="Teleformación">Teleformación</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="courseAddImage" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                                                <div class="file-loading">
                                                    <input id="courseAddImage" name="image" type="file" accept="image">
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" name="promote" id="promoteAddCourse">
                                                    <label class="form-check-label" for="promoteAddCourse"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia al curso en el banner y se mostrará como inicio inmediato en caso de no especificar una fecha de inicio)</small></h6></label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" name="hidden" id="hiddenAddCourse">
                                                    <label class="form-check-label" for="hiddenAddCourse"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, el curso no será visible para los usuarios)</small></h6></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid mt-4 mb-2">
                                        <div class="float-right mb-2">
                                            <button type="button" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific"><strong>Siguiente</strong></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-specific-add" role="tabpanel" aria-labelledby="pills-specific-tab">
                                    <label for="courseAddDescription" class="color-deep-blue"><h6 title="Este campo es opcional">Descripción</h6></label>
                                    <div id="courseAddDescription" class="mb-2 courseAddDescription"></div>
                                    <input type="hidden" name="description">
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddLevel" class="color-deep-blue"><h6 title="Este campo es opcional">Nivel</h6></label>
                                            <input id="courseAddLevel" class="form-control" type="number" name="level">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddHours" class="color-deep-blue"><h6 title="Este campo es opcional">Horas</h6></label>
                                            <input id="courseAddHours" class="form-control" type="number" name="hours">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddInitDate" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Inicio <small class="text-danger">(Dejar vacío para marcar el curso como Próximamente)</small></h6></label>
                                            <input id="courseAddInitDate" class="form-control" type="text" name="initDate" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddEndDate" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Fin</h6></label>
                                            <input id="courseAddEndDate" class="form-control" type="text" name="endDate" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddSchedule" class="color-deep-blue"><h6 title="Este campo es opcional">Horario</h6></label>
                                            <input id="courseAddSchedule" class="form-control" type="text" name="schedule" placeholder="Ejemplo: De 8:00h a 16:00h">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="courseAddTeacher" class="color-deep-blue"><h6 title="Este campo es opcional">Docente</h6></label>
                                            <input id="courseAddTeacher" class="form-control" type="text" name="teacher">
                                        </div>
                                    </div>
                                    <div id="courseTeacherDescriptionBlock" class="mb-2 d-none">
                                        <label for="courseAddTeacherDescription" class="color-deep-blue"><h6 title="Este campo es opcional">Información adicional sobre el docente</h6></label>
                                        <div id="courseAddTeacherDescription" class="courseAddTeacherDescription"></div>
                                        <input type="hidden" name="teacherDescription">
                                    </div>
                                    <div>
                                        <label for="courseAddRequirements" class="color-deep-blue"><h6 title="Este campo es opcional">Requisitos</h6></label>
                                        <div id="courseAddRequirements" class="mb-2 courseAddRequirements"></div>
                                        <input type="hidden" name="requirements">
                                    </div>
                                    <div class="container-fluid mt-4">
                                        <div class="float-right mb-2">
                                            <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleGeneric"><strong>Anterior</strong></button>
                                            <button type="button" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleContent" ><strong>Siguiente</strong></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-content-add" role="tabpanel" aria-labelledby="pills-content-tab">
                                    <h6 class="color-deep-blue mb-3" title="Este campo es opcional">Módulos y unidades formativas</h6>
                                    <div id="addModules" class="modules"></div>
                                    <div class="container-fluid p-0 mt-4 mb-2">
                                        <div class="mb-4"><i class="centerHorizontal bg-deep-blue text-white rounded-circle p-3 glyphicon glyphicon-plus interactive addModule" title="Añadir módulo"></i></div>
                                        <div id="addProfessionalDepartures">
                                            <h6 class="color-deep-blue mb-3" title="Este campo es opcional">Salidas profesionales</h6>
                                            <div class="my-4">
                                                <i class="centerHorizontal bg-deep-blue text-white rounded-circle p-3 glyphicon glyphicon-plus interactive addProfessionalDeparture" title="Añadir salida profesional"></i>
                                            </div>
                                        </div>
                                        <div class="float-right mb-2">
                                            <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleSpecific"><strong>Anterior</strong></button>
                                            <button id="addCourseSubmit" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript" id="courseAddScript">
            $(window).on("load", function(){
                let uploaded = false;

                $("#courseAddImage").fileinput({
                    theme: "explorer",
                    uploadUrl: "{{url('uploadImage/'.$nextCourse.'/course')}}",
                    allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                    maxFileCount: 1,
                    maxFileSize: 500,
                    showAjaxErrorDetails: false
                }).on('fileuploaded', function () {
                    uploaded = true;
                });

                $('.addCourseForm').on('submit', function () {
                   if(!uploaded){
                       alert('Debe subir una foto antes de publicar el curso.');
                       return false;
                   }
                });

                $('#addCourseSubmit').on('click', function (e) {
                    let requiredFields = $('.addCourseForm').find('[required]');

                    requiredFields.each(function (index, value) {
                       if($(value).val().length < 1) {
                           e.preventDefault();

                           $('[href="#'+$(value).closest('.tab-pane').attr('id')+'"]').trigger('click');

                           setTimeout(function () {
                               $(value).focus();
                           }, 200);
                           return false;
                       }
                    });
                });

                textEditorFromReference("#courseAddDescription");
                textEditorFromReference("#courseAddTeacherDescription");
                textEditorFromReference("#courseAddRequirements");
                $("#courseAddInitDate").datepicker();
                $("#courseAddEndDate").datepicker();
                $("#addModules").accordion({
                    header: ".module",
                    active: 3,
                    collapsible: true,
                    heightStyle: "content",
                });
                $("#courseAddScript").remove();
            });
        </script>

                <?php

                    if(isset($courses)){
                        foreach ($courses as $course){
                            echo '<div class="row mb-4 course" data-title="'.$course['title'].'" data-receiver="'.$course['receiver'].'" data-sector="'.$course['sector'].'" data-location="'.$course['location'].'" data-type="'.$course['type'].'" data-onSite="'.$course['onSite'].'">
                                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                                <div class="container-fluid bg-grey rounded shadow p-4';
                            if(!$course['display']) echo ' hidden';
                            echo'"><div class="row">
                                <div class="col-md-3 col-sm-5 offset-sm-0 col-12">
                                <img class="w-100 fixedHeightImg p-2 rounded" alt="'.$course['imageAlt'].'" data-src="'.asset('images/uploads/'.$course['image']).'">
                                </div>
                                <div class="col-md-5 col-sm-7 col-12">
                                <h4 class="color-deep-blue clamp pb-1"><strong>'.$course['title'].'</strong></h4><div>';
                                if($course['level'] && strlen($course['level']) > 0) echo '<h5 class="color-deep-blue d-lg-inline-block d-none pr-3">Nivel '.$course['level'].'</h5>';
                                echo'<h5 class="color-deep-blue d-lg-inline-block d-none pr-3">'.$course['location'].'</h5>
                                <h5 class="color-deep-blue d-lg-inline-block d-none pr-3">'.$course['type'].'</h5>
                                <h5 class="color-deep-blue d-lg-inline-block d-none pr-3">'.$course['onSite'].'</h5>
                                <h5 class="color-deep-blue d-lg-inline-block d-none pr-3">'.$course['sector'].'</h5>
                                <h5 class="color-deep-blue d-lg-inline-block d-none pr-3">'.$course['receiver'].'</h5>
                                </div>
                                </div>
                                <div class="col-md-4 col-12 p-0 d-flex justify-content-center align-items-center">
                                <a href="'.url('duplicateCourse/'.$course['id']).'"><i title="Duplicar" class="glyphicon glyphicon-duplicate duplicate color-deep-blue iconBig interactive"></i></a>
                                <div class="container-fluid">
                                <div class="row">
                                <div class="col-6">
                                <button class="btn cpBtn color-deep-blue border-deep-blue px-4 float-right" data-toggle="modal" data-target="#deleteCourseModal-'.$course['id'].'"><strong>Borrar</strong></button>
                                </div>
                                <div class="col-6">
                                <button class="btn cpBtn bg-deep-blue color-grey border-deep-blue px-4" data-toggle="modal" data-target="#editCourseModal-'.$course['id'].'"><strong>Editar</strong></button>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <!-- Edit Modal -->
                                <div class="modal fade editCourse" id="editCourseModal-'.$course['id'].'" tabindex="-1" role="dialog" aria-labelledby="Editor del curso '.$course['title'].'" aria-hidden="true">
                                <form id="editCourseForm'.$course['id'].'" class="form-group editCourseForm mb-0" data-id="'.$course['id'].'" data-nm="'.$nextModule.'" data-nu="'.$nextUnit.'" action="'.url("editCourse").'" method="post">';
                                echo csrf_field();
                                echo'<input type="hidden" name="course" value="'.$course["id"].'">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header border-0">
                                <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Editar <strong>'.$course['title'].'</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body px-md-5 px-2">
                                <ul class="nav nav-pills d-md-flex d-block mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link text-center active" id="pills-generic-tab'.$course['id'].'" data-toggle="pill" href="#pills-generic'.$course['id'].'" role="tab" aria-controls="pills-generic" aria-selected="true"><strong>General</strong></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link text-center" id="pills-specific-tab'.$course['id'].'" data-toggle="pill" href="#pills-specific'.$course['id'].'" role="tab" aria-controls="pills-specific" aria-selected="false"><strong>Específico</strong></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link text-center" id="pills-content-tab'.$course['id'].'" data-toggle="pill" href="#pills-content'.$course['id'].'" role="tab" aria-controls="pills-content" aria-selected="false"><strong>Contenidos</strong></a>
                                </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-generic'.$course['id'].'" role="tabpanel" aria-labelledby="pills-generic-tab">
                                <div class="container-fluid">
                                <div class="row">
                                <div class="col-md-6 col-12">
                                <label for="courseEditTitle'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                <input id="courseEditTitle'.$course['id'].'" class="form-control mb-2" type="text" value="'.$course['title'].'" name="title" required>
                                <label for="courseEditSector'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Sector<span class="text-danger">*</span></h6></label>
                                <input id="courseEditSector'.$course['id'].'" class="form-control mb-2" type="text" value="'.$course['sector'].'" name="sector" required>
                                <label for="courseEditLocation'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                <select id="courseEditLocation'.$course['id'].'" class="form-control mb-2" name="location" required>
                                <option '; if($course['location'] == 'Fuerteventura') echo 'selected'; echo'>Fuerteventura</option>
                                <option '; if($course['location'] == 'Gran Canaria') echo 'selected'; echo'>Gran Canaria</option>
                                <option '; if($course['location'] == 'Tenerife') echo 'selected'; echo'>Tenerife</option>
                                <option '; if($course['location'] == 'Lanzarote') echo 'selected'; echo'>Lanzarote</option>
                                <option '; if($course['location'] == 'La Palma') echo 'selected'; echo'>La Palma</option>
                                <option '; if($course['location'] == 'La Gomera') echo 'selected'; echo'>La Gomera</option>
                                <option '; if($course['location'] == 'El Hierro') echo 'selected'; echo'>El Hierro</option>
                                </select>
                                <label for="courseEditType'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Tipo<span class="text-danger">*</span></h6></label>
                                <select id="courseEditType'.$course['id'].'" class="form-control mb-2" name="type" required>
                                <option value="Gratuito" '; if($course['type'] == 'Gratuito') echo 'selected'; echo'>Gratuito</option>
                                <option value="Privado"'; if($course['type'] == 'Privado') echo 'selected'; echo'>Privado</option>
                                </select>
                                <div id="courseReceiverBlock"';
                                if($course['type'] != "Gratuito") echo 'class="d-none"';
                                echo'>
                                <label for="courseEditReceiver'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Destinatario<span class="text-danger">*</span></h6></label>
                                <select id="courseEditReceiver'.$course['id'].'" class="form-control mb-2" name="receiver" required>
                                <option value="Desempleados/as" '; if($course['receiver'] == 'Desempleados/as') echo 'selected'; echo'>Desempleados/as</option>
                                <option value="Trabajadores/as"'; if($course['receiver'] == 'Trabajadores/as') echo 'selected'; echo'>Trabajadores/as</option>
                                <option value="Desempleados/as y Trabajadores/as"'; if($course['receiver'] == 'Desempleados/as y Trabajadores/as') echo 'selected'; echo'>Desempleados/as y Trabajadores/as</option>
                                </select>
                                </div>
                                <div id="coursePriceBlock"';
                                if($course['type'] != "Privado") echo 'class="d-none"';
                                echo'>
                                <label for="courseEditPrice'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Precio</h6></label>
                                <input id="courseEditPrice'.$course['id'].'" type="number" step="0.01" class="form-control mb-2" name="price" value="'.$course['price'].'">
                                </div>
                                <label for="courseEditOnSite'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Asistencia<span class="text-danger">*</span></h6></label>
                                <select id="courseEditOnSite'.$course['id'].'" class="form-control mb-2" name="onSite" required>
                                <option value="Presencial" '; if($course['onSite'] == 'Presencial') echo 'selected'; echo'>Presencial</option>
                                <option value="Semipresencial" '; if($course['onSite'] == 'Semipresencial') echo 'selected'; echo'>Semipresencial</option>
                                <option value="Teleformación"'; if($course['onSite'] == 'Teleformación') echo 'selected'; echo'>Teleformación</option>
                                </select>
                                </div>
                                <div class="col-md-6 col-12">
                                <label for="courseEditImage'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Imagen<span class="text-danger">*</span></h6></label>
                                <div class="file-loading">
                                <input id="courseEditImage'.$course['id'].'" name="image" type="file" accept="image">
                                </div>
                                <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" name="promote" id="promoteCourse'.$course['id'].'" ';
                                if($course['promote'] > 0) echo 'checked="true"';
                                echo'>
                                <label class="form-check-label" for="promoteCourse'.$course['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Promocionar<small class="text-danger"> (Al marcar esta opción, se dará preferencia al curso en el banner y se mostrará como inicio inmediato en caso de no especificar una fecha de inicio)</small></h6></label>
                                </div>
                                <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="hidden" id="hiddenCourse'.$course['id'].'" ';
                                if($course['display'] < 1) echo 'checked="true"';
                                echo'>
                                <label class="form-check-label" for="hiddenCourse'.$course['id'].'"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Ocultar<small class="text-danger"> (Al marcar esta opción, el curso no será visible para los usuarios)</small></h6></label>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="container-fluid mt-4 mb-2">
                                <div class="float-right mb-2">
                                <button type="button" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific" data-target="'.$course['id'].'"><strong>Siguiente</strong></button>
                                </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="pills-specific'.$course['id'].'" role="tabpanel" aria-labelledby="pills-specific-tab">
                                <label for="courseEditDescription'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Descripción</h6></label>
                                <div id="courseEditDescription'.$course['id'].'" class="mb-2 courseEditDescription">'.$course['description'].'</div>
                                <input type="hidden" name="description" value=\''.$course['description'].'\'">
                                <div class="row mb-2">
                                <div class="col-md-6 col-12">
                                <label for="courseEditLevel'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Nivel</h6></label>
                                <input id="courseEditLevel'.$course['id'].'" class="form-control" type="number" name="level" value="'.$course['level'].'">
                                </div>
                                <div class="col-md-6 col-12">
                                <label for="courseEditHours'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Horas</h6></label>
                                <input id="courseEditHours'.$course['id'].'" class="form-control" type="number" name="hours" value="'.$course['hours'].'">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-md-6 col-12">
                                <label for="courseEditInitDate'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Inicio <small class="text-danger">(Dejar vacío para marcar el curso como Próximamente)</small></h6></label>
                                <input id="courseEditInitDate'.$course['id'].'" class="form-control" type="text" name="initDate" value="'.$course['init_date'].'" autocomplete="off">
                                </div>
                                <div class="col-md-6 col-12">
                                <label for="courseEditEndDate'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Fecha de Fin</h6></label>
                                <input id="courseEditEndDate'.$course['id'].'" class="form-control" type="text" name="endDate" value="'.$course['end_date'].'" autocomplete="off">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-md-6 col-12">
                                <label for="courseEditSchedule'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Horario</h6></label>
                                <input id="courseEditSchedule'.$course['id'].'" class="form-control" type="text" name="schedule" value="'.$course['schedule'].'" placeholder="Ejemplo: De 8:00h a 16:00h">
                                </div>
                                <div class="col-md-6 col-12">
                                <label for="courseEditTeacher'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Docente</h6></label>
                                <input id="courseEditTeacher'.$course['id'].'" class="form-control" type="text" name="teacher" value="'.$course['teacher'].'">
                                </div>
                                </div>
                                <div id="courseTeacherDescriptionBlock" class="mb-2 ';
                                if(strlen($course['teacher']) == 0) echo 'd-none';
                                echo'">
                                <label for="courseEditTeacherDescription'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Información adicional sobre el docente</h6></label>
                                <div id="courseEditTeacherDescription'.$course['id'].'" class="courseEditTeacherDescription">'.$course['teacherDescription'].'</div>
                                <input type="hidden" name="teacherDescription" value=\''.$course['teacherDescription'].'\'">
                                </div>
                                <div>
                                <label for="courseEditRequirements'.$course['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Requisitos</h6></label>
                                <div id="courseEditRequirements'.$course['id'].'" class="mb-2 courseEditRequirements">'.$course['requirements'].'</div>
                                <input type="hidden" name="requirements" value=\''.$course['requirements'].'\'">
                                </div>
                                <div class="container-fluid mt-4">
                                <div class="float-right mb-2">
                                <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleGeneric" data-target="'.$course['id'].'"><strong>Anterior</strong></button>
                                <button type="button" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleContent" data-target="'.$course['id'].'"><strong>Siguiente</strong></button>
                                </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="pills-content'.$course['id'].'" role="tabpanel" aria-labelledby="pills-content-tab">
                                <h6 class="color-deep-blue mb-3" title="Este campo es opcional">Módulos y unidades formativas</h6>
                                <div id="editModules'.$course['id'].'" class="modules">';
                                foreach ($course['modules'] as $module){
                                    echo '<div class="module d-flex align-items-center mb-2">
                                        <div class="d-flex w-100">
                                        <div class="container-fluid">
                                        <div class="row">
                                        <div class="col-md-4 col-12 p-0 pb-1 pr-1">
                                        <p class="color-deep-blue ml-2 mb-2"><strong>Código</strong></p>
                                        <input class="form-control ml-2 accordionInput" name="moduleCode'.$module[0]['id'].'" type="text" placeholder="Código del módulo" value="'.$module[0]['code'].'">
                                        </div>
                                        <div class="col-md-4 col-12 pb-1 px-1">
                                        <p class="color-deep-blue ml-2 mb-2"><strong>Título</strong></p>
                                        <input class="form-control ml-2 accordionInput" name="moduleTitle'.$module[0]['id'].'" type="text"  placeholder="Nombre del módulo" value="'.$module[0]['title'].'" required>
                                        </div>
                                        <div class="col-md-4 col-12 pb-1 pl-1">
                                        <p class="color-deep-blue ml-2 mb-2"><strong>Horas</strong></p>
                                        <input class="form-control ml-2 accordionInput" name="moduleHours'.$module[0]['id'].'" type="number"  placeholder="Total de horas" value="'.$module[0]['hours'].'">
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div><i title="Borrar módulo" class="glyphicon glyphicon-remove-circle iconBig mx-4 color-deep-blue rounded-circle courseDeleteField interactive"></i></div>
                                        </div><div>';

                                    foreach ($module[1] as $unit)
                                        echo '<div class="d-md-flex d-block align-items-center mb-2 ml-2">
                                            <input class="form-control mb-2" name="unitCode'.$unit['id'].'" type="text" placeholder="Código de la unidad" value="'.$unit['code'].'">
                                            <input class="form-control mb-2 ml-md-2 ml-0" name="unitTitle'.$unit['id'].'" type="text" placeholder="Nombre de la unidad" value="'.$unit['title'].'" required>
                                            <input class="form-control mb-2 ml-md-2 ml-0" name="unitHours'.$unit['id'].'" type="number" placeholder="Total de horas" value="'.$unit['hours'].'">
                                            <div class="pb-md-0 pb-4"><i title="Borrar unidad formativa" class="glyphicon glyphicon-remove-circle iconBig color-deep-blue ml-4 float-md-none float-right rounded-circle interactive courseDeleteField"></i></div>
                                            </div>';

                                    echo '<i class="centerHorizontal bg-deep-blue text-white rounded-circle p-3 glyphicon glyphicon-plus interactive addUnit" title="Añadir unidad formativa"></i></div>';
                                }
                                echo'</div>
                                <div class="container-fluid mt-4 mb-2">
                                <div class="mb-4"><i class="centerHorizontal bg-deep-blue text-white rounded-circle p-3 glyphicon glyphicon-plus interactive addModule" title="Añadir módulo"></i></div>
                                <div id="editProfessionalDepartures">
                                <h6 class="color-deep-blue mb-3" title="Este campo es opcional">Salidas profesionales</h6>';

                                foreach ($course['professionalDepartures'] as $professionalDeparture){
                                    echo '<div class="d-inline-flex w-50 align-items-center pr-4 mb-2">
                                          <input type="text" class="form-control mr-2" name="professionalDepartures[]" value="'.$professionalDeparture['title'].'" placeholder="Salida Profesional">
                                          <i title="Borrar salida profesional" class="glyphicon glyphicon-remove color-deep-blue interactive deleteProfessionalDeparture"></i>
                                          </div>';
                                }

                                echo'<div class="mt-4">
                                <i class="centerHorizontal bg-deep-blue text-white rounded-circle mb-4 p-3 glyphicon glyphicon-plus interactive addProfessionalDeparture" title="Añadir salida profesional"></i>
                                </div>
                                </div>
                                <div class="float-right mb-2">
                                <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleSpecific" data-target="'.$course['id'].'"><strong>Anterior</strong></button>
                                <button id="editCourseSubmit'.$course['id'].'" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </form>
                                </div>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteCourseModal-'.$course['id'].'" tabindex="-1" role="dialog" aria-labelledby="Confirmación ¿desea borrar el curso '.$course['title'].'?" aria-hidden="true">
                                <form action="'.url("deleteCourse").'" method="post">';
                                echo csrf_field();
                                echo'<input type="hidden" name="course" value="'.$course["id"].'">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header border-0">
                                <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Borrar <strong>'.$course['title'].'</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <h6 class="text-center px-4">¿Está seguro de que desea borrar el curso <strong>'.$course['title'].'</strong>?</h6>
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
                                <script type="text/javascript" id="courseEditScript'.$course['id'].'">
                                    $(window).on("load", function(){
                                         $("#courseEditImage'.$course['id'].'").fileinput({
                                            theme: "explorer",
                                            uploadUrl: "'.url('uploadImage/'.$course['id'].'/course').'",
                                            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                                            maxFileCount: 1,
                                            initialPreview: ["<img data-src=\\"'.asset("images/uploads/".$course['image']).'\\" class=\\"kv-preview-data file-preview-image\\" alt=\\"'.$course['imageAlt'].'\\">"],
                                            overwriteInitial: true,
                                            initialPreviewAsData: false,
                                            maxFileSize: 500,
                                        });

                                        $("#editCourseSubmit'.$course['id'].'").on("click", function(e){
                                            let requiredFields = $("#editCourseForm'.$course['id'].'").find("[required]");

                                            requiredFields.each(function (index, value) {
                                               if($(value).val().length < 1) {
                                                   e.preventDefault();

                                                   $("[href=\'#"+$(value).closest(".tab-pane").attr("id")+"\']").trigger("click");

                                                   setTimeout(function () {
                                                       $(value).focus();
                                                   }, 200);
                                                   return false;
                                               }
                                            });
                                        });

                                        textEditorFromReference("#courseEditDescription'.$course['id'].'");
                                        textEditorFromReference("#courseEditTeacherDescription'.$course['id'].'");
                                        textEditorFromReference("#courseEditRequirements'.$course['id'].'");
                                        $("#courseEditInitDate'.$course['id'].'").datepicker();
                                        $("#courseEditEndDate'.$course['id'].'").datepicker();
                                        $("#editModules'.$course['id'].'").accordion({
                                             header: ".module",
                                             active: 3,
                                             collapsible: true,
                                             heightStyle: "content",
                                        });
                                        $("#courseEditScript'.$course['id'].'").remove();
                                    });
                                </script>';
                        }
                    }
                ?>
                <div class="container-fluid mt-4">
                    <div class="row justify-content-center">
                        <?php

                        $page = $_GET['page'];

                        if($amountOfPages <= 5){
                            for($i = 1; $i <= $amountOfPages; $i++){
                                echo '<a href="'.str_replace('page='.$page, 'page='.$i, url()->full()).'"><button class="btn color-deep-blue ';
                                if($page == $i) echo 'border-deep-blue';
                                echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                            }
                        }else{
                            if($page < 4){
                                for($i = 1; $i <= 5; $i++){
                                    echo '<a href="'.str_replace('page='.$page, 'page='.$i, url()->full()).'"><button class="btn color-deep-blue ';
                                    if($page == $i) echo 'border-deep-blue';
                                    echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                }echo '<strong class="mt-2 mr-2 pt-1">. . .</strong><a href="'.str_replace('page='.$page, 'page='.$amountOfPages, url()->full()).'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$amountOfPages.'</strong></button></a>';
                            }else if($page < $amountOfPages-3){
                                echo '<a href="'.str_replace('page='.$page, 'page=1', url()->full()).'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>1</strong></button></a><strong class="mt-2 mr-2 pt-1">. . .</strong>';
                                for($i = $page-1; $i <= $page+1; $i++){
                                    echo '<a href="'.str_replace('page='.$page, 'page='.$i, url()->full()).'"><button class="btn color-deep-blue ';
                                    if($page == $i) echo 'border-deep-blue';
                                    echo' px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$i.'</strong></button></a>';
                                }echo '<strong class="mt-2 mr-2 pt-1">. . .</strong><a href="'.str_replace('page='.$page, 'page='.$amountOfPages, url()->full()).'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>'.$amountOfPages.'</strong></button></a>';
                            }else{
                                echo '<a href="'.str_replace('page='.$page, 'page=1', url()->full()).'"><button class="btn color-deep-blue px-lg-4 mr-lg-2 px-2 mr-2"><strong>1</strong></button></a><strong class="mt-2 mr-2 pt-1">. . .</strong>';
                                for($i = $amountOfPages-4; $i <= $amountOfPages; $i++){
                                    echo '<a href="'.str_replace('page='.$page, 'page='.$i, url()->full()).'"><button class="btn color-deep-blue ';
                                    if($page == $i) echo 'border-deep-blue';
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

<!-- E N D   A D M I N I S T R A T E   C O U R S E S -->

<script id="previewScript" type="text/javascript">
    $(window).on('load', function () {
        let previewUrl = "<?php echo url('/').'/courses' ?>";
        $('.previewAnchor').attr('href', previewUrl);
        $('#previewScript').remove();
    })
</script>

@stop
@section('footer')
