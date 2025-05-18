<table class="table table-bordered">
    <tr style="text-align: center">
        <th >ক্র : নং :</th>
        <th >উদ্দেশ্য / কার্যক্রম</th>
        <th >এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর ও তারিখ</th>
        <th >দাতা সংস্থার নাম</th>
        <th >টাকার পরিমাণ </th>
        <th >অডিট রিপোর্ট দাখিল এবং ব্যুরো কর্তৃক গৃহীত হয়েছে কিনা</th>
        <th >সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</th>
        <th >স্থানীয়  প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</th>
        <th >মন্তব্য</th>
        <th></th>
    </tr>

    @foreach ($donationList as $key=>$donationLists)
    <tr>

        <td>{{ $key+1 }}</td>
        <td>{{ $donationLists->purpose_or_activities }}</td>
        <td>{{ $donationLists->registration_sarok_number }} ও {{ $donationLists->registration_date }}</td>

        <td>{{ $donationLists->donor_name }}</td>
        <td>{{ $donationLists->money_amount }}</td>
        <td>{{ $donationLists->audit_report }}</td>
        <td>{{ $donationLists->final_report }}</td>
        <td>{{ $donationLists->local_certificate }}</td>
        <td>{{ $donationLists->comment }}</td>
        <td>
           <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoDonor{{ $donationLists->id }}" >
               <i class="fa fa-pencil"></i>
           </button>


           @include('front.fc1Form._partial.stepTwoDonorModalEdit')

           <button type="button" onclick="deleteTagDonor({{ $donationLists->id}})" class="btn btn-sm btn-outline-danger"><i
               class="bi bi-trash"></i></button>

        </td>

    </tr>
    @endforeach


</table>
