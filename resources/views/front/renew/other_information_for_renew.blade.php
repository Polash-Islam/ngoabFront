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
                            <li>{{ trans('fd_one_step_one.fd_8_form')}}</li>
                            {{-- <li class="active">{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                            <li class="active">{{ trans('fd_one_step_four.o_info')}}</li>
                            {{-- <li >{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                            <li >{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                            <li  class="active">{{ trans('fd_one_step_four.o_info')}}</li> --}}
                        </ul>

                    </div>
                    <div class="right-side">

                        <?php

                        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                            ->value('ngo_type');
                        ?>

                        @if($checkNgoTypeForForeginNgo == 'Foreign')
                            <form action="{{ route('otherInformationForRenewGet') }}" method="post"
                                  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf

                                <div class="main active">
                                    <div class="text">
                                        <h2> {{ trans('fd_one_step_five.other_information_text') }} </h2>
                                    </div>

                                    <div class="mt-3">

                                        <div class="mb-3">
                                            <label for=""
                                                   class="form-label"> {{ trans('fd_one_step_five.gothontontro_poriborton') }}
                                                <span class="text-danger">*</span> </label>
                                            <div class="mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input organizational_structure"
                                                           data-parsley-checkmin="1" data-parsley-required type="radio"
                                                           name="organizational_structure_type" id=""
                                                           value="Yes">
                                                    <label class="form-check-label"
                                                           for="inlineRadio1">{{ trans('fd_one_step_five.yes') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input organizational_structure"
                                                           data-parsley-checkmin="1" data-parsley-required type="radio"
                                                           name="organizational_structure_type" id=""
                                                           value="No">
                                                    <label class="form-check-label"
                                                           for="inlineRadio2">{{ trans('fd_one_step_five.no') }}</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3" id="mResult">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা<span
                                                    class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(maximum 5 MB)</span></label>
                                            <input class="form-control" name="form_eight_executive_committee_member"
                                                   data-parsley-required accept=".pdf" type="file"
                                                   id="structurePartTwo402">

                                            <p class="text-danger mt-2" style="font-size:12px;"
                                               id="structurePartTwo402_text"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                (নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে
                                                হবে) <span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" name="copy_of_chalan" data-parsley-required
                                                   accept=".pdf" type="file" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                (তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span>
                                            </label>
                                            <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                   id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত
                                                অনুলিপি <span class="text-danger">*</span>

                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ২ এমবি  বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control"
                                                   name="nid_and_image_of_executive_committee_members"
                                                   data-parsley-required accept=".pdf" type="file" id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত
                                                অনুলিপি<span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ১ এমবি  বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="work_procedure_of_organization" accept=".pdf" type="file"
                                                   id="">
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি <span
                                                    class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="registration_renewal_fee" accept=".pdf" type="file" id="">
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি
                                                অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি <span
                                                    class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ১ এমবি  বেশি হওয়া যাবে না</span>
                                            </label>
                                            <input class="form-control" data-parsley-required
                                                   name="approval_of_executive_committee" accept=".pdf" type="file"
                                                   id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                বিগত 10 (দশ) বছরের অডিট রিপোর্ট এবং সংস্থার বার্ষিক প্রতিবেদনের
                                                সত্যায়িত অনুলিপি
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫ এমবি  বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control"
                                                   name="last_ten_years_audit_report_and_annual_report_of_the_company"
                                                   accept=".pdf" type="file" id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কতৃপক্ষের অনুমোদিত নির্বাহী কমিটির
                                                তালিকার সত্যায়িত অনুলিপি <span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="organization_by_laws_or_constitution" accept=".pdf" type="file"
                                                   id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                সর্বশেষ নিবন্ধন /নবায়ন সনদের সত্যায়িত অনুলিপি<span
                                                    class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="attested_copy_of_latest_registration_or_renewal_certificate"
                                                   accept=".pdf" type="file" id="">
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                Right To Information Act - 2009-এর আওতায় ফোকাল Focal Point করত :ব্যুরোকে
                                                অবহিতকরণ পত্রের অনুলিপি <span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ৫০০ কেবি বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="right_to_information_act" accept=".pdf" type="file" id="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান সাধারণ
                                                সদস্য ও নির্বাহী কমিটির তালিকা <span class="text-danger">*</span>
                                                <br><span
                                                    class="text-danger">পিডিএফ এর সাইজ ২ এমবি  বেশি হওয়া যাবে না</span></label>
                                            <input class="form-control" data-parsley-required
                                                   name="committee_members_list" accept=".pdf" type="file" id="">
                                        </div>


                                    </div>

                                    <div class="buttons d-flex justify-content-end mt-4">
                                            <?php

                                            $lastRenewData = DB::table('ngo_renew_infos')
                                                ->where('user_id', Auth::user()->id)
                                                ->orderBy('id', 'desc')->value('id');


                                            ?>
                                        <a href="{{ route('ngoRenewStepFour',base64_encode($lastRenewData)) }}"
                                           class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                        <button class="btn btn-custom submit_button" type="submit">জমা দিন</button>
                                    </div>
                                </div>
                            </form>

                        @else
                            <!--local Ngo-->
                            <form action="{{ route('otherInformationForRenewGet') }}" method="post"
                                  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf

                                <div class="main active">

                                    <div class="mb-3">

                                        <div class="text">
                                            <h2>{{ trans('fd_one_step_five.other_information_text') }} </h2>
                                        </div>

                                        <div class="mt-3">

                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    {{ trans('fd_one_step_five.gothontontro_poriborton') }}
                                                    <span class="text-danger">*</span> </label>
                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input organizational_structure"
                                                               data-parsley-checkmin="1" data-parsley-required
                                                               type="radio" name="organizational_structure_type" id=""
                                                               value="Yes">
                                                        <label class="form-check-label"
                                                               for="inlineRadio1">{{ trans('fd_one_step_five.yes') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input organizational_structure"
                                                               data-parsley-checkmin="1" data-parsley-required
                                                               type="radio" name="organizational_structure_type" id=""
                                                               value="No">
                                                        <label class="form-check-label"
                                                               for="inlineRadio2">{{ trans('fd_one_step_five.no') }}</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3" id="mResult">
                                            </div>

                                            <div class="mt-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.karjonirbahi_comitee_talika') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                    <input class="form-control"
                                                           name="form_eight_executive_committee_member"
                                                           data-parsley-required accept=".pdf" type="file"
                                                           id="structurePartTwo402">

                                                    <p class="text-danger mt-2" style="font-size:12px;"
                                                       id="structurePartTwo402_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.nirbahi_comitee_chobi_text') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                                                    <input class="form-control"
                                                           name="nid_and_image_of_executive_committee_members"
                                                           data-parsley-required accept=".pdf" type="file"
                                                           id="renewFileOld3">
                                                    <p id="renewFileOld3_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">

                                                        {{ trans('fd_one_step_five.prathomik_nibondhon_text') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="work_procedure_of_organization" accept=".pdf"
                                                           type="file" id="renewFileOld4">
                                                    <p id="renewFileOld4_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.nibondhon_fee_joma_text') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="registration_renewal_fee" accept=".pdf" type="file"
                                                           id="renewFileOld5">
                                                    <p id="renewFileOld5_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.uposthit_sadharon_sodosso') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="approval_of_executive_committee" accept=".pdf"
                                                           type="file" id="renewFileOld6">
                                                    <p id="renewFileOld6_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.onulipi1') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger">(maximum 5 MB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="constitution_extra" accept=".pdf" type="file"
                                                           id="structurePartTwo800">

                                                    <p class="text-danger mt-2" style="font-size:12px;"
                                                       id="structurePartTwo800_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.audit_report_of_10_years_text') }}
                                                        <br><span class="text-danger" style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                    <input class="form-control"
                                                           name="last_ten_years_audit_report_and_annual_report_of_the_company"
                                                           accept=".pdf" type="file" id="structurePartTwo400">
                                                    <p class="text-danger mt-2" style="font-size:12px;"
                                                       id="structurePartTwo400_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.barshik_protibedon_of_10_years_text') }}
                                                        <br><span class="text-danger" style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                    <input class="form-control" name="last_ten_year_annual_report"
                                                           accept=".pdf" type="file" id="structurePartTwo401">

                                                    <p class="text-danger mt-2" style="font-size:12px;"
                                                       id="structurePartTwo401_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.ain_nibondhito') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>
                                                    </label>
                                                    <input class="form-control" data-parsley-required
                                                           name="organization_by_laws_or_constitution" accept=".pdf"
                                                           type="file" id="renewFileOld8">
                                                    <p id="renewFileOld8_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.sorboses_nibondhon') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="attested_copy_of_latest_registration_or_renewal_certificate"
                                                           accept=".pdf" type="file" id="renewFileOld9">
                                                    <p id="renewFileOld9_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.focal_point') }}
                                                        <span
                                                            class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="right_to_information_act" accept=".pdf" type="file"
                                                           id="renewFileOld10">
                                                    <p id="renewFileOld10_text" class="text-danger"
                                                       style="font-size: 12px;"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_five.bortoman_sadharon_sodorso') }}
                                                        <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" data-parsley-required
                                                           name="committee_members_list" accept=".pdf" type="file"
                                                           id="renewFileOld11">
                                                    <p id="renewFileOld11_text" class="text-danger"
                                                       style="font-size: 12px;"></p>

                                                </div>


                                            </div>

                                            <div class="buttons d-flex justify-content-end mt-4">
                                                    <?php

                                                    $lastRenewData = DB::table('ngo_renew_infos')
                                                        ->where('user_id', Auth::user()->id)
                                                        ->orderBy('id', 'desc')->value('id');


                                                    ?>
                                                <a href="{{ route('ngoRenewStepFour',base64_encode($lastRenewData)) }}"
                                                   class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                                <button class="btn btn-custom submit_button"
                                                        type="submit"> {{ trans('fd_one_step_five.next') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <!--end local ngo -->
                        @endif


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
                data: {structureStatus: structureStatus},
                success: function (data) {
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
