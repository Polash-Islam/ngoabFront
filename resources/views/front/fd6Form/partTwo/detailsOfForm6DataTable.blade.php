<table class="table table-bordered">
    <tr>
        <td rowspan="2">কার্যাবলী (ফরম-৬ অনুযায়ী)</td>
        <td colspan="2">ভৌত</td>
        <td colspan="2">আর্থিক</td>
        <td rowspan="2">মন্তব্য</td>
        <td rowspan="2"></td>
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
        <td>{{ $detailAsPerForm6s->financial_allocation }}</td>
        <td>{{ $detailAsPerForm6s->financial_cost }}</td>
        <td>{{ $detailAsPerForm6s->comment }}</td>
        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#formSixModalEdit{{ $detailAsPerForm6s->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd6Form.partTwo.formSixModalEdit')


            <button type="button" onclick="deleteTagForm6({{ $detailAsPerForm6s->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>

        </td>
    </tr>
    @endforeach
</table>
