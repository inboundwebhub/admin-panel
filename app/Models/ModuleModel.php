<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleModel extends Model
{
    protected $table = 'modules';
    public $timestamps = false;
    protected $fillable = [
        'module_name', 'module_description', 'Activate_Deactivate', 'isGeneralModule', 
    ];

    public function create_module($module_name,$module_description,$selected_option,$isGeneral){
        $this->module_name = $module_name;
        $this->module_description = $module_description;
        $this->Activate_Deactivate = $selected_option;
        $this->isGeneralModule = $isGeneral;
        $this->save();
    }
}
