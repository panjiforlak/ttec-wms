<?php
$get_clients = $this->select_model->get_clients($param2)->row_array();

if ($get_clients['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('content/clients/edit/' . $param2); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Name</label>
        <input class="form-control text-capitalize" name="client_name" value="<?php echo $get_clients['client_name']; ?>">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Description</label>
        <textarea class="form-control ckeditor" name="client_description" rows="2"><?php echo $get_clients['client_description']; ?></textarea>
    </div>
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Image</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/clients/thumbnails/' . $get_clients['client_image']); ?>" width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload1" name="client_image" accept="image/*">
                <label class="custom-file-label" for="client_image"><?php echo $get_clients['client_image']; ?></label>
            </div>
        </div>
    </div>



    <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-5">
        <input type="hidden" value="0" name="status">
        <input type="checkbox" class="custom-control-input " id="customControlInline" value="1" name="status" <?php echo $c; ?>>
        <label class="custom-control-label small py-1" for="customControlInline">Is Active</label>
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