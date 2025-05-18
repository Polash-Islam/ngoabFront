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
                            <li class="active">{{ trans('fd_one_step_one.fd_8_form')}}</li>
                            {{-- <li class="active">{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                            <li>{{ trans('fd_one_step_four.o_info')}}</li>
                            {{-- <li >{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                            <li >{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                            <li  class="active">{{ trans('fd_one_step_four.o_info')}}</li> --}}
                        </ul>

                    </div>
                    <div class="right-side">

                        <?php

                        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)
                            ->value('ngo_type');

                        $lastRenewDataPdf = DB::table('ngo_renew_infos')
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('id', 'desc')->first();

                        ?>

                        @if($checkNgoTypeForForeginNgo == 'Foreign')

                            <form action="{{ route('ngoRenewStepFourUpdate') }}" method="post"
                                  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf
                                <input type="hidden" value="{{ $mainId }}" name="fileId"/>
                                <div class="main active">

                                    <div class="fd01_tablist">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                    </div>


                                    @if(empty($lastRenewDataPdf->copy_of_chalan))
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                নিবন্ধন নবায়ন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত
                                                করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span> </label>
                                            <input class="form-control" name="copy_of_chalan" accept=".pdf" type="file"
                                                   id="renewFileOld1">

                                            <p id="renewFileOld1_text" class="text-danger" style="font-size: 12px;"></p>

                                        </div>
                                    @else
                                            <?php

                                            $file_path = url($lastRenewDataPdf->copy_of_chalan);
                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                            ?>
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                নিবন্ধন নবায়ন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত
                                                করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span> </label>
                                            <input class="form-control" name="copy_of_chalan" accept=".pdf" type="file"
                                                   id="renewFileOld1">

                                            <p id="renewFileOld1_text" class="text-danger" style="font-size: 12px;"></p>

                                        </div>
                                        <b>{{ $filename.'.'.$extension }}</b>
                                    @endif




                                    @if(empty($lastRenewDataPdf->due_vat_pdf))
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                            <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                   id="renewFileOld2">

                                            <p id="renewFileOld2_text" class="text-danger" style="font-size: 12px;"></p>
                                        </div>
                                    @else
                                            <?php

                                            $file_path = url($lastRenewDataPdf->due_vat_pdf);
                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                            ?>
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                            <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                   id="renewFileOld2">

                                            <p id="renewFileOld2_text" class="text-danger" style="font-size: 12px;"></p>
                                        </div>
                                        <b>{{ $filename.'.'.$extension }}</b>
                                    @endif
                                    <div class="mb-3">
                                        <h5 class="form_middle_text">
                                            {{ trans('fd_one_step_four.mother_account_details_text') }}
                                        </h5>
                                    </div>


                                    @if($checkNgoTypeForForeginNgo == 'Foreign')
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">
                                                            {{ trans('fd_one_step_four.account_number') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_number"
                                                               class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.account_type') }} <span
                                                                class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_type" class="form-control"
                                                               id="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="name_of_bank" class="form-control"
                                                               id="" value="City Bank">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank') }} <span class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_name_of_branch"
                                                               class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="bank_address_main" class="form-control"
                                                               id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }}
                                                <span class="text-danger">*</span> <br><span class="text-danger"
                                                                                             style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                            <input class="form-control" name="change_ac_number" accept=".pdf"
                                                   type="file" id="change_ac_number">
                                            <p id="change_ac_number_text" class="text-danger mt-3"
                                               style="font-size: 12px;"></p>
                                        </div>
                                    @else
                                        @foreach($all_partiw as $mainAccount)

                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">
                                                                {{ trans('fd_one_step_four.account_number') }}
                                                                <span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_number"
                                                                   value="{{ $mainAccount->account_number }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_type') }} <span
                                                                    class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_type"
                                                                   value="{{ $mainAccount->account_type }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank') }}
                                                                <span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required name="name_of_bank"
                                                                   value="{{ $mainAccount->name_of_bank ?? 'City Bank' }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank') }} <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_name_of_branch"
                                                                   value="{{ $mainAccount->branch_name_of_bank }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address') }}<span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="bank_address_main"
                                                                   value="{{ $mainAccount->bank_address }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(empty($lastRenewDataPdf->change_ac_number))
                                            <div class="mb-3">
                                                <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }} <span class="text-danger">*</span> <br><span
                                                        class="text-danger"
                                                        style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="change_ac_number" accept=".pdf"
                                                       type="file" id="change_ac_number">
                                                <p id="change_ac_number_text" class="text-danger mt-3"
                                                   style="font-size: 12px;"></p>
                                            </div>
                                        @else
                                                <?php

                                                $file_path = url($lastRenewDataPdf->change_ac_number);
                                                $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }} <span class="text-danger">*</span> <br><span
                                                        class="text-danger"
                                                        style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="change_ac_number" accept=".pdf"
                                                       type="file" id="change_ac_number">
                                                <p id="change_ac_number_text" class="text-danger mt-3"
                                                   style="font-size: 12px;"></p>
                                            </div>
                                            <b>{{ $filename.'.'.$extension }}</b>
                                        @endif
                                    @endif

                                    <div class="buttons d-flex justify-content-end mt-4">
                                        <button class="btn btn-dark back_button me-2"
                                                onclick="location.href = '{{ route('allStaffInformationForRenew') }}';">{{ trans('fd_one_step_one.back')}}</button>
                                        <button class="btn btn-custom submit_button"
                                                type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                                    </div>
                                </div>
                            </form>

                        @else

                            <!--local Ngo-->
                            <form action="{{ route('ngoRenewStepFourUpdate') }}" method="post"
                                  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf
                                <input type="hidden" value="{{ $mainId }}" name="fileId"/>
                                <div class="main active">
                                    <div class="fd01_tablist">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                    </div>


                                    @if(empty($lastRenewDataPdf->copy_of_chalan))
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                নিবন্ধন নবায়ন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত
                                                করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span> </label>
                                            <input class="form-control" name="copy_of_chalan" accept=".pdf" type="file"
                                                   id="renewFileOld1">

                                            <p id="renewFileOld1_text" class="text-danger" style="font-size: 12px;"></p>

                                        </div>
                                    @else
                                            <?php

                                            $file_path = url($lastRenewDataPdf->copy_of_chalan);
                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                            ?>
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                নিবন্ধন নবায়ন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত
                                                করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span> </label>
                                            <input class="form-control" name="copy_of_chalan" accept=".pdf" type="file"
                                                   id="renewFileOld1">

                                            <p id="renewFileOld1_text" class="text-danger" style="font-size: 12px;"></p>

                                        </div>
                                        <b>{{ $filename.'.'.$extension }}</b>
                                    @endif




                                    @if(empty($lastRenewDataPdf->due_vat_pdf))
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                            <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                   id="renewFileOld2">

                                            <p id="renewFileOld2_text" class="text-danger" style="font-size: 12px;"></p>
                                        </div>
                                    @else
                                            <?php

                                            $file_path = url($lastRenewDataPdf->due_vat_pdf);
                                            $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                            ?>
                                        <div class="mb-3 d-none">
                                            <label class="form-label" for="">
                                                তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা
                                                (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span>
                                                <br><span class="text-danger"
                                                          style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                            <input class="form-control" name="due_vat_pdf" accept=".pdf" type="file"
                                                   id="renewFileOld2">

                                            <p id="renewFileOld2_text" class="text-danger" style="font-size: 12px;"></p>
                                        </div>
                                        <b>{{ $filename.'.'.$extension }}</b>
                                    @endif


                                    <div class="mb-3">
                                        <h5 class="form_middle_text">
                                            {{ trans('fd_one_step_four.mother_account_details_text') }}
                                        </h5>
                                    </div>


                                    @if($checkNgoTypeForForeginNgo == 'Foreign')
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">
                                                            {{ trans('fd_one_step_four.account_number') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_number"
                                                               class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for=""
                                                               class="form-label">{{ trans('fd_one_step_four.account_type') }}
                                                            <span
                                                                class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_type" class="form-control"
                                                               id="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">
                                                            {{ trans('fd_one_step_four.name_of_bank') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="name_of_bank" class="form-control"
                                                               id="" value="City Bank">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank') }} <span class="text-danger">*</span> </label>
                                                        <input type="text" name="main_account_name_of_branch"
                                                               class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address') }}
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="text" name="bank_address_main" class="form-control"
                                                               id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }} <span
                                                    class="text-danger">*</span> </label>
                                            <input class="form-control" name="change_ac_number" accept=".pdf"
                                                   type="file" id="">
                                            <p id="change_ac_number_text" class="text-danger mt-3"
                                               style="font-size: 12px;"></p>
                                        </div>
                                    @else
                                        @foreach($all_partiw as $mainAccount)

                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"> {{ trans('fd_one_step_four.account_number') }} <span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_number"
                                                                   value="{{ $mainAccount->account_number }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_type') }}<span
                                                                    class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_type"
                                                                   value="{{ $mainAccount->account_type }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank') }}
                                                                <span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required name="name_of_bank"
                                                                   value="{{ $mainAccount->name_of_bank ?? 'City Bank' }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank') }}<span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" data-parsley-required
                                                                   name="main_account_name_of_branch"
                                                                   value="{{ $mainAccount->branch_name_of_bank }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address') }} <span class="text-danger">*</span> </label>
                                                            <input type="text" data-parsley-required
                                                                   name="bank_address_main"
                                                                   value="{{ $mainAccount->bank_address }}"
                                                                   class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach



                                        @if(empty($lastRenewDataPdf->change_ac_number))
                                            <div class="mb-3">
                                                <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }} <span class="text-danger">*</span> <br><span
                                                        class="text-danger"
                                                        style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="change_ac_number" accept=".pdf"
                                                       type="file" id="change_ac_number">
                                                <p id="change_ac_number_text" class="text-danger mt-3"
                                                   style="font-size: 12px;"></p>
                                            </div>
                                        @else
                                                <?php

                                                $file_path = url($lastRenewDataPdf->change_ac_number);
                                                $filename = pathinfo($file_path, PATHINFO_FILENAME);

                                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);


                                                ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="">{{ trans('fd_one_step_four.buro_onumodon_copy') }} <span class="text-danger">*</span> <br><span
                                                        class="text-danger"
                                                        style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                <input class="form-control" name="change_ac_number" accept=".pdf"
                                                       type="file" id="change_ac_number">
                                                <p id="change_ac_number_text" class="text-danger mt-3"
                                                   style="font-size: 12px;"></p>
                                            </div>
                                            <b>{{ $filename.'.'.$extension }}</b>
                                        @endif

                                    @endif

                                    <div class="buttons d-flex justify-content-end mt-4">
                                        <button class="btn btn-dark back_button me-2"
                                                onclick="location.href = '{{ route('allStaffInformationForRenew') }}';">{{ trans('fd_one_step_one.back')}}</button>
                                        <button class="btn btn-custom submit_button"
                                                type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                                    </div>
                                </div>
                            </form>

                            <!--end local ngo -->
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        $(document).on('click', '.organizational_structure', function () {

            var structureStatus = $(this).val();


            //alert(structureStatus);


            $.ajax({
                url: "{{ route('localNgoType') }}",
                method: 'GET',
                data: {structureStatus: structureStatus},
                success: function (data) {
                    $("#mResult").html('');
                    $("#mResult").html(data);
                }
            });
        });
    </script>





    <script>
        $(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {

                    staff_name: {
                        required: true
                    },
                    staff_position: {
                        required: true
                    },
                    staff_address: {
                        required: true
                    },
                    date_of_join: {
                        required: true
                    },

                    citizenship: {
                        required: true
                    },
                    salary_statement: {
                        required: true
                    },
                    other_occupation: {
                        required: true
                    },
                    citizenship2: {
                        required: true
                    },
                    citizenship1: {
                        required: true
                    },
                    citizenship3: {
                        required: true
                    },
                    citizenship4: {
                        required: true
                    },
                    citizenship5: {
                        required: true
                    }

                },


                messages:
                    {


                        staff_name: {
                            required: " staff_name Field is required"
                        },
                        staff_position: {
                            required: " staff_position Field is required"
                        },
                        staff_address: {
                            required: " staff_address Field is required"
                        },
                        date_of_join: {
                            required: " date_of_join Field is required"
                        },

                        citizenship: {
                            required: " citizenship Field is required"
                        },
                        salary_statement: {
                            required: " salary_statement Field is required"
                        },
                        other_occupation: {
                            required: " other_occupation Field is required"
                        }


                    }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple, .distinct-single, .sub-distinct-single').select2();
        });
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>


    <!--//add new row-->

    <script>
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr>' +
                '<td>' +
                '<input type="text" name="" placeholder="দাতা সংস্থার নাম" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name="" placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="file" id="">' +
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
                '<input type="text" name="" placeholder="পরামর্শকের নাম" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name="" placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
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
                '<input type="file" name="" placeholder="" class="form-control" />' +
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
