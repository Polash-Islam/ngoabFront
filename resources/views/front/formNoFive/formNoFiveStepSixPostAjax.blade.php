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
                <th>ক্র : নং :</th>
                <th >কর্মকর্তা/কর্মচারীর নাম ও জাতীয়তা(দেশি /বিদেশি)</th>
                <th >পদবি ও দায়িত্ব </th>
                <th >শিক্ষাগত যোগ্যতা ও অভিজ্ঞতা</th>
                <th >বয়স</th>
                <th >বেতন</th>
                <th >অন্যান্য ভাতা/সুবিধাদি</th>

                <th >সংস্থায় চাকুরীর মেয়াদ</th>
                <th >অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা</th>
                <th >মন্তব্য</th>
                <th >কর্ম পরিকল্পনা</th>
            </tr>

            @foreach($formNoFiveInfoList as $key=>$formNoFiveStepFiveDatas)
            <tr>
                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td>{{ $formNoFiveStepFiveDatas->name_of_the_officer_depend_on_salary }} ও {{ $formNoFiveStepFiveDatas->nationality_of_the_officer_depend_on_salary }}</td>
                <td>{{ $formNoFiveStepFiveDatas->designation_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->responsbility_of_the_officer_depend_on_salary}}</td>
                <td>{{ $formNoFiveStepFiveDatas->education_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->experience_of_the_officer_depend_on_salary}}</td>
                <td>{{ $formNoFiveStepFiveDatas->age_of_the_officer_depend_on_salary }}</td>
                <td>{{ $formNoFiveStepFiveDatas->salary_of_the_officer_depend_on_salary }}</td>
                <td>{{ $formNoFiveStepFiveDatas->other_allowances_or_benefits_of_the_officer_depend_on_salary }}</td>
                <td>{{ $formNoFiveStepFiveDatas->job_duration_of_the_officer_depend_on_salary}}</td>
                <td>{{ $formNoFiveStepFiveDatas->financial_benefit_received_from_any_other_scheme}}</td>
                <td>{{ $formNoFiveStepFiveDatas->comment }}</td>

                <td>

                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSix{{ $formNoFiveStepFiveDatas->id }}" >
                        <i class="fa fa-pencil"></i>
                    </button>

                                          <!-- edit modal start -->

                                          @include('front.formNoFive._partila.stepSixModalEdit')

                                          <!-- edit  modal end -->

                    <button type="button" onclick="deleteTagStepSix({{ $formNoFiveStepFiveDatas->id}})" class="btn btn-sm btn-outline-danger"><i
                        class="bi bi-trash"></i></button>

                </td>
            </tr>
            @endforeach
        </table>

    </div>

    @endif
</div>
