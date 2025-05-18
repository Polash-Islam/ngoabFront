@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
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

                                    <form action="{{ route('fd6Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="row">


    @csrf
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">এনজিও'র নাম <span class="text-danger">*</span></label>


                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                    placeholder="">

                                    @else


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                    placeholder="">


                                    @endif



                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর নিবন্ধন তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_registration_date" value="{{ date("d-m-Y", strtotime($ngoDurationReg)) }}" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সর্বশেষ নবায়ন <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_last_renew_date" value="{{ date("d-m-Y", strtotime($ngoDurationLastEx->created_at)) }}" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">মেয়াদ উত্তীর্ণের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_expiration_date" value="{{ date("d-m-Y", strtotime($ngoDurationLastEx->ngo_duration_end_date)) }}" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_telephone_number" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type = "number" required
                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngo_list_all->phone }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_email_address" class="form-control" id=""
                                                   placeholder="" value="{{ $ngo_list_all->email }}">
                                        </div>

                                        @if(empty($ngo_list_all->web_site_name))
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        @else
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $ngo_list_all->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        @endif
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প নাম <span class="text-danger">*</span></label>
                                            <input name="ngo_prokolpo_name" type="text" class="form-control" id="ngo_prokolpo_name"
                                                   placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                                            <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                                                   placeholder="">
                                                   <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                                   @foreach($projectSubjectList as $projectSubjectLists)
                                                   <option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>
                                                   @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প মেয়াদ <span class="text-danger">*</span></label>
                                            <input type="text" name="ngo_prokolpo_duration" class="form-control" id="ngo_prokolpo_duration"
                                                   placeholder="" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">আরম্ভের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" name="ngo_prokolpo_start_date" class="form-control datepickerOne" id="ngo_prokolpo_start_date"
                                                   placeholder="" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সমাপ্তির তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" name="ngo_prokolpo_end_date" class="form-control datepickerOne" id="ngo_prokolpo_end_date"
                                                   placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকা</label>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <!-- global table  start --->
                                           @include('front.include.globalTable')
                                            <!-- global table end --->

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :
                                            </label>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রাক্কলিক ব্যয় (টাকায়)
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>অর্থের উৎসের বিবরণ:</th>
                                                    <th>১ম বছর</th>
                                                    <th>২য় বছর</th>
                                                    <th>৩য় বছর</th>
                                                    <th>৪র্থ বছর</th>
                                                    <th>৫ম বছর</th>
                                                    <th>মোট</th>
                                                    <th>মন্তব্য</th>
                                                </tr>
                                                <tr>
                                                    <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)</td>
                                                    <td><input type="text" name="grants_received_from_abroad_first_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_second_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_third_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_fourth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_fifth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_total" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="grants_received_from_abroad_comment" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান </td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_first_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_second_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_third_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_fourth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_fifth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_total" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="donations_made_by_foreign_donors_comment" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>৩.স্থানীয় অনুদান  (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</td>
                                                    <td><input type="text" name="local_grants_first_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="local_grants_second_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="local_grants_third_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="local_grants_fourth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="local_grants_fifth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="local_grants_donors_total" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text"  name="local_grants_donors_comment" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>মোট </td>
                                                    <td><input type="text" name="total_first_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="total_second_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="total_third_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="total_fourth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text"  name="total_fifth_year" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="total_donors_total" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" name="total_donors_comment" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">দাতা সংস্থার নাম <span class="text-danger">*</span></label>
                                            <input type="text" required name="donor_organization_name" class="form-control" id="donor_organization_name"
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">দাতা সংস্থার ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="donor_organization_address" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ফোন/মোবাইল/ইমেইল নম্বর  <span class="text-danger">*</span></label>
                                            <input type="text" required name="donor_organization_phone_mobile_email" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট  <span class="text-danger">*</span></label>
                                            <input type="text" required name="donor_organization_website" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label"> মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত <span class="text-danger">*</span></label>
                                            <input type="text" required name="money_laundering_and_terrorist_financing" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>#</th>
                                                    <th>টাকার পরিমাণ <span class="text-danger">*</span></th>
                                                    <th>অনুপাত <span class="text-danger">*</span></th>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প ব্যয় <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="project_cost" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" required name="project_cost_ratio" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রশাসনিক ব্যয় <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="administrative_cost" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" required name="administrative_ratio" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>মোট <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="project_and_administrative_cost" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" required name="project_and_administrative_cost_ratio" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড প্রদর্শন বিষয়ক তথ্যাদি :</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>প্রকল্পের নাম  <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required  name="project_name" class="form-control" id="project_name"
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্পের মেয়াদকাল <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="duration_of_project" class="form-control" id="duration_of_project"
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্পের মোট বরাদ্দ <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="total_allocation_of_project" class="form-control" id="total_allocation_of_project"
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প এলাকায় মোট বরাদ্দ <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="total_allocation_in_project_area"  class="form-control" id="total_allocation_in_project_area"
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> মোট উপকারভোগীর সংখ্যা <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="total_beneficiaries" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প এলাকায় মোট জনসংখ্যা <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="total_population_in_project_area" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>দাতা সংস্থার নাম <span class="text-danger">*</span></td>
                                                    <td>
                                                        <input type="text" required name="donor_organization_name_two" class="form-control" id="donor_organization_name_two"
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৬ ফরম
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">প্রকল্প প্রস্তাব ফরম পিডিফ আপলোড করুন <span class="text-danger">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
                                                <input type="file" accept=".pdf" required name="project_proposal_form" class="form-control" id="project_proposal_form"
                                                       placeholder="">
                                                       <p id="project_proposal_form_text" class="text-danger mt-2" style="font-size:12px;"></p>
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




@include('front.include.globalScript')

@endsection
