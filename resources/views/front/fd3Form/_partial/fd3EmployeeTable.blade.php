<table class="table table-bordered">
    <tr style="text-align: center">
        <th>ক্র : নং :</th>
        <th>নাম</th>
        <th>পদবি</th>
        <th>টেলিফোন</th>
        <th>মোবাইল</th>
        <th>ইমেইল</th>
        <th></th>
    </tr>

    @foreach($employeeDetailList as $key=>$employeeDetailLists)
    <tr>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
        <td>{{ $employeeDetailLists->employee_name }}</td>
        <td>{{ $employeeDetailLists->employee_designation }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_telephone) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDetailLists->employee_mobile) }}</td>
        <td>{{ $employeeDetailLists->employee_email }}</td>
        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDataUpdate{{ $employeeDetailLists->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd3Form._partial.fd3EmployeeModalEdit')


            <button type="button" onclick="deleteTagEmployeeNew({{ $employeeDetailLists->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>

        </td>
    </tr>
    @endforeach


</table>
