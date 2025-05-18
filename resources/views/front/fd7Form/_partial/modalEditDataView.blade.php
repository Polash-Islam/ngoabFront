<div class="row">

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">ধরণ <span class="text-danger">*</span></label>
        {{-- <input type="text"  name="district_name[]" class="form-control" id=""
        placeholder=""> --}}

        <select  name="type" class="form-control distribution_type" id="distribution_type{{ $distributionListOnesEdit->id }}">
            <option value="">--- অনুগ্রহ করে ধরণ নির্বাচন করুন ---</option>
            <option value="প্রকল্প খাতের ব্যয়" {{ $distributionListOnesEdit->type == 'প্রকল্প খাতের ব্যয়' ? 'selected':'' }}>প্রকল্প খাতের ব্যয়</option>
            <option value="প্রশাসনিক ব্যয়" {{ $distributionListOnesEdit->type == 'প্রশাসনিক ব্যয়' ? 'selected':'' }}>প্রশাসনিক ব্যয়</option>
        </select>
    </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
            {{-- <input type="text"  name="district_name[]" class="form-control" id=""
            placeholder=""> --}}
            <?php
            $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

            ?>
            <select  name="district_name" class="form-control newdistrict_name" id="newdistrict_name{{ $distributionListOnesEdit->id }}">
                <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                @foreach($districtList as $districtListAll)
                <option value="{{ $districtListAll->district_bn }}" {{ $distributionListOnesEdit->district_name == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                @endforeach


            </select>
        </div>
<?php
$thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

?>
        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">উপজেলা<span class="text-danger">*</span></label>
            {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
            placeholder=""> --}}

            <select  name="upozila_name" class="form-control newupozila_name" id="newupozila_name{{ $distributionListOnesEdit->id }}">
                <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>

                @foreach($thanaList as $districtListAll)
                <option value="{{ $districtListAll->thana_bn }}" {{ $distributionListOnesEdit->upozila_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">দ্রব্যাদির বর্ণনা<span class="text-danger">*</span></label>
            <input type="text"  name="product_des" value="{{ $distributionListOnesEdit->product_des }}" class="form-control" id="product_des{{ $distributionListOnesEdit->id }}"
            placeholder="" >
        </div>
        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">পরিমাণ<span class="text-danger">*</span></label>
            <input type="number" name="product_quantity" value="{{ $distributionListOnesEdit->product_quantity }}" class="form-control" id="product_quantity{{ $distributionListOnesEdit->id }}"
            placeholder="">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label">একক মূল্য<span class="text-danger">*</span></label>
            <input type="number" name="unit_price" value="{{ $distributionListOnesEdit->unit_price }}" class="form-control" id="unit_price{{ $distributionListOnesEdit->id }}"
            placeholder="">
        </div>
        <?php 
                                    
        $unitLists = DB::table('units')->get();
        
        
        ?>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label">একক<span class="text-danger">*</span></label>
            <select name="unit_name" class="form-control" id="unit_name{{ $distributionListOnesEdit->id }}"
            placeholder="">
            <option value="">---নির্বাচন করুন ---</option>
            @foreach($unitLists as $unitList)
            <option value="{{$unitList->id}}" {{ $distributionListOnesEdit->unit_name == $unitList->id ? 'selected':'' }}>{{$unitList->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">মোট টাকার পরিমাণ<span class="text-danger">*</span></label>
            <input type="number" readonly name="total_amount" value="{{ $distributionListOnesEdit->total_amount }}" class="form-control" id="total_amount{{ $distributionListOnesEdit->id }}"
            placeholder="">
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label>
            <input type="number"  name="total_beneficiaries" value="{{ $distributionListOnesEdit->total_beneficiaries }}" class="form-control" id="total_beneficiaries{{ $distributionListOnesEdit->id }}" placeholder="">
        </div>
        <div class="col-lg-12 mb-3">
            <label for="" class="form-label">মন্তব্য</label>
            <textarea  name="comment" class="form-control" id="comment{{ $distributionListOnesEdit->id }}" placeholder="">{{ $distributionListOnesEdit->comment }}</textarea>
        </div>
</div>
<a id="{{ $distributionListOnesEdit->id }}"  class="btn btn-registration distributionAjaxEdit">দাখিল করুন</a>