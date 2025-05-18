@extends('front.master.master')

@section('title')
    {{ trans('first_info.all_reg_form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

    <?php

    use App\Http\Controllers\NGO\CommonController;

    $fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

    $newOldNgo = CommonController::newOldNgo();

    if ($newOldNgo != 'Old') {
        $get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id', $fdOneFormId)->value('status');
    } else {
        $get_reg_id = DB::table('ngo_renews')->where('fd_one_form_id', $fdOneFormId)->value('status');
    }

    $mainNgoType = CommonController::changeView();

    ?>


    @if(empty($get_reg_id) || $get_reg_id == 'Correct' || $get_reg_id == 'Rejected')
            <?php
            $checkCompleteStatusData = DB::table('form_complete_statuses')
                ->where('user_id', Auth::user()->id)
                ->first();

            $checkCompleteStatus = DB::table('form_complete_statuses')
                ->where('user_id', Auth::user()->id)
                ->where('fd_one_form_step_one_status', 1)
                ->where('fd_one_form_step_two_status', 1)
                ->where('fd_one_form_step_three_status', 1)
                ->where('fd_one_form_step_four_status', 1)
                ->where('form_eight_status', 1)
                ->where('ngo_member_status', 1)
                ->where('ngo_member_nid_photo_status', 1)
                ->where('ngo_other_document_status', 1)
                ->value('id');
            ?>


        @if(empty($checkCompleteStatus))
            @if($mainNgoType== 'দেশিও')
                @if(!$checkCompleteStatusData)
                    @include('front.form.ngo_registration_form_fd01_step01')
                @elseif($checkCompleteStatusData->fd_one_form_step_one_status == 0)
                    @include('front.form.ngo_registration_form_fd01_step01')
                @elseif($checkCompleteStatusData->fd_one_form_step_two_status == 0)
                    @include('front.form.ngo_registration_form_fd01_step02')
                @elseif($checkCompleteStatusData->fd_one_form_step_three_status == 0)
                    @include('front.form.ngo_registration_form_fd01_step03')
                @elseif($checkCompleteStatusData->fd_one_form_step_four_status == 0)
                    @include('front.form.ngo_registration_form_fd01_step04')
                @elseif($checkCompleteStatusData->form_eight_status == 0)
                    @include('front.form.ngo_registration_form_form08')
                @elseif($checkCompleteStatusData->ngo_member_status == 0)
                    @include('front.form.ngo_registration_form_member_info')
                @elseif($checkCompleteStatusData->ngo_member_nid_photo_status == 0)
                    @include('front.form.ngo_registration_form_nid_image_info')
                @elseif($checkCompleteStatusData->ngo_other_document_status == 0)
                    @include('front.form.ngo_registration_form_document_info')
                @endif

            @else
                @if(!$checkCompleteStatusData)
                    @include('front.form.foreign.ngo_registration_form_fd01_step01')
                @elseif($checkCompleteStatusData->fd_one_form_step_one_status == 0)
                    @include('front.form.foreign.ngo_registration_form_fd01_step01')
                @elseif($checkCompleteStatusData->fd_one_form_step_two_status == 0)
                    @include('front.form.foreign.ngo_registration_form_fd01_step02')
                @elseif($checkCompleteStatusData->fd_one_form_step_three_status == 0)
                    @include('front.form.foreign.ngo_registration_form_fd01_step03')
                @elseif($checkCompleteStatusData->fd_one_form_step_four_status == 0)
                    @include('front.form.foreign.ngo_registration_form_fd01_step04')
                @elseif($checkCompleteStatusData->form_eight_status == 0)
                    @include('front.form.foreign.ngo_registration_form_form08')
                @elseif($checkCompleteStatusData->ngo_member_status == 0)
                    @include('front.form.foreign.ngo_registration_form_member_info')
                @elseif($checkCompleteStatusData->ngo_member_nid_photo_status == 0)
                    @include('front.form.foreign.ngo_registration_form_nid_image_info')

                @elseif($checkCompleteStatusData->ngo_other_document_status == 0)
                    @include('front.form.foreign.ngo_registration_form_document_info')
                @endif

            @endif
            <!-- end ngo member other form -->

        @else

            <section>
                <div class="container">
                    <div class="form-card">
                        <div class="dashboard_box">
                            <div class="dashboard_left">
                                <ul>
                                    @include('front.include.sidebar_dash')
                                </ul>
                            </div>
                            <div class="dashboard_right">
                                <div class="card">
                                    <form id="form" action="{{ route('finalSubmitRegForm') }}"
                                          method="post">
                                        @csrf
                                        <input type="hidden" value="NGO Registration" name="reg_type"/>
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <p class="m-0 p-0"
                                                   style="line-height: 39px">{{ trans('first_info.ngo_Registration_All_Steps')}}</p>
{{--                                                <a class="btn btn-sm btn-danger"--}}
{{--                                                   style="line-height: 30px; background-color: #28a745 !important; border:1px solid #28a745"--}}
{{--                                                   href="{{ route('regSubmitList') }}"> {{ trans('first_info.nibondhon_joma_din')}}</a>--}}
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                   style="line-height: 30px; background-color: #28a745 !important; border:1px solid #28a745"> {{ trans('first_info.nibondhon_joma_din')}}</button>
                                            </div>
                                        </div>
                                    </form>


{{--                                    <form id="form" action="{{ route('finalSubmitRegForm') }}"--}}
{{--                                          method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" value="NGO Registration" name="reg_type"/>--}}
{{--                                        <div class="d-grid d-md-flex justify-content-md-end">--}}
{{--                                            <button type="submit" id="bb3" class="btn btn-registration"--}}
{{--                                                    @if(($form_complete_statuses && $form_complete_statuses->fd_one_form_step_one_status && $form_complete_statuses->fd_one_form_step_two_status && $form_complete_statuses->fd_one_form_step_three_status && $form_complete_statuses->fd_one_form_step_four_status) && ($form_complete_statuses && $form_complete_statuses->ngo_other_document_status) && ($first_one_form_check_status == 1))--}}
{{--                                                    @else--}}
{{--                                                        disabled--}}
{{--                                                @endif--}}
{{--                                            >{{ trans('reg_sub.submit')}}</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}

                                    <div class="card-body">

                                        <ul class="nav nav-tabs custom_tab">
                                            @if($mainNgoType== 'Foreign')
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tofban">


                                                        @if($mainNgoType== 'Foreign')
                                                            @if($foreignNgoType == 'Old')
                                                                {{ trans('fd_one_step_one.fd8')}}
                                                            @else
                                                                {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                            @endif

                                                        @else

                                                            @if($localNgoTypem == 'Old')
                                                                {{ trans('fd_one_step_one.fd8')}}
                                                            @else
                                                                {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                            @endif

                                                        @endif

                                                    </a>
                                                </li>



                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab"
                                                       href="#tofen2">{{ trans('fd_one_step_one.other_doc_title')}}</a>
                                                </li>
                                            @else

                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tofban">


                                                        @if($mainNgoType== 'Foreign')
                                                            @if($foreignNgoType == 'Old')
                                                                {{ trans('fd_one_step_one.fd8')}}
                                                            @else
                                                                {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                            @endif

                                                        @else

                                                            @if($localNgoTypem == 'Old')
                                                                {{ trans('fd_one_step_one.fd8')}}
                                                            @else
                                                                {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                            @endif

                                                        @endif

                                                    </a>
                                                </li>




                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab"
                                                       href="#tofen3">{{ trans('fd_one_step_one.other_doc_title')}}</a>
                                                </li>

                                            @endif

                                        </ul>

                                        <!-- Tab panes -->
                                        @if($mainNgoType== 'Foreign')

                                            <div class="tab-content custom_tab_content">
                                                <div class="tab-pane container active" id="tofban">
                                                    @if($foreignNgoType == 'Old')

                                                        @include('front.form.foreign.formone.fdFormOneInfoOld')
                                                    @else
                                                        @include('front.form.foreign.formone.fdFormOneInfo')
                                                    @endif
                                                </div>


                                                <div class="tab-pane container" id="tofen2">

                                                    @include('front.ngo_doc.foreign.finalViewOne')

                                                </div>


                                            </div>
                                        @else

                                            <div class="tab-content custom_tab_content">
                                                <div class="tab-pane container active" id="tofban">

                                                    @if($localNgoTypem == 'Old')
                                                        @include('front.form.formone.fdFormOneInfoOld')
                                                    @else
                                                        @include('front.form.formone.fdFormOneInfo')
                                                    @endif

                                                </div>
                                                <div class="tab-pane container" id="tofen">


                                                </div>

                                                {{-- <div class="tab-pane container" id="tofen1">
                                                  @include('front.ngomember.finalView')

                                                </div>

                                                <div class="tab-pane container" id="tofen2">
                                                    @include('front.ngo_doc.finalView')

                                                </div> --}}

                                                <div class="tab-pane container" id="tofen3">

                                                    @if($localNgoTypem == 'Old')
                                                        @include('front.ngo_doc.finalViewOne')
                                                    @else

                                                        @include('front.ngo_doc.finalView')
                                                    @endif

                                                </div>


                                            </div>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @else
        <section>
            <div class="container">
                <div class="form-card">
                    <div class="dashboard_box">
                        <div class="dashboard_left">
                            <ul>
                                @include('front.include.sidebar_dash')
                            </ul>
                        </div>
                        <div class="dashboard_right">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-center">
                                        <i class="fa fa-check-circle confirmation_icon"
                                           style="font-size:105px !important;"></i>
                                    </div>
                                    <div class="text-center">
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h1>আবেদন জমা দেওয়া হয়েছে!</h1>
                                            <p>আপনার এনজিও নিবন্ধন আবেদনটি এনজিও এবি অফিসে দাখিল হয়েছে।</p>
                                            <p>আপনার আবেদন গৃহীত হলে আপনি নিশ্চিতকরণ বার্তা পাবেন</p>
                                        @if(!empty($selectedDistrict))
                                                <p>
                                                    <strong>{{ trans('first_info.ngo_tracking_number_text')}}:</strong>
                                                    <span class="badge bg-primary">{{ $selectedDistrict->registration_number_given_by_admin }}</span>
                                                </p>
                                        @endif

                                        @else
                                            <h1>Application Submitted!</h1>
                                            <p>Your NGO Application Has Been Submitted Into NGOAB</p>
                                            <p>When your application will be accepted you will get confirmation
                                                message </p>
                                            @if(!empty($selectedDistrict))
                                                <p>
                                                    <strong>{{ trans('first_info.ngo_tracking_number_text')}}:</strong>
                                                    <span class="badge bg-primary">{{ $selectedDistrict->registration_number_given_by_admin }}</span>
                                                </p>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
@endsection

@push('js_lib')
    @include('front.zoomButtonImage')
@endpush

@section('script')
    <script type="text/javascript">
        $(function () {
            $(document).ready(function () {

                $('.select2').select2({
                    selectOnClose: true,
                    width: '100%'
                });

                var SITEURL = "{{route('ngoAllRegistrationForm')}}";
                var bar = $('.bar');
                var percent = $('.percent');
                $('.formFile').ajaxForm({
                    beforeSend: function () {
                        //$("#div1").hide();
                        $(".progress").show();

                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function (xhr) {
                        //alert('File Has Been Uploaded Successfully');
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Uploaded Successfully');
                        window.location.href = SITEURL;
                    }
                });
            });
        });
    </script>
    <script>
        $(document).on('click', '.organizational_structure', function () {

            var structureStatus = $(this).val();

            if (structureStatus == 'Yes') {

                $('#sYesDiv').show();
                $('#sNoDiv').hide();


            } else if (structureStatus == 'No') {

                $('#sYesDiv').hide();
                $('#sNoDiv').show();

            }


            //alert(structureStatus);


            {{-- $.ajax({--}}
            {{-- url: "{{ route('foreignNgoType') }}",--}}
            {{--method: 'GET',--}}
            {{--data: {structureStatus:structureStatus},--}}
            {{--success: function(data) {--}}
            {{--   $("#mResult").html('');--}}
            {{--   $("#mResult").html(data);--}}
            {{--}--}}
            {{--});--}}
        });
    </script>


    <script>
        $(document).on('click', '.organizational_structurel', function () {

            var structureStatus = $(this).val();


            if (structureStatus == 'Yes') {

                $('#sYesDiv').show();
                $('#sNoDiv').hide();


            } else if (structureStatus == 'No') {

                $('#sYesDiv').hide();
                $('#sNoDiv').show();

            }


            //alert(structureStatus);


            // $.ajax({
            // url: "{{ route('localNgoType') }}",
            // method: 'GET',
            // data: {structureStatus:structureStatus},
            // success: function(data) {
            //    $("#mResult").html('');
            //    $("#mResult").html(data);
            // }
            // });
        });
    </script>


    <script>
        $("#downloadButton345").click(function () {
            var name = $('#mainName').val();
            var designation = $('#mainDesignation').val();
            var id = $('#mainId').val();
            var place = $('#mainPlace').val();

            //alert(22);

            $.ajax({
                url: "{{ route('fromOneChief') }}",
                method: 'GET',
                data: {name: name, designation: designation, id: id, place: place},
                success: function (data) {


                    window.open(data);

                }
            });

        });
    </script>


    <script>
        $("#downloadButtonNew").click(function () {
            var name = $('#mainName').val();
            var designation = $('#mainDesignation').val();
            var id = $('#mainId').val();
            var place = $('#mainPlace').val();

            //alert(22);

            $.ajax({
                url: "{{ route('fromEightChiefForOldNgo') }}",
                method: 'GET',
                data: {name: name, designation: designation, id: id, place: place},
                success: function (data) {


                    window.open(data);

                }
            });

        });
    </script>


    <script>
        $("#downloadButton").click(function () {
            var name = $('#mainName').val();
            var designation = $('#mainDesignation').val();
            var id = $('#mainId').val();
            var place = $('#mainPlace').val();

            $.ajax({
                url: "{{ route('fromOneChief') }}",
                method: 'GET',
                data: {name: name, designation: designation, id: id, place: place},
                success: function (data) {
                    window.open(data);
                }
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            //form date

            $("#form_date").change(function () {

                var form_date = $(this).val();
                var to_date = $('#to_date').val();


                $.ajax({
                    url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
                    method: 'GET',
                    data: {form_date: form_date, to_date: to_date},
                    success: function (data) {
                        $("#total_year").val('');
                        $("#total_year").val(data.data);
                    }
                });


            });
            //end from date


            //to date
            $("#to_date").change(function () {

                var to_date = $(this).val();
                var form_date = $('#form_date').val();

                $.ajax({
                    url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
                    method: 'GET',
                    data: {form_date: form_date, to_date: to_date},
                    success: function (data) {
                        $("#total_year").val('');
                        $("#total_year").val(data.data);
                    }
                });

            });
            //end to date

            //new_cat_n


            $("[id^=member_id]").click(function () {

                //alert(3);

                var main_id = $(this).attr('id');
                var id_for_pass = main_id.slice(9);


                $.ajax({
                    url: "{{ route('formEightNgoCommitteeMemberView') }}",
                    method: 'GET',
                    data: {id_for_pass: id_for_pass},
                    success: function (data) {
                        $("#main_content_table").html('');
                        $("#main_content_table").html(data);
                    }
                });

            });
        });


    </script>
    <script>
        $(document).ready(function () {
            $('#form1').validate({ // initialize the plugin
                rules: {


                    district: {
                        required: true
                    },
                    sub_district: {
                        required: true
                    },
                    name: {
                        required: true
                    },

                    address: {
                        required: true
                    },


                    annual_budget: {
                        required: true
                    }


                },


                messages:
                    {


                        district: {
                            required: " district Field is required"
                        },
                        sub_district: {
                            required: " sub_district Field is required"
                        },
                        name: {
                            required: " name Field is required"
                        },
                        address: {
                            required: " address Field is required"
                        },
                        annual_budget: {
                            required: " annual_budget Field is required"
                        }


                    }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {


                    district: {
                        required: true
                    },
                    sub_district: {
                        required: true
                    },
                    name: {
                        required: true
                    },

                    address: {
                        required: true
                    },
                    letter_file: {
                        required: true
                    },
                    annual_budget: {
                        required: true
                    }


                },


                messages:
                    {


                        district: {
                            required: " district Field is required"
                        },
                        sub_district: {
                            required: " sub_district Field is required"
                        },
                        name: {
                            required: " name Field is required"
                        },
                        address: {
                            required: " address Field is required"
                        },
                        letter_file: {
                            required: " letter_file Field is required"
                        },
                        annual_budget: {
                            required: " annual_budget Field is required"
                        }


                    }
            });
        });
    </script>
    <script>


        $("[id^=final_b_get]").click(function () {

            var id = $(this).data("id");
            var name = $('#sname' + id).val();
            var information = $('#sinformation' + id).val();


            $.ajax({
                url: "{{ route('adviserDataUpdate') }}",
                type: 'get',
                data: {
                    "name": name,
                    "information": information,
                    "id": id,

                },
                success: function (data) {
                    //alert('success');
                    location.reload(true);
                }
            });

        });
        $("[id^=adeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('adviserDataDelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        $("[id^=sadeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('otherInformationADelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        $("[id^=deleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('sourceOfFundDelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>





    <!--//add new row-->

    <script>
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr>' +
                '<td>' +
                '<input type="text" name="name[]" required  class="form-control" required />' +
                '</td>' +
                '<td>' +
                '<input type="text" name="address[]" required  class="form-control" required />' +
                '</td>' +
                '<td>' +
                '<input class="form-control" accept=".pdf" required name="letter_file[]" type="file" id="">' +
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
                '<input type="text" name=""  class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name=""  class="form-control" />' +
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
                '<input type="text"  name="information_title[]" placeholder="" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="file" accept=".pdf" name="information_type[]" placeholder="" class="form-control" />' +
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
    <script>
        $(".newDisType") // select the radio by its id
            .change(function () { // bind a function to the change event
                if ($(this).is(":checked")) { // check if the radio is checked
                    var val = $(this).val(); // retrieve the value

                    if (val == 1) {

                        $('#showHideInput').hide();
                        $('#showHideInput').val('{{ trans('fd_one_step_two.allDistrict')}}');

                    } else {
                        $('#showHideInput').show();
                        $('#showHideInput').val('');
                    }

                }
            });
    </script>
@endsection
