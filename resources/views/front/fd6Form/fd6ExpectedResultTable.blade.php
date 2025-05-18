<table class="table table-bordered">
    <tr>
        <th>গুনবাচক</th>
        <th>সংখ্যা বাচক</th>
        <th>সময়কাল</th>
        <th></th>
    </tr>
    @foreach($expectedResultDetail as $expectedResultDetails)
    <tr>
        <td>{{ $expectedResultDetails->multiplicative }}</td>
        <td>{{ $expectedResultDetails->number_reader }}</td>
        <td>{{ $expectedResultDetails->duration }}</td>
        <td>
            <div class="d-flex justify-content-center">
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#expectedResultModalEdit{{ $expectedResultDetails->id }}" >
                    <i class="fa fa-pencil"></i>
                </button>

                @include('front.fd6Form._partial.expectedResultModalEdit')

                <button type="button" style="margin-left: 5px;" onclick="deleteResult({{ $expectedResultDetails->id}})" class="btn btn-sm btn-outline-danger"><i
                    class="bi bi-trash"></i></button>
            </div>
        </td>
    </tr>
    @endforeach
</table>
