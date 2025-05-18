@extends('front.master.master')

@section('title')
    {{ trans('main.Ngo_Type_And_Language')}} | {{ trans('header.ngo_ab')}}
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
                        @include('front.include.acceptSidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12">
                    <div class="form-card">
                        <div class="dashboard_box">
                            <div class="dashboard_right">
                                <div class="tofsil2_box mt-3">
                                    @include('flash_message')
                                    <h1>{{ trans('main.payment_chalan') }}:</h1>
                                    <div class="form-check ms-3">
                                        <p class="mb-2"><a href="{{ asset('/') }}public/PaymentChalan/chalan.pdf"
                                                           target="_blank">{{ trans('main.view_payment_chalan') }}</a></p>
                                        <p><a href="{{ asset('/') }}public/PaymentChalan/chalan.pdf" target="_blank">
                                                {{ trans('main.view_tax_chalan') }}
                                            </a></p>
                                    </div>
                                </div>
                                <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                    <a href="{{ route('ngoRenewStepAdd') }}"
                                       class="btn btn-registration">{{ trans('main.next')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
