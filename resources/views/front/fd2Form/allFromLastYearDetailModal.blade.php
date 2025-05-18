<div class="modal modal-xl fade" id="prokolpoAreaModalEdit{{ $fd2AllFormLastYearDetails->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কার্যক্রমের নাম</label>
                                <input type="text" value="{{ $fd2AllFormLastYearDetails->prokolpoName }}" name="prokolpoName" class="form-control" id="prokolpoName{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">বিগত বছরের লক্ষ্যমাত্রা(বাস্তব)<span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $fd2AllFormLastYearDetails->last_year_target_real }}" name="last_year_target_real" class="form-control" id="last_year_target_real{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="" >
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">বিগত বছরের লক্ষ্যমাত্রা(আর্থিক)<span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $fd2AllFormLastYearDetails->last_year_target_financial }}" name="last_year_target_financial" class="form-control" id="last_year_target_financial{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">অর্জন(%)(বাস্তব)</label>
                                <input type="text" value="{{ $fd2AllFormLastYearDetails->last_year_achievment_real }}" name="last_year_achievment_real" class="form-control" id="last_year_achievment_real{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">অর্জন(%)(আর্থিক)</label>
                                <input type="text" value="{{ $fd2AllFormLastYearDetails->last_year_achievment_financial }}" name="last_year_achievment_financial" class="form-control" id="last_year_achievment_financial{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">উপকারভোগীর সংখ্যা</label>
                                <input type="text" value="{{ $fd2AllFormLastYearDetails->total_benificiari }}" name="total_benificiari" class="form-control" id="total_benificiari{{ $fd2AllFormLastYearDetails->id }}"
                                placeholder="">
                            </div>




                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">মন্তব্য</label>
                                <textarea  name="comment" class="form-control" id="comment{{ $fd2AllFormLastYearDetails->id }}" placeholder="">

                                   {{ $fd2AllFormLastYearDetails->comment }}
                                </textarea>
                            </div>

                    </div>

                            <a id="{{ $fd2AllFormLastYearDetails->id }}"  class="btn btn-registration lastYearDataUpdate">আপডেট করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
