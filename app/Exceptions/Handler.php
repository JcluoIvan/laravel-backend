<?php

namespace App\Exceptions;

use Exception;
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
        if (false) {

            // if (is_a($exception, BaseException::class)) {
            //     $data = ['message' => $exception->getMessage()];
            //     if ($exception->getErrors()) {
            //         $data['errors'] = $exception->getErrors();
            //     }
            //     return response($data, $exception->getStatusCode());
            // }
            // $statusCode = 500;
            // $message = $exception->getMessage() ?: ("Error: " . get_class($exception));
            // switch (get_class($exception)) {
            //     case NotFoundHttpException::class:
            //         $statusCode = 404;
            //         $message = "Not Found";
            //         break;
            //     case MethodNotAllowedHttpException::class:
            //         $statusCode = 405;
            //         $message = "Method Not Allowed";
            //         break;
            // }
            $basePath = base_path();
            $traces = array_map(function ($trace) use ($basePath) {
                // $vendorPath = implode(DIRECTORY_SEPARATOR, [$basePath, 'vendor']);
                list(
                    'function' => $func,
                    'class' => $class,
                    'type' => $type,
                    'args' => $args,
                    'file' => $file,
                    'line' => $line,
                ) = array_merge([
                    'function' => null,
                    'class' => null,
                    'type' => null,
                    'args' => null,
                    'file' => null,
                    'line' => null,
                ], $trace);
                $arr = array_map(function ($value) {
                    if (is_object($value)) {
                        return get_class($value);
                    } elseif (is_array($value)) {
                        return 'array()';
                    } else {
                        return strtolower(gettype($value));
                    }
                }, $args ?: []);
                return [
                    'line' => $line ?: null,
                    'file' => $file ?: null,
                    'func' => $func ?: null,
                    'type' => $type ?: null,
                    'class' => $class ?: null,
                    'args' => $arr,
                ];
            }, $exception->getTrace());
            $message = substr($exception->getMessage(), 0, 1000);
            $code = $exception;
            $statusCode = is_a($exception, BaseException::class) ? $exception->getStatusCode() : 500;
            if (is_a($exception, NotFoundHttpException::class)) {
                $statusCode = 404;
                $message = "Not Found ";
            } elseif (is_a($exception, MethodNotAllowedHttpException::class)) {
                $statusCode = 404;
                $message = "Method Not Allowed";
            }
            $log = new LogException();
            $log->site = LogException::SITE_AGENT;
            $log->status_code = $statusCode;
            $log->code = $exception->getCode();
            $log->class_name = get_class($exception);
            $log->file = $exception->getFile();
            $log->line = $exception->getLine();
            $log->url = substr(request()->url(), 0, 200);
            $log->message = $message ?: 'unknown error';
            $log->traces = $traces;
            $log->ip = request()->ip();
            $log->save();
        }

        return parent::render($request, $exception);
    }
}
