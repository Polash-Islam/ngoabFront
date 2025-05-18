<table class="table table-bordered" id="dynamicAddRemove">

    <tr>
        <td style="width: 95%">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
            {{-- <input type="text" required name="division_name[]" class="form-control" id=""
            placeholder=""> --}}



            <select required name="division_name[]" class="form-control division_name" id="division_name0">
                <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                @foreach($divisionList as $districtListAll)

                <option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>
                @endforeach

            </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                    {{-- <input type="text" required name="district_name[]" class="form-control" id=""
                    placeholder=""> --}}

                    <select required name="district_name[]" class="form-control district_name" id="district_name0">
                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>


                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">সিটি কর্পোরেশন</label>
                    {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                    placeholder=""> --}}


                    <select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name0">
                        <option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>


                    </select>
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="" class="form-label">উপজেলা</label>
                    <input type="text" name="upozila_name[]" class="form-control" id=""
                    placeholder="">
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                    <input type="text" required name="thana_name[]" class="form-control" id=""
                    placeholder="" >
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="" class="form-label">পৌরসভা</label>
                    <input type="text" name="municipality_name[]" class="form-control" id=""
                    placeholder="">
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="" class="form-label">ওয়ার্ড</label>
                    <input type="text" name="ward_name[]" class="form-control" id=""
                    placeholder="">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                    <select  required name="prokolpoType[]" class="form-control " id=""
                           placeholder="">
                           <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                           @foreach($projectSubjectList as $projectSubjectLists)
                           <option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>
                           @endforeach
                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">বরাদ্দকৃত বাজেট<span class="text-danger">*</span></label>
                    <input type="text" required name="allocated_budget[]" class="form-control" id="" placeholder="">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                    <input type="text" required name="beneficiaries_total[]" class="form-control" id="" placeholder="">
                </div>
            </div>
        </td>

        <td>
            <a class="btn btn-primary btn-sm" id="dynamic-ar"><i class="fa fa-plus"></i></a>
        </td>
    </tr>
</table>
