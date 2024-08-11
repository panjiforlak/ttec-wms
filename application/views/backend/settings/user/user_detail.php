<?php
$get_menu = $this->select->get_menu($param2)->row_array();
$get_menu_link = $this->select->get_menu($get_menu['menu_parent'])->row_array();
if ($get_menu['menu_parent'] !== '0') {
    $get_menu_parent = $this->select->get_menu_parent($get_menu['menu_parent'])->row_array();
    $test =  $get_menu_parent['menu_name'];
} else {
    $test =  'None';
}
if ($get_menu['is_active'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<!-- Recent Sales -->
<div class="col-12">
    <div class=" recent-sales overflow-auto">
        <div class="filter">
            <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
            <!-- <a href="<?php echo site_url(); ?>settings/menu" class="btn btn-sm btn-danger add" style="font-size: 12px;margin-right:20px;">
                <i class="bi bi-backspace-fill"></i> Back
            </a> -->
            <!-- </a> -->
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form method="POST" action="<?php echo site_url('settings/menu_form_add/add'); ?>">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Parent</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-capitalize" name="menu_name"
                            value="<?php echo $test; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-capitalize" name="menu_name"
                            value="<?php echo $get_menu['menu_name']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="url"
                            value="<?php echo $get_menu['url']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="icon"
                            value="<?php echo $get_menu['icon']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="icon"
                            value="<?php echo $get_menu['is_active'] !== '0' ? 'Active' : 'Deactive'; ?>" readonly>
                    </div>
                </div>
                <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-4">
                            <input type="hidden" value="0" name="is_active">
                            <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="is_active" checked>
                            <label class="custom-control-label small py-1 font-weight-bold" for="customControlInline">Is Active</label>
                        </div> -->
                <!-- </div> -->


                <hr class="mt-4">
                <center>
                    <!-- <button type="button" class="btn btn-sm btn-danger" aria-label="Close" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button> -->
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"> Close</button>
                </center>
            </form><!-- End General Form Elements -->

            <!-- <script>
                    $(document).ready(function() {
                        $('.form-select-sm').select2({
                            width: 'resolve'
                        });
                    });
                </script> -->
        </div>
    </div>
</div>