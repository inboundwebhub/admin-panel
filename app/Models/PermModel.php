<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PermModel extends Model
{
    use HasFactory;
    protected $table = 'permission';


    public function create_permission($permission_name,$permission_description){
        $this->Permission_name = $permission_name;
        $this->Permission_description = $permission_description;
        $this->save();
    }
}
