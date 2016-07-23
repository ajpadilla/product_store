<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class ActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
         if($this->auth->check() && !$this->auth->user()->active){
            $this->auth->logout();
            return redirect('auth/login')->withErrors('sorry, this user account is deactivated');
        }
        return $next($request);
    }
}
