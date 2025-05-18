@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}} | {{ trans('header.ngo_ab')}}
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
                        <h3>{{ trans('fd_one_step_three.Step_3')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li class="active">{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li>
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">

                    <?php
$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                        $ngoMemberLists = DB::table('ngo_member_lists')->where('fd_one_form_id',$fdOneFormId)->latest()->get();


                        ?>

                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('ngo_member.ngo_member_list')}}</h5>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                    {{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <table class="table table-bordered mt-2 custom_table">
                                    <tr>
                                        <th>{{ trans('form 8_bn.sl')}}</th>
                                        <th>{{ trans('form 8_bn.name')}} & {{ trans('form 8_bn.designation')}}</th>
                                        <th>{{ trans('form 8_bn.date_of_birth')}}</th>
                                        <th>{{ trans('form 8_bn.address')}}</th>

                                        <th>{{ trans('form 8_bn.action')}}</th>
                                    </tr>
                                    @foreach($ngoMemberLists as $key=>$main_all_data_list)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $main_all_data_list->member_name }} <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                            {{ $main_all_data_list->member_designation }}
                                        </td>
                                        <td>
                                            <?php

                                            $newDate12 = date("d-m-Y", strtotime($main_all_data_list->member_dob ));

                                                                                            ?>


@if(session()->get('locale') == 'en')


{{ App\Http\Controllers\NGO\CommonController::englishToBangla($newDate12)}}


@else

    {{ $newDate12 }}
@endif




                                        </td>
                                        <td><span>{{ trans('form 8_bn.present_address')}}:</span>  {{ $main_all_data_list->member_present_address }} <br>
                                            <span>{{ trans('form 8_bn.permanent_address')}}:</span>  {{ $main_all_data_list->member_permanent_address }}
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $main_all_data_list->id}}"><i
                                                            class="bi bi-pencil-fill"></i></button>

                                                            <div class="modal modal-xl fade" id="exampleModal{{ $main_all_data_list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('ngo_member.ngo_member')}}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <form method="post" action="{{ route('ngoMember.update',$main_all_data_list->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.name')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="name" value="{{ $main_all_data_list->member_name }}"   class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.designation')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="desi" value="{{ $main_all_data_list->member_designation }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.date_of_birth')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="dob" value="{{ $main_all_data_list->member_dob }}" class="form-control" id="datepicker">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.nid_no')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="nid_no" value="{{ $main_all_data_list->member_nid_no }}"  class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.mobile_no')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="number" data-parsley-required minlength="11" value="{{ $main_all_data_list->member_mobile }}"  maxlength="11" name="phone" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.fathers_name')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="father_name" value="{{ $main_all_data_list->member_father_name }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.present_address')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" class="form-control"  data-parsley-required name="present_address" value="{{ $main_all_data_list->member_present_address }}" id="exampleFormControlTextarea1"
                                                                                                          rows="2"/>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.permanent_address')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" class="form-control" data-parsley-required value="{{ $main_all_data_list->member_permanent_address }}"  name="permanent_address"  id="exampleFormControlTextarea1"
                                                                                                          rows="2"/>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('ngo_member.name_of_spouse')}} <span class="text-danger">*</span> </label>
                                                                                                <input type="text" data-parsley-required name="name_supouse" class="form-control" value="{{ $main_all_data_list->member_name_supouse }}" id="">
                                                                                            </div>

                                                                                        </div>
                                                                                        <button type="submit" class="btn btn-registration"
                                                                                        >{{ trans('form 8_bn.update')}}
                                                                                 </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i></button>

                                                            <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('ngoMember.destroy',$main_all_data_list->id) }}" method="POST" style="display: none;">

                                                                @csrf
@method('DELETE')
                                                            </form>


                                                <button id="member_id{{ $main_all_data_list->id }}" class="btn btn-success btn-sm" type="button"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasWithBothOptions"
                                                        aria-controls="offcanvasWithBothOptions"><i
                                                            class="bi bi-eye-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <div class="buttons d-flex justify-content-end mt-4">
                                <a href="{{ route('formEightNgoCommitteMember.index') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_member_list" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>

                                @if(empty($ngoMemberLists))

                                <button class="btn btn-custom submit_button" name="submit_value" value="form_eight_complete" type="button">{{ trans('fd_one_step_one.Next_Step')}}</button>
                                @else
                                <a class="btn btn-custom submit_button" href="{{ route('ngoMemberFinalUpdate') }}">{{ trans('fd_one_step_one.Next_Step')}}</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('ngo_member.ngo_member')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoMember.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="name"  class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.designation')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="desi" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.date_of_birth')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="dob" class="form-control" id="datepicker1">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.nid_no')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.mobile_no')}} <span class="text-danger">*</span> </label>
                                    <input type="number" data-parsley-required minlength="11" maxlength="11" name="phone" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.fathers_name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.present_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"  data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.permanent_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" data-parsley-required  name="permanent_address"  id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name_of_spouse')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-registration"
                            >{{ trans('form 8_bn.add')}}
                     </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class=" offcanvas offcanvas-end" style="width:40vw !important" data-bs-scroll="true" tabindex="-1"
     id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ trans('form 8_bn.personal_info')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="committee_profile" id="main_content_table">

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('ngoMemberView') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
@endsection
