@extends('front.master.master')

@section('title')
{{ trans('header.check_status')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <div class="others_inner_section">
                    <h1>
                      	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
							আবেদনের অবস্থান যাচায় করুন
						@else
        					Check Application Status
						@endif
                      </h1>
                    <div class="notice_underline"></div>
                    <p class="pt-4">
                    	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
							আপনার আবেদনের অবস্থান যাচায়ের জন্য আপনাকে <br>
                      		আপনার ইমেইল এড্রেস, আবেদনের ধরণ এবং আবেদন আইডি (যেমন: 4000-10000000) যা আপনি আপনার প্রদত্ত ইমেইল এ পেয়ে যাবেন
						@else
        					Check the status of your application by entering <br>
                        	Emaily Address, Application Type and Application ID (e.g. 4000-100000000) you find on your given Email
						@endif
					</p>
                </div>
                <form id="form" action="{{ route('checkStatusRegFrom') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class=" mb-3">
                                <label for="" class="form-label">
                                	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
										ইমেইল এড্রেস <span class="text-danger">*</span>
									@else
        								Email Address <span class="text-danger">*</span>
									@endif
                              	</label>
                                <input type="email" name="email" class="form-control" id="" placeholder="Email Address">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">
                                  	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
										আবেদনের ধরণ <span class="text-danger">*</span>
									@else
        								Application Type <span class="text-danger">*</span>
									@endif
                              	</label>
                                <select name="reg_type" class="form-control" id="">
                                    <option value="NGO Registration">NGO Registration</option>
                                    <option value="NGO Renew">NGO Renew</option>
                                    <option value="NGO Name Change">NGO Name Change</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">
                                  	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        ট্র্যাকিং আইডি <span class="text-danger">*</span>
									@else
        								Tracking ID <span class="text-danger">*</span>
									@endif
                                </label>
                                <input type="text" name="reg_id" class="form-control" id="" placeholder="e.g. 400-100000000000">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-start">
                        <button type="submit" class="btn btn-registration">
                        	@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
								চেক করুন
							@else
        						Check
							@endif
                        </button>
                    </div>
                </form>

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
