<!DOCTYPE html>
<html>
<head>
    <title>এফডি -২ ফরম</title>

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
      .custom_table_border
      {
        border-collapse: collapse;
        width: 100%;
      }
      .custom_table_border tr th,
      .custom_table_border tr td
            {
                border: 1px solid black;
                text-align: center;

            }
    </style>
</head>
<body>

    <div class="pdf_header">
        <h5>এফডি - ২ ফরম</h5>
        <p>অর্থছাড়ের আবেদন ফরম</p>

    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-borderless" style="width:100%">


                <tr>
                    <td style="text-align: center;" >১.</td>
                    <td colspan="2">সংস্থার নাম ও ঠিকানা:</td>
                    <td style="">{{ $fd2FormList->ngo_name }} ও {{ $fd2FormList->ngo_address }}</td>

                </tr>
              <!-- step one start  -->

              <tr>
                <td style="text-align: center;"  >২.</td>

                <td style="" colspan="2">প্রকল্পের নাম:</td>
                <td style="">{{ $fd2FormList->ngo_prokolpo_name }}</td>

                </tr>

                <tr>
                    <td style="text-align: center;">৩.</td>
                    <td colspan="2">প্রকল্পের মেয়াদ, আরম্ভের তারিখ, সমাপ্তির তারিখ :</td>
                    <td style="" >
                    {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_duration) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}
                    </td>

                    </tr>
                    <tr>
                        <td style="text-align: center;" >৪.</td>
                        <td colspan="2">প্রস্তাবিত অর্থছাড়ের পরিমাণ (বাংলাদেশী টাকা ও বৈদেশিক মুদ্রায়):</td>
                        <td style="" >
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}
                        </td>

                        </tr>

                        <tr>
                        <td style="text-align: center;" >৫.</td>
                        <td colspan="2" >১ম/২য়/৩য়/৪র্থ বছরে ব্যাংক হতে উত্তোলিত অর্থের পরিমাণ:</td>
                        <td style="" >


                            @if($fd2FormList->amount_withdrawn_year == 1)
                            ১ম বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                            @elseif($fd2FormList->amount_withdrawn_year == 2)
                            ২য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                            @elseif($fd2FormList->amount_withdrawn_year == 3)
                            ৩য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}

                            @elseif($fd2FormList->amount_withdrawn_year == 4)
                            ৪র্থ বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                            @endif


                        </td>

                        </tr>

                <tr>
                    <td rowspan="2"  >৬.</td>
                    <td style="" colspan="3">সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জন:</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="table-responsive" >


                            <table class="table table-bordered custom_table_border">
                            <tr style="text-align: center">
                                <td rowspan="2" style="font-weight: bold;">ক্রমিক নং</td>
                                <td rowspan="2" style="font-weight: bold;">কার্যক্রমের নাম</td>
                                <td colspan="2" style="font-weight: bold;">বিগত বছরের লক্ষ্যমাত্রা </td>
                                <td colspan="2" style="font-weight: bold;">অর্জন(%) </td>
                                <td rowspan="2" style="font-weight: bold;">উপকারভোগীর সংখ্যা </td>
                                <td rowspan="2" style="font-weight: bold;">মন্তব্য (যদি থাকে)</td>

                            </tr>
                            <tr style="text-align: center;">
                                <td style="font-weight: bold;">বাস্তব</td>
                                <td style="font-weight: bold;">আর্থিক </td>
                                <td style="font-weight: bold;">বাস্তব</td>
                                <td style="font-weight: bold;">আর্থিক </td>
                            </tr>
                            <?php

                            $totalBeni = 0;

                            ?>
                            @foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
                            <?php

                            $totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
                            ?>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->total_benificiari) }}</td>

                                <td>{{ $fd2AllFormLastYearDetails->comment }}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" style="font-weight: bold;">মোট উপকারভোগীর সংখ্যা - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBeni) }}</td>

                                <td></td>
                                <td></td>
                            </tr>

                            </table>

                            </div>








                                                                           @if(empty($fd2FormList->last_year_achivment_pdf))


                                                                           @else

 <br>
                                                                           <p style="font-size:15px;">সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জন এর বিবরণ : <span style="font-weight:bold;">সংযুক্ত</span> </p>

                                                                           @endif
                    </td>
                </tr>

                <tr>
                    <td rowspan="3">৭.</td>

                    <td colspan="3">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী:</td>

                    </tr>
                    <tr>


                    <td>(ক) ব্যাংকের নাম :</td>
                    <td>{{ $fd2FormList->bank_name }}</td>

                    </tr>
                    <tr>


                    <td>(খ) ব্যাংকের ঠিকানা ও হিসাব নম্বর :</td>
                    <td>{{ $fd2FormList->bank_adddress }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->bank_account_number) }}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center;" rowspan="2">৮.</td>

                        <td style="" colspan="3">গুরুত্বপূর্ণ যে কোনো তথ্য:
                        </td>


                    </tr>

                    <tr>


                        <td style="" colspan="3">

                            <table class="table table-bordered">
                                @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                                <tr>
                                    <td>{{ $fd2OtherInfoAll->file_name }} : সংযুক্ত </td>

                                </tr>
                                @endforeach

                            </table>
                        </td>


                    </tr>


        </table>

        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">আমি এই মর্মে ঘোষণা করছি যে,সংস্থা কর্তৃক দাখিলকৃত উপযুক্ত  বিবরণ সত্য ও সঠিক । সংশ্লিষ্ট স্থানীয় প্রশাসনকে তাদের এলাকায় পরিচালিত কার্যক্রম ও বাজেট সম্পর্কে অবহিত করা হয়েছে । আমি আরো ঘোষণা করছি যে, মানসম্মত হিসাব ব্যবস্থা অনুসরণ করা হয়েছে  এবং যথার্থ হিসাব বই সংরক্ষণ করা হয়েছে । আমি সুশাসন এবং জবাবদিহিতা সংক্রান্ত সকল সরকারি নির্দেশনা মেনে কার্যক্রম সম্পন্ন  করেছি।</p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd7FormList->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd7FormList->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd7FormList->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd7FormList->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
