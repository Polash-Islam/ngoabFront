@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
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
                                    <h4>{{ $fdOneFormInfo->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $fdOneFormInfo->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $fdOneFormInfo->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $fdOneFormInfo->organization_address }}</p> --}}

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
                                <p class="{{ Route::is('nameChange.view') || Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
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

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
            $name_change_list = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="name_change_box">

                                     <!-- new code start --->

                            <div class="d-flex justify-content-between mt-3">
                                <div class="">


                                </div>
                                <div class="">

                                    @if($nameChangeInfo->status == 'Ongoing' || $nameChangeInfo->status == 'Accepted')


                                    @else



                                    <button class="btn btn-sm btn-primary" onclick="location.href = '{{ route('namechangeApplicationEdit',base64_encode($nameChangeInfo->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>


                                    @endif


                                </div>
                            </div>

                            <!-- new code end -->


                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h1>এনজিও নাম পরিবর্তন তথ্য</h1>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no_name_change pt-4">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>পূর্ববর্তী বাংলা নাম </td>
                                                <td>{{ $nameChangeInfo->previous_name_ban }}</td>
                                            </tr>
                                            <tr>
                                                <td>পূর্ববর্তী ইংরেজি নাম</td>
                                                <td>{{ $nameChangeInfo->previous_name_eng }}</td>
                                            </tr>
                                            <tr>
                                                <td>নতুন বাংলা নাম</td>
                                                <td>{{ $nameChangeInfo->present_name_ban }}</td>
                                            </tr>
                                            <tr>
                                                <td>নতুন ইংরেজি নাম</td>
                                                <td>{{ $nameChangeInfo->present_name_eng }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="no_name_change pt-4">
                                        <div class="others_inner_section mb-4">
                                            <h1>নাম পরিবর্তন সংক্রান্ত  সব নথি</h1>
                                            <div class="notice_underline"></div>
                                        </div>
                                        <div class="row">


                                            <!-- new code in table formate start --->

                                            <table class="table table-bordered">
                                                @foreach($nameChangeInfoDoc as $key=>$AllNameChangeInfoDoc)
                                                <tr>
                                                    <td>
                                                        @if(($key+1) ==1)



                                                            ০২টি জাতীয় পত্রিকায় (বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি



                                                        @elseif(($key+1) ==2)

                                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি


                                                       @elseif(($key+1) ==3)

                                                            গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ


                                                       @elseif(($key+1) ==4)




                                                        ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা



                                                       @elseif(($key+1) ==5)


                                                        নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি



                                                       @elseif(($key+1) ==6)



                                                        ৩০০/-(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি





                                                       @elseif(($key+1) ==7)


                                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র


                                                       @elseif(($key+1) ==8)


                                                        পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি


                                                       @elseif(($key+1) ==9)


                                                        প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি




                                                       @elseif(($key+1) ==10)


                                                        সর্বশেষ সাধারণ সদস্যদের তালিকা


                                                        @elseif(($key+1) == 11)


                                                            নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কার্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি



                                                            @elseif(($key+1) == 12)


                                                                পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।


                                                                @elseif(($key+1) == 13)


                                                                    দাখিলকৃত চালানের উপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকপিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১)




                                                       @elseif(($key+1) ==14)


                                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                        জমাপূর্বক চালানের মুলকপিসহ





                                                       @elseif(($key+1) ==15)


                                                        প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি



                                                       @elseif(($key+1) ==16)



                                                        সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি



                                                       @elseif(($key+1) ==17)


                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি


                                                       @elseif(($key+1) ==18)


                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি

                                                       @elseif(($key+1) ==19)


                                                        পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)

                                                       @endif
                                                    </td>
                                                    <td>
                                                        <a target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  class="btn btn-registration"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            <i class="fa fa-print"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                @endforeach

                                            </table>


                                            <!-- new code in table formate end -->


                                        </div>
                                    </div>
                                </div>
                            </div>

                               <!-- new code start --->

                               <div class="d-flex justify-content-between mt-3">
                                <div class="">


                                </div>
                                <div class="">

                                    @if($nameChangeInfo->status == 'Ongoing' || $nameChangeInfo->status == 'Accepted')


                                    @else





                                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $nameChangeInfo->id}})" class="btn btn-lg btn-success">
                                        এনজিওতে পাঠান <i class="fa fa-send-o"></i>
                                    </button>

                                        <form id="delete-form-{{ $nameChangeInfo->id }}" action="{{ route('finalNamechangeSubmit',base64_encode($nameChangeInfo->id)) }}" method="get" style="display: none;">

                                            @csrf


                                        </form>




                                    @endif


                                </div>
                            </div>

                            <!-- new code end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: 'আপনি কি ফর্ম সাবমিট করতে চাচ্ছেন?',
            text: "সাবমিট বাটনে ক্লিক করলে, আর তথ্য সংশোধন করবেন না। আপনি কি রাজি?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন পাঠানো হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>
@endsection
