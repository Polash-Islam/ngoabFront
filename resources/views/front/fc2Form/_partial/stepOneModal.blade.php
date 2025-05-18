<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

   <label for="" class="form-label">এলাকার ধরণ  <span class="text-danger">*</span></label>
        <select  name="new_area_type" class="form-control new_area_type" id="new_area_type0">
      <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
         <option value="জেলা">জেলা</option>
            <option value="সিটি কর্পোরেশন">সিটি কর্পোরেশন</option>
            </select>

</div>

                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="division_name[]" class="form-control" id=""
                                placeholder=""> --}}



                                <select  name="division_name" class="form-control division_name" id="division_name0">
                                    <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                                    @foreach($divisionList as $districtListAll)

                                    <option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>
                                    @endforeach

                                </select>
                                    </div>
                                    <div class="col-lg-4 mb-3" id="districtDiv0">
                                        <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="district_name" class="form-control district_name" id="district_name0">
                                            <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>


                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3" id="cityDiv0">
                                        <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                        {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                        placeholder=""> --}}


                                        <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name0">
                                            <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>


                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3" id="upoDiv0">
                                        <label for="" class="form-label">উপজেলা</label>
                                        {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="upozila_name" class="form-control upozila_name" id="upozila_name0">
                                            <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>


                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3" id="thanaDiv0">
                                        <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                        placeholder="" > --}}

                                        <select  name="thana_name" class="form-control thana_name" id="thana_name0">
                                            <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>


                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3" id="munDiv0">
                                        <label for="" class="form-label">পৌরসভা</label>
                                        <input type="text" name="municipality_name" class="form-control" id="municipality_name0"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-3 mb-3" id="wardDiv0">
                                        <label for="" class="form-label">ওয়ার্ড</label>
                                        <input type="text" name="ward_name" class="form-control" id="ward_name0"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                                        <select   name="prokolpoType" class="form-control " id="prokolpoType0"
                                               placeholder="">
                                               <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                               @foreach($projectSubjectList as $projectSubjectLists)
                                               <option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>
                                               @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">বরাদ্দকৃত বাজেট<span class="text-danger">*</span></label>
                                        <input type="text"  name="allocated_budget" class="form-control" id="allocated_budget0" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="text"  name="beneficiaries_total" class="form-control" id="beneficiaries_total0" placeholder="">
                                    </div>

                            </div>
                            <a id="prokolpoAreaDataPost"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
