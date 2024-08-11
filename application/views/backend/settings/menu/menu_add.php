    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                <a href="<?php echo site_url(); ?>settings/menu" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Menu </h5>

                <?php $get_menu_parent = $this->select->get_menu_parent(); ?>
                <form method="POST" action="<?php echo site_url('settings/menu_form/add'); ?>">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Parent</label>
                        <div class="col-sm-5">
                            <select class="form-select form-select-sm select2 fs-6" name="menu_parent">
                                <option value="0" class="">- select an option -</option>
                                <?php foreach ($get_menu_parent->result_array() as $gparent) : ?>
                                <option value="<?php echo $gparent['id']; ?>">
                                    <?php echo ucwords($gparent['menu_name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Menu <sup
                                class="text-danger">*</sup></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="menu_name"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="url">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="icon"
                                placeholder="ex: bi bi-gear-wide-connected">
                            <small class="fst-italic float-right" style="font-size:10px;">Source: <a target="_blank"
                                    href="https://icons.getbootstrap.com/">Bootstrap Icon</a></small>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <div class="col-sm-5">

                            <div class="form-check">
                                <input type="hidden" value="0" name="is_active">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" value="1"
                                    name="is_active" checked>
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