<script>

//step four partner ngo edit strat
$(document).on('click', '.NewpartnerNgoUpdate', function () {

    var mainId = $(this).attr('id');


    if(!$('#division_name'+mainId).val()){

alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_name'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_address'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_telephone'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর টেলিফোন সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_mobile'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর মোবাইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_email'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর ইমেইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_reg_name'+mainId).val()){

  alertify.alert('Error', 'পার্টনার এনজিওর নিবন্ধন নং সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_duration'+mainId).val()){

alertify.alert('Error', 'পার্টনার এনজিওর মেয়াদ সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_work_detail'+mainId).val()){

alertify.alert('Error', 'বাস্তবায়িতব্য কার্যক্রমসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#budget_detail'+mainId).val()){

alertify.alert('Error', 'বাজেট সম্পর্কিত তথ্য দিন');

}else if(!$('#execution_deadline'+mainId).val()){

alertify.alert('Error', 'সম্পাদনের সময়সীমা সম্পর্কিত তথ্য দিন');

}else if(!$('#beneficiary'+mainId).val()){

alertify.alert('Error', 'উপকারভোগী সম্পর্কিত তথ্য দিন');

}else{
    //alert(mainId);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var partner_ngo_name = $('#partner_ngo_name'+mainId).val();
    var division_name = $('#division_name'+mainId).val();
    var district_name = $('#district_name'+mainId).val();
    var city_corparation_name = $('#city_corparation_name'+mainId).val();
    var upozila_name = $('#upozila_name'+mainId).val();
    var thana_name = $('#thana_name'+mainId).val();
    var municipality_name = $('#municipality_name'+mainId).val();
    var ward_name =$('#ward_name'+mainId).val();

    var partner_ngo_address =$('#partner_ngo_address'+mainId).val();
    var partner_ngo_telephone =$('#partner_ngo_telephone'+mainId).val();
    var partner_ngo_mobile =$('#partner_ngo_mobile'+mainId).val();
    var partner_ngo_email =$('#partner_ngo_email'+mainId).val();
    var partner_ngo_reg_name =$('#partner_ngo_reg_name'+mainId).val();
    var partner_ngo_duration = $('#partner_ngo_duration'+mainId).val();

    var partner_ngo_work_detail = $('#partner_ngo_work_detail'+mainId).val();
    var budget_detail = $('#budget_detail'+mainId).val();
    var execution_deadline = $('#execution_deadline'+mainId).val();
    var beneficiary = $('#beneficiary'+mainId).val();
    var fd6Id = $('#fd6Id').val();

    $.ajax({
url: "{{ route('partnerDataUpdate') }}",
method: 'post',
data: {
fd6Id:fd6Id,
mainId:mainId,
partner_ngo_name:partner_ngo_name,
division_name:division_name,
district_name:district_name,
city_corparation_name:city_corparation_name,
upozila_name:upozila_name,
thana_name:thana_name,
municipality_name:municipality_name,
ward_name:ward_name,
partner_ngo_address:partner_ngo_address,
partner_ngo_telephone:partner_ngo_telephone,
partner_ngo_mobile:partner_ngo_mobile,
partner_ngo_email:partner_ngo_email,
partner_ngo_reg_name:partner_ngo_reg_name,
partner_ngo_duration:partner_ngo_duration,
partner_ngo_work_detail:partner_ngo_work_detail,
budget_detail:budget_detail,
execution_deadline:execution_deadline,
beneficiary:beneficiary
},
success: function(data) {

$('#prokolpoPartnerNgo'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataPartner").html('');
$("#tableAjaxDataPartner").html(data);



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
//step four partner ngo edit end



$(document).on('click', '.employeeInfoPostUpdate', function () {

var mainId = $(this).attr('id');

if(!$('#name'+mainId).val()){

alertify.alert('Error', 'নাম  সম্পর্কিত তথ্য দিন');

}else if(!$('#designation'+mainId).val()){

alertify.alert('Error', 'পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#nationality'+mainId).val()){

alertify.alert('Error', 'জাতীয়তা সম্পর্কিত তথ্য দিন');

}else if(!$('#duration'+mainId).val()){

alertify.alert('Error', 'মেয়াদ (জনমাস) সম্পর্কিত তথ্য দিন');

}else if(!$('#educational_qualification'+mainId).val()){

alertify.alert('Error', 'শিক্ষাগত যোগ্যতা সম্পর্কিত তথ্য দিন');

}else if(!$('#experience'+mainId).val()){

alertify.alert('Error', 'অভিজ্ঞতা সম্পর্কিত তথ্য দিন');

}else if(!$('#responsibility'+mainId).val()){

alertify.alert('Error', 'দায়িত্বসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_this_project'+mainId).val()){

alertify.alert('Error', 'বেতন-ভাতাদি(এই প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_other_project'+mainId).val()){

alertify.alert('Error', 'বেতন-ভাতাদি(অন্যান্য প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else{
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var name = $('#name'+mainId).val();
    var designation = $('#designation'+mainId).val();
    var nationality = $('#nationality'+mainId).val();
    var duration = $('#duration'+mainId).val();
    var educational_qualification = $('#educational_qualification'+mainId).val();
    var experience = $('#experience'+mainId).val();
    var responsibility = $('#responsibility'+mainId).val();
    var salary_from_this_project =$('#salary_from_this_project'+mainId).val();
    var salary_from_other_project =$('#salary_from_other_project'+mainId).val();
    var fd6Id = $('#fd6Id').val();

    $.ajax({
url: "{{ route('employeeDataUpdate') }}",
method: 'post',
data: {
    fd6Id:fd6Id,
mainId:mainId,
name:name,
designation:designation,
nationality:nationality,
duration:duration,
educational_qualification:educational_qualification,
experience:experience,
responsibility:responsibility,
salary_from_this_project:salary_from_this_project,
salary_from_other_project:salary_from_other_project
},
success: function(data) {

$('#employeeNgo'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');


$("#tableAjaxDataEmployee").html('');
$("#tableAjaxDataEmployee").html(data);



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
$(document).on('click', '#partnerNgoPost', function () {

var fd6Id = $('#fd6Id').val();

if(!$('#division_name0').val()){

   alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_name0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_address0').val()){

  alertify.alert('Error', 'পার্টনার এনজিওর ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_telephone0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর টেলিফোন সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_mobile0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর মোবাইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_email0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর ইমেইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_reg_name0').val()){

     alertify.alert('Error', 'পার্টনার এনজিওর নিবন্ধন নং সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_duration0').val()){

alertify.alert('Error', 'পার্টনার এনজিওর মেয়াদ সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_work_detail0').val()){

alertify.alert('Error', 'বাস্তবায়িতব্য কার্যক্রমসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#budget_detail0').val()){

alertify.alert('Error', 'বাজেট সম্পর্কিত তথ্য দিন');

}else if(!$('#execution_deadline0').val()){

alertify.alert('Error', 'সম্পাদনের সময়সীমা সম্পর্কিত তথ্য দিন');

}else if(!$('#beneficiary0').val()){

alertify.alert('Error', 'উপকারভোগী সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var partner_ngo_name = $('#partner_ngo_name0').val();
    var division_name = $('#division_name0').val();
    var district_name = $('#district_name0').val();
    var city_corparation_name = $('#city_corparation_name0').val();
    var upozila_name = $('#upozila_name0').val();
    var thana_name = $('#thana_name0').val();
    var municipality_name = $('#municipality_name0').val();
    var ward_name =$('#ward_name0').val();

    var partner_ngo_address =$('#partner_ngo_address0').val();
    var partner_ngo_telephone =$('#partner_ngo_telephone0').val();
    var partner_ngo_mobile =$('#partner_ngo_mobile0').val();
    var partner_ngo_email =$('#partner_ngo_email0').val();
    var partner_ngo_reg_name =$('#partner_ngo_reg_name0').val();
    var partner_ngo_duration = $('#partner_ngo_duration0').val();

    var partner_ngo_work_detail = $('#partner_ngo_work_detail0').val();
    var budget_detail = $('#budget_detail0').val();
    var execution_deadline = $('#execution_deadline0').val();
    var beneficiary = $('#beneficiary0').val();


    $.ajax({
url: "{{ route('partnerDataPost') }}",
method: 'post',
data: {
fd6Id:fd6Id,
partner_ngo_name:partner_ngo_name,
division_name:division_name,
district_name:district_name,
city_corparation_name:city_corparation_name,
upozila_name:upozila_name,
thana_name:thana_name,
municipality_name:municipality_name,
ward_name:ward_name,
partner_ngo_address:partner_ngo_address,
partner_ngo_telephone:partner_ngo_telephone,
partner_ngo_mobile:partner_ngo_mobile,
partner_ngo_email:partner_ngo_email,
partner_ngo_reg_name:partner_ngo_reg_name,
partner_ngo_duration:partner_ngo_duration,
partner_ngo_work_detail:partner_ngo_work_detail,
budget_detail:budget_detail,
execution_deadline:execution_deadline,
beneficiary:beneficiary
},
success: function(data) {

$('#PartnerNGO').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$('#partner_ngo_name0').val('');
$('#division_name0').val('');
$('#district_name0').val('');
$('#city_corparation_name0').val('');
$('#upozila_name0').val('');
$('#thana_name0').val('');
$('#municipality_name0').val('');
$('#ward_name0').val('');
$('#partner_ngo_address0').val('');
$('#partner_ngo_telephone0').val('');
$('#partner_ngo_mobile').val('');
$('#partner_ngo_email0').val('');
$('#partner_ngo_reg_name').val('');
$('#partner_ngo_duration0').val('');
$('#partner_ngo_work_detail0').val('');
$('#budget_detail0').val('');
$('#execution_deadline0').val('');
 $('#beneficiary0').val('');

$("#tableAjaxDataPartner").html('');
$("#tableAjaxDataPartner").html(data);



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

///////////
$(document).on('click', '#employeeInfoPost', function () {

    var fd6Id = $('#fd6Id').val();

    if(!$('#name0').val()){

alertify.alert('Error', 'নাম  সম্পর্কিত তথ্য দিন');

}else if(!$('#designation0').val()){

alertify.alert('Error', 'পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#nationality0').val()){

alertify.alert('Error', 'জাতীয়তা সম্পর্কিত তথ্য দিন');

}else if(!$('#duration0').val()){

alertify.alert('Error', 'মেয়াদ (জনমাস) সম্পর্কিত তথ্য দিন');

}else if(!$('#educational_qualification0').val()){

alertify.alert('Error', 'শিক্ষাগত যোগ্যতা সম্পর্কিত তথ্য দিন');

}else if(!$('#experience0').val()){

alertify.alert('Error', 'অভিজ্ঞতা সম্পর্কিত তথ্য দিন');

}else if(!$('#responsibility0').val()){

alertify.alert('Error', 'দায়িত্বসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_this_project0').val()){

alertify.alert('Error', 'বেতন-ভাতাদি(এই প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_other_project0').val()){

alertify.alert('Error', 'বেতন-ভাতাদি(অন্যান্য প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else{
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var name = $('#name0').val();
    var designation = $('#designation0').val();
    var nationality = $('#nationality0').val();
    var duration = $('#duration0').val();
    var educational_qualification = $('#educational_qualification0').val();
    var experience = $('#experience0').val();
    var responsibility = $('#responsibility0').val();
    var salary_from_this_project =$('#salary_from_this_project0').val();
    var salary_from_other_project =$('#salary_from_other_project0').val();


    $.ajax({
url: "{{ route('employeeDataPost') }}",
method: 'get',
data: {
fd6Id:fd6Id,
name:name,
designation:designation,
nationality:nationality,
duration:duration,
educational_qualification:educational_qualification,
experience:experience,
responsibility:responsibility,
salary_from_this_project:salary_from_this_project,
salary_from_other_project:salary_from_other_project
},
success: function(data) {

$('#ProkolppoKormokorta').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

        $('#name0').val('');
        $('#designation0').val('');
        $('#nationality0').val('');
        $('#duration0').val('');
        $('#educational_qualification0').val('');
        $('#experience0').val('');
        $('#responsibility0').val('');
        $('#salary_from_this_project0').val('');
        $('#salary_from_other_project0').val('');

$("#tableAjaxDataEmployee").html('');
$("#tableAjaxDataEmployee").html(data);



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
<!--partnerDataDelete start-->

<script type="text/javascript">
    function deleteTagEmployeeNgo(id) {
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
    url: "{{ route('employeeDataDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataEmployee").html('');
      $("#tableAjaxDataEmployee").html(data);
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
    function deleteTagPartnerNgo(id) {
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
    url: "{{ route('partnerDataDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataPartner").html('');
      $("#tableAjaxDataPartner").html(data);
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

<!--partnerDataDelete end-->
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