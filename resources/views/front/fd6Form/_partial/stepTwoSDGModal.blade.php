<div class="modal modal-xl fade" id="Avistto"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    টেকসই উন্নয়ন অভিষ্ঠ (এসডিজি ) এর সাথে সম্পৃক্ততার বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                            <div class="row">

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">অভিষ্ঠ(Goal)<span class="text-danger">*</span></label>
                                        <select name="goal" class="form-control" id="goal0">
                                            <option value="">--নির্বাচন করুন--</option>
                                            @foreach($stepTwoGoalData as $stepTwoGoalDatas)
                                            <option value="{{$stepTwoGoalDatas->id}}">{{$stepTwoGoalDatas->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা(Target) <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="target" class="form-control" id="target0"
                                        placeholder="" > --}}

                                        <select name="target" class="form-control" id="target0">
                                            <option value="">--নির্বাচন করুন--</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">নির্দেশক(Indicator)<span class="text-danger">*</span></label>
                                        <select name="indicator" class="form-control" id="indicator0">
                                            <option value="">--নির্বাচন করুন --</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বাজেট বরাদ্দ</label>
                                        <input type="text" name="budget_allocation" class="form-control" id="budget_allocation0"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">যৌক্তিকতা</label>
                                        <input type="text" name="rationality" class="form-control" id="rationality0"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="Sdgcomment0" placeholder=""></textarea>
                                    </div>

                            </div>
                            <a id="SDGAjax"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
