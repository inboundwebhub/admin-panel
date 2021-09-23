<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission_moduleModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'permissions_module';

    protected $fillable = ['allowed_permission', 'module_id'];
}
