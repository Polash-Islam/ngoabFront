@extends('front.master.master')

@section('title')
{{ trans('first_info.all_reg_form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')




@include('front.form.ngo_registration_form_form08')




@endsection

@section('script')
<script>
    $(document).ready(function(){

         //form date

      $("#form_date").change(function(){

        var form_date = $(this).val();
        var to_date = $('#to_date').val();


         $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data.data);
        }
        });


         });
      //end from date


      //to date
       $("#to_date").change(function(){

          var to_date = $(this).val();
        var form_date = $('#form_date').val();

          $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data.data);
        }
        });

         });
      //end to date

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberView') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
<script>
    $(document).ready(function () {
    $('#form1').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },


            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>

<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },
            letter_file: {
                required: true
            },
            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            letter_file: {
                required: " letter_file Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>
<script>




    $("[id^=final_b_get]").click(function () {

        var id = $(this).data("id");
        var name = $('#sname'+id).val();
        var information = $('#sinformation'+id).val();


        $.ajax({
                    url: "{{ route('adviserDataUpdate') }}",
                    type: 'get',
                    data: {
                        "name": name,
                        "information": information,
                        "id": id,

                    },
                    success: function (data) {
                        //alert('success');
                        location.reload(true);
                    }
                });

    });
        $("[id^=adeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('adviserDataDelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        $("[id^=sadeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('otherInformationADelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
<script>
    $("[id^=deleteRecord]").click(function () {

        var x = confirm("Are you sure you want to delete?");
        if (x) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ route('sourceOfFundDelete') }}",
                type: 'get',
                data: {
                    "id": id,

                },
                success: function (data) {
                    alert('success');
                    location.reload(true);
                }
            });
        } else {
            return false;
        }

    });
</script>





<!--//add new row-->

<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="name[]" required placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="address[]" required placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" accept=".pdf" required name="letter_file[]" type="file" id="">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-advisor").click(function () {
        ++i;
        $("#dynamicAddRemoveAdvisor").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-advisor"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-advisor', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="file" accept=".pdf" name="" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
