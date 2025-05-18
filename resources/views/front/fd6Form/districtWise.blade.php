<table class="table table-bordered">
    <tr>
        <th rowspan="2">ত্রু : নং</th>
        <th rowspan="2">জেলা/সিটি/ পৌর-কর্পোরেশন</th>
        <th rowspan="2">উপজেলা/ থানা/ ওয়ার্ড</th>
        <th rowspan="2">কার্যক্রম সমূহ</th>
        <th rowspan="2">প্রকল্প সময়</th>
        <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
        <th rowspan="2">মোট বাজেট</th>
        <th rowspan="2">মন্তব্য (যেখানে প্রযোজ্য)</th>
        <th rowspan="2"></th>
    </tr>
    <tr>
        <th>বছর</th>
        <th>বাস্তব</th>
        <th>আর্থিক</th>
    </tr>
    @foreach($districtWiseList as $key=>$districtWiseLists)
    <tr>
        <td>{{ $key+1 }}</td>
        <td><span>
            জেলা: {{ $districtWiseLists->district_name }}
            <br>

            @if($districtWiseLists->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

            @else
            সিটি কর্পোরেশন: {{ $districtWiseLists->city_corparation_name }}
            <br>
            @endif

            @if(empty($districtWiseLists->city_corparation_name))

            @else
            পৌরসভা: {{ $districtWiseLists->municipality_name }} <br>
            <br>
            @endif

        </td>
        <td>
            @if($districtWiseLists->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

            @else
            উপজেলা: {{ $districtWiseLists->upozila_name }} <br>
            @endif

            থানা: {{ $districtWiseLists->thana_name }} <br>

            ওয়ার্ড: {{ $districtWiseLists->ward_name }}

        </td>
        <td>{{ $districtWiseLists->activities }}</td>
    
        <td>{{ $districtWiseLists->prokolpo_time }}</td>
        <td>{{ $districtWiseLists->target_year }}</td>
        <td>{{ $districtWiseLists->last_year_target_real }}</td>
        <td>{{ $districtWiseLists->last_year_target_financial }}</td>
        <td>{{ $districtWiseLists->total_budget }}</td>
        <td>{{ $districtWiseLists->comment }}</td>
        <td>

            <div class="d-flex justify-content-center">
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#JelawaisKarjokokromEdit{{ $districtWiseLists->id }}" >
                    <i class="fa fa-pencil"></i>
                </button>

                @include('front.fd6Form._partial.JelawaisKarjokokromModalEdit')

                <button type="button" style="margin-left: 5px;" onclick="deleteDistrictResult({{ $districtWiseLists->id}})" class="btn btn-sm btn-outline-danger"><i
                    class="bi bi-trash"></i></button>
            </div>

        </td>
    </tr>
    @endforeach
</table>
