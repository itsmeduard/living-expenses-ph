<?php
namespace App\Http\Middleware;
use Illuminate\{ Contracts\Auth\Guard, Support\Facades\Auth };
use Closure;
class CheckUser
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        abort_if(($request->user()==null), 404);
        return $next($request);
    }
}
