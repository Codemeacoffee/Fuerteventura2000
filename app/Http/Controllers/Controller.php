<?php

namespace Fuerteventura2000\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    function dayAndMonthParser($date){
        $dateParts = explode('/', $date);

        if (Count($dateParts) > 1){

            $parsedMonth = null;

            switch (intval($dateParts[1])){
                case 1:
                    $parsedMonth = 'Ene';
                    break;
                case 2:
                    $parsedMonth = 'Feb';
                    break;
                case 3:
                    $parsedMonth = 'Mar';
                    break;
                case 4:
                    $parsedMonth = 'Abr';
                    break;
                case 5:
                    $parsedMonth = 'May';
                    break;
                case 6:
                    $parsedMonth = 'Jun';
                    break;
                case 7:
                    $parsedMonth = 'Jul';
                    break;
                case 8:
                    $parsedMonth = 'Ago';
                    break;
                case 9:
                    $parsedMonth = 'Sep';
                    break;
                case 10:
                    $parsedMonth = 'Oct';
                    break;
                case 11:
                    $parsedMonth = 'Nov';
                    break;
                default:
                    $parsedMonth = 'Dic';
            }

            $day = $dateParts[0];
            $month = $parsedMonth;

        }else{
            $day = '&nbsp;';
            $month = '&nbsp;';
        }
        return [$day, $month];
    }
}
