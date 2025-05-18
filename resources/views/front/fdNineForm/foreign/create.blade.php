@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
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
                                            <h1>Foreign National Employment Letter Attestation Form</h1>
                                            <div class="notice_underline"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3 card-custom-color">
                                    <div class="card-body">

                                        <div class="form9_upper_box">
                                            <h3>এফডি-৯ ফরম</h3>
                                            <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                                            <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                                            <div>
                                                <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                                জনাব,</p>
                                                <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number)}}
                                                    তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                    অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                    এনডিসা প্রাপ্তির সুপারিশপত্র
                                                    পাওয়ার জন্য আবেদন করছিঃ</p>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <h5 class="form_middle_text">
                                                Foreigner Information
                                            </h5>
                                        </div>

                                        <?php

                                  $foriugnerData = DB::table('n_visa_particulars_of_foreign_incumbnets')
                                  ->where('n_visa_id',$nVisaId)->first();

                                        ?>


                                        @if(!$fdNineData)

                                        <form method="post" action="{{ route('fdNineForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf

                                            <input type="hidden" class="form-control" id=""
                                            placeholder="" name="nVisaId"  value="{{ $nVisaId }}" required>
<!-- empty data -->
<div class="row">
    <div class="mb-3 col-lg-12">
        <label for="" class="form-label">বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_foreigner_name" style="text-transform: uppercase" value="{{ $foriugnerData->name_of_the_foreign_national }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পিতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_father_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">স্বামী/স্ত্রীর নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_husband_or_wife_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">মাতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_mother_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম স্থান<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_birth_place" value="{{ $foriugnerData->home_country }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne"  id=""
               placeholder="" name="fd9_dob" value="{{ $foriugnerData->date_of_birth }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পাসপোর্ট নম্বর<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_passport_number" value="{{ $foriugnerData->passport_no }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">ইস্যু তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" id=""
               placeholder="" name="fd9_passport_issue_date" value="{{ $foriugnerData->passport_issue_date }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">মেয়াদোর্ত্তীণ তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" value="{{ $foriugnerData->passport_expiry_date }}" name="fd9_passport_expiration_date" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label"> পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_identification_mark_given_in_passport" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পুরুষ/মহিলা<span
            class="text-danger">*</span></label>
        <select name="fd9_male_or_female" class="form-control" id="" required>
            <option value="পুরুষ">পুরুষ</option>
            <option value="মহিলা">মহিলা</option>
        </select>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">বৈবাহিক অবস্থা<span
            class="text-danger">*</span></label>
        {{-- <select name="fd9_marital_status" class="form-control" id="" required>
            <option value="বিবাহিত">বিবাহিত</option>
            <option value="অবিবাহিত">অবিবাহিত</option>
            <option value="ডিভোর্স">ডিভোর্স </option>
        </select> --}}
        <input type="text" class="form-control" id=""
        placeholder="" name="fd9_marital_status" value="{{ $foriugnerData->martial_status }}" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জাতীয়তা / নাগরিকত্ব<span
            class="text-danger">*</span></label>

            <input type="text" class="form-control" id=""
        placeholder="" name="fd9_nationality_or_citizenship" value="{{ $foriugnerData->nationality }}" required>

        {{-- <select class="js-example-basic-single form-control" data-parsley-required name="fd9_nationality_or_citizenship"
        >
<option value="">--একটা নির্বাচন করুন--</option>
         @foreach($getCityzenshipData as $allGetCityzenshipData)
         @if(session()->get('locale') == 'en')
         <option value="{{ $allGetCityzenshipData->country_people_bangla }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
         @else
     <option value="{{ $allGetCityzenshipData->country_people_bangla }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
     @endif
     @endforeach

 </select> --}}
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">একাধিক নাগরিকত্ব থাকলে বিবরণ<span
            class="text-danger">*</span></label>
        <textarea required name="fd9_details_if_multiple_citizenships" id="" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ<span
            class="text-danger">*</span></label>
        <textarea required name="fd9_previous_citizenship_is_grounds_for_non_retention" id="" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3 col-lg-8">
        <label for="" class="form-label">বর্তমান ঠিকানা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_current_address" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পরিবারের সদস্য সংখ্যা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_number_of_family_members" required>
    </div>

    {{-- <div class="mb-3 row">
        <label for="" class="col-sm-12 col-form-label">পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন):<span
                    class="text-danger">*</span></label>
    </div>

    <div class="mb-3 col-lg-12">
        <table class="table table-light" id="dynamicAddRemove">
            <tr>
                <th>নাম<span
                    class="text-danger">*</span></th>
                <th>বয়স<span
                    class="text-danger">*</span></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="family_member_name[]"
                           class="form-control" required/>
                </td>
                <td>
                    <input type="text" name="family_member_age[]"
                           class="form-control" required/>
                </td>
                <td></td>
            </tr>
        </table>
        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add New Member
        </button>
    </div> --}}
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"  class="form-control" id=""
               placeholder="" required name="fd9_academic_qualification">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে হবে)<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"  class="form-control" id=""
               placeholder="" required name="fd9_technical_and_other_qualifications_if_any">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)<span
            class="text-danger">*</span>:</label>
        <input type="file" accept=".pdf"  required class="form-control" id=""
               placeholder="" name="fd9_past_experience">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)<span
            class="text-danger">*</span></label>
        <input type="text" required class="form-control" id=""
               placeholder="" name="fd9_countries_that_have_traveled">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত করতে হবে),<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"  required class="form-control" id=""
               placeholder="" name="fd9_offered_post">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন পত্র সংযুক্ত করতে হবে)<span
            class="text-danger">*</span>:</label>
        <input type="file" accept=".pdf"  required class="form-control" id=""
               placeholder="" name="fd9_name_of_proposed_project">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে: (কে) নতুন (খ) প্রতিস্থাপিত (গ) এক্সটেনশন (খ) চলমান্<span
            class="text-danger">*</span></label>
        <select name="fd9_date_of_appointment" class="form-control" id="" required>
            <option value="নতুন">নতুন</option>
            <option value="প্রতিস্থাপিত">প্রতিস্থাপিত</option>
            <option value="এক্সটেনশন">এক্সটেনশন</option>
            <option value="চলমান্">চলমান্</option>
        </select>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">এক্সটেনশন হয়ে থাকলে তার সময়কাল<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" id=""
               placeholder="" name="fd9_extension_date" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন:<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_post_available_for_foreigner_and_working" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ:<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_previous_work_experience_in_bangladesh" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_total_foreigner_working" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">অন্য কোন তথ্য (যদি থাকে)<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_other_information" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি <span
            class="text-danger">*</span></label>
        <input type="file" class="form-control" id=""
               placeholder="" accept="image/*" name="fd9_foreigner_passport_size_photo" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পাসপোর্টের কপি সংযুক্ত<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf" class="form-control" id=""
               placeholder=""  name="fd9_copy_of_passport" required>
    </div>

</div>
 <!--end empty data -->
 <div class="buttons d-flex justify-content-end mt-4">
    <a href="{{ route('nVisa.edit',$nVisaId) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
    <button class="btn btn-danger me-2" name="submit_value" value="next_step_from_three" type="submit">তথ্য জমা দিন</button>

</div>
</form>

                                        @else
                                        <form method="post" action="{{ route('fdNineForm.update',$fdNineData->id) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" class="form-control" id=""
                                            placeholder="" name="nVisaId"  value="{{ $nVisaId }}" required>
<!-- empty data -->
<div class="row">
    <div class="mb-3 col-lg-12">
        <label for="" class="form-label">বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_foreigner_name }}" name="fd9_foreigner_name" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পিতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" value="{{ $fdNineData->fd9_father_name }}" name="fd9_father_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">স্বামী/স্ত্রীর নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" value="{{ $fdNineData->fd9_husband_or_wife_name }}" name="fd9_husband_or_wife_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">মাতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" value="{{ $fdNineData->fd9_mother_name }}" name="fd9_mother_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম স্থান<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_birth_place }}" name="fd9_birth_place" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne"  id=""
               placeholder="" value="{{ $fdNineData->fd9_dob }}" name="fd9_dob" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পাসপোর্ট নম্বর<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_passport_number }}" name="fd9_passport_number" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">ইস্যু তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" id=""
               placeholder="" value="{{ $fdNineData->fd9_passport_issue_date }}" name="fd9_passport_issue_date" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">মেয়াদোর্ত্তীণ তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" value="{{ $fdNineData->fd9_passport_expiration_date }}" name="fd9_passport_expiration_date" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label"> পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_identification_mark_given_in_passport }}" name="fd9_identification_mark_given_in_passport" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পুরুষ/মহিলা<span
            class="text-danger">*</span></label>
        <select name="fd9_male_or_female" class="form-control" id="" required>
            <option value="পুরুষ" {{ $fdNineData->fd9_male_or_female == 'পুরুষ' ? 'selected': ''}}>পুরুষ</option>
            <option value="মহিলা" {{ $fdNineData->fd9_male_or_female == 'মহিলা' ? 'selected': ''}}>মহিলা</option>
        </select>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">বৈবাহিক অবস্থা<span
            class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
        placeholder="" name="fd9_marital_status" value="{{ $foriugnerData->martial_status }}" required>
        {{-- <select name="fd9_marital_status" class="form-control" id="" required>
            <option value="বিবাহিত" {{ $fdNineData->fd9_marital_status == 'বিবাহিত' ? 'selected': ''}}>বিবাহিত</option>
            <option value="অবিবাহিত" {{ $fdNineData->fd9_marital_status == 'অবিবাহিত' ? 'selected': ''}}>অবিবাহিত</option>
            <option value="ডিভোর্স" {{ $fdNineData->fd9_marital_status == 'ডিভোর্স' ? 'selected': ''}}>ডিভোর্স </option>
        </select> --}}
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জাতীয়তা / নাগরিকত্ব<span
            class="text-danger">*</span></label>

        {{-- <select class="js-example-basic-single form-control" data-parsley-required name="fd9_nationality_or_citizenship"
        >
<option value="">--একটা নির্বাচন করুন--</option>
         @foreach($getCityzenshipData as $allGetCityzenshipData)
         @if(session()->get('locale') == 'en')
         <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ $fdNineData->fd9_nationality_or_citizenship == $allGetCityzenshipData->country_people_bangla ? 'selected': ''}}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
         @else
     <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ $fdNineData->fd9_nationality_or_citizenship == $allGetCityzenshipData->country_people_bangla ? 'selected': ''}} >{{ $allGetCityzenshipData->country_people_bangla }}</option>
     @endif
     @endforeach

 </select> --}}
 <input type="text" class="form-control" id=""
 placeholder="" name="fd9_nationality_or_citizenship" value="{{ $foriugnerData->nationality }}" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">একাধিক নাগরিকত্ব থাকলে বিবরণ<span
            class="text-danger">*</span></label>
        <textarea required name="fd9_details_if_multiple_citizenships" id="" cols="30" rows="4" class="form-control">{{ $fdNineData->fd9_foreigner_name }}</textarea>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ<span
            class="text-danger">*</span></label>
        <textarea required name="fd9_previous_citizenship_is_grounds_for_non_retention" id="" cols="30" rows="4" class="form-control">{{ $fdNineData->fd9_foreigner_name }}</textarea>
    </div>
    <div class="mb-3 col-lg-8">
        <label for="" class="form-label">বর্তমান ঠিকানা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_current_address }}" name="fd9_current_address" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পরিবারের সদস্য সংখ্যা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_number_of_family_members }}" name="fd9_number_of_family_members" required>
    </div>

    {{-- <div class="mb-3 row">
        <label for="" class="col-sm-12 col-form-label">পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন):<span
                    class="text-danger">*</span></label>
    </div> --}}

    <?php
   $familyData = $fdNineData->fd9ForeignerEmployeeFamilyMemberList;

   //dd($familyData);
    ?>

    {{-- <div class="mb-3 col-lg-12">
        <table class="table table-light" id="dynamicAddRemove">
            <tr>
                <th>নাম<span
                    class="text-danger">*</span></th>
                <th>বয়স<span
                    class="text-danger">*</span></th>
                <th></th>
            </tr>
            @foreach($familyData as $key=>$allFamilyData)

            @if($key==0)
            <tr>
                <td>
                    <input type="text" value="{{ $allFamilyData->family_member_name }}" name="family_member_name[]"
                           class="form-control" required/>
                </td>
                <td>
                    <input type="text" value="{{ $allFamilyData->family_member_age }}" name="family_member_age[]"
                           class="form-control" required/>
                </td>
                <td></td>
            </tr>
            @else

            <tr>
                <td>
                    <input type="text" value="{{ $allFamilyData->family_member_name }}" name="family_member_name[]"
                           class="form-control" required/>
                </td>
                <td>
                    <input type="text" value="{{ $allFamilyData->family_member_age }}" name="family_member_age[]"
                           class="form-control" required/>
                </td>
                <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td>
            </tr>

            @endif
            @endforeach
        </table>
        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add New Member
        </button>
    </div> --}}
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"  class="form-control" id=""
               placeholder=""  name="fd9_academic_qualification">


               @if(!$fdNineData->fd9_academic_qualification)

               @else
               <?php

               $file_path = url($fdNineData->fd9_academic_qualification);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif

    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে হবে)<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"  class="form-control" id=""
               placeholder=""  name="fd9_technical_and_other_qualifications_if_any">

               @if(!$fdNineData->fd9_technical_and_other_qualifications_if_any)

               @else
               <?php

               $file_path = url($fdNineData->fd9_technical_and_other_qualifications_if_any);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)<span
            class="text-danger">*</span>:</label>
        <input type="file" accept=".pdf"   class="form-control" id=""
               placeholder="" name="fd9_past_experience">

               @if(!$fdNineData->fd9_past_experience)

               @else
               <?php

               $file_path = url($fdNineData->fd9_past_experience);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)<span
            class="text-danger">*</span></label>
        <input type="text"  class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_countries_that_have_traveled }}" name="fd9_countries_that_have_traveled">
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত করতে হবে),<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf"   class="form-control" id=""
               placeholder="" name="fd9_offered_post">

               @if(!$fdNineData->fd9_offered_post)

               @else
               <?php

               $file_path = url($fdNineData->fd9_offered_post);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন পত্র সংযুক্ত করতে হবে)<span
            class="text-danger">*</span>:</label>
        <input type="file" accept=".pdf"   class="form-control" id=""
               placeholder="" name="fd9_name_of_proposed_project">

               @if(!$fdNineData->fd9_name_of_proposed_project)

               @else
               <?php

               $file_path = url($fdNineData->fd9_name_of_proposed_project);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে: (কে) নতুন (খ) প্রতিস্থাপিত (গ) এক্সটেনশন (খ) চলমান্<span
            class="text-danger">*</span></label>
        <select name="fd9_date_of_appointment" class="form-control" id="" required>
            <option value="নতুন" {{ $fdNineData->fd9_date_of_appointment == 'নতুন' ? 'selected':'' }}>নতুন</option>
            <option value="প্রতিস্থাপিত" {{ $fdNineData->fd9_date_of_appointment == 'প্রতিস্থাপিত' ? 'selected':'' }}>প্রতিস্থাপিত</option>
            <option value="এক্সটেনশন" {{ $fdNineData->fd9_date_of_appointment == 'এক্সটেনশন' ? 'selected':'' }}>এক্সটেনশন</option>
            <option value="চলমান" {{ $fdNineData->fd9_date_of_appointment == 'চলমান' ? 'selected':'' }}>চলমান</option>
        </select>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">এক্সটেনশন হয়ে থাকলে তার সময়কাল<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" id=""
               placeholder="" value="{{ $fdNineData->fd9_extension_date }}" name="fd9_extension_date" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন:<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_post_available_for_foreigner_and_working }}" name="fd9_post_available_for_foreigner_and_working" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ:<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_previous_work_experience_in_bangladesh }}" name="fd9_previous_work_experience_in_bangladesh" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_total_foreigner_working }}" name="fd9_total_foreigner_working" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">অন্য কোন তথ্য (যদি থাকে)<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" value="{{ $fdNineData->fd9_other_information }}" name="fd9_other_information" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি <span
            class="text-danger">*</span></label>
        <input type="file" class="form-control" id=""
               placeholder="" accept="image/*" name="fd9_foreigner_passport_size_photo" >


                <img src="{{ asset('/') }}{{ $fdNineData->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">


    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পাসপোর্টের কপি সংযুক্ত<span
            class="text-danger">*</span></label>
        <input type="file" accept=".pdf" class="form-control" id=""
               placeholder=""  name="fd9_copy_of_passport" >

               @if(!$fdNineData->fd9_copy_of_passport)

               @else
               <?php

               $file_path = url($fdNineData->fd9_copy_of_passport);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
               {{ $filename.'.'.$extension }}
               @endif
    </div>

</div>
 <!--end empty data -->
 <div class="buttons d-flex justify-content-end mt-4">
    <a href="{{ route('nVisa.edit',$nVisaId) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
    <button class="btn btn-danger me-2" name="submit_value" value="next_step_from_three" type="submit">তথ্য জমা দিন</button>

</div>
</form>

                                        @endif





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
@endsection
