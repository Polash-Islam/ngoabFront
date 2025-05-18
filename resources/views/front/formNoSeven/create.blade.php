@extends('front.master.master')

@section('title')
{{ trans('formNoSeven.formNoSeven')}} | {{ trans('header.ngo_ab')}}
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

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্র</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                                    <form action="{{ route('formNoSeven.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="form9_upper_box">
                                        <h3>{{ trans('formNoSeven.formNoSeven')}}</h3>
                                        <h4>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্রের ছক</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>স্মারক নং: <span style="color:red;">*</span></td>
                                                    <td> <input type="text" required name="sarok_number" class="form-control" id=""
                                                        placeholder=""></td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>তারিখ: <span style="color:red;">*</span></td>
                                                    <td> <input type="text" required name="submit_date" class="form-control datepickerOne" id=""
                                                        placeholder=""></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- step one start -->

                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">


                                            <table class="table table-bordered " style="width:100%">

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                    <th style="text-align: center; width: 25%">বিবরণ</th>
                                                    <th style="text-align: center;">তথ্যাদি</th>
                                                    <th style="text-align: center;"> মন্তব্য (যদি থাকে)</th>
                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">(০১)</th>
                                                    <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                    <th style="text-align: center;">(০৩)</th>
                                                    <th style="text-align: center;">(০৪)</th>
                                                </tr>
                                              <!-- step one start  -->
                                                <tr>
                                                    <td style="text-align: center;" rowspan="4">০১.</td>
                                                    <td style="text-align: center;">ক)</td>
                                                    <td> এনজিও'র নাম ও ঠিকানা <span style="color:red;">*</span> </td>
                                                    <td>


                                                                <input type="text" required name="ngo_name" class="form-control" id=""
                                                                       placeholder="এনজিও'র নাম">


                                                                <input type="text" required name="ngo_address" class="form-control mt-1" id=""
                                                                       placeholder="এনজিও'র ঠিকানা">

                                                    </td>
                                                    <td>


                                                            <textarea name="ngo_name_address_comment" class="form-control" id=""
                                                                   placeholder="মন্তব্য"></textarea>

                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td> এনজিও প্রধানের নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span></td>
                                                    <td>


                                                        <input type="text" required name="ngo_head_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required name="ngo_head_organization" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="ngo_head_office_mobile" class="form-control mt-1" id=""
                                                        placeholder="দাপ্তরিক মোবাইল নম্বর">

                                                        <input type="text" required name="ngo_head_office_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">

                                                    </td>
                                                    <td>
                                                        <textarea name="ngo_head_comment" class="form-control" id=""
                                                                   placeholder="মন্তব্য"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>

                                                        <span>১. এনজিও'র নিবন্ধন নম্বর ও তারিখ <span style="color:red;">*</span><br>

                                                            ২. সর্বশেষ নবায়নের তারিখ ও মেয়াদকাল <span style="color:red;">*</span>
                                                    </span>

                                                </td>
                                                    <td>
                                                        <input type="text" required name="ngo_registration" class="form-control" id=""
                                                        placeholder="নিবন্ধন নম্বর">


                                                 <input type="text" required name="ngo_registration_date" class="form-control mt-1 datepickerOne" id=""
                                                        placeholder="নিবন্ধন তারিখ">

                                                        <input type="text" required name="ngo_last_renewal_date" class="form-control mt-1 datepickerOne" id=""
                                                        placeholder="নবায়নের তারিখ">


                                                        <input type="text" required name="ngo_duration" class="form-control mt-1" id=""
                                                        placeholder="নবায়নের মেয়াদকাল">

                                                    </td>
                                                    <td><textarea name="ngo_reg_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/আঞ্চলিক  অফিসের দায়িত্বপ্রাপ্ত এনজিও কর্মকর্তার নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span></td>
                                                    <td>
                                                        <input type="text" required name="ngo_local_officer_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required name="ngo_local_officer_designation" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="ngo_local_officer_mobile" class="form-control mt-1" id=""
                                                        placeholder="দাপ্তরিক মোবাইল নম্বর">

                                                        <input type="text" required name="ngo_local_officer_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">
                                                    </td>
                                                    <td>
                                                        <textarea name="ngo_local_officer_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea>
                                                    </td>
                                                </tr>
                                                <!-- step one end -->

                                                <!-- step two strat --->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="7">০২.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">প্রকল্প সংক্রান্ত তথ্য</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td><span>১. প্রকল্পের নাম<span style="color:red;">*</span> <br>

                                                        ২.  মেয়াদকাল<span style="color:red;">*</span> <br>
                                                        ৩.  টাকার পরিমাণ <span style="color:red;">*</span>
                                                </span></td>
                                                    <td>
                                                        <input type="text" required name="prokolpo_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required name="prokolpo_duration" class="form-control mt-1" id=""
                                                        placeholder="মেয়াদকাল">

                                                        <input type="text" required name="prokolpo_fund" class="form-control mt-1" id=""
                                                        placeholder="টাকার পরিমাণ">
                                                    </td>
                                                    <td><textarea name="prokolpo_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>প্রকল্প অনুমোদনের তারিখ ও স্মারক নম্বর, প্রত্যয়নপত্র প্রদানের বছর / সময় <span style="color:red;">*</span> </td>
                                                    <td> <input type="text" required name="prokolpo_approval_date" class="form-control datepickerOne" id=""
                                                        placeholder="তারিখ">


                                                 <input type="text" required name="prokolpo_sarok_number" class="form-control mt-1" id=""
                                                        placeholder="স্মারক নম্বর">

                                                        <input type="text" required name="prokolpo_certificate_year_and_time" class="form-control mt-1" id=""
                                                        placeholder="প্রত্যয়নপত্র প্রদানের বছর / সময়"></td>
                                                    <td><textarea name="prokolpo_approval_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>প্রকল্পের উদ্দেশ্য <span style="color:red;">*</span></td>
                                                    <td><textarea required name="prokolpo_objecttive" class="form-control" id=""
                                                        placeholder="প্রকল্পের উদ্দেশ্য"></textarea></td>
                                                    <td><textarea name="prokolpo_objecttive_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/উপজেলায় ব্যুরো কর্তৃক অনুমোদিত প্রকল্পের কপি স্থানীয় প্রশাসন কর্তৃক গ্রহণের তারিখ <span style="color:red;">*</span></td>
                                                    <td><input type="text" required name="project_copy_approved_by_burea" class="form-control datepickerOne" id=""
                                                        placeholder="তারিখ"></td>
                                                    <td><textarea name="project_copy_approved_by_burea_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঙ)</td>
                                                    <td style="font-weight:bold;">তার এখতিয়ারাধীন এলাকার সংশ্লিষ্ট তথ্য <span style="color:red;">*</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td><span>১. তাঁর জেলা/উপজেলায় প্রকল্পের জন্য বরাদ্দ <span style="color:red;">*</span><br>

                                                        ২.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে বরাদ্দ <span style="color:red;">*</span><br>
                                                        ৩.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে প্রকৃত ব্যয় <span style="color:red;">*</span><br>
                                                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <span style="color:red;">*</span><br>
                                                        <span style="padding-left: 10px;">ক. প্রত্যক্ষ উপকারভোগীর সংখ্যা <br>
                                                            <span style="padding-left: 10px;">খ. পরোক্ষ উপকারভোগীর সংখ্যা(প্রযোজ্য ক্ষেত্রে)</span>
                                                        </span>

                                                </span></td>
                                                    <td>

                                                        <input type="text" required name="allocation_for_projects_in_district_or_upazila" class="form-control" id=""
                                                        placeholder="প্রকল্পের জন্য বরাদ্দ">


                                                 <input type="text" required name="this_year_under_discussion_multi_year_projects" class="form-control mt-1" id=""
                                                        placeholder="আলোচ্য বর্ষে বরাদ্দ">

                                                        <input type="text" required name="actual_expenditure_multi_year_projects" class="form-control mt-1" id=""
                                                        placeholder="আলোচ্য বর্ষে প্রকৃত ব্যয়">

                                                        <input type="text" required name="direct_beneficiaries_quantity" class="form-control mt-1" id=""
                                                        placeholder="প্রত্যক্ষ উপকারভোগীর সংখ্যা">

                                                        <input type="text" required name="indirect_beneficiaries_quantity" class="form-control mt-1" id=""
                                                        placeholder="পরোক্ষ উপকারভোগীর সংখ্যা">

                                                    </td>
                                                    <td><textarea name="jurisdiction_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>



                                                <!-- step two end --->

                                                <!-- step three start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="5">০৩.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">জেলা প্রশাসন/উপজেলা প্রশাসন সংক্রান্ত</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td><span>১. স্থানীয় প্রশাসন কর্তৃক কত বার প্রকল্পটি পরিদর্শন করা হয়েছে <span style="color:red;">*</span> <br>

                                                        ২.  পরিদর্শনকারী কর্মকর্তার নাম, পদবি, মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span>
                                                </span></td>
                                                    <td>

                                                        <input type="text" required name="project_inspected_time" class="form-control" id=""
                                                        placeholder="প্রকল্পটি পরিদর্শন করা হয়েছে">


                                                        <input type="text" required name="inspector_name" class="form-control mt-1" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required name="inspector_designation" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="inspector_mobile" class="form-control mt-1" id=""
                                                        placeholder="মোবাইল নম্বর">

                                                        <input type="text" required name="inspector_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">



                                                    </td>
                                                    <td>
                                                        <textarea name="inspector_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>উপকারভোগী নির্বাচনে স্থানীয় প্রশাসনকে সম্পৃক্ত করা হয়েছে কিনা, হয়ে থাকলে তার সংক্ষিপ্ত বিবরণী <span style="color:red;">*</span></td>
                                                    <td><textarea required name="beneficiaries_involved_with_local_administration" class="form-control" id=""
                                                        placeholder="সংক্ষিপ্ত বিবরণী"></textarea></td>
                                                    <td><textarea name="beneficiaries_involved_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>এনজিও প্রতিনিধি জেলা/উপজেলায় এনজিও বিষয়ক সমন্বয় সভায় নিয়মিত অংশগ্রহণ করেন কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required name="regular_participation_in_meeting" class="form-control mt-1" id=""
                                                        placeholder="অংশগ্রহণ করেন কিনা"></td>
                                                    <td><textarea name="regular_participation_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>এনজিও বিষয়ক ব্যুরোর অনুমোদন পত্রের শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required name="conditions_properly_met" class="form-control mt-1" id=""
                                                        placeholder="শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা"></td>
                                                    <td><textarea name="conditions_properly_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step four start --->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৪.</td>
                                                    <td></td>
                                                    <td>পার্টনার এনজিও হলে মূল এনজিও বিষয়ক তথ্যাদি (প্রযোজ্য ক্ষেত্রে)</td>
                                                    <td><textarea name="mian_ngo_detail" class="form-control" id=""
                                                        placeholder="তথ্যাদি (প্রযোজ্য ক্ষেত্রে"></textarea></td>
                                                    <td><textarea name="main_ngo_detail_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td>মূল এনজিও'র নাম ও ঠিকানা</td>
                                                    <td>
                                                        <input type="text" required name="main_ngo_name" class="form-control mt-1" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required name="main_ngo_address" class="form-control mt-1" id=""
                                                        placeholder="ঠিকানা">

                                                    </td>
                                                    <td><textarea name="main_ngo_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>


                                                <!-- steap four end -->

                                                <!-- step five start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৫.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">প্রকল্পের অর্জিত লক্ষ্যমাত্রা বিষয়ক</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td>প্রকল্প সমাপনী প্রতিবেদন /বার্ষিক প্রতিবেদনে জেলা প্রশাসক/উপজেলা নির্বাহী অফিসারের প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required name="sign_in_closing_report" class="form-control mt-1" id=""
                                                        placeholder="প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা"></td>
                                                    <td><textarea name="sign_in_closing_report_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <!-- step five end --->

                                                <!-- step six start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৬.</td>
                                                    <td></td>
                                                    <td>
                                                        <span>১. বাস্তবায়িত প্রকল্প সম্পর্কে মতামত <span style="color:red;">*</span><br>

                                                            ২.  বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ (প্রত্যয়নকারী কর্মকর্তার স্বহস্তে লিখা কাম্য) <span style="color:red;">*</span>
                                                    </span>
                                                    </td>
                                                    <td>

                                                        <textarea required name="feedback_on_projects_implementedt" class="form-control" id=""
                                                        placeholder="বাস্তবায়িত প্রকল্প সম্পর্কে মতামত"></textarea>


                                                        <textarea required name="recommendation_on_projects_implementedt" class="form-control mt-1" id=""
                                                        placeholder="বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ"></textarea>


                                                    </td>
                                                    <td><textarea name="last_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য"></textarea></td>
                                                </tr>

                                                <!-- step six end -->

                                            </table>




                                        </div>
                                    </div>
                                    <!-- step one end --->

                                     <!-- step five start -->


                                     <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>অন্যান্য তথ্য</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">জেলা<span style="color:red;">*</span></label>
                                                            <select required name="district_address" class="form-control district_name" id="district_id">

                                                                <option value="">--- নির্বাচন করুন ---</option>

                                                                @foreach($districtList as $districtLists)

                                                                <option value="{{ $districtLists->district_bn }}">{{ $districtLists->district_bn }}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">উপজেলা<span style="color:red;">*</span></label>
                                                            <select required name="upazila_address" class="form-control" id="upazila_id">
                                                                <option value="">--- নির্বাচন করুন ---</option>

                                                            </select>
                                                        </div>



                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">অনুলিপি</label>
                                                            <textarea name="onulipi" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <div class="row mt-3">

                                                        <div class="col-lg-6">
                                                            <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার নাম <span style="color:red;">*</span></label>
                                                            <input type="text" required name="name_certifying_officer" class="form-control" id=""
                                                                   placeholder="">

                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার পদবি<span style="color:red;">*</span></label>
                                                            <input type="text" required name="designation_certifying_officer" class="form-control" id=""
                                                                   placeholder="">

                                                        </div>


                                                        <div class="col-lg-12 mt-3">
                                                     <div class="mb-3">
                                                        <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার {{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
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

                                                    </div>




                                                    <div class="mb-3">
                                                        <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার {{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                                         <br>
                                                        <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                                        <input type="hidden" required  name="image_seal_base64">
                                                        <div class="croppedInputss mt-2">

                                                        </div>
                                                        <!-- new code for image cropper start --->
                                                        @include('front.signature_modal.seal_main_modal')
                                                        <!-- new code for image cropper end -->
                                                    </div>
                                                    <!-- end new code -->



                                                        </div>
                                                     </div>




                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step five end -->



                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-registration"
                                                >জমা দিন
                                        </button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>


@endsection

@section('script')

@include('front.zoomButtonImage')

<script>

$(document).on('change', 'select.district_name', function () {

var districtName = $(this).val();


  $.ajax({
    url: "{{ route('getDistrictListForFormSeven') }}",
    method: 'GET',
    data: {districtName:districtName},
    success: function(data) {
      $("#upazila_id").html('');
      $("#upazila_id").html(data);
    },

    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }

    });


});



</script>

@endsection
