@extends('front.master.master')

@section('title')
{{ trans('formNoFour.formNoFour')}} | {{ trans('header.ngo_ab')}}
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
                                        <h1>মাসিক অগ্রগতি প্রতিবেদন</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                                    <form action="{{ route('formNoFour.update',$formFourData->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৪</h3>
                                        <h4>মাসিক অগ্রগতি প্রতিবেদন</h4>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">সংস্থার নাম<span class="text-danger">*</span></label>


                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                    placeholder="">

                                    @else


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                    placeholder="">


                                    @endif



                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_name"  value="{{ $formFourData->prokolpo_name }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মেয়াদকাল<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_duration" value="{{ $formFourData->prokolpo_duration }}"  class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদন পত্র নং <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_permission_no" value="{{ $formFourData->prokolpo_permission_no }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদন তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_date" value="{{ $formFourData->prokolpo_date }}" class="form-control datepickerOne" value="" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকালীন সময় <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_report_time" value="{{ $formFourData->prokolpo_report_time }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">মোট প্রকল্প ব্যয় <span class="text-danger">*</span></label>
                                            <input type ="number" required name="prokolpo_total_cost" value="{{ $formFourData->prokolpo_total_cost }}" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">এ এলাকার জন্য বরাদ্দের পরিমাণ <span class="text-danger">*</span></label>
                                            <input type="text" required name="allocation_amount" value="{{ $formFourData->allocation_amount }}" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">জেলা/উপজেলা  ভিত্তিক মোট ব্যয়<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFourData->district_upazila_wise_total_expenditure }}" name="district_upazila_wise_total_expenditure" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">জেলা /উপজেলা ভিত্তিক বার্ষিক বরাদ্দ <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFourData->district_upazila_wise_annual_allocation }}" name="district_upazila_wise_annual_allocation" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প এলাকায় প্রকল্পের সাইনবোর্ড প্রদর্শিত হয়েছে কিনা <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFourData->sign_board_avaiable_or_not }}" name="sign_board_avaiable_or_not" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>


                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            প্রকল্প অগ্রগতির বিস্তারিত বিবরণ  <span class="text-danger">*</span>
                                        </div>
                                        <div class="card-body">


                                            <div class="row" id="tableAjaxData">
                                                <div class="col-md-12">


                                                    <div class="table-responsive">


                                                        <table class="table table-bordered text-center" id="dynamicAddRemove">
                                                            <tr>

                                                                <th rowspan="2">কর্ম এলাকা</th>
                                                                <th rowspan="2">খাতের বিবরণ</th>
                                                                <th colspan="2">লক্ষ্যমাত্রা</th>
                                                                <th colspan="2">অর্জন</th>
                                                                <th rowspan="2">পুঞ্জীভূত অর্জন</th>
                                                                <th rowspan="2">মন্তব্য</th>
                                                                <th rowspan="2"></th>
                                                            </tr>
                                                            <tr>
                                                                <th>বাস্তব </th>
                                                                <th>আর্থিক</th>
                                                                <th>বাস্তব </th>
                                                                <th>আর্থিক</th>
                                                            </tr>
@foreach($formFourAreaList as $key=>$formFourAreaLists)
                                                            <tr>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->work_area }}" name="work_area[]" class="form-control" placeholder="কর্ম এলাকা" /></td>
                                                                <td><textarea required placeholder="খাতের বিবরণ" name="sector_detail[]" class="form-control">{{ $formFourAreaLists->sector_detail }}</textarea></td>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->target_real }}" name="target_real[]"  class="form-control" placeholder="বাস্তব" /></td>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->target_financial }}" name="target_financial[]" class="form-control" placeholder="আর্থিক" /></td>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->achievement_real }}" name="achievement_real[]" class="form-control" placeholder="বাস্তব" /></td>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->achievement_financial }}" name="achievement_financial[]" class="form-control" placeholder="আর্থিক" /></td>
                                                                <td><input required type="text" value="{{ $formFourAreaLists->comulative_achievement }}" name="comulative_achievement[]" class="form-control" placeholder="পুঞ্জীভূত অর্জন" /></td>
                                                                <td><textarea  placeholder="মন্তব্য" name="comment[]" class="form-control">{{ $formFourAreaLists->comment }}</textarea></td>
                                                                <td>

                                                                    @if($key == 0)

                                                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                                                                </button>

                                                                @else

                                                                <button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>


                                                                @endif

                                                            </td>


                                                            </tr>
                                                            @endforeach

                                                        </table>

                                                    </div>



                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-12">
                                                    <input class="form-control" data-parsley-required accept=".pdf" name="prokolpo_sector_detail" type="file" id="">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>






                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
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
            '<input type="text" name="work_area[]" class="form-control" placeholder="কর্ম এলাকা" />' +
            '</td>' +
            '<td>' +
            '<textarea required placeholder="খাতের বিবরণ" name="sector_detail[]" class="form-control"></textarea>' +
            '</td>' +

            '<td>' +
            '<input required type="text" name="target_real[]" class="form-control" placeholder="বাস্তব" />' +
            '</td>' +

            '<td>' +
            '<input required type="text" name="target_financial[]" class="form-control" placeholder="আর্থিক" />' +
            '</td>' +

            '<td>' +
            '<input required type="text" name="achievement_real[]" class="form-control" placeholder="বাস্তব" />' +
            '</td>' +

            '<td>' +
            '<input required type="text" name="achievement_financial[]" class="form-control" placeholder="আর্থিক" />' +
            '</td>' +

            '<td>' +
            '<input required type="text" name="comulative_achievement[]" class="form-control" placeholder="পুঞ্জীভূত অর্জন" />' +
            '</td>' +

            '<td>' +
            '<textarea  placeholder="মন্তব্য" name="comment[]" class="form-control"></textarea>' +
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
