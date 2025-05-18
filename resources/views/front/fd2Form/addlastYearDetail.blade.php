<table class="table table-bordered">
    <tr style="text-align: center">
        <th rowspan="2">ক্রমিক নং</th>
        <th rowspan="2">কার্যক্রমের নাম </th>
        <th colspan="2">বিগত বছরের লক্ষ্যমাত্রা </th>
        <th colspan="2">অর্জন(%) </th>
        <th rowspan="2">উপকারভোগীর সংখ্যা </th>
        <th rowspan="2">মন্তব্য (যদি থাকে)</th>
        <th rowspan="2"></th>
    </tr>
    <tr style="text-align: center;">
        <th>বাস্তব</th>
        <th>আর্থিক </th>
        <th>বাস্তব</th>
        <th>আর্থিক </th>
    </tr>
    <?php

    $totalBeni = 0;

    ?>
    @foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
    <?php

$totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
    ?>
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_target_real }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_target_financial }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_achievment_real }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_achievment_financial }}</td>
        <td>{{ $fd2AllFormLastYearDetails->total_benificiari }}</td>

        <td>{{ $fd2AllFormLastYearDetails->comment }}</td>
        <td>

                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoAreaModalEdit{{ $fd2AllFormLastYearDetails->id }}" >
                    <i class="fa fa-pencil"></i>
                </button>

                @include('front.fd2Form.allFromLastYearDetailModal')

                <button type="button" onclick="deleteTagProkolpoArea({{ $fd2AllFormLastYearDetails->id}})" class="btn btn-sm btn-outline-danger"><i
                    class="bi bi-trash"></i></button>
            
        </td>
    </tr>
    @endforeach
    <tr>
        <th colspan="7">মোট উপকারভোগীর সংখ্যা - {{ $totalBeni }}</th>

        <td></td>
        <td></td>
    </tr>

</table>
