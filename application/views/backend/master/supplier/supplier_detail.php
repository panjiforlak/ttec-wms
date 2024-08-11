<?php
$get_supplier = $this->select->get_supplier( $param2 )->row_array();

if ( $get_supplier[ 'status' ] == 1 ) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<!-- Recent Sales -->
<div class='col-12'>
    <div class=' recent-sales overflow-auto'>
        <div class='filter'>
            <!-- <a href = 'javascript:void(0);' class = 'add icon' onclick = "ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
            <!-- <a href = '<?php echo site_url(); ?>master/menu' class = 'btn btn-sm btn-danger add' style = 'font-size: 12px;margin-right:20px;'>
<i class = 'bi bi-backspace-fill'></i> Back
</a> -->
            <!-- </a> -->
        </div>
        <div class='card-body'>
            <h5 class='card-title'></h5>
            <form method='POST' action="<?php echo site_url('master/menu_form_add/add'); ?>">

                <div class='row mb-3'>
                    <label for='inputEmail' class='col-sm-2 col-form-label'>Company Name</label>
                    <div class='col-sm-5'>
                        <input type='text' class='form-control form-control-sm text-capitalize' name='supplier_name'
                            value="<?php echo $get_supplier['supplier_name']; ?>" readonly>
                    </div>
                </div>
                <div class='row mb-3'>
                    <label for='inputPassword' class='col-sm-2 col-form-label'>Address</label>
                    <div class='col-sm-5'>
                        <textarea class='form-control form-control-sm' name='supplier_address' readonly>
<?php echo $get_supplier[ 'supplier_address' ];
?>
</textarea>
                    </div>
                </div>
                <div class='row mb-3'>
                    <label for='inputNumber' class='col-sm-2 col-form-label'>Contact</label>
                    <div class='col-sm-5'>
                        <input type='text' class='form-control form-control-sm' name='supplier_pic'
                            value="<?php echo $get_supplier['supplier_pic']." : ".$get_supplier['supplier_contact']; ?>"
                            readonly>
                    </div>
                </div>
                <div class='row mb-3'>
                    <label for='inputNumber' class='col-sm-2 col-form-label'>Status</label>
                    <div class='col-sm-5'>
                        <input type='text' class='form-control form-control-sm' name='icon'
                            value="<?php echo $get_supplier['status'] !== '0' ? 'Active' : 'Deactive'; ?>" readonly>
                    </div>
                </div>

                <hr class='mt-4'>
                <center>
                    <!-- <button type = 'button' class = 'btn btn-sm btn-danger' aria-label = 'Close' data-bs-dismiss = 'modal'><i class = 'fas fa-fw fa-times'></i> Close</button> -->
                    <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'> Close</button>
                </center>
            </form><!-- End General Form Elements -->

        </div>
    </div>
</div>