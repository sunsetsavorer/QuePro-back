<?php

namespace App\Exceptions;

use App\Domains\Common\Exceptions\ServiceException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    public function render($request, Throwable $exception)
	{
		list($message, $code) = match(get_class($exception))
		{
			ServiceException::class => [
				['other' => $exception->getMessage()],
				$exception->getCode(),
			],
			ValidationException::class => [
				$exception->validator->errors()->getMessages(),
				422,
			],
			default => [
				$exception->getMessage(),
				400
			]
		};

		return response()->json([
			'errors' => $message,
		], $code);
	}
}
