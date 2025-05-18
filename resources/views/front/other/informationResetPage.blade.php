@extends('front.master.master')

@section('title')
{{ trans('main.Frequently_Ask_Question')}} | {{ trans('header.ngo_ab')}}
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
                    <div class="tofsil2_box mt-3">
                        <h1>{{ trans('reset.data')}}</h1>
                        <div class="tofsil2_list">
                            <h3>{{ trans('reset.tone')}}</h3>
                            <p class="small">{{ trans('reset.ttwo')}}</p>
                            <form action="">
                                <div class="mb-4">
                                    <label for="" class="form-label">{{ trans('reset.select')}}</label>
                                    <br>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="mm" id="mm1" value="" checked>
                                        <label class="form-check-label"  for="mm1">{{ trans('reset.yes')}}</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input " type="radio" name="mm" id="mm2" value="">
                                        <label class="form-check-label" for="mm2">{{ trans('reset.no')}}</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="d-grid d-md-flex justify-content-start mt-4">
                        <button class="btn btn-registration" onclick="deleteTag(2)" >{{ trans('reset.delete')}}
                        </button>

                        <form id="delete-form-2" action="{{ route('resetAllData') }}" method="POST" style="display: none;">

                            @csrf

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
@endsection
