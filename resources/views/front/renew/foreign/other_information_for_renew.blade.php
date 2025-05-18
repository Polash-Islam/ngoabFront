
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

                        <li >{{ trans('fd_one_step_one.fd8')}}</li>
                        {{-- <li class="active">{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                        <li class="active">{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">

                    <?php

                    $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                                               ->value('ngo_type');

                                                    ?>

@if($checkNgoTypeForForeginNgo == 'Foreign')

                    <form action="{{ route('otherInformationForRenewGet') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                        @csrf

                    <div class="main active">
                        <div class="text">
                            <h2>অন্যান্য তথ্য </h2>
                            <p>নিবন্ধনের কাছাকাছি যেতে  আপনার তথ্য লিখুন.</p>
                        </div>

                        <div class="mt-3">

                            <div class="mb-3">
                                <label for="" class="form-label">সংস্থার গঠনতন্ত্রের পরিবর্তন হয়েছে কি না ? <span class="text-danger">*</span> </label>
                                <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="constitution_of_the_organization_has_changed" id=""
                                           value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">হ্যাঁ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="constitution_of_the_organization_has_changed" id=""
                                           value="No" >
                                    <label class="form-check-label" for="inlineRadio2">না</label>
                                </div>
                                </div>
                            </div>



                            <div class="mb-3" id="mResult">
                            </div>
                            <b>অন্যান্য তথ্য: </b>



                                <div class="mb-3">




                                    <label class="form-label" for="">
                                      নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                      <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>
                                    </label>
                                    <input class="form-control" name="copy_of_chalan" data-parsley-required accept=".pdf" type="file" id="renewFileNew1">
                                    <p id="renewFileNew1_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span>
                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span>
                                    </label>
                                    <input class="form-control" name="list_of_board_of_directors_or_board_of_trustees"  accept=".pdf" type="file" id="renewFileNew2">
                                    <p id="renewFileNew2_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বাই লজ (By laws)/গঠনতন্ত্র  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span>
                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>
                                    </label>
                                    <input class="form-control" name="organization_by_laws_or_constitution"  accept=".pdf" type="file" id="renewFileNew3">
                                    <p id="renewFileNew3_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ সভার কার্যবিবরণী (কার্যবিবরনীতে বোর্ড গঠন সংক্রান্ত ,নিবন্ধন নবায়ন করার প্রস্তাব,গঠনতন্ত্র পরিবর্তন সংক্রান্ত বিষয়াদি উল্লেখপূর্বক ) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span>
                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>
                                    </label>
                                    <input class="form-control" name="work_procedure_of_organization"  accept=".pdf" type="file" id="renewFileNew4">
                                    <p id="renewFileNew4_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বিগত ১০(দশ ) বছরের অডিট রিপোর্ট  এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                                    <input class="form-control" name="last_ten_years_audit_report_and_annual_report_of_the_company"  accept=".pdf" type="file" id="renewFileNew5">
                                    <p id="renewFileNew5_text" class="text-danger" style="font-size: 12px;"></p>


                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত /সত্যায়িত ) অনুলিপি <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                    <input class="form-control" name="registration_certificate"  accept=".pdf" type="file" id="renewFileNew6">
                                    <p id="renewFileNew6_text" class="text-danger" style="font-size: 12px;"></p>


                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সর্বশেষ নিবন্ধন /নবায়ন সনদপত্রের সত্যায়িত অনুলিপি <span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                    <input class="form-control" name="attested_copy_of_latest_registration_or_renewal_certificate"  accept=".pdf" type="file" id="renewFileNew7">
                                    <p id="renewFileNew7_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Right To Information Act- ২০০৯ - এর আওতায় - Focal Point নিয়োগ করত:ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি<span class="text-danger">*</span> <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                                    <input class="form-control" name="right_to_information_act"  accept=".pdf" type="file" id="renewFileNew8">
                                    <p id="renewFileNew8_text" class="text-danger" style="font-size: 12px;"></p>
                                </div>

                        </div>

                        <div class="buttons d-flex justify-content-end mt-4">
                            <?php

                            $lastRenewData =DB::table('ngo_renew_infos')
                            ->where('user_id',Auth::user()->id)
                            ->orderBy('id','desc')->value('id');


                                                ?>
                            <a href="{{ route('ngoRenewStepFour',base64_encode($lastRenewData)) }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                            <button class="btn btn-custom submit_button" type="submit" >জমা দিন </button>
                        </div>
                    </div>
                </form>

@else
<!--local Ngo-->
<form action="{{ route('otherInformationForRenewGet') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf

<div class="main active">
    <div class="text">
        <h2>অন্যান্য তথ্য </h2>
        <p>নিবন্ধনের কাছাকাছি যেতে  আপনার তথ্য লিখুন.</p>
    </div>


    <div class="mt-3">

        <div class="mb-3">
            <label for="" class="form-label">সংস্থার গঠনতন্ত্রের পরিবর্তন হয়েছে কি না ? <span class="text-danger">*</span> </label>
            <div class="mt-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="organizational_structure_type" id=""
                       value="Yes" >
                <label class="form-check-label" for="inlineRadio1">হ্যাঁ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="organizational_structure_type" id=""
                       value="No" >
                <label class="form-check-label" for="inlineRadio2">না</label>
            </div>
            </div>
        </div>



        <div class="mb-3" id="mResult">
        </div>

    <div class="mt-3">





    </div>

    <div class="buttons d-flex justify-content-end mt-4">
        <?php

        $lastRenewData =DB::table('ngo_renew_infos')
        ->where('user_id',Auth::user()->id)
        ->orderBy('id','desc')->value('id');


                            ?>
                            <a href="{{ route('ngoRenewStepFour',base64_encode($lastRenewData)) }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
        <button class="btn btn-custom submit_button" type="submit" >জমা দিন </button>
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
        url: "{{ route('foreignNgoType') }}",
        method: 'GET',
        data: {structureStatus:structureStatus},
        success: function(data) {
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
