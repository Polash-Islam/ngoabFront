<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        <li class="active">{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li>
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('form 8_bn.list')}}</h5>
                           @include('flash_message')
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                    {{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </div>

                        <?php
                        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                        $formEightData = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->latest()->get();

                        $fromDateTo = DB::table('form_eights')
                        ->where('fd_one_form_id',$fdOneFormId)->value('form_date');

                        if(empty($fromDateTo)){

$newDate1 = date("d-m-Y");
$newDate2 = date("d-m-Y");
$to_total_year = '';
}else{



$from_date_to = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('form_date');

$newDate1 = date("d-m-Y", strtotime($from_date_to));



$to_date_to = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('to_date');

// $newDate2 = \Carbon\Carbon::createFromFormat('d/m/Y', $to_date_to)
// ->format('Y-m-d');;
$newDate2 = date("d-m-Y", strtotime($to_date_to));
//dd($newDate2);
$to_total_year = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('total_year');
}



                        ?>
                        @include('translate')
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.from')}}</label>
                                                    <input type="text" value="{{ $newDate1 }}" data-parsley-required class="form-control" name="form_date" id="form_date">
                                                </div>
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.to')}}</label>
                                                    <input type="text" value="{{ $newDate2 }}"  data-parsley-required class="form-control" name="to_date" id="to_date">
                                                </div>
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.total')}}</label>
                                                    <input type="text" value="{{ $to_total_year }}"  class="form-control" name="total_year" id="total_year">
                                                    <small id="view_text2"></small>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <table class="table table-bordered mt-4 custom_table">
                                    <tr>
                                        <th>{{ trans('form 8_bn.sl')}}</th>
                                        <th>{{ trans('form 8_bn.name')}} & {{ trans('form 8_bn.designation')}}</th>
                                        <th>{{ trans('form 8_bn.date_of_birth')}}</th>
                                        <th>{{ trans('form 8_bn.address')}}</th>

                                        <th>{{ trans('form 8_bn.action')}}</th>
                                    </tr>
                                   @foreach($formEightData as $key=>$main_all_data_list)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $main_all_data_list->name }} <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                            {{ $main_all_data_list->desi }}
                                        </td>
                                        <td>

                                            <?php

$newDate12 = date("d-m-Y", strtotime($main_all_data_list->dob ));

                                                ?>

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))


{{ App\Http\Controllers\NGO\CommonController::englishToBangla($newDate12)}}


@else

    {{ $newDate12 }}
@endif

                                        </td>
                                        <td><span>{{ trans('form 8_bn.present_address')}}:</span>  {{ $main_all_data_list->present_address }} <br>
                                            <span>{{ trans('form 8_bn.permanent_address')}}:</span>  {{ $main_all_data_list->permanent_address }}
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">


                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $main_all_data_list->id }}"><i
                                                            class="bi bi-pencil-fill"></i></button>

                                                            <div class="modal modal-xl fade" id="exampleModal{{ $main_all_data_list->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"> {{ trans('form 8_bn.ngo_committee_member_registration')}}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <form method="post" action="{{ route('formEightNgoCommitteMember.update',$main_all_data_list->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                                                                        @csrf
                                                        @method('PUT')
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.name')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="name" value="{{ $main_all_data_list->name }}"  class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.designation')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="desi" value="{{ $main_all_data_list->desi }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="dob" value="{{ $main_all_data_list->dob }}" class="form-control" id="datepicker1">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="nid_no" value="{{ $main_all_data_list->nid_no }}"  class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}} <span class="text-danger">*</span> :</label>
                                                                                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                                                type = "number"
                                                                                                maxlength = "11" minlength="11" data-parsley-required name="phone" value="{{ $main_all_data_list->phone }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="father_name" class="form-control" value="{{ $main_all_data_list->father_name }}" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.present_address')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" class="form-control" data-parsley-required name="present_address" value="{{ $main_all_data_list->present_address }}" id="exampleFormControlTextarea1"
                                                                                                          rows="2"/>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" class="form-control" data-parsley-required name="permanent_address"  value=" {{ $main_all_data_list->permanent_address }}" id="exampleFormControlTextarea1"
                                                                                                          rows="2"/>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="name_supouse"value="{{ $main_all_data_list->name_supouse }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" name="edu_quali" value="{{ $main_all_data_list->edu_quali }}" data-parsley-required class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.profession')}} <span class="text-danger">*</span> :</label>
                                                                                                <select class="form-control" data-parsley-required name="profession"  id="">
                                                                                                    <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous') }}" {{ $main_all_data_list->profession == trans('form 8_bn.govt_semi_govt_autonomous') ? 'selected':'' }}>{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                        <option value="{{ trans('form 8_bn.private_service') }}" {{ $main_all_data_list->profession == trans('form 8_bn.private_service') ? 'selected':'' }}>{{ trans('form 8_bn.private_service')}}</option>
                                        <option value="{{ trans('form 8_bn.self_service')}}"{{ $main_all_data_list->profession == trans('form 8_bn.self_service') ? 'selected':'' }}>{{ trans('form 8_bn.self_service')}}</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}} <span class="text-danger">*</span> :</label>
                                                                                                <input type="text" data-parsley-required name="job_des" value="{{ $main_all_data_list->job_des }}" class="form-control" id="">
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                                                                <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}} <span class="text-danger">*</span> :</label>
                                                                                                <select class="form-control" data-parsley-required name="service_status" id="">
                                                                                                    <option value="{{ trans('form 8_bn.yes') }}" {{ $main_all_data_list->service_status == trans('form 8_bn.yes') ? 'selected':'' }}>{{ trans('form 8_bn.yes')}}</option>
                                                                                                    <option value="{{ trans('form 8_bn.no') }}" {{ $main_all_data_list->service_status == trans('form 8_bn.no') ? 'selected':'' }}>{{ trans('form 8_bn.no')}}</option>
                                                                                                </select>
                                                                                            </div>

                                                                                        </div>
                                                                                        <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>



                                                <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i></button>

                                                            <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('formEightNgoCommitteMember.destroy',$main_all_data_list->id) }}" method="POST" style="display: none;">

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
                        @if(Route::is('formEightNgoCommitteeMemberViewFormEdit') )
                        <div class="buttons d-flex justify-content-end mt-4">
                        {{-- <a href="{{ route('ngoAllRegistrationForm') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a> --}}

                        <button class="btn btn-custom submit_button" name="submit_value" value="form_eight_complete" type="button">আপডেট করুন </button>

                        </div>
                        @else

                        <div class="buttons d-flex justify-content-end mt-4">
                            <a href="{{ route('othersInformation') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                            <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_form_eight" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                            @if(count($formEightData) == 0)


  @if(count($formEightData) >= 2)

                           <button class="btn btn-custom submit_button" name="submit_value" value="form_eight_complete" type="button">{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @else
                            <button class="btn btn-custom submit_button"  type="button" disabled>{{ trans('fd_one_step_one.Next_Step')}}</button>

@endif
                            @else
                            @if(count($formEightData) >= 2)

                           <button class="btn btn-custom submit_button" name="submit_value" value="form_eight_complete" type="button">{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @else
  <button class="btn btn-custom submit_button"  type="button" disabled>{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @endif
                            @endif
                        </div>
                        @endif
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
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('form 8_bn.ngo_committee_member_registration')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('formEightNgoCommitteMember.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="name"  class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.designation')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="desi" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="dob" class="form-control" id="datepicker">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}} <span class="text-danger">*</span> :</label>
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" data-parsley-required name="phone" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.present_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" data-parsley-required name="permanent_address"  id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" name="edu_quali" data-parsley-required class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.profession')}} <span class="text-danger">*</span> :</label>
                                    <select class="form-control" data-parsley-required name="profession"  id="">
                                        <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous')}}">{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                        <option value="{{ trans('form 8_bn.private_service')}}">{{ trans('form 8_bn.private_service')}}</option>
                                        <option value="{{ trans('form 8_bn.self_service')}}">{{ trans('form 8_bn.self_service')}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="job_des" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}} <span class="text-danger">*</span> :</label>
                                    <select class="form-control" data-parsley-required name="service_status" id="">
                                        <option value="{{ trans('form 8_bn.yes')}}">{{ trans('form 8_bn.yes')}}</option>
                                        <option value="{{ trans('form 8_bn.no')}}">{{ trans('form 8_bn.no')}}</option>
                                    </select>
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

@if(Route::is('formEightNgoCommitteeMemberViewFormEdit'))
<script>




    $(".submit_button").click(function () {
//alert(33);
        var to_date = $('#to_date').val();
        var form_date = $('#form_date').val();
        var total_year = $('#total_year').val();
        var finalStep = 2;

if(total_year.length == 0){
    $('#view_text2').html('Calculate Total Year');
    $("#view_text2").css({"color": "red"});
}else{


    $.ajax({
        url: "{{ route('updateDateData') }}",
        method: 'GET',
        data: {finalStep:finalStep,form_date:form_date,to_date:to_date,total_year:total_year},
        success: function(data) {

            $('#view_text2').html('');

            window.location.href = data;

        }
        });

}


    });
</script>

@else

<script>




    $(".submit_button").click(function () {
        //alert(33);
        var to_date = $('#to_date').val();
        var form_date = $('#form_date').val();
        var total_year = $('#total_year').val();
        var finalStep = 1;

if(total_year.length == 0){
    $('#view_text2').html('Calculate Total Year');
    $("#view_text2").css({"color": "red"});
}else{


    $.ajax({
        url: "{{ route('updateDateData') }}",
        method: 'GET',
        data: {finalStep:finalStep,form_date:form_date,to_date:to_date,total_year:total_year},
        success: function(data) {

            $('#view_text2').html('');

            window.location.href = data;

        }
        });

}


    });
</script>
@endif

