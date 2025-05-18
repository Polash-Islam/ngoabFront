@extends('front.master.master')

@section('title')
এফডি -৯ ফরম | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

.nav-link.active{

    background-color: #075E24 !important;
color:white !important;
}
.nav-link {

    color:black;
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
                                <p class="{{ Route::is('fdNineForm.create') || Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.show') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
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
                        @include('flash_message')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">এফডি -৯ ফরম</button>
                            </li>

                          </ul>
                          <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <!-- new code start --->

                                <div class="d-flex justify-content-between mt-3">
                                    <div class="">


                                    </div>
                                    <div class="">
                                        <input type="hidden" data-parsley-required  name="id"  value="{{ $fdNineData->id }}" class="form-control" id="mainId">
                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                                            <i class="fa fa-print"></i>
                                        </button>

                                        @if($fdNineData->status == 'Ongoing' || $fdNineData->status == 'Accepted')

                                        @else




                                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdNineForm.edit',base64_encode($fdNineData->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                        @endif


                                    </div>
                                </div>

                                <!-- new code end -->

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form9_upper_box">
                                            <h3>এফডি-৯ ফরম</h3>
                                            <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                                            {{-- <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5> --}}

                                            <div>
                                                <p>বরাবর <br>
                                                    মহাপরিচালক <br>
                                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                                    জনাব,</p>
                                                    @if($checkNgoTypeForForeginNgo->ngo_type_new_old == 'Old')
                                                    <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($checkNgoTypeForForeginNgo->registration)}}
                                                        তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                        অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                        এন-ভিসা প্রাপ্তির সুপারিশপত্র
                                                        পাওয়ার জন্য আবেদন করছিঃ</p>
                                                    @else
                                                    <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number)}}
                                                        তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                        অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                        এন-ভিসা প্রাপ্তির সুপারিশপত্র
                                                        পাওয়ার জন্য আবেদন করছিঃ</p>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>১.</td>
                                                <td>বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)</td>
                                                <td>: {{ $fdNineData->fd9_foreigner_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>২.</td>
                                                <td>(ক) পিতার নাম</td>
                                                <td>: {{ $fdNineData->fd9_father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(খ) স্বামী/স্ত্রীর নাম</td>
                                                <td>: {{ $fdNineData->fd9_husband_or_wife_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(গ) মাতার নাম</td>
                                                <td>: {{ $fdNineData->fd9_mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>৩.</td>
                                                <td>জন্ম স্থান ও তারিখ</td>
                                                <td>: {{ $fdNineData->fd9_birth_place }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fdNineData->fd9_dob))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdNineData->fd9_passport_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fdNineData->fd9_passport_issue_date))) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fdNineData->fd9_passport_expiration_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৫.</td>
                                                <td>পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন</td>
                                                <td>: {{ $fdNineData->fd9_identification_mark_given_in_passport }}</td>
                                            </tr>
                                            <tr>
                                                <td>৬.</td>
                                                <td>পুরুষ/মহিলা</td>
                                                <td>: {{ $fdNineData->fd9_male_or_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>৭.</td>
                                                <td>বৈবাহিক অবস্থা</td>
                                                <td>: {{ $fdNineData->fd9_marital_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>৮.</td>
                                                <td>জাতীয়তা / নাগরিকত্ব</td>
                                                <td>: {{ $fdNineData->fd9_nationality_or_citizenship }}</td>
                                            </tr>
                                            <tr>
                                                <td>৯.</td>
                                                <td>একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                                                <td>: {!! $fdNineData->fd9_details_if_multiple_citizenships !!}</td>
                                            </tr>
                                            <tr>
                                                <td>১০.</td>
                                                <td>পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</td>
                                                <td>: {!! $fdNineData->fd9_previous_citizenship_is_grounds_for_non_retention !!}</td>
                                            </tr>
                                            <tr>
                                                <td>১১.</td>
                                                <td>বর্তমান ঠিকানা</td>
                                                <td>: {{ $fdNineData->fd9_current_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>১২.</td>
                                                <td>পরিবারের সদস্য সংখ্যা</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdNineData->fd9_number_of_family_members) }}</td>
                                            </tr>

                                            <?php
   $familyData = $fdNineData->fd9ForeignerEmployeeFamilyMemberList;

   //dd($familyData);
    ?>

                                            <tr>
                                                <td>১৩.</td>
                                                <td>পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন)</td>
                                                <td>
                                                    :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>@foreach($familyData as $key=>$allFamilyData)
                                                    ({{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}) {{ $allFamilyData->family_member_name }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($allFamilyData->family_member_age) }}<br>
                                                    @endforeach</td>
                                            </tr>
                                            <tr>
                                                <td>১৪.</td>
                                                <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                                <td>: {{ $fdNineData->fd9_academic_qualification_des }},  @if(!$fdNineData->fd9_academic_qualification)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_academic_qualification);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'academic','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'academic','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                     @endif
                                                     @endif
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>১৫.</td>
                                                <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                    হবে)
                                                </td>
                                                <td>: {{ $fdNineData->fd9_technical_and_other_qualifications_if_any_des }}, @if(!$fdNineData->fd9_technical_and_other_qualifications_if_any)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_technical_and_other_qualifications_if_any);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'technical','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'technical','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৬.</td>
                                                <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                                </td>
                                                <td>: {{ $fdNineData->fd9_past_experience_des }}, @if(!$fdNineData->fd9_past_experience)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_past_experience);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'pastExperience','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'pastExperience','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৭.</td>
                                                <td>যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)</td>
                                                <td>: {{ $fdNineData->fd9_countries_that_have_traveled }}</td>
                                            </tr>
                                            <tr>
                                                <td>১৮.</td>
                                                <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                    করতে হবে)
                                                </td>
                                                <td>:{{ $fdNineData->fd9_offered_post_name }},  @if(!$fdNineData->fd9_offered_post)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_offered_post);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPostNiyog','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i>নিয়োগপত্র দেখুন </a>

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPost','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm mt-3"><i class="fa fa-file-pdf-o"></i>চুক্তিপত্র দেখুন </a>
     @else

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPostNiyog','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open Appointment Letter</a>

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPost','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm mt-3"><i class="fa fa-file-pdf-o"></i> Open Agreement</a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৯.</td>
                                                <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                    পত্র সংযুক্ত করতে হবে)
                                                </td>
                                                <td>: {{ $fdNineData->fd9_name_of_proposed_project_name }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdNineData->fd9_name_of_proposed_project_duration) }}, @if(!$fdNineData->fd9_name_of_proposed_project)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_name_of_proposed_project);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'proposedProject','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'proposedProject','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>২০.</td>
                                                <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fdNineData->fd9_extension_date_new))) }}, {{ $fdNineData->fd9_date_of_appointment }}</td>
                                            </tr>
                                            <tr>
                                                <td>২১.</td>
                                                <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fdNineData->fd9_extension_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>২২.</td>
                                                <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                                                <td>:{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdNineData->fd9_post_available_for_foreigner) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdNineData->fd9_post_available_for_foreigner_and_working) }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৩.</td>
                                                <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                                                <td>: {!! $fdNineData->fd9_previous_work_experience_in_bangladesh !!}</td>
                                            </tr>
                                            <tr>
                                                <td>২৪.</td>
                                                <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                                                <td>: {{ $fdNineData->fd9_total_foreigner_working }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৫.</td>
                                                <td>অন্য কোন তথ্য (যদি থাকে)</td>
                                                <td>: {{ $fdNineData->fd9_other_information }} </td>
                                            </tr>

                                            @foreach($fdNineOtherFileList as $key=>$fdNineOtherFileLists)
                                            <tr>
                                                <td></td>
                                                <td>(২৫.{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}). {{ $fdNineOtherFileLists->file_name }}</td>
                                                <td>: <a target="_blank" href="{{ route('singlePdfDownload',$fdNineOtherFileLists->id) }}" class="btn btn-outline-success btn-sm" >
                                                    <i class="fa fa-file-pdf-o"></i> দেখুন
                                                </a></td>
                                            </tr>
                                            @endforeach



                                            <tr>
                                                <td></td>
                                                <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                                <td>: @if(!$fdNineData->fd9_foreigner_passport_size_photo)

                                                    @else

                                                    <img src="{{ asset('/') }}{{ $fdNineData->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>পাসপোর্টের কপি সংযুক্ত</td>
                                                <td>:  @if(!$fdNineData->fd9_copy_of_passport)

                                                    @else

                     <?php

                                                     $file_path = url($fdNineData->fd9_copy_of_passport);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'passportCopy','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'passportCopy','id'=>base64_encode($fdNineData->id)]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>








                    </div>
                </div>

            </div>

              <!-- new code start --->

              <div class="d-flex justify-content-between mt-3">
                <div class="">


                </div>
                <div class="">
                    <input type="hidden" data-parsley-required  name="id"  value="{{ $fdNineData->id }}" class="form-control" id="mainId">
                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                        <i class="fa fa-print"></i>
                    </button>

                    @if($fdNineData->status == 'Ongoing' || $fdNineData->status == 'Accepted')

                    @else

                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে দাখিল করুন " onclick="editTag({{ $fdNineData->id}})" class="btn btn-info">
                        এনজিওতে দাখিল করুন  <i class="fa fa-send-o"></i>
                    </button>

                        <form id="delete-form-{{ $fdNineData->id }}" action="{{ route('finalFdNineApplicationSubmit',base64_encode($fdNineData->id)) }}" method="get" style="display: none;">

                            @csrf


                        </form>




                    @endif


                </div>
            </div>

            <!-- new code end -->
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: 'আপনি কি ফর্ম সাবমিট করতে চাচ্ছেন?',
            text: "সাবমিট বাটনে ক্লিক করলে, আর তথ্য সংশোধন করবেন না। আপনি কি রাজি?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি দাখিল করুন  !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন দাখিল  হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>
<script>
$("#downloadButton").click(function(){
      var name = $('#mainName').val();
      var designation = $('#mainDesignation').val();
      var id = $('#mainId').val();

      $.ajax({
        url: "{{ route('fd9Chief') }}",
        method: 'GET',
        data: {name:name,designation:designation,id:id},
        success: function(data) {



            window.open(data);

        }
        });

  });
  </script>
@endsection
