@extends('front.master.master')

@section('title')
{{ trans('main.Password_Reset_Form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="d-lg-flex login_box">
            <div class="bg order-1 order-md-2" style="background-image:url('public/front/assets/img/login/PM-6-.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h3>{{ trans('main.Password_Reset_Form')}} | <strong>{{ trans('header.ngo_ab')}}</strong></h3>
                            <p class="mb-4">@include('flash_message').</p>
                            <p class="mb-4"> {{ trans('main.Enter_your')}} !</p>
                            <form method="post" action="{{ route('sendMailGetFromList') }}" id="form">
                                @csrf
                                <div class="form-group first mb-3">
                                    <label for="username">{{ trans('header.email')}}:</label>
                                    <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="email" required data-parsley-type=“email” data-parsley-trigger=“keyup” >
                                </div>
                                <small class="text-danger" id="main_content_table"></small>





                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" id="final_reset_button" class="btn btn-registration" >{{ trans('main.check_mail')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
            }



        },


               messages:
 {

            email: {
                required: " Email Field is required"
            }






 }
    });
});
</script>


<script>
    $(document).ready(function(){

        $("input").keyup(function(){

            var type_email = $(this).val();

            $.ajax({
            url: "{{ route('checkMailFromList') }}",
            method: 'GET',
            data: {type_email:type_email},
            success: function(data) {
            //   $("#main_content_table").html('');

            if(type_email == data){

                $("#main_content_table").html('');

                $('#final_reset_button').prop('disabled', false);

            }else{

                $("#main_content_table").html('You Have Typed Wrong Email');
                $('#final_reset_button').prop('disabled', true);

            }

            }
        });

        });
    });
    </script>

@endsection
