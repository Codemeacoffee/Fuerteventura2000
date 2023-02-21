@extends('emails.emailLayout')
@section('header')
@section('content')
    <tr>
        <td style="padding: 40px 30px 40px 30px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="color: #000; font-family: Arial, sans-serif; font-size: 18px;">
                        <b>¡Descubre nuestros cursos para este mes!</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 20px 0 30px 0;color: #000; font-family: Arial, sans-serif; font-size: 16px;line-height: 20px;">
                        <b>
                            {!! $courses !!}
                            <br/>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="color: #000; font-family: Arial, sans-serif; font-size: 18px;">
                        <b>¡y no olvides nuestras noticias!</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 20px 0 30px 0;color: #000; font-family: Arial, sans-serif; font-size: 16px;line-height: 20px;">
                        <b>
                            {!! $news !!}
                            <br/>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="color: #000; font-family: Arial, sans-serif; font-size: 18px;">
                        <b>Si no deseas seguir recibiendo estos correos puedes anular tu subscripción haciendo click <a target="_blank" href="https://www.fuerteventura2000.com/cancelSubscription/{{$email}}">aquí.</a></b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop
@section('footer')
