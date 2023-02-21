@extends('layout')
@section('header')
@section('title')Únete a nosotros - Fuerteventura2000 @endsection
@section('description')¿Buscas trabajo? Descubre tu futuro profesional en Fuerteventura2000 @endsection
@section('img'){{asset('images/uploads/'.$joinUsTexts['img-1'])}} @endsection
@section('content')

<!-- G E N E R I C   H E A D -->

<div id="genericHead">
    <img class="w-100 h-75 ed-img" data-ed="img-1" src="{{asset('images/uploads/'.$joinUsTexts['img-1'])}}">
    <div class="layer"></div>
</div>

<!-- E N D   G E N E R I C   H E A D -->

<div class="col-xl-10 offset-xl-1 col-12 offset-0 px-xl-0 px-lg-5">
    <div class="d-flex mb-5">
        <h1 class="color-slate-blue w-xs-100 text-xs-center noWrap pr-4"><strong class="ed-text-minus" data-ed="title-1">{!! $joinUsTexts['title-1'] !!}</strong></h1>
        <hr class="titleHr w-100 mt-5">
    </div>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-lg-6 col-12 h-400 bg-deep-blue p-0">
                <form method="post" action="{{url('sendCV')}}" class="p-sm-5 p-4" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input class="HPInput" type="email" name="HPInput">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light" placeholder="Nombre" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control bg-light" placeholder="Teléfono" name="phone" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control bg-light" placeholder="Correo Electrónico" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control bg-light" placeholder="Puesto al que aspiras" name="jobInfo" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subir</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" accept=".ppt, .pptx, .pdf, .doc , .docx" class="custom-file-input" id="curriculumInput" name="CV" required>
                            <label class="custom-file-label" for="curriculumInput">Curriculum</label>
                        </div>
                    </div>
                    <button class="btn bg-grey text-black-50 centerHorizontal" type="submit"><strong class="noWrap">Enviar</strong></button>
                </form>
            </div>
            <div class="col-lg-6 col-12 p-0">
                <img class="w-100 h-400 ed-img" data-ed="img-2" src="{{asset('images/uploads/'.$joinUsTexts['img-2'])}}">
            </div>
        </div>
    </div>
</div>

@stop
@section('footer')
