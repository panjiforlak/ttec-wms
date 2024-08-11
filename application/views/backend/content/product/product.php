<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Product list</h6>
                <a href="javascript:void(0);" class="btn btn-sm btn-success shadow add" onclick="ModalAddLarge('<?php echo site_url('modal/standartContent/product/product_add/'); ?>', '<?php echo 'Add new product'; ?>')"><i class="fas fa-fw fa-plus "></i> Add</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive rounded">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped view" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Thumbnail</th>
                                <th>Image Fullsize</th>
                                <th>Status</th>
                                <th class="edit">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_product->result_array() as $g_prd) :

                            ?>
                                <tr>
                                    <td><?php echo $no++ . '.'; ?></td>
                                    <td><?php echo $g_prd['product_name']; ?></td>
                                    <td><?php echo $g_prd['short_description']; ?></td>
                                    <td class="text-center">
                                        <img class="img-thumbnail" src="<?php echo base_url('uploads/product/thumbnails/' . $g_prd['image_thumbnail']); ?>" width="50">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-thumbnail" src="<?php echo base_url('uploads/product/images/' . $g_prd['image_large']); ?>" width="50">
                                    </td>
                                    <td class="text-center"><?php if ($g_prd['status'] == 1) {
                                                                echo '<span class="badge badge-success-lighten">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger-lighten">Not Active</span>';
                                                            } ?></td>
                                    <td class="text-center edit">
                                        <div class="btn-group py-0" role="group" aria-label="Basic example">
                                            <a class="edit" href="javascript:void(0);" onclick="ModalEditLarge('<?php echo site_url('modal/standartContent/product/product_edit/' . $g_prd['id']); ?>', '<?php echo 'Edit Product'; ?>')">
                                                <button class="btn btn-sm py-0 btn-primary edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="javascript:void(0);" class="delete ml-1" data-href="<?php echo site_url('content/product/delete/' . $g_prd['id']); ?>" data-toggle="modal" data-target="#confirm" data-backdrop="static" data-keyboard="false">
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