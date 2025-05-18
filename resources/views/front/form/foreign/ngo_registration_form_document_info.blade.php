
<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

if($foreignNgoType == 'Old'){
    $ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
    $ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->first();
}else{
    $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
}
?>

<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        @if($foreignNgoType == 'Old')
                        <li >{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif

                        <li class="active">{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">

                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('other_doc.all_doc')}}</h5>


                                <!--error message --->

                                @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif


        @if ($errors->has('registration_certificate'))
        <span class="text-danger">{{ $errors->first('registration_certificate') }}</span><br>
        @endif
        @if ($errors->has('last_ten_years_audit_report_and_annual_report_of_the_company'))
        <span class="text-danger">{{ $errors->first('last_ten_years_audit_report_and_annual_report_of_the_company') }}</span><br>
        @endif
        @if ($errors->has('work_procedure_of_organization'))
        <span class="text-danger">{{ $errors->first('work_procedure_of_organization') }}</span><br>
        @endif

        @if ($errors->has('organization_by_laws_or_constitution'))
        <span class="text-danger">{{ $errors->first('organization_by_laws_or_constitution') }}</span><br>
        @endif
        @if ($errors->has('list_of_board_of_directors_or_board_of_trustees'))
        <span class="text-danger">{{ $errors->first('list_of_board_of_directors_or_board_of_trustees') }}</span><br>
        @endif
        @if ($errors->has('section_sub_section_of_the_constitution'))
        <span class="text-danger">{{ $errors->first('section_sub_section_of_the_constitution') }}</span><br>
        @endif
        @if ($errors->has('payment_of_change_fee'))
        <span class="text-danger">{{ $errors->first('payment_of_change_fee') }}</span><br>
        @endif
        @if ($errors->has('constitution_approved_by_primary_registering_authority'))
        <span class="text-danger">{{ $errors->first('constitution_approved_by_primary_registering_authority') }}</span><br>
        @endif

        @if ($errors->has('the_constitution_of_the_company_along_with_fee_if_changed'))
        <span class="text-danger">{{ $errors->first('the_constitution_of_the_company_along_with_fee_if_changed') }}</span><br>
        @endif

        @if ($errors->has('constitution_of_the_organization_has_changed'))
        <span class="text-danger">{{ $errors->first('constitution_of_the_organization_has_changed') }}</span><br>
        @endif
        @if ($errors->has('constitution_of_the_organization_if_unchanged'))
        <span class="text-danger">{{ $errors->first('constitution_of_the_organization_if_unchanged') }}</span><br>
        @endif

        @if ($errors->has('attested_copy_of_latest_registration_or_renewal_certificate'))
        <span class="text-danger">{{ $errors->first('attested_copy_of_latest_registration_or_renewal_certificate') }}</span><br>
        @endif
        @if ($errors->has('constitution_of_the_organization_has_changed'))
        <span class="text-danger">{{ $errors->first('constitution_of_the_organization_has_changed') }}</span><br>
        @endif
        @if ($errors->has('right_to_information_act'))
            <span class="text-danger">{{ $errors->first('right_to_information_act') }}</span><br>
        @endif

         <!--error message -->
                            </div>
                            <div class="p-2">

                            </div>
                        </div>

@if($foreignNgoType == 'Old')


 <!-- modal for old foreign Ngo start --->

 @if(count($ngoOtherDocLists) == 0)
 <div class="d-grid d-md-flex justify-content-md-end">
    <button data-bs-toggle="modal" data-bs-target="#exampleModalOne"  class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
    </button>
    </div>

    <div class="mb-3">
        <div class="d-flex justify-content-center pt-5">
            <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
        </div>
        <h3 class="text-center">
            {{ trans('fd_one_step_three.noInfo')}}
        </h3>
        </div>

        <div class="modal  fade" id="exampleModalOne" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
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

                                <form  method="post" action="{{ route('ngoDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                    @csrf
        <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>


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

                                    <div class="mb-3" id="">

                                        <!-- if yes start -->

                                        <!-- if yes end -->

                                        <div class="card" id="sYesDiv" style="display: none;">
                                            <div class="card-header">
                                                <b>Documents required for amendment/approval of constitution: </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="mt-3 mb-3">
                                                    <label class="form-label" for="">
                                                        Attested copy of the constitution of the company along with the prescribed fee in case of change <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="the_constitution_of_the_company_along_with_fee_if_changed"  accept=".pdf" type="file" id="structurePartOne1">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne1_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        Attested copy of constitution approved by primary registering authority  <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="constitution_approved_by_primary_registering_authority"  accept=".pdf" type="file" id="structurePartOne2">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne2_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        Clean copy of the constitution jointly signed by the chairman and secretary of the organization<span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="clean_copy_of_the_constitution"  accept=".pdf" type="file" id="structurePartOne3">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne3_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        Original copy of invoice for payment of change fee in any section, sub-section of the constitution   <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="payment_of_change_fee"  accept=".pdf" type="file" id="structurePartOne4">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne4_text"></p>

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        A certified copy of the minutes of the general meeting regarding the amendment and addition of any section, sub-section of the constitution  <span class="text-danger">*</span>
                                                         <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                                                    <input class="form-control" name="section_sub_section_of_the_constitution"  accept=".pdf" type="file" id="structurePartOne5">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne5_text"></p>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        Comparative statement of previous constitution and current constitution (with joint signature of president and editor on each page)<span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                                                    <input class="form-control" name="previous_constitution_and_current_constitution_compare"  accept=".pdf" type="file" id="structurePartOne6">

                                                    <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne6_text"></p>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $('[id^=structurePartOne]').on('change', function(e) {

                                                    var mainId = $(this).attr('id');
                                                    var getId = mainId.slice(16)
                                                    //alert(getId);
                                                    let size = this.files[0].size;


                                                    if( getId == 5 || getId == 6){

                                                        if (size > 1000000 ) {
                                                        $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 1 MB File');
                                                    }else{
                                                        $('#structurePartOne'+getId+'_text').text('');
                                                    }


                                                    }else{



                                                    if (size > 500000 ) {
                                                        $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 500 KB File');
                                                    }else{
                                                        $('#structurePartOne'+getId+'_text').text('');
                                                    }
                                                }
                                                });

                                            </script>




                                        <!-- if no start -->

                                        <div class="card" id="sNoDiv" style="display: none;">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        Copy of 'Unchanged' certificate (notarized/attested by the Peace of Justice Department of the concerned country) if the constitution of the organization has not changed : <span class="text-danger">*</span>
                                                        <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>
                                                    </label>
                                                    <input class="form-control" name="constitution_of_the_organization_if_unchanged"  accept=".pdf" type="file" id="constitution_of_the_organization_if_unchanged">
                                                    <p class="text-danger mt-2" style="font-size:12px;" id="constitution_of_the_organization_if_unchanged_text"></p>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $('#constitution_of_the_organization_if_unchanged').on('change', function(e) {
                                                    let size = this.files[0].size;



                                                    if (size > 500000 ) {
                                                        $('#constitution_of_the_organization_if_unchanged_text').text('Please Upload Maximum 500 KB File');
                                                    }else{
                                                        $('#constitution_of_the_organization_if_unchanged_text').text('');
                                                    }
                                                });

                                            </script>

                                        <!-- if no end -->
                                    </div>
                                    <b>Other Information: </b>
                                       <div class="mb-3">
                                            <label class="form-label" for="">



                                                List of Board of Directors / Board of Trustees (Notarized / Attested by the Justice of Peace of the concerned country)<span class="text-danger">*</span>

                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>



                                            </label>
                                            <input class="form-control" data-parsley-required name="list_of_board_of_directors_or_board_of_trustees"  accept=".pdf" type="file" id="structurePartThree1">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree1_text"></small>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)<span class="text-danger">*</span>                                         <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>

                                            <input class="form-control" data-parsley-required name="organization_by_laws_or_constitution"  accept=".pdf" type="file" id="structurePartThree2">


                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree2_text"></small>


                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
        Work Procedure of the Board of Directors / Board of Trustees meeting of the organization (mentioning the matters related to the formation of the board, proposal to renew the registration, changes in the constitution in the minutes) (notarized / attested by the Peace of Justice Department of the concerned country)<span class="text-danger">*</span>

        <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>
        </label>


                                            <input class="form-control" data-parsley-required name="work_procedure_of_organization"  accept=".pdf" type="file" id="structurePartThree3">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree3_text"></small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                             Attested copy of last 10 (ten) years audit report of the organization
                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                                            <input class="form-control"  name="last_ten_years_audit_report_and_annual_report_of_the_company"  accept=".pdf" type="file" id="structurePartThree4">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree4_text"></small>
                                        </div>



                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                             Attested copy of last 10 (ten) years annual report of the organization
                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                                            <input class="form-control"  name="last_ten_year_annual_report"  accept=".pdf" type="file" id="structurePartThree4">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree4_text"></small>
                                        </div>





                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                Copy of registration certificate (notarized/attested of the concerned country) of the head office of the company <span class="text-danger">*</span>
                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>
                                            </label>
                                            <input class="form-control" data-parsley-required name="registration_certificate"  accept=".pdf" type="file" id="structurePartThree5">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree5_text"></small>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                Attested copy of latest registration/renewal certificate <span class="text-danger">*</span>
                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span>
                                            </label>
                                            <input class="form-control" data-parsley-required name="attested_copy_of_latest_registration_or_renewal_certificate"  accept=".pdf" type="file" id="structurePartThree6">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree6_text"></small>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="">
                                                Under Right To Information Act - 2009 - Focal Point appointed: Copy of notification letter to Bureau<span class="text-danger">*</span>
                                                <br><span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span> </label>
                                            <input class="form-control" data-parsley-required name="right_to_information_act"  accept=".pdf" type="file" id="structurePartThree7">
                                            <small class="text-danger mt-2" style="font-size:12px;" id="structurePartThree7_text"></small>
                                        </div>

                                    <div class="progress" style="display: none;">
                                        <div class="bar"></div >
                                               <div class="percent">0%</div >
                                         </div>
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
@else


@endif


                        <div class="file-content">

                            <div class="card">
                                <div class="card-body file-manager">
                      <!-- table content start -->

                      @if(count($ngoOtherDocLists) == 0)

                      @else


                      <table class="table table-border">

                        <!--new start -->
                        @if(empty($ngoOtherDocListsFirst->fd_eight_form_data))

                        @else
                        <?php

                          $file_path = url($ngoOtherDocListsFirst->fd_eight_form_data);
                          $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                          ?>

                          <tr>
                           <td>
                               FD-8 Form with seal and signature of Chief Executive officer
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
                                                 FD-8 Form with seal and signature of Chief Executive officer
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

                              <!--end if -->


                      <!--new start -->
                      @if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

                      @else
                      <?php

                        $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                        ?>
                        <tr>
                           <td>
                               List of Board of Directors / Board of Trustees (Notarized / Attested by the Justice of Peace of the concerned country)
                               <h6>{{ $filename }}</h6>
                           </td>
                           <td>
                            <div class="d-flex mt-2">
                               <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                               data-bs-target="#exampleModal{{ $ngoOtherDocListsFirst->id  }}"><i class="fa fa-pencil"></i></button>


                               <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                               {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






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
                   By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)
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
               </td>

              </tr>

        @endif

        <!--end if -->

        <!--new start -->
        @if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

        @else
        <?php

        $file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);


        ?>

        <tr>
        <td>
        Work Procedure of the Board of Directors / Board of Trustees meeting of the organization
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal3222"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






         <!--modal -->
         <div class="modal fade" id="exampleModal3222" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </td>

        </tr>

        @endif

        <!--end if -->

            <!--new start -->
        @if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

        @else
        <?php

        $file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);


        ?>

        <tr>
        <td>
        Attested copy of last 10 (ten) years audit report report of the organization
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
                          Attested copy of last 10 (ten) years audit report report of the organization
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
        Attested copy of last 10 (ten) years annual report of the organization
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
                           Attested copy of last 10 (ten) years annual report of the organization
        </h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <form method="post" action="{{ route('ngoDocument.update',$ngoOtherDocListsFirst->id ) }}" enctype="multipart/form-data" id="form">

                           @csrf
                           @method('PUT')
                           <input type="hidden" name="main_ngo_type" value="{{ $foreignNgoType }}"/>
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
           @if(empty($ngoOtherDocListsFirst->registration_certificate))

           @else
           <?php

             $file_path = url($ngoOtherDocListsFirst->registration_certificate);
             $filename  = pathinfo($file_path, PATHINFO_FILENAME);


             ?>

             <tr>
               <td>
                   Copy of registration certificate (notarized/attested of the concerned country) of the head office of the company
                   <h6>{{ $filename }}</h6>
               </td>
               <td>
                <div class="d-flex mt-2">
                   <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                   data-bs-target="#exampleModal4222"><i class="fa fa-pencil"></i></button>


                   <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
                   {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






                     <!--modal -->
                     <div class="modal fade" id="exampleModal4222" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Attested copy of latest registration/renewal certificate
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal41212"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






         <!--modal -->
         <div class="modal fade" id="exampleModal41212" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Under Right To Information Act - 2009 - Focal Point appointed: Copy of notification letter to Bureau
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal455555"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






         <!--modal -->
         <div class="modal fade" id="exampleModal455555" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </td>
        </tr>


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

        <tr>
        <td>
           Attested copy of the constitution of the company along with the prescribed fee in case of change
           <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
           data-bs-target="#exampleModal4888"><i class="fa fa-pencil"></i></button>


           <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
           {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






             <!--modal -->
             <div class="modal fade" id="exampleModal4888" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Attested copy of constitution approved by primary registering authority
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal46767"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






        <!--modal -->
        <div class="modal fade" id="exampleModal46767" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Clean copy of the constitution jointly signed by the chairman and secretary of the organization
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal4rr"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}
        <!--modal -->
        <div class="modal fade" id="exampleModal4rr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Original copy of invoice for payment of change fee in any section, sub-section of the constitution
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal4ff"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






        <!--modal -->
        <div class="modal fade" id="exampleModal4ff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        A certified copy of the minutes of the general meeting regarding the amendment and addition of any section, sub-section of the constitution
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal4ee"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






        <!--modal -->
        <div class="modal fade" id="exampleModal4ee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Comparative statement of previous constitution and current constitution (with joint signature of president and editor on each page)
        <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal4dd"><i class="fa fa-pencil"></i></button>


        <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
        {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






        <!--modal -->
        <div class="modal fade" id="exampleModal4dd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <tr>
        <td>
           Copy of 'Unchanged' certificate (notarized/attested by the Peace of Justice Department of the concerned country) if the constitution of the organization has not changed
           <h6>{{ $filename }}</h6>
        </td>
        <td>
            <div class="d-flex mt-2">
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
           data-bs-target="#exampleModal4bb"><i class="fa fa-pencil"></i></button>


           <a class="btn btn-sm btn-registration" target="_blank" style="margin-left:5px;"  href = '{{ route('deleteRenewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-download"></i></a>
           {{-- <a   class="btn btn-sm btn-danger" href = '{{ route('deleteRenewalFile', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}'><i class="fa fa-trash"></i></a> --}}






             <!--modal -->
             <div class="modal fade" id="exampleModal4bb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </td>
        </tr>

        @endif

        <!--end if -->


        @endif

        </table>

    @endif
<!-- table content end --->


                                    <div class="files">
                                       @if(count($ngoOtherDocLists) == 0)




                                      @else

                                      @if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')






                                      @else


                                      @endif






                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end old foreign ngo file-->
                        @else


                        <!-- modal for foreign Ngo start --->
                        @if(count($ngoOtherDocLists) == 0)
                        <div class="d-grid d-md-flex justify-content-md-end">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                        </button>
                        </div>
                        @else

                        @endif

                        <!-- new foreign ngo code modal start -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
<div class="card mb-3">
    <div class="card-header">
        Certificate of Incorporation in the Country of Origin <span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV2">

                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV2_text"></p>

            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Constitution <span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf"  name="pdf_file_list[]" type="file" id="foreignNgoPdfV3">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV3_text"></p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Activities Report <span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV4">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV4_text"></p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Decision of the Committee/Board To Open office In Bangladesh<span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV5">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV5_text"></p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Letter of Appoinment of The Country Representative<span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV6">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV6_text"></p>
            </div>
        </div>
    </div>
</div>


<div class="card mb-3">
    <div class="card-header">
        Copy Of Treasury Chalan in support of deposting US$ 9,000 or
        Equivalent TK amount in the Code 1-0323-0000-1836 and 15% Vat Code
        No (1-1133-0035-0311) <span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf"  name="pdf_file_list[]" type="file" id="foreignNgoPdfV3">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV3_text"></p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Deed of Agreement Stamp of TK.300/-with the landlord in Support of Opening the office In Bangladesh<span class="text-danger">*</span>

        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV7">
                <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV7_text"></p>
            </div>
        </div>
    </div>
</div>

                            <div class="card mb-3">
                                <div class="card-header">
                           List of Executive Committee (foreign)<span class="text-danger">*</span>

                           <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV1">

                                            <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV1_text"></p>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    Letter of Intent <span class="text-danger">*</span>

                                    <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="foreignNgoPdfV8">
                                            <p class="text-danger mt-2" style="font-size:12px;" id="foreignNgoPdfV8_text"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
<!-- end new foreign ngo code modal  --->

                        <!-- modal for foreign Ngo end -->

                      <!--start new foreign ngo file-->
                        <div class="file-content mt-4">
                            <div class="card">
                                <div class="card-body file-manager">

                                    <!-- table of content start  --->

                                    @if(count($ngoOtherDocLists) == 0)
                                       <div class="mb-3">
                                        <div class="d-flex justify-content-center pt-5">
                                            <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                        </div>
                                        <h3 class="text-center">
                                            {{ trans('fd_one_step_three.noInfo')}}
                                        </h3>
                                        </div>

                                    @else


                                    <table class="table table-border">
                                        @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

                                        <?php

                                        $file_path = url($all_ngo_list_all->pdf_file_list);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        ?>
                                        <tr>

                                        <td>
                                            @if($key+1 == 1)

                                            @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                            <h6>ফরম নং - ৮</h6>
                                            @else

                                            <h6>Certificate of Incorporation in the Country of Origin</h6>
                                            @endif

                                            @elseif($key+1 == 2)

                                                @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                @else

                                                <h6>Constitution</h6>
                                                @endif

                                            @elseif($key+1 == 3)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                            @else

                                            <h6>Activities Report</h6>
                                            @endif

                                            @elseif($key+1 == 4)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                            @else

                                            <h6>Decision of the Committee/Board To Open office In Bangladesh</h6>
                                            @endif

                                            @elseif($key+1 == 5)


                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                            @else

                                            <h6>Letter of Appoinment of The Country Representative</h6>
                                            @endif



                                            @elseif($key+1 == 6)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                            @else

                                            <h6>Copy Of Treasury Chalan in support of deposting US$ 9,000 or
                                                Equivalent TK amount in the Code 1-0323-0000-1836 and 15% Vat Code
                                                No (1-1133-0035-0311)</h6>
                                            @endif
                                            @elseif($key+1 == 7)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                            @else

                                            <h6>Deed of Agreement Stamp of TK.300/-with the landlord in Support of Opening the office In Bangladesh</h6>
                                            @endif
                                            @elseif($key+1 == 8)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                            @else

                                            <h6>List of Executive Committee (foreign)</h6>
                                            @endif

                                            @elseif($key+1 == 9)

                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                            @else

                                            <h6>Letter Of Intent</h6>
                                            @endif
                                            @endif
                                            <h6>{{ $filename }}</h6>
                                            <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex mt-2">

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
                                                                            <h6>ফরম নং - ৮</h6>
                                                                            @else

                                                                            <h6>Certificate of Incorporation in the Country of Origin</h6>
                                                                            @endif
                                                                            @elseif($key+1 == 2)

                                                                            @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                                            <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                                            @else

                                                                            <h6>Constitution</h6>
                                                                            @endif

                                                                        @elseif($key+1 == 3)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                                                        @else

                                                                        <h6>Activities Report</h6>
                                                                        @endif

                                                                        @elseif($key+1 == 4)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                        @else

                                                                        <h6>Decision of the Committee/Board To Open office In Bangladesh</h6>
                                                                        @endif

                                                                        @elseif($key+1 == 5)


                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                                        @else

                                                                        <h6>Letter of Appoinment of The Country Representative</h6>
                                                                        @endif



                                                                        @elseif($key+1 == 6)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                                        @else

                                                                        <h6>Copy Of Treasury Chalan in support of deposting US$ 9,000 or
                                                                            Equivalent TK amount in the Code 1-0323-0000-1836 and 15% Vat Code
                                                                            No (1-1133-0035-0311)</h6>
                                                                        @endif
                                                                        @elseif($key+1 == 7)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                        @else

                                                                        <h6>Deed of Agreement Stamp of TK.300/-with the landlord in Support of Opening the office In Bangladesh</h6>
                                                                        @endif



                                                                        @elseif($key+1 == 8)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                        @else

                                                                        <h6>List of Executive Committee (foreign)</h6>
                                                                        @endif

                                                                        @elseif($key+1 == 9)

                                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                        <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                        @else

                                                                        <h6>Letter of Intent </h6>
                                                                        @endif
                                                                        @endif

                                                                         </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}" enctype="multipart/form-data" id="form">

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

                                                <a class="btn btn-sm btn-registration" style="margin-left:5px;" target="_blank"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                                                {{-- <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> --}}
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </table>




                                    @endif

                                    <!--table of content end --->

                                </div>
                            </div>
                        </div>

                        @endif



                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 back_button"  onclick="location.href = '{{ route('othersInformation') }}';">{{ trans('fd_one_step_one.back')}}</button>
@if(count($ngoOtherDocLists) == 0)
                          @if(count($ngoOtherDocLists) >= 1)
<button class="btn btn-custom next_button" type="button">{{ trans('fd_one_step_four.Submit2')}}</button>
                          @else
                          <button class="btn btn-custom next_button" type="button" disabled>{{ trans('fd_one_step_four.Submit2')}}</button>
                          @endif
@else

                          @if(count($ngoOtherDocLists) >= 1)


                            <button class="btn btn-custom next_button" onclick="location.href = '{{ route('ngoDocumentFinal') }}';">{{ trans('fd_one_step_four.Submit2')}}</button>
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
</div>
</section>





<!--end local ngo -->



