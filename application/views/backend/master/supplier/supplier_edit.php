<?php
$get_supplier = $this->select->get_supplier($param2)->row_array();

if ($get_supplier['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('master/supplier_form/edit/' . $param2); ?>">

    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Company Name</label>
        <input type="text" class="form-control form-control-sm text-uppercase" id="" name="supplier_name"
            value="<?php echo $get_supplier['supplier_name']; ?>" required>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Address</label>
        <textarea class="form-control form-control-sm" id="" name="supplier_address">
            <?php echo $get_supplier['supplier_address']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">PIC</label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="supplier_pic"
            value="<?php echo $get_supplier['supplier_pic']; ?>"
            onkeypress="return event.charCode >= 48 && event.charCode <=57">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Phone Number</label>
        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="supplier_contact"
            value="<?php echo $get_supplier['supplier_contact']; ?>"
            onkeypress="return event.charCode >= 48 && event.charCode <=57">
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
        width: '100%'
    });
});
</script>