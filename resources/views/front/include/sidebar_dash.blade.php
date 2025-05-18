<li class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><a href="{{ route('dashboard') }}"> <i
            class="fa fa-home pe-1 dashboard_icon" aria-hidden="true"></i>{{ trans('first_info.dash')}}</a></li>


<li class="{{ Route::is('profile')  ? 'active_link' : '' }}"><a href="{{ route('profile') }}"> <i
            class="fa fa-user pe-1" aria-hidden="true"></i>{{ trans('first_info.profile')}}</a></li>

<?php


$ngo_type = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');


?>

@if(empty($ngo_type))

    @if(Route::is('ngo_registration_first_info'))
        <li class="{{ Route::is('ngo_registration_first_info')  ? 'active_link' : '' }}"><a
                href="{{ route('ngo_registration_first_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                      aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>

    @elseif(Route::is('ngo_registration_second_info'))
        <li class="{{ Route::is('ngo_registration_second_info')  ? 'active_link' : '' }}"><a
                href="{{ route('ngo_registration_second_info') }}"> <i
                    class="fa fa-file-excel-o pe-1 dashboard_icon"
                    aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('ngoTypeAndLanguage'))
        <li class="{{ Route::is('ngoTypeAndLanguage')  ? 'active_link' : '' }}"><a
                href="{{ route('ngoTypeAndLanguage') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                             aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('dashboard'))

        <li class="{{ Route::is('ngoTypeAndLanguage')  ? 'active_link' : '' }}"><a
                href="{{ route('ngoTypeAndLanguage') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                             aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('profile'))
        <li class="{{ Route::is('ngoTypeAndLanguage')  ? 'active_link' : '' }}"><a
                href="{{ route('ngoTypeAndLanguage') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                             aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('ngoAllRegistrationForm'))
        <li class="{{ Route::is('ngoAllRegistrationForm')  ? 'active_link' : '' }}"><a
                href="{{ route('ngoAllRegistrationForm') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                 aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('informationResetPage'))
        <li><a href="{{ route('ngoAllRegistrationForm') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('regSubmitList'))
        <li class=""><a href="{{ route('ngoAllRegistrationForm') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                         aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @endif

@else
    @if(Route::is('ngo_registration_first_info'))
        <li class="{{ Route::is('ngo_registration_first_info')  ? 'active_link' : '' }}"><a
                href="{{ route('ngo_registration_first_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                      aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('ngo_registration_second_info'))
        <li class="{{ Route::is('ngo_registration_second_info')  ? 'active_link' : '' }}"><a
                href="{{ route('ngo_registration_second_info') }}"> <i
                    class="fa fa-file-excel-o pe-1 dashboard_icon"
                    aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @elseif(Route::is('ngoAllRegistrationForm'))
        <li class="{{ Route::is('ngoAllRegistrationForm')  ? 'active_link' : '' }}"><a
                href="{{ route('ngoAllRegistrationForm') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                 aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
            </a></li>
    @else
        @if(Route::is('dashboard'))
            <li class=""><a href="{{ route('ngoAllRegistrationForm') }}"> <i
                        class="fa fa-file-excel-o pe-1 dashboard_icon"
                        aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
        @elseif(Route::is('regSubmitList'))

            <li class=""><a href="{{ route('ngoAllRegistrationForm') }}"> <i
                        class="fa fa-file-excel-o pe-1 dashboard_icon"
                        aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
        @else
            @if(Route::is('informationResetPage'))
                <li><a href="{{ route('ngoAllRegistrationForm') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon"
                                                                        aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}
                    </a></li>
            @else
                <li class="{{ Route::is('ngoAllRegistrationForm') ? 'active_link' : '' }}"><a
                        href="{{ route('ngoAllRegistrationForm') }}"> <i
                            class="fa fa-file-excel-o pe-1 dashboard_icon"
                            aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
            @endif
        @endif
    @endif

@endif

@if(empty($get_reg_id))
{{--    <li class="{{ Route::is('regSubmitList')  ? 'active_link' : '' }}"><a href="{{ route('regSubmitList') }}"> <i--}}
{{--                class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i>--}}

{{--            @if($foreignNgoType == 'Old')--}}
{{--                {{ trans('reg_sub.reg_sub1')}} aaa--}}
{{--            @else--}}
{{--                {{ trans('reg_sub.reg_sub')}} --}}

{{--            @endif--}}


{{--        </a></li>--}}
@else
{{--    <li class="{{ Route::is('regSubmitList')  ? 'active_link' : '' }}"><a href="{{ route('regSubmitList') }}"> <i--}}
{{--                class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i>--}}


{{--            @if($foreignNgoType == 'Old')--}}
{{--                {{ trans('reg_sub.reg_sub1')}}--}}
{{--            @else--}}
{{--                {{ trans('reg_sub.reg_sub')}}--}}

{{--            @endif--}}

{{--        </a></li>--}}

@endif

<?php

$ngoTypeForreset = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type_new_old');
?>

@if(empty($ngoTypeForreset))

@else

    @if($ngoTypeForreset == 'Old')

            <?php

            $fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

            $fdOneFormRenew = DB::table('ngo_renews')->where('fd_one_form_id', $fdOneFormId)->value('id');


            ?>

        @if(empty($fdOneFormRenew))
            <li class="{{ Route::is('informationResetPage')  ? 'active_link' : '' }}"><a
                    href="{{ route('informationResetPage') }}"> <i class="fa fa-cog pe-1 dashboard_icon"
                                                                   aria-hidden="true"></i>{{ trans('first_info.reset')}}
                </a></li>
        @endif

    @else

            <?php

            $fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

            $fdOneFormRenew = DB::table('ngo_statuses')->where('fd_one_form_id', $fdOneFormId)->value('id');


            ?>
        @if(empty($fdOneFormRenew))
            <li class="{{ Route::is('informationResetPage')  ? 'active_link' : '' }}"><a
                    href="{{ route('informationResetPage') }}"> <i class="fa fa-cog pe-1 dashboard_icon"
                                                                   aria-hidden="true"></i>{{ trans('first_info.reset')}}
                </a></li>
        @endif

    @endif
@endif

<li class="{{ Route::is('logout')  ? 'active_link' : '' }}"><a href="{{ route('logout') }}"> <i
            class="fa fa-sign-out pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.logout')}}</a></li>



