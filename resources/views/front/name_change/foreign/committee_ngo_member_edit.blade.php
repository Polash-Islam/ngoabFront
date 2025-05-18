@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('ngoCommitteMemberEdit') || Route::is('nameChange') || Route::is('sendNameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
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
                @include('flash_message')
                <div class="card">
                    <div class="card-header">
                        {{ trans('ngo_member.ngo_member')}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoCommitteMemberUpdate') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name')}}</label>
                                <input type="text" name="name" value="{{ $all_data_list->member_name }}"  class="form-control" id="">

                                <input type="hidden" name="id" value="{{ $all_data_list->id }}"  class="form-control" id="">

                            </div>
                           <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.designation')}}</label>
                                <input type="text" name="desi" value="{{ $all_data_list->member_designation }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}}</label>
                                <input type="text" name="dob" value="{{ $all_data_list->member_dob }}" class="form-control" id="datepicker">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}}</label>
                                <input type="text" name="nid_no" value="{{ $all_data_list->member_nid_no }}"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}}</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" name="phone" value="{{ $all_data_list->member_mobile }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}}</label>
                                <input type="text" name="father_name" value="{{ $all_data_list->member_father_name }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.present_address')}}</label>
                                <input type="text" value="{{ $all_data_list->member_present_address }}" class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                          rows="2"/>



                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}}</label>
                                <input type="text" class="form-control" value="{{ $all_data_list->member_permanent_address }}" name="permanent_address"   id="exampleFormControlTextarea1"
                                          rows="2"/>


                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}}</label>
                                <input type="text" name="name_supouse" value="{{ $all_data_list->member_name_supouse }}" class="form-control" id="">
                            </div>
                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Educational Qualification</label>
                                <input type="text" name="edu_quali" value="{{ $all_data_list->edu_quali }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Profession</label>
                                <select class="form-control" name="profession"  id="">
                                    <option value="Govt./Semi Govt./Govt Autonomous" {{ $all_data_list->profession == 'Govt./Semi Govt./Govt Autonomous' ? 'selected':'' }}>Govt./Semi Govt./Govt Autonomous</option>
                                    <option value="Private Service" {{ $all_data_list->profession == 'Private Service' ? 'selected':'' }}>Private Service</option>
                                    <option value="Self Service"{{ $all_data_list->profession == 'Self Service' ? 'selected':'' }}>Self Service</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Description of Job</label>
                                <input type="text" name="job_des" value="{{ $all_data_list->job_des }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Member of Service Holder of Any Other
                                    NGO</label>
                                <select class="form-control" name="service_status" id="">
                                    <option value="YES" {{ $all_data_list->profession == 'YES' ? 'selected':'' }}>YES</option>
                                    <option value="NO" {{ $all_data_list->profession == 'NO' ? 'selected':'' }}>NO</option>
                                </select>
                            </div> --}}

                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Signature</label>
                                <input type="file" accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">

                                <img src="{{ asset('/') }}{{ $all_data_list->image  }}" style="height:50px;" />
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" name="main_date" value="{{ $all_data_list->main_date }}" class="form-control" id="">
                            </div> --}}
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}
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
