<?php
$get_menu = $this->select->get_user($param2)->row_array();
$get_menu_link = $this->select->get_menu($get_menu['menu_parent'])->row_array();
$get_menu_parent = $this->select->get_menu_parent();
if ($get_menu['is_active'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('settings/user_form/edit/' . $param2); ?>">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Menu Parent</label>
        <select class="form-select form-select-sm" name="menu_parent">
            <?php if ($get_menu['menu_parent'] >= 1) : ?>
            <option value="<?php echo $get_menu_link['id']; ?>"><?php echo ucwords($get_menu_link['menu_name']); ?>
            </option>
            <?php else : ?>
            <option value="0"><?php echo ' - None - '; ?></option>
            <?php endif; ?>
            <?php foreach ($get_menu_parent->result_array() as $gparent) : ?>
            <?php if ($gparent['id'] == $get_menu_link['id']) : ?>
            <?php else : ?>
            <option value="<?php echo $gparent['id']; ?>"><?php echo ucwords($gparent['menu_name']); ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Menu Name</label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="menu_name"
            value="<?php echo $get_menu['menu_name']; ?>" required>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Url</label>
        <input type="text" class="form-control form-control-sm" id="" name="url"
            value="<?php echo $get_menu['url']; ?>">
    </div>
    <div class=" form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Icon <span
                class="text-danger small font-italic"></span></label>
        <div class="input-group input-group-sm mb-0">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm"><i
                        class="<?php echo $get_menu['icon']; ?>"></i></span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="icon" value="<?php echo $get_menu['icon']; ?>">
        </div>
        <small class="font-italic float-right" style="font-size:9pt;">Source: <a target="_blank"
                href="https://icons.getbootstrap.com/">Bootstrap Icon</a></small>
    </div>
    <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-5">
        <input type="hidden" value="0" name="is_active">
        <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="is_active"
            <?php echo $c; ?>>
        <label class="custom-control-label small py-1" for="customControlInline">Is Active</label>
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