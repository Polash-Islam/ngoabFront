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
            <div class="bg order-1 order-md-2" style="background-image:url('public/front/assets/img/login/pm-6.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h3>{{ trans('main.Password_Reset_Form')}} | <strong>{{ trans('header.ngo_ab')}}</strong></h3>
                            <p class="mb-4">@include('flash_message').</p>
                            <p class="mb-4"> {{ trans('main.change_password')}}!</p>
                            <form method="post" action="{{ route('passwordChangeConfirmed') }}" id="form">
                                @csrf
                                <div class="form-group first mb-3">
                                    <label for="username">{{ trans('header.password')}} <span class="text-danger">*</span> </label>
                                    <input type="password" autocomplete="off" id="password" name="password" maxlength="32" class="form-control" placeholder="" required data-parsley-length=“[5,32]” data-parsley-trigger=“keyup”>
                                    <input type="hidden" name="id" value="{{ $id }}" class="form-control" placeholder="Password" >
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">{{ trans('header.passwordc')}} <span class="text-danger">*</span> </label>
                                    <input type="password" autocomplete="off" class="form-control" required data-parsley-length=“[5,32]” maxlength="32" data-parsley-equalto="#password" data-parsley-trigger=“keyup” name="cpassword" id="cpassword">
                                  <small id="p_result" style="color:red" ></small>
                                </div>




                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit"  class="btn btn-registration" > {{ trans('main.update_password')}}</button>
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
    $("#password").keyup(function(){

           var pass = $(this).val();
           var pass_C = $('#cpassword').val();

      if(pass == pass_C){
      $("#final_button").attr("disabled",false);
        $("#p_result").html("");
      }else{
       $("#final_button").attr("disabled",true);
         $("#p_result").html("password did not matched");
      }


  //alert(pass);
});
</script>


<script>
    $("#cpassword").keyup(function(){

           var pass = $(this).val();
           var pass_C = $('#password').val();

      if(pass == pass_C){
      $("#final_button").attr("disabled",false);
         $("#p_result").html("");
      }else{
       $("#final_button").attr("disabled",true);
        $("#p_result").html("password did not matched");
      }


  //alert(pass);
});
</script>


<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            password: {
                required: true
            },


        },


               messages:
 {



            password: {
                required: "Password Field is required"
            }




 }
    });
});
</script>


@endsection
