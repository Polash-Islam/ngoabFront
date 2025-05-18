<!--modal-->
<div class="modal modal-xl fade" id="exampleModalTarget"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    প্রকল্পের লক্ষমাত্রা (বছর ভিত্তিক)

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                    <?php

                    $prokolpoPriod = \App\Models\EstimateCost::where('fd6_form_id',$fd6Id)->get();



                        ?>


                            <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">কার্যক্রমের নাম</label>
                                        <input type="text" name="prokolpoName" class="form-control" id="prokolpoName0"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বছর<span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="target_year" class="form-control" id="target_year0"
                                        placeholder="" > --}}

                                        <select  name="target_year" class="form-control" id="target_year0"
                                        placeholder="" >

                                        <option value="" >অনুগ্রহ করে নির্বাচন করুন</option>

                                        @foreach($prokolpoPriod as $sprokolpoPriod)



                              

                                <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}</option>


                       
                                        @endforeach

                                        </select>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা(বাস্তব)<span class="text-danger">*</span></label>
                                        <input type="text"  name="last_year_target_real" class="form-control" id="last_year_target_real0"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা(আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text"  name="last_year_target_financial" class="form-control" id="last_year_target_financial0"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অর্জনযোগ্য(%)</label>
                                        <input type="text" name="last_year_achievment_real" class="form-control" id="last_year_achievment_real0"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">উপকারভোগীর সংখ্যা</label>
                                        <input type="text" name="total_benificiari" class="form-control" id="total_benificiari0"
                                        placeholder="">
                                    </div>




                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="comment0" placeholder=""></textarea>
                                    </div>

                            </div>
                            <a id="prokolpoTargetPost"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
