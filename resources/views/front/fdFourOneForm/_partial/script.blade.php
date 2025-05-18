<script>
$(document).on('click', '.sectorsOfExpenditureUpdate', function () {
  var mainId = $(this).attr('id');


  if(!$('#expenditure_sectors'+mainId).val()){

alertify.alert('Error', 'খরচের খাতসমূহের তথ্য দিন');

}else if(!$('#approved_budget_money'+mainId).val()){

alertify.alert('Error', 'অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#actual_cost'+mainId).val()){

alertify.alert('Error', 'প্রকৃত ব্যয় সম্পর্কিত তথ্য দিন');

}else if(!$('#difference'+mainId).val()){

alertify.alert('Error', 'পার্থক্য সম্পর্কিত তথ্য দিন');

}else if(!$('#percentage'+mainId).val()){

alertify.alert('Error', 'শতকরা হার (%) সম্পর্কিত তথ্য দিন');

}else if(!$('#reason_for_the_difference'+mainId).val()){

alertify.alert('Error', 'পার্থক্য এর কারণ সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var expenditure_sectors = $('#expenditure_sectors'+mainId).val();
    var approved_budget_money = $('#approved_budget_money'+mainId).val();
    var actual_cost = $('#actual_cost'+mainId).val();
    var difference = $('#difference'+mainId).val();
    var percentage = $('#percentage'+mainId).val();
    var reason_for_the_difference = $('#reason_for_the_difference'+mainId).val();
    var mainEditId = $('#mainEditId').val();


    $.ajax({
url: "{{ route('fdFourOneExpendatureUpdate') }}",
method: 'post',
data: {
    mainId:mainId,
    mainEditId:mainEditId,
    expenditure_sectors:expenditure_sectors,
    approved_budget_money:approved_budget_money,
    actual_cost:actual_cost,
    difference:difference,
    percentage:percentage,
    reason_for_the_difference:reason_for_the_difference,

},
success: function(data) {

$('#sectorsOfExpenditureModalEdit'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');



$("#sectorsOfExpenditureTable").html('');
$("#sectorsOfExpenditureTable").html(data);



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

///////////////////////////
$(document).on('click', '#sectorsOfExpenditurePost', function () {

if(!$('#expenditure_sectors0').val()){

alertify.alert('Error', 'খরচের খাতসমূহের তথ্য দিন');

}else if(!$('#approved_budget_money0').val()){

alertify.alert('Error', 'অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#actual_cost0').val()){

alertify.alert('Error', 'প্রকৃত ব্যয় সম্পর্কিত তথ্য দিন');

}else if(!$('#difference0').val()){

alertify.alert('Error', 'পার্থক্য সম্পর্কিত তথ্য দিন');

}else if(!$('#percentage0').val()){

alertify.alert('Error', 'শতকরা হার (%) সম্পর্কিত তথ্য দিন');

}else if(!$('#reason_for_the_difference0').val()){

alertify.alert('Error', 'পার্থক্য এর কারণ সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var expenditure_sectors = $('#expenditure_sectors0').val();
    var approved_budget_money = $('#approved_budget_money0').val();
    var actual_cost = $('#actual_cost0').val();
    var difference = $('#difference0').val();
    var percentage = $('#percentage0').val();
    var reason_for_the_difference = $('#reason_for_the_difference0').val();
    var mainEditId = $('#mainEditId').val();


    $.ajax({
url: "{{ route('fdFourOneExpendaturePost') }}",
method: 'post',
data: {
    mainEditId:mainEditId,
    expenditure_sectors:expenditure_sectors,
    approved_budget_money:approved_budget_money,
    actual_cost:actual_cost,
    difference:difference,
    percentage:percentage,
    reason_for_the_difference:reason_for_the_difference,

},
success: function(data) {

$('#sectorsOfExpenditureModal').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

 $('#expenditure_sectors0').val('');
 $('#approved_budget_money0').val('');
 $('#actual_cost0').val('');
 $('#difference0').val('');
 $('#percentage0').val('');
 $('#reason_for_the_difference0').val('');

$("#sectorsOfExpenditureTable").html('');
$("#sectorsOfExpenditureTable").html(data);



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

<script type="text/javascript">
    function deleteTagExpendature(id) {
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
    url: "{{ route('fdFourOneExpendatureDelete') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#sectorsOfExpenditureTable").html('');
      $("#sectorsOfExpenditureTable").html(data);
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
