<!DOCTYPE html>
<html>
<head>
    <title>List of Executive Committee Members</title>

    <style>
        body {
            font-family: 'bangla', sans-serif;
            font-size: 12px;
            width: 11in;
            height: 8.5in;
            text-align: center;
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
        }

        table tr td
        {
            text-align: center;
        }

    </style>
</head>
<body>
    <h2 style="color:green;font-weight:900;">Form No - 8</h2>
  	<h3 >List of Executive Committee Members</h3>
    <h2 style="padding-top:10px;">Particulars of the Members/Office Holders of the Executive Committee</h2>
	<p>NOTES: 1) For column 10 & 11 please details of the profession, i,e. designation, name of the office/organization etc. </p>
 	<p> Period: {{date("d/m/Y", strtotime($all_partiw_form_date))}} To {{ date("d/m/Y", strtotime($all_partiw_to_date)) }} , AD {{ $all_partiw_total_year }}  </p>

  <div class="upper_table">
    <table style="margin-top: 20px;">
    <tr>
        <th rowspan="2">SL No</th>
        <th rowspan="2">Name and Designation</th>
        <th rowspan="2">Date of Birth</th>
        <th rowspan="2">NID No: <br> & Mobile No:</th>
        <th rowspan="2">Fathers Name</th>
        <th colspan="2">Address</th>
        <th rowspan="2">Name of Spouse</th>
        <th rowspan="2">Educational Qualification</th>
        <th colspan="3">Profession</th>
        <th rowspan="2">Is he/she is/was a member or service holder of any other NGO (If so olease identify)</th>
        <th rowspan="2">Remarks</th>
        <th rowspan="2" style="width:60px">Signature and Date</th>
    </tr>
    <tr>
        <th>Permanent</th>
        <th>Present</th>
        <th>Govt./Semi/Govt Autonomous</th>
        <th>Private Service</th>
        <th>Self Service</th>
    </tr>
    @foreach($all_partiw as $key=>$all_all_parti)
    <tr>
        <td>{{  $key+1 }}</td>
        <td><span style="font-weight: bold">{{ $all_all_parti->name }}</span> , <br> {{ $all_all_parti->desi }}</td>
        <td>

         <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


         {{  $start_date_one }}


        </td>
        <td>{{ $all_all_parti->nid_no }}, <br> {{ $all_all_parti->phone }}</td>
        <td>{{ $all_all_parti->father_name }}</td>
        <td>{{ $all_all_parti->present_address }}</td>
        <td>{{ $all_all_parti->permanent_address }}</td>
        <td>{{ $all_all_parti->name_supouse }}</td>
        <td>{{ $all_all_parti->edu_quali }}</td>
        <td>

            @if($all_all_parti->profession  == 'Govt./Semi Govt./Govt Autonomous')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif


        </td>
        <td>@if($all_all_parti->profession  == 'Private Service')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>@if($all_all_parti->profession  == 'Self Service')

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



    <table style="border:none !important; margin-top:100px">
  		<tr style="border:none !important; text-align: center;">
    		<td style="border:none !important; text-align: center;">Signature & Seal By: Chairman</td>
    		<td style="border:none !important; text-align: center;">Signature & Seal By: Secretary/General Secretary</td>
  		</tr>
  </table>
</body>
</html>
