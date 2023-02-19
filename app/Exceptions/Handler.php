<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Auth;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        
        if(Auth::guard('api') || Auth::guard('driver') || Auth::guard('api-admin') ){
            if($exception instanceof UnauthorizedHttpException){
                return $this->returnError(__('response.msg_token_not_exist'), 401);

            }
        }

        return parent::render($request, $exception);
    }
}
