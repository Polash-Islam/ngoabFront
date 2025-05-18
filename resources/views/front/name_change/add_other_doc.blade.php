@extends('front.master.master')

@section('title')
 এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')




<section>

    <?php
 $ngoType =  DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
 ->value('ngo_type');


        ?>

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
                                <p class="{{ Route::is('addOtherDoc') ||  Route::is('ngoCommitteMember') || Route::is('formEightData') || Route::is('nameChange') || Route::is('sendNameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
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

                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                <li >
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>নতুন নাম</p>

                                </li>

                                <li class="active ">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>


                        <div class="committee_container">
                            <h5 class="mb-4">এনজিও নথি </h5>
                            <form method="post" action="{{ route('storeOtherDoc') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                @if($ngoType == 'Foreign')
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ০২ টি জাতীয় পত্রিকায় (বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% (কোড নং -১-১১৩৩-০০৩৫-০৩১১) জমাপূর্বক চালানের মূলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাস্টির তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        ৩০০/-(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পরিবর্তিত নামের সনদপত্র/ ইনকর্পোরেট সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পরিবর্তিত নামের বাই লজ (By laws)/ গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পূর্ববর্তী নামের সকল দায় -দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অঙ্গীকার নামা (সংস্থার প্রধান কর্তৃক স্বাক্ষরিত ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
জমাপূর্বক চালানের মুলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control"  accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @else


                                <div class="card mb-3">
                                    <div class="card-header">
                                        ০২ টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange1">

                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange1_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange2">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange2_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange3">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange3_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card mb-3">
                                    <div class="card-header">
                                        নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange4">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange4_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card mb-3">
                                    <div class="card-header">
                                        ৩০০/- (তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange5">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange5_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange6">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange6_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি <span class="text-danger">*</span>

                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange7">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange7_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange8">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange8_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সর্বশেষ সাধারণ সদস্যদের তালিকা <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange9">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange9_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কার্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange10">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange10_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)। <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange11">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange11_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        দাখিলকৃত চালানের উপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকপিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১) <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange12">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange12_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন/নাম পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর ১৫% বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের মুলকপিসহ

                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control"  accept=".pdf" name="primary_portal[]" type="file" id="localNameChange13">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange13_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary"
                                        >পিছনে যান
                            </a>

                                    <button type="submit" style="margin-left: 10px;" class="btn btn-registration"
                                            >যুক্ত করুন
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
