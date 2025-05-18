@extends('front.master.master')

@section('title')
সংস্থার কর্মকর্তা ও কর্মচারীদের বিদেশ ভ্রমণের বিবরণ | {{ trans('header.ngo_ab')}}
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
    top: 0px !important;
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
                                <p class="{{Route::is('formNoFiveStepFive') || Route::is('formNoFiveStepFour') || Route::is('formNoFiveStepThree') || Route::is('formNoFiveStepTwo') || Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
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
                                        <h1>বার্ষিক প্রতিবেদন</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <form action="{{ route('formNoFiveStepFivePost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{ $formFiveData->id }}" name="main_id" id=""  >
                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    <div class="fd01_tablist mt-3">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                    </div>

                                     <div class="card">
                                        <div class="card-header text-center">সংস্থার কর্মকর্তা ও কর্মচারীদের বিদেশ ভ্রমণের বিবরণ</div>
                                     </div>


                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            @include('flash_message')
                                            <!-- add modal button start -->

                                            <div class="d-flex justify-content-between ">
                                                <div class="p-2">


                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                        ভ্রমণের পূর্ণাঙ্গ বিবরণী যুক্ত করুন
                                                    </button>
                                                </div>
                                            </div>

                                            <!--- modal start--->

                                            @include('front.formNoFive._partila.stepFiveModal')

                                            <!--- modal end --->

                                            <!-- add modal button end -->

                                        </div>
                                    </div>


                                    <div class="row" id="tableAjaxData">
                                        <div class="col-md-12">
                                            @if(count($formNoFiveStepFiveData) == 0 )

                                            <div class="no_name_change">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                                </div>
                                                <div class="text-center">
                                                    <h5>কোন তালিকা নেই</h5>
                                                </div>
                                            </div>

                                            @else

                                            <div class="table-responsive">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th rowspan="2">ক্র : নং :</th>
                                                        <th rowspan="2">কর্মকর্তা কর্মচারীর নাম ও পদবি</th>
                                                        <th rowspan="2">যোগদানের তারিখ</th>
                                                        <th rowspan="2">যে দেশ ভ্রমণ করেছে তার নাম</th>
                                                        <th rowspan="2">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম ও ঠিকানা</th>
                                                        <th rowspan="2">প্রশিক্ষণ কোর্সের নাম</th>
                                                        <th rowspan="2">কোর্সের মেয়াদ</th>

                                                        <th rowspan="2">মোট ব্যয়</th>
                                                        <th colspan="2">ব্যয়ের উৎস</th>
                                                        {{-- <th >ব্যয়ের উৎস (দাতা সংস্থার দেশ)</th> --}}
                                                        <th rowspan="2" >কর্ম পরিকল্পনা</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">দাতা সংস্থার নাম,দেশ</th>
                                                    </tr>
                                                    @foreach($formNoFiveStepFiveData as $key=>$formNoFiveStepFiveDatas)
                                                    <tr>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->name_of_the_officer }}({{ $formNoFiveStepFiveDatas->designation_of_the_officer }})</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->joining_date}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->travel_country}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->organizing_organization_name }}({{ $formNoFiveStepFiveDatas->organizing_organization_address }})</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->name_of_training_course }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->course_duration }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->total_expense}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->name_of_donor_organization}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->country_name_of_donor_organization }}</td>

                                                        <td>

                                                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepFiveDatas->id }}" >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                                                  <!-- edit modal start -->

                                                                                  @include('front.formNoFive._partila.stepFiveModalEdit')

                                                                                  <!-- edit  modal end -->

                                                            <button type="button" onclick="deleteTagStepFive({{ $formNoFiveStepFiveDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></button>



                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>

                                            </div>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mt-4">

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">সভা, সেমিনার, কর্মশালা,সম্মেলন ইত্যাদিও প্রশিক্ষণ হিসাবে গণ্য হবে <span class="text-danger">*</span></label>
                                            <textarea required name="foreign_tour_detail"  class="form-control" id=""placeholder="">{{ $formFiveData->foreign_tour_detail }}</textarea>
                                        </div>

                                        @if(empty($formFiveData->foreign_tour_file))



                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">দাপ্তরিক কাজে বিদেশ ভ্রমণ শেষে ভ্রমণের অর্জন উল্লেখপূর্বক প্রতিবেদন দাখিলের প্রমাণক সংযুক্ত করতে হবে<span class="text-danger">*</span></label>
                                            <input type="file" accept=".pdf" required name="foreign_tour_file"  class="form-control" id=""placeholder="">
                                        </div>



                                        @else

                                        <?php

                                        $file_path = url($formFiveData->foreign_tour_file);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                        ?>

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">দাপ্তরিক কাজে বিদেশ ভ্রমণ শেষে ভ্রমণের অর্জন উল্লেখপূর্বক প্রতিবেদন দাখিলের প্রমাণক সংযুক্ত করতে হবে<span class="text-danger">*</span></label>
                                            <input type="file" accept=".pdf"  name="foreign_tour_file"  class="form-control" id=""placeholder="">
                                        </div>

                                        <b>{{ $filename.'.'.$extension }}</b>

                                        @endif



                                    </div>

                                    <p style="font-weight:900;margin-top:15px;">২৫০০০/- (পঁচিশ হাজার ) টাকার উর্ধ্বে (পরবর্তীতে ন্যূনতম করমুক্ত আয়সীমার সাথে সমন্বয় সাপেক্ষে ) মাসিক বেতন গ্রহণকারী কর্মকর্তা - কর্মচারীদের বিবরণ :</p>

                                    <div class="row mt-3">
                                        <div class="col-lg-12">

                                            <!-- add modal button start -->

                                            <div class="d-flex justify-content-between ">
                                                <div class="p-2">


                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSix" >
                                                        কর্মকর্তা - কর্মচারীদের পূর্ণাঙ্গ বিবরণী যুক্ত করুন
                                                    </button>
                                                </div>
                                            </div>

                                            <!--- modal start--->

                                            @include('front.formNoFive._partila.stepSixModal')

                                            <!--- modal end --->

                                            <!-- add modal button end -->

                                        </div>
                                    </div>

                                    <div class="row" id="tableAjaxDataOther">
                                        <div class="col-md-12">
                                            @if(count($formNoFiveStepFiveOther) == 0 )

                                            <div class="no_name_change">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                                </div>
                                                <div class="text-center">
                                                    <h5>কোন তালিকা নেই</h5>
                                                </div>
                                            </div>

                                            @else

                                            <div class="table-responsive">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>ক্র : নং :</th>
                                                        <th >কর্মকর্তা/কর্মচারীর নাম ও জাতীয়তা(দেশি /বিদেশি)</th>
                                                        <th >পদবি ও দায়িত্ব </th>
                                                        <th >শিক্ষাগত যোগ্যতা ও অভিজ্ঞতা</th>
                                                        <th >বয়স</th>
                                                        <th >বেতন</th>
                                                        <th >অন্যান্য ভাতা/সুবিধাদি</th>

                                                        <th >সংস্থায় চাকুরীর মেয়াদ</th>
                                                        <th >অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা</th>
                                                        <th >মন্তব্য</th>
                                                        <th >কর্ম পরিকল্পনা</th>
                                                    </tr>

                                                    @foreach($formNoFiveStepFiveOther as $key=>$formNoFiveStepFiveDatas)
                                                    <tr>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->name_of_the_officer_depend_on_salary }} ও {{ $formNoFiveStepFiveDatas->nationality_of_the_officer_depend_on_salary }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->designation_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->responsbility_of_the_officer_depend_on_salary}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->education_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->experience_of_the_officer_depend_on_salary}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->age_of_the_officer_depend_on_salary }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->salary_of_the_officer_depend_on_salary }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->other_allowances_or_benefits_of_the_officer_depend_on_salary }}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->job_duration_of_the_officer_depend_on_salary}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->financial_benefit_received_from_any_other_scheme}}</td>
                                                        <td>{{ $formNoFiveStepFiveDatas->comment }}</td>

                                                        <td>

                                                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSix{{ $formNoFiveStepFiveDatas->id }}" >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                                                  <!-- edit modal start -->

                                                                                  @include('front.formNoFive._partila.stepSixModalEdit')

                                                                                  <!-- edit  modal end -->

                                                            <button type="button" onclick="deleteTagStepSix({{ $formNoFiveStepFiveDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></button>



                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>


                                            </div>

                                            @endif
                                        </div>
                                    </div>


                                    <div class="card mt-3">
                                        <div class="card-header text-center">অন্যান্য</div>
                                     </div>
                                     <div class="row mt-3">
                                        <div class="col-lg-12">
                                     <div class="mb-3">
                                        <label for="" class="form-label">রিপোর্ট প্রস্তুতকারীর {{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
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

                                    @if(empty($formFiveData->report_preparar_sign))

                                    @else

                                    <img src="{{ asset('/') }}{{ $formFiveData->report_preparar_sign }}" />

                                    @endif


                                    <div class="mb-3">
                                        <label for="" class="form-label">রিপোর্ট প্রস্তুতকারীর {{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
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

                                    @if(empty($formFiveData->report_preparar_seal))

                                    @else

                                    <img src="{{ asset('/') }}{{ $formFiveData->report_preparar_seal }}" />

                                    @endif

                                        </div>
                                     </div>

                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">

                                        <a href="{{ route('formNoFiveStepFour',base64_encode($decode_id)) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>

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
        </div>

    </div>

</section>


@endsection

@section('script')

<script type="text/javascript">
    function deleteTagStepSix(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ trans('notification.success_three')}}',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                $.ajax({
    url: "{{ route('formNoFiveStepSixDelete') }}",
    method: 'GET',
    data: {id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');

      location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


                // event.preventDefault();
                // document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    '{{ trans('notification.success_six')}} :)',
                    'error'
                )
            }
        })
    }
</script>


<script type="text/javascript">
    function deleteTagStepFive(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ trans('notification.success_three')}}',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                $.ajax({
    url: "{{ route('formNoFiveStepFiveDelete') }}",
    method: 'GET',
    data: {id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');

      location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


                // event.preventDefault();
                // document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    '{{ trans('notification.success_six')}} :)',
                    'error'
                )
            }
        })
    }
</script>

<script>


//last update ajax code strat

$(document).on('click', '.stepSixAjaxUpdate', function () {



    var mainId = $(this).attr('id');

    if(!$('#name_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#nationality_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর জাতীয়তা সম্পর্কিত তথ্য দিন');

}else if(!$('#designation_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর পদ সম্পর্কিত তথ্য দিন');

}else if(!$('#responsbility_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর দায়িত্ব সম্পর্কিত তথ্য দিন');

}else if(!$('#education_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর শিক্ষাগত যোগ্যতা সম্পর্কিত তথ্য দিন');

}else if(!$('#experience_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অভিজ্ঞতা সম্পর্কিত তথ্য দিন');

}else if(!$('#age_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর বয়স সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর বেতন সম্পর্কিত তথ্য দিন');

}else if(!$('#other_allowances_or_benefits_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্যান্য ভাতা/সুবিধাদি সম্পর্কিত তথ্য দিন');

}else if(!$('#job_duration_of_the_officer_depend_on_salary'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর সংস্থায় চাকুরীর মেয়াদ সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_benefit_received_from_any_other_scheme'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_benefit_received_from_any_other_scheme'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var decode_id = $('#decode_id'+mainId).val();
var name_of_the_officer_depend_on_salary = $('#name_of_the_officer_depend_on_salary'+mainId).val();
var nationality_of_the_officer_depend_on_salary = $('#nationality_of_the_officer_depend_on_salary'+mainId).val();
var designation_of_the_officer_depend_on_salary = $('#designation_of_the_officer_depend_on_salary'+mainId).val();
var responsbility_of_the_officer_depend_on_salary = $('#responsbility_of_the_officer_depend_on_salary'+mainId).val();
var education_of_the_officer_depend_on_salary = $('#education_of_the_officer_depend_on_salary'+mainId).val();
var experience_of_the_officer_depend_on_salary =$('#experience_of_the_officer_depend_on_salary'+mainId).val();
var age_of_the_officer_depend_on_salary = $('#age_of_the_officer_depend_on_salary'+mainId).val();
var salary_of_the_officer_depend_on_salary = $('#salary_of_the_officer_depend_on_salary'+mainId).val();
var other_allowances_or_benefits_of_the_officer_depend_on_salary = $('#other_allowances_or_benefits_of_the_officer_depend_on_salary'+mainId).val();
var job_duration_of_the_officer_depend_on_salary = $('#job_duration_of_the_officer_depend_on_salary'+mainId).val();
var financial_benefit_received_from_any_other_scheme = $('#financial_benefit_received_from_any_other_scheme'+mainId).val();
var comment = $('#comment'+mainId).val();


$.ajax({
url: "{{ route('formNoFiveStepSixUpdate') }}",
method: 'POST',
data: {mainId:mainId,name_of_the_officer_depend_on_salary:name_of_the_officer_depend_on_salary,nationality_of_the_officer_depend_on_salary:nationality_of_the_officer_depend_on_salary,designation_of_the_officer_depend_on_salary:designation_of_the_officer_depend_on_salary,responsbility_of_the_officer_depend_on_salary:responsbility_of_the_officer_depend_on_salary,education_of_the_officer_depend_on_salary:education_of_the_officer_depend_on_salary,experience_of_the_officer_depend_on_salary:experience_of_the_officer_depend_on_salary,age_of_the_officer_depend_on_salary:age_of_the_officer_depend_on_salary,salary_of_the_officer_depend_on_salary:salary_of_the_officer_depend_on_salary,other_allowances_or_benefits_of_the_officer_depend_on_salary:other_allowances_or_benefits_of_the_officer_depend_on_salary,job_duration_of_the_officer_depend_on_salary:job_duration_of_the_officer_depend_on_salary,decode_id:decode_id,financial_benefit_received_from_any_other_scheme:financial_benefit_received_from_any_other_scheme,comment:comment},
success: function(data) {
    location.reload(true);
$('#exampleModalSix'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataOther").html('');
$("#tableAjaxDataOther").html(data);



},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});

//last update ajax code end

    //last step six

    $(document).on('click', '#stepSixAjax', function () {


            if(!$('#name_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর নাম সম্পর্কিত তথ্য দিন');

            }else if(!$('#nationality_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর জাতীয়তা সম্পর্কিত তথ্য দিন');

            }else if(!$('#designation_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর পদ সম্পর্কিত তথ্য দিন');

            }else if(!$('#responsbility_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর দায়িত্ব সম্পর্কিত তথ্য দিন');

            }else if(!$('#education_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর শিক্ষাগত যোগ্যতা সম্পর্কিত তথ্য দিন');

            }else if(!$('#experience_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অভিজ্ঞতা সম্পর্কিত তথ্য দিন');

            }else if(!$('#age_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর বয়স সম্পর্কিত তথ্য দিন');

            }else if(!$('#salary_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর বেতন সম্পর্কিত তথ্য দিন');

            }else if(!$('#other_allowances_or_benefits_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্যান্য ভাতা/সুবিধাদি সম্পর্কিত তথ্য দিন');

            }else if(!$('#job_duration_of_the_officer_depend_on_salary').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর সংস্থায় চাকুরীর মেয়াদ সম্পর্কিত তথ্য দিন');

            }else if(!$('#financial_benefit_received_from_any_other_scheme').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা সম্পর্কিত তথ্য দিন');

            }else if(!$('#financial_benefit_received_from_any_other_scheme').val()){

            alertify.alert('Error', 'কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা সম্পর্কিত তথ্য দিন');

          }else{

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            var decode_id = $('#decode_id').val();
            var name_of_the_officer_depend_on_salary = $('#name_of_the_officer_depend_on_salary').val();
            var nationality_of_the_officer_depend_on_salary = $('#nationality_of_the_officer_depend_on_salary').val();
            var designation_of_the_officer_depend_on_salary = $('#designation_of_the_officer_depend_on_salary').val();
            var responsbility_of_the_officer_depend_on_salary = $('#responsbility_of_the_officer_depend_on_salary').val();
            var education_of_the_officer_depend_on_salary = $('#education_of_the_officer_depend_on_salary').val();
            var experience_of_the_officer_depend_on_salary =$('#experience_of_the_officer_depend_on_salary').val();
            var age_of_the_officer_depend_on_salary = $('#age_of_the_officer_depend_on_salary').val();
            var salary_of_the_officer_depend_on_salary = $('#salary_of_the_officer_depend_on_salary').val();
            var other_allowances_or_benefits_of_the_officer_depend_on_salary = $('#other_allowances_or_benefits_of_the_officer_depend_on_salary').val();
            var job_duration_of_the_officer_depend_on_salary = $('#job_duration_of_the_officer_depend_on_salary').val();
            var financial_benefit_received_from_any_other_scheme = $('#financial_benefit_received_from_any_other_scheme').val();
            var comment = $('#comment').val();


            $.ajax({
    url: "{{ route('formNoFiveStepSixPostAjax') }}",
    method: 'POST',
    data: {name_of_the_officer_depend_on_salary:name_of_the_officer_depend_on_salary,nationality_of_the_officer_depend_on_salary:nationality_of_the_officer_depend_on_salary,designation_of_the_officer_depend_on_salary:designation_of_the_officer_depend_on_salary,responsbility_of_the_officer_depend_on_salary:responsbility_of_the_officer_depend_on_salary,education_of_the_officer_depend_on_salary:education_of_the_officer_depend_on_salary,experience_of_the_officer_depend_on_salary:experience_of_the_officer_depend_on_salary,age_of_the_officer_depend_on_salary:age_of_the_officer_depend_on_salary,salary_of_the_officer_depend_on_salary:salary_of_the_officer_depend_on_salary,other_allowances_or_benefits_of_the_officer_depend_on_salary:other_allowances_or_benefits_of_the_officer_depend_on_salary,job_duration_of_the_officer_depend_on_salary:job_duration_of_the_officer_depend_on_salary,decode_id:decode_id,financial_benefit_received_from_any_other_scheme:financial_benefit_received_from_any_other_scheme,comment:comment},
    success: function(data) {

        $('#exampleModalSix').modal('hide');

      alertify.set('notifier','position', 'top-center');
      alertify.success('Data Added Successfully');

      $("#tableAjaxDataOther").html('');
      $("#tableAjaxDataOther").html(data);

       $('#name_of_the_officer_depend_on_salary').val('');
       $('#nationality_of_the_officer_depend_on_salary').val('');
       $('#designation_of_the_officer_depend_on_salary').val('');
       $('#responsbility_of_the_officer_depend_on_salary').val('');
       $('#education_of_the_officer_depend_on_salary').val('');
       $('#experience_of_the_officer_depend_on_salary').val('');
       $('#age_of_the_officer_depend_on_salary').val('');
       $('#salary_of_the_officer_depend_on_salary').val('');
       $('#other_allowances_or_benefits_of_the_officer_depend_on_salary').val('');
       $('#job_duration_of_the_officer_depend_on_salary').val('');
       $('#financial_benefit_received_from_any_other_scheme').val('');
       $('#comment').val('');

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });

            }



    });
    // end last step six



    //step Five update code start

    $(document).on('click', '.stepFiveAjaxUpdate', function () {

        var mainId = $(this).attr('id');



        if(!$('#name_of_the_officer'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা কর্মচারীর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#designation_of_the_officer'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তা কর্মচারীর পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#joining_date'+mainId).val()){

alertify.alert('Error', 'যোগদানের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#travel_country'+mainId).val()){

alertify.alert('Error', 'যে দেশ ভ্রমণ করেছে তার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#organizing_organization_name'+mainId).val()){

alertify.alert('Error', 'সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#organizing_organization_address'+mainId).val()){

alertify.alert('Error', 'সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#name_of_training_course'+mainId).val()){

alertify.alert('Error', 'প্রশিক্ষণ কোর্সের নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#course_duration'+mainId).val()){

alertify.alert('Error', 'কোর্সের মেয়াদ সম্পর্কিত তথ্য দিন');

}else if(!$('#total_expense'+mainId).val()){

alertify.alert('Error', 'মোট ব্যয় সম্পর্কিত তথ্য দিন');

}else if(!$('#name_of_donor_organization'+mainId).val()){

alertify.alert('Error', 'ব্যয়ের উৎস (দাতা সংস্থার নাম) সম্পর্কিত তথ্য দিন');

}else if(!$('#country_name_of_donor_organization'+mainId).val()){

alertify.alert('Error', 'ব্যয়ের উৎস (দাতা সংস্থার দেশ) সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var decode_id = $('#decode_id'+mainId).val();

//alert(decode_id);

var name_of_the_officer = $('#name_of_the_officer'+mainId).val();
var designation_of_the_officer = $('#designation_of_the_officer'+mainId).val();
var joining_date = $('#joining_date'+mainId).val();
var travel_country = $('#travel_country'+mainId).val();
var organizing_organization_name = $('#organizing_organization_name'+mainId).val();
var organizing_organization_address =$('#organizing_organization_address'+mainId).val();
var name_of_training_course = $('#name_of_training_course'+mainId).val();
var course_duration = $('#course_duration'+mainId).val();
var total_expense = $('#total_expense'+mainId).val();
var name_of_donor_organization = $('#name_of_donor_organization'+mainId).val();
var country_name_of_donor_organization = $('#country_name_of_donor_organization'+mainId).val();


$.ajax({
url: "{{ route('formNoFiveStepFiveUpdate') }}",
method: 'POST',
data: {mainId:mainId,country_name_of_donor_organization:country_name_of_donor_organization,name_of_donor_organization:name_of_donor_organization,total_expense:total_expense,course_duration:course_duration,name_of_training_course:name_of_training_course,organizing_organization_address:organizing_organization_address,organizing_organization_name:organizing_organization_name,travel_country:travel_country,joining_date:joining_date,decode_id:decode_id,name_of_the_officer:name_of_the_officer,designation_of_the_officer:designation_of_the_officer},
success: function(data) {
    location.reload(true);
$('#exampleModal'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

    });
    //step Five update code end



    $(document).on('click', '#stepFiveAjax', function () {

        if(!$('#name_of_the_officer').val()){

            alertify.alert('Error', 'কর্মকর্তা কর্মচারীর নাম সম্পর্কিত তথ্য দিন');

        }else if(!$('#designation_of_the_officer').val()){

            alertify.alert('Error', 'কর্মকর্তা কর্মচারীর পদবি সম্পর্কিত তথ্য দিন');

        }else if(!$('#joining_date').val()){

            alertify.alert('Error', 'যোগদানের তারিখ সম্পর্কিত তথ্য দিন');

        }else if(!$('#travel_country').val()){

            alertify.alert('Error', 'যে দেশ ভ্রমণ করেছে তার নাম সম্পর্কিত তথ্য দিন');

        }else if(!$('#organizing_organization_name').val()){

            alertify.alert('Error', 'সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম সম্পর্কিত তথ্য দিন');

        }else if(!$('#organizing_organization_address').val()){

            alertify.alert('Error', 'সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের ঠিকানা সম্পর্কিত তথ্য দিন');

        }else if(!$('#name_of_training_course').val()){

            alertify.alert('Error', 'প্রশিক্ষণ কোর্সের নাম সম্পর্কিত তথ্য দিন');

        }else if(!$('#course_duration').val()){

            alertify.alert('Error', 'কোর্সের মেয়াদ সম্পর্কিত তথ্য দিন');

        }else if(!$('#total_expense').val()){

            alertify.alert('Error', 'মোট ব্যয় সম্পর্কিত তথ্য দিন');

        }else if(!$('#name_of_donor_organization').val()){

            alertify.alert('Error', 'ব্যয়ের উৎস (দাতা সংস্থার নাম) সম্পর্কিত তথ্য দিন');

        }else if(!$('#country_name_of_donor_organization').val()){

            alertify.alert('Error', 'ব্যয়ের উৎস (দাতা সংস্থার দেশ) সম্পর্কিত তথ্য দিন');

        }else{


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var decode_id = $('#decode_id').val();
            var name_of_the_officer = $('#name_of_the_officer').val();
            var designation_of_the_officer = $('#designation_of_the_officer').val();
            var joining_date = $('#joining_date').val();
            var travel_country = $('#travel_country').val();
            var organizing_organization_name = $('#organizing_organization_name').val();
            var organizing_organization_address =$('#organizing_organization_address').val();
            var name_of_training_course = $('#name_of_training_course').val();
            var course_duration = $('#course_duration').val();
            var total_expense = $('#total_expense').val();
            var name_of_donor_organization = $('#name_of_donor_organization').val();
            var country_name_of_donor_organization = $('#country_name_of_donor_organization').val();


            $.ajax({
    url: "{{ route('formNoFiveStepFivePostAjax') }}",
    method: 'POST',
    data: {country_name_of_donor_organization:country_name_of_donor_organization,name_of_donor_organization:name_of_donor_organization,total_expense:total_expense,course_duration:course_duration,name_of_training_course:name_of_training_course,organizing_organization_address:organizing_organization_address,organizing_organization_name:organizing_organization_name,travel_country:travel_country,joining_date:joining_date,decode_id:decode_id,name_of_the_officer:name_of_the_officer,designation_of_the_officer:designation_of_the_officer},
    success: function(data) {

        $('#exampleModal').modal('hide');

      alertify.set('notifier','position', 'top-center');
      alertify.success('Data Added Successfully');

      $("#tableAjaxData").html('');
      $("#tableAjaxData").html(data);

      $('#name_of_the_officer').val('');
      $('#designation_of_the_officer').val('');
      $('#joining_date').val('');
      $('#travel_country').val('');
      $('#organizing_organization_name').val('');
      $('#organizing_organization_address').val('');
      $('#name_of_training_course').val('');
      $('#course_duration').val('');
      $('#total_expense').val('');
      $('#name_of_donor_organization').val('');
      $('#country_name_of_donor_organization').val('')

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });

        }
    });

</script>


@include('front.zoomButtonImage')
<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="text"  name="file_name[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="file" accept=".pdf" name="main_file[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>


<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="family_member_name[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="family_member_age[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
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

$(document).on('change', 'select.district_name', function () {

    var getMainValue = $(this).val();

    $.ajax({
    url: "{{ route('getUpozilaList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name").html('');
      $("#upozila_name").html(data);
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



@endsection
