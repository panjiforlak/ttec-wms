<?php
$get_system = $this->select_model->get_system($param2)->row_array();
?>
<form method="POST" action="<?php echo site_url('settings/system/edit/' . $param2); ?>" enctype="multipart/form-data">
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Company Logo</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/system/' . $get_system['company_logo']); ?>"
                width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload1" name="company_logo" accept="image/*">
                <label class="custom-file-label" for="company_logo"><?php echo $get_system['company_logo']; ?></label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Copyright</label>
        <input type="text" class="form-control form-control-sm" id="" name="copyright"
            value="<?php echo $get_system['copyright']; ?>">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Talk to us</label>
        <textarea class="form-control ckeditor" name="desc_talk_to_us"
            rows="2"><?php echo $get_system['desc_talk_to_us']; ?></textarea>
    </div>
    <hr class="">
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