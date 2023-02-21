<?php

namespace Fuerteventura2000\Exceptions;

use Exception;
use Fuerteventura2000\Page;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        view()->composer(['layouts.app', 'errors::500'], function ($view) {
            $this->passDataToErrorView($view);
        });

        view()->composer(['layouts.app', 'errors::419'], function ($view) {
            $this->passDataToErrorView($view);
        });

        view()->composer(['layouts.app', 'errors::404'], function ($view) {
            $this->passDataToErrorView($view);
        });


        view()->composer(['layouts.app', 'errors::403'], function ($view) {
            $this->passDataToErrorView($view);
        });

        return parent::render($request, $exception);
    }

    public function passDataToErrorView($view){
        $genericTexts = [];
        $pageGenericTexts = Page::where('page', 'generic')->get();

        foreach ($pageGenericTexts as $pageGenericText){
            $genericTexts[$pageGenericText['name']] = $pageGenericText['value'];
        }

        return $view->with('genericTexts', $genericTexts);
    }
}
