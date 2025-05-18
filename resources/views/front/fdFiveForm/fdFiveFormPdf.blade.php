<!DOCTYPE html>
<html>
<head>
    <title>এফডি - ৫ ফরম</title>

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
        <h3>এফডি - ৫ ফরম</h3>
        <p>বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম </p>

    </div>

     <!-- step one start -->
     <table class="table table-borderless" style="width:100%">



        <tr>
            <td style="text-align: center;">১.</td>
            <td style="font-weight:bold;">সংস্থার নাম, ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ):</td>
            <td style="">{{ $fdFiveForm->ngo_name }},{{ $fdFiveForm->ngo_address }} ({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFiveForm->ngo_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFiveForm->ngo_mobile_number) }}, {{ $fdFiveForm->ngo_email }}, {{ $fdFiveForm->ngo_website }})
            </td>

        </tr>
      <!-- step one start  -->


        <tr>
            <td style="text-align: center;" rowspan="2">২.</td>

            <td style="font-weight:bold;" colspan="2">গ্রহণকৃত সামগ্রী/ দ্রব্য সামগ্রীর বিস্তারিত বিবরণ:
            </div>
        </td>


        </tr>
        <tr>

            {{-- <td style="text-align: center;">ক.</td> --}}
            <td colspan="3" >


                    <div class="table-responsive" id="tableAjaxDataReceivedGoods">
                        <table class="table table-bordered custom_table_border">
                            <tr>
                                <th colspan="8" style="text-align: left;">গ্রহনসংক্রান্ত তথ্যাদি</th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>তারিখ</th>
                                <th>যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম ও ঠিকানা</th>
                                <th>গ্রহণের প্রকৃত (শুল্কমূক্তভাবে /শুল্ক পরিশোধ করে গ্রহণকৃত)</th>
                                <th>জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য</th>
                                <th>গ্রহণকৃত সামগ্রীর পরিমান</th>
                                <th>গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য</th>
                                <th>প্রতিশ্রুতি প্রদানের তারিখ ও ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ</th>

                            </tr>
                        @foreach($receivedGoodList as $receivedGoodLists)
                            <tr>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->source_received_date) }}</td>
                                <td>{{ $receivedGoodLists->source_of_goods_name }} ও {{ $receivedGoodLists->source_of_goods_address }}</td>

                                <td>{{ $receivedGoodLists->actual_of_receipt_source }}</td>
                                <td>{!! $receivedGoodLists->purpose_of_receipt_goods !!}</td>
                                <td>{{ $receivedGoodLists->amount_of_material_received }}</td>
                                <td>{{ $receivedGoodLists->estimated_value_of_goods }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_project_approval) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_Commitment) }}</td>


                            </tr>
                            @endforeach

                        </table>
                    </div>


<br>
                    <div class="table-responsive" id="tableAjaxDataReceivedUsedGoods" style="margin-top: 10px;">

                        <table class="table table-bordered custom_table_border">
                            <tr>
                                <th colspan="6" style="text-align: left;">ব্যবহার/বিবরণ </th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>সংস্থার ব্যবহারের পরিমাণ</th>
                                <th>যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ </th>
                                <th>কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                <th>কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                <th>যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ (ব্যুরো অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                <th>অবশিষ্ট মালামালের বিবরণ (যদি থাকে)</th>

                            </tr>

                        @foreach($receivedGoodUsedList  as $receivedGoodLists)
                            <tr>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->organization_usage_volume) }}</td>
                                <td>{!! $receivedGoodLists->person_detail !!}</td>
                                <td>
                                    {!! $receivedGoodLists->details_of_any_goods_sold !!}

                                    @if(empty($receivedGoodLists->bureau_approval_file_goods_sold))

                                    @else
                                    ব্যুরোর অনুমোদনপত্র: সংযুক্ত
                           </a>
                                    @endif
                                </td>
                                <td>
                                {!! $receivedGoodLists->goods_transferred_detail !!}

                                @if(empty($receivedGoodLists->bureau_approval_file_transferred_detail))

                                @else
                                ব্যুরোর অনুমোদনপত্র: সংযুক্ত
                           </a>
                                @endif
                                </td>
                                <td>
                                {!! $receivedGoodLists->detail_of_goods_medium !!}

                                @if(empty($receivedGoodLists->bureau_approval_file_goods_medium))

                                @else
                                ব্যুরোর অনুমোদনপত্র: সংযুক্ত
                                @endif
                                </td>
                                <td>{!! $receivedGoodLists->details_of_remaining_goods !!}</td>


                            </tr>
                        @endforeach

                        </table>

                    </div>


    </td>


        </tr>




        <!-- step three end -->

    </table>


     <div class="row">
        <div class="col-lg-12 col-sm-12">



        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">আমি এই মর্মে ঘোষণা করছি যে, উপরোক্ত বিবরণ সত্য ও সঠিক । </p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fdFiveForm->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fdFiveForm->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            {{-- <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr> --}}
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">আবেদনকারীর নাম</td>
                <td style="width:30%; text-align: left;">: {{ $fdFiveForm->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fdFiveForm->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fdFiveForm->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
