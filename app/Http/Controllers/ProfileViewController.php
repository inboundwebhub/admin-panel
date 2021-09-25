<?php

namespace App\Http\Controllers;

use App\Models\ProfilePersonalDetails;
use Illuminate\Support\Facades\DB;  
use Illuminate\Http\Request;

class ProfileViewController extends Controller
{
    public function profile_form()
    {
      $data = ProfilePersonalDetails::join('profile_general_information','profile_general_information.user_id', '=','profile_personal_details.id')
                                    //  ->where('profile_personal_details.id', '=', 12)
                                     ->get();
    
        return view('dashboard.profile.profile_view', ['data'=>$data]);
    }

    // public function profile_edit(Request $request)
    // {   
    //     $id = $request->id;
    //     $data = ProfilePersonalDetails::join('profile_general_information','profile_general_information.user_id', '=','profile_personal_details.id')
    //             ->where('profile_personal_details.id', '=', $id)
    //             ->get();
    
    //     return view('dashboard.profile.form', ['data'=>$data]);
    // }
}
