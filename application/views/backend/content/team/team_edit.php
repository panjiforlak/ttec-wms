<?php
$get_team = $this->select_model->get_team($param2)->row_array();
?>
<form method="POST" action="<?php echo site_url('content/team/edit/' . $param2); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Name</label>
        <input class="form-control text-capitalize" name="name" value="<?php echo $get_team['name']; ?>">
    </div>
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Image</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/team/' . $get_team['photo']); ?>" width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload1" name="photo" accept="image/*">
                <label class="custom-file-label" for="photo"><?php echo $get_team['photo']; ?></label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Social link</label>
        <input class="form-control text-capitalize" name="social_link" value="<?php echo $get_team['social_link']; ?>">
    </div>
    <hr class="">
    <center>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
    </center>
</form>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%'
        });
    });
    $('#fileUpload1').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#fileUpload2').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>