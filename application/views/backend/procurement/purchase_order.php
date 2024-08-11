<!-- <div class="row justify-content-center"> -->
<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="filter">
                    <a href="<?php echo site_url(); ?>procurement/purchase_form"
                        class="btn btn-sm btn-outline-success add" style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title border-bottom"><?php echo $title_page;?> </h5>
                    <table class="table table-bordered border-light table-striped  " id="examples">
                        <thead class="table-warning table-bordered border-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">PO Number</th>
                                <th scope="col" class="text-center">Ref Number</th>
                                <th scope="col" class="text-center">Order Date</th>
                                <th scope="col" class="text-center">Delivery Date</th>
                                <th scope="col" class="text-center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_po->result_array() as $gpo) :
                                
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++ . '.'; ?></th>
                                <td class="fw-bold"><a
                                        href="<?php echo site_url('procurement/purchase_detail/'. $gpo['po_no']); ?>"><?php echo ucwords($gpo['po_no']); ?></a>
                                </td>
                                <td><?php echo ucwords($gpo['po_ref']); ?></td>
                                <td><?php echo date("d M Y h:i:s",strtotime($gpo['po_date'])); ?></td>
                                <td><?php echo date("d M Y h:i:s",strtotime($gpo['do_date'])); ?></td>
                                <td class="text-center">
                                    <h6 class="mb-0">
                                        <!-- <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="left" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/procurement/purchase_detail/' . $gpo['id']); ?>', '<?php echo 'procurement Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-info"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/procurement/purchase_edit/' . $gpo['id']); ?>', '<?php echo 'Edit procurement'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a> -->
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('procurement/purchase_form/delete/' . $gpo['id']); ?>"
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