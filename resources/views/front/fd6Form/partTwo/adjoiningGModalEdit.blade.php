<!--modal-->
<div class="modal modal-xl fade" id="adjoiningGModalEdit{{ $fd6AdjoiningGLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    সংলগ্নী ‘’ছ’’ এর বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">শিরোনাম/বিষয়<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $fd6AdjoiningGLists->subject }}"  name="subject" class="form-control" id="subject{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $fd6AdjoiningGLists->seminer_date }}"  name="seminer_date" class="form-control datepickerOne" id="seminer_date{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সময়<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $fd6AdjoiningGLists->seminer_time }}"  name="seminer_time" class="form-control" id="seminer_time{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">স্থান<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $fd6AdjoiningGLists->seminer_place }}"  name="seminer_place" class="form-control" id="seminer_place{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $fd6AdjoiningGLists->seminer_number }}"  name="seminer_number" class="form-control" id="seminer_number{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অংশগ্রহণকারীর সংখ্যা<span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $fd6AdjoiningGLists->seminer_perticipantion }}"  name="seminer_perticipantion" class="form-control" id="seminer_perticipantion{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বাজেট<span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $fd6AdjoiningGLists->seminer_budget }}"  name="seminer_budget" class="form-control" id="seminer_budget{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য</label>
                                        <textarea  name="comment" class="form-control" id="comment{{ $fd6AdjoiningGLists->id }}"
                                        placeholder="" >{!! $fd6AdjoiningGLists->comment !!}</textarea>
                                    </div>

                            </div>
                            <a id="{{ $fd6AdjoiningGLists->id }}"  class="btn btn-registration adjoininggModalUpdate">আপডেট করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
