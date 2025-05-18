<div class="card card-custom-color">
    <div class="card-header custom-color">
        Basic Information
    </div>
    <div class="card-body">

            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="" class="form-label">Approved permission
                                period <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id=""
                                   placeholder="One (01) Year" value="{{ $nVisaEdit->period_validity }}" name="period_validity" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="" class="form-label">Effective Date<span
                                        class="text-danger">*</span></label>
                            <input type="text" class="form-control datepickerOne"
                                   placeholder="Effective Date" value="{{ $nVisaEdit->permit_efct_date }}" name="permit_efct_date" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">Ref no. of issued work permit <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="visa_ref_no" value="{{ $nVisaEdit->visa_ref_no }}" class="form-control" id="" required>
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">Received Visa Recommendation Letter <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_recomendation_letter_received_way"
                                data-parsley-checkmin="1" data-parsley-required id="" value="Online" {{ $nVisaEdit->visa_recomendation_letter_received_way == 'Online' ? 'checked':''  }}>
                                <label class="form-check-label"
                                       for="">Online</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_recomendation_letter_received_way"
                                data-parsley-checkmin="1" data-parsley-required  id="" value="Manually" {{ $nVisaEdit->visa_recomendation_letter_received_way == 'Manually' ? 'checked':''  }}>
                                <label class="form-check-label"
                                       for="">Manually</label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">Ref no. of Visa Recommendation Letter  <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="" value="{{ $nVisaEdit->visa_recomendation_letter_ref_no }}" name="visa_recomendation_letter_ref_no" required>
                        </div>
                    </div>

                    <input type="hidden" name="visa_recomendation_letter_received_way" class="form-control" value="Online" required>
                    <input type="hidden" value="NGO" class="form-control" name="department_in" id="" required>

                    <input type="hidden" value="N-Visa" class="form-control" name="visa_category" id="" required>


                    {{-- <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">Department in
                            <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $nVisaEdit->department_in }}" name="department_in" id="" required>
                        </div>
                    </div> --}}
                    {{-- <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">Work Permit type<span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_category"
                                       id="" data-parsley-checkmin="1" data-parsley-required  value="N-Visa" {{ $nVisaEdit->visa_category == 'N-Visa' ? 'checked':''  }}>
                                <label class="form-check-label" for="">N-Visa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_category"
                                       id="" data-parsley-checkmin="1" data-parsley-required  value="New Industrial" {{ $nVisaEdit->visa_category == 'New Industrial' ? 'checked':''  }}>
                                <label class="form-check-label" for="">New Industrial</label>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ফরওয়ার্ডিং লেটার<span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="">
                            <div id="emailHelp" class="form-text">We'll never share
                                your email with anyone else.[File Format: *.pdf,
                                File size (1-3) MB]
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="nvisa-avatar">
                        <img src="{{ asset('/') }}{{ $nVisaEdit->applicant_photo }}" alt="" id="output">
                    </div>
                    <input type="file" accept="image/*"
                    onchange="loadFile(event)" name="applicant_photo"  id="upload" hidden/>
             <label class="login_upload_button btn btn-registration"  for="upload">Choose
                 Image</label>
                </div>
            </div>

    </div>
</div>
