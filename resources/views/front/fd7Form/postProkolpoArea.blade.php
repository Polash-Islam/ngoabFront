

<table class="table table-bordered">
    <tr>
        <th>বিভাগ</th>
        <th>জেলা/সিটি কর্পোরেশন</th>
        <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
        <th>প্রকল্পের ধরণ</th>
        <th>বরাদ্দকৃত বাজেট</th>
        <th>মোট উপকারভোগীর সংখ্যা</th>
        <th></th>
    </tr>


    <tr style="text-align: center;">
        <td>১</td>
        <td>২</td>
        <td>৩</td>
        <td>৪</td>
        <td>৫</td>
        <td>৬</td>
        <td></td>
    </tr>

    @foreach($prokolpoAreaList as $prokolpoAreaListAll)
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
            ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}
        </td>
        <td>
            {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
        </td>
        <td>{{ $prokolpoAreaListAll->allocated_budget }}</td>
        <td>{{ $prokolpoAreaListAll->number_of_beneficiaries }}</td>
        <td>
            <td>
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoAreaModalEdit{{ $prokolpoAreaListAll->id }}" >
                    <i class="fa fa-pencil"></i>
                </button>

                @include('front.fd7Form._partial.prokolpoAreaModalEdit')

                <button type="button" onclick="deleteTagProkolpoArea({{ $prokolpoAreaListAll->id}})" class="btn btn-sm btn-outline-danger"><i
                    class="bi bi-trash"></i></button>
            </td>
        </td>
    </tr>

  @endforeach

</table>

