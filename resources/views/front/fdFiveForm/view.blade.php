@extends('front.master.master')

@section('title')
বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম | {{ trans('header.ngo_ab')}}
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
                                    <h4>{{ $ngoListAll->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngoListAll->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngoListAll->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngoListAll->organization_address }}</p> --}}

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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                        v
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
                            <a href="{{ route('duplicateCertificate.index')}}">
                                <p class="{{ Route::is('duplicateCertificate.index') ||  Route::is('duplicateCertificate.create') || Route::is('duplicateCertificate.show') || Route::is('duplicateCertificate.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index') ||  Route::is('approvalOfConstitution.create') || Route::is('approvalOfConstitution.show') || Route::is('approvalOfConstitution.edit')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index') ||  Route::is('executiveCommitteeApproval.create') || Route::is('executiveCommitteeApproval.show') || Route::is('executiveCommitteeApproval.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
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

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
$name_change_list = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">

                         <!-- new code start --->

                         <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">

                                <a target="_blank" href="{{ route('fdFiveFormPdf',base64_encode($fdFiveForm->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                                    <i class="fa fa-print"></i>
                                </a>
                                @if($fdFiveForm->status == 'Ongoing')


                                @else


                                <button class="btn btn-primary" onclick="location.href = '{{ route('fdFiveForm.edit',base64_encode($fdFiveForm->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                @endif




                            </div>
                        </div>

                        <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৫ ফরম</h3>
                            <h4 style="font-weight:bold;">বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম </h4>
                        </div>
                        <div class="row">


                            <div class="col-lg-12 col-sm-12">


                                <table class="table table-borderless" style="width:100%">



                                    <tr>
                                        <th style="text-align: center;">১.</th>
                                        <td style="font-weight:bold;">সংস্থার নাম, ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ):</td>
                                        <td style="">{{ $fdFiveForm->ngo_name }},{{ $fdFiveForm->ngo_address }} ({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFiveForm->ngo_telephone_number) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFiveForm->ngo_mobile_number) }}, {{ $fdFiveForm->ngo_email }}, {{ $fdFiveForm->ngo_website }})
                                        </td>

                                    </tr>
                                  <!-- step one start  -->


                                    <tr>
                                        <th style="text-align: center;" rowspan="2">২.</th>

                                        <td style="font-weight:bold;" colspan="2">গ্রহণকৃত সামগ্রী/ দ্রব্য সামগ্রীর বিস্তারিত বিবরণ:
                                        </div>
                                    </td>


                                    </tr>
                                    <tr>

                                        {{-- <td style="text-align: center;">ক.</td> --}}
                                        <td colspan="3" >


                                                <div class="table-responsive" id="tableAjaxDataReceivedGoods">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th colspan="8">গ্রহনসংক্রান্ত তথ্যাদি</th>
                                                        </tr>
                                                        <tr style="text-align: center;">
                                                            <th>তারিখ</th>
                                                            <th>যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম ও ঠিকানা</th>
                                                            <th>গ্রহণের প্রকৃত (শুল্কমূক্তভাবে /শুল্ক পরিশোধ করে গ্রহণকৃত)</th>
                                                            <th>জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য</th>
                                                            <th>গ্রহণকৃত সামগ্রীর পরিমান</th>
                                                            <th>গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য</th>
                                                            <th>প্রতিশ্রুতি প্রদানের তারিখ ও ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ</th>

                                                        </tr>
                                                    @foreach($receivedGoodList as $receivedGoodLists)
                                                        <tr>
                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->source_received_date) }}</td>
                                                            <td>{{ $receivedGoodLists->source_of_goods_name }} ও {{ $receivedGoodLists->source_of_goods_address }}</td>

                                                            <td>{{ $receivedGoodLists->actual_of_receipt_source }}</td>
                                                            <td>{!! $receivedGoodLists->purpose_of_receipt_goods !!}</td>
                                                            <td>{{ $receivedGoodLists->amount_of_material_received }}</td>
                                                            <td>{{ $receivedGoodLists->estimated_value_of_goods }}</td>
                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_project_approval) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->date_of_Commitment) }}</td>


                                                        </tr>
                                                        @endforeach

                                                    </table>
                                                </div>



                                                <div class="table-responsive" id="tableAjaxDataReceivedUsedGoods">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th colspan="6">ব্যবহার/বিবরণ </th>
                                                        </tr>
                                                        <tr style="text-align: center;">
                                                            <th>সংস্থার ব্যবহারের পরিমাণ</th>
                                                            <th>যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ </th>
                                                            <th>কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                            <th>কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                            <th>যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ (ব্যুরো অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                            <th>অবশিষ্ট মালামালের বিবরণ (যদি থাকে)</th>

                                                        </tr>

                                                    @foreach($receivedGoodUsedList  as $receivedGoodLists)
                                                        <tr>
                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($receivedGoodLists->organization_usage_volume) }}</td>
                                                            <td>{!! $receivedGoodLists->person_detail !!}</td>
                                                            <td>
                                                                {!! $receivedGoodLists->details_of_any_goods_sold !!}

                                                                @if(empty($receivedGoodLists->bureau_approval_file_goods_sold))

                                                                @else
                                                                ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
                                                                'title' =>'bureau_approval_file_goods_sold',
                                                                 'id' => $receivedGoodLists->id
                                                              ]
                                                         ) }}" class="btn btn-success btn-sm">
                                                         <i class="fa fa-file-pdf-o"></i>
                                                       </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                            {!! $receivedGoodLists->goods_transferred_detail !!}

                                                            @if(empty($receivedGoodLists->bureau_approval_file_transferred_detail))

                                                            @else
                                                            ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
                                                                'title' =>'bureau_approval_file_transferred_detail',
                                                                 'id' => $receivedGoodLists->id
                                                              ]
                                                         ) }}" class="btn btn-success btn-sm">
                                                         <i class="fa fa-file-pdf-o"></i>
                                                       </a>
                                                            @endif
                                                            </td>
                                                            <td>
                                                            {!! $receivedGoodLists->detail_of_goods_medium !!}

                                                            @if(empty($receivedGoodLists->bureau_approval_file_goods_medium))

                                                            @else
                                                            ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
                                                                'title' =>'bureau_approval_file_goods_medium',
                                                                 'id' => $receivedGoodLists->id
                                                              ]
                                                         ) }}" class="btn btn-success btn-sm">
                                                         <i class="fa fa-file-pdf-o"></i>
                                                       </a>
                                                            @endif
                                                            </td>
                                                            <td>{!! $receivedGoodLists->details_of_remaining_goods !!}</td>


                                                        </tr>
                                                    @endforeach

                                                    </table>

                                                </div>


                                </td>


                                    </tr>


                                    <!-- step three end -->

                                </table>
                        </div>
                        </div>


<!-- new code start --->

<div class="d-flex justify-content-between mt-3">
    <div class="">


    </div>
    <div class="">

        @if($fdFiveForm->status == 'Ongoing')


        @else


        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন " onclick="editTag({{ $fdFiveForm->id}})" class="btn btn-info">
            দাখিল করুন  <i class="fa fa-send-o"></i>
        </button>

            <form id="delete-form-{{ $fdFiveForm->id }}" action="{{ route('fdFiveFormSend',base64_encode($fdFiveForm->id)) }}" method="get" style="display: none;">

                @csrf


            </form>



        @endif




    </div>
</div>

<!-- new code end -->

                    </div>
                </div>
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
