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
                <th rowspan="2">কর্মকর্তা কর্মচারীর নাম ও পদবি</th>
                <th rowspan="2">যোগদানের তারিখ</th>
                <th rowspan="2">যে দেশ ভ্রমণ করেছে তার নাম</th>
                <th rowspan="2">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম ও ঠিকানা</th>
                <th rowspan="2">প্রশিক্ষণ কোর্সের নাম</th>
                <th rowspan="2">কোর্সের মেয়াদ</th>

                <th rowspan="2">মোট ব্যয়</th>
                <th colspan="2">ব্যয়ের উৎস</th>
                {{-- <th >ব্যয়ের উৎস (দাতা সংস্থার দেশ)</th> --}}
                <th rowspan="2" >কর্ম পরিকল্পনা</th>
            </tr>
            <tr>
                <th colspan="2">দাতা সংস্থার নাম,দেশ</th>
            </tr>
            @foreach($formNoFiveInfoList as $key=>$formNoFiveStepFiveDatas)
            <tr>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td>{{ $formNoFiveStepFiveDatas->name_of_the_officer }}({{ $formNoFiveStepFiveDatas->designation_of_the_officer }})</td>
                <td>{{ $formNoFiveStepFiveDatas->joining_date}}</td>
                <td>{{ $formNoFiveStepFiveDatas->travel_country}}</td>
                <td>{{ $formNoFiveStepFiveDatas->organizing_organization_name }}({{ $formNoFiveStepFiveDatas->organizing_organization_address }})</td>
                <td>{{ $formNoFiveStepFiveDatas->name_of_training_course }}</td>
                <td>{{ $formNoFiveStepFiveDatas->course_duration }}</td>
                <td>{{ $formNoFiveStepFiveDatas->total_expense}}</td>
                <td>{{ $formNoFiveStepFiveDatas->name_of_donor_organization}}</td>
                <td>{{ $formNoFiveStepFiveDatas->country_name_of_donor_organization }}</td>

                <td>

                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepFiveDatas->id }}" >
                        <i class="fa fa-pencil"></i>
                    </button>

                                          <!-- edit modal start -->

                                          @include('front.formNoFive._partila.stepFiveModalEdit')

                                          <!-- edit  modal end -->

                    <button type="button" onclick="deleteTagStepFive({{ $formNoFiveStepFiveDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                        class="bi bi-trash"></i></button>

                </td>
            </tr>
            @endforeach
        </table>

    </div>

    @endif
</div>
