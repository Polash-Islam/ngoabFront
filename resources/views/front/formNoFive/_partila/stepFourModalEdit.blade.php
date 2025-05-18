<!--modal-->
<div class="modal modal-xl fade" id="exampleModal{{ $formNoFiveStepFourDatas->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        {{-- <form action="{{ route('formNoFiveStepThreePost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf --}}
                            <input type="hidden" class="form-control" value="{{ $formNoFiveStepFourDatas->id }}" name="id" id="id{{ $formNoFiveStepFourDatas->id }}"  >
                            <input type="hidden" class="form-control" value="{{ $formNoFiveStepFourDatas->form_no_fives_id }}" name="decode_id"  id="decode_id{{ $formNoFiveStepFourDatas->id }}">
                            <div class="row">

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">সম্পদ / সম্পত্তির বিবরণ<span class="text-danger">*</span> </label>
                                    {{-- <textarea name="other_occupation"  class="form-control" id="" placeholder=""></textarea> --}}

                                    <select name="description_of_property"  type="text" class="form-control wealth_descrip" id="wealth_descrip{{ $formNoFiveStepFourDatas->id }}">
                                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                        <option value="স্থাবর" {{ $formNoFiveStepFourDatas->description_of_property == 'স্থাবর' ? 'selected':'' }}>স্থাবর</option>
                                        <option value="অস্থাবর" {{ $formNoFiveStepFourDatas->description_of_property == 'অস্থাবর' ? 'selected':'' }}>অস্থাবর</option>
                                    </select>


                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3" id="secondWealth{{ $formNoFiveStepFourDatas->id }}">

                                    @if($formNoFiveStepFourDatas->description_of_property == 'অস্থাবর')

<select id="sub_property{{ $formNoFiveStepFourDatas->id }}"  name="sub_property"  type="text" class="form-control">
    <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
    <option value="যানবাহন" {{ $formNoFiveStepFourDatas->sub_property == 'যানবাহন' ? 'selected':'' }}>যানবাহন</option>
    <option value="এয়ার কন্ডিশনার" {{ $formNoFiveStepFourDatas->sub_property == 'এয়ার কন্ডিশনার' ? 'selected':'' }}>এয়ার কন্ডিশনার</option>
</select>

                                    @else

                                    <select id="sub_property{{ $formNoFiveStepFourDatas->id }}"  name="sub_property"  type="text" class="form-control">
                                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                        <option value="জমি" {{ $formNoFiveStepFourDatas->sub_property == 'জমি' ? 'selected':'' }}>জমি</option>
                                        <option value="বিল্ডিং" {{ $formNoFiveStepFourDatas->sub_property == 'বিল্ডিং' ? 'selected':'' }}>বিল্ডিং</option>
                                        <option value="অন্যান্য" {{ $formNoFiveStepFourDatas->sub_property == 'অন্যান্য' ? 'selected':'' }}>অন্যান্য</option>
                                    </select>

                                    @endif

                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">পরিমাণ /সংখ্যা<span class="text-danger">*</span> </label>
                                    <input id="quantity{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->quantity}}" name="quantity"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রাপ্তি/সংগ্রহের তারিখ <span class="text-danger">*</span> </label>
                                    <input id="collect_date{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->collect_date}}"  name="collect_date"  type="text" class="form-control datepickerOne">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রকৃত ক্রয় মূল্য<span class="text-danger">*</span> </label>
                                    <input id="real_buying_price{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->real_buying_price}}"  name="real_buying_price"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অর্থের উৎস<span class="text-danger">*</span> </label>
                                    <input id="fund_source{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->fund_source}}"  name="fund_source"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কি কাজে ব্যবহৃত হতেছে<span class="text-danger">*</span> </label>
                                    <input id="what_is_it_used_for{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->what_is_it_used_for}}"  name="what_is_it_used_for"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অবস্থান(স্থান)<span class="text-danger">*</span> </label>
                                    <input id="place{{ $formNoFiveStepFourDatas->id }}" name="place" value="{{ $formNoFiveStepFourDatas->place}}"   type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input id="assets_sold_transferred_number_or_quantity{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->assets_sold_transferred_number_or_quantity}}"  name="assets_sold_transferred_number_or_quantity"  type="text" class="form-control">
                                </div>




                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input id="quantity_during_start_of_organization{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->quantity_during_start_of_organization}}"  name="quantity_during_start_of_organization"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত সর্বমোট ক্রয়মূল্য<span class="text-danger">*</span> </label>
                                    <input id="total_during_start_of_organization{{ $formNoFiveStepFourDatas->id }}" value="{{ $formNoFiveStepFourDatas->total_during_start_of_organization}}"  name="total_during_start_of_organization"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বর্তমান অবস্থা <span class="text-danger">*</span> </label>
                                    <select id="current_status{{ $formNoFiveStepFourDatas->id }}" name="current_status"  type="text" class="form-control">
                                        <option value="সচল" {{ $formNoFiveStepFourDatas->current_status == 'সচল' ? 'selected':'' }}>সচল</option>
                                        <option value="অচল" {{ $formNoFiveStepFourDatas->current_status == 'অচল' ? 'selected':'' }}>অচল</option>
                                    </select>
                                </div>

                            </div>
                            <a id="{{ $formNoFiveStepFourDatas->id }}"  class="btn btn-registration finalFormUpdate">আপডেট করুন</a>
                        {{-- </form> --}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
