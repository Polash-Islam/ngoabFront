@extends('front.master.master')

@section('title')
{{ trans('fd9.fd3')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
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
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.show') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
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

                        <!-- new code start --->

                        <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">
                                <a target="_blank" href="{{ route('fd3pdfview',base64_encode($fd3FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                                    <i class="fa fa-print"></i>
                                </a>
                                @if($fd3FormList->status == 'Ongoing' || $fd3FormList->status == 'Accepted')


                                @else

                                <button class="btn btn-primary" onclick="location.href = '{{ route('fd3Form.edit',base64_encode($fd3FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                @endif




                            </div>
                        </div>

                        <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৩ ফরম</h3>
                            <h4>পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম</h4>
                        </div>
                        <!-- new code start --->

                        <table class="table table-borderless" style="width:100%">


                            <tr>
                                <th style="text-align: center;" colspan="2">১.</th>
                                <td style="">সংস্থার নাম, ঠিকানা (টেলিফোন, ইমেইল ও ওয়েবসাইটসহ) :</td>
                                <td style="">{{ $ngo_list_all->organization_name_ban }}, {{$fd3FormList->ngo_address }}({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_telephone) }}, {{ $fd3FormList->ngo_email }} ও {{ $fd3FormList->ngo_website }}) </td>

                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="2">২.</th>
                                <td style="">নিবন্ধন নম্বর ও তারিখ:</td>
                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_registration_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_registration_date) }}</td>

                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="2" rowspan="2">৩.</th>
                                <td style="">প্রকল্পের নাম ও মেয়াদ :</td>
                                <td style="">{{ $fd3FormList->ngo_prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_prokolpo_duration) }}</td>

                            </tr>
                            <tr>
                                <td>প্রকল্পের ধরণ:</td>
                                <td>  <?php
                                    $subjectIdList  = explode(",",$fd3FormList->subject_id);
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

                                @endforeach</td>

                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="2">৪.</th>
                                <td style="">প্রকল্প অনুমোদনপত্র ও অর্থছাড়পত্রের স্মারক নম্বর ও তারিখ:</td>
                                <td style="">


                                        <ul>
                                            <li>প্রকল্প অনুমোদনপত্রের স্মারক নম্বর: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_exemption_letter_memo_number) }}</li>
                                            <li>প্রকল্প অনুমোদনপত্রের তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_exemption_letter_date) }}</li>
                                            <li>প্রকল্প অর্থছাড়পত্রের স্মারক নম্বর: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_letter_memo_number) }}</li>
                                            <li>প্রকল্প অর্থছাড়পত্রের তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_letter_date) }}</li>
                                        </ul>




                                </td>

                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="2">৫.</th>
                                <td style="">পূর্ববর্তী  বছরে অর্থছাড়ের পরিমান:</td>
                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->exemption_amount_in_previous_year) }}</td>

                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="2">৬.</th>
                                <td style="">পূর্ববর্তী বছরে দাতা সংস্থা হতে গৃহীত অর্থের পরিমান:</td>
                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->money_received_in_the_previous_year) }}</td>

                            </tr>
                          <!-- step one start  -->



                            <!-- step two strat --->

                            <tr>
                                <th style="text-align: center;" rowspan="6">৭.</th>

                                <td style="font-weight:bold;" colspan="2">অর্থগ্রহনের বিস্তারিত বিবরণ:</td>
                                <td></td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ক.</td>
                                <td> অর্থগ্রহনের তারিখ :</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->date_of_payment) }}</td>

                            </tr>
                            <tr>

                                <td style="text-align: center;">খ.</td>
                                <td>বৈদেশিক অনুদানের ধরণ (এককালীন/বহুবর্ষী):</td>
                                <td> {{ $fd3FormList->type_of_foreign_grant}}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">গ.</td>
                                <td>বৈদেশিক অনুদানের পরিমান (বৈদেশিক মুদ্রা, দেশীয় মুদ্রা):</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreign_grant_amount) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->local_grant_amount) }} </td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঘ.</td>
                                <td colspan="2">যদি সামগ্রী হয় তবে সামগ্রীর বিবরণ ও মূল্য (দেশীয় মুদ্রায়):</td>


                            </tr>
                            <tr>
                                <td colspan="3">
                                    {!! $fd3FormList->purpose_of_donation !!}
                                    ({{ $fd3FormList->description_and_price_of_goods }})
                                </td>

                            </tr>

                            <!-- step two end --->
                              <!-- step four start --->

                              <tr>
                                <th style="text-align: center;" rowspan="20">৮.</th>

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
                                <td>পূর্ণ নাম:</td>
                                <td>{{ $fd3FormList->foreigner_donor_full_name }}</td>

                            </tr>


                            <tr>

                                <td style="text-align: center;">খ.</td>
                                <td>পেশা:</td>
                                <td>{{ $fd3FormList->foreigner_donor_occupation }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">গ.</td>
                                <td>যোগাযোগের ঠিকানা:</td>
                                <td>{{ $fd3FormList->foreigner_donor_address }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঘ.</td>
                                <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর:</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreigner_donor_telephone_number) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreigner_donor_fax) }} ও {{ $fd3FormList->foreigner_donor_email }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঙ.</td>
                                <td>জাতীয়তা/নাগরিকত্ব:</td>
                                <td>{{ $fd3FormList->foreigner_donor_nationality }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">চ.</td>
                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                    United Nations Security Council’s Resolution (UNSCR)
                                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা:</td>
                                <td>{{ $fd3FormList->foreigner_donor_is_verified }}</td>

                            </tr>

                            <tr>



                                <td style="text-align: center;">ছ.</td>
                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা:</td>
                                <td>{{ $fd3FormList->foreigner_donor_is_affiliatedrict }}</td>

                            </tr>
                            <tr>
                                <th style="text-align: center;"> আ.</th>
                            <th colspan="2">দাতা যদি কোন সংস্থা /প্রতিষ্ঠান /সংগঠন /ফাউন্ডেশন /ট্রেড  ইউনিয়ন হয় </th>


                        </tr>

<tr>

                                <td style="text-align: center;">ক.</td>
                                <td>সংস্থার নাম:</td>
                                <td>{{ $fd3FormList->organization_name }}</td>

                            </tr>


                            <tr>

                                <td style="text-align: center;">খ.</td>
                                <td>অফিস/ সংস্থার ঠিকানা:</td>
                                <td>{{ $fd3FormList->organization_address }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">গ.</td>
                                <td>টেলিফোন, ফ্যাক্স নম্বর:</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->organization_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->organization_fax) }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঘ.</td>
                                <td>ই-মেইল ও ওয়েবসাইট:</td>
                                <td>{{ $fd3FormList->organization_email }} ও {{ $fd3FormList->organization_website }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঙ.</td>
                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                    United Nations Security Council’s Resolution (UNSCR)
                                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা:</td>
                                <td>{{ $fd3FormList->organization_is_verified }}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">চ.</td>
                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা:</td>
                                <td>{{ $fd3FormList->relation_with_donor }}</td>

                            </tr>

                            <tr>



                                <td style="text-align: center;">ছ.</td>
                                <td colspan="2">

                                  <span style="">সংস্থার প্রধান নির্বাহী কর্মকর্তাসহ উর্দ্ধতন ০৩(তিন ) জন কর্মকর্তার বিবরণ (নাম, পদবি, টেলিফোন, মোবাইল ও ইমেইল নম্বরসহ )</span>
                                  <table class="table table-bordered">
                                    <tr style="text-align: center">
                                        <th>ক্র : নং :</th>
                                        <th>নাম</th>
                                        <th>পদবি</th>
                                        <th>টেলিফোন</th>
                                        <th>মোবাইল</th>
                                        <th>ইমেইল</th>

                                    </tr>

                                    @foreach($employeeDetailList as $key=>$employeeDetailLists)
                                    <tr>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                        <td>{{ $employeeDetailLists->employee_name }}</td>
                                        <td>{{ $employeeDetailLists->employee_designation }}</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_telephone) }}</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_mobile) }}</td>
                                        <td>{{ $employeeDetailLists->employee_email }}</td>

                                    </tr>
                                    @endforeach


                                </table>



                                </td>


                            </tr>


                    <tr>
                        <td style="text-align: center;">জ.</td>
                            <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি :</td>
                            <td>{{ $fd3FormList->organization_name_of_executive_responsible_for_bd }} ও {{ $fd3FormList->organization_name_of_executive_responsible_for_bd_designation }}</td>

                        </tr>


                        <tr>
                            <td style="text-align: center;">ঝ.</td>
                                <td>সংস্থার উদ্দেশ্যসমূহ :</td>
                                <td>{!! $fd3FormList->objectives_of_the_organization !!}</td>

                            </tr>

                            <tr>

                                <td style="text-align: center;">ঞ.</td>
                                <td>আবেদনকারী এনজিও ও দাতা  সংস্থার মধ্যে যোগাযোগ মাধ্যম:</td>
                                <td>{{ $fd3FormList->communication_between_NGO_and_donor }}</td>

                            </tr>
                            <!-- steap four end -->

                            <tr>
                                <th style="text-align: center;" rowspan="3">৯.</th>

                                <td style="font-weight:bold;" colspan="3">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী</td>


                            </tr>

                            <tr>

                                <td style="text-align: center;">ক.</td>
                                <td>ব্যাংকের নাম</td>
                                <td>{{ $fd3FormList->bank_name }}</td>

                            </tr>
                            <tr>

                                <td style="text-align: center;">খ.</td>
                                <td>ঠিকানা, হিসাব নম্বর ও হিসাবের ধরণ</td>
                                <td>{{ $fd3FormList->bank_address }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->bank_account_number) }} ও {{ $fd3FormList->bank_account_name }}</td>

                            </tr>



                            <!-- step three start -->

                            <tr>
                                <th style="text-align: center;" rowspan="11">১০.</th>
                                <td style="font-weight:bold;" colspan="3">গৃহীত অর্থ ব্যয়ের বিস্তারিত বিবরণ:</td>


                            </tr>
                            <tr>
                                <td style="text-align: center;">ক.</td>
                                <td colspan="2">বৈদেশিক অনুদান মাদার একাউন্ট হতে প্রকল্প একাউন্টে স্থানান্তর করা হয়েছে কিনা ;হলে প্রকল্প একাউন্টের বিবরণ:</td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    {!! $fd3FormList->project_account_details !!}



                                       @if(empty($fd3FormList->project_account_file))

                                       @else
                                       <a href="{{ route('fd3formextrapdf',['title'=>'project_account_file','id'=>$fd3FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                       @endif

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">খ.</td>
                                <td colspan="2"> যে উদ্দেশ্যে অর্থ ব্যয় করা হয়েছে তার বিস্তারিত বিবরণ:</td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                 {!! $fd3FormList->purpose_details !!}



                                       @if(empty($fd3FormList->purpose_details_file))

                                       @else
                                       <a href="{{ route('fd3formextrapdf',['title'=>'purpose_details_file','id'=>$fd3FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                       @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">গ.</td>
                                <td colspan="2"> অনুমোদিত অর্থের বিপরীতে গৃহীত ও ব্যয়িত অর্থের বিবরণ :</td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    {!! $fd3FormList->money_received_details !!}



                                       @if(empty($fd3FormList->money_received_details_file))

                                       @else

                                       <a href="{{ route('fd3formextrapdf',['title'=>'money_received_details_file','id'=>$fd3FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                       @endif
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">ঘ.</td>
                                <td colspan="2"> যে পদ্ধতি ব্যবহার করা হয়েছে  তার সম্পূর্ণ বিবরণ :</td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    {!! $fd3FormList->method_details !!}

                                       @if(empty($fd3FormList->method_details_file))

                                       @else

                                       <a href="{{ route('fd3formextrapdf',['title'=>'method_details_file','id'=>$fd3FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                       @endif
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">ঙ.</td>
                                <td colspan="2">প্রকল্প বাস্তবায়নে জেলা/উপজেলা প্রশানসনকে সম্পৃক্ত করা হয়েছে কিনা:</td>

                            </tr>
                            <tr>
                                <td colspan="3">{{ $fd3FormList->administration_involved }}</td>
                            </tr>

                          <!-- step one start  -->

                            <tr>
                                <th style="text-align: center;" rowspan="2">১১.</th>

                                <td style="font-weight:bold;" colspan="3">সরঞ্জামাদি তালিকা (যানবাহনসহ) এবং উক্ত প্রকল্পের অধীনে এনজিও'র অর্জিত সম্পদের বিবরণ:</td>


                            </tr>
                            <tr>

                                {{-- <td style="text-align: center;">ক.</td> --}}
                                <td colspan="3" >

                                  {!!$fd3FormList->equipment_details!!}



                                       @if(empty($fd3FormList->equipment_details_file))

                                       @else

                                       <a href="{{ route('fd3formextrapdf',['title'=>'equipment_details_file','id'=>$fd3FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                       @endif


                        </td>


                            </tr>


                            <!-- step three end -->



                            <!-- step five start -->

                            <tr>
                                <th style="text-align: center;" rowspan="2">১২.</th>

                                <td style="font-weight:bold;" colspan="3">গুরুত্বপূর্ণ যেকোনো তথ্য</td>


                            </tr>

                            <tr>


                                <td colspan="3">


                                       <!-- start new code --->

@if(count($fdThreeOtherFileList) == 0)


@else

<table class="table table-bordered">
    @foreach($fdThreeOtherFileList as $key=>$fd2OtherInfoAll)
    <tr>
        <td>{{ $fd2OtherInfoAll->file_name }}</td>
        <td>

          <a target="_blank" href="{{ route('fd3OtherFileDownload',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
              <i class="fa fa-download" aria-hidden="true"></i>
          </a>
    </td>
    </tr>
    @endforeach

</table>
@endif

<!-- end new code --->



                                </td>

                            </tr>

                            <!-- step five end --->



                        </table>

                        <!-- end new code start --->

                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">


                                <a target="_blank" href="{{ route('fd2pdfviewdfd3',base64_encode($fd3FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                                    <i class="fa fa-print"></i>
                                </a>



                            </div>
                        </div>


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

                            <a href="{{ route('fd2formextrapdffd3',['title'=>'last_year_achivment_pdf','id'=>$fd2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
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
                                    <td><a href="{{ route('downloadFd2DetailForFd3Other',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a></td>
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

                        @if($fd3FormList->status == 'Ongoing')


                        @else


                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fd3FormList->id}})" class="btn btn-info">
                            দাখিল করুন  <i class="fa fa-send-o"></i>
                        </button>

                            <form id="delete-form-{{ $fd3FormList->id }}" action="{{ route('fd3FormSend',base64_encode($fd3FormList->id)) }}" method="get" style="display: none;">

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
