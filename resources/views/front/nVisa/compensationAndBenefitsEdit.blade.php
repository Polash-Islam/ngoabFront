<?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Basic Salary')->first();

?>








<div class="card-header custom-color">
    E. COMPENSATION AND BENIFITS
</div>
<div class="card-body">
    <table class="table table-borderless">
        <tr>
            <th>Salary Structure</th>
            <th>Payble Locally</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td>Payment</td>
            <td>Amount</td>
            <td>Currency</td>
        </tr>
        <tr>
            @if(!$basic)
            <td>a. Basic Salary</td>
            <td>
                <select class="form-control" name="payment_type_basic" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  >মাসিক</option>
                    <option value="Yearly"   >বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_basic" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_basic" id="">
            </td>
            @else

            <td>a. Basic Salary</td>
            <td>
                <select class="form-control" name="payment_type_basic" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $basic->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $basic->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $basic->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $basic->amount}}" name="amount_basic" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $basic->currency}}" name="currency_basic" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$overseas)
            <td>b. Overseas allowance</td>
            <td>
                <select class="form-control" name="payment_type_overseas" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_overseas" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_overseas" id="">
            </td>
            @else
            <td>b. Overseas allowance</td>
            <td>
                <select class="form-control" name="payment_type_overseas" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $overseas->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $overseas->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $overseas->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $overseas->amount}}" name="amount_overseas" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $overseas->currency}}" name="currency_overseas" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$house)
            <td>c. House rent/Accommodation</td>
            <td>
                <select class="form-control" name="payment_type_home" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_home" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_home" id="">
            </td>

            @else
            <td>c. House rent/Accommodation</td>
            <td>
                <select class="form-control" name="payment_type_home" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $house->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $house->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $house->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $house->amount}}" name="amount_home" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $house->currency}}" name="currency_home" id="">
            </td>
            @endif
        </tr>
        <tr>
            @if(!$convoy)
            <td>d. Conveyance</td>
            <td>
                <select class="form-control" name="payment_type_conveyance" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_conveyance" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_conveyance" id="">
            </td>
            @else
            <td>d. Conveyance</td>
            <td>
                <select class="form-control" name="payment_type_conveyance" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $convoy->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $convoy->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $convoy->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $convoy->amount}}" name="amount_conveyance" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $convoy->currency}}" name="currency_conveyance" id="">
            </td>
            @endif
        </tr>
        <tr>

            @if(!$entertainment)

            <td>e. Entertainmemt allowance</td>
            <td>
                <select class="form-control" name="payment_type_entertainment" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_entertainment" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_entertainment" id="">
            </td>

            @else

            <td>e. Entertainmemt allowance </td>
            <td>
                <select class="form-control" name="payment_type_entertainment" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $entertainment->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $entertainment->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $entertainment->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $entertainment->amount}}" name="amount_entertainment" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $entertainment->currency}}" name="currency_entertainment" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$medical)
            <td>f. Medical allowance</td>
            <td>
                <select class="form-control" name="payment_type_medical" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_medical" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_medical" id="">
            </td>
            @else

            <td>f. Medical allowance</td>
            <td>
                <select class="form-control" name="payment_type_medical" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $medical->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $medical->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $medical->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $medical->amount}}" name="amount_medical" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $medical->currency}}" name="currency_medical" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$annual)

            <td>g. Annual Bonus</td>
            <td>
                <select class="form-control" name="payment_type_annual" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_annual" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_annual" id="">
            </td>
            @else
            <td>g. Annual Bonus</td>
            <td>
                <select class="form-control" name="payment_type_annual" id="">
                    <option value="">--Please Select--</option>
                    <option value="Monthly"  {{ $annual->payment_type == "Monthly" ? 'selected':''}}>Monthly</option>
                    <option value="Yearly"   {{ $annual->payment_type == "Yearly" ? 'selected':''}}>Yearly</option>
                    <option value="Not Applicable" {{ $annual->payment_type == "Not Applicable" ? 'selected':''}}>Not Applicable</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $annual->amount}}" name="amount_annual" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $annual->currency}}" name="currency_annual" id="">
            </td>
            @endif
        </tr>
        <tr>
            <td>h. Other fringe benefits, if any</td>
            <td colspan="3">
                <input type="text" name="other_benefit" value="{{ $nVisaEdit->other_benefit }}" class="form-control" id="">
            </td>
        </tr>
        <tr>
            <td>i. Any Particular Comments of remarks                                          </td>
            <td colspan="3">
                <input type="text" class="form-control" value="{{ $nVisaEdit->salary_remarks }}" name="salary_remarks" id="">
            </td>
        </tr>
    </table>
</div>
