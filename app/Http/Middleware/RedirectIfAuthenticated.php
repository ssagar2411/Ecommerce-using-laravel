<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $redirectTo='/';
        if(Auth::guard('web')->check()){
            $actions=$request->route()->getAction();
            if(isset($actions['prefix'])){
                $type=$actions['prefix'];
                if($type){
                    if($type=='/user'){
                        $redirectTo='/user/profile';
                    }elseif($type=='/vendor'){
                        $redirectTo='vendor/dashboard';
                    }
                }
            }            
            return redirect($redirectTo);
        }

        return $next($request);
    }
}
