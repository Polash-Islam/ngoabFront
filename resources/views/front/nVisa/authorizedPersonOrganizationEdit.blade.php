<div class="card-header custom-color">
    H. Authorized Personal of the organization
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Name:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization Name" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_name }}" name="auth_person_org_name">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization House No:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization House No" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_house_no }}" name="auth_person_org_house_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Flat No:  <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization Flat No" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_flat_no }}" name="auth_person_org_flat_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Road No: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization Road No" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_road_no }}" name="auth_person_org_road_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Thana: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
            placeholder="Organization Thana" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_thana }}" name="auth_person_org_thana">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Post Office:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization Post Office" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_post_office }}" name="auth_person_org_post_office">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization District:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Organization District" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_district }}" name="auth_person_org_district">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Organization Mobile: <span class="text-danger">*</span></label>
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number"
            maxlength = "11" class="form-control" id=""
                   placeholder="Organization Mobile" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_mobile }}" name="auth_person_org_mobile">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Submission Date: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Submission Date" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->submission_date }}" name="submission_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Expatriate Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Expatriate Name" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_name }}" name="expatriate_name">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Expatriate Email: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_email }}" name="expatriate_email"
                   placeholder="Expatriate Email:">
        </div>
    </div>
    <div class="d-grid d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-registration">submit
        </button>
    </div>
</div>
