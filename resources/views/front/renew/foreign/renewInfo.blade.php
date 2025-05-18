@extends('front.master.master')

@section('title')
আবেদন পুনর্নবীকরণ | {{ trans('header.ngo_ab')}}
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
                                    <h4>{{ $all_partiw1->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $all_partiw1->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $all_partiw1->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $all_partiw1->organization_address }}</p> --}}

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
                                <p class="{{ Route::is('renew') || Route::is('renewInfo') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('nVisa.show') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
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
                            <a href="{{ route('fdFourOneForm.index') }}">
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


                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">এফডি -৮ ফরম</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">নথিপত্র</button>
                            </li>

                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                <div class="mb-0 m-t-30">
                                    @include('flash_message')
                                    <!--new code start -->
                                    <div class="d-flex justify-content-between ">
                                        <div class="">


                                        </div>
                                        <div class="">

                                            @if($getUserIdFrom->status == 'Ongoing' || $getUserIdFrom->status == 'Accepted')

                                            @else

                                            <button class="btn btn-sm btn-primary" onclick="location.href = '{{ route('ngoRenewStepOne') }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                            @endif

                                            <input type="hidden" data-parsley-required  name="id"  value="{{ $get_all_data_new->id }}" class="form-control" id="mainId">
                                            <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                                                <i class="fa fa-print"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <!-- new code end -->

                                    <table class="table table-bordered mt-3">
                                        <tbody>
                                        <tr>
                                            <td>১.</td>
                                            <td colspan="3">সংস্থার বিবরণ:</td>
                                        </tr>
                                          <?php
$getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$all_partiw1->user_id)->value('ngo_type');
                     // dd($getngoForLanguage);


                            $reg_name = DB::table('fd_one_forms')->where('user_id',$all_partiw1->user_id)->value('organization_name_ban');


                                          ?>
                                        <tr>
                                            <td></td>
                                            <td>(i)</td>
                                            <td>সংস্থার নাম</td>
                                            <td>: {{ $reg_name }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ii)</td>
                                            <td>সংস্থার ঠিকানা</td>
                                            <td>: {{ $all_partiw1->organization_address}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(iii)</td>
                                            <td>নিবন্ধন নম্বর</td>
                                            <td>:

                                                <?php

                                                $mainNgoTypeRenew = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');

                                                $registrationNumberForOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

?>

@if($mainNgoTypeRenew == 'Old')
{{ App\Http\Controllers\NGO\CommonController::englishToBangla($registrationNumberForOld)}}

@else


                                              @if($all_partiw1->registration_number == 0)


                                              @else

                                              @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                              {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_partiw1->registration_number)}}
                                              @else

                                              {{ $all_partiw1->registration_number}}
@endif
                                              @endif

@endif


                                          </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(iv)</td>
                                            <td>কোন দেশীয় সংস্থা</td>
                                            <td>: {{ $all_partiw1->country_of_origin }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(v)</td>
                                            <td>প্রধান কার্যালয়ের ঠিকানা</td>
                                            <td>: {{ $all_partiw1->address_of_head_office }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>টেলিফোন নম্বর ,মোবাইল নম্বর ,ইমেইল  ও ওয়েব এড্রেস</td>
                                            <td>:
                                                @if(!$get_all_data_new )

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->phone_new) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->mobile_new) }},{{ $get_all_data_new ->email_new }},{{ $get_all_data_new ->web_site_name }}
                                                @else
                                                {{ $get_all_data_new ->phone_new }},{{ $get_all_data_new ->mobile_new }},{{ $get_all_data_new ->email_new }},{{ $get_all_data_new ->web_site_name }}
                                                @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(vi)</td>
                                            <td>বাংলাদেশস্থ সংস্থা প্রধানের তথ্যাদি</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>ক) নাম</td>
                                            <td>: {{ $all_partiw1->name_of_head_in_bd }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>খ) জাতীয়তা</td>
                                            <td>:          @if(!$get_all_data_new )

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->nationality) }}

                                                @else
                                                {{ $get_all_data_new ->nationality}}
                                                @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>গ) পূর্ণকালীন/ খণ্ডকালীন</td>
                                            <td>: {{ $all_partiw1->job_type }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>ঘ) ঠিকানা,টেলিফোন নম্বর ,মোবাইল নম্বর, ইমেইল</td>
                                            <td>:
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                {{ $all_partiw1->address }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->mobile) }} {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_partiw1->phone) }}, {{ $all_partiw1->email }}
                                                @else
                                                {{ $all_partiw1->address }},{{ $get_all_data_new ->mobile }} {{ $all_partiw1->phone}}, {{ $all_partiw1->email }}
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>ঙ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
                                                করতে হবে)
                                            </td>
                                            <td>: {{ $all_partiw1->citizenship }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>চ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
                                            <td>: {{ $all_partiw1->profession }}</td>
                                        </tr>

                                        <tr>
                                            <td>২.</td>
                                            <td colspan="2">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)
                                            </td>
                                            <td>:

                                                @if(!$get_all_data_new )


                                                @else
                                                @if(empty($get_all_data_new ->foregin_pdf))

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

<a target="_blank"  href="{{ route('foreginPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

@else

<a target="_blank"  href="{{ route('foreginPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



@endif
                                                @endif
@endif

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>৩.</td>
                                            <td colspan="2">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)
                                            </td>
                                            <td>:          @if(!$get_all_data_new )


                                                @else
                                                @if(empty($get_all_data_new ->yearly_budget))

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('yearlyBudgetPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                                @else

                                                <a target="_blank"  href="{{ route('yearlyBudgetPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



                                                @endif
                                                @endif
@endif</td>
                                        </tr>


                                        <tr>
                                            <td>৪.</td>
                                            <td colspan="3">কর্মকর্তাদের তথ্যাদি পৃথক কাগজে
                                                [ঊর্ধ্বতন ৫(পাঁচ) জন কর্মকর্তার]
                                                উপস্থাপন করতে হবে
                                            </td>
                                        </tr>
                                        @foreach($all_partiw as $key=>$all_all_parti)
                                        <tr>
                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <td></td>
                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                            <td>কর্মকর্তা {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                            <td>কর্মকর্তা {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
                                            <td></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ক)</td>
                                            <td>নাম</td>
                                            <td>: {{ $all_all_parti->name }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(খ)</td>
                                            <td>পদবি</td>
                                            <td>: {{ $all_all_parti->position }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(গ)</td>
                                            <td>ঠিকানা</td>
                                            <td>: {{ $all_all_parti->address }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ঘ)</td>
                                            <td>নাগরিকত্ব (দ্বৈত নাগরিকত্ব থাকলে উল্লেখ করতে হবে)
                                            </td>
                                            <td>: {{ $all_all_parti->citizenship }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ঙ)</td>
                                            <td>যোগদানের তারিখ</td>
                                            <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($all_all_parti->date_of_join))) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(চ)</td>
                                            <td>বেতন ভাতাদি</td>
                                            <td>: {{ $all_all_parti->salary_statement }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ছ)</td>
                                            <td>মোবাইল নম্বর </td>
                                            <td>:

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->mobile) }}

                                                @else
                                                {{ $all_all_parti->mobile }}
                                                @endif

                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>(জ)</td>
                                            <td>ইমেইল এড্রেস</td>
                                            <td>: {{ $all_all_parti->email }}</td>
                                        </tr>


                                        <tr>
                                            <td></td>
                                            <td>(ঝ)</td>
                                            <td>সম্পৃক্ত অন্য পেশার বিবরণ</td>
                                            <td>: {{ $all_all_parti->other_occupation }}</td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td>৫.</td>
                                            <td colspan="2">নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
                                                কিনা (চালানের কপি সংযুক্ত করতে
                                                হবে)
                                            </td>
                                            <td>: @if(!$get_all_data_new )


                                                @else
                                                @if(empty($get_all_data_new ->copy_of_chalan))

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('copyOfChalanPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                                @else

                                                <a target="_blank"  href="{{ route('copyOfChalanPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



                                                @endif
                                                @endif
@endif</td>
                                        </tr>

                                        <tr>
                                            <td>৬.</td>
                                            <td colspan="2">তফসিল -১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)
                                            </td>
                                            <td>: @if(!$get_all_data_new )


                                                @else
                                                @if(empty($get_all_data_new ->due_vat_pdf))

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('dueVatPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                                @else

                                                <a target="_blank"  href="{{ route('dueVatPdfDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



                                                @endif
                                                @endif
@endif</td>
                                        </tr>

                                        <tr>
                                            <td>৭.</td>
                                            <td colspan="3">মাদার একাউন্ট এর বিস্তারিত বিবরণ (হিসাব
                                                নম্বর, ধরণ, ব্যাংকের
                                                নাম,শাখা ও বিস্তারিত ঠিকানা)
                                            </td>
                                        </tr>
                                        @if(!$get_all_data_adviser_bank)

                                        @else
                                        <tr>
                                            <td></td>
                                            <td>(ক)</td>
                                            <td>হিসাব নম্বর</td>
                                            <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_adviser_bank->account_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(খ)</td>
                                            <td>ধরণ</td>
                                            <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(গ)</td>
                                            <td>ব্যাংকের নাম</td>
                                            <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ঘ)</td>
                                            <td>শাখা</td>
                                            <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(ঙ)</td>
                                            <td>বিস্তারিত ঠিকানা</td>
                                            <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>৮.</td>
                                            <td colspan="2">ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমোদনপত্রের কপি সংযুক্ত করতে হবে
                                            </td>
                                            <td>: @if(!$get_all_data_new )


                                                @else
                                                @if(empty($get_all_data_new ->change_ac_number))

                                                @else
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('changeAcNumberDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                                @else

                                                <a target="_blank"  href="{{ route('changeAcNumberDownload',base64_encode($get_all_data_new->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



                                                @endif
                                                @endif
@endif</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>



                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @include('front.renew.foreign.finalViewOne')
                            </div>








                    </div>
                </div>


                 <!--new code start -->
                 <div class="d-flex justify-content-between ">
                    <div class="">


                    </div>
                    <div class="">

                        @if($getUserIdFrom->status == 'Ongoing' || $getUserIdFrom->status == 'Accepted')

                        @else



                <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে দাখিল করুন " onclick="editTag({{ $getUserIdFrom->id}})" class="btn btn-lg btn-success">
                    এনজিওতে দাখিল করুন  <i class="fa fa-send-o"></i>
                </button>

                    <form id="delete-form-{{ $getUserIdFrom->id }}" action="{{ route('finalRenewApplicationSubmit',base64_encode($getUserIdFrom->id)) }}" method="get" style="display: none;">

                        @csrf


                    </form>



                        @endif

                    </div>
                </div>


                <!-- new code end -->

            </div>
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
                    'আপনার আবেদন পাঠানো হয়নি :)',
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
        url: "{{ route('renewChief') }}",
        method: 'GET',
        data: {name:name,designation:designation,id:id},
        success: function(data) {



            window.open(data);

        }
        });

  });
  </script>
@endsection
