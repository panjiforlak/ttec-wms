<?php
$get_product = $this->select->get_product($param2)->row_array();
$get_sup_id = $this->select->get_supplier($get_product['supplier_id'])->row_array();
$get_supplier = $this->select->get_supplier();
if ($get_product['status'] == 1) {
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
            <!-- <a href="<?php echo site_url(); ?>master/menu" class="btn btn-sm btn-danger add" style="font-size: 12px;margin-right:20px;">
                <i class="bi bi-backspace-fill"></i> Back
            </a> -->
            <!-- </a> -->
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form method="POST" action="<?php echo site_url('master/menu_form_add/add'); ?>">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-capitalize" name=""
                            value="<?php echo $get_product['product_code']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-capitalize" name=""
                            value="<?php echo $get_product['supplier_name']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Part No</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name=""
                            value="<?php echo $get_product['part_no']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Part Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name=""
                            value="<?php echo $get_product['part_name']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-5">
                        <textarea class="form-control form-control-sm" name=""
                            readonly><?php echo $get_product['description']; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="icon"
                            value="<?php echo $get_product['status'] !== '0' ? 'Active' : 'Deactive'; ?>" readonly>
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