<?php
$role_id = $this->session->userdata( 'role_id' );

$this->db->order_by( 'id', 'asc' );
$this->db->where( 'role_id', $role_id );
$this->db->where( 'is_active !=', 0 );
$this->db->where( 'access', 1 );
$this->db->join( 'user_access_menu', 'user_access_menu.menu_id=menus.id' );
$queryMenu = $this->db->get( 'menus' );

$menu = $queryMenu->result_array();

foreach ( $menu as $row ) {
    $jumlah_karakter = strlen( base_url() );
    $sub = substr( current_url(), $jumlah_karakter );
    if ( $row[ 'url' ] == $sub ) {
        if ( $row[ 'create' ] == 0 ) {
            echo '<style>.add { display:none;}</style>';
        }

        if ( $row[ 'view' ] == 0 ) {
            echo '<style>.view { display:none;}</style>';
        }

        if ( $row[ 'edit' ] == 0 ) {
            echo '<style>.edit { display:none;}</style>';
        }

        if ( $row[ 'delete' ] == 0 ) {
            echo '<style>.delete { display:none;}</style>';
        }
    }
}
?>
<!-- Sidebar -->
<ul class='navbar-nav bg-gradient-primary sidebar sidebar-light border-right border-grey shadow-lg accordion '
    id='accordionSidebar'>

    <!-- Sidebar - Brand -->
    <?php
$get_users = $this->db->get_where( 'users', array( 'role_id' => $this->session->userdata( 'role_id' ) ) )->row_array();
// $get_branch = $this->select_model->get_branch( $get_users[ 'branch_id' ] )->row_array();
?>

    <!-- Divider -->
    <li class='nav-item bg-light border-bottom border-info bg-gradient-white py-2 shadow-sm'>
        <a class='nav-link m-0 py-1 text-dark' href=''>
            <i class='fas fa-fw fa-user text-dark'></i>
            <span class='text-capitalize font-weight-bold'><?php echo $this->session->userdata( 'full_name' );
?>
            </span>
        </a><a class='nav-link m-0 py-1 text-dark' href=''>
            <i class='fas fa-fw fa-university text-dark'></i>
            <span class='text-capitalize font-weight-bold'><?php echo $get_users[ 'role_id' ] == 1 ? 'Super Admin' : 'Admin CMS';
?>
            </span>
        </a>
    </li>
    <!-- <hr class = 'sidebar-divider my-0'> -->

    <!-- Divider -->

    <!-- Menu  -->
    <?php foreach ( $menu as $m_satuan ) : ?>
    <?php if ( $this->uri->segment( 1 ) == $m_satuan[ 'menu_name' ] ) {
    $act = 'active';
    $aria = '';
    $tog = 'show';
} else {
    $act = '';
    $aria = 'collapsed';
    $tog = '';
}
;
?>

    <!-- none submenu / Dashboard -->
    <?php if ( $m_satuan[ 'id' ] == 1 ) : ?>
    <li class="nav-item <?php echo $act; ?>">
        <a class='nav-link ' href="<?php echo site_url($m_satuan['url']); ?>">
            <i class="fa-fw <?php echo $m_satuan['icon']; ?> text-white"></i>
            <span class='text-capitalize text-warning'><?php echo $m_satuan[ 'menu_name' ];
?>
            </span>
        </a>
    </li>
    <hr class='sidebar-divider mb-0'>
    <?php else : ?>
    <?php if ( $m_satuan[ 'is_parent' ] == 1 ) : ?>
    <li class="nav-item <?php echo $act; ?> mb-2">
        <a class="nav-link <?php echo $aria; ?> py-2" href='javascript:void(0);' data-toggle='collapse'
            data-target="#collapse<?php echo $m_satuan['id']; ?>" aria-expanded='true'
            aria-controls="collapse<?php echo $m_satuan['id']; ?>">

            <i class="fa-fw <?php echo $m_satuan['icon']; ?> text-white"></i>
            <span class='text-capitalize text-white'><?php echo $m_satuan[ 'menu_name' ];
?></span>
        </a>

        <div id="collapse<?php echo $m_satuan['id']; ?>" class="collapse <?php echo $tog; ?>"
            aria-labelledby="heading<?php echo $m_satuan['id']; ?>" data-parent='#accordionSidebar'>
            <div class='bg-white py-2 collapse-inner rounded mb-0'>
                <?php foreach ( $menu as $m_coll ) : ?>
                <?php if ( $m_coll[ 'menu_parent' ] == $m_satuan[ 'id' ] ) : ?>
                <?php if ( $this->uri->segment( 1 ) . '/' . $this->uri->segment( 2 ) == $m_coll[ 'url' ] ) : ?>
                <a class='collapse-item text-primary font-weight-bold bg-gray-200 py-2'
                    href="<?php echo site_url($m_coll['url']); ?>"><i
                        class='fas fa-fw fa-check-square text-primary'></i> <?php echo ucwords( $m_coll[ 'menu_name' ] );
?></a>
                <?php else : ?>

                <a class='collapse-item text-secondary font-weight-bold  py-2'
                    href="<?php echo site_url($m_coll['url']); ?>"><i
                        class='fas fa-fw fa-minus-square text-gray-400'></i> <?php echo ucwords( $m_coll[ 'menu_name' ] );
?></a>
                <?php endif;
?>

                <?php endif;
?>
                <?php endforeach;
?>
            </div>
        </div>
    </li>
    <?php elseif ( $m_satuan[ 'menu_parent' ] == 0 ) : ?>
    <li class="nav-item <?php echo $act; ?>">
        <a class='nav-link py-2' href="<?php echo site_url($m_satuan['url']); ?>">
            <i class="fas fa-fw <?php echo $m_satuan['icon']; ?>"></i>
            <span class='text-capitalize'><?php echo $m_satuan[ 'menu_name' ];
?></span>
        </a>
    </li>
    <?php endif;
?>
    <?php endif;
?>
    <?php endforeach;
?>
    <!-- End menu -->

    <!-- <li class = 'nav-item'>
<a class = 'nav-link collapsed' href = '#' data-toggle = 'collapse' data-target = '#collapseUtilities' aria-expanded = 'true' aria-controls = 'collapseUtilities'>
<i class = 'fas fa-fw fa-wrench'></i>
<span>Utilities</span>
</a>
<div id = 'collapseUtilities' class = 'collapse' aria-labelledby = 'headingUtilities' data-parent = '#accordionSidebar'>
<div class = 'bg-white py-2 collapse-inner rounded'>
<h6 class = 'collapse-header'>Custom Utilities:</h6>
<a class = 'collapse-item' href = 'utilities-color.html'>Colors</a>
<a class = 'collapse-item' href = 'utilities-border.html'>Borders</a>
<a class = 'collapse-item' href = 'utilities-animation.html'>Animations</a>
<a class = 'collapse-item' href = 'utilities-other.html'>Other</a>
</div>
</div>
</li> -->

    <!-- Divider -->
    <hr class='sidebar-divider d-none d-md-block'>

    <!-- Sidebar Toggler ( Sidebar ) -->
    <div class='text-center d-none d-md-inline'>
        <button class='rounded-circle border-0 shadow-sm' id='sidebarToggle'></button>
    </div>

</ul>
<!-- End of Sidebar -->