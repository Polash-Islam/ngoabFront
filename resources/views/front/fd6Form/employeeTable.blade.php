<table class="table table-bordered" >
<tr>
    <td rowspan="2">নাম ও পদবি</td>
    <td rowspan="2">জাতীয়তা</td>
    <td rowspan="2">মেয়াদ (জনমাস)</td>
    <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
    <td rowspan="2">অভিজ্ঞতা</td>
    <td rowspan="2">দায়িত্বসমূহ</td>
    <td colspan="2">বেতন-ভাতাদি</td>
    <td rowspan="2"></td>
</tr>
<tr>
    <td>এই প্রকল্প হতে</td>
    <td>অন্যান্য প্রকল্প হতে</td>

</tr>
@foreach($employeeDataPostList as $employeeDataPostLists)
<tr>
    <td>
        <ul>
            <li>নাম: {{ $employeeDataPostLists->name }}</li>
            <li>পদবি: {{ $employeeDataPostLists->designation }}</li>
        </ul>
    </td>
    <td>{{ $employeeDataPostLists->nationality }}</td>
    <td>{{ $employeeDataPostLists->duration }}</td>
    <td>{{ $employeeDataPostLists->educational_qualification }}</td>
    <td>{{ $employeeDataPostLists->experience }}</td>
    <td>{{ $employeeDataPostLists->responsibility }}</td>
    <td>{{ $employeeDataPostLists->salary_from_this_project }}</td>
    <td>{{ $employeeDataPostLists->salary_from_other_project}}</td>
    <td>
        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#employeeNgo{{ $employeeDataPostLists->id }}" >
            <i class="fa fa-pencil"></i>
        </button>
        @include('front.fd6Form._partial.employeeModalEdit')


        <button type="button" onclick="deleteTagEmployeeNgo({{ $employeeDataPostLists->id}})" class="btn btn-sm btn-outline-danger"><i
            class="bi bi-trash"></i></button>
    </td>
</tr>
@endforeach
</table>
