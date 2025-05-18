<!--modal-->
<div class="modal modal-xl fade" id="exampleModalDataUpdate{{ $employeeDetailLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" name="organization_ceo_name" value="{{ $employeeDetailLists->employee_name }}" class="form-control mt-2" id="organization_ceo_name{{ $employeeDetailLists->id }}"
                                placeholder="কর্মকর্তার নাম">
                                </div>

                                <div class="col-lg-6 mb-3">

                                <input type="text"name="organization_ceo_designation" value="{{ $employeeDetailLists->employee_designation }}" class="form-control mt-2" id="organization_ceo_designation{{ $employeeDetailLists->id }}"
                                placeholder="কর্মকর্তার পদবি">
                                </div>
                                <div class="col-lg-6 mb-3">


                                    <input type="text" name="organization_ceo_telephone" value="{{ $employeeDetailLists->employee_telephone}}" class="form-control mt-2" id="organization_ceo_telephone{{ $employeeDetailLists->id }}"
                                           placeholder="কর্মকর্তার টেলিফোন">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number" value="{{ $employeeDetailLists->employee_mobile }}"
                                    maxlength = "11" minlength="11" data-parsley-required  name="organization_ceo_mobile" class="form-control mt-2" id="organization_ceo_mobile{{ $employeeDetailLists->id }}"
                                           placeholder=" কর্মকর্তার মোবাইল">
                                </div>
                                <div class="col-lg-6 mb-3">
                                           <input type="email" value="{{ $employeeDetailLists->employee_email }}" name="organization_ceo_email" class="form-control mt-2" id="organization_ceo_email{{ $employeeDetailLists->id }}"
                                           placeholder="কর্মকর্তার ইমেইল">
                                </div>



                            </div>
                            <a id="{{ $employeeDetailLists->id }}"  class="btn btn-registration employeeAddUpdate">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
