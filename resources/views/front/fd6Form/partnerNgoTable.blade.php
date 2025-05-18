<table class="table table-bordered"  id="">
<tr>
    <th>পার্টনার এনজিওর নাম ও ঠিকানা (টেলিফোন, মোবাইল, ইমেইল
        নম্বরসহ)
    </th>
    <th>এনজিও ব্যুরোর নিবন্ধন নং ও মেয়াদ :</th>
    <th>পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য
        কার্যক্রমসমূহ (বিস্তারিত)
    </th>
    <th>কর্ম এলাকা (সম্ভাব্য ইউনিয়ন/ওয়ার্ড পর্যন্ত)</th>
    <th>বাজেট</th>
    <th>সম্পাদনের সময়সীমা</th>
    <th>উপকারভোগী</th>
    <th></th>
</tr>
<?php

$totalNewBudget = 0;

?>
@foreach ($partnerDataPostList as $partnerDataPostLists)


<tr>
    <td>
        <ul>
            <li>পার্টনার এনজিওর নাম: {{ $partnerDataPostLists->partner_ngo_name }}</li>
            <li>ঠিকানা: {{ $partnerDataPostLists->partner_ngo_address }}</li>
            <li>টেলিফোন: {{ $partnerDataPostLists->partner_ngo_telephone }}</li>
            <li>মোবাইল: {{ $partnerDataPostLists->partner_ngo_mobile }}</li>
            <li>ইমেইল: {{ $partnerDataPostLists->partner_ngo_email }}</li>
        </ul>
    </td>
    <td>
        <ul>
            <li>এনজিও ব্যুরোর নিবন্ধন নং : {{ $partnerDataPostLists->partner_ngo_reg_name }}</li>
            <li>মেয়াদ: {{ $partnerDataPostLists->partner_ngo_duration }}</li>
        </ul>
    </td>
    <td>{!! $partnerDataPostLists->partner_ngo_work_detail !!}</td>
    <td><ul>
        <li>বিভাগ: {{ $partnerDataPostLists->division_name }}</li>
        <li>জেলা: {{ $partnerDataPostLists->district_name }}</li>
        <li>সিটি কর্পোরেশন: {{ $partnerDataPostLists->city_corparation_name }}</li>
        <li>উপজেলা: {{ $partnerDataPostLists->upozila_name }}</li>
        <li>থানা: {{ $partnerDataPostLists->thana_name }}</li>
        <li>পৌরসভা/ইউনিয়ন: {{ $partnerDataPostLists->municipality_name }}</li>
        <li>ওয়ার্ড: {{ $partnerDataPostLists->ward_name }}</li>
    </ul></td>
    <td>{{ $partnerDataPostLists->budget_detail }}</td>
    <td>{{ $partnerDataPostLists->execution_deadline }}</td>
    <td>{{ $partnerDataPostLists->beneficiary }}</td>
    <td>
        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoPartnerNgo{{ $partnerDataPostLists->id }}" >
            <i class="fa fa-pencil"></i>
        </button>
        @include('front.fd6Form._partial.stepFourPartnerNgo')


        <button type="button" onclick="deleteTagPartnerNgo({{ $partnerDataPostLists->id}})" class="btn btn-sm btn-outline-danger"><i
            class="bi bi-trash"></i></button>
    </td>
</tr>

<?php $totalNewBudget = $totalNewBudget + $partnerDataPostLists->budget_detail ?>
@endforeach
<tr>
    <td colspan="8" style="text-align: right;" >সর্বমোট বাজেট : {{ $totalNewBudget }} </td>
</tr>
</table>
