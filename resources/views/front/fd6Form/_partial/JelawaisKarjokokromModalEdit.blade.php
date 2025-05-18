<div class="modal modal-xl fade" id="JelawaisKarjokokromEdit{{ $districtWiseLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        $divisionListNew = DB::table('fd6_form_prokolpo_areas')
                                          ->where('fd6_form_id',$fd6Id)
                                             ->whereNotNull('division_name')
                                           ->groupBy('division_name')
                                           ->select('division_name')->get();
                        $districtListNew = DB::table('fd6_form_prokolpo_areas')
                        ->where('fd6_form_id',$fd6Id)
                                         ->whereNotNull('district_name')
                                           ->groupBy('district_name')
                                           ->select('district_name')->get();
                        $cityCorporationListNew =  DB::table('fd6_form_prokolpo_areas')
                        ->where('fd6_form_id',$fd6Id)
                                           ->whereNotNull('city_corparation_name')
                                           ->groupBy('city_corparation_name')
                                           ->select('city_corparation_name')->get();
                        $subdDistrictListNew = DB::table('fd6_form_prokolpo_areas')
                        ->where('fd6_form_id',$fd6Id)
                                        ->whereNotNull('upozila_name')
                                            ->groupBy('upozila_name')
                                            ->select('upozila_name')->get();
                        $thanaListNew = DB::table('fd6_form_prokolpo_areas')
                        ->where('fd6_form_id',$fd6Id)
                                             ->whereNotNull('thana_name')
                                            ->groupBy('thana_name')
                                            ->select('thana_name')->get();

                            ?>
                            <div class="row">
<div class="col-lg-12 mb-3">

   <label for="" class="form-label">এলাকার ধরণ  <span class="text-danger">*</span></label>
        <select  name="new_area_type" class="form-control new_area_type" id="new_area_type{{ $districtWiseLists->id }}">
      <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
           @if(!empty($districtWiseLists->district_name ))
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



                            <select  name="division_name" class="form-control division_name" id="division_name{{ $districtWiseLists->id }}">
                                <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                                <option value="{{ $districtWiseLists->division_name }}" selected>{{ $districtWiseLists->division_name }}</option>
                                @foreach($divisionListNew as $districtListAll)

                                <option value="{{ $districtListAll->division_name }}" >{{ $districtListAll->division_name }}</option>
                                @endforeach

                            </select>
                                </div>
                                <div class="col-lg-4 mb-3" id="districtDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="district_name" class="form-control district_name" id="district_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                                        @foreach($districtList as $districtListAll)
                                        <option value="{{ $districtListAll->district_bn }}" {{ $districtWiseLists->district_name == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                 @if(!empty($districtWiseLists->district_name ))
                                <div class="col-lg-4 mb-3" style="display:none;" id="cityDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                    {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                    placeholder=""> --}}


                                    <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                        @foreach($cityCorporationList as $districtListAll)
                                        <option value="{{ $districtListAll->city_orporation }}" {{ $districtWiseLists->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @else

                                <div class="col-lg-4 mb-3" id="cityDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                    {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                    placeholder=""> --}}


                                    <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                        @foreach($cityCorporationList as $districtListAll)
                                        <option value="{{ $districtListAll->city_orporation }}" {{ $districtWiseLists->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                @endif
                                <div class="col-lg-3 mb-3" id="upoDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">উপজেলা</label>
                                    {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="upozila_name" class="form-control upozila_name" id="upozila_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
                                        @foreach($subdDistrictList as $districtListAll)
                                        <option value="{{ $districtListAll->thana_bn }}" {{ $districtWiseLists->upozila_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-3 mb-3" id="thanaDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                    placeholder="" > --}}

                                    <select  name="thana_name" class="form-control thana_name" id="thana_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>

                                        @foreach($thanaList as $districtListAll)
                                        <option value="{{ $districtListAll->thana_bn }}" {{ $districtWiseLists->thana_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-lg-3 mb-3" id="munDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">পৌরসভা</label>
                                    <input type="text" name="municipality_name" value="{{ $districtWiseLists->municipality_name }}" class="form-control" id="municipality_name{{ $districtWiseLists->id }}"
                                    placeholder="">
                                </div>
                                <div class="col-lg-3 mb-3" id="wardDiv{{ $districtWiseLists->id }}">
                                    <label for="" class="form-label">ওয়ার্ড</label>
                                    <input type="text" name="ward_name" value="{{ $districtWiseLists->ward_name }}" class="form-control" id="ward_name{{ $districtWiseLists->id }}"
                                    placeholder="">
                                </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কার্যক্রম সমূহ</label>
                                        <textarea name="activities" value="{{ $districtWiseLists->activities}}" class="form-control" id="activities{{ $districtWiseLists->id }}"
                                        placeholder="">
                                    </textarea>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রকল্প সময়<span class="text-danger">*</span></label>
                                        {{-- <input type="text" value="{{ $districtWiseLists->prokolpo_time}}"  name="prokolpo_time" class="form-control" id="prokolpo_time{{ $districtWiseLists->id }}" placeholder=""> --}}

                                        <select  name="prokolpo_time" class="form-control" id="prokolpo_time{{ $districtWiseLists->id }}"
                                        placeholder="" >

                                        <option value="" >অনুগ্রহ করে নির্বাচন করুন</option>
                                        <option value="{{ $districtWiseLists->prokolpo_time}}" selected>{{ $districtWiseLists->prokolpo_time}}</option>
                                        @foreach($prokolpoPriod as $sprokolpoPriod)



                             

                                <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}</option>


                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (বছর)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->target_year}}"  name="target_year" class="form-control" id="last_target_year{{ $districtWiseLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (বাস্তব)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->last_year_target_real}}"  name="last_year_target_real" class="form-control" id="alllast_year_target_real{{ $districtWiseLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->last_year_target_financial}}"  name="last_year_target_financial" class="form-control" id="alllast_year_target_financial{{ $districtWiseLists->id }}" placeholder="">
                                    </div>

                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">মোট বাজেট<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->total_budget}}"  name="total_budget" class="form-control" id="alltotal_budget{{ $districtWiseLists->id }}" placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য (যেখানে প্রযোজ্য)</label>
                                        <textarea name="comment" class="form-control" id="allcomment{{ $districtWiseLists->id }}" placeholder="">
                                            {{ $districtWiseLists->comment}}
                                        </textarea>
                                    </div>

                            </div>
                            <a id="{{ $districtWiseLists->id}}"  class="btn btn-registration jelawaisKarjokokromUpdate">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
