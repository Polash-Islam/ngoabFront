<script type="text/javascript">

    function bureau_approval_file_goods_sold64(id) {

        var files = document.getElementById("bureau_approval_file_goods_sold"+id).files;
        if (files.length > 0) {

            var fileToLoad = files[0];
            var fileReader = new FileReader();
            var base64File;
            // Reading file content when it's loaded
            fileReader.onload = function(event) {
                base64File = event.target.result;
                // base64File console
                console.log(base64File);
                $("#bureau_approval_file_hidden"+id).val(base64File)
            };

            // Convert data to base64
            fileReader.readAsDataURL(fileToLoad);
        }
    }

    /////////////

    function bureau_approval_file_transferred_detail64(id) {

        var files = document.getElementById("bureau_approval_file_transferred_detail"+id).files;
        if (files.length > 0) {

            var fileToLoad = files[0];
            var fileReader = new FileReader();
            var base64File;
            // Reading file content when it's loaded
            fileReader.onload = function(event) {
                base64File = event.target.result;
                // base64File console
                console.log(base64File);
                $("#bureau_approval_file_transferred_hidden"+id).val(base64File)
            };

            // Convert data to base64
            fileReader.readAsDataURL(fileToLoad);
        }

    }
///////////////
function bureau_approval_file_goods_medium64(id) {

    var files = document.getElementById("bureau_approval_file_goods_medium"+id).files;
        if (files.length > 0) {

            var fileToLoad = files[0];
            var fileReader = new FileReader();
            var base64File;
            // Reading file content when it's loaded
            fileReader.onload = function(event) {
                base64File = event.target.result;
                // base64File console
                console.log(base64File);
                $("#bureau_approval_file_goods_medium_hidden"+id).val(base64File)
            };

            // Convert data to base64
            fileReader.readAsDataURL(fileToLoad);
        }

}

/////////

    </script>
<script>

    //used good detail strat

    $(document).on('click', '#postReceivedUsedAjax', function () {




        if(!$('#organization_usage_volume0').val()){

        alertify.alert('Error', 'সংস্থার ব্যবহারের পরিমাণ সম্পর্কিত তথ্য দিন');

        }else if(!$('#person_detail0').val()){

        alertify.alert('Error', 'যাকে প্রদান করা হয়েছে তাঁর সম্পর্কিত তথ্য দিন');

        }else if(!$('#details_of_any_goods_sold0').val()){

        alertify.alert('Error', 'কোন মালামাল বিক্রয় করা হয়ে থাকলে তার সম্পর্কিত তথ্য দিন');

        }else if(!$('#bureau_approval_file_hidden0').val()){

        alertify.alert('Error', 'কোন মালামাল বিক্রয় করা হয়ে থাকলে তার অনুমোদনপত্র সম্পর্কিত তথ্য দিন');

        }else if(!$('#goods_transferred_detail0').val()){

        alertify.alert('Error', 'কোন মালামাল হস্তান্তর করা হয়ে থাকলে,তার সম্পর্কিত তথ্য দিন');

        }else if(!$('#bureau_approval_file_transferred_hidden0').val()){

        alertify.alert('Error', 'কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার অনুমোদনপত্র সম্পর্কিত তথ্য দিন');

        }else if(!$('#detail_of_goods_medium0').val()){

        alertify.alert('Error', 'যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে সম্পর্কিত তথ্য দিন');

        }else if(!$('#bureau_approval_file_goods_medium_hidden0').val()){

        alertify.alert('Error', 'যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার অনুমোদনপত্র সম্পর্কিত তথ্য দিন');

        }else if(!$('#details_of_remaining_goods0').val()){

        alertify.alert('Error', 'অবশিষ্ট মালামালের সম্পর্কিত তথ্য দিন');

        }else{


            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });



var mainEditId = $('#mainEditId').val();

var organization_usage_volume = $('#organization_usage_volume0').val();
var person_detail = $('#person_detail0').val();
var details_of_any_goods_sold = $('#details_of_any_goods_sold0').val();
var bureau_approval_file_hidden = $('#bureau_approval_file_hidden0').val();
var goods_transferred_detail =$('#goods_transferred_detail0').val();
var bureau_approval_file_transferred_hidden =$('#bureau_approval_file_transferred_hidden0').val();
var detail_of_goods_medium =$('#detail_of_goods_medium0').val();
var bureau_approval_file_goods_medium_hidden =$('#bureau_approval_file_goods_medium_hidden0').val();
var details_of_remaining_goods =$('#details_of_remaining_goods0').val();


$.ajax({
url: "{{ route('fdFiveReceivedGoodsUsedPost') }}",
method: 'post',
data: {
    mainEditId:mainEditId,
    organization_usage_volume:organization_usage_volume,
    person_detail:person_detail,
    details_of_any_goods_sold:details_of_any_goods_sold,
    bureau_approval_file_hidden:bureau_approval_file_hidden,
    goods_transferred_detail:goods_transferred_detail,
    bureau_approval_file_transferred_hidden:bureau_approval_file_transferred_hidden,
    detail_of_goods_medium:detail_of_goods_medium,
    bureau_approval_file_goods_medium_hidden:bureau_approval_file_goods_medium_hidden,
    details_of_remaining_goods:details_of_remaining_goods,
},
success: function(data) {

$('#exampleModal121').modal('hide');



$("#receivedUsedId").val(1);

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataReceivedUsedGoods").html('');
$("#tableAjaxDataReceivedUsedGoods").html(data);

var organization_usage_volume = $('#organization_usage_volume0').val('');
var person_detail = $('#person_detail0').html('');
var details_of_any_goods_sold = $('#details_of_any_goods_sold0').html('');
var bureau_approval_file_hidden = $('#bureau_approval_file_hidden0').val('');

$('#person_detail0').summernote('reset');
$('#details_of_any_goods_sold0').summernote('reset');
$('#goods_transferred_detail0').summernote('reset');
$('#detail_of_goods_medium0').summernote('reset');
$('#details_of_remaining_goods0').summernote('reset');

$('#bureau_approval_file_goods_sold0').val('');
$('#bureau_approval_file_transferred_detail0').val('');
$('#bureau_approval_file_goods_medium0').val('');


var goods_transferred_detail =$('#goods_transferred_detail0').html('');
var bureau_approval_file_transferred_hidden =$('#bureau_approval_file_transferred_hidden0').val('');
var detail_of_goods_medium =$('#detail_of_goods_medium0').html('');
var bureau_approval_file_goods_medium_hidden =$('#bureau_approval_file_goods_medium_hidden0').val('');
var details_of_remaining_goods =$('#details_of_remaining_goods0').html('');

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


    //update post for received good update



$(document).on('click', '.updateReceivedUsedAjax', function () {

      var mainId = $(this).attr('id');
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });



var mainEditId = $('#mainEditId').val();

var organization_usage_volume = $('#organization_usage_volume'+mainId).val();
var person_detail = $('#person_detail'+mainId).val();
var details_of_any_goods_sold = $('#details_of_any_goods_sold'+mainId).val();
var bureau_approval_file_hidden = $('#bureau_approval_file_hidden'+mainId).val();
var goods_transferred_detail =$('#goods_transferred_detail'+mainId).val();
var bureau_approval_file_transferred_hidden =$('#bureau_approval_file_transferred_hidden'+mainId).val();
var detail_of_goods_medium =$('#detail_of_goods_medium'+mainId).val();
var bureau_approval_file_goods_medium_hidden =$('#bureau_approval_file_goods_medium_hidden'+mainId).val();
var details_of_remaining_goods =$('#details_of_remaining_goods'+mainId).val();


$.ajax({
url: "{{ route('fdFiveReceivedGoodsUsedUpdate') }}",
method: 'post',
data: {
    mainId:mainId,
    mainEditId:mainEditId,
    organization_usage_volume:organization_usage_volume,
    person_detail:person_detail,
    details_of_any_goods_sold:details_of_any_goods_sold,
    bureau_approval_file_hidden:bureau_approval_file_hidden,
    goods_transferred_detail:goods_transferred_detail,
    bureau_approval_file_transferred_hidden:bureau_approval_file_transferred_hidden,
    detail_of_goods_medium:detail_of_goods_medium,
    bureau_approval_file_goods_medium_hidden:bureau_approval_file_goods_medium_hidden,
    details_of_remaining_goods:details_of_remaining_goods,
},
success: function(data) {

    

    $('#bureau_approval_file_goods_sold'+mainId).val('');
$('#bureau_approval_file_transferred_detail'+mainId).val('');
$('#bureau_approval_file_goods_medium'+mainId).val('');

$('#exampleModalDataUpdateUsed'+mainId).modal('hide');
$("#receivedUsedId").val(1);

alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

$("#tableAjaxDataReceivedUsedGoods").html('');
$("#tableAjaxDataReceivedUsedGoods").html(data);

},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

});

    //update post for received good update




    //used good detail end

$(document).on('click', '#postReceivedAjax', function () {

if(!$('#source_received_date0').val()){

alertify.alert('Error', 'তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#source_of_goods_name0').val()){

alertify.alert('Error', 'যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#source_of_goods_address0').val()){

alertify.alert('Error', 'যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#actual_of_receipt_source0').val()){

alertify.alert('Error', 'গ্রহণের প্রকৃত (শুল্কমূক্তভাবে গ্রহণকৃত/শুল্ক পরিশোধ করে গ্রহণকৃত) সম্পর্কিত তথ্য দিন');

}else if(!$('#purpose_of_receipt_goods0').val()){

alertify.alert('Error', 'জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য সম্পর্কিত তথ্য দিন');

}else if(!$('#amount_of_material_received0').val()){

alertify.alert('Error', 'গ্রহণকৃত সামগ্রীর পরিমান সম্পর্কিত তথ্য দিন');

}else if(!$('#estimated_value_of_goods0').val()){

alertify.alert('Error', 'গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#date_of_project_approval0').val()){

alertify.alert('Error', 'ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#date_of_Commitment0').val()){

alertify.alert('Error', 'প্রতিশ্রুতি প্রদানের তারিখ সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var mainEditId = $('#mainEditId').val();

var source_received_date = $('#source_received_date0').val();
var source_of_goods_name = $('#source_of_goods_name0').val();
var source_of_goods_address = $('#source_of_goods_address0').val();
var actual_of_receipt_source = $('#actual_of_receipt_source0').val();
var purpose_of_receipt_goods =$('#purpose_of_receipt_goods0').val();
var amount_of_material_received =$('#amount_of_material_received0').val();
var estimated_value_of_goods =$('#estimated_value_of_goods0').val();
var date_of_project_approval =$('#date_of_project_approval0').val();
var date_of_Commitment =$('#date_of_Commitment0').val();


$.ajax({
url: "{{ route('fdFiveReceivedGoodsPost') }}",
method: 'get',
data: {
    mainEditId:mainEditId,
    source_received_date:source_received_date,
    source_of_goods_name:source_of_goods_name,
    source_of_goods_address:source_of_goods_address,
    actual_of_receipt_source:actual_of_receipt_source,
    purpose_of_receipt_goods:purpose_of_receipt_goods,
    amount_of_material_received:amount_of_material_received,
    estimated_value_of_goods:estimated_value_of_goods,
    date_of_project_approval:date_of_project_approval,
    date_of_Commitment:date_of_Commitment
},
success: function(data) {

$('#exampleModal').modal('hide');



$("#receivedId").val(1);

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataReceivedGoods").html('');
$("#tableAjaxDataReceivedGoods").html(data);

var source_received_date = $('#source_received_date0').val('');
var source_of_goods_name = $('#source_of_goods_name0').val('');
var source_of_goods_address = $('#source_of_goods_address0').val('');
var actual_of_receipt_source = $('#actual_of_receipt_source0').val('');
var purpose_of_receipt_goods =$('#purpose_of_receipt_goods0').val('');
var amount_of_material_received =$('#amount_of_material_received0').val('');
var estimated_value_of_goods =$('#estimated_value_of_goods0').val('');
var date_of_project_approval =$('#date_of_project_approval0').val('');
var date_of_Commitment =$('#date_of_Commitment0').val('');

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

///edir code
$(document).on('click', '.updateReceivedAjax', function () {

var mainId = $(this).attr('id');

if(!$('#source_received_date'+mainId).val()){

alertify.alert('Error', 'তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#source_of_goods_name'+mainId).val()){

alertify.alert('Error', 'যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#source_of_goods_address'+mainId).val()){

alertify.alert('Error', 'যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#actual_of_receipt_source'+mainId).val()){

alertify.alert('Error', 'গ্রহণের প্রকৃত (শুল্কমূক্তভাবে গ্রহণকৃত/শুল্ক পরিশোধ করে গ্রহণকৃত) সম্পর্কিত তথ্য দিন');

}else if(!$('#purpose_of_receipt_goods'+mainId).val()){

alertify.alert('Error', 'জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য সম্পর্কিত তথ্য দিন');

}else if(!$('#amount_of_material_received'+mainId).val()){

alertify.alert('Error', 'গ্রহণকৃত সামগ্রীর পরিমান সম্পর্কিত তথ্য দিন');

}else if(!$('#estimated_value_of_goods'+mainId).val()){

alertify.alert('Error', 'গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য সম্পর্কিত তথ্য দিন');

}else if(!$('#date_of_project_approval'+mainId).val()){

alertify.alert('Error', 'ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#date_of_Commitment'+mainId).val()){

alertify.alert('Error', 'প্রতিশ্রুতি প্রদানের তারিখ সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var mainEditId = $('#mainEditId').val();

var source_received_date = $('#source_received_date'+mainId).val();
var source_of_goods_name = $('#source_of_goods_name'+mainId).val();
var source_of_goods_address = $('#source_of_goods_address'+mainId).val();
var actual_of_receipt_source = $('#actual_of_receipt_source'+mainId).val();
var purpose_of_receipt_goods =$('#purpose_of_receipt_goods'+mainId).val();
var amount_of_material_received =$('#amount_of_material_received'+mainId).val();
var estimated_value_of_goods =$('#estimated_value_of_goods'+mainId).val();
var date_of_project_approval =$('#date_of_project_approval'+mainId).val();
var date_of_Commitment =$('#date_of_Commitment'+mainId).val();


$.ajax({
url: "{{ route('fdFiveReceivedGoodsUpdate') }}",
method: 'post',
data: {
    mainId:mainId,
    mainEditId:mainEditId,
    source_received_date:source_received_date,
    source_of_goods_name:source_of_goods_name,
    source_of_goods_address:source_of_goods_address,
    actual_of_receipt_source:actual_of_receipt_source,
    purpose_of_receipt_goods:purpose_of_receipt_goods,
    amount_of_material_received:amount_of_material_received,
    estimated_value_of_goods:estimated_value_of_goods,
    date_of_project_approval:date_of_project_approval,
    date_of_Commitment:date_of_Commitment
},
success: function(data) {

$('#exampleModalDataUpdate'+mainId).modal('hide');



$("#receivedId").val(1);

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataReceivedGoods").html('');
$("#tableAjaxDataReceivedGoods").html(data);

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

    function deleteTagReceivedGoods(id) {
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
    url: "{{ route('fdFiveReceivedGoodsDelete') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataReceivedGoods").html('');
      $("#tableAjaxDataReceivedGoods").html(data);
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

    function deleteTagReceivedGoodsUsed(id) {
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
    url: "{{ route('fdFiveReceivedGoodsUsedDelete') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id},
    success: function(data) {
        $('.summernote').summernote();
      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataReceivedUsedGoods").html('');
      $("#tableAjaxDataReceivedUsedGoods").html(data);
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
