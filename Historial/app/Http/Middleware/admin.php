<?php

namespace HistoriaOcupacional\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $guard){
        $this->auth = $guard;
    }
    
    public function handle($request, Closure $next)
    {
        //if ($this->auth->user()->roll != 1) {
        //    Session::flash('msg-err','Sin privilegios');
         //   return redirect()->to('/admin');
        //}
        return $next($request);
    }
}
