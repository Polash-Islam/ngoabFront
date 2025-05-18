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
                                <p class="{{ Route::is('formEightData') || Route::is('nameChange') || Route::is('sendNameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
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
                        </div>
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
                    <div class="card-body">
                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                 <li class="active visited">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>নতুন নাম</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <p>ফর্ম-0৮</p>

                                </li>
                                <li>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    <p>কমিটি মেম্বার</p>

                                </li>
                                <li>
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <p>আইডি কার্ড এবং ছবি</p>

                                </li>
                                <li>
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>

                        <div class="committee_container">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="p-2">
                                    <h5>কমিটি মেম্বার</h5>
                                </div>
                                <div class="p-2">
                                    <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('formEightDataAdd') }}';">
                                        নতুন কমিটি মেম্বার যোগ করুন
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">

                                    <table class="table table-bordered mt-4 custom_table">
                                        <tr>
                                            <th>{{ trans('form 8_bn.sl')}}</th>
                                            <th>{{ trans('form 8_bn.name')}} & {{ trans('form 8_bn.designation')}}</th>
                                            <th>{{ trans('form 8_bn.date_of_birth')}}</th>
                                            <th>{{ trans('form 8_bn.address')}}</th>
                                            <th>{{ trans('form 8_bn.action')}}</th>

                                        </tr>
                                       @foreach($form_eight_list as $key=>$main_all_data_list)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $main_all_data_list->name }} <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                                {{ $main_all_data_list->desi }}
                                            </td>
                                            <td>

                                                <?php

    $newDate12 = date("d-m-Y", strtotime($main_all_data_list->dob ));

                                                    ?>

    @if(session()->get('locale') == 'en')


    {{ App\Http\Controllers\NGO\CommonController::englishToBangla($newDate12)}}


    @else

        {{ $newDate12 }}
    @endif

                                            </td>
                                            <td><span>{{ trans('form 8_bn.present_address')}}:</span>  {{ $main_all_data_list->present_address }} <br>
                                                <span>{{ trans('form 8_bn.permanent_address')}}:</span>  {{ $main_all_data_list->permanent_address }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="location.href = '{{ route('formEightDataEdit',$main_all_data_list->name_slug) }}';"><i
                                                                class="bi bi-pencil-fill"></i></button>



                                                    <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('formEightNgoCommitteMember.destroy',$main_all_data_list->id) }}" method="POST" style="display: none;">

                                                                    @csrf
                                                                    @method('DELETE')

                                                                </form>


                                                    <button id="member_id{{ $main_all_data_list->id }}" class="btn btn-success btn-sm" type="button"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasWithBothOptions"
                                                            aria-controls="offcanvasWithBothOptions"><i
                                                                class="bi bi-eye-fill"></i></button>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tr>
                                    </table>
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-registration me-3"
                                                onclick="location.href = '{{ route('sendNameChange') }}';">পূর্ববর্তী
                                        </button>
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('ngoCommitteMember') }}';">পরবর্তী
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<div class=" offcanvas offcanvas-end" style="width:40vw !important" data-bs-scroll="true" tabindex="-1"
     id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ trans('form 8_bn.personal_info')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="committee_profile" id="main_content_table">

        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

     //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberView') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
@endsection
