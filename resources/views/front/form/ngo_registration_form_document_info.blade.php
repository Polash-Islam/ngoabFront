
<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');
$fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

if ($localNgoTypem == 'Old') {
    $ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id', $fdOneFormId)->latest()->get();
    $ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id', $fdOneFormId)->first();
} else {
    $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id', $fdOneFormId)->latest()->get();
}
?>

<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        @if($localNgoTypem == 'Old')
                            <li>{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                            <li>{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif

                        <li class="active">{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('other_doc.all_doc')}}</h5>

                                <!--error message --->

                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

                                @if ($errors->has('registration_certificate'))
                                    <span class="text-danger">{{ $errors->first('registration_certificate') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('last_ten_years_audit_report_and_annual_report_of_the_company'))
                                    <span
                                        class="text-danger">{{ $errors->first('last_ten_years_audit_report_and_annual_report_of_the_company') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('work_procedure_of_organization'))
                                    <span
                                        class="text-danger">{{ $errors->first('work_procedure_of_organization') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('organization_by_laws_or_constitution'))
                                    <span
                                        class="text-danger">{{ $errors->first('organization_by_laws_or_constitution') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('list_of_board_of_directors_or_board_of_trustees'))
                                    <span
                                        class="text-danger">{{ $errors->first('list_of_board_of_directors_or_board_of_trustees') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('section_sub_section_of_the_constitution'))
                                    <span
                                        class="text-danger">{{ $errors->first('section_sub_section_of_the_constitution') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('payment_of_change_fee'))
                                    <span class="text-danger">{{ $errors->first('payment_of_change_fee') }}</span><br>
                                @endif

                                @if ($errors->has('constitution_approved_by_primary_registering_authority'))
                                    <span
                                        class="text-danger">{{ $errors->first('constitution_approved_by_primary_registering_authority') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('the_constitution_of_the_company_along_with_fee_if_changed'))
                                    <span
                                        class="text-danger">{{ $errors->first('the_constitution_of_the_company_along_with_fee_if_changed') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('constitution_of_the_organization_has_changed'))
                                    <span
                                        class="text-danger">{{ $errors->first('constitution_of_the_organization_has_changed') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('constitution_of_the_organization_if_unchanged'))
                                    <span
                                        class="text-danger">{{ $errors->first('constitution_of_the_organization_if_unchanged') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('attested_copy_of_latest_registration_or_renewal_certificate'))
                                    <span
                                        class="text-danger">{{ $errors->first('attested_copy_of_latest_registration_or_renewal_certificate') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('constitution_of_the_organization_has_changed'))
                                    <span
                                        class="text-danger">{{ $errors->first('constitution_of_the_organization_has_changed') }}</span>
                                    <br>
                                @endif

                                @if ($errors->has('right_to_information_act'))
                                    <span class="text-danger">{{ $errors->first('right_to_information_act') }}</span>
                                    <br>
                                @endif
                            </div>

                            <!-- error message end -->
                            <div class="p-2">

                            </div>
                        </div>

                        @if($localNgoTypem == 'Old')

                            <!-- modal for foreign Ngo start --->

                            @if(count($ngoOtherDocLists) == 0)
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModalOne"
                                            class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                    </button>
                                </div>
                            @else

                            @endif
                            <!-- old local ngo code modal start -->
                            <div class="modal  fade" id="exampleModalOne" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                @if($localNgoTypem == 'Old')
                                                    এনজিও নবায়নের নথি
                                                @else
                                                    {{ trans('other_doc.reg')}}
                                                @endif

                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">


                                                    <form method="post" action="{{ route('ngoDocument.store') }}"
                                                          enctype="multipart/form-data" id="form"
                                                          data-parsley-validate="">

                                                        @csrf
                                                        <input type="hidden" name="main_ngo_type"
                                                               value="{{ $localNgoTypem }}"/>


                                                        <div class="mt-3">

                                                            <div class="mb-3">
                                                                <label for="" class="form-label">সংগঠনের গঠনতন্ত্রে
                                                                    পরিবর্তন হয়েছে কি না ?<span
                                                                        class="text-danger">*</span> </label>
                                                                <div class="mt-2">
                                                                    <div class="form-check form-check-inline">
                                                                        <input
                                                                            class="form-check-input organizational_structurel"
                                                                            data-parsley-checkmin="1"
                                                                            data-parsley-required type="radio"
                                                                            name="constitution_of_the_organization_has_changed"
                                                                            id=""
                                                                            value="Yes">
                                                                        <label class="form-check-label"
                                                                               for="inlineRadio1">হ্যাঁ</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input
                                                                            class="form-check-input organizational_structurel"
                                                                            data-parsley-checkmin="1"
                                                                            data-parsley-required type="radio"
                                                                            name="constitution_of_the_organization_has_changed"
                                                                            id=""
                                                                            value="No">
                                                                        <label class="form-check-label"
                                                                               for="inlineRadio2">না</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3" id="">

                                                                <!--if yes div start --->

                                                                <div class="card" id="sYesDiv" style="display: none;">
                                                                    <div class="card-header">
                                                                        <b>গঠনতন্ত্র পরিবর্তন /অনুমোদনের জন্য
                                                                            প্রয়োজনীয় কাগজপত্র: </b>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="mt-3 mb-3">
                                                                            <label class="form-label" for="">
                                                                                সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে
                                                                                নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের
                                                                                মূলকপিসহ তার অনুলিপি
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span>
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <input class="form-control"
                                                                                   name="the_constitution_of_the_company_along_with_fee_if_changed"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne1">

                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne1_text"></p>


                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">
                                                                                প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত
                                                                                গঠনতন্ত্রের কপি
                                                                                <span class="text-danger">*</span>
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span>
                                                                            </label>
                                                                            <input class="form-control"
                                                                                   name="constitution_approved_by_primary_registering_authority"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne2">

                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne2_text"></p>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">
                                                                                সংস্থার চেয়ারম্যান ও সেক্রেটারী কর্তৃক যৌথ
                                                                                স্বাক্ষরিত গঠনতন্ত্রের পরিচ্ছন্ন
                                                                                কপি<span class="text-danger">*</span>
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                                            <input class="form-control"
                                                                                   name="clean_copy_of_the_constitution"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne3">

                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne3_text"></p>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">
                                                                                গঠনতন্ত্রের কোন ধারা , উপধারা পরিবর্তন
                                                                                ফি জমা প্রদানের চালানের মূলকপিসহ <span
                                                                                    class="text-danger">*</span>
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span>
                                                                            </label>
                                                                            <input class="form-control"
                                                                                   name="payment_of_change_fee"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne4">
                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne4_text"></p>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">
                                                                                গঠনতন্ত্রের কোন ধারা , উপধারা পরিবর্তন ও
                                                                                সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর
                                                                                 কপি <span
                                                                                    class="text-danger">*</span>
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 1 MB)</span>
                                                                            </label>
                                                                            <input class="form-control"
                                                                                   name="section_sub_section_of_the_constitution"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne5">
                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne5_text"></p>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">
                                                                                পূর্ববর্তী সংবিধান এবং বর্তমান সংবিধানের
                                                                                তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও
                                                                                সম্পাদকের যৌথ স্বাক্ষর সহ)<span
                                                                                    class="text-danger">*</span>
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 1 MB)</span>
                                                                            </label>
                                                                            <input class="form-control"
                                                                                   name="previous_constitution_and_current_constitution_compare"
                                                                                   accept=".pdf" type="file"
                                                                                   id="structurePartOne6">

                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="structurePartOne6_text"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <script>
                                                                    $('[id^=structurePartOne]').on('change', function (e) {

                                                                        var mainId = $(this).attr('id');
                                                                        var getId = mainId.slice(16)
                                                                        //alert(getId);
                                                                        let size = this.files[0].size;


                                                                        if (getId == 5 || getId == 6) {

                                                                            if (size > 1000000) {
                                                                                $('#structurePartOne' + getId + '_text').text('Please Upload Maximum 1 MB File');
                                                                            } else {
                                                                                $('#structurePartOne' + getId + '_text').text('');
                                                                            }


                                                                        } else {


                                                                            if (size > 500000) {
                                                                                $('#structurePartOne' + getId + '_text').text('Please Upload Maximum 500 KB File');
                                                                            } else {
                                                                                $('#structurePartOne' + getId + '_text').text('');
                                                                            }
                                                                        }
                                                                    });

                                                                </script>

                                                                <!-- if yes div end --->


                                                                <!-- if no start -->
                                                                    <?php

                                                                    $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                                                                        ->value('ngo_type');

                                                                    $checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                                                                        ->value('ngo_type_new_old');

                                                                    ?>
                                                                <div class="card" id="sNoDiv" style="display: none;">
                                                                    <div class="card-body">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">

                                                                                @if($checkNgoTypeForForeginNgo == 'দেশিও')
                                                                                    সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি
                                                                                    মর্মে সভাপতি এবং সাধারণ সম্পাদকের
                                                                                    যৌথ স্বাক্ষরে প্রত্যয়নপত্র
                                                                                @else
                                                                                    'অপরিবর্তিত' প্রশংসাপত্রের অনুলিপি
                                                                                    (সংশ্লিষ্ট দেশের পিস অফ জাস্টিস
                                                                                    ডিপার্টমেন্ট দ্বারা
                                                                                    নোটারাইজড/প্রত্যয়িত) যদি সংস্থার
                                                                                    গঠনতন্ত্র পরিবর্তিত না হয় : <span
                                                                                        class="text-danger">*</span>
                                                                                @endif
                                                                                <br><span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                                            <input class="form-control"
                                                                                   name="constitution_of_the_organization_if_unchanged"
                                                                                   accept=".pdf" type="file"
                                                                                   id="constitution_of_the_organization_if_unchanged"/>
                                                                            <p class="text-danger mt-2"
                                                                               style="font-size:12px;"
                                                                               id="constitution_of_the_organization_if_unchanged_text"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    $('#constitution_of_the_organization_if_unchanged').on('change', function (e) {
                                                                        let size = this.files[0].size;


                                                                        if (size > 500000) {
                                                                            $('#constitution_of_the_organization_if_unchanged_text').text('Please Upload Maximum 500 KB File');
                                                                        } else {
                                                                            $('#constitution_of_the_organization_if_unchanged_text').text('');
                                                                        }
                                                                    });

                                                                </script>


                                                                <!--id no end -->
                                                            </div>
                                                            <b>অন্যান্য তথ্য:</b>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের
                                                                    তালিকা<span class="text-danger">*</span>
                                                                    <br><span class="text-danger">(maximum 5 MB)</span></label>
                                                                <input class="form-control"
                                                                       name="form_eight_executive_committee_member"
                                                                       data-parsley-required accept=".pdf" type="file"
                                                                       id="structurePartTwo402">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo402_text"></small>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয়
                                                                    পরিচয়পত্রে অনুলিপি <span
                                                                        class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control"
                                                                       name="nid_and_image_of_executive_committee_members"
                                                                       data-parsley-required accept=".pdf" type="file"
                                                                       id="structurePartTwo1">


                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo1_text"></small>


                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত
                                                                    গঠনতন্ত্রের অনুলিপি<span
                                                                        class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="work_procedure_of_organization"
                                                                       accept=".pdf" type="file" id="structurePartTwo2">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo2_text"></small>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ
                                                                    অনুলিপি <span class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="registration_renewal_fee" accept=".pdf"
                                                                       type="file" id="structurePartTwo3">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo3_text"></small>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত
                                                                    তালিকাসহ নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ
                                                                    সভার কার্যবিবরণীর  অনুলিপি <span
                                                                        class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="approval_of_executive_committee"
                                                                       accept=".pdf" type="file" id="structurePartTwo4">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo4_text"></small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ
                                                                    ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত
                                                                    অনুলিপি অথবা সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে
                                                                    থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি
                                                                    <span class="text-danger">*</span>
                                                                    <br><span class="text-danger">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="constitution_extra" accept=".pdf"
                                                                       type="file" id="structurePartTwo800">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo800_text"></small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্টের সত্যায়িত
                                                                    অনুলিপি
                                                                    <br><span class="text-danger">(maximum 5 MB)</span></label>
                                                                <input class="form-control"
                                                                       name="last_ten_years_audit_report_and_annual_report_of_the_company"
                                                                       accept=".pdf" type="file"
                                                                       id="structurePartTwo400">
                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo400_text"></small>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    সংস্থার বিগত ১০(দশ) বছরের বার্ষিক প্রতিবেদনের
                                                                    সত্যায়িত অনুলিপি
                                                                    <br><span class="text-danger">(maximum 5 MB)</span></label>
                                                                <input class="form-control"
                                                                       name="last_ten_year_annual_report" accept=".pdf"
                                                                       type="file" id="structurePartTwo401">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo401_text"></small>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কর্তৃপক্ষের
                                                                    অনুমোদিত নির্বাহী কমিটির তালিকার  অনুলিপি
                                                                    <span class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="organization_by_laws_or_constitution"
                                                                       accept=".pdf" type="file" id="structurePartTwo6">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo6_text"></small>

                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    সর্বশেষ নিবন্ধন /নবায়ন সনদের  অনুলিপি<span
                                                                        class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="attested_copy_of_latest_registration_or_renewal_certificate"
                                                                       accept=".pdf" type="file" id="structurePartTwo7">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo7_text"></small>

                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    Right To Information Act - 2009-এর আওতায় ফোকাল Focal
                                                                    Point করত :ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি <span
                                                                        class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="right_to_information_act" accept=".pdf"
                                                                       type="file" id="structurePartTwo8">

                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo8_text"></small>

                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="">
                                                                    নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির
                                                                    তালিকা এবং বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির
                                                                    তালিকা <span class="text-danger">*</span>
                                                                    <br><span class="text-danger"
                                                                              style="font-size: 12px;">(maximum 5 MB)</span></label>
                                                                <input class="form-control" data-parsley-required
                                                                       name="committee_members_list" accept=".pdf"
                                                                       type="file" id="structurePartTwo9">
                                                                <small class="text-danger mt-2" style="font-size:12px;"
                                                                       id="structurePartTwo9_text"></small>
                                                            </div>

                                                            {{-- <div class="progress" style="display: none;">
                                                                <div class="bar"></div >
                                                                       <div class="percent">0%</div >
                                                                 </div> --}}
                                                            <div class="d-grid d-md-flex justify-content-md-end">
                                                                <button type="submit"
                                                                        class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- old local ngo code modal end -->
                            <!-- modal for foreign Ngo end -->

                            <div class="file-content mt-4">
                                <div class="card">
                                    <div class="card-body file-manager 4">


                                        <!-- table content start  --->

                                        @if(count($ngoOtherDocLists) == 0)

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img
                                                        src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png"
                                                        alt="" width="120" height="120">
                                                </div>
                                                <h3 class="text-center">
                                                    {{ trans('fd_one_step_three.noInfo')}}
                                                </h3>
                                            </div>

                                        @else

                                            <table class="table table-border">

                                                @if(empty($ngoOtherDocListsFirst->fd_eight_form_data))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->fd_eight_form_data);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            নির্বাহী কর্মকর্তার সীল এবং স্বাক্ষরসহ এফডি - ৮ ফরম
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">

                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    নির্বাহী কর্মকর্তার সীল এবং
                                                                                    স্বাক্ষরসহ এফডি - ৮ ফরম
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="fd_eight_form_data"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="fd_eight_form_data"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->fd_eight_form_data  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif


                                                @if(empty($ngoOtherDocListsFirst->form_eight_executive_committee_member))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->form_eight_executive_committee_member);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'form_eight_executive_committee_member', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির
                                                                                    সদস্যদের তালিকা
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="form_eight_executive_committee_member"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="form_eight_executive_committee_member"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->form_eight_executive_committee_member  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif


                                                @if(empty($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয়
                                                            পরিচয়পত্রে  অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">

                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'nid_and_image_of_executive_committee_members', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    নির্বাহী কমিটির সদস্যদের পাসপোর্ট
                                                                                    সাইজের ছবিসহ জাতীয় পরিচয়পত্রে
                                                                                     অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="nid_and_image_of_executive_committee_members"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="nid_and_image_of_executive_committee_members"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif


                                                @if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের
                                                             অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের
                                                                                    অনুমোদিত গঠনতন্ত্রের
                                                                                    অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="work_procedure"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="work_procedure_of_organization"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->work_procedure_of_organization  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif

                                                @if(empty($ngoOtherDocListsFirst->registration_renewal_fee))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->registration_renewal_fee);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ  অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'registration_renewal_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    নিবন্ধন নবায়ন ফি জমাদানের চালানের
                                                                                    মূলকপিসহ  অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="registration_renewal_fee"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="registration_renewal_fee"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->registration_renewal_fee  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif

                                                @if(empty($ngoOtherDocListsFirst->approval_of_executive_committee))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->approval_of_executive_committee);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ
                                                            নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর
                                                             অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'approval_of_executive_committee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    উপস্থিত সাধারণ সদস্যদের উপস্থিতির
                                                                                    স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি
                                                                                    অনুমোদন সংক্রান্ত সাধারণ সভার
                                                                                    কার্যবিবরণীর  অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="approval_of_executive_committee"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="approval_of_executive_committee"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->approval_of_executive_committee  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif


                                                @if(empty($ngoOtherDocListsFirst->constitution_extra))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->constitution_extra);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>

                                                        <td>
                                                            সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট
                                                            বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা
                                                            সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি'
                                                            মর্মে প্রত্যয়নের অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal555551211"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'constitution_extra', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal555551211"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে
                                                                                    থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ
                                                                                    জমাদানের মূলকপিসহ তার সত্যায়িত
                                                                                    অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                                                                    পরিবর্তন না হয়ে থাকলে "পরিবর্তন
                                                                                    হয়নি' মর্মে প্রত্যয়নের অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="constitution_extra"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="constitution_extra"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_extra  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endif


                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>

                                                    <tr>
                                                        <td>

                                                            সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্টের সত্যায়িত অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal4"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal4" tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    সংস্থার বিগত ১০(দশ) বছরের অডিট
                                                                                    রিপোর্টের সত্যায়িত অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="last_ten_years"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="last_ten_years_audit_report_and_annual_report_of_the_company"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endif

                                                <!--end if -->


                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->last_ten_year_annual_report))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->last_ten_year_annual_report);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>
                                                        <td>
                                                            সংস্থার বিগত ১০(দশ) বছরের বার্ষিক প্রতিবেদনের সত্যায়িত
                                                            অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">

                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal4"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_year_annual_report', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'last_ten_year_annual_report', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal4" tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    সংস্থার বিগত ১০(দশ) বছরের বার্ষিক
                                                                                    প্রতিবেদনের সত্যায়িত অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="last_ten_year_annual_report"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="last_ten_year_annual_report"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->last_ten_year_annual_report  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endif

                                                <!--end if -->


                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>

                                                    <tr>
                                                        <td>
                                                            অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কর্তৃপক্ষের অনুমোদিত
                                                            নির্বাহী কমিটির তালিকার  অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal2"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal2" tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট
                                                                                    কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির
                                                                                    তালিকার  অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="laws_or_constitution"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="organization_by_laws_or_constitution"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->organization_by_laws_or_constitution  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endif

                                                <!--end if -->
                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>


                                                    <tr>
                                                        <td>
                                                            সর্বশেষ নিবন্ধন /নবায়ন সনদের  অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal411"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal411"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    সর্বশেষ নিবন্ধন /নবায়ন সনদের
                                                                                     অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="registration_or_renewal_certificate"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="attested_copy_of_latest_registration_or_renewal_certificate"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endif

                                                <!--end if -->
                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->right_to_information_act))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->right_to_information_act);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>
                                                        <td>
                                                            Right To Information Act - 2009-এর আওতায় ফোকাল Focal Point
                                                            করত :ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal444"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal444"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    Right To Information Act - 2009-এর
                                                                                    আওতায় ফোকাল Focal Point করত
                                                                                    :ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="right_to_information_act"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="right_to_information_act"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->right_to_information_act  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endif

                                                <!--end if -->
                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->committee_members_list))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->committee_members_list);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>
                                                    <tr>
                                                        <td>
                                                            নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং
                                                            বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা
                                                            <h6>{{ $filename }}</h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex mt-2">
                                                                <button class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal5555512"><i
                                                                        class="fa fa-pencil"></i></button>


                                                                <a class="btn btn-sm btn-registration" target="_blank"
                                                                   style="margin-left:5px;"
                                                                   href='{{ route('deleteRenewalFileDownload', ['title' =>'committee_members_list', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                                {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'committee_members_list', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                <!--modal -->
                                                                <div class="modal fade" id="exampleModal5555512"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    নিবন্ধনকালীন দাখিলকৃত সাধারণ ও
                                                                                    নির্বাহী কমিটির তালিকা এবং বর্তমান
                                                                                    সাধারণ সদস্য ও নির্বাহী কমিটির
                                                                                    তালিকা
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                           name="main_ngo_type"
                                                                                           value="{{ $localNgoTypem }}"/>
                                                                                    <input type="hidden" name="title"
                                                                                           value="committee_members_list"/>
                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="committee_members_list"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->committee_members_list  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <!--end if -->
                                                <!-- check change or not start-->
                                                @if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')

                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>


                                                        <tr>
                                                            <td>
                                                                সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ
                                                                ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার  অনুলিপি
                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal4567"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal4567"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে
                                                                                        থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ
                                                                                        অর্থ জমাদানের মূলকপিসহ তার
                                                                                         অনুলিপি
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="fee_if_changed"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="the_constitution_of_the_company_along_with_fee_if_changed"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->



                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>

                                                        <tr>
                                                            <td>
                                                                প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের
                                                                সত্যায়িত কপি
                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal400"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal400"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের
                                                                                        অনুমোদিত গঠনতন্ত্রের সত্যায়িত
                                                                                        কপি
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="primary_registering_authority"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="constitution_approved_by_primary_registering_authority"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->



                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>

                                                        <tr>
                                                            <td>
                                                                সংস্থার চেয়ারম্যান ও সেক্রেটারী কর্তৃক যৌথ স্বাক্ষরিত
                                                                গঠনতন্ত্রের পরিচ্ছন্ন কপি
                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal4"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal4"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        সংস্থার চেয়ারম্যান ও সেক্রেটারী
                                                                                        কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্রের
                                                                                        পরিচ্ছন্ন কপি
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="clean_copy_of_the_constitution"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="clean_copy_of_the_constitution"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->clean_copy_of_the_constitution  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->



                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>
                                                        <tr>
                                                            <td>
                                                                গঠনতন্ত্রের কোন ধারা , উপধারা পরিবর্তন ফি জমা প্রদানের
                                                                চালানের মূলকপিসহ
                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal4333"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal4333"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        গঠনতন্ত্রের কোন ধারা , উপধারা
                                                                                        পরিবর্তন ফি জমা প্রদানের চালানের
                                                                                        মূলকপিসহ
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="payment_of_change_fee"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="payment_of_change_fee"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->payment_of_change_fee  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->


                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>
                                                        <tr>
                                                            <td>
                                                                গঠনতন্ত্রের কোন ধারা , উপধারা পরিবর্তন ও সংযোজনের বিষয়ে
                                                                সাধারণ সভার কার্যবিবরণীর  কপি
                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal4988"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal4988"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        গঠনতন্ত্রের কোন ধারা , উপধারা
                                                                                        পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ
                                                                                        সভার কার্যবিবরণীর  কপি
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="section_sub_section_of_the_constitution"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="section_sub_section_of_the_constitution"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->section_sub_section_of_the_constitution  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->

                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>

                                                        <tr>
                                                            <td>
                                                                পূর্ববর্তী সংবিধান এবং বর্তমান সংবিধানের তুলনামূলক
                                                                বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষর সহ)
                                                                <h6>{{ $filename }}</h6>


                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal45555"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal45555"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        পূর্ববর্তী সংবিধান এবং বর্তমান
                                                                                        সংবিধানের তুলনামূলক বিবরণী
                                                                                        (প্রতি পাতায় সভাপতি ও সম্পাদকের
                                                                                        যৌথ স্বাক্ষর সহ)
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="previous_constitution"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="previous_constitution_and_current_constitution_compare"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->

                                                @else

                                                    <!--new start -->
                                                    @if(empty($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged))

                                                    @else
                                                            <?php

                                                            $file_path = url($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged);
                                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                            ?>
                                                            <?php

                                                            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                                                                ->value('ngo_type');

                                                            $checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                                                                ->value('ngo_type_new_old');

                                                            ?>
                                                        <tr>
                                                            <td>
                                                                @if($checkNgoTypeForForeginNgo == 'দেশিও')
                                                                    সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং
                                                                    সাধারণ সম্পাদকের যৌথ স্বাক্ষরে প্রত্যয়নপত্র
                                                                @else
                                                                    'অপরিবর্তিত' প্রশংসাপত্রের অনুলিপি (সংশ্লিষ্ট দেশের
                                                                    পিস অফ জাস্টিস ডিপার্টমেন্ট দ্বারা
                                                                    নোটারাইজড/প্রত্যয়িত) যদি সংস্থার গঠনতন্ত্র
                                                                    পরিবর্তিত না হয় : <span
                                                                        class="text-danger">*</span>
                                                                @endif

                                                                <h6>{{ $filename }}</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <button class="btn btn-sm btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal434"><i
                                                                            class="fa fa-pencil"></i></button>


                                                                    <a class="btn btn-sm btn-registration"
                                                                       target="_blank" style="margin-left:5px;"
                                                                       href='{{ route('deleteRenewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                            class="fa fa-download"></i></a>
                                                                    {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                                    <!--modal -->
                                                                    <div class="modal fade" id="exampleModal434"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        @if($checkNgoTypeForForeginNgo == 'দেশিও')
                                                                                            সংস্থার গঠনতন্ত্র পরিবর্তন
                                                                                            হয়নি মর্মে সভাপতি এবং সাধারণ
                                                                                            সম্পাদকের যৌথ স্বাক্ষরে
                                                                                            প্রত্যয়নপত্র
                                                                                        @else
                                                                                            'অপরিবর্তিত' প্রশংসাপত্রের
                                                                                            অনুলিপি (সংশ্লিষ্ট দেশের পিস
                                                                                            অফ জাস্টিস ডিপার্টমেন্ট
                                                                                            দ্বারা নোটারাইজড/প্রত্যয়িত)
                                                                                            যদি সংস্থার গঠনতন্ত্র
                                                                                            পরিবর্তিত না হয় : <span
                                                                                                class="text-danger">*</span>
                                                                                        @endif
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post"
                                                                                          action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                          enctype="multipart/form-data"
                                                                                          id="form">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                               name="main_ngo_type"
                                                                                               value="{{ $localNgoTypem }}"/>
                                                                                        <input type="hidden"
                                                                                               name="title"
                                                                                               value="organization_if_unchanged"/>
                                                                                        <div class="mb-3">

                                                                                            <input type="file"
                                                                                                   name="constitution_of_the_organization_if_unchanged"
                                                                                                   class="form-control"
                                                                                                   id="">

                                                                                            <iframe
                                                                                                src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged  }}"
                                                                                                style="width:300px; height:150px;"
                                                                                                frameborder="0"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--model end -->
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endif

                                                    <!--end if -->

                                                @endif
                                                <!-- check change or not end -->

                                            </table>
                                            <!-- new table code end -->

                                        @endif

                                        <!-- table content end --->



                                        {{-- <div class="progress" style="display: none;">
                                            <div class="bar"></div >
                                                   <div class="percent">0%</div >
                                             </div> --}}


                                        <div class="files">


                                            @if(count($ngoOtherDocLists) == 0)

                                            @else

                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>


                                                    <div class="file-box">


                                                        List of Board of Directors / Board of Trustees (Notarized /
                                                        Attested by the Justice of Peace of the concerned country)

                                                        <div class="file-top">
                                                            <i class="fa fa-file-pdf-o txt-primary"></i>
                                                        </div>

                                                        <div class="mt-2">
                                                            <h6>{{ $filename }}</h6>
                                                            <button class="btn btn-sm btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal{{ $ngoOtherDocListsFirst->id  }}">
                                                                <i class="fa fa-pencil"></i></button>


                                                            <a class="btn btn-sm btn-registration" target="_blank"
                                                               style="margin-left:5px;" style="margin-left:5px;"
                                                               href='{{ route('deleteRenewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                    class="fa fa-download"></i></a>
                                                            {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                            <!--modal -->
                                                            <div class="modal fade"
                                                                 id="exampleModal{{ $ngoOtherDocListsFirst->id  }}"
                                                                 tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                List of Board of Directors / Board of
                                                                                Trustees (Notarized / Attested by the
                                                                                Justice of Peace of the concerned
                                                                                country)
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post"
                                                                                  action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                  enctype="multipart/form-data"
                                                                                  id="form">

                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden"
                                                                                       name="main_ngo_type"
                                                                                       value="{{ $localNgoTypem }}"/>
                                                                                <input type="hidden" name="title"
                                                                                       value="trustees"/>
                                                                                <div class="mb-3">

                                                                                    <input type="file"
                                                                                           name="list_of_board_of_directors_or_board_of_trustees"
                                                                                           class="form-control" id="">

                                                                                    <iframe
                                                                                        src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees  }}"
                                                                                        style="width:300px; height:150px;"
                                                                                        frameborder="0"></iframe>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                            class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--model end -->
                                                        </div>


                                                    </div>

                                                @endif

                                                <!--end if -->












                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->registration_certificate))

                                                @else
                                                        <?php

                                                        $file_path = url($ngoOtherDocListsFirst->registration_certificate);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);


                                                        ?>


                                                    <div class="file-box">


                                                        Copy of registration certificate (notarized/attested of the
                                                        concerned country) of the head office of the company

                                                        <div class="file-top">
                                                            <i class="fa fa-file-pdf-o txt-primary"></i>
                                                        </div>

                                                        <div class="mt-2">
                                                            <h6>{{ $filename }}</h6>
                                                            <button class="btn btn-sm btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal4"><i
                                                                    class="fa fa-pencil"></i></button>


                                                            <a class="btn btn-sm btn-registration" target="_blank"
                                                               style="margin-left:5px;"
                                                               href='{{ route('deleteRenewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i
                                                                    class="fa fa-download"></i></a>
                                                            {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                                                            <!--modal -->
                                                            <div class="modal fade" id="exampleModal4" tabindex="-1"
                                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Copy of registration certificate
                                                                                (notarized/attested of the concerned
                                                                                country) of the head office of the
                                                                                company
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post"
                                                                                  action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}"
                                                                                  enctype="multipart/form-data"
                                                                                  id="form">

                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden"
                                                                                       name="main_ngo_type"
                                                                                       value="{{ $localNgoTypem }}"/>
                                                                                <input type="hidden" name="title"
                                                                                       value="registration_certificate"/>
                                                                                <div class="mb-3">

                                                                                    <input type="file"
                                                                                           name="registration_certificate"
                                                                                           class="form-control" id="">

                                                                                    <iframe
                                                                                        src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->registration_certificate  }}"
                                                                                        style="width:300px; height:150px;"
                                                                                        frameborder="0"></iframe>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                            class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--model end -->
                                                        </div>


                                                    </div>

                                                @endif

                                                <!--end if -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end old local ngo file-->
                        @else
                            <!-- start new local ngo file -->
                            <!-- modal for foreign Ngo start --->
                            <div class="d-grid d-md-flex justify-content-md-end">
                                @if(count($ngoOtherDocLists) == 0)
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                    </button>
                                @else

                                @endif
                            </div>
                            <!-- new local ngo code modal start -->
                            <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                @if($localNgoTypem == 'Old')
                                                    Document For NGO Renew
                                                @else
                                                    {{ trans('other_doc.reg')}}
                                                @endif

                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">


                                                    <form method="post" action="{{ route('ngoDocument.store') }}"
                                                          enctype="multipart/form-data" id="form"
                                                          data-parsley-validate="">

                                                        @csrf
                                                        <input type="hidden" name="main_ngo_type"
                                                               value="{{ $localNgoTypem }}"/>

{{--                                                        <div class="card mb-3">--}}
{{--                                                            <div class="card-header">--}}
{{--                                                                ফরম নং - ৮ <span class="text-danger">*</span>--}}
{{--                                                                <br><span class="text-light" style="font-size: 12px;">(maximum 5 MB)</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-body">--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-6">--}}
{{--                                                                        <input class="form-control"--}}
{{--                                                                               data-parsley-required accept=".pdf"--}}
{{--                                                                               name="pdf_file_list[]" type="file"--}}
{{--                                                                               id="newNgoPdfV1">--}}
{{--                                                                        <p class="text-danger mt-2"--}}
{{--                                                                           style="font-size:12px;"--}}
{{--                                                                           id="newNgoPdfV1_text"></p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয়
                                                                পরিচয়পত্রে  অনুলিপি <span
                                                                    class="text-danger">*</span>

                                                                <br><span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV2">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV2_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী
                                                                কমিটির তালিকা ও নিবন্ধন সনদপত্রের  অনুলিপি <span
                                                                    class="text-danger">*</span>
                                                                <br><span class="text-light" style="font-size: 12px;">(maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV3">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV3_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কর্তৃপক্ষ কর্তৃক অনুমোদিত )
                                                                 অনুলিপি <span class="text-danger">*</span>

                                                                <br><span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV4">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV4_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                সংস্থার কার্যক্রম প্রতিবেদন <span
                                                                    class="text-danger">*</span>

                                                                <br><span class="text-light" style="font-size: 12px;">(maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV5">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV5_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                দাতা সংস্থার প্রতিশ্রুতিপত্র (সংস্থার প্রধান কর্তৃক
                                                                 )<span class="text-danger">*</span>

                                                                <br><span class="text-light" style="font-size: 12px;">(Maximum 1MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV6">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV6_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার
                                                                কার্যবিবরণীর  অনুলিপি (উপস্থিত সাধারণ সদস্যদের
                                                                উপস্থিতির স্বাক্ষরিত তালিকাসহ )<span
                                                                    class="text-danger">*</span>
                                                                <br><span class="text-light" style="font-size: 12px;">(maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV7">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV7_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                সংস্থার সাধারণ সদস্যদের নামের তালিকা (প্রত্যেক সদস্যদের
                                                                স্বাক্ষরসহ নাম, পিতা /মাতা, স্বামী/স্ত্রী'র নাম ও ঠিকানা
                                                                ,জাতীয় পরিচয়পত্র নম্বর )<span
                                                                    class="text-danger">*</span>
                                                                <br><span class="text-light" style="font-size: 12px;">(maximum 5 MB)</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input class="form-control"
                                                                               data-parsley-required accept=".pdf"
                                                                               name="pdf_file_list[]" type="file"
                                                                               id="newNgoPdfV8">
                                                                        <p class="text-danger mt-2"
                                                                           style="font-size:12px;"
                                                                           id="newNgoPdfV8_text"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-grid d-md-flex justify-content-md-end">
                                                            <button type="submit"
                                                                    class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                                            </button>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- new local ngo code modal end -->
                            <!-- modal for foreign Ngo end -->
                            <div class="file-content mt-4">
                                <div class="card">
                                    <div class="card-body file-manager">

                                        <!-- new code in table formate strat ---->

                                        @if(count($ngoOtherDocLists) == 0)

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img
                                                        src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png"
                                                        alt="" width="120" height="120">
                                                </div>
                                                <h3 class="text-center">
                                                    {{ trans('fd_one_step_three.noInfo')}}
                                                </h3>
                                            </div>

                                        @else

                                            <table class="table table-border">
                                                @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

                                                        <?php

                                                        $file_path = url($all_ngo_list_all->pdf_file_list);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                        ?>
                                                    <tr>
                                                        <td>
                                                            @if($key+1 == 1)

                                                                @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                                    <h6>ফরম নং - ৮</h6>
                                                                @else

                                                                    <h6>Form No - 8</h6>
                                                                @endif

                                                            @elseif($key+1 == 2)

                                                                @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                                    <h6> নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ
                                                                        জাতীয় পরিচয়পত্রে  অনুলিপি</h6>
                                                                @else

                                                                    <h6>Certificate Of Incorporation in the Country Of
                                                                        Origin</h6>
                                                                @endif

                                                            @elseif($key+1 == 3)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত
                                                                        নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের
                                                                         অনুলিপি </h6>
                                                                @else

                                                                    <h6>Attested copy of constitution</h6>
                                                                @endif

                                                            @elseif($key+1 == 4)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কর্তৃপক্ষ কর্তৃক
                                                                        অনুমোদিত )  অনুলিপি </h6>
                                                                @else

                                                                    <h6>Activity report of the organization</h6>
                                                                @endif

                                                            @elseif($key+1 == 5)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                @else

                                                                    <h6>Decision Of the Committee/Board To Open Office
                                                                        In Bangladesh</h6>
                                                                @endif

                                                            @elseif($key+1 == 6)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>দাতা সংস্থার প্রতিশ্রুতিপত্র (সংস্থার প্রধান
                                                                        কর্তৃক  )</h6>
                                                                @else

                                                                    <h6>Letter Of Appoinment Of The Country
                                                                        Representative</h6>
                                                                @endif

                                                            @elseif($key+1 == 7)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার
                                                                        কার্যবিবরণীর  অনুলিপি (উপস্থিত সাধারণ
                                                                        সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ )</h6>
                                                                @else

                                                                    <h6>Letter Of Intent </h6>
                                                                @endif
                                                            @elseif($key+1 == 8)

                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা (প্রত্যেক
                                                                        সদস্যদের স্বাক্ষরসহ নাম, পিতা /মাতা,
                                                                        স্বামী/স্ত্রী'র নাম ও ঠিকানা ,জাতীয় পরিচয়পত্র
                                                                        নম্বর )</h6>
                                                                @else

                                                                    <h6>Letter Of Intent </h6>
                                                                @endif
                                                            @endif
                                                            <h6>{{ $filename }}</h6>
                                                            <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                                                        </td>
                                                        <td>
                                                            <div class="buttons d-flex  mt-4">

                                                                <button data-toggle="tooltip" data-placement="top"
                                                                        title="Edit" class="btn btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}">
                                                                    <i class="fa fa-pencil"></i></button>

                                                                <!--modal -->
                                                                <div class="modal fade"
                                                                     id="exampleModal{{ $all_ngo_list_all->id  }}"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">


                                                                                    @if($key+1 == 1)

                                                                                        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                                                            <h6>ফরম নং - ৮</h6>
                                                                                        @else

                                                                                            <h6>Form No - 8</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 2)

                                                                                        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                                                            <h6> নির্বাহী কমিটির
                                                                                                সদস্যদের পাসপোর্ট সাইজের
                                                                                                ছবিসহ জাতীয় পরিচয়পত্রে
                                                                                                 অনুলিপি</h6>
                                                                                        @else

                                                                                            <h6>Certificate Of
                                                                                                Incorporation in the
                                                                                                Country Of Origin</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 3)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>প্রাথমিক নিবন্ধনকারী
                                                                                                কর্তৃপক্ষের অনুমোদিত
                                                                                                নির্বাহী কমিটির তালিকা ও
                                                                                                নিবন্ধন সনদপত্রের
                                                                                                 অনুলিপি </h6>
                                                                                        @else

                                                                                            <h6>Attested copy of
                                                                                                constitution</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 4)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>গঠনতন্ত্রের (প্রাথমিক
                                                                                                নিবন্ধন কর্তৃপক্ষ কর্তৃক
                                                                                                অনুমোদিত )
                                                                                                অনুলিপি </h6>
                                                                                        @else

                                                                                            <h6>Activity report of the
                                                                                                organization</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 5)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>সংস্থার কার্যক্রম
                                                                                                প্রতিবেদন</h6>
                                                                                        @else

                                                                                            <h6>Decision Of the
                                                                                                Committee/Board To Open
                                                                                                Office In
                                                                                                Bangladesh</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 6)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>দাতা সংস্থার
                                                                                                প্রতিশ্রুতিপত্র (সংস্থার
                                                                                                প্রধান কর্তৃক
                                                                                                )</h6>
                                                                                        @else

                                                                                            <h6>Letter Of Appoinment Of
                                                                                                The Country
                                                                                                Representative</h6>
                                                                                        @endif

                                                                                    @elseif($key+1 == 7)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>সংস্থার নির্বাহী কমিটি
                                                                                                গঠন সংক্রান্ত সাধারণ
                                                                                                সভার কার্যবিবরণীর
                                                                                                 অনুলিপি
                                                                                                (উপস্থিত সাধারণ সদস্যদের
                                                                                                উপস্থিতির স্বাক্ষরিত
                                                                                                তালিকাসহ )</h6>
                                                                                        @else

                                                                                            <h6>Letter Of Intent </h6>
                                                                                        @endif
                                                                                    @elseif($key+1 == 8)

                                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                            <h6>সংস্থার সাধারণ সদস্যদের
                                                                                                নামের তালিকা (প্রত্যেক
                                                                                                সদস্যদের স্বাক্ষরসহ নাম,
                                                                                                পিতা /মাতা,
                                                                                                স্বামী/স্ত্রী'র নাম ও
                                                                                                ঠিকানা ,জাতীয় পরিচয়পত্র
                                                                                                নম্বর )</h6>
                                                                                        @else

                                                                                            <h6>Letter Of Intent </h6>
                                                                                        @endif
                                                                                    @endif

                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                      action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}"
                                                                                      enctype="multipart/form-data"
                                                                                      id="form">

                                                                                    @csrf
                                                                                    @method('PUT')

                                                                                    <div class="mb-3">

                                                                                        <input type="file"
                                                                                               name="pdf_file_list"
                                                                                               class="form-control"
                                                                                               id="">

                                                                                        <iframe
                                                                                            src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
                                                                                            style="width:300px; height:150px;"
                                                                                            frameborder="0"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--model end -->

                                                                <a data-toggle="tooltip" data-placement="top"
                                                                   title="Download" class="btn btn-sm btn-registration"
                                                                   style="margin-left:5px;" target="_blank"
                                                                   href='{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i
                                                                        class="fa fa-download"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </table>

                                        @endif


                                        <!-- new code in table formate end --->

                                    </div>
                                </div>
                            </div>

                        @endif


                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 back_button"
                                    onclick="location.href = '{{ route('othersInformation') }}';">{{ trans('fd_one_step_one.back')}}</button>
                            @if(count($ngoOtherDocLists) == 0)
                                @if(count($ngoOtherDocLists) >= 1)
                                    <button class="btn btn-custom next_button"
                                            type="button">{{ trans('fd_one_step_four.Submit2')}}</button>
                                @else
                                    <button class="btn btn-custom next_button" type="button"
                                            disabled>{{ trans('fd_one_step_four.Submit2')}}</button>
                                @endif
                            @else

                                @if(count($ngoOtherDocLists) >= 1)

                                    <button class="btn btn-custom next_button"
                                            onclick="location.href = '{{ route('ngoDocumentFinal') }}';">{{ trans('fd_one_step_four.Submit2')}}</button>
                                @else

                                    <button class="btn btn-custom next_button" type="button"
                                            disabled>{{ trans('fd_one_step_four.Submit2')}}</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--end local ngo -->



