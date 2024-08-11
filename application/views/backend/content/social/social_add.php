<form method="POST" action="<?php echo site_url('content/social/add'); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Social name<small class="text-primary"> (Facebook, Twitter, Instagram, Linkedin)</small></label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="social_name">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Url <small class="text-primary">(https://www.example.com)</small></label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="url">
    </div>

    <hr class="mt-4">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>