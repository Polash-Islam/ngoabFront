<table class="table table-bordered">

    @if($fd6FormEstimateListMax == 1)

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-between">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormEstimateListFirst->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @if(!$fd6FormEstimateListFirst)

            @else
            <a type="a" id="1" onclick="deleteTagExp({{$fd6FormEstimateListFirst->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif

        </div></th>

        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
       
    </tr>
    <tr style="text-align: center;">
        <th>

            @if(empty($fd6FormEstimateListFirst->prokolpo_year_grant_start_date))

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grants_received_from_abroad) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grants_received_from_abroad) }}</td>
        <td rowspan="3">{{$fd6FormEstimateListComment}}</td>
       
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->donations_made_by_foreign_donors) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->donations_made_by_foreign_donors) }}</td>
       
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->local_grants) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->local_grants) }}</td>
        
    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grant_total) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grant_total) }}</td>
      
    </tr>

    @elseif($fd6FormEstimateListMax == 2)

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFirst)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormEstimateListFirst->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFirst)

            @else
            <a type="a" id="1" onclick="deleteTagExp({{$fd6FormEstimateListFirst->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif

        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListSecond)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormEstimateListSecond->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListSecond)

            @else
            <a type="a" id="2" onclick="deleteTagExp({{$fd6FormEstimateListSecond->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
@endif

        </div></th>
        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
      
    </tr>
    <tr style="text-align: center;">
        <th>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
       
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

            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFlfdl + $getTheVlueSelfdl) }}
        
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
            ?>
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFlfd + $getTheVlueSelfd) }}
        
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFl + $getTheVlueSel) }}
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueF + $getTheVlueSe) }}
        
        
        </td>
    
    </tr>

    @elseif($fd6FormEstimateListMax == 3)

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFirst)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormEstimateListFirst->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFirst)

            @else
            <a type="a" id="1" onclick="deleteTagExp({{$fd6FormEstimateListFirst->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif

        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListSecond)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormEstimateListSecond->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListSecond)

            @else
            <a type="a" id="2" onclick="deleteTagExp({{$fd6FormEstimateListSecond->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
@endif

        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListThird)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormEstimateListThird->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListThird)

            @else
            <a type="a" id="3" onclick="deleteTagExp({{$fd6FormEstimateListThird->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif


        </div></th>


        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
     
    </tr>
    <tr style="text-align: center;">
        <th>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>
            @if(!$fd6FormEstimateListThird)

            @else
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
       
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

            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFlfdl + $getTheVlueSelfdl + $getTheVlueThlfdl) }}
        
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
            ?>
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFlfd + $getTheVlueSelfd + $getTheVlueThlfd) }}
        
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFl + $getTheVlueSel + $getTheVlueThl) }}
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueF + $getTheVlueSe +$getTheVlueTh) }}
        
        
        </td>
    
    </tr>


    @elseif($fd6FormEstimateListMax == 4)

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFirst)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormEstimateListFirst->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFirst)

            @else
            <a type="a" id="1" onclick="deleteTagExp({{$fd6FormEstimateListFirst->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif

        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListSecond)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormEstimateListSecond->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListSecond)

            @else
            <a type="a" id="2" onclick="deleteTagExp({{$fd6FormEstimateListSecond->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
@endif

        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListThird)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormEstimateListThird->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListThird)

            @else
            <a type="a" id="3" onclick="deleteTagExp({{$fd6FormEstimateListThird->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif


        </div></th>
        <th>৪র্থ বছর <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFourth)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="4" id="{{$fd6FormEstimateListFourth->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFourth)

            @else
            <a type="a" id="4" onclick="deleteTagExp({{$fd6FormEstimateListFourth->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif


        </div></th>
       

        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
      
    </tr>
    <tr style="text-align: center;">
        <th>

            @if(!$fd6FormEstimateListFirst)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>

            @if(!$fd6FormEstimateListSecond)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>
            @if(!$fd6FormEstimateListThird)

            @else
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_end_date))) }}
        @endif
        </th>
        <th>
            @if(!$fd6FormEstimateListFourth)

            @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_end_date))) }}
        @endif
        
        </th>
   

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

            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFolfdl+$getTheVlueFlfdl + $getTheVlueSelfdl + $getTheVlueThlfdl) }}
        
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
            ?>
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFolfd + $getTheVlueFlfd + $getTheVlueSelfd + $getTheVlueThlfd) }}
        
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFol+$getTheVlueFl + $getTheVlueSel + $getTheVlueThl) }}
        
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
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFo + $getTheVlueF + $getTheVlueSe +$getTheVlueTh) }}
        
        
        </td>
    
    </tr>


    @elseif($fd6FormEstimateListMax == 5)

    <tr>
        <th rowspan="3" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFirst)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormEstimateListFirst->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFirst)

            @else
            <a type="a" id="1" onclick="deleteTagExp({{$fd6FormEstimateListFirst->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif

        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListSecond)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormEstimateListSecond->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListSecond)

            @else
            <a type="a" id="2" onclick="deleteTagExp({{$fd6FormEstimateListSecond->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
@endif

        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListThird)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormEstimateListThird->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListThird)

            @else
            <a type="a" id="3" onclick="deleteTagExp({{$fd6FormEstimateListThird->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif


        </div></th>
        <th>৪র্থ বছর <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFourth)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="4" id="{{$fd6FormEstimateListFourth->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFourth)

            @else
            <a type="a" id="4" onclick="deleteTagExp({{$fd6FormEstimateListFourth->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
                @endif


        </div></th>
        <th>৫ম বছর <div class="d-flex justify-content-between">

            @if(!$fd6FormEstimateListFifth)

            @else
            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="5" id="{{$fd6FormEstimateListFifth->id}}">
                <i class="fa fa-pencil"></i>
            </a>
            @endif
            @if(!$fd6FormEstimateListFifth)

            @else
            <a type="a" id="5" onclick="deleteTagExp({{$fd6FormEstimateListFifth->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
            @endif

        </div></th>
        <th rowspan="3">মোট</th>
        <th rowspan="3">মন্তব্য</th>

    </tr>
    <tr style="text-align: center;">
       
            <th>
    
                @if(!$fd6FormEstimateListFirst)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
            @endif
            </th>
            <th>
    
                @if(!$fd6FormEstimateListSecond)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
            @endif
            </th>
            <th>
                @if(!$fd6FormEstimateListThird)
    
                @else
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_end_date))) }}
            @endif
            </th>
            <th>
                @if(!$fd6FormEstimateListFourth)
    
                @else
                
                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_end_date))) }}
            @endif
            
            </th>
       
    
        
        <th>

            @if(!$fd6FormEstimateListFifth)
    
                @else
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_end_date))) }}
        @endif
        
        </th>
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
            $getTheVlueFo = 0;
        }else{
            $getTheVlueFif = $fd6FormEstimateListFifth->grant_total;
        }
            ?>
            
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFif+$getTheVlueFo + $getTheVlueF + $getTheVlueSe +$getTheVlueTh) }}
        
        
        </td>
    
    </tr>

    @else
    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর</th>
        <th>২য় বছর</th>
        <th>৩য় বছর</th>
        <th>৪র্থ বছর</th>
        <th>৫ম বছর</th>
        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
    </tr>
    <tr style="text-align: center;">
        <th>তারিখ</th>
        <th>তারিখ </th>
        <th>তারিখ</th>
        <th>তারিখ </th>
        <th>তারিখ</th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td rowspan="3"></td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td>মোট</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endif

</table>
