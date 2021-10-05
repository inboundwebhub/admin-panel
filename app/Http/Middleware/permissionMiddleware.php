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
        $exploded_url = explode('/',$request->getpathInfo());
        $id = $exploded_url[2];
        //$perms = $per::All();
        $perms = $per::where('module_id','=',$id)->first();
    

        //dd(explode(',',$perms->allowed_permissions));
    //   $exploded_perms = explode(',',$pm->allowed_permission);
         //dd(in_array($perm,explode(',',$perms->allowed_permissions)));
          if(in_array($perm,explode(',',$perms->allowed_permissions))){
            return $next($request);
        }else{
           // return response(view('403'));
           return abort('403');
        }
        // if(!in_array($perm,explode(',',$perms->allowed_permissions))){
        //     return response('Cannot view this page');
        // }
        // else{
        //    return $next($request);
        // }
        // if(!in_array($perm,explode(',',$perms->allowed_permissions))){
        //     return view('Cannot view this page');
        // }
        // else{
        //     return $next($request);
        // }
        // }
        //return $next($request);
       
    }
}

