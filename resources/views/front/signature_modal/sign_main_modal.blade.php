<div class="bs-example">
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> --}}

                    <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>

                        <button type="button" data-toggle="tooltip" data-placement="top" title="Close" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>

                </div>
                <div class="modal-body"  id="mResult">

                </div>
                
            </div>
        </div>
    </div>
</div>
