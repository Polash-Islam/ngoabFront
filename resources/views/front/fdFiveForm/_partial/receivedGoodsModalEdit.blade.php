<div class="modal modal-xl fade" id="exampleModalDataUpdate{{ $receivedGoodLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="" class="form-label">তারিখ</label>
                                        <input type="text" value="{{ $receivedGoodLists->source_received_date }}" name="source_received_date" class="form-control datepickerOne" id="source_received_date{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $receivedGoodLists->source_of_goods_name }}"  name="source_of_goods_name" class="form-control" id="source_of_goods_name{{ $receivedGoodLists->id }}"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার ঠিকানা</label>
                                        <input type="text" value="{{ $receivedGoodLists->source_of_goods_address }}" name="source_of_goods_address" class="form-control" id="source_of_goods_address{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">গ্রহণের প্রকৃত (শুল্কমূক্তভাবে গ্রহণকৃত/শুল্ক পরিশোধ করে গ্রহণকৃত)</label>
                                        <input type="text" value="{{ $receivedGoodLists->actual_of_receipt_source }}" name="actual_of_receipt_source" class="form-control" id="actual_of_receipt_source{{ $receivedGoodLists->id }}"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য<span class="text-danger">*</span></label>
                                        <textarea  name="purpose_of_receipt_goods" class="form-control summernote" id="purpose_of_receipt_goods{{ $receivedGoodLists->id }}" placeholder="">
                                           {{ $receivedGoodLists->purpose_of_receipt_goods }}
                                        </textarea>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">গ্রহণকৃত সামগ্রীর পরিমান<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $receivedGoodLists->amount_of_material_received }}"  name="amount_of_material_received" class="form-control" id="amount_of_material_received{{ $receivedGoodLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $receivedGoodLists->estimated_value_of_goods }}"  name="estimated_value_of_goods" class="form-control" id="estimated_value_of_goods{{ $receivedGoodLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রতিশ্রুতি প্রদানের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $receivedGoodLists->date_of_Commitment }}"  name="date_of_Commitment" class="form-control datepickerOne" id="date_of_Commitment{{ $receivedGoodLists->id }}" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $receivedGoodLists->date_of_project_approval }}"  name="date_of_project_approval" class="form-control datepickerOne" id="date_of_project_approval{{ $receivedGoodLists->id }}" placeholder="">
                                    </div>

                            </div>
                            <a id="{{ $receivedGoodLists->id }}"  class="btn btn-registration updateReceivedAjax">জমা দিন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
