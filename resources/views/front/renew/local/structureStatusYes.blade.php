<div class="card">
    <div class="card-header">
        <b> {{ trans('fd_one_step_five.organization_change_accept_document_text') }} </b>
    </div>
    <div class="card-body">
        <div class="mt-3 mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.fee_joma_mul_copy_text') }}
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>  <span class="text-danger">*</span> </label>
            <input class="form-control" name="the_constitution_of_the_company_along_with_fee_if_changed" data-parsley-required accept=".pdf" type="file" id="structurePartOne1">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne1_text"></p>


        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.primary_nibondhon_copy') }}
                <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span> </label>
            <input class="form-control" name="constitution_approved_by_primary_registering_authority" data-parsley-required accept=".pdf" type="file" id="structurePartOne2">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne2_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.chairman_signature_copy_text') }}
                <span class="text-danger">*</span>
            <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
            <input class="form-control" name="clean_copy_of_the_constitution" data-parsley-required accept=".pdf" type="file" id="structurePartOne3">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne3_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.organization_dhara_upodhara_text') }}
                <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span> </label>
            <input class="form-control" name="payment_of_change_fee" data-parsley-required accept=".pdf" type="file" id="structurePartOne4">
            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne4_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.sadharon_sova_karjobiboroni') }}
                <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>  </label>
            <input class="form-control" name="section_sub_section_of_the_constitution" data-parsley-required accept=".pdf" type="file" id="structurePartOne5">
            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne5_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                {{ trans('fd_one_step_five.before_after_songbidhan_biboroni_text') }}
                <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>
            </label>
            <input class="form-control" name="previous_constitution_and_current_constitution_compare" data-parsley-required accept=".pdf" type="file" id="structurePartOne6">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne6_text"></p>
        </div>
    </div>
</div>


<script>
    $('[id^=structurePartOne]').on('change', function(e) {

            var mainId = $(this).attr('id');
            var getId = mainId.slice(16)
            //alert(getId);
            let size = this.files[0].size;


            if( getId == 5 || getId == 6){

                if (size > 1000000 ) {
                $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 1 MB File');
            }else{
                $('#structurePartOne'+getId+'_text').text('');
            }


            }else{



            if (size > 500000 ) {
                $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 500 KB File');
            }else{
                $('#structurePartOne'+getId+'_text').text('');
            }
        }
        });

    </script>





