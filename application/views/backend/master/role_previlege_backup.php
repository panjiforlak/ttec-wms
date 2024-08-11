<div class="row justify-content-center">
    <div class="col-xl-9 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-info justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Previlege menu</h6>
                <a href="<?php echo site_url('master/role'); ?>" class="btn btn-sm btn-outline-secondary shadow"
                    data-toggle="tooltip" data-placement="top" title="Add role"><i class="fas fa-fw fa-arrow-left"></i>
                    Back to role list</a>
            </div>
            <!-- Card Body -->
            <form action="<?php echo site_url('master/previlege/add/' . $get_role['id']); ?>" method="POST">
                <div class="card-body">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold">ROLE :</span>
                        </div>
                        <input type="text" aria-label="First name"
                            class="form-control bg-white col-md-3 text-uppercase font-weight-bold"
                            value="<?php echo $get_role['role']; ?>" readonly>
                    </div>
                    <div class="table-responsive rounded">
                        <table style="font-size: 11pt;" class="table table-sm table-bordered table-hover " id="ataTable"
                            width="100%" cellspacing="0">
                            <thead class="bg-gradient-info text-white text-center">
                                <tr>
                                    <th>Menu</th>
                                    <th>View</th>
                                    <th>Create</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($get_menu->result_array() as $gmen) :
                                    $gra = $this->db->get_where('user_access_menu', array('menu_id' => $gmen['id'], 'role_id' => $get_role['id']))->row_array();
                                ?>
                                <input type="hidden" name="role_id" value="<?php echo $get_role['id']; ?>">
                                <tr>
                                    <!-- menu name -->
                                    <?php if ($gmen['menu_parent'] == 0) : ?>
                                    <td class="bg-light">
                                        <?php echo $gmen['id']; ?>
                                        <?php echo "<b>" . $no++ . ". <i class='" . $gmen['icon'] . " ml-3'></i> " . ucwords($gmen['menu_name']) . "</b>"; ?>
                                    </td>
                                    <?php else : ?>
                                    <td>
                                        <?php echo "<i class='ml-5'>- " . ucwords($gmen['menu_name']) . "</i>"; ?>
                                    </td>
                                    <?php endif; ?>
                                    <input type="hidden" name="menu[]" value="<?php echo $gmen['id']; ?>">
                                    <?php if ($gmen['id'] == $gra['menu_id']) : ?>
                                    <!-- jika menu = menu yg diuser access -->
                                    <?php if ($gmen['menu_parent'] == 0 && empty($gmen['url'])) : ?>
                                    <!-- VIEW -->
                                    <td class="text-center bg-light">
                                        <div class="form-check">
                                            <input type="checkbox" name="view_<?php echo $gra['menu_id']; ?>" value="1"
                                                <?php echo (!empty($gra['view'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <td colspan="3" class="bg-light"></td>

                                    <?php elseif ($gmen['menu_parent'] == 0) : ?>
                                    <!-- VIEW -->
                                    <td class="text-center bg-light">
                                        <div class="form-check">
                                            <input type="checkbox" name="view_<?php echo $gra['menu_id']; ?>" value="1"
                                                <?php echo (!empty($gra['view'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- CREATE -->
                                    <td class="text-center bg-light">
                                        <div class="form-check">
                                            <input type="checkbox" name="create_<?php echo $gra['menu_id']; ?>"
                                                value="1" <?php echo (!empty($gra['create'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- EDIT -->
                                    <td class="text-center bg-light">
                                        <div class="form-check">
                                            <input type="checkbox" name="edit_<?php echo $gra['menu_id']; ?>" value="1"
                                                <?php echo (!empty($gra['edit'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- DELETE -->
                                    <td class="text-center bg-light">
                                        <div class="form-check">
                                            <input type="checkbox" name="delete_<?php echo $gra['menu_id']; ?>"
                                                value="1" <?php echo (!empty($gra['delete'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>

                                    <?php else : ?>
                                    <!-- VIEW -->
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="view_<?php echo $gra['menu_id']; ?>" value="1"
                                                <?php echo (!empty($gra['view'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- CREATE -->
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="create_<?php echo $gra['menu_id']; ?>"
                                                value="1" <?php echo (!empty($gra['create'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- EDIT -->
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="edit_<?php echo $gra['menu_id']; ?>" value="1"
                                                <?php echo (!empty($gra['edit'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <!-- DELETE -->
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="delete_<?php echo $gra['menu_id']; ?>"
                                                value="1" <?php echo (!empty($gra['delete'])) ? "checked" : ""; ?> />
                                        </div>
                                    </td>
                                    <?php endif; ?>
                                    <!-- <input class="form-check-input" type="checkbox" value="1" name="view"> -->
                                    <?php else : ?>
                                    <!-- Jika menu tidak ada di user access -->
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="view_<?php echo $gmen['id']; ?>" value="1">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="create_<?php echo $gmen['id']; ?>" value="1">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="edit_<?php echo $gmen['id']; ?>" value="1">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="delete_<?php echo $gmen['id']; ?>" value="1">
                                        </div>
                                    </td>
                                    <?php endif; ?>


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-fw fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>