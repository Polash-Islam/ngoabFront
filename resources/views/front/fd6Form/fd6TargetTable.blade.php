<table class="table table-bordered">
    <tr>
        <th rowspan="2">ক্রমিক নং</th>
        <th rowspan="2">কার্যক্রমের নাম</th>
        <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
        <th rowspan="2">অর্জনযোগ্য(%)</th>
        <th rowspan="2">উপকারভোগীর সংখ্যা</th>
        <th rowspan="2">মন্তব্য (যদি থাকে)</th>
        <th rowspan="2"></th>
    </tr>
    <tr>
        <th>বছর</th>
        <th>বাস্তব</th>
        <th>আর্থিক</th>
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
        <td>{{ $fd2AllFormLastYearDetails->target_year }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_target_real }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_target_financial }}</td>
        <td>{{ $fd2AllFormLastYearDetails->last_year_achievment_real }}</td>
        <td>{{ $fd2AllFormLastYearDetails->total_benificiari }}</td>
        <td>{{ $fd2AllFormLastYearDetails->comment }}</td>
        <td>
            <div class="d-flex justify-content-center">
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoTargrtModalEdit{{ $fd2AllFormLastYearDetails->id }}" >
                    <i class="fa fa-pencil"></i>
                </button>

                @include('front.fd6Form._partial.prokolpoTargetModalEdit')

                <button type="button" style="margin-left: 5px;" onclick="deleteprokolpoTarget({{ $fd2AllFormLastYearDetails->id}})" class="btn btn-sm btn-outline-danger"><i
                    class="bi bi-trash"></i></button>
            </div>

        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="6">মোট উপকারভোগীর সংখ্যা-</td>
        <td>{{ $totalBeni }}</td>
    </tr>
</table>


