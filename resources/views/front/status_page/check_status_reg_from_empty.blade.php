@extends('front.master.master')

@section('title')
{{ trans('header.check_status')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<!-- End Header -->
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <div class="others_inner_section pb-4">
                    <h1>
                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
							আবেদনের অবস্থানের ফলাফল
						@else
        					Application Status Result
						@endif
                      </h1>
                    <div class="notice_underline"></div>
                </div>
                <div class="d-flex justify-content-center mt-4 mb-3">
                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results.png" alt="" width="200" height="200">
                </div>
                <div class="text-center">
                    <h3>
                      	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
							কোন ফলাফল পাওয়া যায় নি
						@else
        					No Result Found
						@endif
                    </h3>
                    <p>
                      @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
							আপনি যা খুঁজছেন তা আমরা খুঁজে পাইনি <br> অনুগ্রহ করে আবার চেষ্টা করুন
						@else
        					We couldn't find what you are searching for <br> Please try again
						@endif

                  	</p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            email: {
                required: true
            },
            password: {
                required: true
            }


        },


               messages:
 {

            email: {
                required: " Email Field is required"
            },

            password: {
                required: "Password Field is required"
            },




 }
    });
});
</script>

@endsection
