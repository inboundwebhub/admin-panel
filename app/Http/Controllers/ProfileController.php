<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Schema;
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
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function profile_form()
    {
        return view("dashboard.profile.form");
    }

    public function form_update()
    {
        $id = collect(request()->segments())->last();

        $leftJoin = ProfilePersonalDetails::leftJoin('profile_general_information', 'profile_general_information.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_current_contact_details', 'profile_current_contact_details.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_permanent_contact_details', 'profile_permanent_contact_details.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_emergency_details', 'profile_emergency_details.user_id', '=', 'profile_personal_details.id', 'left outer')
            ->leftJoin('profile_qualification_details', 'profile_qualification_details.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_company_details', 'profile_company_details.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_work_experience', 'profile_work_experience.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_bank_detail', 'profile_bank_detail.user_id', '=', 'profile_personal_details.id')
            ->leftJoin('profile_file_details', 'profile_file_details.user_id', '=', 'profile_personal_details.id')
            ->where('profile_personal_details.id', $id)
            ->get();

        //  $rightJoin = ProfilePersonalDetails::rightJoin('profile_general_information','profile_general_information.user_id', '=','profile_personal_details.id')
        //         ->rightJoin('profile_current_contact_details','profile_current_contact_details.user_id', '=','profile_personal_details.id' )
        //         ->rightJoin('profile_permanent_contact_details','profile_permanent_contact_details.user_id', '=','profile_personal_details.id' )
        //         ->rightJoin('profile_emergency_details','profile_emergency_details.user_id', '=','profile_personal_details.id', 'left outer' )  
        //         ->rightJoin('profile_qualification_details','profile_qualification_details.user_id', '=','profile_personal_details.id' )  
        //         ->rightJoin('profile_company_details','profile_company_details.user_id', '=','profile_personal_details.id' )  
        //         ->rightJoin('profile_work_experience','profile_work_experience.user_id', '=','profile_personal_details.id' )  
        //         ->rightJoin('profile_bank_detail','profile_bank_detail.user_id', '=','profile_personal_details.id' )  
        //         ->rightJoin('profile_file_details','profile_file_details.user_id', '=','profile_personal_details.id' )  
        //         ->where('profile_personal_details.id', $id)
        //         ->select('profile_personal_details.*','profile_general_information.*', 'profile_current_contact_details.*', 'profile_permanent_contact_details.*',
        //         'profile_emergency_details.*', 'profile_qualification_details.*', 'profile_company_details.*', 'profile_work_experience.*',
        //         'profile_bank_detail.*', 'profile_file_details.*')
        //         ->get();

        return view("dashboard.profile.form_update", ['data' => $leftJoin]);
    }

    public function insert_personal_details(Request $request)
    {
              
        $url_id = $request->url_id;

        if ($url_id == 'insert') {

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

            $file_data = ProfileFileDetail::Where('id', $id)->get();

            $data = ProfilePersonalDetails::Where('id', $id)->get();

            $email = ProfilePersonalDetails::Where('emailid', $request->email)->get();
            $personal_details_id = '';
            foreach ($email as $data) {
                $personal_details_id = $data->id;
            }
            if (count($email) == 0 && empty($id)) {
                if (empty($id) || count($data) == 0) {
                    // echo "helo";  
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
            } elseif ((count($email) == 0 && !empty($id)) || $id == $personal_details_id) {

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
            } else {
                echo "entered email is already exists. please enter other email.";
            }

            // Insert File
            
            $id = $request->session()->get('id10');
            echo $id;
            $session_id1 = $request->session()->get('id1');
            if($session_id1 == '')
            {
                $session_id1 == '';
            }

            $data = ProfileFileDetail::Where('id', $id)->get();
            
            if (empty($id) || count($data) == 0) {
                echo "hello world";
                $data = new ProfileFileDetail;
                $data->profile_pic = $request->file('profile_pic')->store('images');

                $data->attach_file = '';
                $data->attachment_name = '';
                $data->user_id =  $session_id1;

                $data->save();
                $id = $data->id;
                $request->session()->put('id10', $id);

                $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));
 
                //     array_push($array,$id);
                //    print_r($array);
            }

            if (!empty($id) && !empty($data)) {

                $data = ProfileFileDetail::find($id);

                $data->profile_pic = $request->file('profile_pic')->store('images');
                $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));
              
                // $data->attach_file = '';

                $data->save();
            }

        } else {
            $email = ProfilePersonalDetails::Where('emailid', $request->email)->get();
            $personal_details_id = '';
            foreach ($email as $data) {
                $personal_details_id = $data->id;
            }

            if (count($email) == 0 || $url_id == $personal_details_id) {
                $data = ProfilePersonalDetails::find($url_id);
                $data->first_name =  $request->f_name;
                $data->middle_name =  $request->m_name;
                $data->last_name =  $request->l_name;
                $data->gender =  $request->gender;
                $data->emailid =  $request->email;
                $data->password =  $request->password;

                $data->save();
            } else {
                echo "entered email is already exists. please enter other email.";
            }

            // file update 

            $session_id1 = $request->session()->get('id1');
            if($session_id1 == '')
            {
                $session_id1 == '';
            }
          
            $check_data =  ProfileFileDetail::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length == 0) {   
                echo "hello world";
                $data = new ProfileFileDetail;
                $data->profile_pic = $request->file('profile_pic')->store('images');

                $data->attach_file = '';
                $data->attachment_name = '';
                $data->user_id =  $url_id;

                $data->save();
                $id = $data->id;
                $request->session()->put('id10', $id);

                $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));
                
            }
            
            else
            {

                ProfileFileDetail::where('user_id', $url_id)->update(["profile_pic" => $request->file('profile_pic')->store('images') ]);
            
                $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));

            }

        }
    }

    public function insert_general_details(Request $request)
    {
        $url_id = $request->url_id;

        if ($url_id == 'insert') {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileGeneralInformation::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileGeneralInformation::where('user_id', $url_id)->update([
                    'Date_of_birth' => $request->b_date,
                    'Blood_group' => $request->b_group, 'Marital_Status' => $request->m_status, 'Driving_License_number' => $request->dl_number,
                    'Passport_number' => $request->pass_num, 'Bio' => $request->bio
                ]);
            } else {
                echo "hello world";
                $data = new ProfileGeneralInformation;

                $data->Date_of_birth =  $request->b_date;
                $data->Blood_group =  $request->b_group;
                $data->Marital_Status =  $request->m_status;
                $data->Driving_License_number =  $request->dl_number;
                $data->Passport_number =  $request->pass_num;
                $data->Bio =  $request->bio;
                $data->user_id =  $url_id;
                $data->save();
            }
        }
    }



    public function insert_contact_details_current(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileCurrentContact::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileCurrentContact::where('user_id', $url_id)->update([
                    "Current_Address" => $request->c_address,
                    "Current_City" => $request->c_city, 'Current_State' => $request->c_state, "Current_Zipcode" => $request->c_zipcode,
                    "Personal_Contact_number" => $request->c_number, "Local_Contact_number" => $request->l_numbe, "Company_Skypeid" => $request->skypeid
                ]);
            } else {
                echo "hello world";
                $data = new ProfileCurrentContact;

                $data->Current_Address =  $request->c_address;
                $data->Current_City =  $request->c_city;
                $data->Current_State =  $request->c_state;
                $data->Current_Zipcode =  $request->c_zipcode;
                $data->Personal_Contact_number =  $request->c_number;
                $data->Local_Contact_number =  $request->l_numbe;
                $data->Company_Skypeid =  $request->skypeid;
                $data->user_id =  $url_id;

                $data->save();
            }
        }
    }


    public function insert_contact_details_permanent(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
            $id = $request->session()->get('id4');
            // echo $id;

            $data = ProfilePermanentContact::Where('id', $id)->get();
            $email = ProfilePermanentContact::Where('Personal_Emailid', $request->p_emailid)->get();
            $contact_details_id = '';
            foreach ($email as $data) {
                $contact_details_id = $data->id;
            }

            if (count($email) == 0 && empty($id)) {
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
            } elseif ((count($email) == 0 && !empty($id)) || $id == $contact_details_id) {

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
            } else {
                echo "entered email is already exists. please enter other email.";
            }
        } else {
            $check_data =  ProfilePermanentContact::Where('user_id', $url_id)->get();
            $length = count($check_data);

            $email = ProfilePermanentContact::Where('Personal_Emailid', $request->p_emailid)->get();
            $contact_details_id = '';
            foreach ($email as $data) {
                $contact_details_id = $data->user_id;
            }

            if ((count($email) == 0 && $length != 0) || $url_id == $contact_details_id) {

                if ($length != 0) {
                    ProfilePermanentContact::where('user_id', $url_id)->update([
                        "Permanent_Address" =>  $request->p_address,
                        "Permanent_City" => $request->p_city, 'Permanent_State' => $request->p_state, "Permanent_Zipcode" => $request->p_zipcode,
                        "Parents_Contact_number1" => $request->p_number1, "Parents_Contact_number2" => $request->p_number2, "Personal_Emailid" => $request->p_emailid,
                        "Personal_Skypeid" => $request->p_skypeid
                    ]);
                }
            } elseif (count($email) == 0 && $length == 0) {
                if ($length == 0) {
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
                    $data->user_id =  $url_id;

                    $data->save();
                }
            } else {
                echo "entered email is already exists. please enter other email.";
            }
        }
    }


    public function insert_emergency_contact_details(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
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

                $data->save();
            }
        } else {
            $check_data =  ProfileEmergencyContact::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileEmergencyContact::where('user_id', $url_id)->update([
                    "Name" =>  $request->name,
                    "Relation" => $request->relation, 'Contact_number' => $request->number, "Address" => $request->address,
                ]);
            } else {
                echo "hello world";
                $data = new ProfileEmergencyContact;

                $data->Name =  $request->name;
                $data->Relation =  $request->relation;
                $data->Contact_number =  $request->number;
                $data->Address =  $request->address;
                $data->user_id = $url_id;

                $data->save();
            }
        }
    }


    public function insert_qualification_details(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
            echo "hello world";

            $id = $request->session()->get('id6');
            echo $id;

            $data = ProfileQualificationDetails::Where('id', $id)->get();

            if (empty($id) || count($data) == 0) {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileQualificationDetails::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileQualificationDetails::where('user_id', $url_id)->update([
                    "Education_Detail" =>  $request->select,
                    "Degree" => $request->degree, 'University' => $request->university, "Passing_year" => $request->passing_year, "Grade" => $request->grade,
                    "Skills" => $request->tags, "Known_language" => $request->language,
                ]);
            } else {
                echo "hello world";
                $data = new ProfileQualificationDetails;

                $data->Education_Detail =  $request->select;
                $data->Degree =  $request->degree;
                $data->University =  $request->university;
                $data->Passing_year =  $request->passing_year;
                $data->Grade =  $request->grade;
                $data->Skills =  $request->tags;
                $data->Known_language =  $request->language;
                $data->user_id =  $url_id;

                $data->save();
            }
        }
    }

    public function insert_company_details(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileCompanyDetails::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileCompanyDetails::where('user_id', $url_id)->update([
                    "Date_of_joining" =>  $request->joining_date,
                    "Employee_id" => $request->employee_id, 'Department' => $request->department, "Designation" => $request->designation, "Job_Profile" => $request->job_profile,
                    "Role" => $request->employee_role
                ]);
            } else {
                $data = new ProfileCompanyDetails;
                $data->Date_of_joining =  $request->joining_date;
                $data->Employee_id =  $request->employee_id;
                $data->Department =  $request->department;
                $data->Designation =  $request->designation;
                $data->Job_Profile =  $request->job_profile;
                $data->Role =  $request->employee_role;
                $data->user_id =  $url_id;

                $data->save();
            }
        }
    }

    public function insert_work_experiance(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileWorkExperiance::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileWorkExperiance::where('user_id', $url_id)->update([
                    "Duration" =>  $request->duration,
                    "Company_Name" => $request->c_name, 'Company_Number' => $request->c_number, "Company_Address" => $request->c_address
                ]);
            } else {
                echo "hello world";
                $data = new ProfileWorkExperiance;
                $data->Duration =  $request->duration;
                $data->Company_Name =  $request->c_name;
                $data->Company_Number =  $request->c_number;
                $data->Company_Address =  $request->c_address;
                $data->user_id = $url_id;

                $data->save();
            }
        }
    }


    public function insert_bank_details(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {
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


                $data->save();
            }
        } else {
            $check_data =  ProfileBankDetail::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {
                ProfileBankDetail::where('user_id', $url_id)->update([
                    "Bank_Name" =>  $request->bank_name,
                    "Branch_Name" => $request->branch_name, 'Account_number' => $request->account_number
                ]);
            } else {
                echo "hello world";
                $data = new ProfileBankDetail;
                $data->Bank_Name =  $request->bank_name;
                $data->Branch_Name =  $request->branch_name;
                $data->Account_number =  $request->account_number;
                $data->user_id =  $url_id;

                $data->save();
            }
        }
    }


    public function insert_file_details(Request $request)
    {
        $url_id = $request->url_id;
        if ($url_id == 'insert') {

            $id = $request->session()->get('id10');
            echo $id;

            $data = ProfileFileDetail::Where('id', $id)->get();

            if (empty($id) || count($data) == 0) {
                echo "hello world";
                $data = new ProfileFileDetail;
                $data->profile_pic = '';

                $files = [];
                foreach ($request->file('attach_file') as $file) {
                    $file1 = $file->store('images');
                    $file->move(public_path('images'), $file1);
                    array_push($files, $file1);
                }
                $files = implode(',', $files);
                
                $data->attach_file = $files;
                $data->attachment_name = $request->attachment_name;
                $data->user_id =  $request->session()->get('id1');

                $data->save();
                $id = $data->id;
                $request->session()->put('id10', $id);
                //     array_push($array,$id);
                //    print_r($array);
            }

            if (!empty($id) && !empty($data)) {

                $data = ProfileFileDetail::find($id);

                // $data->profile_pic = '';

                // $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));

                $files = [];
                foreach ($request->file('attach_file') as $file) {
                    echo "hii";
                    $file1 = $file->store('images');
                    $file->move(public_path('images'), $file1);
                    array_push($files, $file1);
                }
                $files = implode(',', $files);
                $data->attach_file = $files;
                $data->attachment_name = $request->attachment_name;

                $data->save();
            }
        } else {
            $check_data =  ProfileFileDetail::Where('user_id', $url_id)->get();
            $length = count($check_data);

            if ($length != 0) {


                $files = [];
                foreach ($request->file('attach_file') as $file) {
                    echo "hii";
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file1 = $file->store('images');
                    $file->move(public_path('images'), $file1);
                    array_push($files, $file1);
                }

                $files = implode(',', $files);
              
                ProfileFileDetail::where('user_id', $url_id)->update(["attach_file" => $files,
                "attachment_name" => $request->attachment_name]);
                
                // $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));
            
            } else {
                echo "hello world";

                $data = new ProfileFileDetail;
                $data->profile_pic = '';
                // $request->profile_pic->move(public_path('images'), $request->file('profile_pic')->store('images'));

                $files = [];
                foreach ($request->file('attach_file') as $file) {
                    $file1 = $file->store('images');
                    $file->move(public_path('images'), $file1);
                    array_push($files, $file1);
                }
                $files = implode(',', $files);

                $data->attach_file = $files;
                $data->attachment_name = $request->attachment_name;
                $data->user_id = $url_id;

                $data->save();
            }
        }
    }
}