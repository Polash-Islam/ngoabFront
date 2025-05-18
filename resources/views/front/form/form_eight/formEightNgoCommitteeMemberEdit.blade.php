@extends('front.master.master')

@section('title')
{{ trans('form 8_bn.list')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')


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
                        <div class="card-header">
                            {{ trans('form 8_bn.ngo_committee_member_registration')}}
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('formEightNgoCommitteMember.update',$all_data_list->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
@method('PUT')
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required type="text" name="name" value="{{ $all_data_list->name }}"  class="form-control" id="">



                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.designation')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required type="text" name="desi" value="{{ $all_data_list->desi }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required type="text" name="dob" value="{{ $all_data_list->dob }}" class="form-control" id="#datepicker">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required type="text" name="nid_no" value="{{ $all_data_list->nid_no }}"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" name="phone" value="{{ $all_data_list->phone }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}} <span class="text-danger">*</span> :</label>
                                    <input data-parsley-required type="text" name="father_name" value="{{ $all_data_list->father_name }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.present_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" value="{{ $all_data_list->present_address }}" data-parsley-required class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"/>



                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text"data-parsley-required class="form-control" name="permanent_address"   id="exampleFormControlTextarea1"
                                              rows="2" value=" {{ $all_data_list->permanent_address }}"/>


                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="name_supouse" value="{{ $all_data_list->name_supouse }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="edu_quali" value="{{ $all_data_list->edu_quali }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.profession')}} <span class="text-danger">*</span> :</label>
                                    <select data-parsley-required class="form-control" name="profession"  id="">
                                        <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous') }}" {{ $all_data_list->profession == trans('form 8_bn.govt_semi_govt_autonomous') ? 'selected':'' }}>{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                        <option value="{{ trans('form 8_bn.private_service') }}" {{ $all_data_list->profession == trans('form 8_bn.private_service') ? 'selected':'' }}>{{ trans('form 8_bn.private_service')}}</option>
                                        <option value="{{ trans('form 8_bn.self_service')}}"{{ $all_data_list->profession == trans('form 8_bn.self_service') ? 'selected':'' }}>{{ trans('form 8_bn.self_service')}}</option>
                                    </select>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="job_des" value="{{ $all_data_list->job_des }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}} <span class="text-danger">*</span> :</label>
                                    <select data-parsley-required class="form-control" name="service_status" id="">
                                        <option value="{{ trans('form 8_bn.yes') }}" {{ $all_data_list->profession == trans('form 8_bn.yes') ? 'selected':'' }}>{{ trans('form 8_bn.yes')}}</option>
                                        <option value="{{ trans('form 8_bn.no') }}" {{ $all_data_list->profession == trans('form 8_bn.no') ? 'selected':'' }}>{{ trans('form 8_bn.no')}}</option>
                                    </select>
                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}
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
<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin

    });
});
</script>
@endsection
