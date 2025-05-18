@extends('front.master.master')

@section('title')
    {{ trans('fd_one_step_four.o_info')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection



@section('body')
    <section>
        <div class="container">
            <div class="form-card">
                <div class="form">
                    <div class="left-side">
                        <div class="steps-content">
                            <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                        </div>
                        <ul class="progress-bar">
                            @if($localNgoTypem == 'Old')
                                <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
                            @else
                                <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                            @endif
                            {{-- <li>{{ trans('fd_one_step_one.form_eight_title')}}</li> --}}
                            {{--  <li>{{ trans('fd_one_step_one.member_title')}}</li>
                             <li>{{ trans('fd_one_step_one.image_nid_title')}}</li> --}}
                            <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                        </ul>

                    </div>
                    <div class="right-side">
                        <?php

                        $getFormOneData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)
                            ->first();


                        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                            ->value('ngo_type');

                        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', Session::get('mm_id'))
                            ->first();
                        ?>
                        @if(count($particularsOfOrganisationData) == 0)


                        @else

                            <form action="{{ route('othersInformationUpdate') }}" method="post"
                                  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf
                                <input type="hidden" class="form-control" value="local" name="ngoOrigin" id="">
                                <input type="hidden" class="form-control" value="{{ $localNgoTypem }}" name="oldOrNew"
                                       id="">
                                <input type="hidden" class="form-control" value="{{ $getFormOneData->id }}" name="id"
                                       id="">

                                <div class="main active">
                                    <div class="text">
                                        <h2>{{ trans('fd_one_step_four.o_info')}}</h2>
                                        {{-- <p>Enter your information to get closer to Registration.</p> --}}
                                    </div>

                                    <div class="fd01_tablist">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>

                                    </div>

                                    <div class="mt-3">

                                        @if($localNgoTypem == 'Old')

                                            <div class="mb-3">


                                                <label class="form-label" for="">
                                                    নিবন্ধন নবায়ন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত
                                                    করতে হবে) : <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="copy_of_chalan" accept=".pdf"
                                                       type="file" id="copy_of_chalan">
                                                <p id="copy_of_chalan_text" class="text-danger mt-3"
                                                   style="font-size: 14px;"></p>

                                                @if(empty($getFormOneData->copy_of_chalan))

                                                @else

                                                        <?php

                                                        $file_path = url($getFormOneData->copy_of_chalan);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                        ?>
                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="">
                                                    তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                    (চালানের কপি সংযুক্ত করতে হবে): <span class="text-danger"
                                                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>

                                                <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                       id="due_vat_pdf">
                                                <p id="due_vat_pdf_text" class="text-danger mt-3"
                                                   style="font-size: 14px;"></p>
                                                @if(empty($getFormOneData->due_vat_pdf))

                                                @else
                                                        <?php

                                                        $file_path = url($getFormOneData->due_vat_pdf);
                                                        $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                        ?>
                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                @endif

                                            </div>

                                            <div class="mb-3">
                                                <h5 class="form_middle_text">
                                                    {{ trans('fd_one_step_four.Main_Account_Details')}}
                                                </h5>
                                            </div>

                                            @if(!$get_all_data_adviser_bank)
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.account_number')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="account_number"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.account_type')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="account_type"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="name_of_bank"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="branch_name_of_bank"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.bank_address')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="bank_address"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else

                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.account_number')}}
                                                                    <span class="text-danger">*</span>  </label>
                                                                <input type="text"
                                                                       value="{{ $get_all_data_adviser_bank->account_number }}"
                                                                       required name="account_number"
                                                                       class="form-control" id="">

                                                                <input type="hidden"
                                                                       value="{{ $get_all_data_adviser_bank->id }}"
                                                                       required name="bank_id" class="form-control"
                                                                       id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.account_type')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="account_type"
                                                                       value="{{ $get_all_data_adviser_bank->account_type }}"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="name_of_bank"
                                                                       value="{{ $get_all_data_adviser_bank->name_of_bank }}"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="branch_name_of_bank"
                                                                       value="{{ $get_all_data_adviser_bank->branch_name_of_bank }}"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                       class="form-label">{{ trans('fd_one_step_four.bank_address')}}
                                                                    <span class="text-danger">*</span> </label>
                                                                <input type="text" required name="bank_address"
                                                                       value="{{ $get_all_data_adviser_bank->bank_address }}"
                                                                       class="form-control" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif


                                            <div class="mb-3">
                                                <label class="form-label" for="">ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে
                                                    ব্যুরোর অনুমদনপত্রের কপি সংযুক্ত করতে হবে:<span class="text-danger"
                                                                                                    style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="change_ac_number" accept=".pdf"
                                                       type="file" id="change_ac_number">
                                                <p id="change_ac_number_text" class="text-danger mt-3"
                                                   style="font-size: 12px;"></p>
                                            </div>

                                            @if(empty($getFormOneData->change_ac_number))

                                            @else
                                                    <?php

                                                    $file_path = url($getFormOneData->change_ac_number);
                                                    $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                    ?>
                                                <b>{{ $filename.'.'.$extension }}</b>
                                            @endif

                                        @else

                                            <div class="mb-3">
                                                <label class="form-label d-none"
                                                       for="">{{ trans('fd_one_step_four.treasury_number')}} <span
                                                        class="text-danger">*</span> </label>
                                                <input class="form-control" required
                                                       value="{{ $getFormOneData->treasury_number ?? '12345678' }}"
                                                       name="treasury_number" type="hidden" id="">
                                            </div>

                                            @if(empty($getFormOneData->attach_the__supporting_paper))
                                                <div class="mb-3">
                                                    <label class="form-label d-none"
                                                           for="">{{ trans('fd_one_step_four.attach_the_supporting_papers')}}
                                                        <span class="text-danger">*</span> <span class="text-danger"
                                                                                                 style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="attach_the__supporting_papers"
                                                           accept=".pdf" type="hidden"
                                                           id="attach_the__supporting_papers">
                                                    <p id="attach_the__supporting_papers_text" class="text-danger mt-3"
                                                       style="font-size: 12px;"></p>
                                                </div>
                                            @else

                                                    <?php

                                                    $file_path = url($getFormOneData->attach_the__supporting_paper);
                                                    $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                    ?>

                                                <div class="mb-3">
                                                    <label class="form-label d-none"
                                                           for="">{{ trans('fd_one_step_four.attach_the_supporting_papers')}}
                                                        <span class="text-danger">*</span> <span class="text-danger"
                                                                                                 style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="attach_the__supporting_papers"
                                                           accept=".pdf" type="hidden"
                                                           id="attach_the__supporting_papers">
                                                    <p id="attach_the__supporting_papers_text" class="text-danger mt-3"
                                                       style="font-size: 12px;"></p>
                                                </div>
                                                <b>{{ $filename.'.'.$extension }}</b>
                                            @endif


                                            <div class="mb-3">
                                                <label class="form-label d-none"
                                                       for="">{{ trans('fd_one_step_four.treasury_invoice_number_for_payment_of_vAT')}}
                                                    <span class="text-danger">*</span> </label>
                                                <input class="form-control" name="vat_invoice_number"
                                                       value="{{ $getFormOneData->vat_invoice_number ?? '987654321' }}"
                                                       type="hidden" id="">
                                            </div>

                                            @if(empty($getFormOneData->board_of_revenue_on_fees))
                                                <div class="mb-3">
                                                    <label class="form-label d-none" for="">
                                                        {{ trans('fd_one_step_four.15_VAT')}} <span class="text-danger">*</span>
                                                        <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="board_of_revenue_on_fees"
                                                           accept=".pdf" type="hidden" id="board_of_revenue_on_fees">
                                                    <p id="board_of_revenue_on_fees_text" class="text-danger mt-3"
                                                       style="font-size: 12px;"></p>
                                                </div>
                                            @else

                                                    <?php

                                                    $file_path = url($getFormOneData->board_of_revenue_on_fees);
                                                    $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                    ?>

                                                <div class="mb-3">
                                                    <label class="form-label" for="">
                                                        {{ trans('fd_one_step_four.15_VAT')}} <span class="text-danger">*</span>
                                                        <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input class="form-control" name="board_of_revenue_on_fees"
                                                           accept=".pdf" type="file" id="board_of_revenue_on_fees">
                                                    <p id="board_of_revenue_on_fees_text" class="text-danger mt-3"
                                                       style="font-size: 12px;"></p>
                                                </div>
                                                <b>{{ $filename.'.'.$extension }}</b>
                                            @endif
                                            <div class="mb-3">
                                                <h5 class="form_middle_text">
                                                    {{ trans('fd_one_step_four.tt')}}
                                                </h5>

                                            </div>

                                                <?php


                                                $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id', Session::get('mm_id'))
                                                    ->get();


                                                ?>


                                            <div class="row">
                                                @foreach($get_all_data_adviser as $key=>$all_get_all_data_other)
                                                    <div class="col-md-4 mt-2">

                                                        <div class="card">

                                                            <div class="card-body">


                                                                <p><b>{{ trans('fd_one_step_four.advisor_name')}}
                                                                        : {{ $all_get_all_data_other->name }}</b></p>
                                                                <p><b>{{ trans('fd_one_step_four.advisor_information')}}
                                                                        : {{ $all_get_all_data_other->information }}</b>
                                                                </p>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="button"
                                                                        class="btn btn-custom next_button btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#mmmexampleModal{{ $key+1 }}">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>

                                                                </button>

                                                                <div class="modal fade" id="mmmexampleModal{{ $key+1 }}"
                                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Update
                                                                                    Data</h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">


                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label">{{ trans('fd_one_step_four.advisor_name')}}
                                                                                        :</label>
                                                                                    <input type="text"
                                                                                           value="{{ $all_get_all_data_other->name }}"
                                                                                           name="sname"
                                                                                           id="sname{{ $all_get_all_data_other->id }}"
                                                                                           class="form-control">
                                                                                    <input type="hidden"
                                                                                           value="{{ $all_get_all_data_other->id }}"
                                                                                           name="sid"
                                                                                           id="sid{{ $all_get_all_data_other->id }}"
                                                                                           class="form-control">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label">{{ trans('fd_one_step_four.advisor_information')}}
                                                                                        :</label>
                                                                                    <input type="text"
                                                                                           value="{{ $all_get_all_data_other->information }}"
                                                                                           name="sinformation"
                                                                                           id="sinformation{{ $all_get_all_data_other->id }}"
                                                                                           placeholder=""
                                                                                           class="form-control"/>

                                                                                </div>


                                                                                <button
                                                                                    id="final_b_get{{ $all_get_all_data_other->id }}"
                                                                                    data-id="{{ $all_get_all_data_other->id }}"
                                                                                    class="btn btn-custom next_button btn-sm">
                                                                                    Update
                                                                                </button>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button
                                                                    id="adeleteRecord{{ $all_get_all_data_other->id }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    data-id="{{ $all_get_all_data_other->id }}"
                                                                    type="button" name="deleting">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>


                                                            </div>

                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>

                                            @if(count($get_all_data_adviser) == 0)
                                                <div class="mb-3">
                                                    <table class="table table-light" id="dynamicAddRemoveAdvisor">
                                                        <tr>
                                                            <th>{{ trans('fd_one_step_four.advisor_name')}}</th>
                                                            <th>{{ trans('fd_one_step_four.advisor_information')}}</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="name[]"
                                                                       class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="information[]"
                                                                       class="form-control"/>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <button type="button" name="add" id="dynamic-advisor"
                                                            class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_advisor_information')}}
                                                    </button>
                                                </div>
                                            @else

                                                <div class="mb-3">
                                                    <table class="table table-light" id="dynamicAddRemoveAdvisor">
                                                        <tr>
                                                            <th>{{ trans('fd_one_step_four.advisor_name')}}<span
                                                                    class="text-danger">*</span></th>
                                                            <th>{{ trans('fd_one_step_four.advisor_information')}}<span
                                                                    class="text-danger">*</span></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="name[]"
                                                                       class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="information[]"
                                                                       class="form-control"/>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <button type="button" name="add" id="dynamic-advisor"
                                                            class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_advisor_information')}}
                                                    </button>
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <h5 class="form_middle_text">
                                                    {{ trans('fd_one_step_four.Main_Account_Details')}}
                                                </h5>
                                            </div>


                                                <?php


                                                $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', Session::get('mm_id'))
                                                    ->first();


                                                $get_all_data_adviser_bank_all = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', Session::get('mm_id'))
                                                    ->get();


                                                ?>

                                            @if(count($get_all_data_adviser_bank_all) == 0)

                                                @if($checkNgoTypeForForeginNgo == 'Foreign')

                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_number')}}</label>
                                                                    <input type="text" name="account_number"
                                                                           class="form-control" id="">
                                                                    <input type="hidden" value="p" name="bank_id"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_type')}}</label>
                                                                    <input type="text" name="account_type"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}</label>
                                                                    <input type="text" name="name_of_bank"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}</label>
                                                                    <input type="text" name="branch_name_of_bank"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.bank_address')}}</label>
                                                                    <input type="text" name="bank_address"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @else

                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <select
                                                                        class="form-control @error('bank_id') is-invalid @enderror"
                                                                        name="bank_id">
                                                                        <option selected disabled>
                                                                            -- {{ trans('fd_one_step_four.SelectBank') }}</option>
                                                                        @foreach($bankList as $key => $value)
                                                                            @if(App::getLocale() == 'en')
                                                                                <option
                                                                                    value="{{ $value->id }}" {{ $bankAccountInfo->bank_id == $value->id ? 'selected' : '' }}>{{ $value->name_bn }}</option>
                                                                            @else
                                                                                <option
                                                                                    value="{{ $value->id }}" {{ $bankAccountInfo->bank_id == $value->id ? 'selected' : '' }}>{{ $value->name_en}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_number')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required name="account_number"
                                                                           class="form-control" value="{{ old('account_number', $bankAccountInfo->account_number) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_type')}}
                                                                        <span class="text-danger"></span> </label>
                                                                    <input type="text" required name="account_type"
                                                                           class="form-control" id="" value="{{ old('account_type', $bankAccountInfo->account_type) }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required
                                                                           name="branch_name_of_bank"
                                                                           class="form-control" value="{{ old('branch_name_of_bank', $bankAccountInfo->branch_name) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.bank_address')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required name="bank_address"
                                                                           class="form-control" value="{{ old('bank_address', $bankAccountInfo->bank_address) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                            @else

                                                @if($checkNgoTypeForForeginNgo == 'Foreign')

                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_number')}}</label>
                                                                    <input type="text"
                                                                           value="{{ $get_all_data_adviser_bank->account_number }}"
                                                                           name="account_number" class="form-control"
                                                                           id="">

                                                                    <input type="hidden"
                                                                           value="{{ $get_all_data_adviser_bank->id }}"
                                                                           name="bank_id" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_type')}}</label>
                                                                    <input type="text" name="account_type"
                                                                           value="{{ $get_all_data_adviser_bank->account_type }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}</label>
                                                                    <input type="text" name="name_of_bank"
                                                                           value="{{ $get_all_data_adviser_bank->name_of_bank }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}</label>
                                                                    <input type="text" name="branch_name_of_bank"
                                                                           value="{{ $get_all_data_adviser_bank->branch_name_of_bank }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.bank_address')}}</label>
                                                                    <input type="text" name="bank_address"
                                                                           value="{{ $get_all_data_adviser_bank->bank_address }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @else

                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_number')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text"
                                                                           value="{{ $get_all_data_adviser_bank->account_number }}"
                                                                           required name="account_number"
                                                                           class="form-control" id="">

                                                                    <input type="hidden"
                                                                           value="{{ $get_all_data_adviser_bank->id }}"
                                                                           required name="bank_id" class="form-control"
                                                                           id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.account_type')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required name="account_type"
                                                                           value="{{ $get_all_data_adviser_bank->account_type }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}
                                                                        <span class="text-danger">*</span> </label>
{{--                                                                    <input type="text" required name="name_of_bank"--}}
{{--                                                                           value="{{ $get_all_data_adviser_bank->name_of_bank }}"--}}
{{--                                                                           class="form-control" id="">--}}
                                                                    <select
                                                                        class="form-control @error('bank_id') is-invalid @enderror"
                                                                        name="bank_id">
                                                                        <option selected disabled>
                                                                            -- {{ trans('fd_one_step_four.SelectBank') }}</option>
                                                                        @foreach($bankList as $key => $value)
                                                                            @if(App::getLocale() == 'en')
                                                                                <option
                                                                                    value="{{ $value->id }}" {{ $bankAccountInfo->bank_id == $value->id ? 'selected' : '' }}>{{ $value->name_bn }}</option>
                                                                            @else
                                                                                <option
                                                                                    value="{{ $value->id }}" {{ $bankAccountInfo->bank_id == $value->id ? 'selected' : '' }}>{{ $value->name_en}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required
                                                                           name="branch_name_of_bank"
                                                                           value="{{ $get_all_data_adviser_bank->branch_name_of_bank }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for=""
                                                                           class="form-label">{{ trans('fd_one_step_four.bank_address')}}
                                                                        <span class="text-danger">*</span> </label>
                                                                    <input type="text" required name="bank_address"
                                                                           value="{{ $get_all_data_adviser_bank->bank_address }}"
                                                                           class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                            @endif

                                        @endif


                                            <?php


                                            $get_all_data_other = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id', Session::get('mm_id'))
                                                ->get();


                                            ?>

                                        <div class="row">

                                            <div class="mb-3">
                                                <h5 class="form_middle_text">
                                                    {{ trans('fd_one_step_four.information_pdf')}}
                                                </h5>
                                            </div>


                                            @foreach($get_all_data_other as $key=>$all_get_all_data_other)
                                                <div class="col-md-4 mt-2">

                                                    <div class="card">

                                                        <div class="card-body">


                                                            <p>

                                                                <b>{{ $all_get_all_data_other->information_title }}:</b>
                                                                <a target="_blank"
                                                                   href="{{ route('otherInfoFromOneDownload',$all_get_all_data_other->id) }}"
                                                                   class="btn btn-custom next_button btn-sm">
                                                                    <i class="fa fa-download"
                                                                       aria-hidden="true"></i></a><br>
                                                                    <?php

                                                                    $file_path = url($all_get_all_data_other->information_pdf);
                                                                    $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                                    ?>
                                                                <b>{{ $filename.'.'.$extension }}</b>


                                                            </p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="button"
                                                                    class="btn btn-custom next_button btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#mmexampleModal{{ $key+1 }}">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>

                                                            </button>

                                                            <button id="deleteRecord{{ $all_get_all_data_other->id }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    data-id="{{ $all_get_all_data_other->id }}"
                                                                    type="button" name="deleting">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>


                                                            <!-- Modal -->
                                                            <div class="modal fade" id="mmexampleModal{{ $key+1 }}"
                                                                 tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="exampleModalLabel">Update Data</h1>
                                                                            <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post"
                                                                                  action="{{ route('otherInformationAUpdate') }}">
                                                                                @csrf

                                                                                <input type="hidden" name="mid"
                                                                                       value="{{ $all_get_all_data_other->id }}"
                                                                                       class="form-control"
                                                                                       id="exampleFormControlInput1">


                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="exampleFormControlInput1"
                                                                                        class="form-label">{{ trans('fd_one_step_four.information_pdf')}}</label>
                                                                                    <input type="file" accept=".pdf"
                                                                                           name="information_type_other"
                                                                                           class="form-control"
                                                                                           id="exampleFormControlInput1">
                                                                                </div>

                                                                                <button type="submit"
                                                                                        class="btn btn-custom next_button btn-sm">
                                                                                    Update
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

                                        <!--new code start from 22 april start --->


                                        {{-- <button type="button" name="add" data-bs-toggle="modal" data-bs-target="#extraFileAddCode"
                                          class="btn btn-outline-primary mt-3">{{ trans('fd_one_step_four.add_new_information')}}
                                        </button> --}}

                                        @if(count($get_all_data_other) == 0)

                                            <div class="mb-3">
                                                <table class="table table-light" id="dynamicAddRemoveInformation">
                                                    <tr>
                                                        <th>ফাইলের নাম</th>
                                                        <th>ফাইল</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="information_title[]"
                                                                   class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <input type="file" accept=".pdf" name="information_type[]"
                                                                   class="form-control"/>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                <button type="button" name="add" id="dynamic-information"
                                                        class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_information')}}
                                                </button>
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <table class="table table-light" id="dynamicAddRemoveInformation">
                                                    <tr>
                                                        <th>File Title</th>
                                                        <th>File</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="information_title[]"
                                                                   class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <input type="file" accept=".pdf" name="information_type[]"
                                                                   class="form-control"/>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                <button type="button" name="add" id="dynamic-information"
                                                        class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_information')}}
                                                </button>
                                            </div>

                                        @endif



                                        <!-- new code end from 22 april -->

                                    </div>


                                    <div class="buttons d-flex justify-content-end mt-4">
                                        <a href="{{ route('allStaffDetailsInformation') }}"
                                           class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                        <button class="btn btn-danger me-2" name="submit_value"
                                                value="save_and_exit_from_four"
                                                type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                                        <button class="btn btn-custom next_button" name="submit_value"
                                                value="next_step_from_four"
                                                type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>

                                    </div>

                                </div>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="extraFileAddCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">অতিরিক্ত ফাইল যোগ করুন</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('otherInformationAStore') }}" enctype="multipart/form-data"
                          id="form" data-parsley-validate="">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ফাইলের নাম</label>
                            <input type="text" name="information_title" class="form-control"/>
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ফাইল </label>
                            <input type="file" accept=".pdf" name="information_type" class="form-control"
                                   id="exampleFormControlInput1">
                        </div>


                        <button type="submit" class="btn btn-custom next_button btn-sm">
                            জমা দিন
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>


        $("[id^=final_b_get]").click(function () {

            var id = $(this).data("id");
            var name = $('#sname' + id).val();
            var information = $('#sinformation' + id).val();


            $.ajax({
                url: "{{ route('adviserDataUpdate') }}",
                type: 'get',
                data: {
                    "name": name,
                    "information": information,
                    "id": id,

                },
                success: function (data) {
                    //alert('success');
                    location.reload(true);
                }
            });

        });
        $("[id^=adeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('adviserDataDelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        $("[id^=deleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('otherInformationADelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>



    <!--//add new row-->

    <script>
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr>' +
                '<td>' +
                '<input type="text" name=""  class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name=""  class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="file" accept=".pdf" id="">' +
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

    <script>
        var i = 0;
        $("#dynamic-advisor").click(function () {
            ++i;
            $("#dynamicAddRemoveAdvisor").append('<tr>' +
                '<td>' +
                '<input type="text" name="name[]" required  class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name="information[]" required  class="form-control" />' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-advisor"><i class="bi bi-file-earmark-x-fill"></i></button>' +
                '</td>' +
                '</tr>'
            );
        });
        $(document).on('click', '.remove-input-field-advisor', function () {
            $(this).parents('tr').remove();
        });

    </script>

    <script>
        var i = 0;
        $("#dynamic-information").click(function () {
            ++i;
            $("#dynamicAddRemoveInformation").append('<tr>' +
                '<td>' +
                '<input type="text"  name="information_title[]" placeholder="" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="file" accept=".pdf" name="information_type[]" required placeholder="" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
                '</td>' +
                '</tr>'
            );
        });
        $(document).on('click', '.remove-input-field-information', function () {
            $(this).parents('tr').remove();
        });

    </script>
@endsection
