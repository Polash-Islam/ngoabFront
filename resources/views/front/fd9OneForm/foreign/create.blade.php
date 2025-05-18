@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>
    .custom-form
    {
        display: inline-block !important;
        margin: 10px;
        width: 250px !important;
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
                                        <h1>বিদেশী বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবকের ওয়ার্ক পারমিটের (পারমিট) জন্য আবেদনপত্র</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">

                                <div class="card-body">
                                    <form method="post" action="{{ route('fdNineOneForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="form9_upper_box">
                                        <h3>এফডি-৯(১) ফরম</h3>
                                        <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের
                                            (কার্যানুমতি) আবেদন ফরম</h4>

                                        <div>
                                            <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো <br>
                                                প্রধানমন্ত্রীর কার্যালয়</p>
                                            <p>নিষয়ঃ সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী “<span style="color:red;">*</span><input
                                                        type="text" class="form-control custom-form" name="foreigner_name_for_subject" required> ”' এর ওয়ার্ক পারমিট প্রসঙ্গে।
                                            </p>
                                            <p>
                                                সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর
                                                <span style="color:red;">*</span><input type="text" class="form-control custom-form" name="sarok_number" id="" placeholder="" required> তারিখ <span style="color:red;">*</span><input type="text" class="form-control custom-form datepicker" id="" required  ="" name="application_date">
                                            </p>

                                            <p class="mt-3">
                                                উপর্যুক্ত বিষয় ও সূত্রের বরাতে <span style="color:red;">*</span>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <input type="text" value="{{ $ngo_list_all->organization_name_ban }}" name="institute_name" required class="form-control custom-form"
                                                                                      id="" placeholder="">
                                                                                      @else
                                                                                      <input type="text" value="{{ $ngo_list_all->organization_name }}" name="institute_name" required class="form-control custom-form"
                                                                                      id="" placeholder="">
                                                                                      @endif


                                                                                      সংস্থার
                                                <span style="color:red;">*</span><input type="text" name="prokolpo_name" required class="form-control custom-form" id="" placeholder=""> প্রকল্পের
                                                আওতায় <span style="color:red;">*</span><input type="text" class="form-control custom-form" required name="designation_name" id="" placeholder="">
                                                হিসেবে বিদেশী বিশেষজ্ঞ/ উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী<span style="color:red;">*</span> <input
                                                        type="text" class="form-control custom-form" required name="foreigner_name_for_body" id="" placeholder=""> কে <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepicker custom-form" required name="expire_from_date" id="" placeholder=""> খ্রি: হতে
                                                        <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepicker custom-form" required name="expire_to_date" id="" placeholder=""> পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে উক্ত ব্যাক্তির
                                                অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু
                                                করার জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                                            </p>
                                            <ul>
                                                <li>নিয়োগপত্র সত্যায়ন প্রমাণক :  <span style="color:red;">*</span><input type="file" name="attestation_of_appointment_letter" accept="application/pdf" class="form-control custom-form"
                                                                                        id="" required placeholder=""></li>
                                                <li>ফর্ম ৯ এর কপি: <span style="color:red;">*</span><input type="file" name="copy_of_form_nine" required accept="application/pdf"class="form-control custom-form"
                                                                         id="" placeholder=""></li>
                                                <li>ছবি: <span style="color:red;">*</span><input type="file" accept="image/*" name="foreigner_image" class="form-control custom-form"
                                                               id="" placeholder=""></li>
                                                <li>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ): <span style="color:red;">*</span><input type="text" required name="arrival_date_in_nvisa"  class="form-control datepicker custom-form"
                                                                                                id="" placeholder=""><span style="color:red;">*</span><input required type="file" accept="application/pdf" name="copy_of_nvisa" class="form-control custom-form"
                                                                                                id="" placeholder=""></li>
                                            </ul>
                                            <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে <span><span style="color:red;">*</span><input type="text" required name="proposed_from_date" class="datepicker form-control custom-form"
                                                id="" placeholder=""></span> হতে <span><span style="color:red;">*</span><input type="text" required name="proposed_to_date" class="datepicker form-control custom-form"
                                                    id="" placeholder=""></span> মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>
                                        </div>
                                    </div>

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                                >তথ্য জমা দিন
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
