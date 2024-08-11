<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                    <!-- <a href="javascript:void(0);" class="add icon" onclick="ModalAdd('<?php echo site_url('modal/standart/menu/menu_add/'); ?>', '<?php echo 'Add Menu'; ?>')"> -->
                    <a href="<?php echo site_url(); ?>settings/role_form" class="btn btn-sm btn-outline-success add"
                        style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                    <!-- </a> -->
                </div>

                <div class="card-body">
                    <h5 class="card-title border-bottom">List Role </h5>
                    <table class="table table-sm table-bordered table-striped " id="examples">
                        <thead class="table-warning">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">(Report, Approval) Leader</th>
                                <th class="text-center">Access Menu</th>
                                <th class="text-center" class="edit">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            foreach ($get_role->result_array() as $grole) :
                                $get_role_parent = $this->select->get_role($grole['role_parent'])->row_array();
                            ?>
                            <tr>
                                <td><?php echo $no++ . '.'; ?></td>
                                <td class="fw-bold"><?php echo ucwords($grole['role_name']); ?></td>
                                <td class="text-muted">
                                    <?php echo $grole['role_parent'] == 0 ? '-' : ucwords($get_role_parent['role_name']); ?>
                                </td>
                                <td class="text-center">
                                    <a class="edit btn btn-sm btn-dark"
                                        href="<?php echo site_url('settings/previlege_form/setting/' . $grole['id']); ?>"
                                        data-toggle="tooltip" data-bs-placement="top" title="Access Menu">
                                        <i class="bi bi-unlock-fill text-white "></i> Privilege
                                    </a>
                                </td>
                                <td class="text-center">
                                    <h6 class="mb-0">
                                        <a class="view" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Info"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSetting/role/role_detail/' . $grole['id']); ?>', '<?php echo 'Role Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-info"></i>
                                        </a>

                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/role/role_edit/' . $grole['id']); ?>', '<?php echo 'Edit Role'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('settings/role_form/delete/' . $grole['id']); ?>"
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

    });
});
</script>