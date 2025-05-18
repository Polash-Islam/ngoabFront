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
                                <p class="{{Route::is('fd6StepFive') || Route::is('fd6StepFour') || Route::is('fd6StepThree') || Route::is('fd6StepTwo') ||  Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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

                                    <form action="{{ route('fd6StepFiveMainUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fd6Id" id="fd6Id" value="{{ $fd6Id }}"/>
                                        <input type="hidden" name="fd6AdjoiningEListId" id="fd6AdjoiningEListId" value="{{ $fd6AdjoiningEList->id }}"/>

                                        <input type="hidden" id="expenseId" value="1"/>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
  <!--FD06 Section Shonglognni Umo-->

  <tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঙ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">সমাপ্ত অনুরূপ প্রকল্পের অর্জন
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td>
        <input class="form-control" value="{{ $fd6AdjoiningEList->prokolpo_name }}" name="prokolpo_name" type="text"
               placeholder="প্রকল্পের নাম   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="2"> প্রকল্পের মেয়াদ</td>
    <td>
        <input class="form-control" value="{{ $fd6AdjoiningEList->prokolpo_duration }}"  name="prokolpo_duration" type="text"
               placeholder="প্রকল্পের মেয়াদ   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
    <td>


               <div id="datepicker123" class="input-group date" data-date-format="mm-dd-yyyy">
                <input class="form-control" value="{{ date("d-m-Y", strtotime($fd6AdjoiningEList->ngo_permission_date)) }}" name="ngo_permission_date" type="text"  placeholder="এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>

    </td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2"> প্রকল্প মূল্য</td>
    <td>
        <input class="form-control" value="{{ $fd6AdjoiningEList->prokolpo_price }}" name="prokolpo_price" type="text"
               placeholder="প্রকল্প মূল্য ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৫)</td>
    <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
        প্রমাণক
    </td>
    <td>

        <div class="col-md-12">
            <label>প্রকল্পের অডিট প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক</label>
            <input class="form-control" accept=".pdf" name="prokolpo_audit_report" type="file"
                   placeholder="প্রকল্পের অডিট প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক">

                   @if(empty($fd6AdjoiningEList->prokolpo_audit_report))


                   @else


                   <?php

                   $file_path = url($fd6AdjoiningEList->prokolpo_audit_report);
                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                   ?>
                    <b>{{ $filename.'.'.$extension }}</b>
                    @endif
        </div>

        <div class="col-md-12 mt-5">
            <label>প্রকল্পের সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক</label>
            <input class="form-control" accept=".pdf" name="prokolpo_final_report" type="file"
            placeholder="প্রকল্পের সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক">

            @if(empty($fd6AdjoiningEList->prokolpo_final_report))


            @else


            <?php

            $file_path = url($fd6AdjoiningEList->prokolpo_final_report);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




            ?>
             <b>{{ $filename.'.'.$extension }}</b>
             @endif
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৬)</td>
    <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
    <td>
        <input class="form-control" type="file" accept=".pdf" name="prokolpo_local_audit_report"
               placeholder=" স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক ">

               @if(empty($fd6AdjoiningEList->prokolpo_local_audit_report))


               @else


               <?php

               $file_path = url($fd6AdjoiningEList->prokolpo_local_audit_report);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
                <b>{{ $filename.'.'.$extension }}</b>
                @endif
    </td>
</tr>
<tr>
    <td style="width:40px;">০৭)</td>
    <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
    <td>
        <input class="form-control" value="{{ $fd6AdjoiningEList->development_detail }}" name="development_detail" type="text"
               placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">
    </td>
</tr>
<tr>
    <td colspan="4">

        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#formSixModal">বিস্তারিত তথ্য যুক্ত করুন
        </a>
        </div>
        <div class="table-reponsive" id="tableAjaxDataFormSix">
      @include('front.fd6Form.partTwo.detailsOfForm6DataTable')
        </div>
    </td>
</tr>

<!--FD06 Section Shonglognni Ca-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’চ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">

        <div class="d-flex justify-content-between">
            <div>উপকরণের বিস্তারিত বর্ণনা (প্রযোজ্যক্ষেত্রে) <br>
                অফিস যন্ত্রপাতি, মেশিনপত্র ও যানবাহন।</div>
            <div>
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#adjoiningfModal">বিস্তারিত তথ্য যুক্ত করুন
        </a>
    </div>
        </div>
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="3"> আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা :</td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="adjoiningSixDataTable">
          @include('front.fd6Form.partTwo.adjoiningSixDataTable')
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="3">  মেশিনপত্রের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfMachineryTable">
            @include('front.fd6Form.partTwo.descriptionOfMachineryTable')

        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="3">  যানবাহনের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfVehicle">
            @include('front.fd6Form.partTwo.descriptionOfVehicle')
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2">প্রকল্প সমাপ্ত হওয়ার পরে এই অফিস যন্ত্রপাতি, মেশিনপত্র এবং যানবাহনগুলো কিভাবে ব্যবহার হবে সেই বিষয়ে বর্ণনা :</td>
    <td>
        <input class="form-control" name="after_end_prokolpo" accept=".pdf" type="file"
               placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">

               @if(empty($fd6AdjoiningEList->after_end_prokolpo))


               @else


               <?php

               $file_path = url($fd6AdjoiningEList->after_end_prokolpo);
               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




               ?>
                <b>{{ $filename.'.'.$extension }}</b>
                @endif
    </td>
</tr>

<!--FD06 Section Shonglognni Cha-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ছ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">প্রশিক্ষণ, সেমিনার, ওয়ার্কশপ ও কনফারেন্সের সম্ভাব্য দিনপুঞ্জি
    </td>
</tr>
<tr>
    <td colspan="4">
        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#Dinpunjji">নতুন
                দিনপুঞ্জি
                যুক্ত করুন
        </a>
        </div>
        <div class="table-reponsive" id="dinpunjjiTable">
        @include('front.fd6Form.partTwo.dinpunjjiTable')
        </div>

        <div class="mb-3 col-lg-12 mt-3">

            <div class="card">

                <div class="card-header">
                    সংস্থা প্রধানের  তথ্যাদি

                </div>
                <div class="card-body">

                      <!--new code for ngo-->
         <div class="mb-3">
            <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                 <input type="text" data-parsley-required value="{{ $fd6FormList->chief_name }}"  name="chief_name"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                <input type="text" data-parsley-required value="{{ $fd6FormList->chief_desi }}"  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
            </div>



            <div class="mb-3">
                <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
    <br>
                    <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
    <br>
                <input type="hidden" required  name="image_base64">
                <div class="croppedInput mt-2">
              <img src="{{ asset('/') }}{{ $fd6FormList->digital_signature }}"/>
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
                    <img src="{{ asset('/') }}{{ $fd6FormList->digital_seal}}"/>
                </div>
                <!-- new code for image cropper start --->
                @include('front.signature_modal.seal_main_modal')
                <!-- new code for image cropper end -->
            </div>
            <!-- end new code -->

                </div>
            </div>



        </div>
    </td>
</tr>
                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">

                                        <a href="{{ route('fd6StepFourEdit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                                     </a>

                                        <button type="submit" style="margin-left:10px;"  class="btn btn-registration"
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
@include('front.fd6Form._partial.formSixNgoModal')
@include('front.fd6Form._partial.adjoiningfModal')
@include('front.fd6Form._partial.dinpunjjiModal')

@endsection

@section('script')
@include('front.zoomButtonImage')
@include('front.fd6Form._partial.scriptPartTwo')
@endsection
