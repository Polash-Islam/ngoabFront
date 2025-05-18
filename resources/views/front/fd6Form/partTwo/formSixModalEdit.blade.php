<!--modal-->
<div class="modal modal-xl fade" id="formSixModalEdit{{ $detailAsPerForm6s->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    সংলগ্নী ‘’ঙ’’ এর বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কার্যাবলী (ফরম-৬ অনুযায়ী)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $detailAsPerForm6s->work_detail }}" name="work_detail" class="form-control" id="work_detail{{ $detailAsPerForm6s->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষমাত্রা(ভৌত)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $detailAsPerForm6s->physical_goals }}"   name="physical_goals" class="form-control" id="physical_goals{{ $detailAsPerForm6s->id }}"
                                        placeholder="" >
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অর্জন(ভৌত)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $detailAsPerForm6s->physical_achievment }}"   name="physical_achievment" class="form-control" id="physical_achievment{{ $detailAsPerForm6s->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বরাদ্দ(আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text"  value="{{ $detailAsPerForm6s->financial_allocation }}"   name="financial_allocation" class="form-control" id="financial_allocation{{ $detailAsPerForm6s->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">ব্যয়(আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $detailAsPerForm6s->financial_cost }}"   name="financial_cost" class="form-control" id="financial_cost{{ $detailAsPerForm6s->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="comment{{ $detailAsPerForm6s->id }}"
                                        placeholder="" >{{ $detailAsPerForm6s->comment }}</textarea>
                                    </div>

                            </div>
                            <a id="{{ $detailAsPerForm6s->id }}"  class="btn btn-registration formSixModalUpdate">আপডেট করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
