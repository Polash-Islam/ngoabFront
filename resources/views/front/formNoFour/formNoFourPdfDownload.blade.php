<!DOCTYPE html>
<html>
<head>
    <title>ফরম নং-৪</title>

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
        <h5>ফরম নং-৪</h5>
        <p><b>মাসিক অগ্রগতি প্রতিবেদন<br>[আবশ্যিকভাবে বাংলা নিকোস ফন্টে পূরণ করে দাখিল করতে হবে]</b></p>


    </div>

     <!-- step one start -->

     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table" style="width:100%;">

                <tr>
                    <td>মাসিক অগ্রগতির প্রতিবেদন (জেলা প্রশাসক/ উপজেলা নির্বাহী অফিসার / পার্বত্য জেলা পরিষদ ও পার্বত্য চট্টগ্রাম আঞ্চলিক পরিষদ-এর কর্মকর্তার কার্যালয়ে দাখিলের জন্য )</td>
                </tr>

            </table>

            <table class="table table-bordered custom_table_border" style="width:100%;
            border-collapse: collapse;margin-top:15px;">
                <tr>
                    <td>সংস্থার নাম </td>
                    <td style="text-align: center">: </td>
                    <td>{{ $formFourData->ngo_name }}</td>
                </tr>

                <tr>
                    <td>প্রকল্পের নাম ও মেয়াদকাল</td>
                    <td style="text-align: center">:</td>
                    <td>{{ $formFourData->prokolpo_name }} ও {{ $formFourData->prokolpo_duration }}</td>
                </tr>

                <tr>
                    <td>প্রকল্প অনুমোদন পত্র নং ও তারিখ</td>
                    <td style="text-align: center">:</td>
                    <td>{{ $formFourData->prokolpo_permission_no }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFourData->prokolpo_date) }}</td>
                </tr>

                <tr>
                    <td>প্রতিবেদনকালীন সময়</td>
                    <td style="text-align: center">:</td>
                    <td>{{ $formFourData->prokolpo_report_time }}</td>
                </tr>

                <tr>
                    <td>মোট প্রকল্প ব্যয়</td>
                    <td style="text-align: center">:</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFourData->prokolpo_total_cost) }}</td>
                </tr>

                <tr>
                    <td>এ এলাকার জন্য বরাদ্দের পরিমাণ</td>
                    <td style="text-align: center">:</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFourData->allocation_amount) }}</td>
                </tr>

                <tr>
                    <td>জেলা/উপজেলা  ভিত্তিক মোট ব্যয়</td>
                    <td style="text-align: center">:</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFourData->district_upazila_wise_total_expenditure) }}</td>
                </tr>

                <tr>
                    <td>জেলা /উপজেলা ভিত্তিক বার্ষিক বরাদ্দ</td>
                    <td style="text-align: center">:</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFourData->district_upazila_wise_annual_allocation) }}</td>
                </tr>

                <tr>
                    <td>প্রকল্প এলাকায় প্রকল্পের সাইনবোর্ড প্রদর্শিত হয়েছে কিনা</td>
                    <td style="text-align: center">:</td>
                    <td>{{ $formFourData->sign_board_avaiable_or_not }}</td>
                </tr>



            </table>

            <table style="text-align:center;margin-top: 20px;width:100%;border-collapse: collapse;" class="table table-bordered text-center custom_table_border" id="dynamicAddRemove">
                <tr>
                    <th rowspan="2">ক্র : নং :</th>
                    <th rowspan="2">কর্ম এলাকা</th>
                    <th rowspan="2">খাতের বিবরণ</th>
                    <th colspan="2">লক্ষ্যমাত্রা</th>
                    <th colspan="2">অর্জন</th>
                    <th rowspan="2">পুঞ্জীভূত অর্জন</th>
                    <th rowspan="2">মন্তব্য</th>

                </tr>
                <tr>
                    <th>বাস্তব </th>
                    <th>আর্থিক</th>
                    <th>বাস্তব </th>
                    <th>আর্থিক</th>
                </tr>
@foreach($formFourAreaList as $key=>$formFourAreaLists)
                <tr>
                    <td style="width: 5%;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                    <td>{{$formFourAreaLists->work_area }}</td>
                    <td>{{ $formFourAreaLists->sector_detail }}</td>
                    <td>{{ $formFourAreaLists->target_real }}</td>
                    <td>{{ $formFourAreaLists->target_financial }}</td>
                    <td>{{ $formFourAreaLists->achievement_real }}</td>
                    <td>{{$formFourAreaLists->achievement_financial }}</td>
                    <td>{{ $formFourAreaLists->comulative_achievement }}</td>
                    <td>{{ $formFourAreaLists->comment }}</td>



                </tr>
                @endforeach

            </table>

        </div>
    </div>
    <!-- step one end --->


</body>
</html>
