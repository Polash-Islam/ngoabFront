<!--modal-->
<div class="modal modal-xl fade" id="adjoiningfModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    সংলগ্নী ‘’চ’’ এর বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">ধরণ<span class="text-danger">*</span></label>
                                        <select name="stepFiveType" class="form-control" id="stepFiveType0"
                                        placeholder="">
                                        <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                        <option value="আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা">আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা</option>
                                        <option value="মেশিনপত্রের বর্ণনা">মেশিনপত্রের বর্ণনা</option>
                                        <option value="যানবাহনের বর্ণনা">যানবাহনের বর্ণনা</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">আইটেমের নাম<span class="text-danger">*</span></label>
                                        <input type="text"  name="item_name" class="form-control" id="item_name0"
                                        placeholder="" >
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">পরিমান<span class="text-danger">*</span></label>
                                        <input type="number"  name="item_quantity" class="form-control" id="item_quantity0"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="" class="form-label">একক মূল্য<span class="text-danger">*</span></label>
                                        <input type="number"  name="item_net_price" class="form-control" id="item_net_price0"
                                        placeholder="" >
                                    </div>

                                    <?php 
                                    
                                    $unitLists = DB::table('units')->get();
                                    
                                    
                                    ?>

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
                                        <label for="" class="form-label">মোট ব্যায়<span class="text-danger">*</span></label>
                                        <input type="number"  name="item_total_price" class="form-control" id="item_total_price0"
                                        placeholder="" >
                                    </div>



                            </div>
                            <a id="adjoiningfModalPost"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
