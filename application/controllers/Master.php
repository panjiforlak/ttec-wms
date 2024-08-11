<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //menjaga agar controller ini tidak bisa di akses dengan url tanpa session/login
        is_logged_in();
    }

    // supplier

    public function supplier( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Master Supplier';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/supplier';
        $data[ 'breadcrumb2' ] = 'Supplier';
        $data[ 'breadcrumblink2' ] = 'master/supplier';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/supplier/supplier';
        $data[ 'get_supplier' ] = $this->select->get_supplier();
        $this->load->view( 'templates/index', $data );
    }

    public function supplier_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_supplier();
            redirect( site_url( 'master/supplier' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_supplier( $param2 );
            redirect( site_url( 'master/supplier' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_supplier( $param2 );
            redirect( site_url( 'master/supplier' ) );
        }
        $data[ 'title' ] = 'Add Supplier';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/supplier';
        $data[ 'breadcrumb2' ] = 'Supplier';
        $data[ 'breadcrumblink2' ] = 'master/supplier';
        $data[ 'breadcrumb3' ] = 'Add';
        $data[ 'breadcrumblink3' ] = 'Supplier Management';
        $data[ 'page_name' ] = 'master/Supplier/Supplier_add';
        $this->load->view( 'templates/index', $data );
    }

    // unit

    public function unit( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Master Unit';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/unit';
        $data[ 'breadcrumb2' ] = 'Unit';
        $data[ 'breadcrumblink2' ] = 'master/unit';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/unit/unit';
        $data[ 'get_unit' ] = $this->select->get_unit();
        $this->load->view( 'templates/index', $data );
    }

    public function unit_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_unit();
            redirect( site_url( 'master/unit' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_unit( $param2 );
            redirect( site_url( 'master/unit' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_unit( $param2 );
            redirect( site_url( 'master/unit' ) );
        }
        $data[ 'title' ] = 'Add Unit';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/unit';
        $data[ 'breadcrumb2' ] = 'Unit';
        $data[ 'breadcrumblink2' ] = 'master/unit';
        $data[ 'breadcrumb3' ] = 'Add';
        $data[ 'breadcrumblink3' ] = 'Unit Management';
        $data[ 'page_name' ] = 'master/unit/unit_add';
        $this->load->view( 'templates/index', $data );
    }
    // product

    public function product( $param1 = '', $param2 = '' ) {

        $data[ 'title' ] = 'Master Product';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/product';
        $data[ 'breadcrumb2' ] = 'Product';
        $data[ 'breadcrumblink2' ] = 'master/product';
        $data[ 'breadcrumb3' ] = '';
        $data[ 'breadcrumblink3' ] = '';
        $data[ 'page_name' ] = 'master/product/product';
        $data[ 'get_product' ] = $this->select->get_product();
        $this->load->view( 'templates/index', $data );
    }

    public function product_form( $param1 = '', $param2 = '' ) {

        if ( $param1 == 'add' ) {
            $this->insert->add_product();
            redirect( site_url( 'master/product' ) );
        } elseif ( $param1 == 'edit' ) {
            $this->update->edit_product( $param2 );
            redirect( site_url( 'master/product' ) );
        } elseif ( $param1 == 'delete' ) {
            $this->delete->del_product( $param2 );
            redirect( site_url( 'master/product' ) );
        } elseif ( $param1 == 'config' ) {
            $this->insert->add_product_config( $param2 );
            redirect( site_url( 'master/product' ) );
        }
        $data[ 'title' ] = 'Add Product';
        $data[ 'breadcrumb1' ] = 'Master';
        $data[ 'breadcrumblink1' ] = 'master/Product';
        $data[ 'breadcrumb2' ] = 'Product';
        $data[ 'breadcrumblink2' ] = 'master/Product';
        $data[ 'breadcrumb3' ] = 'Add';
        $data[ 'breadcrumblink3' ] = 'Product Management';
        $data[ 'page_name' ] = 'master/Product/Product_add';
        $this->load->view( 'templates/index', $data );
    }
}