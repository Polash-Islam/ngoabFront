<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">


                        @if($foreignNgoType == 'Old')
                        <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                        <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif
                        {{-- <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li> --}}
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">

                    <?php

                    $allFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)
                     ->first();


                                    ?>


                    <div class="committee_container active">
                        <div class="text">
                            <h2>{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</h2>
                            {{-- <p>Enter your information to get closer to Registration.</p> --}}
                        </div>

                        <div class="fd01_tablist">
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab fd01_checked"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>

                        </div>

                        <div class="mt-3">
                            <form action="{{ route('fieldOfProposedActivitiesUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf

                    <input type="hidden" class="form-control" value="{{ $allFormOneData->id }}" name="mid"  id="">
                    <input type="hidden" class="form-control" value="{{ $foreignNgoType }}" name="oldOrNew"  id="">

                    @if($foreignNgoType == 'Old')

                    @if(empty($allFormOneData->foregin_pdf))
                    <div class="mb-3">
                        <label for="" class="form-label">{{ trans('fd_one_step_two.10y')}} <span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
                        <input type="file" name="foregin_pdf" data-parsley-required accept=".pdf" class="form-control" id="foregin_pdf">
                        <small id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></small>
                    </div>
                    @else
                    <?php

                    $file_path = url($allFormOneData->foregin_pdf);
                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                    ?>
 <div class="mb-3">
    <label for="" class="form-label">{{ trans('fd_one_step_two.10y')}} <span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 5 MB)</span></label>
    <input type="file" name="foregin_pdf"  accept=".pdf" class="form-control" id="foregin_pdf">
    <small id="foregin_pdf_text" class="text-danger" style="font-size: 12px;"></small>
</div>
<b>{{ $filename.'.'.$extension }}</b>
                    @endif

                    <div class="mb-3">
                        <label for="" class="form-label">Probable / expected annual budget of the organization<span class="text-danger">*</span> </label>
                        <input type="text" name="annual_budget"  data-parsley-required class="form-control" id="">
                    </div>
                    @if(empty($allFormOneData->annual_budget_file))
                    <div class="mb-3">
                        <label for="" class="form-label">Probable / expected annual budget source of the organization<span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                        <input type="file" name="annual_budget_file"  data-parsley-required class="form-control" accept=".pdf" id="annual_budget_file">
                        <small id="annual_budget_file_text" class="text-danger" style="font-size:12px;"></small>
                    </div>
                    @else
                    <?php

                    $file_path = url($allFormOneData->foregin_pdf);
                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                    ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Probable / expected annual budget source of the organization<span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                        <input type="file" name="annual_budget_file"   class="form-control" id="annual_budget_file" accept=".pdf">
                        <small id="annual_budget_file_text" class="text-danger" style="font-size:12px;"></small>
                    </div>
                    <b>{{ $filename.'.'.$extension }}</b>
                    @endif


                    @else

                    @if(empty($allFormOneData->plan_of_operation))

                    <div class="mb-3">
                        <label for="" class="form-label">{{ trans('fd_one_step_two.Plan_of_Operation')}} <span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
                        <input type="file" required accept=".pdf" name="plan_of_operation" class="form-control" id="plan_of_operation">
                        <p id="plan_of_operation_text" class="text-danger mt-2" style="font-size: 12px;"></p>
                    </div>
@else

<?php

$file_path = url($allFormOneData->plan_of_operation);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>
<div class="mb-3">
<label for="" class="form-label">{{ trans('fd_one_step_two.Plan_of_Operation')}} <span class="text-danger">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
<input type="file" accept=".pdf" name="plan_of_operation" class="form-control" id="plan_of_operation">
<p id="plan_of_operation_text" class="text-danger mt-2" style="font-size: 12px;"></p>
</div>
<b>{{ $filename.'.'.$extension }}</b>
                @endif



                    <div class="mb-3 mt-4">
                        <label for="" class="form-label">{{ trans('fd_one_step_two.Project_District')}} {{ trans('fd_one_step_two.Project_Sub_District')}}<span class="text-danger">*</span> </label>


                        <br>
                        <label class="radio-inline">
                            <input class="newDisType" type="radio" value="1" name="optradio" >{{ trans('fd_one_step_two.allDistrict')}}
                          </label>
                          <label class="radio-inline">
                            <input class="newDisType" type="radio" value="0" name="optradio">{{ trans('fd_one_step_two.disWise')}}
                          </label>


                        <input type="text" style="display: none;"  name="district" value="{{ $allFormOneData->district }}" data-parsley-required class="form-control" id="showHideInput">

                    </div>


                    <div class="mb-3">
                        <h5 class="form_middle_text">
                            {{ trans('fd_one_step_two.Source_of_Fund')}}
                        </h5>
                    </div>



<?php

$getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->Where('fd_one_form_id',$allFormOneData->id)->get();


        ?>

        <div class="row">
            @foreach($getAllSourceOfFundData as $key=>$allGetAllSourceOfFundData)
            <div class="col-md-6 mt-2">

                <div class="card">

                    <div class="card-body">
                        <p><b>{{ trans('fd_one_step_two.Name_of_donor_organization')}}:</b> {{ $allGetAllSourceOfFundData->name }}</p>
                        <p><b>{{ trans('fd_one_step_two.Address_of_donor_organization')}}:</b> {{ $allGetAllSourceOfFundData->address }}</p>

                        <p><b>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}:</b> <a target="_blank" href="{{ route('sourceOfFundDocDownload',$allGetAllSourceOfFundData->id) }}" class="btn btn-custom next_button btn-sm" >
                            <i class="fa fa-download" aria-hidden="true"></i>
                        </a></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-custom next_button btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>

                          </button>

                          <button id="deleteRecord{{ $allGetAllSourceOfFundData->id }}" class="btn btn-danger btn-sm" data-id="{{ $allGetAllSourceOfFundData->id }}" type="button" name="deleting">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>





                          <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ trans('form 8_bn.update')}}</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="{{ route('sourceOfFundUpdate') }}" id="form">
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Name_of_donor_organization')}} <span class="text-danger">*</span> </label>
        <input type="text" name="name_sour" value="{{ $allGetAllSourceOfFundData->name }}" class="form-control" id="exampleFormControlInput1" >

        <input type="hidden" name="id" value="{{ $allGetAllSourceOfFundData->id }}" class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Address_of_donor_organization')}} <span class="text-danger">*</span> </label>
        <input type="text" name="address" value="{{ $allGetAllSourceOfFundData->address }}" class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}} <span class="text-danger">*</span> </label>
        <input type="file" name="letter_file" accept=".pdf" class="form-control" id="exampleFormControlInput1">
      </div>

      <button type="submit" class="btn btn-custom next_button btn-sm">
        {{ trans('form 8_bn.update')}}
      </button>
    </form>

</div>

</div>
</div>
</div>
                    </div>

                </div>

            </div>
            @endforeach
        </div>




@if(count($getAllSourceOfFundData) == 0)

<div class="mb-3 mt-2">
<table class="table table-light" id="dynamicAddRemove">
<tr>
    <th>{{ trans('fd_one_step_two.Name_of_donor_organization')}}<span class="text-danger">*</span> </th>
    <th>{{ trans('fd_one_step_two.Address_of_donor_organization')}}<span class="text-danger">*</span>  </th>
    <th>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}  </th>
    <th></th>
</tr>

<tr>
    <td>
        <input type="text"   name="name[]"
               class="form-control" required/>
    </td>
    <td>
        <input type="text"   name="address[]"
               class="form-control" required/>
    </td>
    <td>
        <input class="form-control"  accept=".pdf"  name="letter_file[]" type="file" id="">
    </td>
    <td></td>
</tr>

</table>
<button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{ trans('fd_one_step_two.Add_New_Donor_Information')}}
</button>
</div>

@else
<div class="mb-3 mt-2">
<table class="table table-light" id="dynamicAddRemove">
<tr>
    <th>{{ trans('fd_one_step_two.Name_of_donor_organization')}}<span class="text-danger">*</span>  </th>
    <th>{{ trans('fd_one_step_two.Address_of_donor_organization')}}<span class="text-danger">*</span>  </th>
    <th>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}  </th>
    <th></th>
</tr>

<tr>
    <td>
        <input type="text"   name="name[]"
               class="form-control" required/>
    </td>
    <td>
        <input type="text"   name="address[]"
               class="form-control" required/>
    </td>
    <td>
        <input class="form-control" accept=".pdf"  name="letter_file[]" type="file" id="">
    </td>
    <td></td>
</tr>

</table>
<button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">
{{ trans('fd_one_step_two.Add_New_Donor_Information')}}
</button>
</div>
@endif
<div class="mb-3">
    <label for="" class="form-label">{{ trans('fd_one_step_two.What_is_Your_Expected_Annual_Budget_Foreign_Currency_or_Bangladeshi_Taka')}} <span class="text-danger">*</span> </label>
    <input type="text" name="annual_budget" value="{{ $allFormOneData->annual_budget }}" data-parsley-required class="form-control" id="">
</div>
@endif






                        </div>


                        <div class="buttons d-flex justify-content-end mt-4">
                            <a href="{{ route('backFromStepTwo') }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                            <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_two" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                            <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_two" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
