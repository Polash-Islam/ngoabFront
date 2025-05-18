<div class="modal modal-xl fade" id="exampleModal1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <label for="" class="form-label">ধরণ <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="type" class="form-control distribution_type" id="distribution_type">
                                        <option value="">--- অনুগ্রহ করে ধরণ নির্বাচন করুন ---</option>
                                        <option value="প্রকল্প খাতের ব্যয়">প্রকল্প খাতের ব্যয়</option>
                                        <option value="প্রশাসনিক ব্যয়">প্রশাসনিক ব্যয়</option>
                                    </select>
                                </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                        {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="district_name" class="form-control newdistrict_name" id="newdistrict_name0">
                                            <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                                            @foreach($districtList as $districtListAll)
                                            <option value="{{ $districtListAll->district_bn }}" >{{ $districtListAll->district_bn }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">উপজেলা<span class="text-danger">*</span></label>
                                        {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder=""> --}}

                                        <select  name="upozila_name" class="form-control newupozila_name" id="newupozila_name0">
                                            <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>



                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">দ্রব্যাদির বর্ণনা<span class="text-danger">*</span></label>
                                        <input type="text"  name="product_des" class="form-control" id="product_des0"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">পরিমাণ<span class="text-danger">*</span></label>
                                        <input type="number" name="product_quantity" class="form-control" id="product_quantity0"
                                        placeholder="">
                                    </div>

                                    <?php 
                                    
                                    $unitLists = DB::table('units')->get();
                                    
                                    
                                    ?>
                                    <div class="col-lg-3 mb-3">
                                        <label for="" class="form-label">একক মূল্য<span class="text-danger">*</span></label>
                                        <input type="number" name="unit_price" class="form-control" id="unit_price0"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label for="" class="form-label">একক<span class="text-danger">*</span></label>
                                        <select name="unit_name" class="form-control" id="unit_name0"
                                        placeholder="">
                                        <option value="">---নির্বাচন করুন ---</option>
                                        @foreach($unitLists as $unitList)
                                        <option value="{{$unitList->id}}">{{$unitList->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">মোট টাকার পরিমাণ<span class="text-danger">*</span></label>
                                        <input type="number" name="total_amount" readonly class="form-control" id="total_amount0"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="number"  name="total_beneficiaries"  class="form-control" id="total_beneficiaries" placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="comment" placeholder=""></textarea>
                                    </div>
                            </div>
                            <a id="distributionAjax"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
