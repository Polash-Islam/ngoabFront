<!DOCTYPE html>
<html>
<head>
    <title>এফডি - ৪(১) ফরম</title>

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
                border: 1px solid white;
                /* //text-align: center; */
            }

            .custom_table_borderOne
      {
        border-collapse: collapse;
        width: 100%;
      }
      .custom_table_borderOne tr th,
      .custom_table_borderOne tr td
            {
                border: 1px solid rgb(15, 15, 15);
                text-align: center;
            }
    </style>
</head>
<body>

    <div class="pdf_header">

        <h5>এফডি - ৪(১) ফরম </h5>
        <p>সিএ ফার্ম কর্তৃক প্রদেয় প্রতিবেদন</p>

    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">


            <table class="table table-borderless" style="width:100%">



                <tr>
                    <td style="text-align: center;" colspan="2">১.</td>
                    <td style="">প্রকল্পের নাম:</td>
                    <td style="">{{ $fdFourOneFormList->prokolpo_name }}</td>

                </tr>

                <tr>
                    <td style="text-align: center;" colspan="2">২.</td>
                    <td style="">প্রকল্প অনুমোদনের স্বারক নং ও তারিখ:</td>
                    <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_no) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_date) }}</td>

                </tr>

                <tr>
                    <td style="text-align: center;" colspan="2">৩.</td>
                    <td style="">প্রকল্প বর্ষ:</td>
                    <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_year) }}</td>

                </tr>
              <!-- step one start  -->

                <!-- step two strat --->

                <tr>
                    <td style="text-align: center;" colspan="2" rowspan="3">৪.</td>

                </tr>

                <tr>


                    <td>ক. ছাড়কৃত অর্থের পরিমাণ ও তারিখ (বাংলাদেশী মুদ্রায় খরচ ):</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_bangla_amount) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_date) }}</td>

                </tr>
                <tr>


                    <td>খ. গৃহীত অর্থের পরিমাণ ও তারিখ:</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito_date) }}</td>

                </tr>

                <!-- step two end --->

                <!-- step three start -->

                <tr>
                    <td style="text-align: center;" rowspan="2">৫.</td>
                    <td style="" colspan="3">খরচের খাতসমূহের বিস্তারিত বিবরণ : </td>
                </tr>
                <tr>
                    <td colspan="3">


                                    <table class="table table-bordered custom_table_borderOne" id="">
                                        <tr>

                                            <td >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</td>
                                            <td >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</td>
                                            <td >প্রকৃত ব্যয়</td>
                                            <td >পার্থক্য </td>
                                            <td >শতকরা হার (%)</td>
                                            <td >পার্থক্য এর  কারণ</td>

                                        </tr>

                                        @foreach($expenditureDetails as $expenditureDetail)
                                        <tr>

                                            <td>{!! $expenditureDetail->expenditure_sectors !!}</td>
                                            <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->approved_budget_money) }}</td>
                                            <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->actual_cost) }}</td>
                                            <td>{!! $expenditureDetail->difference !!}</td>
                                            <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->percentage) }}</td>
                                            <td>{!! $expenditureDetail->reason_for_the_difference !!}</td>

                                        </tr>
                                        @endforeach

                                    </table>




                    </td>
                </tr>
              <!-- step one start  -->
            </table>
        </div>
    </div>
    <!-- step one end --->



        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">সিএ ফার্ম প্রধানের স্বাক্ষর ও সিল</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fdFourOneFormList->ca_form_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">ঠিকানা</td>
                <td style="width:30%; text-align: left;">: {{ $fdFourOneFormList->ca_form_address }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">:
                    @if(empty($fdFourOneFormList->ca_form_date))

                    @else
                    {{  App\Http\Controllers\NGO\CommonController::englishToBangla(date("d/m/Y", strtotime($fdFourOneFormList->ca_form_date))) }}
                    @endif

                </td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
