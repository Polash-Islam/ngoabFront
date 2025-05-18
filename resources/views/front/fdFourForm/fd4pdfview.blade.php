<!DOCTYPE html>
<html>
<head>
    <title>এফডি - ৪ ফরম</title>

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

        <h5>এফডি - ৪ ফরম</h5>
        <p>সিএ ফার্ম কর্তৃক প্রদেয় প্রত্যয়নপত্র </p>

    </div>

     <!-- step one start -->


     <span style="text-align: justify">আমি নিম্নস্বাক্ষরকারী এই মর্মে প্রত্যয়ন করছি যে, আমার {{ $fdFourFormList->farm_name }} সিএফার্ম কর্তৃক {{ $fdFourFormList->farm_detail }} নিম্নবর্ণিত সংস্থার বর্ণিত প্রকল্পের {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->prokolpo_duration) }} মেয়াদের হিসাব নিরীক্ষা করা হয়েছে। নিরীক্ষাকালে যাবতীয় বহি, বিল-ভাউচার ও প্রয়োজনীয় প্রমাণক যাচাই করা হয়েছে। নিরীক্ষাকৃত হিসাব অনুসারে প্রাপ্ত তথ্যাদি নিম্নরূপ : </span>

     <div class="row mt-3">

                                         <div class="col-md-12">
                                             <table class="table table-borderless" style="width:100%">



                                                 <tr>
                                                     <td style="text-align: center;">১.</td>
                                                     <td style="">এনজিও'র নাম:</td>
                                                     <td style="">{{ $fdFourFormList->ngo_name }}</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">২.</td>
                                                     <td style="">নিবন্ধন নম্বর:</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->registration_number) }}</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">৩.</td>
                                                     <td style=""> ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ):</td>
                                                     <td style="">{{ $fdFourFormList->ngo_address }}({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->ngo_telephone) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->ngo_mobile_number) }}, {{ $fdFourFormList->ngo_email }} ও {{ $fdFourFormList->ngo_website }})</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">৪.</td>
                                                     <td style="">প্রকল্পের নাম ও মেয়াদকাল :</td>
                                                     <td style="">{{ $fdFourFormList->prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->prokolpo_duration_one) }}</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">৫.</td>
                                                     <td style="">নিরীক্ষায় বিবেচ্য সময়কাল :</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->exam_time) }}</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">৬.</td>
                                                     <td style="">বর্ষের প্রারম্ভিক জের :</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->start_balance) }}</td>

                                                 </tr>

                                                 <tr>
                                                     <td style="text-align: center;">৭.</td>
                                                     <td style="">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান :</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_taken_exam_year) }}</td>

                                                 </tr>


                                                 <tr>
                                                     <td style="text-align: center;">৮.</td>
                                                     <td style="">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান :</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_cost_exam_year) }}</td>

                                                 </tr>
                                                 <tr>
                                                     <td style="text-align: center;">৯.</td>
                                                     <td style="">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান :</td>
                                                     <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_remaining_exam_year) }}</td>

                                                 </tr>

                                             </table>
                                         </div>

                                         </div>
                                         <p style="text-align: justify">এনজিও বিষয়ক ব্যুরোর প্রকল্পের অনুমোদিত বাজেট খাতভিত্তিক বিবরণী এফডি -৪/১ যথাযথভাবে পূরণকৃত।  </p>
        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">
            আমি সংশ্লিষ্ট সকল আইন-কানুন পড়েছি , অনুমোদিত খাতের আলোকে ব্যয় বিবরণী পরীক্ষান্তে উল্লিখিত সকল তথ্য সত্য ও সঠিক।  </p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3">

                    @if(empty($fdFourFormList->ca_farm_sign))

                    @else

                    <img width="150" height="60" src="{{ asset('/') }}{{ $fdFourFormList->ca_farm_sign}}"/>

                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3">
                    @if(empty($fdFourFormList->ca_farm_seal))

                    @else
                    <img width="150" height="60" src="{{ asset('/') }}{{ $fdFourFormList->ca_farm_seal}}"/>
                    @endif

                </td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">সিএ ফার্ম প্রধানের স্বাক্ষর ও সিল</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fdFourFormList->ca_form_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">ঠিকানা</td>
                <td style="width:30%; text-align: left;">: {{ $fdFourFormList->ca_form_address }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">:
                    @if(empty($fdFourFormList->ca_form_date))

                    @else
                    {{  App\Http\Controllers\NGO\CommonController::englishToBangla(date("d/m/Y", strtotime($fdFourFormList->ca_form_date))) }}
                    @endif

                </td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
