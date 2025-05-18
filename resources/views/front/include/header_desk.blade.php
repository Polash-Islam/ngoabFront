<div class="main_header">
    <div class="container">
        <div class="header_body">
            <div class="d-flex justify-content-center">

                <div class="header_box {{ request()->routeIs('index') ? 'active' : '' }}">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/home.png" alt="">
                        <h3>{{ trans('header.home') }}</h3>
                    </a>
                </div>

                <div class="header_box {{ request()->routeIs('ngoInstructionPageApply') ? 'active' : '' }}">
                    <a href="{{ route('ngoInstructionPageApply') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/apply_online.png" alt="">
                        <h3>{{ trans('header.apply_online') }}</h3>`
                    </a>
                </div>

                @if (Auth::check())
                    @php
                        $fdoneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');
                        $ngo_status_list = DB::table('ngo_statuses')->where('fd_one_form_id', $fdoneFormId)->value('status');
                    @endphp
                @endif

                <div class="header_box {{ request()->routeIs('ngoInstructionPageaRenew') ? 'active' : '' }}">
                    <a href="{{ route('ngoInstructionPageaRenew') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application') }}</h3>
                    </a>
                </div>

                <div class="header_box {{ request()->routeIs('ngoInstructionPageNameChange') ? 'active' : '' }}">
                    <a href="{{ route('ngoInstructionPageNameChange') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change') }}</h3>
                    </a>
                </div>

                <div class="header_box {{ request()->routeIs('ngoInstructionPage') ? 'active' : '' }}">
                    <a href="{{ route('ngoInstructionPage') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/instruction.png" alt="">
                        <h3>{{ trans('header.instruction') }}</h3>
                    </a>
                </div>

                <div class="header_box {{ request()->routeIs('ngoRegistrationFeeList') ? 'active' : '' }}">
                    <a href="{{ route('ngoRegistrationFeeList') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/fees.png" alt="">
                        <h3>{{ trans('header.registration_fee') }}</h3>
                    </a>
                </div>

                <div class="header_box {{ request()->routeIs('statusPage') ? 'active' : '' }}">
                    <a href="{{ route('statusPage') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/status.png" alt="">
                        <h3>{{ trans('header.check_status') }}</h3>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
