<?php
$get_unit = $this->select->get_unit( $param2 )->row_array();
?>
<form method='POST' action="<?php echo site_url('master/unit_form/edit/' . $param2); ?>">

    <div class='form-group'>
        <label class='col-form-label-sm font-weight-bold mb-0' for=''>Unit Name</label>
        <input type='text' class='form-control form-control-sm text-uppercase' id='' name='unit_name'
            value="<?php echo $get_unit['unit_name']; ?>" required>
    </div>

    <hr class=''>
    <center>
        <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'><i class='fas fa-fw fa-times'></i>
            Close</button>
        <button type='submit' class='btn btn-sm btn-primary'><i class='fas fa-fw fa-save'></i> Save</button>
    </center>
</form>