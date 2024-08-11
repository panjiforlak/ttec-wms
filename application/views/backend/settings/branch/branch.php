<!-- <div class="row justify-content-center"> -->

<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                    <a href="<?php echo site_url(); ?>settings/branch_form"
                        class="btn disabled btn-sm btn-outline-success add" style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                    <!-- </a> -->
                </div>

                <div class="card-body">
                    <h5 class="card-title border-bottom">List Branch </h5>
                    <table class="table table-sm table-bordered table-striped datatabl " id="examples">
                        <thead class="table-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Branch Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">PIC</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_branch->result_array() as $new) :
                            ?>
                            <tr>
                                <th scope="row"><a href="#"><?php echo $no++ . '.'; ?></a></th>
                                <td><?php echo ucwords($new['branch_code']); ?></td>
                                <td class="fw-bold fst-italic"><?php echo $new['branch_name']; ?></td>
                                <td><?php echo $new['branch_location'] ?: '-'; ?></td>
                                <td><?php echo $new['branch_pic']; ?></td>
                                <td><?php echo $new['branch_phone']; ?></td>
                                <td><?php echo $new['branch_email']; ?></td>
                                <td>

                                    <?php if ($new['status'] == 'active') {
                                            echo '<span class="badge bg-success">Active</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Deactive</span>';
                                        }; ?>
                                </td>
                                <td class="text-center">
                                    <h6 class="mb-0">
                                        <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="left" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/branch/branch_detail/' . $new['id']); ?>', '<?php echo 'Branch Detail'; ?>')">
                                            <i class="bi bi-info text-secondary"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/branch/branch_edit/' . $new['id']); ?>', '<?php echo 'Edit Branch'; ?>')">
                                            <i class="bi bi-pencil-square text-secondary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('settings/branch_form/delete/' . $new['id']); ?>"
                                            data-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#confirm" data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="bi bi-trash-fill text-secondary"></i>
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
        dom: 'lfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>