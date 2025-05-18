@extends('front.master.master')

@section('title')
    {{ trans('main.Ngo_Type_And_Language')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
    <section>
        <div class="container">
            <form method="post" action="{{ route('ngoTypeAndLanguagePost') }}" id="form">
                @csrf
                <div class="form-card">
                    <div class="dashboard_box">
                        <div class="dashboard_left">

                            <ul>
                                @include('front.include.sidebar_dash')
                            </ul>

                        </div>

                        <div class="dashboard_right">
                            <div class="tofsil2_box mt-3">
                                @include('flash_message')
                                <h1>পেমেন্ট চালান ফাইল:</h1>
                                <div class="form-check ms-3">
                                    <p class="mb-2"><a href="{{ asset('/') }}public/PaymentChalan/chalan.pdf"
                                                       target="_blank">{{ trans('main.view_payment_chalan') }}</a></p>
                                    <p><a href="{{ asset('/') }}public/PaymentChalan/chalan.pdf" target="_blank">
                                            {{ trans('main.view_tax_chalan') }}
                                        </a></p>
                                </div>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('ngoAllRegistrationForm') }}"
                                   class="btn btn-registration">{{ trans('main.next')}}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
@endsection
