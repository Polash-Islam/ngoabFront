@extends('front.master.master')

@section('title')
{{ trans('main.home')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<!-- ======= Menu-box Section ======= -->
<section>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/application.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Apply_Online_For_New_NGO')}}</h1>
                            @if (Auth::check())
                            <p><a href="{{ route('dashboard') }}">{{ trans('main.sub_one')}}</a></p>
                            @else
                            <p><a href="{{ route('login') }}">{{ trans('main.sub_one')}}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/user-guide.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.NGO_Application_Instruction')}}</h1>
                            <p><a href="{{ route('ngoInstructionPage') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/search.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Application_Status_Update')}}</h1>
                            <p><a href="{{ route('statusPage') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/receipt.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.NGO_Registrations_Fees_Information')}}</h1>
                            <p><a href="{{ route('ngoRegistrationFeeList') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon ">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/question.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Frequently_Ask_Question')}}</h1>
                            <p><a href="{{ route('frequentlyAskQuestion') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Menu-box -->

<!-- ======= Others (Notice & Emergency Number) Section ======= -->

<section class="section_second">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
                <div class="notice_inner">
                    <h1>{{ trans('main.Notice_Board')}}</h1>
                    <div class="notice_underline"></div>
                    <ul class="notice_ul">
                        @foreach($noticeList as $allNoticeList)
                        <li> <a href="{{ route('viewNotice',$allNoticeList->id) }}" target="_blank">{{ $allNoticeList->headline }}</a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="d-flex flex-row-reverse">
                        <button onclick="location.href='{{ route('allNoticeBoard') }}';"  h class="noselect notice_button">All Notice</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="emergency_inner">
                    <img src="{{ asset('/') }}public/front/assets/img/emergency_number/National_Emergency_images.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Others (Notice & Emergency Number) -->

<!-- Demo header-->
{{-- <section>
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <button class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                        <i class="fa fa-user-circle-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{ trans('main.NGO_Registration_Process')}}</span>
                    </button>
                    <button class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{ trans('main.NGO_Name_Change')}}</span>
                    </button>
                    <button class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">
                        <i class="fa fa-star mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{ trans('main.review')}}</span>
                    </button>
                    <button class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                            aria-selected="false">
                        <i class="fa fa-check mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{ trans('main.Confirm_booking')}}</span>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        <h4 class="font-italic mb-4">{{ trans('main.NGO_Registration_Process')}}</h4>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/BKJOb8GXylk"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">{{ trans('main.NGO_Name_Change')}}</h4>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/BKJOb8GXylk"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">
                        <h4 class="font-italic mb-4">{{ trans('main.review')}}</h4>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/BKJOb8GXylk"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel"
                         aria-labelledby="v-pills-settings-tab">
                        <h4 class="font-italic mb-4">{{ trans('main.Confirm_booking')}}</h4>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/BKJOb8GXylk"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
</section> --}}
@endsection

@section('script')

@endsection
