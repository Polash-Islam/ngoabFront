<tr>
    <td>বিভাগ: {{ $prokolpoAreaListAll->division_name }}</td>
    <td>
        জেলা: {{ $prokolpoAreaListAll->district_name }} <br>


        @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

        @else
        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
        @endif
    </td>
    <td>
        @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

        @else
        উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
        @endif
        থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
        পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
        ওয়ার্ড: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->ward_name) }}
    </td>
    <td>
        {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
    </td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}</td>
</tr>
