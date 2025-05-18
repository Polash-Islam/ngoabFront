<div class="modal modal-xl fade" id="exampleModalDataUpdateUsed{{ $receivedGoodLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input type="text" value="{{ $receivedGoodLists->organization_usage_volume }}" name="organization_usage_volume" class="form-control" id="organization_usage_volume{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ<span class="text-danger">*</span></label>
                                        <textarea  name="person_detail" class="form-control summernote" id="person_detail{{ $receivedGoodLists->id }}" placeholder="">
                                            {{ $receivedGoodLists->person_detail }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea  name="details_of_any_goods_sold" class="form-control summernote" id="details_of_any_goods_sold{{ $receivedGoodLists->id }}" placeholder="">
                                            {{ $receivedGoodLists->details_of_any_goods_sold }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_goods_sold64({{ $receivedGoodLists->id }})" name="bureau_approval_file_goods_sold" class="form-control" id="bureau_approval_file_goods_sold{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                        <input type="hidden" name="bureau_approval_file_hidden" class="form-control" id="bureau_approval_file_hidden{{ $receivedGoodLists->id }}"
                                        placeholder="">

                                        @if(!$receivedGoodLists->bureau_approval_file_goods_sold)

                                        @else
                                        <?php

                                        $file_path = url($receivedGoodLists->bureau_approval_file_goods_sold);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                        ?>
                                        {{ $filename.'.'.$extension }}
                                        @endif

                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ <span class="text-danger">*</span></label>
                                        <textarea  name="goods_transferred_detail" class="form-control summernote" id="goods_transferred_detail{{ $receivedGoodLists->id }}" placeholder="">
                                            {{ $receivedGoodLists->goods_transferred_detail }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_transferred_detail64({{ $receivedGoodLists->id }})" name="bureau_approval_file_transferred_detail" class="form-control" id="bureau_approval_file_transferred_detail{{ $receivedGoodLists->id }}"
                                        placeholder="">

                                        <input type="hidden" name="bureau_approval_file_transferred_hidden" class="form-control" id="bureau_approval_file_transferred_hidden{{ $receivedGoodLists->id }}"
                                        placeholder="">

                                        @if(!$receivedGoodLists->bureau_approval_file_transferred_detail)

                                        @else
                                        <?php

                                        $file_path = url($receivedGoodLists->bureau_approval_file_transferred_detail);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                        ?>
                                        {{ $filename.'.'.$extension }}
                                        @endif

                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea  name="detail_of_goods_medium" class="form-control summernote" id="detail_of_goods_medium{{ $receivedGoodLists->id }}" placeholder="">
                                            {{ $receivedGoodLists->detail_of_goods_medium }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" accept=".pdf" onchange="bureau_approval_file_goods_medium64({{ $receivedGoodLists->id }})" name="bureau_approval_file_goods_medium" class="form-control" id="bureau_approval_file_goods_medium{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                        <input type="hidden" name="bureau_approval_file_goods_medium_hidden" class="form-control" id="bureau_approval_file_goods_medium_hidden{{ $receivedGoodLists->id }}"
                                        placeholder="">

                                        @if(!$receivedGoodLists->bureau_approval_file_goods_medium)

                                        @else
                                        <?php

                                        $file_path = url($receivedGoodLists->bureau_approval_file_goods_medium);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                        ?>
                                        {{ $filename.'.'.$extension }}
                                        @endif
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">অবশিষ্ট মালামালের বিবরণ (যদি থাকে)<span class="text-danger">*</span></label>
                                        <textarea  name="details_of_remaining_goods" class="form-control summernote" id="details_of_remaining_goods{{ $receivedGoodLists->id }}" placeholder="">
                                            {{ $receivedGoodLists->details_of_remaining_goods }}
                                        </textarea>
                                    </div>


                            </div>
                              {{-- <button type="submit"  class="btn btn-registration">জমা দিন</button> --}}
                            <a id="{{ $receivedGoodLists->id }}"  class="btn btn-registration updateReceivedUsedAjax">আপডেট করুন</a>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
