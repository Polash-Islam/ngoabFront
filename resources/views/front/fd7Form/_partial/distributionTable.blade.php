<table class="table table-bordered" >

    <tr style="text-align: center;">
        <th>ক্র: নং :</th>
        <th>ধরণ</th>
        <th>জেলা</th>
        <th>উপজেলা</th>

        <th>দ্রব্যাদির বর্ণনা</th>
        <th>পরিমাণ</th>
        <th>একক মূল্য</th>
        <th>মোট টাকার পরিমাণ</th>
        <th>মোট উপকারভোগীর সংখ্যা</th>
        <th>মন্তব্য</th>
        <th></th>
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
        <td>{{ $distributionListOnes->product_quantity }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
        <td>{{ $distributionListOnes->unit_price }}</td>
        <td>{{ $distributionListOnes->total_amount }}</td>
        <td>{{ $distributionListOnes->total_beneficiaries }}</td>
        <td>{{ $distributionListOnes->comment }}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary" type="button" id="exampleModaleditnew{{ $distributionListOnes->id }}" >
                <i class="fa fa-pencil"></i>
            </button>

            

            <button type="button" onclick="deleteTagStepFive({{ $distributionListOnes->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>
        </td>

   </tr>
   @endforeach
   @if(count($distributionListOne) == 0)

   @else
   <tr>
    <td></td>
    <td>প্রাক মোট</td>
    <td></td>
    <td></td>

    <td></td>
    <td>{{ $totalProductQuantityOne }}</td>
    <td>{{ $totalUnitPriceOne }}</td>
    <td>{{ $totalTotalAmountOne }}</td>
    <td>{{ $totalTotalBeneficiariesOne }}</td>
    <td></td>
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
    <td>{{ $distributionListOnes->product_quantity }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
    <td>{{ $distributionListOnes->unit_price }}</td>
    <td>{{ $distributionListOnes->total_amount }}</td>
    <td>{{ $distributionListOnes->total_beneficiaries }}</td>
    <td>{{ $distributionListOnes->comment }}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary" type="button" id="exampleModaleditnew{{ $distributionListOnes->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            

            <button type="button" onclick="deleteTagStepFive({{ $distributionListOnes->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>
        </td>

   </tr>
   @endforeach
   @if(count($distributionListTwo) == 0)

   @else
   <tr>
    <td></td>
    <td>প্রাক মোট</td>
    <td></td>
    <td></td>

    <td></td>
    <td>{{ $totalProductQuantityTwo }}</td>
    <td>{{ $totalUnitPriceTwo }}</td>
    <td>{{ $totalTotalAmountTwo }}</td>
    <td>{{ $totalTotalBeneficiariesTwo }}</td>
    <td></td>
    <td></td>
   </tr>
   @endif
   <tr>
    <td></td>
    <td colspan="2">সর্বমোট = </td>

    <td></td>

    <td></td>
    <td>{{ $totalProductQuantityTwo + $totalProductQuantityOne  }}</td>
    <td>{{ $totalUnitPriceTwo + $totalUnitPriceOne }}</td>
    <td>{{ $totalTotalAmountTwo+$totalTotalAmountOne }}</td>
    <td>{{ $totalTotalBeneficiariesTwo+$totalTotalBeneficiariesOne }}</td>
    <td></td>
    <td></td>
   </tr>
</table>
