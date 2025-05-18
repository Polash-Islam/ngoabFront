<script>

$(document).on('click', '.GrantAjaxEdit', function () {

var main_id = $(this).attr('id');

if(!$('#grants_total'+main_id).val()){

alertify.alert('Error', 'বিদেশ থেকে প্রাপ্ত অনুদান অথবা বিদেশি দাতার প্রদত্ত অনুদান অথবা স্থানীয় অনুদান সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpo_year_grant_start_date'+main_id).val()){

alertify.alert('Error', 'প্রকল্পের মেয়াদ শুরুর তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpo_year_grant_end_date'+main_id).val()){

alertify.alert('Error', 'প্রকল্পের মেয়াদ সমাপ্তির তারিখ সম্পর্কিত তথ্য দিন');

}else{

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

var grants_received_from_abroad = $('#grants_received_from_abroad'+main_id).val();
var donations_made_by_foreign_donors = $('#donations_made_by_foreign_donors'+main_id).val();
var local_grants = $('#local_grants'+main_id).val();
var grants_total = $('#grants_total'+main_id).val();
var prokolpo_year_grant = $('#prokolpo_year_grant'+main_id).val();
var prokolpo_year_grant_start_date = $('#prokolpo_year_grant_start_date'+main_id).val();
var prokolpo_year_grant_end_date =$('#prokolpo_year_grant_end_date'+main_id).val();
var comment_grant = $('#comment_grant'+main_id).val();

var fd6Id = $('#fd6Id').val();
$.ajax({
url: "{{ route('estimatedExpensesFd6Update') }}",
method: 'post',
data: {
    fd6Id:fd6Id,
main_id:main_id,
grants_received_from_abroad:grants_received_from_abroad,
donations_made_by_foreign_donors:donations_made_by_foreign_donors,
local_grants:local_grants,
grants_total:grants_total,
prokolpo_year_grant:prokolpo_year_grant,
prokolpo_year_grant_start_date:prokolpo_year_grant_start_date,
prokolpo_year_grant_end_date:prokolpo_year_grant_end_date,
comment_grant:comment_grant,
},
success: function(data) {

if(prokolpo_year_grant == '১ম বছর'){

    $('#expenseEditModal1').modal('hide');

}else if(prokolpo_year_grant == '২য় বছর'){
    $('#expenseEditModal2').modal('hide');

}else if(prokolpo_year_grant == '৩য় বছর'){
    $('#expenseEditModal3').modal('hide');

}else if(prokolpo_year_grant == '৪র্থ বছর'){
    $('#expenseEditModal4').modal('hide');
}else if(prokolpo_year_grant == '৫ম বছর'){
    $('#expenseEditModal5').modal('hide');
}

$('#expenseEditModal1').modal('hide');
alertify.set('notifier','position', 'top-center');
alertify.success('Data Updated Successfully');

$("#tableAjaxDataexp").html('');
$("#tableAjaxDataexp").html(data.data);



$("#duration0").html(data.prokolpoPriodData);

  $("#target_year0").html(data.prokolpoPriodData);
  $("#prokolpo_time0").html(data.prokolpoPriodData);

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

//expensece start

// $(document).on('click', '[id^=expenseEditModal]', function () {
//     var main_id = $(this).attr('id');
//     var get_id_from_main = main_id.slice(16);
//     var fd6Id = $('#fd6Id').val();

//     $('#grantReceiveEdit').modal('show');
//     $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//     $.ajax({
// url: "{{ route('showExpenseDataInModal') }}",
// method: 'post',
// data: {
//     fd6Id:fd6Id,
//     get_id_from_main:get_id_from_main,
// },
// success: function(data) {

//   $('#grantReceiveEdit').modal('hide');
//   $("#grantReceiveEditModal").html('');
//   $("#grantReceiveEditModal").html(data);

// },
// beforeSend: function(){
//    $('#pageloader').show()
// },
// complete: function(){
//    $('#pageloader').hide();
// }
// });
// });
//expence end
//grant script strat
$(document).on('keyup', '[id^=grants_received_from_abroad]', function () {

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(27);
    var grants_received_from_abroad = $(this).val();
    var donations_made_by_foreign_donors = $('#donations_made_by_foreign_donors'+get_id_from_main).val();
    var local_grants = $('#local_grants'+get_id_from_main).val();

    //alert(donations_made_by_foreign_donors)

    if(donations_made_by_foreign_donors.length === 0 && local_grants.length === 0){

        var total = parseInt(grants_received_from_abroad);

    }else if(grants_received_from_abroad.length === 0 && local_grants.length === 0){

        var total = parseInt(donations_made_by_foreign_donors);

    }else if(donations_made_by_foreign_donors.length === 0){

        var total = parseInt(grants_received_from_abroad) + parseInt(local_grants);

    }else if(local_grants.length === 0){

      var total = parseInt(donations_made_by_foreign_donors) + parseInt(local_grants);

    }else{

        var total = parseInt(grants_received_from_abroad) + parseInt(local_grants) + parseInt(donations_made_by_foreign_donors);

    }




    $('#grants_total'+get_id_from_main).val(total);

});
$(document).on('keyup', '[id^=donations_made_by_foreign_donors]', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(32);
var donations_made_by_foreign_donors = $(this).val();
var grants_received_from_abroad = $('#grants_received_from_abroad'+get_id_from_main).val();
var local_grants = $('#local_grants'+get_id_from_main).val();

//alert(donations_made_by_foreign_donors)

if(donations_made_by_foreign_donors.length === 0 && local_grants.length === 0){

var total = parseInt(grants_received_from_abroad);

}else if(grants_received_from_abroad.length === 0 && local_grants.length === 0){

var total = parseInt(donations_made_by_foreign_donors);

}else if(donations_made_by_foreign_donors.length === 0){

var total = parseInt(grants_received_from_abroad) + parseInt(local_grants);

}else if(grants_received_from_abroad.length === 0){

var total = parseInt(donations_made_by_foreign_donors) + parseInt(local_grants);

}else if(local_grants.length === 0){

var total = parseInt(donations_made_by_foreign_donors) + parseInt(grants_received_from_abroad);

}else{

var total = parseInt(grants_received_from_abroad) + parseInt(local_grants) + parseInt(donations_made_by_foreign_donors);

}




$('#grants_total'+get_id_from_main).val(total);

});

$(document).on('keyup', '[id^=local_grants]', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(12);
var local_grants = $(this).val();
var grants_received_from_abroad = $('#grants_received_from_abroad'+get_id_from_main).val();
var donations_made_by_foreign_donors = $('#donations_made_by_foreign_donors'+get_id_from_main).val();

//alert(donations_made_by_foreign_donors)

if(donations_made_by_foreign_donors.length === 0 && local_grants.length === 0){

var total = parseInt(grants_received_from_abroad);

}else if(grants_received_from_abroad.length === 0 && local_grants.length === 0){

var total = parseInt(donations_made_by_foreign_donors);

}else if(grants_received_from_abroad.length === 0 && donations_made_by_foreign_donors.length === 0){

var total = parseInt(local_grants);

}else if(donations_made_by_foreign_donors.length === 0){

var total = parseInt(grants_received_from_abroad) + parseInt(local_grants);

}else if(local_grants.length === 0){

var total = parseInt(donations_made_by_foreign_donors) + parseInt(local_grants);

}else{

var total = parseInt(grants_received_from_abroad) + parseInt(local_grants) + parseInt(donations_made_by_foreign_donors);

}




$('#grants_total'+get_id_from_main).val(total);

});


$(document).on('change', '[id^=prokolpo_year_grant]', function () {

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(19);
    var fd6Id = $('#fd6Id').val();
    var yearValue=$(this).val();

    $.ajax({
url: "{{ route('checkProkolpoYear') }}",
method: 'get',
data: {
    fd6Id:fd6Id,
    get_id_from_main:get_id_from_main,
    yearValue:yearValue
},
success: function(data) {


    if(data.data == 1){

        alertify.alert('Error',data.prokolpoMsg);
        
        $('#GrantAjax').hide();
    }else{
        $('#GrantAjax').show();

    }

  

},
beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
});

});

$(document).on('click', '#GrantAjax', function () {

    if(!$('#grants_total0').val()){

alertify.alert('Error', 'বিদেশ থেকে প্রাপ্ত অনুদান অথবা বিদেশি দাতার প্রদত্ত অনুদান অথবা স্থানীয় অনুদান সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpo_year_grant_start_date0').val()){

alertify.alert('Error', 'প্রকল্পের মেয়াদ শুরুর তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#prokolpo_year_grant_end_date0').val()){

alertify.alert('Error', 'প্রকল্পের মেয়াদ সমাপ্তির তারিখ সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var fd6Id = $('#fd6Id').val();
var grants_received_from_abroad = $('#grants_received_from_abroad0').val();
var donations_made_by_foreign_donors = $('#donations_made_by_foreign_donors0').val();
var local_grants = $('#local_grants0').val();
var grants_total = $('#grants_total0').val();
var prokolpo_year_grant = $('#prokolpo_year_grant0').val();
var prokolpo_year_grant_start_date = $('#prokolpo_year_grant_start_date0').val();
var prokolpo_year_grant_end_date =$('#prokolpo_year_grant_end_date0').val();
var comment_grant = $('#comment_grant0').val();



$.ajax({
url: "{{ route('estimatedExpensesFd6') }}",
method: 'get',
data: {
    fd6Id:fd6Id,
    grants_received_from_abroad:grants_received_from_abroad,
    donations_made_by_foreign_donors:donations_made_by_foreign_donors,
    local_grants:local_grants,
    grants_total:grants_total,
    prokolpo_year_grant:prokolpo_year_grant,
    prokolpo_year_grant_start_date:prokolpo_year_grant_start_date,
    prokolpo_year_grant_end_date:prokolpo_year_grant_end_date,
    comment_grant:comment_grant,
},
success: function(data) {

    if(prokolpo_year_grant == '১ম বছর'){
        $('#prokolpo_year_grant0').val('২য় বছর');
    }else if(prokolpo_year_grant == '২য় বছর'){
        $('#prokolpo_year_grant0').val('৩য় বছর');
    }else if(prokolpo_year_grant == '৩য় বছর'){
        $('#prokolpo_year_grant0').val('৪র্থ বছর');
    }else if(prokolpo_year_grant == '৪র্থ বছর'){
        $('#prokolpo_year_grant0').val('৫ম বছর');
    }else if(prokolpo_year_grant == '৫ম বছর'){
        $('#prokolpo_year_grant0').val('৫ম বছর');
    }



    $('#expenseId').val(1);

    $('#grantReceive').modal('hide');

  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDataexp").html('');
  $("#tableAjaxDataexp").html(data.data);

  $("#duration0").html(data.prokolpoPriodData);

  $("#target_year0").html(data.prokolpoPriodData);
  $("#prokolpo_time0").html(data.prokolpoPriodData);

   $('#grants_received_from_abroad0').val('');
$('#donations_made_by_foreign_donors0').val('');
$('#local_grants0').val('');
 $('#grants_total0').val('');
//$('#prokolpo_year_grant0').val('');
 $('#prokolpo_year_grant_start_date0').val('');
$('#prokolpo_year_grant_end_date0').val('');
$('#comment_grant0').val('');

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
//grant script end
</script>
<script>

    //division,district,city corporation ,thana start

    $(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(getMainValue);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

    $.ajax({
    url: "{{ route('getUpozilaListNew') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name"+get_id_from_main).html('');
      $("#upozila_name"+get_id_from_main).html(data);

      $("#thana_name"+get_id_from_main).html('');
      $("#thana_name"+get_id_from_main).html(data);
    }
    });




// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
    },
    beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
    });

});

   //division,district,city corporation ,thana start

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
url: "{{ route('prokolpoAreaForFd6') }}",
method: 'post',
data: {mainEditId:mainEditId,beneficiaries_total:beneficiaries_total,division_name:division_name,district_name:district_name,city_corparation_name:city_corparation_name,upozila_name:upozila_name,thana_name:thana_name,municipality_name:municipality_name,ward_name:ward_name,prokolpoType:prokolpoType,allocated_budget:allocated_budget},
success: function(data) {



    $('#areaId').val(1);

    $('#AreaModal').modal('hide');

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
url: "{{ route('prokolpoAreaForFd6Update') }}",
method: 'post',
data: {mainEditId:mainEditId,mainId:mainId,beneficiaries_total:beneficiaries_total,division_name:division_name,district_name:district_name,city_corparation_name:city_corparation_name,upozila_name:upozila_name,thana_name:thana_name,municipality_name:municipality_name,ward_name:ward_name,prokolpoType:prokolpoType,allocated_budget:allocated_budget},
success: function(data) {
    $('#areaId').val(1);
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


//budget step two start

$(document).on('click', '.fc1StepTwoBudgetEdit', function () {

    var fcOneId = $('#fcOneId').val();
    var mainId = $(this).attr('id');

    if(!$('#district_name'+mainId).val()){

alertify.alert('Error', 'জেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#upazila_id'+mainId).val()){

alertify.alert('Error', 'উপজেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#activities'+mainId).val()){

alertify.alert('Error', 'কার্যক্রম সম্পর্কিত তথ্য দিন');

}else if(!$('#estimated_expenses'+mainId).val()){

alertify.alert('Error', 'প্রাক্কলিত ব্যয় সম্পর্কিত তথ্য দিন');

}else if(!$('#time_limit'+mainId).val()){

alertify.alert('Error', 'সময়সীমা সম্পর্কিত তথ্য দিন');

}else if(!$('#number_of_beneficiaries'+mainId).val()){

alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var district_name = $('#district_name'+mainId).val();
var upozila_name = $('#upazila_id'+mainId).val();
var activities = $('#activities'+mainId).val();
var estimated_expenses = $('#estimated_expenses'+mainId).val();
var time_limit =$('#time_limit'+mainId).val();
var number_of_beneficiaries = $('#number_of_beneficiaries'+mainId).val();


$.ajax({
url: "{{ route('fc2FormStepTwoBudgetUpdate') }}",
method: 'post',
data: {fcOneId:fcOneId,mainId:mainId,district_name:district_name,upozila_name:upozila_name,activities:activities,estimated_expenses:estimated_expenses,time_limit:time_limit,number_of_beneficiaries:number_of_beneficiaries},
success: function(data) {

$('#prokolpoBudget'+mainId).modal('hide');

$('#tableCountOne').val(1);

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDatapro").html('');
$("#tableAjaxDatapro").html(data);

var district_name = $('#district_name'+mainId).val('');
var upozila_name = $('#upazila_name'+mainId).val('');
var activities = $('#activities'+mainId).val('');
var estimated_expenses = $('#estimated_expenses'+mainId).val('');
var time_limit =$('#time_limit'+mainId).val('');
var number_of_beneficiaries = $('#number_of_beneficiaries'+mainId).val('');

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
$(document).on('click', '#fc1StepTwoBudget', function () {

    var fcOneId = $('#fcOneId').val();

if(!$('#district_name0').val()){

    alertify.alert('Error', 'জেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#upazila_id0').val()){

    alertify.alert('Error', 'উপজেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#activities0').val()){

    alertify.alert('Error', 'কার্যক্রম সম্পর্কিত তথ্য দিন');

}else if(!$('#estimated_expenses0').val()){

    alertify.alert('Error', 'প্রাক্কলিত ব্যয় সম্পর্কিত তথ্য দিন');

}else if(!$('#time_limit0').val()){

    alertify.alert('Error', 'সময়সীমা সম্পর্কিত তথ্য দিন');

}else if(!$('#number_of_beneficiaries0').val()){

alertify.alert('Error', 'উপকারভোগীর সংখ্যা সম্পর্কিত তথ্য দিন');

}else{


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var district_name = $('#district_name0').val();
var upozila_name = $('#upazila_id0').val();
var activities = $('#activities0').val();
var estimated_expenses = $('#estimated_expenses0').val();
var time_limit =$('#time_limit0').val();
var number_of_beneficiaries = $('#number_of_beneficiaries0').val();


$.ajax({
url: "{{ route('fc2FormStepTwoBudget') }}",
method: 'post',
data: {fcOneId:fcOneId,district_name:district_name,upozila_name:upozila_name,activities:activities,estimated_expenses:estimated_expenses,time_limit:time_limit,number_of_beneficiaries:number_of_beneficiaries},
success: function(data) {

    $('#exampleModal1').modal('hide');

    $('#tableCountOne').val(1);



  alertify.set('notifier','position', 'top-center');
  alertify.success('Data Added Successfully');

  $("#tableAjaxDatapro").html('');
  $("#tableAjaxDatapro").html(data);

  var district_name = $('#district_name0').val('');
var upozila_name = $('#upazila_name0').val('');
var activities = $('#activities0').val('');
var estimated_expenses = $('#estimated_expenses0').val('');
var time_limit =$('#time_limit0').val('');
var number_of_beneficiaries = $('#number_of_beneficiaries0').val('');

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

//budget step two end

//SDG start


$(document).on('click', '#SDGAjax', function () {

    var fd6Id = $('#fd6Id').val();

if(!$('#goal0').val()){

alertify.alert('Error', 'অভিষ্ঠ(Goal) সম্পর্কিত তথ্য দিন');

}else if(!$('#target0').val()){

alertify.alert('Error', 'লক্ষ্যমাত্রা(Target) সম্পর্কিত তথ্য দিন');

}else if(!$('#indicator0').val()){

alertify.alert('Error', 'নির্দেশক(Indicator) সম্পর্কিত তথ্য দিন');

}else if(!$('#budget_allocation0').val()){

alertify.alert('Error', 'বাজেট বরাদ্দ সম্পর্কিত তথ্য দিন');

}else if(!$('#rationality0').val()){

alertify.alert('Error', 'যৌক্তিকতা সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var goal = $('#goal0').val();
var target = $('#target0').val();
var indicator = $('#indicator0').val();
var budget_allocation = $('#budget_allocation0').val();
var rationality = $('#rationality0').val();
var comment =$('#Sdgcomment0').val();


$.ajax({
url: "{{ route('fd6FormStepTwoSDG') }}",
method: 'get',
data: {fd6Id:fd6Id,goal:goal,indicator:indicator,target:target,budget_allocation:budget_allocation,rationality:rationality,comment:comment},
success: function(data) {
    $('#tableCountTwo').val(1);
$('#Avistto').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataSDG").html('');
$("#tableAjaxDataSDG").html(data);
$('#indicator0').val('');
var goal = $('#goal0').val('');
var target = $('#target0').val('');
var budget_allocation = $('#budget_allocation0').val('');
var rationality = $('#rationality0').val('');
var comment =$('#Sdgcomment0').val('');

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


$(document).on('change', '[id^=goal]', function () {

var main_id = $(this).attr('id');
var slice_id = main_id.slice(4);
var id = $(this).val();


$.ajax({
url: "{{ route('getTargetFromGoal') }}",
method: 'get',
data: {id:id},
success: function(data) {
 

$("#target"+slice_id).html('');
$("#target"+slice_id).html(data);

},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});



});

$(document).on('change', '[id^=target]', function () {

var main_id = $(this).attr('id');
var slice_id = main_id.slice(6);
var id = $(this).val();


$.ajax({
url: "{{ route('getIndicatorFromTarget') }}",
method: 'get',
data: {id:id},
success: function(data) {
 

$("#indicator"+slice_id).html('');
$("#indicator"+slice_id).html(data);

},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});



});


//SDG end

//SDG edit start


$(document).on('click', '.SDGAjaxData', function () {

    var fd6Id = $('#fd6Id').val();
var mainId = $(this).attr('id');

if(!$('#goal'+mainId).val()){

alertify.alert('Error', 'অভিষ্ঠ(Goal) সম্পর্কিত তথ্য দিন');

}else if(!$('#target'+mainId).val()){

alertify.alert('Error', 'লক্ষ্যমাত্রা(Target) সম্পর্কিত তথ্য দিন');

}else if(!$('#indicator'+mainId).val()){

alertify.alert('Error', 'নির্দেশক(Indicator) সম্পর্কিত তথ্য দিন');

}else if(!$('#budget_allocation'+mainId).val()){

alertify.alert('Error', 'বাজেট বরাদ্দ সম্পর্কিত তথ্য দিন');

}else if(!$('#rationality'+mainId).val()){

alertify.alert('Error', 'যৌক্তিকতা সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var goal = $('#goal'+mainId).val();
var target = $('#target'+mainId).val();
var indicator = $('#indicator'+mainId).val();
var budget_allocation = $('#budget_allocation'+mainId).val();
var rationality = $('#rationality'+mainId).val();
var comment =$('#Sdgcomment'+mainId).val();


$.ajax({
url: "{{ route('fd6FormStepTwoSDGUpdate') }}",
method: 'post',
data: {mainId:mainId,fd6Id:fd6Id,goal:goal,indicator:indicator,target:target,budget_allocation:budget_allocation,rationality:rationality,comment:comment},
success: function(data) {
    $('#tableCountTwo').val(1);
$('#prokolpoSDG'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataSDG").html('');
$("#tableAjaxDataSDG").html(data);



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


//SDG edit end


//donation modal start


$(document).on('click', '#fc1DonationAjax', function () {

var fcOneId = $('#fcOneId').val();



if(!$('#purpose_or_activities0').val()){

alertify.alert('Error', 'উদ্দেশ্য / কার্যক্রম সম্পর্কিত তথ্য দিন');

}else if(!$('#registration_sarok_number0').val()){

alertify.alert('Error', 'স্বারক নম্বর সম্পর্কিত তথ্য দিন');

}else if(!$('#registration_date0').val()){

alertify.alert('Error', 'অনুমোদনের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#donor_name0').val()){

alertify.alert('Error', 'দাতা সংস্থার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#money_amount0').val()){

alertify.alert('Error', 'টাকার পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#audit_report0').val()){

alertify.alert('Error', 'অডিট রিপোর্ট সম্পর্কিত তথ্য দিন');

}else if(!$('#final_report0').val()){

alertify.alert('Error', 'প্রতিবেদন সম্পর্কিত তথ্য দিন');

}else if(!$('#local_certificate0').val()){

alertify.alert('Error', 'প্রত্যয়ন পত্র সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var purpose_or_activities = $('#purpose_or_activities0').val();
var registration_sarok_number = $('#registration_sarok_number0').val();
var registration_date = $('#registration_date0').val();
var donor_name = $('#donor_name0').val();
var money_amount =$('#money_amount0').val();
var audit_report =$('#audit_report0').val();
var final_report =$('#final_report0').val();
var local_certificate =$('#local_certificate0').val();
var comment =$('#comment0').val();


$.ajax({
url: "{{ route('fc2FormStepTwoDonor') }}",
method: 'post',
data: {local_certificate:local_certificate,final_report:final_report,audit_report:audit_report,money_amount:money_amount,fcOneId:fcOneId,purpose_or_activities:purpose_or_activities,registration_sarok_number:registration_sarok_number,registration_date:registration_date,donor_name:donor_name,comment:comment},
success: function(data) {

$('#exampleModal').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataDOnor").html('');
$("#tableAjaxDataDOnor").html(data);

var purpose_or_activities = $('#purpose_or_activities0').val('');
var registration_sarok_number = $('#registration_sarok_number0').val('');
var registration_date = $('#registration_date0').val('');
var donor_name = $('#donor_name0').val('');
var money_amount =$('#money_amount0').val('');
var audit_report =$('#audit_report0').val('');
var final_report =$('#final_report0').val('');
var local_certificate =$('#local_certificate0').val('');
var comment =$('#comment0').val('');

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

//donation modal end

//donation modal edit start


$(document).on('click', '.fc1DonationAjaxEdit', function () {

var fcOneId = $('#fcOneId').val();
var mainId = $(this).attr('id');


if(!$('#purpose_or_activities'+mainId).val()){

alertify.alert('Error', 'উদ্দেশ্য / কার্যক্রম সম্পর্কিত তথ্য দিন');

}else if(!$('#registration_sarok_number'+mainId).val()){

alertify.alert('Error', 'স্বারক নম্বর সম্পর্কিত তথ্য দিন');

}else if(!$('#registration_date'+mainId).val()){

alertify.alert('Error', 'অনুমোদনের তারিখ সম্পর্কিত তথ্য দিন');

}else if(!$('#donor_name'+mainId).val()){

alertify.alert('Error', 'দাতা সংস্থার নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#money_amount'+mainId).val()){

alertify.alert('Error', 'টাকার পরিমাণ সম্পর্কিত তথ্য দিন');

}else if(!$('#audit_report'+mainId).val()){

alertify.alert('Error', 'অডিট রিপোর্ট সম্পর্কিত তথ্য দিন');

}else if(!$('#final_report'+mainId).val()){

alertify.alert('Error', 'প্রতিবেদন সম্পর্কিত তথ্য দিন');

}else if(!$('#local_certificate'+mainId).val()){

alertify.alert('Error', 'প্রত্যয়ন পত্র সম্পর্কিত তথ্য দিন');

}else{


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



var purpose_or_activities = $('#purpose_or_activities'+mainId).val();
var registration_sarok_number = $('#registration_sarok_number'+mainId).val();
var registration_date = $('#registration_date'+mainId).val();
var donor_name = $('#donor_name'+mainId).val();
var money_amount =$('#money_amount'+mainId).val();
var audit_report =$('#audit_report'+mainId).val();
var final_report =$('#final_report'+mainId).val();
var local_certificate =$('#local_certificate'+mainId).val();
var comment =$('#comment'+mainId).val();


$.ajax({
url: "{{ route('fc2FormStepTwoDonorUpdate') }}",
method: 'post',
data: {mainId:mainId,local_certificate:local_certificate,final_report:final_report,audit_report:audit_report,money_amount:money_amount,fcOneId:fcOneId,purpose_or_activities:purpose_or_activities,registration_sarok_number:registration_sarok_number,registration_date:registration_date,donor_name:donor_name,comment:comment},
success: function(data) {

$('#prokolpoDonor'+mainId).modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$("#tableAjaxDataDOnor").html('');
$("#tableAjaxDataDOnor").html(data);

var purpose_or_activities = $('#purpose_or_activities'+mainId).val('');
var registration_sarok_number = $('#registration_sarok_number'+mainId).val('');
var registration_date = $('#registration_date'+mainId).val('');
var donor_name = $('#donor_name'+mainId).val('');
var money_amount =$('#money_amount'+mainId).val('');
var audit_report =$('#audit_report'+mainId).val('');
var final_report =$('#final_report'+mainId).val('');
var local_certificate =$('#local_certificate'+mainId).val('');
var comment =$('#comment'+mainId).val('');

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

//donation modal edit end

</script>

<script type="text/javascript">
    function deleteTagExp(id) {
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
                var fd6Id = $('#fd6Id').val();
              

                $.ajax({
    url: "{{ route('fd6SourceOfFundDelete') }}",
    method: 'GET',
    data: {mainEditId:mainEditId,id:id,fd6Id:fd6Id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataexp").html('');
      $("#tableAjaxDataexp").html(data.data);

      $("#duration0").html(data.prokolpoPriodData);

$("#target_year0").html(data.prokolpoPriodData);
$("#prokolpo_time0").html(data.prokolpoPriodData);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });

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
    url: "{{ route('prokolpoAreaForFd6Delete') }}",
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



<script type="text/javascript">
    function deleteTagDonor(id) {
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
                var fcOneId = $('#fcOneId').val();

                $.ajax({
    url: "{{ route('fc2FormStepTwoDonorDelete') }}",
    method: 'GET',
    data: {fcOneId:fcOneId,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataDOnor").html('');
      $("#tableAjaxDataDOnor").html(data);
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
    function deleteTagSDG(id) {
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
    url: "{{ route('fd6FormStepTwoSDGDelete') }}",
    method: 'GET',
    data: {fd6Id:fd6Id,id:id},
    success: function(data) {

      alertify.set('notifier','position', 'top-center');
      alertify.error('Data Delete Successfully');
      $("#tableAjaxDataSDG").html('');
      $("#tableAjaxDataSDG").html(data);
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
    function deleteTagBudget(id) {
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
                var fcOneId = $('#fcOneId').val();

                $.ajax({
    url: "{{ route('fc2FormStepTwoBudgetDelete') }}",
    method: 'GET',
    data: {fcOneId:fcOneId,id:id},
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



<script>

    $("#ngo_prokolpo_name").keyup(function(){
      var getMainValue = $(this).val();

      $('#project_name').val(getMainValue);

    });

    $("#ngo_prokolpo_duration").keyup(function(){
      var getMainValue = $(this).val();

      $('#duration_of_project').val(getMainValue);

    });

    $("#donor_organization_name").keyup(function(){
      var getMainValue = $(this).val();

      $('#donor_organization_name_two').val(getMainValue);

    });

    </script>
    <script>
        $(document).on('click', '#finalStepToThree', function () {

            var tableCountTwo = $('#tableCountTwo').val();
            var tableCountOne = $('#tableCountOne').val();

            var finlalCount = parseInt(tableCountTwo) + parseInt(tableCountOne);

            //alert(finlalCount);

            if(finlalCount >= 2){

                var fcOneId = $('#fcOneId').val();

                $.ajax({
    url: "{{ route('goToNextPageFcTwoStepTwo') }}",
    method: 'GET',
    data: {fcOneId:fcOneId,},
    success: function(data) {

        window.location.href = data;
      //location.reload(true);

    },
    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }
    });


            }else{
                alertify.alert('Error', '৯.ক এবং  ৯.খ  পূরণ করুন');
            }

        });
    </script>
    <script>

        $(document).on('change', 'select.district_name', function () {

        var districtName = $(this).val();

       // alert(districtName);

        var main_id = $(this).attr('id');
        var get_id_from_main = main_id.slice(13);


          $.ajax({
            url: "{{ route('getDistrictListForFormSeven') }}",
            method: 'GET',
            data: {districtName:districtName},
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



        </script>
