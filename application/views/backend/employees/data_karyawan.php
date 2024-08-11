<div class="row justify-content">
    <div class="col-xl-12 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Employee list</h6>
                <a href="javascript::void(0)" class="btn btn-sm btn-success shadow add" data-toggle="modal" data-target="#AddUser"><i class="fas fa-fw fa-plus"></i> Add</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive rounded view">
                    <table style="font-size: 11pt;" class="table table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Unit</th>
                                <th>Position</th>
                                <th>Employee Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
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
                                    <td><?php echo $guser['work_unit_id']; ?></td>
                                    <td><?php echo $guser['position_id']; ?></td>
                                    <td><?php echo $guser['employee_status_id']; ?></td>
                                    <td><?php echo $guser['start_time']; ?></td>
                                    <td><?php echo $guser['end_time']; ?></td>
                                    <td class="text-center"><?php echo $guser['is_active'] ? '<span class="badge badge-success-lighten">Active</span>' : '<span class="badge badge-danger-lighten">Not Active</span>'; ?></td>
                                    <td class="text-center edit">
                                        <div class="btn-group py-0" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm py-0 btn-info edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm py-0 btn-dark edit" data-toggle="tooltip" data-placement="top" title="Mark as not active"><i class="fas fa-fw fa-eye-slash"></i></button>
                                            <button type="button" class="btn btn-sm py-0 btn-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-fw fa-trash-alt"></i></button>
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