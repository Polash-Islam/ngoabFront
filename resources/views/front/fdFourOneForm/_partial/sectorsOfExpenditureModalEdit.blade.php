<div class="modal modal-xl fade" id="sectorsOfExpenditureModalEdit{{ $expenditureDetail->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">খরচের খাতসমূহের বিস্তারিত<span class="text-danger">*</span></label>
                                <textarea  name="expenditure_sectors" class="form-control summernote" id="expenditure_sectors{{ $expenditureDetail->id }}" placeholder="">
                                    {!! $expenditureDetail->expenditure_sectors !!}
                                </textarea>
                            </div>


                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ<span class="text-danger">*</span></label>
                                <input type="text" name="approved_budget_money" value="{{ $expenditureDetail->approved_budget_money }}" class="form-control" id="approved_budget_money{{ $expenditureDetail->id }}"
                                placeholder="">
                            </div>


                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">প্রকৃত ব্যয়<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $expenditureDetail->actual_cost }}" name="actual_cost" class="form-control" id="actual_cost{{ $expenditureDetail->id }}"
                                placeholder="">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">পার্থক্য<span class="text-danger">*</span></label>
                                <textarea  name="difference" class="form-control summernote" id="difference{{ $expenditureDetail->id }}" placeholder="">{!! $expenditureDetail->difference !!}</textarea>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">শতকরা হার (%)<span class="text-danger">*</span></label>
                                <input type="text" name="percentage" value="{{ $expenditureDetail->percentage }}" class="form-control" id="percentage{{ $expenditureDetail->id }}"
                                placeholder="">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">পার্থক্য এর কারণ<span class="text-danger">*</span></label>
                                <textarea  name="reason_for_the_difference" class="form-control summernote" id="reason_for_the_difference{{ $expenditureDetail->id }}" placeholder="">
                                    {!! $expenditureDetail->reason_for_the_difference !!}
                                </textarea>
                            </div>

                    </div>
                    <a id="{{ $expenditureDetail->id }}"  class="btn btn-registration sectorsOfExpenditureUpdate">আপডেট করুন</a>


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
