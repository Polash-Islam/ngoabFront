@extends('front.master.master')

@section('title')
    {{ trans('header.reg')}} | {{ trans('header.ngo_ab')}}
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
                        <h1 class="mb-4 ms-1">{{ trans('header.registration_for_ngo') }}</h1>
                        <form method="post" action="{{ route('register.post') }}" id="form" data-parsley-validate="">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="form-control custom-input @error('name') is-invalid @enderror"
                                       placeholder="{{ trans('header.person_name')}}">
                                @error('name')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" value="{{ old('email') }}"
                                       class="form-control @error('name') is-invalid @enderror custom-input"
                                       name="email" data-parsley-length=“[10,32]”
                                       maxlength="32" id="email" data-parsley-type=“email”
                                       data-parsley-trigger=“keyup” aria-describedby="emailHelp"
                                       placeholder="{{ trans('header.email')}}">
                                <small id="show_order_by_price"></small>
                                @error('email')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" autocomplete="off"
                                       class="form-control @error('password') is-invalid @enderror custom-input"
                                       data-parsley-length=“[5,32]” maxlength="32" data-parsley-trigger=“keyup”
                                       name="password" id="password"
                                       placeholder="{{ trans('header.password')}}">
                                @error('password')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" autocomplete="off"
                                       class="form-control @error('password') is-invalid @enderror custom-input"
                                       data-parsley-length=“[5,32]” maxlength="32" data-parsley-equalto="#password"
                                       data-parsley-trigger=“keyup” name="cpassword" id="cpassword"
                                       placeholder="{{ trans('header.passwordc')}}">
                                <small id="p_result" style="color:red"></small>
                            </div>
                            <div class="mb-3">
                                <input type="number" value="{{ old('phone', request()->phone) }}" maxlength="11"
                                       data-parsley-minlength=“11” data-parsley-trigger=“keyup”
                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       class="form-control @error('phone') is-invalid @enderror custom-input"
                                       placeholder="{{ trans('header.phone_number')}}" name="phone" id="phone">
                                @error('phone')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="text" value="{{ old('web_address', request()->web_address) }}"
                                       class="form-control @error('web_address') is-invalid @enderror custom-input"
                                       placeholder="{{ trans('header.web_address')}}" name="web_address"
                                       id="web_address">
                                @error('web_address')
                                <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>

                            @if($systemInformation->reCaptcha_status_registration)
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display(['data-theme' => 'light']) !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger mt-1">@lang($message)</span>
                                @enderror
                            @endif

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-registration register-btn"
                                        id="final_button">{{ trans('header.reg1')}}</button>
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
        $("#email").keyup(function () {

            var pass = $(this).val();


            $.ajax({
                url: "{{ route('checkMailAlreadyRegisteredOrNot') }}",
                method: 'GET',
                data: {pass: pass},
                success: function (data) {
                    $("#show_order_by_price").html('');
                    $("#show_order_by_price").html(data);
                }
            });


            //alert(pass);
        });
    </script>


    <script>
        $("#password").keyup(function () {

            var pass = $(this).val();
            var pass_C = $('#cpassword').val();

            if (pass == pass_C) {
                $("#final_button").attr("disabled", false);
                $("#p_result").html("");
            } else {
                $("#final_button").attr("disabled", true);
                $("#p_result").html("password did not matched");
            }


            //alert(pass);
        });
    </script>


    <script>
        $("#cpassword").keyup(function () {

            var pass = $(this).val();
            var pass_C = $('#password').val();

            if (pass == pass_C) {
                $("#final_button").attr("disabled", false);
                $("#p_result").html("");
            } else {
                $("#final_button").attr("disabled", true);
                $("#p_result").html("password did not matched");
            }


            //alert(pass);
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {

                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },


                    cpassword: {
                        required: true
                    },

                    name: {
                        required: true
                    },

                    phone: {
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

                        name: {
                            required: " Name Field is required"
                        },

                        phone: {
                            required: "Mobile Number Field is required"
                        },


                    }
            });
        });
    </script>
@endsection
