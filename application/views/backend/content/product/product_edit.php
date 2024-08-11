<?php
$get_product = $this->select_model->get_product($param2)->row_array();

if ($get_product['status'] == 1) {
    $c = 'checked';
} else {
    $c = '';
}
?>
<form method="POST" action="<?php echo site_url('content/product/edit/' . $param2); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Product name</label>
        <input class="form-control text-capitalize" name="product_name" value="<?php echo $get_product['product_name']; ?>">
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Description</label>
        <textarea class="form-control ckeditor" name="description" rows="2"><?php echo $get_product['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Short description</label>
        <input class="form-control text-capitalize" name="short_description" value="<?php echo $get_product['short_description']; ?>">
    </div>
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Thumbnail</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/product/thumbnails/' . $get_product['image_thumbnail']); ?>" width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload1" name="image_thumbnail" accept="image/*">
                <label class="custom-file-label" for="image_thumbnail"><?php echo $get_product['image_thumbnail']; ?></label>
            </div>
        </div>
    </div>
    <div class="form-group" id="thumbnail-picker-area">
        <label class="col-form-label-sm font-weight-bold mb-0" for="">Images</label>
        <div class="input-group">
            <img class="img-thumbnail" src="<?php echo base_url('uploads/product/images/' . $get_product['image_large']); ?>" width="65">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileUpload2" name="image_large" accept="image/*">
                <label class="custom-file-label" for="image_large"><?php echo $get_product['image_large']; ?></label>
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