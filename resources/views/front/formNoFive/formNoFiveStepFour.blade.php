@extends('front.master.master')

@section('title')
যানবাহনসহ সংস্থার সকল স্থাবর/অস্থাবর সম্পদের পূর্ণাঙ্গ তালিকা | {{ trans('header.ngo_ab')}}
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
<style>
    .ui-widget.ui-widget-content {
    top: 10px !important;
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
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                        <div class="fd01_tab"></div>
                                    </div>

                                     <div class="card">
                                        <div class="card-header text-center">যানবাহনসহ সংস্থার সকল স্থাবর/অস্থাবর সম্পদের পূর্ণাঙ্গ তালিকা</div>
                                     </div>


                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            @include('flash_message')
                                            <!-- add modal button start -->

                                            <div class="d-flex justify-content-between ">
                                                <div class="p-2">


                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                        স্থাবর/অস্থাবর সম্পদের পূর্ণাঙ্গ  বিবরণী যুক্ত করুন
                                                    </button>
                                                </div>
                                            </div>

                                            <!--- modal start--->

                                            @include('front.formNoFive._partila.stepFourModal')

                                            <!--- modal end --->

                                            <!-- add modal button end -->

                                        </div>
                                    </div>

                                    <div class="row" id="tableAjaxData">
                                        <div class="col-md-12">
                                            @if(count($formNoFiveStepFourData) == 0 )

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
                                                        <th rowspan="2">ক্র : নং :</th>
                                                        <th rowspan="2">সম্পদ / সম্পত্তির বিবরণ</th>
                                                        <th rowspan="2">পরিমাণ /সংখ্যা</th>
                                                        <th rowspan="2">প্রাপ্তি/সংগ্রহের তারিখ</th>
                                                        <th rowspan="2">প্রকৃত ক্রয় মূল্য</th>
                                                        <th rowspan="2">অর্থের উৎস</th>
                                                        <th rowspan="2">কি কাজে ব্যবহৃত হতেছে</th>
                                                        <th rowspan="2">অবস্থান(স্থান)</th>
                                                        <th rowspan="2">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )</th>
                                                        <th colspan="2">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত</th>
                                                        <th colspan="2">বর্তমান অবস্থা</th>
                                                        <th rowspan="2">কর্ম পরিকল্পনা</th>
                                                    </tr>
                                                    <tr>
                                                        <th>(সংখ্যা /পরিমাণ )</th>
                                                        <th>সর্বমোট ক্রয়মূল্য </th>
                                                        <th>সচল</th>
                                                        <th>অচল</th>
                                                    </tr>
                                                    @foreach($formNoFiveStepFourData as $key=>$formNoFiveStepFourDatas)
                                                    <tr>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->description_of_property }}({{ $formNoFiveStepFourDatas->sub_property }})</td>
                                                        <td>{{ $formNoFiveStepFourDatas->quantity}}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->collect_date}}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->real_buying_price }}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->fund_source }}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->what_is_it_used_for }}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->place}}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->assets_sold_transferred_number_or_quantity}}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->quantity_during_start_of_organization }}</td>
                                                        <td>{{ $formNoFiveStepFourDatas->total_during_start_of_organization }}</td>
                                                        <td>

                                                            @if($formNoFiveStepFourDatas->current_status == 'সচল')
                                                            সচল
                                                            @else

                                                            @endif

                                                        </td>
                                                        <td>

                                                            @if($formNoFiveStepFourDatas->current_status == 'অচল')
                                                            অচল
                                                            @else

                                                            @endif

                                                        </td>
                                                        <td>

                                                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepFourDatas->id }}" >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                                                  <!-- edit modal start -->

                                                                                  @include('front.formNoFive._partila.stepFourModalEdit')

                                                                                  <!-- edit  modal end -->

                                                            <button type="button" onclick="deleteTag({{ $formNoFiveStepFourDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $formNoFiveStepFourDatas->id }}" action="{{ route('formNoFiveStepFourDelete',$formNoFiveStepFourDatas->id) }}" method="POST" style="display: none;">

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
                                    <form action="{{ route('formNoFiveStepFourPost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="decode_id">
                                    <div class="row mt-4">

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">জমি/যানবাহন  যার নামে রেজিস্ট্রিকৃত তার বিস্তারিত তথ্য উল্লেখ করতে হবে <span class="text-danger">*</span></label>
                                            <textarea required name="land_and_transport_detail"  class="form-control" id=""placeholder="">{{ $formFiveData->land_and_transport_detail }}</textarea>
                                        </div>



                                        @if(empty($formFiveData->approval_file_of_Bureau))

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">ব্যুরোর অনুমোদনের প্রমাণক সংযুক্ত করতে হবে <span class="text-danger">*</span></label>
                                            <input type="file" accept=".pdf" required name="approval_file_of_Bureau"  class="form-control" id=""placeholder="">
                                        </div>
                    @else

                    <?php

                    $file_path = url($formFiveData->approval_file_of_Bureau);
                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                    ?>
                    <div class="mb-3 col-lg-12">
                        <label for="" class="form-label">ব্যুরোর অনুমোদনের প্রমাণক সংযুক্ত করতে হবে <span class="text-danger">*</span></label>
                        <input type="file" accept=".pdf"  name="approval_file_of_Bureau"  class="form-control" id=""placeholder="">
                    </div>
                    <b>{{ $filename.'.'.$extension }}</b>
                                    @endif








                                    </div>



                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <a href="{{ route('formNoFiveStepThree',base64_encode($decode_id)) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>

                                        <div id="jomadinButton">
                                        @if(count($formNoFiveStepFourData) == 0 )

                                        @else
                                        <button type="submit" class="btn btn-registration"
                                                >{{ trans('fd_one_step_one.Next_Step')}}
                                        </button>
                                        @endif
                                        </div>
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


//form submit start data


//for edit start

$(document).on('click', '.finalFormUpdate', function () {

    var mainId = $(this).attr('id');

    if(!$('#wealth_descrip'+mainId).val()){

alertify.alert('Error', 'সম্পদ / সম্পত্তির বিবরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#sub_property'+mainId).val()){

alertify.alert('Error', 'সম্পদ / সম্পত্তির বিবরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#quantity'+mainId).val()){

alertify.alert('Error', 'পরিমাণ /সংখ্যা সম্পর্কিত তথ্য দিন');

}else if(!$('#collect_date'+mainId).val()){

alertify.alert('Error', 'প্রাপ্তি/সংগ্রহের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#real_buying_price'+mainId).val()){

alertify.alert('Error', 'প্রকৃত ক্রয় মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#fund_source'+mainId).val()){

alertify.alert('Error', 'অর্থের উৎস সম্পর্কিত তথ্য দিন');

}else if(!$('#what_is_it_used_for'+mainId).val()){

alertify.alert('Error', 'কি কাজে ব্যবহৃত হতেছে সম্পর্কিত তথ্য দিন');

}else if(!$('#place'+mainId).val()){

alertify.alert('Error', 'অবস্থান(স্থান) সম্পর্কিত তথ্য দিন');

}else if(!$('#assets_sold_transferred_number_or_quantity'+mainId).val()){

alertify.alert('Error', 'বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ ) সম্পর্কিত তথ্য দিন');

}else if(!$('#quantity_during_start_of_organization'+mainId).val()){

alertify.alert('Error', 'সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত (সংখ্যা /পরিমাণ ) সম্পর্কিত তথ্য দিন');

}else if(!$('#total_during_start_of_organization'+mainId).val()){

alertify.alert('Error', 'সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত সর্বমোট ক্রয়মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#current_status'+mainId).val()){

alertify.alert('Error', 'বর্তমান অবস্থা সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var decode_id = $('#decode_id'+mainId).val();
var wealth_descrip = $('#wealth_descrip'+mainId).val();
var sub_property = $('#sub_property'+mainId).val();
var quantity = $('#quantity'+mainId).val();
var collect_date = $('#collect_date'+mainId).val();
var real_buying_price = $('#real_buying_price'+mainId).val();
var fund_source =$('#fund_source'+mainId).val();
var what_is_it_used_for = $('#what_is_it_used_for'+mainId).val();
var place = $('#place'+mainId).val();
var assets_sold_transferred_number_or_quantity = $('#assets_sold_transferred_number_or_quantity'+mainId).val();
var quantity_during_start_of_organization = $('#quantity_during_start_of_organization'+mainId).val();
var total_during_start_of_organization = $('#total_during_start_of_organization'+mainId).val();
var current_status = $('#current_status'+mainId).val();


$.ajax({
url: "{{ route('formNoFiveStepFourUpdate') }}",
method: 'POST',
data: {mainId:mainId,decode_id:decode_id,current_status:current_status,total_during_start_of_organization:total_during_start_of_organization,quantity_during_start_of_organization:quantity_during_start_of_organization,assets_sold_transferred_number_or_quantity:assets_sold_transferred_number_or_quantity,place:place,what_is_it_used_for:what_is_it_used_for,fund_source:fund_source,real_buying_price:real_buying_price,collect_date:collect_date,quantity:quantity,sub_property:sub_property,wealth_descrip:wealth_descrip},
success: function(data) {

$('#exampleModal'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

$("#tableAjaxData").html('');
$("#tableAjaxData").html(data);


$("#jomadinButton").html('');
$("#jomadinButton").html('<button type="submit" class="btn btn-registration res">আপডেট করুন</button>');



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


//for edit end





$(document).on('click', '#finalFormSubmit', function () {

    if(!$('#wealth_descrip').val()){

        alertify.alert('Error', 'সম্পদ / সম্পত্তির বিবরণ সম্পর্কিত তথ্য দিন');

    }else if(!$('#sub_property').val()){

        alertify.alert('Error', 'সম্পদ / সম্পত্তির বিবরণ সম্পর্কিত তথ্য দিন');

    }else if(!$('#quantity').val()){

        alertify.alert('Error', 'পরিমাণ /সংখ্যা সম্পর্কিত তথ্য দিন');

    }else if(!$('#collect_date').val()){

        alertify.alert('Error', 'প্রাপ্তি/সংগ্রহের তারিখ সম্পর্কিত তথ্য দিন');

    }else if(!$('#real_buying_price').val()){

        alertify.alert('Error', 'প্রকৃত ক্রয় মূল্য সম্পর্কিত তথ্য দিন');

    }else if(!$('#fund_source').val()){

        alertify.alert('Error', 'অর্থের উৎস সম্পর্কিত তথ্য দিন');

    }else if(!$('#what_is_it_used_for').val()){

        alertify.alert('Error', 'কি কাজে ব্যবহৃত হতেছে সম্পর্কিত তথ্য দিন');

    }else if(!$('#place').val()){

        alertify.alert('Error', 'অবস্থান(স্থান) সম্পর্কিত তথ্য দিন');

    }else if(!$('#assets_sold_transferred_number_or_quantity').val()){

        alertify.alert('Error', 'বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ ) সম্পর্কিত তথ্য দিন');

    }else if(!$('#quantity_during_start_of_organization').val()){

        alertify.alert('Error', 'সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত (সংখ্যা /পরিমাণ ) সম্পর্কিত তথ্য দিন');

    }else if(!$('#total_during_start_of_organization').val()){

        alertify.alert('Error', 'সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত সর্বমোট ক্রয়মূল্য সম্পর্কিত তথ্য দিন');

    }else if(!$('#current_status').val()){

        alertify.alert('Error', 'বর্তমান অবস্থা সম্পর্কিত তথ্য দিন');

    }else{

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



   var decode_id = $('#decode_id').val();
   var wealth_descrip = $('#wealth_descrip').val();
   var sub_property = $('#sub_property').val();
   var quantity = $('#quantity').val();
   var collect_date = $('#collect_date').val();
   var real_buying_price = $('#real_buying_price').val();
   var fund_source =$('#fund_source').val();
   var what_is_it_used_for = $('#what_is_it_used_for').val();
   var place = $('#place').val();
   var assets_sold_transferred_number_or_quantity = $('#assets_sold_transferred_number_or_quantity').val();
   var quantity_during_start_of_organization = $('#quantity_during_start_of_organization').val();
   var total_during_start_of_organization = $('#total_during_start_of_organization').val();
   var current_status = $('#current_status').val();


    $.ajax({
    url: "{{ route('formNoFiveStepFourPostAjax') }}",
    method: 'POST',
    data: {decode_id:decode_id,current_status:current_status,total_during_start_of_organization:total_during_start_of_organization,quantity_during_start_of_organization:quantity_during_start_of_organization,assets_sold_transferred_number_or_quantity:assets_sold_transferred_number_or_quantity,place:place,what_is_it_used_for:what_is_it_used_for,fund_source:fund_source,real_buying_price:real_buying_price,collect_date:collect_date,quantity:quantity,sub_property:sub_property,wealth_descrip:wealth_descrip},
    success: function(data) {

        $('#exampleModal').modal('hide');

      alertify.set('notifier','position', 'top-center');
      alertify.success('Data Added Successfully');

      $("#tableAjaxData").html('');
      $("#tableAjaxData").html(data);


      $("#jomadinButton").html('');
      $("#jomadinButton").html('<button type="submit" class="btn btn-registration res">জমা দিন</button>');

   var wealth_descrip = $('#wealth_descrip').val('');
   var sub_property = $('#sub_property').val('');
   var quantity = $('#quantity').val('');
   var collect_date = $('#collect_date').val('');
   var real_buying_price = $('#real_buying_price').val('');
   var fund_source =$('#fund_source').val('');
   var what_is_it_used_for = $('#what_is_it_used_for').val('');
   var place = $('#place').val('');
   var assets_sold_transferred_number_or_quantity = $('#assets_sold_transferred_number_or_quantity').val('');
   var quantity_during_start_of_organization = $('#quantity_during_start_of_organization').val('');
   var total_during_start_of_organization = $('#total_during_start_of_organization').val('');
   var current_status = $('#current_status').val('');

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
//form submit start data end



//edit for estabor data

$(document).on('change', 'select.wealth_descrip', function () {

    var mainValue = $(this).val();
    var mainId = $(this).attr('id');

    if(mainValue == 'অস্থাবর'){

$('#secondWealth'+mainId).html('');
$('#secondWealth'+mainId).html('<select id="sub_property"  name="sub_property"  type="text" class="form-control"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option><option value="যানবাহন">যানবাহন</option><option value="এয়ার কন্ডিশনার">এয়ার কন্ডিশনার</option></select>');
}else{
$('#secondWealth'+mainId).html('');
$('#secondWealth'+mainId).html('<select id="sub_property"  name="sub_property"  type="text" class="form-control"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option><option value="জমি">জমি</option><option value="বিল্ডিং">বিল্ডিং</option><option value="অন্যান্য">অন্যান্য</option></select>');


}

});
/// edit for esthabor data

//esthabor data start

$(document).on('change', 'select#wealth_descrip', function () {

    var mainValue = $(this).val();

    //alert(12);

    if(mainValue == 'অস্থাবর'){

        $('#secondWealth').html('');
        $('#secondWealth').html('<select id="sub_property"  name="sub_property"  type="text" class="form-control"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option><option value="যানবাহন">যানবাহন</option><option value="এয়ার কন্ডিশনার">এয়ার কন্ডিশনার</option></select>');
    }else{
        $('#secondWealth').html('');
        $('#secondWealth').html('<select id="sub_property"  name="sub_property"  type="text" class="form-control"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option><option value="জমি">জমি</option><option value="বিল্ডিং">বিল্ডিং</option><option value="অন্যান্য">অন্যান্য</option></select>');


    }




});
//esthabor data end

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
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="sub_property" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->district_bn }}">{{ $districtListAll->district_bn }}</option>@endforeach</select></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
