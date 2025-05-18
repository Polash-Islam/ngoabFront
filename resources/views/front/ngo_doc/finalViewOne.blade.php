<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

?>

<?php
$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');


if($localNgoTypem == 'Old'){
$ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
$ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->first();
}else{
$ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
}



                        ?>
@if($localNgoTypem == 'Old')

<div class="file-content">
    <div class="card">
        <div class="card-body file-manager">


            <!--new table code start --->

            @if(count($ngoOtherDocLists) == 0)

            @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
            <h2>তথ্য পাওয়া যায়নি</h2>
            @else
            <h2>Data Not Found</h2>
            @endif

            @else


            <table class="table table-border">

                @if(empty($ngoOtherDocListsFirst->fd_eight_form_data))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->fd_eight_form_data);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        নির্বাহী কর্মকর্তার সীল এবং স্বাক্ষরসহ  এফডি - ৮ ফরম
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">

                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                           নির্বাহী কর্মকর্তার সীল এবং স্বাক্ষরসহ  এফডি - ৮ ফরম
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="fd_eight_form_data"/>
                                            <div class="mb-3">

                                                <input type="file" name="fd_eight_form_data" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->fd_eight_form_data  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif


                @if(empty($ngoOtherDocListsFirst->form_eight_executive_committee_member))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->form_eight_executive_committee_member);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'form_eight_executive_committee_member', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="form_eight_executive_committee_member"/>
                                            <div class="mb-3">

                                                <input type="file" name="form_eight_executive_committee_member" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->form_eight_executive_committee_member  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif


                @if(empty($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত অনুলিপি
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">

                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'nid_and_image_of_executive_committee_members', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত অনুলিপি
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="nid_and_image_of_executive_committee_members"/>
                                            <div class="mb-3">

                                                <input type="file" name="nid_and_image_of_executive_committee_members" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif


                @if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="work_procedure"/>
                                            <div class="mb-3">

                                                <input type="file" name="work_procedure_of_organization" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->work_procedure_of_organization  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif

                @if(empty($ngoOtherDocListsFirst->registration_renewal_fee))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->registration_renewal_fee);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_renewal_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="registration_renewal_fee"/>
                                            <div class="mb-3">

                                                <input type="file" name="registration_renewal_fee" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->registration_renewal_fee  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif

                @if(empty($ngoOtherDocListsFirst->approval_of_executive_committee))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->approval_of_executive_committee);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'approval_of_executive_committee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="approval_of_executive_committee"/>
                                            <div class="mb-3">

                                                <input type="file" name="approval_of_executive_committee" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->approval_of_executive_committee  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif


                @if(empty($ngoOtherDocListsFirst->constitution_extra))

                @else
                <?php

                  $file_path = url($ngoOtherDocListsFirst->constitution_extra);
                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                  ?>
                 <tr>

                    <td>
                        সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি
                        <h6>{{ $filename }}</h6>
                    </td>

                    <td>
                        <div class="d-flex mt-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal555551211"><i class="fa fa-pencil"></i></button>


                        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'constitution_extra', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fd_eight_form_data', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}

                          <!--modal -->
                          <div class="modal fade" id="exampleModal555551211" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি
</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                            <input type="hidden" name="title" value="constitution_extra"/>
                                            <div class="mb-3">

                                                <input type="file" name="constitution_extra" class="form-control" id="">

                                                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_extra  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--model end -->
                        </div>
                    </td>



                </tr>
                @endif


                 <!--new start -->
@if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
<td>

সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্টের সত্যায়িত অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
               সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্টের সত্যায়িত অনুলিপি
</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                <input type="hidden" name="title" value="last_ten_years"/>
                <div class="mb-3">

                    <input type="file" name="last_ten_years_audit_report_and_annual_report_of_the_company" class="form-control" id="">

                    <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>

@endif

<!--end if -->


<!--new start -->
@if(empty($ngoOtherDocListsFirst->last_ten_year_annual_report))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->last_ten_year_annual_report);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>
<tr>
<td>
সংস্থার বিগত ১০(দশ) বছরের বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">

    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


            <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_year_annual_report', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
            {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'last_ten_year_annual_report', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






              <!--modal -->
              <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                               সংস্থার বিগত ১০(দশ) বছরের বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি
</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                                <input type="hidden" name="title" value="last_ten_year_annual_report"/>
                                <div class="mb-3">

                                    <input type="file" name="last_ten_year_annual_report" class="form-control" id="">

                                    <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->last_ten_year_annual_report  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--model end -->
</div>
</td>
</tr>


@endif

<!--end if -->


<!--new start -->
@if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
<td>
অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal2"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






  <!--modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত অনুলিপি
</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                    <input type="hidden" name="title" value="laws_or_constitution"/>
                    <div class="mb-3">

                        <input type="file" name="organization_by_laws_or_constitution" class="form-control" id="">

                        <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->organization_by_laws_or_constitution  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--model end -->
</div>
</td>
</tr>


@endif

<!--end if -->
<!--new start -->
@if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
<td>
সর্বশেষ নিবন্ধন /নবায়ন সনদের সত্যায়িত অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal411"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal411" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
           সর্বশেষ নিবন্ধন /নবায়ন সনদের সত্যায়িত অনুলিপি
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

            @csrf
            @method('PUT')
            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
            <input type="hidden" name="title" value="registration_or_renewal_certificate"/>
            <div class="mb-3">

                <input type="file" name="attested_copy_of_latest_registration_or_renewal_certificate" class="form-control" id="">

                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
            </div>
        </form>
    </div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>


    @endif

    <!--end if -->
                                 <!--new start -->
@if(empty($ngoOtherDocListsFirst->right_to_information_act))

@else
<?php

 $file_path = url($ngoOtherDocListsFirst->right_to_information_act);
 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


 ?>
<tr>
<td>
Right To Information Act - 2009-এর আওতায় ফোকাল Focal Point করত :ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal444"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal444" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
           Right To Information Act - 2009-এর আওতায় ফোকাল Focal Point করত :ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

            @csrf
            @method('PUT')
            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
            <input type="hidden" name="title" value="right_to_information_act"/>
            <div class="mb-3">

                <input type="file" name="right_to_information_act" class="form-control" id="">

                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->right_to_information_act  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
            </div>
        </form>
    </div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>



     @endif

     <!--end if -->
                          <!--new start -->
                          @if(empty($ngoOtherDocListsFirst->committee_members_list))

                          @else
                          <?php

                            $file_path = url($ngoOtherDocListsFirst->committee_members_list);
                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                            ?>
<tr>
<td>
নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal5555512"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'committee_members_list', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'committee_members_list', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal5555512" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

            @csrf
            @method('PUT')
            <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
            <input type="hidden" name="title" value="committee_members_list"/>
            <div class="mb-3">

                <input type="file" name="committee_members_list" class="form-control" id="">

                <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->committee_members_list  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
            </div>
        </form>
    </div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>
@endif
<!--end if -->
<!-- check change or not start-->
@if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')


<!--new start -->
@if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
<td>
সংস্থার  গঠনতন্ত্র  পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ  তার সত্যায়িত অনুলিপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal4567"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal4567" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                সংস্থার  গঠনতন্ত্র  পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ  তার সত্যায়িত অনুলিপি
</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                @csrf
                @method('PUT')
                <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                <input type="hidden" name="title" value="fee_if_changed"/>
                <div class="mb-3">

                    <input type="file" name="the_constitution_of_the_company_along_with_fee_if_changed" class="form-control" id="">

                    <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>

@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
<td>
প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত কপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal400"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal400" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">
প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত কপি
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

@csrf
@method('PUT')
<input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
<input type="hidden" name="title" value="primary_registering_authority"/>
<div class="mb-3">

<input type="file" name="constitution_approved_by_primary_registering_authority" class="form-control" id="">

<iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
</div>
</form>
</div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>

@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
<td>
সংস্থার চেয়ারম্যান ও সেক্রেটারী কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্রের পরিচ্ছন্ন কপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">
সংস্থার চেয়ারম্যান ও সেক্রেটারী কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্রের পরিচ্ছন্ন কপি
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

@csrf
@method('PUT')
<input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
<input type="hidden" name="title" value="clean_copy_of_the_constitution"/>
<div class="mb-3">

<input type="file" name="clean_copy_of_the_constitution" class="form-control" id="">

<iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->clean_copy_of_the_constitution  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
</div>
</form>
</div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>


@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>
<tr>
<td>
গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ফি  জমা প্রদানের চালানের মূলকপিসহ
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal4333"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal4333" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">
গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ফি  জমা প্রদানের চালানের মূলকপিসহ
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

@csrf
@method('PUT')
<input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
<input type="hidden" name="title" value="payment_of_change_fee"/>
<div class="mb-3">

<input type="file" name="payment_of_change_fee" class="form-control" id="">

<iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->payment_of_change_fee  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
</div>
</form>
</div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>

@endif

<!--end if -->


<!--new start -->
@if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>
<tr>
<td>
গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal4988"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal4988" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
       গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

        @csrf
        @method('PUT')
        <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
        <input type="hidden" name="title" value="section_sub_section_of_the_constitution"/>
        <div class="mb-3">

            <input type="file" name="section_sub_section_of_the_constitution" class="form-control" id="">

            <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->section_sub_section_of_the_constitution  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
        </div>
    </form>
</div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>



@endif

<!--end if -->

<!--new start -->
@if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
<td>
পূর্ববর্তী সংবিধান এবং বর্তমান সংবিধানের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষর সহ)
<h6>{{ $filename }}</h6>


</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal45555"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal45555" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
       পূর্ববর্তী সংবিধান এবং বর্তমান সংবিধানের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষর সহ)
</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

        @csrf
        @method('PUT')
        <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
        <input type="hidden" name="title" value="previous_constitution"/>
        <div class="mb-3">

            <input type="file" name="previous_constitution_and_current_constitution_compare" class="form-control" id="">

            <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
        </div>
    </form>
</div>

</div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>


@endif

<!--end if -->

@else


<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>
<?php

$checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
            ->value('ngo_type');

$checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
            ->value('ngo_type_new_old');

?>
<tr>
<td>
@if($checkNgoTypeForForeginNgo == 'দেশিও')
সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে প্রত্যয়নপত্র
@else
'অপরিবর্তিত' প্রশংসাপত্রের অনুলিপি (সংশ্লিষ্ট দেশের পিস অফ জাস্টিস ডিপার্টমেন্ট দ্বারা নোটারাইজড/প্রত্যয়িত) যদি সংস্থার গঠনতন্ত্র পরিবর্তিত না হয় : <span class="text-danger">*</span>
@endif

<h6>{{ $filename }}</h6>
</td>
<td>
    <div class="d-flex mt-2">
<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal434"><i class="fa fa-pencil"></i></button>


<a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
{{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






<!--modal -->
<div class="modal fade" id="exampleModal434" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
             @if($checkNgoTypeForForeginNgo == 'দেশিও')
             সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে প্রত্যয়নপত্র
             @else
             'অপরিবর্তিত' প্রশংসাপত্রের অনুলিপি (সংশ্লিষ্ট দেশের পিস অফ জাস্টিস ডিপার্টমেন্ট দ্বারা নোটারাইজড/প্রত্যয়িত) যদি সংস্থার গঠনতন্ত্র পরিবর্তিত না হয় : <span class="text-danger">*</span>
             @endif
</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                @csrf
                @method('PUT')
                <input type="hidden" name="main_ngo_type" value="{{ $localNgoTypem }}"/>
                <input type="hidden" name="title" value="organization_if_unchanged"/>
                <div class="mb-3">

                    <input type="file" name="constitution_of_the_organization_if_unchanged" class="form-control" id="">

                    <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('form 8_bn.update')}}</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<!--model end -->
    </div>
</td>
</tr>

@endif

<!--end if -->

@endif
<!-- check change or not end -->

               </table>
            <!-- new table code end -->
           @endif


        </div>
    </div>
</div>
@else
<div class="file-content">
    <div class="card">
        <div class="card-body file-manager">
            <div class="files">
               @if(count($ngoOtherDocLists) == 0)

              @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
              <h2>তথ্য পাওয়া যায়নি</h2>
              @else
              <h2>Data Not Found</h2>
              @endif

              @else

                @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

                <?php

                $file_path = url($all_ngo_list_all->pdf_file_list);
                $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                ?>


                    <div class="file-box">

                        @if($key+1 == 1)

                            @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                            <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                            @else

                            <h6>Certificate Of Incorporation in the Country Of Origin</h6>
                            @endif

                        @elseif($key+1 == 2)

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                        @else

                        <h6>Attested copy of constitution</h6>
                        @endif

                        @elseif($key+1 == 3)

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                        @else

                        <h6>Activity report of the organization</h6>
                        @endif

                        @elseif($key+1 == 4)


                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>দাতা সংস্থার প্রতিশুতিপত্র</h6>
                        @else

                        <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>
                        @endif



                        @elseif($key+1 == 5)

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                        @else

                        <h6>Letter Of Appoinment Of The Country Representative</h6>
                        @endif
                        @elseif($key+1 == 6)

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                        @else

                        <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>
                        @endif
                        @elseif($key+1 == 7)

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                        @else

                        <h6>Letter Of Intent </h6>
                        @endif
                        @endif



                        <div class="file-top">
                            <i class="fa fa-file-pdf-o txt-primary"></i>
                        </div>
                        <div class="mt-2">
                            <h6>{{ $filename }}</h6>
                            <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                    <!--modal -->
                                    <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">

                                                        @if($key+1 == 1)

                                                        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                        <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                        @else

                                                        <h6>Certificate Of Incorporation in the Country Of Origin</h6>
                                                        @endif

                                                    @elseif($key+1 == 2)

                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                                    @else

                                                    <h6>Attested copy of constitution</h6>
                                                    @endif

                                                    @elseif($key+1 == 3)

                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                    @else

                                                    <h6>Activity report of the organization</h6>
                                                    @endif

                                                    @elseif($key+1 == 4)


                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>দাতা সংস্থার প্রতিশুতিপত্র</h6>
                                                    @else

                                                    <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>
                                                    @endif



                                                    @elseif($key+1 == 5)

                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                    @else

                                                    <h6>Letter Of Appoinment Of The Country Representative</h6>
                                                    @endif
                                                    @elseif($key+1 == 6)

                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                    @else

                                                    <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>
                                                    @endif
                                                    @elseif($key+1 == 7)

                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                    @else

                                                    <h6>Letter Of Intent </h6>
                                                    @endif
                                                    @endif

                                                     </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form" method="post" action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}" enctype="multipart/form-data">

                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">

                                                            <input type="file" name="pdf_file_list" class="form-control" id="">

                                                            <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
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
                                    <!--model end -->

                            <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;" style="margin-left:5px;"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                            {{-- <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> --}}
                        </div>
                    </div>
                    <form  id="delete-form-{{ $all_ngo_list_all->id }}" action="{{ route('ngoDocument.destroy',$all_ngo_list_all->id) }}" method="POST" style="display: none;">

                        @csrf
@method('DELETE')
                    </form>
                    @endforeach
              @endif
            </div>
        </div>
    </div>
</div>

@endif
