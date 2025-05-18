<script>
    $(document).on('click', '.btn22', function () {

        var sign = 'sign';


        //alert(structureStatus);


        $.ajax({
            url: "{{ route('signature_modal') }}",
            method: 'GET',
            data: {sign: sign},
            beforeSend: function () {
                $("#pageloader").show();
            },
            complete: function (msg) {
                $("#pageloader").hide();
            },
            success: function (data) {
                $("#mResult").html('');
                $("#mResult").html(data);
            }
        });
    });
</script>

<script>
    $(document).on('click', '.btn22ss', function () {

        var seal = 'seal';


        //alert(structureStatus);


        $.ajax({
            url: "{{ route('seal_modal') }}",
            method: 'GET',
            data: {seal: seal},
            beforeSend: function () {
                $("#pageloader").show();
            },
            complete: function (msg) {
                $("#pageloader").hide();
            },
            success: function (data) {
                $("#mResultss").html('');
                $("#mResultss").html(data);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Open modal on page load
        $(".btn22").click(function () {
            $("#myModal").modal('show');
        });
        // Close modal on button click
        $(".btn").click(function () {
            $("#mResult").html('');
            $("#myModal").modal('hide');
        });
    });
</script>


<script>
    $(document).ready(function () {
        // Open modal on page load
        $(".btn22ss").click(function () {
            $("#myModalss").modal('show');
        });
        // Close modal on button click
        $(".btnss").click(function () {
            $("#mResultss").html('');
            $("#myModalss").modal('hide');
        });
    });
</script>
