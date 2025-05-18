<!--modal-->
<div class="modal modal-xl fade" id="prokolpoBudget{{ $sectorWiseExpenditureLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    খাতভিত্তিক ব্যয় বিভাজন  বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                        <?php

$divisionListName = DB::table('civilinfos')->where('district_bn',$sectorWiseExpenditureLists->work_area_district)
->value('division_bn');

                        ?>


                            <div class="row">


                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                            {{-- <input type="text"  name="division_name[]" class="form-control" id=""
                            placeholder=""> --}}



                            <select  name="division_name" class="form-control division_name" id="division_name{{ $sectorWiseExpenditureLists->id }}">
                                <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                                @foreach($divisionList as $districtListAll)

                                <option value="{{ $districtListAll->division_bn }}" {{ $divisionListName == $districtListAll->division_bn ? 'selected':''  }}>{{ $districtListAll->division_bn }}</option>
                                @endforeach

                            </select>
                                </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>


                                        <select  name="district_name" class="form-control district_name" id="district_name{{ $sectorWiseExpenditureLists->id }}">

                                            <option value="">--- নির্বাচন করুন ---</option>

                                            @foreach($districtList as $districtListAll)
                                            <option value="{{ $districtListAll->district_bn }}" {{ $sectorWiseExpenditureLists->work_area_district == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">উপজেলা</label>
                                        {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="upozila_name" class="form-control" id="upozila_name{{ $sectorWiseExpenditureLists->id }}">
                                            <option value="">--- নির্বাচন করুন ---</option>
                                            @foreach($subdDistrictList as $districtListAll)
                                            <option value="{{ $districtListAll->thana_bn }}" {{ $sectorWiseExpenditureLists->work_area_sub_district == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">কার্যক্রম <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $sectorWiseExpenditureLists->activities }}"  name="activities" class="form-control" id="activities{{ $sectorWiseExpenditureLists->id }}"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রাক্কলিত ব্যয়</label>
                                        <input type="number" value="{{ $sectorWiseExpenditureLists->estimated_expenses }}"  name="estimated_expenses" class="form-control" id="estimated_expenses{{ $sectorWiseExpenditureLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সময়সীমা</label>
                                        <input type="text" value="{{ $sectorWiseExpenditureLists->time_limit }}" name="time_limit" class="form-control" id="time_limit{{ $sectorWiseExpenditureLists->id }}"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $sectorWiseExpenditureLists->number_of_beneficiaries }}"  name="number_of_beneficiaries" class="form-control" id="number_of_beneficiaries{{ $sectorWiseExpenditureLists->id }}" placeholder="">
                                    </div>

                            </div>
                            <a id="{{ $sectorWiseExpenditureLists->id }}"  class="btn btn-registration fc1StepTwoBudgetEdit">জমা দিন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
