<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PermModel;
use App\Models\permission_moduleModel;

class permissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$perm)
    {
        //$pm = new PermModel();
        $per = new permission_moduleModel;
        $perms = $per::All();

        foreach($perms as $pm){
        //dd($pm);
        dd(explode(',',$pm->allowed_permission));
        dd(in_array($perm,explode(',',$pm->allowed_permission)));
          if(in_array($perm,explode(',',$pm->Permission_name))){
            return $next($request);
        }else{
            return response('Cannot view this page');
        }
        if(!in_array($perm,explode(',',$pm->Permission_name))){
            return response('Cannot view this page');
        }
        else{
           return $next($request);
        }
        if(!in_array($perm,explode(',',$pm->Permission_name))){
            return view('Cannot view this page');
        }
        else{
            return $next($request);
        }
        }
        //return $next($request);
       
    }
}
