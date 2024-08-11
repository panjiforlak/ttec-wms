<?php

function is_logged_in() {
    $ci = get_instance();
    // manipulasi struktur ci
    if ( !$ci->session->userdata( 'email' ) ) {
        redirect( 'auth' );
    } else {
        $role_id = $ci->session->userdata( 'role_id' );
        //1
        $menu1 = $ci->uri->segment( 1 );
        $menu2 = $ci->uri->segment( 2 );
        if ( !empty( $menu2 ) ) {
            $menu = $menu1 . '/' . $menu2;
        } else {
            $menu = $menu1;
        }

        $queryMenu = $ci->db->get_where( 'menus', [ 'url' => $menu ] )->row_array();
        if ( $queryMenu ) {
            $menu_id = $queryMenu[ 'id' ];
            $queryUAccess = $ci->db->get_where( 'roles_menu', array( 'role_id' => $role_id, 'menu_id' => $menu_id, 'access' => 1 ) );
        } else {
            $queryUAccess = $ci->db->get( 'roles_menu' );
        }
        //
        if ( $queryUAccess->num_rows() < 1 ) {
            redirect( 'auth/forbidden' );
        }
    }
}