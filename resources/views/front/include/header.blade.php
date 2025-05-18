<div class="upper_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header_left_side">
                    @if(Session::get('locale') == 'en' ||  empty(session()->get('locale')))
                        <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png"
                                                            class="logo_img" alt="">
                            <h1> এনজিও বিষয়ক ব্যুরো</h1>
                        </a>

                    @else
                        <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png"
                                                            class="logo_img" alt="">
                            <h1>NGO Affairs Bureau</h1>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header_right_text">
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        <div class="row d-flex justify-content-end align-items-center">
                            <!-- Language Dropdown -->
                            <div class="col-md-7 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle button-sign lang_active_button"
                                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        {{ trans('header.bangla')}}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item {{ session()->get('locale') == 'en' ? 'dropdown_label_active' : '' }}" href="{{ route('changeLanguage','en') }}">{{ trans('header.bangla')}}</a></li>
                                        <li><a class="dropdown-item" {{ session()->get('locale') == 'sp' ? 'dropdown_label_active' : '' }} href="{{ route('changeLanguage','sp') }}">{{ trans('header.english') }}</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- User Dropdown -->

                            <div class="col-md-3 text-end">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <a href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <img @if(auth()->user()->user_image) src="{{ asset(auth()->user()->user_image) }}" @else src="{{ asset('public/default-image.jpg') }}" @endif alt="Profile"
                                                 class="profile-image">

                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li class="dropdown-header">
                                                <strong>{{ Auth::user()->user_name }}</strong><br>
                                                <small class="text-muted">{{ Auth::user()->email }}</small>
                                            </li>

                                            <li><a class="dropdown-item {{ Route::is('dashboard')  ? 'dropdown_label_active' : '' }}" href="{{ route('dashboard') }}">{{ trans('first_info.dash')}}</a></li>
                                            <li><a class="dropdown-item {{ Route::is('profile')  ? 'dropdown_label_active' : '' }}" href="{{ route('profile') }}">{{ trans('first_info.profile')}}</a></li>
                                            <li><a class="dropdown-item {{ Route::is('logout')  ? 'dropdown_label_active' : '' }}" href="{{ route('logout') }}">{{ trans('first_info.logout')}}</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="p-2">
                                        <a class="btn button-sign"
                                           href="{{ route('login') }}">{{ trans('header.sign_in')}}</a>
                                    </div>
                                @endif
                            </div>


                        </div>
                    @else
                        <div class="row d-flex justify-content-end align-items-center">
                            <!-- Language Dropdown -->
                            <div class="col-md-7 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle button-sign lang_active_button"
                                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        {{ trans('header.english') }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item {{ session()->get('locale') == 'en' ? 'dropdown_label_active' : '' }}" href="{{ route('changeLanguage','en') }}">{{ trans('header.bangla')}}</a></li>
                                        <li><a class="dropdown-item {{ session()->get('locale') == 'sp' ? 'dropdown_label_active' : '' }}" href="{{ route('changeLanguage','sp') }}">{{ trans('header.english') }}</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- User Dropdown -->

                            <div class="col-md-3 text-end">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <a href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <img @if(auth()->user()->user_image) src="{{ asset(auth()->user()->user_image) }}" @else src="{{ asset('public/default-image.jpg') }}" @endif alt="Profile"
                                                 class="profile-image">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li class="dropdown-header">
                                                <strong>{{ Auth::user()->user_name }}</strong><br>
                                                <small class="text-muted">{{ Auth::user()->email }}</small>
                                            </li>
                                            <li><a class="dropdown-item {{ Route::is('dashboard')  ? 'dropdown_label_active' : '' }}" href="{{ route('dashboard') }}">{{ trans('first_info.dash')}}</a></li>
                                            <li><a class="dropdown-item {{ Route::is('profile')  ? 'dropdown_label_active' : '' }}" href="{{ route('profile') }}">{{ trans('first_info.profile')}}</a></li>
                                            <li><a class="dropdown-item {{ Route::is('logout')  ? 'dropdown_label_active' : '' }}" href="{{ route('logout') }}">{{ trans('first_info.logout') }}</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="p-2">
                                        <a class="btn button-sign"
                                           href="{{ route('login') }}">{{ trans('header.sign_in')}}</a>
                                    </div>
                                @endif
                            </div>


                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

