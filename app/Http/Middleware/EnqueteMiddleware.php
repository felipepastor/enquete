<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\Validator;

class EnqueteMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Camada de fronteira entre a aplicação e a requisição
         * */
        return $next($request);
    }
}