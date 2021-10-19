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
       
        $per = new permission_moduleModel;
        $exploded_url = explode('/',$request->getpathInfo());
        $id = $exploded_url[2];
       
        $perms = $per::where('module_id','=',$id)->first();
    
        
          if(in_array($perm,explode(',',$perms->allowed_permissions))){
            return $next($request);
        }else{
           return response(view('403'));
       
        }
   
       
    }
}

