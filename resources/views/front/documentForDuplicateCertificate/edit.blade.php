@extends('front.master.master')

@section('title')
ডুপ্লিকেট সনদপত্রের জন্য আবেদন | {{ trans('header.ngo_ab')}}
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

                        <form method="post" action="{{ route('duplicateCertificate.update',$documentForDuplicateCertificate->id) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
@method('PUT')
                            <div class="card mb-3">
                                <div class="card-header">
                                    'নিবদ্ধন/নবায়নের 'ডুপ্লিকেট' সনদ প্রাপ্তির জন্য আবেদন ফি বাবদ-১৩,০০০/-(তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-১৮৩৬) চালানের কপি এবং ১৫% ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১)-প্রদানপূর্বক চালানের মুলকপিসহ <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control"  accept=".pdf" name="file_one" type="file" id="">

                                            <?php

                                            $file_path = url($documentForDuplicateCertificate->file_one);
                                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                            ?>
                                             <b>{{ $filename.'.'.$extension }}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    ০২টি জাতীয় পত্রিকায় (হারানো বা চুরি হওয়ার ক্ষেত্রে) বিজ্ঞাপনের (মূলকপিসহ) কপি<span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control"  accept=".pdf" name="file_two" type="file" id="">

                                            <?php

                                            $file_path = url($documentForDuplicateCertificate->file_two);
                                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                            ?>
                                             <b>{{ $filename.'.'.$extension }}</b>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    হারানো বা চুরি হওয়ার ক্ষেত্রে সংশ্লিষ্ট জেলা/উপজেলার থানায় দাখিলকৃত ডায়েরির (জিডি'র) কপি <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control"  accept=".pdf" name="file_three" type="file" id="">

                                            <?php

                                            $file_path = url($documentForDuplicateCertificate->file_three);
                                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                            ?>
                                             <b>{{ $filename.'.'.$extension }}</b>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    সনদপত্রের 'ডুপ্লিকেট' কপির জন্য নির্বাহী কমিটির সভার সত্যায়িত কার্যবিবরণীর (উপস্থিত সদস্যদের হাজিরাসহ) কপি <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control"  accept=".pdf" name="file_four" type="file" id="">


                                            <?php

                                            $file_path = url($documentForDuplicateCertificate->file_four);
                                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                            ?>
                                             <b>{{ $filename.'.'.$extension }}</b>


                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"
                                        >যুক্ত করুন
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
