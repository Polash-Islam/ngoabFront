<!--modal-->
<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="decode_id">
                            <div class="row">

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">সম্পদ / সম্পত্তির বিবরণ<span class="text-danger">*</span> </label>
                                    {{-- <textarea name="other_occupation"  class="form-control" id="" placeholder=""></textarea> --}}

                                    <select name="description_of_property"  type="text" class="form-control" id="wealth_descrip">
                                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                        <option value="স্থাবর">স্থাবর</option>
                                        <option value="অস্থাবর">অস্থাবর</option>
                                    </select>


                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3" id="secondWealth">

                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">পরিমাণ /সংখ্যা<span class="text-danger">*</span> </label>
                                    <input id="quantity" name="quantity"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রাপ্তি/সংগ্রহের তারিখ <span class="text-danger">*</span> </label>
                                    <input id="collect_date" name="collect_date"  type="text" class="form-control datepickerOne">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রকৃত ক্রয় মূল্য<span class="text-danger">*</span> </label>
                                    <input id="real_buying_price" name="real_buying_price"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অর্থের উৎস<span class="text-danger">*</span> </label>
                                    <input id="fund_source" name="fund_source"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কি কাজে ব্যবহৃত হতেছে<span class="text-danger">*</span> </label>
                                    <input id="what_is_it_used_for" name="what_is_it_used_for"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অবস্থান(স্থান)<span class="text-danger">*</span> </label>
                                    <input id="place" name="place"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input id="assets_sold_transferred_number_or_quantity" name="assets_sold_transferred_number_or_quantity"  type="text" class="form-control">
                                </div>




                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input id="quantity_during_start_of_organization" name="quantity_during_start_of_organization"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত সর্বমোট ক্রয়মূল্য<span class="text-danger">*</span> </label>
                                    <input id="total_during_start_of_organization" name="total_during_start_of_organization"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বর্তমান অবস্থা <span class="text-danger">*</span> </label>
                                    <select id="current_status" name="current_status"  type="text" class="form-control">
                                        <option value="সচল" selected>সচল</option>
                                        <option value="অচল">অচল</option>
                                    </select>
                                </div>

                            </div>
                            <a id="finalFormSubmit" class="btn btn-registration">জমা দিন</a>
                        {{-- </form> --}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
