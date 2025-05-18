@extends('front.master.master')

@section('title')
এফডি - ৪ ফরম | {{ trans('header.ngo_ab')}}
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

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>সিএ ফার্ম কর্তৃক প্রদেয় প্রত্যয়নপত্র </h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                            @if(!$fdFourFormList)


                                    <form action="{{ route('fdFourForm.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf

                                        <input type="hidden" required name="decodeId" value="{{ $decodeId }}" class="form-control" id=""
                                    placeholder="">

                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৪ ফরম</h3>
                                        <h4>সিএ ফার্ম কর্তৃক প্রদেয় প্রত্যয়নপত্র </h4>
                                    </div>

                                    <div class="row">



                                        <div class="mb-3 col-lg-6">
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
                                            <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                            <input type="text" required name="registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control " id=""
                                                   placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_telephone" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_email" class="form-control" id=""
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

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_name" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মেয়াদকাল<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_duration_one" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষায় বিবেচ্য সময়কাল <span class="text-danger">*</span></label>
                                            <input type="text" required name="exam_time" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">বর্ষের প্রারম্ভিক জের <span class="text-danger">*</span></label>
                                            <input type="text" required name="start_balance" class="form-control " value="" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                            <input type="text" required name="foreign_grant_taken_exam_year" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান <span class="text-danger">*</span></label>
                                            <input type ="number" required name="foreign_grant_cost_exam_year" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                            <input type="text" required name="foreign_grant_remaining_exam_year" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>
                                    </div>







                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-registration"
                                                >দাখিল করুন
                                        </button>
                                    </div>
                                </form>

                                @else


                                <form action="{{ route('fdFourForm.update',$fdFourFormList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" required name="decodeId" value="{{ $decodeId }}" class="form-control" id=""
                                placeholder="">

                                <div class="form9_upper_box">
                                    <h3>এফডি - ৪ ফরম</h3>
                                    <h4>সিএ ফার্ম কর্তৃক প্রদেয় প্রত্যয়নপত্র </h4>
                                </div>

                                <div class="row">



                                    <div class="mb-3 col-lg-6">
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
                                        <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                        <input type="text" required name="registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control " id=""
                                               placeholder="">
                                    </div>


                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                        <input type="text" required name="ngo_telephone" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                        <input type="text" required name="ngo_email" class="form-control" id=""
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

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                        <input type="text" required name="prokolpo_name" value="{{ $fdFourFormList->prokolpo_name }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">প্রকল্পের মেয়াদকাল<span class="text-danger">*</span></label>
                                        <input type="text" required name="prokolpo_duration_one" value="{{ $fdFourFormList->prokolpo_duration_one }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষায় বিবেচ্য সময়কাল <span class="text-danger">*</span></label>
                                        <input type="text" required name="exam_time" value="{{ $fdFourFormList->exam_time }}" class="form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">বর্ষের প্রারম্ভিক জের <span class="text-danger">*</span></label>
                                        <input type="text" required name="start_balance" value="{{ $fdFourFormList->start_balance }}" class="form-control " value="" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                        <input type="text" required name="foreign_grant_taken_exam_year"  value="{{ $fdFourFormList->foreign_grant_taken_exam_year }}" class="form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান <span class="text-danger">*</span></label>
                                        <input type ="number" required required name="foreign_grant_cost_exam_year" value="{{ $fdFourFormList->foreign_grant_cost_exam_year }}" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                        <input type="text" required name="foreign_grant_remaining_exam_year" value="{{ $fdFourFormList->foreign_grant_remaining_exam_year }}" class="form-control" id=""
                                               placeholder="" value="">
                                    </div>
                                </div>







                                <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                    <button type="submit" class="btn btn-registration"
                                            >দাখিল করুন
                                    </button>
                                </div>
                            </form>

                                @endif

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>


@endsection

@section('script')

@include('front.zoomButtonImage')
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<textarea required placeholder="খরচের খাতসমূহের বিস্তারিত" name="expenditure_sectors[]" class="form-control"></textarea>' +
            '</td>' +
            '<td style="width:5%">' +
            '<input required type="text" name="approved_budget_money[]" class="form-control" placeholder="অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ" />' +
            '</td>' +

            '<td style="width:5%">' +
            '<input required type="text" name="actual_cost[]" class="form-control" placeholder="প্রকৃত ব্যয়" />' +
            '</td>' +

            '<td>' +
            '<textarea required placeholder="পার্থক্য" name="difference[]" class="form-control"></textarea>' +
            '</td>' +

            '<td style="width:5%">' +
            '<input required type="text" name="percentage[]"class="form-control" placeholder="শতকরা হার (%)" />' +
            '</td>' +

            '<td>' +
            '<textarea required placeholder="পার্থক্য এর  কারণ" name="reason_for_the_difference[]" class="form-control"></textarea>' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>

$(document).on('change', 'select.district_name', function () {

var districtName = $(this).val();


  $.ajax({
    url: "{{ route('getDistrictListForFormSeven') }}",
    method: 'GET',
    data: {districtName:districtName},
    success: function(data) {
      $("#upazila_id").html('');
      $("#upazila_id").html(data);
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
