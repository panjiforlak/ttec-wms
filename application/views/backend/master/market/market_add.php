<form method="POST" action="<?php echo site_url('master/market/add'); ?>">

    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Market Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="market_name" required>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">City</label>
        <input text="text" class="form-control form-control-sm text-capitalize" name="market_city">
    </div>
    <hr class="mt-4">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>