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
                            <form method="post" action="{{ route('formEightNgoCommitteMember.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf

                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="name"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.designation')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="desi" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="dob" class="form-control" id="#datepicker">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}} <span class="text-danger">*</span> :</label>
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" data-parsley-required name="phone" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.present_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" data-parsley-required name="permanent_address"  id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" name="edu_quali" data-parsley-required class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.profession')}} <span class="text-danger">*</span> :</label>
                                    <select class="form-control" data-parsley-required name="profession"  id="">
                                        <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous')}}">{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                        <option value="{{ trans('form 8_bn.private_service')}}">{{ trans('form 8_bn.private_service')}}</option>
                                        <option value="{{ trans('form 8_bn.self_service')}}">{{ trans('form 8_bn.self_service')}}</option>
                                    </select>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}} <span class="text-danger">*</span> :</label>
                                    <input type="text" data-parsley-required name="job_des" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}} <span class="text-danger">*</span> :</label>
                                    <select class="form-control" data-parsley-required name="service_status" id="">
                                        <option value="{{ trans('form 8_bn.yes')}}">{{ trans('form 8_bn.yes')}}</option>
                                        <option value="{{ trans('form 8_bn.no')}}">{{ trans('form 8_bn.no')}}</option>
                                    </select>
                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.add')}}
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
