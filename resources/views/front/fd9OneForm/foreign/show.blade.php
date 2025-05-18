@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

@include('translate')

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
                                <p class="{{ Route::is('fdNineOneForm.show') || Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
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
<!--download pdf -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>PDF Download (পিডিএফ ডাউনলোড )</td>
                                <td>PDF Upload (পিডিএফ আপলোড)</td>
                                <td>Update Information (তথ্য সংশোধন করুন)</td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('mainPdfDownload',$fd9OneList->id) }}">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </a> --}}

                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal234">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </button>

                                    <div class="modal fade" id="exampleModal234" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">

                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>প্রধান নির্বাহীর নাম ও পদবি প্রদান করুন </h5>
                                                    <div class=" mt-3 mb-3">
                                                        <label for="" class="form-label">প্রধান নির্বাহীর নাম:</label>
                                                        <input type="text" data-parsley-required  name="নাম" value="{{ $fd9OneList->chief_name }}"  class="form-control" id="mainName" placeholder="নাম">
                                                        <label for="" class="form-label mt-3">প্রধান নির্বাহীর পদবি:</label>
                                                        <input type="text" data-parsley-required  name="পদবি" value="{{ $fd9OneList->chief_desi }}"  class="form-control" id="mainDesignation" placeholder="পদবী">
                                                        <input type="hidden" data-parsley-required  name="id"  value="{{ $fd9OneList->id }}" class="form-control" id="mainId">
                                                    </div>

                                                    <button class="btn btn-sm btn-success" id="downloadButton">
                                                        {{ trans('form 8_bn.download_pdf')}}
                                                    </button>

                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                </td>
                                <td>

                                    @if(empty($fd9OneList->verified_fd_nine_one_form))
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ trans('form 8_bn.upload_pdf')}}
                                    </button>
                                    @else

                                    <?php

                                    $file_path = url($fd9OneList->verified_fd_nine_one_form);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                    ?>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @if(session()->get('locale') == 'en')
                                        পুনরায় আপলোড করুন
                                        @else
                                        Re-upload
                                        @endif
                                    </button><br>
                                    <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                                    @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('mainPdfUpload') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                                <input type="file" data-parsley-required accept=".pdf" name="verified_fd_nine_one_form"  class="form-control" id="">
                                <input type="hidden" data-parsley-required  name="id"  value="{{ $fd9OneList->id }}" class="form-control" id="">
                            </div>

                            <button class="btn btn-sm btn-success" type="submit">
                                {{ trans('form 8_bn.upload_pdf')}}
                            </button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

                                </td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fdNineOneForm.edit',$fd9OneList->id) }}';">
                                    আপডেট করুন
                 </button>
                             </td>
                         </tr>

                        </table>

                    </div>
                </div>
<!--end download pdf -->

                <div class="card">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি-৯(১) ফরম</h3>
                            <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের (কার্যানুমতি)
                                আবেদন ফরম</h4>
                            <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                            <div>
                                <p>বরাবর <br>
                                    মহাপরিচালক <br>
                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                    জনাব,</p>

                            </div>
                        </div>
                    </div>
                    <div class="card-body fd0901_text_style">
                        <table class="table table-borderless">
                            <tr>
                                <td>বিষয়:</td>
                                <td>"{{ $fd9OneList->institute_name }}" সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী "{{ $fd9OneList->foreigner_name_for_subject }}" এর
                                    ওয়ার্ক পারমিট প্রসঙ্গে।
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর {{ $fd9OneList->sarok_number }} তারিখ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->application_date))) }}
                                </td>
                            </tr>
                        </table>

                        <p class="mt-3 mb-2">
                            উপর্যুক্ত বিষয় ও সূত্রের বরাতে "{{ $fd9OneList->institute_name }}" সংস্থার "{{ $fd9OneList->prokolpo_name }}" প্রকল্পের আওতায় "{{ $fd9OneList->designation_name }}" হিসেবে বিদেশী বিশেষজ্ঞ/
                            উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী {{ $fd9OneList->foreigner_name_for_body }} কে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->expire_from_date))) }} খ্রি: হতে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->expire_to_date))) }} পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে
                            উক্ত ব্যাক্তির অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু করার
                            জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                        </p>

                        <table class="table table-borderless">
                            <tr>
                                <td>০১</td>
                                <td>নিয়োগপত্র সত্যায়ন প্রমাণক</td>
                                <td>: @if(!$fd9OneList->attestation_of_appointment_letter)

                                    @else

     <?php

                                     $file_path = url($fd9OneList->attestation_of_appointment_letter);
                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                     ?>
      @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

      <a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'appointment','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
      @else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'appointment','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
           @endif
                                     @endif
                                     {{-- <a href="{{ route('niyogPotroDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
    </td>
                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>ফর্ম ৯ এর কপি</td>
                                <td>:  @if(!$fd9OneList->copy_of_form_nine)

                                    @else

     <?php

                                     $file_path = url($fd9OneList->copy_of_form_nine);
                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                     ?>
 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

 <a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'form9Copy','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
 @else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'form9Copy','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
      @endif
                                     @endif
                                     {{-- <a href="{{ route('formNinePdfDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
    </td>
                            </tr>
                            <tr>
                                <td>০৩</td>
                                <td>ছবি</td>
                                <td>:<img src="{{ asset('/') }}{{ $fd9OneList->foreigner_image }}" style="height:40px;"/></td>
                            </tr>
                            <tr>
                                <td>০৪</td>
                                <td>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ)</td>
                                <td>:

                                    @if(!$fd9OneList->copy_of_nvisa)

                               @else

<?php

                                $file_path = url($fd9OneList->copy_of_nvisa);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                ?>
 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

 <a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'copyNvisa','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
 @else

<a target="_blank"  href="{{ route('fd9OneFormExtraPdfDownload',['cat'=>'copyNvisa','id'=>base64_encode($fd9OneList->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
      @endif,
                                @endif
{{-- <a href="{{ route('nVisaCopyDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>, --}}
                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->arrival_date_in_nvisa))) }}</td>
                            </tr>
                        </table>

                        <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }} হতে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }} মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12"></div>
                            <div class="col-lg-6 col-sm-12">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                    </tr>
                                    <tr>
                                        <td>নামঃ</td>
                                    </tr>
                                    <tr>
                                        <td>পদবীঃ</td>
                                    </tr>
                                    <tr>
                                        <td>তারিখঃ</td>
                                    </tr>
                                </table>
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
$("#downloadButton").click(function(){
      var name = $('#mainName').val();
      var designation = $('#mainDesignation').val();
      var id = $('#mainId').val();

      $.ajax({
        url: "{{ route('fd9OneChief') }}",
        method: 'GET',
        data: {name:name,designation:designation,id:id},
        success: function(data) {



            window.open(data);

        }
        });

  });
  </script>
@endsection
