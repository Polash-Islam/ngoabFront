@foreach($prokolpoPriod as $sprokolpoPriod)

<option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date))) }}</option>

@endforeach