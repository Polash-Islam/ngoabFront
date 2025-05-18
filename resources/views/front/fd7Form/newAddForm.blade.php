@extends('front.master.master')

@section('title')
{{ trans('fd9.fd7')}} | {{ trans('header.ngo_ab')}}
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
    /* .ui-widget.ui-widget-content {
    top: 10px !important;
    } */
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
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৭</p>
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
                                        <h1>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি-৭ ফরম</h3>
                                        <h4>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd7Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf

                                        <input type="hidden" id="mainEditId" value="0"/>
                                           <!-- step one start -->

                                     <div class="row">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="table-responsive">
                                            <table class="table table-bordered" style="width:100%">

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                    <th style="text-align: center; width: 25%">বিবরণ</th>
                                                    <th style="text-align: center;">তথ্যাদি</th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">(০১)</th>
                                                    <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                    <th style="text-align: center;">(০৩)</th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">১.</th>
                                                    <td style="text-align: center;">এনজিও'র নাম, ঠিকানা নিবন্ধন নম্বর ও তারিখ <span style="color:red;">*</span>:</td>
                                                    <th style="text-align: center;">
                                                        <div class="row">


                                                            <div class="mb-3 col-lg-12">



                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                        <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                                        placeholder="এনজিও'র নাম">

                                                        @else


                                                        <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                                        placeholder="এনজিও'র নাম">


                                                        @endif



                                                            </div>
                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                                       placeholder="ঠিকানা">
                                                            </div>

                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control" id=""
                                                                       placeholder="নিবন্ধন নম্বর">
                                                            </div>


                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_registration_date" value="{{ date("d-m-Y", strtotime($ngoDurationReg)) }}" class="form-control datepickerOne" id=""
                                                                       placeholder="ব্যুরোর নিবন্ধন তারিখ">
                                                            </div>
                                                        </div>
                                                    </th>

                                                </tr>
                                              <!-- step one start  -->


 <!-- step three start -->

 <tr>
    <th style="text-align: center;"  rowspan="2">২.</th>

    <th style="" colspan="2">প্রস্তাবিত প্রকল্পের নাম <span style="color:red;">*</span></th>
    <th style="text-align: center;">


                <input name="ngo_prokolpo_name" type="text" class="form-control" id="ngo_prokolpo_name"
                       placeholder="প্রস্তাবিত প্রকল্পের নাম" required>




        </div>
    </th>

</tr>
<tr>


    <th style="" colspan="2">প্রস্তাবিত প্রকল্পের ধরণ<span style="color:red;">*</span></th>
    <th style="text-align: center;">

                <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                       placeholder="">
                       <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                       @foreach($projectSubjectList as $projectSubjectLists)
                       <option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>
                       @endforeach
                </select>

    </th>

</tr>


                                                <tr>
                                                    <th style="text-align: center;" rowspan="4">৩.</th>

                                                    <td style="font-weight:bold;" colspan="3">বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ (আনুমানিক মূল্যসহ )  <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div></td>


                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <?php


        $distributionListOne = DB::table('fd_seven_distribution_details')
        ->where('type','প্রকল্প খাতের ব্যয়')
        ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

        $distributionListTwo = DB::table('fd_seven_distribution_details')
        ->where('type','প্রশাসনিক ব্যয়')
        ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

        //dd($distributionListTwo);


                                                            ?>

                                                        <div class="table-responsive" id="tableAjaxDatadis">

                                                            @include('front.fd7Form._partial.distributionTable')

                                                        </div>

                                                        <input type="file" accept=".pdf" name="distribution_pdf" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার বিবরণ">



                                                </span>


                                            </td>


                                                </tr>
                                                <tr>
                                                </tr>

                                                <tr>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step four start --->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="14">৪.</th>

                                                    <th  colspan="3">অর্থ বা ত্রাণ-সামগ্রীর উৎস</th>

                                                </tr>



                                                <tr >

                                                    <th style="text-align: center;">ক.</th>
                                                    <th>দাতা সংস্থার প্রতিশ্রুতিপত্র</th>
                                                    <td>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>১. দাতা সংস্থার বিবরণ <span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" name="donor_organization_description" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার বিবরণ">
                                                        </div>

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>২. প্রধান নির্বাহী কর্মকর্তা/ দাতার নাম<span style="color:red;">* </span></td>
                                                    <td>

                                                        <div class="mb-3 col-lg-12">

                                                            <select name="donor_organization_chief_type" class="form-control" id="">
                                                                <option value="প্রধান নির্বাহী কর্মকর্তা" selected>প্রধান নির্বাহী কর্মকর্তা</option>
                                                                <option value="দাতার নাম">দাতার নাম</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" name="donor_organization_chief_name" class="form-control" id=""
                                                                   placeholder="নাম">
                                                        </div>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৩. দাতা সংস্থার নাম <span style="color:red;">* </span></td>
                                                    <td>
                                                        <input type="text" name="donor_organization_name" class="form-control" id=""
                                                        placeholder="দাতা সংস্থার নাম">




                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৪. যোগাযোগের ঠিকানা <span style="color:red;">* </span></td>
                                                    <td>

                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" name="donor_organization_address" class="form-control" id=""
                                                                   placeholder="যোগাযোগের ঠিকানা">
                                                        </div>



                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৫. টেলিফোন <span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="number" name="donor_organization_phone" class="form-control" id=""
                                                                   placeholder="টেলিফোন">
                                                        </div>


                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৬. ইমেইল ও ওয়েবসাইট<span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="email"name="donor_organization_email" class="form-control" id=""
                                                                   placeholder="ইমেইল">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" name="donor_organization_website" class="form-control" id=""
                                                                   placeholder="ওয়েবসাইট">
                                                        </div>

                                                    </td>

                                                </tr>


                                                <tr>
                                                    <th style="text-align: center;"> খ.</th>
                                                <th colspan="2">চলমান অন্য কোনো প্রকল্পের অর্থ দ্বারা প্রস্তাবিত কার্যক্রম বাস্তবায়নের ক্ষেত্রে </th>


                                            </tr>

<tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>১. চলমান প্রকল্পের নাম ও মোট ব্যয় <span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type="text" name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="চলমান প্রকল্পের নাম">


                                                                    <input type="text" name="total_prokolpo_cost" class="form-control mt-2" id=""
                                                                           placeholder="মোট ব্যয়">




                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>২. ব্যুরোর অনুমোদনের তারিখ (অনুমোদনপত্র সংযুক্ত করতে হবে   <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>) <span style="color:red;">* </span></td>
                                                    <td>


                                                            <input type="text" name="date_of_bureau_approval" class="form-control datepickerOne" id=""
                                                                   placeholder="ব্যুরোর অনুমোদনের তারিখ">



                                                            <input type="file" accept=".pdf" name="bureau_approval_pdf" class="form-control mt-2" id="fd7PdfN1"
                                                                   placeholder="">

                                                                   <p id="fd7PdfN1_text" class="text-danger mt-2" style="font-size:12px;"></p>



                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৩. মূল প্রকল্পের শতকরা কতভাগ এই
                                                        প্রকল্পের ব্যায় করা হবে  <span style="color:red;">* </span></td>
                                                    <td>

                                                        <input type="text" name="percentage_of_the_original_project" class="form-control" id=""
                                                        placeholder="মূল প্রকল্পের শতকরা কতভাগ এই প্রকল্পের ব্যায় করা হবে ">




                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৪. চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না<span style="color:red;">* </span></td>
                                                    <td>
                                                            <input type="text" name="adverse_impact_on_the_ongoing_project" class="form-control" id=""
                                                                   placeholder="চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না">

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৫. দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি
                                                        সংযুক্ত করতে হবে)<span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
                                                    <td>

                                                            <input type="file" accept=".pdf" name="letter_from_donor_agency_pdf" class="form-control" id="fd7PdfN2"
                                                                   placeholder="">

                                                                   <p id="fd7PdfN2_text" class="text-danger mt-2" style="font-size:12px;"></p>


                                                    </td>

                                                </tr>


                                                <!-- steap four end -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="4">৫.</th>

                                                    <td style="font-weight:bold;" colspan="2">প্রকল্প এলাকা</td>
                                                    <td> <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal12" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div></td>

                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <div class="table-responsive" id="tableAjaxDatapro">

                                                          @include('front.fd7Form._partial.prokolpoAreaTable')

                                                        </div>
                                                        <span>টীকা :জেলা প্রশাসন /উপজেলা নির্বাহী অফিসার সুষ্ঠূ সমন্বয় ও সুষম বন্টনের স্বার্থে প্রকল্প এলাকা পরিবর্তন করার ক্ষমতা রাখে।</span>



                                                </span>


                                            </td>


                                                </tr>
                                                <tr>
                                                </tr>

                                                <tr>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step five start -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৬.</th>

                                                    <td style="font-weight:bold;" colspan="3">
                                                        ত্রাণ কর্যক্রম কিভাবে বাস্তবায়িত হবে তার বিবরণ দিতে হবে (এটি সুস্পষ্ট করুন যাহাতে কতৃপক্ষের জন্য তদারকি /পরীক্ষণ সহজ হয় )<span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span>
                                                    </td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3"><textarea name="relief_program_detail" class="form-control mt-1 summernote" id=""
                                                         >
                                                        </textarea>

                                                        <input type="file" accept=".pdf"  name="relief_program_pdf" class="form-control mt-3" id=""
                                                        placeholder="সমাপ্তির তারিখ" >
                                                    </td>

                                                </tr>

                                                <!-- step five end --->

                                                <!-- step six start -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="3">৭.</th>
                                                    <td></td>
                                                    <td style="font-weight:bold;">কার্যক্রমের মেয়াদকাল</td>
                                                    <td></td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক.</td>
                                                    <td>  আরম্ভের তারিখ<span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type="text" name="ngo_prokolpo_start_date" class="form-control datepickerOne" id="ngo_prokolpo_start_date"
                                                                   placeholder="আরম্ভের তারিখ" required>


                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ.</td>
                                                    <td>সমাপ্তির তারিখ <span style="color:red;">*</span> </td>
                                                    <td>


                                                            <input type="text" name="ngo_prokolpo_end_date" class="form-control datepickerOne" id=""
                                                                   placeholder="সমাপ্তির তারিখ" required>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৮.</th>

                                                    <td style="font-weight:bold;" colspan="3">
                                                        প্রকল্প বাস্তবায়ন সংক্রান্ত অন্যান্য প্রাসঙ্গিক তথ্য (ভবিষ্যত পরিকল্পনাসহ যদি থাকে)
                                                        <span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span>
                                                    </td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3">

                                                        <textarea name="relevant_information" class="form-control mt-1 summernote" id=""
                                                         >
                                                        </textarea>

                                                        <input type="file" accept=".pdf" name="relevant_information_pdf" class="form-control mt-3" id=""
                                                                   placeholder="সমাপ্তির তারিখ" >


                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৯.</th>

                                                    <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণ সংক্রান্ত ব্যাংকের তথ্যাদি <span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3">

                                                        <textarea name="bank_detail" class="form-control mt-1 summernote" id=""
                                                         >
                                                        </textarea>

                                                        <input type="file" accept=".pdf" name="bank_detail_pdf" class="form-control mt-3" id=""
                                                                   placeholder="সমাপ্তির তারিখ" >


                                                    </td>

                                                </tr>



                                            </table>

                                        </div>


                                        </div>
                                    </div>
                                    <!-- step one end --->

                                    <div class="mb-3 col-lg-12 mt-3">

                                        <div class="card">

                                            <div class="card-header">
                                                সংস্থা প্রধানের  তথ্যাদি

                                            </div>
                                            <div class="card-body">

                                                  <!--new code for ngo-->
                                     <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                             <input type="text" data-parsley-required  name="chief_name"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                            <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                                        </div>



                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                <br>
                                                <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                                <br>
                                            <input type="hidden" required  name="image_base64">
                                            <div class="croppedInput mt-2">

                                            </div>
                                            <!-- new code for image cropper start --->
                                            @include('front.signature_modal.sign_main_modal')
                                            <!-- new code for image cropper end -->

                                        </div>


                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                             <br>
                                            <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                            <input type="hidden" required  name="image_seal_base64">
                                            <div class="croppedInputss mt-2">

                                            </div>
                                            <!-- new code for image cropper start --->
                                            @include('front.signature_modal.seal_main_modal')
                                            <!-- new code for image cropper end -->
                                        </div>
                                        <!-- end new code -->

                                            </div>
                                        </div>



                                    </div>

                                    {{-- <div class="card mb-3">
                                        <div class="card-header">
                                            দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৭ ফরম
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৭ ফরম আপলোড করুন <span class="text-danger">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
                                                <input type="file" accept=".pdf" required name="relief_assistance_project_proposal_pdf" class="form-control" id="rPdfP"

                                                       placeholder="">
                                                       <p id="rPdfP_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  class="btn btn-registration"
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
    <div class="modal modal-xl fade" id="mmexampleModaleditnewemm"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
    
                        বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ
    
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body" id="viewDistributionEditDataAjaxForEdit">
    
                           
    
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
</section>
<!--modal-->
@include('front.fd7Form._partial.distributionModal')

<!-- end modal -->
<!--modal-->
@include('front.fd7Form._partial.prokolpoAreaModal')

<!-- end modal -->

@endsection

@section('script')
@include('front.fd7Form._partial.script')
@include('front.zoomButtonImage')
<script>

    ///


$(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(get_id_from_main);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

    $.ajax({
    url: "{{ route('getUpozilaListNew') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name"+get_id_from_main).html('');
      $("#upozila_name"+get_id_from_main).html(data);

      $("#thana_name"+get_id_from_main).html('');
      $("#thana_name"+get_id_from_main).html(data);
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
    },
    beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
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

@include('front.include.globalScript')

@endsection
