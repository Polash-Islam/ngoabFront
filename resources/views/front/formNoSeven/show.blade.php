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


                            <!-- new code start --->

                            <div class="d-flex justify-content-between mt-3">
                                <div class="">


                                </div>
                                <div class="">

                                    @if($formSevenData->status == 'Ongoing' || $formSevenData->status == 'Accepted')


                                    @else


                                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $formSevenData->id}})" class="btn btn-info">
                                        <i class="fa fa-send-o"></i>
                                    </button>

                                        <form id="delete-form-{{ $formSevenData->id }}" action="{{ route('formNoSevenSend',base64_encode($formSevenData->id)) }}" method="get" style="display: none;">

                                            @csrf


                                        </form>




                                    <button class="btn btn-primary" onclick="location.href = '{{ route('formNoSeven.edit',base64_encode($formSevenData->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                    @endif

                                    <button class="btn btn-success" onclick="location.href = '{{ route('formNoSevenPdfDownload',base64_encode($formSevenData->id)) }}';"     data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                                        <i class="fa fa-print"></i>
                                    </button>


                                </div>
                            </div>

                            <!-- new code end -->



                                    <div class="form9_upper_box" style="text-align: center;">
                                        <h3>{{ trans('formNoSeven.formNoSeven')}}<br>
                                            <span style="font-size:12px;">[আবশ্যিকভাবে বাংলা নিকোস ফন্টে পূরণ করে দাখিল করতে হবে]</span><br>
                                            <span style="font-size: 14px;font-weight:normal;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</span>
                                        </h3>
                                            <h4 style="font-size: 14px;">
                                                জেলা প্রশাসকের কার্যালয়, <span style="font-weight:bold;">{{ $formSevenData->district_address }}</span>/উপজেলা নির্বাহী অফিসারের কার্যালয়, <span style="font-weight:bold;">{{ $formSevenData->upazila_address }}<span></h4>
                                            <h4 style="font-size: 14px;">প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্রের </h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4">

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>স্মারক নং: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->sarok_number) }}</td>

                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">

                                            <table class="table table-borderless text-center" style="">

                                                <tr>
                                                    <td style="font-weight:900;font-size:15px;">'ছক'</td>

                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">

                                            <table class="table table-borderless" style="text-align: right;">

                                                <tr>
                                                    <td>তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->submit_date) }}</td>

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
                                                    <td> এনজিও'র নাম ও ঠিকানা  </td>
                                                    <td>{{ $formSevenData->ngo_name }}, {{ $formSevenData->ngo_address }}</td>
                                                    <td>{{ $formSevenData->ngo_name_address_comment }}</td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td> এনজিও প্রধানের নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস </td>
                                                    <td>{{ $formSevenData->ngo_head_name }}, {{ $formSevenData->ngo_head_organization }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_head_office_mobile) }}, {{ $formSevenData->ngo_head_office_email }}</td>
                                                    <td>{{ $formSevenData->ngo_head_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>

                                                        <span>১. এনজিও'র নিবন্ধন নম্বর ও তারিখ <br>

                                                            ২. সর্বশেষ নবায়নের তারিখ ও মেয়াদকাল
                                                    </span>

                                                </td>
                                                    <td>


                                                        <span>১. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_registration) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_registration_date) }}<br>

                                                        ২.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_last_renewal_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_duration) }}
                                                </span>


                                                    </td>
                                                    <td>{{ $formSevenData->ngo_reg_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/আঞ্চলিক  অফিসের দায়িত্বপ্রাপ্ত এনজিও কর্মকর্তার নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস </td>
                                                    <td>{{ $formSevenData->ngo_local_officer_name }}, {{ $formSevenData->ngo_local_officer_designation }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_local_officer_mobile) }},{{ $formSevenData->ngo_local_officer_email }}</td>
                                                    <td>{{ $formSevenData->ngo_local_officer_comment }}</td>
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
                                                    <td><span>১. প্রকল্পের নাম <br>

                                                        ২.  মেয়াদকাল <br>
                                                        ৩.  টাকার পরিমাণ
                                                </span></td>
                                                    <td>


                                                        <span>১. {{ $formSevenData->prokolpo_name }}<br>

                                                        ২. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_duration) }} <br>
                                                        ৩. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_fund) }}
                                                </span>



                                                    </td>
                                                    <td>{{ $formSevenData->prokolpo_comment }}</td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>প্রকল্প অনুমোদনের তারিখ ও স্মারক নম্বর, প্রত্যয়নপত্র প্রদানের বছর / সময়  </td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_approval_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_sarok_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_certificate_year_and_time) }}</td>
                                                    <td>{{ $formSevenData->prokolpo_approval_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>প্রকল্পের উদ্দেশ্য </td>
                                                    <td>{{ $formSevenData->prokolpo_objecttive }}</td>
                                                    <td>{{ $formSevenData->prokolpo_objecttive_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/উপজেলায় ব্যুরো কর্তৃক অনুমোদিত প্রকল্পের কপি স্থানীয় প্রশাসন কর্তৃক গ্রহণের তারিখ </td>
                                                    <td>{{ $formSevenData->project_copy_approved_by_burea }}</td>
                                                    <td>{{ $formSevenData->project_copy_approved_by_burea_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঙ)</td>
                                                    <td style="font-weight:bold;">তার এখতিয়ারাধীন এলাকার সংশ্লিষ্ট তথ্য </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td><span>১. তাঁর জেলা/উপজেলায় প্রকল্পের জন্য বরাদ্দ <br>

                                                        ২.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে বরাদ্দ <br>
                                                        ৩.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে প্রকৃত ব্যয় <br>
                                                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <br>
                                                        <span style="padding-left: 10px;">ক. প্রত্যক্ষ উপকারভোগীর সংখ্যা <br>
                                                            <span style="padding-left: 10px;">খ. পরোক্ষ উপকারভোগীর সংখ্যা(প্রযোজ্য ক্ষেত্রে)</span>
                                                        </span>

                                                </span></td>
                                                    <td>


                                                        <span>১.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->allocation_for_projects_in_district_or_upazila) }}<br>

                                                        ২.   {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->this_year_under_discussion_multi_year_projects) }}<br>
                                                        ৩.   {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->actual_expenditure_multi_year_projects) }}<br>
                                                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <br>
                                                        <span style="padding-left: 10px;">ক.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->direct_beneficiaries_quantity) }}<br>
                                                            <span style="padding-left: 10px;">খ.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->indirect_beneficiaries_quantity) }}</span>
                                                        </span>

                                                </span>

                                                    </td>
                                                    <td>{{ $formSevenData->jurisdiction_comment }}</td>
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
                                                    <td><span>১. স্থানীয় প্রশাসন কর্তৃক কত বার প্রকল্পটি পরিদর্শন করা হয়েছে  <br>

                                                        ২.  পরিদর্শনকারী কর্মকর্তার নাম, পদবি, মোবাইল নম্বর ও ইমেইল এড্রেস
                                                </span></td>
                                                    <td>

                                                        <span>১. {{ $formSevenData->project_inspected_time }} <br>

                                                        ২. {{ $formSevenData->inspector_name }}, {{ $formSevenData->inspector_designation }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->inspector_mobile) }}, {{ $formSevenData->inspector_email }}
                                                </span>

                                                    </td>
                                                    <td>{{ $formSevenData->inspector_comment }}</td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>উপকারভোগী নির্বাচনে স্থানীয় প্রশাসনকে সম্পৃক্ত করা হয়েছে কিনা, হয়ে থাকলে তার সংক্ষিপ্ত বিবরণী </td>
                                                    <td>{{ $formSevenData->beneficiaries_involved_with_local_administration }}</td>
                                                    <td>{{ $formSevenData->beneficiaries_involved_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>এনজিও প্রতিনিধি জেলা/উপজেলায় এনজিও বিষয়ক সমন্বয় সভায় নিয়মিত অংশগ্রহণ করেন কিনা </td>
                                                    <td>{{ $formSevenData->regular_participation_in_meeting }}</td>
                                                    <td>{{ $formSevenData->regular_participation_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>এনজিও বিষয়ক ব্যুরোর অনুমোদন পত্রের শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা </td>
                                                    <td>{{ $formSevenData->conditions_properly_met }}</td>
                                                    <td>{{ $formSevenData->conditions_properly_comment }}</td>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step four start --->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৪.</td>
                                                    <td></td>
                                                    <td>পার্টনার এনজিও হলে মূল এনজিও বিষয়ক তথ্যাদি (প্রযোজ্য ক্ষেত্রে)</td>
                                                    <td>{{ $formSevenData->mian_ngo_detail }}</td>
                                                    <td>{{ $formSevenData->main_ngo_detail_comment }}</td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td>মূল এনজিও'র নাম ও ঠিকানা</td>
                                                    <td>{{ $formSevenData->main_ngo_name }}, {{ $formSevenData->main_ngo_address }}</td>
                                                    <td>{{ $formSevenData->main_ngo_comment }}</td>
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
                                                    <td>প্রকল্প সমাপনী প্রতিবেদন /বার্ষিক প্রতিবেদনে জেলা প্রশাসক/উপজেলা নির্বাহী অফিসারের প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা </td>
                                                    <td>{{ $formSevenData->sign_in_closing_report }}</td>
                                                    <td>{{ $formSevenData->sign_in_closing_report_comment }}</td>
                                                </tr>

                                                <!-- step five end --->

                                                <!-- step six start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৬.</td>
                                                    <td></td>
                                                    <td>
                                                        <span>১. বাস্তবায়িত প্রকল্প সম্পর্কে মতামত <br>

                                                            ২.  বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ (প্রত্যয়নকারী কর্মকর্তার স্বহস্তে লিখা কাম্য)
                                                    </span>
                                                    </td>
                                                    <td>

                                                        <span>১. {{ $formSevenData->feedback_on_projects_implementedt }}<br>

                                                            ২.  {{ $formSevenData->recommendation_on_projects_implementedt }}
                                                    </span>

                                                    </td>
                                                    <td>{{ $formSevenData->last_comment }}</td>
                                                </tr>

                                                <!-- step six end -->

                                            </table>



                                            <table class="table table-borderless mt-3">

                                                <tr>
                                                    <td style="text-align: center;width: 25%">

                                                        <span style="text-align: center;"><span style="font-weight:900;">মহাপরিচালক (গ্রেড -১)</span><br>
                                                            এনজিও বিষয়ক ব্যুরো<br>
                                                            প্রধানমন্ত্রীর কার্যালয়<br>
                                                            প্লট -ই, ১৩-বি, আগারগাঁও<br>
                                                            শেরে বংলা নগর,ঢাকা -১২০৭</span>
<p style="font-weight:900;margin-top:15px;">অনুলিপি :{{ $formSevenData->onulipi }}</p>

                                                    </td>
                                                    <td style="text-align: center;width: 52%">
                                                    </td>
                                                    <td style="text-align: center;width: 23%">

                                                        <table style=" margin-top: 15px;width:100%">
                                                            <tr>
                                                                <td style="text-align: center;" >{{ $formSevenData->name_certifying_officer }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;" >{{ $formSevenData->designation_certifying_officer }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td style="text-align: center;" ><img  src="{{ asset('/') }}{{ $formSevenData->signature_certifying_officer }}"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;" >{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->submit_date) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;" ><img  src="{{ asset('/')}}{{ $formSevenData->seal_certifying_officer }}"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;padding-top:15px;" >প্রত্যয়নকারি কর্মকর্তার নাম ও পদবি (সিলযুক্ত)</td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                    <td></td>

                                                </tr>

                                            </table>







                                        </div>
                                    </div>
                                    <!-- step one end --->





                        </div>
                    </div>
                </div>

 <!-- new code start --->

 <div class="d-flex justify-content-between mt-3">
    <div class="">


    </div>
    <div class="">

        @if($formSevenData->status == 'Ongoing' || $formSevenData->status == 'Accepted')


        @else


        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $formSevenData->id}})" class="btn btn-info">
            এনজিওতে পাঠান <i class="fa fa-send-o"></i>
        </button>

            <form id="delete-form-{{ $formSevenData->id }}" action="{{ route('formNoSevenSend',base64_encode($formSevenData->id)) }}" method="get" style="display: none;">

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
@endsection
