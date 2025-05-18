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
                        <form action="{{ route('formNoFiveStepThreePost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="decode_id">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">জেলার নাম<span class="text-danger">*</span></label>
                                    {{-- <input type="text" required name="district_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select required name="district_name" class="form-control district_name" id="district_name0">
                                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                        @foreach($divisionList as $districtListAll)

                                        <option value="{{ $districtListAll->district_bn }}">{{ $districtListAll->district_bn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">উপজেলার নাম</label>
                                    {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                    placeholder=""> --}}


                                    <select required name="upazila_name" class="form-control upozila_name" id="upozila_name">
                                        <option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>


                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">উপজেলার জন্য মোট বরাদ্দ<span class="text-danger">*</span> </label>
                                    <input name="total_allocation_for_upazila" required type="text" class="form-control" id="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">মোট প্রকৃত ব্যয়<span class="text-danger">*</span> </label>
                                    <input name="total_actual_cost" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">মন্তব্য</label>
                                    <textarea name="comment"  class="form-control" id="" placeholder=""></textarea>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-registration"  id="sessionDataStore">জমা দিন</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
