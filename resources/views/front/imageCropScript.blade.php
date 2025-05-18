<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    var classVar = "";
    /*------------------------------------------
    --------------------------------------------
    Image Change Event
    --------------------------------------------
    --------------------------------------------*/
    $("body").on("change", ".digital_signature,.digital_seal", function(e){



        classVar = $(this).attr("class");
        console.log(classVar);
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
            reader.readAsDataURL(file);
            }
        }
    });

    /*------------------------------------------
    --------------------------------------------
    Show Model Event
    --------------------------------------------
    --------------------------------------------*/
    $modal.on('shown.bs.modal', function () {
        if(classVar == 'form-control digital_seal'){
       var newm = 'Digital Seal';
        var finalCropWidth = 300;
        var finalCropHeight = 100;

        }else{
            var newm = 'Digital Signature';
            var finalCropWidth = 300;
            var finalCropHeight = 80;

        }

        $("#mmT").html(newm+': '+finalCropWidth+'*'+finalCropHeight);


var finalAspectRatio = finalCropWidth / finalCropHeight;
        cropper = new Cropper(image, {
            aspectRatio: finalAspectRatio,
            viewMode: 3,
            zoomable: true,
            dragMode: 'move',
            restore: false,
            guides: false,
            center: false,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
            preview: '.preview'



        });


    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    /*------------------------------------------
    --------------------------------------------
    Crop Button Click Event
    --------------------------------------------
    --------------------------------------------*/



    $("#cancelImage").click(function(){
        $("#modal").modal('toggle');
    });

    $("#crop").click(function(){

        if(classVar == 'form-control digital_seal'){
        canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 100,
        });
    }else{

        canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 80,
        });

    }
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                if(classVar == 'form-control digital_seal'){


                $("input[name='image_seal_base64']").val(base64data);
                $(".show_image_seal").show();
                $(".show_image_seal").attr("src",base64data);
                $("#modal").modal('toggle');


                }else{


                $("input[name='image_base64']").val(base64data);
                $(".show-image").show();
                $(".show-image").attr("src",base64data);
                $("#modal").modal('toggle');

                }
            }
        });
    });

</script>

<!--   seal --->

<script>

</script>
