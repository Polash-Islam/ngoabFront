@extends('front.master.master')

@section('title')
নির্বাহী কমিটি অনুমোদনের জন্য আবেদন| {{ trans('header.ngo_ab')}}
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
                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
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
                        </div>
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
<div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <a href="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-dark">






                                        <a target="_blank"  href="{{route('executiveCommitteeApproval',['id'=>$documentForDuplicateCertificate->id,'title'=>'file_one'])}}" >
                                            ফরম নং-৮ মোতাবেক নির্বাহী কমিটির তালিকা (সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরিত)
                                       </a>








                                    </div>
                                </div>
                            </a>
                        </div>



                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <a href="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-dark">




                                        <a target="_blank"  href="{{route('executiveCommitteeApproval',['id'=>$documentForDuplicateCertificate->id,'title'=>'file_two'])}}" >
                                            নির্বাহী কমিটির সদস্যদের জাতীয় পরিচয়পত্রের সত্যায়িত কপি ও পাসপোর্ট সাইজের সত্যায়িত ছবি
                                       </a>








                                    </div>
                                </div>
                            </a>
                        </div>



                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <a href="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-dark">









                                       <a target="_blank"  href="{{route('executiveCommitteeApproval',['id'=>$documentForDuplicateCertificate->id,'title'=>'file_three'])}}" >
                                        প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির সত্যায়িত তালিকা
                                   </a>








                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <a href="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-dark">






                                       <a target="_blank"  href="{{route('executiveCommitteeApproval',['id'=>$documentForDuplicateCertificate->id,'title'=>'file_four'])}}" >
                                        নির্বাহ কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণী (হাজিরাসহ) সত্যায়িত কপি
                                       </a>




                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <a href="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-dark">






                                       <a target="_blank"  href="{{route('executiveCommitteeApproval',['id'=>$documentForDuplicateCertificate->id,'title'=>'file_five'])}}" >
                                        সর্বশেষ সাধারণ সদস্যদের স্বাক্ষরসহ নামের তালিকা (সদস্যের নাম, পিত/মাতার নাম, স্বামী/স্ত্রীর নাম, বর্তমান ও স্থায়ী ঠিকানা, জাতীয় পরিচয় পত্র নম্বর, মোবাইল নম্বর ও ইমেইল এড্রেসসহ)
                                       </a>




                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
