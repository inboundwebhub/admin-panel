<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleModel;
class ModuleController extends Controller
{
    public function create_mod(Request $request){
        $mm = new ModuleModel();
        $module_name = $request->module_name;
        $module_description = $request->module_desc;
        $selected_option = $request->selected_option;
        $isGeneral = $request->isGeneral;
        $mm->create_module($module_name,$module_description,$selected_option,$isGeneral);

        return view('createmodule');
    }
    
    public function read_modules(){
        $mm = new ModuleModel();

        $modules = $mm::All();
        return view('modules',compact('modules'));


    }
}
