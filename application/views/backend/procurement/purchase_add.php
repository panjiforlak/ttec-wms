    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
                <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                <a href="<?php echo site_url(); ?>procurement/purchase_order" class="btn btn-sm btn-danger add"
                    style="font-size: 12px;margin-right:20px;">
                    <i class="bi bi-backspace-fill"></i> Back
                </a>
                <!-- </a> -->
            </div>
            <div class="card-body">
                <h5 class="card-title border-bottom">Form Add Purchase </h5>

                <?php $get_menu_parent = $this->select->get_menu_parent(); 
                $currentDate = date('Y-m-d\TH:i');
                ?>
                <form method="POST" action="<?php echo site_url('procurement/purchase_form/add'); ?>">

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">PO Ref </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm text-uppercase" name="po_no"
                                placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Purchase Date <sup
                                class="text-danger">*</sup></label>
                        <div class="col-sm-5">
                            <input type="datetime-local" class="form-control form-control-sm"
                                value='<?php echo $currentDate;?>' name="po_date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Delivery Date </label>
                        <div class="col-sm-5">
                            <input type="datetime-local" class="form-control form-control-sm"
                                value='<?php echo $currentDate;?>' name="do_date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">PIC</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-sm" name="po_pic">

                        </div>
                    </div>

                    <hr style="border-top:1px dashed grey" class="shadow">

                    <!-- staart -->
                    <!-- title -->
                    <div class="row mb-3">

                        <div class="col-md-3  my-0 py-0">
                            <div class="form-group  my-0 py-0">
                                <label class="col-form-label-sm font-weight-bold fs-6" for="">PRODUCT<span
                                        class="text-danger font-italic">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-1  my-0 py-0">
                            <div class="form-group  my-0 py-0">
                                <label class="col-form-label-sm font-weight-bold fs-6" for="">TYPE</label>
                            </div>
                        </div>
                        <div class="col-md-1  my-0 py-0">
                            <div class="form-group  my-0 py-0">
                                <label class="col-form-label-sm font-weight-bold fs-6" for="">ORDER QTY</label>
                            </div>
                        </div>
                        <div class="col-md-1  my-0 py-0">
                            <div class="form-group   my-0 py-0">
                                <label class="col-form-label-sm font-weight-bold fs-6" for="">UOM</label>
                            </div>
                        </div>
                        <div class="col-md-1  my-0 py-0">
                            <div class="form-group   my-0 py-0">
                                <label class="col-form-label-sm font-weight-bold fs-6" for="">/LOT</label>
                            </div>
                        </div>


                        <div class="col-md-2 my-0 py-0">
                            <div class="form-group   my-0 mt-1 py-0">
                            </div>
                        </div>
                    </div>
                    <!-- input parameter -->
                    <div class="blank_product_field">
                        <div class="row mt-0 pt-0 ">
                            <!-- product -->
                            <div class="col-md-3">
                                <div class="form-group text-center">
                                    <select class="form-control form-control-sm select2 products fs-6" id="prd1">
                                        <option value="0">- Select a product -</option>
                                        <?php foreach ($get_product_unit->result_array() as $gprod) : ?>
                                        <option value="<?php echo $gprod['id']; ?>">
                                            <?php echo $gprod['part_name']? ucwords($gprod['part_no'].' / '.$gprod['part_name']):ucwords($gprod['part_no']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <!-- type order -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <select class="type form-control form-control-sm text-uppercase" id="type">
                                        <option value="lot">LOT</option>
                                        <option value="reg">REG</option>
                                    </select>
                                </div>
                            </div>
                            <!-- qty -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm text-capitalize qty"
                                        value="1" required
                                        onkeypress=" return event.charCode>= 48 && event.charCode <=57">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <select class=" form-control form-control-sm text-uppercase uom" name="uom[]" id="">


                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="lot form-control form-control-sm text-capitalize"
                                            value="0" required
                                            onkeypress="return event.charCode >= 48 && event.charCode <=57" readonly>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <button type="button" class="btn btn-success btn-sm addProduct" name="button"
                                    id="adding">
                                    <i class="fa fa-fw fa-plus"></i>ADD </button>
                            </div>
                        </div>

                        <div class="row mt-5"></div>
                        <div class="col-md-7">
                            <table class="table table-bordered   " id="examples">
                                <thead class="table-warning table-bordered border-dark">
                                    <tr>
                                        <th scope="col" class="text-center">PART NO / PART NAME</th>
                                        <th scope="col" class="text-center">ORDER TYPE</th>
                                        <th scope="col" class="text-center">QTY ORDER</th>
                                        <th scope="col" class="text-center">UOM</th>
                                        <th scope="col" class="text-center">TOOLS</th>
                                    </tr>
                                </thead>
                                <tbody id="form-container">
                                    <tr class="isEmpty">
                                        <td class="text-center text-danger" colspan='5'>Product is empty, please add
                                            the product.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="product_area"></div>

                    </div>
                    <!--  -->
                    <div class="row mt-4">
                        <label for="" class="col-sm-7 col-form-label text-muted fst-italic"
                            style="font-size:10px;"><span class="text-danger">( * )</span> : is required</label>
                    </div>
                    <hr class="mt-2">
                    <center>
                        <!-- <button type="button" class="btn btn-sm btn-danger" aria-label="Close" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button> -->
                        <button type="submit" class="btn btn-sm btn-primary submit"><i class="bi bi-save"></i>
                            Submit</button>
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


    <script type="text/javascript">
$(document).ready(function() {
    // Stock
    var ids = $("#prd1").val();
    $(".isEmpty").show();
    if (ids == "0") {
        $(".addProduct").prop("disabled", true);
        $(".submit").prop("disabled", true);

    }
    $('#prd1').change(function() {
        var id = $(this).val();
        var type = $('.type').val();
        let qty = $('.qty').val();
        let lot = $('.lot').val();
        if (id == "0") {
            $(".addProduct").prop("disabled", true);

        }

        $.ajax({
            url: "<?php echo site_url(); ?>procurement/get_product_unit",
            method: "POST",
            data: {
                id: id,
                type: type
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var main = '';
                var sub = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    main += '<option value=' + data[i].unit_id + ' >' + data[
                            i]
                        .main_name.toUpperCase() + '</option>'
                    sub += '<option value=' + data[i].sub_unit_id + ' >' + data[
                            i]
                        .sub_name.toUpperCase() + '</option>';
                    lot = data[i].sub_qty
                }
                if (type === 'lot') {
                    $('.uom').html(main);
                    $('.lot').val(lot);

                } else {
                    $('.uom').html(sub);
                    $('.lot').val(lot);
                }

                if (type == 'lot' && id != "0") {
                    $(".addProduct").prop("disabled", false);


                } else if (type == 'reg' && parseInt(qty) > parseInt(lot) && id == "0") {
                    $(".addProduct").prop("disabled", true);

                } else if (type == 'reg' && parseInt(qty) < parseInt(lot) && id != "0") {
                    $(".addProduct").prop("disabled", false);

                }

            }
        });

    });
    $('.type').change(function() {
        // var id_prd = $('select[name="product[]"]').val();
        var id = $('#prd1').val();
        var type = $(this).val();
        let qty = $('.qty').val();
        let lot = $('.lot').val();
        if (id == "0") {
            $(".addProduct").prop("disabled", true);

        }
        $.ajax({
            url: "<?php echo site_url(); ?>procurement/get_product_unit",
            method: "POST",
            data: {
                id: id,
                type: type
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var main = '';
                var sub = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    main += '<option value=' + data[i].unit_id + ' >' + data[
                            i]
                        .main_name.toUpperCase() + '</option>'
                    sub += '<option value=' + data[i].sub_unit_id + ' >' + data[
                            i]
                        .sub_name.toUpperCase() + '</option>';
                    lot = data[i].sub_qty
                }
                if (type === 'lot') {
                    $('.uom').html(main);

                } else {
                    $('.uom').html(sub);
                }
                if (type == 'lot' && id != "0") {
                    $(".addProduct").prop("disabled", false);

                } else if (type == 'reg' && parseInt(qty) > parseInt(lot) && id == "0") {
                    $(".addProduct").prop("disabled", true);

                } else if (type == 'reg' && parseInt(qty) > parseInt(lot) && id != "0") {
                    $(".addProduct").prop("disabled", true);
                } else if (type == 'reg' && parseInt(qty) < parseInt(lot) && id != "0") {
                    $(".addProduct").prop("disabled", false);

                }


            }
        });
    });

    $('.qty').on("keyup", function() {
        let type = $('.type').val();
        let qty = $(this).val();
        let lot = $('.lot').val();
        if (type == 'reg' && parseInt(qty) > parseInt(lot)) {
            $(".addProduct").prop("disabled", true);
        } else {
            $(".addProduct").prop("disabled", false);
        }
    });
});
$(document).ready(function() {
    $('.select2').select2({
        width: '100%'
    });

});
$("#adding").click(function(event) {
    $(".isEmpty").hide();

    // $("#dynamic-form").submit(function(event) {
    event.preventDefault();
    // Mendapatkan semua nilai field nama
    var product = [];
    var partName = [];
    var type = [];
    var qty = [];
    var uom = [];
    var uomName = [];

    $(".products").each(function() {
        product.push($(this).val());

    });

    let part = $(".products option:selected").text()
    partName.push(part.trim())

    $(".type").each(function() {
        type.push($(this).val());
    });
    $(".qty").each(function() {
        qty.push($(this).val());
    });
    $(".uom").each(function() {
        uom.push($(this).val());
    });
    let uoms = $(".uom option:selected").text()
    uomName.push(uoms.trim())

    //  clear after click add
    $(".qty").val(1);
    $(".addProduct").prop("disabled", true);
    $(".products").select2("val", "0");
    $(".uom").val("uom");
    $(".lot").val("0");
    $(".type").val("lot");
    $(".submit").prop("disabled", false);


    let html = '<tr>'
    html += '<td class="text-center fw-bold"><input type="hidden" name="product_unit_id[]"  value="' +
        product +
        '">' + partName + '</td>';
    html +=
        '<td class="text-center text-uppercase"><input type="hidden" name="type[]"  value="' +
        type + '">' + type + '</td>';
    html += '<td class="text-center fw-bold"><input type="hidden" name="qty[]"  value="' + qty + '">' +
        qty +
        '</td>';
    html += '<td class="text-center"><input type="hidden" name="unit_id[]"  value="' + uom +
        '">' + uomName + '</td>';
    html += '<td><button class="btn btn-sm btn-danger" onclick="removeRow(this)">Delete</button></td>';
    html += '</tr>';

    // Lakukan sesuatu dengan data yang dikumpulkan
    $(".products option[value='" + product + "']").remove();
    $("#form-container").append(html);



});

removeRow = function(el) {
    $(el).parents("tr").remove()
}
    </script>