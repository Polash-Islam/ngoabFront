
<?php


$oldNgoRegNumber = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');


$allformOneData = DB::table('fd_one_forms')
->where('user_id',Auth::user()->id)->first();
 $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
 $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();





       ?>

             @include('flash_message')
             <div>
                <div class="d-flex justify-content-between">
                 <h4>                     @if($localNgoTypem == 'Old')
                    {{ trans('fd_one_step_one.fd8')}}
                                            @else
                                         {{ trans('fd_one_step_one.fd_one_form_title')}}
                                            @endif</h4>

                    <div>

                        <?php
                 $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');



                                                      ?>
    @if($ngoTypeInfo == 'দেশিও')
    @if($localNgoTypem == 'Old')
    <input type="hidden" data-parsley-required  name="স্থান" value="0"  class="form-control" id="mainPlace" placeholder="স্থান">
    <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="mainId">
    <button class="btn  btn-success" id="downloadButtonNew" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}">
        <i class="fa fa-print"></i>
   </button>
    @else
    <button class="btn  btn-success" id="downloadButton" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}">
        <i class="fa fa-print"></i>
    </button>
    @endif

    @else

    <button class="btn  btn-success" id="downloadButtonNew" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}">
        <i class="fa fa-print"></i>
    </button>
    @endif

                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdOneFormEdit') }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('civil.update')}}"><i class="fa fa-edit"></i></button>

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
                             <td>: {{ $allformOneData->organization_name }},{{ $allformOneData->organization_address }}</td>
                         </tr>

                         <tr>
                             <td></td>
                             <td>(ii)</td>
                             <td>{{ trans('fd_one_step_one.reg_num')}}</td>
                             <td>:



                                 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                 {{ App\Http\Controllers\NGO\CommonController::englishToBangla($oldNgoRegNumber) }}
                                 @else

                                 {{ $oldNgoRegNumber}}
                                 @endif



                             </td>
                         </tr>


                         <?php
                         $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                          ?>
                          @if($getngoForLanguage =='দেশিও')
                         <tr>
                             <td></td>
                             <td>(iii)</td>
                             <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                             <td>: {{ $allformOneData->address_of_head_office }}</td>
                         </tr>
                         @else
                         <tr>
                             <td></td>
                             <td>(iii)</td>
                             <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                             <td>: {{ $allformOneData->address_of_head_office_eng }}</td>
                         </tr>

                         @endif

                         <tr>
                            <td></td>
                            <td></td>
                            <td>টেলিফোন নম্বর, মোবাইল নম্বর, ইমেইল এবং ওয়েব এড্রেস</td>
                            <td>:
                       {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->org_phone) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->org_mobile) }},
                       {{ $allformOneData->org_email }} এবং {{ $allformOneData->web_site_name }}
                            </td>
                        </tr>

                         <tr>
                             <td></td>
                             <td>(iv)</td>
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
    <td>{{ trans('form 8_bn.b')}}) জাতীয়তা</td>
    <td>: {{ $allformOneData->nationality }}</td>
</tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
                             <td>: {{ $getJobType }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Address')}},টেলিফোন নম্বর, {{ trans('fd_one_step_one.Mobile_Number')}}, {{ trans('fd_one_step_one.Email')}}</td>
                             <td>: {{ $allformOneData->address }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->tele_phone_number) }},
                                 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                 {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->phone) }},
                                 @else
                                 {{ $allformOneData->phone }},
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
                             <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
                             <td>: {{ $getCityzendata }}</td>
                         </tr>
                         {{-- <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.f')}}) {{ trans('fd_one_step_one.Profession')}}</td>
                             <td>: {{ $allformOneData->profession }}</td>
                         </tr> --}}
                         <tr>
                             <td>{{ trans('fd_one_step_one.two')}}.</td>
                             <td colspan="3">বিগত ১০(দশ ) বছরের বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথ্যাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে ):
                             </td>
                             <td>
                                @if(empty($allformOneData ->foregin_pdf))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'foregin_pdf', 'id' =>$allformOneData->id] )}}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif
                            </td>
                         </tr>

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
                             <td>{{ trans('fd_one_step_one.Citizenship')}}</td>
                             <td>:
                                 @if($getngoForLanguage =='দেশিও')
                               @foreach($getCityzendata as $all_getCityzendata)
                               {{$all_getCityzendata->country_people_bangla}},
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
                            <td>({{ trans('form 8_bn.f')}})</td>
                            <td>{{ trans('fd_one_step_three.s_statement')}}</td>
                            <td>: {{ $allFormOneMemberList->salary_statement }}</td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>({{ trans('form 8_bn.g')}})</td>
                            <td>মোবাইল নম্বর</td>
                            <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allFormOneMemberList->mobile) }}</td>
                        </tr>


                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.h')}})</td>
                             <td>ইমেইল</td>
                             <td>: {{ $allFormOneMemberList->email }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.i')}})</td>
                             <td>{{ trans('fd_one_step_three.detail')}}</td>
                             <td>: {{ $allFormOneMemberList->other_occupation }}</td>
                         </tr>
                         @endforeach

                         <tr>
                             <td>{{ trans('fd_one_step_one.five')}}.</td>
                             <td colspan="2">নিবন্ধন নবায়ন ফি এবং ভ্যাট প্রদান করা হয়েছে
                                কিনা (চালানের কপি সংযুক্ত করতে হবে
                                হবে)
                             </td>
                             <td>:
                                @if(empty($allformOneData->copy_of_chalan))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'copy_of_chalan', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif
                                </td>
                         </tr>
                         <tr>
                             <td>{{ trans('fd_one_step_one.six')}}.</td>
                             <td colspan="2">তফসিল-১ এ বর্ণিত যে কোনো ফি এর  ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কি না (চালানের অনুলিপি সংযুক্ত করতে হবে)
                             </td>
                             <td>:
                                @if(empty($allformOneData->due_vat_pdf))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'due_vat_pdf', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif

                            </td>
                         </tr>

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
                             <td colspan="2">ব্যাংক হিসাব নম্বর পরিবর্তন  হয়ে থাকলে , ব্যুরো থেকে অনুমোদন পত্রের কপি সংযুক্ত করতে হবে
                             </td>
                             <td>:

                                @if(empty($allformOneData->change_ac_number))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'change_ac_number', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif





                             </td>
                         </tr>
 <tr>
                            <td>{{ trans('fd_one_step_one.nine')}}.</td>
                            <td colspan="3">{{ trans('fd_one_step_four.tt4')}}
                            </td>

                        </tr>

                        @foreach($get_all_data_other as $key=>$allGetAllDataOther)


                         <tr>
                             <td></td>
                             <td>({{ trans('fd_one_step_one.nine')}}.{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }})</td>
                             <td>{{ $allGetAllDataOther->information_title }}</td>
                             <td>: @if(empty($allGetAllDataOther->information_pdf))

                                @else

                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                <a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($allGetAllDataOther->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i>দেখুন</a>

                                @else

                                <a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($allGetAllDataOther->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



                                @endif
                                @endif</td>
                         </tr>

                         @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>





