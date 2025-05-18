<!--modal-->
<div class="modal modal-xl fade" id="exampleModal1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                            <div class="row">

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
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="district_name" class="form-control district_name" id="district_name0">
                                        <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>


                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">উপজেলা</label>
                                    {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="upozila_name" class="form-control" id="upozila_name0">
                                        <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
                                    </select>
                                </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">কার্যক্রম <span class="text-danger">*</span></label>
                                        <input type="text"  name="activities" class="form-control" id="activities0"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রাক্কলিত ব্যয়</label>
                                        <input type="number" name="estimated_expenses" class="form-control" id="estimated_expenses0"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সময়সীমা</label>
                                        <input type="text" name="time_limit" class="form-control" id="time_limit0"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="number"  name="number_of_beneficiaries" class="form-control" id="number_of_beneficiaries0" placeholder="">
                                    </div>

                            </div>
                            <a id="fc1StepTwoBudget"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
