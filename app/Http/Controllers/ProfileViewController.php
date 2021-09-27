<?php

namespace App\Http\Controllers;

use App\Models\ProfilePersonalDetails;
use Illuminate\Support\Facades\DB;  
use Illuminate\Http\Request;

class ProfileViewController extends Controller
{
    public function profile_form()
    {
        
      $data = ProfilePersonalDetails::join('profile_general_information','profile_general_information.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')
                                    ->join('profile_current_contact_details','profile_current_contact_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')
                                    ->join('profile_permanent_contact_details','profile_permanent_contact_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')
                                    ->join('profile_emergency_details','profile_emergency_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
                                    ->join('profile_qualification_details','profile_qualification_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
                                    ->join('profile_company_details','profile_company_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
                                    ->join('profile_work_experience','profile_work_experience.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
                                    ->join('profile_bank_detail','profile_bank_detail.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
                                    ->join('profile_file_details','profile_file_details.user_id', '=','profile_personal_details.id', 'left outer', 'right outer')  
  
                                     ->get('profile_personal_details.*','profile_general_information.*', 'profile_current_contact_details.*', 'profile_permanent_contact_details.*',
                                        'profile_emergency_details.*', 'profile_qualification_details.*', 'profile_company_details.*', 'profile_work_experience.*',
                                        'profile_bank_detail.*', 'profile_file_details.*');
    
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
