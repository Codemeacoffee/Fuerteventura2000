@extends('layout')
@section('header')
@section('title')Cuestionario - {{$questionnaire["title"]}} @endsection
@section('description')¡Tu opinión significa mucho para nosotros! @endsection
@section('img'){{asset('images/ftv2000SEO.jpg')}} @endsection
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/questionnaire.css')}}">

<div class="container-fluid">
    <div class="row mt-lg-5 pt-lg-4">
        <div class="col-xl-6 offset-xl-3 col-12 offset-0 px-xl-0 px-lg-5">
            <form method="post" action="{{url('sendQuestionnaire')}}">
                {{csrf_field()}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="color-slate-blue text-center w-xs-100 text-xs-center noWrap pr-sm-4 pr-0 mt-5 pt-5 mb-2"><strong class="ed-text-minus" data-ed="generic-title-2">{{$questionnaire["title"]}}</strong></h1>
                            <p class="color-slate-blue text-center mb-4"><strong>{{$questionnaire["location"]}}</strong></p>
                            <div class="text-center">{!! $questionnaire["content"] !!}</div>
                        </div>

                        <?php

                        foreach($questionnaire["questions"] as $index => $question){

                            echo'<div class="col-12">
                            <h5 class="color-deep-blue text-center mb-4"><strong>'.($index + 1).' - '.$question["question"].'</strong></h5>';
                            if($question["type"] == "0"){
                                echo'<textarea class="form-control" name="question-'.$question['id'].'" rows="4" required></textarea>';
                            } else {
                                echo '<div class="text-center mb-3">';
                                foreach($question["possibleAnswers"] as $possibleAnswer){
                                    echo'<input type="radio" class="form-radio" name="question-'.$question['id'].'" value="'.$possibleAnswer["answer"].'" required>
                                    <label for="'.$possibleAnswer["id"].'"><b>'.$possibleAnswer["answer"].'</b></label>';
                                }
                                echo '</div>
                                  </div>';
                            }
                        }

                        ?>
                        <input type="hidden" name="questionnaire" value="{{$questionnaire['id']}}">
                    </div>
                </div>
            </form>
            <div class="modal-footer border-0">
                <button type="submit" class="btn cpBtn bg-deep-blue text-white border-deep-blue px-4"><strong>Enviar</strong></button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer')
