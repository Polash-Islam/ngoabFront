<div class="card-header custom-color">
    D. WORKPLACE ADDRESS
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">House/Plot/Holding/Village: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="House/Plot/Holding/Village" name="work_house_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Flat/Appartment/Floor: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Flat/Appartment/Floor" name="work_flat_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Road Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Road Number" name="work_road_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">City/District: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="City/District" name="work_district" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Thana/Upazilla: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
            placeholder="Thana/Upazilla" name="work_thana" required>
        </div>

        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Email: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Email" required name="work_email">
        </div>
        {{-- <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Type of Organization:<span class="text-danger">*</span></label>
            <select name="work_org_type" class="form-control" id="" required>
                <option value="NGO">NGO</option>
            </select>
        </div> --}}


        <input type="hidden" value="NGO" class="form-control" name="work_org_type" id="" required>


        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Contact Person Mobile Number: <span class="text-danger">*</span></label>
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number"
            maxlength = "11" class="form-control" id="" placeholder="Contact Person Mobile Number"
                   name="contact_person_mobile_number" data-parsley-required minlength="11"  data-parsley-trigger=“keyup”>
        </div>
    </div>
</div>
