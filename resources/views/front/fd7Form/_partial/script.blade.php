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

<script>

$(document).on('change', 'select.newdistrict_name', function () {

    var getMainValue = $(this).val();

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(16);



    $.ajax({
    url: "{{ route('getUpozilaList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#newupozila_name"+get_id_from_main).html('');
      $("#newupozila_name"+get_id_from_main).html(data);



    },

    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });

});


////
$(document).on('change', 'select.district_name', function () {

    var getMainValue = $(this).val();

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(13);



    $.ajax({
    url: "{{ route('getUpozilaList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name"+get_id_from_main).html('');
      $("#upozila_name"+get_id_from_main).html(data);

      $("#thana_name"+get_id_from_main).html('');
  $("#thana_name"+get_id_from_main).html(data);

    },

    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });

});



//distribution add list start

$(document).on('click', '#distributionAjax', function () {

if(!$('#distribution_type').val()){

    alertify.alert('Error', 'ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#newdistrict_name0').val()){

    alertify.alert('Error', 'জেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#newupozila_name0').val()){

    alertify.alert('Error', 'উপজেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#product_des0').val()){

    alertify.alert('Error', 'দ্রব্যাদি সম্পর্কিত তথ্য দিন');

}else if(!$('#product_quantity0').val()){

    alertify.alert('Error', 'পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_price0').val()){

    alertify.alert('Error', 'একক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_name0').val()){

alertify.alert('Error', 'একক এর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#total_amount0').val()){

    alertify.alert('Error', 'টাকার পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#total_beneficiaries').val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var mainEditId = $('#mainEditId').val();
var distribution_type = $('#distribution_type').val();
var districtNameDis = $('#newdistrict_name0').val();
var upozila_name = $('#newupozila_name0').val();
var product_des = $('#product_des0').val();
var product_quantity = $('#product_quantity0').val();
var unit_price = $('#unit_price0').val();
var unit_name = $('#unit_name0').val();
var total_amount =$('#total_amount0').val();
var total_beneficiaries = $('#total_beneficiaries').val();
var comment = $('#comment').val();



$.ajax({
url: "{{ route('postDistribution') }}",
method: 'POST',
data: {unit_name:unit_name,mainEditId:mainEditId,distribution_type:distribution_type,districtNameDis:districtNameDis,upozila_name:upozila_name,product_des:product_des,product_quantity:product_quantity,unit_price:unit_price,total_amount:total_amount,total_beneficiaries:total_beneficiaries,comment:comment},
success: function(data) {

    $('#exampleModal1').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatadis").html('');
  $("#tableAjaxDatadis").html(data);

  var distribution_type = $('#distribution_type').val('');
var districtNameDis = $('#newdistrict_name0').val('');
var upozila_name = $('#newupozila_name0').val('');
var product_des = $('#product_des0').val('');
var product_quantity = $('#product_quantity0').val('');
var unit_price = $('#unit_price0').val('');
var total_amount =$('#total_amount0').val('');
var unit_name = $('#unit_name0').val('');
var total_beneficiaries = $('#total_beneficiaries').val('');
var comment = $('#comment').val('');

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
//form submit start data end

//distribution edit modal show start

$(document).on('click', '[id^=exampleModaleditnew]', function () {

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(19);

    

    //alert(get_id_from_main);

    $.ajax({
url: "{{ route('viewFd7EditDataAjax') }}",
method: 'get',
data: {get_id_from_main:get_id_from_main},
success: function(data) {

    $('#mmexampleModaleditnewemm').modal('show');

    $("#viewDistributionEditDataAjaxForEdit").html('');
    $("#viewDistributionEditDataAjaxForEdit").html(data);

 

},
beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
});



});
//distribution edit modal show end 

$(document).on('change keyup', '[id^=product_quantity]', function () {

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(16);

    var perQuantityPrice = $('#unit_price'+get_id_from_main).val();
    var perQuantity = $('#product_quantity'+get_id_from_main).val();

    var totalPrice = perQuantityPrice*perQuantity;

    

    $('#total_amount'+get_id_from_main).val(totalPrice);

    

});

$(document).on('change keyup', '[id^=unit_price]', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(10);

var perQuantityPrice = $('#unit_price'+get_id_from_main).val();
var perQuantity = $('#product_quantity'+get_id_from_main).val();

var totalPrice = perQuantityPrice*perQuantity;



$('#total_amount'+get_id_from_main).val(totalPrice);



});


// distribution add list end

$(document).on('click', '.distributionAjaxEdit', function () {
    var mainEditId = $('#mainEditId').val();
var mainId = $(this).attr('id');

if(!$('#distribution_type'+mainId).val()){

alertify.alert('Error', 'ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#newdistrict_name'+mainId).val()){

alertify.alert('Error', 'জেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#newupozila_name'+mainId).val()){

alertify.alert('Error', 'উপজেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#product_des'+mainId).val()){

alertify.alert('Error', 'দ্রব্যাদি সম্পর্কিত তথ্য দিন');

}else if(!$('#product_quantity'+mainId).val()){

alertify.alert('Error', 'পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_price'+mainId).val()){

alertify.alert('Error', 'একক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_name'+mainId).val()){

alertify.alert('Error', 'একক এর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#total_amount'+mainId).val()){

alertify.alert('Error', 'টাকার পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#total_beneficiaries'+mainId).val()){

alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var distribution_type = $('#distribution_type'+mainId).val();
var districtNameDis = $('#newdistrict_name'+mainId).val();
var upozila_name = $('#newupozila_name'+mainId).val();
var product_des = $('#product_des'+mainId).val();
var product_quantity = $('#product_quantity'+mainId).val();
var unit_price = $('#unit_price'+mainId).val();
var unit_name = $('#unit_name'+mainId).val();
var total_amount =$('#total_amount'+mainId).val();
var total_beneficiaries = $('#total_beneficiaries'+mainId).val();
var comment = $('#comment'+mainId).val();



$.ajax({
url: "{{ route('updateDistribution') }}",
method: 'POST',
data: {unit_name:unit_name,mainEditId:mainEditId,mainId:mainId,distribution_type:distribution_type,districtNameDis:districtNameDis,upozila_name:upozila_name,product_des:product_des,product_quantity:product_quantity,unit_price:unit_price,total_amount:total_amount,total_beneficiaries:total_beneficiaries,comment:comment},
success: function(data) {



$('#mmexampleModaleditnewemm').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDatadis").html('');
$("#tableAjaxDatadis").html(data);



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

///prokolpo area code start


$(document).on('click', '#prokolpoAreaDataPost', function () {

if(!$('#division_name0').val()){

    alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpoType0').val()){

    alertify.alert('Error', 'প্রকল্পের ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#allocated_budget0').val()){

    alertify.alert('Error', 'বরাদ্দকৃত বাজেট সম্পর্কিত তথ্য দিন');

}else if(!$('#beneficiaries_total0').val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var mainEditId = $('#mainEditId').val();
var division_name = $('#division_name0').val();
var district_name = $('#district_name0').val();
var city_corparation_name = $('#city_corparation_name0').val();
var upozila_name = $('#upozila_name0').val();
var thana_name = $('#thana_name0').val();
var municipality_name = $('#municipality_name0').val();
var ward_name =$('#ward_name0').val();
var prokolpoType = $('#prokolpoType0').val();
var allocated_budget = $('#allocated_budget0').val();
var beneficiaries_total = $('#beneficiaries_total0').val();


$.ajax({
url: "{{ route('postProkolpoArea') }}",
method: 'post',
data: {mainEditId:mainEditId,beneficiaries_total:beneficiaries_total,division_name:division_name,district_name:district_name,city_corparation_name:city_corparation_name,upozila_name:upozila_name,thana_name:thana_name,municipality_name:municipality_name,ward_name:ward_name,prokolpoType:prokolpoType,allocated_budget:allocated_budget},
success: function(data) {

    $('#exampleModal12').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatapro").html('');
  $("#tableAjaxDatapro").html(data);

  var division_name = $('#division_name0').val('');
var district_name = $('#district_name0').val('');
var city_corparation_name = $('#city_corparation_name0').val('');
var upozila_name = $('#upozila_name0').val('');
var thana_name = $('#thana_name0').val('');
var municipality_name = $('#municipality_name0').val('');
var ward_name =$('#ward_name0').val('');
var prokolpoType = $('#prokolpoType0').val('');
var allocated_budget = $('#allocated_budget0').val('');
var beneficiaries_total = $('#beneficiaries_total0').val('');

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


////prokolpo area code end

//prokolpo area code update strat

$(document).on('click', '.prokolpoAreaDataUpdate', function () {
    var mainEditId = $('#mainEditId').val();
    var mainId = $(this).attr('id');

if(!$('#division_name'+mainId).val()){

    alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpoType'+mainId).val()){

    alertify.alert('Error', 'প্রকল্পের ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#allocated_budget'+mainId).val()){

    alertify.alert('Error', 'বরাদ্দকৃত বাজেট সম্পর্কিত তথ্য দিন');

}else if(!$('#beneficiaries_total'+mainId).val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var division_name = $('#division_name'+mainId).val();
var district_name = $('#district_name'+mainId).val();
var city_corparation_name = $('#city_corparation_name'+mainId).val();
var upozila_name = $('#upozila_name'+mainId).val();
var thana_name = $('#thana_name'+mainId).val();
var municipality_name = $('#municipality_name'+mainId).val();
var ward_name =$('#ward_name'+mainId).val();
var prokolpoType = $('#prokolpoType'+mainId).val();
var allocated_budget = $('#allocated_budget'+mainId).val();
var beneficiaries_total = $('#beneficiaries_total'+mainId).val();


$.ajax({
url: "{{ route('updateProkolpoArea') }}",
method: 'post',
data: {mainEditId:mainEditId,mainId:mainId,beneficiaries_total:beneficiaries_total,division_name:division_name,district_name:district_name,city_corparation_name:city_corparation_name,upozila_name:upozila_name,thana_name:thana_name,municipality_name:municipality_name,ward_name:ward_name,prokolpoType:prokolpoType,allocated_budget:allocated_budget},
success: function(data) {

    $('#prokolpoAreaModalEdit'+mainId).modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatapro").html('');
  $("#tableAjaxDatapro").html(data);

  var division_name = $('#division_name'+mainId).val('');
var district_name = $('#district_name'+mainId).val('');
var city_corparation_name = $('#city_corparation_name'+mainId).val('');
var upozila_name = $('#upozila_name'+mainId).val('');
var thana_name = $('#thana_name'+mainId).val('');
var municipality_name = $('#municipality_name'+mainId).val('');
var ward_name =$('#ward_name'+mainId).val('');
var prokolpoType = $('#prokolpoType'+mainId).val('');
var allocated_budget = $('#allocated_budget'+mainId).val('');
var beneficiaries_total = $('#beneficiaries_total'+mainId).val('');

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


//prokolpo area code update end

</script>


<script type="text/javascript">
    function deleteTagStepFive(id) {
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

                var mainEditId = $('#mainEditId').val();
                $.ajax({
    url: "{{ route('deleteDistribution') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDatadis").html('');
      $("#tableAjaxDatadis").html(data);
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
    function deleteTagProkolpoArea(id) {
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
                var mainEditId = $('#mainEditId').val();

                $.ajax({
    url: "{{ route('deleteProkolpoArea') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDatapro").html('');
      $("#tableAjaxDatapro").html(data);
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
