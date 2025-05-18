@extends('front.master.master')

@section('title')
{{ trans('fd9.fc2')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.show') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.show') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.show') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.show') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.show')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.show')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a style="display: none;">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.show')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.show')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.show')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.show')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.show')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
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

                             <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fc2pdfview',base64_encode($fc2FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>
                        @if($fc2FormList->status == 'Ongoing' || $fc2FormList->status == 'Accepted')

                                        @else


                        <button class="btn btn-primary" onclick="location.href = '{{ route('fc2Form.edit',base64_encode($fc2FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->


                        <div class="form9_upper_box">
                            <h3>এফসি - ২ ফরম</h3>
                            <h4>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</h4>
                        </div>



                                <table class="table table-bordered" style="width:100%">



                                    <tr>
                                        <th style="text-align: center;" rowspan="10">১.</th>

                                        <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণকারী ব্যাক্তির তথ্য</td>


                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ক.</td>
                                        <td>  পূর্ণ নাম </td>
                                        <td>{{ $fc2FormList->person_full_name }}
                                        </td>

                                    </tr>
                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>পিতার নাম  </td>
                                        <td> {{ $fc2FormList->person_father_name }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>মাতার নাম </td>
                                        <td>{{ $fc2FormList->person_mother_name }}</td>

                                    </tr>


                                    <tr>

                                        <td style="text-align: center;">ঘ.</td>
                                        <td>পেশা </td>
                                        <td>{{ $fc2FormList->person_occupation }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ঙ.</td>
                                        <td>জাতীয় পরিচয়পত্র নম্বর  </td>
                                        <td>{{ $fc2FormList->person_nid }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">চ.</td>
                                        <td>পাসপোর্ট নম্বর (যদি থাকে) </td>
                                        <td>{{ $fc2FormList->person_passport }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ছ.</td>
                                        <td>টি আই এন নম্বর  </td>
                                        <td>{{ $fc2FormList->person_tin }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">জ.</td>
                                        <td>জাতীয়তা /নাগরিকত্ব  </td>
                                        <td>{{ $fc2FormList->person_nationality }}</td>

                                    </tr>


                                    <tr>

                                        <td style="text-align: center;">ঝ.</td>
                                        <td>পূর্ণ ঠিকানা (টেলিফোন,মোবাইল ,ই -মেইলসহ ) </td>
                                        <td>{{ $fc2FormList->person_full_address }} ({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_tele_phone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_mobile) }}, {{ $fc2FormList->person_email }})</td>

                                    </tr>
                                  <!-- step one start  -->
                                  <!-- step one start  -->



                                    <!-- step two strat --->

                                    <tr>
                                        <th style="text-align: center;" rowspan="4">২.</th>

                                        <td style="font-weight:bold;text-align:left;" colspan="2">প্রকল্পের মেয়াদ</td>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ক.</td>
                                        <td> আরম্ভের তারিখ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_start_date) }}</td>

                                    </tr>
                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>সমাপ্তির তারিখ</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_end_date) }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>প্রকল্পের ধরণ  </td>
                                        <td>

                                            <?php
                                            $subjectIdList  = explode(",",$fc2FormList->subject_id);
                                            $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                                            ->get();

                                            ?>
                                          @foreach($subjectListMain as $key=>$subjectListMains)

                                        @if(count($subjectListMain) == 1 )

                                        {{ $subjectListMains->name }}

                                        @else

                                        @if(count($subjectListMain) == ($key+1))
                                        {{ $subjectListMains->name }}

                                        @else

                                        {{ $subjectListMains->name }},

                                        @endif

                                        @endif

                                        @endforeach

                                    </td>

                                    </tr>





                                    <!-- step two end --->

                                    <!-- step three start -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="2">৩.</th>
                                        <td style="font-weight:bold;" colspan="3">অনুদান গ্রহণের উদ্দেশ্য</td>


                                    </tr>
                                    <tr>
                                        <td colspan="3">


                                            {!! $fc2FormList->purpose_of_donation !!}


                                               @if(empty($fc2FormList->purpose_of_donation_pdf))
                                               @else
                                               <a href="{{ route('fc2formextrapdf',['title'=>'purpose_of_donation_pdf','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                                @endif
                                        </td>
                                    </tr>
                                  <!-- step one start  -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="4">৪.</th>

                                        <td style="font-weight:bold;" colspan="2">কর্ম এলাকা ও বাজেট</td>
                                        <td></td>

                                    </tr>
                                    <tr>

                                        {{-- <td style="text-align: center;">ক.</td> --}}
                                        <td colspan="3" rowspan="3">

                                            <div class="table-responsive" id="tableAjaxDatapro">

                                                <table class="table table-bordered">

                                                    <tr style="text-align: center;">
                                                        <th >ক. কর্ম এলাকা (জেলা ও উপজেলা উল্লেখসহ) </th>
                                                        <th >খ. বিস্তারিত বাজেট বিবরণী (জেলা ও উপজেলাভিত্তিক ) </th>
                                                        <th >গ. মোট উপকারভোগীর সংখ্যা</th>

                                                    </tr>

                                                    @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                                                    <tr>
                                                        <td><span>বিভাগ: {{ $prokolpoAreaListAll->division_name }}
                                                            <br>

                                                            জেলা: {{ $prokolpoAreaListAll->district_name }}
                                                            <br>

                                                            @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                            @else
                                                            সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                                            <br>
                                                            @endif

                                                            @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                            @else
                                                            উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                                            @endif

                                                            থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                                            পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                                            ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}

                                                        </span></td>
                                                        <td><span>

                                                            প্রকল্পের ধরণ: {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
                                                            <br>
                                                            বরাদ্দকৃত বাজেট: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}
                                                        </span>

                                                            </td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}</td>

                                                    </tr>
                                                    @endforeach

                                                </table>
                                            </div>

                                </td>


                                    </tr>
                                    <tr>
                                    </tr>

                                    <tr>
                                    </tr>

                                    <!-- step three end -->

                                    <!-- step four start --->

                                    <tr>
                                        <th style="text-align: center;" rowspan="19">৫.</th>

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
                                        <td>পূর্ণ নাম </td>
                                        <td>{{ $fc2FormList->foreigner_donor_full_name }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>পেশা </td>
                                        <td>{{ $fc2FormList->foreigner_donor_occupation }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>যোগাযোগের ঠিকানা </td>
                                        <td>{{ $fc2FormList->foreigner_donor_address }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ঘ.</td>
                                        <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর </td>
                                        <td>

                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_fax) }} ও {{ $fc2FormList->foreigner_donor_email }}


                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ঙ.</td>
                                        <td>জাতীয়তা/নাগরিকত্ব </td>
                                        <td>{{ $fc2FormList->foreigner_donor_nationality }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">চ.</td>
                                        <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                            United Nations Security Council’s Resolution (UNSCR)
                                            কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা </td>
                                        <td>{{ $fc2FormList->foreigner_donor_is_verified }}</td>

                                    </tr>

                                    <tr>



                                        <td style="text-align: center;">ছ.</td>
                                        <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা </td>
                                        <td>{{ $fc2FormList->foreigner_donor_is_affiliatedrict }}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"> আ.</td>
                                    <th>সংস্থার ক্ষেত্রে</th>
                                    <td>

                                    </td>

                                </tr>

<tr>

                                        <td style="text-align: center;">ক.</td>
                                        <td>সংস্থার নাম </td>
                                        <td>{{ $fc2FormList->organization_name }}</td>

                                    </tr>


                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>অফিস/ সংস্থার ঠিকানা </td>
                                        <td>{{$fc2FormList->organization_address }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>টেলিফোন, ফ্যাক্স নম্বর </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_fax) }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ঘ.</td>
                                        <td>ই-মেইল ও ওয়েবসাইট </td>
                                        <td>{{ $fc2FormList->organization_email }} ও {{ $fc2FormList->organization_website }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ঙ.</td>
                                        <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                            United Nations Security Council’s Resolution (UNSCR)
                                            কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা </td>
                                        <td>
                                            {{ $fc2FormList->organization_is_verified }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">চ.</td>
                                        <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা </td>
                                        <td>
                                            {{ $fc2FormList->relation_with_donor }}

                                        </td>

                                    </tr>

                                    <tr>



                                        <td style="text-align: center;">ছ.</td>
                                        <td>প্রধান নির্বাহী কর্মকর্তার নাম ও পদবি </td>
                                        <td>
                                           {{ $fc2FormList->organization_ceo_name }}
                                           ও
                                            {{ $fc2FormList->organization_ceo_designation }}

                                        </td>

                                    </tr>


                            <tr>
                                <td style="text-align: center;">জ.</td>
                                    <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি </td>
                                    <td>{{ $fc2FormList->organization_name_of_executive_responsible_for_bd }} ও {{ $fc2FormList->organization_name_of_executive_responsible_for_bd_designation }} </td>

                                </tr>


                                <tr>
                                    <td style="text-align: center;">ঝ.</td>
                                        <td>সংস্থার উদ্দেশ্যসমূহ </td>
                                        <td>{!! $fc2FormList->objectives_of_the_organization !!}</td>

                                    </tr>
                                    <!-- steap four end -->

                                    <!-- step five start -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="2">৬.</th>

                                        <td style="font-weight:bold;" colspan="3">প্রতিশ্রতিপত্র আছে কি না <br> (কাজের নাম,অর্থের পরিমাণ ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত  করতে হবে)</td>


                                    </tr>

                                    <tr>


                                        <td colspan="3">

                                           {{ $fc2FormList->bond_paper_available_or_not }}, {{ $fc2FormList->bond_paper_work_name }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bond_paper_amount) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bond_paper_duration) }}


<br>
                                            @if(empty($fc2FormList->bond_paper_pdf))


                                            @else

                                            <a href="{{ route('fc2formextrapdf',['title'=>'bond_paper_pdf','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                             @endif

                                        </td>

                                    </tr>

                                    <!-- step five end --->

                                    <!-- step six start -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="4">৭.</th>

                                        <td style="font-weight:bold;" colspan="2">অনুদানের বিস্তারিত বিবরণ</td>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ক.</td>
                                        <td>  বৈদেশিক মুদ্রার পরিমান</td>
                                        <td>{{App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_amount_of_foreign_currency) }}</td>

                                    </tr>
                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>সমপরিমাণ বাংলাদেশী টাকা </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->equivalent_amount_of_bd_taka) }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য) </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->commodities_value_in_bangladeshi_currency) }}</td>

                                    </tr>

                                    <tr>
                                        <th style="text-align: center;" rowspan="4">৮.</th>

                                        <td style="font-weight:bold;" colspan="2">ব্যাংক সংক্রান্ত তথ্যাবলী</td>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">ক.</td>
                                        <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম ও ঠিকানা</td>
                                        <td>
                           {{ $fc2FormList->bank_name }} ও {{ $fc2FormList->bank_address }}

                                        </td>

                                    </tr>
                                    <tr>

                                        <td style="text-align: center;">খ.</td>
                                        <td>ব্যাংক হিসাবের নাম</td>
                                        <td>{{ $fc2FormList->bank_account_name }}</td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: center;">গ.</td>
                                        <td>ব্যাংক হিসাব নম্বর</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_account_number) }}</td>

                                    </tr>

                                    <!-- step six end -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="6">৯.</th>

                                        <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">বাজেট<br>
                                            ক.খাতভিত্তিক ব্যয় বিভাজন </span></td>
                                        <td></td>

                                    </tr>
                                    <tr>

                                        {{-- <td style="text-align: center;">ক.</td> --}}
                                        <td colspan="3" rowspan="3">

                                            <div class="table-responsive" id="tableAjaxDatapro">

                                                <table class="table table-bordered">
                                                    <tr style="text-align: center">
                                                        <th>ক্র : নং :</th>
                                                        <th>কার্যক্রম</th>
                                                        <th>প্রাক্কলিত ব্যয় </th>
                                                        <th>কর্ম এলাকা<br> (জেলা ,উপজেলা )</th>
                                                        <th>সময়সীমা </th>
                                                        <th>উপকারভোগীর সংখ্যা </th>

                                                    </tr>



                                                    <?php

                                                    $totalEstimatedExpense = 0;
                                                    $totalBenificiare = 0;

                                                    ?>

                                                    @foreach($sectorWiseExpenditureList as $key=>$sectorWiseExpenditureLists)


                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $sectorWiseExpenditureLists->activities }}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->estimated_expenses) }}</td>
                                                        <td>

                                                            জেলা: {{ $sectorWiseExpenditureLists->work_area_district }}
                                                            <br>


                                                            উপজেলা: {{ $sectorWiseExpenditureLists->work_area_sub_district }}

                                                        </td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->time_limit) }}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->number_of_beneficiaries) }}</td>


                                                    </tr>
                                                    <?php

                                                    $totalEstimatedExpense = $totalEstimatedExpense + $sectorWiseExpenditureLists->estimated_expenses;
                                                    $totalBenificiare = $totalBenificiare + $sectorWiseExpenditureLists->number_of_beneficiaries;

                                                    ?>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>মোট - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalEstimatedExpense) }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>মোট - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBenificiare) }}</td>

                                                    </tr>


                                                </table>

                                            </div>



                                    </span>


                                </td>


                                    </tr>

                                    <tr>

                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>

                                        <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">
                                            খ.টেকসই উন্নয়ন অভিষ্ঠ (এসডিজি ) এর সাথে সম্পৃক্ততা</span></td>

                                            <td></td>
                                    </tr>

                                    <tr>

                                        <td colspan="3">

                                            <div class="table-responsive" id="tableAjaxDataSDG">
                                                <table class="table table-bordered">
                                                    <tr style="text-align: center">
                                                        <th>অভিষ্ঠ(Goal)</th>
                                                        <th>লক্ষ্যমাত্রা(Target)</th>
                                                        <th>বাজেট বরাদ্দ </th>
                                                        <th>যৌক্তিকতা </th>
                                                        <th>মন্তব্য</th>

                                                    </tr>
                                                @foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
                                                    <tr>
                                                        <td>{{ $SDGDevelopmentGoals->goal }}</td>
                                                        <td>{{ $SDGDevelopmentGoals->target }}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($SDGDevelopmentGoals->budget_allocation) }}</td>
                                                        <td>{{ $SDGDevelopmentGoals->rationality }}</td>
                                                        <td>{{ $SDGDevelopmentGoals->comment }}</td>

                                                    </tr>
                                                    @endforeach


                                                </table>

                                            </div>
                                        </td>

                                    </tr>




                                    <!-- step three end -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="4">১০.</th>

                                        <td style="font-weight:bold;" colspan="2">ইতোপূর্বে গৃহীত অনুদানের বিবরণ</td>
                                        <td></td>

                                    </tr>
                                    <tr>

                                        {{-- <td style="text-align: center;">ক.</td> --}}
                                        <td colspan="3" rowspan="3">

                                            <div class="table-responsive" id="tableAjaxDataDOnor">

                                                <table class="table table-bordered">
                                                    <tr style="text-align: center">
                                                        <th >ক্র : নং :</th>
                                                        <th >উদ্দেশ্য / কার্যক্রম</th>
                                                        <th >এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর ও তারিখ</th>
                                                        <th >দাতা সংস্থার নাম</th>
                                                        <th >টাকার পরিমাণ </th>
                                                        <th >অডিট রিপোর্ট দাখিল এবং ব্যুরো কর্তৃক গৃহীত হয়েছে কিনা</th>
                                                        <th >সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</th>
                                                        <th >স্থানীয়  প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</th>
                                                        <th >মন্তব্য</th>

                                                    </tr>

                                                    @foreach ($donationList as $key=>$donationLists)
                                                    <tr>

                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $donationLists->purpose_or_activities }}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->registration_sarok_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->registration_date) }}</td>

                                                        <td>{{ $donationLists->donor_name }}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->money_amount) }}</td>
                                                        <td>{{ $donationLists->audit_report }}</td>
                                                        <td>{{ $donationLists->final_report }}</td>
                                                        <td>{{ $donationLists->local_certificate }}</td>
                                                        <td>{{ $donationLists->comment }}</td>


                                                    </tr>
                                                    @endforeach


                                                </table>

                                            </div>



                                    </span>


                                </td>


                                    </tr>

                                    <tr>

                                    </tr>
                                    <tr>

                                    </tr>


                                    <tr>
                                      <th style="text-align: center;" rowspan="4">১১.</th>

                                      <td style="font-weight:bold;" colspan="2">গুরুত্বপূর্ণ অন্য কোনো তথ্য (যদি থাকে):
                                      </td>
                                      <td> </td>

                                  </tr>
                                  <tr>

                                      {{-- <td style="text-align: center;">ক.</td> --}}
                                      <td colspan="3" rowspan="3">

                                          @if(count($fc2OtherFileList) == 0)


                                          @else


                                              <div class="table-respnsive">
                                                  <table class="table table-bordered">
                                                      @foreach($fc2OtherFileList as $key=>$fd2OtherInfoAll)
                                                      <tr>
                                                          <td>{{ $fd2OtherInfoAll->file_title }}</td>
                                                          <td>

                                                              <a target="_blank" href="{{ route('fcOneOtherPdfListdownload',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
                                                              <i class="fa fa-download" aria-hidden="true"></i>
                                                          </a>





                                                      </td>
                                                      </tr>
                                                      @endforeach

                                                  </table>
                                              </div>

                                          @endif


                              </td>


                                  </tr>

                                  <tr>

                                  </tr>
                                  <tr>

                                  </tr>


                                    <!-- step three end -->

                                    <tr>
                                        <td colspan="4"><span style="font-weight:bold;">সংযুক্তি:</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><span style="font-weight:bold;">১। দাতার প্রতিশ্রুতি পত্র/দাতা সংস্থার প্রতিশ্রুতি পত্র</span></td>
                                        <td> @if(empty($fc2FormList->donor_commitment_letter))


                                            @else


                                            <a href="{{ route('fc2formextrapdf',['title'=>'donor_commitment_letter','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm "><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                             @endif

                                             @if(empty($fc2FormList->donor_agency_commitment_letter))


                                             @else

                                             <a href="{{ route('fc2formextrapdf',['title'=>'donor_agency_commitment_letter','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm "><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                              @endif
                                            </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3"><span style="font-weight:bold;">২। ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক, সমাপনী প্রতিবেদন, প্রশাসনিক প্রত্যয়নপত্র</span></td>
                                        <td>        @if(empty($fc2FormList->previous_audit_report))


                                            @else


                                            <a href="{{ route('fc2formextrapdf',['title'=>'previous_audit_report','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক</a>
                                             @endif

                                             @if(empty($fc2FormList->last_final_report))


                                             @else
                                             <a href="{{ route('fc2formextrapdf',['title'=>'last_final_report','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm mt-2"><i class="fa fa-file-pdf-o"></i> সমাপনী প্রতিবেদন</a>
                                              @endif

                                              @if(empty($fc2FormList->administrative_certificate))


                                                       @else

                                                       <a href="{{ route('fc2formextrapdf',['title'=>'administrative_certificate','id'=>$fc2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm mt-2"><i class="fa fa-file-pdf-o"></i> প্রশাসনিক প্রত্যয়নপত্র</a>
                                                        @endif
                                            </td>
                                    </tr>

                                </table>


                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                          <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd2pdfviewdfc2',base64_encode($fc2FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>



                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>
                        <!-- start new code --->

                        <table class="table table-bordered" style="width:100%">

                            <!-- step three start -->

                            <tr>
                            <th style="text-align: center;">১.</th>
                            <td style="font-weight:bold;width:30%" >সংস্থার নাম ও ঠিকানা:</td>
                            <td style="" colspan="2">
                            {{ $fd2FormList->ngo_name }} ও {{ $fd2FormList->ngo_address }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;">২.</th>
                            <td style="font-weight:bold;width:30%" >প্রকল্পের নাম:</td>
                            <td style="" colspan="2">{{ $fd2FormList->ngo_prokolpo_name }}</td>
                            </tr>


                            <tr>
                            <th style="text-align: center;">৩.</th>
                            <td style="font-weight:bold;width:30%" >প্রকল্পের মেয়াদ, আরম্ভের তারিখ, সমাপ্তির তারিখ :</td>
                            <td style="" colspan="2">
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_duration) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;" >৪.</th>
                            <td style="font-weight:bold;width:30%" >প্রস্তাবিত অর্থছাড়ের পরিমাণ (বাংলাদেশী টাকা ও বৈদেশিক মুদ্রায়):</td>
                            <td style="" colspan="2">
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;" >৫.</th>
                            <td style="font-weight:bold;width:30%" >১ম/২য়/৩য়/৪র্থ/৫ম বছরে ব্যাংক হতে উত্তোলিত অর্থের পরিমাণ:</td>
                            <td style="" colspan="2">


                                @if($fd2FormList->amount_withdrawn_year == 1)
                                ১ম বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                @elseif($fd2FormList->amount_withdrawn_year == 2)
                                ২য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                @elseif($fd2FormList->amount_withdrawn_year == 3)
                                ৩য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}

                                @elseif($fd2FormList->amount_withdrawn_year == 4)
                                ৪র্থ বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                  @elseif($fd2FormList->amount_withdrawn_year == 5)
                                ৫ম বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                @endif


                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;"  rowspan="2">৬.</th>
                            <td style="font-weight:bold;" colspan="3">সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জন:</td>


                            </tr>
                            <tr>
                            <td colspan="3">

                            <div class="table-responsive" >


                            <table class="table table-bordered">
                            <tr style="text-align: center">
                                <th rowspan="2">ক্রমিক নং</th>
                                <th rowspan="2">কার্যক্রমের নাম </th>
                                <th colspan="2">বিগত বছরের লক্ষ্যমাত্রা </th>
                                <th colspan="2">অর্জন(%) </th>
                                <th rowspan="2">উপকারভোগীর সংখ্যা </th>
                                <th rowspan="2">মন্তব্য (যদি থাকে)</th>

                            </tr>
                            <tr style="text-align: center;">
                                <th>বাস্তব</th>
                                <th>আর্থিক </th>
                                <th>বাস্তব</th>
                                <th>আর্থিক </th>
                            </tr>
                            <?php

                            $totalBeni = 0;

                            ?>
                            @foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
                            <?php

                            $totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
                            ?>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->total_benificiari) }}</td>

                                <td>{{ $fd2AllFormLastYearDetails->comment }}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="6">মোট উপকারভোগীর সংখ্যা - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBeni) }}</th>

                                <td></td>
                                <td></td>
                            </tr>

                            </table>

                            </div>


                            @if(empty($fd2FormList->last_year_achivment_pdf))


                            @else

                            <a href="{{ route('fd2formextrapdffc2',['title'=>'last_year_achivment_pdf','id'=>$fd2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                            @endif
                            </td>
                            </tr>
                            <tr>
                            <th rowspan="3">৭.</th>

                            <th colspan="3">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী:</th>

                            </tr>
                            <tr>


                            <th>(ক) ব্যাংকের নাম:</th>
                            <td>{{ $fd2FormList->bank_name }}</td>

                            </tr>
                            <tr>


                            <th>(খ) ব্যাংকের ঠিকানা ও হিসাব নম্বর:</th>
                            <td>{{ $fd2FormList->bank_adddress }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->bank_account_number) }}</td>

                            </tr>

                            <tr>
                            <th style="text-align: center;">৮.</th>
                            <td style="font-weight:bold;" colspan="3">গুরুত্বপূর্ণ যেকোনো তথ্য:</td>

                            </tr>

                            <tr>
                            <td style="" colspan="4">
                            @if(count($fd2OtherInfo) == 0)


                            @else


                            <div class="table-respnsive">
                            <table class="table table-bordered">
                                @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                                <tr>
                                    <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                    <td><a href="{{ route('downloadFd2DetailForFc2Other',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a></td>
                                </tr>
                                @endforeach

                            </table>
                            </div>

                            @endif



                            </td>

                            </tr>




                                                    </table>

                                                    <!-- end new code --->


                    </div>
                </div>
  <!-- new code start --->

  <div class="d-flex justify-content-between mt-3">
    <div class="">


    </div>
    <div class="">



        @if($fc2FormList->status == 'Ongoing' || $fc2FormList->status == 'Accepted')

                        @else

                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fc2FormList->id}})" class="btn btn-info">
                            দাখিল করুন  <i class="fa fa-send-o"></i>
                        </button>

                            <form id="delete-form-{{ $fc2FormList->id }}" action="{{ route('finalFcTwoApplicationSubmit',base64_encode($fc2FormList->id)) }}" method="get" style="display: none;">

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

@endsection
