<tr>

    <td style="width: 95%">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
        {{-- <input type="text" required name="division_name[]" class="form-control" id=""
        placeholder=""> --}}



        <select required name="division_name[]" class="form-control division_name" id="division_name0">
            <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
            <option value="{{ $prokolpoAreaListAll->division_name }}" selected>{{ $prokolpoAreaListAll->division_name }}</option>
            @foreach($divisionList as $districtListAll)

            <option value="{{ $districtListAll->division_bn }}" >{{ $districtListAll->division_bn }}</option>
            @endforeach

        </select>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                {{-- <input type="text" required name="district_name[]" class="form-control" id=""
                placeholder=""> --}}

                <select required name="district_name[]" class="form-control district_name" id="district_name0">
                    <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                    @foreach($districtList as $districtListAll)
                    <option value="{{ $districtListAll->district_bn }}" {{ $districtListAll->district_bn == $prokolpoAreaListAll->district_name ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                placeholder=""> --}}


                <select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name0">
                    <option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                    @foreach($cityCorporationList as $districtListAll)
                    <option value="{{ $districtListAll->city_orporation }}" {{ $districtListAll->city_orporation == $prokolpoAreaListAll->city_corparation_name ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <label for="" class="form-label">উপজেলা</label>
                <input type="text" value="{{ $prokolpoAreaListAll->upozila_name }}"  name="upozila_name[]" class="form-control" id=""
                placeholder="">
            </div>
            <div class="col-lg-3 mb-3">
                <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                <input type="text" value="{{ $prokolpoAreaListAll->thana_name }}" name="thana_name[]" class="form-control" id=""
                placeholder="" required>
            </div>
            <div class="col-lg-3 mb-3">
                <label for="" class="form-label">পৌরসভা</label>
                <input type="text" value="{{ $prokolpoAreaListAll->municipality_name }}"  name="municipality_name[]" class="form-control" id=""
                placeholder="">
            </div>
            <div class="col-lg-3 mb-3">
                <label for="" class="form-label">ওয়ার্ড</label>
                <input type="text" value="{{ $prokolpoAreaListAll->ward_name }}" name="ward_name[]" class="form-control" id=""
                placeholder="">
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                <select  required name="prokolpoType[]" class="form-control " id=""
                       placeholder="">
                       <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                       @foreach($projectSubjectList as $projectSubjectLists)
               <option value="{{ $projectSubjectLists->id }}" {{ $prokolpoAreaListAll->prokolpo_type == $projectSubjectLists->id ? 'selected':'' }}>{{ $projectSubjectLists->name }}</option>
               @endforeach
                </select>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">বরাদ্দকৃত বাজেট<span class="text-danger">*</span></label>
                <input type="text" required value="{{ $prokolpoAreaListAll->allocated_budget }}"  name="allocated_budget[]" class="form-control" id="" placeholder="">
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                <input type="text" required value="{{ $prokolpoAreaListAll->number_of_beneficiaries }}"  name="beneficiaries_total[]" class="form-control" id="" placeholder="">
            </div>
        </div>
    </td>

    @if($key == 0)
    <td>
        <a class="btn btn-primary btn-sm" id="dynamic-ar"><i class="fa fa-plus"></i></a>
    </td>
    @else

<td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td>
    @endif
</tr>
