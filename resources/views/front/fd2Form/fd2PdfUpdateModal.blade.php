<form method="post" action="{{ route('fd2PdfUpdate') }}" enctype="multipart/form-data" id="form">
    @csrf


    <input type="hidden" name="mid" value="{{ $fd2OtherPdf->id }}" class="form-control" id="exampleFormControlInput1" >




    <div class="mb-3">
        <?php

        $file_path = url($fd2OtherPdf->file);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




        ?>
    <label for="exampleFormControlInput1" class="form-label">{{ $fd2OtherPdf->file_name }}:</label>
    <input type="file" accept=".pdf" name="file" class="form-control" id="exampleFormControlInput1">
    <b>{{ $filename.'.'.$extension }}</b>


</div>

    <button type="submit" class="btn btn-custom next_button btn-sm">
        দাখিল করুন 
    </button>
    </form>
