<?php
$get_role = $this->select->get_role();
$get_branch = $this->select->get_branch();
$get_work_unit = $this->select->get_department();
?>

<!-- Recent Sales -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="filter">
            <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/user/user_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
            <a href="<?php echo site_url(); ?>settings/user" class="btn btn-sm btn-danger add"
                style="font-size: 12px;margin-right:20px;">
                <i class="bi bi-backspace-fill"></i> Back
            </a>
            <!-- </a> -->
        </div>
        <div class="card-body">
            <div>
                <h5 class="card-title border-bottom">Form Add User </h5>
            </div>

            <?php $get_menu_parent = $this->select->get_menu_parent(); ?>
            <form method="POST" action="<?php echo site_url('settings/user_form_add/add'); ?>">

                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email <sup
                            class="text-danger">*</sup></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm text-lowercase" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password <sup
                            class="text-danger">*</sup></label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control form-control-sm" name="password1" required
                            placeholder="set password">
                    </div>
                    <div class="col-sm-2">
                        <input type="password" class="form-control form-control-sm" name="password2" required
                            placeholder="confirm password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Full Name <sup
                            class="text-danger">*</sup></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="full_name" required>
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
                    <label for="inputText" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm select2" id="select_department" name="work_unit_id">
                        </select>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm select2" id="select_position" name="position_id">
                        </select>
                    </div>
                </div> -->
                <div class="row mb-3 pt-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Role <sup class="text-danger">*</sup></label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm select2" name="role_id" id="select_role" required>
                            <option value="0">- Choose Role -</option>
                            <?php foreach ($get_role->result_array() as $grole) : ?>
                            <option value="<?php echo $grole['id']; ?>"><?php echo ucwords($grole['role_name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"></legend>
                    <div class="col-sm-5">

                        <div class="form-check">
                            <input type="hidden" value="0" name="is_active">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" value="1" name="is_active"
                                checked>
                            <label class="col-form-label py-0" for="gridCheck1">
                                Active
                            </label>
                        </div>

                    </div>

                    <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-4">
                            <input type="hidden" value="0" name="is_active">
                            <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="is_active" checked>
                            <label class="custom-control-label small py-1 font-weight-bold" for="customControlInline">Is Active</label>
                        </div> -->
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
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('#select_branch').change(function() {
    var id = $(this).val();
    $.ajax({
        url: "<?php echo site_url(); ?>settings/ajx_dpt/" + id,
        method: "GET",
        data: {
            id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            html += '<option value=0> - Choose Department -</option>';
            for (i = 0; i < data.length; i++) {
                html += '<option  value=' + data[i].id + ' >' + data[i].unit_name + '</option>';
            }
            $('#select_department').html(html);
        }
    });
});
$('#select_department').change(function() {
    var id = $(this).val();
    $.ajax({
        url: "<?php echo site_url(); ?>settings/ajx_pst/" + id,
        method: "GET",
        data: {
            id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            html += '<option value=0> - Choose Position -</option>';
            for (i = 0; i < data.length; i++) {
                html += '<option  value=' + data[i].id + ' >' + data[i].role + '</option>';
            }
            $('#select_position').html(html);
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('#select_role').select2({
        width: 'resolve'
    });
    $('#select_branch').select2({
        width: 'resolve'
    });
    $('#select_department').select2({
        width: 'resolve'
    });
});
</script>