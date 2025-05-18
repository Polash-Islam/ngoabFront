<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label" for="">
                Copy of 'Unchanged' certificate (notarized/attested by the Peace of Justice Department of the concerned country) if the constitution of the organization has not changed : <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>
            </label>
            <input class="form-control" name="constitution_of_the_organization_if_unchanged" data-parsley-required accept=".pdf" type="file" id="constitution_of_the_organization_if_unchanged">
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
