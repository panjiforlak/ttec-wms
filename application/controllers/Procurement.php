<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Procurement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //menjaga agar controller ini tidak bisa di akses dengan url tanpa session/login
        is_logged_in();
    }
    // menu

    public function purchase_order( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Purchase Order';
        $data[ 'breadcrumb1' ] = 'Procurement';
        $data[ 'breadcrumblink1' ] = 'procurement/purchase_order';
        $data[ 'breadcrumb2' ] = 'Purchase Order';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'procurement/purchase_order';
        $data[ 'title_page' ] = 'List Purchase Order';
        // $data[ 'get_menu' ] = $this->select->get_menu();
        $data[ 'get_po' ] = $this->select->get_po();
        $this->load->view( 'templates/index', $data );
    }

    public function purchase_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_purchase();
            redirect( site_url( 'procurement/purchase_order' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_purchase( $param2 );
            redirect( site_url( 'procurement/purchase_order' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_purchase( $param2 );
            redirect( site_url( 'procurement/purchase_order' ) );
        }
        $data[ 'title' ] = 'Add Purchase';
        $data[ 'breadcrumb1' ] = 'Procurement';
        $data[ 'breadcrumblink1' ] = 'procurement/purchase_order';
        $data[ 'breadcrumb2' ] = 'Purchase Order';
        $data[ 'breadcrumblink2' ] = 'procurement/purchase_order';
        $data[ 'breadcrumb3' ] = 'Add';
        $data[ 'breadcrumblink3' ] = 'Menu Management';
        $data[ 'get_product_unit' ] = $this->select->get_product_unit();
        $data[ 'get_product' ] = $this->select->get_product();
        $data[ 'page_name' ] = 'procurement/purchase_add';
        $this->load->view( 'templates/index', $data );
    }

    public function purchase_detail( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Detail Purchase';
        $data[ 'breadcrumb1' ] = 'Procurement';
        $data[ 'breadcrumblink1' ] = 'procurement/purchase_order';
        $data[ 'breadcrumb2' ] = 'Purchase Order';
        $data[ 'breadcrumblink2' ] = 'procurement/purchase_order';
        $data[ 'breadcrumb3' ] = 'Detail';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'get_purchase_detail' ] = $this->select->get_purchase_detail( $param1 );
        $data[ 'page_name' ] = 'procurement/purchase_detail';
        $data[ 'get_po_no' ] = $param1;
        $this->load->view( 'templates/index', $data );
    }

    // ajax

    public function get_product_unit() {
        $id = $this->input->post( 'id' );
        $data = $this->select->get_ajx_product_unit( $id )->result();

        echo json_encode( $data );
    }

    public function get_product() {
        $id = $this->input->post( 'id' );
        $data = $this->select->get_product( $id )->row();
        echo json_encode( $data->part_no );
    }

    // role

    public function role( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Role Management';
        $data[ 'breadcrumb1' ] = 'Role Management';
        $data[ 'breadcrumblink1' ] = 'master/role';
        $data[ 'breadcrumb2' ] = '';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/menu/menu_add';

        $data[ 'page_name' ] = 'master/role/role';
        $data[ 'get_role' ] = $this->select->get_role();
        $this->load->view( 'templates/index', $data );
    }

    public function role_form( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_role();
            redirect( site_url( 'master/role' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_role( $param2 );
            redirect( site_url( 'master/role' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_role( $param2 );
            redirect( site_url( 'master/role' ) );
        }

        $data[ 'title' ] = 'Role Management';
        $data[ 'breadcrumb1' ] = 'Role Management';
        $data[ 'breadcrumblink1' ] = 'master/role';
        $data[ 'breadcrumb2' ] = 'Role Add';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'page_name' ] = 'master/role/role_add';
        $data[ 'get_role' ] = $this->select->get_role();
        $data[ 'get_role_parent' ] = $this->select->get_role();
        $data[ 'get_department' ] = $this->select->get_department();

        $this->load->view( 'templates/index', $data );
    }

    public function previlege( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_access( $param2 );
            redirect( site_url( 'master/previlege_form/setting/' . $param2 ) );
        }
        $data[ 'title' ] = 'Role Management / Previlege';
        $data[ 'page_name' ] = 'master/role_previlege';
        $data[ 'get_role_access' ] = $this->select->get_role_access();
        $this->load->view( 'templates/index', $data );
    }

    public function previlege_form( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'setting' ) {
            $data[ 'breadcrumb1' ] = 'Role Management';
            $data[ 'breadcrumblink1' ] = 'master/role';
            $data[ 'breadcrumb2' ] = 'Access Menu';
            $data[ 'breadcrumblink2' ] = '';
            $data[ 'breadcrumb3' ] = '';
            $data[ 'breadcrumblink3' ] = '';

            $data[ 'title' ] = 'Privilege';
            $data[ 'page_name' ] = 'master/role/role_previlege';
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
            redirect( site_url( 'master/user' ) );
        }
        $data[ 'breadcrumb1' ] = 'User Management';
        $data[ 'breadcrumblink1' ] = 'master/user';
        $data[ 'breadcrumb2' ] = '';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'title' ] = 'User Management';
        $data[ 'page_name' ] = 'master/user/user';
        $data[ 'get_user' ] = $this->select->get_user();
        $this->load->view( 'templates/index', $data );
    }

    public function user_form_add( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $add = $this->insert->add_user();
            redirect( site_url( 'master/user' ) );
        }
        $data[ 'title' ] = 'Add User';
        $data[ 'breadcrumb1' ] = 'User Management';
        $data[ 'breadcrumblink1' ] = 'master/user';
        $data[ 'breadcrumb2' ] = 'Add User';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/user/user_add';
        $this->load->view( 'templates/index', $data );
    }

    // new

    public function system( $param1 = '', $param2 = '' ) {
        if ( $param1 == 'add' ) {
            $this->insert->add_system();
            redirect( site_url( 'master/system' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_system( $param2 );
            redirect( site_url( 'master/system' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_system( $param2 );
            redirect( site_url( 'master/system' ) );
        }
        $data[ 'breadcrumb1' ] = 'Role Management';
        $data[ 'breadcrumblink1' ] = 'master/role';
        $data[ 'breadcrumb2' ] = 'Privilege';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';

        $data[ 'title' ] = 'system';
        $data[ 'page_name' ] = 'master/system/system';
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
        $data[ 'page_name' ] = 'master/branch/branch';
        $data[ 'get_branch' ] = $this->select->get_branch();
        $this->load->view( 'templates/index', $data );
    }

    public function branch_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_branch();
            redirect( site_url( 'master/branch' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_branch( $param2 );
            redirect( site_url( 'master/branch' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_branch( $param2 );
            redirect( site_url( 'master/branch' ) );
        }
        $data[ 'title' ] = 'Add Branch';
        $data[ 'breadcrumb1' ] = 'Branch';
        $data[ 'breadcrumblink1' ] = 'master/branch';
        $data[ 'breadcrumb2' ] = 'Add Branch';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/branch/branch_add';
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
        $data[ 'page_name' ] = 'master/department/department';
        $data[ 'get_department' ] = $this->select->get_department();
        $this->load->view( 'templates/index', $data );
    }

    public function work_unit_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_work_unit();
            redirect( site_url( 'master/work_unit' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_work_unit( $param2 );
            redirect( site_url( 'master/work_unit' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_work_unit( $param2 );
            redirect( site_url( 'master/work_unit' ) );
        }
        $data[ 'title' ] = 'Add Department';
        $data[ 'breadcrumb1' ] = 'Department';
        $data[ 'breadcrumblink1' ] = 'master/work_unit';
        $data[ 'breadcrumb2' ] = 'Add Department';
        $data[ 'breadcrumblink2' ] = '';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/department/department_add';
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