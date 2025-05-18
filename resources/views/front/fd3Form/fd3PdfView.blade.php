<!DOCTYPE html>
<html>
<head>
    <title>এফডি - ৩ ফরম</title>

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
        <h5>এফডি - ৩ ফরম</h5>
        <p>পূর্বপর্তি বছরের অর্থগ্রহনের বিবরণী ফরম</p>

    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-borderless custom_table_border" style="width:100%">


                <tr>
                    <td style="text-align: center;" >১.</td>
                    <td style="">সংস্থার নাম, ঠিকানা (টেলিফোন, ইমেইল ও ওয়েবসাইটসহ) :</td>
                    <td style="">{{ $ngo_list_all->organization_name_ban }}, {{$fd3FormList->ngo_address }}({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_telephone) }}, {{ $fd3FormList->ngo_email }} ও {{ $fd3FormList->ngo_website }}) </td>

                </tr>
                <tr>
                    <td style="text-align: center;" >২.</td>
                    <td style="">নিবন্ধন নম্বর ও তারিখ:</td>
                    <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_registration_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_registration_date) }}</td>

                </tr>
                <tr>
                    <td style="text-align: center;"  rowspan="2">৩.</td>
                    <td style="">প্রকল্পের নাম ও মেয়াদ :</td>
                    <td style="">{{ $fd3FormList->ngo_prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->ngo_prokolpo_duration) }}</td>

                </tr>
                <tr>
                    <td>প্রকল্পের ধরণ:</td>
                    <td>  <?php
                        $subjectIdList  = explode(",",$fd3FormList->subject_id);
                        $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                        ->get();

                        ?>
                      @foreach($subjectListMain as $key=>$subjectListMains)

                    @if(count($subjectListMain) == 1 )

                    {{ $subjectListMains->name }}

                    @else

                    @if(count($subjectListMain) == ($key+1))
                    {{ $subjectListMains->name }}

                    @else

                    {{ $subjectListMains->name }},

                    @endif

                    @endif

                    @endforeach</td>

                </tr>
                <tr>
                    <td style="text-align: center;" >৪.</td>
                    <td style="">প্রকল্প অনুমোদনপত্র ও অর্থছাড়পত্রের স্মারক নম্বর ও তারিখ:</td>
                    <td style="">


                            <ul>
                                <li>প্রকল্প অনুমোদনপত্রের স্মারক নম্বর: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_exemption_letter_memo_number) }}</li>
                                <li>প্রকল্প অনুমোদনপত্রের তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_exemption_letter_date) }}</li>
                                <li>প্রকল্প অর্থছাড়পত্রের স্মারক নম্বর: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_letter_memo_number) }}</li>
                                <li>প্রকল্প অর্থছাড়পত্রের তারিখ: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->project_approval_letter_date) }}</li>
                            </ul>




                    </td>

                </tr>
                <tr>
                    <td style="text-align: center;" >৫.</td>
                    <td style="">পূর্ববর্তী  বছরে অর্থছাড়ের পরিমান:</td>
                    <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->exemption_amount_in_previous_year) }}</td>

                </tr>
                <tr>
                    <td style="text-align: center;" >৬.</td>
                    <td style="">পূর্ববর্তী বছরে দাতা সংস্থা হতে গৃহীত অর্থের পরিমান:</td>
                    <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->money_received_in_the_previous_year) }}</td>

                </tr>
              <!-- step one start  -->
              <tr>
                <td style="text-align: center;" rowspan="5">৭.</td>

                <td style="" colspan="2">অর্থগ্রহনের বিস্তারিত বিবরণ:</td>


            </tr>

            <tr>


                <td>ক. অর্থগ্রহনের তারিখ :</td>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->date_of_payment) }}</td>

            </tr>
            <tr>


                <td>খ. বৈদেশিক অনুদানের ধরণ (এককালীন/বহুবর্ষী):</td>
                <td> {{ $fd3FormList->type_of_foreign_grant}}</td>

            </tr>

            <tr>


                <td>গ. বৈদেশিক অনুদানের পরিমান (বৈদেশিক মুদ্রা, দেশীয় মুদ্রা):</td>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreign_grant_amount) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->local_grant_amount) }} </td>

            </tr>

            <tr>


                <td >ঘ. যদি সামগ্রী হয় তবে সামগ্রীর বিবরণ ও মূল্য (দেশীয় মুদ্রায়):



                </td>
                <td> {!!$fd3FormList->purpose_of_donation !!}
                    ({{ $fd3FormList->description_and_price_of_goods }})</td>


            </tr>


             <!-- step four start --->

             <tr>
                <td style="text-align: center;" rowspan="20">৮.</td>

                <td style="" colspan="2">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ</td>

            </tr>



            <tr>
                <td style="" colspan="2">অ. ব্যক্তির ক্ষেত্রে</td>
            </tr>

            <tr>


                <td>ক. পূর্ণ নাম:</td>
                <td>{{ $fd3FormList->foreigner_donor_full_name }}</td>

            </tr>


            <tr>


                <td>খ. পেশা:</td>
                <td>{{ $fd3FormList->foreigner_donor_occupation }}</td>

            </tr>

            <tr>


                <td>গ. যোগাযোগের ঠিকানা:</td>
                <td>{{ $fd3FormList->foreigner_donor_address }}</td>

            </tr>

            <tr>


                <td>ঘ. টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর:</td>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreigner_donor_telephone_number) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->foreigner_donor_fax) }} ও {{ $fd3FormList->foreigner_donor_email }}</td>

            </tr>

            <tr>


                <td>ঙ. জাতীয়তা/নাগরিকত্ব:</td>
                <td>{{ $fd3FormList->foreigner_donor_nationality }}</td>

            </tr>

            <tr>


                <td>চ. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                    United Nations Security Council’s Resolution (UNSCR)
                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা:</td>
                <td>{{ $fd3FormList->foreigner_donor_is_verified }}</td>

            </tr>

            <tr>




                <td>ছ. উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা:</td>
                <td>{{ $fd3FormList->foreigner_donor_is_affiliatedrict }}</td>

            </tr>
            <tr>

            <td colspan="2"> আ. দাতা যদি কোন সংস্থা /প্রতিষ্ঠান /সংগঠন /ফাউন্ডেশন /ট্রেড  ইউনিয়ন হয় </td>


        </tr>

<tr>


                <td>ক. সংস্থার নাম:</td>
                <td>{{ $fd3FormList->organization_name }}</td>

            </tr>


            <tr>


                <td>খ. অফিস/ সংস্থার ঠিকানা:</td>
                <td>{{ $fd3FormList->organization_address }}</td>

            </tr>

            <tr>


                <td>গ. টেলিফোন, ফ্যাক্স নম্বর:</td>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->organization_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->organization_fax) }}</td>

            </tr>

            <tr>


                <td>ঘ. ই-মেইল ও ওয়েবসাইট:</td>
                <td>{{ $fd3FormList->organization_email }} ও {{ $fd3FormList->organization_website }}</td>

            </tr>

            <tr>


                <td>ঙ. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                    United Nations Security Council’s Resolution (UNSCR)
                    কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা:</td>
                <td>{{ $fd3FormList->organization_is_verified }}</td>

            </tr>

            <tr>


                <td>চ. উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা:</td>
                <td>{{ $fd3FormList->relation_with_donor }}</td>

            </tr>

            <tr>




                <td colspan="2">

                  <span style="">ছ. সংস্থার প্রধান নির্বাহী কর্মকর্তাসহ উর্দ্ধতন ০৩(তিন ) জন কর্মকর্তার বিবরণ (নাম, পদবি, টেলিফোন, মোবাইল ও ইমেইল নম্বরসহ )</span>
                  <table class="table table-bordered custom_table_borderOne">
                    <tr style="text-align: center">
                        <td>ক্র : নং :</td>
                        <td>নাম</td>
                        <td>পদবি</td>
                        <td>টেলিফোন</td>
                        <td>মোবাইল</td>
                        <td>ইমেইল</td>

                    </tr>

                    @foreach($employeeDetailList as $key=>$employeeDetailLists)
                    <tr>
                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                        <td>{{ $employeeDetailLists->employee_name }}</td>
                        <td>{{ $employeeDetailLists->employee_designation }}</td>
                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_telephone) }}</td>
                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_mobile) }}</td>
                        <td>{{ $employeeDetailLists->employee_email }}</td>

                    </tr>
                    @endforeach


                </table>



                </td>


            </tr>


    <tr>

            <td>জ. বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি :</td>
            <td>{{ $fd3FormList->organization_name_of_executive_responsible_for_bd }} ও {{ $fd3FormList->organization_name_of_executive_responsible_for_bd_designation }}</td>

        </tr>


        <tr>

                <td>ঝ. সংস্থার উদ্দেশ্যসমূহ :</td>
                <td>{!! $fd3FormList->objectives_of_the_organization !!}</td>

            </tr>

            <tr>


                <td>ঞ. আবেদনকারী এনজিও ও দাতা  সংস্থার মধ্যে যোগাযোগ মাধ্যম:</td>
                <td>{{ $fd3FormList->communication_between_NGO_and_donor }}</td>

            </tr>
            <!-- steap four end -->

            <tr>
                <td style="text-align: center;" rowspan="3">৯.</td>

                <td style="" colspan="2">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী</td>


            </tr>

            <tr>
                <td>ক. ব্যাংকের নাম</td>
                <td>{{ $fd3FormList->bank_name }}</td>

            </tr>
            <tr>
                <td>খ. ঠিকানা, হিসাব নম্বর ও হিসাবের ধরণ</td>
                <td>{{ $fd3FormList->bank_address }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->bank_account_number) }} ও {{ $fd3FormList->bank_account_name }}</td>

            </tr>

   <!-- step three start -->

   <tr>
    <td style="text-align: center;" rowspan="11">১০.</td>
    <td style="" colspan="2">গৃহীত অর্থ ব্যয়ের বিস্তারিত বিবরণ:</td>


</tr>
<tr>

    <td colspan="2">ক. বৈদেশিক অনুদান মাদার একাউন্ট হতে প্রকল্প একাউন্টে স্থানান্তর করা হয়েছে কিনা ;হলে প্রকল্প একাউন্টের বিবরণ:</td>

</tr>
<tr>
    <td colspan="2">
        {!! $fd3FormList->project_account_details !!}



           @if(empty($fd3FormList->project_account_file))

           @else
           সংযুক্ত
           @endif

    </td>
</tr>
<tr>

    <td colspan="2">খ. যে উদ্দেশ্যে অর্থ ব্যয় করা হয়েছে তার বিস্তারিত বিবরণ:</td>

</tr>
<tr>
    <td colspan="2">
     {!! $fd3FormList->purpose_details !!}



           @if(empty($fd3FormList->purpose_details_file))

           @else
           সংযুক্ত
           @endif
    </td>
</tr>
<tr>

    <td colspan="2">গ. অনুমোদিত অর্থের বিপরীতে গৃহীত ও ব্যয়িত অর্থের বিবরণ :</td>

</tr>
<tr>
    <td colspan="2">
        {!! $fd3FormList->money_received_details !!}



           @if(empty($fd3FormList->money_received_details_file))

           @else
           সংযুক্ত
           @endif
    </td>
</tr>

<tr>

    <td colspan="2">ঘ. যে পদ্ধতি ব্যবহার করা হয়েছে  তার সম্পূর্ণ বিবরণ :</td>

</tr>
<tr>
    <td colspan="2">
        {!! $fd3FormList->method_details !!}

           @if(empty($fd3FormList->method_details_file))

           @else

           সংযুক্ত
           @endif
    </td>
</tr>

<tr>

    <td colspan="2">ঙ. প্রকল্প বাস্তবায়নে জেলা/উপজেলা প্রশানসনকে সম্পৃক্ত করা হয়েছে কিনা:</td>

</tr>
<tr>
    <td colspan="2">{{ $fd3FormList->administration_involved }}</td>
</tr>

<!-- step one start  -->

<tr>
    <td style="text-align: center;" rowspan="2">১১.</td>

    <td style="" colspan="2">সরঞ্জামাদি তালিকা (যানবাহনসহ) এবং উক্ত প্রকল্পের অধীনে এনজিও'র অর্জিত সম্পদের বিবরণ:</td>


</tr>
<tr>

    {{-- <td style="text-align: center;">ক.</td> --}}
    <td colspan="2" >

      {!!$fd3FormList->equipment_details!!}



           @if(empty($fd3FormList->equipment_details_file))

           @else
           সংযুক্ত
           @endif


</td>


</tr>


<!-- step three end -->



<!-- step five start -->

<tr>
    <td style="text-align: center;" rowspan="2">১২.</td>

    <td style="" colspan="2">গুরুত্বপূর্ণ যেকোনো তথ্য</td>


</tr>

<tr>


    <td colspan="2">


           <!-- start new code --->

@if(count($fdThreeOtherFileList) == 0)


@else

<table class="table table-bordered">
@foreach($fdThreeOtherFileList as $key=>$fd2OtherInfoAll)
<tr>
<td>{{ $fd2OtherInfoAll->file_name }}: সংযুক্ত</td>
</tr>
@endforeach

</table>
@endif

<!-- end new code --->



    </td>

</tr>

<!-- step five end --->

            <!-- step three start -->
            </table>

        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">
            আমি এই মর্মে ঘোষণা করছি যে, সংস্থা কর্তৃক দাখিলকৃত উপর্যুক্ত বিবরণ সত্য এবং সঠিক।
            সংশ্লিষ্ট স্থানীয় প্রশাসনকে তাদের এলাকায় পরিচালিত কার্যক্রম ও বাজেট সম্পর্কে অবহিত করা হয়েছে।
            আমি আরো ঘোষণা করছি যে, মানসম্মত হিসাব ব্যবস্থা অনুসরণ করা হয়েছে এবং যথার্থ হিসাব বই সংরক্ষণ করা হয়েছে।
            আমি সুশাসন এবং জবাবদিহিতা সংক্রান্ত সকল সরকারি নির্দেশনা মেনে কার্যক্রম সম্পন্ন করেছি। </p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd3FormList->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd3FormList->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd3FormList->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd3FormList->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fd3FormList->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
