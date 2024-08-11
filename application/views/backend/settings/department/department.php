<!-- <div class="row justify-content-center"> -->

<div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                    <a href="<?php echo site_url(); ?>settings/work_unit_form"
                        class="btn disabled btn-sm btn-outline-success add" style="font-size: 12px;margin-right:20px;">
                        <i class="bi bi-plus-lg"></i> Add
                    </a>
                    <!-- </a> -->
                </div>

                <div class="card-body">
                    <h5 class="card-title border-bottom">List Department </h5>
                    <table class="table table-sm table-bordered table-striped datatabl " id="examples">
                        <thead class="table-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Department Code</th>
                                <th scope="col">Branch </th>
                                <th scope="col">Department </th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_department->result_array() as $new) :
                                // $parent = $this->db->get_where('menus', ['id' => $new['menu_parent']])->row_array();
                            ?>
                            <tr>
                                <th scope="row"><a href="#"><?php echo $no++ . '.'; ?></a></th>
                                <td><?php echo ucwords($new['unit_code']); ?></td>
                                <td><?php echo $new['branch_name']; ?></td>
                                <td class="fw-bold fst-italic"><?php echo $new['unit_name'] ?: '-'; ?></td>
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
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/department/department_detail/' . $new['id']); ?>', '<?php echo 'Department Detail'; ?>')">
                                            <i class="bi bi-info-square-fill text-dark"></i>
                                        </a>
                                        <a class="edit" href="javascript:void(0);" data-toggle="tooltip"
                                            data-bs-placement="top" title="Update"
                                            onclick="ModalEdit('<?php echo site_url('modal/standartSettings/department/department_edit/' . $new['id']); ?>', '<?php echo 'Edit Department'; ?>')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('settings/work_unit_form/delete/' . $new['id']); ?>"
                                            data-toggle="tooltip" data-bs-placement="top" title="Delete"
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