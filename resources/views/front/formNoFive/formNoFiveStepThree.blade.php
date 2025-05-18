@extends('front.master.master')

@section('title')
উপজেলা ওয়ারী প্রকল্পের আর্থিক বিবরণী (ছক-২) | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

<style>

.alertify .ajs-body .ajs-content {
    font-weight: bolder;
    color:red;
    font-size: 20px;
}

.alertify .ajs-header{

    color:red;
    font-size: 20px;

}

.alertify .ajs-footer .ajs-buttons .ajs-button{

    background-color: #006A4E;
    color: #fff;

}

</style>

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


                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    <div class="fd01_tablist mt-3">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                    </div>

                                     <div class="card">
                                        <div class="card-header text-center">উপজেলা ওয়ারী প্রকল্পের আর্থিক বিবরণী (ছক-২)</div>
                                     </div>
                                     @include('flash_message')
                                     <div class="row mt-4">
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_name_one" value="{{ $formFiveData->prokolpo_name_one }}"  class="form-control" id="prokolpo_name_one" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনাধীন সময়<span class="text-danger">*</span></label>
                                            <input type="text" required name="reporting_period" value="{{ $formFiveData->reporting_period }}"  class="form-control" id="reporting_period" placeholder="">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <!-- add modal button start -->

                                            <div class="d-flex justify-content-between ">
                                                <div class="p-2">


                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                        উপজেলা ওয়ারী প্রকল্পের আর্থিক বিবরণী যুক্ত করুন
                                                    </button>
                                                </div>
                                            </div>

                                            <!--- modal start--->

                                            @include('front.formNoFive._partila.stepThreeModal')

                                            <!--- modal end --->

                                            <!-- add modal button end -->

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(count($formNoFiveStepThreeData) == 0 )

                                            <div class="no_name_change">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                                </div>
                                                <div class="text-center">
                                                    <h5>কোন তালিকা নেই</h5>
                                                </div>
                                            </div>

                                            @else

                                            <div class="table-responsive">


                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th >ক্র : নং :</th>
                                                        <th >জেলার নাম</th>
                                                        <th >উপজেলার নাম</th>
                                                        <th >উপজেলার জন্য মোট বরাদ্দ</th>
                                                        <th >মোট প্রকৃত ব্যয়</th>
                                                        <th >মন্তব্য</th>
                                                        <th >কর্ম পরিকল্পনা</th>
                                                    </tr>

                                                    @foreach($formNoFiveStepThreeData as $key=>$formNoFiveStepThreeDatass)
                                                    <tr>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                        <td>{{ $formNoFiveStepThreeDatass->district_name }}</td>
                                                        <td>{{ $formNoFiveStepThreeDatass->upazila_name}}</td>
                                                        <td>{{ $formNoFiveStepThreeDatass->total_allocation_for_upazila}}</td>
                                                        <td>{{ $formNoFiveStepThreeDatass->total_actual_cost }}</td>
                                                        <td>{{ $formNoFiveStepThreeDatass->comment }}</td>
                                                        <td>


                                                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepThreeDatass->id }}" >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                                                  <!-- edit modal start -->

                                                                                  @include('front.formNoFive._partila.stepThreeModalEdit')

                                                                                  <!-- edit  modal end -->

                                                            <button type="button" onclick="deleteTag({{ $formNoFiveStepThreeDatass->id}})" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $formNoFiveStepThreeDatass->id }}" action="{{ route('formNoFiveStepThreeDelete',$formNoFiveStepThreeDatass->id) }}" method="POST" style="display: none;">

                                                                    @csrf
                                                                    @method('DELETE')

                                                                </form>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>

                                            </div>

                                            @endif
                                        </div>
                                    </div>




                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <a href="{{ route('formNoFiveStepTwo',base64_encode($decode_id)) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                        @if(count($formNoFiveStepThreeData) == 0 )

                                        @else
                                        <a id="final_button" class="btn btn-registration"
                                                >{{ trans('fd_one_step_one.Next_Step')}}
                                    </a>
                                    @endif
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

<script>

var name = sessionStorage.getItem("prokolpo_name_one");
    var period = sessionStorage.getItem("reporting_period");


    // $('#prokolpo_name_one').val(name);
    // $('#reporting_period').val(period);

    </script>

<script>


//////

$(document).on('click', '#sessionDataStore', function () {

    var prokolpo_name_one = $('#prokolpo_name_one').val();
    var reporting_period = $('#reporting_period').val();

    sessionStorage.clear()

    //alert(prokolpo_name_one);

    // sessionStorage.setItem("prokolpo_name_one", prokolpo_name_one);
    // sessionStorage.setItem("reporting_period", reporting_period);




});
 ///   /////


    $(document).on('click', '#final_button', function () {

        if(!$('#prokolpo_name_one').val() && !$('#reporting_period').val() ){

            alertify.alert('Error', 'প্রকল্পের নাম এবং প্রতিবেদনাধীন সময় সম্পর্কিত তথ্য দিন');

        } else if(!$('#prokolpo_name_one').val()){

            alertify.alert('Error', 'প্রকল্পের নাম সম্পর্কিত তথ্য দিন');

        }else if(!$('#reporting_period').val()){

            alertify.alert('Error', 'প্রতিবেদনাধীন সময় সম্পর্কিত তথ্য দিন');

        }else{


            var prokolpo_name_one = $('#prokolpo_name_one').val();
            var reporting_period = $('#reporting_period').val();
            var decode_id = $('#decode_id').val();


            $.ajax({
    url: "{{ route('formNoFiveStepThreeExtra') }}",
    method: 'GET',
    data: {prokolpo_name_one:prokolpo_name_one,reporting_period:reporting_period,decode_id:decode_id},
    success: function(data) {


        location.href = data;


    //   $("#upozila_name").html('');
    //   $("#upozila_name").html(data);


    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });



        }


    });
    ///////

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

$(document).on('change', 'select.district_name', function () {

    var getMainValue = $(this).val();

    $.ajax({
    url: "{{ route('getUpozilaList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name").html('');
      $("#upozila_name").html(data);
    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
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
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->district_bn }}">{{ $districtListAll->district_bn }}</option>@endforeach</select></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
