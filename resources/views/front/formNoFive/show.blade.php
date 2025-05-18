@extends('front.master.master')

@section('title')
{{ trans('formNoFive.formNoFive')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{Route::is('formNoFive.show') || Route::is('formNoFiveStepFive') || Route::is('formNoFiveStepFour') || Route::is('formNoFiveStepThree') || Route::is('formNoFiveStepTwo') || Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
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

                            <!-- new code start --->

                            <div class="d-flex justify-content-between mt-3">
                                <div class="">


                                </div>
                                <div class="">

                                    @if($formFiveData->status == 'Ongoing')


                                    @else




                                    <button class="btn btn-primary" onclick="location.href = '{{ route('formNoFive.edit',base64_encode($formFiveData->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                    @endif

                                    <button class="btn btn-success" onclick="location.href = '{{ route('formNoFivePdfDownload',base64_encode($formFiveData->id)) }}';"     data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                                        <i class="fa fa-print"></i>
                                    </button>


                                </div>
                            </div>

                            <!-- new code end -->

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">


                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    @include('flash_message')

                                    <table class="table table-borderless">
                                        <tr>
                                            <td>ক. প্রকল্পের নাম</td>
                                            <td>: {{ $formFiveData->prokolpo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>খ. প্রকল্পের মোট মেয়াদকাল</td>
                                            <td>: {{ $formFiveData->prokolpo_duration }} </td>
                                        </tr>

                                        <tr>
                                            <td>গ. ব্যুরোর অনুমোদনের নম্বর ও তারিখ</td>
                                            <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFiveData->ngo_registration_number.' ও '.$formFiveData->ngo_registration_date) }} </td>
                                        </tr>


                                        <tr>
                                            <td>ঘ. অনুমোদিত প্রাক্কলিত ব্যয় (বছর ভিত্তিক)</td>
                                            <td>: {{ $formFiveData->approved_estimated_expenditure_year_wise }}</td>
                                        </tr>

                                        <tr>
                                            <td>ঙ. প্রতিবেদনকালে ছাড়কৃত অর্থের পরিমাণ</td>
                                            <td>: {{ $formFiveData->received_money_during_report }}</td>
                                        </tr>

                                        <tr>
                                            <td>চ. প্রতিবেদনকাল (প্রকল্প বর্ষ)</td>
                                            <td>: {{ $formFiveData->report_year }}</td>
                                        </tr>

                                        <tr>
                                            <td>ছ. প্রকল্পের বিবেচ্য সময়ে অর্জনের শতকরা হার</td>
                                            <td>: {{ $formFiveData->percentage_of_achievement_during_project }}</td>
                                        </tr>

                                        <tr>
                                            <td>জ. প্রতিবেদনকালে বাস্তবায়িত এলাকা</td>
                                            <td>: {{ $formFiveData->prokolpo_araea }}</td>
                                        </tr>

                                    </table>

                                    <table class="table table-bordered mt-3" style="text-align: center;">
                                        <tr>
                                            <th>জেলা</th>
                                            <th>সিটি কর্পোরেশন/উপজেলা/থানা/পৌরসভা</th>
                                            <th>ইউনিয়ন/ওয়ার্ড</th>
                                        </tr>
                                        @foreach($formNoFiveStepFiveArea as $key=>$prokolpoAreaListAll)
                                        <tr>
                                            <td>{{ $prokolpoAreaListAll->district_name }}</td>
                                            <td>

                                                @if( $prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                @else

                                                {{ $prokolpoAreaListAll->city_corparation_name  }}

                                                @endif

                                                /{{ $prokolpoAreaListAll->upozila_name }}/{{ $prokolpoAreaListAll->thana_name }}/{{ $prokolpoAreaListAll->municipality_name }}


                                            </td>
                                            <td>{{ $prokolpoAreaListAll->ward_name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>


                                    <div class="card-header text-center">প্রকল্পের খাতভিত্তিক বিবরণী</div>


                                    <div class="table-responsive">


                                        <table class="table table-bordered mt-3" style="text-align: center;">
                                            <tr>
                                                <th rowspan="2">ক্র : নং :</th>
                                                <th rowspan="2">এনেক্সার - সি এর খাত</th>
                                                <th rowspan="2">খাত ওয়ারী বাজেট</th>
                                                <th rowspan="2">কার্যক্রম ও লক্ষ্যমাত্রা</th>
                                                <th rowspan="2">কার্যক্রম ওয়ারী বিভাজিত বাজেট</th>
                                                <th rowspan="2">কার্যক্রম ভিত্তিক অর্জিত লক্ষ্যমাত্রা</th>
                                                <th rowspan="2">কার্যক্রম ভিত্তিক প্রকৃত ব্যয়</th>
                                                <th rowspan="2">খাতওয়ারী মোট  প্রকৃত ব্যয়</th>
                                                <th colspan="2">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি বাস্তব</th>
                                                {{-- <th>প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি আর্থিক</th> --}}
                                                <th rowspan="2">মন্তব্য</th>

                                            </tr>
                                            <tr>
                                                <th>বাস্তব</th>
                                                <th>আর্থিক</th>
                                            </tr>
                                            @foreach($formNoFiveStepTwoData as $key=>$formNoFiveStepTwoDatas)
                                            <tr>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->sector_of_annexure_C }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->sector_wise_budget}}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->activities_and_objectives}}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->activity_wise_segmented_budget }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->activity_based_achievement_targets }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->activity_based_actual_costing }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->accounts_payable_total_actual_expenditure }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_real }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_financial }}</td>
                                                <td>{{ $formNoFiveStepTwoDatas->comment }}</td>

                                            </tr>
                                            @endforeach
                                        </table>

                                    </div>

                                    <div class="card-header text-center">উপজেলা ওয়ারী প্রকল্পের আর্থিক বিবরণী (ছক-২)</div>


                                    <table class="table table-borderless">
                                        <tr>
                                            <td>প্রকল্পের নাম</td>
                                            <td>: {{ $formFiveData->prokolpo_name_one }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রতিবেদনাধীন সময়</td>
                                            <td>: {{ $formFiveData->reporting_period }} </td>
                                        </tr>

                                    </table>

                                    <div class="table-responsive">


                                        <table class="table table-bordered mt-3" style="text-align: center;">
                                            <tr>
                                                <th >ক্র : নং :</th>
                                                <th >জেলার নাম</th>
                                                <th >উপজেলার নাম</th>
                                                <th >উপজেলার জন্য মোট বরাদ্দ</th>
                                                <th >মোট প্রকৃত ব্যয়</th>
                                                <th >মন্তব্য</th>

                                            </tr>

                                            @foreach($formNoFiveStepThreeData as $key=>$formNoFiveStepThreeDatass)
                                            <tr>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                <td>{{ $formNoFiveStepThreeDatass->district_name }}</td>
                                                <td>{{ $formNoFiveStepThreeDatass->upazila_name}}</td>
                                                <td>{{ $formNoFiveStepThreeDatass->total_allocation_for_upazila}}</td>
                                                <td>{{ $formNoFiveStepThreeDatass->total_actual_cost }}</td>
                                                <td>{{ $formNoFiveStepThreeDatass->comment }}</td>

                                            </tr>
                                            @endforeach
                                        </table>

                                    </div>

                                    <div class="card-header text-center">যানবাহনসহ সংস্থার সকল স্থাবর/অস্থাবর সম্পদের পূর্ণাঙ্গ তালিকা</div>
                                    <div class="table-responsive">


                                        <table class="table table-bordered mt-3" style="text-align: center;">
                                            <tr>
                                                <th rowspan="2">ক্র : নং :</th>
                                                <th rowspan="2">সম্পদ / সম্পত্তির বিবরণ</th>
                                                <th rowspan="2">পরিমাণ /সংখ্যা</th>
                                                <th rowspan="2">প্রাপ্তি/সংগ্রহের তারিখ</th>
                                                <th rowspan="2">প্রকৃত ক্রয় মূল্য</th>
                                                <th rowspan="2">অর্থের উৎস</th>
                                                <th rowspan="2">কি কাজে ব্যবহৃত হতেছে</th>
                                                <th rowspan="2">অবস্থান(স্থান)</th>
                                                <th rowspan="2">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )</th>
                                                <th colspan="2">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত</th>
                                                <th colspan="2">বর্তমান অবস্থা</th>

                                            </tr>
                                            <tr>
                                                <th>(সংখ্যা /পরিমাণ )</th>
                                                <th>সর্বমোট ক্রয়মূল্য </th>
                                                <th>সচল</th>
                                                <th>অচল</th>
                                            </tr>
                                            @foreach($formNoFiveStepFourData as $key=>$formNoFiveStepFourDatas)
                                            <tr>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                <td>{{ $formNoFiveStepFourDatas->description_of_property }}({{ $formNoFiveStepFourDatas->sub_property }})</td>
                                                <td>{{ $formNoFiveStepFourDatas->quantity}}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formNoFiveStepFourDatas->collect_date)}}</td>
                                                <td>{{ $formNoFiveStepFourDatas->real_buying_price }}</td>
                                                <td>{{ $formNoFiveStepFourDatas->fund_source }}</td>
                                                <td>{{ $formNoFiveStepFourDatas->what_is_it_used_for }}</td>
                                                <td>{{ $formNoFiveStepFourDatas->place}}</td>
                                                <td>{{ $formNoFiveStepFourDatas->assets_sold_transferred_number_or_quantity}}</td>
                                                <td>{{ $formNoFiveStepFourDatas->quantity_during_start_of_organization }}</td>
                                                <td>{{ $formNoFiveStepFourDatas->total_during_start_of_organization }}</td>
                                                <td>

                                                    @if($formNoFiveStepFourDatas->current_status == 'সচল')
                                                    সচল
                                                    @else

                                                    @endif

                                                </td>
                                                <td>

                                                    @if($formNoFiveStepFourDatas->current_status == 'অচল')
                                                    অচল
                                                    @else

                                                    @endif

                                                </td>

                                            </tr>
                                            @endforeach
                                        </table>

                                    </div>

                                    <table class="table table-borderless mt-3">
                                        <tr>
                                            <td>* জমি/যানবাহন  যার নামে রেজিস্ট্রিকৃত তার বিস্তারিত তথ্য উল্লেখ করতে হবে</td>
                                            <td>: {{ $formFiveData->land_and_transport_detail }}</td>
                                        </tr>
                                        <tr>
                                            <td>* ব্যুরোর অনুমোদনের প্রমাণক সংযুক্ত করতে হবে</td>
                                            <td>:

                                                <a target="_blank"  href="{{ route('formNoFiveRetaltedPdf',['title'=>'approval_file_of_Bureau','id'=>base64_encode($formFiveData->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন</a>

                                            </td>
                                        </tr>

                                    </table>

                                    <div class="card-header text-center">সংস্থার কর্মকর্তা ও কর্মচারীদের বিদেশ ভ্রমণের বিবরণ</div>

                                    <div class="table-responsive">

                                        <table class="table table-bordered mt-3" style="text-align: center;">
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

                                            </tr>
                                            <tr>
                                                <th colspan="2">দাতা সংস্থার নাম,দেশ</th>
                                            </tr>
                                            @foreach($formNoFiveStepFiveData as $key=>$formNoFiveStepFiveDatas)
                                            <tr>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->name_of_the_officer }}({{ $formNoFiveStepFiveDatas->designation_of_the_officer }})</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formNoFiveStepFiveDatas->joining_date)}}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->travel_country}}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->organizing_organization_name }}({{ $formNoFiveStepFiveDatas->organizing_organization_address }})</td>
                                                <td>{{ $formNoFiveStepFiveDatas->name_of_training_course }}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->course_duration }}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->total_expense}}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->name_of_donor_organization}}</td>
                                                <td>{{ $formNoFiveStepFiveDatas->country_name_of_donor_organization }}</td>


                                            </tr>
                                            @endforeach
                                        </table>

                                    </div>

                                    <table class="table table-borderless mt-3">
                                        <tr>
                                            <td>* সভা, সেমিনার, কর্মশালা,সম্মেলন ইত্যাদিও প্রশিক্ষণ হিসাবে গণ্য হবে</td>
                                            <td>: {{ $formFiveData->foreign_tour_detail }}</td>
                                        </tr>
                                        <tr>
                                            <td>* দাপ্তরিক কাজে বিদেশ ভ্রমণ শেষে ভ্রমণের অর্জন উল্লেখপূর্বক প্রতিবেদন দাখিলের প্রমাণক সংযুক্ত করতে হবে</td>
                                            <td>:

                                                <a target="_blank"  href="{{ route('formNoFiveRetaltedPdf',['title'=>'foreign_tour_file','id'=>base64_encode($formFiveData->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>



                                            </td>
                                        </tr>

                                    </table>

                                    <p style="font-weight:900;margin-top:15px;">২৫০০০/- (পঁচিশ হাজার ) টাকার উর্ধ্বে (পরবর্তীতে ন্যূনতম করমুক্ত আয়সীমার সাথে সমন্বয় সাপেক্ষে ) মাসিক বেতন গ্রহণকারী কর্মকর্তা - কর্মচারীদের বিবরণ :</p>

                                    <div class="table-responsive">

                                        <table class="table table-bordered mt-3" style="text-align: center;">
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


                                            </tr>
                                            @endforeach
                                        </table>


                                    </div>

                                    <table class="table table-borderless mt-3">

                                        <tr>
                                            <td style="text-align: left;">

                                                <table style=" margin-top: 15px;width:100%">

                                                    <tr>
                                                        <td style="text-align: left;" ><img  src="{{ asset('/') }}{{ $formFiveData->report_preparar_sign }}"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;" >{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFiveData->report_preparar_date) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;" ><img  src="{{ asset('/')}}{{ $formFiveData->report_preparar_seal }}"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;padding-top:15px;" >রিপোর্ট প্রুস্তুতকারীর স্বাক্ষর ও সিল :</td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td></td>
                                            <td style="text-align: right;">এনজিও প্রধানের স্বাক্ষর ও সিল :</td>
                                        </tr>

                                    </table>

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

                        @if($formFiveData->status == 'Ongoing')


                        @else


                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $formFiveData->id}})" class="btn btn-info">
                            এনজিওতে পাঠান <i class="fa fa-send-o"></i>
                        </button>

                            <form id="delete-form-{{ $formFiveData->id }}" action="{{ route('formNoFiveSend',base64_encode($formFiveData->id)) }}" method="get" style="display: none;">

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
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
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
