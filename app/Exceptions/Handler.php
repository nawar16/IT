<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Response;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
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
        if($exception instanceof \Illuminate\Database\QueryException){
            $errorCode = $exception->errorInfo[1];          
            switch ($errorCode) {
                case 1062://code dublicate entry 
                    return response([
                        'Status' => 0,
                        'Error'=>'Duplicate Entry'
                    ]);    
                    break;
                case 1364://handel any auther error
                    return response([
                        'Status' => 0,
                        'Error'=>$exception->getMessage()
                    ]);                        
                    break;      
            }
         }
        
        return parent::render($request, $exception);
    }
}
