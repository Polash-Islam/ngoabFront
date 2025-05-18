@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_one.Particulars_of_Organisation')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>



<style>
    img {
        display: block;
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
                        <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
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
<div class="main active">


    <div class="fd01_tablist">
        <div class="fd01_tab fd01_checked"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
    </div>


    <div class="text">
        <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}} </h2>
        {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
    </div>

    <div class="mt-3">

        {{-- <div class="mb-3">
            <label for="" class="form-label">Registration Number (নিবন্ধন নম্বর)</label>
            <input required="" name="registration_number" value="{{ Session::get('registration_number') }}" type="text" class="form-control" id="">
        </div> --}}


        <?php

        $query_to_get_data = DB::table('countries')->where('id','!=',18)->orderBy('id','desc')->get();


        $get_cityzenship_data = DB::table('countries')->whereNotNull('country_people_english')
        ->whereNotNull('country_people_bangla')->orderBy('id','desc')->get();

        $get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

        $mainNgoTypeRenew = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');

        $registrationNumberForOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');
                                        ?>




            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_Name_Organization_address')}} <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->organization_name }}" name="organization_name" data-parsley-required  id="">

                <input type="hidden" class="form-control" value="{{ $get_all_data_1->id }}" name="id"  id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}} <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->organization_address }}" name="organization_address" data-parsley-required  id="">
            </div>


            @if($mainNgoTypeRenew == 'Old')

            <div class="mb-3">
                <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $registrationNumberForOld }}" name="reg_no_get_from_admin" data-parsley-required  id="">
            </div>
            @else
            <div class="mb-3">
                <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->registration_number }}" name="reg_no_get_from_admin" data-parsley-required  id="">
            </div>
@endif


            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} <span class="text-danger">*</span>
                    </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->address_of_head_office }}" name="address_of_head_office" data-parsley-required  id="">
            </div>








                                            <div class="mb-3">
                                                <label for="" class="form-label">টেলিফোন নম্বর <span class="text-danger">*</span> </label>
                                                <input type="text" data-parsley-required value="{{ $get_all_data_1->org_phone }}"  name="phone_new" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">মোবাইল নম্বর <span class="text-danger">*</span> </label>
                                                <input type="text" value="{{ $get_all_data_1->org_mobile }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                type = "number"
                                                maxlength = "11" minlength="11" data-parsley-required  name="mobile_new" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">ইমেইল এড্রেস <span class="text-danger">*</span> </label>
                                                <input type="email" value="{{ $get_all_data_1->org_email }}" data-parsley-required  name="email_new" class="form-control" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for=""  class="form-label">ওয়েবসাইট <span class="text-danger">*</span> </label>
                                                <input type="text" data-parsley-required value="{{ $get_all_data_1->web_site_name }}"  name="web_site_name" class="form-control" id="">
                                            </div>

            <div class="mb-3">
                <h5 class="form_middle_text">
                    {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                </h5>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.name')}} <span class="text-danger">*</span> </label>
                <input type="text" data-parsley-required readonly name="name_of_head_in_bd" value="{{ $get_all_data_1->name_of_head_in_bd }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}} <span class="text-danger">*</span> </label>
                <div class="mt-2 mb-2">

@if($get_country_type == 'Foreign')
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="Part Time" {{ 'Part Time' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="Full Time" {{  'Full Time' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                    </div>
                    @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="খণ্ডকালীন" {{ 'খণ্ডকালীন' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="পূর্ণকালীন" {{  'পূর্ণকালীন' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                    </div>

                    @endif


                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}} <span class="text-danger">*</span> </label>
                <input type="text" readonly data-parsley-required name="address" value="{{ $get_all_data_1->address }}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.nn')}} <span class="text-danger">*</span> </label>
                <input type="text"  data-parsley-required name="nationality" value="{{ $get_all_data_1->nationality }}" class="form-control" id="">
            </div>






            <div class="mb-3">
                <label for="" class="form-label">টেলিফোন নম্বর<span class="text-danger">*</span> </label>
                <input type="text"  data-parsley-required name="mobile" value="{{ $get_all_data_1->tele_phone_number }}"  class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number"
                maxlength = "11" readonly data-parsley-required minlength="11" name="phone" value="{{ $get_all_data_1->phone }}"  class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                <input type="text" readonly data-parsley-required name="email" value="{{ $get_all_data_1->email }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}} <span class="text-danger">*</span> </label>

                    <?php
 $convert_new_ass_cat  = explode(",",$get_all_data_1->citizenship);
//dd($convert_new_ass_cat);

$ngoType =  DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
 ->value('ngo_type');

                    ?>






                <select   class="js-example-basic-multiple form-control"  name="citizenship[]"
                multiple="multiple" required>

                @foreach($get_cityzenship_data as $all_get_cityzenship_data)
                @if($ngoType == 'Foreign')
                <option value="{{ $all_get_cityzenship_data->country_people_english }}" {{ (in_array($all_get_cityzenship_data->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_english }}</option>

                @else
                <option value="{{ $all_get_cityzenship_data->country_people_bangla }}" {{ (in_array($all_get_cityzenship_data->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_bangla }}</option>
            @endif
            @endforeach

        </select>

            </div>
            {{-- <div class="mb-3">
                                    <label for="" class="form-label">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                                    <input type="file" name="foregin_pdf" data-parsley-required accept=".pdf" class="form-control" id="foregin_pdf"/>
                                    <p id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>



                                <div class="mb-3">
                                    <label for="" class="form-label">সংস্থার সম্ভাব্য /প্রত্যাশিত বার্ষিক বাজেট<span class="text-danger">*</span> </label>
                                    <input type="text" name="yearly_budget" value="{{ $get_all_data_1->annual_budget }}" data-parsley-required class="form-control" id="">
                                </div>


                          <div class="mb-3">
                                    <label for="" class="form-label">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                                    <input type="file" name="yearly_budget_file" data-parsley-required accept=".pdf" class="form-control" id="annual_budget_file">
                                    <p id="annual_budget_file_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                </div> --}}

                                <div class="mb-3">
                                    <h5 class="form_middle_text">
                                        সংস্থা প্রধানের তথ্যাদি
                                    </h5>
                                </div>

                                @if($mainNgoTypeRenew == 'Old')
                                <!--new code for ngo-->
                                <div class="mb-3">
                                <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                     <input type="text" data-parsley-required  name="chief_name" value=""  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                    <input type="text" data-parsley-required value=""  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                                </div>



                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                <br>
                                        <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                <br>
                                    <input type="hidden"  name="image_base64">
                                    <div class="croppedInput mt-2">

                                    </div>
                                    <!-- new code for image cropper start --->
                                    @include('front.signature_modal.sign_main_modal')
                                    <!-- new code for image cropper end -->

                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                     <br>
                                    <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                    <input type="hidden"  name="image_seal_base64">
                                    <div class="croppedInputss mt-2">

                                    </div>
                                    <!-- new code for image cropper start --->
                                    @include('front.signature_modal.seal_main_modal')
                                    <!-- new code for image cropper end -->
                                </div>
                                <!-- end new code -->

                                @else

 <!--new code for ngo-->
 <div class="mb-3">
    <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
         <input type="text" data-parsley-required  name="chief_name"   class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
        <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
    </div>



    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
<br>
            <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
<br>
        <input type="hidden"  name="image_base64">
        <div class="croppedInput mt-2">

        </div>
        <!-- new code for image cropper start --->
        @include('front.signature_modal.sign_main_modal')
        <!-- new code for image cropper end -->

    </div>


    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
         <br>
        <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

        <input type="hidden"  name="image_seal_base64">
        <div class="croppedInputss mt-2">

        </div>
        <!-- new code for image cropper start --->
        @include('front.signature_modal.seal_main_modal')
        <!-- new code for image cropper end -->
    </div>
    <!-- end new code -->

                                @endif

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
<form action="{{ route('updateRenewInformationList') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf
<div class="main active">

    <div class="fd01_tablist">
        <div class="fd01_tab fd01_checked"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
        <div class="fd01_tab"></div>
    </div>
    <div class="text">
        <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}} </h2>
        {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
    </div>

    <div class="mt-3">

        {{-- <div class="mb-3">
            <label for="" class="form-label">Registration Number (নিবন্ধন নম্বর)</label>
            <input required="" name="registration_number" value="{{ Session::get('registration_number') }}" type="text" class="form-control" id="">
        </div> --}}

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_Name_Organization_address')}} <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->organization_name }}" name="organization_name" data-parsley-required  id="">

                <input type="hidden" class="form-control" value="{{ $get_all_data_new_first->id }}" name="id"  id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}} <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->organization_address }}" name="organization_address" data-parsley-required  id="">
            </div>



            @if($mainNgoTypeRenew == 'Old')

            <div class="mb-3">
                <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $registrationNumberForOld }}" name="reg_no_get_from_admin" data-parsley-required  id="">
            </div>
            @else
            <div class="mb-3">
                <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->registration_number }}" name="reg_no_get_from_admin" data-parsley-required  id="">
            </div>
@endif



            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} <span class="text-danger">*</span>
                    </label>
                <input type="text" class="form-control" readonly value="{{ $get_all_data_1->address_of_head_office }}" name="address_of_head_office" data-parsley-required  id="">
            </div>



            <?php

            $query_to_get_data = DB::table('countries')->where('id','!=',18)->orderBy('id','desc')->get();


            $get_cityzenship_data = DB::table('countries')->whereNotNull('country_people_english')
            ->whereNotNull('country_people_bangla')->orderBy('id','desc')->get();

            $get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                            ?>




                                            <div class="mb-3">
                                                <label for="" class="form-label">টেলিফোন নম্বর <span class="text-danger">*</span> </label>
                                                <input type="text" data-parsley-required value="{{ $get_all_data_new_first->phone_new }}"  name="phone_new" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">মোবাইল নম্বর <span class="text-danger">*</span> </label>
                                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                type = "number"
                                                maxlength = "11" minlength="11" data-parsley-required value="{{ $get_all_data_new_first->mobile_new }}"  name="mobile_new" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">ইমেইল এড্রেস <span class="text-danger">*</span> </label>
                                                <input type="email" data-parsley-required value="{{ $get_all_data_new_first->email_new }}"  name="email_new" class="form-control" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for=""  class="form-label">ওয়েবসাইট <span class="text-danger">*</span> </label>
                                                <input type="text" data-parsley-required value="{{ $get_all_data_new_first->web_site_name }}"  name="web_site_name" class="form-control" id="">
                                            </div>

            <div class="mb-3">
                <h5 class="form_middle_text">
                    {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                </h5>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.name')}} <span class="text-danger">*</span> </label>
                <input type="text" data-parsley-required readonly name="name_of_head_in_bd" value="{{ $get_all_data_1->name_of_head_in_bd }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}} <span class="text-danger">*</span> </label>
                <div class="mt-2 mb-2">


                    @if($get_country_type == 'Foreign')
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="Part Time" {{ 'Part Time' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="Full Time" {{  'Full Time' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                    </div>
                    @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="খণ্ডকালীন" {{ 'খণ্ডকালীন' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="পূর্ণকালীন" {{  'পূর্ণকালীন' == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                    </div>

                    @endif


                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}} <span class="text-danger">*</span> </label>
                <input type="text" readonly data-parsley-required name="address" value="{{ $get_all_data_1->address }}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.nn')}} <span class="text-danger">*</span> </label>
                <input type="text"  data-parsley-required name="nationality" value="{{ $get_all_data_new_first->nationality }}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">টেলিফোন নম্বর<span class="text-danger">*</span> </label>
                <input type="text"  data-parsley-required name="mobile" value="{{ $get_all_data_new_first->mobile }}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number"
                maxlength = "11" readonly data-parsley-required minlength="11" name="phone" value="{{ $get_all_data_1->phone }}"  class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                <input type="text" readonly data-parsley-required name="email" value="{{ $get_all_data_1->email }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}} <span class="text-danger">*</span> </label>

                    <?php
 $convert_new_ass_cat  = explode(",",$get_all_data_1->citizenship);
$ngoType =  DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
 ->value('ngo_type');
                    ?>






                <select   class="js-example-basic-multiple form-control"  name="citizenship[]"
                multiple="multiple" required>

                @foreach($get_cityzenship_data as $all_get_cityzenship_data)
                @if($ngoType == 'Foreign')
                <option value="{{ $all_get_cityzenship_data->country_people_english }}" {{ (in_array($all_get_cityzenship_data->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_english }}</option>

                @else
                <option value="{{ $all_get_cityzenship_data->country_people_bangla }}" {{ (in_array($all_get_cityzenship_data->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_bangla }}</option>
            @endif
            @endforeach

        </select>

            </div>

            {{-- @if(empty($get_all_data_new_first->foregin_pdf))

            <div class="mb-3">
                <label for="" class="form-label">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
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
    <label for="" class="form-label">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
    <input type="file" name="foregin_pdf"  accept=".pdf" class="form-control" id="foregin_pdf"/>
    <p id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></p>
</div>
<b>{{ $filename.'.'.$extension }}</b>
        @endif


        <div class="mb-3">
            <label for="" class="form-label">সংস্থার সম্ভাব্য /প্রত্যাশিত বার্ষিক বাজেট<span class="text-danger">*</span> </label>
            <input type="text" name="yearly_budget" value="{{ $get_all_data_1->annual_budget }}" data-parsley-required class="form-control" id="">
        </div>
        @if(empty($get_all_data_new_first->yearly_budget_file))

        <div class="mb-3">
            <label for="" class="form-label">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span> </label>
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
<label for="" class="form-label">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ) <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span> </label>
<input type="file" name="yearly_budget_file"  accept=".pdf" class="form-control" id="annual_budget_file">
<p id="annual_budget_file_text" class="text-danger mt-2" style="font-size:12px;"></p>
</div>
<b>{{ $filename.'.'.$extension }}</b>
    @endif --}}

    <div class="mb-3">
        <h5 class="form_middle_text">
            সংস্থা প্রধানের তথ্যাদি 
        </h5>
    </div>

    @if($mainNgoTypeRenew == 'Old')
    <!--new code for ngo-->
    <div class="mb-3">
    <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
         <input type="text" data-parsley-required  name="chief_name" value=""  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
        <input type="text" data-parsley-required value=""  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
    </div>



    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
<br>
            <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
<br>
        <input type="hidden"  name="image_base64">
        <div class="croppedInput mt-2">

        </div>
        <!-- new code for image cropper start --->
        @include('front.signature_modal.sign_main_modal')
        <!-- new code for image cropper end -->

    </div>


    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
         <br>
        <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

        <input type="hidden"  name="image_seal_base64">
        <div class="croppedInputss mt-2">

        </div>
        <!-- new code for image cropper start --->
        @include('front.signature_modal.seal_main_modal')
        <!-- new code for image cropper end -->
    </div>
    <!-- end new code -->

    @else

<!--new code for ngo-->
<div class="mb-3">
<label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
<input type="text"   name="chief_name" value="{{ $get_all_data_new_first->chief_name }}"   class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
</div>

<div class="mb-3">
<label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
<input type="text"   name="chief_desi" value="{{ $get_all_data_new_first->chief_desi }}" class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
</div>



<div class="mb-3">
    <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
<br>
        <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
<br>
    <input type="hidden"  name="image_base64">
    <div class="croppedInput mt-2">
    <img src="{{asset('/')}}{{ $get_all_data_new_first->digital_signature }}" style="width: 200px;" class="show-image">
    </div>
    <!-- new code for image cropper start --->
    @include('front.signature_modal.sign_main_modal')
    <!-- new code for image cropper end -->

</div>


<div class="mb-3">
    <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
     <br>
    <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

    <input type="hidden"  name="image_seal_base64">
    <div class="croppedInputss mt-2">
    <img src="{{asset('/')}}{{ $get_all_data_new_first->digital_seal }}" style="width: 200px;" class="show_image_seal">
    </div>
    <!-- new code for image cropper start --->
    @include('front.signature_modal.seal_main_modal')
    <!-- new code for image cropper end -->
</div>

    @endif







    </div>
    <div class="buttons d-flex justify-content-end mt-4">

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
