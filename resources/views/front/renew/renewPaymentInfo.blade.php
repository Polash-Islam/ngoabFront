@extends('front.master.master')

@section('title')
    {{ trans('main.renew_payment_info')}} | {{ trans('header.ngo_ab')}}
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
                    @include('flash_message')
                    <form method="post" action="{{ route('ngoTypeAndLanguagePost') }}" id="form">
                        @csrf
                        <div class="form-card">
                            <div class="dashboard_box">
                                <div class="dashboard_right" style="width: 100%">
                                    <div class="tofsil2_box mt-3">
                                        <h1>{{ trans('main.renew_wellcome')}}</h1>
                                        <div class="mb-4">
                                            @if($mainNgoType == 'দেশিও')
                                                <div class="deshi-registration-fee">
                                                    <div class="invoice-box">
                                                        <h4>{{ trans('header.ngo_nobayon_fee_text') }}</h4>
                                                        <table>
                                                            <tr class="heading">
                                                                <td>{{ trans('header.biboron') }}</td>
                                                                <td>{{ trans('header.poriman') }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ trans('header.bd_ngo_nobayon') }}</td>
                                                                <td>{{ trans('header.ngo_nobayon_fee') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ trans('header.bd_vat') }}
                                                                    ({{ trans('header.bd_vat_percent') }})
                                                                </td>
                                                                <td>{{ trans('header.bd_vat_percent_amount_nobayon') }}</td>
                                                            </tr>
                                                            <tr class="total">
                                                                <td>{{ trans('header.bd_total_payable_amount_text') }}</td>
                                                                <td>{{ trans('header.bd_total_payable_amount_nobayon') }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="foreign-registration-fee">
                                                    <div class="invoice-box">
                                                        <h4>{{ trans('header.ngo_nobayon_fee_text') }}</h4>
                                                        <table>
                                                            <tr class="heading">
                                                                <td>{{ trans('header.biboron') }}</td>
                                                                <td>{{ trans('header.poriman') }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ trans('header.foreign_ngo_nobayon') }}</td>
                                                                <td>{{ trans('header.foreign_ngo_nobayon_fee') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ trans('header.bd_vat') }}
                                                                    ({{ trans('header.bd_vat_percent') }})
                                                                </td>
                                                                <td>{{ trans('header.foreign_vat_percent_amount_nobayon') }} </td>
                                                            </tr>
                                                            <tr class="total">
                                                                <td>{{ trans('header.bd_total_payable_amount_text') }}</td>
                                                                <td>{{ trans('header.foreign_total_payable_amount_nobayon') }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif





                                            <div class="form-check ms-3">
                                                <input class="form-check-input ngoTypen opacity-0" data-parsley-checkmin="1"
                                                       required type="radio" checked name="ngo_type" id="ngo_origin22"
                                                       value="New">
                                                {{--                            <label class="form-check-label" for="ngo_origin22">{{ trans('header.new')}}</label>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <a href="{{ route('renewPaymentCheckout') }}" class="btn btn-registration">{{ trans('main.pay')}}
                                        </a>
                                        {{--                                <button type="submit" class="btn btn-registration">{{ trans('main.pay')}}--}}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('change', '.ngoType', function () {
            var radioValue = $("input[name='ngo_origin']:checked").val();
            console.log(radioValue);

            if (radioValue == 'Foreign') {
                $('.deshi-registration-fee').addClass('d-none');
                $('.foreign-registration-fee').removeClass('d-none');
            } else {
                $('.deshi-registration-fee').removeClass('d-none');
                $('.foreign-registration-fee').addClass('d-none');
            }

        })

        // $(document).on('click', '.ngoType', function(){
        //
        //     var radioValue = $("input[name='ngo_origin']:checked").val();
        //
        //     //alert(radioValue);
        //
        //
        //     if(radioValue == 'Foreign'){
        //         $("#input_language1").prop('checked', false);
        //         $("#input_language2").prop('checked', true);
        //     }else{
        //         $("#input_language1").prop('checked', true);
        //         $("#input_language2").prop('checked', false);
        //
        //     }
        // });

        ///end new code
        $(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {

                    ngo_origin: {
                        required: true
                    },
                    input_language: {
                        required: true
                    }


                },


                messages:
                    {

                        ngo_origin: {
                            required: " Ngo Origin Field is required"
                        },

                        password: {
                            required: "Language Field is required"
                        },


                    }
            });
        });
    </script>
@endsection
