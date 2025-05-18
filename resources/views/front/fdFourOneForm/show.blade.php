@extends('front.master.master')

@section('title')
সিএ ফার্ম কর্তৃক প্রদেয় প্রতিবেদন | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.show') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.show') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.show') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.show') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.show')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a style="display: none;">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.show')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.show')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.show')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.show')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.show')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
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

                        @include('flash_message')

                          <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd4Onepdfview',base64_encode($fdFourOneFormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>
                        @if($fdFourOneFormList->status == 'Ongoing' || $fdFourOneFormList->status == 'Accepted')

                                        @else

                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdFourOneForm.edit',base64_encode($fdFourOneFormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৪(১)  ফরম </h3>
                            <h4>সিএ ফার্ম কর্তৃক প্রদেয় প্রতিবেদন</h4>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">


                                <table class="table table-borderless" style="width:100%">



                                    <tr>
                                        <th style="text-align: center;" colspan="2">১.</th>
                                        <td style="">প্রকল্পের নাম:</td>
                                        <td style="">{{ $fdFourOneFormList->prokolpo_name }}</td>

                                    </tr>

                                    <tr>
                                        <th style="text-align: center;" colspan="2">২.</th>
                                        <td style="">প্রকল্প অনুমোদনের স্বারক নং ও তারিখ:</td>
                                        <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_no) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_date) }}</td>

                                    </tr>

                                    <tr>
                                        <th style="text-align: center;" colspan="2">৩.</th>
                                        <td style="">প্রকল্প বর্ষ:</td>
                                        <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_year) }}</td>

                                    </tr>
                                  <!-- step one start  -->

                                    <!-- step two strat --->

                                    <tr>
                                        <th style="text-align: center;" colspan="2" rowspan="3">৪.</th>

                                    </tr>

                                    <tr>


                                        <td>ক. ছাড়কৃত অর্থের পরিমাণ ও তারিখ (বাংলাদেশী মুদ্রায় খরচ ):</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_bangla_amount) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_date) }}</td>

                                    </tr>
                                    <tr>


                                        <td>খ. গৃহীত অর্থের পরিমাণ ও তারিখ:</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito_date) }}</td>

                                    </tr>

                                    <!-- step two end --->

                                    <!-- step three start -->

                                    <tr>
                                        <th style="text-align: center;" rowspan="2">৫.</th>
                                        <td style="font-weight:bold;" colspan="3">খরচের খাতসমূহের বিস্তারিত বিবরণ : </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">

                                                    <div class="table-responsive">


                                                        <table class="table table-bordered text-center" id="">
                                                            <tr>

                                                                <th >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</th>
                                                                <th >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</th>
                                                                <th >প্রকৃত ব্যয়</th>
                                                                <th >পার্থক্য </th>
                                                                <th >শতকরা হার (%)</th>
                                                                <th >পার্থক্য এর  কারণ</th>

                                                            </tr>

                                                            @foreach($expenditureDetails as $expenditureDetail)
                                                            <tr>

                                                                <td>{!! $expenditureDetail->expenditure_sectors !!}</td>
                                                                <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->approved_budget_money) }}</td>
                                                                <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->actual_cost) }}</td>
                                                                <td>{!! $expenditureDetail->difference !!}</td>
                                                                <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->percentage) }}</td>
                                                                <td>{!! $expenditureDetail->reason_for_the_difference !!}</td>

                                                            </tr>
                                                            @endforeach

                                                        </table>


                                                    </div>

                                        </td>
                                    </tr>
                                  <!-- step one start  -->
                                </table>
                            </div>
                        </div>
                        <!-- step one end --->


                    </div>
                </div>


                    <!-- new code start --->

                    <div class="d-flex justify-content-between mt-3">
                        <div class="">


                        </div>
                        <div class="">



                            @if($fdFourOneFormList->status == 'Ongoing' || $fdFourOneFormList->status == 'Accepted')

                                            @else

                                            <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fdFourOneFormList->id}})" class="btn btn-info">
                                                দাখিল করুন  <i class="fa fa-send-o"></i>
                                            </button>

                                                <form id="delete-form-{{ $fdFourOneFormList->id }}" action="{{ route('fdFourOneSend',base64_encode($fdFourOneFormList->id)) }}" method="get" style="display: none;">

                                                    @csrf


                                                </form>


                            @endif


                        </div>
                    </div>

                    <!-- new code end -->

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
