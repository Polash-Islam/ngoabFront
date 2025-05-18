<table class="table table-bordered">
    <tr style="text-align: center">
        <th>ক্র : নং :</th>
        <th>কার্যক্রম</th>
        <th>প্রাক্কলিত ব্যয় </th>
        <th>কর্ম এলাকা<br> (জেলা ,উপজেলা )</th>
        <th>সময়সীমা </th>
        <th>উপকারভোগীর সংখ্যা </th>
        <th></th>
    </tr>



    <?php

    $totalEstimatedExpense = 0;
    $totalBenificiare = 0;

    ?>

    @foreach($sectorWiseExpenditureList as $key=>$sectorWiseExpenditureLists)


    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $sectorWiseExpenditureLists->activities }}</td>
        <td>{{ $sectorWiseExpenditureLists->estimated_expenses }}</td>
        <td>

            জেলা: {{ $sectorWiseExpenditureLists->work_area_district }}
            <br>


            উপজেলা: {{ $sectorWiseExpenditureLists->work_area_sub_district }}

        </td>
        <td>{{ $sectorWiseExpenditureLists->time_limit }}</td>
        <td>{{ $sectorWiseExpenditureLists->number_of_beneficiaries }}</td>
        <td>


            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoBudget{{ $sectorWiseExpenditureLists->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fc2Form._partial.stepTwoBudgetModalEdit')


            <button type="button" onclick="deleteTagBudget({{ $sectorWiseExpenditureLists->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>


        </td>

    </tr>
    <?php

    $totalEstimatedExpense = $totalEstimatedExpense + $sectorWiseExpenditureLists->estimated_expenses;
    $totalBenificiare = $totalBenificiare + $sectorWiseExpenditureLists->number_of_beneficiaries;

    ?>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td>মোট - {{ $totalEstimatedExpense }}</td>
        <td></td>
        <td></td>
        <td>মোট - {{ $totalBenificiare }}</td>
        <td></td>
    </tr>


</table>
