<?php
$get_product = $this->select->get_product($param2)->row_array();
$get_sup_id = $this->select->get_supplier($get_product['supplier_id'])->row_array();
$get_supplier = $this->select->get_supplier();
$get_unit = $this->select->get_unit();
if ($get_product['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('master/product_form/config/' . $param2); ?>">
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
        <input type="hidden" name="product_id" value="<?php echo $get_product['id']; ?>">
        <label for="inputNumber" class="col-sm-2 col-form-label">Formula Quantity</label>
        <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="main_qty" value='1'>
        </div>
        <div class="col-sm-2">
            <select class=" form-select select2" name="unit_id">

                <option value="0"><?php echo ' - None - '; ?></option>
                <?php foreach ($get_unit->result_array() as $unit) : ?>
                <option value="<?php echo $unit['id']; ?>"><?php echo ucwords($unit['unit_name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <label for="inputNumber" class="col-sm-1 col-form-label text-center">=</label>

        <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="sub_qty" value='100'>
        </div>
        <div class="col-sm-2">
            <select class=" form-select select2" name="sub_unit_id">
                <option value="0"><?php echo ' - None - '; ?></option>
                <?php foreach ($get_unit->result_array() as $unit) : ?>
                <option value="<?php echo $unit['id']; ?>"><?php echo ucwords($unit['unit_name']); ?></option>
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
        dropdownParent: $("#editscrollable-modal")
    });
});
</script>