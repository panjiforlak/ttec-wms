<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Client list</h6>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-plus "></i> Add
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item add" onclick="ModalAddLarge('<?php echo site_url('modal/standartContent/clients/clients_header_add/'); ?>', '<?php echo 'Add clients header'; ?>')"> Client Header</a>
                        <a href="javascript:void(0);" class="dropdown-item add" onclick="ModalAddLarge('<?php echo site_url('modal/standartContent/clients/clients_add/'); ?>', '<?php echo 'Add new client'; ?>')">New Client</a>

                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive rounded">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped view" id="dataTabl" width="50%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Head Description</th>
                                <th>Status</th>
                                <th class="edit">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_clients_header->result_array() as $g_clih) :

                            ?>
                                <tr>
                                    <td><?php echo $no++ . '.'; ?></td>
                                    <td><?php echo $g_clih['desc_client']; ?></td>
                                    <td class="text-center"><?php if ($g_clih['status'] == 1) {
                                                                echo '<span class="badge badge-success-lighten">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger-lighten">Not Active</span>';
                                                            } ?></td>
                                    <td class="text-center edit">
                                        <div class="btn-group py-0" role="group" aria-label="Basic example">
                                            <a class="edit" href="javascript:void(0);" onclick="ModalEditLarge('<?php echo site_url('modal/standartContent/clients/clients_header_edit/' . $g_clih['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                                <button class="btn btn-sm py-0 btn-primary edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="javascript:void(0);" class="delete ml-1" data-href="<?php echo site_url('content/clients/delete_header/' . $g_clih['id']); ?>" data-toggle="modal" data-target="#confirm" data-backdrop="static" data-keyboard="false">
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
                <hr>
                <div class="table-responsive rounded">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped view" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="edit">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_clients->result_array() as $g_cli) :

                            ?>
                                <tr>
                                    <td><?php echo $no++ . '.'; ?></td>
                                    <td><?php echo $g_cli['client_name']; ?></td>
                                    <td class="text-center">
                                        <img class="img-thumbnail" src="<?php echo base_url('uploads/clients/thumbnails/' . $g_cli['client_image']); ?>" width="50">
                                    </td>
                                    <td><?php echo $g_cli['client_description']; ?></td>
                                    <td class="text-center"><?php if ($g_cli['status'] == 1) {
                                                                echo '<span class="badge badge-success-lighten">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger-lighten">Not Active</span>';
                                                            } ?></td>
                                    <td class="text-center edit">
                                        <div class="btn-group py-0" role="group" aria-label="Basic example">
                                            <a class="edit" href="javascript:void(0);" onclick="ModalEditLarge('<?php echo site_url('modal/standartContent/clients/clients_edit/' . $g_cli['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                                <button class="btn btn-sm py-0 btn-primary edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="javascript:void(0);" class="delete ml-1" data-href="<?php echo site_url('content/clients/delete/' . $g_cli['id']); ?>" data-toggle="modal" data-target="#confirm" data-backdrop="static" data-keyboard="false">
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