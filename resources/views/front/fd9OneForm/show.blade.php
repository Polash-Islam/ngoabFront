@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

@include('translate')

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
                                <p class="{{ Route::is('fdNineOneForm.show') || Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
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
<!-- new code for fd 9 and n visa -->
<div class="card">
    <div class="card-body">


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">এফডি-৯(১) ফরম</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Security Clearance</button>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                  <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">
                        <input type="hidden" data-parsley-required  name="id"  value="{{ $fd9OneList->id }}" class="form-control" id="mainId">
                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                            <i class="fa fa-print"></i>
                        </button>


                        @if($fd9OneList->status == 'Ongoing' || $fd9OneList->status == 'Accepted')

                                        @else


                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdNineOneForm.edit',$fd9OneList->id) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                <div class="card-body mt-2">
                    <div class="form9_upper_box">
                        <h3>এফডি-৯(১) ফরম</h3>
                        <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের (কার্যানুমতি)
                            আবেদন ফরম</h4>
                        <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                        <div>
                            <p>বরাবর <br>
                                মহাপরিচালক <br>
                                এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                জনাব,</p>

                        </div>
                    </div>
                </div>
                <div class="card-body fd0901_text_style">
                    <table class="table table-borderless">
                        <tr>
                            <td>বিষয়:</td>
                            <td>"{{ $fd9OneList->institute_name }}" সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী "{{ $fd9OneList->foreigner_name_for_subject }}" এর
                                ওয়ার্ক পারমিট প্রসঙ্গে।
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর {{ $fd9OneList->sarok_number }} তারিখ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->application_date))) }}
                            </td>
                        </tr>
                    </table>

                    <p class="mt-3 mb-2">
                        উপর্যুক্ত বিষয় ও সূত্রের বরাতে "{{ $fd9OneList->institute_name }}" সংস্থার "{{ $fd9OneList->prokolpo_name }}" প্রকল্পের আওতায় "{{ $fd9OneList->designation_name }}" হিসেবে বিদেশী বিশেষজ্ঞ/
                        উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী {{ $fd9OneList->foreigner_name_for_body }} কে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->expire_from_date))) }} খ্রি: হতে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->expire_to_date))) }} পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে
                        উক্ত ব্যাক্তির অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু করার
                        জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                    </p>

                    <table class="table table-borderless">
                        <tr>
                            <td>০১</td>
                            <td>নিয়োগপত্র সত্যায়ন প্রমাণক</td>
                            <td>: @if(!$fd9OneList->attestation_of_appointment_letter)

                                @else

 <?php

                                 $file_path = url($fd9OneList->attestation_of_appointment_letter);
                                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                 $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                 ?>
  @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

  <a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'appointment','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
  @else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'appointment','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
       @endif
                                 @endif
                                 {{-- <a href="{{ route('niyogPotroDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
</td>
                        </tr>
                        <tr>
                            <td>০২</td>
                            <td>ফর্ম ৯ এর কপি</td>
                            <td>:  @if(!$fd9OneList->copy_of_form_nine)

                                @else

 <?php

                                 $file_path = url($fd9OneList->copy_of_form_nine);
                                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                 $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                 ?>
@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'form9Copy','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
@else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'form9Copy','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
  @endif
                                 @endif
                                 {{-- <a href="{{ route('formNinePdfDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
</td>
                        </tr>
                        <tr>
                            <td>০৩</td>
                            <td>ছবি</td>
                            <td>:<img src="{{ asset('/') }}{{ $fd9OneList->foreigner_image }}" style="height:40px;"/></td>
                        </tr>
                        <tr>
                            <td>০৪</td>
                            <td>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ)</td>
                            <td>:

                                @if(!$fd9OneList->copy_of_nvisa)

                           @else

<?php

                            $file_path = url($fd9OneList->copy_of_nvisa);
                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                            ?>
@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'copyNvisa','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
@else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'copyNvisa','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
  @endif,
                            @endif
{{-- <a href="{{ route('nVisaCopyDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>, --}}
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->arrival_date_in_nvisa))) }}</td>
                        </tr>
                    </table>

                    <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }} হতে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }} মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>


                </div>
            </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="mt-3">
                    <div class="row mt-3">
                        <div class="col-lg-6 col-sm-12">
                            <div class="others_inner_section">
                                <h1>Application for Security Clearance</h1>
                                <div class="notice_underline"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            Basic Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9 col-sm-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Approved permission period</td>
                                            <td>:{{ $nVisaEdit->period_validity }}</td>
                                        </tr>
                                        <tr>
                                            <td>Effective Date</td>
                                            <td>:{{ date('d-m-Y', strtotime($nVisaEdit->permit_efct_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ref no. of issued work permit</td>
                                            <td>:{{ $nVisaEdit->visa_ref_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Received Visa Recommendation Lette</td>
                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_received_way	 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ref no. of Visa Recommendation Letter</td>
                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_ref_no	 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Department in</td>
                                            <td>:{{ $nVisaEdit->department_in	 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Work Permit type</td>
                                            <td>:{{ $nVisaEdit->visa_category	 }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="nvisa-avatar">
                                        @if(!$nVisaEdit->applicant_photo)
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                        @else
                                        <img src="{{ asset('/') }}{{ $nVisaEdit->applicant_photo }}"  alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            A. PARTICULAR OF SPONSOR/EMPLOYER
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="2">Name of the enterprise (organization/company)  : {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_name }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #d4d4d4">Address of the enterprise (Bangladesh Only)</td>
                                </tr>
                                <tr>
                                    <td>House/Plot/Holding/Village: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_house_no }}  </td>
                                    <td>Flat/Apartment/Floor: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_flat_no }}</td>
                                </tr>
                                <tr>
                                    <td>Road Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_road_no }}</td>
                                    <td>Post/Zip Code: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_code }}</td>
                                </tr>
                                <tr>
                                    <td>Post Office: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_office }}</td>
                                    <td>Telephone Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_phone }}</td>
                                </tr>
                                <tr>
                                    <td>City/District {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_district }}</td>
                                    <td>Thana/Upazilla: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_thana }}</td>
                                </tr>
                                <tr>
                                    <td>Fax Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_fax_no }}</td>
                                    <td>Email: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_email }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Type of the Organization: NGO</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Nature of buisness: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->nature_of_business }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Authorized Capital: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->authorized_capital }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Paid up capital: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->paid_up_capital }}</td>
                                </tr>
                                <tr>
                                    <td>Remittance received during last 12 months: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->remittance_received }}</td>
                                    <td>Type of Industry:NGO </td>
                                </tr>
                                <tr>
                                    <td>Recommendation of Company Boards: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->recommendation_of_company_board }}</td>
                                    <td>Whether local, foreign or joint venture company (if joint venture, percentage of local and foreign investment is to be shown): {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->company_share }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            B. PARTICULARS OF FOREIGN INCUMBENT
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="2">Name of the foreign national: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->name_of_the_foreign_national }}</td>
                                </tr>
                                <tr>
                                    <td>Nationality: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality  }}</td>
                                    <td>Passport Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_no }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Issue: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_date }}</td>
                                    <td>Place of Issue: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_place }} </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Expiry Date: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_expiry_date }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #d4d4d4">Permanent Address</td>
                                </tr>
                                <tr>
                                    <td>Country: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country }}</td>
                                    <td>House/Plot/Holding Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->house_no }}</td>
                                </tr>
                                <tr>
                                    <td>Flat/Apartment/Floor Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->flat_no }}</td>
                                    <td>Street Name/Street Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->road_no }} </td>
                                </tr>
                                <tr>
                                    <td><b></b> </td>
                                    <td><b></b> </td>
                                </tr>
                                <tr>
                                    <td>Post/Zip Code: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->post_code }}</td>
                                    <td>State/Province: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->state }}</td>
                                </tr>
                                <tr>
                                    <td>Telephone Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->phone }}</td>
                                    <td>City: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->city }}</td>
                                </tr>
                                <tr>
                                    <td>Fax Number:  {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->fax_no }}</td>
                                    <td>Email: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->email }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->date_of_birth }}</td>
                                    <td>Marital Status: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            C. EMPLOYMENT INFORMATION
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Name of the post employed for (Designation): {{ $nVisaEdit->nVisaEmploymentInformation->employed_designation }}</td>
                                    <td>Date of arrival in Bangladesh:  {{ $nVisaEdit->nVisaEmploymentInformation->date_of_arrival_in_bangladesh }}</td>
                                </tr>
                                <tr>
                                    <td>Type of visa: N-Visa </td>
                                    <td>Date of first assignment: {{ $nVisaEdit->nVisaEmploymentInformation->first_appoinment_date }}</td>
                                </tr>
                                <tr>
                                    <td>Desired Effective Date: {{ $nVisaEdit->nVisaEmploymentInformation->desired_effective_date }}</td>
                                    <td>Desired End Date: {{ $nVisaEdit->nVisaEmploymentInformation->desired_end_date }}</td>
                                </tr>
                                <tr>
                                    <td>Desired Duration: {{ $nVisaEdit->nVisaEmploymentInformation->visa_validity }}</td>
                                    <td>Brief job description: {{ $nVisaEdit->nVisaEmploymentInformation->brief_job_description }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Employee Justification: {{ $nVisaEdit->nVisaEmploymentInformation->employee_justification }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            D. WORKPLACE ADDRESS
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>House/Plot/Holding/Village:  {{ $nVisaEdit->nVisaWorkPlaceAddress->work_house_no }}</td>
                                    <td>Flat/Apartment/Floor: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_flat_no }}</td>
                                </tr>
                                <tr>
                                    <td>Road Number: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_road_no }} </td>
                                    <td>City/District {{ $nVisaEdit->nVisaWorkPlaceAddress->work_district }}</td>
                                </tr>
                                <tr>
                                    <td>Thana/Upazilla: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_thana }} </td>
                                    <td>Email: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_email }}</td>
                                </tr>
                                <tr>
                                    <td>Type of Organization: NGO</td>
                                    <td>Contact Person Mobile Number: {{ $nVisaEdit->nVisaWorkPlaceAddress->contact_person_mobile_number }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Basic Salary')->first();


$mainDatac =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->first();



?>

<!--compansation --->

@if(!$mainDatac)
<div class="card mt-3 ">
<div class="card-header custom-color">
E.COMPENSATION AND BENIFITS
</div>
<div class="card-body">
No Information Available
</div>
</div>
@else
<div class="card mt-3 ">
<div class="card-header custom-color">
E.COMPENSATION AND BENIFITS
</div>
<div class="card-body">
<table class="table table-bordered">
<tr>
<td><b>Salary Structure</b></td>
<td colspan="3"><b>Payble Locally</b></td>
</tr>
<tr>
<td></td>
<td>Payment</td>
<td>Amount</td>
<td>Currency</td>
</tr>
@if(!$basic)

@else
<tr>
<td>a. Basic Salary</td>
<td>{{ $basic->payment_type }}</td>
<td>{{ $basic->amount }}</td>
<td>{{ $basic->currency }}</td>
</tr>
@endif
@if(!$overseas)

@else
<tr>
<td>b. Overseas allowance</td>
<td>{{ $overseas->payment_type }}</td>
<td>{{ $overseas->amount }}</td>
<td>{{ $overseas->currency }}</td>
</tr>
@endif

@if(!$house)

@else
<tr>
<td>c. House rent/Accommodation</td>
<td>{{ $house->payment_type }}</td>
<td>{{ $house->amount }}</td>
<td>{{ $house->currency }}</td>
</tr>
@endif
@if(!$convoy)

@else
<tr>
<td>d. Conveyance</td>
<td>{{ $convoy->payment_type }}</td>
<td>{{ $convoy->amount }}</td>
<td>{{ $convoy->currency }}</td>
</tr>
@endif
@if(!$entertainment)

@else
<tr>
<td>e. Entertainmemt allowance</td>
<td>{{ $entertainment->payment_type }}</td>
<td>{{ $entertainment->amount }}</td>
<td>{{ $entertainment->currency }}</td>
</tr>
@endif
@if(!$medical)

@else
<tr>
<td>f. Medical allowance</td>
<td>{{ $medical->payment_type }}</td>
<td>{{ $medical->amount }}</td>
<td>{{ $medical->currency }}</td>
</tr>
@endif
@if(!$annual)

@else
<tr>
<td>g. Annual Bonus</td>
<td>{{ $annual->payment_type }}</td>
<td>{{ $annual->amount }}</td>
<td>{{ $annual->currency }}</td>
</tr>
@endif
<tr>
<td>h. Other fringe benefits, if any</td>
<td colspan="3">{{ $nVisaEdit->other_benefit }}</td>
</tr>
<tr>
<td>i. Any Particular Comments of remarks</td>
<td colspan="3">{{ $nVisaEdit->salary_remarks }}</td>
</tr>
</table>
</div>
</div>

@endif


<!--end compansation -->



                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            F. Manpower of the office
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><b>Local (a)</b></td>
                                    <td colspan="3"><b>Foreign  (b)</b></td>
                                    <td rowspan="2"><b>Grand Total
                                        (a+b)</b></td>
                                    <td colspan="2"><b>Ratio</b></td>
                                </tr>
                                <tr>
                                    <td>Executive</td>
                                    <td>Supporting Staff </td>
                                    <td>Total</td>
                                    <td>Executive</td>
                                    <td>Supporting Staff</td>
                                    <td>Total</td>
                                    <td>Local </td>
                                    <td>Foreign</td>
                                </tr>
                                @if(!$nVisaEdit->nVisaManpowerOfTheOffice)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_executive }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_supporting_staff }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_total }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_executive }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_supporting_staff }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_total }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->gand_total }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_ratio }}</td>
                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_ratio }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                            G. Necessary Document for Work Permit (PDF)
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>#</th>
<th>Required Attachment</th>
<th>Action</th>
                                </tr>
                                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                                {{-- <tr>
                                    <td>1</td>
                                    <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                    <td>







                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                    <td></td>
                                </tr> --}}
                                <tr>
                                    <td>1</td>
                                    <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
<td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
<td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
<td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
                                    <td></td>
                                </tr>

                                @else


                                {{-- <tr>
                                    <td>1</td>
                                    <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                    <td>


                                       @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->nomination_letter_of_buyer))


                                       @else

                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                    <td>

                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->registration_letter_of_board_of_investment))


                                        @else

                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                         @endif

                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>1</td>
                                    <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                    <td>

                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->employee_contract_copy))


                                        @else

                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                         @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                    <td>

                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->board_of_the_directors_sign_lette))


                                        @else

                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                         @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                    <td>
                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->share_holder_copy))


                                        @else

                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                         @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors/Passport</td>
                                    <td>
                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->passport_photocopy))


                                        @else

                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                         @endif
                                    </td>
                                </tr>


                                @endif
                                </tbody></table>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header custom-color">
                           H. Authorized Personal of the organization
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Organization Name: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_name }}</td>
                                    <td>Organization House No: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_house_no }}</td>
                                </tr>
                                <tr>
                                    <td>Organization Flat No:: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_flat_no }}</td>
                                    <td>Organization Road No: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_road_no }}</td>
                                </tr>
                                <tr>
                                    <td>Organization Thana: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_thana }}</td>
                                    <td>Organization Post Office: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_post_office }}</td>
                                </tr>
                                <tr>
                                    <td>Organization District: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_district }}</td>
                                    <td>Organization Mobile: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_mobile }}</td>
                                </tr>
                                <tr>
                                    <td>Submission Date:  {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->submission_date }}</td>
                                    <td>Expatriate Name: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_name }}</td>
                                </tr>
                                <tr>
                                    <td>Expatriate Email: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_email }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

          </div>

    </div>
</div>
<!-- new code for fd 9  and nvisa -->
  <!-- new code start --->

  <div class="d-flex justify-content-between mt-3">
    <div class="">


    </div>
    <div class="">
        <input type="hidden" data-parsley-required  name="id"  value="{{ $fd9OneList->id }}" class="form-control" id="mainId">
        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
            <i class="fa fa-print"></i>
        </button>


        @if($fd9OneList->status == 'Ongoing' || $fd9OneList->status == 'Accepted')

                        @else

                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $fd9OneList->id}})" class="btn btn-info">
                            এনজিওতে পাঠান <i class="fa fa-send-o"></i>
                        </button>

                            <form id="delete-form-{{ $fd9OneList->id }}" action="{{ route('finalFdNineOneApplicationSubmit',base64_encode($fd9OneList->id)) }}" method="get" style="display: none;">

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
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
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
        url: "{{ route('fd9OneChief') }}",
        method: 'GET',
        data: {name:name,designation:designation,id:id},
        success: function(data) {



            window.open(data);

        }
        });

  });
  </script>
@endsection
