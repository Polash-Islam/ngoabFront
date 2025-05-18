<div class="card-header custom-color">
    B. PARTICULARS OF FOREIGN INCUMBENT
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Name of the foreign national: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Name of the foreign national" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->name_of_the_foreign_national }}" name="name_of_the_foreign_national" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Nationality:<span
                        class="text-danger">*</span></label>

                        <input type="text" class="form-control" id=""
                        placeholder="Nationality" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality  }}" name="nationality" required>


                        {{-- <select class="js-example-basic-single form-control" data-parsley-required name="nationality"
                       >
<option value="">--Please Select--</option>
                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                        @if(session()->get('locale') == 'en')
                        <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality == $allGetCityzenshipData->country_people_english ? 'selected':''}}>{{ $allGetCityzenshipData->country_people_english }}</option>
                        @else
                    <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality == $allGetCityzenshipData->country_people_english ? 'selected':''}}>{{ $allGetCityzenshipData->country_people_english }}</option>
                    @endif
                    @endforeach

                </select> --}}
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Passport Number:<span
                        class="text-danger">*</span></label>
            <input type="text" class="form-control"
                   placeholder="Passport Number" required name="passport_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_no }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of Issue: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Date of Issue" required name="passport_issue_date" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_date }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Place of Issue: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Place of Issue" name="passport_issue_place" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_place }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Expiry Date: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Expiry Date" required name="passport_expiry_date" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_expiry_date }}">
        </div>
        <div class="mb-3 col-sm-12 ">
            <label for="" class="col-form-label">Permanent Address</label>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Country: <span class="text-danger">*</span></label>
            {{-- <select name="home_country" class="js-example-basic-single form-control custom-form-control" data-parsley-required  >
                <option value="">--Please Select One--</option>
                @foreach($countryList as $allCountryList)
                @if(session()->get('locale') == 'en')
                <option value="{{ $allCountryList->country_name_english }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country == $allCountryList->country_name_english ? 'selected':''}}>{{ $allCountryList->country_name_bangla }}</option>
                @else
                <option value="{{ $allCountryList->country_name_english }}"{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country == $allCountryList->country_name_english ? 'selected':''}}>{{ $allCountryList->country_name_english }}</option>
                @endif
@endforeach
            </select> --}}

            <input type="text" class="form-control" id=""
                        placeholder="Nationality" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country  }}" name="home_country" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">House/Plot/Holding Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="House/Plot/Holding Number" name="house_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->house_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Flat/Apartment/Floor Numbe: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Flat/Apartment/Floor Numbe" name="flat_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->flat_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Street Name/Street Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Street Name/Street Number" name="road_no"  value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->road_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Post/Zip Code: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Post/Zip Code" name="post_code" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->post_code }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">State/Province: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="State/Province" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->state }}" required name="state">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Telephone Number: <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id=""
                   placeholder="Telephone Number" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->phone }}" name="phone" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">City: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="City" name="city" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->city }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Fax Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="" name="fax_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->fax_no }}"
                   placeholder="Fax Number" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Email: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id=""
                   placeholder="Email" required name="email" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->email }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of Birth: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepickerOne" id=""
                   placeholder="Date of Birth" name="date_of_birth" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->date_of_birth }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Marital Status: <span class="text-danger">*</span></label>
            <select name="martial_status" class="form-control" id="" required>
                <option value="">--Please Select--</option>
                <option value="Married" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status == 'Married' ? 'selected':''}}>Married</option>
                <option value="Unmarried" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status == 'Unmarried' ? 'selected':''}}>Unmarried</option>
            </select>
        </div>
    </div>
</div>
