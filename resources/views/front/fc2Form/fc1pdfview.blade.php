<!DOCTYPE html>
<html>
<head>
    <title>এফসি - ২ ফরম</title>

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
        <h5>এফসি - ২ ফরম</h5>
        <p>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</p>

    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-borderless custom_table_border" style="width:100%">



                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="10">১.</td>

                    <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণকারী ব্যাক্তির তথ্য</td>


                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>  পূর্ণ নাম :</td>
                    <td>{{ $fc2FormList->person_full_name }}
                    </td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>পিতার নাম :</td>
                    <td> {{ $fc2FormList->person_father_name }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>মাতার নাম :</td>
                    <td>{{ $fc2FormList->person_mother_name }}</td>

                </tr>


                <tr>

                    <td style="text-align: center;">ঘ.</td>
                    <td>পেশা :</td>
                    <td>{{ $fc2FormList->person_occupation }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঙ.</td>
                    <td>জাতীয় পরিচয়পত্র নম্বর :</td>
                    <td>{{ $fc2FormList->person_nid }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">চ.</td>
                    <td>পাসপোর্ট নম্বর (যদি থাকে) :</td>
                    <td>{{ $fc2FormList->person_passport }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ছ.</td>
                    <td>টি আই এন নম্বর :</td>
                    <td>{{ $fc2FormList->person_tin }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">জ.</td>
                    <td>জাতীয়তা /নাগরিকত্ব</td>
                    <td>{{ $fc2FormList->person_nationality }}</td>

                </tr>


                <tr>

                    <td style="text-align: center;">ঝ.</td>
                    <td>পূর্ণ ঠিকানা (টেলিফোন,মোবাইল ,ই -মেইলসহ ) </td>
                    <td>{{ $fc2FormList->person_full_address }} ({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_tele_phone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->person_mobile) }}, {{ $fc2FormList->person_email }})</td>

                </tr>
              <!-- step one start  -->
           <!-- step two strat --->

                <tr>
                    <td style="font-weight:bold;text-align: center;" rowspan="4">২.</td>

                    <td style="font-weight:bold;" colspan="3">প্রকল্পের মেয়াদ : </td>


                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td> আরম্ভের তারিখ : </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_start_date) }}</td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>সমাপ্তির তারিখ :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->ngo_prokolpo_end_date) }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>প্রকল্পের ধরণ :</td>
                    <td>

                        <?php
                        $subjectIdList  = explode(",",$fc2FormList->subject_id);
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

                    @endforeach

                </td>

                </tr>





                <!-- step two end --->

                <!-- step three start -->

                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="2">৩.</td>
                    <td style="font-weight:bold;" colspan="3">অনুদান গ্রহণের উদ্দেশ্য (বিস্তারিত বিবরণ) :</td>


                </tr>
                <tr>
                    <td colspan="3">
                        {!! $fc2FormList->purpose_of_donation !!}

                           @if(empty($fc2FormList->purpose_of_donation_pdf))
                           @else
                           সংযুক্ত
                            @endif
                    </td>
                </tr>
              <!-- step one start  -->

                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="2">৪.</td>

                    <td style="font-weight:bold;" colspan="3">কর্ম এলাকা ও বাজেট</td>


                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3">



                            <table class="table table-bordered custom_table_borderOne">

                                <tr style="text-align: center;">
                                    <th >ক. কর্ম এলাকা (জেলা ও উপজেলা উল্লেখসহ) </th>
                                    <th >খ. বিস্তারিত বাজেট বিবরণী (জেলা ও উপজেলাভিত্তিক ) </th>
                                    <th >গ. মোট উপকারভোগীর সংখ্যা</th>

                                </tr>

                                @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                                <tr>
                                    <td><span>বিভাগ: {{ $prokolpoAreaListAll->division_name }}
                                        <br>

                                        জেলা: {{ $prokolpoAreaListAll->district_name }}
                                        <br>

                                        @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                        @else
                                        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                        <br>
                                        @endif

                                        @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                        @else
                                        উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                        @endif

                                        থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                        পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                        ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}

                                    </span></td>
                                    <td><span>

                                        প্রকল্পের ধরণ: {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
                                        <br>
                                        বরাদ্দকৃত বাজেট: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}
                                    </span>

                                        </td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}</td>

                                </tr>
                                @endforeach

                            </table>


            </td>


                </tr>

                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="19">৫.</td>

                    <td style="font-weight:bold;" colspan="3">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ</td>

                </tr>



                <tr>

                    <td style="text-align: center;">অ.</td>
                    <td>ব্যক্তির ক্ষেত্রে :</td>
                    <td>

                    </td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>পূর্ণ নাম : </td>
                    <td>{{ $fc2FormList->foreigner_donor_full_name }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>পেশা :</td>
                    <td>{{ $fc2FormList->foreigner_donor_occupation }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>যোগাযোগের ঠিকানা :</td>
                    <td>{{ $fc2FormList->foreigner_donor_address }}</td>

                </tr>
                <tr>

                    <td style="text-align: center;">ঘ.</td>
                    <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর :</td>
                    <td>

                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->foreigner_donor_fax) }} ও {{ $fc2FormList->foreigner_donor_email }}


                    </td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঙ.</td>
                    <td>জাতীয়তা/নাগরিকত্ব :</td>
                    <td>{{ $fc2FormList->foreigner_donor_nationality }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">চ.</td>
                    <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত : <br>
                        United Nations Security Council’s Resolution (UNSCR)
                        কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা</td>
                    <td>{{ $fc2FormList->foreigner_donor_is_verified }}</td>

                </tr>

                <tr>



                    <td style="text-align: center;">ছ.</td>
                    <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা :</td>
                    <td>{{ $fc2FormList->foreigner_donor_is_affiliatedrict }}</td>

                </tr>
                <tr>
                    <td style="text-align: center;"> আ.</td>
                <td>সংস্থার ক্ষেত্রে :</td>
                <td>

                </td>

            </tr>

<tr>

                    <td style="text-align: center;">ক.</td>
                    <td>সংস্থার নাম :</td>
                    <td>{{ $fc2FormList->organization_name }}</td>

                </tr>


                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>অফিস/ সংস্থার ঠিকানা :</td>
                    <td>{{$fc2FormList->organization_address }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>টেলিফোন, ফ্যাক্স নম্বর :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_fax) }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঘ.</td>
                    <td>ই-মেইল ও ওয়েবসাইট :</td>
                    <td>{{ $fc2FormList->organization_email }} ও {{ $fc2FormList->organization_website }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঙ.</td>
                    <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত : <br>
                        United Nations Security Council’s Resolution (UNSCR)
                        কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা </td>
                    <td>
                        {{ $fc2FormList->organization_is_verified }}

                    </td>

                </tr>
                <tr>

                    <td style="text-align: center;">চ.</td>
                    <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা </td>
                    <td>
                        {{ $fc2FormList->relation_with_donor }}

                    </td>

                </tr>

                <tr>



                    <td style="text-align: center;">ছ.</td>
                    <td>প্রধান নির্বাহী কর্মকর্তার নাম ও পদবি </td>
                    <td>
                       {{ $fc2FormList->organization_ceo_name }}
                       ও
                        {{ $fc2FormList->organization_ceo_designation }}

                    </td>

                </tr>


        <tr>
            <td style="text-align: center;">জ.</td>
                <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি </td>
                <td>{{ $fc2FormList->organization_name_of_executive_responsible_for_bd }} ও {{ $fc2FormList->organization_name_of_executive_responsible_for_bd_designation }} </td>

            </tr>


            <tr>
                <td style="text-align: center;">ঝ.</td>
                    <td>সংস্থার উদ্দেশ্যসমূহ </td>
                    <td>{!! $fc2FormList->objectives_of_the_organization !!}</td>

                </tr>
                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="2">৬.</td>
                    <td style="font-weight:bold;" colspan="3">প্রতিশ্রতিপত্র আছে কি না: <br> (কাজের নাম,অর্থের পরিমাণ ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত  করতে হবে)</td>


                </tr>
                <tr>
                    <td colspan="3">


                            {{ $fc2FormList->bond_paper_available_or_not }}, {{ $fc2FormList->bond_paper_work_name }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bond_paper_amount) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bond_paper_duration) }}


                            <br>
                                                                        @if(empty($fc2FormList->bond_paper_pdf))


                                                                        @else


                                                                        <?php

                                                                        $file_path = url($fc2FormList->bond_paper_pdf);
                                                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                        ?>
                                                                         সংযুক্ত
                                                                         @endif
                    </td>
                </tr>

                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="4">৭.</td>

                    <td style="font-weight:bold;" colspan="2">অনুদানের বিস্তারিত বিবরণ</td>
                    <td></td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>  বৈদেশিক মুদ্রার পরিমান :</td>
                    <td>{{App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->organization_amount_of_foreign_currency) }}</td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>সমপরিমাণ বাংলাদেশী টাকা : </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->equivalent_amount_of_bd_taka) }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য) :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->commodities_value_in_bangladeshi_currency) }}</td>

                </tr>
                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="4">৮.</td>

                    <td style="font-weight:bold;" colspan="2">ব্যাংক সংক্রান্ত তথ্যাবলী</td>
                    <td></td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম ও ঠিকানা :</td>
                    <td>
       {{ $fc2FormList->bank_name }} ও {{ $fc2FormList->bank_address }}

                    </td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>ব্যাংক হিসাবের নাম :</td>
                    <td>{{ $fc2FormList->bank_account_name }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>ব্যাংক হিসাব নম্বর :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->bank_account_number) }}</td>

                </tr>


                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="4">৯.</td>

                    <td style="" colspan="3"><span style="font-weight:bold;">বাজেট<br>
                        ক.খাতভিত্তিক ব্যয় বিভাজন </span></td>


                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" >



                            <table class="table table-bordered custom_table_borderOne" style="text-align: center">
                                <tr >
                                    <th style="width: 5%;">ক্র : নং :</th>
                                    <th>কার্যক্রম</th>
                                    <th>প্রাক্কলিত ব্যয় </th>
                                    <th>কর্ম এলাকা<br> (জেলা ,উপজেলা )</th>
                                    <th>সময়সীমা </th>
                                    <th>উপকারভোগীর সংখ্যা </th>

                                </tr>



                                <?php

                                $totalEstimatedExpense = 0;
                                $totalBenificiare = 0;

                                ?>

                                @foreach($sectorWiseExpenditureList as $key=>$sectorWiseExpenditureLists)


                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $sectorWiseExpenditureLists->activities }}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->estimated_expenses) }}</td>
                                    <td>

                                        জেলা: {{ $sectorWiseExpenditureLists->work_area_district }}
                                        <br>


                                        উপজেলা: {{ $sectorWiseExpenditureLists->work_area_sub_district }}

                                    </td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->time_limit) }}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($sectorWiseExpenditureLists->number_of_beneficiaries) }}</td>


                                </tr>
                                <?php

                                $totalEstimatedExpense = $totalEstimatedExpense + $sectorWiseExpenditureLists->estimated_expenses;
                                $totalBenificiare = $totalBenificiare + $sectorWiseExpenditureLists->number_of_beneficiaries;

                                ?>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>মোট - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalEstimatedExpense) }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>মোট - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBenificiare) }}</td>

                                </tr>


                            </table>





                </span>


            </td>


                </tr>

                <tr>

                    <td style="" colspan="3"><span style="font-weight:bold;">
                        খ.টেকসই উন্নয়ন অভিষ্ঠ (এসডিজি ) এর সাথে সম্পৃক্ততা</span></td>


                </tr>

                <tr>

                    <td colspan="3">


                            <table class="table table-bordered custom_table_borderOne"  style="text-align: center">
                                <tr>
                                    <th>অভিষ্ঠ(Goal)</th>
                                    <th>লক্ষ্যমাত্রা(Target)</th>
                                    <th>বাজেট বরাদ্দ </th>
                                    <th>যৌক্তিকতা </th>
                                    <th>মন্তব্য</th>

                                </tr>
                            @foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
                                <tr>
                                    <td>{{ $SDGDevelopmentGoals->goal }}</td>
                                    <td>{{ $SDGDevelopmentGoals->target }}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($SDGDevelopmentGoals->budget_allocation) }}</td>
                                    <td>{{ $SDGDevelopmentGoals->rationality }}</td>
                                    <td>{{ $SDGDevelopmentGoals->comment }}</td>

                                </tr>
                                @endforeach


                            </table>


                    </td>

                </tr>
                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="2">১০.</td>

                    <td style="font-weight:bold;" colspan="3">ইতোপূর্বে গৃহীত অনুদানের বিবরণ</td>


                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" >



                            <table class="table table-bordered custom_table_borderOne">
                                <tr style="text-align: center">
                                    <th >ক্র : নং :</th>
                                    <th >উদ্দেশ্য / কার্যক্রম</th>
                                    <th >এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর ও তারিখ</th>
                                    <th >দাতা সংস্থার নাম</th>
                                    <th >টাকার পরিমাণ </th>
                                    <th >অডিট রিপোর্ট দাখিল এবং ব্যুরো কর্তৃক গৃহীত হয়েছে কিনা</th>
                                    <th >সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</th>
                                    <th >স্থানীয়  প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</th>
                                    <th >মন্তব্য</th>

                                </tr>

                                @foreach ($donationList as $key=>$donationLists)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $donationLists->purpose_or_activities }}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->registration_sarok_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->registration_date) }}</td>

                                    <td>{{ $donationLists->donor_name }}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($donationLists->money_amount) }}</td>
                                    <td>{{ $donationLists->audit_report }}</td>
                                    <td>{{ $donationLists->final_report }}</td>
                                    <td>{{ $donationLists->local_certificate }}</td>
                                    <td>{{ $donationLists->comment }}</td>


                                </tr>
                                @endforeach


                            </table>

            </td>


                </tr>
                <tr>
                    <td style="text-align: center;font-weight:bold;" rowspan="2">১১.</td>

                    <td style="font-weight:bold;" colspan="3">গুরুত্বপূর্ণ অন্য কোনো তথ্য (যদি থাকে):
                    </td>


                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" >

                        @if(count($fc2OtherFileList) == 0)


                        @else


                            <div class="table-respnsive">
                                <table class="table table-bordered">
                                    @foreach($fc2OtherFileList as $key=>$fd2OtherInfoAll)
                                    <tr>
                                        <td>{{ $fd2OtherInfoAll->file_title }} : সংযুক্ত</td>

                                    </tr>
                                    @endforeach

                                </table>
                            </div>

                        @endif


            </td>


                </tr>
            </table>

        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">আমি / আমরা এই মর্মে ঘোষণা করছি যে, উপরোক্ত বিবরণ সত্য ও সঠিক । অনুদান উপরোক্ত ঘোষিত উদ্দেশ্যে ব্যবহার করা হবে। আমি/আমরা প্রতিশ্রুতি দিতেছি যে আমি /আমরা প্রকল্প সমাপ্ত হওয়ার পরে ২(দুই) মাসের মধ্যে নিরীক্ষা প্রতিবেদন ও সমাপ্তি প্রতিবেদন ও স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিল করিব।</p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fc2FormList->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fc2FormList->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fc2FormList->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fc2FormList->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fc2FormList->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    <table>
        <tr>
            <td colspan="4"><span style="font-weight:bold;">সংযুক্তি:</span></td>
        </tr>
        <tr>
            <td colspan="3"><span style="">১। দাতার প্রতিশ্রুতি পত্র/দাতা সংস্থার প্রতিশ্রুতি পত্র :</span></td>
            <td> @if(empty($fc2FormList->donor_commitment_letter))


                @else
                 <p>সংযুক্ত</p>
                 @endif

                 @if(empty($fc2FormList->donor_agency_commitment_letter))


                 @else
                  <p>সংযুক্ত </p>
                  @endif
                </td>
        </tr>

        <tr>
            <td colspan="3"><span style="">২। ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক, সমাপনী প্রতিবেদন, প্রশাসনিক প্রত্যয়নপত্র :</span></td>
            <td>        @if(empty($fc2FormList->previous_audit_report))


                @else

                 <p>সংযুক্ত </p>
                 @endif

                 @if(empty($fc2FormList->last_final_report))


                 @else

                  <p>সংযুক্ত</p>
                  @endif

                  @if(empty($fc2FormList->administrative_certificate))


                           @else
                            <p>সংযুক্ত</p>
                            @endif
                </td>
        </tr>
        <tr>
            <td colspan="3"><span style="">৩। ফরম - ২ (আগের এফডি -২) :</span></td>
            <td><p>সংযুক্ত </p></td>
        </tr>
    </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
