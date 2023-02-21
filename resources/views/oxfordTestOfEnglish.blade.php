@extends('layout')
@section('header')
@section('title')Oxford Test of English - Fuerteventura2000 @endsection
@section('description'){!! substr(strip_tags($oxfordTestOfEnglishTexts['text-1']), 0, 151).'...' !!} @endsection
@section('img'){{asset('images/uploads/'.$oxfordTestOfEnglishTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$oxfordTestOfEnglishTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<!-- I N S C R I P T I O N S   M O D A L S -->

<div class="modal fade" id="oxfordInscriptionFull" tabindex="-1" role="dialog" aria-labelledby="Modal for user inscription" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{url('oxfordInscription/full')}}">
                {{csrf_field()}}
                <input class="HPInput" type="email" name="HPInput">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center color-deep-blue">Inscríbete en <strong>Oxford Test of English (4 competencias)</strong></h5>
                    <button type="button" class="close noScriptDisplayNone" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <noscript>
                        <a href="{{url()->full()}}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </noscript>
                </div>
                <div class="modal-body px-5">
                    <label for="inscriptionName" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionName" class="form-control mb-2" type="text" name="name" required>
                    <label for="inscriptionEmail" class="color-deep-blue"><h6 title="Este campo es obligatorio">Email<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionEmail" class="form-control mb-2" type="email" name="email" required>
                    <label for="inscriptionPhone" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionPhone" class="form-control mb-2" type="number" min="1" max="999999999999999" name="phone" required>
                    <div>
                        <label for="isle">Seleccione la isla: </label>
                        <select name="isle" id="isle">
                            <option value="Tenerife">Tenerife</option>
                            <option value="grancanaria">Gran Canaria</option>
                            <option value="Fuerteventura">Fuerteventura</option>
                        </select>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="consent" id="inscriptionConsent" required>
                        <label class="form-check-label" for="inscriptionConsent"><h6 title="Este campo es obligatorio" class="color-deep-blue ml-1">Consiento el uso de mis datos para los fines indicados en la <a target="_blank" href="{{url('privacyPolicy')}}"><u>política de privacidad</u></a>.<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" name="publicity" id="inscriptionPublicity">
                        <label class="form-check-label" for="inscriptionPublicity"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Quiero recibir ofertas y noticias de su entidad.</h6></label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 noScriptDisplayNone toggleGeneric" data-dismiss="modal"><strong>Cancelar</strong></button>
                    <noscript>
                        <a href="{{url()->full()}}"><button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleGeneric" ><strong>Cancelar</strong></button></a>
                    </noscript>
                    <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleContent" ><strong>Enviar</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="oxfordInscriptionPartial" tabindex="-1" role="dialog" aria-labelledby="Modal for user inscription" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{url('oxfordInscription/partial')}}">
                {{csrf_field()}}
                <input class="HPInput" type="email" name="HPInput">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center color-deep-blue">Inscríbete en <strong>Oxford Test of English (1 competencia)</strong></h5>
                    <button type="button" class="close noScriptDisplayNone" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <noscript>
                        <a href="{{url()->full()}}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </noscript>
                </div>
                <div class="modal-body px-5">
                    <label for="inscriptionName" class="color-deep-blue"><h6 title="Este campo es obligatorio">Nombre<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionName" class="form-control mb-2" type="text" name="name" required>
                    <label for="inscriptionEmail" class="color-deep-blue"><h6 title="Este campo es obligatorio">Email<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionEmail" class="form-control mb-2" type="email" name="email" required>
                    <label for="inscriptionPhone" class="color-deep-blue"><h6 title="Este campo es obligatorio">Teléfono<span class="text-danger">*</span></h6></label>
                    <input id="inscriptionPhone" class="form-control mb-2" type="number" min="1" max="999999999999999" name="phone" required>
                    <div>
                        <label for="isle">Seleccione la isla: </label>
                        <select name="isle" id="isle">
                            <option value="Tenerife">Tenerife</option>
                            <option value="grancanaria">Gran Canaria</option>
                            <option value="Fuerteventura">Fuerteventura</option>
                        </select>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="consent" id="inscriptionConsent" required>
                        <label class="form-check-label" for="inscriptionConsent"><h6 title="Este campo es obligatorio" class="color-deep-blue ml-1">Consiento el uso de mis datos para los fines indicados en la <a target="_blank" href="{{url('privacyPolicy')}}"><u>política de privacidad</u></a>.<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" name="publicity" id="inscriptionPublicity">
                        <label class="form-check-label" for="inscriptionPublicity"><h6 title="Este campo es opcional" class="color-deep-blue ml-1">Quiero recibir ofertas y noticias de su entidad.</h6></label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 noScriptDisplayNone toggleGeneric" data-dismiss="modal"><strong>Cancelar</strong></button>
                    <noscript>
                        <a href="{{url()->full()}}"><button type="button" class="btn cpBtn color-deep-blue border-deep-blue px-4 toggleGeneric" ><strong>Cancelar</strong></button></a>
                    </noscript>
                    <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4 toggleContent" ><strong>Enviar</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- E N D   I N S C R I P T I O N S   M O D A L S -->

<!-- O X F O R D   T E S T   O F   E N G L I S H -->

<div id="oxfordTestOfEnglish" class="mt0-tablet-mobile mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-12 offset-0 px-xl-0 px-lg-5">
                <div class="d-flex">
                    <h1 class="color-slate-blue noWrap pr-4"><strong class="ed-text-minus" data-ed="title-1">{!! $oxfordTestOfEnglishTexts['title-1'] !!}</strong></h1>
                    <hr class="titleHr w-100 mt-5">
                </div>
                <div class="container-fluid">
                    <div class="row px-md-4 px-0 my-4">
                        <div class="ed-text w-100" data-ed="text-1">{!! $oxfordTestOfEnglishTexts['text-1'] !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <img class="w-100 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$oxfordTestOfEnglishTexts['img-2'])}}">
                        </div>
                        <div class="col-md-8 col-12 mt-md-0 mt-4">
                            <div class="ed-text w-100" data-ed="text-2">{!! $oxfordTestOfEnglishTexts['text-2'] !!}</div>
                            <button class="btn border-white centerHorizontal text-white bg-deep-blue noScriptDisplayNone px-4 my-4" data-toggle="modal" data-target="#oxfordInscriptionFull" ><strong>Inscríbete</strong></button>
                            <noscript>
                                <a href="#oxfordInscriptionFull"><button class="btn border-white centerHorizontal bg-deep-blue text-white px-4 my-4"><strong>Inscríbete</strong></button></a>
                            </noscript>
                            <div class="ed-text w-100" data-ed="text-3">{!! $oxfordTestOfEnglishTexts['text-3'] !!}</div>
                            <button class="btn border-white centerHorizontal text-white bg-deep-blue noScriptDisplayNone px-4 my-4" data-toggle="modal" data-target="#oxfordInscriptionPartial" ><strong>Inscríbete</strong></button>
                            <noscript>
                                <a href="#oxfordInscriptionPartial"><button class="btn border-white centerHorizontal bg-deep-blue text-white px-4 my-4"><strong>Inscríbete</strong></button></a>
                            </noscript>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- E N D   O X F O R D   T E S T   O F   E N G L I S H -->

@stop
@section('footer')
