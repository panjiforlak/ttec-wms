<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Insert_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );
    }

    public function add_menu() {
        if ( empty( $this->input->post( 'menu_parent' ) ) && empty( $this->input->post( 'url' ) ) ) {
            $menu_parent =  $this->input->post( 'menu_parent' );
            $is_parent = 1;
        } else {
            $menu_parent =  $this->input->post( 'menu_parent' );
            $is_parent = 0;
        }

        if ( !empty( $this->input->post( 'url' ) ) ) {
            $url = $this->input->post( 'url' );
        } else {
            $url = null;
        }
        $data = [
            'menu_parent' => $menu_parent,
            'menu_name' => strtolower( $this->input->post( 'menu_name' ) ),
            'url' => $url,
            'icon' => $this->input->post( 'icon' ),
            'is_active' => $this->input->post( 'is_active' ),
            'is_parent' => $is_parent
        ];

        $this->db->insert( 'menus', $data );
        $this->session->set_flashdata( 'success', ' Successfully added the menu.' );
    }

    public function add_access( $role_id ) {
        $menu = $this->input->post( 'menu_name' );

        foreach ( $menu as $key => $m ) {
            $acc_menu = $this->db->get_where( 'roles_menu', array( 'role_id' => $role_id, 'menu_id' => $m ) )->row_array();
            if ( $m == $acc_menu[ 'menu_id' ] ) {
                // akses
                $access = $this->input->post( 'access_' . $m );
                if ( !empty( $access ) ) {
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'access', $access );
                    $this->db->update( 'roles_menu' );
                } else {
                    $access = 0;
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'access', $access );
                    $this->db->update( 'roles_menu' );
                }
                // view
                $view = $this->input->post( 'view_' . $m );
                if ( !empty( $view ) ) {
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'read', $view );
                    $this->db->update( 'roles_menu' );
                } else {
                    $view = 0;
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'read', $view );
                    $this->db->update( 'roles_menu' );
                }
                // create
                $create = $this->input->post( 'create_' . $m );
                if ( !empty( $create ) ) {
                    $this->db->where( 'role_id', $role_id );

                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'create', $create );
                    $this->db->update( 'roles_menu' );
                } else {
                    $create = 0;
                    $this->db->where( 'role_id', $role_id );

                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'create', $create );
                    $this->db->update( 'roles_menu' );
                }
                // edit
                $edit = $this->input->post( 'edit_' . $m );
                if ( !empty( $edit ) ) {
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'update', $edit );
                    $this->db->update( 'roles_menu' );
                } else {
                    $edit = 0;
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'update', $edit );
                    $this->db->update( 'roles_menu' );
                }
                // delete
                $delete = $this->input->post( 'delete_' . $m );
                if ( !empty( $delete ) ) {
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'delete', $delete );
                    $this->db->update( 'roles_menu' );
                } else {
                    $delete = 0;
                    $this->db->where( 'role_id', $role_id );
                    $this->db->where( 'menu_id', $m );
                    $this->db->set( 'delete', $delete );
                    $this->db->update( 'roles_menu' );
                }
            } else {
                // akses
                $access_non_menu = $this->input->post( 'access_' . $m );
                $view_non_menu = $this->input->post( 'view_' . $m );
                $create_non_menu = $this->input->post( 'create_' . $m );
                $edit_non_menu = $this->input->post( 'edit_' . $m );
                $delete_non_menu = $this->input->post( 'delete_' . $m );
                if ( !empty( $access_non_menu ) ) {
                    $access_non = $access_non_menu;
                } else {
                    $access_non = 0;
                }
                if ( !empty( $view_non_menu ) ) {
                    $view_non = $view_non_menu;
                } else {
                    $view_non = 0;
                }
                if ( !empty( $create_non_menu ) ) {
                    $create_non = $create_non_menu;
                } else {
                    $create_non = 0;
                }
                if ( !empty( $edit_non_menu ) ) {
                    $edit_non = $edit_non_menu;
                } else {
                    $edit_non = 0;
                }
                if ( !empty( $delete_non_menu ) ) {
                    $delete_non = $delete_non_menu;
                } else {
                    $delete_non = 0;
                }

                $data = [
                    'role_id' => $role_id,
                    'menu_id' => $m,
                    'access' => $access_non,
                    'read' => $view_non,
                    'create' => $create_non,
                    'update' => $edit_non,
                    'delete' => $delete_non
                ];
                $this->db->insert( 'roles_menu', $data );
            }
            $this->session->set_flashdata( 'success', ' Successfully update previlege.' );
        }
    }

    public function add_user() {
        $chk_duplicate = $this->db->get_where( 'users', array( 'email' => $this->input->post( 'email' ) ) );
        if ( $chk_duplicate->num_rows() > 0 ) {
            $this->session->set_flashdata( 'error', 'Email Already Register <br><b>' . $this->input->post( 'email' ) . '</b>' );
        } else {
            if ( $this->input->post( 'password2' ) == $this->input->post( 'password1' ) ) {
                $data = [
                    'role_id' => $this->input->post( 'role_id' ),
                    'full_name' => ucwords( htmlspecialchars( $this->input->post( 'full_name', true ) ) ),
                    'email' => strtolower( $this->input->post( 'email', true ) ),
                    'password' => password_hash( $this->input->post( 'password1' ), PASSWORD_DEFAULT ),
                    'branch_id' => $this->input->post( 'branch_id' ),
                    'work_unit_id' => $this->input->post( 'work_unit_id' ),
                    // 'position_id' => $this->input->post( 'position_id' ),
                    'is_active' => $this->input->post( 'is_active' ),
                    'create_by' => $this->session->userdata( 'id_user' ),
                    'create_date' => date( 'Y-m-d H:i:s' )
                ];

                // Photo
                if ( !file_exists( 'uploads/employee/photos' ) ) {
                    mkdir( 'uploads/employee/photos', 0755, true );
                }

                if ( $_FILES[ 'photo' ][ 'name' ] == '' ) {
                    $data[ 'photo' ] = 'product-thumbnail.png';
                } else {
                    $data[ 'photo' ] = $this->input->post( 'email' ) . '/' . md5( rand( 100, 200 ) ) . '.jpg';
                    move_uploaded_file( $_FILES[ 'photo' ][ 'tmp_name' ], 'uploads/employee/photos/' . $data[ 'photo' ] );
                }
                // echo '<pre>';
                // print_r( $data );
                // echo '</pre>';
                // die;
                $this->db->insert( 'users', $data );
                $this->session->set_flashdata( 'success', 'Registration Successful' );
            } else {
                $this->session->set_flashdata( 'error', "Password don't match" );
            }
        }

        // insert table yang berurutan fieldnya diatas
        // alert flashdata dibawah ini dikirim ke file login
    }

    // CONTENT

    public function add_introduce() {
        // path image adding
        if ( !file_exists( 'uploads/introduce/banner' ) ) {
            mkdir( 'uploads/introduce/banner', 755, true );
        }

        $title = $this->input->post( 'title' );
        $description = $this->input->post( 'description' );
        $chk_status = $this->db->get_where( 'introduce', array( 'status' => 1 ) );
        if ( $chk_status->num_rows() > 0 ) {
            $dtUpdate = [
                'status' => 0
            ];
            $this->db->update( 'introduce', $dtUpdate );
            // insert
            if ( $_FILES[ 'banner' ][ 'name' ] == '' ) {
                $data[ 'banner' ] = 'introduce-banner.png';
            } else {
                $data[ 'banner' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
                move_uploaded_file( $_FILES[ 'banner' ][ 'tmp_name' ], 'uploads/introduce/banner/' . $data[ 'banner' ] );
            }
            $data[ 'title' ] = ucwords( $title );
            $data[ 'description' ] = $description;
            $data[ 'status' ] = 1;
            $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
            $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );

            $this->db->insert( 'introduce', $data );
        } else {

            if ( $_FILES[ 'banner' ][ 'name' ] == '' ) {
                $data[ 'banner' ] = 'introduce-banner.png';
            } else {
                $data[ 'banner' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
                move_uploaded_file( $_FILES[ 'banner' ][ 'tmp_name' ], 'uploads/introduce/banner/' . $data[ 'banner' ] );
            }
            $data[ 'title' ] = ucwords( $title );
            $data[ 'description' ] = $description;
            $data[ 'status' ] = 1;
            $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
            $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );

            $this->db->insert( 'introduce', $data );
        }
        $this->session->set_flashdata( 'success', 'Successfuly add new introduce' );
    }

    public function add_aboutus() {
        $about = $this->input->post( 'about' );
        $vision = $this->input->post( 'vision' );
        $mission = $this->input->post( 'mission' );
        $chk_status = $this->db->get_where( 'about_us', array( 'status' => 1 ) );
        if ( $chk_status->num_rows() > 0 ) {
            $dtUpdate = [
                'status' => 0
            ];
            $this->db->update( 'about_us', $dtUpdate );
            $data = [
                'about' => $about,
                'vision' => $vision,
                'mission' => $mission,
                'status' => 1,
                'create_by' => $this->session->userdata( 'id_user' ),
                'create_date' => date( 'Y-m-d H:i:s' )
            ];
            $this->db->insert( 'about_us', $data );
        } else {
            $data = [
                'about' => $about,
                'vision' => $vision,
                'mission' => $mission,
                'status' => 1,
                'create_by' => $this->session->userdata( 'id_user' ),
                'create_date' => date( 'Y-m-d H:i:s' )
            ];
            $this->db->insert( 'about_us', $data );
        }
        $this->session->set_flashdata( 'success', 'Successfuly add new about us' );
    }

    public function add_clients() {

        // path image adding thumbnails
        if ( !file_exists( 'uploads/clients/thumbnails' ) ) {
            mkdir( 'uploads/clients/thumbnails', 0777, true );
        }

        if ( $_FILES[ 'client_image' ][ 'name' ] == '' ) {
            $data[ 'client_image' ] = 'clients-images.png';
        } else {
            $data[ 'client_image' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
            move_uploaded_file( $_FILES[ 'client_image' ][ 'tmp_name' ], 'uploads/clients/thumbnails/' . $data[ 'client_image' ] );
        }

        $data[ 'client_name' ] = ucwords( $this->input->post( 'client_name' ) );
        $data[ 'client_description' ] = $this->input->post( 'client_description' );
        $data[ 'status' ] = 1;
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'clients', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new client' );
    }

    public function add_clients_header() {

        $data[ 'desc_client' ] = $this->input->post( 'desc_client' );
        $data[ 'status' ] = 1;
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'client_head', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new client header' );
    }

    public function add_partners() {

        // path image adding thumbnails
        if ( !file_exists( 'uploads/partner/thumbnails' ) ) {
            mkdir( 'uploads/partner/thumbnails', 0777, true );
        }

        if ( $_FILES[ 'image_partner' ][ 'name' ] == '' ) {
            $data[ 'image_partner' ] = 'image-partner.png';
        } else {
            $data[ 'image_partner' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
            move_uploaded_file( $_FILES[ 'image_partner' ][ 'tmp_name' ], 'uploads/partner/thumbnails/' . $data[ 'image_partner' ] );
        }

        $data[ 'partner_name' ] = ucwords( $this->input->post( 'partner_name' ) );
        $data[ 'status' ] = 1;
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'partners', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new partners' );
    }

    public function add_role() {

        $data[ 'department_id' ] = $this->input->post( 'department_id' );
        $data[ 'role_parent' ] = $this->input->post( 'role_parent' );
        $data[ 'role_name' ] = ucwords( $this->input->post( 'role_name' ) );
        $data[ 'createdBy' ] = $this->session->userdata( 'id_user' );
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );

        $this->db->insert( 'roles', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new role' );
    }

    public function add_social() {

        $data[ 'social_name' ] = ucwords( $this->input->post( 'social_name' ) );
        $data[ 'url' ] = $this->input->post( 'url' );
        $data[ 'status' ] = 1;
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'social_information', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new social media' );
    }

    public function add_system() {

        // path image adding thumbnails
        if ( !file_exists( 'uploads/partner/thumbnails' ) ) {
            mkdir( 'uploads/partner/thumbnails', 0777, true );
        }

        if ( $_FILES[ 'image_partner' ][ 'name' ] == '' ) {
            $data[ 'image_partner' ] = 'image-partner.png';
        } else {
            $data[ 'image_partner' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
            move_uploaded_file( $_FILES[ 'image_partner' ][ 'tmp_name' ], 'uploads/partner/thumbnails/' . $data[ 'image_partner' ] );
        }

        $data[ 'partner_name' ] = ucwords( $this->input->post( 'partner_name' ) );
        $data[ 'status' ] = 1;
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'partners', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new partners' );
    }

    public function add_team() {

        // path image adding thumbnails
        if ( !file_exists( 'uploads/team' ) ) {
            mkdir( 'uploads/team', 0777, true );
        }

        if ( $_FILES[ 'photo' ][ 'name' ] == '' ) {
            $data[ 'photo' ] = 'image-logo.png';
        } else {
            $data[ 'photo' ] = md5( rand( 10000000, 20000000 ) ) . '.jpg';
            move_uploaded_file( $_FILES[ 'photo' ][ 'tmp_name' ], 'uploads/team/' . $data[ 'photo' ] );
        }

        $data[ 'name' ] = $this->input->post( 'name' );
        $data[ 'social_link' ] = $this->input->post( 'social_link' );
        $data[ 'create_by' ] = $this->session->userdata( 'id_user' );
        $data[ 'create_date' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'team', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new team' );
    }

    public function add_branch() {

        $data[ 'branch_code' ] = $this->input->post( 'branch_code' );
        $data[ 'branch_name' ] = ucwords( $this->input->post( 'branch_name' ) );
        $data[ 'branch_location' ] = $this->input->post( 'branch_location' );
        $data[ 'branch_pic' ] = $this->input->post( 'branch_pic' );
        $data[ 'branch_phone' ] = $this->input->post( 'branch_phone' );
        $data[ 'branch_email' ] = $this->input->post( 'branch_email' );
        $data[ 'status' ] = $this->input->post( 'status' );
        $data[ 'created_by' ] = $this->session->userdata( 'email' );
        $data[ 'created_at' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'branch', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new branch' );
    }

    public function add_work_unit() {

        $data[ 'unit_code' ] = $this->input->post( 'unit_code' );
        $data[ 'branch_id' ] = $this->input->post( 'branch_id' );
        $data[ 'unit_name' ] = ucwords( $this->input->post( 'unit_name' ) );
        $data[ 'status' ] = strtolower( $this->input->post( 'status' ) );
        $data[ 'created_by' ] = $this->session->userdata( 'email' );
        $data[ 'created_at' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'work_unit', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new department' );
    }

    public function add_supplier() {

        $data[ 'supplier_name' ] = strtoupper( $this->input->post( 'supplier_name' ) );
        $data[ 'supplier_address' ] = $this->input->post( 'supplier_address' );
        $data[ 'supplier_pic' ] = strtolower( $this->input->post( 'supplier_pic' ) );
        $data[ 'supplier_contact' ] =  $this->input->post( 'supplier_contact' ) ;
        $data[ 'status' ] =  $this->input->post( 'status' ) ;
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );

        $exist = $this->db->get_where( 'suppliers', array( 'supplier_name' => strtoupper( $this->input->post( 'supplier_name' ) ) ) );
        if ( $exist->num_rows() > 0 ) {
            $this->session->set_flashdata( 'error', 'Supplier Already Register' );
            return;
        }
        $this->db->insert( 'suppliers', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new supplier' );
    }

    public function add_unit() {

        $data[ 'unit_name' ] = strtolower( $this->input->post( 'unit_name' ) );
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );

        $exist = $this->db->get_where( 'units', array( 'unit_name' => strtolower( $this->input->post( 'unit_name' ) ) ) );
        if ( $exist->num_rows() > 0 ) {
            $this->session->set_flashdata( 'error', 'Unit Already Register' );
            return;
        }
        $this->db->insert( 'units', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new unit' );
    }

    // product

    public function product_code() {
        $query = $this->db->query( 'SELECT MAX(product_code) as code from products' );
        $hasil = $query->row();
        return $hasil->code;
    }

    public function add_product() {
        $lastcode = $this->product_code();
        $increment = substr( $lastcode, 8, 5 );
        $code = $increment + 1;
        $data = array( 'product_code' => $code );

        $data[ 'product_code' ] =  'PRD_TTEC' . sprintf( '%05s', $data[ 'product_code' ] );
        $data[ 'supplier_id' ] =  $this->input->post( 'supplier_id' );
        $data[ 'part_no' ] =  strtoupper( $this->input->post( 'part_no' ) );
        $data[ 'part_name' ] =  strtoupper( $this->input->post( 'part_name' ) );
        $data[ 'description' ] =  $this->input->post( 'description' );
        $data[ 'status' ] = $this->input->post( 'status' );
        $data[ 'createdBy' ] = $this->session->userdata( 'id_user' );
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );

        $exist = $this->db->get_where( 'products', array( 'part_name' => strtoupper( $this->input->post( 'part_name' ) ) ) );
        if ( $exist->num_rows() > 0 ) {
            $this->session->set_flashdata( 'error', 'Product Already Register' );
            return;
        }
        $this->db->insert( 'products', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new product' );
    }

    public function add_product_config() {
        $data[ 'product_id' ] =  $this->input->post( 'product_id' );
        $data[ 'unit_id' ] =  $this->input->post( 'unit_id' );
        $data[ 'main_qty' ] =  $this->input->post( 'main_qty' );
        $data[ 'sub_unit_id' ] =  $this->input->post( 'sub_unit_id' );
        $data[ 'sub_qty' ] = $this->input->post( 'sub_qty' );
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'product_unit', $data );

        $this->session->set_flashdata( 'success', 'Successfuly add new formula' );
    }

    // purchase order

    public function po_code() {
        $query = $this->db->query( 'SELECT MAX(po_no) as code from purchase_order' );
        $hasil = $query->row();
        return $hasil->code;
    }

    public function add_purchase() {
        $lastcode = $this->po_code();
        $increment = substr( $lastcode, 8, 5 );
        $code = $increment + 1;
        $data = array( 'po_no' => $code );

        $product_det = $this->input->post( 'product_unit_id' );
        if ( $product_det < 1 ) {
            $this->session->set_flashdata( 'error', 'Please choose the product for purchase order !' );
            redirect( site_url( 'procurement/purchase_form' ) );
        }
        $data[ 'po_no' ] = 'PO-TTEC-' . sprintf( '%05s', $data[ 'po_no' ] );
        $data[ 'po_ref' ] =  strtoupper( $this->input->post( 'po_no' ) );
        $data[ 'po_date' ] =  $this->input->post( 'po_date' );
        $data[ 'do_date' ] =  $this->input->post( 'do_date' );
        $data[ 'po_pic' ] =  $this->input->post( 'po_pic' );
        $data[ 'createdAt' ] = date( 'Y-m-d H:i:s' );
        $this->db->insert( 'purchase_order', $data );
        $po_id = $this->db->insert_id();
        foreach ( $product_det as $key => $val ) {
            $data_detail[] = array(
                'po_id'=>$po_id,
                'product_unit_id'=>$val,
                'type'=>$this->input->post( 'type' )[ $key ],
                'qty'=>$this->input->post( 'qty' )[ $key ],
                'unit_id'=>$this->input->post( 'unit_id' )[ $key ]
            );

        }
        $this->db->insert_batch( 'purchase_details', $data_detail );
        $this->session->set_flashdata( 'success', 'Successfuly add new purchase ' );

    }
}