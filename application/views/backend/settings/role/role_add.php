    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                <a href="<?php echo site_url(); ?>settings/role" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Role </h5>

                <form class="was-validated" method="POST" action="<?php echo site_url('settings/role_form/add'); ?>">
                    <div class="row mb-3 pt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Department<sup
                                class="text-danger">*</sup></label>
                        <div class="col-sm-5">
                            <select class="form-control form-control-sm select2 " name="department_id" id="select_role"
                                data-placeholder="- Choose Department -" required>
                                <option></option>
                                <?php foreach ($get_department->result_array() as $grole) : ?>
                                <option value="<?php echo $grole['id']; ?>"><?php echo ucwords($grole['unit_name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Role <sup
                                class="text-danger">*</sup></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="role_name"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Report To :</label>
                        <div class="col-sm-5">
                            <select class="form-control form-control-sm select2" name="role_parent"
                                data-placeholder="- Choose Report To : -">
                                <option></option>
                                <?php foreach ($get_role->result_array() as $grole) : ?>
                                <option value="<?php echo $grole['id']; ?>"><?php echo ucwords($grole['role_name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-sm-7 col-form-label text-muted fst-italic "
                            style="font-size:10px;"><span class="text-danger">( * )</span> : is required</label>
                    </div>

                    <hr class="mt-2">
                    <center>
                        <!-- <button type="button" class="btn btn-sm btn-danger" aria-label="Close" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button> -->
                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save"></i> Save</button>
                    </center>
                </form><!-- End General Form Elements -->

                <script>
                $(document).ready(function() {
                    $('.select2').select2({

                        placeholder: $(this).data('placeholder'),
                    });

                });
                </script>
            </div>
        </div>
    </div>