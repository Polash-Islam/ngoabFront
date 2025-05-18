<table class="table table-bordered text-center" id="">
    <tr>

        <th >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</th>
        <th >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</th>
        <th >প্রকৃত ব্যয়</th>
        <th >পার্থক্য </th>
        <th >শতকরা হার (%)</th>
        <th >পার্থক্য এর  কারণ</th>
        <th ></th>
    </tr>

    @foreach($expenditureDetails as $expenditureDetail)
    <tr>

        <td>{!! $expenditureDetail->expenditure_sectors !!}</td>
        <td style="width:5%">{{ $expenditureDetail->approved_budget_money }}</td>
        <td style="width:5%">{{ $expenditureDetail->actual_cost }}</td>
        <td>{!! $expenditureDetail->difference !!}</td>
        <td style="width:5%">{{ $expenditureDetail->percentage }}</td>
        <td>{!! $expenditureDetail->reason_for_the_difference !!}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#sectorsOfExpenditureModalEdit{{ $expenditureDetail->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fdFourOneForm._partial.sectorsOfExpenditureModalEdit')


            <button type="button" onclick="deleteTagExpendature({{ $expenditureDetail->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>
        </td>


    </tr>
    @endforeach

</table>
