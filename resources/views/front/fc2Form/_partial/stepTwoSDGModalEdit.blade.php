<div class="modal modal-xl fade" id="prokolpoSDG{{ $SDGDevelopmentGoals->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অভিষ্ঠ(Goal)</label>
                                        <input type="text" value="{{ $SDGDevelopmentGoals->goal }}" name="goal" class="form-control" id="goal{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা(Target) <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $SDGDevelopmentGoals->target }}"  name="target" class="form-control" id="target{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বাজেট বরাদ্দ</label>
                                        <input type="number" value="{{ $SDGDevelopmentGoals->budget_allocation }}" name="budget_allocation" class="form-control" id="budget_allocation{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">যৌক্তিকতা</label>
                                        <input type="text" value="{{ $SDGDevelopmentGoals->rationality }}" name="rationality" class="form-control" id="rationality{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea required name="comment" class="form-control" id="comment{{ $SDGDevelopmentGoals->id }}" placeholder="">
                                            {{ $SDGDevelopmentGoals->comment }}
                                        </textarea>
                                    </div>

                            </div>
                            <a id="{{ $SDGDevelopmentGoals->id }}"  class="btn btn-registration SDGAjaxData">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
