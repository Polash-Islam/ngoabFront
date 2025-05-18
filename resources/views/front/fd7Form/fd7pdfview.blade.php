<!DOCTYPE html>
<html>
<head>
    <title>এফডি-৭ ফরম</title>

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
        <h5>এফডি-৭ ফরম</h5>
        <p>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</p>

    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-borderless" style="width:100%">


                <tr>
                    <td style="text-align: center;" >১.</td>
                    <td colspan="2">এনজিও'র নাম, ঠিকানা, নিবন্ধন নম্বর ও তারিখ :</td>
                    <td style="">

                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                   {{ $ngo_list_all->organization_name_ban }},

                        @else


                     {{ $ngo_list_all->organization_name }},


                        @endif
           {{ $ngo_list_all->organization_address }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($ngoDurationReg))) }}
                    </td>

                </tr>
              <!-- step one start  -->

              <tr>
                <td style="text-align: center;"  >২.</td>

                <td style="" colspan="2">প্রস্তাবিত প্রকল্পের নাম ও ধরণ :</td>
                <td style="">

                    <?php
                    $subjectIdList  = explode(",",$fd7FormList->subject_id);
                    $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                    ->get();

                    ?>
                {{ $fd7FormList->ngo_prokolpo_name }} ও   @foreach($subjectListMain as $key=>$subjectListMains)

                @if(count($subjectListMain) == 1 )

                {{ $subjectListMains->name }}

                @else

                @if(count($subjectListMain) == ($key+1))
                {{ $subjectListMains->name }} |

                @else

                {{ $subjectListMains->name }},

                @endif

                @endif

                @endforeach



                </td>

                </tr>

                <tr>
                    <td rowspan="2"  >৩.</td>
                    <td style="" colspan="3">বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ (আনুমানিক মূল্যসহ):</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php


                        $distributionListOne = DB::table('fd_seven_distribution_details')
                        ->where('type','প্রকল্প খাতের ব্যয়')
                        ->where('fd7_form_id',$fd7FormList->id)->get();

                        $distributionListTwo = DB::table('fd_seven_distribution_details')
                        ->where('type','প্রশাসনিক ব্যয়')
                        ->where('fd7_form_id',$fd7FormList->id)->get();

                        //dd($distributionListTwo);


                                                                    ?>

                                                                <div class="table-responsive" id="tableAjaxDatadis">

                                                                    <table class="table table-bordered custom_table_border" >

                                                                        <tr style="text-align: center;">
                                                                            <td style="font-weight: bold;">ক্র: নং :</td>
                                                                            <td style="font-weight: bold;">ধরণ</td>
                                                                            <td style="font-weight: bold;">জেলা</td>
                                                                            <td style="font-weight: bold;">উপজেলা</td>

                                                                            <td style="font-weight: bold;">দ্রব্যাদির বর্ণনা</td>
                                                                            <td style="font-weight: bold;">পরিমাণ</td>
                                                                            <td style="font-weight: bold;">একক মূল্য</td>
                                                                            <td style="font-weight: bold;">মোট টাকার পরিমাণ</td>
                                                                            <td style="font-weight: bold;">মোট উপকারভোগীর সংখ্যা</td>
                                                                            <td style="font-weight: bold;">মন্তব্য</td>

                                                                        </tr>
                                                                        <?php

                                                                        $totalProductQuantityOne = 0;
                                                                        $totalUnitPriceOne = 0;
                                                                        $totalTotalAmountOne = 0;
                                                                        $totalTotalBeneficiariesOne = 0;

                                                                        ?>
                                                                         @foreach($distributionListOne as $key=>$distributionListOnes)

                                                                         <?php

                                                                            $totalProductQuantityOne = $totalProductQuantityOne + $distributionListOnes->product_quantity;
                                                                            $totalUnitPriceOne = $totalUnitPriceOne + $distributionListOnes->unit_price;
                                                                            $totalTotalAmountOne = $totalTotalAmountOne + $distributionListOnes->total_amount;
                                                                            $totalTotalBeneficiariesOne = $totalTotalBeneficiariesOne + $distributionListOnes->total_beneficiaries;
                                                                         ?>
                                                                       <tr>

                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                                            <td>{{ $distributionListOnes->type }}</td>
                                                                            <td>{{ $distributionListOnes->district_name }}</td>
                                                                            <td>{{ $distributionListOnes->upozila_name }}</td>

                                                                            <td>{{ $distributionListOnes->product_des }}</td>
                                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->product_quantity) }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
                                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->unit_price) }}</td>
                                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_amount) }}</td>
                                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_beneficiaries) }}</td>
                                                                            <td>{{ $distributionListOnes->comment }}</td>


                                                                       </tr>
                                                                       @endforeach
                                                                       @if(count($distributionListOne) == 0)

                                                                       @else
                                                                       <tr>
                                                                        <td></td>
                                                                        <td style="font-weight: bold;">প্রাক মোট</td>
                                                                        <td></td>
                                                                        <td></td>

                                                                        <td></td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityOne) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceOne) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountOne) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesOne) }}</td>
                                                                        <td></td>

                                                                       </tr>
                                                                       @endif
                                                                       <?php

                                                                       $distributionListOneCount = count($distributionListOne);


                                                                    $totalProductQuantityTwo = 0;
                                                                    $totalUnitPriceTwo = 0;
                                                                    $totalTotalAmountTwo = 0;
                                                                    $totalTotalBeneficiariesTwo = 0;


                                                                       ?>
                                                                        @foreach($distributionListTwo as $j=>$distributionListOnes)

                                                                        <?php

                                                                        $totalProductQuantityTwo = $totalProductQuantityTwo + $distributionListOnes->product_quantity;
                                                                        $totalUnitPriceTwo = $totalUnitPriceTwo + $distributionListOnes->unit_price;
                                                                        $totalTotalAmountTwo = $totalTotalAmountTwo + $distributionListOnes->total_amount;
                                                                        $totalTotalBeneficiariesTwo = $totalTotalBeneficiariesTwo + $distributionListOnes->total_beneficiaries;
                                                                     ?>
                                                                        <tr>


                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOneCount+$j+1) }}</td>
                                                                        <td>{{ $distributionListOnes->type }}</td>
                                                                        <td>{{ $distributionListOnes->district_name }}</td>
                                                                        <td>{{ $distributionListOnes->upozila_name }}</td>

                                                                        <td>{{ $distributionListOnes->product_des }}</td>
                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->product_quantity) }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->unit_price) }}</td>
                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_amount) }}</td>
                                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_beneficiaries) }}</td>
                                                                        <td>{{ $distributionListOnes->comment }}</td>


                                                                       </tr>
                                                                       @endforeach
                                                                       @if(count($distributionListTwo) == 0)

                                                                       @else
                                                                       <tr>
                                                                        <td></td>
                                                                        <td style="font-weight: bold;">প্রাক মোট</td>
                                                                        <td></td>
                                                                        <td></td>

                                                                        <td></td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityTwo) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceTwo) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountTwo) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesTwo) }}</td>
                                                                        <td></td>

                                                                       </tr>
                                                                       @endif
                                                                       <tr>
                                                                        <td></td>
                                                                        <td colspan="2" style="font-weight: bold;">সর্বমোট = </td>

                                                                        <td></td>

                                                                        <td></td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityTwo + $totalProductQuantityOne)  }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceTwo + $totalUnitPriceOne) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountTwo+$totalTotalAmountOne) }}</td>
                                                                        <td style="font-weight: bold;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesTwo+$totalTotalBeneficiariesOne) }}</td>
                                                                        <td></td>

                                                                       </tr>
                                                                    </table>

                                                                </div>






                                                                           @if(empty($fd7FormList->distribution_pdf))


                                                                           @else

 <br>
                                                                           <p style="font-size:15px;">বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ : <span style="font-weight:bold;">সংযুক্ত</span> </p>

                                                                           @endif
                    </td>
                </tr>

                <tr style="">
                    <td rowspan="14">৪.</td>
                    <td  colspan="3">অর্থ বা ত্রাণ-সামগ্রীর উৎস:</td>
                </tr>
                <tr>
                    <td colspan="3">ক. দাতা সংস্থার প্রতিশ্রুতিপত্র:</td>
                </tr>
                <tr>
                    <td></td>
                    <td>১. দাতা সংস্থার বিবরণ :</td>
                    <td>{{ $fd7FormList->donor_organization_description }}</td>

                </tr>
                <tr>

                    <td></td>
                    <td>২. প্রধান নির্বাহী কর্মকর্তা/ দাতার নাম :</td>
                    <td>
{{$fd7FormList->donor_organization_chief_type }} - {{ $fd7FormList->donor_organization_chief_name }}
                    </td>

                </tr>
                <tr>

                    <td></td>
                    <td>৩. দাতা সংস্থার নাম :</td>
                    <td>
                        {{ $fd7FormList->donor_organization_name }}

                    </td>

                </tr>
                <tr>

                    <td></td>
                    <td>৪. যোগাযোগের ঠিকানা :</td>
                    <td>{{ $fd7FormList->donor_organization_address }}</td>

                </tr>

                <tr>

                    <td></td>
                    <td>৫. টেলিফোন :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->donor_organization_phone) }}</td>

                </tr>

                <tr>

                    <td></td>
                    <td>৬. ইমেইল ও ওয়েবসাইট :</td>
                    <td>{{ $fd7FormList->donor_organization_email }} ও {{ $fd7FormList->donor_organization_website }}</td>

                </tr>
                <tr>
                    <td colspan="3">খ. চলমান অন্য কোনো প্রকল্পের অর্থ দ্বারা প্রস্তাবিত কার্যক্রম বাস্তবায়নের ক্ষেত্রে: </td>
                </tr>
                <tr>
                    <td></td>
                    <td>১. চলমান প্রকল্পের নাম ও মোট ব্যয় :</td>
                    <td>{{ $fd7FormList->ongoing_prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->total_prokolpo_cost) }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td>২. ব্যুরোর অনুমোদনের তারিখ <br> (অনুমোদনপত্র সংযুক্ত করতে হবে) : </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->date_of_bureau_approval) }}, সংযুক্ত</td>
                </tr>
                <tr>
                    <td></td>
                    <td>৩. মূল প্রকল্পের শতকরা কতভাগ এই <br>
                        প্রকল্পের ব্যায় করা হবে :</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->percentage_of_the_original_project) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>৪. চলমান প্রকল্পের উপর কোন বিরূপ <br> প্রভাব ফেলবে কি না :</td>
                                    <td>{{ $fd7FormList->adverse_impact_on_the_ongoing_project }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>৫. দাতা সংস্থার প্রতিশ্রুতিপত্র <br>(কপি
                        সংযুক্ত করতে হবে) :</td>
                    <td>সংযুক্ত</td>
                </tr>

                <tr>
                    <td style="text-align: center;" rowspan="2">৫.</td>
                    <td colspan="3">প্রকল্প এলাকা :</td>
                </tr>
 <tr>

                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                    <td colspan="3" >

                                        <div class="table-responsive">

                                            <table class="table table-bordered custom_table_border">
                                                <tr>
                                                    <td style="font-weight: bold;">ক্রমিক নং</td>
                                                    <td style="font-weight: bold;">জেলা/সিটি কর্পোরেশন</td>
                                                    <td style="font-weight: bold;">উপজেলা/থানা/<br>পৌরসভা/ওয়ার্ড</td>
                                                    <td style="font-weight: bold;">প্রকল্পের ধরণ</td>
                                                    <td style="font-weight: bold;">বরাদ্দকৃত বাজেট</td>
                                                    <td style="font-weight: bold;">মোট উপকারভোগীর সংখ্যা</td>
                                                </tr>
                                                @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
                                                <tr>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                    <td>
                                                        জেলা: {{ $prokolpoAreaListAll->district_name }} <br>


                                                        @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                        @else
                                                        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                        @else
                                                        উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                                        @endif
                                                        থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                                        পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                                        ওয়ার্ড: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->ward_name) }}
                                                    </td>
                                                    <td>
                                                        {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
                                                    </td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}</td>
                                                </tr>
                                                  @endforeach
                                            </table>



                                        </div>
                                        <span>টীকা :জেলা প্রশাসন /উপজেলা নির্বাহী অফিসার সুষ্ঠূ সমন্বয় ও সুষম বন্টনের স্বার্থে প্রকল্প এলাকা পরিবর্তন করার ক্ষমতা রাখে।</span>



                                </span>


                            </td>


                                </tr>
                                <tr>
                                    <td style="text-align: center;" rowspan="2">৬.</td>

                                    <td colspan="3">
                                        ত্রাণ কর্যক্রম কিভাবে বাস্তবায়িত হবে তার বিবরণ দিতে হবে (এটি সুস্পষ্ট করুন যাহাতে কতৃপক্ষের জন্য তদারকি /পরীক্ষণ সহজ হয়):
                                    </td>


                                </tr>

                                <tr>


                                    <td colspan="3">{!! $fd7FormList->relief_program_detail !!}




                                        @if(empty($fd7FormList->relief_program_pdf))


                                        @else

                                      <p> পিডিএফ : সংযুক্ত </p>
                                               @endif

                                    </td>

                                </tr>


                                <tr>
                                    <td style="text-align: center;" rowspan="3">৭.</td>

                                    <td  colspan="2">কার্যক্রমের মেয়াদকাল:</td>
                                    <td></td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;">ক. আরম্ভের তারিখ:</td>

                                    <td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_start_date) }}</td>

                                </tr>
                                <tr>

                                    <td style="text-align: center;">খ. সমাপ্তির তারিখ:</td>

                                    <td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_end_date) }}</td>

                                </tr>


                                <tr>
                                    <td style="text-align: center;" rowspan="2">৮.</td>

                                    <td style="" colspan="3">
                                        প্রকল্প বাস্তবায়ন সংক্রান্ত অন্যান্য প্রাসঙ্গিক তথ্য (ভবিষ্যত পরিকল্পনাসহ যদি থাকে):

                                    </td>


                                </tr>

                                <tr>


                                    <td colspan="3">
                                         {!! $fd7FormList->relevant_information !!}


                                                   @if(empty($fd7FormList->relevant_information_pdf))


                                        @else

                                        <p> পিডিএফ : সংযুক্ত </p>
                                               @endif


                                    </td>

                                </tr>


                                <tr>
                                    <td style="text-align: center;" rowspan="2">৯.</td>

                                    <td style="" colspan="3">বৈদেশিক অনুদান গ্রহণ সংক্রান্ত ব্যাংকের তথ্যাদি: </td>


                                </tr>

                                <tr>


                                    <td colspan="3">

                                         {!! $fd7FormList->bank_detail !!}

                                                   @if(empty($fd7FormList->bank_detail_pdf))


                                                   @else
                                                   <p> পিডিএফ : সংযুক্ত </p>
                                                          @endif


                                    </td>

                                </tr>


        </table>

        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">আমি এই মর্মে ঘোষণা করছি যে, উপরোক্ত বিবরণ সত্য ও সঠিক । আমি স্থানীয় প্রশাসনকে ত্রাণ কার্যক্রম এবং কর্ম এলাকা  সম্পর্কে অবহিত করে এবং স্থানীয় প্রশাসনের সাথে কার্যক্রম সমন্বয় করে কার্যক্রমের দ্বৈততা পরিহার করিব । আমি কার্যক্রম সম্পন্ন হওয়ার ০২ (দুই) মাসের মধ্যে কার্যক্রম সমাপনী প্রতিবেদন সংশ্লিষ্ট সকলকে অবহিত করিব। </p>

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
