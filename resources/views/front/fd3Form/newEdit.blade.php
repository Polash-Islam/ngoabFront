@extends('front.master.master')

@section('title')
{{ trans('fd9.fd3')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(empty(Auth::user()->image))
                                {{-- <img src="{{ asset('/') }}public/demo_315x315.jpg" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @else
                                     {{-- <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a style="display: none;">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.view')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
                            </a>
                        </div>
                        {{-- <div class="profile_link_box">
                            <a href="{{ route('duplicateCertificate.index') }}">
                                <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
                            </a>
                        </div> --}}
                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৩</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৩ ফরম</h3>
                                        <h4>পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd3Form.update',$fd3FormList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')

                                        <!-- new code start --->

                                        <table class="table table-bordered" style="width:100%">

                                            <tr>
                                                <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                <th style="text-align: center; width: 25%">বিবরণ</th>
                                                <th style="text-align: center;">তথ্যাদি</th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;" colspan="2">(০১)</th>
                                                <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                <th style="text-align: center;">(০৩)</th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;" colspan="2">১.</th>
                                                <td style="">সংস্থার নাম, ঠিকানা (টেলিফোন, ইমেইল ও ওয়েবসাইটসহ) <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">
                                                    <div class="row">



                                                        <div class="mb-3 col-lg-12">



                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                    <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                                    placeholder="">

                                                    @else


                                                    <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                                    placeholder="">


                                                    @endif



                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" placeholder="সংস্থার ঠিকানা" required name="ngo_address" class="form-control" value="{{ $fd3FormList->ngo_address }}" id=""
                                                                   >
                                                        </div>

                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" placeholder="টেলিফোন" required name="ngo_telephone_number" value="{{ $fd3FormList->ngo_telephone }}" class="form-control" id=""
                                                                   >
                                                        </div>

                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="ইমেইল ঠিকানা" type="text" required name="ngo_email" class="form-control" id=""
                                                                   value="{{ $fd3FormList->ngo_email }}">
                                                        </div>


                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="ওয়েবসাইট" type="text" required value="{{ $fd3FormList->ngo_website }}" name="ngo_website" class="form-control" id=""
                                                                   >
                                                        </div>


                                                    </div>
                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;" colspan="2">২.</th>
                                                <td style="">নিবন্ধন নম্বর ও তারিখ <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required name="ngo_registration_number" value="{{ $fd3FormList->ngo_registration_number }}" class="form-control" id=""
                                                               placeholder="">
                                                    </div>


                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required name="ngo_registration_date" value="{{ $fd3FormList->ngo_registration_date }}" class="form-control datepickerOne" id=""
                                                               placeholder="">
                                                    </div>

                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;" colspan="2" rowspan="2">৩.</th>
                                                <td style="">প্রকল্পের নাম ও মেয়াদ <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <div class="mb-3 col-lg-12">

                                                        <input name="ngo_prokolpo_name" type="text" value="{{ $fd3FormList->ngo_prokolpo_name }}" class="form-control" id="ngo_prokolpo_name"
                                                               placeholder="প্রকল্পের নাম" required>
                                                    </div>

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required name="ngo_prokolpo_duration" value="{{ $fd3FormList->ngo_prokolpo_duration }}" class="form-control" id="" placeholder="প্রকল্পের মেয়াদ">
                                                    </div>

                                                </th>

                                            </tr>
                                            <tr>
                                                <td>প্রকল্পের ধরণ <span style="color:red;">*</span></td>
                                                <td>

                                                    <?php
                                                            $subjectIdList  = explode(",",$fd3FormList->subject_id);

                                                            ?>
                                                                    <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                                                                           placeholder="">
                                                                           <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                                                           @foreach($projectSubjectList as $projectSubjectLists)
                                                                           <option value="{{ $projectSubjectLists->id }}" {{ (in_array($projectSubjectLists->id,$subjectIdList)) ? 'selected' : '' }}>{{ $projectSubjectLists->name }}</option>
                                                                           @endforeach
                                                                    </select>



                                                </td>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;" colspan="2">৪.</th>
                                                <td style="">প্রকল্প অনুমোদনপত্র ও অর্থছাড়পত্রের স্মারক নম্বর ও তারিখ <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required value="{{ $fd3FormList->project_approval_exemption_letter_memo_number }}" name="project_approval_exemption_letter_memo_number" class="form-control" id=""
                                                               placeholder="প্রকল্প অনুমোদনপত্রের স্মারক নম্বর">
                                                    </div>

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required value="{{ $fd3FormList->project_approval_letter_memo_number }}" name="project_approval_letter_memo_number" class="form-control" id=""
                                                               placeholder="প্রকল্প অর্থছাড়পত্রের স্মারক নম্বর">
                                                    </div>


                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required value="{{ $fd3FormList->project_approval_exemption_letter_date }}" name="project_approval_exemption_letter_date" class="form-control datepickerOne" id=""
                                                               placeholder="প্রকল্প অনুমোদনপত্রের তারিখ">
                                                    </div>

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" required value="{{ $fd3FormList->project_approval_letter_date }}" name="project_approval_letter_date" class="form-control datepickerOne" id=""
                                                               placeholder="প্রকল্প অর্থছাড়পত্রের তারিখ">
                                                    </div>

                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;" colspan="2">৫.</th>
                                                <td style="">পূর্ববর্তী  বছরে অর্থছাড়ের পরিমান<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <input type="text" required value="{{ $fd3FormList->exemption_amount_in_previous_year }}" name="exemption_amount_in_previous_year" class="form-control" id=""
                                                    placeholder="পূর্ববর্তী  বছরে অর্থছাড়ের পরিমান">

                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;" colspan="2">৬.</th>
                                                <td style="">পূর্ববর্তী বছরে দাতা সংস্থা হতে গৃহীত অর্থের পরিমান<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <input type="text" required value="{{ $fd3FormList->money_received_in_the_previous_year }}" name="money_received_in_the_previous_year" class="form-control" id=""
                                                    placeholder="পূর্ববর্তী বছরে দাতা সংস্থা হতে গৃহীত অর্থের পরিমান">

                                                </th>

                                            </tr>
                                          <!-- step one start  -->



                                            <!-- step two strat --->

                                            <tr>
                                                <th style="text-align: center;" rowspan="6">৭.</th>

                                                <td style="font-weight:bold;" colspan="2">অর্থগ্রহনের বিস্তারিত বিবরণ</td>
                                                <td></td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ক.</td>
                                                <td> অর্থগ্রহনের তারিখ <span style="color:red;">* </span></td>
                                                <td>

                                                        <input type="text" value="{{ $fd3FormList->date_of_payment }}" required name="date_of_payment" class="form-control datepickerOne" id=""
                                                               placeholder="অর্থগ্রহনের তারিখ">




                                                </td>

                                            </tr>
                                            <tr>

                                                <td style="text-align: center;">খ.</td>
                                                <td>বৈদেশিক অনুদানের ধরণ (এককালীন/বহুবর্ষী) <span style="color:red;">*</span> </td>
                                                <td>


                                                        <select class="form-control" name="type_of_foreign_grant" id="" required>
                                                            <option value="এককালীন" {{ $fd3FormList->type_of_foreign_grant == 'এককালীন' }}>এককালীন</option>
                                                            <option value="বহুবর্ষী" {{ $fd3FormList->type_of_foreign_grant == 'বহুবর্ষী' }}>বহুবর্ষী</option>
                                                        </select>




                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">গ.</td>
                                                <td>বৈদেশিক অনুদানের পরিমান (বৈদেশিক মুদ্রা, দেশীয় মুদ্রা) <span style="color:red;">*</span> </td>
                                                <td>


                                                        <input type="text" required value="{{ $fd3FormList->foreign_grant_amount }}" name="foreign_grant_amount" class="form-control" id=""
                                                               placeholder="বৈদেশিক অনুদানের পরিমান (বৈদেশিক মুদ্রা) ">


                                                        <input type="text" required value="{{ $fd3FormList->local_grant_amount }}" name="local_grant_amount" class="form-control mt-3" id=""
                                                               placeholder="বৈদেশিক অনুদানের পরিমান (দেশীয় মুদ্রা) ">



                                            </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঘ.</td>
                                                <td colspan="2">যদি সামগ্রী হয় তবে সামগ্রীর বিবরণ ও মূল্য (দেশীয় মুদ্রায়)<span style="color:red;">*</span> </td>


                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <textarea required name="purpose_of_donation" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->purpose_of_donation }}</textarea>
                                                    <input type="text" value="{{ $fd3FormList->description_and_price_of_goods }}" name="description_and_price_of_goods" class="form-control mt-3" id=""
                                                    placeholder="যদি সামগ্রী হয় তবে সামগ্রীর মূল্য (দেশীয় মুদ্রায়)">
                                                </td>

                                            </tr>




                                            <!-- step two end --->
                                              <!-- step four start --->

                                              <tr>
                                                <th style="text-align: center;" rowspan="20">৮.</th>

                                                <th style="" colspan="3">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ</th>

                                            </tr>



                                            <tr >

                                                <td style="text-align: center;">অ.</td>
                                                <th>ব্যক্তির ক্ষেত্রে</th>
                                                <td>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ক.</td>
                                                <td>পূর্ণ নাম <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" name="foreigner_donor_full_name" value="{{ $fd3FormList->foreigner_donor_full_name }}" class="form-control" id=""
                                                       placeholder="পূর্ণ নাম">

                                                </td>

                                            </tr>


                                            <tr>

                                                <td style="text-align: center;">খ.</td>
                                                <td>পেশা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->foreigner_donor_occupation }}" name="foreigner_donor_occupation" class="form-control" id=""
                                                    placeholder="পেশা">

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">গ.</td>
                                                <td>যোগাযোগের ঠিকানা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->foreigner_donor_address }}" name="foreigner_donor_address" class="form-control" id=""
                                                       placeholder="যোগাযোগের ঠিকানা">

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঘ.</td>
                                                <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর <span style="color:red;">* </span></td>
                                                <td>

                                                        <input type="text" value="{{ $fd3FormList->foreigner_donor_telephone_number }}" name="foreigner_donor_telephone_number" class="form-control mt-2" id=""
                                                               placeholder="টেলিফোন">


                                                        <input type="text" value="{{ $fd3FormList->foreigner_donor_fax }}" name="foreigner_donor_fax" class="form-control mt-2" id=""
                                                               placeholder="ফ্যাক্স">

                                                        <input type="text" value="{{ $fd3FormList->foreigner_donor_email }}" name="foreigner_donor_email" class="form-control mt-2" id=""
                                                               placeholder="ইমেইল নম্বর">


                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঙ.</td>
                                                <td>জাতীয়তা/নাগরিকত্ব <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->foreigner_donor_nationality }}" name="foreigner_donor_nationality" class="form-control" id=""
                                                    placeholder="জাতীয়তা/নাগরিকত্ব">

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">চ.</td>
                                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                                    United Nations Security Council’s Resolution (UNSCR)
                                                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->foreigner_donor_is_verified }}" name="foreigner_donor_is_verified" class="form-control" id=""
                                                       placeholder="প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা">

                                                </td>

                                            </tr>

                                            <tr>



                                                <td style="text-align: center;">ছ.</td>
                                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->foreigner_donor_is_affiliatedrict }}" name="foreigner_donor_is_affiliatedrict" class="form-control" id=""
                                                    placeholder="উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা">

                                                </td>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;"> আ.</th>
                                            <th colspan="2">দাতা যদি কোন সংস্থা /প্রতিষ্ঠান /সংগঠন /ফাউন্ডেশন /ট্রেড  ইউনিয়ন হয় </th>


                                        </tr>

<tr>

                                                <td style="text-align: center;">ক.</td>
                                                <td>সংস্থার নাম <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->organization_name }}" name="organization_name" class="form-control" id=""
                                                    placeholder="সংস্থার নাম">

                                                </td>

                                            </tr>


                                            <tr>

                                                <td style="text-align: center;">খ.</td>
                                                <td>অফিস/ সংস্থার ঠিকানা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->organization_address }}" name="organization_address" class="form-control" id=""
                                                    placeholder="অফিস/ সংস্থার ঠিকানা">

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">গ.</td>
                                                <td>টেলিফোন, ফ্যাক্স নম্বর <span style="color:red;">* </span></td>
                                                <td>

                                                        <input type="text" value="{{ $fd3FormList->organization_telephone_number }}" name="organization_telephone_number" class="form-control mt-2" id=""
                                                               placeholder="টেলিফোন">

                                                        <input type="text" value="{{ $fd3FormList->organization_fax }}" name="organization_fax" class="form-control mt-2" id=""
                                                               placeholder="ফ্যাক্স নম্বর">


                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঘ.</td>
                                                <td>ই-মেইল ও ওয়েবসাইট <span style="color:red;">* </span></td>
                                                <td>


                                                        <input type="text" value="{{ $fd3FormList->organization_email }}" name="organization_email" class="form-control mt-2" id=""
                                                               placeholder="ই-মেইল">

                                                        <input type="text" value="{{ $fd3FormList->organization_website }}" name="organization_website" class="form-control mt-2" id=""
                                                               placeholder="ওয়েবসাইট">



                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঙ.</td>
                                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                                    United Nations Security Council’s Resolution (UNSCR)
                                                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->organization_is_verified }}" name="organization_is_verified" class="form-control" id=""
                                                       placeholder="প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা">

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">চ.</td>
                                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা <span style="color:red;">* </span></td>
                                                <td>
                                                    <input type="text" value="{{ $fd3FormList->relation_with_donor }}" name="relation_with_donor" class="form-control" id=""
                                                       placeholder="উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা">

                                                </td>

                                            </tr>

                                            <tr>



                                                <td style="text-align: center;">ছ.</td>
                                                <td colspan="2">

                                                  <span style="font-weight:bold;">সংস্থার প্রধান নির্বাহী কর্মকর্তাসহ উর্দ্ধতন ০৩(তিন ) জন কর্মকর্তার বিবরণ (নাম, পদবি, টেলিফোন, মোবাইল ও ইমেইল নম্বরসহ )</span>   <span style="color:red;">* </span>



                                                  <div class="d-flex justify-content-between ">
                                                    <div class="p-2">


                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalOneNew" >
                                                             যুক্ত করুন
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="table-responsive mt-2" id="exampleModalNewData">


                                                   @include('front.fd3Form._partial.fd3EmployeeTable')

                                                </div>



                                                </td>


                                            </tr>


                                    <tr>
                                        <td style="text-align: center;">জ.</td>
                                            <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি <span style="color:red;">* </span></td>
                                            <td>

                                                    <input type="text" value="{{ $fd3FormList->organization_name_of_executive_responsible_for_bd }}" name="organization_name_of_executive_responsible_for_bd" class="form-control" id=""
                                                           placeholder="বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম">


                                                    <input type="text" value="{{ $fd3FormList->organization_name_of_executive_responsible_for_bd_designation }}" name="organization_name_of_executive_responsible_for_bd_designation" class="form-control mt-3" id=""
                                                           placeholder="বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর পদবি">


                                            </td>

                                        </tr>


                                        <tr>
                                            <td style="text-align: center;">ঝ.</td>
                                                <td>সংস্থার উদ্দেশ্যসমূহ <span style="color:red;">* </span></td>
                                                <td>

                                                    <textarea name="objectives_of_the_organization" class="form-control summernote" id=""
                                                    placeholder="সংস্থার উদ্দেশ্যসমূহ">{{ $fd3FormList->objectives_of_the_organization }}</textarea>


                                                </td>

                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ঞ.</td>
                                                <td>আবেদনকারী এনজিও ও দাতা  সংস্থার মধ্যে যোগাযোগ মাধ্যম<span style="color:red;">* </span></td>
                                                <td>

                                                    <input type="text" value="{{ $fd3FormList->communication_between_NGO_and_donor }}" name="communication_between_NGO_and_donor" class="form-control" id=""
                                                           placeholder="আবেদনকারী এনজিও ও দাতা  সংস্থার মধ্যে যোগাযোগ মাধ্যম">

                                                </td>

                                            </tr>
                                            <!-- steap four end -->

                                            <tr>
                                                <th style="text-align: center;" rowspan="3">৯.</th>
                                                <td></td>
                                                <td style="font-weight:bold;" colspan="2">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী</td>


                                            </tr>

                                            <tr>

                                                <td style="text-align: center;">ক.</td>
                                                <td>ব্যাংকের নাম</td>
                                                <td>
                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" value="{{ $fd3FormList->bank_name }}" name="bank_name" class="form-control" id=""
                                                               placeholder="নাম">
                                                    </div>

                                                </td>

                                            </tr>
                                            <tr>

                                                <td style="text-align: center;">খ.</td>
                                                <td>ঠিকানা, হিসাব নম্বর ও হিসাবের ধরণ</td>
                                                <td>



                                                        <input type="text" value="{{ $fd3FormList->bank_address }}" name="bank_address" class="form-control" id=""
                                                               placeholder="ঠিকানা">


                                                    <input type="text" value="{{ $fd3FormList->bank_account_number }}" name="bank_account_number" class="form-control mt-2" id=""
                                                    placeholder="হিসাব নম্বর">

                                                    <input type="text" value="{{ $fd3FormList->bank_account_name }}" name="bank_account_name" class="form-control mt-2" id=""
                                                    placeholder="হিসাবের ধরণ">

                                                </td>

                                            </tr>



                                            <!-- step three start -->

                                            <tr>
                                                <th style="text-align: center;" rowspan="11">১০.</th>
                                                <td style="font-weight:bold;" colspan="3">গৃহীত অর্থ ব্যয়ের বিস্তারিত বিবরণ<span style="color:red;">*</span></td>


                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">ক.</td>
                                                <td colspan="2">বৈদেশিক অনুদান মাদার একাউন্ট হতে প্রকল্প একাউন্টে স্থানান্তর করা হয়েছে কিনা ;হলে প্রকল্প একাউন্টের বিবরণ <span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <textarea required name="project_account_details" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->project_account_details }}</textarea>

                                                    <input type="file" accept=".pdf" name="project_account_file" class="form-control mt-3" id=""
                                                       placeholder="পূর্ণ নাম">

                                                       @if(empty($fd3FormList->project_account_file))

                                                       @else

                                                       <?php

                                                       $file_path = url($fd3FormList->project_account_file);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                       @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">খ.</td>
                                                <td colspan="2"> যে উদ্দেশ্যে অর্থ ব্যয় করা হয়েছে তার বিস্তারিত বিবরণ <span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <textarea required name="purpose_details" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->purpose_details }}</textarea>

                                                    <input type="file" accept=".pdf" name="purpose_details_file" class="form-control mt-3" id=""
                                                       placeholder="পূর্ণ নাম">

                                                       @if(empty($fd3FormList->purpose_details_file))

                                                       @else

                                                       <?php

                                                       $file_path = url($fd3FormList->purpose_details_file);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                       @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">গ.</td>
                                                <td colspan="2"> অনুমোদিত অর্থের বিপরীতে গৃহীত ও ব্যয়িত অর্থের বিবরণ <span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <textarea required name="money_received_details" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->money_received_details }}</textarea>

                                                    <input type="file" accept=".pdf" name="money_received_details_file" class="form-control mt-3" id=""
                                                       placeholder="পূর্ণ নাম">

                                                       @if(empty($fd3FormList->money_received_details_file))

                                                       @else

                                                       <?php

                                                       $file_path = url($fd3FormList->money_received_details_file);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                       @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="text-align: center;">ঘ.</td>
                                                <td colspan="2"> যে পদ্ধতি ব্যবহার করা হয়েছে  তার সম্পূর্ণ বিবরণ <span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <textarea required name="method_details" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->method_details }}</textarea>

                                                    <input type="file" accept=".pdf" name="method_details_file" class="form-control mt-3" id=""
                                                       placeholder="পূর্ণ নাম">

                                                       @if(empty($fd3FormList->method_details_file))

                                                       @else

                                                       <?php

                                                       $file_path = url($fd3FormList->method_details_file);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                       @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="text-align: center;">ঙ.</td>
                                                <td colspan="2">প্রকল্প বাস্তবায়নে জেলা/উপজেলা প্রশানসনকে সম্পৃক্ত করা হয়েছে কিনা<span class="text-danger">*</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3"> <input type="text" value="{{ $fd3FormList->administration_involved }}" name="administration_involved" class="form-control" id=""
                                                    placeholder="প্রকল্প বাস্তবায়নে জেলা/উপজেলা প্রশানসনকে সম্পৃক্ত করা হয়েছে কিনা"></td>
                                            </tr>

                                          <!-- step one start  -->

                                            <tr>
                                                <th style="text-align: center;" rowspan="2">১১.</th>

                                                <td style="font-weight:bold;" colspan="3">সরঞ্জামাদি তালিকা (যানবাহনসহ) এবং উক্ত প্রকল্পের অধীনে এনজিও'র অর্জিত সম্পদের বিবরণ <span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>


                                            </tr>
                                            <tr>

                                                {{-- <td style="text-align: center;">ক.</td> --}}
                                                <td colspan="3" >

                                                    <textarea required name="equipment_details" class="form-control summernote" id=""
                                                    placeholder="বিস্তারিত বিবরণ">{{ $fd3FormList->equipment_details }}</textarea>

                                                    <input type="file" name="equipment_details_file" accept=".pdf" class="form-control mt-3" id=""
                                                       placeholder="পূর্ণ নাম">

                                                       @if(empty($fd3FormList->equipment_details_file))

                                                       @else

                                                       <?php

                                                       $file_path = url($fd3FormList->equipment_details_file);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                       @endif


                                        </td>


                                            </tr>


                                            <!-- step three end -->



                                           



                                        </table>
 <!-- step five start -->

 <tr>
    <th style="text-align: center;" rowspan="2">১২.</th>

    <td style="font-weight:bold;" colspan="3">গুরুত্বপূর্ণ যেকোনো তথ্য</td>


</tr>

<tr>


    <td colspan="3">


           <!-- start new code --->

@if(count($fdThreeOtherFileList) == 0)


@else

<table class="table table-bordered">
@foreach($fdThreeOtherFileList as $key=>$fd2OtherInfoAll)
<tr>
<td>{{ $fd2OtherInfoAll->file_name }}</td>
<td>

<a target="_blank" href="{{ route('fd3OtherFileDownload',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
<i class="fa fa-download" aria-hidden="true"></i>
</a>

{{-- <a type="button" class="btn btn-custom next_button btn-sm fdthreeOtherFile" id="{{ $fd2OtherInfoAll->id }}" >
<i class="fa fa-pencil" aria-hidden="true"></i>

</a> --}}

<a href="{{ route('fd3OtherFileDelete',$fd2OtherInfoAll->id) }}}" class="btn btn-sm btn-outline-danger"><i
class="bi bi-trash"></i></a>





</td>
</tr>
@endforeach

</table>
@endif

<!-- end new code --->


        <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
                <th>ফাইলের নাম</th>
                <th>ফাইল</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="text"  name="file_name[]" class="form-control" id=""
                           placeholder=""></td>
                <td><input type="file" name="file[]" accept=".pdf" class="form-control" id=""
                           placeholder=""></td>
                <td><a class="btn btn-primary" id="dynamic-ar"><i class="fa fa-plus"></i></a></td>
            </tr>
        </table>

    </td>

</tr>

<!-- step five end --->
                                        <!-- end new code start --->

                                        <div class="mb-3 col-lg-12 mt-3">

                                            <div class="card">

                                                <div class="card-header">
                                                    প্রধান নির্বাহীর তথ্যাদি

                                                </div>
                                                <div class="card-body">

                                                      <!--new code for ngo-->
                                         <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                                 <input type="text" data-parsley-required  name="chief_name" value="{{$fd3FormList->chief_name}}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                                <input type="text" data-parsley-required  name="chief_desi" value="{{$fd3FormList->chief_desi}}"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                                            </div>



                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                    <br>
                                                    <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                                    <br>
                                                <input type="hidden" required  name="image_base64">
                                                <div class="croppedInput mt-2">

                                                </div>
                                                <!-- new code for image cropper start --->
                                                @include('front.signature_modal.sign_main_modal')
                                                <!-- new code for image cropper end -->
                                                <img  src="{{ asset('/') }}{{ $fd3FormList->digital_signature}}"/>
                                            </div>


                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                                 <br>
                                                <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                                <input type="hidden" required  name="image_seal_base64">
                                                <div class="croppedInputss mt-2">

                                                </div>
                                                <!-- new code for image cropper start --->
                                                @include('front.signature_modal.seal_main_modal')
                                                <!-- new code for image cropper end -->
                                                <img  src="{{ asset('/') }}{{ $fd3FormList->digital_seal}}"/>
                                            </div>
                                            <!-- end new code -->

                                                </div>
                                            </div>



                                        </div>

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  class="btn btn-registration"
                                                >দাখিল করুন
                                        </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>
<!--modal-->
<div class="modal modal-xl fade" id="exampleModalOneNew"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                     বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">



                        <input type="hidden" name="mainEditId" value="{{ $fd3FormList->id }}" class="form-control mt-2" id="mainEditId">

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                <input type="text" name="organization_ceo_name" class="form-control mt-2" id="organization_ceo_name0"
                                placeholder="কর্মকর্তার নাম">
                                </div>

                                <div class="col-lg-6 mb-3">

                                <input type="text"name="organization_ceo_designation" class="form-control mt-2" id="organization_ceo_designation0"
                                placeholder="কর্মকর্তার পদবি">
                                </div>
                                <div class="col-lg-6 mb-3">


                                    <input type="text" name="organization_ceo_telephone" class="form-control mt-2" id="organization_ceo_telephone0"
                                           placeholder="কর্মকর্তার টেলিফোন">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" data-parsley-required  name="organization_ceo_mobile" class="form-control mt-2" id="organization_ceo_mobile0"
                                           placeholder=" কর্মকর্তার মোবাইল">
                                </div>
                                <div class="col-lg-6 mb-3">
                                           <input type="email"name="organization_ceo_email" class="form-control mt-2" id="organization_ceo_email0"
                                           placeholder="কর্মকর্তার ইমেইল">
                                </div>



                            </div>
                            <a id="employeeAddPost"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
@include('front.fd3Form._partial.extraFileModal')
@endsection

@section('script')
@include('front.fd3Form._partial.script')
@include('front.zoomButtonImage')
<script>

    ///


        $(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(getMainValue);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
    }
    });

});






    ///
$("#ngo_prokolpo_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#project_name').val(getMainValue);

});


$("#ngo_prokolpo_duration").keyup(function(){
  var getMainValue = $(this).val();

  $('#duration_of_project').val(getMainValue);

});


$("#donor_organization_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#donor_organization_name_two').val(getMainValue);

});








</script>




<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text"  name="file_name[]" class="form-control" id=""placeholder=""></td><td><input type="file" name="file[]" accept=".pdf" class="form-control" id="" placeholder=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
