<script>


///adjoining g start////

$(document).on('click', '#adjoininggModalPost', function () {

    if(!$('#subject0').val()){

       alertify.alert('Error', 'শিরোনাম/বিষয় সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_date0').val()){

       alertify.alert('Error', 'তারিখ সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_time0').val()){

       alertify.alert('Error', 'সময় সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_place0').val()){

        alertify.alert('Error', 'স্থান সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_number0').val()){

       alertify.alert('Error', 'সংখ্যা সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_perticipantion0').val()){

       alertify.alert('Error', 'অংশগ্রহণকারীর সংখ্যা সম্পর্কিত তথ্য দিন');

    }else if(!$('#seminer_budget0').val()){

       alertify.alert('Error', 'বাজেট সম্পর্কিত তথ্য দিন');

    }else{

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        var fd6Id = $('#fd6Id').val();
        var subject = $('#subject0').val();
        var seminer_date = $('#seminer_date0').val();
        var seminer_time = $('#seminer_time0').val();
        var seminer_place = $('#seminer_place0').val();
        var seminer_number = $('#seminer_number0').val();
        var seminer_perticipantion = $('#seminer_perticipantion0').val();
        var seminer_budget = $('#seminer_budget0').val();
        var comment =$('#comment0').val();

        $.ajax({
            url: "{{ route('dinpunjjiDataPost') }}",
            method: 'post',
            data: {
                fd6Id:fd6Id,
                subject:subject,
                seminer_date:seminer_date,
                seminer_time:seminer_time,
                seminer_place:seminer_place,
                seminer_number:seminer_number,
                seminer_perticipantion:seminer_perticipantion,
                seminer_budget:seminer_budget,
                comment:comment
            },
            success: function(data) {

                $('#Dinpunjji').modal('hide');

            alertify.set('notifier','position', 'top-center');
            alertify.success('Data Added Successfully');

            $("#dinpunjjiTable").html('');
            $("#dinpunjjiTable").html(data);

            $('#subject0').val('');
            $('#seminer_date0').val('');
            $('#seminer_time0').val('');
            $('#seminer_place0').val('');
            $('#seminer_number0').val('');
            $('#seminer_perticipantion0').val('');
            $('#seminer_budget0').val('');
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

$(document).on('click', '.adjoininggModalUpdate', function () {

            var main_id = $(this).attr('id');


            if(!$('#subject'+main_id).val()){

alertify.alert('Error', 'শিরোনাম/বিষয় সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_date'+main_id).val()){

alertify.alert('Error', 'তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_time'+main_id).val()){

alertify.alert('Error', 'সময় সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_place'+main_id).val()){

 alertify.alert('Error', 'স্থান সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_number'+main_id).val()){

alertify.alert('Error', 'সংখ্যা সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_perticipantion'+main_id).val()){

alertify.alert('Error', 'অংশগ্রহণকারীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else if(!$('#seminer_budget'+main_id).val()){

alertify.alert('Error', 'বাজেট সম্পর্কিত তথ্য দিন');

}else{


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 var fd6Id = $('#fd6Id').val();
 var subject = $('#subject'+main_id).val();
 var seminer_date = $('#seminer_date'+main_id).val();
 var seminer_time = $('#seminer_time'+main_id).val();
 var seminer_place = $('#seminer_place'+main_id).val();
 var seminer_number = $('#seminer_number'+main_id).val();
 var seminer_perticipantion = $('#seminer_perticipantion'+main_id).val();
 var seminer_budget = $('#seminer_budget'+main_id).val();
 var comment =$('#comment'+main_id).val();

 $.ajax({
     url: "{{ route('dinpunjjiDataPost') }}",
     method: 'post',
     data: {
         fd6Id:fd6Id,
         main_id:main_id,
         subject:subject,
         seminer_date:seminer_date,
         seminer_time:seminer_time,
         seminer_place:seminer_place,
         seminer_number:seminer_number,
         seminer_perticipantion:seminer_perticipantion,
         seminer_budget:seminer_budget,
         comment:comment
     },
     success: function(data) {

         $('#adjoiningGModalEdit'+main_id).modal('hide');

     alertify.set('notifier','position', 'top-center');
     alertify.success('Data Added Successfully');

     $("#dinpunjjiTable").html('');
     $("#dinpunjjiTable").html(data);


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

///adjoinung g end/////
    $(document).on('click', '#formSixModalPost', function () {

if(!$('#work_detail0').val()){

    alertify.alert('Error', 'কার্যাবলী (ফরম-৬ অনুযায়ী)  সম্পর্কিত তথ্য দিন');

}else if(!$('#physical_goals0').val()){

    alertify.alert('Error', 'লক্ষমাত্রা(ভৌত) সম্পর্কিত তথ্য দিন');

}else if(!$('#physical_achievment0').val()){

    alertify.alert('Error', 'অর্জন(ভৌত) সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_allocation0').val()){

    alertify.alert('Error', 'বরাদ্দ(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_cost0').val()){

    alertify.alert('Error', 'ব্যয়(আর্থিক) সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var fd6Id = $('#fd6Id').val();
var work_detail = $('#work_detail0').val();
var physical_goals = $('#physical_goals0').val();
var physical_achievment = $('#physical_achievment0').val();
var financial_allocation = $('#financial_allocation0').val();
var financial_cost = $('#financial_cost0').val();
var comment =$('#comment0').val();


$.ajax({
url: "{{ route('detailsOfForm6DataPost') }}",
method: 'post',
data: {fd6Id:fd6Id,
    work_detail:work_detail,
    physical_goals:physical_goals,
    physical_achievment:physical_achievment,
    financial_allocation:financial_allocation,
    financial_cost:financial_cost,
    comment:comment
},
success: function(data) {

    $('#formSixModal').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDataFormSix").html('');
  $("#tableAjaxDataFormSix").html(data);

 $('#work_detail0').val('');
 $('#physical_goals0').val('');
 $('#physical_achievment0').val('');
 $('#financial_allocation0').val('');
 $('#financial_cost0').val('');
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

////start adjoining f ////


$(document).on('click', '#adjoiningfModalPost', function () {

if(!$('#stepFiveType0').val()){

    alertify.alert('Error', 'ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#item_name0').val()){

    alertify.alert('Error', 'আইটেমের নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#item_quantity0').val()){

    alertify.alert('Error', 'পরিমান সম্পর্কিত তথ্য দিন');

}else if(!$('#item_net_price0').val()){

    alertify.alert('Error', 'একক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_name0').val()){

alertify.alert('Error', 'একক এর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#item_total_price0').val()){

    alertify.alert('Error', 'মোট ব্যায় সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var fd6Id = $('#fd6Id').val();
var stepFiveType = $('#stepFiveType0').val();
var item_name = $('#item_name0').val();
var item_quantity = $('#item_quantity0').val();
var unit_name = $('#unit_name0').val();
var item_net_price = $('#item_net_price0').val();
var item_total_price = $('#item_total_price0').val();


$.ajax({
url: "{{ route('adjoiningSixDataPost') }}",
method: 'post',
data: {fd6Id:fd6Id,
    unit_name:unit_name,
    stepFiveType:stepFiveType,
    item_name:item_name,
    item_quantity:item_quantity,
    item_net_price:item_net_price,
    item_total_price:item_total_price
},
success: function(data) {

    $('#adjoiningfModal').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  if(data.stepFiveType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

    $("#adjoiningSixDataTable").html('');
  $("#adjoiningSixDataTable").html(data.htmlData);

  }else if(data.stepFiveType == 'মেশিনপত্রের বর্ণনা'){

    $("#descriptionOfMachineryTable").html('');
  $("#descriptionOfMachineryTable").html(data.htmlData);

  }else if(data.stepFiveType == 'যানবাহনের বর্ণনা'){

    $("#descriptionOfVehicle").html('');
  $("#descriptionOfVehicle").html(data.htmlData);

  }

  $('#unit_name0').val('');
 $('#stepFiveType0').val('');
 $('#item_name0').val('');
 $('#item_quantity0').val('');
 $('#item_net_price0').val('');
$('#item_total_price0').val('');

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

////end adjoining f /////

$(document).on('change keyup', '[id^=item_quantity]', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);

var perQuantityPrice = $('#item_net_price'+get_id_from_main).val();
var perQuantity = $('#item_quantity'+get_id_from_main).val();

var totalPrice = perQuantityPrice*perQuantity;



$('#item_total_price'+get_id_from_main).val(totalPrice);



});

$(document).on('change keyup', '[id^=item_net_price]', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(14);

var perQuantityPrice = $('#item_net_price'+get_id_from_main).val();
var perQuantity = $('#item_quantity'+get_id_from_main).val();

var totalPrice = perQuantityPrice*perQuantity;



$('#item_total_price'+get_id_from_main).val(totalPrice);



});

$(document).on('click', '.adjoiningfModalUpdate', function () {

var main_id = $(this).attr('id');


if(!$('#stepFiveType'+main_id).val()){

alertify.alert('Error', 'ধরণ সম্পর্কিত তথ্য দিন');

}else if(!$('#item_name'+main_id).val()){

alertify.alert('Error', 'আইটেমের নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#item_quantity'+main_id).val()){

alertify.alert('Error', 'পরিমান সম্পর্কিত তথ্য দিন');

}else if(!$('#item_net_price'+main_id).val()){

alertify.alert('Error', 'একক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#unit_name'+main_id).val()){

alertify.alert('Error', 'একক এর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#item_total_price'+main_id).val()){

alertify.alert('Error', 'মোট ব্যায় সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


var fd6Id = $('#fd6Id').val();
var stepFiveType = $('#stepFiveType'+main_id).val();
var item_name = $('#item_name'+main_id).val();
var item_quantity = $('#item_quantity'+main_id).val();
var unit_name = $('#unit_name'+main_id).val();
var item_net_price = $('#item_net_price'+main_id).val();
var item_total_price = $('#item_total_price'+main_id).val();


$.ajax({
url: "{{ route('adjoiningSixDataUpdate') }}",
method: 'post',
data: {fd6Id:fd6Id,
    main_id:main_id,
    unit_name:unit_name,
stepFiveType:stepFiveType,
item_name:item_name,
item_quantity:item_quantity,
item_net_price:item_net_price,
item_total_price:item_total_price
},
success: function(data) {

$('#adjoiningfModalEdit'+main_id).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Udated Successfully');

if(data.stepFiveType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

$("#adjoiningSixDataTable").html('');
$("#adjoiningSixDataTable").html(data.htmlData);

}else if(data.stepFiveType == 'মেশিনপত্রের বর্ণনা'){

$("#descriptionOfMachineryTable").html('');
$("#descriptionOfMachineryTable").html(data.htmlData);

}else if(data.stepFiveType == 'যানবাহনের বর্ণনা'){

$("#descriptionOfVehicle").html('');
$("#descriptionOfVehicle").html(data.htmlData);

}


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
//////////////



$(document).on('click', '.formSixModalUpdate', function () {

   var main_id = $(this).attr('id');

   if(!$('#work_detail'+main_id).val()){

alertify.alert('Error', 'কার্যাবলী (ফরম-৬ অনুযায়ী)  সম্পর্কিত তথ্য দিন');

}else if(!$('#physical_goals'+main_id).val()){

alertify.alert('Error', 'লক্ষমাত্রা(ভৌত) সম্পর্কিত তথ্য দিন');

}else if(!$('#physical_achievment'+main_id).val()){

alertify.alert('Error', 'অর্জন(ভৌত) সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_allocation'+main_id).val()){

alertify.alert('Error', 'বরাদ্দ(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#financial_cost'+main_id).val()){

alertify.alert('Error', 'ব্যয়(আর্থিক) সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


var fd6Id = $('#fd6Id').val();
var work_detail = $('#work_detail'+main_id).val();
var physical_goals = $('#physical_goals'+main_id).val();
var physical_achievment = $('#physical_achievment'+main_id).val();
var financial_allocation = $('#financial_allocation'+main_id).val();
var financial_cost = $('#financial_cost'+main_id).val();
var comment =$('#comment'+main_id).val();


$.ajax({
url: "{{ route('detailsOfForm6DataUpdate') }}",
method: 'post',
data: {
main_id:main_id,
fd6Id:fd6Id,
work_detail:work_detail,
physical_goals:physical_goals,
physical_achievment:physical_achievment,
financial_allocation:financial_allocation,
financial_cost:financial_cost,
comment:comment
},
success: function(data) {

$('#formSixModalEdit'+main_id).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataFormSix").html('');
$("#tableAjaxDataFormSix").html(data);

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
</script>

<script>
     function deleteTagForm6(id) {
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
                    url: "{{ route('detailsOfForm6DataDelete') }}",
                    method: 'GET',
                    data: {fd6Id:fd6Id,id:id},
                    success: function(data) {

                    alertify.set('notifier','position', 'top-center');
                    alertify.error('Data Delete Successfully');
                    $("#tableAjaxDataFormSix").html('');
                    $("#tableAjaxDataFormSix").html(data);


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
    function deleteTagAdjoiningf(id) {
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
               var deleteEditType = $('#deleteEditType'+id).val();

               $.ajax({
                   url: "{{ route('adjoiningSixDataDelete') }}",
                   method: 'GET',
                   data: {deleteEditType:deleteEditType,fd6Id:fd6Id,id:id},
                   success: function(data) {

                   alertify.set('notifier','position', 'top-center');
                   alertify.error('Data Delete Successfully');


                   if(data.stepFiveType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

$("#adjoiningSixDataTable").html('');
$("#adjoiningSixDataTable").html(data.htmlData);

}else if(data.stepFiveType == 'মেশিনপত্রের বর্ণনা'){

$("#descriptionOfMachineryTable").html('');
$("#descriptionOfMachineryTable").html(data.htmlData);

}else if(data.stepFiveType == 'যানবাহনের বর্ণনা'){

$("#descriptionOfVehicle").html('');
$("#descriptionOfVehicle").html(data.htmlData);

}


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
    function deleteTagFd6AdjoiningG(id) {
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
                   url: "{{ route('dinpunjjiDataDelete') }}",
                   method: 'GET',
                   data: {fd6Id:fd6Id,id:id},
                   success: function(data) {

                   alertify.set('notifier','position', 'top-center');
                   alertify.error('Data Delete Successfully');
                   $("#tableAjaxDataFormSix").html('');
                   $("#tableAjaxDataFormSix").html(data);


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
