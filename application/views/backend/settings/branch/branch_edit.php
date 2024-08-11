<?php
$get = $this->select->get_branch($param2)->row_array();
if ($get['status'] == 'active') {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('settings/branch_form/edit/' . $param2); ?>">


    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Branch Name</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="branch_name"
                value="<?php echo $get['branch_name']; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Location</label>
        <div class="col-sm-5">
            <textarea class="form-control form-control-sm"
                name="branch_location"><?php echo $get['branch_location']; ?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">PIC (Person In Charge)</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="branch_pic"
                value="<?php echo $get['branch_pic']; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="branch_phone"
                value="<?php echo $get['branch_phone']; ?>"
                onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
            <input type="email" class="form-control form-control-sm" name="branch_email"
                value="<?php echo $get['branch_email']; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0"></legend>
        <div class="col-sm-5">

            <div class="form-check">
                <input type="hidden" value="Deactive" name="status">
                <input class="form-check-input" type="checkbox" id="gridCheck1" value="active" name="status"
                    <?php echo $c; ?>>
                <label class="col-form-label py-0" for="gridCheck1">
                    Active
                </label>
            </div>

        </div>

    </div>
    <hr class="">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i>
            Close</button>
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