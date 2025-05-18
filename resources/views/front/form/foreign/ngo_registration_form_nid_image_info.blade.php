<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_four.step_4')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li >{{ trans('fd_one_step_one.member_title')}}</li>
                        <li class="active">{{ trans('fd_one_step_one.image_nid_title')}}</li>
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('ngo_member_doc.nid_and_images')}}</h5>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        {{ trans('ngo_member_doc.add_new_nid')}}
                                </button>
                            </div>
                        </div>

                        <?php
                        $fdOneFormId = DB::table('fd_one_forms')
                        ->where('user_id',Auth::user()->id)->value('id');
                        $ngoMemberDocLists = DB::table('ngo_member_nid_photos')
                        ->where('fd_one_form_id',$fdOneFormId)->latest()->get();


                                                ?>

@include('translate')
                        <div class="file-content">
                            <div class="card">
                                <div class="card-body file-manager">
                                    <div class="files">
                                      @if(count($ngoMemberDocLists) == 0)

                                      @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                      <h2>তথ্য পাওয়া যায়নি</h2>
                                      @else
                                      <h2>Data Not Found</h2>
                                      @endif

                                      @else
                                        @foreach($ngoMemberDocLists as $all_all_ngo_member_doc)


<?php

                                $file_path = url($all_all_ngo_member_doc->member_nid_copy);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                ?>
                                        <div class="file-box-image">
                                            <div class="file-top">
                                                <img class="file-top-img" src="{{ asset('/') }}{{ $all_all_ngo_member_doc->member_image }}"
                                                     alt="Card image cap">
                                            </div>
                                            <div class="mt-2">
                                                <h6>{{ $all_all_ngo_member_doc->member_name  }}</h6>
                                                <p class="mb-1">{{ $filename }}</p>
                                                <p>{{ $all_all_ngo_member_doc->member_nid_copy_size }} {{ trans('other_doc.m_b')}}</p>


                                                <a class="btn btn-sm btn-registration" target="_blank" href = '{{ route('ngoMemberDocumentDownload',$all_all_ngo_member_doc->id) }}'><i class="fa fa-download"></i>
                                                </a>


                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $all_all_ngo_member_doc->id  }}"><i class="fa fa-pencil"></i></button>

                                                        <button class="btn btn-sm btn-danger" onclick="deleteTag({{ $all_all_ngo_member_doc->id}})"><i class="fa fa-trash"></i></button>

                                                        <form id="delete-form-{{ $all_all_ngo_member_doc->id }}" action="{{ route('ngoMemberDocument.destroy',$all_all_ngo_member_doc->id) }}" method="POST" style="display: none;">

                                                            @csrf
                                                            @method('DELETE')

                                                        </form>


                                            </div>
                                        </div>

                                        <!--ddd-->
                                        <div class="modal fade" id="exampleModal{{ $all_all_ngo_member_doc->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('form 8_bn.personal_info')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('ngoMemberDocument.update',$all_all_ngo_member_doc->id) }}" enctype="multipart/form-data" id="form">

                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">{{ trans('ngo_member_doc.person_name')}} <span class="text-danger">*</span> </label>
                                                                <input type="text" name="member_name" value="{{ $all_all_ngo_member_doc->member_name  }}" class="form-control" id="">

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">{{ trans('ngo_member_doc.image')}} <span class="text-danger">*</span> </label>
                                                                <input type="file" name="member_image" accept=".jpg,.jpeg,.png" class="form-control" id="">

                                                                <img src="{{ asset('/') }}{{ $all_all_ngo_member_doc->member_image  }}" height="30" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">{{ trans('ngo_member_doc.nid_copy')}} <span class="text-danger">*</span> </label>
                                                                <input type="file" accept=".pdf" name="member_nid_copy" class="form-control" id="">

                                                                <iframe src="{{ asset('/') }}{{'public/'. $all_all_ngo_member_doc->member_nid_copy  }}"
    style="width:300px; height:150px;" frameborder="0"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <a href="{{ route('ngoMember.index') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                            <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_member_list" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>

                            @if(count($ngoMemberDocLists) == 0)

                          @if(count($ngoMemberDocLists) >= 2)

                            <button class="btn btn-custom submit_button" name="submit_value" value="form_eight_complete" type="button">{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @else
                                 <button class="btn btn-custom submit_button"  type="button" disabled>{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @endif
                            @else
                          @if(count($ngoMemberDocLists) >= 2)
                            <a class="btn btn-custom submit_button" href="{{ route('ngoMemberDocFinalUpdate') }}">{{ trans('fd_one_step_one.Next_Step')}}</a>
                          @else
                          <button class="btn btn-custom submit_button"  type="button" disabled>{{ trans('fd_one_step_one.Next_Step')}}</button>
                          @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('ngo_member_doc.m_b')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('ngoMemberDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                    @csrf
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-borderless" id="dynamicAddRemoveMemberDoc">
                                <tr>
                                    <th> {{ trans('ngo_member_doc.person_name')}} <span class="text-danger">*</span> </th>
                                            <th> {{ trans('ngo_member_doc.image')}} <span class="text-danger">*</span> </th>
                                            <th> {{ trans('ngo_member_doc.nid_copy')}} <span class="text-danger">*</span> </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" data-parsley-required name="member_name[]" type="text" id="" required>
                                    </td>
                                    <td>
                                        <input class="form-control" data-parsley-required accept=".jpg,.jpeg,.png" name="member_image[]" type="file" id="" required>
                                    </td>
                                    <td>
                                        <input class="form-control" data-parsley-required accept=".pdf" name="member_nid_copy[]" type="file" id="" required>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                            <button type="button" name="add" id="dynamicMemberDoc" class="btn btn-registration">
                                {{ trans('ngo_member_doc.add_new_nid')}}
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-registration">{{ trans('other_doc.add_new_document')}}</button>
                </form>


            </div>



        </div>
    </div>
</div>

<script>
    var i = 0;
    $("#dynamicMemberDoc").click(function () {
        ++i;
        $("#dynamicAddRemoveMemberDoc").append('<tr>' +
            '<td>' +
            '<input class="form-control" name="member_name[]" type="text" id="" required>' +
            '</td>' +
            '<td>' +
            '<input class="form-control" name="member_image[]" accept=".jpg,.jpeg,.png" type="file" id="" required>' +
            '</td>' +
            '<td>' +
            '<input class="form-control" name="member_nid_copy[]" accept=".pdf" type="file" id="" required>' +
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
