<div class="registration_box">
    <div class="registration_inner_box">
        <h1>{{ trans('header.step')}}: {{ trans('header.tt_one')}}</h1>
        <form method="post" action="{{ route('register.post') }}" id="form" data-parsley-validate="">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}} <span
                        class="text-danger">*</span> </label>
                <input type="text" class="form-control" required data-parsley-length=“[3,60]” maxlength="60"
                       data-parsley-pattern=“[a-zA-Z]+$” data-parsley-trigger=“keyup” name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}} <span
                        class="text-danger">*</span> </label>
                <input type="email" class="form-control" name="email" data-parsley-length=“[10,32]”
                       maxlength="32" id="email" required data-parsley-type=“email”
                       data-parsley-trigger=“keyup” aria-describedby="emailHelp">
                <small id="show_order_by_price"></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}} <span
                        class="text-danger">*</span> </label>
                <input type="password" autocomplete="off" class="form-control" required
                       data-parsley-length=“[5,32]” maxlength="32" data-parsley-trigger=“keyup”
                       name="password" id="password">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('header.passwordc')}} <span
                        class="text-danger">*</span> </label>
                <input type="password" autocomplete="off" class="form-control" required
                       data-parsley-length=“[5,32]” maxlength="32" data-parsley-equalto="#password"
                       data-parsley-trigger=“keyup” name="cpassword" id="cpassword">
                <small id="p_result" style="color:red"></small>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}}
                    <span class="text-danger">*</span> </label>
                <input
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    type="number"
                    maxlength="11" class="form-control" name="phone" id="phone" required
                    data-parsley-minlength=“11” data-parsley-trigger=“keyup”>
                {{-- <div id="" class="form-text">{{ trans('header.sm')}}</div> --}}
            </div>

            @if($systemInformation->reCaptcha_status_registration)
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display(['data-theme' => 'light']) !!}
                @error('g-recaptcha-response')
                <span class="text-danger mt-1">@lang($message)</span>
                @enderror
            @endif

            <div class="d-grid d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-registration"
                        id="final_button">{{ trans('header.reg1')}}</button>
            </div>
        </form>
    </div>
</div>
