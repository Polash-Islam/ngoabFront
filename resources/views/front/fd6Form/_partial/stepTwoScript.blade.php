<script>
// district wise data post start
$(document).on('click', '#jelawaisKarjokokromPost', function () {

    var fd6Id = $('#fd6Id').val();

    if(!$('#division_name0').val()){

       alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

    }else if(!$('#activities0').val()){

       alertify.alert('Error', 'কার্যক্রম সমূহ সম্পর্কিত তথ্য দিন');

    }else if(!$('#prokolpo_time0').val()){

      alertify.alert('Error', 'প্রকল্প সময় সম্পর্কিত তথ্য দিন');

    }else if(!$('#last_target_year0').val()){

       alertify.alert('Error', 'লক্ষ্যমাত্রা (বছর) সম্পর্কিত তথ্য দিন');

    }else if(!$('#alllast_year_target_real0').val()){

       alertify.alert('Error', 'লক্ষ্যমাত্রা (বাস্তব) সম্পর্কিত তথ্য দিন');

    }else if(!$('#alllast_year_target_financial0').val()){

       alertify.alert('Error', 'লক্ষ্যমাত্রা (আর্থিক) সম্পর্কিত তথ্য দিন');

    }else if(!$('#alltotal_budget0').val()){

         alertify.alert('Error', 'মোট বাজেট সম্পর্কিত তথ্য দিন');

    }else{

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var prokolpo_time = $('#prokolpo_time0').val();
        var division_name = $('#division_name0').val();
        var district_name = $('#district_name0').val();
        var city_corparation_name = $('#city_corparation_name0').val();
        var upozila_name = $('#upozila_name0').val();
        var thana_name = $('#thana_name0').val();
        var municipality_name = $('#municipality_name0').val();
        var ward_name =$('#ward_name0').val();
        var activities =$('#activities0').val();
        var target_year =$('#last_target_year0').val();
        var last_year_target_real =$('#alllast_year_target_real0').val();
        var last_year_target_financial =$('#alllast_year_target_financial0').val();
        var total_budget =$('#alltotal_budget0').val();
        var comment = $('#allcomment0').val();


        $.ajax({
url: "{{ route('districtWise') }}",
method: 'post',
data: {
    fd6Id:fd6Id,
    activities:activities,
    division_name:division_name,
    district_name:district_name,
    city_corparation_name:city_corparation_name,
    upozila_name:upozila_name,
    thana_name:thana_name,
    target_year:target_year,
    ward_name:ward_name,
    last_year_target_real:last_year_target_real,
    last_year_target_financial:last_year_target_financial,
    total_budget:total_budget,
    prokolpo_time:prokolpo_time,
    comment:comment
},
success: function(data) {

    $('#JelawaisKarjokokrom').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

         $('#prokolpo_time0').val('');
         $('#division_name0').val('');
         $('#district_name0').val('');
         $('#city_corparation_name0').val('');
         $('#upozila_name0').val('');
         $('#thana_name0').val('');
         $('#municipality_name0').val('');
         $('#ward_name0').val('');
         $('#activities0').val('');
         $('#last_target_year0').val('');
         $('#alllast_year_target_real0').val('');
         $('#alllast_year_target_financial0').val('');
         $('#alltotal_budget0').val('');
         $('#allcomment0').val('');

  $("#tableAjaxDataDis").html('');
  $("#tableAjaxDataDis").html(data);



},
beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
});

    }

});



//district wise data update start


$(document).on('click', '.jelawaisKarjokokromUpdate', function () {

    var mainId = $(this).attr('id');
    var fd6Id = $('#fd6Id').val();

    if(!$('#division_name'+mainId).val()){

alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#activities'+mainId).val()){

alertify.alert('Error', 'কার্যক্রম সমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpo_time'+mainId).val()){

alertify.alert('Error', 'প্রকল্প সময় সম্পর্কিত তথ্য দিন');

}else if(!$('#last_target_year'+mainId).val()){

alertify.alert('Error', 'লক্ষ্যমাত্রা (বছর) সম্পর্কিত তথ্য দিন');

}else if(!$('#alllast_year_target_real'+mainId).val()){

alertify.alert('Error', 'লক্ষ্যমাত্রা (বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#alllast_year_target_financial'+mainId).val()){

alertify.alert('Error', 'লক্ষ্যমাত্রা (আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#alltotal_budget'+mainId).val()){

  alertify.alert('Error', 'মোট বাজেট সম্পর্কিত তথ্য দিন');

}else{



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var prokolpo_time = $('#prokolpo_time'+mainId).val();
        var division_name = $('#division_name'+mainId).val();
        var district_name = $('#district_name'+mainId).val();
        var city_corparation_name = $('#city_corparation_name'+mainId).val();
        var upozila_name = $('#upozila_name'+mainId).val();
        var thana_name = $('#thana_name'+mainId).val();
        var municipality_name = $('#municipality_name'+mainId).val();
        var ward_name =$('#ward_name'+mainId).val();
        var activities =$('#activities'+mainId).val();
        var target_year =$('#last_target_year'+mainId).val();
        var last_year_target_real =$('#alllast_year_target_real'+mainId).val();
        var last_year_target_financial =$('#alllast_year_target_financial'+mainId).val();
        var total_budget =$('#alltotal_budget'+mainId).val();
        var comment = $('#allcomment'+mainId).val();


        $.ajax({
url: "{{ route('districtWiseUpdate') }}",
method: 'post',
data: {
    mainId:mainId,
    fd6Id:fd6Id,
    activities:activities,
    division_name:division_name,
    district_name:district_name,
    city_corparation_name:city_corparation_name,
    upozila_name:upozila_name,
    thana_name:thana_name,
    target_year:target_year,
    ward_name:ward_name,
    last_year_target_real:last_year_target_real,
    last_year_target_financial:last_year_target_financial,
    total_budget:total_budget,
    prokolpo_time:prokolpo_time,
    comment:comment
},
success: function(data) {

    $('#JelawaisKarjokokromEdit'+mainId).modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Update Data Successfully');


  $("#tableAjaxDataDis").html('');
  $("#tableAjaxDataDis").html(data);



},
beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
});

}
});



//district wise data update end

////district wise data post end

    $(document).on('click', '#prokolpoTargetPost', function () {

        var fd6Id = $('#fd6Id').val();

        if(!$('#prokolpoName0').val()){

alertify.alert('Error', 'কার্যক্রম  সম্পর্কিত তথ্য দিন');

}else if(!$('#target_year0').val()){

alertify.alert('Error', 'বছর সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_real0').val()){

alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_financial0').val()){

alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_real0').val()){

alertify.alert('Error', 'অর্জনযোগ্য(%) সম্পর্কিত তথ্য দিন');

}else if(!$('#total_benificiari0').val()){

alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    var prokolpoName = $('#prokolpoName0').val();
    var last_year_target_real = $('#last_year_target_real0').val();
    var last_year_target_financial = $('#last_year_target_financial0').val();
    var last_year_achievment_real = $('#last_year_achievment_real0').val();
    var target_year = $('#target_year0').val();
    var total_benificiari =$('#total_benificiari0').val();
    var comment = $('#comment0').val();

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
url: "{{ route('fd6Target') }}",
method: 'post',
data: {
    fd6Id:fd6Id,
    prokolpoName:prokolpoName,
    last_year_target_real:last_year_target_real,
    last_year_target_financial:last_year_target_financial,
    last_year_achievment_real:last_year_achievment_real,
    target_year:target_year,
    total_benificiari:total_benificiari,
    comment:comment,
},
success: function(data) {



    $('#expenseId').val(1);

    $('#exampleModalTarget').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDataTarget").html('');
  $("#tableAjaxDataTarget").html(data);

  $('#prokolpoName0').val('');
  $('#last_year_target_real0').val('');
  $('#last_year_target_financial0').val('');
  $('#last_year_achievment_real0').val('');
  $('#target_year0').val('');
  $('#total_benificiari0').val('');
  $('#comment0').val('');



},
beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
});

}

    });


    ///

    $(document).on('click', '.lastYearDataUpdateFd6', function () {

var mainId = $(this).attr('id');
var fd6Id = $('#fd6Id').val();
if(!$('#prokolpoName'+mainId).val()){

alertify.alert('Error', 'কার্যক্রম  সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_real'+mainId).val()){

alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_financial'+mainId).val()){

alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_real'+mainId).val()){

alertify.alert('Error', 'অর্জনযোগ্য(%)  সম্পর্কিত তথ্য দিন');

}else if(!$('#target_year'+mainId).val()){

alertify.alert('Error', 'বছর সম্পর্কিত তথ্য দিন');

}else if(!$('#total_benificiari'+mainId).val()){

alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


var fd6Id = $('#fd6Id').val();
var prokolpoName = $('#prokolpoName'+mainId).val();
var last_year_target_real = $('#last_year_target_real'+mainId).val();
var last_year_target_financial = $('#last_year_target_financial'+mainId).val();
var last_year_achievment_real = $('#last_year_achievment_real'+mainId).val();
var target_year = $('#target_year'+mainId).val();
var total_benificiari =$('#total_benificiari'+mainId).val();
var comment = $('#comment'+mainId).val();


$.ajax({
url: "{{ route('fd6TargetUpdate') }}",
method: 'post',
data: {
    fd6Id:fd6Id,
    mainId:mainId,
    prokolpoName:prokolpoName,
    last_year_target_real:last_year_target_real,
    last_year_target_financial:last_year_target_financial,
    last_year_achievment_real:last_year_achievment_real,
    target_year:target_year,
    total_benificiari:total_benificiari,
    comment:comment
},
success: function(data) {

$('#prokolpoTargrtModalEdit'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

$("#tableAjaxDataTarget").html('');
  $("#tableAjaxDataTarget").html(data);


},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});

//expected result strat


$(document).on('click', '#expectedResultPost', function () {

var fd6Id = $('#fd6Id').val();

if(!$('#multiplicative0').val()){

alertify.alert('Error', 'গুনবাচক সম্পর্কিত তথ্য দিন');

}else if(!$('#number_reader0').val()){

alertify.alert('Error', 'সংখ্যা বাচক সম্পর্কিত তথ্য দিন');

}else if(!$('#duration0').val()){

alertify.alert('Error', 'সময়কাল সম্পর্কিত তথ্য দিন');

}else{

var multiplicative = $('#multiplicative0').val();
var number_reader = $('#number_reader0').val();
var duration = $('#duration0').val();

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
url: "{{ route('fd6ExpectedResultTarget') }}",
method: 'post',
data: {
fd6Id:fd6Id,
multiplicative:multiplicative,
number_reader:number_reader,
duration:duration,
},
success: function(data) {



$('#expenseId').val(1);

$('#ProttashitoFol').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataResult").html('');
$("#tableAjaxDataResult").html(data);

$('#multiplicative0').val('');
$('#number_reader0').val('');
$('#duration0').val('');



},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});

$(document).on('click', '.expectedResultUpdate', function () {

    var mainId = $(this).attr('id');
    var fd6Id = $('#fd6Id').val();

    if(!$('#multiplicative'+mainId).val()){

alertify.alert('Error', 'গুনবাচক সম্পর্কিত তথ্য দিন');

}else if(!$('#number_reader'+mainId).val()){

alertify.alert('Error', 'সংখ্যা বাচক সম্পর্কিত তথ্য দিন');

}else if(!$('#duration'+mainId).val()){

alertify.alert('Error', 'সময়কাল সম্পর্কিত তথ্য দিন');

}else{

var multiplicative = $('#multiplicative'+mainId).val();
var number_reader = $('#number_reader'+mainId).val();
var duration = $('#duration'+mainId).val();

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
url: "{{ route('fd6ExpectedResultUpdate') }}",
method: 'post',
data: {
fd6Id:fd6Id,
mainId:mainId,
multiplicative:multiplicative,
number_reader:number_reader,
duration:duration,
},
success: function(data) {



$('#expenseId').val(1);

$('#expectedResultModalEdit'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

$("#tableAjaxDataResult").html('');
$("#tableAjaxDataResult").html(data);

},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});
//expected result end
</script>
<script type="text/javascript">
    function deleteprokolpoTarget(id) {
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
                var fd6Id = $('#fd6Id').val();

                $.ajax({
    url: "{{ route('fd6TargetDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataTarget").html('');
      $("#tableAjaxDataTarget").html(data);
      //location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


                // event.preventDefault();
                // document.getElementById('delete-form-'+id).submit();


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

<script type="text/javascript">
    function deleteResult(id) {
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
                var fd6Id = $('#fd6Id').val();

                $.ajax({
    url: "{{ route('fd6ExpectedResultDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataResult").html('');
      $("#tableAjaxDataResult").html(data);
      //location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


                // event.preventDefault();
                // document.getElementById('delete-form-'+id).submit();


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

<script type="text/javascript">
    function deleteDistrictResult(id) {
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
                var fd6Id = $('#fd6Id').val();

                $.ajax({
    url: "{{ route('districtWiseDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataDis").html('');
      $("#tableAjaxDataDis").html(data);
      //location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


                // event.preventDefault();
                // document.getElementById('delete-form-'+id).submit();


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

<script>




$(document).on('change', '.new_area_type', function () {

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(13);
    var thisAreaType = $(this).val();


    //alert(thisAreaType);

    if(thisAreaType == 'জেলা'){


        $('#districtDiv'+get_id_from_main).show();
        $('#upoDiv'+get_id_from_main).show();
        $('#thanaDiv'+get_id_from_main).show();
        $('#munDiv'+get_id_from_main).show();
        $('#wardDiv'+get_id_from_main).show();
        $('#cityDiv'+get_id_from_main).hide();


    }else if(thisAreaType == 'সিটি কর্পোরেশন'){

        $('#districtDiv'+get_id_from_main).hide();
        $('#upoDiv'+get_id_from_main).hide();
        $('#thanaDiv'+get_id_from_main).hide();
        $('#munDiv'+get_id_from_main).hide();
        $('#wardDiv'+get_id_from_main).show();
        $('#cityDiv'+get_id_from_main).show();


    }else{


        $('#districtDiv'+get_id_from_main).show();
        $('#upoDiv'+get_id_from_main).show();
        $('#thanaDiv'+get_id_from_main).show();
        $('#munDiv'+get_id_from_main).show();
        $('#wardDiv'+get_id_from_main).show();
        $('#cityDiv'+get_id_from_main).show();

    }

  });
</script>
