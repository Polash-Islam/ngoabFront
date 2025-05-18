@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}}  | {{ trans('header.ngo_ab')}}
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
                            {{ trans('ngo_member.ngo_member')}}
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('ngoMember.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="name"  class="form-control" id="">
                                </div>
                               <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.designation')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="desi" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.date_of_birth')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="dob" class="form-control" id="datepicker">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.nid_no')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.mobile_no')}} <span class="text-danger">*</span> </label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" data-parsley-required minlength="11"  name="phone" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.fathers_name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.present_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"  data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.permanent_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" data-parsley-required  name="permanent_address"  id="exampleFormControlTextarea1"
                                              rows="2"/>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name_of_spouse')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration"
                                           >{{ trans('form 8_bn.add')}}
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
