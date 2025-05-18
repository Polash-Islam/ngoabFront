
@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_four.o_info')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >এফডি -৮ ফরম </li>
                        {{-- <li class="active">{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                        <li class="active">{{ trans('fd_one_step_four.o_info')}}</li>
                        {{-- <li >{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                        <li >{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                        <li  class="active">{{ trans('fd_one_step_four.o_info')}}</li> --}}
                    </ul>

                </div>
                <div class="right-side">

                    <?php

                    $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                                               ->value('ngo_type');

                                                    ?>

@if($checkNgoTypeForForeginNgo == 'Foreign')

@include('front.renew.foreign.finalViewOneEdit') 

@else

@include('front.renew.finalViewOneEdit')

<!--end local ngo -->
@endif

<?php

$lastRenewData =DB::table('ngo_renew_infos')
->where('user_id',Auth::user()->id)
->orderBy('id','desc')->value('id');


$lastRenewDatanew =DB::table('ngo_renews')
->where('fd_one_form_id',$getUserIdFromNew)
->orderBy('id','desc')->value('id');

                    ?>
                      <div class="buttons d-flex justify-content-end mt-4">
                    <a href="{{ route('ngoRenewStepFour',base64_encode($lastRenewData)) }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                    <a href="{{ route('renewInfo',base64_encode($lastRenewDatanew)) }}" class="btn btn-success me-2">দাখিল করুন </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    $(document).on('click', '.organizational_structure', function () {

        var structureStatus = $(this).val();


        //alert(structureStatus);


        $.ajax({
        url: "{{ route('localNgoType') }}",
        method: 'GET',
        data: {structureStatus:structureStatus},
        success: function(data) {
           $("#mResult").html('');
           $("#mResult").html(data);
        }
        });
    });
</script>





<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            staff_name: {
                required: true
            },
            staff_position: {
                required: true
            },
            staff_address: {
                required: true
            },
            date_of_join: {
                required: true
            },

            citizenship: {
                required: true
            },
            salary_statement: {
                required: true
            },
            other_occupation: {
                required: true
            },
            citizenship2: {
                required: true
            },
            citizenship1: {
                required: true
            },
            citizenship3: {
                required: true
            },
            citizenship4: {
                required: true
            },
            citizenship5: {
                required: true
            }

        },


               messages:
 {



    staff_name: {
                required: " staff_name Field is required"
            },
            staff_position: {
                required: " staff_position Field is required"
            },
            staff_address: {
                required: " staff_address Field is required"
            },
            date_of_join: {
                required: " date_of_join Field is required"
            },

            citizenship: {
                required: " citizenship Field is required"
            },
            salary_statement: {
                required: " salary_statement Field is required"
            },
            other_occupation: {
                required: " other_occupation Field is required"
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
