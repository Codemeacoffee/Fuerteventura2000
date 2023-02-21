<?php

namespace Fuerteventura2000\Http\Controllers;

use Fuerteventura2000\Answer;
use Fuerteventura2000\Page;
use Fuerteventura2000\Partner;
use Fuerteventura2000\Question;
use Fuerteventura2000\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionnaireController extends RootController
{
    //---------- Q U A L I T Y   P A G E S ----------//

    function access(Request $request){
        return view('questionnaire');
    }

    function login(Request $request){
        $user = htmlspecialchars($request['user']);
        $password = htmlspecialchars($request['password']);

        $questionnaires = Questionnaire::where('user', $user)->get();

        foreach ($questionnaires as $questionnaire){
            if(decrypt($questionnaire['password']) == $password){
                if($request->cookie('alreadyFulfilled') == $questionnaire['id']) return Redirect::back()->withErrors('Ya ha completado este cuestionario recientemente.');

                $userCookie = cookie('questionnaireUser', $questionnaire['user'], 1440);
                $sessionToken = cookie('questionnaireSessionToken', encrypt($questionnaire['password']), 1440);

                return redirect('questionnaire/'.$questionnaire['title'])
                    ->withCookie($userCookie)
                    ->withCookie($sessionToken);
            }
        }
        return Redirect::back()->withErrors('Usuario o contraseña incorrectos.');
    }

    function questionnaire(Request $request, $parameter){
        $userCookie = htmlspecialchars($request->cookie('questionnaireUser'));
        $sessionToken = htmlspecialchars($request->cookie('questionnaireSessionToken'));

        $questionnaires = Questionnaire::where('user', $userCookie)->get();

        $questionnaires = $this->buildQuestionnaires($questionnaires);

        foreach ($questionnaires as $questionnaire){
            if(decrypt($questionnaire['password'])  == decrypt(decrypt($sessionToken))){
                $genericTexts = [];
                $pageGenericTexts = Page::where('page', 'generic')->get();

                foreach ($pageGenericTexts as $pageGenericText){
                    $genericTexts[$pageGenericText['name']] = $pageGenericText['value'];
                }

                return view('fulfillQuestionnaire')
                    ->with('page', 'questionnaire')
                    ->with('genericTexts', $genericTexts)
                    ->with('partners', Partner::all())
                    ->with('questionnaire', $questionnaire);
            }
        }
        return Redirect::to('questionnaire');
    }

    function evaluate(Request $request){
        $questionnaire = Questionnaire::where('id', intval($request['questionnaire']))->first();

        if($questionnaire){
            foreach ($request->all() as $key => $value){
                $splitKey = explode('-', $key);

                if($splitKey[0] == 'question'){
                    $question = Question::where('id', $splitKey[1])->first();

                    if ($question['questionnaireId'] == $questionnaire['id']){
                        Answer::create([
                            'questionnaireId' => $questionnaire['id'],
                            'question' => $question['question'],
                            'answer' => htmlspecialchars($value)
                        ]);
                    }
                }
            }
            $fulfilledCookie = cookie('alreadyFulfilled', $questionnaire['id'], 1440);

            return Redirect::to('/')
                ->with('successMessage', 'Su valoración ha sido enviada con exito, ¡muchas gracias por su cooperación!')
                ->withCookie($fulfilledCookie);
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }
}
