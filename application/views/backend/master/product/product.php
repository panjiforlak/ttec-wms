<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="filter">
                    <a href="<?php echo site_url(); ?>master/product_form" class="btn btn-sm btn-outline-success add"
                        style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title border-bottom">List Product </h5>
                    <table class="table table-bordered border-light table-striped  " id="examples">
                        <thead class="table-warning table-bordered border-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Config</th>
                                <th scope="col" class="text-center">Code</th>
                                <th scope="col" class="text-center">Part No</th>
                                <th scope="col" class="text-center">Part Name</th>
                                <th scope="col" class="text-center">Formula</th>
                                <th scope="col" class="text-center">Supplier</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_product->result_array() as $gprd) : 
                                $get_product_unit = $this->select->get_product_unit('',$gprd['id']);
                               
                            ?>

                            <tr>
                                <th scope="row"><?php echo $no++ . '.'; ?></th>
                                <td class="text-center">
                                    <a class="edit btn btn-sm btn-primary" href="javascript:void(0);"
                                        data-toggle="tooltip" data-bs-placement="top" title="Config Unit"
                                        onclick="ModalEdit('<?php echo site_url('modal/standart/product/product_config/' . $gprd['id']); ?>', '<?php echo 'Config Unit Quantity'; ?>')">
                                        <i class="bi bi-gear-fill"></i> Unit
                                    </a>
                                </td>
                                <td><?php echo ucwords($gprd['product_code']); ?></td>
                                <td class="text-dark fw-bold"><?php echo $gprd['part_no']; ?></td>
                                <td class="text-dark fw-bold"><?php echo $gprd['part_name']; ?></td>
                                <td class="text-danger text-uppercase">
                                    <?php  foreach ($get_product_unit->result_array() as $gunit) {
                                        $unit = $this->select->get_unit($gunit['unit_id'])->row_array();
                                        $subunit = $this->select->get_unit($gunit['sub_unit_id'])->row_array();
                                        echo $gunit['main_qty'].' '.$unit['unit_name'].' = '.$gunit['sub_qty'].' '.$subunit['unit_name'].'<br>';
                                    };?>

                                </td>
                                <td><?php echo $gprd['supplier_name'] ?: '-'; ?></td>
                                <td class="text-center">
                                    <?php if ($gprd['status'] == 1) {
                                            echo '<span class="badge bg-success">Active</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Deactive</span>';
                                        }; ?>
                                </td>
                                <td class="text-center">
                                    <h6 class="mb-0">
                                        <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="left" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/product/product_detail/' . $gprd['id']); ?>', '<?php echo 'Product Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-info"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/product/product_edit/' . $gprd['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('master/product_form/delete/' . $gprd['id']); ?>"
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