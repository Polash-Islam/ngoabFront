
<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

?>






<section>

                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('other_doc.all_doc')}}</h5>
                            </div>

                        </div>

                        <?php
                        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');


if($foreignNgoType == 'Old' || $foreignNgoType == 'New'){
    $ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
    $ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->first();
}else{
    $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
}



                                                ?>


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


                                      <!--new start -->
                                      @if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

                                      @else
                                      <?php

                                        $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                        ?>


                                            <div class="file-box">



                                                List of Board of Directors / Board of Trustees (Notarized / Attested by the Justice of Peace of the concerned country)

                                                <div class="file-top">
                                                    <i class="fa fa-file-pdf-o txt-primary"></i>
                                                </div>

                                                <div class="mt-2">
                                                    <h6>{{ $filename }}</h6>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $ngoOtherDocListsFirst->id  }}"><i class="fa fa-pencil"></i></button>


                                                            <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                                            <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                                              <!--modal -->
                                                              <div class="modal fade" id="exampleModal{{ $ngoOtherDocListsFirst->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                List of Board of Directors / Board of Trustees (Notarized / Attested by the Justice of Peace of the concerned country)
</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
                                                                                <input type="hidden" name="title" value="trustees"/>
                                                                                <div class="mb-3">

                                                                                    <input type="file" name="list_of_board_of_directors_or_board_of_trustees" class="form-control" id="">

                                                                                    <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees  }}"
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


                                            </div>

                                            @endif

                                            <!--end if -->





                            <!--new start -->
                            @if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

                            @else
                            <?php

                              $file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
                              $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                              ?>


                                  <div class="file-box">



                                    By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)

                                      <div class="file-top">
                                          <i class="fa fa-file-pdf-o txt-primary"></i>
                                      </div>

                                      <div class="mt-2">
                                          <h6>{{ $filename }}</h6>
                                          <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                  data-bs-target="#exampleModal2"><i class="fa fa-pencil"></i></button>


                                                  <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                                  <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                                    <!--modal -->
                                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalLabel">
                                                                    By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)
</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                                      @csrf
                                                                      @method('PUT')
                                                                      <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                                  </div>

                                  @endif

                                  <!--end if -->




               <!--new start -->
               @if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

               @else
               <?php

                 $file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                 ?>


                     <div class="file-box">



                        Work Procedure of the Board of Directors / Board of Trustees meeting of the organization

                         <div class="file-top">
                             <i class="fa fa-file-pdf-o txt-primary"></i>
                         </div>

                         <div class="mt-2">
                             <h6>{{ $filename }}</h6>
                             <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal3"><i class="fa fa-pencil"></i></button>


                                     <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                     <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                       <!--modal -->
                                       <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">
                                                        Work Procedure of the Board of Directors / Board of Trustees meeting
</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                     </div>

                     @endif

                     <!--end if -->




                      <!--new start -->
               @if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

               @else
               <?php

                 $file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                 ?>


                     <div class="file-box">



                        Attested copy of last 10 (ten) years audit report and annual report of the organization

                         <div class="file-top">
                             <i class="fa fa-file-pdf-o txt-primary"></i>
                         </div>

                         <div class="mt-2">
                             <h6>{{ $filename }}</h6>
                             <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                     <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                     <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                       <!--modal -->
                                       <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">
                                                        Attested copy of last 10 (ten) years audit report and annual report of the organization
</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                     </div>

                     @endif

                     <!--end if -->



                                <!--new start -->
               @if(empty($ngoOtherDocListsFirst->registration_certificate))

               @else
               <?php

                 $file_path = url($ngoOtherDocListsFirst->registration_certificate);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                 ?>


                     <div class="file-box">



                        Copy of registration certificate (notarized/attested of the concerned country) of the head office of the company

                         <div class="file-top">
                             <i class="fa fa-file-pdf-o txt-primary"></i>
                         </div>

                         <div class="mt-2">
                             <h6>{{ $filename }}</h6>
                             <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                     <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                     <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                       <!--modal -->
                                       <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">
                                                        Copy of registration certificate (notarized/attested of the concerned country) of the head office of the company
</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
                                                         <input type="hidden" name="title" value="registration_certificate"/>
                                                         <div class="mb-3">

                                                             <input type="file" name="registration_certificate" class="form-control" id="">

                                                             <iframe src="{{ asset('/') }}{{'public/'. $ngoOtherDocListsFirst->registration_certificate  }}"
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


                     </div>

                     @endif

                     <!--end if -->



                                          <!--new start -->
               @if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

               @else
               <?php

                 $file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                 ?>


                     <div class="file-box">



                        Attested copy of latest registration/renewal certificate

                         <div class="file-top">
                             <i class="fa fa-file-pdf-o txt-primary"></i>
                         </div>

                         <div class="mt-2">
                             <h6>{{ $filename }}</h6>
                             <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                     <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                     <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                       <!--modal -->
                                       <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">
                                                        Attested copy of latest registration/renewal certificate
</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                     </div>

                     @endif

                     <!--end if -->



                                                    <!--new start -->
               @if(empty($ngoOtherDocListsFirst->right_to_information_act))

               @else
               <?php

                 $file_path = url($ngoOtherDocListsFirst->right_to_information_act);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                 ?>


                     <div class="file-box">



                        Under Right To Information Act - 2009 - Focal Point appointed: Copy of notification letter to Bureau

                         <div class="file-top">
                             <i class="fa fa-file-pdf-o txt-primary"></i>
                         </div>

                         <div class="mt-2">
                             <h6>{{ $filename }}</h6>
                             <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                     <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                     <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                       <!--modal -->
                                       <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">
                                                        Under Right To Information Act - 2009 - Focal Point appointed: Copy of notification letter to Bureau
</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                     </div>

                     @endif

                     <!--end if -->


                                      @if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')



                                      <!--new start -->
                                      @if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

                                      @else
                                      <?php

                                        $file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                        ?>


                                            <div class="file-box">



                                                Attested copy of the constitution of the company along with the prescribed fee in case of change

                                                <div class="file-top">
                                                    <i class="fa fa-file-pdf-o txt-primary"></i>
                                                </div>

                                                <div class="mt-2">
                                                    <h6>{{ $filename }}</h6>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                                            <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                                            <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                                              <!--modal -->
                                                              <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Attested copy of the constitution of the company along with the prescribed fee in case of change
                       </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                                            </div>

                                            @endif

                                            <!--end if -->



    <!--new start -->
    @if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

    @else
    <?php

      $file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
      $filename  = pathinfo($file_path, PATHINFO_FILENAME);


      ?>


          <div class="file-box">


            Attested copy of constitution approved by primary registering authority

              <div class="file-top">
                  <i class="fa fa-file-pdf-o txt-primary"></i>
              </div>

              <div class="mt-2">
                  <h6>{{ $filename }}</h6>
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                          data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                          <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                          <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                            <!--modal -->
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Attested copy of constitution approved by primary registering authority
</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                              @csrf
                                              @method('PUT')
                                              <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


          </div>

          @endif

          <!--end if -->



             <!--new start -->
    @if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

    @else
    <?php

      $file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
      $filename  = pathinfo($file_path, PATHINFO_FILENAME);


      ?>


          <div class="file-box">


            Clean copy of the constitution jointly signed by the chairman and secretary of the organization

              <div class="file-top">
                  <i class="fa fa-file-pdf-o txt-primary"></i>
              </div>

              <div class="mt-2">
                  <h6>{{ $filename }}</h6>
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                          data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                          <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                          <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                            <!--modal -->
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Clean copy of the constitution jointly signed by the chairman and secretary of the organization
</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                              @csrf
                                              @method('PUT')
                                              <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


          </div>

          @endif

          <!--end if -->



                    <!--new start -->
    @if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

    @else
    <?php

      $file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
      $filename  = pathinfo($file_path, PATHINFO_FILENAME);


      ?>


          <div class="file-box">


            Original copy of invoice for payment of change fee in any section, sub-section of the constitution

              <div class="file-top">
                  <i class="fa fa-file-pdf-o txt-primary"></i>
              </div>

              <div class="mt-2">
                  <h6>{{ $filename }}</h6>
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                          data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                          <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                          <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                            <!--modal -->
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Original copy of invoice for payment of change fee in any section, sub-section of the constitution
</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                              @csrf
                                              @method('PUT')
                                              <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


          </div>

          @endif

          <!--end if -->


                   <!--new start -->
                   @if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

                   @else
                   <?php

                     $file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                     ?>


                         <div class="file-box">


                            A certified copy of the minutes of the general meeting regarding the amendment and addition of any section, sub-section of the constitution

                             <div class="file-top">
                                 <i class="fa fa-file-pdf-o txt-primary"></i>
                             </div>

                             <div class="mt-2">
                                 <h6>{{ $filename }}</h6>
                                 <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                         <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                         <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                           <!--modal -->
                                           <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">
                                                            A certified copy of the minutes of the general meeting regarding the amendment and addition of any section, sub-section of the constitution
               </h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                             @csrf
                                                             @method('PUT')
                                                             <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                         </div>

                         @endif

                         <!--end if -->

                            <!--new start -->
                   @if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

                   @else
                   <?php

                     $file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                     ?>


                         <div class="file-box">


                            Comparative statement of previous constitution and current constitution (with joint signature of president and editor on each page)

                             <div class="file-top">
                                 <i class="fa fa-file-pdf-o txt-primary"></i>
                             </div>

                             <div class="mt-2">
                                 <h6>{{ $filename }}</h6>
                                 <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                         <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                         <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                           <!--modal -->
                                           <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">
                                                            Comparative statement of previous constitution and current constitution (with joint signature of president and editor on each page)
               </h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                             @csrf
                                                             @method('PUT')
                                                             <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                         </div>

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


                   <div class="file-box">


                    Copy of 'Unchanged' certificate (notarized/attested by the Peace of Justice Department of the concerned country) if the constitution of the organization has not changed

                       <div class="file-top">
                           <i class="fa fa-file-pdf-o txt-primary"></i>
                       </div>

                       <div class="mt-2">
                           <h6>{{ $filename }}</h6>
                           <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                   data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></button>


                                   <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                                   <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a>






                                     <!--modal -->
                                     <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">
                                                    Copy of 'Unchanged' certificate (notarized/attested by the Peace of Justice Department of the concerned country) if the constitution of the organization has not changed
         </h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                                                       @csrf
                                                       @method('PUT')
                                                       <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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


                   </div>

                   @endif

                   <!--end if -->
                                      @endif






                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 back_button"  onclick="location.href = '{{ route('othersInformation') }}';">{{ trans('fd_one_step_one.back')}}</button>
@if(count($ngoOtherDocLists) == 0)
                          @if(count($ngoOtherDocLists) >= 1)
<button class="btn btn-custom next_button" type="button">{{ trans('fd_one_step_four.Submit')}}</button>
                          @else
                          <button class="btn btn-custom next_button" type="button" disabled>{{ trans('fd_one_step_four.Submit')}}</button>
                          @endif
@else

                          @if(count($ngoOtherDocLists) >= 1)


                            <button class="btn btn-custom next_button" onclick="location.href = '{{ route('ngoDocumentFinal') }}';">{{ trans('fd_one_step_four.Submit')}}</button>
                          @else


                          <button class="btn btn-custom next_button" type="button" disabled>{{ trans('fd_one_step_four.Submit')}}</button>
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
                <h5 class="modal-title" id="exampleModalLabel">
                    @if($foreignNgoType == 'Old')
                     Document For NGO Renew
                    @else
                    {{ trans('other_doc.reg')}}
                    @endif

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
<input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
                            @if($foreignNgoType == 'Old')

                            <div class="mt-3">

                                <div class="mb-3">
                                    <label for="" class="form-label">Whether the constitution of the organization has changed or not ? <span class="text-danger">*</span> </label>
                                    <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="constitution_of_the_organization_has_changed" id=""
                                               value="Yes" >
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="constitution_of_the_organization_has_changed" id=""
                                               value="No" >
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    </div>
                                </div>

                            <div class="mb-3" id="mResult">
                            </div>
                            <b>Other Information: </b>
                                {{-- <div class="mb-3">




                                    <label class="form-label" for="">
                                      নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="copy_of_chalan" data-parsley-required accept=".pdf" type="file" id="">
                                </div> --}}

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        List of Board of Directors / Board of Trustees (Notarized / Attested by the Justice of Peace of the concerned country)<span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="list_of_board_of_directors_or_board_of_trustees"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)<span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="organization_by_laws_or_constitution"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
Work Procedure of the Board of Directors / Board of Trustees meeting of the organization (mentioning the matters related to the formation of the board, proposal to renew the registration, changes in the constitution in the minutes) (notarized / attested by the Peace of Justice Department of the concerned country)<span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="work_procedure_of_organization"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Attested copy of last 10 (ten) years audit report and annual report of the organization </label>
                                    <input class="form-control"  name="last_ten_years_audit_report_and_annual_report_of_the_company"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Copy of registration certificate (notarized/attested of the concerned country) of the head office of the company <span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="registration_certificate"  accept=".pdf" type="file" id="">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Attested copy of latest registration/renewal certificate <span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="attested_copy_of_latest_registration_or_renewal_certificate"  accept=".pdf" type="file" id="">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Under Right To Information Act - 2009 - Focal Point appointed: Copy of notification letter to Bureau<span class="text-danger">*</span> </label>
                                    <input class="form-control" data-parsley-required name="right_to_information_act"  accept=".pdf" type="file" id="">
                                </div>





                            @else
                            <div class="card mb-3">
                                <div class="card-header">
                                    Certificate Of Incorporation in the Country Of Origin <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    Constitution <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf"  name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    Activities Report <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    Decision Of the Committee/Board To Open Office In Bangladesh<span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    Letter Of Appoinment Of The Country Representative<span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh<span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    Letter Of Intent <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end local ngo -->



