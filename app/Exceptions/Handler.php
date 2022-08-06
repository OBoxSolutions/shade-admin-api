<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        // if (config('app.debug')) {
        //     return parent::render($request, $exception);
        // }

        if ($exception instanceof MethodNotAllowedException) {
            return response()->json(["success" => 0, "msg" => 'The specified method for the request is invalid'], 405);
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json(["success" => 0, "msg" => 'The specified message cannot be found'], 404);
        }

        if ($exception instanceof HttpException) {
            return response()->json(["success" => 0, "msg" => $exception->getMessage()], $exception->getStatusCode());
        }

        return response()->json(["success" => 0, "msg" =>'Unexpected Exception. Try later'], 500);

    }

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
}
