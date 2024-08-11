<?php
$get_menu = $this->select->get_role($param2)->row_array();
?>
<!-- Recent Sales -->
<div class="col-12">
    <div class=" recent-sales overflow-auto">
        <div class="filter">
            <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
            <!-- <a href="<?php echo site_url(); ?>setting/menu" class="btn btn-sm btn-danger add" style="font-size: 12px;margin-right:20px;">
                <i class="bi bi-backspace-fill"></i> Back
            </a> -->
            <!-- </a> -->
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form method="POST" action="<?php echo site_url('settings/menu_form_add/add'); ?>">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-capitalize" name="menu_name"
                            value="<?php echo $get_menu['role_name']; ?>" readonly>
                    </div>
                </div>

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