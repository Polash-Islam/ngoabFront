<div class="card-header custom-color">
    A. PARTICULAR OF SPONSOR/EMPLOYER
</div>
<div class="card-body">
    <div class="mb-3 row">
        <label for="" class="col-sm-6 col-form-label">Name of the enterprise (organization/company)  <span
                    class="text-danger">*</span></label>
        <div class="col-sm-6">
            <input type="text" name="org_name" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_name }}" class="form-control" id="" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="" class="col-sm-12 col-form-label">Address of the enterprise (Bangladesh Only)<span
                    class="text-danger">*</span></label>
    </div>
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">House/Plot/Holding/Villag:  <span class="text-danger">*</span></label>
            <input type="text" name="org_house_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_house_no }}" class="form-control" id=""
                   placeholder="House/Plot/Holding/Villag" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Flat/Apartment/Floor:
        <span class="text-danger">*</span></label>
            <input type="text" name="org_flat_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_flat_no }}" class="form-control"
                   placeholder="Flat/Apartment/Floor" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Road Number:<span
                        class="text-danger">*</span></label>
            <input type="text" name="org_road_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_road_no }}" class="form-control"
                   placeholder="Road Number" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Post/Zip Code:</label>
            <input type="text" name="org_post_code" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_code }}" class="form-control" id=""
                   placeholder="Post/Zip Code" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Post Office: </label>
            <input type="text" name="org_post_office" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_office }}" class="form-control"
                   placeholder="Post Office" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Telephone Number:<span
                        class="text-danger">*</span></label>
            <input type="text" name="org_phone" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_phone }}" class="form-control"
                   placeholder="Telephone Number" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">City/District: <span
                        class="text-danger">*</span></label>
                        <input type="text" name="org_district" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_district }}" class="form-control"
                        placeholder="City/District" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Thana/Upazilla:                                                <span
                        class="text-danger">*</span></label>
                        <input type="text" name="org_thana" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_thana }}" class="form-control"
                        placeholder="Thana/Upazilla" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Fax Number:</label>
            <input type="text" name="org_fax_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_fax_no }}" class="form-control"
                   placeholder="Fax Number" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইমেল:<span
                        class="text-danger">*</span></label>
            <input type="email" name="org_email" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_email }}" class="form-control"
                   placeholder="ইমেল" required>
        </div>
        {{-- <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Type of the Organization:<span
                        class="text-danger">*</span></label>
            <select name="org_type" id="" class="form-control" required>
                <option value="NGO">NGO</option>
            </select>
        </div> --}}
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Nature of buisness:</label>
            <input type="text" name="nature_of_business" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->nature_of_business }}" class="form-control"
                   placeholder="Nature of buisness">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Authorized Capital:</label>
            <input type="text" name="authorized_capital" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->authorized_capital }}" class="form-control"
                   placeholder="Authorized Capital">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Paid up capital:</label>
            <input type="text" name="paid_up_capital" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->paid_up_capital }}" class="form-control"
                   placeholder="Paid up capital">
        </div>
        <div class="mb-3 col-lg-8">
            <label for="" class="form-label">Remittance received during last 12 months: </label>
            <input type="text" name="remittance_received" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->remittance_received }}" class="form-control"
                   placeholder="Remittance received during last 12 months">
        </div>
        {{-- <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Type of Industry:</label>
            <select name="industry_type" id="" class="form-control">
                <option value="NGO">NGO</option>

            </select>
        </div> --}}
        <input type="hidden" value="NGO" class="form-control" name="industry_type" id="" required>
        <input type="hidden" value="NGO" class="form-control" name="org_type" id="" required>

        <div class="mb-3 col-lg-8">
            <label for="" class="form-label">Recommendation of Company Boards:</label>
            <input type="text" name="recommendation_of_company_board" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->recommendation_of_company_board }}"" class="form-control"
                   placeholder="Recommendation of Company Boards">
        </div>
        <div class="mb-3 col-lg-12">
            <label for="" class="form-label">Whether local, foreign or joint venture company (if joint venture, percentage of local and foreign investment is to be shown):</label>
            <input type="text" name="company_share" class="form-control" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->company_share }}"
                   placeholder="Whether local, foreign or joint venture company (if joint venture, percentage of local and foreign investment is to be shown)">
        </div>
    </div>
</div>
