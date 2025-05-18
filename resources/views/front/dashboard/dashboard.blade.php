@extends('front.master.master')

@section('title')
    {{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

    @include('translate')
    <section>
        <div class="container">
            <div class="form-card">
                <div class="dashboard_box">
                    <div class="dashboard_left">
                        <ul>
                            @include('front.include.sidebar_dash')
                        </ul>
                    </div>
                    <div class="ngo_dashboard_right">
                        <div class="ngo-dashboard">
                            <div class="dashboard-content text-center">
                                <h2>
                                    {{ trans('first_info.welcome') }} {{ \Illuminate\Support\Facades\Auth::user()->user_name }}!
                                </h2>

                                @if(($form_complete_statuses && $form_complete_statuses->fd_one_form_step_one_status && $form_complete_statuses->fd_one_form_step_two_status && $form_complete_statuses->fd_one_form_step_three_status && $form_complete_statuses->fd_one_form_step_four_status) && ($form_complete_statuses && $form_complete_statuses->ngo_other_document_status) && ($first_one_form_check_status == 1))
                                    <p class="lead">
                                        {{ trans('first_info.reg_message2') }}
                                    </p>
                                @else
                                    <p class="lead">
                                        {{ trans('first_info.reg_message') }}
                                    </p>
                                @endif

                                @if(($form_complete_statuses && $form_complete_statuses->fd_one_form_step_one_status && $form_complete_statuses->fd_one_form_step_two_status && $form_complete_statuses->fd_one_form_step_three_status && $form_complete_statuses->fd_one_form_step_four_status) && ($form_complete_statuses && $form_complete_statuses->ngo_other_document_status) && ($first_one_form_check_status == 1))
                                    <p>
                                        <strong>{{ trans('first_info.ngo_tracking_number_text')}}:</strong>
                                        <span class="badge bg-primary">{{ $fdOneForm->registration_number_given_by_admin }}</span>
                                    </p>
                                @else
                                    <p>
                                        <strong>{{ trans('first_info.reg_status') }}:</strong>
                                        <span class="badge bg-danger">{{ trans('first_info.reg_status_badge') }}</span>
                                    </p>
                                @endif

                                @if(($form_complete_statuses && $form_complete_statuses->fd_one_form_step_one_status && $form_complete_statuses->fd_one_form_step_two_status && $form_complete_statuses->fd_one_form_step_three_status && $form_complete_statuses->fd_one_form_step_four_status) && ($form_complete_statuses && $form_complete_statuses->ngo_other_document_status) && ($first_one_form_check_status == 1))
                                    <a href="{{ route('statusPage') }}"
                                       class="nibondhon-btn">{{ trans('first_info.tracking_korun') }} </a>
                                @else

                                    <a href="{{ route('ngoAllRegistrationForm') }}"
                                       class="nibondhon-btn">{{ trans('first_info.nibondhon_btn_text') }} </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('first_info.update')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('register.update') }}" enctype="multipart/form-data" id="form"
                          data-parsley-validate="">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                   class="form-label">{{ trans('header.person_name')}}</label>
                            <input type="text" value="{{ Auth::user()->user_name }}" class="form-control" name="name"
                                   id="">

                            <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="id" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}}</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email"
                                   id="" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}}</label>
                            <input type="password" class="form-control" name="password" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                   class="form-label">{{ trans('header.phone_number')}}</label>
                            <input type="text" value="{{ Auth::user()->user_phone }}" class="form-control" name="phone"
                                   id="">
                            {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                   class="form-label">{{ trans('fd_one_step_one.Address')}}</label>
                            <input type="text" value="{{ Auth::user()->user_address }}" class="form-control"
                                   name="address" id="">
                            {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                   class="form-label">{{ trans('ngo_member_doc.image')}}</label>
                            <input type="file" value="" class="form-control" name="user_image" id="">
                            {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                            @if(empty(Auth::user()->user_image))
                                <img src="{{ asset('/') }}public/mainu.jpg" style="height:50px;"/>
                            @else
                                <img src="{{ asset('/') }}{{ Auth::user()->user_image }}" style="height:50px;"/>
                            @endif
                        </div>
                        <div class="d-grid d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-registration">{{ trans('first_info.update1')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
