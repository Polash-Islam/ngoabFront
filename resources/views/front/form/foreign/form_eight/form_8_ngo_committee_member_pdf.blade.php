<!DOCTYPE html>
<html>
<head>
    <title>কার্যনির্বাহী কমিটির সদস্যদের তালিকা</title>

    <style>
        body {
            font-family: 'bangla', sans-serif;
            font-size: 12px;
            width: 11in;
            height: 8.5in;
            text-align: center;
        }
        .bt{

font-family: 'banglabold', sans-serif;
}
      h2,
      h3,
      p
      {
        margin:0;
        padding:0;
      }
        table
        {
            width: 100%;
        }
        .upper_table table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2 style="color:green;font-weight:900;">ফরম নং - ৮</h2>
<h3>কার্যনির্বাহী কমিটির সদস্যদের তালিকা</h3>
<h2 style="padding-top:10px;">কার্যনির্বাহী কমিটির সদস্য/অফিস হোল্ডারদের বিবরণ</h2>
   <p> নোট: ১) কলাম ১০ এবং ১১ এর জন্য অনুগ্রহ করে পেশার বিশদ বিবরণ যেমন: পদবী, অফিস/প্রতিষ্ঠানের নাম ইত্যাদি পূরণ করুন</p>
<h4>সময়কাল: {{App\Http\Controllers\NGO\CommonController::englishToBangla(date("d/m/Y", strtotime($all_partiw_form_date))) }} হইতে {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d/m/Y", strtotime($all_partiw_to_date))) }} , {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_partiw_total_year) }} </h4>

  <div class="upper_table">
    <table>
    <tr>
        <th rowspan="2">ক্রঃ নং</th>
        <th rowspan="2">নাম ও পদবী</th>
        <th rowspan="2">জন্ম তারিখ</th>
        <th rowspan="2">এনএইডি এবং <br> মোবাইল নং</th>
        <th rowspan="2">বাবার নাম</th>
        <th colspan="2">ঠিকানা</th>
        <th rowspan="2">স্বামী/স্ত্রীর নাম</th>
        <th rowspan="2">শিক্ষাগত যোগ্যতা</th>
        <th colspan="3">পেশা</th>
        <th rowspan="2">তিনি কি অন্য কোন এনজিওর সদস্য বা পরিষেবাধারী ছিলেন (যদি তা হয় তবে অনুগ্রহ করে চিহ্নিত করুন)</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2" style="width:60px">স্বাক্ষর এবং তারিখ</th>
    </tr>
    <tr>
        <th>বর্তমান ঠিকানা</th>
        <th>স্থায়ী ঠিকানা</th>
        <th>সরকারী/আধা সরকারী/সরকারি স্বায়ত্তশাসিত</th>
        <th>ব্যক্তিগত সেবা</th>
        <th>স্ব সেবা</th>
    </tr>
    @foreach($all_partiw as $key=>$all_all_parti)
    <tr>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
        <td><span class="bt">{{ $all_all_parti->name }}<span>, <br> {{ $all_all_parti->desi }}</td>
        <td>

         <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


         {{ App\Http\Controllers\NGO\CommonController::englishToBangla($start_date_one )}}


        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->nid_no) }}, <br> {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->phone) }}</td>
        <td>{{ $all_all_parti->father_name }}</td>
        <td>{{ $all_all_parti->present_address }}</td>
        <td>{{ $all_all_parti->permanent_address }}</td>
        <td>{{ $all_all_parti->name_supouse }}</td>
        <td>{{ $all_all_parti->edu_quali }}</td>
        <td>

            @if($all_all_parti->profession  == 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif


        </td>
        <td>@if($all_all_parti->profession  == 'ব্যক্তিগত সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>@if($all_all_parti->profession  == 'স্ব সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>{{ $all_all_parti->service_status }}</td>
        <td>{{ $all_all_parti->remarks }}</td>
        <td>


        </td>

    </tr>
    @endforeach
</table>
  </div>

</body>
</html>
