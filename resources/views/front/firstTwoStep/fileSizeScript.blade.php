<script>

$(function(){


    $('#digital_signature').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 60000) {
            $('#digital_signature_text').text('Please Upload Maximum 60 KB File');
        }else{
            $('#digital_signature_text').text('');
        }
    });


    $('#digital_seal').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 80000) {
            $('#digital_seal_text').text('Please Upload Maximum 80 KB File');
        }else{
            $('#digital_seal_text').text('');
        }
    });


    $('#foregin_pdf').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 5000000 ) {
            $('#foregin_pdf_text').text('Please Upload Maximum 5 MB File');
        }else{
            $('#foregin_pdf_text').text('');
        }
    });


    $('#plan_of_operation').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 10000000 ) {
            $('#plan_of_operation_text').text('Please Upload Maximum 10 MB File');
        }else{
            $('#plan_of_operation_text').text('');
        }
    });


    $('#annual_budget_file').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 2000000 ) {
            $('#annual_budget_file_text').text('Please Upload Maximum 2 MB File');
        }else{
            $('#annual_budget_file_text').text('');
        }
    });


    $('#copy_of_chalan').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#copy_of_chalan_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#copy_of_chalan_text').text('');
        }
    });


    $('#attach_the__supporting_papers').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#attach_the__supporting_papers_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#attach_the__supporting_papers_text').text('');
        }
    });


    $('#board_of_revenue_on_fees').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#board_of_revenue_on_fees_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#board_of_revenue_on_fees_text').text('');
        }
    });


    $('#due_vat_pdf').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#due_vat_pdf_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#due_vat_pdf_text').text('');
        }
    });


    $('#change_ac_number').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#change_ac_number_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#change_ac_number_text').text('');
        }
    });



    $('[id^=structurePartTwo]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(16)
//alert(getId);
let size = this.files[0].size;


if( getId == 5){

    if (size > 10000000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 10 MB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}


}else{



if (size > 5000000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}
}
});




$('[id^=structurePartThree]').on('change', function(e) {

    var mainId = $(this).attr('id');
var getId = mainId.slice(18)
//alert(getId);
let size = this.files[0].size;


if(getId == 4 ){

if (size > 10000000 ) {
$('#structurePartThree'+getId+'_text').text('Please Upload Maximum 10 MB File');
}else{
$('#structurePartThree'+getId+'_text').text('');
}

}else {

if (size > 5000000 ) {
$('#structurePartThree'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#structurePartThree'+getId+'_text').text('');
}


}


});


////////////////////////

$('[id^=newNgoPdfV]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(10)
//alert(getId);
let size = this.files[0].size;




if (size > 5000000 ) {
$('#newNgoPdfV'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#newNgoPdfV'+getId+'_text').text('');
}




});


//////////////////////////////////


$('[id^=foreignNgoPdfV]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(14)
//alert(getId);
let size = this.files[0].size;




if (size > 5000000 ) {
$('#foreignNgoPdfV'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#foreignNgoPdfV'+getId+'_text').text('');
}




});

/////////////////////////////////////////////////////



$('[id^=localNameChange]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(15)
//alert(getId);
let size = this.files[0].size;


if(getId == 1 || getId == 3 || getId == 5 ){

if (size > 1000000 ) {
$('#localNameChange'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
$('#localNameChange'+getId+'_text').text('');
}

}else if( getId == 4){

if (size > 5000000 ) {
$('#localNameChange'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#localNameChange'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#localNameChange'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#localNameChange'+getId+'_text').text('');
}
}


});

/////////////////////////////////////////////////



$('[id^=renewFileOld]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(12)
//alert(getId);
let size = this.files[0].size;


if(getId == 4 || getId == 6 ){

if (size > 1000000 ) {
$('#renewFileOld'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
$('#renewFileOld'+getId+'_text').text('');
}

}else if( getId == 3){

if (size > 2000000 ) {
$('#renewFileOld'+getId+'_text').text('Please Upload Maximum 2 MB File');
}else{
$('#renewFileOld'+getId+'_text').text('');
}


}else if( getId == 7){

if (size > 5000000 ) {
$('#renewFileOld'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#renewFileOld'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#renewFileOld'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#renewFileOld'+getId+'_text').text('');
}
}


});

/////////////////////////////////////////////






$('[id^=renewFileNew]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(12)
//alert(getId);
let size = this.files[0].size;


if(getId == 2 || getId == 8 ){

if (size > 2000000 ) {
$('#renewFileNew'+getId+'_text').text('Please Upload Maximum 2 MB File');
}else{
$('#renewFileNew'+getId+'_text').text('');
}

}else if( getId == 3 || getId == 4 || getId == 5  ){

if (size > 5000000 ) {
$('#renewFileNew'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#renewFileNew'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#renewFileNew'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#renewFileNew'+getId+'_text').text('');
}
}


});





////////////////////////////////////////////



$('[id^=foreignNameChange]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(17)
//alert(getId);
let size = this.files[0].size;


if(getId == 1 || getId == 5 || getId == 7 ){

if (size > 1000000 ) {
$('#foreignNameChange'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
$('#foreignNameChange'+getId+'_text').text('');
}

}else if( getId == 4 || getId == 10 || getId == 15 || getId == 16){

if (size > 2000000 ) {
$('#foreignNameChange'+getId+'_text').text('Please Upload Maximum 2 MB File');
}else{
$('#foreignNameChange'+getId+'_text').text('');
}


}else if( getId == 8 || getId == 12 || getId == 13){

if (size > 5000000 ) {
$('#foreignNameChange'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#foreignNameChange'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#foreignNameChange'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#foreignNameChange'+getId+'_text').text('');
}
}


});


//////////////////////////////////////////////////

$('[id^=fdNinePdf]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(9)
//alert(getId);
let size = this.files[0].size;


if(getId == 4 || getId == 7 ){

if (size > 1000000 ) {
$('#fdNinePdf'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
$('#fdNinePdf'+getId+'_text').text('');
}

}else if( getId == 6 ){

if (size > 200000 ) {
$('#fdNinePdf'+getId+'_text').text('Please Upload Maximum 200 KB File');
}else{
$('#fdNinePdf'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#fdNinePdf'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#fdNinePdf'+getId+'_text').text('');
}
}


});

//////////



$('[id^=fdNineOnePdf]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(12)
//alert(getId);
let size = this.files[0].size;


 if( getId == 3 ){

if (size > 200000 ) {
$('#fdNineOnePdf'+getId+'_text').text('Please Upload Maximum 200 KB File');
}else{
$('#fdNineOnePdf'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#fdNineOnePdf'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#fdNineOnePdf'+getId+'_text').text('');
}
}


});

/////////////////////////



$('[id^=nVisaDoc]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(8)
//alert(getId);
let size = this.files[0].size;





if (size > 500000 ) {
$('#nVisaDoc'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#nVisaDoc'+getId+'_text').text('');
}



});


///////////////////



$('#project_proposal_form').on('change', function(e) {

// var mainId = $(this).attr('id');
// var getId = mainId.slice(8)
//alert(getId);
let size = this.files[0].size;





if (size > 10000000 ) {
$('#project_proposal_form_text').text('Please Upload Maximum 10 MB File');
}else{
$('#project_proposal_form_text').text('');
}



});

/////////////////


$('#rPdfP').on('change', function(e) {

// var mainId = $(this).attr('id');
// var getId = mainId.slice(8)
//alert(getId);
let size = this.files[0].size;





if (size > 10000000 ) {
$('#rPdfP_text').text('Please Upload Maximum 10 MB File');
}else{
$('#rPdfP_text').text('');
}



});

/////////////////



$('#fd_2_form_pdf').on('change', function(e) {

// var mainId = $(this).attr('id');
// var getId = mainId.slice(8)
//alert(getId);
let size = this.files[0].size;





if (size > 2000000 ) {
$('#fd_2_form_pdf_text').text('Please Upload Maximum 2 MB File');
}else{
$('#fd_2_form_pdf_text').text('');
}



});

/////////




$('[id^=fd7PdfN]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(7)
//alert(getId);
let size = this.files[0].size;





if (size > 500000 ) {
$('#fd7PdfN'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#fd7PdfN'+getId+'_text').text('');
}



});

//////////////////////


$('[id^=fc1PdfN]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(7)
//alert(getId);
let size = this.files[0].size;





if( getId == 1 ){

if (size > 500000 ) {
$('#fc1PdfN'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#fc1PdfN'+getId+'_text').text('');
}


}else{



if (size > 10000000 ) {
$('#fc1PdfN'+getId+'_text').text('Please Upload Maximum 10 MB File');
}else{
$('#fc1PdfN'+getId+'_text').text('');
}
}



});


})

</script>
