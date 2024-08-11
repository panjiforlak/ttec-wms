<form method="POST" action="<?php echo site_url('content/clients/add'); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Client name</label>
        <input class="form-control text-capitalize" name="client_name">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 pb-0" for="">Client image</label>
        <div class="row pt-0 mt-0">
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" name="client_image" id="fileUpload1">
                        <label class=" custom-file-label" for="fileUpload">Choose image ... </label>
                    </div>
                </div>
                <small class="text-danger">Format thumbnail : <b> .jpg | .jpeg | .png</b></small>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Description</label>
        <textarea class="form-control ckeditor" name="client_description" rows="2"></textarea>
    </div>

    <hr class="mt-4">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>
<script type="application/javascript">
    $('#fileUpload1').on('change', function() {
        // Ambil nama file 
        let fileName = $(this).val().split('\\').pop();
        // Ubah "Choose a file" label sesuai dengan nama file yag akan diupload
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#fileUpload2').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>