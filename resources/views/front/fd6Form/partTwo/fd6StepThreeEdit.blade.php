@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

    .alertify .ajs-body .ajs-content {
        font-weight: bolder;
        color:red;
        font-size: 20px;
    }

    .alertify .ajs-header{

        color:red;
        font-size: 20px;

    }

    .alertify .ajs-footer .ajs-buttons .ajs-button{

        background-color: #006A4E;
        color: #fff;

    }

</style>
<style>
    .ui-widget.ui-widget-content {
    top: 160px !important;
    }
</style>
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
                                <p class="{{ Route::is('fd6StepThree') || Route::is('fd6StepTwo') ||  Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active ">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৬</p>
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
                                        <h1>প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৬ ফরম </h3>
                                        <h4>প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd6StepThreeMainUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fd6Id" id="fd6Id" value="{{ $fd6Id }}"/>
                                        <input type="hidden" name="fd6ProjectManagementId" id="fd6ProjectManagementId" value="{{ $fd6ProjectManagement->id }}"/>
                                        <input type="hidden" name="fd6GovernanceAndTransparencyId" id="fd6GovernanceAndTransparencyId" value="{{ $fd6GovernanceAndTransparency->id }}"/>
                                        <input type="hidden" name="fd6StepThreeId" id="fd6StepThreeId" value="{{ $fd6StepThree->id }}"/>
                                        <input type="hidden" id="expenseId" value="1"/>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">



  <!--FD06 Section 08-->

  <tr>
    <td rowspan="7" style="width:40px;">০৮</td>
    <td colspan="3">প্রকল্প ব্যবস্থাপনা :</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td style="width:30%"> প্রত্যেক প্রধান কার্যক্রম বাস্তবায়ন পদ্ধতি
        সংক্ষেপে বর্ণনা করতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="implementation_of_activities" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->implementation_of_activities }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td style="width:30%">প্রকল্পটি সহযোগী এনজিও বা সংস্থার মাদ্ধমে
        বাস্তবায়িত হবে কিনা, হলে সংলগ্নি - ''ক'' মোতাবেক প্রত্যেক সহযোগী
        এনজিওর তথ্য দিতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="associate_NGO_detail" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->associate_NGO_detail }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td style="width:30%"> সংলগ্নি ''খ '' -তে প্রকল্পের কর্মকর্তা/
        কর্মচারীদের বিস্তারিত বিবরণ (দেশি ও বিদেশী উভয়ের জন্য প্রযোজ্য )
        দাখিল করতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="details_of_project_Officers_and_employees" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->details_of_project_Officers_and_employees }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td style="width:30%"> নির্মাণ সংক্রান্ত বিস্তারিত তথ্য সংলগ্নি ''ঘ
        '' - তে প্রদান করতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="construction_details" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->construction_details }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td style="width:30%"> আর্থিক খাত/ উপখাত ভিত্তিক বরাদ্দ সংলগ্নি
        ''ঘ''-তে প্রদান করতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="financial_sector_sub_sector_wise_allocation" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;"> চ)</td>
    <td style="width:30%"> প্রকল্পটি সমাপ্তির পর প্রকল্পটি কিভাবে টিকিয়া
        থাকবে ও পরিচালিত হবে তা উল্লেখ করতে হবে।
    </td>
    <td>
        <textarea class="form-control" name="project_sustained_and_managed" id="" cols="30"
                  rows="6">{{ $fd6ProjectManagement->project_sustained_and_managed }}</textarea>
    </td>
</tr>

<!--FD06 Section 09-->

<tr>
    <td rowspan="9" style="width:40px;">০৯</td>
    <td colspan="3"> সুশাসন ও স্বচ্ছতা :</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td style="width:30%"> প্রকল্পটি এলাকার জনগণ এবং সংশ্লিষ্ট সরকারি ও
        বেসরকারি ব্যক্তিবর্গের সাথে পরামর্শক্রমে কিংবা মাঠ জরিপের
        মাধ্যমে প্রণয়ন করা হয়েছে কিনা, হলে সংক্ষিপ্ত বর্ণনা (প্রমাণক)
    </td>
    <td>
        <textarea class="form-control" name="private_individuals_advice" id="" cols="30"
                  rows="6">{{ $fd6GovernanceAndTransparency->private_individuals_advice }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td style="width:30%">অন্যান্য এনজিও এবং সরকারি চলমান কর্মকান্ড (যদি
        থাকে) বিবেচনান্তে কাজ ও কর্ম - এলাকার দৈত্বতা এড়ানোর কি কি
        ব্যবস্থা গৃহীত হয়েছে।
    </td>
    <td>
        <textarea class="form-control" name="govt_ongoing_activities" id="" cols="30"
                  rows="6">{{ $fd6GovernanceAndTransparency->govt_ongoing_activities }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td style="width:30%"> এ প্রকল্পটি বা একই ধরণের প্রকল্প ইতোপূর্বে
        দাখিল করা হয়েছিল কি না সরকার কর্তৃক তা অনুমোদিত বা পরবর্তীতে
        বাতিল করা হয়েছিল কি না:
    </td>
    <td>
        <textarea class="form-control" name="similar_project_run_previously" id="" cols="30"
                  rows="6">{{ $fd6GovernanceAndTransparency->similar_project_run_previously }}</textarea>
    </td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">ঘ)</td>
    <td colspan="2" style="width:30%"> সংস্থা স্বেচ্ছায় বা তথ্য অধিকার
        আইনের কারণে নিম্নবর্তীত তথ্যাবলী জনসম্মুখে প্রকাশ করতে ইচ্ছুক
        কিনা (ডিসক্লোজার পলিসি ):
    </td>
</tr>
<tr>
    <td colspan="3">
        <table class="table table-bordered">
            <tr>
                <td>ত্রু নং</td>
                <td>তথ্যাবলী</td>
                <td>হ্যা</td>
                <td>না</td>
            </tr>
            <tr>
                <td>০১</td>
                <td>প্রকল্প ছক ৮ নং ফরমে</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="project_in_form_no_eight" value="হ্যা"
                               id="flexRadioDefault1" {{ 'হ্যা' == $fd6GovernanceAndTransparency->project_in_form_no_eight ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="project_in_form_no_eight" value="না"
                               id="flexRadioDefault2" {{ 'না' == $fd6GovernanceAndTransparency->project_in_form_no_eight ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০২</td>
                <td>নিরীক্ষা প্রতিবেদন</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="audit_report" value="হ্যা"
                               id="flexRadioDefault3" {{ 'হ্যা' == $fd6GovernanceAndTransparency->audit_report ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault3">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="audit_report" value="না"
                               id="flexRadioDefault4" {{ 'না' == $fd6GovernanceAndTransparency->audit_report ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault4">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০৩</td>
                <td>বার্ষিক প্রতিবেদন</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="annual_report" value="হ্যা" {{ 'হ্যা' == $fd6GovernanceAndTransparency->annual_report ? 'checked':'' }}
                               id="flexRadioDefault1">
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="annual_report" value="না" {{ 'না' == $fd6GovernanceAndTransparency->annual_report ? 'checked':'' }}
                               id="flexRadioDefault2" >
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০৪</td>
                <td>প্রত্যেক কর্ম- এলাকার বাজেটসহ কর্মপরিকল্পনা</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="action_plan_with_budget" value="হ্যা" {{ 'হ্যা' == $fd6GovernanceAndTransparency->action_plan_with_budget ? 'checked':'' }}
                               id="flexRadioDefault1">
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="action_plan_with_budget" value="না" {{ 'না' == $fd6GovernanceAndTransparency->action_plan_with_budget ? 'checked':'' }}
                               id="flexRadioDefault2" >
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০৫</td>
                <td>উপকারভোগীদের ডাটাবেইজ</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="beneficiary_database" value="হ্যা" {{ 'হ্যা' == $fd6GovernanceAndTransparency->beneficiary_database ? 'checked':'' }}
                               id="flexRadioDefault1">
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="beneficiary_database" value="না"
                               id="flexRadioDefault2" {{ 'না' == $fd6GovernanceAndTransparency->beneficiary_database ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০৬</td>
                <td>প্রকল্পের বিস্তারিত ফলাফল</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="detailed_results_of_the_project" value="হ্যা" {{ 'হ্যা' == $fd6GovernanceAndTransparency->detailed_results_of_the_project ? 'checked':'' }}
                               id="flexRadioDefault1">
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="detailed_results_of_the_project" value="না"
                               id="flexRadioDefault2" {{ 'না' == $fd6GovernanceAndTransparency->detailed_results_of_the_project ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>০৭</td>
                <td>অভিযোগ বহি ও অভিযোগ নিম্পত্তি</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="complaints_detail" value="হ্যা" {{ 'হ্যা' == $fd6GovernanceAndTransparency->complaints_detail ? 'checked':'' }}
                               id="flexRadioDefault1">
                        <label class="form-check-label"
                               for="flexRadioDefault1">
                            হ্যা
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="complaints_detail" value="না"
                               id="flexRadioDefault2" {{ 'না' == $fd6GovernanceAndTransparency->complaints_detail ? 'checked':'' }}>
                        <label class="form-check-label"
                               for="flexRadioDefault2">
                            না
                        </label>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td rowspan="3" style="width:40px;">ঙ)</td>
    <td colspan="2" style="width:30%"> RTI বিষয়ক তথ্যাদি :
    </td>
</tr>
<tr>
    <td style="width:30%">ক. ফোকাল পয়েন্ট এর নাম, মোবাইল, ইমেইল
        নম্বরসহ
    </td>
    <td>
        <textarea class="form-control" name="focal_point_name_mobile_email" id="" cols="30"
                  rows="6">{{ $fd6GovernanceAndTransparency->focal_point_name_mobile_email }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:30%">খ. তথ্য অধিকার বিষয়ক অনলাইন প্রশিক্ষণ রয়েছে
        কিনা? করে থাকলে তার প্রমাণক:
    </td>
    <td>
        <textarea class="form-control" name="online_training" id="" cols="30"
                  rows="6">{{ $fd6GovernanceAndTransparency->online_training }}</textarea>
    </td>
</tr>

<!--FD06 Section 10-->

<tr>
    <td rowspan="4" style="width:40px;">১০</td>
    <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
        সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
        হবে :
    </td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
        লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
    </td>
    <td>
        <textarea class="form-control" name="previous_project_detail" id="" cols="30"
                  rows="6">{{ $fd6StepThree->previous_project_detail }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
        নিরীক্ষা প্রতিবেদন দাখিল
        ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
    </td>
    <td>
        <textarea class="form-control" name="receipt_of_audit_report" id="" cols="30"
                  rows="6">{{ $fd6StepThree->receipt_of_audit_report }}</textarea>
    </td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
        গ্রহণের কারণসমূহ
    </td>
    <td>
        <textarea class="form-control" name="new_phase_project" id="" cols="30"
                  rows="6">{{ $fd6StepThree->new_phase_project }}</textarea>
    </td>
</tr>

<!--FD06 Section 11-->

<tr>
    <td style="width:40px;">১১</td>
    <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
    <td>

        <input class="form-control"  name="detailed_budget_statement" accept=".pdf" type="file">

        @if(empty($fd6StepThree->detailed_budget_statement))


        @else


        <?php

        $file_path = url($fd6StepThree->detailed_budget_statement);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




        ?>
         <b>{{ $filename.'.'.$extension }}</b>
         @endif
    </td>
</tr>
<tr>
    <td style="width:40px;"> ১১.১</td>
    <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
    <td>
        <input class="form-control" value="{{ $fd6StepThree->annual_allocation_to_beneficiaries }}" name="annual_allocation_to_beneficiaries" type="text">
    </td>
</tr>
<tr>
    <td style="width:40px;">১২</td>
    <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
        ব্যয় বিভাজন (বিস্তারিত)
    </td>
    <td>

        <input class="form-control" accept=".pdf" name="project_implementation_cost" type="file">
        @if(empty($fd6StepThree->project_implementation_cost))


        @else


        <?php

        $file_path = url($fd6StepThree->project_implementation_cost);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




        ?>
         <b>{{ $filename.'.'.$extension }}</b>
         @endif
    </td>
</tr>
<tr>
    <td style="width:40px;"> ১৩</td>
    <td colspan="2">
        প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
    </td>
    <td>
        <input class="form-control" value="{{ $fd6StepThree->ratio_of_expenditure }}" name="ratio_of_expenditure" type="text">
    </td>
</tr>
<tr>
    <td style="width:40px;"> ১৪</td>
    <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
        প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
    </td>
    <td>
        <textarea class="form-control" name="project_benifit" cols="30"
        rows="6">{{ $fd6StepThree->project_benifit }}</textarea>
    </td>
</tr>



                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">

                                        <a href="{{ route('fd6StepTwoEdit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                                     </a>

                                        <button type="submit" style="margin-left:10px;"  class="btn btn-registration"
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

@endsection

@section('script')
@include('front.fd6Form._partial.script')
@endsection
