<!DOCTYPE html>
<html>
<head>
    <title>এফডি- ৬ ফরম</title>

    <style>

        body {
         /* font-family: 'bangla', sans-serif; */
            font-size: 14px;

        }
        .table
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
        <h5>এফডি - ৬ ফরম </h5>
        <p>প্রকল্প প্রস্তাব ফরম</p>



    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-bordered">

                <!--FD06 Section 01-->

                <tr>
                    <td rowspan="7" style="">০১</td>
                    <td style="">ক)</td>
                    <td style="width:30%">এনজিও'র নাম </td>
                    <td>{{ $fd6FormList->ngo_name }}</td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td>ব্যুরোর নিবন্ধন নং ও তারিখ </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_registration_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_registration_date))) }}</td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td>সর্বশেষ নবায়ন ও মেয়াদ উত্তীর্ণের তারিখ </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_last_renew_date))) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_expiration_date))) }} </td>
                </tr>
                <tr>
                    <td style="">ঘ)</td>
                    <td> ঠিকানা </td>
                    <td>{{ $fd6FormList->ngo_address }}</td>
                </tr>
                <tr>
                    <td style="">ঙ)</td>
                    <td>টেলিফোন ও মোবাইল নম্বর </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_telephone_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_mobile_number) }} </td>
                </tr>
                <tr>
                    <td style="">চ)</td>
                    <td> ইমেইল ঠিকানা </td>
                    <td>{{ $fd6FormList->ngo_email_address }}</td>
                </tr>
                <tr>
                    <td style="">ছ)</td>
                    <td>ওয়েবসাইট </td>
                    <td>{{$fd6FormList->ngo_website }}</td>
                </tr>

                <!--FD06 Section 02-->

                <tr>
                    <td style="">০২</td>
                    <td colspan="2">প্রকল্পের নাম </td>
                    <td>{{ $fd6FormList->ngo_prokolpo_name }}</td>
                </tr>

                <!--FD06 Section 03-->

                <tr>
                    <td rowspan="4" style="">০৩</td>
                    <td colspan="2">প্রকল্পের মেয়াদ </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_duration) }}</td>
                </tr>
                <tr>
                    <td style="">ক)</td>
                    <td>শুরুর তারিখ </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_start_date) }}</td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td>সমাপ্তির তারিখ </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_end_date) }}</td>
                </tr>
                <tr>

                    <td style="">গ)</td>
                    <td>প্রকল্পের ধরণ  </td>
                    <td>

                        <?php
                        $subjectIdList  = explode(",",$fd6FormList->subject_id);
                        $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                        ->get();

                        ?>
                   @foreach($subjectListMain as $key=>$subjectListMains)

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

                <!--FD06 Section 04-->

                <tr>
                    <td rowspan="2" style="">০৪</td>
                    <td colspan="3">প্রকল্প এলাকা</td>
                </tr>
                <tr>
                    <td colspan="3">



                        <div class="table-responsive " id="tableAjaxDatapro">

                            <table class="table table-bordered custom_table_border">

                                <tr>
                                    <td style="width:60px;">ক্র:নং</td>
                                    <td>বিভাগ</td>
                                    <td>জেলা/সিটি কর্পোরেশন</td>
                                    <td>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</td>
                                    <td>প্রকল্পের ধরণ</td>
                                    <td>বরাদ্দকৃত বাজেট</td>
                                    <td>মোট উপকারভোগীর সংখ্যা</td>

                                </tr>
                                @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
                                <tr>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                    <td>{{ $prokolpoAreaListAll->division_name }}</td>
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
                                    <td>{{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}</td>
                                    <td>{{App\Http\Controllers\NGO\CommonController::englishToBangla( $prokolpoAreaListAll->number_of_beneficiaries) }}</td>

                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </td>
                </tr>
<!--FD06 Section 05-->

<tr>
<td rowspan="9" style="">০৫</td>
<td colspan="3">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :</td>
</tr>
<tr>
<td style="">ক)</td>
<td colspan="2">
প্রাক্কলিক ব্যয় (টাকায়): {{ $fd6FormList->estimated_expenses }} </td>
</tr>
<tr>
<td colspan="4">

<div id="tableAjaxDataexp">
<table class="table table-bordered custom_table_border">



    <tr>
        <td rowspan="3" >অর্থের উৎসের বিবরণ:</td>
        <td>১ম বছর  <div class="d-flex justify-content-between">

           

        </div></td>
        <td>২য় বছর  <div class="d-flex justify-content-between">

           

        </div></td>
        <td>৩য় বছর  <div class="d-flex justify-content-between">

           

        </div></td>
        <td>৪র্থ বছর <div class="d-flex justify-content-between">

            


        </div></td>
        <td>৫ম বছর <div class="d-flex justify-content-between">

           
        </div></td>
        <td rowspan="3">মোট</td>
        <td rowspan="3">মন্তব্য</td>

    </tr>
    <tr style="text-align: center;">
       
            <td>
    
                @if(!$fd6FormEstimateListFirst)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
            @endif
            </td>
            <td>
    
                @if(!$fd6FormEstimateListSecond)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
            @endif
            </td>
            <td>
                @if(!$fd6FormEstimateListThird)
    
                @else
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_end_date))) }}
            @endif
            </td>
            <td>
                @if(!$fd6FormEstimateListFourth)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_end_date))) }}
            @endif
            
            </td>
       
    
        
        <td>

            @if(!$fd6FormEstimateListFifth)
    
                @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_end_date))) }}
        @endif
        
        </td>
    </tr>
    <tr style="text-align: center;">

    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>
            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grants_received_from_abroad) }}
        @endif
        
        </td>
        <td>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->grants_received_from_abroad) }}
        @endif
        </td>

        <td>

            @if(!$fd6FormEstimateListThird)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->grants_received_from_abroad) }}
        @endif
        </td>

        <td>

            @if(!$fd6FormEstimateListFourth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->grants_received_from_abroad) }}
        @endif
        </td>

        <td>

            @if(!$fd6FormEstimateListFifth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->grants_received_from_abroad) }}
        @endif
        </td>

        <td>

            <?php

            if(!$fd6FormEstimateListFirst){
            $getTheVlueFlfdl = 0;
        }else{

            $getTheVlueFlfdl = $fd6FormEstimateListFirst->grants_received_from_abroad;

        }


            if(!$fd6FormEstimateListSecond){
            $getTheVlueSelfdl = 0;
        }else{
            $getTheVlueSelfdl = $fd6FormEstimateListSecond->grants_received_from_abroad;
         }

         if(!$fd6FormEstimateListThird){
            $getTheVlueThlfdl = 0;
        }else{
            $getTheVlueThlfdl = $fd6FormEstimateListThird->grants_received_from_abroad;
         }

         if(!$fd6FormEstimateListFourth){
            $getTheVlueFolfdl = 0;
        }else{
            $getTheVlueFolfdl = $fd6FormEstimateListFourth->grants_received_from_abroad;
         }


         if(!$fd6FormEstimateListFifth){
            $getTheVlueFiflfdl = 0;
        }else{
            $getTheVlueFiflfdl = $fd6FormEstimateListFifth->grants_received_from_abroad;
         }

            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFiflfdl+$getTheVlueFolfdl+$getTheVlueFlfdl + $getTheVlueSelfdl + $getTheVlueThlfdl) }}
        
        </td>
        <td rowspan="3">
{{$fd6FormEstimateListComment}}
           
        
        </td>
        
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->donations_made_by_foreign_donors) }}
        @endif
        
        </td>
        <td>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->donations_made_by_foreign_donors) }}
        
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListThird)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->donations_made_by_foreign_donors) }}
        
            @endif
        </td>

        <td>

            @if(!$fd6FormEstimateListFourth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->donations_made_by_foreign_donors) }}
        
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListFifth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->donations_made_by_foreign_donors) }}
        
            @endif
        </td>
        <td>
<?php
            if(!$fd6FormEstimateListFirst){
            $getTheVlueFlfd =0;
        }else{

         $getTheVlueFlfd = $fd6FormEstimateListFirst->donations_made_by_foreign_donors;

        }


            if(!$fd6FormEstimateListSecond){
            $getTheVlueSelfd = 0;
        }else{
          $getTheVlueSelfd = $fd6FormEstimateListSecond->donations_made_by_foreign_donors;
        }


        if(!$fd6FormEstimateListThird){
            $getTheVlueThlfd = 0;
        }else{
          $getTheVlueThlfd = $fd6FormEstimateListThird->donations_made_by_foreign_donors;
        }


        if(!$fd6FormEstimateListFourth){
            $getTheVlueFolfd = 0;
        }else{
          $getTheVlueFolfd = $fd6FormEstimateListFourth->donations_made_by_foreign_donors;
        }


        if(!$fd6FormEstimateListFifth){
            $getTheVlueFiflfd = 0;
        }else{
          $getTheVlueFiflfd = $fd6FormEstimateListFifth->donations_made_by_foreign_donors;
        }
            ?>
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFiflfd + $getTheVlueFolfd + $getTheVlueFlfd + $getTheVlueSelfd + $getTheVlueThlfd) }}
        
        
        </td>
        
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->local_grants) }}
        @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->local_grants) }}
          
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListThird)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->local_grants) }}
          
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListFourth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->local_grants) }}
          
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListFifth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->local_grants) }}
          
            @endif
        </td>
        <td>

            <?php

            if(!$fd6FormEstimateListFirst){
           $getTheVlueFl =0;
        }else{

        $getTheVlueFl = $fd6FormEstimateListFirst->local_grants;

         }


            if(!$fd6FormEstimateListSecond){
           $getTheVlueSel = 0;
        }else{
            $getTheVlueSel = $fd6FormEstimateListSecond->local_grants;
        }

        if(!$fd6FormEstimateListThird){
           $getTheVlueThl = 0;
        }else{
            $getTheVlueThl = $fd6FormEstimateListThird->local_grants;
        }


        if(!$fd6FormEstimateListFourth){
           $getTheVlueFol = 0;
        }else{
            $getTheVlueFol = $fd6FormEstimateListFourth->local_grants;
        }


        if(!$fd6FormEstimateListFifth){
           $getTheVlueFifl = 0;
        }else{
            $getTheVlueFifl = $fd6FormEstimateListFifth->local_grants;
        }
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFifl+$getTheVlueFol+$getTheVlueFl + $getTheVlueSel + $getTheVlueThl) }}
        
        </td>
        
    </tr>
    <tr>
        <td>মোট</td>
        <td>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grant_total) }}
        
            @endif
        </td>
        <td>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->grant_total) }}
        
            @endif
        
        </td>
        <td>

            @if(!$fd6FormEstimateListThird)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->grant_total) }}
        
            @endif
        
        </td>
        <td>

            @if(!$fd6FormEstimateListFourth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->grant_total) }}
        
            @endif
        
        </td>
        <td>

            @if(!$fd6FormEstimateListFifth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->grant_total) }}
        
            @endif
        
        </td>
        <td>

            <?php

            if(!$fd6FormEstimateListFirst){
            $getTheVlueF =0;
        }else{
            $getTheVlueF = $fd6FormEstimateListFirst->grant_total;

        }


            if(!$fd6FormEstimateListSecond){
            $getTheVlueSe = 0;
        }else{
            $getTheVlueSe = $fd6FormEstimateListSecond->grant_total;
        }


        if(!$fd6FormEstimateListThird){
            $getTheVlueTh = 0;
        }else{
            $getTheVlueTh = $fd6FormEstimateListThird->grant_total;
        }


        if(!$fd6FormEstimateListFourth){
            $getTheVlueFo = 0;
        }else{
            $getTheVlueFo = $fd6FormEstimateListFourth->grant_total;
        }

        if(!$fd6FormEstimateListFifth){
            $getTheVlueFif = 0;
        }else{
            $getTheVlueFif = $fd6FormEstimateListFifth->grant_total;
        }
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFif+$getTheVlueFo + $getTheVlueF + $getTheVlueSe +$getTheVlueTh) }}
        
        
        </td>
    
    </tr>



</table>


<div>



@if(empty($fd6FormList->estimated_expenses_file))


@else
সংযুক্ত
@endif
</td>
</tr>
<tr>
<td rowspan="6" style="">খ)</td>
<td style="width: 25%;">১. দাতা সংস্থার নাম</td>
<td>{{ $fd6FormList->donor_organization_name }}</td>
</tr>
<tr>
<td>২. দাতা সংস্থার ঠিকানা</td>
<td>{{ $fd6FormList->donor_organization_address }}</td>
</tr>
<tr>
<td> ৩. ফোন/মোবাইল/ইমেইল নম্বর</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donor_organization_phone_mobile_email) }} <br>
{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donor_organization_mobile) }} <br>
{{ $fd6FormList->donor_organization_email }}
</td>
</tr>
<tr>
<td> ৪. ওয়েবসাইট</td>
<td>{{ $fd6FormList->donor_organization_website }}</td>
</tr>
<tr>
<td> ৫. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
<td>{{ $fd6FormList->money_laundering_and_terrorist_financing }}</td>
</tr>
<tr>
<td> United Nations Security Council Resolution
(UNSCR) কর্তৃক প্রকাশিত তালিকার সাথে দাতা
সংস্থার/ব্যক্তির তথ্য যাচাই করা হয়েছে কিনা/কোন
সংশ্লিষ্টতারয়েছে কিনা:
</td>
<td>{{$fd6FormList->security_council_check}}
</td>
</tr>

<!--FD06 Section 06-->

<tr>
<td rowspan="11" style="">০৬</td>
<td colspan="3">বিস্তারিত প্রকল্প:</td>
</tr>
<tr>
<td style="">ক)</td>
<td>ভূমিকা এবং পটভূমি (সংশ্লিষ্ট এলাকায় প্রকল্প কার্যক্রম সংক্রান্ত
বিরাজমান অবস্থা তথ্য/উপাত্তসহ উল্লেখপূর্বক প্রস্তাবিত প্রকল্পটি
সংক্ষেপে অবতারণা করতে হবে। প্রকল্পটি প্রণয়নকালে কিভাবে
কমিউনিটিকে সম্পৃক্ত করা হয়েছে তা উল্লেখ করতে হবে):
</td>
<td>{{ $fd6FormList->introduction_and_background }}</td>
</tr>
<tr>
<td rowspan="4" style="">খ)</td>
<td>(১) প্রকল্পটি যৌক্তিকতা এবং জাতীয় পরিকল্পনার সাথে
প্রাসঙ্গিকতা:
</td>
<td>{{ $fd6FormList->rationality_and_plan }}</td>
</tr>
<tr>
<td>(২) প্রকল্প এলাকা নির্ধারণের যৌক্তিকতা:</td>
<td>{{ $fd6FormList->rationale_project_araea }}</td>
</tr>
<tr>
<td colspan="3">(৩) টেকসই উন্নয়ন অভীষ্টের (এসডিজি) সাথে
সম্পৃক্ততা:
</td>
</tr>
<tr>
<td colspan="3">

<div class="table-responsive" id="tableAjaxDataSDG">

<table class="table table-bordered custom_table_border">
<tr style="text-align: center">
<td>অভিষ্ঠ(Goal)</td>
<td>লক্ষ্যমাত্রা(Target)</td>
<td>নির্দেশক(Indicator)</td>
<td>বাজেট বরাদ্দ </td>
<td>যৌক্তিকতা </td>
<td>মন্তব্য</td>

</tr>
@foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
<tr>
    <td>{{ DB::table('goals')->where('id',$SDGDevelopmentGoals->goal)->value('description') }}</td>
    <td>{{ DB::table('targets')->where('id',$SDGDevelopmentGoals->target)->value('description')  }}</td>
    <td>{{ DB::table('indicators')->where('id',$SDGDevelopmentGoals->indicator)->value('description')  }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($SDGDevelopmentGoals->budget_allocation) }}</td>
<td>{{ $SDGDevelopmentGoals->rationality }}</td>
<td>{{ $SDGDevelopmentGoals->comment }}</td>

</tr>
@endforeach


</table>
</div>



@if(empty($fd6FormList->sdg_file))


@else
সংযুক্ত
@endif
</td>
</tr>
<tr>
<td style="">ক)</td>
<td>উদ্দেশ্যসমূহ
</td>
<td>{{ $fd6FormList->sdg_objective_file }}</td>
</tr>
<tr>
<td style="">ঘ)</td>
<td colspan="2"> সুনির্দিষ্ট, পরিমাপযোগ্য, অর্জনযোগ্য, যথার্থতা ও
সময়োবদ্ধতার দৃষ্টিকোণ থেকে লক্ষ্যমাত্রা :
<br>
<small> (প্রকল্পের লক্ষমাত্রা বছর ভিত্তিক দেখাতে হবে)</small>
</td>
</tr>
<tr>
<td colspan="3">

<div class="table-responsive" id="tableAjaxDataTarget">
<table class="table table-bordered custom_table_border">
<tr>
<td rowspan="2">ক্রমিক নং</td>
<td rowspan="2">কার্যক্রমের নাম</td>
<td colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</td>
<td rowspan="2">অর্জনযোগ্য(%)</td>
<td rowspan="2">উপকারভোগীর সংখ্যা</td>
<td rowspan="2">মন্তব্য (যদি থাকে)</td>

</tr>
<tr>
<td>বছর</td>
<td>বাস্তব</td>
<td>আর্থিক</td>
</tr>
<?php

$totalBeni = 0;

?>
@foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
<?php

$totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
?>
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->target_year) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_real) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_financial) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_real) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->total_benificiari) }}</td>
<td>{{ $fd2AllFormLastYearDetails->comment }}</td>

</tr>
@endforeach
<tr>
<td colspan="6">মোট উপকারভোগীর সংখ্যা-</td>
<td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBeni) }}</td>
</tr>
</table>



</div>



@if(empty($fd6FormList->target_from_perspective_file))


@else
সংযুক্ত
@endif

</td>
</tr>
<tr>
<td style="">ঙ)</td>
<td colspan="2"> প্রত্যাশিত ফলাফল (প্রত্যেক ফলাফল গুনবাচক,
সংখ্যাবাচক এবং সময়ের (QQT) ভিত্তিতে নির্দিষ্ট করতে হবে) :
</td>
</tr>
<tr>
<td colspan="3">


<div class="table-responsive" id="tableAjaxDataResult">
<table class="table table-bordered custom_table_border">
<tr>
<td>গুনবাচক</td>
<td>সংখ্যা বাচক</td>
<td>সময়কাল</td>

</tr>
@foreach($expectedResultDetail as $expectedResultDetails)
<tr>
<td>{{ $expectedResultDetails->multiplicative }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expectedResultDetails->number_reader) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expectedResultDetails->duration) }}</td>

</tr>
@endforeach
</table>

</div>




@if(empty($fd6FormList->expected_result_file))


@else
সংযুক্ত
@endif
<br>

<small>*(উপরে বর্ণিত ফলাফলের ভিত্তিতে প্রতিটি প্রধান কার্যক্রম
বর্ণনা করতে হবে। যে কার্যক্রম উপরে বর্ণিত ফলাফল অর্জনে সহায়ক
নয়, সে কার্যক্রম গ্রহণযোগ্য হবে না। উপকারভোগীর সংখ্যা
প্রত্যেক্ষ হতে হবেম, পরোক্ষ নয়)।</small>
</td>
</tr>

<!--FD06 Section 07-->

<tr>
<td rowspan="2" style="">০৭</td>
<td colspan="3">জেলাওয়ারী বিস্তারিত কর্মকান্ড (যতগুলো জেলায়
কর্মকান্ড বাস্তবায়িত হবে একই ছক ব্যবহার করে প্রত্যেক জেলার তথ্য
পর পর প্রদান করতে হবে) :
</td>
</tr>
<tr>
<td colspan="3">

<div id="tableAjaxDataDis">
<table class="table table-bordered custom_table_border">
<tr>
<td rowspan="2">ত্রু : নং</td>
<td rowspan="2">জেলা/সিটি/ পৌর-কর্পোরেশন</td>
<td rowspan="2">উপজেলা/ থানা/ ওয়ার্ড</td>
<td rowspan="2">কার্যক্রম সমূহ</td>
<td rowspan="2">প্রকল্প সময়</td>
<td colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</td>
<td rowspan="2">মোট বাজেট</td>
<td rowspan="2">মন্তব্য (যেখানে প্রযোজ্য)</td>

</tr>
<tr>
<td>বছর</td>
<td>বাস্তব</td>
<td>আর্থিক</td>
</tr>
@foreach($districtWiseList as $key=>$districtWiseLists)
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td><span>
    জেলা: {{ $districtWiseLists->district_name }}
    <br>

    @if($districtWiseLists->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

    @else
    সিটি কর্পোরেশন: {{ $districtWiseLists->city_corparation_name }}
    <br>
    @endif

    @if(empty($districtWiseLists->city_corparation_name))

    @else
    পৌরসভা: {{ $districtWiseLists->municipality_name }} <br>
    <br>
    @endif

</td>
<td>
    @if($districtWiseLists->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

    @else
    উপজেলা: {{ $districtWiseLists->upozila_name }} <br>
    @endif

    থানা: {{ $districtWiseLists->thana_name }} <br>

    ওয়ার্ড: {{ $districtWiseLists->ward_name }}

</td>
<td>{{ $districtWiseLists->activities }}</td>

<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->prokolpo_time) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->target_year) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->last_year_target_real) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->last_year_target_financial) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->total_budget) }}</td>
<td>{{ $districtWiseLists->comment }}</td>

</tr>
@endforeach
</table>

</div>




@if(empty($fd6FormList->district_wise_activity_file))


@else
সংযুক্ত
@endif

</td>
</tr>
                <tr>
                    <td rowspan="7" style="">০৮</td>
                    <td colspan="3">প্রকল্প ব্যবস্থাপনা :</td>
                </tr>
                <tr>
                    <td style="">ক)</td>
                    <td style="width:30%"> প্রত্যেক প্রধান কার্যক্রম বাস্তবায়ন পদ্ধতি
                        সংক্ষেপে বর্ণনা করতে হবে।
                    </td>
                    <td>

                        @if(!$fd6ProjectManagement)

                        @else

                        {{ $fd6ProjectManagement->implementation_of_activities }}

                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td style="width:30%">প্রকল্পটি সহযোগী এনজিও বা সংস্থার মাদ্ধমে
                        বাস্তবায়িত হবে কিনা, হলে সংলগ্নি - ''ক'' মোতাবেক প্রত্যেক সহযোগী
                        এনজিওর তথ্য দিতে হবে।
                    </td>
                    <td>

                        @if(!$fd6ProjectManagement)

                        @else

                        {{ $fd6ProjectManagement->associate_NGO_detail }}

                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="">গ)</td>
                    <td style="width:30%"> সংলগ্নি ''খ '' -তে প্রকল্পের কর্মকর্তা/
                        কর্মচারীদের বিস্তারিত বিবরণ (দেশি ও বিদেশী উভয়ের জন্য প্রযোজ্য )
                        দাখিল করতে হবে।
                    </td>
                    <td>

                        @if(!$fd6ProjectManagement)

                        @else

                        {{ $fd6ProjectManagement->details_of_project_Officers_and_employees }}

                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="">ঘ)</td>
                    <td style="width:30%"> নির্মাণ সংক্রান্ত বিস্তারিত তথ্য সংলগ্নি ''ঘ
                        '' - তে প্রদান করতে হবে।
                    </td>
                    <td>
                        @if(!$fd6ProjectManagement)

                        @else
                        {{ $fd6ProjectManagement->construction_details }}
                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="">ঙ)</td>
                    <td style="width:30%"> আর্থিক খাত/ উপখাত ভিত্তিক বরাদ্দ সংলগ্নি
                        ''ঘ''-তে প্রদান করতে হবে।
                    </td>
                    <td>
                        @if(!$fd6ProjectManagement)

                        @else

                        {{ $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation }}

                        @endif

                    </td>
                </tr>
                <tr>
                    <td style=""> চ)</td>
                    <td style="width:30%"> প্রকল্পটি সমাপ্তির পর প্রকল্পটি কিভাবে টিকিয়া
                        থাকবে ও পরিচালিত হবে তা উল্লেখ করতে হবে।
                    </td>
                    <td>

                        @if(!$fd6ProjectManagement)

                        @else

                        {{ $fd6ProjectManagement->project_sustained_and_managed }}

                        @endif

                    </td>
                </tr>

                <!--FD06 Section 09-->

                <tr>
                    <td rowspan="9" style="">০৯</td>
                    <td colspan="3"> সুশাসন ও স্বচ্ছতা :</td>
                </tr>
                <tr>
                    <td style="">ক)</td>
                    <td style="width:30%"> প্রকল্পটি এলাকার জনগণ এবং সংশ্লিষ্ট সরকারি ও
                        বেসরকারি ব্যক্তিবর্গের সাথে পরামর্শক্রমে কিংবা মাঠ জরিপের
                        মাধ্যমে প্রণয়ন করা হয়েছে কিনা, হলে সংক্ষিপ্ত বর্ণনা (প্রমাণক)
                    </td>
                    <td>

                        @if(!$fd6GovernanceAndTransparency)

                        @else

                        {{ $fd6GovernanceAndTransparency->private_individuals_advice }}

                        @endif


                    </td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td style="width:30%">অন্যান্য এনজিও এবং সরকারি চলমান কর্মকান্ড (যদি
                        থাকে) বিবেচনান্তে কাজ ও কর্ম - এলাকার দৈত্বতা এড়ানোর কি কি
                        ব্যবস্থা গৃহীত হয়েছে।
                    </td>
                    <td>
                        @if(!$fd6GovernanceAndTransparency)

                        @else
                        {{ $fd6GovernanceAndTransparency->govt_ongoing_activities }}
                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="">গ)</td>
                    <td style="width:30%"> এ প্রকল্পটি বা একই ধরণের প্রকল্প ইতোপূর্বে
                        দাখিল করা হয়েছিল কি না সরকার কর্তৃক তা অনুমোদিত বা পরবর্তীতে
                        বাতিল করা হয়েছিল কি না:
                    </td>
                    <td>

                        @if(!$fd6GovernanceAndTransparency)

                        @else

                        {{ $fd6GovernanceAndTransparency->similar_project_run_previously }}

                        @endif

                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="">ঘ)</td>
                    <td colspan="2" style="width:30%"> সংস্থা স্বেচ্ছায় বা তথ্য অধিকার
                        আইনের কারণে নিম্নবর্তীত তথ্যাবলী জনসম্মুখে প্রকাশ করতে ইচ্ছুক
                        কিনা (ডিসক্লোজার পলিসি ):
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="table table-bordered custom_table_border">
                            <tr>
                                <td>ত্রু নং</td>
                                <td>তথ্যাবলী</td>
                                <td>হ্যা/না</td>

                            </tr>
                            <tr>
                                <td>০১</td>
                                <td>প্রকল্প ছক ৮ নং ফরমে</td>
                                <td>

                                    @if(!$fd6GovernanceAndTransparency)

                                    @else
                                    {{$fd6GovernanceAndTransparency->project_in_form_no_eight}}
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>নিরীক্ষা প্রতিবেদন</td>
                                <td>
                                    @if(!$fd6GovernanceAndTransparency)

                                    @else
                                    {{ $fd6GovernanceAndTransparency->audit_report}}
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td>০৩</td>
                                <td>বার্ষিক প্রতিবেদন</td>
                                <td>
                                    @if(!$fd6GovernanceAndTransparency)

                                    @else
                                    {{$fd6GovernanceAndTransparency->annual_report }}

                                    @endif

                                </td>

                            </tr>
                            <tr>
                                <td>০৪</td>
                                <td>প্রত্যেক কর্ম- এলাকার বাজেটসহ কর্মপরিকল্পনা</td>
                                <td>

                                    @if(!$fd6GovernanceAndTransparency)

                                    @else

                                    {{ $fd6GovernanceAndTransparency->action_plan_with_budget }}
@endif
                                </td>

                            </tr>
                            <tr>
                                <td>০৫</td>
                                <td>উপকারভোগীদের ডাটাবেইজ</td>
                                <td>

                                    @if(!$fd6GovernanceAndTransparency)

                                    @else

                                    {{ $fd6GovernanceAndTransparency->beneficiary_database }}

                                    @endif


                                </td>

                            </tr>
                            <tr>
                                <td>০৬</td>
                                <td>প্রকল্পের বিস্তারিত ফলাফল</td>
                                <td>

                                    @if(!$fd6GovernanceAndTransparency)

                                    @else
                                    {{ $fd6GovernanceAndTransparency->detailed_results_of_the_project }}
@endif

                                </td>

                            </tr>
                            <tr>
                                <td>০৭</td>
                                <td>অভিযোগ বহি ও অভিযোগ নিম্পত্তি</td>
                                <td>

                                    @if(!$fd6GovernanceAndTransparency)

                                    @else

                                    {{ $fd6GovernanceAndTransparency->complaints_detail}}

                                    @endif

                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" style="">ঙ)</td>
                    <td colspan="2" style="width:30%"> RTI বিষয়ক তথ্যাদি :
                    </td>
                </tr>
                <tr>
                    <td style="width:30%">ক. ফোকাল পয়েন্ট এর নাম, মোবাইল, ইমেইল
                        নম্বরসহ
                    </td>
                    <td>
                        @if(!$fd6GovernanceAndTransparency)

                        @else

                        {{ $fd6GovernanceAndTransparency->focal_point_name_mobile_email }}

                        @endif


                    </td>
                </tr>
                <tr>
                    <td style="width:30%">খ. তথ্য অধিকার বিষয়ক অনলাইন প্রশিক্ষণ রয়েছে
                        কিনা? করে থাকলে তার প্রমাণক:
                    </td>
                    <td>
                        @if(!$fd6GovernanceAndTransparency)

                        @else

                        {{ $fd6GovernanceAndTransparency->online_training }}

                        @endif

                    </td>
                </tr>

                <!--FD06 Section 10-->

                @if(!$fd6StepThree)

                <tr>
                    <td rowspan="4" style="">১০</td>
                    <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
                        সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
                        হবে :
                    </td>
                </tr>
                <tr>
                    <td style="">ক)</td>
                    <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
                        লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
                        নিরীক্ষা প্রতিবেদন দাখিল
                        ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="">গ)</td>
                    <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
                        গ্রহণের কারণসমূহ
                    </td>
                    <td></td>
                </tr>

                <!--FD06 Section 11-->

                <tr>
                    <td style="">১১</td>
                    <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
                    <td></td>
                </tr>
                <tr>
                    <td style=""> ১১.১</td>
                    <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="">১২</td>
                    <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
                        ব্যয় বিভাজন (বিস্তারিত)
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td style=""> ১৩</td>
                    <td colspan="2">
                        প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style=""> ১৪</td>
                    <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
                        প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
                    </td>
                    <td></td>
                </tr>

                @else

                <tr>
                    <td rowspan="4" style="">১০</td>
                    <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
                        সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
                        হবে :
                    </td>
                </tr>
                <tr>
                    <td style="">ক)</td>
                    <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
                        লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
                    </td>
                    <td>{{ $fd6StepThree->previous_project_detail }}</td>
                </tr>
                <tr>
                    <td style="">খ)</td>
                    <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
                        নিরীক্ষা প্রতিবেদন দাখিল
                        ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
                    </td>
                    <td>{{ $fd6StepThree->receipt_of_audit_report }}</td>
                </tr>
                <tr>
                    <td style="">গ)</td>
                    <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
                        গ্রহণের কারণসমূহ
                    </td>
                    <td>{{ $fd6StepThree->new_phase_project }}</td>
                </tr>

                <!--FD06 Section 11-->

                <tr>
                    <td style="">১১</td>
                    <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
                    <td>



                        @if(empty($fd6StepThree->detailed_budget_statement))


                        @else
                        সংযুক্ত
                         @endif
                    </td>
                </tr>
                <tr>
                    <td style=""> ১১.১</td>
                    <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
                    <td>{{ $fd6StepThree->annual_allocation_to_beneficiaries }}</td>
                </tr>
                <tr>
                    <td style="">১২</td>
                    <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
                        ব্যয় বিভাজন (বিস্তারিত)
                    </td>
                    <td>
                        @if(empty($fd6StepThree->project_implementation_cost))


                        @else
                        সংযুক্ত
                         @endif
                    </td>
                </tr>
                <tr>
                    <td style=""> ১৩</td>
                    <td colspan="2">
                        প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
                    </td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6StepThree->ratio_of_expenditure) }}</td>
                </tr>
                <tr>
                    <td style=""> ১৪</td>
                    <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
                        প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
                    </td>
                    <td>{{ $fd6StepThree->project_benifit }}</td>
                </tr>

                @endif
                 <!--FD06 Section Shonglognni-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’ক’’</center></h3>
</td>
</tr>
<tr>
<td rowspan="2" style="">ক)</td>
<td colspan="3"> পার্টনার এনজিও/সংস্থার বিস্তারিত তথ্য</td>
</tr>

<tr>
<td colspan="3">

<div class="table-responsive" id="tableAjaxDataPartner">

<table class="table table-bordered custom_table_border"  id="">
<tr>
<td>পার্টনার এনজিওর নাম ও ঠিকানা (টেলিফোন, মোবাইল, ইমেইল
    নম্বরসহ)
</td>
<td>এনজিও ব্যুরোর নিবন্ধন নং ও মেয়াদ :</td>
<td>পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য
    কার্যক্রমসমূহ (বিস্তারিত)
</td>
<td>কর্ম এলাকা (সম্ভাব্য ইউনিয়ন/ওয়ার্ড পর্যন্ত)</td>
<td>বাজেট</td>
<td>সম্পাদনের সময়সীমা</td>
<td>উপকারভোগী</td>

</tr>
@foreach ($partnerDataPostList as $partnerDataPostLists)


<tr>
<td>
    <ul>
        <li>পার্টনার এনজিওর নাম: {{ $partnerDataPostLists->partner_ngo_name }}</li>
        <li>ঠিকানা: {{ $partnerDataPostLists->partner_ngo_address }}</li>
        <li>টেলিফোন: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_telephone )}}</li>
        <li>মোবাইল: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_mobile) }}</li>
        <li>ইমেইল: {{ $partnerDataPostLists->partner_ngo_email }}</li>
    </ul>
</td>
<td>
    <ul>
        <li>এনজিও ব্যুরোর নিবন্ধন নং : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_reg_name) }}</li>
        <li>মেয়াদ: {{App\Http\Controllers\NGO\CommonController::englishToBangla( $partnerDataPostLists->partner_ngo_duration )}}</li>
    </ul>
</td>
<td>{!! $partnerDataPostLists->partner_ngo_work_detail !!}</td>
<td><ul>
    <li>বিভাগ: {{ $partnerDataPostLists->division_name }}</li>
    <li>জেলা: {{ $partnerDataPostLists->district_name }}</li>
    <li>সিটি কর্পোরেশন: {{ $partnerDataPostLists->city_corparation_name }}</li>
    <li>উপজেলা: {{ $partnerDataPostLists->upozila_name }}</li>
    <li>থানা: {{ $partnerDataPostLists->thana_name }}</li>
    <li>পৌরসভা/ইউনিয়ন: {{ $partnerDataPostLists->municipality_name }}</li>
    <li>ওয়ার্ড: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->ward_name) }}</li>
</ul></td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->budget_detail) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->execution_deadline) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->beneficiary) }}</td>

</tr>
@endforeach
</table>

</div>
</td>
</tr>
<tr>
<td rowspan="8" style="">খ)</td>
<td colspan="3">মোট অনুদানের পরিমান</td>
</tr>

@if(!$fd6AdjoiningAList)
<tr>
    <td style="">০১</td>
    <td>নগদ</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০২</td>
    <td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৩</td>
    <td> পণ্য/দ্রব্য সহযোগিতা</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৪</td>
    <td>অন্যান্য</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৫</td>
    <td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৬</td>
    <td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৭</td>
    <td>চুক্তিপত্রের কপি</td>
    <td></td>
    </tr>

@else
<tr>
<td style="">০১</td>
<td>নগদ</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->grant_amount_in_cash) }}</td>
</tr>
<tr>
<td style="">০২</td>
<td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->strategic_coperation) }}</td>
</tr>
<tr>
<td style="">০৩</td>
<td> পণ্য/দ্রব্য সহযোগিতা</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->help_with_product) }}</td>
</tr>
<tr>
<td style="">০৪</td>
<td>অন্যান্য</td>
<td>{{ $fd6AdjoiningAList->other }}</td>
</tr>
<tr>
<td style="">০৫</td>
<td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->project_implementation_area) }}</td>
</tr>
<tr>
<td style="">০৬</td>
<td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->other_information_note) }}</td>
</tr>
<tr>
<td style="">০৭</td>
<td>চুক্তিপত্রের কপি</td>
<td>
@if(empty($fd6AdjoiningAList->copy_of_contract))


@else

সংযুক্ত
@endif
</td>
</tr>
@endif

<!--FD06 Section Shonglognni kh-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’খ’’</center></h3>
</td>
</tr>
<tr>
<td rowspan="2" style="">১</td>
<td colspan="3"> প্রকল্পের কর্মকর্তা-কর্মচারীদের বিস্তারিত বিবরণ
(দেশি ও বিদেশী উভয়ই)
</td>
</tr>
<tr>
<td colspan="3">

<div class="table-reponsive" id="tableAjaxDataEmployee">

<table class="table table-bordered custom_table_border" >
<tr>
<td rowspan="2">নাম ও পদবি</td>
<td rowspan="2">জাতীয়তা</td>
<td rowspan="2">মেয়াদ (জনমাস)</td>
<td rowspan="2">শিক্ষাগত যোগ্যতা</td>
<td rowspan="2">অভিজ্ঞতা</td>
<td rowspan="2">দায়িত্বসমূহ</td>
<td colspan="2">বেতন-ভাতাদি</td>

</tr>
<tr>
<td>এই প্রকল্প হতে</td>
<td>অন্যান্য প্রকল্প হতে</td>

</tr>
@foreach($employeeDataPostList as $employeeDataPostLists)
<tr>
<td>
    <ul>
        <li>নাম: {{ $employeeDataPostLists->name }}</li>
        <li>পদবি: {{ $employeeDataPostLists->designation }}</li>
    </ul>
</td>
<td>{{ $employeeDataPostLists->nationality }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->duration) }}</td>
<td>{{ $employeeDataPostLists->educational_qualification }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->experience) }}</td>
<td>{{ $employeeDataPostLists->responsibility }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->salary_from_this_project) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->salary_from_other_project)}}</td>

</tr>
@endforeach
</table>


</div>

<small>টীকা : বেতন ভাতাদি বলতে বেতন , বাড়ী ভাড়া , চিকিৎসা ও
বেতনের সাথে সংশ্লিষ্ট অন্যান্য সকল আর্থিক সুবিধা অন্তর্ভুক্ত
হবে। বেতন-ভাতাদি বাংলাদেশী টাকায় মাসভিত্তিক দেখতে হবে।
রুকল্প -২০২১ এর আলোকে অধিক কর্মসংস্থানের মাধ্যমে দ্রুত
দারিদ্র হ্রাসের লক্ষ্যে বিদেশী নাগরিক নিয়োগ নিরুৎসাহিত করা
হয়েছে। প্রকল্পের চাহিদা মোতাবেক উচ্চতর টেকনিক্যাল/ বেশেষায়িত
বাংলাদেশি বিশেষজ্ঞ পাওয়া না গেলেই শুধুমাত্র বিদেশী বিশেষজ্ঞ
বিবেচ্য। </small>

</td>
</tr>

<!--FD06 Section Shonglognni Ga-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’গ’’</center></h3>
</td>
</tr>

<tr>
<td colspan="4"> নির্মাণ কাজের বিস্তারিত বিবরণ (প্রযোজ্যক্ষেত্রে )
<br>
(ভৌত নির্মাণের বিস্তারিত বর্ণনা)
</td>
</tr>
@if(!$fd6AdjoiningCList)
<tr>
    <td style="">ক)</td>
    <td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
    </td>
    <td></td>
    </tr>
    <tr>
    <td style="">খ)</td>
    <td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
    <td></td>
    </tr>
    <tr>
    <td style="">গ)</td>
    <td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
    সাক্ষরসহ)
    </td>
    <td></td>
    </tr>
    <tr>
    <td style="">ঘ)</td>
    <td colspan="2"> নির্মাণের লে-আউট প্লান</td>
    <td></td>
    </tr>
    <tr>
    <td style="">ঙ)</td>
    <td colspan="2"> প্রাক্কলিক ব্যয়</td>
    <td></td>
    </tr>

@else
<tr>
<td style="">ক)</td>
<td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
</td>
<td>{{ $fd6AdjoiningCList->proof_of_land_ownership }}</td>
</tr>
<tr>
<td style="">খ)</td>
<td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
<td>{{ $fd6AdjoiningCList->land_development_tax }}</td>
</tr>
<tr>
<td style="">গ)</td>
<td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
সাক্ষরসহ)
</td>
<td>{{ $fd6AdjoiningCList->engineer_name }}
<br>
{{ $fd6AdjoiningCList->engineer_desi }}
<br>
<div class="mb-3">


<img src="{{ asset('/') }}{{ $fd6AdjoiningCList->engineer_sign }}"  />

</div>

<div class="mb-3">

<img src="{{ asset('/') }}{{ $fd6AdjoiningCList->engineer_seal }}"  />
</div>

</td>
</tr>
<tr>
<td style="">ঘ)</td>
<td colspan="2"> নির্মাণের লে-আউট প্লান</td>
<td>@if(empty($fd6AdjoiningCList->construction_layout))


@else
সংযুক্ত
@endif</td>
</tr>
<tr>
<td style="">ঙ)</td>
<td colspan="2"> প্রাক্কলিক ব্যয়</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningCList->estimated_expenses) }}</td>
</tr>
@endif

<!--FD06 Section Shonglognni Gha-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’ঘ’’</center></h3>
</td>
</tr>

<tr>
<td colspan="4"> প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড
প্রদর্শন বিষয়ক তথ্যাদি :
</td>
</tr>
@if(!$fd6AdjoiningDList)
<tr>
    <td style="">ক)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td></td>
    </tr>
    <tr>
    <td style="">খ)</td>
    <td colspan="2"> প্রকল্পের মেয়াদকাল</td>
    <td></td>
    </tr>
    <tr>
    <td style="">গ)</td>
    <td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
    <td></td>
    </tr>
    <tr>
    <td style="">ঘ)</td>
    <td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
    <td></td>
    </tr>
    <tr>
    <td style="">ঙ)</td>
    <td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
    <td></td>
    </tr>
    <tr>
    <td style="">চ)</td>
    <td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
    <td></td>
    </tr>
    <tr>
    <td style="">ছ)</td>
    <td colspan="2">দাতা সংস্থার নাম</td>
    <td></td>
    </tr>
@else
<tr>
<td style="">ক)</td>
<td colspan="2"> প্রকল্পের নাম</td>
<td>{{ $fd6AdjoiningDList->prokolpo_name }}</td>
</tr>
<tr>
<td style="">খ)</td>
<td colspan="2"> প্রকল্পের মেয়াদকাল</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->prokolpo_duration) }}</td>
</tr>
<tr>
<td style="">গ)</td>
<td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_allocation) }}</td>
</tr>
<tr>
<td style="">ঘ)</td>
<td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_allocation_prokolpo_area) }}</td>
</tr>
<tr>
<td style="">ঙ)</td>
<td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_benificiare) }}</td>
</tr>
<tr>
<td style="">চ)</td>
<td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_benificiare_prokolpo_area) }}</td>
</tr>
<tr>
<td style="">ছ)</td>
<td colspan="2">দাতা সংস্থার নাম</td>
<td>{{ $fd6AdjoiningDList->donor_name }}</td>
</tr>
@endif

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’ঙ’’</center></h3>
</td>
</tr>

<tr>
<td colspan="4">সমাপ্ত অনুরূপ প্রকল্পের অর্জন
</td>
</tr>


@if(!$fd6AdjoiningEList)
<tr>
    <td style="">০১)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০২)</td>
    <td colspan="2"> প্রকল্পের মেয়াদ</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৩)</td>
    <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৪)</td>
    <td colspan="2"> প্রকল্প মূল্য</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৫)</td>
    <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
    প্রমাণক
    </td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৬)</td>
    <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
    <td></td>
    </tr>
    <tr>
    <td style="">০৭)</td>
    <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
    <td></td>
    </tr>
@else
<tr>
<td style="">০১)</td>
<td colspan="2"> প্রকল্পের নাম</td>
<td>{{ $fd6AdjoiningEList->prokolpo_name }}</td>
</tr>
<tr>
<td style="">০২)</td>
<td colspan="2"> প্রকল্পের মেয়াদ</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningEList->prokolpo_duration) }}</td>
</tr>
<tr>
<td style="">০৩)</td>
<td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6AdjoiningEList->ngo_permission_date))) }}</td>
</tr>
<tr>
<td style="">০৪)</td>
<td colspan="2"> প্রকল্প মূল্য</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningEList->prokolpo_price) }}</td>
</tr>
<tr>
<td style="">০৫)</td>
<td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
প্রমাণক
</td>
<td>

@if(empty($fd6AdjoiningEList->prokolpo_audit_report))


@else
সংযুক্ত
@endif

<br><br>
@if(empty($fd6AdjoiningEList->prokolpo_final_report))


@else
সংযুক্ত
@endif

</td>
</tr>
<tr>
<td style="">০৬)</td>
<td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
<td>

@if(empty($fd6AdjoiningEList->prokolpo_local_audit_report))


@else

সংযুক্ত
@endif
</td>
</tr>
<tr>
<td style="">০৭)</td>
<td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
<td>{{ $fd6AdjoiningEList->development_detail }}</td>
</tr>
@endif
<tr>
<td colspan="4">


<div class="table-reponsive" id="tableAjaxDataFormSix">
<table class="table table-bordered custom_table_border">
<tr>
<td rowspan="2">কার্যাবলী (ফরম-৬ অনুযায়ী)</td>
<td colspan="2">ভৌত</td>
<td colspan="2">আর্থিক</td>
<td rowspan="2">মন্তব্য</td>

</tr>
<tr>
<td>লক্ষমাত্রা</td>
<td>অর্জন</td>
<td>বরাদ্দ</td>
<td>ব্যয়</td>
</tr>
@foreach($detailAsPerForm6 as $detailAsPerForm6s)
<tr>
<td>{{ $detailAsPerForm6s->work_detail }}</td>
<td>{{ $detailAsPerForm6s->physical_goals }}</td>
<td>{{ $detailAsPerForm6s->physical_achievment }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($detailAsPerForm6s->financial_allocation) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($detailAsPerForm6s->financial_cost) }}</td>
<td>{{ $detailAsPerForm6s->comment }}</td>

</tr>
@endforeach
</table>
</div>
</td>
</tr>

<!--FD06 Section Shonglognni Ca-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’চ’’</center></h3>
</td>
</tr>

<tr>
<td colspan="4">

<div class="d-flex justify-content-between">
<div>উপকরণের বিস্তারিত বর্ণনা (প্রযোজ্যক্ষেত্রে)
অফিস যন্ত্রপাতি, মেশিনপত্র ও যানবাহন।</div>
<div>


</div>
</td>
</tr>

<tr>
<td style="">০১)</td>
<td colspan="3"> আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা :</td>
</tr>
<tr>
<td colspan="4">
<div class="table-reponsive" id="adjoiningSixDataTable">
<table class="table table-bordered custom_table_border">
<tr>
<td>ক্রমিক নং</td>
<td>আইটেমের নাম</td>
<td>পরিমান</td>
<td>একক মূল্য</td>
<td>মোট ব্যায়</td>


</tr>
<?php

$totalExpense = 0;

?>

@foreach($fd6FurnitureEquipments as $key=>$fd6FurnitureEquipmentsList)
<input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

</tr>
<?php $totalExpense = $totalExpense + $fd6FurnitureEquipmentsList->item_total_price  ?>
@endforeach
<tr>
<td colspan="4">সর্বমোট </td>
<td colspan="1">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpense) }}</td>
</tr>

</table>

</div>
</td>
</tr>
<tr>
<td style="">০২)</td>
<td colspan="3">  মেশিনপত্রের বর্ণনা </td>
</tr>
<tr>
<td colspan="4">
<div class="table-reponsive" id="descriptionOfMachineryTable">
<table class="table table-bordered custom_table_border">
<tr>
<td>ক্রমিক নং</td>
<td>আইটেমের নাম</td>
<td>পরিমান</td>
<td>একক মূল্য</td>
<td>মোট ব্যায়</td>


</tr>
<?php

$totalExpenseOne = 0;

?>

@foreach($fd6FurnitureEquipmentsOne as $key=>$fd6FurnitureEquipmentsList)
<input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

</tr>
<?php $totalExpenseOne = $totalExpenseOne + $fd6FurnitureEquipmentsList->item_total_price  ?>
@endforeach
<tr>
<td colspan="4">সর্বমোট </td>
<td colspan="1">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpenseOne) }}</td>
</tr>

</table>


</div>
</td>
</tr>
<tr>
<td style="">০৩)</td>
<td colspan="3">  যানবাহনের বর্ণনা </td>
</tr>
<tr>
<td colspan="4">
<div class="table-reponsive" id="descriptionOfVehicle">
<table class="table table-bordered custom_table_border">
<tr>
<td>ক্রমিক নং</td>
<td>আইটেমের নাম</td>
<td>পরিমান</td>
<td>একক মূল্য</td>
<td>মোট ব্যায়</td>

</tr>
<?php

$totalExpenseTwo = 0;

?>

@foreach($fd6FurnitureEquipmentsTwo as $key=>$fd6FurnitureEquipmentsList)
<input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

</tr>
<?php $totalExpenseTwo = $totalExpenseTwo + $fd6FurnitureEquipmentsList->item_total_price  ?>
@endforeach
<tr>
<td colspan="4">সর্বমোট </td>
<td colspan="1">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpenseTwo) }}</td>
</tr>

</table>

</div>
</td>
</tr>
<tr>
<td style="">০৪)</td>
<td colspan="3">প্রকল্প সমাপ্ত হওয়ার পরে এই অফিস যন্ত্রপাতি, মেশিনপত্র এবং যানবাহনগুলো কিভাবে ব্যবহার হবে সেই বিষয়ে বর্ণনা :

    @if(!$fd6AdjoiningEList)

    @else

    @if(empty($fd6AdjoiningEList->after_end_prokolpo))
    @else
    সংযুক্ত
    @endif

    @endif

</td>

</tr>

<!--FD06 Section Shonglognni Cha-->

<tr>
<td colspan="4">
<h3 class="text-center mt-2"><center>সংলগ্নী ‘’ছ’’<center></h3>
</td>
</tr>

<tr>
<td colspan="4">প্রশিক্ষণ, সেমিনার, ওয়ার্কশপ ও কনফারেন্সের সম্ভাব্য দিনপুঞ্জি
</td>
</tr>
<tr>
<td colspan="4">

<div class="table-reponsive" id="dinpunjjiTable">
<table class="table table-bordered custom_table_border">
<tr>
<td>ত্রু: নং</td>
<td>শিরোনাম/বিষয়</td>
<td>তারিখ,সময় ও স্থান (সম্ভাব্য)</td>
<td>সংখ্যা</td>
<td>অংশগ্রহণকারীর সংখ্যা</td>
<td>বাজেট</td>
<td>মন্তব্য</td>

</tr>

@foreach($fd6AdjoiningGList as $key=>$fd6AdjoiningGLists)
<tr>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
<td>{{ $fd6AdjoiningGLists->subject }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_date) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_time) }} ও {{ $fd6AdjoiningGLists->seminer_place }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_number) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_perticipantion) }}</td>
<td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_budget) }}</td>
<td>{{ $fd6AdjoiningGLists->comment }}</td>

</tr>
@endforeach
</table>

</div>
</td>
</tr>
            </table>
        </div>
    </div>
</div>
</div>


        <!-- end new code --->



        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd6FormList->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fd6FormList->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd6FormList->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fd6FormList->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
