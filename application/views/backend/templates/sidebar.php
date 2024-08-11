<!-- ======= Header ======= -->
<?php
$role_id = $this->session->userdata('role_id');
$this->db->select( 'menus.*,menus.id as idm,roles_menu.*' );
$this->db->order_by('menus.id', 'asc');
$this->db->where('role_id', $role_id);
$this->db->where('is_active !=', 0);
$this->db->where('access', 1);
$this->db->where('menus.is_delete', 0);
$this->db->join('roles_menu', 'roles_menu.menu_id=menus.id');
$queryMenu = $this->db->get('menus');

$menu = $queryMenu->result_array();

foreach ($menu as $row) {
    $jumlah_karakter = strlen(base_url());
    $sub = substr(current_url(), $jumlah_karakter);
    if ($row['url'] == $sub) {
        if ($row['create'] == 0) {
            echo '<style>.add { display:none;}</style>';
        }

        if ($row['read'] == 0) {
            echo '<style>.view { display:none;}</style>';
        }

        if ($row['update'] == 0) {
            echo '<style>.edit { display:none;}</style>';
        }

        if ($row['delete'] == 0) {
            echo '<style>.delete { display:none;}</style>';
        }
    }
}
?>
<!--  -->
<header id="header" class="header fixed-top d-flex align-items-center bg-dark">

    <div class="d-flex align-items-center justify-content-between ">
        <a href="<?php echo site_url();?>dashboard" class="logo d-flex align-items-center">
            <!-- <img src="<?php echo site_url('assets'); ?>/img/ttec-logo.jpg" alt=""> -->
            <span class="d-none d-lg-block text-white " style="font-size:10pt">WMS - Tokai Exssssstrusion
                <sup class="text-warning"></sup></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class=" search-bar">
        <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form> -->
        <span class="text-info"><?php echo $title; ?></span>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <!-- toast -->
        <div class="sticky-top mt-2mr-0" style="position: absolute; top: 0; right: 0;">
            <?php if (validation_errors()) : ?>
            <?php echo validation_errors('
                <div class="toast shadow m-2 " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header  bg-danger">
                        <i class="fas fa-bell text-white mr-2 " style="font-size:18px;"></i>
                        <strong class="mr-auto text-white">Notification</strong>
                        <small class="text-muted"></small>
                        <button type="button" class="ml-2 mb-1 btn-close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body bg-light">', '</div>
                    </div>'); ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')) : ?>
            <div class="toast align-items-center text-bg-success border-0 " style="margin-top: 43px;margin-right:30px;"
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body pt-2 pb-2 " style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> <?php echo $this->session->flashdata('success');
                                                                    $this->session->mark_as_temp('success'); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')) : ?>
            <div class="toast align-items-center text-bg-danger border-0 " style="margin-top: 43px;margin-right:30px"
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body pt-2 pb-2 " style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> <?php echo $this->session->flashdata('error');
                                                                    $this->session->mark_as_temp('error'); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>


            <?php endif; ?>
        </div>
        <!-- end toast -->
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-danger badge-number">4</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-4 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <!-- <i class="bi bi-check-circle text-success"></i> -->
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <!-- <i class="bi bi-info-circle text-primary"></i> -->
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li>


            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php echo site_url('assets'); ?>/img/profile-img.jpg" alt="Profile"
                        class="rounded-circle">
                    <span
                        class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('full_name'); ?></span>
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $this->session->userdata('full_name'); ?></h6>
                        <span><?php echo $this->session->userdata('role_name'); ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center bg-danger"
                            href="<?php echo site_url('/auth/logout');?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php foreach ($menu as $m_satuan) : ?>
        <?php if ($this->uri->segment(1) == $m_satuan['menu_name']) {
                $act = 'active';
                $aria = '';
                $tog = 'show';
            } else {
                $act = '';
                $aria = 'collapsed';
                $tog = '';
            };
            ?>
        <?php if ($m_satuan['id'] == 1 && $m_satuan['idm'] == 1 && $m_satuan['menu_name'] == 'dashboard') : ?>

        <li class="nav-item <?php echo $act; ?>">
            <a class="nav-link <?php echo $aria; ?>" href="<?php echo site_url($m_satuan['url']); ?>">
                <i class="<?php echo $m_satuan['icon']; ?>"></i>
                <span class="text-capitalize"><?php echo $m_satuan['menu_name']; ?></span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php else : ?>
        <?php if ($m_satuan['menu_name'] !== 'master' && $m_satuan['menu_name'] !== 'settings' && $m_satuan['is_parent'] == 1) : ?>
        <li class="nav-item <?php echo $act; ?>">
            <a class="nav-link  <?php echo $aria; ?>" data-bs-target="#components-nav<?php echo $m_satuan['idm']; ?>"
                data-bs-toggle="collapse" href="#">
                <i class="<?php echo $m_satuan['icon']; ?>"></i><span
                    class="text-capitalize"><?php echo $m_satuan['menu_name']; ?></span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav<?php echo $m_satuan['idm']; ?>"
                class="nav-content collapse <?php echo $tog; ?> sidenav-menu-nested" data-bs-parent="#sidebar-nav">
                <li>
                    <?php foreach ($menu as $m_coll) : ?>
                    <?php if ($m_coll['menu_parent'] == $m_satuan['idm']) : ?>
                    <?php if ($breadcrumblink1) : ?>
                    <?php if ($breadcrumblink1 == $m_coll['url']) : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_coll['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_coll['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php else : ?>
                    <?php if ($this->uri->segment(1) . '/' . $this->uri->segment(2) == $m_coll['url']) : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_coll['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_coll['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </li>

            </ul>
        </li><!-- End Components Nav -->
        <?php elseif ($m_satuan['menu_parent'] == 0 && $m_satuan['menu_name'] !== 'master' && $m_satuan['menu_name'] !== 'settings') : ?>
        <li class="nav-item <?php echo $act; ?>">
            <a class="nav-link " href="<?php echo site_url($m_satuan['url']); ?>">
                <i class="bi bi-graph-up-arrow"></i>
                <span class="text-capitalize"><?php echo $m_satuan['menu_name']; ?></span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php endif; ?>

        <?php endif; ?>
        <?php endforeach; ?>

        <li class="nav-heading">
            <hr>
            Utilities
        </li>
        <?php foreach ($menu as $m_satuan) : ?>
        <?php if ($this->uri->segment(1) == $m_satuan['menu_name']) {
                $act = 'active';
                $aria = '';
                $tog = 'show';
            } else {
                $act = '';
                $aria = 'collapsed';
                $tog = '';
            };
            ?>
        <?php if ($m_satuan['menu_name'] == 'master' ) : ?>

        <li class="nav-item <?php echo $act; ?>">
            <a class="nav-link  <?php echo $aria; ?>" data-bs-target="#components-nav<?php echo $m_satuan['idm']; ?>"
                data-bs-toggle="collapse" href="#">
                <i class="<?php echo $m_satuan['icon']; ?>"></i><span
                    class="text-capitalize"><?php echo $m_satuan['menu_name']; ?></span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav<?php echo $m_satuan['idm']; ?>"
                class="nav-content collapse <?php echo $tog; ?> sidenav-menu-nested" data-bs-parent="#sidebar-nav">
                <li>
                    <?php foreach ($menu as $m_coll) : ?>
                    <?php if ($m_coll['menu_parent'] == $m_satuan['idm']) : ?>
                    <?php if ($breadcrumblink1) : ?>
                    <?php if ($breadcrumblink1 == $m_coll['url']) : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_coll['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_coll['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php else : ?>
                    <?php if ($this->uri->segment(1) . '/' . $this->uri->segment(2) == $m_coll['url']) : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_coll['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_coll['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_coll['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </li>

            </ul>
        </li><!-- End Components Nav -->
        <?php endif; ?>
        <?php if ($m_satuan['menu_name'] == 'settings') : ?>

        <li class="nav-item <?php echo $act; ?>">
            <a class="nav-link  <?php echo $aria; ?>" data-bs-target="#components-nav<?php echo $m_satuan['idm']; ?>"
                data-bs-toggle="collapse" href="#">
                <i class="<?php echo $m_satuan['icon']; ?>"></i><span
                    class="text-capitalize"><?php echo $m_satuan['menu_name']; ?></span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav<?php echo $m_satuan['idm']; ?>"
                class="nav-content collapse <?php echo $tog; ?> sidenav-menu-nested" data-bs-parent="#sidebar-nav">
                <li>
                    <?php foreach ($menu as $m_colls) : ?>
                    <?php if ($m_colls['menu_parent'] == $m_satuan['idm']) : ?>
                    <?php if ($breadcrumblink1) : ?>
                    <?php if ($breadcrumblink1 == $m_colls['url']) : ?>
                    <a href="<?php echo site_url($m_colls['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_colls['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_colls['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_colls['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php else : ?>
                    <?php if ($this->uri->segment(1) . '/' . $this->uri->segment(2) == $m_colls['url']) : ?>
                    <a href="<?php echo site_url($m_colls['url']); ?>">
                        <i class="bi bi-circle-fill"></i><span
                            class="text-capitalize "><b><?php echo $m_colls['menu_name']; ?></b></span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo site_url($m_colls['url']); ?>">
                        <i class="bi bi-circle"></i><span
                            class="text-capitalize"><?php echo $m_colls['menu_name']; ?></span>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </li>

            </ul>
        </li><!-- End Components Nav -->
        <?php endif; ?>
        <?php endforeach; ?>
        <li class="nav-heading divider">
            <hr>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item text-danger">
            <a class="nav-link collapsed bg-danger" href="<?php echo site_url('/auth/logout');?>">
                <i class="bi bi-box-arrow-in-right text-white"></i>
                <span class="text-white">Sign Out</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door-fill text-danger"></i></li>
                <?php if ($breadcrumb2 && empty($breadcrumb3)) : ?>
                <li class="breadcrumb-item"><a
                        href="<?php echo site_url() . '' . $breadcrumblink1; ?>"><?php echo $breadcrumb1; ?></a></li>
                <li class="breadcrumb-item active"><?php echo $breadcrumb2; ?></li>
                <?php elseif($breadcrumb2 && $breadcrumb3) : ?>
                <li class="breadcrumb-item"><a
                        href="<?php echo site_url() . '' . $breadcrumblink1; ?>"><?php echo $breadcrumb1; ?></a></li>
                <li class="breadcrumb-item "><a
                        href="<?php echo site_url() . '' . $breadcrumblink2; ?>"><?php echo $breadcrumb2; ?></a></li>
                <li class="breadcrumb-item active"><?php echo $breadcrumb3; ?></li>
                <?php else :?>
                <li class="breadcrumb-item active"><?php echo $breadcrumb1; ?></li>
                <?php endif; ?>
            </ol>

        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">