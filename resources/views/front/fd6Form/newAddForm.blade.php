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
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">

                                                    <!--FD06 Section 01-->

                                                    <tr>
                                                        <td rowspan="7" style="width:40px;">০১</td>
                                                        <td style="width:40px;">ক)</td>
                                                        <td style="width:30%">এনজিও'র নাম</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="এনজিও'র নাম">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>ব্যুরোর নিবন্ধন নং ও তারিখ</td>
                                                        <td>
                                                            <input type="text" class="form-control mb-3" id=""
                                                                   placeholder="ব্যুরোর নিবন্ধন নং">
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="তারিখ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>সর্বশেষ নবায়ন ও মেয়াদ উত্তীর্ণের তারিখ</td>
                                                        <td>
                                                            <label for="" class="form-label">সর্বশেষ নবায়ন তারিখ</label>
                                                            <input type="date" class="form-control mb-3" id="">
                                                            <label for="" class="form-label">মেয়াদ উত্তীর্ণের তারিখ</label>
                                                            <input type="date" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td> ঠিকানা</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="ঠিকানা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td>টেলিফোন ও মোবাইল নম্বর</td>
                                                        <td>
                                                            <input type="text" class="form-control mb-3" id=""
                                                                   placeholder="টেলিফোন নম্বর">
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="মোবাইল নম্বর ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">চ)</td>
                                                        <td> ইমেইল ঠিকানা</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="ইমেইল ঠিকানা ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ছ)</td>
                                                        <td>ওয়েবসাইট</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="ওয়েবসাইট">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 02-->

                                                    <tr>
                                                        <td style="width:40px;">০২</td>
                                                        <td colspan="2">প্রকল্পের নাম</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="প্রকল্পের নাম">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 03-->

                                                    <tr>
                                                        <td rowspan="3" style="width:40px;">০৩</td>
                                                        <td colspan="2">প্রকল্পের মেয়াদ</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="প্রকল্পের মেয়াদ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td>শুরুর তারিখ</td>
                                                        <td>
                                                            <input type="date" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>সমাপ্তির তারিখ</td>
                                                        <td>
                                                            <input type="date" class="form-control" id="">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 04-->

                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">০৪</td>
                                                        <td colspan="3">প্রকল্প এলাকা</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#AreaModal">নতুন এলাকা যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td style="width:60px;">ক্র:নং</td>
                                                                    <td>বিভাগ</td>
                                                                    <td>জেলা/সিটি কর্পোরেশন</td>
                                                                    <td>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        ০১
                                                                    </td>
                                                                    <td>
                                                                        ঢাকা
                                                                    </td>
                                                                    <td>
                                                                        <ul>
                                                                            <li>জেলাঃ</li>
                                                                            <li>সিটি কর্পোরেশনঃ</li>
                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul>
                                                                            <li>উপজেলা:</li>
                                                                            <li>থানা:</li>
                                                                            <li>পৌরসভা:</li>
                                                                            <li>ওয়ার্ড:</li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 05-->

                                                    <tr>
                                                        <td rowspan="9" style="width:40px;">০৫</td>
                                                        <td colspan="3">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td colspan="2">প্রাক্কলিক ব্যয় (টাকায়)</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
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
                                                                    <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
                                                                        তাকে পরিবর্তিত)
                                                                    </td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
                                                                        অনুদান
                                                                    </td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
                                                                        ও প্রমাণকসহ)
                                                                    </td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>মোট</td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                    <td><input type="text" class="form-control"
                                                                               id=""
                                                                               placeholder=""></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="6" style="width:40px;">খ)</td>
                                                        <td>১. দাতা সংস্থার নাম</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার নাম">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>২. দাতা সংস্থার ঠিকানা</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder=" দাতা সংস্থার ঠিকানা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৩. ফোন/মোবাইল/ইমেইল নম্বর</td>
                                                        <td>
                                                            <input type="text" class="form-control mb-3" id=""
                                                                   placeholder="ফোন">
                                                            <input type="nnumber" class="form-control mb-3" id=""
                                                                   placeholder="মোবাইল">
                                                            <input type="email" class="form-control mb-3" id=""
                                                                   placeholder="ইমেইল">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৪. ওয়েবসাইট</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
                                                                   placeholder="ওয়েবসাইট">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> ৫. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
                                                        <td>
                                                            <input type="text" class="form-control" id=""
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
                                                            <select class="form-control" name="" id="">
                                                                <option value="">হ্যা</option>
                                                                <option value="">না</option>
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
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="5"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="4" style="width:40px;">খ)</td>
                                                        <td>(১) প্রকল্পটি যৌক্তিকতা এবং জাতীয় পরিকল্পনার সাথে
                                                            প্রাসঙ্গিকতা:
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="5"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>(২) প্রকল্প এলাকা নির্ধারণের যৌক্তিকতা:</td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="5"></textarea>
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
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#Avistto">নতুন অভীষ্ট যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>অভীষ্ট (Goal)</td>
                                                                    <td>লক্ষ্যমাত্রা (Target)</td>
                                                                    <td>বাজেট বরাদ্দ</td>
                                                                    <td>যৌক্তিকতা</td>
                                                                    <td>মন্তব্য</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td>উদ্দেশ্যসমূহ
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="5"></textarea>
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
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#ProkolppoLokkhoMatra">নতুন
                                                                    লক্ষ্যমাত্রা
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th rowspan="2">ক্রমিক নং</th>
                                                                    <th rowspan="2">কার্যক্রমের নাম</th>
                                                                    <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
                                                                    <th rowspan="2">অর্জনযোগ্য(%)</th>
                                                                    <th rowspan="2">উপকারভোগীর সংখ্যা</th>
                                                                    <th rowspan="2">মন্তব্য (যদি থাকে)</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>বছর</th>
                                                                    <th>বাস্তব</th>
                                                                    <th>আর্থিক</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>01</td>
                                                                    <td>Kalama Projext</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6">মোট উপকারভোগীর সংখ্যা-</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>

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
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#ProttashitoFol">নতুন
                                                                    প্রত্যাশিত ফলাফল
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>গুনবাচক</th>
                                                                    <th>সংখ্যা বাচক</th>
                                                                    <th>সময়কাল</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>
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
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#JelawaisKarjokokrom">নতুন
                                                                    কর্মকান্ড
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th rowspan="2">ত্রু : নং</th>
                                                                    <th rowspan="2">জেলা/সিটি/ পৌর-কর্পোরেশন</th>
                                                                    <th rowspan="2">উপজেলা/ থানা/ ওয়ার্ড</th>
                                                                    <th rowspan="2">কার্যক্রম সমূহ</th>
                                                                    <th rowspan="2">প্রকল্প সময়</th>
                                                                    <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
                                                                    <th rowspan="2">মোট বাজেট</th>
                                                                    <th rowspan="2">মন্তব্য (যেখানে প্রযোজ্য)</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>বছর</th>
                                                                    <th>বাস্তব</th>
                                                                    <th>আর্থিক</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 08-->

                                                    <tr>
                                                        <td rowspan="7" style="width:40px;">০৮</td>
                                                        <td colspan="3">প্রকল্প ব্যবস্থাপনা :</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td style="width:30%"> প্রত্যেক প্রধান কার্যক্রম বাস্তবায়ন পদ্ধতি
                                                            সংক্ষেপে বর্ণনা করতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td style="width:30%">প্রকল্পটি সহযোগী এনজিও বা সংস্থার মাদ্ধমে
                                                            বাস্তবায়িত হবে কিনা, হলে সংলগ্নি - ''ক'' মোতাবেক প্রত্যেক সহযোগী
                                                            এনজিওর তথ্য দিতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">গ)</td>
                                                        <td style="width:30%"> সংলগ্নি ''খ '' -তে প্রকল্পের কর্মকর্তা/
                                                            কর্মচারীদের বিস্তারিত বিবরণ (দেশি ও বিদেশী উভয়ের জন্য প্রযোজ্য )
                                                            দাখিল করতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td style="width:30%"> নির্মাণ সংক্রান্ত বিস্তারিত তথ্য সংলগ্নি ''ঘ
                                                            '' - তে প্রদান করতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td style="width:30%"> আর্থিক খাত/ উপখাত ভিত্তিক বরাদ্দ সংলগ্নি
                                                            ''ঘ''-তে প্রদান করতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;"> চ)</td>
                                                        <td style="width:30%"> প্রকল্পটি সমাপ্তির পর প্রকল্পটি কিভাবে টিকিয়া
                                                            থাকবে ও পরিচালিত হবে তা উল্লেখ করতে হবে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 09-->

                                                    <tr>
                                                        <td rowspan="9" style="width:40px;">০৯</td>
                                                        <td colspan="3"> সুশাসন ও স্বচ্ছতা :</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td style="width:30%"> প্রকল্পটি এলাকার জনগণ এবং সংশ্লিষ্ট সরকারি ও
                                                            বেসরকারি ব্যক্তিবর্গের সাথে পরামর্শক্রমে কিংবা মাঠ জরিপের
                                                            মাধ্যমে প্রণয়ন করা হয়েছে কিনা, হলে সংক্ষিপ্ত বর্ণনা (প্রমাণক)
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td style="width:30%">অন্যান্য এনজিও এবং সরকারি চলমান কর্মকান্ড (যদি
                                                            থাকে) বিবেচনান্তে কাজ ও কর্ম - এলাকার দৈত্বতা এড়ানোর কি কি
                                                            ব্যবস্থা গৃহীত হয়েছে।
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">গ)</td>
                                                        <td style="width:30%"> এ প্রকল্পটি বা একই ধরণের প্রকল্প ইতোপূর্বে
                                                            দাখিল করা হয়েছিল কি না সরকার কর্তৃক তা অনুমোদিত বা পরবর্তীতে
                                                            বাতিল করা হয়েছিল কি না:
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">ঘ)</td>
                                                        <td colspan="2" style="width:30%"> সংস্থা স্বেচ্ছায় বা তথ্য অধিকার
                                                            আইনের কারণে নিম্নবর্তীত তথ্যাবলী জনসম্মুখে প্রকাশ করতে ইচ্ছুক
                                                            কিনা (ডিসক্লোজার পলিসি ):
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ত্রু নং</td>
                                                                    <td>তথ্যাবলী</td>
                                                                    <td>হ্যা</td>
                                                                    <td>না</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০১</td>
                                                                    <td>প্রকল্প ছক ৮ নং ফরমে</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০২</td>
                                                                    <td>নিরীক্ষা প্রতিবেদন</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault3">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault3">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault4" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault4">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০৩</td>
                                                                    <td>বার্ষিক প্রতিবেদন</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০৪</td>
                                                                    <td>প্রত্যেক কর্ম- এলাকার বাজেটসহ কর্মপরিকল্পনা</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০৫</td>
                                                                    <td>উপকারভোগীদের ডাটাবেইজ</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০৬</td>
                                                                    <td>প্রকল্পের বিস্তারিত ফলাফল</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>০৭</td>
                                                                    <td>অভিযোগ বহি ও অভিযোগ নিম্পত্তি</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault1">
                                                                                হ্যা
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="flexRadioDefault"
                                                                                   id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                   for="flexRadioDefault2">
                                                                                না
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="3" style="width:40px;">ঙ)</td>
                                                        <td colspan="2" style="width:30%"> RTI বিষয়ক তথ্যাদি :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:30%">ক. ফোকাল পয়েন্ট এর নাম, মোবাইল, ইমেইল
                                                            নম্বরসহ
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:30%">খ. তথ্য অধিকার বিষয়ক অনলাইন প্রশিক্ষণ রয়েছে
                                                            কিনা? করে থাকলে তার প্রমাণক:
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 10-->

                                                    <tr>
                                                        <td rowspan="4" style="width:40px;">১০</td>
                                                        <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
                                                            সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
                                                            হবে :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
                                                            লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
                                                            নিরীক্ষা প্রতিবেদন দাখিল
                                                            ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">গ)</td>
                                                        <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
                                                            গ্রহণের কারণসমূহ
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="" id="" cols="30"
                                                                      rows="6"></textarea>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 11-->

                                                    <tr>
                                                        <td style="width:40px;">১১</td>
                                                        <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
                                                        <td><input class="form-control" type="file"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;"> ১১.১</td>
                                                        <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">১২</td>
                                                        <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
                                                            ব্যয় বিভাজন (বিস্তারিত)
                                                        </td>
                                                        <td><input class="form-control" type="file"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;"> ১৩</td>
                                                        <td colspan="2">
                                                            প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;"> ১৪</td>
                                                        <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
                                                            প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section Shonglognni-->

                                                    <tr>
                                                        <td colspan="4">
                                                            <h3 class="text-center mt-2">সংলগ্নী ‘’ক’’</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">ক)</td>
                                                        <td colspan="3"> পার্টনার এনজিও/সংস্থার বিস্তারিত তথ্য</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#PartnerNGO">নতুন
                                                                    পার্টনার এনজিও
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>পার্টনার এনজিওর নাম ও ঠিকানা (টেলিফোন, মোবাইল, ইমেইল
                                                                        নম্বরসহ)
                                                                    </th>
                                                                    <th>এনজিও ব্যুরোর নিবন্ধন নং ও মেয়াদ :</th>
                                                                    <th>পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য
                                                                        কার্যক্রমসমূহ (বিস্তারিত)
                                                                    </th>
                                                                    <th>কর্ম এলাকা (সম্ভাব্য ইউনিয়ন/ওয়ার্ড পর্যন্ত)</th>
                                                                    <th>বাজেট</th>
                                                                    <th>সম্পাদনের সময়সীমা</th>
                                                                    <th>উপকারভোগী</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul>
                                                                            <li>পার্টনার এনজিওর নাম:</li>
                                                                            <li>ঠিকানা:</li>
                                                                            <li>টেলিফোন:</li>
                                                                            <li>মোবাইল:</li>
                                                                            <li>ইমেইল</li>
                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul>
                                                                            <li>এনজিও ব্যুরোর নিবন্ধন নং :</li>
                                                                            <li>মেয়াদ:</li>
                                                                        </ul>
                                                                    </td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="8" style="width:40px;">খ)</td>
                                                        <td colspan="3">মোট অনুদানের পরিমান</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০১</td>
                                                        <td>নগদ</td>
                                                        <td>
                                                            <input class="form-control" type="text" placeholder="নগদ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০২</td>
                                                        <td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৩</td>
                                                        <td> পণ্য/দ্রব্য সহযোগিতা</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" পণ্য/দ্রব্য সহযোগিতা ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৪</td>
                                                        <td>অন্যান্য</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="অন্যান্য  ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৫</td>
                                                        <td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্প বাস্তবায়নাধীন এলাকা  ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৬</td>
                                                        <td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" উল্লেখযোগ্য অন্যান্য তথ্য ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৭</td>
                                                        <td>চুক্তিপত্রের কপি</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="চুক্তিপত্রের কপি ">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section Shonglognni kh-->

                                                    <tr>
                                                        <td colspan="4">
                                                            <h3 class="text-center mt-2">সংলগ্নী ‘’খ’’</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">১</td>
                                                        <td colspan="3"> প্রকল্পের কর্মকর্তা-কর্মচারীদের বিস্তারিত বিবরণ
                                                            (দেশি ও বিদেশী উভয়ই)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#ProkolppoKormokorta">নতুন
                                                                    প্রকল্পের কর্মকর্তা-কর্মচারী
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td rowspan="2">নাম ও পদবি</td>
                                                                    <td rowspan="2">জাতীয়তা</td>
                                                                    <td rowspan="2">মেয়াদ (জনমাস)</td>
                                                                    <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                                                                    <td rowspan="2">অভিজ্ঞতা</td>
                                                                    <td rowspan="2">দায়িত্বসমূহ</td>
                                                                    <td colspan="2">বেতন-ভাতাদি</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>এই প্রকল্প হতে</td>
                                                                    <td>অন্যান্য প্রকল্প হতে</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul>
                                                                            <li>নাম:</li>
                                                                            <li>পদবি:</li>
                                                                        </ul>
                                                                    </td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>

                                                            <small>টীকা : বেতন ভাতাদি বলতে বেতন , বাড়ী ভাড়া , চিকিৎসা ও
                                                                বেতনের সাথে সংশ্লিষ্ট অন্যান্য সকল আর্থিক সুবিধা অন্তর্ভুক্ত
                                                                হবে। বেতন-ভাতাদি বাংলাদেশী টাকায় মাসভিত্তিক দেখতে হবে।
                                                                রুকল্প -২০২১ এর আলোকে অধিক কর্মসংস্থানের মাধ্যমে দ্রুত
                                                                দারিদ্র হ্রাসের লক্ষ্যে বিদেশী নাগরিক নিয়োগ নিরুৎসাহিত করা
                                                                হয়েছে। প্রকল্পের চাহিদা মোতাবেক উচ্চতর টেকনিক্যাল/ বেশেষায়িত
                                                                বাংলাদেশি বিশেষজ্ঞ পাওয়া না গেলেই শুধুমাত্র বিদেশী বিশেষজ্ঞ
                                                                বিবেচ্য। </small>

                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section Shonglognni Ga-->

                                                    <tr>
                                                        <td colspan="4">
                                                            <h3 class="text-center mt-2">সংলগ্নী ‘’গ’’</h3>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4"> নির্মাণ কাজের বিস্তারিত বিবরণ (প্রযোজ্যক্ষেত্রে )
                                                            <br>
                                                            (ভৌত নির্মাণের বিস্তারিত বর্ণনা)
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )   ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা) ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">গ)</td>
                                                        <td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
                                                            সাক্ষরসহ)
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও সাক্ষরসহ) ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td colspan="2"> নির্মাণের লে-আউট পান</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" নির্মাণের লে-আউট পান ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td colspan="2"> প্রাক্কলিক ব্যয়</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" প্রাক্কলিক ব্যয় ">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section Shonglognni Gha-->

                                                    <tr>
                                                        <td colspan="4">
                                                            <h3 class="text-center mt-2">সংলগ্নী ‘’ঘ’’</h3>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4"> প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড
                                                            প্রদর্শন বিষয়ক তথ্যাদি :
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td colspan="2"> প্রকল্পের নাম</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের নাম   ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td colspan="2"> প্রকল্পের মেয়াদকাল</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের মেয়াদকাল">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">গ)</td>
                                                        <td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের মোট বরাদ্দ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্প এলাকায় মোট বরাদ্দ ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" মোট উপকারভোগীর সংখ্যা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">চ)</td>
                                                        <td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" প্রকল্প এলাকায় মোট জনসংখ্যা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ছ)</td>
                                                        <td colspan="2">দাতা সংস্থার নাম</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="দাতা সংস্থার নাম ">
                                                        </td>
                                                    </tr>

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
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের নাম   ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০২)</td>
                                                        <td colspan="2"> প্রকল্পের মেয়াদ</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের মেয়াদ   ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৩)</td>
                                                        <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
                                                        <td>
                                                            <input class="form-control" type="date"
                                                                   placeholder="এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ  ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৪)</td>
                                                        <td colspan="2"> প্রকল্প মূল্য</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্প মূল্য ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৫)</td>
                                                        <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
                                                            প্রমাণক
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder="প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৬)</td>
                                                        <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৭)</td>
                                                        <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td rowspan="2">কার্যাবলী (ফরম-৬ অনুযায়ী)</td>
                                                                    <td colspan="2">ভৌত</td>
                                                                    <td colspan="2">আর্থিক</td>
                                                                    <td rowspan="2">মন্তব্য</td>
                                                                    <td rowspan="2">যুক্ত</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>লক্ষমাত্রা</td>
                                                                    <td>অর্জন</td>
                                                                    <td>বরাদ্দ</td>
                                                                    <td>ব্যয়</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="কার্যাবলী">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="লক্ষমাত্রা">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="অর্জন">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="বরাদ্দ">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="ব্যয়">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="মন্তব্য">
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-sm"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section Shonglognni Ca-->

                                                    <tr>
                                                        <td colspan="4">
                                                            <h3 class="text-center mt-2">সংলগ্নী ‘’চ’’</h3>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4">উপকরণের বিস্তারিত বর্ণনা (প্রযোজ্যক্ষেত্রে) <br>
                                                            অফিস যন্ত্রপাতি, মেশিনপত্র ও যানবাহন।
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:40px;">০১)</td>
                                                        <td colspan="3"> আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা :</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ক্রমিক নং</td>
                                                                    <td>আইটেমের নাম</td>
                                                                    <td>পরিমান</td>
                                                                    <td>একক মূল্য</td>
                                                                    <td>মোট ব্যায়</td>
                                                                    <td>সংযুক্ত</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="01">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="আইটেমের নাম">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="পরিমান">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="একক মূল্য">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="মোট ব্যায়">
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-sm"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">সর্বমোট </td>
                                                                    <td colspan="2">X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০২)</td>
                                                        <td colspan="3">  মেশিনপত্রের বর্ণনা </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ক্রমিক নং</td>
                                                                    <td>আইটেমের নাম</td>
                                                                    <td>পরিমান</td>
                                                                    <td>একক মূল্য</td>
                                                                    <td>মোট ব্যায়</td>
                                                                    <td>সংযুক্ত</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="01">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="আইটেমের নাম">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="পরিমান">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="একক মূল্য">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="মোট ব্যায়">
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-sm"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">সর্বমোট </td>
                                                                    <td colspan="2">X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৩)</td>
                                                        <td colspan="3">  যানবাহনের বর্ণনা </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ক্রমিক নং</td>
                                                                    <td>আইটেমের নাম</td>
                                                                    <td>পরিমান</td>
                                                                    <td>একক মূল্য</td>
                                                                    <td>মোট ব্যায়</td>
                                                                    <td>সংযুক্ত</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="01">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="আইটেমের নাম">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="পরিমান">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="একক মূল্য">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="মোট ব্যায়">
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-sm"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">সর্বমোট </td>
                                                                    <td colspan="2">X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">০৪)</td>
                                                        <td colspan="2">প্রকল্প সমাপ্ত হওয়ার পরে এই অফিস যন্ত্রপাতি, মেশিনপত্র এবং যানবাহনগুলো কিভাবে ব্যবহার হবে সেই বিষয়ে বর্ণনা :</td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">
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
                                                                <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#Dinpunjji">নতুন
                                                                    দিনপুঞ্জি
                                                                    যুক্ত করুন
                                                                </button>
                                                            </div>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ত্রু: নং</td>
                                                                    <td>শিরোনাম/বিষয়</td>
                                                                    <td>তারিখ,সময় ও স্থান (সম্ভাব্য)</td>
                                                                    <td>সংখ্যা</td>
                                                                    <td>অংশগ্রহণকারীর সংখ্যা</td>
                                                                    <td>বাজেট</td>
                                                                    <td>মন্তব্য</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                    <td>X</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" disabled class="btn btn-registration"
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
