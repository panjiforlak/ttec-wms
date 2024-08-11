<?php
$get = $this->select->get_department($param2)->row_array();
if ($get['status'] == 'active') {
    $c = 'checked';
} else {
    $c = '';
}
$get_b = $this->select->get_branch();



?>
<form method="POST" action="<?php echo site_url('settings/work_unit_form/edit/' . $param2); ?>">


    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="unit_code"
                value="<?php echo $get['unit_code']; ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Branch</label>
        <div class="col-sm-5">
            <select class="form-select select2" name="branch_id">
                <option value="<?php echo $get['branch_id']; ?>"><?php echo ucwords($get['branch_name']); ?></option>
                <?php foreach ($get_b->result_array() as $gb) : ?>
                <?php if ($gb['id'] == $get['branch_id']) : ?>
                <?php else : ?>
                <option value="<?php echo $gb['id']; ?>"><?php echo ucwords($gb['branch_name']); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Department</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="unit_name"
                value="<?php echo $get['unit_name']; ?>">
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