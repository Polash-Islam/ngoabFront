@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

    .alertify .ajs-body .ajs-content {
        font-weight: bolder;
        color:red;
        font-size: 20px;
    }

    .alertify .ajs-header{

        color:red;
        font-size: 20px;

    }

    .alertify .ajs-footer .ajs-buttons .ajs-button{

        background-color: #006A4E;
        color: #fff;

    }

</style>
<style>
    .ui-widget.ui-widget-content {
    top: 160px !important;
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
                                <p class="{{  Route::is('fd6StepTwo') ||  Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                                    <li class="active ">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৬</p>
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
                                        <h1>প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৬ ফরম </h3>
                                        <h4>প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd6StepTwoMainUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fd6Id" id="fd6Id" value="{{ $fd6Id }}"/>
                                        <input type="hidden" id="expenseId" value="1"/>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">

                                                    <?php

                                                    $prokolpoAreaListNew = \App\Models\Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->sum('allocated_budget');

                                                        ?>

                                                    <!--FD06 Section 05-->

                                                    <tr>
                                                        <td rowspan="9" style="width:40px;">০৫</td>
                                                        <td colspan="3">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td colspan="2">
                                                            প্রাক্কলিক ব্যয় (টাকায়):
                                                            <input type="number" readonly required value="{{ $prokolpoAreaListNew }}" name="estimated_expenses" class="form-control mb-3" id=""
                                                                   placeholder="প্রাক্কলিক ব্যয় (টাকায়)">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <div class="d-flex justify-content-end">
                                                                @if(empty($fd6FormList->total_fifth_year))
                                                                <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#grantReceive">প্রাক্কলিক ব্যয় যুক্ত করুন
                                                            </a>
                                                            @else

                                                            @endif
                                                            </div>
                                                            <div id="tableAjaxDataexp">
                                                           @include('front.fd6Form.estimatedExpensesFd6')
                                                            <div>

                                                                <input type="file" name="estimated_expenses_file" accept=".pdf" class="form-control mb-3" id=""
                                                                   placeholder="">

                                                                   @if(empty($fd6FormList->estimated_expenses_file))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd6FormList->estimated_expenses_file);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="6" style="width:40px;">খ)</td>
                                                        <td style="width: 25%;">১. দাতা সংস্থার নাম</td>
                                                        <td>
                                                            <input type="text" value="{{ $fd6FormList->donor_organization_name }}" required name="donor_organization_name" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার নাম">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>২. দাতা সংস্থার ঠিকানা</td>
                                                        <td>
                                                            <input type="text" value="{{ $fd6FormList->donor_organization_address }}" required name="donor_organization_address" class="form-control" id=""
                                                                   placeholder=" দাতা সংস্থার ঠিকানা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৩. ফোন/মোবাইল/ইমেইল নম্বর</td>
                                                        <td>
                                                            <input type="text" required value="{{ $fd6FormList->donor_organization_phone_mobile_email }}" name="donor_organization_phone_mobile_email" class="form-control mb-3" id=""
                                                                   placeholder="ফোন">
                                                            <input type="nnumber" required value="{{ $fd6FormList->donor_organization_mobile }}" name="donor_organization_mobile" class="form-control mb-3" id=""
                                                                   placeholder="মোবাইল">
                                                            <input type="email" required value="{{ $fd6FormList->donor_organization_email }}" name="donor_organization_email" class="form-control mb-3" id=""
                                                                   placeholder="ইমেইল">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৪. ওয়েবসাইট</td>
                                                        <td>
                                                            <input type="text" required value="{{ $fd6FormList->donor_organization_website }}" name="donor_organization_website" class="form-control" id=""
                                                                   placeholder="ওয়েবসাইট">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৫. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
                                                        <td>
                                                            <input type="text" required value="{{ $fd6FormList->money_laundering_and_terrorist_financing }}" name="money_laundering_and_terrorist_financing" class="form-control" id=""
                                                                   placeholder="মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> United Nations Security Council Resolution
                                                            (UNSCR) কর্তৃক প্রকাশিত তালিকার সাথে দাতা
                                                            সংস্থার/ব্যক্তির তথ্য যাচাই করা হয়েছে কিনা/কোন
                                                            সংশ্লিষ্টতারয়েছে কিনা:
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="security_council_check" id="" required>
                                                                <option value="হ্যা" {{ 'হ্যা' == $fd6FormList->security_council_check ? 'selected':'' }}>হ্যা</option>
                                                                <option value="না" {{ 'না' == $fd6FormList->security_council_check ? 'selected':'' }}>না</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 06-->

                                                    <tr>
                                                        <td rowspan="11" style="width:40px;">০৬</td>
                                                        <td colspan="3">বিস্তারিত প্রকল্প:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td>ভূমিকা এবং পটভূমি (সংশ্লিষ্ট এলাকায় প্রকল্প কার্যক্রম সংক্রান্ত
                                                            বিরাজমান অবস্থা তথ্য/উপাত্তসহ উল্লেখপূর্বক প্রস্তাবিত প্রকল্পটি
                                                            সংক্ষেপে অবতারণা করতে হবে। প্রকল্পটি প্রণয়নকালে কিভাবে
                                                            কমিউনিটিকে সম্পৃক্ত করা হয়েছে তা উল্লেখ করতে হবে):
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" required name="introduction_and_background" id="" cols="30"
                                                                      rows="5">{{ $fd6FormList->introduction_and_background }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="4" style="width:40px;">খ)</td>
                                                        <td>(১) প্রকল্পটি যৌক্তিকতা এবং জাতীয় পরিকল্পনার সাথে
                                                            প্রাসঙ্গিকতা:
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" required name="rationality_and_plan" id="" cols="30"
                                                                      rows="5">{{ $fd6FormList->rationality_and_plan }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>(২) প্রকল্প এলাকা নির্ধারণের যৌক্তিকতা:</td>
                                                        <td>
                                                            <textarea class="form-control" required name="rationale_project_araea" id="" cols="30"
                                                                      rows="5">{{ $fd6FormList->rationale_project_araea }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">(৩) টেকসই উন্নয়ন অভীষ্টের (এসডিজি) সাথে
                                                            সম্পৃক্ততা:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#Avistto">নতুন অভীষ্ট যুক্ত করুন
                                                            </a>
                                                            </div>
                                                            <div class="table-responsive" id="tableAjaxDataSDG">

                                                                @include('front.fd6Form.fd6FormStepTwoSDG')
                                                                    </div>

                                                            <input type="file" name="sdg_file" accept=".pdf" class="form-control mb-3" id=""
                                                                   placeholder="">

                                                                   @if(empty($fd6FormList->sdg_file))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd6FormList->sdg_file);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td>উদ্দেশ্যসমূহ
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="sdg_objective_file" id="" cols="30"
                                                                      rows="5">{{ $fd6FormList->sdg_objective_file }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td colspan="2"> সুনির্দিষ্ট, পরিমাপযোগ্য, অর্জনযোগ্য, যথার্থতা ও
                                                            সময়োবদ্ধতার দৃষ্টিকোণ থেকে লক্ষ্যমাত্রা :
                                                            <br>
                                                            <small> (প্রকল্পের লক্ষমাত্রা বছর ভিত্তিক দেখাতে হবে)</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModalTarget">নতুন
                                                                    লক্ষ্যমাত্রা
                                                                    যুক্ত করুন
                                                            </a>
                                                            </div>
                                                            <div class="table-responsive" id="tableAjaxDataTarget">
                                                            @include('front.fd6Form.fd6TargetTable')
                                                            </div>

                                                            <input type="file" name="target_from_perspective_file" accept=".pdf" class="form-control mb-3" id=""
                                                                   placeholder="">

                                                                   @if(empty($fd6FormList->target_from_perspective_file))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd6FormList->target_from_perspective_file);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td colspan="2"> প্রত্যাশিত ফলাফল (প্রত্যেক ফলাফল গুনবাচক,
                                                            সংখ্যাবাচক এবং সময়ের (QQT) ভিত্তিতে নির্দিষ্ট করতে হবে) :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#ProttashitoFol">নতুন
                                                                    প্রত্যাশিত ফলাফল
                                                                    যুক্ত করুন
                                                            </a>
                                                            </div>

                                                            <div class="table-responsive" id="tableAjaxDataResult">
                                                                @include('front.fd6Form.fd6ExpectedResultTable')
                                                                </div>

                                                                <input type="file" name="expected_result_file" accept=".pdf" class="form-control mb-3" id=""
                                                                   placeholder="">


                                                                   @if(empty($fd6FormList->expected_result_file))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd6FormList->expected_result_file);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif


                                                            <small>*(উপরে বর্ণিত ফলাফলের ভিত্তিতে প্রতিটি প্রধান কার্যক্রম
                                                                বর্ণনা করতে হবে। যে কার্যক্রম উপরে বর্ণিত ফলাফল অর্জনে সহায়ক
                                                                নয়, সে কার্যক্রম গ্রহণযোগ্য হবে না। উপকারভোগীর সংখ্যা
                                                                প্রত্যেক্ষ হতে হবেম, পরোক্ষ নয়)।</small>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 07-->

                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">০৭</td>
                                                        <td colspan="3">জেলাওয়ারী বিস্তারিত কর্মকান্ড (যতগুলো জেলায়
                                                            কর্মকান্ড বাস্তবায়িত হবে একই ছক ব্যবহার করে প্রত্যেক জেলার তথ্য
                                                            পর পর প্রদান করতে হবে) :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#JelawaisKarjokokrom">নতুন
                                                                    কর্মকান্ড
                                                                    যুক্ত করুন
                                                            </a>
                                                            </div>
                                                            <div id="tableAjaxDataDis">
                                                           @include('front.fd6Form.districtWise')
                                                            </div>

                                                            <input type="file" name="district_wise_activity_file" accept=".pdf" class="form-control mb-3" id=""
                                                                   placeholder="">


                                                                   @if(empty($fd6FormList->district_wise_activity_file))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd6FormList->district_wise_activity_file);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif

                                                        </td>
                                                    </tr>



                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">

                                        <a href="{{ route('fd6Form.edit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                                     </a>

                                        <button type="submit" style="margin-left:10px;"  class="btn btn-registration"
                                                >পরবর্তী পৃষ্ঠা
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
@include('front.fd6Form._partial.expectedResultModal')
@include('front.fd6Form._partial.prokolpoTargetModal')
@include('front.fd6Form._partial.stepTwoSDGModal')
@include('front.fd6Form._partial.grantReceiveModal')
@include('front.fd6Form._partial.expenseEditModal1')
@include('front.fd6Form._partial.expenseEditModal2')
@include('front.fd6Form._partial.expenseEditModal3')
@include('front.fd6Form._partial.expenseEditModal4')
@include('front.fd6Form._partial.expenseEditModal5')
@include('front.fd6Form._partial.JelawaisKarjokokromModal')
@endsection

@section('script')
@include('front.fd6Form._partial.script')
@include('front.fd6Form._partial.stepTwoScript')
<script>
    

    $(document).on('click', '.expenseEditModalup', function () {

       var main_id = $(this).attr('id');
       var main_year = $(this).attr('data-year');

     

$.ajax({
url: "{{ route('fd6NewDataEditup') }}",
method: 'get',
data: {
    main_year:main_year,
    main_id:main_id,
},
success: function(data) {
    
    $('#expenseEditModal1').modal('show');
    $("#viewDataNew").html('');
$("#viewDataNew").html(data);

$(".datepicker2334").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                calendarWeeks: true,
         todayHighlight: true,
         autoclose: true
            });

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
@endsection
