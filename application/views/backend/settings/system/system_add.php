<link rel="stylesheet" href="<?php echo site_url('assets/bs_iconpicker'); ?>/dist/css/bootstrap-iconpicker.min.css" />

<?php $get_menu_parent = $this->select_model->get_menu_parent(); ?>
<form method="POST" action="<?php echo site_url('settings/system/add'); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 pb-0" for="">Company Logo</label>
        <div class="row pt-0 mt-0">
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" name="company_logo" id="fileUpload1">
                        <label class=" custom-file-label" for="fileUpload">Choose image ... </label>
                    </div>
                </div>
                <small class="text-danger">Format thumbnail : <b> .jpg | .jpeg | .png</b></small>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Copyright</label>
        <input type="text" class="form-control form-control-sm" id="" name="copyright">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Talk to us</label>
        <textarea class="form-control ckeditor" name="desc_talk_to_us" rows="2"></textarea>
    </div>
    <hr class="mt-4">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i>
            Close</button>
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