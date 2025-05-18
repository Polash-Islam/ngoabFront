@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_one.Particulars_of_Organisation')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>



<style>
    /*img {*/
    /*    display: block;*/
    /*    max-width: 100%;*/
    /*}*/
    .preview {
        text-align: center;
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .section{
        margin-top:150px;
        background:#fff;
        padding:50px 30px;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
@endsection

@section('body')

<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ trans('fd_one_step_one.fd_8_form')}}</li>
                        {{-- <li>{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                        <li>{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">






                        @if(count($all_parti) == 0)



                @else

                <?php

$get_all_data_1 = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();


                ?>

                @if(count($get_all_data_new) == 0)




<form action="{{ route('storeRenewInformationList') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf


    <?php

    $query_to_get_data = DB::table('countries')->where('id','!=',18)->orderBy('id','desc')->get();


    $get_cityzenship_data = DB::table('countries')->whereNotNull('country_people_english')
    ->whereNotNull('country_people_bangla')->orderBy('id','desc')->get();

    $get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');


    $mainNgoTypeRenew = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');

$registrationNumberForOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');
                                    ?>
<div class="main active">

    <div class="fd01_tablist">
        <div class="fd01_tab"></div>
        <div class="fd01_tab fd01_checked"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
    </div>
    <div class="text">
        <h2>{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</h2>
        {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
    </div>

    <div class="mt-3">

            <div class="mb-3">
                                    <label for="" class="form-label"> {{ trans('fd_one_step_one.foreign_onudan_text') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                                    <input type="file" name="foregin_pdf" data-parsley-required accept=".pdf" class="form-control" id="foregin_pdf"/>
                                    <p id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></p>


                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.prostabito_bajet') }}<span class="text-danger">*</span> </label>
                                    <input type="text" name="yearly_budget" value="{{ $get_all_data_1->annual_budget }}" data-parsley-required class="form-control" id="">
                                </div>


                          <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.prostabito_bajet_utso') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                                    <input type="file" name="yearly_budget_file" data-parsley-required accept=".pdf" class="form-control" id="annual_budget_file">
                                    <p id="annual_budget_file_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                </div>


    </div>
    <div class="buttons d-flex justify-content-end mt-4">

        <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_one" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
    </div>
</div>
</form>

@else

<?php
   $get_all_data_new_first =DB::table('ngo_renew_infos')->where('user_id',Auth::user()->id)->latest()->first();

   $mainNgoTypeRenew = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');

$registrationNumberForOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

?>
<form action="{{ route('ngoRenewStepTwoUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf

    <input type="hidden" value="{{ $mainId }}" name="fileId" />
<div class="main active">

    <div class="fd01_tablist">
        <div class="fd01_tab"></div>
        <div class="fd01_tab fd01_checked"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
    </div>
    <div class="text">
        <h2>{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</h2>
        {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
    </div>

    <div class="mt-3">


            @if(empty($get_all_data_new_first->foregin_pdf))

            <div class="mb-3">
                <label for="" class="form-label"> {{ trans('fd_one_step_one.foreign_onudan_text') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                <input type="file" name="foregin_pdf" data-parsley-required accept=".pdf" class="form-control" id="foregin_pdf"/>
                <p id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></p>
            </div>
@else

<?php

$file_path = url($get_all_data_new_first->foregin_pdf);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>
 <div class="mb-3">
    <label for="" class="form-label"> {{ trans('fd_one_step_one.foreign_onudan_text') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
    <input type="file" name="foregin_pdf"  accept=".pdf" class="form-control" id="foregin_pdf"/>
    <p id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></p>
</div>
<b>{{ $filename.'.'.$extension }}</b>
        @endif



        <div class="mb-3">
            <label for="" class="form-label">{{ trans('fd_one_step_one.prostabito_bajet') }}<span class="text-danger">*</span> </label>
            <input type="text" name="yearly_budget" value="{{ $get_all_data_1->annual_budget }}" data-parsley-required class="form-control" id="">
        </div>
        @if(empty($get_all_data_new_first->yearly_budget_file))

        <div class="mb-3">
            <label for="" class="form-label">{{ trans('fd_one_step_one.prostabito_bajet_utso') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
            <input type="file" name="yearly_budget_file" data-parsley-required accept=".pdf" class="form-control" id="annual_budget_file">
            <p id="annual_budget_file_text" class="text-danger mt-2" style="font-size:12px;"></p>
        </div>
@else

<?php

$file_path = url($get_all_data_new_first->yearly_budget_file);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>
<div class="mb-3">
<label for="" class="form-label">{{ trans('fd_one_step_one.prostabito_bajet_utso') }} <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
<input type="file" name="yearly_budget_file"  accept=".pdf" class="form-control" id="annual_budget_file">

<p id="annual_budget_file_text" class="text-danger mt-2" style="font-size:12px;"></p>

</div>
<b>{{ $filename.'.'.$extension }}</b>
    @endif

    </div>
    <div class="buttons d-flex justify-content-end mt-4">
        <a href="{{ route('ngoRenewStepOne') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
        <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_one" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
    </div>
</div>
</form>


@endif



                @endif

                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5> --}}
                <h4 id="mmT"></h4>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelImage" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->
@endsection

@section('script')
@include('front.zoomButtonImage')
<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            phone: {
                required: true
            }


        },


               messages:
 {




            phone: {
                required: "Phone Field is required"
            }




 }
    });
});
</script>


<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple, .distinct-single, .sub-distinct-single').select2();
    });
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>


<!--//add new row-->

<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" type="file" id="">' +
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
    var i = 0;
    $("#dynamic-advisor").click(function () {
        ++i;
        $("#dynamicAddRemoveAdvisor").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-advisor"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-advisor', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="file" name="" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
