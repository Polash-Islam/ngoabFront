<div class="modal modal-xl fade" id="prokolpoAreaModalEdit{{ $prokolpoAreaListAll->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <select  name="new_area_type" class="form-control new_area_type editAreaType" id="new_area_type{{ $prokolpoAreaListAll->id }}">
      <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
      @if(!empty($prokolpoAreaListAll->district_name ))
         <option value="জেলা" selected>জেলা</option>
         <option value="সিটি কর্পোরেশন" >সিটি কর্পোরেশন</option>
         @else
          <option value="জেলা" >জেলা</option>
            <option value="সিটি কর্পোরেশন" selected>সিটি কর্পোরেশন</option>
            @endif
            </select>

</div>

                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="division_name[]" class="form-control" id=""
                                placeholder=""> --}}



                                <select  name="division_name" class="form-control division_name" id="division_name{{ $prokolpoAreaListAll->id }}">
                                    <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                                    <option value="{{ $prokolpoAreaListAll->division_name }}" selected>{{ $prokolpoAreaListAll->division_name }}</option>
                                    @foreach($divisionList as $districtListAll)

                                    <option value="{{ $districtListAll->division_bn }}" >{{ $districtListAll->division_bn }}</option>
                                    @endforeach

                                </select>
                                    </div>
                                    <div class="col-lg-4 mb-3" id="districtDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="district_name" class="form-control district_name" id="district_name{{ $prokolpoAreaListAll->id }}">
                                            <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                                            @foreach($districtList as $districtListAll)
                                            <option value="{{ $districtListAll->district_bn }}" {{ $prokolpoAreaListAll->district_name == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                       @if(!empty($prokolpoAreaListAll->district_name ))
                                    <div class="col-lg-4 mb-3" style="display:none;" id="cityDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                        {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                        placeholder=""> --}}


                                        <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $prokolpoAreaListAll->id }}">
                                            <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                            @foreach($cityCorporationList as $districtListAll)
                                            <option value="{{ $districtListAll->city_orporation }}" {{ $prokolpoAreaListAll->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @else

                                     <div class="col-lg-4 mb-3" id="cityDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                        {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                        placeholder=""> --}}


                                        <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $prokolpoAreaListAll->id }}">
                                            <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                            @foreach($cityCorporationList as $districtListAll)
                                            <option value="{{ $districtListAll->city_orporation }}" {{ $prokolpoAreaListAll->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    @endif
                                    <div class="col-lg-3 mb-3" id="upoDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">উপজেলা</label>
                                        {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="upozila_name" class="form-control upozila_name" id="upozila_name{{ $prokolpoAreaListAll->id }}">
                                            <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
                                            @foreach($subdDistrictList as $districtListAll)
                                            <option value="{{ $districtListAll->thana_bn }}" {{ $prokolpoAreaListAll->upozila_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3" id="thanaDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                        placeholder="" > --}}

                                        <select  name="thana_name" class="form-control thana_name" id="thana_name{{ $prokolpoAreaListAll->id }}">
                                            <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>

                                            @foreach($thanaList as $districtListAll)
                                            <option value="{{ $districtListAll->thana_bn }}" {{ $prokolpoAreaListAll->thana_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3" id="munDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">পৌরসভা</label>
                                        <input type="text" name="municipality_name" value="{{ $prokolpoAreaListAll->municipality_name }}" class="form-control" id="municipality_name{{ $prokolpoAreaListAll->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-3 mb-3" id="wardDiv{{ $prokolpoAreaListAll->id }}">
                                        <label for="" class="form-label">ওয়ার্ড</label>
                                        <input type="text" name="ward_name" value="{{ $prokolpoAreaListAll->ward_name }}" class="form-control" id="ward_name{{ $prokolpoAreaListAll->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                                        <select   name="prokolpoType" class="form-control " id="prokolpoType{{ $prokolpoAreaListAll->id }}"
                                               placeholder="">
                                               <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                               @foreach($projectSubjectList as $projectSubjectLists)
                                               <option value="{{ $projectSubjectLists->id }}" {{ $prokolpoAreaListAll->prokolpo_type == $projectSubjectLists->id ? 'selected':'' }}>{{ $projectSubjectLists->name }}</option>
                                               @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">বরাদ্দকৃত বাজেট<span class="text-danger">*</span></label>
                                        <input type="text"  name="allocated_budget" value="{{ $prokolpoAreaListAll->allocated_budget }}" class="form-control" id="allocated_budget{{ $prokolpoAreaListAll->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="text"  name="beneficiaries_total" value="{{ $prokolpoAreaListAll->number_of_beneficiaries }}" class="form-control" id="beneficiaries_total{{ $prokolpoAreaListAll->id }}" placeholder="">
                                    </div>

                            </div>
                            <a id="{{ $prokolpoAreaListAll->id }}"  class="btn btn-registration prokolpoAreaDataUpdate">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
