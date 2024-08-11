<?php $get_market = $this->select_model->get_market($param2)->row_array(); ?>
<form method="POST" action="<?php echo site_url('master/market/edit/' . $param2); ?>">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Market Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="market_name" value="<?php echo $get_market['market_name']; ?>" required>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">City</label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="market_city" value="<?php echo $get_market['market_city']; ?>" required>
    </div>

    <hr class="mt-4">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>