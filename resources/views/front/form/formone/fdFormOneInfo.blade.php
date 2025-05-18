
              <?php

       $allformOneData = DB::table('fd_one_forms')
       ->where('user_id',Auth::user()->id)->first();
        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();





              ?>

                    @include('flash_message')
                    <div class="">
                        <div class="d-flex justify-content-between">
                        <h4>{{ trans('fd_one_step_one.f_form')}} </h4>
                        <?php
                    $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
?>
<div>
                        @if($ngoTypeInfo == 'দেশিও')

                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}" id="downloadButton">
                            <i class="fa fa-print"></i>
                        </button>

                        @else
                        <input type="hidden" data-parsley-required  name="{{ trans('mview.place')}}" value="{{ $allformOneData->place }}"  class="form-control" id="mainPlace" placeholder="{{ trans('mview.place')}}">
                        <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="mainId">
                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}" id="downloadButton345">
                            <i class="fa fa-print"></i>
                        </button>
                        @endif


                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdOneFormEdit') }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('fd_one_step_four.fd_update')}}"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.one')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_one.Particulars_of_Organisation')}} :</td>
                                </tr>






                                <tr>
                                    <td></td>
                                    <td>(i)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_Name_Organization_address')}}</td>
                                    <td>: {{ $allformOneData->organization_name_ban }}</td>
                                </tr>

{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td>(ii)</td>--}}
{{--                                    <td>{{ trans('fd_one_step_one.district') }}</td>--}}
{{--                                    <td>: {{ $allformOneData->district_name }}</td>--}}
{{--                                </tr>--}}

                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.bivag') }}</td>
                                    <td>: {{$allformOneData->division_name}}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.district') }}</td>
                                    <td>: {{$allformOneData->district_name}}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.sub_district') }}</td>
                                    <td>: {{$allformOneData->upozila_name}}</td>
                                </tr>


                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_address')}}</td>
                                    <td>: {{ $allformOneData->organization_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iii)</td>
                                    <td>{{ trans('fd_one_step_one.reg_num')}}</td>.

                                    <td>:

{{--                                        @if($allformOneData->registration_number == 0)--}}

{{--                                        @else--}}

{{--                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))--}}

{{--                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->registration_number) }}--}}
{{--                                        @else--}}

                                        {{ $allformOneData->registration_number }}
{{--                                        @endif--}}
{{--                                        @endif--}}


                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iv)</td>
                                    <td>{{ trans('fd_one_step_one.Country_of_Origin')}}</td>
                                    <td>: {{ $allformOneData->country_of_origin }}</td>
                                </tr>

                                <?php
                                $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                 ?>
                                 @if($getngoForLanguage =='দেশিও')
                                <tr>
                                    <td></td>
                                    <td>(v)</td>
                                    <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                                    <td>: {{ $allformOneData->address_of_head_office }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td></td>
                                    <td>(v)</td>
                                    <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                                    <td>: {{ $allformOneData->address_of_head_office_eng }}</td>
                                </tr>

                                @endif

                                <tr>
                                    <td></td>
                                    <td>(vi)</td>
                                    <td>{{ trans('fd_one_step_one.hh')}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_one.name')}}</td>
                                    <td>: {{ $allformOneData->name_of_head_in_bd }}</td>
                                </tr>

                                   <?php
                                  $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                  if($getngoForLanguage =='দেশিও'){

                                    if($allformOneData->job_type == 'Full-Time'){

                                      $getJobType = 'পূর্ণকালীন';
                                    }else{
                                    $getJobType = 'খণ্ডকালীন';
                                    }

                                  }else{
                                   $getJobType =$allformOneData->job_type;
                                  }

                                  ?>


                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
                                    <td>: {{ $getJobType }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Address_Mobile_Number_Email')}}</td>
                                    <td>: {{ $allformOneData->address }},
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->tele_phone_number.', '.$allformOneData->phone) }},
                                            @else
                                            {{ $allformOneData->tele_phone_number.', '.$allformOneData->phone }},
                                            @endif
                                        {{ $allformOneData->email }}</td>
                                </tr>
                                 <?php
                                    if($getngoForLanguage =='দেশিও'){
                                    $getCityzendata = $allformOneData->citizenship;
                                    }else{

                                    $getCityzendata = $allformOneData->citizenship;
                                    }



                                  ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
                                    <td>: {{ $getCityzendata }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Profession')}}</td>
                                    <td>: {{ $allformOneData->profession }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.two')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_two.Field_of_proposed_activities')}} ({{ trans('fd_one_step_two.des')}}):
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}</td>
                                    <td>(i) {{ trans('fd_one_step_two.Plan_of_Operation')}} </td>
                                    <td>: @if(empty($allformOneData->plan_of_operation))

                                        @else


                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('planOfOperation',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('planOfOperation',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.pp')}}</td>
                                    <td>: {{ !empty($selectedDistrict) ? $selectedDistrict['getDistrict'] : null }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}</td>
                                    <td>{{ trans('fd_one_step_two.Source_of_Fund')}}</td>
                                    <td></td>
                                </tr>
                                @foreach($get_all_source_of_fund_data as $all_get_all_source_of_fund_data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(i) {{ trans('fd_one_step_two.dd')}}</td>
                                    <td>: {{ $all_get_all_source_of_fund_data->name }}, {{ $all_get_all_source_of_fund_data->address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.copy')}}</td>
                                    <td>: @if(empty($all_get_all_source_of_fund_data->letter_file))

                                        @else

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('sourceOfFundDocDownload',base64_encode($all_get_all_source_of_fund_data->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('sourceOfFundDocDownload',base64_encode($all_get_all_source_of_fund_data->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.three')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_two.money')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->annual_budget) }}


                                        @else

                                        {{ $allformOneData->annual_budget }}

                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.four')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_three.staff_position')}}
                                    </td>
                                </tr>
                                @foreach($formOneMemberList as $key=>$allFormOneMemberList)
                                <tr>

                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td></td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                    <td>কর্মকর্তা {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1}}.</td>
                                    <td>Staff {{$key+1 }}</td>
                                    <td></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_three.name')}}</td>
                                    <td>: {{ $allFormOneMemberList->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_three.desi')}}</td>
                                    <td>: {{ $allFormOneMemberList->position }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_three.address')}}</td>
                                    <td>: {{ $allFormOneMemberList->address }}</td>
                                </tr>
                                <tr>
                                  <?php

                                  $convetArray = explode(",",$allFormOneMemberList->citizenship);


                                    if($getngoForLanguage =='দেশিও'){
                                    $getCityzendata = DB::table('countries')->whereIn('country_people_bangla',$convetArray)->get();
                                    }else{

                                    $getCityzendata = $allFormOneMemberList->citizenship;
                                    }
                                  //dd($getCityzendata);
                                  ?>

                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_three.citizenship')}}</td>
                                    <td>:
                                        @if($getngoForLanguage =='দেশিও')
                                      @foreach($getCityzendata as $all_getCityzendata)
                                      @if(count($getCityzendata) == 1)
                                      {{$all_getCityzendata->country_people_bangla}}
                                      @else
                                      {{$all_getCityzendata->country_people_bangla}},
                                      @endif
                                      @endforeach
                                      @else
                                      {{ $allFormOneMemberList->citizenship }}
                                      @endif

                                  </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_three.date_of_joining')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($allFormOneMemberList->date_of_join))) }}


                                        @else
                                        {{ date('d-m-Y', strtotime($allFormOneMemberList->date_of_join)) }}

                                        @endif


                                    </td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.f') }})</td>
                                    <td>{{ trans('fd_one_step_three.dob') }}</td>
                                    <td>: {{ $allFormOneMemberList->dob}}</td>
                                </tr>
                                @if($mainNgoType == "দেশিও")
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.g') }})</td>
                                    <td>{{ trans('fd_one_step_three.nid_number') }}</td>
                                    <td>: {{ $allFormOneMemberList->nid_number }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.h') }})</td>
                                    <td>{{ trans('fd_one_step_three.nid_copy') }}</td>

                                    <td>:
                                        @if(!empty($allFormOneMemberList->nid_copy))
                                            <a target="_blank"
                                               href="{{ asset('public/' . $allFormOneMemberList->nid_copy) }}"
                                               class="btn btn-outline-success mb-2">
                                                <i class="fa fa-file-pdf-o"></i>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    দেখুন
                                                @else
                                                    Open
                                                @endif
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @else

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.i') }})</td>
                                    <td>{{ trans('fd_one_step_three.passport_number') }}</td>
                                    <td>: {{ $allFormOneMemberList->passport_number}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{trans('form 8_bn.j')}})</td>
                                    <td>{{ trans('fd_one_step_three.passport_attachment') }}</td>
                                    <td>:
                                        @if(!empty($allFormOneMemberList->passport_attachment))
                                            <a target="_blank"
                                               href="{{ asset('public/' . $allFormOneMemberList->passport_attachment) }}"
                                               class="btn btn-outline-success mb-2">
                                                <i class="fa fa-file-pdf-o"></i>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    দেখুন
                                                @else
                                                    open
                                                @endif
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                @endif

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.i') }})</td>
                                    <td>{{ trans('fd_one_step_three.passport_photo') }}</td>

                                    <td>:
                                        @if(!empty($allFormOneMemberList->passport_photo))
                                            <a target="_blank"
                                               href="{{ asset('public/' . $allFormOneMemberList->passport_photo) }}"
                                               class="btn btn-outline-success mb-2">
                                                <i class="fa fa-file-pdf-o"></i>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    দেখুন
                                                @else
                                                    Open
                                                @endif
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.j')}})</td>
                                    <td>{{ trans('fd_one_step_three.s_statement')}}</td>
                                    <td>: {{ $allFormOneMemberList->salary_statement }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.k')}})</td>
                                    <td>{{ trans('fd_one_step_three.detail')}}</td>
                                    <td>: {{ $allFormOneMemberList->other_occupation }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td>{{ trans('fd_one_step_one.five')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt1')}}
                                    </td>
                                    <td>:
                                        @if(empty($allformOneData->attach_the__supporting_paper))

                                        @else

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('attachTheSupportingPaper',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('attachTheSupportingPaper',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.six')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.tt')}}
                                    </td>
                                </tr>
                                @foreach($get_all_data_adviser as $key=>$all_get_all_data_adviser)
                                <tr>
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td></td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                    <td>পরামর্শক {{ App\Http\Controllers\NGO\CommonController::englishToBangla( $key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1 }}.</td>
                                    <td>Adviser {{ $key+1 }}</td>
                                    <td></td>

                                    @endif
                                </tr>


                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.advisor_name')}}</td>
                                    <td>:{{ $all_get_all_data_adviser->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.tt2')}}</td>
                                    <td>: {{ $all_get_all_data_adviser->information	 }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.seven')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.main_account_details')}}({{ trans('fd_one_step_four.tt3')}})
                                    </td>
                                </tr>

                                @if(!$get_all_data_adviser_bank)


                                @else
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_number')}}</td>
                                    <td>:
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        {{App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_adviser_bank->account_number)}}
                                        @else
                                        {{ $get_all_data_adviser_bank->account_number }}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_type')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_four.name_of_bank')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_four.bank_address')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>{{ trans('fd_one_step_one.eight')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt4')}}
                                    </td>
                                    <td>:
@foreach($get_all_data_other as $all_get_all_data_other)

@if(empty($all_get_all_data_other->information_pdf))

@else

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

<a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($all_get_all_data_other->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

@else

<a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($all_get_all_data_other->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



@endif
@endif

                                        @endforeach


                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>





