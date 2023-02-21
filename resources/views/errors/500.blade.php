@extends('errors.errorsLayout')
@section('header')
@section('title')500 @endsection
@section('img'){{asset('images/404.png')}} @endsection
@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="col-xl-10 offset-xl-1 col-12 offset-0">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-7 d-lg-block d-none">
                        <img class="w-100" alt="Imagen haciendo parecer que el fondo de la web esta rasgado y se ve el código de programación por el agujero." src="{{asset('images/404.png')}}">
                    </div>
                    <div class="col-xl-4 offset-xl-1 col-lg-4 col-12 offset-0">
                        <h1 class="color-deep-blue greatTitle text-center"><strong>500</strong></h1>
                        <h1 class="color-deep-blue text-center mb-4"><strong>Error del Servidor</strong></h1>
                        <h6 class="text-center mb-4">
                            Algo ha ido mal con su petición, vuelva a intentarlo más tarde.</br>
                            Si el error persiste, pongase en <a href="{{url('contact')}}">contacto</a> con nosotros.
                        </h6>
                        <a href="{{url('/')}}"><button class="btn color-deep-blue border-deep-blue centerHorizontal px-4 mb-5"><strong>Ir a Inicio</strong></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer')
