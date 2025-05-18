
<table class="table table-bordered">

    <tr>
        <td style="width:60px;">ক্র:নং</td>
        <td>বিভাগ</td>
        <td>জেলা/সিটি কর্পোরেশন</td>
        <td>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</td>
        <td>প্রকল্পের ধরণ</td>
        <td>বরাদ্দকৃত বাজেট</td>
        <td>মোট উপকারভোগীর সংখ্যা</td>
        <td></td>
    </tr>
    <?php

    $totalProkolpoBud =0;


    ?>
    @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $prokolpoAreaListAll->division_name }}</td>
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
        <td>{{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}</td>
        <td>{{ $prokolpoAreaListAll->allocated_budget }}</td>
        <td>{{ $prokolpoAreaListAll->number_of_beneficiaries }}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoAreaModalEdit{{ $prokolpoAreaListAll->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd6Form._partial.stepOneModalEdit')


            <button type="button" onclick="deleteTagProkolpoArea({{ $prokolpoAreaListAll->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>
        </td>
    </tr>
    <?php

    $totalProkolpoBud =$totalProkolpoBud + $prokolpoAreaListAll->allocated_budget;


    ?>
    @endforeach
    <tr>
        <td colspan="6" style="text-align:right; ">সর্বমোট বাজেট : {{ $totalProkolpoBud }}</td>
        <td></td>
        <td></td>
    </tr>
</table>


