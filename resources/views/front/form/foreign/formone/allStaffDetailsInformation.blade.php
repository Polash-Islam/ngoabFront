
@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_three.All_staff_details_information')}} | {{ trans('header.ngo_ab')}}
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
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        @if($localNgoTypem == 'Old')
                        <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                        <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif
                     {{-- <li>{{ trans('fd_one_step_one.form_eight_title')}}</li> --}}
                           {{-- <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li> --}}
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <?php

                    $allFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();

                    $getCityzenshipData = DB::table('countries')->whereNotNull('country_people_english')
            ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

            $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allFormOneData->id)->get();

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                           ->value('ngo_type');

                           $checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                           ->value('ngo_type_new_old');
                                    ?>

                    <div class="committee_container active">
                        <div class="text">
                            <h2>{{ trans('fd_one_step_three.All_staff_details_information')}}</h2>
                            {{-- <p>Enter your information to get closer to Registration.</p> --}}
                        </div>

                        <div class="fd01_tablist">
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab fd01_checked"></div>
                            <div class="fd01_tab"></div>
                        </div>

                        <div class="mt-3">
                            <div class="d-flex justify-content-between ">
                                <div class="p-2">


                                </div>
                                <div class="p-2">
                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                        {{ trans('form 8_bn.add')}}
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h5 class="form_middle_text">
                                    <b>{{ trans('fd_one_step_three.staff_position')}}</b>
                                </h5>
                                <h5 class="form_middle_text">
                                   <span class="text-danger">{{ trans('fd_one_step_three.staff_position1')}}</span>
                                </h5>
                            </div>

@include('flash_message')




<!--modal-->
<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    {{-- {{ trans('form 8_bn.ngo_committee_member_registration')}} --}}

                     যোগ করুন

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('singleStaffDetailsInformationAdd') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $allFormOneData->id }}" name="id"  id="">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                    <input name="staff_name" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                    <input name="staff_position" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                    <input name="staff_address" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6  col-sm-12 mb-3">
                                    <label for="" class="form-label">@if($checkNgoTypeForForeginNgoNewOld == 'New')
                                        {{ trans('fd_one_step_three.citizenship')}}
                                        @else
                                        {{ trans('fd_one_step_one.Citizenship')}}

                                        @endif<span class="text-danger">*</span> </label>
                                    <select name="citizenship[]"  class="js-example-basic-multipleo form-control" multiple="multiple">
                                            <option value="">{{ trans('civil.select')}}</option>
                                            @foreach($getCityzenshipData as $allGetCityzenshipData)
                                              @if($checkNgoTypeForForeginNgo == 'Foreign')
                                            <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                            @else
                                        <option value="{{ $allGetCityzenshipData->country_people_bangla }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control" id="form_date">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="" class="form-label">@if($checkNgoTypeForForeginNgoNewOld == 'New')
                                        {{ trans('fd_one_step_three.s_statement')}}
                                        @else
                                        {{ trans('fd_one_step_one.now_salary')}}
                                        @endif <span class="text-danger">*</span> </label>
                                    <input type="text" required name="salary_statement" class="form-control" id="">
                                </div>

                                @if($checkNgoTypeForForeginNgoNewOld == 'New')


                                @else
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                    <input name="staff_mobile"   required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.fd8_data_one')}} <span class="text-danger">*</span> </label>
                                    <input name="staff_email"   required type="email" class="form-control" id="">
                                </div>
                                @endif




                                @if($checkNgoTypeForForeginNgo == 'Foreign' && $checkNgoTypeForForeginNgoNewOld == 'New')
                                <div class="col-lg-12 mb-3">
                                    <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                    <input type="text" required name="now_working_at" class="form-control" id="">
                                </div>
                                @else


                                @endif

                                <div class="col-lg-12 mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id=""
                                              placeholder="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.add')}}</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->


                                @if(count($formOneMemberList) == 0)

                                <div class="mb-3">
                                    <div class="d-flex justify-content-center pt-5">
                                        <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                    </div>
                                    <h3 class="text-center">
                                        {{ trans('fd_one_step_three.noInfo')}}
                                    </h3>
                                    </div>

                                @else
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <tr>
                                            <th>{{ trans('form 8_bn.sl')}}</th>
                                            <th>{{ trans('fd_one_step_three.name')}} & {{ trans('fd_one_step_three.desi')}}</th>
                                            <th>{{ trans('fd_one_step_three.address')}}</th>
                                            <th>@if($checkNgoTypeForForeginNgoNewOld == 'New')
                                                {{ trans('fd_one_step_three.citizenship')}}
                                                @else
                                                {{ trans('fd_one_step_one.Citizenship')}}

                                                @endif </th>
                                            <th>{{ trans('fd_one_step_three.date_of_joining')}}</th>
                                            @if($checkNgoTypeForForeginNgoNewOld == 'New')
                                            <th>{{ trans('fd_one_step_three.s_statement')}} </th>
                                            @else
                                            <th>{{ trans('fd_one_step_one.now_salary')}}</th>
                                            @endif
                                            @if($checkNgoTypeForForeginNgoNewOld == 'New')


                                            @else
                                            <th>{{ trans('fd_one_step_one.Mobile_Number')}}</th>
                                            <th>{{ trans('fd_one_step_one.fd8_data_one')}}</th>
                                            @endif


                                            @if($checkNgoTypeForForeginNgo == 'Foreign' && $checkNgoTypeForForeginNgoNewOld == 'New')
                                            <th>{{ trans('news.nn')}}  </th>
                                            @endif

                                            <th>{{ trans('fd_one_step_three.detail')}}</th>
                                            <th>{{ trans('form 8_bn.action')}}</th>
                                        </tr>
                                        @foreach($formOneMemberList as $key=>$allFormOneMemberList)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><b>{{ $allFormOneMemberList->name }}</b> <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                                {{ $allFormOneMemberList->position }}
                                            </td>
                                            <td>{{ $allFormOneMemberList->address }}</td>
                                            <td>@if($allFormOneMemberList->citizenship == 0)


                                                @else

                                                {{ $allFormOneMemberList->citizenship }}

                                                @endif</td>
                                            <td>{{ date("d-m-Y", strtotime($allFormOneMemberList->date_of_join)) }}</td>
                                            <td>{{ $allFormOneMemberList->salary_statement }}</td>

                                            @if($checkNgoTypeForForeginNgoNewOld == 'New')


                                            @else
                                            <td>{{ $allFormOneMemberList->mobile }}</td>
                                            <td>{{ $allFormOneMemberList->email }}</td>
                                            @endif


                                            @if($checkNgoTypeForForeginNgo == 'Foreign' && $checkNgoTypeForForeginNgoNewOld == 'New')
                                            <td>{{ $allFormOneMemberList->now_working_at }}</td>
                                            @endif


                                            <td>{{ $allFormOneMemberList->other_occupation }}</td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">


                                                    <a href="{{ route('singleStaffDetailsInformationEdit',$allFormOneMemberList->id) }}" type="button" class="btn btn-sm btn-primary" ><i class="bi bi-pencil-fill"></i></a>



                                                    <button type="button" onclick="deleteTag({{ $allFormOneMemberList->id}})" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $allFormOneMemberList->id }}" action="{{ route('singleStaffDetailsInformationDelete',$allFormOneMemberList->id) }}" method="POST" style="display: none;">

                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>



                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </table>

    </div>
                                @endif

                        </div>


                    <div class="buttons d-flex justify-content-end mt-4">
                    <a href="{{ route('fieldOfProposedActivities') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>

<?php
$countUser = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allFormOneData->id)->count();
?>

@if($countUser >= 2 )


<form action="{{ route('allStaffDetailsInformationUpdate') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
    @csrf
    <input type="hidden" class="form-control" value="{{ $allFormOneData->id }}" name="id"  id="">
<button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_three" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
<button class="btn btn-custom next_button" name="submit_value" value="next_step_from_three" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>

</form>
@else


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
            '<input type="text" name=""  class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name=""  class="form-control" />' +
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
