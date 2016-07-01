<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class ConfirmAdmin
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
         if($this->auth->check() && $this->auth->user()->active && !$this->auth->user()->isAdmin()){
            $this->auth->logout();
            return redirect('auth/login')->withErrors('sorry, this account is only for admin users');
        }
        return $next($request);
    }
}
