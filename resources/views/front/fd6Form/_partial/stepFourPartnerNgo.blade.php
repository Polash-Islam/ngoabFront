<div class="modal modal-xl fade" id="prokolpoPartnerNgo{{ $partnerDataPostLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <?php

$prokolpoPriod = \App\Models\EstimateCost::where('fd6_form_id',$fd6Id)->get();



                            ?>
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র নাম <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->partner_ngo_name }}" name="partner_ngo_name" class="form-control" id="partner_ngo_name{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র নাম">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র ঠিকানা <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->partner_ngo_address }}" name="partner_ngo_address" class="form-control" id="partner_ngo_address{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র ঠিকানা">
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র টেলিফোন <span class="text-danger">*</span></label>
                                <input type="text"  name="partner_ngo_telephone" value="{{ $partnerDataPostLists->partner_ngo_telephone }}" class="form-control" id="partner_ngo_telephone{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র টেলিফোন">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র মোবাইল <span class="text-danger">*</span></label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" data-parsley- minlength="11"  data-parsley-trigger=“keyup”  value="{{ $partnerDataPostLists->partner_ngo_mobile }}" name="partner_ngo_mobile" class="form-control" id="partner_ngo_mobile{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র মোবাইল">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র ইমেইল <span class="text-danger">*</span></label>
                                <input type="email"  value="{{ $partnerDataPostLists->partner_ngo_email }}" name="partner_ngo_email" class="form-control" id="partner_ngo_email{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র ইমেইল">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র নিবন্ধন নং <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->partner_ngo_reg_name }}" name="partner_ngo_reg_name" class="form-control" id="partner_ngo_reg_name{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র নিবন্ধন নং">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র মেয়াদ <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->partner_ngo_duration }}" name="partner_ngo_duration" class="form-control" id="partner_ngo_duration{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও'র মেয়াদ">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য কার্যক্রমসমূহ <span class="text-danger">*</span></label>
                                <textarea   name="partner_ngo_work_detail" class="form-control summernote" id="partner_ngo_work_detail{{ $partnerDataPostLists->id }}"
                                placeholder="পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য কার্যক্রমসমূহ">{!! $partnerDataPostLists->partner_ngo_work_detail !!}</textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                        <div class="col-lg-12 mb-3">

   <label for="" class="form-label">এলাকার ধরণ  <span class="text-danger">*</span></label>
        <select  name="new_area_type" class="form-control new_area_type" id="new_area_type{{ $partnerDataPostLists->id }}">
      <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
         @if(!empty($partnerDataPostLists->district_name ))
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



                        <select  name="division_name" class="form-control division_name" id="division_name{{ $partnerDataPostLists->id }}">
                            <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                            <option value="{{ $partnerDataPostLists->division_name }}" selected>{{ $partnerDataPostLists->division_name }}</option>
                            @foreach($divisionList as $districtListAll)

                            <option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>
                            @endforeach

                        </select>
                            </div>
                            <div class="col-lg-4 mb-3" id="districtDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                placeholder=""> --}}

                                <select  name="district_name" class="form-control district_name" id="district_name{{ $partnerDataPostLists->id }}">
                                    <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                                    @foreach($districtList as $districtListAll)
                                    <option value="{{ $districtListAll->district_bn }}" {{ $partnerDataPostLists->district_name == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                    @endforeach

                                </select>
                            </div>

                             @if(!empty($partnerDataPostLists->district_name ))
                            <div class="col-lg-4 mb-3" style="display:none;" id="cityDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                placeholder=""> --}}


                                <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $partnerDataPostLists->id }}">
                                    <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                    @foreach($cityCorporationList as $districtListAll)
                                    <option value="{{ $districtListAll->city_orporation }}" {{ $partnerDataPostLists->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @else

                              <div class="col-lg-4 mb-3" id="cityDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                placeholder=""> --}}


                                <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $partnerDataPostLists->id }}">
                                    <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                    @foreach($cityCorporationList as $districtListAll)
                                    <option value="{{ $districtListAll->city_orporation }}" {{ $partnerDataPostLists->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                    @endforeach

                                </select>
                            </div>

                            @endif
                            <div class="col-lg-3 mb-3" id="upoDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">উপজেলা</label>
                                {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                placeholder=""> --}}

                                <select  name="upozila_name" class="form-control upozila_name" id="upozila_name{{ $partnerDataPostLists->id }}">
                                    <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
                                    @foreach($subdDistrictList as $districtListAll)
                                    <option value="{{ $districtListAll->thana_bn }}" {{ $partnerDataPostLists->upozila_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-lg-3 mb-3" id="thanatDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                placeholder="" > --}}

                                <select  name="thana_name" class="form-control thana_name" id="thana_name{{ $partnerDataPostLists->id }}">
                                    <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>
                                    @foreach($thanaList as $districtListAll)
                                    <option value="{{ $districtListAll->thana_bn }}" {{ $partnerDataPostLists->thana_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-lg-3 mb-3" id="munDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">পৌরসভা/ইউনিয়ন</label>
                                <input type="text" value="{{ $partnerDataPostLists->municipality_name }}" name="municipality_name" class="form-control" id="municipality_name{{ $partnerDataPostLists->id }}"
                                placeholder="পৌরসভা/ইউনিয়ন">
                            </div>
                            <div class="col-lg-3 mb-3" id="wardDiv{{ $partnerDataPostLists->id }}">
                                <label for="" class="form-label">ওয়ার্ড</label>
                                <input type="text" value="{{ $partnerDataPostLists->ward_name }}" name="ward_name" class="form-control" id="ward_name{{ $partnerDataPostLists->id }}"
                                placeholder="ওয়ার্ড">
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">বাজেট <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->budget_detail }}" name="budget_detail" class="form-control" id="budget_detail{{ $partnerDataPostLists->id }}"
                                placeholder="বাজেট">
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">সম্পাদনের সময়সীমা <span class="text-danger">*</span></label>
                                {{-- <input type="text"  value="{{ $partnerDataPostLists->execution_deadline }}" name="execution_deadline" class="form-control" id="execution_deadline{{ $partnerDataPostLists->id }}"
                                placeholder="সম্পাদনের সময়সীমা"> --}}

                                <select  name="execution_deadline" class="form-control" id="execution_deadline{{ $partnerDataPostLists->id }}"
                                    placeholder="" >

                                    <option value="{{ $partnerDataPostLists->execution_deadline }}" selected>{{ $partnerDataPostLists->execution_deadline }}</option>

                                    @foreach($prokolpoPriod as $sprokolpoPriod)



                          

                            <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}</option>
   

                                    @endforeach

                                    </select>
                            </div>


                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">উপকারভোগী <span class="text-danger">*</span></label>
                                <input type="text"  value="{{ $partnerDataPostLists->beneficiary }}" name="beneficiary" class="form-control" id="beneficiary{{ $partnerDataPostLists->id }}"
                                placeholder="উপকারভোগী">
                            </div>

                        </div>
                        <a id="{{ $partnerDataPostLists->id }}"  class="btn btn-registration NewpartnerNgoUpdate">দাখিল করুন</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
