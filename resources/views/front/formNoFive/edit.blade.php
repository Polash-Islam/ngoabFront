@extends('front.master.master')

@section('title')
{{ trans('formNoFive.formNoFive')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{Route::is('formNoFiveStepFive') || Route::is('formNoFiveStepFour') || Route::is('formNoFiveStepThree') || Route::is('formNoFiveStepTwo') || Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
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
                                        <h1>বার্ষিক প্রতিবেদন</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <form action="{{ route('formNoFive.update',$formFiveData->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    <div class="fd01_tablist mt-3">
                                        <div class="fd01_tab fd01_checked"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_name }}" name="prokolpo_name"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মোট মেয়াদকাল<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_duration }}" name="prokolpo_duration"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর অনুমোদনের নম্বর<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->ngo_registration_number }}" name="ngo_registration_number"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর অনুমোদনের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text"  required value="{{ $formFiveData->ngo_registration_date }}" name="ngo_registration_date" class="form-control datepickerOne" id="" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">অনুমোদিত প্রাক্কলিত ব্যয় (বছর ভিত্তিক)<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->approved_estimated_expenditure_year_wise }}" name="approved_estimated_expenditure_year_wise"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকালে ছাড়কৃত অর্থের পরিমাণ<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->received_money_during_report }}" name="received_money_during_report"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকাল (প্রকল্প বর্ষ)<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->report_year }}" name="report_year"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের বিবেচ্য সময়ে অর্জনের শতকরা হার<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->percentage_of_achievement_during_project }}" name="percentage_of_achievement_during_project"  class="form-control" id=""placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকালে বাস্তবায়িত এলাকা<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_araea }}" name="prokolpo_araea"  class="form-control" id=""placeholder="">
                                        </div>

                                    </div>

                                    <div class="row mt-5">
                                        {{-- <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকা</label>
                                        </div> --}}
                                        <div class="mb-3 col-lg-12">
                                            <table class="table table-bordered" id="dynamicAddRemove">
                                                <tr>
                                                    <th>বিভাগ</th>
                                                    <th>জেলা/সিটি কর্পোরেশন</th>
                                                    <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                                    <th></th>
                                                </tr>
                                                @foreach($formNoFiveStepFiveArea as $key=>$prokolpoAreaListAll)
                                                <tr>
                                                    <td style="width: 20%">
                                                        <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                                                        {{-- <input type="text" required name="division_name[]" class="form-control" id=""
                                                        placeholder=""> --}}



                                                        <select required name="division_name[]" class="form-control division_name" id="division_name{{ $key+60000 }}">
                                                            <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                                            <option value="{{ $prokolpoAreaListAll->division_name}}" selected>{{ $prokolpoAreaListAll->division_name}}</option>
                                                            @foreach($divisionList as $districtListAll)

                                                            <option value="{{ $districtListAll->division_bn }}" {{ $districtListAll->division_bn == $prokolpoAreaListAll->division_name ? 'selected':'' }}>{{ $districtListAll->division_bn }}</option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                    <td style="width: 35%">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                                                {{-- <input type="text" required name="district_name[]" class="form-control" id=""
                                                                placeholder=""> --}}

                                                                <select required name="district_name[]" class="form-control district_name" id="district_name{{ $key+60000 }}">
                                                                    <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>

                                                                    @foreach($districtList as $districtListAll)
                                                                    <option value="{{ $districtListAll->district_bn }}" {{ $districtListAll->district_bn == $prokolpoAreaListAll->district_name ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                                                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                                                placeholder=""> --}}


                                                                <select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name0">
                                                                    <option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                                                    @foreach($cityCorporationList as $districtListAll)
                                                                    <option value="{{ $districtListAll->city_orporation }}" {{ $districtListAll->city_orporation == $prokolpoAreaListAll->city_corparation_name ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">উপজেলা</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->upozila_name }}" name="upozila_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->thana_name }}" name="thana_name[]" class="form-control" id=""
                                                                placeholder="" required>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">পৌরসভা</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->municipality_name }}" name="municipality_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">ওয়ার্ড</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->ward_name }}" name="ward_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @if($key == 0)
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" id="dynamic-ar"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                    @else

<td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>



                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        {{-- <a target="_blank" href="{{ route('formNoFiveStepTwo',base64_encode(1)) }}">next</a> --}}
                                        <button type="submit" class="btn btn-registration"
                                                >আপডেট করুন
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




<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
