<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Delete_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->output->set_header( 'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0' );
        $this->output->set_header( 'Pragma: no-cache' );
        date_default_timezone_set( 'Asia/Jakarta' );
    }

    public function del_menu( $param1 = '' ) {
        $data = [
            'is_delete' => 1
        ];

        $this->db->where( 'id', $param1 );
        $this->db->update( 'menus', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the menu.' );
    }

    // CONTENT

    public function del_introduce( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'introduce', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the introduce.' );
    }

    public function del_aboutus( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'about_us', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the about us.' );
    }

    public function del_clients( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'clients', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the client.' );
    }

    public function del_clients_header( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'client_head', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the client head.' );
    }

    public function del_partners( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'partners', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the partners.' );
    }

    public function del_social( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'social_information', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the social media.' );
    }

    public function del_system( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'system', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the system.' );
    }

    public function del_team( $id = '' ) {
        $data = [
            'update_by' => $this->session->userdata( 'id_user' ),
            'delete_date' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'team', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the team.' );
    }

    public function del_branch( $id = '' ) {
        $data = [
            'updated_by' => $this->session->userdata( 'email' ),
            'deleted_at' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'branch', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the branch.' );
    }

    public function del_role( $id = '' ) {

        $this->db->where( 'id', $id );
        $this->db->delete( 'roles' );

        $this->session->set_flashdata( 'success', ' Successfully delete the role.' );
    }

    public function del_work_unit( $id = '' ) {
        $data = [
            'updated_by' => $this->session->userdata( 'email' ),
            'deleted_at' => date( 'Y-m-d H:i:s' )
        ];

        $this->db->where( 'id', $id );
        $this->db->update( 'work_unit', $data );

        $this->session->set_flashdata( 'success', ' Successfully delete the department.' );
    }

    public function del_supplier( $id = '' ) {
        $this->db->where( 'id', $id );
        $this->db->delete( 'suppliers' );

        $this->session->set_flashdata( 'success', ' Successfully delete the suppliers.' );
    }

    public function del_product( $id = '' ) {
        $this->db->where( 'id', $id );
        $this->db->delete( 'products' );

        $this->session->set_flashdata( 'success', ' Successfully delete the product.' );
    }

    public function del_purchase( $id = '' ) {
        $this->db->where( 'po_id', $id );
        $this->db->delete( 'purchase_details' );

        $this->db->where( 'id', $id );
        $this->db->delete( 'purchase_order' );

        $this->session->set_flashdata( 'success', ' Successfully delete the purchase.' );
    }
}