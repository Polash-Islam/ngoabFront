<!-- =======================================================
* Template Name: Plato - NGO Digital Management
* Author: MusaTechnology limited
* License: v1.1
======================================================== -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ResNova App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}public/front/assets/img/logo/logo.png">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('/') }}public/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/vendor/slick-slider/slick.css" rel="stylesheet">

{{--    <link href="{{ asset('/') }}public/front/assets/css/select2.min.css" rel="stylesheet">--}}
    <link href="{{ asset('/') }}public/front/assets/css/select2/select2.min.css" rel="stylesheet">

    {{--    <link href="{{ asset('/') }}public/front/assets/vendor/select2/css/select2.min.css" rel="stylesheet">--}}
    <link href="{{ asset('/') }}public/front/assets/css/select2.min.css" rel="stylesheet">

    @stack('css_lib')
    <!-- Template Main CSS File -->
    <link href="{{ asset('/') }}public/front/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/css/style2.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/css/responsive_style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/vendor/fontawesome4.7.0/css/font-awesome.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/nokshaia/angkur@latest/PublicFonts/Nikosh/stylesheet_Normal_DisplaySwap.css"/> --}}
    <style>


        /* body {
            font-family: 'Nikosh', serif !important;
        } */
        .swal2-confirm {

            margin-left: 20px;
        }

        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }

    </style>

    @stack('custom_css')
    <script src="{{ asset('/') }}public/front/assets/js/jquery_3.2.1.js"></script>
    @yield('css')

    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

    @if(Route::is('fd6StepFourEdit') || Route::is('fd6StepFour') || Route::is('fd6StepFiveEdit') || Route::is('fd6StepFive'))

    @else
        @if(session()->get('locale') == 'en')
            <script src="{{ asset('/')}}public/front/assets/parsely.js"></script>
        @else
            <script src="{{ asset('/')}}public/front/assets/parsely1.js"></script>
        @endif
    @endif
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <style>

        .parsley-required {

            margin-top: 10px;
        }

        .box {

            width: 100%;

            max-width: 600px;

            background-color: #f9f9f9;

            border: 1px solid #ccc;

            border-radius: 5px;

            padding: 16px;

            margin: 0 auto;

        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {

            color: #468847;

            background-color: #DFF0D8;

            border: 1px solid #D6E9C6;

        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {

            color: #B94A48;

            background-color: #F2DEDE;

            border: 1px solid #EED3D7;

        }


        .parsley-errors-list {

            margin: 2px 0 3px;

            padding: 0;

            list-style-type: none;

            font-size: 0.9em;

            line-height: 0.9em;

            opacity: 0;


            transition: all .3s ease-in;

            -o-transition: all .3s ease-in;

            -moz-transition: all .3s ease-in;

            -webkit-transition: all .3s ease-in;

        }


        .parsley-errors-list.filled {

            opacity: 1;

        }


        .error, .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length {

            color: #ff0000;

        }

        .progress {
            position: relative;
            width: 100%;
        }

        .bar {
            background-color: #24695c;
            width: 0%;
            height: 50px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: white;
        }

    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
@include('front.include.loader')
<!-- ======= Hero Section ======= -->

@include('front.include.header')

<!-- ======= Slider Section ======= -->

@if(Route::is('login') || Route::is('emailVerifyPage')  || Route::is('emailVerifiedPage')  || Route::is('checkStatusRegFrom')  || Route::is('statusPage') || Route::is('register') || Route::is('ngoInstructionPage') || Route::is('ngoRegistrationFeeList'))

    @if(Route::is('login'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও লগ ইন
                    @else
                        NGO Log In
                    @endif
                </h1>
                {{--      <h4>--}}
                {{--        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))--}}
                {{--			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম--}}
                {{--		@else--}}
                {{--        	NGO Affairs Bureau Digital Platform--}}
                {{--		@endif--}}
                {{--      </h4>--}}
            </div>
        </div>
    @elseif(Route::is('register'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও রেজিস্ট্রেশন
                    @else
                        Registration For NGO
                    @endif
                </h1>
                {{--      <h4>--}}
                {{--        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))--}}
                {{--			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম--}}
                {{--		@else--}}
                {{--        	NGO Affairs Bureau Digital Platform--}}
                {{--		@endif--}}
                {{--      </h4>--}}
            </div>
        </div>

    @elseif(Route::is('emailVerifyPage'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        ইমেল যাচাইকরণ
                    @else
                        Email Verification Page
                    @endif
                </h1>
                {{--      <h4>--}}
                {{--        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))--}}
                {{--			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম--}}
                {{--		@else--}}
                {{--        	NGO Affairs Bureau Digital Platform--}}
                {{--		@endif--}}
                {{--      </h4>--}}
            </div>
        </div>

    @elseif(Route::is('emailVerifiedPage'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        ইমেল যাচাই সম্পন্ন
                    @else
                        Email Verified
                    @endif
                </h1>
                {{--      <h4>--}}
                {{--        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))--}}
                {{--			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম--}}
                {{--		@else--}}
                {{--        	NGO Affairs Bureau Digital Platform--}}
                {{--		@endif--}}
                {{--      </h4>--}}
            </div>
        </div>

    @elseif(Route::is('checkStatusRegFrom'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        আবেদনের অবস্থান পর্যবেক্ষণ
                    @else
                        Application Status Check
                    @endif
                </h1>
                <h4>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
                    @else
                        NGO Affairs Bureau Digital Platform
                    @endif
                </h4>
            </div>
        </div>

    @elseif(Route::is('statusPage'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        আবেদনের অবস্থান ফলাফল
                    @else
                        Application Status Result
                    @endif
                </h1>
                <h4>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
                    @else
                        NGO Affairs Bureau Digital Platform
                    @endif
                </h4>
            </div>
        </div>

    @elseif(Route::is('ngoInstructionPage'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিওর সকল কার্যাবলীর নির্দেশনা
                    @else
                        NGO Instruction
                    @endif
                </h1>
                <h4>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
                    @else
                        NGO Affairs Bureau Digital Platform
                    @endif
                </h4>
            </div>
        </div>

    @elseif(Route::is('ngoRegistrationFeeList'))
        <div class="faq_header_box">
            <div class="container">
                <h1>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিওর নিবন্ধন ফি তালিকা
                    @else
                        NGO Registration Fee List
                    @endif
                </h1>
                <h4>
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
                    @else
                        NGO Affairs Bureau Digital Platform
                    @endif
                </h4>
            </div>
        </div>

    @endif

@elseif(Route::is('index'))
    @include('front.include.banner')
@elseif(Route::is('allNoticeBoard') || Route::is('viewNotice'))
    <div class="faq_header_box">
        <div class="container">
            <h1> নোটিশ বোর্ড </h1>

        </div>
    </div>
@elseif(Route::is('frequentlyAskQuestion'))

    <div class="faq_header_box">
        <div class="container">
            <h1>Help Center</h1>
            <h4>Everything you need to know about the NGO Registration or others information</h4>
        </div>
    </div>
@else

    <div class="faq_header_box">
        <div class="container">
            <h1>{{ trans('first_info.user_dash')}}</h1>
            {{-- <h4>User History</h4> --}}

        </div>
    </div>

@endif

<!-- End Slider -->

<!-- ======= Header Section ======= -->


@include('front.include.header_desk')

<!-- End Header -->

@yield('body')

<!-- Footer Section-->



@include('front.include.footer')


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->

<script src="{{ asset('/') }}public/front/assets/vendor/aos/aos.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/slick-slider/slick.js"></script>
{{--<script src="{{ asset('/') }}public/front/assets/js/select2.min.js"></script>--}}
<script src="{{ asset('/') }}public/front/assets/js/select2/select2.min.js"></script>
{{--<script src="{{ asset('/') }}public/front/assets/vendor/select2/js/select2.min.js"></script>--}}
<script src="{{ asset('/') }}public/front/assets/js/select2.min.js"></script>
<!-- Template Main JS File -->
<script src="{{ asset('/') }}public/front/assets/js/main.js"></script>
<script src="{{ asset('/') }}public/front/assets/js/custom_js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@stack('js_lib')
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $('.summernote').summernote();
    });
</script>
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ trans('notification.success_three')}}',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    '{{ trans('notification.success_six')}} :)',
                    'error'
                )
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> --}}
@include('front.firstTwoStep.fileSizeScript')
@yield('script')

@stack('custom_scripts')

<script>
    $(document).ready(function () {
        $('.decimal-number').on('input', function () {
            let val = $(this).val();
            // শুধুমাত্র সংখ্যা এবং একটি মাত্র দশমিক পয়েন্ট allow করবে
            let filtered = val.replace(/[^0-9.]/g, '');

            // যদি একাধিক দশমিক পয়েন্ট থাকে, কেবল প্রথমটিই রাখবে
            let parts = filtered.split('.');
            if (parts.length > 2) {
                filtered = parts[0] + '.' + parts[1];
            }

            if (val !== filtered) {
                $(this).val(filtered);
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Only Bangla letters and Bangla numbers allowed
        $('.only-bangla').on('input', function () {
            let val = $(this).val();
            // বাংলা অক্ষর (0980-09FF) এবং বাংলা সংখ্যা (09E6-09EF) এবং স্পেস অ্যালাউ
            let filtered = val.replace(/[^\u0980-\u09FF\u09E6-\u09EF\s]/g, '');
            if (val !== filtered) {
                $(this).val(filtered);
            }
        });

        // Only English letters and English numbers allowed
        $('.only-english').on('input', function () {
            let val = $(this).val();
            // a-z, A-Z, 0-9 এবং স্পেস অ্যালাউ
            let filtered = val.replace(/[^a-zA-Z0-9\s]/g, '');
            if (val !== filtered) {
                $(this).val(filtered);
            }
        });
    });
</script>


<script>

    $(".slideshow").slick({
        infinite: true,
        autoplay: true,
        dots: false,
        arrows: false,
        autoplaySpeed: 4000
    });

</script>
<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang1").change(function () {
        window.location.href = url + "?lang=" + $(this).val();
    });

</script>
<script type="text/javascript">
    $("document").ready(function () {
        setTimeout(function () {
            $("div.alert").remove();
        }, 3000); // 3 secs

    });
</script>

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.js-example-basic-multiple, .distinct-single, .sub-distinct-single').select2();--}}
{{--    });--}}
{{--    $(document).ready(function () {--}}
{{--        $('.js-example-basic-single').select2();--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}

{{--    $(document).ready(function() {--}}
{{--      $(".js-example-basic-multipleo").select2({--}}
{{--        dropdownParent: $("#exampleModal")--}}
{{--      });--}}
{{--    });--}}

{{--</script>--}}


<script>

   $(document).ready(function (){
       $('.select2').select2({
           selectOnClose: true,
           width: '100%'
       });
   })



</script>


<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
            , duration: "fast"
        });
    });
</script>

<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
            , duration: "fast"
        });
    });
</script>

<script>
    $(function () {
        $("#datepicker1").datepicker({
            dateFormat: "yy-mm-dd"
            , duration: "fast"
        });
    });

    //


    $(function () {
        $("#registration_date0").datepicker({
            dateFormat: "dd-mm-yy"
            , duration: "fast"
        });
    });


    $(function () {
        $("#form_date").datepicker({
            dateFormat: "dd-mm-yy"
            , duration: "fast"
        });
    });


    $(function () {
        $(".datepickerOne").datepicker({
            dateFormat: "dd-mm-yy"
            , duration: "fast"
        });
    });

    //

    $(function () {
        $("#to_date").datepicker({
            dateFormat: "dd-mm-yy"
            , duration: "fast"
        });
    });
</script>


<script>
    $(document).ready(function () {
        $("#form").on("submit", function () {
            //alert(123);
            $("#pageloader").fadeIn();
        });//submit
    });//document ready
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>

</html>
