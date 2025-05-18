

<table class="table table-bordered">
    <tr>
        <th colspan="8">গ্রহনসংক্রান্ত তথ্যাদি</th>
    </tr>
    <tr style="text-align: center;">
        <th>তারিখ</th>
        <th>যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম ও ঠিকানা</th>
        <th>গ্রহণের প্রকৃত (শুল্কমূক্তভাবে /শুল্ক পরিশোধ করে গ্রহণকৃত)</th>
        <th>জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য</th>
        <th>গ্রহণকৃত সামগ্রীর পরিমান</th>
        <th>গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য</th>
        <th>প্রতিশ্রুতি প্রদানের তারিখ ও ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ</th>
        <th></th>
    </tr>
@foreach($receivedGoodList as $receivedGoodLists)
    <tr>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->source_received_date) }}</td>
        <td>{{ $receivedGoodLists->source_of_goods_name }} ও {{ $receivedGoodLists->source_of_goods_address }}</td>

        <td>{{ $receivedGoodLists->actual_of_receipt_source }}</td>
        <td>{!! $receivedGoodLists->purpose_of_receipt_goods !!}</td>
        <td>{{ $receivedGoodLists->amount_of_material_received }}</td>
        <td>{{ $receivedGoodLists->estimated_value_of_goods }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_project_approval) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_Commitment) }}</td>

        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDataUpdate{{ $receivedGoodLists->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fdFiveForm._partial.receivedGoodsModalEdit')


            <button type="button" onclick="deleteTagReceivedGoods({{ $receivedGoodLists->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>

        </td>
    </tr>
    @endforeach

</table>
