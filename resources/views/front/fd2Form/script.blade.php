<script>


    $(document).on('click', '#fd2alldataPostFcOne', function () {

if(!$('#prokolpoName').val()){

    alertify.alert('Error', 'কার্যক্রম  সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_real').val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_financial').val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_real').val()){

    alertify.alert('Error', 'অর্জন(%)(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_financial').val()){

    alertify.alert('Error', 'অর্জন(%)(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#total_benificiari').val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var mainEditId = $('#mainEditId').val();
var prokolpoName = $('#prokolpoName').val();
var last_year_target_real = $('#last_year_target_real').val();
var last_year_target_financial = $('#last_year_target_financial').val();
var last_year_achievment_real = $('#last_year_achievment_real').val();
var last_year_achievment_financial = $('#last_year_achievment_financial').val();
var total_benificiari =$('#total_benificiari').val();
var comment = $('#comment').val();
var fd7_form_id = $('#fc1_form_id').val();
var type =$('#mainType').val();


$.ajax({
url: "{{ route('addlastYearDetail') }}",
method: 'post',
data: {mainEditId:mainEditId,prokolpoName:prokolpoName,last_year_target_real:last_year_target_real,last_year_target_financial:last_year_target_financial,last_year_achievment_real:last_year_achievment_real,last_year_achievment_financial:last_year_achievment_financial,total_benificiari:total_benificiari,comment:comment,fd7_form_id:fd7_form_id,type:type},
success: function(data) {

    $('#exampleModal').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatafd2").html('');
  $("#tableAjaxDatafd2").html(data);

  $('#prokolpoName').val('');
 $('#last_year_target_real').val('');
$('#last_year_target_financial').val('');
 $('#last_year_achievment_real').val('');
 $('#last_year_achievment_financial').val('');
$('#municipality_name0').val('');
$('#total_benificiari').val('');
 $('#comment').val('');


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
    $(document).on('click', '#fd2alldataPost', function () {

if(!$('#prokolpoName').val()){

    alertify.alert('Error', 'কার্যক্রম  সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_real').val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_financial').val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_real').val()){

    alertify.alert('Error', 'অর্জন(%)(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_financial').val()){

    alertify.alert('Error', 'অর্জন(%)(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#total_benificiari').val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var mainEditId = $('#mainEditId').val();
var prokolpoName = $('#prokolpoName').val();
var last_year_target_real = $('#last_year_target_real').val();
var last_year_target_financial = $('#last_year_target_financial').val();
var last_year_achievment_real = $('#last_year_achievment_real').val();
var last_year_achievment_financial = $('#last_year_achievment_financial').val();
var total_benificiari =$('#total_benificiari').val();
var comment = $('#comment').val();
var fd7_form_id = $('#fd7_form_id').val();
var type =$('#mainType').val();


$.ajax({
url: "{{ route('addlastYearDetail') }}",
method: 'post',
data: {mainEditId:mainEditId,prokolpoName:prokolpoName,last_year_target_real:last_year_target_real,last_year_target_financial:last_year_target_financial,last_year_achievment_real:last_year_achievment_real,last_year_achievment_financial:last_year_achievment_financial,total_benificiari:total_benificiari,comment:comment,fd7_form_id:fd7_form_id,type:type},
success: function(data) {

    $('#exampleModal').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatafd2").html('');
  $("#tableAjaxDatafd2").html(data);

  $('#prokolpoName').val('');
 $('#last_year_target_real').val('');
$('#last_year_target_financial').val('');
 $('#last_year_achievment_real').val('');
 $('#last_year_achievment_financial').val('');
$('#municipality_name0').val('');
$('#total_benificiari').val('');
 $('#comment').val('');


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


////////////////////

$(document).on('click', '.lastYearDataUpdate', function () {

    var mainId = $(this).attr('id');

if(!$('#prokolpoName'+mainId).val()){

    alertify.alert('Error', 'কার্যক্রম  সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_real'+mainId).val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_target_financial'+mainId).val()){

    alertify.alert('Error', 'বিগত বছরের লক্ষ্যমাত্রা(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_real'+mainId).val()){

    alertify.alert('Error', 'অর্জন(%)(বাস্তব) সম্পর্কিত তথ্য দিন');

}else if(!$('#last_year_achievment_financial'+mainId).val()){

    alertify.alert('Error', 'অর্জন(%)(আর্থিক) সম্পর্কিত তথ্য দিন');

}else if(!$('#total_benificiari'+mainId).val()){

    alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var mainEditId = $('#mainEditId').val();
var prokolpoName = $('#prokolpoName'+mainId).val();
var last_year_target_real = $('#last_year_target_real'+mainId).val();
var last_year_target_financial = $('#last_year_target_financial'+mainId).val();
var last_year_achievment_real = $('#last_year_achievment_real'+mainId).val();
var last_year_achievment_financial = $('#last_year_achievment_financial'+mainId).val();
var total_benificiari =$('#total_benificiari'+mainId).val();
var comment = $('#comment'+mainId).val();
var fd7_form_id = $('#fd7_form_id'+mainId).val();
var type =$('#mainType').val();


$.ajax({
url: "{{ route('updatelastYearDetail') }}",
method: 'post',
data: {mainEditId:mainEditId,mainId:mainId,prokolpoName:prokolpoName,last_year_target_real:last_year_target_real,last_year_target_financial:last_year_target_financial,last_year_achievment_real:last_year_achievment_real,last_year_achievment_financial:last_year_achievment_financial,total_benificiari:total_benificiari,comment:comment,fd7_form_id:fd7_form_id,type:type},
success: function(data) {

    $('#prokolpoAreaModalEdit'+mainId).modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatafd2").html('');
  $("#tableAjaxDatafd2").html(data);

  $('#prokolpoName'+mainId).val('');
 $('#last_year_target_real'+mainId).val('');
$('#last_year_target_financial'+mainId).val('');
 $('#last_year_achievment_real'+mainId).val('');
 $('#last_year_achievment_financial'+mainId).val('');

$('#total_benificiari'+mainId).val('');
 $('#comment'+mainId).val('');


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
                var type =$('#mainType').val();
                var mainEditId = $('#mainEditId').val();
                $.ajax({
    url: "{{ route('deletelastYearDetail') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id,type:type},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDatafd2").html('');
      $("#tableAjaxDatafd2").html(data);
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
