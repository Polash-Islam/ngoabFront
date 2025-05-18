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
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৩</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৩ ফরম</h3>
                                        <h4>পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd3Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="row">


    @csrf
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সংস্থার নাম <span class="text-danger">*</span></label>


                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                    placeholder="">

                                    @else


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                    placeholder="">


                                    @endif



                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সংস্থার ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর নিবন্ধন তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_registration_date" value="{{ date("d-m-Y", strtotime($ngoDurationReg)) }}" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রস্তাবিত প্রকল্পের নাম <span class="text-danger">*</span></label>
                                            <input name="ngo_prokolpo_name" type="text" class="form-control" id="ngo_prokolpo_name"
                                                   placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মেয়াদ <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_prokolpo_duration" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদনপত্র ও অর্থছাড়পত্রের স্মারক নম্বর <span class="text-danger">*</span></label>
                                            <input type="text" required name="project_approval_exemption_letter_memo_number" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদনপত্র ও অর্থছাড়পত্রের স্মারক তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="project_approval_exemption_letter_date" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">পূর্ববর্তী  বছরে অর্থছাড়ের পরিমান <span class="text-danger">*</span></label>
                                            <input type="text" required name="exemption_amount_in_previous_year" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">পূর্ববর্তী বছরে দাতা সংস্থা হতে গৃহীত অর্থের পরিমান <span class="text-danger">*</span></label>
                                            <input type="text" required name="money_received_in_the_previous_year" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>


                                    <div class="card mb-3">
                                        <div class="card-header">
                                            অর্থগ্রহনের বিস্তারিত বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">অর্থগ্রহনের তারিখ <span class="text-danger">*</span></label>
                                                    <input type="text" required name="date_of_payment" class="form-control datepickerOne" id=""
                                                           placeholder="">
                                                </div>

                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">বৈদেশিক অনুদানের ধরণ (এককালীন/বহুবর্ষী) <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="type_of_foreign_grant" id="" required>
                                                        <option value="এককালীন">এককালীন</option>
                                                        <option value="বহুবর্ষী">বহুবর্ষী</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">বৈদেশিক অনুদানের পরিমান (বৈদেশিক মুদ্রা) <span class="text-danger">*</span></label>
                                                    <input type="text" required name="foreign_grant_amount" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">বৈদেশিক অনুদানের পরিমান (দেশীয় মুদ্রা) <span class="text-danger">*</span></label>
                                                    <input type="text" required name="local_grant_amount" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">যদি সামগ্রী হয় তবে সামগ্রীর বিবরণ ও মূল্য (দেশীয় মুদ্রায়)</label>
                                                    <input type="text" name="description_and_price_of_goods" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-lg-12">
                                                    <h5>ব্যক্তির ক্ষেত্রে</h5>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">পূর্ণ নাম</label>
                                                    <input type="text" name="foreigner_donor_full_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">পেশা</label>
                                                    <input type="text" name="foreigner_donor_occupation" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">যোগাযোগের ঠিকানা	</label>
                                                    <input type="text" name="foreigner_donor_address" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">টেলিফোন</label>
                                                    <input type="text" name="foreigner_donor_telephone_number" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ফ্যাক্স </label>
                                                    <input type="text" name="foreigner_donor_fax" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ইমেইল নম্বর</label>
                                                    <input type="text" name="foreigner_donor_email" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">জাতীয়তা/নাগরিকত্ব</label>
                                                    <input type="text" name="foreigner_donor_nationality" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                                        United Nations Security Council’s Resolution (UNSCR)
                                                        কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা
                                                    </label>
                                                    <input type="text" name="foreigner_donor_is_verified" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা</label>
                                                    <input type="text" name="foreigner_donor_is_affiliatedrict" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <h5>সংস্থা ক্ষেত্রে</h5>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">সংস্থার নাম</label>
                                                    <input type="text" name="organization_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">অফিস/ সংস্থার ঠিকানা</label>
                                                    <input type="text" name="organization_address" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">টেলিফোন</label>
                                                    <input type="text" name="organization_telephone_number" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ফ্যাক্স নম্বর</label>
                                                    <input type="text" name="organization_fax" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ইমেইল </label>
                                                    <input type="text" name="organization_email" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ওয়েবসাইট</label>
                                                    <input type="text" name="organization_website" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">ম্যানিডাডেরিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত
                                                        United Nations Security Council’s Resolution (UNSCR)
                                                        কর্তৃক প্রকাশিত তালিকার সংগে দাতা সংস্থার তথ্য যাচাই করা হয়েছে কিনা
                                                    </label>
                                                    <input type="text" name="organization_is_verified" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">উক্ত তালিকাভুক্ত ব্যক্তি/ব্যক্তিবর্গ/ সংস্থার সাথে দাতা সংস্থার সংশ্লিষ্টতা আছে কিনা</label>
                                                    <input type="text" name="relation_with_donor" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">প্রধান নির্বাহী কর্মকর্তার নাম</label>
                                                    <input type="text" name="organization_ceo_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">প্রধান নির্বাহী কর্মকর্তার পদবি</label>
                                                    <input type="text"name="organization_ceo_designation" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">উর্দ্ধতন কর্মকর্তার (০১) নাম</label>
                                                    <input type="text" name="organization_senior_officer_name_one" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">উর্দ্ধতন কর্মকর্তার (০১) পদবি</label>
                                                    <input type="text" name="organization_senior_officer_designation_one" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">উর্দ্ধতন কর্মকর্তার (০২) নাম</label>
                                                    <input type="text" name="organization_senior_officer_name_two" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">উর্দ্ধতন কর্মকর্তার (০২) পদবি</label>
                                                    <input type="text" name="organization_senior_officer_designation_two" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম</label>
                                                    <input type="text" name="organization_name_of_executive_responsible_for_bd" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর পদবি</label>
                                                    <input type="text" name="organization_name_of_executive_responsible_for_bd_designation" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">সংস্থার উদ্দেশ্যসমূহ</label>
                                                    <input type="text" name="objectives_of_the_organization" class="form-control" id=""
                                                           placeholder="">
                                                </div>

                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">আবেদনকারী এনজিও ও দাতা  সংস্থার মধ্যে যোগাযোগ মাধ্যম</label>
                                                    <input type="text" name="communication_between_NGO_and_donor" class="form-control" id=""
                                                           placeholder="">
                                                </div>


                                            </div>
                                        </div>
                                    </div>








                                        <div class="row">
                                            <div class="mb-3 col-lg-12">
                                                <div class="card-header">
                                                    সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম</label>
                                                            <input type="text" name="bank_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label"> ঠিকানা</label>
                                                            <input type="text" name="bank_address" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">ব্যাংক হিসাবের নাম	</label>
                                                            <input type="text" name="bank_account_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">ব্যাংক হিসাব নম্বর</label>
                                                            <input type="text" name="bank_account_number" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                    <div class="mb-3 col-lg-12">

                                        <div class="card-header">
                                            পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম / এফডি - ৩ ফরম
                                        </div>

                                        <div class="card-body">

                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">পূর্ববর্তী  বছরের অর্থগ্রহনের বিবরণী ফরম / এফডি - ৩ ফরম <span class="text-danger">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
                                                <input type="file" name="verified_fd_three_form" class="form-control" id="fc1PdfN2"
                                                placeholder="" accept=".pdf" required>

                                                <p id="fc1PdfN2_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                            </div>

                                        </div>

                                    </div>


                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                                >দাখিল করুন 
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
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></td><td style="width: 30%"><div class="row"><div class="col-lg-12 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-12 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-12 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-12 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-12 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div></div></td><td><label for="" class="form-label">ইউনিয়ন/ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id="" placeholder=""></td><td><input type="number" name="allocated_budget[]" required class="form-control" id="" placeholder=""></td><td><input type="number" name="number_of_beneficiaries[]" required class="form-control" id="" placeholder=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');});
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
