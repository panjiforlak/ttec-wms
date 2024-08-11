<?php
$get_menu = $this->select->get_role($param2)->row_array();
$get_department = $this->select->get_department();
$get_role = $this->select->get_role();
?>
<form method="POST" action="<?php echo site_url('settings/role_form/edit/' . $param2); ?>">
    <div class="row mb-3 pt-3">
        <label for="inputText" class="col-sm-2 col-form-label">Department<sup class="text-danger">*</sup></label>
        <div class="col-sm-5">
            <select class="form-control form-control-sm select2 " name="department_id" id="select_role"
                data-placeholder="- Choose Department -" required>
                <option></option>
                <?php foreach ($get_department->result_array() as $gd) : ?>
                <?php if ($gd['id'] == $get_menu['department_id'] && $get_menu['department_id'] !== 0) : ?>
                <option value="<?php echo $gd['id']; ?>" selected><?php echo ucwords($gd['unit_name']); ?></option>
                <?php elseif ($gd['id'] !== $get_menu['department_id'] && $get_menu['department_id'] !== 0) : ?>
                <option value="<?php echo $gd['id']; ?>"><?php echo ucwords($gd['unit_name']); ?></option>
                <?php else : ?>
                <option value="<?php echo $gd['id']; ?>"><?php echo ucwords($gd['unit_name']); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Role <sup class="text-danger">*</sup></label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm text-capitalize" name="role_name"
                value="<?php echo $get_menu['role_name']; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Report To :</label>
        <div class="col-sm-5">
            <select class="form-control form-control-sm select2" name="role_parent"
                data-placeholder="- Choose Report To : -">
                <option></option>
                <?php foreach ($get_role->result_array() as $grole) : ?>
                <?php if ($grole['id'] == $get_menu['role_parent'] && $get_menu['role_parent'] !== 0) : ?>
                <option value="<?php echo $grole['id']; ?>" selected><?php echo ucwords($grole['role_name']); ?>
                </option>
                <?php elseif ($grole['id'] !== $get_menu['role_parent'] && $get_menu['role_parent'] !== 0) : ?>
                <option value="<?php echo $grole['id']; ?>"><?php echo ucwords($grole['role_name']); ?></option>
                <?php else : ?>
                <option value="<?php echo $grole['id']; ?>"><?php echo ucwords($grole['role_name']); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
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
        width: '100%',
        placeholder: $(this).data('placeholder'),
    });

});
</script>