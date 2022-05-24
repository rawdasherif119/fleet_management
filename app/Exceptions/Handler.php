<?php
namespace App\Exceptions;

use App\Resources\ErrorResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function report(Throwable $exception)
    {
        if ($exception instanceof \League\OAuth2\Server\Exception\OAuthServerException) {
            return;
        }
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            abort(new ErrorResource(Response::HTTP_METHOD_NOT_ALLOWED, __('errors.method_not_allowed')));
        }
        if ($exception instanceof NotFoundHttpException) {
            abort(new ErrorResource(Response::HTTP_NOT_FOUND, __('errors.route_not_found')));
        }
        if ($exception instanceof ModelNotFoundException) {
            abort(new ErrorResource(Response::HTTP_NOT_FOUND, __('errors.model_not_found')));
        }
        if ($exception instanceof UnauthorizedException
            || $exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException
            || $exception instanceof AuthorizationException
        ) {
            abort(new ErrorResource(Response::HTTP_FORBIDDEN, __('errors.unauthorized')));
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = [];
        foreach ($exception->errors() as $field => $message) {
            $errors[] = [
                'type'  => $field,
                'error' => $message[0],
            ];
        }
        return response()->json(['errors' => $errors], $exception->status);
    }

    /**
     * Hndel unauthenticated exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
        ? response()->json(['message' => $exception->getMessage()], 401)
        : redirect()->guest(route('login'));
    }
}
