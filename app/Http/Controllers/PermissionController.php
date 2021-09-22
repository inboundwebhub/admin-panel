<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermModel;

class PermissionController extends Controller
{
    public function create_perm(Request $request){
        $pm = new PermModel();
        $permission_name = $request->permission_name;
        $permission_description = $request->permission_description;

        $pm->create_permission($permission_name,$permission_description);
        
    }
   
    
}
