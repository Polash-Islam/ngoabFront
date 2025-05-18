@extends('front.master.master')

@section('title')
{{ trans('ngo_member_doc.mem_doc')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                         </ul>
                </div>
                <div class="dashboard_right">
                    <div class="committee_container">
                        <form method="post" action="{{ route('ngoMemberDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('ngo_member_doc.m_b')}}
                                </div>
                                <div class="card-body">

                                    <table class="table table-borderless" id="dynamicAddRemove">
                                        <tr>
                                            <th> {{ trans('ngo_member_doc.person_name')}} <span class="text-danger">*</span> </th>
                                            <th> {{ trans('ngo_member_doc.image')}} <span class="text-danger">*</span> </th>
                                            <th> {{ trans('ngo_member_doc.nid_copy')}} <span class="text-danger">*</span> </th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control" data-parsley-required name="person_name[]" type="text" id="" required>
                                            </td>
                                            <td>
                                                <input class="form-control" data-parsley-required accept=".jpg,.jpeg,.png" name="person_image[]" type="file" id="" required>
                                            </td>
                                            <td>
                                                <input class="form-control" data-parsley-required accept=".pdf" name="person_nid_copy[]" type="file" id="" required>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">
                                        {{ trans('ngo_member_doc.add_new_nid')}}
                                    </button>
                                </div>
                            </div>

                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration">{{ trans('other_doc.add_new_document')}}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input class="form-control" name="person_name[]" type="text" id="" required>' +
            '</td>' +
            '<td>' +
            '<input class="form-control" name="person_image[]" accept=".jpg,.jpeg,.png" type="file" id="" required>' +
            '</td>' +
            '<td>' +
            '<input class="form-control" name="person_nid_copy[]" accept=".pdf" type="file" id="" required>' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
