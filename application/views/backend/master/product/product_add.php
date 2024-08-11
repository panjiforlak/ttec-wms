    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                <a href="<?php echo site_url(); ?>master/product" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Product </h5>

                <?php $get_supplier = $this->select->get_supplier(); ?>
                <form method="POST" action="<?php echo site_url('master/product_form/add'); ?>">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Suppliers</label>
                        <div class="col-sm-5">
                            <select class="form-select form-select-sm select2" name="supplier_id">
                                <option value="0" class="">- select an supplier -</option>
                                <?php foreach ($get_supplier->result_array() as $gsup) : ?>
                                <option value="<?php echo $gsup['id']; ?>">
                                    <?php echo ucwords($gsup['supplier_name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Part No </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-uppercase" name="part_no">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Part Name <sup class="text-danger">*</sup></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-uppercase" name="part_name"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Description </label>
                        <div class="col-sm-5">
                            <textarea class="form-control form-control-sm" name="description"></textarea>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <div class="col-sm-5">

                            <div class="form-check">
                                <input type="hidden" value="0" name="status">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" value="1" name="status"
                                    checked>
                                <label class="col-form-label py-0" for="gridCheck1">
                                    Active
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-7 col-form-label text-muted fst-italic"
                            style="font-size:10px;"><span class="text-danger">( * )</span> : is required</label>
                    </div>

                    <hr class="mt-2">
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
    <script>
$(document).ready(function() {
    $('.select2').select2({
        width: '100%'
    });
});
    </script>