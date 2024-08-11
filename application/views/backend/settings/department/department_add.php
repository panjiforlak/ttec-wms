    <?php
    $cek = $this->select->dept_code();
    $nourut = substr($cek, 1, 3);
    $code = $nourut + 1;
    $data = array('unit_code' => $code);

    $get_branch = $this->select->get_branch();
    ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <a href="<?php echo site_url(); ?>settings/work_unit" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Department </h5>

                <form method="POST" action="<?php echo site_url('settings/work_unit_form/add'); ?>">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="unit_code"
                                value="<?php echo 'D' . sprintf("%03s", $data['unit_code']); ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Branch</label>
                        <div class="col-sm-5">
                            <select class="form-control form-control-sm select2" id="select_branch" name="branch_id">
                                <option value="0">- Choose Branch -</option>
                                <?php foreach ($get_branch->result_array() as $gbranch) : ?>
                                <option value="<?php echo $gbranch['id']; ?>"><?php echo $gbranch['branch_name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Department Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="unit_name">
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

            </div>
        </div>
    </div>