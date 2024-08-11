<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                    <a href="<?php echo site_url(); ?>settings/user_form_add" class="btn btn-sm btn-outline-success add"
                        style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                    <!-- </a> -->
                </div>

                <div class="card-body">
                    <h5 class="card-title border-bottom">List User </h5>
                    <table class="table table-sm table-bordered table-striped datatabl " id="examples">
                        <thead class="table-warning">
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <!-- <th>Branch</th>
                                <th>Work Unit</th>
                                <th>Position</th> -->
                                <th>Role</th>
                                <th>Status</th>
                                <th class="edit">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_user->result_array() as $guser) : ?>
                            <tr>
                                <td><?php echo $no++ . '.'; ?></td>
                                <td><?php echo $guser['full_name']; ?></td>
                                <td><?php echo $guser['email']; ?></td>
                                <!-- <td><?php echo $guser['branch_name']; ?></td>
                                    <td><?php echo $guser['work_unit_name']; ?></td>
                                    <td><?php echo $guser['position_name']; ?></td> -->
                                <td><?php echo $guser['role_name']; ?></td>
                                <td class="text-center">
                                    <?php if ($guser['is_active'] == 1) {
                                            echo '<span class="badge bg-success">Active</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Deactive</span>';
                                        }; ?>
                                </td>
                                <td class="text-center edit">
                                    <h6 class="mb-0">
                                        <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/user/user_detail/' . $guser['id']); ?>', '<?php echo 'User Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-info"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/user/user_edit/' . $guser['id']); ?>', '<?php echo 'Edit User'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1" data-toggle="tooltip"
                                            data-bs-placement="top" title="Delete"
                                            data-href="<?php echo site_url('settings/user_form/delete/' . $guser['id']); ?>"
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
        dom: 'lfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>