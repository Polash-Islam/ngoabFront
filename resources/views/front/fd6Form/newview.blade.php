@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(empty(Auth::user()->image))
                                {{-- <img src="{{ asset('/') }}public/demo_315x315.jpg" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @else
                                     {{-- <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a style="display: none;">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.view')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
                            </a>
                        </div>
                        {{-- <div class="profile_link_box">
                            <a href="{{ route('duplicateCertificate.index') }}">
                                <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
                            </a>
                        </div> --}}
                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-12">

                <div class="card">
                    <div class="card-body">
@include('flash_message')
                          <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd6pdfview',base64_encode($fd6FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>
                        @if($fd6FormList->status == 'Ongoing' || $fd6FormList->status == 'Accepted')

                                        @else



                        <button class="btn btn-primary" onclick="location.href = '{{ route('fd6Form.edit',base64_encode($fd6FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৬ ফরম </h3>
                            <h4>প্রকল্প প্রস্তাব ফরম</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">

                                    <!--FD06 Section 01-->

                                    <tr>
                                        <td rowspan="7" style="width:40px;">০১</td>
                                        <td style="width:40px;">ক)</td>
                                        <td style="width:30%">এনজিও'র নাম </td>
                                        <td>{{ $fd6FormList->ngo_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td>ব্যুরোর নিবন্ধন নং ও তারিখ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_registration_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_registration_date))) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td>সর্বশেষ নবায়ন ও মেয়াদ উত্তীর্ণের তারিখ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_last_renew_date))) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6FormList->ngo_expiration_date))) }} </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ঘ)</td>
                                        <td> ঠিকানা </td>
                                        <td>{{ $fd6FormList->ngo_address }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ঙ)</td>
                                        <td>টেলিফোন ও মোবাইল নম্বর </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_telephone_number) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_mobile_number) }} </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">চ)</td>
                                        <td> ইমেইল ঠিকানা </td>
                                        <td>{{ $fd6FormList->ngo_email_address }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ছ)</td>
                                        <td>ওয়েবসাইট </td>
                                        <td>{{$fd6FormList->ngo_website }}</td>
                                    </tr>

                                    <!--FD06 Section 02-->

                                    <tr>
                                        <td style="width:40px;">০২</td>
                                        <td colspan="2">প্রকল্পের নাম </td>
                                        <td>{{ $fd6FormList->ngo_prokolpo_name }}</td>
                                    </tr>

                                    <!--FD06 Section 03-->

                                    <tr>
                                        <td rowspan="4" style="width:40px;">০৩</td>
                                        <td colspan="2">প্রকল্পের মেয়াদ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_duration) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ক)</td>
                                        <td>শুরুর তারিখ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_start_date) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td>সমাপ্তির তারিখ </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_end_date) }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width:40px;">গ)</td>
                                        <td>প্রকল্পের ধরণ  </td>
                                        <td>

                                            <?php
                                            $subjectIdList  = explode(",",$fd6FormList->subject_id);
                                            $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                                            ->get();

                                            ?>
                                       @foreach($subjectListMain as $key=>$subjectListMains)

                                        @if(count($subjectListMain) == 1 )

                                        {{ $subjectListMains->name }}

                                        @else

                                        @if(count($subjectListMain) == ($key+1))
                                        {{ $subjectListMains->name }} |

                                        @else

                                        {{ $subjectListMains->name }},

                                        @endif

                                        @endif

                                        @endforeach

                                    </td>

                                    </tr>

                                    <!--FD06 Section 04-->

                                    <tr>
                                        <td rowspan="2" style="width:40px;">০৪</td>
                                        <td colspan="3">প্রকল্প এলাকা</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">



                                            <div class="table-responsive" id="tableAjaxDatapro">

                                                <table class="table table-bordered">

                                                    <tr>
                                                        <td style="width:60px;">ক্র:নং</td>
                                                        <td>বিভাগ</td>
                                                        <td>জেলা/সিটি কর্পোরেশন</td>
                                                        <td>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</td>
                                                        <td>প্রকল্পের ধরণ</td>
                                                        <td>বরাদ্দকৃত বাজেট</td>
                                                        <td>মোট উপকারভোগীর সংখ্যা</td>

                                                    </tr>
                                                    @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $prokolpoAreaListAll->division_name }}</td>
                                                        <td>
                                                            জেলা: {{ $prokolpoAreaListAll->district_name }} <br>


                                                        @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                        @else
                                                        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                                            @else
                                                            উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                                            @endif

                                                            থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                                            পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                                            ওয়ার্ড: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->ward_name) }}
                                                        </td>
                                                        <td>{{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}</td>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}</td>
                                                        <td>{{App\Http\Controllers\NGO\CommonController::englishToBangla( $prokolpoAreaListAll->number_of_beneficiaries) }}</td>

                                                    </tr>
                                                    @endforeach
                                                </table>

                                            </div>
                                        </td>
                                    </tr>
 <!--FD06 Section 05-->

 <tr>
    <td rowspan="9" style="width:40px;">০৫</td>
    <td colspan="3">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2">
        প্রাক্কলিক ব্যয় (টাকায়): {{ $fd6FormList->estimated_expenses }} </td>
</tr>
<tr>
    <td colspan="4">

        <div id="tableAjaxDataexp">
            <table class="table table-bordered">



                <tr>
                    <th rowspan="3" >অর্থের উৎসের বিবরণ:</th>
                    <th>১ম বছর  <div class="d-flex justify-content-between">
            
                       
            
                    </div></th>
                    <th>২য় বছর  <div class="d-flex justify-content-between">
            
                       
            
                    </div></th>
                    <th>৩য় বছর  <div class="d-flex justify-content-between">
            
                       
            
                    </div></th>
                    <th>৪র্থ বছর <div class="d-flex justify-content-between">
            
                        
            
            
                    </div></th>
                    <th>৫ম বছর <div class="d-flex justify-content-between">
            
                       
                    </div></th>
                    <th rowspan="3">মোট</th>
                    <th rowspan="3">মন্তব্য</th>
            
                </tr>
                <tr style="text-align: center;">
                   
                        <th>
                
                            @if(!$fd6FormEstimateListFirst)
                
                            @else
                            
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFirst->prokolpo_year_grant_end_date))) }}
                        @endif
                        </th>
                        <th>
                
                            @if(!$fd6FormEstimateListSecond)
                
                            @else
                            
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListSecond->prokolpo_year_grant_end_date))) }}
                        @endif
                        </th>
                        <th>
                            @if(!$fd6FormEstimateListThird)
                
                            @else
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListThird->prokolpo_year_grant_end_date))) }}
                        @endif
                        </th>
                        <th>
                            @if(!$fd6FormEstimateListFourth)
                
                            @else
                            
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFourth->prokolpo_year_grant_end_date))) }}
                        @endif
                        
                        </th>
                   
                
                    
                    <th>
            
                        @if(!$fd6FormEstimateListFifth)
                
                            @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_start_date)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormEstimateListFifth->prokolpo_year_grant_end_date))) }}
                    @endif
                    
                    </th>
                </tr>
                <tr style="text-align: center;">
            
                </tr>
                <tr>
                    <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
                        টাকায় পরিবর্তিত)
                    </td>
                    <td>
                        @if(!$fd6FormEstimateListFirst)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grants_received_from_abroad) }}
                    @endif
                    
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListSecond)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->grants_received_from_abroad) }}
                    @endif
                    </td>
            
                    <td>
            
                        @if(!$fd6FormEstimateListThird)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->grants_received_from_abroad) }}
                    @endif
                    </td>
            
                    <td>
            
                        @if(!$fd6FormEstimateListFourth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->grants_received_from_abroad) }}
                    @endif
                    </td>
            
                    <td>
            
                        @if(!$fd6FormEstimateListFifth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->grants_received_from_abroad) }}
                    @endif
                    </td>
            
                    <td>
            
                        <?php
            
                        if(!$fd6FormEstimateListFirst){
                        $getTheVlueFlfdl = 0;
                    }else{
            
                        $getTheVlueFlfdl = $fd6FormEstimateListFirst->grants_received_from_abroad;
            
                    }
            
            
                        if(!$fd6FormEstimateListSecond){
                        $getTheVlueSelfdl = 0;
                    }else{
                        $getTheVlueSelfdl = $fd6FormEstimateListSecond->grants_received_from_abroad;
                     }
            
                     if(!$fd6FormEstimateListThird){
                        $getTheVlueThlfdl = 0;
                    }else{
                        $getTheVlueThlfdl = $fd6FormEstimateListThird->grants_received_from_abroad;
                     }
            
                     if(!$fd6FormEstimateListFourth){
                        $getTheVlueFolfdl = 0;
                    }else{
                        $getTheVlueFolfdl = $fd6FormEstimateListFourth->grants_received_from_abroad;
                     }
            
            
                     if(!$fd6FormEstimateListFifth){
                        $getTheVlueFiflfdl = 0;
                    }else{
                        $getTheVlueFiflfdl = $fd6FormEstimateListFifth->grants_received_from_abroad;
                     }
            
                        ?>
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFiflfdl+$getTheVlueFolfdl+$getTheVlueFlfdl + $getTheVlueSelfdl + $getTheVlueThlfdl) }}
                    
                    </td>
                    <td rowspan="3">
            {{$fd6FormEstimateListComment}}
                       
                    
                    </td>
                    
                </tr>
                <tr>
                    <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
                        অনুদান
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFirst)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->donations_made_by_foreign_donors) }}
                    @endif
                    
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListSecond)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->donations_made_by_foreign_donors) }}
                    
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListThird)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->donations_made_by_foreign_donors) }}
                    
                        @endif
                    </td>
            
                    <td>
            
                        @if(!$fd6FormEstimateListFourth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->donations_made_by_foreign_donors) }}
                    
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFifth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->donations_made_by_foreign_donors) }}
                    
                        @endif
                    </td>
                    <td>
            <?php
                        if(!$fd6FormEstimateListFirst){
                        $getTheVlueFlfd =0;
                    }else{
            
                     $getTheVlueFlfd = $fd6FormEstimateListFirst->donations_made_by_foreign_donors;
            
                    }
            
            
                        if(!$fd6FormEstimateListSecond){
                        $getTheVlueSelfd = 0;
                    }else{
                      $getTheVlueSelfd = $fd6FormEstimateListSecond->donations_made_by_foreign_donors;
                    }
            
            
                    if(!$fd6FormEstimateListThird){
                        $getTheVlueThlfd = 0;
                    }else{
                      $getTheVlueThlfd = $fd6FormEstimateListThird->donations_made_by_foreign_donors;
                    }
            
            
                    if(!$fd6FormEstimateListFourth){
                        $getTheVlueFolfd = 0;
                    }else{
                      $getTheVlueFolfd = $fd6FormEstimateListFourth->donations_made_by_foreign_donors;
                    }
            
            
                    if(!$fd6FormEstimateListFifth){
                        $getTheVlueFiflfd = 0;
                    }else{
                      $getTheVlueFiflfd = $fd6FormEstimateListFifth->donations_made_by_foreign_donors;
                    }
                        ?>
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFiflfd + $getTheVlueFolfd + $getTheVlueFlfd + $getTheVlueSelfd + $getTheVlueThlfd) }}
                    
                    
                    </td>
                    
                </tr>
                <tr>
                    <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
                        ও প্রমাণকসহ)
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFirst)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->local_grants) }}
                    @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListSecond)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->local_grants) }}
                      
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListThird)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->local_grants) }}
                      
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFourth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->local_grants) }}
                      
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFifth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->local_grants) }}
                      
                        @endif
                    </td>
                    <td>
            
                        <?php
            
                        if(!$fd6FormEstimateListFirst){
                       $getTheVlueFl =0;
                    }else{
            
                    $getTheVlueFl = $fd6FormEstimateListFirst->local_grants;
            
                     }
            
            
                        if(!$fd6FormEstimateListSecond){
                       $getTheVlueSel = 0;
                    }else{
                        $getTheVlueSel = $fd6FormEstimateListSecond->local_grants;
                    }
            
                    if(!$fd6FormEstimateListThird){
                       $getTheVlueThl = 0;
                    }else{
                        $getTheVlueThl = $fd6FormEstimateListThird->local_grants;
                    }
            
            
                    if(!$fd6FormEstimateListFourth){
                       $getTheVlueFol = 0;
                    }else{
                        $getTheVlueFol = $fd6FormEstimateListFourth->local_grants;
                    }
            
            
                    if(!$fd6FormEstimateListFifth){
                       $getTheVlueFifl = 0;
                    }else{
                        $getTheVlueFifl = $fd6FormEstimateListFifth->local_grants;
                    }
                        ?>
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFifl+$getTheVlueFol+$getTheVlueFl + $getTheVlueSel + $getTheVlueThl) }}
                    
                    </td>
                    
                </tr>
                <tr>
                    <td>মোট</td>
                    <td>
            
                        @if(!$fd6FormEstimateListFirst)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFirst->grant_total) }}
                    
                        @endif
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListSecond)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListSecond->grant_total) }}
                    
                        @endif
                    
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListThird)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListThird->grant_total) }}
                    
                        @endif
                    
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFourth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFourth->grant_total) }}
                    
                        @endif
                    
                    </td>
                    <td>
            
                        @if(!$fd6FormEstimateListFifth)
            
                        @else
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormEstimateListFifth->grant_total) }}
                    
                        @endif
                    
                    </td>
                    <td>
            
                        <?php
            
                        if(!$fd6FormEstimateListFirst){
                        $getTheVlueF =0;
                    }else{
                        $getTheVlueF = $fd6FormEstimateListFirst->grant_total;
            
                    }
            
            
                        if(!$fd6FormEstimateListSecond){
                        $getTheVlueSe = 0;
                    }else{
                        $getTheVlueSe = $fd6FormEstimateListSecond->grant_total;
                    }
            
            
                    if(!$fd6FormEstimateListThird){
                        $getTheVlueTh = 0;
                    }else{
                        $getTheVlueTh = $fd6FormEstimateListThird->grant_total;
                    }
            
            
                    if(!$fd6FormEstimateListFourth){
                        $getTheVlueFo = 0;
                    }else{
                        $getTheVlueFo = $fd6FormEstimateListFourth->grant_total;
                    }
            
                    if(!$fd6FormEstimateListFifth){
                        $getTheVlueFif = 0;
                    }else{
                        $getTheVlueFif = $fd6FormEstimateListFifth->grant_total;
                    }
                        ?>
                        
                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($getTheVlueFif+$getTheVlueFo + $getTheVlueF + $getTheVlueSe +$getTheVlueTh) }}
                    
                    
                    </td>
                
                </tr>



            </table>


        <div>



               @if(empty($fd6FormList->estimated_expenses_file))


               @else


               <a href="{{ route('allPdfForFd6',['title'=>'estimated_expenses_file','id'=>$fd6FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
    </td>
</tr>
<tr>
    <td rowspan="6" style="width:40px;">খ)</td>
    <td style="width: 25%;">১. দাতা সংস্থার নাম</td>
    <td>{{ $fd6FormList->donor_organization_name }}</td>
</tr>
<tr>
    <td>২. দাতা সংস্থার ঠিকানা</td>
    <td>{{ $fd6FormList->donor_organization_address }}</td>
</tr>
<tr>
    <td> ৩. ফোন/মোবাইল/ইমেইল নম্বর</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donor_organization_phone_mobile_email) }} <br>
        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donor_organization_mobile) }} <br>
        {{ $fd6FormList->donor_organization_email }}
    </td>
</tr>
<tr>
    <td> ৪. ওয়েবসাইট</td>
    <td>{{ $fd6FormList->donor_organization_website }}</td>
</tr>
<tr>
    <td> ৫. মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
    <td>{{ $fd6FormList->money_laundering_and_terrorist_financing }}</td>
</tr>
<tr>
    <td> United Nations Security Council Resolution
        (UNSCR) কর্তৃক প্রকাশিত তালিকার সাথে দাতা
        সংস্থার/ব্যক্তির তথ্য যাচাই করা হয়েছে কিনা/কোন
        সংশ্লিষ্টতারয়েছে কিনা:
    </td>
    <td>{{$fd6FormList->security_council_check}}
    </td>
</tr>

<!--FD06 Section 06-->

<tr>
    <td rowspan="11" style="width:40px;">০৬</td>
    <td colspan="3">বিস্তারিত প্রকল্প:</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td>ভূমিকা এবং পটভূমি (সংশ্লিষ্ট এলাকায় প্রকল্প কার্যক্রম সংক্রান্ত
        বিরাজমান অবস্থা তথ্য/উপাত্তসহ উল্লেখপূর্বক প্রস্তাবিত প্রকল্পটি
        সংক্ষেপে অবতারণা করতে হবে। প্রকল্পটি প্রণয়নকালে কিভাবে
        কমিউনিটিকে সম্পৃক্ত করা হয়েছে তা উল্লেখ করতে হবে):
    </td>
    <td>{{ $fd6FormList->introduction_and_background }}</td>
</tr>
<tr>
    <td rowspan="4" style="width:40px;">খ)</td>
    <td>(১) প্রকল্পটি যৌক্তিকতা এবং জাতীয় পরিকল্পনার সাথে
        প্রাসঙ্গিকতা:
    </td>
    <td>{{ $fd6FormList->rationality_and_plan }}</td>
</tr>
<tr>
    <td>(২) প্রকল্প এলাকা নির্ধারণের যৌক্তিকতা:</td>
    <td>{{ $fd6FormList->rationale_project_araea }}</td>
</tr>
<tr>
    <td colspan="3">(৩) টেকসই উন্নয়ন অভীষ্টের (এসডিজি) সাথে
        সম্পৃক্ততা:
    </td>
</tr>
<tr>
    <td colspan="3">

        <div class="table-responsive" id="tableAjaxDataSDG">

            <table class="table table-bordered">
                <tr style="text-align: center">
                    <th>অভিষ্ঠ(Goal)</th>
                    <th>লক্ষ্যমাত্রা(Target)</th>
                    <th>নির্দেশক(Indicator)</th>
                    <th>বাজেট বরাদ্দ </th>
                    <th>যৌক্তিকতা </th>
                    <th>মন্তব্য</th>

                </tr>
            @foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
                <tr>
                    <td>{{ DB::table('goals')->where('id',$SDGDevelopmentGoals->goal)->value('description') }}</td>
        <td>{{ DB::table('targets')->where('id',$SDGDevelopmentGoals->target)->value('description')  }}</td>
        <td>{{ DB::table('indicators')->where('id',$SDGDevelopmentGoals->indicator)->value('description')  }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($SDGDevelopmentGoals->budget_allocation) }}</td>
                    <td>{{ $SDGDevelopmentGoals->rationality }}</td>
                    <td>{{ $SDGDevelopmentGoals->comment }}</td>

                </tr>
                @endforeach


            </table>
                </div>



               @if(empty($fd6FormList->sdg_file))


               @else


               <a href="{{ route('allPdfForFd6',['title'=>'sdg_file','id'=>$fd6FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
    </td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td>উদ্দেশ্যসমূহ
    </td>
    <td>{{ $fd6FormList->sdg_objective_file }}</td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2"> সুনির্দিষ্ট, পরিমাপযোগ্য, অর্জনযোগ্য, যথার্থতা ও
        সময়োবদ্ধতার দৃষ্টিকোণ থেকে লক্ষ্যমাত্রা :
        <br>
        <small> (প্রকল্পের লক্ষমাত্রা বছর ভিত্তিক দেখাতে হবে)</small>
    </td>
</tr>
<tr>
    <td colspan="3">

        <div class="table-responsive" id="tableAjaxDataTarget">
            <table class="table table-bordered">
                <tr>
                    <th rowspan="2">ক্রমিক নং</th>
                    <th rowspan="2">কার্যক্রমের নাম</th>
                    <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
                    <th rowspan="2">অর্জনযোগ্য(%)</th>
                    <th rowspan="2">উপকারভোগীর সংখ্যা</th>
                    <th rowspan="2">মন্তব্য (যদি থাকে)</th>

                </tr>
                <tr>
                    <th>বছর</th>
                    <th>বাস্তব</th>
                    <th>আর্থিক</th>
                </tr>
                <?php

                $totalBeni = 0;

                ?>
                @foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
                <?php

            $totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
                ?>
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->target_year) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_real) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_financial) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_real) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->total_benificiari) }}</td>
                    <td>{{ $fd2AllFormLastYearDetails->comment }}</td>

                </tr>
                @endforeach
                <tr>
                    <td colspan="6">মোট উপকারভোগীর সংখ্যা-</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBeni) }}</td>
                </tr>
            </table>



        </div>



               @if(empty($fd6FormList->target_from_perspective_file))


               @else


               <a href="{{ route('allPdfForFd6',['title'=>'target_from_perspective_file','id'=>$fd6FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif

    </td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> প্রত্যাশিত ফলাফল (প্রত্যেক ফলাফল গুনবাচক,
        সংখ্যাবাচক এবং সময়ের (QQT) ভিত্তিতে নির্দিষ্ট করতে হবে) :
    </td>
</tr>
<tr>
    <td colspan="3">


        <div class="table-responsive" id="tableAjaxDataResult">
            <table class="table table-bordered">
                <tr>
                    <th>গুনবাচক</th>
                    <th>সংখ্যা বাচক</th>
                    <th>সময়কাল</th>

                </tr>
                @foreach($expectedResultDetail as $expectedResultDetails)
                <tr>
                    <td>{{ $expectedResultDetails->multiplicative }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expectedResultDetails->number_reader) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expectedResultDetails->duration) }}</td>

                </tr>
                @endforeach
            </table>

            </div>




               @if(empty($fd6FormList->expected_result_file))


               @else
               <a href="{{ route('allPdfForFd6',['title'=>'expected_result_file','id'=>$fd6FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
<br>

        <small>*(উপরে বর্ণিত ফলাফলের ভিত্তিতে প্রতিটি প্রধান কার্যক্রম
            বর্ণনা করতে হবে। যে কার্যক্রম উপরে বর্ণিত ফলাফল অর্জনে সহায়ক
            নয়, সে কার্যক্রম গ্রহণযোগ্য হবে না। উপকারভোগীর সংখ্যা
            প্রত্যেক্ষ হতে হবেম, পরোক্ষ নয়)।</small>
    </td>
</tr>

<!--FD06 Section 07-->

<tr>
    <td rowspan="2" style="width:40px;">০৭</td>
    <td colspan="3">জেলাওয়ারী বিস্তারিত কর্মকান্ড (যতগুলো জেলায়
        কর্মকান্ড বাস্তবায়িত হবে একই ছক ব্যবহার করে প্রত্যেক জেলার তথ্য
        পর পর প্রদান করতে হবে) :
    </td>
</tr>
<tr>
    <td colspan="3">

        <div id="tableAjaxDataDis">
            <table class="table table-bordered">
                <tr>
                    <th rowspan="2">ত্রু : নং</th>
                    <th rowspan="2">জেলা/সিটি/ পৌর-কর্পোরেশন</th>
                    <th rowspan="2">উপজেলা/ থানা/ ওয়ার্ড</th>
                    <th rowspan="2">কার্যক্রম সমূহ</th>
                    <th rowspan="2">প্রকল্প সময়</th>
                    <th colspan="3">লক্ষমাত্রা (বছর ভিত্তিক)</th>
                    <th rowspan="2">মোট বাজেট</th>
                    <th rowspan="2">মন্তব্য (যেখানে প্রযোজ্য)</th>

                </tr>
                <tr>
                    <th>বছর</th>
                    <th>বাস্তব</th>
                    <th>আর্থিক</th>
                </tr>
                @foreach($districtWiseList as $key=>$districtWiseLists)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><span>
                        জেলা: {{ $districtWiseLists->district_name }}
                        <br>

                        @if($districtWiseLists->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                        @else
                        সিটি কর্পোরেশন: {{ $districtWiseLists->city_corparation_name }}
                        <br>
                        @endif

                        @if(empty($districtWiseLists->city_corparation_name))

                        @else
                        পৌরসভা: {{ $districtWiseLists->municipality_name }} <br>
                        <br>
                        @endif

                    </td>
                    <td>
                        @if($districtWiseLists->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                        @else
                        উপজেলা: {{ $districtWiseLists->upozila_name }} <br>
                        @endif

                        থানা: {{ $districtWiseLists->thana_name }} <br>

                        ওয়ার্ড: {{ $districtWiseLists->ward_name }}

                    </td>
                    <td>{{ $districtWiseLists->activities }}</td>

                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->prokolpo_time) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->target_year) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->last_year_target_real) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->last_year_target_financial) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($districtWiseLists->total_budget) }}</td>
                    <td>{{ $districtWiseLists->comment }}</td>

                </tr>
                @endforeach
            </table>

        </div>




               @if(empty($fd6FormList->district_wise_activity_file))


               @else

               <a href="{{ route('allPdfForFd6',['title'=>'district_wise_activity_file','id'=>$fd6FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif

    </td>
</tr>

@if(!$fd6ProjectManagement)
<tr>
    <td rowspan="7" style="width:40px;">০৮</td>
    <td colspan="3">প্রকল্প ব্যবস্থাপনা :</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td style="width:30%"> প্রত্যেক প্রধান কার্যক্রম বাস্তবায়ন পদ্ধতি
        সংক্ষেপে বর্ণনা করতে হবে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td style="width:30%">প্রকল্পটি সহযোগী এনজিও বা সংস্থার মাদ্ধমে
        বাস্তবায়িত হবে কিনা, হলে সংলগ্নি - ''ক'' মোতাবেক প্রত্যেক সহযোগী
        এনজিওর তথ্য দিতে হবে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td style="width:30%"> সংলগ্নি ''খ '' -তে প্রকল্পের কর্মকর্তা/
        কর্মচারীদের বিস্তারিত বিবরণ (দেশি ও বিদেশী উভয়ের জন্য প্রযোজ্য )
        দাখিল করতে হবে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td style="width:30%"> নির্মাণ সংক্রান্ত বিস্তারিত তথ্য সংলগ্নি ''ঘ
        '' - তে প্রদান করতে হবে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td style="width:30%"> আর্থিক খাত/ উপখাত ভিত্তিক বরাদ্দ সংলগ্নি
        ''ঘ''-তে প্রদান করতে হবে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;"> চ)</td>
    <td style="width:30%"> প্রকল্পটি সমাপ্তির পর প্রকল্পটি কিভাবে টিকিয়া
        থাকবে ও পরিচালিত হবে তা উল্লেখ করতে হবে।
    </td>
    <td></td>
</tr>

@else
                                    <tr>
                                        <td rowspan="7" style="width:40px;">০৮</td>
                                        <td colspan="3">প্রকল্প ব্যবস্থাপনা :</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ক)</td>
                                        <td style="width:30%"> প্রত্যেক প্রধান কার্যক্রম বাস্তবায়ন পদ্ধতি
                                            সংক্ষেপে বর্ণনা করতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->implementation_of_activities }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td style="width:30%">প্রকল্পটি সহযোগী এনজিও বা সংস্থার মাদ্ধমে
                                            বাস্তবায়িত হবে কিনা, হলে সংলগ্নি - ''ক'' মোতাবেক প্রত্যেক সহযোগী
                                            এনজিওর তথ্য দিতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->associate_NGO_detail }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">গ)</td>
                                        <td style="width:30%"> সংলগ্নি ''খ '' -তে প্রকল্পের কর্মকর্তা/
                                            কর্মচারীদের বিস্তারিত বিবরণ (দেশি ও বিদেশী উভয়ের জন্য প্রযোজ্য )
                                            দাখিল করতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->details_of_project_Officers_and_employees }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ঘ)</td>
                                        <td style="width:30%"> নির্মাণ সংক্রান্ত বিস্তারিত তথ্য সংলগ্নি ''ঘ
                                            '' - তে প্রদান করতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->construction_details }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ঙ)</td>
                                        <td style="width:30%"> আর্থিক খাত/ উপখাত ভিত্তিক বরাদ্দ সংলগ্নি
                                            ''ঘ''-তে প্রদান করতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> চ)</td>
                                        <td style="width:30%"> প্রকল্পটি সমাপ্তির পর প্রকল্পটি কিভাবে টিকিয়া
                                            থাকবে ও পরিচালিত হবে তা উল্লেখ করতে হবে।
                                        </td>
                                        <td>{{ $fd6ProjectManagement->project_sustained_and_managed }}</td>
                                    </tr>
                                    @endif

                                    <!--FD06 Section 09-->
@if(!$fd6GovernanceAndTransparency)
<tr>
    <td rowspan="9" style="width:40px;">০৯</td>
    <td colspan="3"> সুশাসন ও স্বচ্ছতা :</td>
</tr>
<tr>
    <td style="width:40px;">ক)</td>
    <td style="width:30%"> প্রকল্পটি এলাকার জনগণ এবং সংশ্লিষ্ট সরকারি ও
        বেসরকারি ব্যক্তিবর্গের সাথে পরামর্শক্রমে কিংবা মাঠ জরিপের
        মাধ্যমে প্রণয়ন করা হয়েছে কিনা, হলে সংক্ষিপ্ত বর্ণনা (প্রমাণক)
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td style="width:30%">অন্যান্য এনজিও এবং সরকারি চলমান কর্মকান্ড (যদি
        থাকে) বিবেচনান্তে কাজ ও কর্ম - এলাকার দৈত্বতা এড়ানোর কি কি
        ব্যবস্থা গৃহীত হয়েছে।
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td style="width:30%"> এ প্রকল্পটি বা একই ধরণের প্রকল্প ইতোপূর্বে
        দাখিল করা হয়েছিল কি না সরকার কর্তৃক তা অনুমোদিত বা পরবর্তীতে
        বাতিল করা হয়েছিল কি না:
    </td>
    <td></td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">ঘ)</td>
    <td colspan="2" style="width:30%"> সংস্থা স্বেচ্ছায় বা তথ্য অধিকার
        আইনের কারণে নিম্নবর্তীত তথ্যাবলী জনসম্মুখে প্রকাশ করতে ইচ্ছুক
        কিনা (ডিসক্লোজার পলিসি ):
    </td>
</tr>
<tr>
    <td colspan="3">
        <table class="table table-bordered">
            <tr>
                <td>ত্রু নং</td>
                <td>তথ্যাবলী</td>
                <td>হ্যা/না</td>

            </tr>
            <tr>
                <td>০১</td>
                <td>প্রকল্প ছক ৮ নং ফরমে</td>
                <td>
                </td>

            </tr>
            <tr>
                <td>০২</td>
                <td>নিরীক্ষা প্রতিবেদন</td>
                <td>
                </td>

            </tr>
            <tr>
                <td>০৩</td>
                <td>বার্ষিক প্রতিবেদন</td>
                <td></td>

            </tr>
            <tr>
                <td>০৪</td>
                <td>প্রত্যেক কর্ম- এলাকার বাজেটসহ কর্মপরিকল্পনা</td>
                <td></td>

            </tr>
            <tr>
                <td>০৫</td>
                <td>উপকারভোগীদের ডাটাবেইজ</td>
                <td></td>

            </tr>
            <tr>
                <td>০৬</td>
                <td>প্রকল্পের বিস্তারিত ফলাফল</td>
                <td></td>

            </tr>
            <tr>
                <td>০৭</td>
                <td>অভিযোগ বহি ও অভিযোগ নিম্পত্তি</td>
                <td></td>

            </tr>
        </table>
    </td>
</tr>
<tr>
    <td rowspan="3" style="width:40px;">ঙ)</td>
    <td colspan="2" style="width:30%"> RTI বিষয়ক তথ্যাদি :
    </td>
</tr>
<tr>
    <td style="width:30%">ক. ফোকাল পয়েন্ট এর নাম, মোবাইল, ইমেইল
        নম্বরসহ
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:30%">খ. তথ্য অধিকার বিষয়ক অনলাইন প্রশিক্ষণ রয়েছে
        কিনা? করে থাকলে তার প্রমাণক:
    </td>
    <td></td>
</tr>

<!--FD06 Section 10-->
@else
                                    <tr>
                                        <td rowspan="9" style="width:40px;">০৯</td>
                                        <td colspan="3"> সুশাসন ও স্বচ্ছতা :</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ক)</td>
                                        <td style="width:30%"> প্রকল্পটি এলাকার জনগণ এবং সংশ্লিষ্ট সরকারি ও
                                            বেসরকারি ব্যক্তিবর্গের সাথে পরামর্শক্রমে কিংবা মাঠ জরিপের
                                            মাধ্যমে প্রণয়ন করা হয়েছে কিনা, হলে সংক্ষিপ্ত বর্ণনা (প্রমাণক)
                                        </td>
                                        <td>{{ $fd6GovernanceAndTransparency->private_individuals_advice }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td style="width:30%">অন্যান্য এনজিও এবং সরকারি চলমান কর্মকান্ড (যদি
                                            থাকে) বিবেচনান্তে কাজ ও কর্ম - এলাকার দৈত্বতা এড়ানোর কি কি
                                            ব্যবস্থা গৃহীত হয়েছে।
                                        </td>
                                        <td>{{ $fd6GovernanceAndTransparency->govt_ongoing_activities }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">গ)</td>
                                        <td style="width:30%"> এ প্রকল্পটি বা একই ধরণের প্রকল্প ইতোপূর্বে
                                            দাখিল করা হয়েছিল কি না সরকার কর্তৃক তা অনুমোদিত বা পরবর্তীতে
                                            বাতিল করা হয়েছিল কি না:
                                        </td>
                                        <td>{{ $fd6GovernanceAndTransparency->similar_project_run_previously }}</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" style="width:40px;">ঘ)</td>
                                        <td colspan="2" style="width:30%"> সংস্থা স্বেচ্ছায় বা তথ্য অধিকার
                                            আইনের কারণে নিম্নবর্তীত তথ্যাবলী জনসম্মুখে প্রকাশ করতে ইচ্ছুক
                                            কিনা (ডিসক্লোজার পলিসি ):
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>ত্রু নং</td>
                                                    <td>তথ্যাবলী</td>
                                                    <td>হ্যা/না</td>

                                                </tr>
                                                <tr>
                                                    <td>০১</td>
                                                    <td>প্রকল্প ছক ৮ নং ফরমে</td>
                                                    <td>{{$fd6GovernanceAndTransparency->project_in_form_no_eight}}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>০২</td>
                                                    <td>নিরীক্ষা প্রতিবেদন</td>
                                                    <td>{{ $fd6GovernanceAndTransparency->audit_report}}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>০৩</td>
                                                    <td>বার্ষিক প্রতিবেদন</td>
                                                    <td> {{$fd6GovernanceAndTransparency->annual_report }}</td>

                                                </tr>
                                                <tr>
                                                    <td>০৪</td>
                                                    <td>প্রত্যেক কর্ম- এলাকার বাজেটসহ কর্মপরিকল্পনা</td>
                                                    <td>{{ $fd6GovernanceAndTransparency->action_plan_with_budget }}</td>

                                                </tr>
                                                <tr>
                                                    <td>০৫</td>
                                                    <td>উপকারভোগীদের ডাটাবেইজ</td>
                                                    <td> {{ $fd6GovernanceAndTransparency->beneficiary_database }}</td>

                                                </tr>
                                                <tr>
                                                    <td>০৬</td>
                                                    <td>প্রকল্পের বিস্তারিত ফলাফল</td>
                                                    <td> {{ $fd6GovernanceAndTransparency->detailed_results_of_the_project }}</td>

                                                </tr>
                                                <tr>
                                                    <td>০৭</td>
                                                    <td>অভিযোগ বহি ও অভিযোগ নিম্পত্তি</td>
                                                    <td> {{ $fd6GovernanceAndTransparency->complaints_detail}}</td>

                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3" style="width:40px;">ঙ)</td>
                                        <td colspan="2" style="width:30%"> RTI বিষয়ক তথ্যাদি :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%">ক. ফোকাল পয়েন্ট এর নাম, মোবাইল, ইমেইল
                                            নম্বরসহ
                                        </td>
                                        <td>{{ $fd6GovernanceAndTransparency->focal_point_name_mobile_email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%">খ. তথ্য অধিকার বিষয়ক অনলাইন প্রশিক্ষণ রয়েছে
                                            কিনা? করে থাকলে তার প্রমাণক:
                                        </td>
                                        <td>{{ $fd6GovernanceAndTransparency->online_training }}</td>
                                    </tr>

                                    <!--FD06 Section 10-->
                                    @endif

                                    @if(!$fd6StepThree)
                                    <tr>
                                        <td rowspan="4" style="width:40px;">১০</td>
                                        <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
                                            সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
                                            হবে :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ক)</td>
                                        <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
                                            লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
                                            নিরীক্ষা প্রতিবেদন দাখিল
                                            ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">গ)</td>
                                        <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
                                            গ্রহণের কারণসমূহ
                                        </td>
                                        <td></td>
                                    </tr>

                                    <!--FD06 Section 11-->

                                    <tr>
                                        <td style="width:40px;">১১</td>
                                        <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
                                        <td>




                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১১.১</td>
                                        <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">১২</td>
                                        <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
                                            ব্যয় বিভাজন (বিস্তারিত)
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১৩</td>
                                        <td colspan="2">
                                            প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
                                        </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6StepThree->ratio_of_expenditure) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১৪</td>
                                        <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
                                            প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
                                        </td>
                                        <td></td>
                                    </tr>

                                    @else

                                    <tr>
                                        <td rowspan="4" style="width:40px;">১০</td>
                                        <td colspan="3"> প্রকল্পটি ইতোপূর্বে সমাপ্ত কোন প্রকল্পের
                                            সম্প্রসারিত বা নতুন ফেইজ কিনা, হলে নিচের তথ্যসমূহ প্রদান করতে
                                            হবে :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">ক)</td>
                                        <td style="width:30%"> সংলগ্নি ''ঙ'' তে পূর্বের প্রকল্পের
                                            লক্ষ্যমাত্রা ও অর্জণ উল্লেখ করতে হবে :
                                        </td>
                                        <td>{{ $fd6StepThree->previous_project_detail }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">খ)</td>
                                        <td style="width:30%"> প্রকল্পটি নিরীক্ষিত কিনা, হলে কত তারিখে
                                            নিরীক্ষা প্রতিবেদন দাখিল
                                            ও গ্রহণ করা হয়েছে (নিরীক্ষা প্রতিবেদন গৃহীত হওয়ার প্রমানসহ)
                                        </td>
                                        <td>{{ $fd6StepThree->receipt_of_audit_report }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">গ)</td>
                                        <td style="width:30%"> সম্প্রসারিত প্রকল্প/ নতুন ফেইজ প্রকল্প
                                            গ্রহণের কারণসমূহ
                                        </td>
                                        <td>{{ $fd6StepThree->new_phase_project }}</td>
                                    </tr>

                                    <!--FD06 Section 11-->

                                    <tr>
                                        <td style="width:40px;">১১</td>
                                        <td colspan="2"> বিস্তারিত বাজেট বিবরণ :</td>
                                        <td>



                                            @if(empty($fd6StepThree->detailed_budget_statement))


                                            @else


                                            <a href="{{ route('allPdfForFd6',['title'=>'detailed_budget_statement','id'=>$fd6StepThree->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                             @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১১.১</td>
                                        <td colspan="2"> উপকারভোগীদের জন্য প্রত্যেক্ষ বরাদ্দ :</td>
                                        <td>{{ $fd6StepThree->annual_allocation_to_beneficiaries }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;">১২</td>
                                        <td colspan="2"> প্রকল্প বাস্তবায়নে বরাদ্দকৃত ওভারহেড কস্ট/প্রশাসনিক
                                            ব্যয় বিভাজন (বিস্তারিত)
                                        </td>
                                        <td>
                                            @if(empty($fd6StepThree->project_implementation_cost))


                                            @else

                                            <a href="{{ route('allPdfForFd6',['title'=>'project_implementation_cost','id'=>$fd6StepThree->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                             @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১৩</td>
                                        <td colspan="2">
                                            প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:
                                        </td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6StepThree->ratio_of_expenditure) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;"> ১৪</td>
                                        <td colspan="2">পরিবেশ সংরক্ষণে প্রকল্পটি কিভাবে সহায়তা করবে।
                                            প্রকল্পটি জলবায়ু পরিবর্তনে নেতিবাচক প্রভাব ফেলিবে কিনা :
                                        </td>
                                        <td>{{ $fd6StepThree->project_benifit }}</td>
                                    </tr>
                                     <!--FD06 Section Shonglognni-->
@endif
  <tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ক’’</h3>
    </td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">ক)</td>
    <td colspan="3"> পার্টনার এনজিও/সংস্থার বিস্তারিত তথ্য</td>
</tr>

<tr>
    <td colspan="3">

        @if(count($partnerDataPostList) == 0 )
        প্রযোজ্য নয়
        @else

        <div class="table-responsive" id="tableAjaxDataPartner">

            <table class="table table-bordered"  id="">
                <tr>
                    <th>পার্টনার এনজিওর নাম ও ঠিকানা (টেলিফোন, মোবাইল, ইমেইল
                        নম্বরসহ)
                    </th>
                    <th>এনজিও ব্যুরোর নিবন্ধন নং ও মেয়াদ :</th>
                    <th>পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য
                        কার্যক্রমসমূহ (বিস্তারিত)
                    </th>
                    <th>কর্ম এলাকা (সম্ভাব্য ইউনিয়ন/ওয়ার্ড পর্যন্ত)</th>
                    <th>বাজেট</th>
                    <th>সম্পাদনের সময়সীমা</th>
                    <th>উপকারভোগী</th>

                </tr>
                @foreach ($partnerDataPostList as $partnerDataPostLists)


                <tr>
                    <td>
                        <ul>
                            <li>পার্টনার এনজিওর নাম: {{ $partnerDataPostLists->partner_ngo_name }}</li>
                            <li>ঠিকানা: {{ $partnerDataPostLists->partner_ngo_address }}</li>
                            <li>টেলিফোন: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_telephone )}}</li>
                            <li>মোবাইল: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_mobile) }}</li>
                            <li>ইমেইল: {{ $partnerDataPostLists->partner_ngo_email }}</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>এনজিও ব্যুরোর নিবন্ধন নং : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->partner_ngo_reg_name) }}</li>
                            <li>মেয়াদ: {{App\Http\Controllers\NGO\CommonController::englishToBangla( $partnerDataPostLists->partner_ngo_duration )}}</li>
                        </ul>
                    </td>
                    <td>{!! $partnerDataPostLists->partner_ngo_work_detail !!}</td>
                    <td><ul>
                        <li>বিভাগ: {{ $partnerDataPostLists->division_name }}</li>
                        <li>জেলা: {{ $partnerDataPostLists->district_name }}</li>
                        <li>সিটি কর্পোরেশন: {{ $partnerDataPostLists->city_corparation_name }}</li>
                        <li>উপজেলা: {{ $partnerDataPostLists->upozila_name }}</li>
                        <li>থানা: {{ $partnerDataPostLists->thana_name }}</li>
                        <li>পৌরসভা/ইউনিয়ন: {{ $partnerDataPostLists->municipality_name }}</li>
                        <li>ওয়ার্ড: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->ward_name) }}</li>
                    </ul></td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->budget_detail) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->execution_deadline) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($partnerDataPostLists->beneficiary) }}</td>

                </tr>
                @endforeach
                </table>

    </div>
    @endif
    </td>
</tr>
@if(!$fd6AdjoiningAList)
<tr>
    <td rowspan="8" style="width:40px;">খ)</td>
    <td colspan="3">মোট অনুদানের পরিমান</td>
</tr>
<tr>
    <td style="width:40px;">০১</td>
    <td>নগদ</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০২</td>
    <td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৩</td>
    <td> পণ্য/দ্রব্য সহযোগিতা</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৪</td>
    <td>অন্যান্য</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৫</td>
    <td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৬</td>
    <td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৭</td>
    <td>চুক্তিপত্রের কপি</td>
    <td>

    </td>
</tr>
@else
<tr>
    <td rowspan="8" style="width:40px;">খ)</td>
    <td colspan="3">মোট অনুদানের পরিমান</td>
</tr>
<tr>
    <td style="width:40px;">০১</td>
    <td>নগদ</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->grant_amount_in_cash) }}</td>
</tr>
<tr>
    <td style="width:40px;">০২</td>
    <td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->strategic_coperation) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৩</td>
    <td> পণ্য/দ্রব্য সহযোগিতা</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->help_with_product) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৪</td>
    <td>অন্যান্য</td>
    <td>{{ $fd6AdjoiningAList->other }}</td>
</tr>
<tr>
    <td style="width:40px;">০৫</td>
    <td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->project_implementation_area) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৬</td>
    <td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningAList->other_information_note) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৭</td>
    <td>চুক্তিপত্রের কপি</td>
    <td>
               @if(empty($fd6AdjoiningAList->copy_of_contract))


               @else


               <a href="{{ route('allPdfForFd6',['title'=>'copy_of_contract','id'=>$fd6AdjoiningAList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
    </td>
</tr>
@endif
<!--FD06 Section Shonglognni kh-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’খ’’</h3>
    </td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">১</td>
    <td colspan="3"> প্রকল্পের কর্মকর্তা-কর্মচারীদের বিস্তারিত বিবরণ
        (দেশি ও বিদেশী উভয়ই)
    </td>
</tr>
<tr>
    <td colspan="3">

        <div class="table-reponsive" id="tableAjaxDataEmployee">

            <table class="table table-bordered" >
                <tr>
                    <td rowspan="2">নাম ও পদবি</td>
                    <td rowspan="2">জাতীয়তা</td>
                    <td rowspan="2">মেয়াদ (জনমাস)</td>
                    <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                    <td rowspan="2">অভিজ্ঞতা</td>
                    <td rowspan="2">দায়িত্বসমূহ</td>
                    <td colspan="2">বেতন-ভাতাদি</td>

                </tr>
                <tr>
                    <td>এই প্রকল্প হতে</td>
                    <td>অন্যান্য প্রকল্প হতে</td>

                </tr>
                @foreach($employeeDataPostList as $employeeDataPostLists)
                <tr>
                    <td>
                        <ul>
                            <li>নাম: {{ $employeeDataPostLists->name }}</li>
                            <li>পদবি: {{ $employeeDataPostLists->designation }}</li>
                        </ul>
                    </td>
                    <td>{{ $employeeDataPostLists->nationality }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->duration) }}</td>
                    <td>{{ $employeeDataPostLists->educational_qualification }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->experience) }}</td>
                    <td>{{ $employeeDataPostLists->responsibility }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->salary_from_this_project) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($employeeDataPostLists->salary_from_other_project)}}</td>

                </tr>
                @endforeach
                </table>


        </div>

        <small>টীকা : বেতন ভাতাদি বলতে বেতন , বাড়ী ভাড়া , চিকিৎসা ও
            বেতনের সাথে সংশ্লিষ্ট অন্যান্য সকল আর্থিক সুবিধা অন্তর্ভুক্ত
            হবে। বেতন-ভাতাদি বাংলাদেশী টাকায় মাসভিত্তিক দেখতে হবে।
            রুকল্প -২০২১ এর আলোকে অধিক কর্মসংস্থানের মাধ্যমে দ্রুত
            দারিদ্র হ্রাসের লক্ষ্যে বিদেশী নাগরিক নিয়োগ নিরুৎসাহিত করা
            হয়েছে। প্রকল্পের চাহিদা মোতাবেক উচ্চতর টেকনিক্যাল/ বেশেষায়িত
            বাংলাদেশি বিশেষজ্ঞ পাওয়া না গেলেই শুধুমাত্র বিদেশী বিশেষজ্ঞ
            বিবেচ্য। </small>

    </td>
</tr>

<!--FD06 Section Shonglognni Ga-->

@if(!$fd6AdjoiningCList)
<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’গ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> নির্মাণ কাজের বিস্তারিত বিবরণ (প্রযোজ্যক্ষেত্রে )
        <br>
        (ভৌত নির্মাণের বিস্তারিত বর্ণনা)
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
        সাক্ষরসহ)
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2"> নির্মাণের লে-আউট প্লান</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> প্রাক্কলিক ব্যয়</td>
    <td></td>
</tr>
@else
<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’গ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> নির্মাণ কাজের বিস্তারিত বিবরণ (প্রযোজ্যক্ষেত্রে )
        <br>
        (ভৌত নির্মাণের বিস্তারিত বর্ণনা)
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
    </td>
    <td>{{ $fd6AdjoiningCList->proof_of_land_ownership }}</td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
    <td>{{ $fd6AdjoiningCList->land_development_tax }}</td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
        সাক্ষরসহ)
    </td>
    <td>{{ $fd6AdjoiningCList->engineer_name }}
    <br>
   {{ $fd6AdjoiningCList->engineer_desi }}
    <br>
    <div class="mb-3">


            <img src="{{ asset('/') }}{{ $fd6AdjoiningCList->engineer_sign }}"  />

</div>

    <div class="mb-3">

            <img src="{{ asset('/') }}{{ $fd6AdjoiningCList->engineer_seal }}"  />
        </div>

    </td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2"> নির্মাণের লে-আউট প্লান</td>
    <td>@if(empty($fd6AdjoiningCList->construction_layout))


        @else
        <a href="{{ route('allPdfForFd6',['title'=>'construction_layout','id'=>$fd6AdjoiningCList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
         @endif</td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> প্রাক্কলিক ব্যয়</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningCList->estimated_expenses) }}</td>
</tr>
@endif
<!--FD06 Section Shonglognni Gha-->

@if(!$fd6AdjoiningDList)
<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঘ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড
        প্রদর্শন বিষয়ক তথ্যাদি :
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> প্রকল্পের মেয়াদকাল</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">চ)</td>
    <td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">ছ)</td>
    <td colspan="2">দাতা সংস্থার নাম</td>
    <td></td>
</tr>
@else

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঘ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড
        প্রদর্শন বিষয়ক তথ্যাদি :
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td>{{ $fd6AdjoiningDList->prokolpo_name }}</td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> প্রকল্পের মেয়াদকাল</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->prokolpo_duration) }}</td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_allocation) }}</td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_allocation_prokolpo_area) }}</td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_benificiare) }}</td>
</tr>
<tr>
    <td style="width:40px;">চ)</td>
    <td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningDList->total_benificiare_prokolpo_area) }}</td>
</tr>
<tr>
    <td style="width:40px;">ছ)</td>
    <td colspan="2">দাতা সংস্থার নাম</td>
    <td>{{ $fd6AdjoiningDList->donor_name }}</td>
</tr>
@endif
@if(!$fd6AdjoiningEList)
<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঙ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">সমাপ্ত অনুরূপ প্রকল্পের অর্জন
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="2"> প্রকল্পের মেয়াদ</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2"> প্রকল্প মূল্য</td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৫)</td>
    <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
        প্রমাণক
    </td>
    <td></td>
</tr>
<tr>
    <td style="width:40px;">০৬)</td>
    <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
    <td>


    </td>
</tr>
<tr>
    <td style="width:40px;">০৭)</td>
    <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
    <td></td>
</tr>
@else
<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঙ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">সমাপ্ত অনুরূপ প্রকল্পের অর্জন
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td>{{ $fd6AdjoiningEList->prokolpo_name }}</td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="2"> প্রকল্পের মেয়াদ</td>
    <td>{{ $fd6AdjoiningEList->prokolpo_duration }}</td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($fd6AdjoiningEList->ngo_permission_date))) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2"> প্রকল্প মূল্য</td>
    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningEList->prokolpo_price) }}</td>
</tr>
<tr>
    <td style="width:40px;">০৫)</td>
    <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
        প্রমাণক
    </td>
    <td>

                   @if(empty($fd6AdjoiningEList->prokolpo_audit_report))


                   @else
                   <a href="{{ route('allPdfForFd6',['title'=>'prokolpo_audit_report','id'=>$fd6AdjoiningEList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> প্রকল্পের অডিট প্রতিবেদন প্রমাণক</a>
                    @endif

<br>
            @if(empty($fd6AdjoiningEList->prokolpo_final_report))


            @else
            <a href="{{ route('allPdfForFd6',['title'=>'prokolpo_final_report','id'=>$fd6AdjoiningEList->id]) }}" target="_blank" class="btn btn-success btn-sm mt-2"><i class="fa fa-file-pdf-o"></i>প্রকল্পের সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক</a>
             @endif

    </td>
</tr>
<tr>
    <td style="width:40px;">০৬)</td>
    <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
    <td>

               @if(empty($fd6AdjoiningEList->prokolpo_local_audit_report))


               @else

               <a href="{{ route('allPdfForFd6',['title'=>'prokolpo_local_audit_report','id'=>$fd6AdjoiningEList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
    </td>
</tr>
<tr>
    <td style="width:40px;">০৭)</td>
    <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
    <td>{{ $fd6AdjoiningEList->development_detail }}</td>
</tr>
@endif
<tr>
    <td colspan="4">


        <div class="table-reponsive" id="tableAjaxDataFormSix">
            <table class="table table-bordered">
                <tr>
                    <td rowspan="2">কার্যাবলী (ফরম-৬ অনুযায়ী)</td>
                    <td colspan="2">ভৌত</td>
                    <td colspan="2">আর্থিক</td>
                    <td rowspan="2">মন্তব্য</td>

                </tr>
                <tr>
                    <td>লক্ষমাত্রা</td>
                    <td>অর্জন</td>
                    <td>বরাদ্দ</td>
                    <td>ব্যয়</td>
                </tr>
                @foreach($detailAsPerForm6 as $detailAsPerForm6s)
                <tr>
                    <td>{{ $detailAsPerForm6s->work_detail }}</td>
                    <td>{{ $detailAsPerForm6s->physical_goals }}</td>
                    <td>{{ $detailAsPerForm6s->physical_achievment }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($detailAsPerForm6s->financial_allocation) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($detailAsPerForm6s->financial_cost) }}</td>
                    <td>{{ $detailAsPerForm6s->comment }}</td>

                </tr>
                @endforeach
            </table>
        </div>
    </td>
</tr>

<!--FD06 Section Shonglognni Ca-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’চ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">

        <div class="d-flex justify-content-between">
            <div>উপকরণের বিস্তারিত বর্ণনা (প্রযোজ্যক্ষেত্রে)
                অফিস যন্ত্রপাতি, মেশিনপত্র ও যানবাহন।</div>
            <div>


        </div>
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="3"> আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা :</td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="adjoiningSixDataTable">
            <table class="table table-bordered">
                <tr>
                    <td>ক্রমিক নং</td>
                    <td>আইটেমের নাম</td>
                    <td>পরিমান</td>
                    <td>একক মূল্য</td>
                    <td>মোট ব্যায়</td>


                </tr>
                <?php

                $totalExpense = 0;

                ?>

                @foreach($fd6FurnitureEquipments as $key=>$fd6FurnitureEquipmentsList)
                <input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

                </tr>
                <?php $totalExpense = $totalExpense + $fd6FurnitureEquipmentsList->item_total_price  ?>
                @endforeach
                <tr>
                    <td colspan="4">সর্বমোট </td>
                    <td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpense) }}</td>
                </tr>

            </table>

        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="3">  মেশিনপত্রের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfMachineryTable">
            <table class="table table-bordered">
                <tr>
                    <td>ক্রমিক নং</td>
                    <td>আইটেমের নাম</td>
                    <td>পরিমান</td>
                    <td>একক মূল্য</td>
                    <td>মোট ব্যায়</td>


                </tr>
                <?php

                $totalExpenseOne = 0;

                ?>

                @foreach($fd6FurnitureEquipmentsOne as $key=>$fd6FurnitureEquipmentsList)
                <input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

                </tr>
                <?php $totalExpenseOne = $totalExpenseOne + $fd6FurnitureEquipmentsList->item_total_price  ?>
                @endforeach
                <tr>
                    <td colspan="4">সর্বমোট </td>
                    <td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpenseOne) }}</td>
                </tr>

            </table>


        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="3">  যানবাহনের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfVehicle">
            <table class="table table-bordered">
                <tr>
                    <td>ক্রমিক নং</td>
                    <td>আইটেমের নাম</td>
                    <td>পরিমান</td>
                    <td>একক মূল্য</td>
                    <td>মোট ব্যায়</td>

                </tr>
                <?php

                $totalExpenseTwo = 0;

                ?>

                @foreach($fd6FurnitureEquipmentsTwo as $key=>$fd6FurnitureEquipmentsList)
                <input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_quantity) }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_net_price) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FurnitureEquipmentsList->item_total_price) }}</td>

                </tr>
                <?php $totalExpenseTwo = $totalExpenseTwo + $fd6FurnitureEquipmentsList->item_total_price  ?>
                @endforeach
                <tr>
                    <td colspan="4">সর্বমোট </td>
                    <td colspan="2">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalExpenseTwo) }}</td>
                </tr>

            </table>

        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2">প্রকল্প সমাপ্ত হওয়ার পরে এই অফিস যন্ত্রপাতি, মেশিনপত্র এবং যানবাহনগুলো কিভাবে ব্যবহার হবে সেই বিষয়ে বর্ণনা :</td>
    <td>

        @if(!($fd6AdjoiningEList))

        @else

               @if(empty($fd6AdjoiningEList->after_end_prokolpo))


               @else

               <a href="{{ route('allPdfForFd6',['title'=>'after_end_prokolpo','id'=>$fd6AdjoiningEList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                @endif
                @endif
    </td>
</tr>

<!--FD06 Section Shonglognni Cha-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ছ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">প্রশিক্ষণ, সেমিনার, ওয়ার্কশপ ও কনফারেন্সের সম্ভাব্য দিনপুঞ্জি
    </td>
</tr>
<tr>
    <td colspan="4">

        <div class="table-reponsive" id="dinpunjjiTable">
            <table class="table table-bordered">
                <tr>
                    <td>ত্রু: নং</td>
                    <td>শিরোনাম/বিষয়</td>
                    <td>তারিখ,সময় ও স্থান (সম্ভাব্য)</td>
                    <td>সংখ্যা</td>
                    <td>অংশগ্রহণকারীর সংখ্যা</td>
                    <td>বাজেট</td>
                    <td>মন্তব্য</td>

                </tr>

                @foreach($fd6AdjoiningGList as $key=>$fd6AdjoiningGLists)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fd6AdjoiningGLists->subject }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_date) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_time) }} ও {{ $fd6AdjoiningGLists->seminer_place }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_number) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_perticipantion) }}</td>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6AdjoiningGLists->seminer_budget) }}</td>
                    <td>{{ $fd6AdjoiningGLists->comment }}</td>

                </tr>
                @endforeach
            </table>

        </div>
    </td>
</tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">

                          <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd2pdfviewdfd6',base64_encode($fd6FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>



                    </div>
                </div>

                <!-- new code end -->

@if(!$fd2FormList)
@else
                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>

                        <table class="table table-bordered" style="width:100%">

                            <!-- step three start -->

                            <tr>
                            <th style="text-align: center;">১.</th>
                            <td style="font-weight:bold;width:30%" >সংস্থার নাম ও ঠিকানা:</td>
                            <td style="" colspan="2">
                            {{ $fd2FormList->ngo_name }} ও {{ $fd2FormList->ngo_address }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;">২.</th>
                            <td style="font-weight:bold;width:30%" >প্রকল্পের নাম:</td>
                            <td style="" colspan="2">{{ $fd2FormList->ngo_prokolpo_name }}</td>
                            </tr>


                            <tr>
                            <th style="text-align: center;">৩.</th>
                            <td style="font-weight:bold;width:30%" >প্রকল্পের মেয়াদ, আরম্ভের তারিখ, সমাপ্তির তারিখ :</td>
                            <td style="" colspan="2">
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_duration) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;" >৪.</th>
                            <td style="font-weight:bold;width:30%" >প্রস্তাবিত অর্থছাড়ের পরিমাণ (বাংলাদেশী টাকা ও বৈদেশিক মুদ্রায়):</td>
                            <td style="" colspan="2">
                            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}
                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;" >৫.</th>
                            <td style="font-weight:bold;width:30%" >১ম/২য়/৩য়/৪র্থ/৫ম বছরে ব্যাংক হতে উত্তোলিত অর্থের পরিমাণ:</td>
                            <td style="" colspan="2">


                                @if($fd2FormList->amount_withdrawn_year == 1)
                                ১ম বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                @elseif($fd2FormList->amount_withdrawn_year == 2)
                                ২য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
                                @elseif($fd2FormList->amount_withdrawn_year == 3)
                                ৩য় বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}

                                @elseif($fd2FormList->amount_withdrawn_year == 4)
                                ৪র্থ বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}
  @elseif($fd2FormList->amount_withdrawn_year == 5)
                                ৫ম বছর : {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->amount_withdrawn)  }}


                                @endif


                            </td>

                            </tr>

                            <tr>
                            <th style="text-align: center;"  rowspan="2">৬.</th>
                            <td style="font-weight:bold;" colspan="3">সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জন:</td>


                            </tr>
                            <tr>
                            <td colspan="3">

                            <div class="table-responsive" >


                            <table class="table table-bordered">
                            <tr style="text-align: center">
                                <th rowspan="2">ক্রমিক নং</th>
                                <th rowspan="2">কার্যক্রমের নাম </th>
                                <th colspan="2">বিগত বছরের লক্ষ্যমাত্রা </th>
                                <th colspan="2">অর্জন(%) </th>
                                <th rowspan="2">উপকারভোগীর সংখ্যা </th>
                                <th rowspan="2">মন্তব্য (যদি থাকে)</th>

                            </tr>
                            <tr style="text-align: center;">
                                <th>বাস্তব</th>
                                <th>আর্থিক </th>
                                <th>বাস্তব</th>
                                <th>আর্থিক </th>
                            </tr>
                            <?php

                            $totalBeni = 0;

                            ?>
                            @foreach($fd2AllFormLastYearDetailForFd2 as $key=>$fd2AllFormLastYearDetails)
                            <?php

                            $totalBeni = $totalBeni + $fd2AllFormLastYearDetails->total_benificiari;
                            ?>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $fd2AllFormLastYearDetails->prokolpoName }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_target_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_real) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->last_year_achievment_financial) }}</td>
                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2AllFormLastYearDetails->total_benificiari) }}</td>

                                <td>{{ $fd2AllFormLastYearDetails->comment }}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="6">মোট উপকারভোগীর সংখ্যা - {{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalBeni) }}</th>

                                <td></td>
                                <td></td>
                            </tr>

                            </table>

                            </div>


                            @if(empty($fd2FormList->last_year_achivment_pdf))


                            @else

                            <a href="{{ route('fd2formextrapdffd6',['title'=>'last_year_achivment_pdf','id'=>$fd2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                            @endif
                            </td>
                            </tr>
                            <tr>
                            <th rowspan="3">৭.</th>

                            <th colspan="3">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী:</th>

                            </tr>
                            <tr>


                            <th>(ক) ব্যাংকের নাম:</th>
                            <td>{{ $fd2FormList->bank_name }}</td>

                            </tr>
                            <tr>


                            <th>(খ) ব্যাংকের ঠিকানা ও হিসাব নম্বর:</th>
                            <td>{{ $fd2FormList->bank_adddress }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->bank_account_number) }}</td>

                            </tr>

                            <tr>
                            <th style="text-align: center;">৮.</th>
                            <td style="font-weight:bold;" colspan="3">গুরুত্বপূর্ণ যেকোনো তথ্য:</td>

                            </tr>

                            <tr>
                            <td style="" colspan="4">
                            @if(count($fd2OtherInfo) == 0)


                            @else


                            <div class="table-respnsive">
                            <table class="table table-bordered">
                                @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                                <tr>
                                    <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                    <td><a href="{{ route('fd2PdfDownload',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a></td>
                                </tr>
                                @endforeach

                            </table>
                            </div>

                            @endif



                            </td>

                            </tr>




                                                    </table>
                                                    @endif
                    </div>
                </div>

                        <!-- new code start --->

                        <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">



                                @if($fd6FormList->status == 'Ongoing' || $fd6FormList->status == 'Accepted')

                                                @else

                                                <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fd6FormList->id}})" class="btn btn-lg btn-info">
                                                    দাখিল করুন    <i class="fa fa-send-o"></i>
                                                </button>

                                                    <form id="delete-form-{{ $fd6FormList->id }}" action="{{ route('finalFdSixApplicationSubmit',base64_encode($fd6FormList->id)) }}" method="get" style="display: none;">

                                                        @csrf


                                                    </form>


                                @endif


                            </div>
                        </div>

                        <!-- new code end -->

            </div>
        </div>

    </div>

</section>


@endsection

@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: 'আপনি কি ফর্ম সাবমিট করতে চাচ্ছেন?',
            text: "সাবমিট বাটনে ক্লিক করলে, আর তথ্য সংশোধন করবেন না। আপনি কি রাজি?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন পাঠানো হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>

@endsection
