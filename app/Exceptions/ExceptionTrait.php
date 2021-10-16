<?php
namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


trait ExceptionTrait{

    public function apiException($request,$exception){
        if ($this->isModel($exception)) {
             return $this->modelResponse($exception);
        }
        if ($this->isHTTP($exception)) {
            return $this->httpResponse($exception);
        }

        return parent::render($request, $exception);
    }

    protected function modelResponse($exception){
        return response()->json([
            'message' => "Model not found",

        ],400);
    }

    protected function httpResponse($exception){
        return response()->json([
            'message' => "Incorrect Route",

        ],400);
    }

    protected function isHTTP($exception){
        return $exception instanceof NotFoundHttpException;
    }
    protected function isModel($exception){
        return $exception instanceof ModelNotFoundException;
    }

}
