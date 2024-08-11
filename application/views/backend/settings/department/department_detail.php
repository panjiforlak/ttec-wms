<?php
$get = $this->select->get_department($param2)->row_array();
?>
<!-- Recent Sales -->
<div class="col-12">
    <div class=" recent-sales overflow-auto">
        <div class="filter">

        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm text-capitalize" name="" value="<?php echo $get['unit_code']; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Branch Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm text-capitalize" name="" value="<?php echo $get['branch_name']; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm text-capitalize" name="" value="<?php echo $get['unit_name']; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" name="" value="<?php echo $get['status'] == 'active' ? 'Active' : 'Deactive'; ?>" readonly>
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