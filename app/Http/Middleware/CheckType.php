<?php

namespace App\Http\Middleware;

use Closure;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $types=$this->getRequiredRoleForRoute($request->route());

        if($request->user()->hasRole($types)){
            return $next($request);
        }
        
        if(($request->user()->role->name)=="user"){
         return redirect()->route('user.profile');            
        }
        if(($request->user()->role->name)=="vendor"){
         return redirect()->route('vendor.dashboard');            
        }
        return $next($request);
    }
    protected function getRequiredRoleForRoute($route){
        $actions=$route->getAction();
        return isset($actions['type'])?$actions['type']:null;
    }
}