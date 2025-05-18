@extends('front.master.master')

@section('title')
{{ trans('fd9.fd09formone')}}| {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fdNineOneForm.show') || Route::is('fdNineOneForm.edit') || Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
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
                                    <form method="post" action="{{ route('fdNineOneForm.update',$fd9OneList->id) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="form9_upper_box">
                                        <h3>এফডি-৯(১) ফরম</h3>
                                        <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের
                                            (কার্যানুমতি) আবেদন ফরম</h4>

                                        <div>
                                            <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো <br>
                                                প্রধানমন্ত্রীর কার্যালয়</p>
                                            <p>বিষয়: সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী “<span style="color:red;">*</span><input
                                                        type="text" class="form-control custom-form" value="{{ $fd9OneList->foreigner_name_for_subject }}" name="foreigner_name_for_subject" required> ”' এর ওয়ার্ক পারমিট প্রসঙ্গে।
                                            </p>
                                            <p>
                                                সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর
                                                <span style="color:red;">*</span><input type="text" class="form-control custom-form" value="{{ $fd9OneList->sarok_number }}" name="sarok_number" id="" placeholder="" required> তারিখ <span style="color:red;">*</span><input type="text" class="form-control custom-form datepickerOne" id="" required  ="" name="application_date" value="{{ $fd9OneList->application_date }}">
                                            </p>

                                            <p class="mt-3">
                                                উপর্যুক্ত বিষয় ও সূত্রের বরাতে <span style="color:red;">*</span><input type="text" value="{{ $fd9OneList->institute_name }}"  name="institute_name" required class="form-control custom-form"
                                                                                      id="" placeholder=""> সংস্থার
                                                <span style="color:red;">*</span><input type="text" name="prokolpo_name" value="{{ $fd9OneList->prokolpo_name }}" required class="form-control custom-form" id="" placeholder=""> প্রকল্পের
                                                আওতায় <span style="color:red;">*</span><input type="text" class="form-control custom-form" required value="{{ $fd9OneList->designation_name }}" name="designation_name" id="" placeholder="">
                                                হিসেবে বিদেশী বিশেষজ্ঞ/ উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী <span style="color:red;">*</span><input
                                                        type="text" class="form-control custom-form" required value="{{ $fd9OneList->foreigner_name_for_body }}" name="foreigner_name_for_body" id="" placeholder=""> কে <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepickerOne custom-form" required value="{{ $fd9OneList->expire_from_date }}" name="expire_from_date" id="" placeholder=""> খ্রি: হতে
                                                        <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepickerOne custom-form" required value="{{ $fd9OneList->expire_to_date }}" name="expire_to_date" id="" placeholder="">
                                                পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে উক্ত ব্যাক্তির
                                                অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু
                                                করার জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                                            </p>
                                            <ul>
                                                <li>নিয়োগপত্র সত্যায়ন প্রমাণক :  <span style="color:red;">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span><input type="file" name="attestation_of_appointment_letter" accept="application/pdf" class="form-control custom-form"
                                                                                        id="fdNineOnePdf1"  placeholder="">

                                                                                        <p id="fdNineOnePdf1_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                                                        <?php

                                                                                        if(!$fd9OneList->attestation_of_appointment_letter){

                                                                                        }else{



                                                                                        $file_path = url($fd9OneList->attestation_of_appointment_letter);
                                                                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                                                        echo $filename.'.'.$extension ;
                                                                                        }




                                                                                                        ?>
                                                                                    </li>
                                                <li>ফর্ম ৯ এর কপি: <span style="color:red;">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span><input type="file" name="copy_of_form_nine"  accept="application/pdf"class="form-control custom-form"
                                                                         id="fdNineOnePdf2" placeholder="">
                                                                         <p id="fdNineOnePdf2_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                                                         <?php

                                                                         if(!$fd9OneList->copy_of_form_nine){

                                                                         }else{



                                                                         $file_path = url($fd9OneList->copy_of_form_nine);
                                                                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                                         echo $filename.'.'.$extension ;
                                                                         }




                                                                                         ?>
                                                                        </li>
                                                <li>ছবি: <span style="color:red;">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 200 KB & Image Format:PNG)</span><input type="file" accept="image/png" name="foreigner_image" class="form-control custom-form"
                                                               id="fdNineOnePdf3" placeholder="">

                                                               <p id="fdNineOnePdf3_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                               @if(!$fd9OneList->foreigner_image)

                                                               @else
<img src="{{ asset('/') }}{{ $fd9OneList->foreigner_image }}" style="height:40px;"/>

                                                               @endif


                                                            </li>
                                                <li>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ): <span style="color:red;">*</span><input type="text" required name="arrival_date_in_nvisa" value="{{ $fd9OneList->arrival_date_in_nvisa }}"  class="form-control datepickerOne custom-form"
                                                                                                id="" placeholder=""><span style="color:red;">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span><input  type="file" accept="application/pdf" name="copy_of_nvisa" class="form-control custom-form"
                                                                                                id="fdNineOnePdf4" placeholder="">
                                                                                                <p id="fdNineOnePdf4_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                                                                                <?php

                                                                                                if(!$fd9OneList->copy_of_nvisa){

                                                                                                }else{



                                                                                                $file_path = url($fd9OneList->copy_of_nvisa);
                                                                                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                                                                echo $filename.'.'.$extension ;
                                                                                                }




                                                                                                                ?></li>
                                            </ul>
                                            <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে <span><span style="color:red;">*</span><input type="text" required name="proposed_from_date" value="{{ $fd9OneList->proposed_from_date }}" class="datepickerOne form-control custom-form"
                                                id="" placeholder=""></span> হতে <span><span style="color:red;">*</span><input type="text" required name="proposed_to_date" value="{{ $fd9OneList->proposed_to_date }}" class="datepickerOne form-control custom-form"
                                                    id="" placeholder=""></span> মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>
                                        </div>
                                    </div>


                                                                                                         <!--new code for ngo-->
 <div class="mb-3">
    <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
         <input type="text" data-parsley-required  name="chief_name" value="{{ $fd9OneList->chief_name }}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
        <input type="text" data-parsley-required  name="chief_desi" value="{{ $fd9OneList->chief_desi }}"   class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
    </div>



    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
<br>
            <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
<br>
        <input type="hidden"  name="image_base64">
        <div class="croppedInput mt-2">
        <img src="{{asset('/')}}{{ $fd9OneList->digital_signature }}" style="width: 200px;" class="show-image">
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

        <input type="hidden"  name="image_seal_base64">
        <div class="croppedInputss mt-2">
        <img src="{{asset('/')}}{{ $fd9OneList->digital_seal }}" style="width: 200px;" class="show_image_seal">
        </div>
        <!-- new code for image cropper start --->
        @include('front.signature_modal.seal_main_modal')
        <!-- new code for image cropper end -->
    </div>
    <!-- end new code -->
    <!-- end new code -->

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                                >পরবর্তী ধাপ
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
<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5>

            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->
@endsection
@section('script')
@include('front.zoomButtonImage')
@endsection
