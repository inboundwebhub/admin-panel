@extends('dashboard.base')



@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{URL::asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


<link rel="stylesheet" href="{{URL::asset('css/fm.tagator.jquery.css')}}">

@endsection

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div class="col-md-6 mb-4">
    <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="messages">1</a></li>
            <li class="nav-item"><a class="nav-link" id="profile_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="messages">2</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">3</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#permanent_details" role="tab" aria-controls="messages">4</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#emergency_details" role="tab" aria-controls="messages">5</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#qualification_details" role="tab" aria-controls="messages">6</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#company_details" role="tab" aria-controls="messages">7</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#work_experience" role="tab" aria-controls="messages">8</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bank_detail" role="tab" aria-controls="messages">9</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#attachment" role="tab" aria-controls="messages">10</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">

                <form id="form1" name="form1">
                    <!--  personal detail form [1]   -->

                    <div class="card">
                        <div class="card-header"><strong>Personal Detail</strong> </div>

                        <div class="form-group">
                            <label for="f_name">First name</label>
                            <input class="form-control" name='f_name' id="f_name" type="text" placeholder="Enter your first name">
                        </div>

                        <div class="form-group">
                            <label for="m_name">Middle name</label>
                            <input class="form-control" name='m_name' id="m_name" type="text" placeholder="Enter your middle name">
                        </div>

                        <div class="form-group">
                            <label for="l_name">Last name</label>
                            <input class="form-control" name='l_name' id="l_name" type="text" placeholder="Enter your first name">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="inline-radio1" type="radio" value="male" name="gender">
                                    <label class="form-check-label" for="inline-radio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="inline-radio2" type="radio" value="female" name="gender">
                                    <label class="form-check-label" for="inline-radio2">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Emailid</label>
                            <input class="form-control" name='email' id="email" type="text" placeholder="Enter your email id">
                            <div></div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control validate[required,minSize[8]]" name='password' id="password" type="password" placeholder="Enter your password">
                        </div>

                        <div class="form-group">
                            <label for="profile_pic">Profile picture</label>
                            <div class="controls">
                                <img src="http://hrms.abhicenation.com/uploads/system_users/thumb/me.jpg">

                                <input type="file" name="profile_pic" id="profile_pic" class="input-xlarge ui-wizard-content ">
                            </div>

                            <!-- <div class="error"> </div> -->

                        </div>



                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back1">
                            <input type="button" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next1">
                        </div>

                    </div>

                </form>

            </div>

            <div class="tab-pane" id="profile" role="tabpanel">

                <form id="form2">

                    <!-- General information form [2]   -->
                    <div class="card">
                        <div class="card-header"><strong>General information</strong></div>

                        <div class="form-group">
                            <label for="company">Date of birth</label>
                            <input class="form-control" name='b_date' id="b_date" type="text">
                        </div>

                        <div class="form-group">
                            <label for="company">Blood group</label>
                            <input class="form-control" name='b_group' id="b_group" type="text">
                        </div>

                        <div class="form-group">
                            <label for="company">Marital Status</label>
                            <select id="select">
                                <option class="form-control" name='m_status' id="unmarried" value='unmarried'>unmarried
                                </option>
                                <option class="form-control" name='m_status' id="married" value='married'>married
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dl_number">Driving License number</label>
                            <input class="form-control" name='dl_number' id="dl_number" type="text">
                        </div>

                        <div class="form-group">
                            <label for="pass_num">Passport number</label>
                            <input class="form-control" name='pass_num' id="pass_num" type="text">
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" name='bio' id="bio" rows="4" cols="50" placeholder="About yourself..."></textarea>
                        </div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back2">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button alert" value="Next" id="next2">
                        </div>

                    </div>
                </form>

            </div>

            <div class="tab-pane" id="messages" role="tabpanel">

                <form id="form3">

                    <!--Contact details current form [3]    -->
                    <div class="card">
                        <div class="card-header"><strong>Contact Details (current)</strong></div>

                        <div class="form-group">
                            <label for="c_address">Current Address</label>
                            <textarea class="form-control" name='c_address' id="c_address" rows="4" cols="50" placeholder="provide your current address information here..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="c_city">Current City</label>
                            <input class="form-control" name='c_city' id="c_city" type="text">
                        </div>

                        <div class="form-group">
                            <label for="c_state">Current State</label>
                            <input class="form-control" name='c_state' id="c_state" type="text">
                        </div>

                        <div class="form-group">
                            <label for="c_zipcode">Current Zipcode</label>
                            <input class="form-control" name='c_zipcode' id="c_zipcode" type="text">
                        </div>

                        <div class="form-group">
                            <label for="c_number">Personal Contact number</label>
                            <input class="form-control" name='c_number' id="c_number" type="text" placeholder="personal number">
                        </div>

                        <div class="form-group">
                            <label for="l_numbe">Local Contact number</label>
                            <input class="form-control" name='l_number' id="l_numbe" type="text" placeholder="local contact number  ">
                        </div>

                        <div class="form-group">
                            <label for="skypeid">Company Skypeid</label>
                            <input class="form-control" name='skypeid' id="skypeid" type="text">
                        </div>

                        <div>
                            <input type="checkbox" name='repopulate_value1' id="repopulate_value1"> click on the checkbox if you want repopulate your current contact details
                        </div> <br>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back3">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button alert" value="Next" id="next3">
                        </div>


                    </div>
                </form>
            </div>

            <div class="tab-pane" id="permanent_details" role="tabpanel">

                <form id="form4">
                    @csrf
                    <!--Contact details permanent form [4]    -->
                    <div class="card">
                        <div class="card-header"><strong>Contact Details (permanent)</strong></div>

                        <div class="form-group">
                            <label for="p_address">Permanent Address</label>
                            <textarea class="form-control" name='p_address' id="p_address" rows="4" cols="50" placeholder="provide your permanent address information here..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="p_city">Permanent City</label>
                            <input class="form-control" name='p_city' id="p_city" type="text">
                        </div>

                        <div class="form-group">
                            <label for="p_state">Permanent State</label>
                            <input class="form-control" name='p_state' id="p_state" type="text">
                        </div>

                        <div class="form-group">
                            <label for="p_zipcode">Permanent Zipcode</label>
                            <input class="form-control" name='p_zipcode' id="p_zipcode" type="text">
                        </div>

                        <div class="form-group">
                            <label for="p_number1">Parents Contact number1</label>
                            <input class="form-control" name='p_number1' id="p_number1" type="text" placeholder="personal number">
                        </div>

                        <div class="form-group">
                            <label for="p_number2">Parents Contact number2</label>
                            <input class="form-control" name='p_number2' id="p_number2" type="text" placeholder="local contact number  ">
                        </div>

                        <div class="form-group">
                            <label for="p_emailid">Personal Emailid</label>
                            <input class="form-control" name='p_emailid' id="p_emailid" type="text">
                        </div>

                        <div class="form-group">
                            <label for="p_skypeid">Personal Skypeid</label>
                            <input class="form-control" name='p_skypeid' id="p_skypeid" type="text">
                        </div>

                        <div>
                            <input type="checkbox" name='repopulate_value2' id="repopulate_value2"> click on the checkbox if you want repopulate your permanent contact details
                        </div> <br>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back4">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button alert" value="Next" id="next4">
                        </div>

                    </div>
                </form>
            </div>

            <div class="tab-pane" id="emergency_details" role="tabpanel">

                <form id="form5">
                    <!--Emergency Contact Detail form [5]    -->

                    @csrf
                    <div class="card">
                        <div class="card-header"><strong>Emergency Contact Detail</strong></div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" name='name' id="name" type="text" placeholder="name of person">
                        </div>

                        <div class="form-group">
                            <label for="relation">Relation</label>
                            <input class="form-control" name='relation' id="relation" type="text" placeholder="relation with person">
                        </div>

                        <div class="form-group">
                            <label for="number">Contact number</label>
                            <input class="form-control" name='number' id="number" type="text" placeholder="contact number">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name='address' id="address" rows="4" cols="50"></textarea>
                        </div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back5">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next5">
                        </div>

                    </div>
                </form>
            </div>

            <div class="tab-pane" id="qualification_details" role="tabpanel">

                <form id="form6">
                    <!--Qualification Details form [6]    -->

                    @csrf <div class="card">
                        <div class="card-header"><strong>Qualification Details</strong></div>


                        <div class="details">

                            <div class="form-group">
                                <label for="company">Education Detail</label>
                                <select id="select_education" name="select_education" class="select_education">
                                    <option class="form-control" name='education[]' id="10th" value='ten'>10th</option>
                                    <option class="form-control" name='education[]' id="12th" value='twelve'>12th</option>
                                    <option class="form-control" name='education[]' id="deploma" value='deploma'>Deploma
                                    </option>
                                    <option class="form-control" name='education[]' id="graduation" value='graduation' selected>Graduation</option>
                                    <option class="form-control" name='education[]' id="post_graduation" value='post_graduation'>Post Graduation</option>

                                </select>
                            </div>

                            <div></div>

                            <div class="form-group">
                                <label for="degree">Degree</label>
                                <input class="form-control degree" name='degree[]' id="degree" type="text">
                            </div>

                            <div class="form-group">
                                <label for="university">University</label>
                                <input class="form-control university" name='university[]' id="university" type="text">
                            </div>

                            <div class="form-group">
                                <label for="passing_year">Passing_year</label>
                                <input class="form-control passing_year" name='passing_year[]' id="passing_year" type="text">
                            </div>

                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <input class="form-control grade" name='grade[]' id="grade" type="text">
                            </div>


                        </div>

                        <div class="append_details">

                        </div>

                        <div class="form-group">
                            <a class="add_more"><i class="icon-plus"></i>add more</a>
                        </div>

                        <div class="form-group">
                            <label for="">Skills</label>
                            <!-- <input type="text" class="form-control typeahead" name="skill" id="tags-input" /> -->
                            <input id="example" name="example" value="jQuery,Script,Net" placeholder="Please input some tags">
                        </div>


                        <div class="form-group error"></div>

                        <div class="form-group">
                            <label for="">Known languages: </label>
                            Gujarati <input type="checkbox" name="language[]" class="checkbox" value="gujarati">
                            Hindi <input type="checkbox" name="language[]" class="checkbox" value="hindi">
                            English <input type="checkbox" name="language[]" class="checkbox" value="english">

                        </div>

                        <div class="form-group error"></div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back6">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next6">
                        </div>



                    </div>
                </form>
            </div>

            <div class="tab-pane" id="company_details" role="tabpanel">

                <form id="form7">
                    <!--Company Detail form [7]    -->

                    @csrf <div class="card">
                        <div class="card-header"><strong>Company Detail</strong></div>

                        <div class="form-group">
                            <label for="joining_date">Date of joining</label>
                            <input class="form-control" name='joining_date' id="joining_date" value="10/24/1984">
                        </div>

                        <div class="form-group">
                            <label for="employee_id">Employee id</label>
                            <input class="form-control" name='employee_id' id="employee_id" type="text">
                        </div>

                        <div class="form-group">
                            <label for="department">Department</label>
                            <input class="form-control" name='department' id="department" type="text">
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input class="form-control" name='designation' id="designation" type="text">

                        </div>

                        <div class="form-group">
                            <label for="job_profile">Job Profile</label>
                            <input class="form-control" name='job_profile' id="job_profile" type="text">
                        </div>

                        <div class="form-group">
                            <label for="employee_role">Role</label>
                            <input class="form-control" name='employee_role' id="employee_role" type="text">

                        </div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back7">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next7">
                        </div>

                    </div>
                </form>
            </div>

            <div class="tab-pane" id="work_experience" role="tabpanel">

                <form id="form8">
                    <!--Work Experience form [8]    -->

                    @csrf <div class="card">
                        <div class="card-header"><strong>Work Experience</strong></div>

                        <div class="experiance_details">

                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input class="form-control duration" name='duration[]' id="duration" type="text">
                            </div>

                            <div class="form-group">
                                <label for="c_name">Company Name</label>
                                <input class="form-control" name='c_name[]' id="c_name" type="text" placeholder="previous company name">
                            </div>

                            <div class="form-group">
                                <label for="company_number">Company Number</label>
                                <input class="form-control" name="company_number[]" id="company_number" type="text" placeholder="previous company number">
                            </div>

                            <div class="form-group">
                                <label for="company_address">Company Address</label>
                                <textarea class="form-control company_address" name='company_address[]' id="company_address" rows="4" cols="50" placeholder="provide your previous company address information here..."></textarea>
                            </div>
                        </div>

                        <div class="experiance_add_details">

                        </div>

                        <div class="form-group">
                            <a class="experience_add_more"><i class="icon-plus"></i>add more</a>
                        </div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back8">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next8">
                        </div>

                    </div>
                </form>
            </div>

            <div class="tab-pane" id="bank_detail" role="tabpanel">

                <form id="form9">
                    <!--Bank Detail form [9]    -->
                    @csrf
                    <div class="card">
                        <div class="card-header"><strong>Bank Detail</strong></div>

                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input class="form-control" name='bank_name' id="bank_name" type="text">
                        </div>

                        <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input class="form-control" name='branch_name' id="branch_name" type="text">
                        </div>

                        <div class="form-group">
                            <label for="account_number">Account number</label>
                            <input class="form-control" name='account_number' id="account_number" type="text">
                        </div>

                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back9">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Next" id="next9">
                        </div>

                    </div>
                </form>
            </div>

            <div class="tab-pane" id="attachment" role="tabpanel">

                <form id="form10" enctype="multipart/form-data">
                    <!--Attachment form [10]    -->

                    @csrf <div class="card">
                        <div class="card-header"><strong>Attachment</strong></div>


                        <div class="form-group">
                            <label for="company">Attachments</label>

                            <div class="attachment_details">
                              
                                   
                                        <select id=" attach_select" class='attach_select'>
                                            <option selected>--Select--</option>
                                            <option class="form-control" name='Pancard' id="Pancard" value='Pancard'>Pancard
                                            </option>
                                            <option class="form-control" name='Licence[]' id="Licence" value='Licence'>Licence
                                            </option>
                                            <option class="form-control" name='Adharcard[]' id="Adharcard" value='Adharcard'>
                                                Adharcard</option>
                                            <option class="form-control" name='Passport[]' id="Passport" value='Passport'>Passport
                                            </option>
                                            <option class="form-control" name='Votercard[]' id="Votercard" value='Votercard'>
                                                Votercard</option>

                                        </select>
                                                                  
                                        <input class="" type="file" name="attach_file[]" id="attach_file">
                                                             

                      
                            </div>




                            <div class="append_attachment">`

                            </div>

                            <!-- <div class="form-group"></div> -->

                            <div class="form-group">
                                <a class="attachment_add_more"><i class="icon-plus"></i>add more</a>
                            </div>
                        </div>


                        <div class="form-actions">
                            <input type="reset" class="btn ui-wizard-content ui-formwizard-button back" value="Back" id="back10">
                            <input type="submit" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Submit" id="next10">
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
</div>



<!-- get personal detail page session id1  -->
@php
$id = session()->get('id1');
@endphp

<!-- Get last part of url -->
<input type="text" id="url_id" value="{{ collect(request()->segments())->last() }}" hidden>


@endsection

@section('javascript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

<!-- jquery validation plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


<script src="{{asset('js/profile_database.js')}}"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{URL::asset('js/profile.js')}}"></script>

<script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="{{asset('js/fm.tagator.jquery.js')}}"></script>




@endsection