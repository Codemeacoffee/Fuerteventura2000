@extends('adminLayout')
@section('header')
@section('title')<?php if($page != '') echo ucfirst($page); else echo 'Inicio'; ?> - Panel de Control @endsection
@section('content')

<!-- A D M I N   E D I T   P A G E -->

<div class="container-fluid controlPanel">
    <div class="row h-100">
        <div class="col-12 overflow-auto px-0">
            <iframe class="w-100 d-block border-0" frameborder="0" src="{{url($page)}}"></iframe>
        </div>
    </div>
</div>

<!-- E N D   A D M I N   E D I T   P A G E -->

<script id="previewScript" type="text/javascript">
    $(window).on('load', function () {
        let previewUrl = "<?php echo url('/').'/'.$page ?>";
        $('.previewAnchor').attr('href', previewUrl);
        $('#previewScript').remove();
    })
</script>
<script type="text/javascript" src="{{asset('js/adminEditor.js')}}"></script>

@stop
@section('footer')
