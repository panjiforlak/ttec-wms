<form method="POST" action="<?php echo site_url('content/clients/add_header'); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Description header</label>
        <textarea class="form-control ckeditor" name="desc_client" rows="2"></textarea>
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