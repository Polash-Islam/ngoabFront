


    <input type="hidden" name="mid" value="{{ $fd3OtherFileDownloadList->id }}" class="form-control" id="updateId" >




    <div class="mb-3">
        <?php

        $file_path = url($fd3OtherFileDownloadList->file);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




        ?>
    <label for="exampleFormControlInput1" class="form-label">{{ $fd3OtherFileDownloadList->file_name }}:</label>
    <input type="file" accept=".pdf" name="file" class="form-control" id="updateFile">
    <b>{{ $filename.'.'.$extension }}</b>


</div>

    <button  class="btn btn-custom next_button btn-sm" id="upload_form" >
        আপডেট করুন
    </button>

