@extends('front.master.master')

@section('title')
    {{ trans('ngo registration payment') }}
@endsection

@section('css')

@endsection

@section('body')

    <section>
        <div class="container">
            <div class="form-card">
                <div class="dashboard_box">
                    <div class="dashboard_left">
                        <ul>
                            @include('front.include.sidebar_dash')
                        </ul>
                    </div>
                    <div class="dashboard_right">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    {{ trans('main.paymentGatewayHeading') }}
                                </h2>
                            </div>
                            <div class="card-body p-5">
                                <div class="d-flex justify-content-center">
{{--                                    <i class="fa fa-check-circle confirmation_icon"--}}
{{--                                       style="font-size:105px !important;"></i>--}}
                                </div>
                                <div class="text-center">
                                    <form action="{{ route('doCheckout') }}" method="GET">
                                        <button type="submit" class="btn btn-success btn-sm">{{ trans('main.paymentGatewayButtonText') }}</button>
                                    </form>

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
