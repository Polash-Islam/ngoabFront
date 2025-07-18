@extends('front.master.master')

@section('title')
{{ trans('first_info.all_reg_form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>



<style>
    img {
        /* display: block; */
        max-width: 100%;
    }
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


                                <div class="mb-3">
                                    <h5 class="form_middle_text">
                                        {{ trans('fd_one_step_three.staff_position')}}
                                    </h5>
                                    <h5 class="form_middle_text">
                                        <b class="text-danger">{{ trans('fd_one_step_three.staff_position1')}}</b>
                                    </h5>
                                </div>

@include('flash_message')



                                                        <form method="post" action="{{ route('singleStaffDetailsInformationUpdate',$allFormOneMemberList->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">  {{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                                                <input name="staff_name" value="{{ $allFormOneMemberList->name }}" required type="text" class="form-control" id="">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                                                <input name="staff_position" value="{{ $allFormOneMemberList->position }}" required type="text" class="form-control" id="">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                                                <input name="staff_address" value="{{ $allFormOneMemberList->address }}" required type="text" class="form-control" id="">
                                                            </div>
                                                            @if($mainNgoType == "দেশিও")

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="nid_number" class="form-label">{{ trans('fd_one_step_three.nid_number') }} <span class="text-danger">*</span></label>
                                                                <input type="text" name="nid_number" value="{{ $allFormOneMemberList->nid_number}}" class="form-control" id="nid_number" required>
                                                            </div>
                                                            @else

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_three.passport_number') }}</label>
                                                                <input type="text" name="passport_number" value="{{ $allFormOneMemberList->passport_number}}"class="form-control" id="passport_number" required>
                                                            </div>
                                                            @endif



                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="dob" class="form-label">{{ trans('fd_one_step_three.dob') }} <span class="text-danger">*</span></label>
                                                                <input type="date" name="dob" value="{{ $allFormOneMemberList->dob}}" class="form-control" id="dob" required>
                                                            </div>
                                                            @php
                                                                $fileName1 = basename($allFormOneMemberList->nid_copy);

                                                                $fileName2 = basename($allFormOneMemberList->passport_attachment);
                                                                $filename3=basename($allFormOneMemberList->passport_photo)

                                                            @endphp
                                                                <p>{{$filename3}}</p>

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="passport_photo" class="form-label">
                                                                    {{ trans('fd_one_step_three.passport_photo') }} <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="file" name="passport_photo" class="form-control" id="passport_photo" accept="image/*" required>

                                                                <small class="form-text text-muted">
                                                                    * Maximum file size: 2MB, Recommended image size: 300 x 300 pixels<br>
                                                                </small>
                                                                @if(!empty($allFormOneMemberList->passport_photo))
                                                                    <small class="text-muted d-block mt-1">
                                                                        Current Photo:
                                                                        <a href="{{ asset('public/' . $allFormOneMemberList->passport_photo) }}" target="_blank">
                                                                            <img src="{{ asset('public/' . $allFormOneMemberList->passport_photo) }}" alt="Passport Photo" style="height: 60px; border-radius: 4px;">
                                                                        </a>
                                                                    </small>
                                                                @endif
                                                            </div>

                                                            @if($mainNgoType == "দেশিও")
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="nid_copy" class="form-label">
                                                                    {{ trans('fd_one_step_three.nid_copy') }} <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="file" name="nid_copy" class="form-control" id="nid_copy" accept="application/pdf" required>
                                                                @if($allFormOneMemberList->nid_copy)
                                                                    <small class="text-muted d-block mt-1">
                                                                        Current file:
                                                                        <a href="{{ asset('public/' . $allFormOneMemberList->nid_copy) }}" target="_blank">
                                                                            {{ basename($allFormOneMemberList->nid_copy) }}
                                                                        </a>
                                                                    </small>
                                                                @endif
                                                            </div>
                                                            @else

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="passport_attachment" class="form-label">
                                                                    {{ trans('fd_one_step_three.passport_attachment') }}
                                                                </label>
                                                                <input type="file" name="passport_attachment" class="form-control" id="passport_attachment" accept="application/pdf" required>
                                                                @if($allFormOneMemberList->passport_attachment)
                                                                    <small class="text-muted d-block mt-1">
                                                                        Current file:
                                                                        <a href="{{ asset('public/' . $allFormOneMemberList->passport_attachment) }}" target="_blank">
                                                                            {{ basename($allFormOneMemberList->passport_attachment) }}
                                                                        </a>
                                                                    </small>
                                                                @endif
                                                            </div>
                                                            @endif





                                                            <?php
                                                            $convert_new_ass_cat  = explode(",",$allFormOneMemberList->citizenship);

                                                                               ?>

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">@if($checkNgoTypeForForeginNgoNewOld == 'New')
                                                                    {{ trans('fd_one_step_three.citizenship')}}
                                                                    @else
                                                                    {{ trans('fd_one_step_one.Citizenship')}}

                                                                    @endif <span class="text-danger">*</span> </label>
                                                                <select name="citizenship[]"  class="js-example-basic-multiple form-control"
                                                                        >
                                                                        <option value="">{{ trans('civil.select')}}</option>

                                                                    @foreach($getCityzenshipData as $allGetCityzenshipData)
                                                                    @if($checkNgoTypeForForeginNgo == 'Foreign')
                                                                        <option value="{{ $allGetCityzenshipData->country_people_english }}"  {{ (in_array($allGetCityzenshipData->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>>{{ $allGetCityzenshipData->country_people_english }}</option>
                                                                        @else
                                                                    <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ (in_array($allGetCityzenshipData->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                                                    @endif
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                                                <input name="date_of_join"  value="{{ date("d-m-Y", strtotime($allFormOneMemberList->date_of_join))  }}" required type="text" class="form-control" id="form_date">
                                                            </div>

                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">@if($checkNgoTypeForForeginNgoNewOld == 'New')
                                                                    {{ trans('fd_one_step_three.s_statement')}}
                                                                    @else
                                                                    {{ trans('fd_one_step_one.now_salary')}}
                                                                    @endif <span class="text-danger">*</span> </label>
                                                                <input type="text" required value="{{ $allFormOneMemberList->salary_statement }}" name="salary_statement" class="form-control" id="">
                                                            </div>
                                                            @if($checkNgoTypeForForeginNgoNewOld == 'New')


                                                            @else
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                                                <input name="staff_mobile" value="{{ $allFormOneMemberList->mobile }}"   required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                type = "number"
                                                                maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_one.fd8_data_one')}} <span class="text-danger">*</span> </label>
                                                                <input name="staff_email" value="{{ $allFormOneMemberList->email }}"   required type="email" class="form-control" id="">
                                                            </div>
                                                            @endif






                                                            @if($checkNgoTypeForForeginNgo == 'Foreign' && $checkNgoTypeForForeginNgoNewOld == 'New')
                                                            <div class="col-lg-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('news.nn')}}<span class="text-danger">*</span> </label>
                                                                <input type="text" required name="now_working_at" value="{{ $allFormOneMemberList->now_working_at }}" class="form-control" id="">
                                                            </div>
                                                            @else


                                                            @endif


                                                            <div class="col-lg-12 mb-3">
                                                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>

                                                                <input type="text" name="other_occupation" value="{{ $allFormOneMemberList->other_occupation }}" required class="form-control" id=""
                                                                placeholder="Detail Description (বিস্তারিত বিবরণ)">


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
</section>
@endsection
