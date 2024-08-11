<?php
$get_aboutus = $this->select_model->get_aboutus($param2)->row_array();

if ($get_aboutus['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('content/about_us/edit/' . $param2); ?>">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">About Company</label>
        <textarea class="form-control ckeditor" name="about"><?php echo $get_aboutus['about']; ?></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Vision</label>
        <textarea class="form-control ckeditor" name="vision"><?php echo $get_aboutus['vision']; ?></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Mission</label>
        <textarea class="form-control ckeditor" name="mission"><?php echo $get_aboutus['mission']; ?></textarea>
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