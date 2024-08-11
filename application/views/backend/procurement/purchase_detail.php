<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-9">
            <div class="card recent-sales overflow-auto">
                <div class="filter">
                    <!-- <a href="<?php echo site_url(); ?>master/product_form" class="btn btn-sm btn-outline-success add"
                        style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a> -->
                </div>
                <div class="card-body">
                    <h5 class="card-title border-bottom">DETAIL PURCHASE </h5>
                    <div class='row mt-3'>
                        <div class="col-md-7">
                            <h7>PO NUMBER : <?php echo $get_po_no;?></h7>
                        </div>
                        <div class="col-md-5">
                            <h7>ORDER DATE : <?php echo $get_po_no;?></h7>
                        </div>
                    </div>
                    <div class='row mt-2'>
                        <div class="col-md-7">
                            <h7>PO REFRENCE : <?php echo $get_po_no;?></h7>
                        </div>
                        <div class="col-md-5">
                            <h7>DELIVERY DATE : <?php echo $get_po_no;?></h7>
                        </div>
                    </div>
                    <hr style="border-top:1px dashed grey" class="shadow">

                    <table class="table table-bordered border-light " id="example">
                        <thead class="table-warning table-bordered border-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Code</th>
                                <th scope="col" class="text-center">Part No</th>
                                <th scope="col" class="text-center">Part Name</th>
                                <th scope="col" class="text-center">Type</th>
                                <th scope="col" class="text-center">Lot</th>
                                <th scope="col" class="text-center">Order Qty</th>
                                <th scope="col" class="text-center">Total Qty</th>
                                <th scope="col" class="text-center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_purchase_detail->result_array() as $gpd) : 
                                $get_unit = $this->select->get_unit($gpd['sub_unit_id'])->row_array();
                             
                            ?>

                            <tr>
                                <th scope="row"><?php echo $no++ . '.'; ?></th>
                                <td class="text-dark fw-bold"><?php echo $gpd['product_code']; ?></td>
                                <td class="text-dark fw-bold"><?php echo $gpd['part_no']; ?></td>
                                <td class="text-dark fw-bold"><?php echo $gpd['part_name']; ?></td>
                                <td class="text-dark fw-bold text-uppercase"><?php echo $gpd['type']; ?></td>
                                <td class="text-dark fw-bold text-uppercase">
                                    <?php echo $gpd['sub_qty'].' '.$get_unit['unit_name']; ?></td>
                                <td class="text-dark fw-bold text-uppercase">
                                    <?php echo $gpd['qty'].' '.$gpd['unit_name']; ?></td>
                                <td class="text-dark fw-bold text-uppercase">
                                    <?php 
                                    $totQty =$gpd['sub_qty']*$gpd['qty'];
                                    echo $gpd['type']==='lot'? $totQty.' '.$get_unit['unit_name']: $gpd['qty'].' '.$gpd['unit_name']; ?>
                                </td>

                                <td class="text-center">
                                    <h6 class="mb-0">
                                        <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="left" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/product/product_detail/' . $gpd['id']); ?>', '<?php echo 'Product Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-info"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/product/product_edit/' . $gpd['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('master/product_form/delete/' . $gpd['id']); ?>"
                                            data-bs-toggle="modal" data-bs-target="#confirm" data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="bi bi-trash3-fill text-danger"></i>
                                        </a>
                                    </h6>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- End Recent Sales -->
    </div>
</div><!-- End Left side columns -->

<script type="text/javascript">
$(document).ready(function() {
    $('#confirm').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
})
</script>
<script>
$(document).ready(function() {
    $('#select2').select2({

    });
    $('#examples').DataTable({
        dom: 'frtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>