<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function report(Exception $e)
    {
        parent::report($e);
    }


    public function render($request, Exception $e)
    {
//        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
//            return response(view('errors.404'), 404);
//
//        if ($e instanceof \ErrorException)
//            return response(view('errors.404'), 404);



        return parent::render($request, $e);

    }
}
