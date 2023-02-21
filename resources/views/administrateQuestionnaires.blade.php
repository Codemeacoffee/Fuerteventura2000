@extends('adminLayout')
@section('header')
@section('title')Editor de Cuestionarios - Panel de Control @endsection
@section('content')

    <!-- A D M I N I S T R A T E   Q U E S T I O N N A I R E S -->

    <div class="container-fluid controlPanel">
        <div class="row h-100">
            <div class="col-12 overflow-auto">
                <div id="questionnaireFilter" class="row bg-grey p-2 pb-4">
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="questionnaireFilterTitle" class="color-deep-blue"><strong>Título</strong></label>
                        <input class="form-control" type="text" id="questionnaireFilterTitle">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="questionnaireFilterLocation" class="color-deep-blue"><strong>Localización</strong></label>
                        <select id="questionnaireFilterLocation" class="form-control">
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
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="questionnaireFilterType" class="color-deep-blue"><strong>Tipo</strong></label>
                        <input class="form-control" type="text" id="questionnaireFilterType">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="questionnaireFilterAnnouncement" class="color-deep-blue"><strong>Convocatoria</strong></label>
                        <input class="form-control" type="text" id="questionnaireFilterAnnouncement">
                    </div>
                </div>
                <div class="container-fluid questionnaires mt-5">
                    <div>
                        <i title="Añadir cuestionario" data-toggle="modal" data-target="#addQuestionnaire" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal iconBig interactive mb-5 p-3"></i>
                        <div class="row mb-4">
                            <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                              <strong class="float-right color-deep-blue interactive" data-toggle="modal" data-target="#downloadCredentialsOptions">Descargar credenciales</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Download Credentials Options -->
                    <div class="modal fade" id="downloadCredentialsOptions" tabindex="-1" role="dialog" aria-labelledby="Herramienta de selección para la descarga de credenciales" aria-hidden="true">
                        <form class="form-group" action="{{url("downloadQuestionnaireCredentials")}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center">Descargar credenciales</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="dQLocation" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                                <select id="dQLocation" class="form-control mb-2" name="location" required>
                                                    <option value="0" selected>Todas</option>
                                                    <option>Fuerteventura</option>
                                                    <option>Gran Canaria</option>
                                                    <option>Tenerife</option>
                                                    <option>Lanzarote</option>
                                                    <option>La Palma</option>
                                                    <option>La Gomera</option>
                                                    <option>El Hierro</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dQAnnouncement" class="color-deep-blue"><h6 title="Este campo es obligatorio">Convocatoria<span class="text-danger">*</span></h6></label>
                                                <select id="dQAnnouncement" class="form-control mb-2" name="announcement" required>
                                                    <option value="0">Todas las convocatorias</option>
                                                    <option selected>{{date('Y')}}</option>
                                                    <?php

                                                    foreach ($questionnaireAnnouncements as $questionnaireAnnouncement){
                                                        echo '<option>'.$questionnaireAnnouncement.'</option>';
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4" data-dismiss="modal"><strong>Cancelar</strong></button>
                                        <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Continuar</strong></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade addQuestionnaire" id="addQuestionnaire" tabindex="-1" role="dialog" aria-labelledby="Herramienta para añadir cuestionarios" aria-hidden="true">
                        <form class="form-group addQuestionnaireForm" action="{{url("addQuestionnaire")}}" method="post" data-nq="{{$nextQuestion}}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Añadir Cuestionario<strong></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-5">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="questionnaireAddTitle" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                                                    <input id="questionnaireAddTitle" class="form-control mb-2" type="text" name="title" required>
                                                    <label for="questionnaireAddLocation" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                                    <select id="questionnaireAddLocation" class="form-control mb-2" name="location" required>
                                                        <option value="Fuerteventura" selected>Fuerteventura</option>
                                                        <option value="Gran Canaria">Gran Canaria</option>
                                                        <option value="Tenerife">Tenerife</option>
                                                    </select>
                                                    <label for="questionnaireAddType" class="color-deep-blue"><h6 title="Este campo es obligatorio">Tipo<span class="text-danger">*</span></h6></label>
                                                    <input id="questionnaireAddType" class="form-control" type="text" name="type" required>
                                                    <small id="questionnaireAddTypeHelp" class="form-text text-muted mb-2">FPED, FCCC, CCAA, SEPE...</small>
                                                    <label for="questionnaireAddAnnouncement" class="color-deep-blue"><h6 title="Este campo es obligatorio">Convocatoria<span class="text-danger">*</span></h6></label>
                                                    <input id="questionnaireAddAnnouncement" class="form-control mb-2" type="text" name="announcement" autocomplete="off" required>
                                                    <div>
                                                        <label for="questionnaireAddContent" class="color-deep-blue"><h6 title="Este campo es opcional">Contenido</h6></label>
                                                        <div id="questionnaireAddContent" class="mb-2 questionnaireAddContent"></div>
                                                        <input type="hidden" name="content">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="container-fluid">
                                                        <h6 title="Este campo es obligatorio" class="color-deep-blue">Preguntas<span class="text-danger">*</span></h6>
                                                        <div class="row">
                                                            <div id="addQuestions" class="questions mb-4"></div>
                                                            <i title="Añadir Pregunta" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal interactive addQuestion mb-2 p-2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid mt-4 mb-2">
                                            <div class="float-right mb-2">
                                                <button type="submit" id="addQuestionnaireSubmit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific"><strong>Guardar</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script type="text/javascript" id="QuestionnaireAddScript">
                        $(window).on("load", function(){

                            textEditorFromReference("#questionnaireAddContent");

                            $("#questionnaireAddAnnouncement").datepicker();

                            $("#addQuestions").accordion({
                                header: ".question",
                                active: 3,
                                collapsible: true,
                                heightStyle: "content",
                            });

                            $("#QuestionnaireAddScript").remove();
                        });
                    </script>

                    <?php

                    if(isset($questionnaires)){
                        foreach ($questionnaires as $questionnaire){
                            echo '<div class="row mb-4 questionnaire" data-title="'.$questionnaire['title'].'" data-location="'.$questionnaire['location'].'" data-type="'.$questionnaire['type'].'" data-announcement="'.$questionnaire['announcement'].'">
                            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                            <div class="container-fluid bg-grey rounded shadow p-4">
                            <div class="row">
                            <div class="col-md-8 col-12">
                            <h4 class="color-deep-blue text-overflow-ellipsis pb-1"><strong>'.$questionnaire['title'].' - '.$questionnaire['location'].'</strong></h4>
                            <div class="color-deep-blue pr-3 text-overflow-ellipsis mb-3">'.$questionnaire['type'].'</div>
                            </div>
                            <div class="col-md-4 col-12 p-0 d-flex justify-content-center align-items-center">
                            <a href="'.url('duplicateQuestionnaire/'.$questionnaire['id']).'"><i title="Duplicar" class="glyphicon glyphicon-duplicate duplicate color-deep-blue iconBig interactive"></i></a>
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-6">
                            <button class="btn cpBtn color-deep-blue border-deep-blue float-right px-4" data-toggle="modal" data-target="#deleteQuestionnaireModal-'.$questionnaire['id'].'"><strong>Borrar</strong></button>
                            </div>
                            <div class="col-6">
                            <button class="btn cpBtn bg-deep-blue color-grey border-deep-blue px-4" data-toggle="modal" data-target="#editQuestionnaireModal-'.$questionnaire['id'].'"><strong>Editar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade editQuestionnaire" id="editQuestionnaireModal-'.$questionnaire['id'].'" tabindex="-1" role="dialog" aria-labelledby="Editor del questionario '.$questionnaire['title'].'" aria-hidden="true">
                            <form id="editQuestionnaireForm'.$questionnaire['id'].'" class="form-group editQuestionnaireForm" data-nq="'.$nextQuestion.'" data-id="'.$questionnaire['id'].'" action="'.url("editQuestionnaire").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="questionnaire" value="'.$questionnaire["id"].'">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Editar <strong>'.$questionnaire['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body px-md-5 px-2">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-6 col-12">
                            <label for="questionnaireEditTitle'.$questionnaire['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Título<span class="text-danger">*</span></h6></label>
                            <input id="questionnaireEditTitle'.$questionnaire['id'].'" class="form-control mb-2" type="text" value="'.$questionnaire['title'].'" name="title" required>
                            <label for="questionnaireEditLocation'.$questionnaire['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                            <select id="questionnaireEditLocation'.$questionnaire['id'].'" class="form-control mb-2" name="location" required>
                            <option '; if($questionnaire['location'] == 'Fuerteventura') echo 'selected'; echo'>Fuerteventura</option>
                            <option '; if($questionnaire['location'] == 'Gran Canaria') echo 'selected'; echo'>Gran Canaria</option>
                            <option '; if($questionnaire['location'] == 'Tenerife') echo 'selected'; echo'>Tenerife</option>
                            <option '; if($questionnaire['location'] == 'Lanzarote') echo 'selected'; echo'>Lanzarote</option>
                            <option '; if($questionnaire['location'] == 'La Palma') echo 'selected'; echo'>La Palma</option>
                            <option '; if($questionnaire['location'] == 'La Gomera') echo 'selected'; echo'>La Gomera</option>
                            <option '; if($questionnaire['location'] == 'El Hierro') echo 'selected'; echo'>El Hierro</option>
                            </select>
                            <label for="questionnaireEditType'.$questionnaire['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Tipo<span class="text-danger">*</span></h6></label>
                            <input id="questionnaireEditType'.$questionnaire['id'].'" class="form-control" type="text" name="type" value="'.$questionnaire['type'].'" required>
                            <small id="questionnaireEditTypeHelp" class="form-text text-muted mb-2">FPED, FCCC, CCAA, SEPE...</small>
                            <label for="questionnaireEditAnnouncement'.$questionnaire['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Convocatoria<span class="text-danger">*</span></h6></label>
                            <input id="questionnaireEditAnnouncement'.$questionnaire['id'].'" class="form-control mb-2" type="text" name="announcement" autocomplete="off" value="'.$questionnaire['announcement'].'" required>
                            <div>
                            <label for="questionnaireEditContent'.$questionnaire['id'].'" class="color-deep-blue"><h6 title="Este campo es opcional">Contenido</h6></label>
                            <div id="questionnaireEditContent'.$questionnaire['id'].'" class="mb-2 questionnaireAddContent">'.$questionnaire['content'].'</div>
                            <input type="hidden" name="content" value="'.$questionnaire['content'].'">
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <div class="container-fluid">
                            <h6 title="Este campo es obligatorio" class="color-deep-blue">Preguntas<span class="text-danger">*</span></h6>
                            <div class="row">
                            <div id="editQuestions'.$questionnaire['id'].'" class="questions mb-4">';

                            foreach ($questionnaire['questions'] as $index => $question){
                                echo '<div class="question d-flex align-items-center mb-2">
                                    <div class="d-flex w-100">
                                    <div class="container-fluid">
                                    <div class="row">
                                    <div class="col-md-6 col-12 p-0 pb-1 pr-1">
                                    <p class="color-deep-blue ml-2 mb-2"><strong>Pregunta</strong></p>
                                    <input class="form-control ml-2 accordionInput" name="questionContent-'.$index.'" type="text" placeholder="Pregunta" value="'.$question['question'].'">
                                    </div>
                                    <div class="col-md-6 col-12 pb-1 px-1">
                                    <p class="color-deep-blue ml-2 mb-2"><strong>Tipo de respuesta</strong></p>
                                    <select class="form-control ml-2 accordionInput" name="questionType-'.$index.'" required>
                                    <option value="0" ';

                                if($question['type'] == 0) echo 'selected';

                                echo'>Respuesta libre</option>
                                    <option value="1" ';

                                if($question['type'] == 1) echo 'selected';

                                echo'>Seleccionar respuesta</option>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div><i title="Borrar pregunta" class="glyphicon glyphicon-remove-circle iconBig mx-4 color-deep-blue rounded-circle interactive questionDeleteField"></i></div>
                                    </div><div>';

                                foreach ($question['possibleAnswers'] as $answer){
                                    echo '<div class="d-md-flex d-block align-items-center mb-2 ml-2">
                                        <input class="form-control mb-2" name="answers-'.$index.'[]" type="text" placeholder="Respuesta" value="'.$answer['answer'].'">
                                        <div class="pb-md-0 pb-4"><i title="Borrar unidad formativa" class="glyphicon glyphicon-remove-circle iconBig color-deep-blue ml-4 float-md-none float-right rounded-circle interactive questionDeleteField "></i></div>
                                        </div>';
                                }

                                echo'<i class="centerHorizontal bg-deep-blue text-white rounded-circle p-3 glyphicon glyphicon-plus interactive addAnswer" data-nq="'.$index.'" title="Añadir respuesta"></i></div>';
                            }

                            echo'</div>
                            <i title="Añadir Pregunta" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal interactive addQuestion mb-2 p-2"></i>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="container-fluid mt-4 mb-2">
                            <div class="float-right mb-2">
                            <button id="editQuestionnaireSubmit'.$questionnaire['id'].'" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteQuestionnaireModal-'.$questionnaire['id'].'" tabindex="-1" role="dialog" aria-labelledby="Confirmación ¿desea borrar el cuestionario '.$questionnaire['title'].'?" aria-hidden="true">
                            <form action="'.url("deleteQuestionnaire").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="questionnaire" value="'.$questionnaire["id"].'">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Borrar <strong>'.$questionnaire['title'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6 class="text-center px-4">¿Está seguro de que desea borrar el cuestionario <strong>'.$questionnaire['title'].'</strong>?</h6>
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
                            <script type="text/javascript" id="questionnaireEditScript'.$questionnaire['id'].'">
                                $(window).on("load", function(){
                                    textEditorFromReference("#questionnaireEditContent'.$questionnaire['id'].'");

                                    $("#questionnaireEditAnnouncement'.$questionnaire['id'].'").datepicker();

                                    $("#editQuestions'.$questionnaire['id'].'").accordion({
                                        header: ".question",
                                        active: 3,
                                        collapsible: true,
                                        heightStyle: "content",
                                    });

                                    $("#questionnaireEditScript'.$questionnaire['id'].'").remove();
                                });
                            </script>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- E N D   A D M I N I S T R A T E   Q U E S T I O N N A I R E S -->

    <script id="previewScript" type="text/javascript">
        $(window).on('load', function () {
            let previewUrl = "<?php echo url('/').'/questionnaire' ?>";
            $('.previewAnchor').attr('href', previewUrl);
            $('#previewScript').remove();
        })
    </script>

@stop
@section('footer')
