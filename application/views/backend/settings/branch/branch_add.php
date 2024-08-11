    <?php
    $cek = $this->select->branch_code();
    $nourut = substr($cek, 1, 3);
    $code = $nourut + 1;

    $data = array('product_code' => $code);

    ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                <a href="<?php echo site_url(); ?>settings/branch" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Branch </h5>

                <form method="POST" action="<?php echo site_url('settings/branch_form/add'); ?>">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="branch_code"
                                value="<?php echo 'B' . sprintf("%03s", $data['product_code']); ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Branch Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="branch_name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-5">
                            <textarea class="form-control form-control-sm" name="branch_location"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">PIC (Person In Charge)</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="branch_pic">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="branch_phone"
                                onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control form-control-sm" name="branch_email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <div class="col-sm-5">

                            <div class="form-check">
                                <input type="hidden" value="Deactive" name="status">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" value="Active"
                                    name="status" checked>
                                <label class="col-form-label py-0" for="gridCheck1">
                                    Active
                                </label>
                            </div>

                        </div>

                    </div>


                    <hr class="mt-4">
                    <center>
                        <!-- <button type="button" class="btn btn-sm btn-danger" aria-label="Close" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button> -->
                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save"></i> Save</button>
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