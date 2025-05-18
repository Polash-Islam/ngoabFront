@extends('front.master.master')

@section('title')
আবেদন পুনর্নবীকরণ | {{ trans('header.ngo_ab')}}
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
                            <a href="{{ route('fdFourOneForm.index') }}">
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

            <?php
$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
 $name_change_list = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneFormId )->latest()->value('status');




            ?>


            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>{{ trans('fd9.m3')}}</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    @if($name_change_list == 'Ongoing' || $name_change_list == 'Review')
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button" disabled  class="btn btn-registration"
                                                onclick="location.href = '{{ route('ngoRenewStepAdd') }}';">{{ trans('fd9.ar')}}
                                        </button>
                                    </div>
                                    @else
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button"  class="btn btn-registration"
                                                onclick="location.href = '{{ route('renewPaymentInfo') }}';">{{ trans('fd9.ar')}}
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if(empty($name_change_list) || $name_change_list == 'Rejected')
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>কোন এনজিও রিনিউ অনুরোধ নেই</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">নবায়ন আবেদনের তালিকা</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্র : নং :</th>
                                        <th>তারিখ</th>

                                        <th>স্ট্যাটাস</th>
                                        <th>কার্যকলাপ </th>
                                    </tr>
                                    @foreach($name_change_list_all as $key=>$all_name_change_list_all)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $all_name_change_list_all->created_at->format('d-m-Y')}}</td>

                                        <td><span class="text-success">{{ $all_name_change_list_all->status }}</span></td>
                                        <td>

                                            @if($all_name_change_list_all->status == 'Ongoing' || $all_name_change_list_all->status == 'Accepted')

                                            @else

                                            <button class="btn btn-sm btn-primary" onclick="location.href = '{{ route('ngoRenewStepOne') }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                            @endif

                                            <a  href="{{ route('renewInfo',base64_encode($all_name_change_list_all->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                            <div class="name_change_instruction mt-5">
                                <div class="others_inner_section mb-3">
                                    <h1>এনজিও'র নিবন্ধন সনদ নবায়নের নির্দেশনা</h1>
                                    <div class="notice_underline"></div>
                                </div>
                                <ul class="nav nav-tabs custom_tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tofban">দেশী এনজিও'র জন্য</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tofen">বিদেশি এনজিও'র জন্য</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content custom_tab_content">
                                    <div class="tab-pane container active" id="tofban">
                                        <h5>৩.১ নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযোজিতব্য কাগজপত্র এবং তথ্যাদি (দেশী এনজিও'র নিবন্ধন
                                            নবায়নের জন্য)</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>পূরণকৃত এফডি-৮ ফরম</td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা</td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রের সত্যায়িত অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন
                                                    সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে
                                                    প্রত্যয়নপত্র
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের
                                                    মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                                    পরিবর্তন না হয়ে থাকলে 'পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের
                                                    সত্যায়িত অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>অন্য কোন আইনে নিবন্ধিত হলে সংশ্লিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী
                                                    কমিটির তালিকার সত্যায়িত অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ট)</td>
                                                <td>সর্বশেষ নিবন্ধন/নবায়ন সনদের সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঠ)</td>
                                                <td>Right to Information Act-2009-এর আওতায় Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ
                                                    পত্রের অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ড)</td>
                                                <td>সংস্থার নিকট তফফিল-১ এ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                                    ভ্যাট থাকলে চালানমূলে জমা প্রদানের প্রমাণক
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঢ)</td>
                                                <td>নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান
                                                    সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ণ)</td>
                                                <td>বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের সংক্ষিপ্ত বিবরণ
                                                    (সংযুক্ত ছক অনুযায়ী):
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ক্রঃ নং</th>
                                                <th>সন [বিগত ০৫ (পাঁচ) বছর]</th>
                                                <th>প্রকল্পের নাম</th>
                                                <th>মেয়াদ</th>
                                                <th>কাজের প্রকৃতি</th>
                                                <th>অর্থের পরিমাণ</th>
                                                <th>ছাড়কৃত অর্থ</th>
                                                <th>গৃহীত বৈদেশিক অনুদান</th>
                                                <th>ব্যয়</th>
                                                <th>অবশিষ্ট</th>
                                                <th>মন্তব্য</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>০১</td>
                                                <td>০২</td>
                                                <td>০৩</td>
                                                <td>০৪</td>
                                                <td>০৫</td>
                                                <td>০৬</td>
                                                <td>০৭</td>
                                                <td>০৮</td>
                                                <td>০৯</td>
                                                <td>১০</td>
                                                <td>১১</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane container" id="tofen">
                                        <h5>৩.২ নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযুক্ত প্রযোজ্য কাগজপত্র এবং তথ্যাদি (বিদেশি
                                            এনজিও'র নিবন্ধন নবায়নের জন্য)</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>পূরণকৃত এফডি-৮ ফরম</td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাষ্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস
                                                    অব জাস্টিস কর্তৃক নোটারীকৃত/ সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>সংস্থার বাই লজ (By laws)/ গঠনতন্ত্র (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক
                                                    নোটারীকৃত/ সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত
                                                    অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>সংস্থার বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাষ্টিজ সভার কার্যবিবরণীর
                                                    (কার্যবিবরণীতে বোর্ড গঠন সংক্রান্ত, নিবন্ধন নবায়ন করার প্রস্তাব, গঠনতন্ত্র পরিবর্তন
                                                    সংক্রান্ত বিষয়াদি উল্লেখপূর্বক) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক
                                                    নোটারীকৃত/ সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ
                                                    জমাদানের মূলকপি সহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                                    পরিবর্তন না হয়ে থাকলে 'পরিবর্তন হয়নি' মর্মে প্রত্যয়ন পত্রের কপি (সংশ্লিষ্ট দেশের
                                                    পিস অব জাস্টিস কর্তৃক নোটারীকৃত/ সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক
                                                    নোটারীকৃত/ সত্যায়িত) অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>সর্বশেষ নিবন্ধন/ নবায়ন সনদপত্রের ২টি সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>Right to Information Act-২০০৯ এর আওতায়
                                                    Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ট)</td>
                                                <td>সংস্থার নিকট তফফিল-১ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                                    ভ্যাট থাকলে তাহা চালানমূলে জমা প্রদানের প্রমাণক
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঠ)</td>
                                                <td>সংস্থার বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের
                                                    সংক্ষিপ্ত বিবরণ
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ক্রঃ নং</th>
                                                <th>সন [বিগত ০৫ (পাঁচ) বছরের]</th>
                                                <th>প্রকল্পের নাম</th>
                                                <th>মেয়াদ</th>
                                                <th>কাজের প্রকৃতি</th>
                                                <th>অর্থের পরিমাণ</th>
                                                <th>ছাড়কৃত অর্থ</th>
                                                <th>গৃহীত বৈদেশিক অনুদান</th>
                                                <th>ব্যয়</th>
                                                <th>অবশিষ্ট</th>
                                                <th>মন্তব্য</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>০১</td>
                                                <td>০২</td>
                                                <td>০৩</td>
                                                <td>০৪</td>
                                                <td>০৫</td>
                                                <td>০৬</td>
                                                <td>০৭</td>
                                                <td>০৮</td>
                                                <td>০৯</td>
                                                <td>১০</td>
                                                <td>১১</td>
                                            </tr>
                                        </table>
                                    </div>
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

@endsection
