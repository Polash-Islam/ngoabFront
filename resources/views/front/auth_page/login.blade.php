@extends('front.master.master')

@section('title')
    {{ trans('header.Log_in')}}| {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
    <section>
        <div class="container">

            <div class="row g-4">
                <!-- Left Image -->
                <div class="col-md-6">
                    <img src="{{ asset('/') }}public/yy.jpg" alt="NGO Field Image" class="login-image">
                </div>

                <!-- Login Form -->
                <div class="col-md-6">
                    <div class="login-card shadow-sm">
                        <h1 class="ms-1">{{ trans('main.login_heading') }}</h1>
                        <p class="ms-1">{{ trans('main.sub_heading') }}</p>
                        <form method="post" action="{{ route('login.post') }}" id="form">
                            @csrf
                            <div class="mb-3">
                                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror custom-input" placeholder="Email" data-parsley-required
                                       data-parsley-length=“[10,32]” data-parsley-type=“email” data-parsley-trigger=“keyup”>
                                @error('email')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" autocomplete="off"
                                       data-parsley-length=“[5,32]” data-parsley-trigger=“keyup” class="form-control @error('password') is-invalid @enderror custom-input" placeholder="Password">
                                @error('password')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>

                            @if($systemInformation->reCaptcha_status_login)
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display(['data-theme' => 'light']) !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger mt-1">@lang($message)</span>
                                @enderror
                            @endif

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success second-login">{{ trans('main.login') }}</button>
                            </div>
                            <div class="d-flex justify-content-end" style="padding: 20px; padding-right: 0;">
                                <a href="{{ route('admin.password.request') }}" class="text-decoration-none" style="color : #1C1C1C">{{ trans('main.forgot_password') }}</a>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="javascript:void(0)" class="text-decoration-none" style="padding: 20px; color: #1C1C1C;">{{ trans('main.account') }}</a>
                                <a href="{{ route('register') }}" class="register-btn">{{ trans('main.new_account') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {

                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }


                },


                messages:
                    {

                        email: {
                            required: " Email Field is required"
                        },

                        password: {
                            required: "Password Field is required"
                        },


                    }
            });
        });
    </script>

@endsection
