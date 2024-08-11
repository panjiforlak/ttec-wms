<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">System list</h6>
                <a href="javascript:void(0);" class="btn btn-sm btn-success shadow add"
                    onclick="ModalAdd('<?php echo site_url('modal/standart/system/system_add/'); ?>', '<?php echo 'Add System'; ?>')"><i
                        class="fas fa-fw fa-plus "></i> Add</a>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive rounded">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped view"
                        id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Company logo</th>
                                <th>Copyright</th>
                                <th>Talk to us</th>
                                <th class="edit">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($get_system->result_array() as $g_sys) :
                            ?>
                            <tr>
                                <td><?php echo $no++ . '.'; ?></td>
                                <td class="text-center">
                                    <img class="img-thumbnail"
                                        src="<?php echo base_url('uploads/system/' . $g_sys['company_logo']); ?>"
                                        width="50">
                                </td>
                                <td><?php echo $g_sys['copyright']; ?></td>
                                <td><?php echo $g_sys['desc_talk_to_us']; ?></td>
                                <td class="text-center edit">
                                    <div class="btn-group py-0" role="group" aria-label="Basic example">
                                        <a class="edit" href="javascript:void(0);"
                                            onclick="ModalEdit('<?php echo site_url('modal/standart/system/system_edit/' . $g_sys['id']); ?>', '<?php echo 'Edit System'; ?>')">
                                            <button class="btn btn-sm py-0 btn-primary edit" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="javascript:void(0);" class="delete ml-1"
                                            data-href="<?php echo site_url('settings/system/delete/' . $g_sys['id']); ?>"
                                            data-toggle="modal" data-target="#confirm" data-backdrop="static"
                                            data-keyboard="false">
                                            <button class="btn btn-sm py-0  btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete">
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