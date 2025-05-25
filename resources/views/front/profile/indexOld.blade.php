@extends('front.master.master')

@section('title')
    {{ trans('first_info.profile')}} | {{ trans('header.ngo_ab')}}
@endsection

@push('custom_css')

@endpush

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

                    <div class="profile_right">
                        <div class="page-header">
                            <h2 class="pt-2">{{ trans('first_info.ngo_profile_text') }}</h2>

                            <div class="tabs">
                                <button class="tab-btn active"
                                        data-tab="tab1">{{ trans('first_info.profile_info') }}</button>
                                <button class="tab-btn" data-tab="tab2">{{ trans('first_info.account_info') }}</button>
                            </div>

                            <div class="tab-content active" id="tab1">
                                <div class="profile-container">
                                    <div class="profile-left">
                                        <img
                                            @if(auth()->user()->user_image) src="{{ asset(auth()->user()->user_image) }}"
                                            @else src="{{ asset('public/default-image.jpg') }}" @endif >
                                    </div>

                                    <div class="profile-right">
                                        @include('flash_message')
                                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                                              enctype="multipart/form-data" data-parsley-validate="">
                                            @csrf
                                            <div class="profile-form-group">
                                                <label for="name">{{ trans('header.person_name')}}</label>
                                                <input type="text" data-parsley-required name="name" id="name"
                                                       value="{{ Auth::user()->user_name }}">
                                            </div>
                                            <div class="profile-form-group">
                                                <label for="email">{{ trans('header.email')}}</label>
                                                <input type="email" data-parsley-required name="email" id="email"
                                                       value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="profile-form-group">
                                                <label for="phone">{{ trans('header.phone_number')}}</label>
                                                <input type="number" data-parsley-required name="phone" id="phone"
                                                       value="{{ Auth::user()->user_phone }}">
                                            </div>
                                            <div class="profile-form-group">
                                                <label for="web_address">{{ trans('header.web_address')}} <span
                                                        class="text-danger" style="font-size: 12px">(<sub>optional</sub>)</span></label>
                                                <input type="text" name="web_address" id="web_address"
                                                       value="{{ Auth::user()->web_address }}" placeholder="website">
                                            </div>
                                            <div class="profile-form-group">
                                                <label for="reg_id">{{ trans('fd_one_step_one.Address')}}</label>
                                                <input type="text" data-parsley-required name="address" id="address"
                                                       value="{{ Auth::user()->user_address }}"
                                                       placeholder="address here..">
                                            </div>
                                            <div class="profile-form-group">
                                                <label for="ngo_logo">{{ trans('ngo_member_doc.image')}}</label>
                                                <input type="file" data-parsley-required name="ngo_logo" id="ngo_logo">
                                            </div>
                                            <button type="submit"
                                                    class="update-btn">{{ trans('first_info.update1')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" id="tab2">
                                <div class="account-info">
                                    <form action="{{ route('bank.account.update', Auth::user()->id) }}" method="POST"
                                          enctype="multipart/form-data" data-parsley-validate="">
                                        @csrf
                                        <div class="profile-form-group">
                                            <label for="name">{{ trans('fd_one_step_four.name_of_bank')}}</label>
                                            <select class="form-control" data-parsley-required name="bank_id">
                                                <option selected disabled>
                                                    -- {{ trans('fd_one_step_four.SelectBank') }}</option>
                                                @foreach($banks as $key => $bank)
                                                    @if(App::getLocale() == 'en')
                                                        <option
                                                            value="{{ $bank->id }}" {{ isset($bankAccountInfo) && $bankAccountInfo->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name_bn }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $bank->id }}" {{ isset($bankAccountInfo) && $bankAccountInfo->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name_en}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="profile-form-group">
                                            <label
                                                for="account_number">{{ trans('fd_one_step_four.account_number')}}</label>
                                            <input type="text" data-parsley-required name="account_number"
                                                   id="account_number"
                                                   value="{{ old('account_number', isset($bankAccountInfo) ? $bankAccountInfo->account_number : '') }}">
                                        </div>

                                        <div class="profile-form-group">
                                            <label
                                                for="account_type">{{ trans('fd_one_step_four.account_type')}}</label>
                                            <input type="text" data-parsley-required name="account_type"
                                                   id="account_type"
                                                   value="{{ old('account_type', isset($bankAccountInfo) ? $bankAccountInfo->account_type : '') }}">
                                        </div>

                                        <div class="profile-form-group">
                                            <label
                                                for="branch_name">{{ trans('fd_one_step_four.branch_name_of_bank')}}</label>
                                            <input type="text" data-parsley-required name="branch_name" id="branch_name"
                                                   value="{{ old('branch_name', isset($bankAccountInfo) ? $bankAccountInfo->branch_name : '') }}">
                                        </div>

                                        <div class="profile-form-group">
                                            <label
                                                for="bank_address">{{ trans('fd_one_step_four.bank_address')}}</label>
                                            <input type="text" data-parsley-required name="bank_address"
                                                   id="bank_address"
                                                   value="{{ old('bank_address', isset($bankAccountInfo) ? $bankAccountInfo->bank_address : '') }}">
                                        </div>

                                        <button type="submit"
                                                class="update-btn">{{ trans('first_info.update1')}}</button>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-content" id="tab3">
                                {{-- আপনার Documents upload --}}
                                <p>এখানে Document ফর্ম থাকবে</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('custom_scripts')

    <script>
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.dataset.tab;

                // Tab button active class
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Tab content toggle
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(tab).classList.add('active');
            });
        });
    </script>

@endpush
