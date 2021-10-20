<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleModel;
use App\Models\Rolemodel;
use App\Models\PermModel;
use App\Models\permission_moduleModel;
use DB;
use Artisan;
class ModuleController extends Controller
{
    public function create_mod(Request $request){
        $mm = new ModuleModel();
        $module_name = $request->module_name;
        $module_description = $request->module_desc;
        $selected_option = $request->selected_option;
        $isGeneral = $request->isGeneral;
        $AssignedtoRole = $request->roles;
        
        $mm->create_module($module_name,$module_description,$selected_option,$isGeneral,$AssignedtoRole);

        $pmm = new permission_moduleModel();
        $permissions = implode(',',$request->permissions);
        $moduleID = $mm->id;

        $pmm->allowed_permissions = $permissions;
        $pmm->module_id = $moduleID;


        $pmm->save();
        Artisan::call("db:seed",array('--class'=>'MenusTableSeeder'));
        return redirect('modules');
    }
    
    public function read_modules(){
        // $mm = new ModuleModel();
        // $modules = $mm::All();

        // return view('modules',compact('modules'));
        $permissions = DB::table('permissions_module')
        ->join('modules','permissions_module.module_id','=','modules.id')
        ->select('*')
        ->get();

        return view('modules',compact('permissions'));


    }

    public function read_modules_by_id($id){
        $mm = new ModuleModel();
        $module = $mm::find($id);

        return view('moduleSingle',compact('module'));

    }


    public function populate_roles(){
        $role = new Rolemodel();
        $rolestopush = $role::All();
        $perm = new PermModel();
        $perms = $perm::All();

        return view('createmodule',compact('rolestopush','perms'));
    }

    public function viewPermissions (Request $request){
         $permissions = DB::table('permissions_module')
         ->join('modules','permissions_module.module_id','=','modules.id')
         ->select('*')
         ->get();

        //  dd($permissions);
         return view('viewPermissions',compact('permissions'));
    }

    public function edit_module_by_id($id){
        $mm = new ModuleModel();
        $module_info = $mm::find($id);

        return view('moduleSingleEdit',compact('module_info'));

    }

    public function load_deactivated(){
        return view('deactivated');
    }
    
    public function allow_access_based_on_permission(){
        $permissions = DB::table('permissions_module')
        ->join('modules','permissions_module.module_id','=','modules.id')
        ->select('*')
        ->get();

        return view('modules',compact('permissions'));
    }
}
