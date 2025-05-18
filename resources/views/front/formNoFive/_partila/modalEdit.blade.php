<!--modal-->
<div class="modal modal-xl fade" id="exampleModal{{ $formNoFiveStepTwoDatas->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('formNoFiveStepTwoUpdate') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $formNoFiveStepTwoDatas->id }}" name="id"  id="">
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="decode_id"  id="">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">এনেক্সার - সি এর খাত<span class="text-danger">*</span> </label>
                                    <input value="{{ $formNoFiveStepTwoDatas->sector_of_annexure_C }}" name="sector_of_annexure_C" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">খাত ওয়ারী বাজেট<span class="text-danger">*</span> </label>
                                    <input value="{{ $formNoFiveStepTwoDatas->sector_wise_budget }}" name="sector_wise_budget" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ও লক্ষ্যমাত্রা<span class="text-danger">*</span> </label>
                                    <input value="{{ $formNoFiveStepTwoDatas->activities_and_objectives }}" name="activities_and_objectives" required type="text" class="form-control" id="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ওয়ারী বিভাজিত বাজেট<span class="text-danger">*</span> </label>
                                    <input value="{{ $formNoFiveStepTwoDatas->activity_wise_segmented_budget }}" name="activity_wise_segmented_budget" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ভিত্তিক অর্জিত লক্ষ্যমাত্রা<span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $formNoFiveStepTwoDatas->activity_based_achievement_targets }}" name="activity_based_achievement_targets" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ভিত্তিক প্রকৃত ব্যয়<span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $formNoFiveStepTwoDatas->activity_based_actual_costing }}" name="activity_based_actual_costing" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">খাতওয়ারী মোট  প্রকৃত ব্যয়<span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $formNoFiveStepTwoDatas->accounts_payable_total_actual_expenditure }}" name="accounts_payable_total_actual_expenditure" required class="form-control" id="" placeholder="">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি বাস্তব<span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_real }}" name="cumulative_progress_during_reporting_in_real" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি আর্থিক<span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_financial }}" name="cumulative_progress_during_reporting_in_financial" required class="form-control" id="" placeholder="">
                                </div>


                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">মন্তব্য</label>
                                    <textarea name="comment"  class="form-control" id="" placeholder="">{{ $formNoFiveStepTwoDatas->comment }}</textarea>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-registration">আপডেট করুন</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
