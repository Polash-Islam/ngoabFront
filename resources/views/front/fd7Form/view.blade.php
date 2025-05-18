@extends('front.master.master')

@section('title')
{{ trans('fd9.fd7')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
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

                            <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd7pdfview',base64_encode($fd7FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>
                        @if($fd7FormList->status == 'Ongoing' || $fd7FormList->status == 'Accepted')

                                        @else



                        <button class="btn btn-primary" onclick="location.href = '{{ route('fd7Form.edit',base64_encode($fd7FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি-৭ ফরম</h3>
                            <h4>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100%">



                                <tr>
                                    <th style="text-align: center;" >১.</th>
                                    <td colspan="2">এনজিও'র নাম, ঠিকানা নিবন্ধন নম্বর ও তারিখ :</td>
                                    <td >

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                   {{ $ngo_list_all->organization_name_ban }},

                                        @else


                                     {{ $ngo_list_all->organization_name }},


                                        @endif
                           {{ $ngo_list_all->organization_address }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date("d-m-Y", strtotime($ngoDurationReg))) }}
                                    </td>

                                </tr>
                              <!-- step one start  -->


<!-- step three start -->

<tr>
<th style="text-align: center;"  >২.</th>

<td style="" colspan="2">প্রস্তাবিত প্রকল্পের নাম ও ধরণ:</td>
<td style="">

    <?php
    $subjectIdList  = explode(",",$fd7FormList->subject_id);
    $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
    ->get();

    ?>
{{ $fd7FormList->ngo_prokolpo_name }} ও   @foreach($subjectListMain as $key=>$subjectListMains)

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



                                <tr>
                                    <th style="text-align: center;" rowspan="4">৩.</th>

                                    <td style="font-weight:bold;" colspan="3">বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ (আনুমানিক মূল্যসহ):
                                </td>


                                </tr>
                                <tr>

                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                    <td colspan="3" rowspan="3">

                                        <?php


$distributionListOne = DB::table('fd_seven_distribution_details')
->where('type','প্রকল্প খাতের ব্যয়')
->where('fd7_form_id',$fd7FormList->id)->get();

$distributionListTwo = DB::table('fd_seven_distribution_details')
->where('type','প্রশাসনিক ব্যয়')
->where('fd7_form_id',$fd7FormList->id)->get();

//dd($distributionListTwo);


                                            ?>

                                        <div class="table-responsive" id="tableAjaxDatadis">

                                            <table class="table table-bordered" >

                                                <tr style="text-align: center;">
                                                    <th>ক্র: নং :</th>
                                                    <th>ধরণ</th>
                                                    <th>জেলা</th>
                                                    <th>উপজেলা</th>

                                                    <th>দ্রব্যাদির বর্ণনা</th>
                                                    <th>পরিমাণ</th>
                                                    <th>একক মূল্য</th>
                                                    <th>মোট টাকার পরিমাণ</th>
                                                    <th>মোট উপকারভোগীর সংখ্যা</th>
                                                    <th>মন্তব্য</th>

                                                </tr>
                                                <?php

                                                $totalProductQuantityOne = 0;
                                                $totalUnitPriceOne = 0;
                                                $totalTotalAmountOne = 0;
                                                $totalTotalBeneficiariesOne = 0;

                                                ?>
                                                 @foreach($distributionListOne as $key=>$distributionListOnes)

                                                 <?php

                                                    $totalProductQuantityOne = $totalProductQuantityOne + $distributionListOnes->product_quantity;
                                                    $totalUnitPriceOne = $totalUnitPriceOne + $distributionListOnes->unit_price;
                                                    $totalTotalAmountOne = $totalTotalAmountOne + $distributionListOnes->total_amount;
                                                    $totalTotalBeneficiariesOne = $totalTotalBeneficiariesOne + $distributionListOnes->total_beneficiaries;
                                                 ?>
                                               <tr>

                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                    <td>{{ $distributionListOnes->type }}</td>
                                                    <td>{{ $distributionListOnes->district_name }}</td>
                                                    <td>{{ $distributionListOnes->upozila_name }}</td>

                                                    <td>{{ $distributionListOnes->product_des }}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->product_quantity) }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->unit_price) }}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_amount) }}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_beneficiaries) }}</td>
                                                    <td>{{ $distributionListOnes->comment }}</td>


                                               </tr>
                                               @endforeach
                                               @if(count($distributionListOne) == 0)

                                               @else
                                               <tr>
                                                <td></td>
                                                <td>প্রাক মোট</td>
                                                <td></td>
                                                <td></td>

                                                <td></td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityOne) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceOne) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountOne) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesOne) }}</td>
                                                <td></td>

                                               </tr>
                                               @endif
                                               <?php

                                               $distributionListOneCount = count($distributionListOne);


                                            $totalProductQuantityTwo = 0;
                                            $totalUnitPriceTwo = 0;
                                            $totalTotalAmountTwo = 0;
                                            $totalTotalBeneficiariesTwo = 0;


                                               ?>
                                                @foreach($distributionListTwo as $j=>$distributionListOnes)

                                                <?php

                                                $totalProductQuantityTwo = $totalProductQuantityTwo + $distributionListOnes->product_quantity;
                                                $totalUnitPriceTwo = $totalUnitPriceTwo + $distributionListOnes->unit_price;
                                                $totalTotalAmountTwo = $totalTotalAmountTwo + $distributionListOnes->total_amount;
                                                $totalTotalBeneficiariesTwo = $totalTotalBeneficiariesTwo + $distributionListOnes->total_beneficiaries;
                                             ?>
                                                <tr>


                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOneCount+$j+1) }}</td>
                                                <td>{{ $distributionListOnes->type }}</td>
                                                <td>{{ $distributionListOnes->district_name }}</td>
                                                <td>{{ $distributionListOnes->upozila_name }}</td>

                                                <td>{{ $distributionListOnes->product_des }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->product_quantity) }} {{ DB::table('units')->where('id',$distributionListOnes->unit_name)->value('name')}}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->unit_price) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_amount) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($distributionListOnes->total_beneficiaries) }}</td>
                                                <td>{{ $distributionListOnes->comment }}</td>


                                               </tr>
                                               @endforeach
                                               @if(count($distributionListTwo) == 0)

                                               @else
                                               <tr>
                                                <td></td>
                                                <td>প্রাক মোট</td>
                                                <td></td>
                                                <td></td>

                                                <td></td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityTwo) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceTwo) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountTwo) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesTwo) }}</td>
                                                <td></td>

                                               </tr>
                                               @endif
                                               <tr>
                                                <td></td>
                                                <td colspan="2">সর্বমোট = </td>

                                                <td></td>

                                                <td></td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalProductQuantityTwo + $totalProductQuantityOne)  }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalUnitPriceTwo + $totalUnitPriceOne) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalAmountTwo+$totalTotalAmountOne) }}</td>
                                                <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($totalTotalBeneficiariesTwo+$totalTotalBeneficiariesOne) }}</td>
                                                <td></td>

                                               </tr>
                                            </table>

                                        </div>






                                                   @if(empty($fd7FormList->distribution_pdf))


                                                   @else

                                                   <a href="{{ route('fd7formextrapdf',['title'=>'distribution_pdf','id'=>$fd7FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                                    @endif






                            </td>


                                </tr>
                                <tr>
                                </tr>

                                <tr>
                                </tr>

                                <!-- step three end -->

                                <!-- step four start --->

                                <tr>
                                    <th style="text-align: center;" rowspan="14">৪.</th>

                                    <th  colspan="3">অর্থ বা ত্রাণ-সামগ্রীর উৎস:</th>

                                </tr>



                                <tr >

                                    <th style="text-align: center;">ক.</th>
                                    <th>দাতা সংস্থার প্রতিশ্রুতিপত্র:</th>
                                    <td>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>১. দাতা সংস্থার বিবরণ :</td>
                                    <td>{{ $fd7FormList->donor_organization_description }}</td>

                                </tr>


                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>২. প্রধান নির্বাহী কর্মকর্তা/ দাতার নাম :</td>
                                    <td>
 {{$fd7FormList->donor_organization_chief_type }} : {{ $fd7FormList->donor_organization_chief_name }}
                                    </td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৩. দাতা সংস্থার নাম :</td>
                                    <td>
                                        {{ $fd7FormList->donor_organization_name }}

                                    </td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৪. যোগাযোগের ঠিকানা :</td>
                                    <td>{{ $fd7FormList->donor_organization_address }}</td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৫. টেলিফোন :</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->donor_organization_phone) }}</td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৬. ইমেইল ও ওয়েবসাইট :</td>
                                    <td>{{ $fd7FormList->donor_organization_email }} ও {{ $fd7FormList->donor_organization_website }}</td>

                                </tr>


                                <tr>
                                    <th style="text-align: center;"> খ.</th>
                                <th colspan="2">চলমান অন্য কোনো প্রকল্পের অর্থ দ্বারা প্রস্তাবিত কার্যক্রম বাস্তবায়নের ক্ষেত্রে: </th>


                            </tr>

<tr>

                                    <td style="text-align: center;"></td>
                                    <td>১. চলমান প্রকল্পের নাম ও মোট ব্যয় :</td>
                                    <td>{{ $fd7FormList->ongoing_prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->total_prokolpo_cost) }} </td>

                                </tr>


                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>২. ব্যুরোর অনুমোদনের তারিখ (অনুমোদনপত্র সংযুক্ত করতে হবে) : </td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->date_of_bureau_approval) }}
                                        <a href="{{ route('authorizationLetter',$fd7FormList->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>



                                    </td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৩. মূল প্রকল্পের শতকরা কতভাগ এই
                                        প্রকল্পের ব্যায় করা হবে :</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->percentage_of_the_original_project) }}</td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৪. চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না :</td>
                                    <td>{{ $fd7FormList->adverse_impact_on_the_ongoing_project }}</td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;"></td>
                                    <td>৫. দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি
                                        সংযুক্ত করতে হবে) :</td>
                                    <td>


                                        <a href="{{ route('letterFromDonorAgency',$fd7FormList->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>

                                    </td>

                                </tr>


                                <!-- steap four end -->

                                <tr>
                                    <th style="text-align: center;" rowspan="4">৫.</th>

                                    <td style="font-weight:bold;" colspan="2">প্রকল্প এলাকা:</td>
                                    <td></td>

                                </tr>
                                <tr>

                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                    <td colspan="3" rowspan="3">

                                        <div class="table-responsive">

                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>ক্রমিক নং</th>
                                                    <th>জেলা/সিটি কর্পোরেশন</th>
                                                    <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                                    <th>প্রকল্পের ধরণ</th>
                                                    <th>বরাদ্দকৃত বাজেট</th>
                                                    <th>মোট উপকারভোগীর সংখ্যা</th>
                                                </tr>
                                                @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
                                                <tr>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
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
                                                    <td>
                                                        {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
                                                    </td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }}</td>
                                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}</td>
                                                </tr>
                                                  @endforeach
                                            </table>



                                        </div>
                                        <span>টীকা :জেলা প্রশাসন /উপজেলা নির্বাহী অফিসার সুষ্ঠূ সমন্বয় ও সুষম বন্টনের স্বার্থে প্রকল্প এলাকা পরিবর্তন করার ক্ষমতা রাখে।</span>



                                </span>


                            </td>


                                </tr>
                                <tr>
                                </tr>

                                <tr>
                                </tr>

                                <!-- step three end -->

                                <!-- step five start -->

                                <tr>
                                    <th style="text-align: center;" rowspan="2">৬.</th>

                                    <td style="font-weight:bold;" colspan="3">
                                        ত্রাণ কর্যক্রম কিভাবে বাস্তবায়িত হবে তার বিবরণ দিতে হবে (এটি সুস্পষ্ট করুন যাহাতে কতৃপক্ষের জন্য তদারকি /পরীক্ষণ সহজ হয়):
                                    </td>


                                </tr>

                                <tr>


                                    <td colspan="3">{!! $fd7FormList->relief_program_detail !!}




                                        @if(empty($fd7FormList->relief_program_pdf))


                                        @else

                                        <a href="{{ route('fd7formextrapdf',['title'=>'relief_program_pdf','id'=>$fd7FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                               @endif

                                    </td>

                                </tr>

                                <!-- step five end --->

                                <!-- step six start -->

                                <tr>
                                    <th style="text-align: center;" rowspan="3">৭.</th>

                                    <td style="font-weight:bold;" colspan="2">কার্যক্রমের মেয়াদকাল:</td>
                                    <td></td>

                                </tr>

                                <tr>

                                    <td style="text-align: center;">ক.</td>
                                    <td>  আরম্ভের তারিখ: </td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_start_date) }}</td>

                                </tr>
                                <tr>

                                    <td style="text-align: center;">খ.</td>
                                    <td>সমাপ্তির তারিখ:</td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_end_date) }}</td>

                                </tr>

                                <tr>
                                    <th style="text-align: center;" rowspan="2">৮.</th>

                                    <td style="font-weight:bold;" colspan="3">
                                        প্রকল্প বাস্তবায়ন সংক্রান্ত অন্যান্য প্রাসঙ্গিক তথ্য (ভবিষ্যত পরিকল্পনাসহ যদি থাকে):

                                    </td>


                                </tr>

                                <tr>


                                    <td colspan="3">
                                         {!! $fd7FormList->relevant_information !!}





                                                   @if(empty($fd7FormList->relevant_information_pdf))


                                        @else

                                        <a href="{{ route('fd7formextrapdf',['title'=>'relevant_information_pdf','id'=>$fd7FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                               @endif


                                    </td>

                                </tr>

                                <tr>
                                    <th style="text-align: center;" rowspan="2">৯.</th>

                                    <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণ সংক্রান্ত ব্যাংকের তথ্যাদি:</td>


                                </tr>

                                <tr>


                                    <td colspan="3">



                                         {!! $fd7FormList->bank_detail !!}




                                                   @if(empty($fd7FormList->bank_detail_pdf))


                                                   @else

                                                   <a href="{{ route('fd7formextrapdf',['title'=>'bank_detail_pdf','id'=>$fd7FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
                                                          @endif


                                    </td>

                                </tr>



                            </table>

                        </div>

                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">

                        @if(!$fd2FormList)

                        @else


                               <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">


                        <a target="_blank" href="{{ route('fd2pdfview',base64_encode($fd7FormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                            <i class="fa fa-print"></i>
                        </a>



                    </div>
                </div>

                <!-- new code end -->
                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>

                           <!-- start new code --->

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
@foreach($fd2AllFormLastYearDetail as $key=>$fd2AllFormLastYearDetails)
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

<a href="{{ route('fd2formextrapdf',['title'=>'last_year_achivment_pdf','id'=>$fd2FormList->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a>
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
        <td><a href="{{ route('downloadFd2DetailForFd7Other',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> পিডিএফ দেখুন</a></td>
    </tr>
    @endforeach

</table>
</div>

@endif



</td>

</tr>




                        </table>

                        <!-- end new code --->
                        @endif

                    </div>
                </div>

            </div>

             <!-- new code start --->

             <div class="d-flex justify-content-between mt-3">
                <div class="">


                </div>
                <div class="">



                    @if($fd7FormList->status == 'Ongoing' || $fd7FormList->status == 'Accepted')

                                    @else

                                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fd7FormList->id}})" class="btn btn-info">
                                        দাখিল করুন  <i class="fa fa-send-o"></i>
                                    </button>

                                        <form id="delete-form-{{ $fd7FormList->id }}" action="{{ route('finalFdSevenApplicationSubmit',base64_encode($fd7FormList->id)) }}" method="get" style="display: none;">

                                            @csrf


                                        </form>


                    @endif


                </div>
            </div>

            <!-- new code end -->
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
