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
use App\Models\ProfileWorkExperiance;
use App\Models\ProfileBankDetail;
use App\Models\ProfileFileDetail;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   

    public function insert_personal_details(Request $request)   
    {       echo "h";
        
            // $request->session()->forget('id1');
         
            $id = $request->session()->get('id1');

            if(empty($id))
            {
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
            
            
            
            if(!empty($id))
            {
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
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileGeneralInformation;
            
            $data->Date_of_birth =  $request->b_date; 
            $data->Blood_group =  $request->b_group; 
            $data->Marital_Status =  $request->m_status; 
            $data->Driving_License_number =  $request->dl_number; 
            $data->Passport_number =  $request->pass_num; 
            $data->Bio =  $request->bio; 
        
            $data->save();
            $id = $data->id;
            $request->session()->put('id2', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

            $data = ProfileGeneralInformation::find($id);
            $data->Date_of_birth =  $request->b_date; 
            $data->Blood_group =  $request->b_group; 
            $data->Marital_Status =  $request->m_status; 
            $data->Driving_License_number =  $request->dl_number; 
            $data->Passport_number =  $request->pass_num; 
            $data->Bio =  $request->bio; 
        
            $data->save();
        }
           
          
    }



    public function insert_contact_details_current(Request $request)
    {  
      
      echo "hello";
   
        $id = $request->session()->get('id3');
        echo $id;
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileCurrentContact;
            
            $data->Current_Address =  $request->c_address; 
            $data->Current_City =  $request->c_city; 
            $data->Current_State =  $request->c_state; 
            $data->Current_Zipcode =  $request->c_zipcode; 
            $data->Personal_Contact_number =  $request->c_number; 
            $data->Local_Contact_number =  $request->l_numbe; 
            $data->Company_Skypeid =  $request->skypeid; 
        
            $data->save();
            $id = $data->id;
            $request->session()->put('id3', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

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
           
          
    }


    public function insert_contact_details_permanent(Request $request)
    {  
       
        $id = $request->session()->get('id4');
        echo $id;
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfilePermanentContact;
            
            $data->Permanent_Address =  $request->p_address; 
            $data->Permanent_City =  $request->p_city; 
            $data->Permanent_State =  $request->p_state; 
            $data->Permanent_Zipcode =  $request->p_zipcode; 
            $data->Parents_Contact_number1 =  $request->p_number1; 
            $data->Parents_Contact_number2 =  $request->p_number2; 
            $data->Personal_Emailid =  $request->p_emailid; 
            $data->Personal_Skypeid =  $request->p_skypeid; 
        
            $data->save();
            $id = $data->id;
            $request->session()->put('id4', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

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
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileEmergencyContact;
            
            $data->Name =  $request->name; 
            $data->Relation =  $request->relation; 
            $data->Contact_number =  $request->number; 
            $data->Address =  $request->address; 
            
        
            $data->save();
            $id = $data->id;
            $request->session()->put('id5', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

            $data = ProfileEmergencyContact::find($id);
            $data->Name =  $request->name; 
            $data->Relation =  $request->relation; 
            $data->Contact_number =  $request->number; 
            $data->Address =  $request->address; 
           

            $data->save();
        }
           
          
    }


    public function insert_qualification_details(Request $request)
    {  
        echo "hello world";
        
        $id = $request->session()->get('id6');
        echo $id;
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileQualificationDetails;
            
            $data->Education_Detail =  $request->select; 
            $data->Degree =  $request->degree; 
            $data->University =  $request->university; 
            $data->Passing_year =  $request->passing_year; 
            $data->Grade =  $request->grade; 
            $data->Skills =  $request->tags;             
            $data->Known_language =  $request->language; 
        
            $data->save();
            $id = $data->id;
            $request->session()->put('id6', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

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
           
          
    }


    public function insert_work_experiance(Request $request)
    {   
       
        $id = $request->session()->get('id8');
        echo $id;
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileWorkExperiance;            
            $data->Duration =  $request->duration; 
            $data->Company_Name =  $request->c_name; 
            $data->Company_Number =  $request->c_number; 
            $data->Company_Address =  $request->c_address; 
                   
            $data->save();
            $id =  $data->id;
            $request->session()->put('id8', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

            $data = ProfileWorkExperiance::find($id);
            $data->Duration =  $request->duration; 
            $data->Company_Name =  $request->c_name; 
            $data->Company_Number =  $request->c_number; 
            $data->Company_Address =  $request->c_address; 

            $data->save();
        }
           
          
    }


    public function insert_bank_details(Request $request)
    {  
    
        $id = $request->session()->get('id9');
        echo $id;
        
        if(empty($id))
        {    echo "hello world";
            $data = new ProfileBankDetail;            
            $data->Bank_Name =  $request->bank_name; 
            $data->Branch_Name =  $request->branch_name; 
            $data->Account_number =  $request->account_number; 
          
            $data->save();
            $id =  $data->id;
            $request->session()->put('id9', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

            $data = ProfileBankDetail::find($id);
            $data->Bank_Name =  $request->bank_name; 
            $data->Branch_Name =  $request->branch_name; 
            $data->Account_number =  $request->account_number; 

            $data->save();
        }   
           
          
    }


    public function insert_file_details(Request $request)
    {  
     
           
        $id = $request->session()->get('id10');
        echo $id;
        
        if(empty($id))
        {  
              echo "hello world";
            $data = new ProfileFileDetail;            
            $data->profile_pic = $request->file('profile_pic')->store('storage/app/public/images');

            $files = [];
            foreach($request->file('attach_file') as $file){
                $name = time().rand(1,100).'.'.$file->extension();
                $files[] = $file->store('storage/app/public/images');
                
            }
            $files = implode(',', $files);
            $data->attach_file = $files;  
            $data->save();
            $id = $data->id;
            $request->session()->put('id10', $id);  
        //     array_push($array,$id);
        //    print_r($array);
        }
                      
        if(!empty($id))
        {   

            $data = ProfileFileDetail::find($id);
            $data->profile_pic = $request->file('profile_pic')->store('storage/app/public/images');
            $files = [];
            foreach($request->file('attach_file') as $file){
                echo "hii";
                $name = time().rand(1,100).'.'.$file->extension();
                $file = $file->store('storage/app/public/images');
                array_push($files, $file);
            }
            $files = implode(',', $files);
            $data->attach_file = $files;  
            $data->save();
        }
           
          
    }



}
