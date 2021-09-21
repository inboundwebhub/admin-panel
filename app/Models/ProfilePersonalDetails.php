<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePersonalDetails extends Model
{
    use HasFactory;

    protected $table = 'profile_personal_details';

   // protected $fillable = ['Bank_Name', 'Branch_Name', 'Account_number'];
}
