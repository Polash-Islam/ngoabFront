
<table class="table table-bordered">

    <tr style="text-align: center;">
        <th >ক. কর্ম এলাকা (জেলা ও উপজেলা উল্লেখসহ) <span style="color:red;">*</span></th>
        <th >খ. বিস্তারিত বাজেট বিবরণী (জেলা ও উপজেলাভিত্তিক ) </th>
        <th >গ. মোট উপকারভোগীর সংখ্যা</th>
        <th ></th>
    </tr>

    @foreach($prokolpoAreaList as $prokolpoAreaListAll)
    <tr>
        <td><span>বিভাগ: {{ $prokolpoAreaListAll->division_name }}
            <br>

            জেলা: {{ $prokolpoAreaListAll->district_name }}
            <br>

            @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

            @else
            সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
            <br>
            @endif

            @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

            @else
            উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
            @endif

            থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
            পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
            ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}

        </span></td>
        <td><span>

            প্রকল্পের ধরণ: {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
            <br>
            বরাদ্দকৃত বাজেট: {{ $prokolpoAreaListAll->allocated_budget }}
        </span>

            </td>
        <td>{{ $prokolpoAreaListAll->number_of_beneficiaries }}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoAreaModalEdit{{ $prokolpoAreaListAll->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fc1Form._partial.stepOneModalEdit')


            <button type="button" onclick="deleteTagProkolpoArea({{ $prokolpoAreaListAll->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>
        </td>
    </tr>
    @endforeach

</table>


