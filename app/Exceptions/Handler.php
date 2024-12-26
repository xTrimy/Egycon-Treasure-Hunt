<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    'current_password',
    'password',
    'password_confirmation',
  ];
  /**
   * A list of error messages
   *
   * @var array<int, string>
   */
  protected $messages = [
    500 => 'Something went wrong',
    503 => 'Service unavailable',
    404 => 'Not found',
    403 => 'Not authorized',
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
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Throwable
   */
  public function render($request, Throwable $e)
  {
    $response = parent::render($request, $e);
    if (!$request->inertia()) {
      return $response;
    }
    $status = $response->getStatusCode();

    if (! array_key_exists($status, $this->messages)) {
      return $response;
    }

    return inertia('Error', [
      'status' => $status,
      'message' => $this->messages[$status],
    ])
      ->toResponse($request)
      ->setStatusCode($status);
  }
}
