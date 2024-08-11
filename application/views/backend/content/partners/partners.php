<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Partner list</h6>
                <div class="btn-group">

                    <a href="javascript:void(0);" class="btn btn-sm btn-success shadow add" onclick="ModalAddLarge('<?php echo site_url('modal/standartContent/partners/partners_add/'); ?>', '<?php echo 'Add new partners'; ?>')"><i class="fas fa-fw fa-plus "></i> Add</a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive rounded">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped view" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="edit">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_partners->result_array() as $g_par) :

                            ?>
                                <tr>
                                    <td><?php echo $no++ . '.'; ?></td>
                                    <td><?php echo $g_par['partner_name']; ?></td>
                                    <td class="text-center">
                                        <img class="img-thumbnail" src="<?php echo base_url('uploads/partner/thumbnails/' . $g_par['image_partner']); ?>" width="50">
                                    </td>

                                    <td class="text-center"><?php if ($g_par['status'] == 1) {
                                                                echo '<span class="badge badge-success-lighten">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger-lighten">Not Active</span>';
                                                            } ?></td>
                                    <td class="text-center edit">
                                        <div class="btn-group py-0" role="group" aria-label="Basic example">
                                            <a class="edit" href="javascript:void(0);" onclick="ModalEditLarge('<?php echo site_url('modal/standartContent/partners/partners_edit/' . $g_par['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                                <button class="btn btn-sm py-0 btn-primary edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="javascript:void(0);" class="delete ml-1" data-href="<?php echo site_url('content/partners/delete/' . $g_par['id']); ?>" data-toggle="modal" data-target="#confirm" data-backdrop="static" data-keyboard="false">
                                                <button class="btn btn-sm py-0  btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fas fa-fw fa-trash-alt"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- For delete -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#confirm').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    })
</script>