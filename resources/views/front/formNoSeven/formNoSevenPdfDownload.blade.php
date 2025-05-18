<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('fd_one_step_one.f_form')}}</title>

    <style>

        body {
         /* font-family: 'bangla', sans-serif; */
            font-size: 14px;
            height: 11in;
            width: 8.5in;
        }
        table
        {
            width: 100%;
        }



        .pdf_header
        {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf_header h5
        {
            font-size: 20px;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }

        .pdf_header p
        {
            font-size: 14px;
            line-height: 1.3;
            padding: 0;
            margin: 0;
        }
      table td
      {
        vertical-align: top;
      }
        .first_table
        {
            text-align: center;
            margin-bottom: 30px;
        }
        /* .bt
      	{
			font-family: 'banglabold', sans-serif;
		} */

        .number_section
        {
            width: 15px !important;
        }

      .padding-left
      {
        padding-left: 18px;
      }
      .custom_table_border tr th,
      .custom_table_border tr td
            {
                border: 1px solid black;
            }
    </style>
</head>
<body>

    <div class="pdf_header">
        <h5>ফরম নং-৭</h5>
        <p><b>[আবশ্যিকভাবে বাংলা নিকোস ফন্টে পূরণ করে দাখিল করতে হবে]</b></p>

                                       <center>
                                        <span>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</span><br>
                                        <span>জেলা প্রশাসকের কার্যালয়, <span style="font-weight:bold;">{{ $formSevenData->district_address }}</span>/উপজেলা নির্বাহী অফিসারের কার্যালয়, <span style="font-weight:bold;">{{ $formSevenData->upazila_address }}</span></span><br>
                                        <span>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্রের</span>
                                    </center>
    </div>

     <!-- step one start -->

     <table class="table table-borderless">

        <tr>
            <td style="width:30%">স্মারক নং: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->sarok_number) }}</td>
            <td style="width:40%;font-weight:900;font-size:15px;text-align:center;"><b>'ছক'</b></td>
            <td style="text-align: right;width:30%">তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->submit_date) }} খ্রি.</td>
        </tr>

    </table>

     <div class="row">
        <div class="col-lg-12 col-sm-12">


            <table class="table table-bordered custom_table_border" style="width:100%;border: 1px solid black;
            border-collapse: collapse;">

                <tr>
                    <th style="text-align: center; border: 1px solid black" colspan="2">ক্র: নং:</th>
                    <th style="text-align: center; width: 25%; border: 1px solid black">বিবরণ</th>
                    <th style="text-align: center; border: 1px solid black">তথ্যাদি</th>
                    <th style="text-align: center; border: 1px solid black"> মন্তব্য (যদি থাকে)</th>
                </tr>

                <tr>
                    <th style="text-align: center;" colspan="2">(০১)</th>
                    <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                    <th style="text-align: center;">(০৩)</th>
                    <th style="text-align: center;">(০৪)</th>
                </tr>
              <!-- step one start  -->
                <tr>
                    <td style="text-align: center;" rowspan="4">০১.</td>
                    <td style="text-align: center;">ক)</td>
                    <td> এনজিও'র নাম ও ঠিকানা  </td>
                    <td>{{ $formSevenData->ngo_name }}, {{ $formSevenData->ngo_address }}</td>
                    <td>{{ $formSevenData->ngo_name_address_comment }}</td>
                </tr>
                <tr>

                    <td style="text-align: center;">খ)</td>
                    <td> এনজিও প্রধানের নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস </td>
                    <td>{{ $formSevenData->ngo_head_name }}, {{ $formSevenData->ngo_head_organization }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_head_office_mobile) }}, {{ $formSevenData->ngo_head_office_email }}</td>
                    <td>{{ $formSevenData->ngo_head_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">গ)</td>
                    <td>

                        <span>১. এনজিও'র নিবন্ধন নম্বর ও তারিখ <br>

                            ২. সর্বশেষ নবায়নের তারিখ ও মেয়াদকাল
                    </span>

                </td>
                    <td>


                        <span>১. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_registration) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_registration_date) }}<br>

                        ২.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_last_renewal_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_duration) }}
                </span>


                    </td>
                    <td>{{ $formSevenData->ngo_reg_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">ঘ)</td>
                    <td>জেলা/আঞ্চলিক  অফিসের দায়িত্বপ্রাপ্ত এনজিও কর্মকর্তার নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস </td>
                    <td>{{ $formSevenData->ngo_local_officer_name }}, {{ $formSevenData->ngo_local_officer_designation }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->ngo_local_officer_mobile) }},{{ $formSevenData->ngo_local_officer_email }}</td>
                    <td>{{ $formSevenData->ngo_local_officer_comment }}</td>
                </tr>
                <!-- step one end -->

                <!-- step two strat --->

                <tr>
                    <td style="text-align: center;" rowspan="7">০২.</td>
                    <td></td>
                    <td style="font-weight:bold;">প্রকল্প সংক্রান্ত তথ্য</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>

                    <td style="text-align: center;">ক)</td>
                    <td><span>১. প্রকল্পের নাম <br>

                        ২.  মেয়াদকাল <br>
                        ৩.  টাকার পরিমাণ
                </span></td>
                    <td>


                        <span>১. {{ $formSevenData->prokolpo_name }}<br>

                        ২. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_duration) }} <br>
                        ৩. {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_fund) }}
                </span>



                    </td>
                    <td>{{ $formSevenData->prokolpo_comment }}</td>
                </tr>
                <tr>

                    <td style="text-align: center;">খ)</td>
                    <td>প্রকল্প অনুমোদনের তারিখ ও স্মারক নম্বর, প্রত্যয়নপত্র প্রদানের বছর / সময়  </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_approval_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_sarok_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->prokolpo_certificate_year_and_time) }}</td>
                    <td>{{ $formSevenData->prokolpo_approval_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">গ)</td>
                    <td>প্রকল্পের উদ্দেশ্য </td>
                    <td>{{ $formSevenData->prokolpo_objecttive }}</td>
                    <td>{{ $formSevenData->prokolpo_objecttive_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">ঘ)</td>
                    <td>জেলা/উপজেলায় ব্যুরো কর্তৃক অনুমোদিত প্রকল্পের কপি স্থানীয় প্রশাসন কর্তৃক গ্রহণের তারিখ </td>
                    <td>{{ $formSevenData->project_copy_approved_by_burea }}</td>
                    <td>{{ $formSevenData->project_copy_approved_by_burea_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">ঙ)</td>
                    <td style="font-weight:bold;">তার এখতিয়ারাধীন এলাকার সংশ্লিষ্ট তথ্য </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>

                    <td></td>
                    <td><span>১. তাঁর জেলা/উপজেলায় প্রকল্পের জন্য বরাদ্দ <br>

                        ২.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে বরাদ্দ <br>
                        ৩.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে প্রকৃত ব্যয় <br>
                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <br>
                        <span style="padding-left: 10px;">ক. প্রত্যক্ষ উপকারভোগীর সংখ্যা <br>
                            <span style="padding-left: 10px;">খ. পরোক্ষ উপকারভোগীর সংখ্যা(প্রযোজ্য ক্ষেত্রে)</span>
                        </span>

                </span></td>
                    <td>


                        <span>১.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->allocation_for_projects_in_district_or_upazila) }}<br>

                        ২.   {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->this_year_under_discussion_multi_year_projects) }}<br>
                        ৩.   {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->actual_expenditure_multi_year_projects) }}<br>
                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <br>
                        <span style="padding-left: 10px;">ক.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->direct_beneficiaries_quantity) }}<br>
                            <span style="padding-left: 10px;">খ.  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->indirect_beneficiaries_quantity) }}</span>
                        </span>

                </span>

                    </td>
                    <td>{{ $formSevenData->jurisdiction_comment }}</td>
                </tr>



                <!-- step two end --->

                <!-- step three start -->

                <tr>
                    <td style="text-align: center;" rowspan="5">০৩.</td>
                    <td></td>
                    <td style="font-weight:bold;">জেলা প্রশাসন/উপজেলা প্রশাসন সংক্রান্ত</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>

                    <td style="text-align: center;">ক)</td>
                    <td><span>১. স্থানীয় প্রশাসন কর্তৃক কত বার প্রকল্পটি পরিদর্শন করা হয়েছে  <br>

                        ২.  পরিদর্শনকারী কর্মকর্তার নাম, পদবি, মোবাইল নম্বর ও ইমেইল এড্রেস
                </span></td>
                    <td>

                        <span>১. {{ $formSevenData->project_inspected_time }} <br>

                        ২. {{ $formSevenData->inspector_name }}, {{ $formSevenData->inspector_designation }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->inspector_mobile) }}, {{ $formSevenData->inspector_email }}
                </span>

                    </td>
                    <td>{{ $formSevenData->inspector_comment }}</td>
                </tr>
                <tr>

                    <td style="text-align: center;">খ)</td>
                    <td>উপকারভোগী নির্বাচনে স্থানীয় প্রশাসনকে সম্পৃক্ত করা হয়েছে কিনা, হয়ে থাকলে তার সংক্ষিপ্ত বিবরণী </td>
                    <td>{{ $formSevenData->beneficiaries_involved_with_local_administration }}</td>
                    <td>{{ $formSevenData->beneficiaries_involved_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">গ)</td>
                    <td>এনজিও প্রতিনিধি জেলা/উপজেলায় এনজিও বিষয়ক সমন্বয় সভায় নিয়মিত অংশগ্রহণ করেন কিনা </td>
                    <td>{{ $formSevenData->regular_participation_in_meeting }}</td>
                    <td>{{ $formSevenData->regular_participation_comment }}</td>
                </tr>

                <tr>

                    <td style="text-align: center;">ঘ)</td>
                    <td>এনজিও বিষয়ক ব্যুরোর অনুমোদন পত্রের শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা </td>
                    <td>{{ $formSevenData->conditions_properly_met }}</td>
                    <td>{{ $formSevenData->conditions_properly_comment }}</td>
                </tr>

                <!-- step three end -->

                <!-- step four start --->

                <tr>
                    <td style="text-align: center;" rowspan="2">০৪.</td>
                    <td></td>
                    <td>পার্টনার এনজিও হলে মূল এনজিও বিষয়ক তথ্যাদি (প্রযোজ্য ক্ষেত্রে)</td>
                    <td>{{ $formSevenData->mian_ngo_detail }}</td>
                    <td>{{ $formSevenData->main_ngo_detail_comment }}</td>
                </tr>

                <tr>

                    <td></td>
                    <td>মূল এনজিও'র নাম ও ঠিকানা</td>
                    <td>{{ $formSevenData->main_ngo_name }}, {{ $formSevenData->main_ngo_address }}</td>
                    <td>{{ $formSevenData->main_ngo_comment }}</td>
                </tr>


                <!-- steap four end -->

                <!-- step five start -->

                <tr>
                    <td style="text-align: center;" rowspan="2">০৫.</td>
                    <td></td>
                    <td style="font-weight:bold;">প্রকল্পের অর্জিত লক্ষ্যমাত্রা বিষয়ক</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>

                    <td style="text-align: center;">ক)</td>
                    <td>প্রকল্প সমাপনী প্রতিবেদন /বার্ষিক প্রতিবেদনে জেলা প্রশাসক/উপজেলা নির্বাহী অফিসারের প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা </td>
                    <td>{{ $formSevenData->sign_in_closing_report }}</td>
                    <td>{{ $formSevenData->sign_in_closing_report_comment }}</td>
                </tr>

                <!-- step five end --->

                <!-- step six start -->

                <tr>
                    <td style="text-align: center;" rowspan="2">০৬.</td>
                    <td></td>
                    <td>
                        <span>১. বাস্তবায়িত প্রকল্প সম্পর্কে মতামত <br>

                            ২.  বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ (প্রত্যয়নকারী কর্মকর্তার স্বহস্তে লিখা কাম্য)
                    </span>
                    </td>
                    <td>

                        <span>১. {{ $formSevenData->feedback_on_projects_implementedt }}<br>

                            ২.  {{ $formSevenData->recommendation_on_projects_implementedt }}
                    </span>

                    </td>
                    <td>{{ $formSevenData->last_comment }}</td>
                </tr>

                <!-- step six end -->

            </table>



            <table class="table table-borderless" style="margin-top: 15px;">

                <tr>
                    <td style="text-align: center;width: 25%">

                        <span style="text-align: center;"><span style="font-weight:900;"><b>মহাপরিচালক (গ্রেড -১)</b></span><br>
                            এনজিও বিষয়ক ব্যুরো<br>
                            প্রধানমন্ত্রীর কার্যালয়<br>
                            প্লট -ই, ১৩-বি, আগারগাঁও<br>
                            শেরে বংলা নগর,ঢাকা -১২০৭</span>
<p style="font-weight:900;padding-top:35px;">অনুলিপি :{{ $formSevenData->onulipi }}</p>

                    </td>
                    <td style="text-align: center;width: 52%">
                    </td>
                    <td style="text-align: center;width: 23%">

                        <table style=" margin-top: 15px;width:100%">
                            <tr>
                                <td style="text-align: center;" >{{ $formSevenData->name_certifying_officer }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" >{{ $formSevenData->designation_certifying_officer }}</td>
                            </tr>

                            <tr>
                                <td style="text-align: center;" ><img  src="{{ asset('/') }}{{ $formSevenData->signature_certifying_officer }}"/></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" >{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formSevenData->submit_date) }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" ><img  src="{{ asset('/')}}{{ $formSevenData->seal_certifying_officer }}"/></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;padding-top:15px;" >প্রত্যয়নকারি কর্মকর্তার নাম ও পদবি (সিলযুক্ত)</td>
                            </tr>
                        </table>

                    </td>
                    <td></td>

                </tr>

            </table>







        </div>
    </div>
    <!-- step one end --->


</body>
</html>
