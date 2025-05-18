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
                                <h1>{{ trans('main.wellcome2')}}</h1>
                                <div class="tofsil2_list">
                                    <div class="mb-4">
                                        <label for="" class="form-label">{{ trans('main.origin')}} <span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <div class="form-check ms-3">
                                            <input class="form-check-input ngoType" data-parsley-checkmin="1" required
                                                   type="radio" name="ngo_origin" checked id="ngo_origin1"
                                                   value="দেশিও">
                                            <label class="form-check-label"
                                                   for="ngo_origin1">{{ trans('main.ll')}}
                                            </label>
                                        </div>
                                        <div class="form-check ms-3">
                                            <input class="form-check-input ngoType" data-parsley-checkmin="1" required
                                                   type="radio" name="ngo_origin" id="ngo_origin2" value="Foreign">
                                            <label class="form-check-label"
                                                   for="ngo_origin2">{{ trans('main.ff')}}</label>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        {{--                        <label for="" class="form-label">{{ trans('header.ngo_type')}} <span class="text-danger">*</span> </label>--}}
                                        {{--                        <br>--}}
                                        {{--                        <div class="form-check ms-3">--}}
                                        {{--                            <input class="form-check-input ngoTypen" data-parsley-checkmin="1" required type="radio" name="ngo_type"   id="ngo_origin11" value="Old" >--}}
                                        {{--                            <label class="form-check-label" for="ngo_origin11">{{ trans('header.old')}} </label>--}}
                                        {{--                        </div>--}}

                                        <div class="deshi-registration-fee">
                                            <div class="invoice-box">
                                                <h4>{{ trans('header.ngo_nibondhon_fee_text') }}</h4>
                                                <table>
                                                    <tr class="heading">
                                                        <td>{{ trans('header.biboron') }}</td>
                                                        <td>{{ trans('header.poriman') }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('header.bd_ngo') }}</td>
                                                        <td>{{ trans('header.ngo_nibondhon_fee') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('header.bd_vat') }}
                                                            ({{ trans('header.bd_vat_percent') }})
                                                        </td>
                                                        <td>৭,৫০০</td>
                                                    </tr>
                                                    <tr class="total">
                                                        <td>{{ trans('header.bd_total_payable_amount_text') }}</td>
                                                        <td>{{ trans('header.bd_total_payable_amount') }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="foreign-registration-fee d-none">
                                            {{--
                                                         <div class="card" style="width: 50%">
                                                                                            <div
                                                                                                class="card-header">{{ trans('header.ngo_nibondhon_fee_text') }}</div>
                                                                                            <div class="card-body">
                                                                                                <table class="table table-borderless">
                                                                                                    <tbody>
                                                                                                    <tr>
                                                                                                        <td>{{ trans('header.foreign_ngo') }}</td>
                                                                                                        <td>{{ trans('header.foreign_ngo_nibondhon_fee') }} </td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>{{ trans('header.bd_vat') }} </td>
                                                                                                        <td><span
                                                                                                                class="text-success">{{ trans('header.bd_vat_percent') }}</span> {{ trans('header.foreign_vat_percent_amount') }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>{{ trans('header.bd_total_payable_amount_text') }} </td>
                                                                                                        <td>{{ trans('header.foreign_total_payable_amount') }} </td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                            --}}

                                            <div class="invoice-box">
                                                <h4>{{ trans('header.ngo_nibondhon_fee_text') }}</h4>
                                                <table>
                                                    <tr class="heading">
                                                        <td>{{ trans('header.biboron') }}</td>
                                                        <td>{{ trans('header.poriman') }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('header.foreign_ngo') }}</td>
                                                        <td>{{ trans('header.foreign_ngo_nibondhon_fee') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('header.bd_vat') }}
                                                            ({{ trans('header.bd_vat_percent') }})
                                                        </td>
                                                        <td>{{ trans('header.foreign_vat_percent_amount') }} </td>
                                                    </tr>
                                                    <tr class="total">
                                                        <td>{{ trans('header.bd_total_payable_amount_text') }}</td>
                                                        <td>{{ trans('header.foreign_total_payable_amount') }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="form-check ms-3">
                                            <input class="form-check-input ngoTypen opacity-0" data-parsley-checkmin="1"
                                                   required type="radio" checked name="ngo_type" id="ngo_origin22"
                                                   value="New">
                                            {{--                            <label class="form-check-label" for="ngo_origin22">{{ trans('header.new')}}</label>--}}
                                        </div>
                                    </div>

                                    {{--<div id="showHideData">--}}
                                    {{--                    <div class="mb-4">--}}
                                    {{--                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.reg_number')}} <span class="text-danger">*</span> </label>--}}
                                    {{--                        <input type="text" class="form-control"   data-parsley-length=“[3,60]” maxlength="60"   data-parsley-pattern=“[a-zA-Z]+$” data-parsley-trigger=“keyup” name="reg_number" id="name">--}}
                                    {{--                    </div>--}}

                                    {{--                    <div class="mb-4">--}}
                                    {{--                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.last_renew_date1')}}<span class="text-danger">*</span> </label>--}}
                                    {{--                        <input type="text" class="form-control datepickerOne"   name="ngo_registration_date" >--}}
                                    {{--                    </div>--}}

                                    {{--                    <div class="mb-4">--}}
                                    {{--                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.last_renew_date')}} <span class="text-danger">*</span> </label>--}}
                                    {{--                        <input type="text" class="form-control datepickerOne"   name="last_renew_date" >--}}
                                    {{--                    </div>--}}
                                    {{--</div>--}}


                                    {{-- <div class="mb-4">
                                        <label for="" class="form-label">{{ trans('main.lan')}} <span class="text-danger">*</span> </label>
                                        <br>
                                        <div class="form-check ms-3">
                                            <input class="form-check-input changeLang" type="radio" data-parsley-checkmin="1" required name="input_language" id="input_language1" value="en" checked >
                                            <label class="form-check-label" for="input_language1">{{ trans('main.bangla')}}</label>
                                        </div>
                                        <div class="form-check ms-3">
                                            <input class="form-check-input changeLang" data-parsley-checkmin="1" required type="radio" name="input_language" id="input_language2" value="sp" >
                                            <label class="form-check-label" for="input_language2">{{ trans('main.English')}} </label>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                {{--                                <a href="{{ route('doCheckout') }}" class="btn btn-registration">{{ trans('main.pay')}}--}}
                                {{--                                </a>--}}
                                <button type="submit" class="btn btn-registration">{{ trans('main.pay')}}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>

        // $(document).on('click', '.ngoTypen', function(){
        //
        //     var radioValue = $("input[name='ngo_type']:checked").val();
        //
        //     if(radioValue == 'Old'){
        //         $("#showHideData").show();
        //     }else{
        //         $("#showHideData").hide();
        //
        //     }
        //
        // });
        ////////////

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
