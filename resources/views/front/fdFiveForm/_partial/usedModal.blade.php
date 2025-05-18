<div class="modal modal-xl fade" id="exampleModal121"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="" class="form-label">সংস্থার ব্যবহারের পরিমাণ</label>
                                        <input type="text" name="organization_usage_volume" class="form-control" id="organization_usage_volume0"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ<span class="text-danger">*</span></label>
                                        <textarea  name="person_detail" class="form-control summernote" id="person_detail0" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea  name="details_of_any_goods_sold" class="form-control summernote" id="details_of_any_goods_sold0" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_goods_sold64(0)" name="bureau_approval_file_goods_sold" class="form-control" id="bureau_approval_file_goods_sold0"
                                        placeholder="">
                                        <input type="hidden" name="bureau_approval_file_hidden" class="form-control" id="bureau_approval_file_hidden0"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ <span class="text-danger">*</span></label>
                                        <textarea  name="goods_transferred_detail" class="form-control summernote" id="goods_transferred_detail0" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_transferred_detail64(0)" name="bureau_approval_file_transferred_detail" class="form-control" id="bureau_approval_file_transferred_detail0"
                                        placeholder="">

                                        <input type="hidden" name="bureau_approval_file_transferred_hidden" class="form-control" id="bureau_approval_file_transferred_hidden0"
                                        placeholder="">

                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea  name="detail_of_goods_medium" class="form-control summernote" id="detail_of_goods_medium0" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_goods_medium64(0)" name="bureau_approval_file_goods_medium" class="form-control" id="bureau_approval_file_goods_medium0"
                                        placeholder="">
                                        <input type="hidden" name="bureau_approval_file_goods_medium_hidden" class="form-control" id="bureau_approval_file_goods_medium_hidden0"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">অবশিষ্ট মালামালের বিবরণ (যদি থাকে)<span class="text-danger">*</span></label>
                                        <textarea  name="details_of_remaining_goods" class="form-control summernote" id="details_of_remaining_goods0" placeholder="">
                                        </textarea>
                                    </div>


                            </div>
                              {{-- <button type="submit"  class="btn btn-registration">জমা দিন</button> --}}
                            <a id="postReceivedUsedAjax"  class="btn btn-registration">জমা দিন</a>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
