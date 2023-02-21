@extends('adminLayout')
@section('header')
@section('title')Editor de Contactos - Panel de Control @endsection
@section('content')

    <!-- A D M I N I S T R A T E   C O N T A C T S -->

    <div class="container-fluid controlPanel">
        <div class="row h-100">
            <div class="col-12 overflow-auto">
                <div id="contactFilter" class="row bg-grey p-2 pb-4">
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="contactFilterTitle" class="color-deep-blue"><strong>Nombre de la Sede</strong></label>
                        <input class="form-control" type="text" id="contactFilterTitle">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="contactFilterLocation" class="color-deep-blue"><strong>Localización</strong></label>
                        <select id="contactFilterLocation" class="form-control">
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
                        <label for="contactFilterAddress" class="color-deep-blue"><strong>Dirección</strong></label>
                        <input class="form-control" type="text" id="contactFilterAddress">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="courseFilterPhone" class="color-deep-blue"><strong>Teléfono</strong></label>
                        <input class="form-control" type="number" id="courseFilterPhone">
                    </div>
                </div>
                <div class="container-fluid courses mt-5">
                    <div>
                        <i title="Añadir contacto" data-toggle="modal" data-target="#addContact" class="glyphicon glyphicon-plus bg-deep-blue text-white rounded-circle centerHorizontal iconBig interactive mb-5 p-3"></i>
                        <div class="row mb-4">
                            <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                                <a class="float-right color-deep-blue" href="{{url('controlPanel/contact')}}"><strong>Editar Página</strong></a>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade addContact" id="addContact" tabindex="-1" role="dialog" aria-labelledby="Herramienta para añadir contactos" aria-hidden="true">
                        <form class="form-group addContactForm" action="{{url("addContact")}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Añadir Contacto<strong></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-5">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="contactAddTitle" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre de la sede<span class="text-danger">*</span></h6></label>
                                                    <input id="contactAddTitle" class="form-control mb-2" type="text" name="title" required>
                                                    <label for="contactAddLocation" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                                                    <select id="contactAddLocation" class="form-control mb-2" name="location" required>
                                                        <option selected>Fuerteventura</option>
                                                        <option>Gran Canaria</option>
                                                        <option>Tenerife</option>
                                                        <option>Lanzarote</option>
                                                        <option>La Palma</option>
                                                        <option>La Gomera</option>
                                                        <option>El Hierro</option>
                                                    </select>
                                                    <label for="contactAddAddress" class="color-deep-blue"><h6 title="Este campo es obligatorio">Dirección<span class="text-danger">*</span></h6></label>
                                                    <input id="contactAddAddress" class="form-control mb-2 contactAddress" type="text" name="address" required>
                                                    <label for="contactAddPhone" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                                                    <input id="contactAddPhone" class="form-control mb-2" type="number" name="phone" required>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <iframe class="w-100 h-100 pt-md-0 pt-4 pb-md-0 pb-2" src="https://maps.google.com/maps?q=C%2F%20Gran%20Canaria%2C%20n%C2%BA%2054%20-%20Puerto%20del%20Rosario&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" marginwidth="0"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid mt-4 mb-2">
                                            <div class="float-right mb-2">
                                                <button type="submit" id="addContactSubmit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleSpecific"><strong>Guardar</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php

                    if(isset($contacts)){
                        foreach ($contacts as $contact){
                            echo '<div class="row mb-4 contact" data-title="'.$contact['name'].'" data-location="'.$contact['location'].'" data-address="'.$contact['address'].'" data-phone="'.$contact['phone'].'">
                            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                            <div class="container-fluid bg-grey rounded shadow p-4">
                            <div class="row">
                            <div class="col-md-8 col-12">
                            <h4 class="color-deep-blue text-overflow-ellipsis pb-1"><strong>'.$contact['name'].' - '.$contact['location'].'</strong></h4>
                            <div class="color-deep-blue pr-3 text-overflow-ellipsis mb-3">'.$contact['address'].'</div>
                            </div>
                            <div class="col-md-4 col-12 p-0 d-flex justify-content-center align-items-center">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-6">
                            <button class="btn cpBtn color-deep-blue border-deep-blue float-right px-4" data-toggle="modal" data-target="#deleteContactModal-'.$contact['id'].'"><strong>Borrar</strong></button>
                            </div>
                            <div class="col-6">
                            <button class="btn cpBtn bg-deep-blue color-grey border-deep-blue px-4" data-toggle="modal" data-target="#editContactModal-'.$contact['id'].'"><strong>Editar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade editContact" id="editContactModal-'.$contact['id'].'" tabindex="-1" role="dialog" aria-labelledby="Editor del contacto '.$contact['name'].'" aria-hidden="true">
                            <form id="editContactForm'.$contact['id'].'" class="form-group editContactForm" data-id="'.$contact['id'].'" action="'.url("editContact").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="contact" value="'.$contact["id"].'">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Editar <strong>'.$contact['name'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body px-md-5 px-2">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-6 col-12">
                            <label for="contactEditTitle'.$contact['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre de la sede<span class="text-danger">*</span></h6></label>
                            <input id="contactEditTitle'.$contact['id'].'" class="form-control mb-2" type="text" value="'.$contact['name'].'" name="title" required>
                            <label for="contactEditLocation'.$contact['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Localización<span class="text-danger">*</span></h6></label>
                            <select id="contactEditLocation'.$contact['id'].'" class="form-control mb-2" name="location" required>
                            <option '; if($contact['location'] == 'Fuerteventura') echo 'selected'; echo'>Fuerteventura</option>
                            <option '; if($contact['location'] == 'Gran Canaria') echo 'selected'; echo'>Gran Canaria</option>
                            <option '; if($contact['location'] == 'Tenerife') echo 'selected'; echo'>Tenerife</option>
                            <option '; if($contact['location'] == 'Lanzarote') echo 'selected'; echo'>Lanzarote</option>
                            <option '; if($contact['location'] == 'La Palma') echo 'selected'; echo'>La Palma</option>
                            <option '; if($contact['location'] == 'La Gomera') echo 'selected'; echo'>La Gomera</option>
                            <option '; if($contact['location'] == 'El Hierro') echo 'selected'; echo'>El Hierro</option>
                            </select>
                            <label for="contactEditAddress'.$contact['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Dirección<span class="text-danger">*</span></h6></label>
                            <input id="contactEditAddress'.$contact['id'].'" class="form-control mb-2 contactAddress" type="text" name="address" value="'.$contact['address'].'" required>
                            <label for="contactEditPhone'.$contact['id'].'" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                            <input id="contactEditPhone'.$contact['id'].'" class="form-control mb-2" type="number" name="phone" value="'.$contact['phone'].'" required>
                            </div>
                            <div class="col-md-6 col-12">
                            <iframe class="w-100 h-100 pt-md-0 pt-4 pb-md-0 pb-2" src="https://maps.google.com/maps?q='.$contact['address'].'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" marginwidth="0"></iframe>
                            </div>
                            </div>
                            </div>
                            <div class="container-fluid mt-4 mb-2">
                            <div class="float-right mb-2">
                            <button id="editContactSubmit'.$contact['id'].'" type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Guardar</strong></button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteContactModal-'.$contact['id'].'" tabindex="-1" role="dialog" aria-labelledby="Confirmación ¿desea borrar el contacto '.$contact['name'].'?" aria-hidden="true">
                            <form action="'.url("deleteContact").'" method="post">';
                            echo csrf_field();
                            echo'<input type="hidden" name="contact" value="'.$contact["id"].'">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-0">
                            <h5 class="modal-title w-100 text-center text-overflow-ellipsis">Borrar <strong>'.$contact['name'].'</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6 class="text-center px-4">¿Está seguro de que desea borrar el contacto <strong>'.$contact['name'].'</strong>?</h6>
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
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- E N D   A D M I N I S T R A T E   C O N T A C T S -->

    <script id="previewScript" type="text/javascript">
        $(window).on('load', function () {
            let previewUrl = "<?php echo url('/').'/contact' ?>";
            $('.previewAnchor').attr('href', previewUrl);
            $('#previewScript').remove();
        })
    </script>

@stop
@section('footer')
