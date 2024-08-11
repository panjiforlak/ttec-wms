<?php
$get_introduce = $this->select_model->get_introduce($param2)->row_array();

if ($get_introduce['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('content/introduce/edit/' . $param2); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Title</label>
        <input type="text" class="form-control form-control-sm text-capitalize" name="title" value="<?php echo $get_introduce['title']; ?>">
    </div>
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Introduce Banner</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/introduce/banner/' . $get_introduce['banner']); ?>" width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload1" name="banner">
                <label class="custom-file-label" for="banner"><?php echo $get_introduce['banner']; ?></label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Description</label>
        <textarea class="form-control ckeditor" name="description"><?php echo $get_introduce['description']; ?></textarea>
    </div>


    <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-5">
        <input type="hidden" value="0" name="status">
        <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="status" <?php echo $c; ?>>
        <label class="custom-control-label small py-1" for="customControlInline">Is Active</label>
    </div>
    <hr class="">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%'
        });
    });
</script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>