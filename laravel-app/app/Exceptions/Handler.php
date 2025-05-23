<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception): Response
    {
        if ($request->is('api/*') || $request->wantsJson()) {

            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Erro de validação',
                    'errors' => $exception->errors(),
                    'data' => null,
                ], 422);
            }

            $statusCode = 500;

            if ($exception instanceof HttpExceptionInterface) {
                $statusCode = $exception->getStatusCode();
            }

            return response()->json([
                'message' => $exception->getMessage() ?: 'Erro interno no servidor',
                'errors' => null,
                'data' => null,
            ], $statusCode);
        }

        return parent::render($request, $exception);
    }
}
