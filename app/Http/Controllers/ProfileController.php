<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
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

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_form()
    {
        return view("dashboard.profile.form");
    }


    public function insert_personal_details(Request $request)
    {
       session()->forget('id1');
       session()->forget('id2');
       session()->forget('id3');
       session()->forget('id4');
       session()->forget('id5');
       session()->forget('id6');
       session()->forget('id7');
       session()->forget('id8');
       session()->forget('id9');
       session()->forget('id10');

        $id = $request->session()->get('id1');
       echo $id;
    
        $data = ProfilePersonalDetails::Where('id', $id)->get();
                  
        if (empty($id) || count($data) == 0) {     
            echo "helo";  
            $data = new ProfilePersonalDetails;
            $data->first_name =  $request->f_name;
            $data->middle_name =  $request->m_name;
            $data->last_name =  $request->l_name;
            $data->gender =  $request->gender;
            $data->emailid =  $request->email;
            $data->password =  $request->password;
         
            $data->save();
            $id =  $data->id;
            $request->session()->put('id1', $id);
        }



        if (!empty($id) && !empty($data)) {
            $data = ProfilePersonalDetails::find($id);
            $data->first_name =  $request->f_name;
            $data->middle_name =  $request->m_name;
            $data->last_name =  $request->l_name;
            $data->gender =  $request->gender;
            $data->emailid =  $request->email;
            $data->password =  $request->password;
           
            $data->save();
        }
    }

    public function insert_general_details(Request $request)
    {
        
        $id = $request->session()->get('id2');
        echo $id;
     
        
        $data = ProfileGeneralInformation::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileGeneralInformation;

            $data->Date_of_birth =  $request->b_date;
            $data->Blood_group =  $request->b_group;
            $data->Marital_Status =  $request->m_status;
            $data->Driving_License_number =  $request->dl_number;
            $data->Passport_number =  $request->pass_num;
            $data->Bio =  $request->bio;
            $data->user_id =  $request->session()->get('id1');
            $data->save();
            $id = $data->id;
            $request->session()->put('id2', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileGeneralInformation::find($id);
            $data->Date_of_birth =  $request->b_date;
            $data->Blood_group =  $request->b_group;
            $data->Marital_Status =  $request->m_status;
            $data->Driving_License_number =  $request->dl_number;
            $data->Passport_number =  $request->pass_num;
            $data->Bio =  $request->bio;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }



    public function insert_contact_details_current(Request $request)
    {

        echo "hello";

        $id = $request->session()->get('id3');
        echo $id;
        
        $data = ProfileCurrentContact::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileCurrentContact;

            $data->Current_Address =  $request->c_address;
            $data->Current_City =  $request->c_city;
            $data->Current_State =  $request->c_state;
            $data->Current_Zipcode =  $request->c_zipcode;
            $data->Personal_Contact_number =  $request->c_number;
            $data->Local_Contact_number =  $request->l_numbe;
            $data->Company_Skypeid =  $request->skypeid;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id = $data->id;
            $request->session()->put('id3', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileCurrentContact::find($id);
            $data->Current_Address =  $request->c_address;
            $data->Current_City =  $request->c_city;
            $data->Current_State =  $request->c_state;
            $data->Current_Zipcode =  $request->c_zipcode;
            $data->Personal_Contact_number =  $request->c_number;
            $data->Local_Contact_number =  $request->l_numbe;
            $data->Company_Skypeid =  $request->skypeid;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }


    public function insert_contact_details_permanent(Request $request)
    {

        $id = $request->session()->get('id4');
        echo $id;
        
        $data = ProfilePermanentContact::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfilePermanentContact;

            $data->Permanent_Address =  $request->p_address;
            $data->Permanent_City =  $request->p_city;
            $data->Permanent_State =  $request->p_state;
            $data->Permanent_Zipcode =  $request->p_zipcode;
            $data->Parents_Contact_number1 =  $request->p_number1;
            $data->Parents_Contact_number2 =  $request->p_number2;
            $data->Personal_Emailid =  $request->p_emailid;
            $data->Personal_Skypeid =  $request->p_skypeid;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id = $data->id;
            $request->session()->put('id4', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfilePermanentContact::find($id);
            $data->Permanent_Address =  $request->p_address;
            $data->Permanent_City =  $request->p_city;
            $data->Permanent_State =  $request->p_state;
            $data->Permanent_Zipcode =  $request->p_zipcode;
            $data->Parents_Contact_number1 =  $request->p_number1;
            $data->Parents_Contact_number2 =  $request->p_number2;
            $data->Personal_Emailid =  $request->p_emailid;
            $data->Personal_Skypeid  =  $request->p_skypeid;

            $data->save();
        }
    }


    public function insert_emergency_contact_details(Request $request)
    {

        $id = $request->session()->get('id5');
        echo $id;
        
        $data = ProfileEmergencyContact::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileEmergencyContact;

            $data->Name =  $request->name;
            $data->Relation =  $request->relation;
            $data->Contact_number =  $request->number;
            $data->Address =  $request->address;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id = $data->id;
            $request->session()->put('id5', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileEmergencyContact::find($id);
            $data->Name =  $request->name;
            $data->Relation =  $request->relation;
            $data->Contact_number =  $request->number;
            $data->Address =  $request->address;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }


    public function insert_qualification_details(Request $request)
    {
        echo "hello world";

        $id = $request->session()->get('id6');
        echo $id;
        
        $data = ProfileQualificationDetails::Where('id', $id)->get();

        if (empty($id) ||count($data)== 0) {
            echo "hello world";
            $data = new ProfileQualificationDetails;

            $data->Education_Detail =  $request->select;
            $data->Degree =  $request->degree;
            $data->University =  $request->university;
            $data->Passing_year =  $request->passing_year;
            $data->Grade =  $request->grade;
            $data->Skills =  $request->tags;
            $data->Known_language =  $request->language;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id = $data->id;
            $request->session()->put('id6', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileQualificationDetails::find($id);
            $data->Education_Detail =  $request->select;
            $data->Degree =  $request->degree;
            $data->University =  $request->university;
            $data->Passing_year =  $request->passing_year;
            $data->Grade =  $request->grade;
            $data->Skills =  $request->tags;
            $data->Known_language =  $request->language;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }

    public function insert_company_details(Request $request)
    {
        $id = $request->session()->get('id7');
        echo $id;
        echo "heelo";
        
        $data = ProfileCompanyDetails::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileCompanyDetails;
            $data->Date_of_joining =  $request->joining_date;
            $data->Employee_id =  $request->employee_id;
            $data->Department =  $request->department;
            $data->Designation =  $request->designation;
            $data->Job_Profile =  $request->job_profile;
            $data->Role =  $request->employee_role;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id =  $data->id;
            $request->session()->put('id7', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileCompanyDetails::find($id);
            $data->Date_of_joining =  $request->joining_date;
            $data->Employee_id =  $request->employee_id;
            $data->Department =  $request->department;
            $data->Designation =  $request->designation;
            $data->Job_Profile =  $request->job_profile;
            $data->Role =  $request->employee_role;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }

    public function insert_work_experiance(Request $request)
    {

        $id = $request->session()->get('id8');
        echo $id;

        $data = ProfileWorkExperiance::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileWorkExperiance;
            $data->Duration =  $request->duration;
            $data->Company_Name =  $request->c_name;
            $data->Company_Number =  $request->c_number;
            $data->Company_Address =  $request->c_address;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id =  $data->id;
            $request->session()->put('id8', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileWorkExperiance::find($id);
            $data->Duration =  $request->duration;
            $data->Company_Name =  $request->c_name;
            $data->Company_Number =  $request->c_number;
            $data->Company_Address =  $request->c_address;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }


    public function insert_bank_details(Request $request)
    {

        $id = $request->session()->get('id9');
        echo $id;

        $data = ProfileBankDetail::Where('id', $id)->get();

  
        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileBankDetail;
            $data->Bank_Name =  $request->bank_name;
            $data->Branch_Name =  $request->branch_name;
            $data->Account_number =  $request->account_number;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id =  $data->id;
            $request->session()->put('id9', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileBankDetail::find($id);
            $data->Bank_Name =  $request->bank_name;
            $data->Branch_Name =  $request->branch_name;
            $data->Account_number =  $request->account_number;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }


    public function insert_file_details(Request $request)
    {

        $id = $request->session()->get('id10');
        echo $id;

        $data = ProfileFileDetail::Where('id', $id)->get();

        if (empty($id) || count($data) == 0) {
            echo "hello world";
            $data = new ProfileFileDetail;
            $data->profile_pic = $request->file('profile_pic')->store('storage/app/public/images');

            $files = [];
            foreach ($request->file('attach_file') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $files[] = $file->store('storage/app/public/images');
            }
            $files = implode(',', $files);
            $data->attach_file = $files;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
            $id = $data->id;
            $request->session()->put('id10', $id);
            //     array_push($array,$id);
            //    print_r($array);
        }

        if (!empty($id) && !empty($data)) {

            $data = ProfileFileDetail::find($id);
            $data->profile_pic = $request->file('profile_pic')->store('storage/app/public/images');
            $files = [];
            foreach ($request->file('attach_file') as $file) {
                echo "hii";
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file = $file->store('storage/app/public/images');
                array_push($files, $file);
            }
            $files = implode(',', $files);
            $data->attach_file = $files;
            $data->user_id =  $request->session()->get('id1');

            $data->save();
        }
    }
}
