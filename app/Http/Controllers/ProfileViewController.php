<?php

namespace App\Http\Controllers;

use App\Models\ProfilePersonalDetails;
use App\Models\ProfileGeneralInformation;
use App\Models\ProfileCurrentContact;
use App\Models\ProfilePermanentContact;
use App\Models\ProfileEmergencyContact;
use App\Models\ProfileQualificationDetails;
use App\Models\ProfileCompanyDetails;
use App\Models\ProfileWorkExperiance;
use App\Models\ProfileBankDetail;
use App\Models\ProfileFileDetail;
use Illuminate\Support\Facades\DB;  
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProfileViewController extends Controller
{
    public function profile_view()
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

    public function profile_delete(Request $request)
    {   
        $id = $request->id;
       
        ProfilePersonalDetails::where('id',$id)->delete();
        ProfileGeneralInformation::where('user_id',$id)->delete();
        ProfileCurrentContact::where('user_id',$id)->delete();
        ProfilePermanentContact::where('user_id',$id)->delete();
        ProfileEmergencyContact::where('user_id',$id)->delete();
        ProfileQualificationDetails::where('id',$id)->delete();
        ProfileCompanyDetails::where('user_id',$id)->delete();
        ProfileWorkExperiance::where('user_id',$id)->delete();
        ProfileBankDetail::where('user_id',$id)->delete();
        ProfileFileDetail::where('user_id',$id)->delete();

        return redirect('http://127.0.0.1:8000/profile/view');
    }

    public function autocompleteSearch(Request $request)
    {
    	$movies = [];

       
            $search = $request->val;
           
            $result =ProfileQualificationDetails::select("Skills")->where('Skills', 'LIKE', "%".$search."%")
            		->get();

            foreach($result as $res)
            {
                echo $res->Skills;
            }
            // return response()->json($result);
            
        // return view("dashboard.profile.form", ['data' => $result]);
    }

}
