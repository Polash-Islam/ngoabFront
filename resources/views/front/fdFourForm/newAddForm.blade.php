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
                            <a href="{{ route('fdFourOneForm.index') }}" style="display: none;">
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






                            <form action="{{ route('fdFourForm.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf


                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৪ ফরম</h3>
                                        <h4>সিএ ফার্ম কর্তৃক প্রদেয় প্রত্যয়নপত্র </h4>
                                    </div>
<span style="text-align: justify">আমি নিম্নস্বাক্ষরকারী এই মর্মে প্রত্যয়ন করছি যে, আমার  <span data-editable>.................</span> সিএফার্ম কর্তৃক <span data-editableOne>................</span> নিম্নবর্ণিত সংস্থার বর্ণিত প্রকল্পের <span data-editableTwo>..............</span> মেয়াদের হিসাব নিরীক্ষা করা হয়েছে। নিরীক্ষাকালে যাবতীয় বহি, বিল-ভাউচার ও প্রয়োজনীয় প্রমাণক যাচাই করা হয়েছে। নিরীক্ষাকৃত হিসাব অনুসারে প্রাপ্ত তথ্যাদি নিম্নরূপ : </span>

<div class="row mt-3">

                                    <div class="col-md-12">
                                        <table class="table table-bordered" style="width:100%">

                                            <tr>
                                                <th style="text-align: center;">ক্র: নং:</th>
                                                <th style="text-align: center; width: 25%">বিবরণ</th>
                                                <th style="text-align: center;">তথ্যাদি</th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;" >(০১)</th>
                                                <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                <th style="text-align: center;">(০৩)</th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">১.</th>
                                                <td style="text-align: center;">এনজিও'র নাম<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">
                                                    <div class="row">



                                                        <div class="mb-3 col-lg-12">



                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                    <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                                    placeholder="">

                                                    @else


                                                    <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                                    placeholder="">


                                                    @endif



                                                        </div>

                                                    </div>
                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">২.</th>
                                                <td style="text-align: center;">নিবন্ধন নম্বর<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">
                                                    <input type="text" required name="registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control " id=""
                                                   placeholder="নিবন্ধন নম্বর">
                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৩.</th>
                                                <td style="text-align: center;"> ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ) <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" placeholder="সংস্থার ঠিকানা" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                                   >
                                                        </div>

                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" placeholder="টেলিফোন" required name="ngo_telephone" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                                                   >
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="মোবাইল নম্বর" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            type = "number" required
                                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngo_list_all->phone }}" class="form-control" id=""
                                                                  >
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="ইমেইল ঠিকানা" type="text" required name="ngo_email" class="form-control" id=""
                                                                   value="{{ $ngo_list_all->email }}">
                                                        </div>

                                                        @if(empty($ngo_list_all->web_site_name))
                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="ওয়েবসাইট" type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                                  >
                                                        </div>
                                                        @else
                                                        <div class="mb-3 col-lg-12">

                                                            <input placeholder="ওয়েবসাইট" type="text" required value="{{ $ngo_list_all->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                                   >
                                                        </div>

                                                        @endif
                                                    </div>
                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৪.</th>
                                                <td style="text-align: center;">প্রকল্পের নাম ও মেয়াদকাল <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">


                                                        <input type="text" required name="prokolpo_name" value="" class="form-control" id=""
                                                               placeholder="প্রকল্পের নাম">


                                                        <input type="text" required name="prokolpo_duration_one" value="" class="form-control mt-2" id=""
                                                               placeholder="প্রকল্পের মেয়াদকাল">

                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৫.</th>
                                                <td style="text-align: center;">নিরীক্ষায় বিবেচ্য সময়কাল<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">


                                                    <input type="text" required name="exam_time" value="" class="form-control" id=""
                                                    placeholder="নিরীক্ষায় বিবেচ্য সময়কাল">

                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৬.</th>
                                                <td style="text-align: center;">বর্ষের প্রারম্ভিক জের <span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">


                                                    <input type="text" required name="start_balance" class="form-control " value="" id=""
                                                    placeholder="বর্ষের প্রারম্ভিক জের">

                                                </th>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৭.</th>
                                                <td style="text-align: center;">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">

                                                    <input type="text" required name="foreign_grant_taken_exam_year" value="" class="form-control" id=""
                                                    placeholder="নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান">

                                                </th>

                                            </tr>


                                            <tr>
                                                <th style="text-align: center;">৮.</th>
                                                <td style="text-align: center;">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">


                                                    <input type="text" required name="foreign_grant_cost_exam_year" class="form-control " value="" id=""
                                                    placeholder="নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান">

                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;">৯.</th>
                                                <td style="text-align: center;">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান<span style="color:red;">*</span>:</td>
                                                <th style="text-align: center;">


                                                    <input type="text" required name="foreign_grant_remaining_exam_year" class="form-control" id=""
                                                           placeholder="নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান" value="">


                                                </th>

                                            </tr>

                                        </table>
                                    </div>

                                    </div>

                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        {{-- <a href="{{ route('fdFourOneForm.create') }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                            </a> --}}
                                        <button type="submit"  style="margin-left: 12px;" class="btn btn-registration"
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

</section>


@endsection

@section('script')

<script>
    $('body').on('click', '[data-editable]', function(){

  var $el = $(this);

  var $input = $('<input name="farm_name" class=""/>').val( $el.text() );
  $el.replaceWith( $input );

//   var save = function(){
//     var $p = $('<span data-editable />').text( $input.val() );
//     $input.replaceWith( $p );
//   };


  $input.one('blur', save).focus();

});


$('body').on('click', '[data-editableOne]', function(){

var $el = $(this);

var $input = $('<input name="farm_detail" class=""/>').val( $el.text() );
$el.replaceWith( $input );

// var save = function(){
//   var $p = $('<span data-editableOne />').text( $input.val() );
//   $input.replaceWith( $p );
// };


$input.one('blur', save).focus();

});

$('body').on('click', '[data-editableTwo]', function(){

var $el = $(this);

var $input = $('<input name="prokolpo_duration" class=""/>').val( $el.text() );
$el.replaceWith( $input );

// var save = function(){
//   var $p = $('<span data-editableTwo />').text( $input.val() );
//   $input.replaceWith( $p );
// };


$input.one('blur', save).focus();

});
</script>

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
