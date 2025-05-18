<div class="card-header custom-color">
    C. EMPLOYMENT INFORMATION
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Name of the post employed for (Designation):<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Name of the post employed for (Designation)" value="{{ $nVisaEdit->nVisaEmploymentInformation->employed_designation }}" required name="employed_designation">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of arrival in Bangladesh: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Date of arrival in Bangladesh" required name="date_of_arrival_in_bangladesh" value="{{ $nVisaEdit->nVisaEmploymentInformation->date_of_arrival_in_bangladesh }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Type of visa:  <span class="text-danger">*</span></label>
            <select name="visa_type" class="form-control" id="" required>
                <option value="N-Visa">N-Visa</option>
            </select>
            <input type="hidden" class="form-control" name="travel_visa_cate" value="2">
        </div>
        {{-- <div class="mb-3 col-lg-4">
            <label for="" class="form-label">: <span class="text-danger">*</span></label>
            <select name="" class="form-control" id="">
                <option value="">Select one</option>
                <option value="">Select two</option>
            </select>
        </div> --}}
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of first assignment: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Date of first assignment" required name="first_appoinment_date" value="{{ $nVisaEdit->nVisaEmploymentInformation->first_appoinment_date }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Desired Effective Date: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Desired Effective Date" required name="desired_effective_date" value="{{ $nVisaEdit->nVisaEmploymentInformation->desired_effective_date }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Desired End Date: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Desired End Date" required name="desired_end_date" value="{{ $nVisaEdit->nVisaEmploymentInformation->desired_end_date }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Desired Duration: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Desired Duration" name="visa_validity" value="{{ $nVisaEdit->nVisaEmploymentInformation->visa_validity }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Brief job description: <span class="text-danger">*</span></label>
            <textarea name="brief_job_description" class="form-control" id="" cols="30" rows="4" required>{{ $nVisaEdit->nVisaEmploymentInformation->brief_job_description }}</textarea>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Employee Justification: <span class="text-danger">*</span></label>
            <textarea name="employee_justification" class="form-control" id="" cols="30" rows="4" required>{{ $nVisaEdit->nVisaEmploymentInformation->employee_justification }}</textarea>
        </div>
    </div>
</div>
