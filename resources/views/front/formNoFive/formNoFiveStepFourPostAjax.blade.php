<div class="col-md-12">
    @if(count($formNoFiveInfoList) == 0 )

    <div class="no_name_change">
        <div class="d-flex justify-content-center pt-5">
            <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
        </div>
        <div class="text-center">
            <h5>কোন তালিকা নেই</h5>
        </div>
    </div>

    @else

    <div class="table-responsive">


        <table class="table table-bordered">
            <tr>
                <th rowspan="2">ক্র : নং :</th>
                <th rowspan="2">সম্পদ / সম্পত্তির বিবরণ</th>
                <th rowspan="2">পরিমাণ /সংখ্যা</th>
                <th rowspan="2">প্রাপ্তি/সংগ্রহের তারিখ</th>
                <th rowspan="2">প্রকৃত ক্রয় মূল্য</th>
                <th rowspan="2">অর্থের উৎস</th>
                <th rowspan="2">কি কাজে ব্যবহৃত হতেছে</th>
                <th rowspan="2">অবস্থান(স্থান)</th>
                <th rowspan="2">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )</th>
                <th colspan="2">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত</th>
                <th colspan="2">বর্তমান অবস্থা</th>
                <th rowspan="2">কর্ম পরিকল্পনা</th>
            </tr>
            <tr>
                <th>(সংখ্যা /পরিমাণ )</th>
                <th>সর্বমোট ক্রয়মূল্য </th>
                <th>সচল</th>
                <th>অচল</th>
            </tr>
            @foreach($formNoFiveInfoList as $key=>$formNoFiveStepFourDatas)
            <tr>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td>{{ $formNoFiveStepFourDatas->description_of_property }}({{ $formNoFiveStepFourDatas->sub_property }})</td>
                <td>{{ $formNoFiveStepFourDatas->quantity}}</td>
                <td>{{ $formNoFiveStepFourDatas->collect_date}}</td>
                <td>{{ $formNoFiveStepFourDatas->real_buying_price }}</td>
                <td>{{ $formNoFiveStepFourDatas->fund_source }}</td>
                <td>{{ $formNoFiveStepFourDatas->what_is_it_used_for }}</td>
                <td>{{ $formNoFiveStepFourDatas->place}}</td>
                <td>{{ $formNoFiveStepFourDatas->assets_sold_transferred_number_or_quantity}}</td>
                <td>{{ $formNoFiveStepFourDatas->quantity_during_start_of_organization }}</td>
                <td>{{ $formNoFiveStepFourDatas->total_during_start_of_organization }}</td>
                <td>

                    @if($formNoFiveStepFourDatas->current_status == 'সচল')
                    সচল
                    @else

                    @endif

                </td>
                <td>

                    @if($formNoFiveStepFourDatas->current_status == 'অচল')
                    অচল
                    @else

                    @endif

                </td>
                <td>


                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepFourDatas->id }}" >
                        <i class="fa fa-pencil"></i>
                    </button>

                                          <!-- edit modal start -->

                                          @include('front.formNoFive._partila.stepFourModalEdit')

                                          <!-- edit  modal end -->

                    <button type="button" onclick="deleteTag({{ $formNoFiveStepFourDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                        class="bi bi-trash"></i></button>

                        <form id="delete-form-{{ $formNoFiveStepFourDatas->id }}" action="{{ route('formNoFiveStepFourDelete',$formNoFiveStepFourDatas->id) }}" method="POST" style="display: none;">

                            @csrf
                            @method('DELETE')

                        </form>

                </td>
            </tr>
            @endforeach
        </table>

    </div>

    @endif
</div>
