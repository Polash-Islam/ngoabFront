<?php

$checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                           ->value('ngo_type');

$checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                           ->value('ngo_type_new_old');

?>


<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label" for="">

                @if($checkNgoTypeForForeginNgo == 'দেশিও')
                {{ trans('fd_one_step_five.jouthosakkhon1') }}
                @else
                <span class="text-danger">*</span>
                    {{ trans('fd_one_step_five.jouthosakkhon2') }}
                @endif
            <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
            <input class="form-control" name="constitution_of_the_organization_if_unchanged" data-parsley-required accept=".pdf" type="file" id="constitution_of_the_organization_if_unchanged"/>
            <p class="text-danger mt-2" style="font-size:12px;" id="constitution_of_the_organization_if_unchanged_text"></p>
        </div>
    </div>
</div>

<script>
$('#constitution_of_the_organization_if_unchanged').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#constitution_of_the_organization_if_unchanged_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#constitution_of_the_organization_if_unchanged_text').text('');
        }
    });

</script>
