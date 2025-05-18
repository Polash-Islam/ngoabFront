<script>

    ////strat code

    $(document).on('click', '.employeeAddUpdate', function () {

       var mainId = $(this).attr('id');

       if(!$('#organization_ceo_name'+mainId).val()){

alertify.alert('Error', 'কর্মকর্তার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_designation'+mainId).val()){

alertify.alert('Error', 'পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_telephone'+mainId).val()){

alertify.alert('Error', 'টেলিফোন সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_mobile'+mainId).val()){

alertify.alert('Error', 'মোবাইল সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_email'+mainId).val()){

alertify.alert('Error', 'ইমেইল সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });



    var mainEditId = $('#mainEditId').val();


    var organization_ceo_name = $('#organization_ceo_name'+mainId).val();
    var organization_ceo_designation = $('#organization_ceo_designation'+mainId).val();
    var organization_ceo_telephone = $('#organization_ceo_telephone'+mainId).val();
    var organization_ceo_mobile = $('#organization_ceo_mobile'+mainId).val();
    var organization_ceo_email = $('#organization_ceo_email'+mainId).val();



    $.ajax({
url: "{{ route('fd3FormSendEmployeeUpdate') }}",
method: 'post',
data: {
    mainEditId:mainEditId,
    mainId:mainId,
organization_ceo_name:organization_ceo_name,
organization_ceo_designation:organization_ceo_designation,
organization_ceo_telephone:organization_ceo_telephone,
organization_ceo_mobile:organization_ceo_mobile,
organization_ceo_email:organization_ceo_email

},
success: function(data) {

$('#exampleModalDataUpdate'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');



$("#exampleModalNewData").html('');
$("#exampleModalNewData").html(data);



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

    ////end code


$(document).on('click', '#employeeAddPost', function () {

if(!$('#organization_ceo_name0').val()){

alertify.alert('Error', 'কর্মকর্তার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_designation0').val()){

alertify.alert('Error', 'পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_telephone0').val()){

alertify.alert('Error', 'টেলিফোন সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_mobile0').val()){

alertify.alert('Error', 'মোবাইল সম্পর্কিত তথ্য দিন');

}else if(!$('#organization_ceo_email0').val()){

alertify.alert('Error', 'ইমেইল সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var mainEditId = $('#mainEditId').val();
    var organization_ceo_name = $('#organization_ceo_name0').val();
    var organization_ceo_designation = $('#organization_ceo_designation0').val();
    var organization_ceo_telephone = $('#organization_ceo_telephone0').val();
    var organization_ceo_mobile = $('#organization_ceo_mobile0').val();
    var organization_ceo_email = $('#organization_ceo_email0').val();



    $.ajax({
url: "{{ route('fd3FormSendEmployeePost') }}",
method: 'post',
data: {
    mainEditId:mainEditId,
organization_ceo_name:organization_ceo_name,
organization_ceo_designation:organization_ceo_designation,
organization_ceo_telephone:organization_ceo_telephone,
organization_ceo_mobile:organization_ceo_mobile,
organization_ceo_email:organization_ceo_email

},
success: function(data) {

$('#exampleModalOneNew').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

     $('#organization_ceo_name0').val('');
     $('#organization_ceo_designation0').val('');
     $('#organization_ceo_telephone0').val('');
     $('#organization_ceo_mobile0').val('');
     $('#organization_ceo_email0').val('');

$("#exampleModalNewData").html('');
$("#exampleModalNewData").html(data);



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
    function deleteTagEmployeeNew(id) {
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
    url: "{{ route('fd3FormSendEmployeeDelete') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#exampleModalNewData").html('');
      $("#exampleModalNewData").html(data);
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
    $(document).on('click', '.fdthreeOtherFile', function () {

        var fdthreeOtherFileId = $(this).attr('id');


        $.ajax({
url: "{{ route('fd3OtherFileModal') }}",
method: 'get',
data: {
    fdthreeOtherFileId:fdthreeOtherFileId,

},
success: function(data) {

    $('#mmexampleModalFile').modal('show');

$("#extraFileForm").html('');
$("#extraFileForm").html(data);



},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});




    });
</script>

<script>


    $(document).on('click', '#upload_form', function () {

        event.preventDefault();


       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $('#updateId').val();
        var photo = $('#updateFile')[0].files[0];

                var formData = new FormData();
                formData.append('id', id);
                formData.append('photo', photo);

                //alert(formData);

       $.ajax({
            url: "{{ route('fd3OtherFileUpdate') }}",
            method: 'get',
            data:formData,
            //dataType:'JSON',
            cache: false,
            contentType : false,
            processData : false,
            success: function(data) {

            $('#mmexampleModalFile').modal('hide');
            alertify.set('notifier','position', 'top-center');
            alertify.success('Data Updated Successfully');

            },
            beforeSend: function(){
            $('#pageloader').show()
            },
            complete: function(){
            $('#pageloader').hide();
            }
        });

    });
</script>
