<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //menjaga agar controller ini tidak bisa di akses dengan url tanpa session/login
        is_logged_in();
    }
    // menu

    public function menu( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Menu Management';
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/menu';
        $data[ 'breadcrumb2' ] = 'Menu';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/menu/menu';
        $data[ 'get_menu' ] = $this->select->get_menu();
        $this->load->view( 'templates/index', $data );
    }

    public function menu_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_menu();
            redirect( site_url( 'settings/menu' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_menu( $param2 );
            redirect( site_url( 'settings/menu' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_menu( $param2 );
            redirect( site_url( 'settings/menu' ) );
        }
        $data[ 'title' ] = 'Add Menu';
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/menu';
        $data[ 'breadcrumb2' ] = 'Menu';
        $data[ 'breadcrumblink2' ] = 'settings/menu';
        $data[ 'breadcrumb3' ] = 'Form';
        $data[ 'breadcrumblink3' ] = 'Menu Management';
        $data[ 'page_name' ] = 'settings/menu/menu_add';
        $this->load->view( 'templates/index', $data );
    }

    // role

    public function role( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Role Management';
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/role';
        $data[ 'breadcrumb2' ] = 'Role';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/menu/menu_add';

        $data[ 'page_name' ] = 'settings/role/role';
        $data[ 'get_role' ] = $this->select->get_role();
        $this->load->view( 'templates/index', $data );
    }

    public function role_form( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_role();
            redirect( site_url( 'settings/role' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_role( $param2 );
            redirect( site_url( 'settings/role' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_role( $param2 );
            redirect( site_url( 'settings/role' ) );
        }

        $data[ 'title' ] = 'Role Management';
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/role';
        $data[ 'breadcrumb2' ] = 'Role';
        $data[ 'breadcrumblink2' ] = 'settings/role';
        $data[ 'breadcrumb3' ] = 'Form';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'page_name' ] = 'settings/role/role_add';
        $data[ 'get_role' ] = $this->select->get_role();
        $data[ 'get_role_parent' ] = $this->select->get_role();
        $data[ 'get_department' ] = $this->select->get_department();

        $this->load->view( 'templates/index', $data );
    }

    public function previlege( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_access( $param2 );
            redirect( site_url( 'settings/previlege_form/setting/' . $param2 ) );
        }
        $data[ 'title' ] = 'Role Management / Previlege';
        $data[ 'page_name' ] = 'settings/role_previlege';
        $data[ 'get_role_access' ] = $this->select->get_role_access();
        $this->load->view( 'templates/index', $data );
    }

    public function previlege_form( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'setting' ) {
            $data[ 'breadcrumb1' ] = 'Settings';
            $data[ 'breadcrumblink1' ] = 'settings/role';
            $data[ 'breadcrumb2' ] = 'Role';
            $data[ 'breadcrumblink2' ] = 'settings/role';
            $data[ 'breadcrumb3' ] = 'Privilege';
            $data[ 'breadcrumblink3' ] = '';

            $data[ 'title' ] = 'Privilege';
            $data[ 'page_name' ] = 'settings/role/role_previlege';
            $data[ 'get_menu' ] = $this->select->get_menu();
            $data[ 'get_submenu' ] = $this->select->get_submenu();
            $data[ 'get_role' ] = $this->select->get_role( $param2 )->row_array();
            $data[ 'get_role_access' ] = $this->select->get_role_access( $param2 );
            $this->load->view( 'templates/index', $data );
        }
    }
    // user

    public function user( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'edit' ) {
            $this->update->edit_user( $param2 );
            redirect( site_url( 'settings/user' ) );
        }
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/user';
        $data[ 'breadcrumb2' ] = 'User';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'title' ] = 'User Management';
        $data[ 'page_name' ] = 'settings/user/user';
        $data[ 'get_user' ] = $this->select->get_user();
        $this->load->view( 'templates/index', $data );
    }

    public function user_form_add( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $add = $this->insert->add_user();
            redirect( site_url( 'settings/user' ) );
        }
        $data[ 'title' ] = 'Add User';
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/user';
        $data[ 'breadcrumb2' ] = 'User';
        $data[ 'breadcrumblink2' ] = 'settings/user';
        $data[ 'breadcrumb3' ] = 'Form';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/user/user_add';
        $this->load->view( 'templates/index', $data );
    }

    // system

    public function system( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_system();
            redirect( site_url( 'settings/system' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_system( $param2 );
            redirect( site_url( 'settings/system' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_system( $param2 );
            redirect( site_url( 'settings/system' ) );
        }
        $data[ 'breadcrumb1' ] = 'Settings';
        $data[ 'breadcrumblink1' ] = 'settings/system';
        $data[ 'breadcrumb2' ] = 'System';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'title' ] = 'system';
        $data[ 'page_name' ] = 'settings/system/system';
        $data[ 'get_system' ] = $this->select->get_system();
        $this->load->view( 'templates/index', $data );
    }
    // branch

    public function branch( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Branch';
        $data[ 'breadcrumb1' ] = 'Branch';
        $data[ 'breadcrumblink1' ] = '';
        $data[ 'breadcrumb2' ] = '';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/branch/branch';
        $data[ 'get_branch' ] = $this->select->get_branch();
        $this->load->view( 'templates/index', $data );
    }

    public function branch_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_branch();
            redirect( site_url( 'settings/branch' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_branch( $param2 );
            redirect( site_url( 'settings/branch' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_branch( $param2 );
            redirect( site_url( 'settings/branch' ) );
        }
        $data[ 'title' ] = 'Add Branch';
        $data[ 'breadcrumb1' ] = 'Branch';
        $data[ 'breadcrumblink1' ] = 'settings/branch';
        $data[ 'breadcrumb2' ] = 'Add Branch';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/branch/branch_add';
        $this->load->view( 'templates/index', $data );
    }
    // departement

    public function work_unit( $param1 = '', $param2 = '' ) {
        $data[ 'title' ] = 'Department';
        $data[ 'breadcrumb1' ] = 'Department';
        $data[ 'breadcrumblink1' ] = '';
        $data[ 'breadcrumb2' ] = '';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/department/department';
        $data[ 'get_department' ] = $this->select->get_department();
        $this->load->view( 'templates/index', $data );
    }

    public function work_unit_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_work_unit();
            redirect( site_url( 'settings/work_unit' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_work_unit( $param2 );
            redirect( site_url( 'settings/work_unit' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_work_unit( $param2 );
            redirect( site_url( 'settings/work_unit' ) );
        }
        $data[ 'title' ] = 'Add Department';
        $data[ 'breadcrumb1' ] = 'Department';
        $data[ 'breadcrumblink1' ] = 'settings/work_unit';
        $data[ 'breadcrumb2' ] = 'Add Department';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'settings/department/department_add';
        $this->load->view( 'templates/index', $data );
    }

    public function ajx_dpt( $id = '' ) {
        $return = $this->select->getchain_department( $id );
        echo json_encode( $return );
    }

    public function ajx_pst( $id = '' ) {
        $return = $this->select->getchain_position( $id );
        echo json_encode( $return );
    }

}