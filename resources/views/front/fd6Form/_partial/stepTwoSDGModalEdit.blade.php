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

                                <?php  
                                    
                                    $stepTwoGoalData = DB::table('goals')->get();
    $stepTwoTargetData = DB::table('targets')->get();
    $stepTwoIndicatorData = DB::table('indicators')->get();
                                    
                                    ?>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">অভিষ্ঠ(Goal)</label>
                                        {{-- <input type="text" value="{{ $SDGDevelopmentGoals->goal }}" name="goal" class="form-control" id="goal{{ $SDGDevelopmentGoals->id }}"
                                        placeholder=""> --}}

                                        <select name="goal" class="form-control" id="goal{{ $SDGDevelopmentGoals->id }}">
                                            <option value="">--নির্বাচন করুন--</option>
                                            @foreach($stepTwoGoalData as $stepTwoGoalDatas)
                                            <option value="{{$stepTwoGoalDatas->id}}" {{$stepTwoGoalDatas->id == $SDGDevelopmentGoals->goal ? 'selected':'' }}>{{$stepTwoGoalDatas->description}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা(Target) <span class="text-danger">*</span></label>
                                        {{-- <input type="text" value="{{ $SDGDevelopmentGoals->target }}"  name="target" class="form-control" id="target{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="" > --}}
                                        <select name="target" class="form-control" id="target{{ $SDGDevelopmentGoals->id }}">
                                            <option value="">--নির্বাচন করুন--</option>
                                            @foreach($stepTwoTargetData as $stepTwoGoalDatas)
                                            <option value="{{$stepTwoGoalDatas->id}}" {{$stepTwoGoalDatas->id == $SDGDevelopmentGoals->target ? 'selected':'' }}>{{$stepTwoGoalDatas->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">নির্দেশক(Indicator)<span class="text-danger">*</span></label>
                                        <select name="indicator" class="form-control" id="indicator{{ $SDGDevelopmentGoals->id }}">
                                            <option value="">--নির্বাচন করুন --</option>
                                            @foreach($stepTwoIndicatorData as $stepTwoGoalDatas)
                                            <option value="{{$stepTwoGoalDatas->id}}" {{$stepTwoGoalDatas->id == $SDGDevelopmentGoals->indicator ? 'selected':'' }}>{{$stepTwoGoalDatas->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বাজেট বরাদ্দ</label>
                                        <input type="text" value="{{ $SDGDevelopmentGoals->budget_allocation }}" name="budget_allocation" class="form-control" id="budget_allocation{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">যৌক্তিকতা</label>
                                        <input type="text" value="{{ $SDGDevelopmentGoals->rationality }}" name="rationality" class="form-control" id="rationality{{ $SDGDevelopmentGoals->id }}"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="Sdgcomment{{ $SDGDevelopmentGoals->id }}" placeholder="">
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
