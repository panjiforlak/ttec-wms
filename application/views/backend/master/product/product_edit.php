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
<form method="POST" action="<?php echo site_url('master/product_form/edit/' . $param2); ?>">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 fs-6" for="">Code</label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="part_no"
            value="<?php echo $get_product['product_code']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 fs-6 for="">Supplier</label>
        <select class=" form-select select2" name="supplier_id">
            <?php if ($get_product['supplier_id'] >= 1) : ?>
            <option value="<?php echo $get_sup_id['id']; ?>">
                <?php echo ucwords($get_sup_id['supplier_name']); ?>
            </option>
            <?php endif; ?>
            <option value="0"><?php echo ' - None - '; ?></option>
            <?php foreach ($get_supplier->result_array() as $gsup) : ?>
            <?php if ($gsup['id'] == $get_sup_id['id']) : ?>
            <?php else : ?>
            <option value="<?php echo $gsup['id']; ?>"><?php echo ucwords($gsup['supplier_name']); ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
            </select>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 fs-6" for="">Part NO</label>
        <input type="text" class="form-control form-control-sm text-uppercase" id="" name="part_no"
            value="<?php echo $get_product['part_no']; ?>">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 fs-6" for="">Part Name <sup
                class="text-danger">*</sup></label>
        <input type="text" class="form-control form-control-sm text-uppercase" id="" name="part_name"
            value="<?php echo $get_product['part_name']; ?>" required>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0 fs-6" for="">Description <sup
                class="text-danger">*</sup></label>
        <textarea class="form-control form-control-sm" id=""
            name="description"><?php echo $get_product['description']; ?></textarea>
    </div>

    <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-5">
        <input type="hidden" value="0" name="status">
        <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="status"
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
        width: '100%',
        dropdownParent: $("#editscrollable-modal")
    });
});
</script>