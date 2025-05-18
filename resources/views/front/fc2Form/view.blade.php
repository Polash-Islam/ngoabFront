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
                        <table class="table table-bordered">
                            <tr>
                                <td>পূর্ণ নাম</td>
                                <td>: {{ $fc2FormList->person_full_name }}</td>
                            </tr>
                            <tr>
                                <td>পিতার নাম</td>
                                <td>: {{ $fc2FormList->person_father_name }}</td>
                            </tr>

                            <tr>
                                <td>মাতার নাম</td>
                                <td>: {{ $fc2FormList->person_mother_name }}</td>
                            </tr>
                            <tr>
                                <td>পেশা</td>
                                <td>: {{ $fc2FormList->person_occupation }}</td>
                            </tr>
                            <tr>
                                <td>জাতীয় পরিচয়পত্র নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_nid) }}</td>
                            </tr>

                            <tr>
                                <td>পাসপোর্ট নম্বর (যদি থাকে)</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_passport) }}</td>
                            </tr>

                            <tr>
                                <td>টি আই এন নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_tin) }}</td>
                            </tr>


                            <tr>
                                <td>জাতীয়তা/ নাগরিকত্ব</td>
                                <td>: {{ $fc2FormList->person_nationality }}</td>
                            </tr>

                            <tr>
                                <td>পূর্ণ ঠিকানা</td>
                                <td>: {{ $fc2FormList->person_full_address }}</td>
                            </tr>


                            <tr>
                                <td>টেলিফোন</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_tele_phone_number) }}</td>
                            </tr>


                            <tr>
                                <td>মোবাইল</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_mobile) }}</td>
                            </tr>

                            <tr>
                                <td>ইমেইল</td>
                                <td>: {{ $fc2FormList->person_email }}</td>
                            </tr>

                        </table>

                        <div class="form9_upper_box">
                            <h3>প্রকল্পের মেয়াদ</h3>
                        </div>


                        <table class="table table-bordered">
                            <tr>
                                <td>আরম্ভের তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>

                        </table>
                        <div class="form9_upper_box">
                            <h3>কর্ম এলাকা ও বাজেট</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>বিভাগ</th>
                                <th>জেলা/সিটি কর্পোরেশন</th>
                                <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                <th>প্রকল্পের ধরণ</th>
                                <th>বরাদ্দকৃত বাজেট</th>
                                <th>মোট উপকারভোগীর সংখ্যা</th>
                            </tr>
                            @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                          @include('front.include.globalTableView')
                            @endforeach
                        </table>




                        <div class="form9_upper_box">
                            <h3>যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ<br>
                                ব্যক্তির ক্ষেত্রে</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>পূর্ণ নাম</td>
                                <td>: {{ $fc2FormList->foreigner_donor_full_name }}</td>
                            </tr>
                            <tr>
                                <td>পেশা</td>
                                <td>: {{ $fc2FormList->foreigner_donor_occupation }}</td>
                            </tr>

                            <tr>
                                <td>যোগাযোগের ঠিকানা</td>
                                <td>: {{ $fc2FormList->foreigner_donor_address }}</td>
                            </tr>
                            <tr>
                                <td>টেলিফোন</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_telephone_number) }}</td>
                            </tr>
                            <tr>
                                <td>ফ্যাক্স</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_fax) }}</td>
                            </tr>

                            <tr>
                                <td>ইমেইল নম্বর</td>
                                <td>: {{ $fc2FormList->foreigner_donor_email }}</td>
                            </tr>


                            <tr>
                                <td>জাতীয়তা/নাগরিকত্ব</td>
                                <td>: {{ $fc2FormList->foreigner_donor_nationality }}</td>
                            </tr>

                            <tr>
                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত United Nations Security Council’s Resolution (UNSCR) কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা</td>
                                <td>: {{ $fc2FormList->foreigner_donor_is_verified }}</td>
                            </tr>


                            <tr>
                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা</td>
                                <td>: {{ $fc2FormList->foreigner_donor_is_affiliatedrict }}</td>
                            </tr>

                        </table>



                        <div class="form9_upper_box">
                            <h3>যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ<br>
                                সংস্থা ক্ষেত্রে</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>সংস্থার নাম</td>
                                <td>: {{ $fc2FormList->organization_name }}</td>
                            </tr>
                            <tr>
                                <td>অফিস/ সংস্থার ঠিকানা</td>
                                <td>: {{ $fc2FormList->organization_address }}</td>
                            </tr>


                            <?php
                            $subjectIdList  = explode(",",$fc2FormList->subject_id);
                            $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                            ->get();

                            ?>
                            <tr>
                                <td>প্রকল্পের বিষয়</td>
                                <td>:
                                     @foreach($subjectListMain as $key=>$subjectListMains)

                                     @if(count($subjectListMain) == 1 )

                                     {{ $subjectListMains->name }}

                                     @else

                                     @if(count($subjectListMain) == ($key+1))
                                     {{ $subjectListMains->name }} |

                                     @else

                                     {{ $subjectListMains->name }},

                                     @endif

                                     @endif

                                     @endforeach
                                </td>
                            </tr>



                            <tr>
                                <td>টেলিফোন</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_telephone_number) }}</td>
                            </tr>
                            <tr>
                                <td>ফ্যাক্স নম্বর</td>
                                <td>: {{ $fc2FormList->organization_fax }}</td>
                            </tr>
                            <tr>
                                <td>ইমেইল</td>
                                <td>: {{ $fc2FormList->organization_email }}</td>
                            </tr>

                            <tr>
                                <td>ওয়েবসাইট</td>
                                <td>: {{ $fc2FormList->organization_website }}</td>
                            </tr>




                            <tr>
                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত United Nations Security Council’s Resolution (UNSCR) কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা</td>
                                <td>: {{ $fc2FormList->organization_is_verified }}</td>
                            </tr>


                            <tr>
                                <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা</td>
                                <td>: {{ $fc2FormList->relation_with_donor }}</td>
                            </tr>

                            <tr>
                                <td>প্রধান নির্বাহী কর্মকর্তার নাম</td>
                                <td>: {{ $fc2FormList->organization_ceo_name }}</td>
                            </tr>

                            <tr>
                                <td>প্রধান নির্বাহী কর্মকর্তার পদবি</td>
                                <td>: {{ $fc2FormList->organization_ceo_designation }}</td>
                            </tr>

                            <tr>
                                <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম</td>
                                <td>: {{ $fc2FormList->organization_name_of_executive_responsible_for_bd }}</td>
                            </tr>

                            <tr>
                                <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর পদবি</td>
                                <td>: {{ $fc2FormList->organization_name_of_executive_responsible_for_bd_designation }}</td>
                            </tr>


                            <tr>
                                <td>সংস্থার উদ্দেশ্যসমূহ</td>
                                <td>: {{ $fc2FormList->objectives_of_the_organization }}</td>
                            </tr>

                            <tr>
                                <td>প্রতিশ্রুতিপত্র আছে কিনা</td>
                                <td>: {{ $fc2FormList->organization_letter_of_commitment }}</td>
                            </tr>

                            <tr>
                                <td>কাজের নাম, অর্থের পরিমান ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত করতে হবে</td>
                                <td>:<a href="{{ route('fc1PdfDownload',$fc2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>

                        </table>



                        <div class="form9_upper_box">
                            <h3>অনুদানের বিস্তারিত বিবরণ</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>বৈদেশিক মুদ্রার পরিমান</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_amount_of_foreign_currency) }}</td>
                            </tr>
                            <tr>
                                <td>সমপরিমাণ বাংলাদেশী টাকা</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->equivalent_amount_of_bd_taka) }}</td>
                            </tr>

                            <tr>
                                <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য)</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->commodities_value_in_bangladeshi_currency) }}</td>
                            </tr>




                        </table>




                        <div class="form9_upper_box">
                            <h3>ব্যাংক সংক্রান্ত তথ্যাবলী</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_name) }}</td>
                            </tr>
                            <tr>
                                <td>ঠিকানা</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_address) }}</td>
                            </tr>

                            <tr>
                                <td>ব্যাংক হিসাবের নাম</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_account_name) }}</td>
                            </tr>

                            <tr>
                                <td>ব্যাংক হিসাব নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_account_number) }}</td>
                            </tr>


                        </table>


                        <div class="form9_upper_box">
                            <h3>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম /এফসি - ২ ফরম</h3>
                        </div>

                        <table class="table table-bordered">


                            <tr>
                                <td>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম /এফসি - ২ ফরম</td>
                                <td>:<a href="{{ route('verifiedFcTwoForm',$fc2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>

                        </table>

                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>সংস্থার নাম</td>
                                <td>: {{ $fd2FormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>সংস্থার ঠিকানা</td>
                                <td>: {{ $fd2FormList->ngo_address }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প নাম</td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_name }}</td>
                            </tr>
                            <tr>
                                <td>কোন দেশীয় সংস্থা</td>
                                <td>: {{ $ngo_list_all->country_of_origin }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প মেয়াদ </td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_duration }}</td>
                            </tr>
                            <tr>
                                <td>আরম্ভের তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}</td>
                            </tr>
                            <tr>
                                <td>এফডি ২ ফর্ম উপলোড </td>
                                <td><a href="{{ route('downloadFd2DetailForFc1',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>ফাইলের নাম</th>
                                <th>ফাইল</th>
                            </tr>
                            @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                            <tr>
                                <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                <td><a href="{{ route('downloadFd2DetailForFc1Other',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

             <!-- new code start --->

             <div class="d-flex justify-content-between mt-3">
                <div class="">


                </div>
                <div class="">



                    @if($fc2FormList->status == 'Ongoing' || $fc2FormList->status == 'Accepted')

                                    @else

                                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $fc2FormList->id}})" class="btn btn-info">
                                        এনজিওতে পাঠান <i class="fa fa-send-o"></i>
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
