<form method="POST" action="<?php echo site_url('content/about_us/add'); ?>">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">About Company</label>
        <textarea class="form-control ckeditor" name="about"></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Vision</label>
        <textarea class="form-control ckeditor" name="vision"></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Mission</label>
        <textarea class="form-control ckeditor" name="mission"></textarea>
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