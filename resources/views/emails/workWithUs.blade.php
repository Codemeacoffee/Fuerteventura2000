@extends('emails.emailLayout')
@section('header')
@section('content')
    <tr>
        <td style="padding: 40px 30px 40px 30px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="color: #000; font-family: Arial, sans-serif; font-size: 18px;">
                        <b>{{$name}} nos envió una solicitud de trabajo para el puesto de "{{$jobInfo}}".</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 20px 0 30px 0;color: #000; font-family: Arial, sans-serif; font-size: 16px;line-height: 20px;">
                        <b>
                            Envía su curriculum adjunto.<br/>

                            Puedes ponerte en contacto con el a través del correo {{$email}}, o a través del siguiente número de teléfono {{$phone}}
                            <br/>
                        </b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop
@section('footer')
