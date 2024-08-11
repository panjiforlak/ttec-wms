<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Select_model extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );
    }

    public function get_menu( $param = '' ) {
        if ( !empty( $param ) ) {
            $this->db->where( 'id', $param );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'is_delete !=', 1 );
        $qry = $this->db->get( 'menus' );
        return $qry;
    }

    public function branch_code() {
        $query = $this->db->query( 'SELECT MAX(branch_code) as code from branch' );
        $hasil = $query->row();
        return $hasil->code;
    }

    public function dept_code() {
        $query = $this->db->query( 'SELECT MAX(unit_code) as code from work_unit' );
        $hasil = $query->row();
        return $hasil->code;
    }

    public function get_branch( $param = '' ) {
        if ( !empty( $param ) ) {
            $this->db->where( 'id', $param );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'deleted_at', null );
        $qry = $this->db->get( 'branch' );
        return $qry;
    }

    public function get_submenu() {
        $this->db->where( 'menu_parent !=', 0 );
        $qry = $this->db->get( 'menus' );
        return $qry;
    }

    public function get_menu_parent( $param = '' ) {
        if ( !empty( $param ) ) {
            $this->db->where( 'id', $param );
        }
        $this->db->where( 'is_parent', 1 );
        $qry = $this->db->get( 'menus' );
        return $qry;
    }

    public function get_role( $param1 = '' ) {
        if ( $this->session->userdata( 'id_user' ) == 1 ) {
            if ( !empty( $param1 ) ) {
                $this->db->where( 'id', $param1 );
            }
            $this->db->where( 'status', 1 );
            $qry = $this->db->get( 'roles' );
        } else {
            if ( !empty( $param1 ) ) {
                $this->db->where( 'id', $param1 );
            }
            $this->db->where( 'id !=', 1 );
            $this->db->where( 'status', 1 );
            $qry = $this->db->get( 'roles' );
        }
        return $qry;
    }

    public function get_department( $param1 = '' ) {
        if ( $this->session->userdata( 'id_user' ) == 1 ) {
            if ( !empty( $param1 ) ) {
                $this->db->where( 'work_unit.id', $param1 );
            }
            $this->db->where( 'work_unit.deleted_at', null );
            $this->db->select( 'work_unit.*,branch.branch_name' );
            $this->db->join( 'branch', 'branch.id=work_unit.branch_id', 'left' );
            $qry = $this->db->get( 'work_unit' );
        } else {
            if ( !empty( $param1 ) ) {
                $this->db->where( 'id', $param1 );
            }
            $this->db->where( 'deleted_at', null );
            $this->db->select( 'work_unit.*,branch.branch_name' );
            $this->db->join( 'branch', 'branch.id=work_unit.branch_id', 'left' );
            $qry = $this->db->get( 'work_unit' );
        }
        return $qry;
    }

    public function get_role_access( $param1 = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'role_id', $param1 );
        }

        $qry = $this->db->get( 'roles_menu' );
        return $qry;
    }

    public function get_user( $param1 = '' ) {
        $this->db->select( 'users.*,roles.role_name' );
        if ( !empty( $param1 ) ) {
            $this->db->where( 'users.id', $param1 );
        }
        $this->db->where( 'role_id !=', 1 );
        $this->db->order_by( 'users.full_name', 'asc' );
        $this->db->join( 'roles', 'users.role_id=roles.id', 'left' );
        // $this->db->join( 'branch', 'users.branch_id=branch.id_branch', 'left' );
        // $this->db->join( 'work_unit', 'users.work_unit_id=work_unit.id_work_unit', 'left' );
        // $this->db->join( 'position', 'users.position_id=position.id_position', 'left' );
        $qry = $this->db->get( 'users' );

        return $qry;
    }

    //

    public function get_purchase_history( $param1 = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'id_purchase', $param1 );
        }
        $this->db->where( 'a.is_delete !=', 1 );
        $this->db->order_by( 'a.id_purchase', 'desc' );
        $this->db->join( 'supplier as b', 'a.supplier_id=b.id_supplier', 'left' );
        $this->db->join( 'warehouse as c', 'a.warehouse_id=c.id_warehouse', 'left' );
        $qry = $this->db->get( 'purchase as a' );
        return $qry;
    }

    public function getchain_limit( $param2 = '' ) {
        $this->db->where( 'id_customer', $param2 );
        $query = $this->db->get( 'customer' );
        return $query->result();
    }

    public function getchain_stock( $param2 = '' ) {
        $this->db->where( 'product_id', $param2 );
        $query = $this->db->get( 'stock' );
        return $query->result();
    }

    public function get_sales( $param1 = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'id_sales', $param1 );
        }
        $this->db->order_by( 'sales_date', 'desc' );
        $qry = $this->db->get( 'sales' );
        return $qry;
    }

    public function get_sales_history( $page = '', $uri = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'a.id_sales', $param1 );
        }
        $this->db->order_by( 'a.sales_date', 'desc' );
        $this->db->where( 'a.is_delete !=', 1 );
        $this->db->join( 'customer as b', 'a.customer_id=b.id_customer', 'left' );
        $qry = $this->db->get( 'sales as a', $page, $uri );
        return $qry;
    }

    public function get_sales_detail( $param1 = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'a.sales_id', $param1 );
        }
        $this->db->where( 'a.is_return !=', 1 );
        $this->db->where( 'a.qty !=', 0 );
        $this->db->join( 'sales as c', 'a.sales_id=c.id_sales', 'left' );
        $this->db->join( 'product as b', 'a.product_id=b.id_product', 'left' );
        $qry = $this->db->get( 'sales_detail as a' );
        return $qry;
    }

    public function get_faktur( $param1 = '' ) {
        if ( !empty( $param1 ) ) {
            $this->db->where( 'a.sales_id', $param1 );
        }
        $this->db->where( 'a.is_return !=', 1 );
        $this->db->where( 'a.qty !=', 0 );
        $this->db->join( 'sales as c', 'a.sales_id=c.id_sales', 'left' );
        $this->db->join( 'product as b', 'a.product_id=b.id_product', 'left' );
        $qry = $this->db->get( 'sales_detail as a' );
        return $qry;
    }

    // Report

    public function get_delivery_order( $s_row = '', $uri, $s_mar = '', $s_pro = '', $s_sls = '' ) {

        if ( !empty( $s_mar ) ) {
            $this->db->where( 'd.id_market', $s_mar );
        }
        if ( !empty( $s_pro ) ) {
            $this->db->where( 'e.id_product', $s_pro );
        }
        if ( !empty( $s_sls ) ) {
            $this->db->where( 'b.sales_date', date( 'Y-m-d', strtotime( $s_sls ) ) );
        }

        $this->db->where( 'a.is_return', 0 );
        $this->db->join( 'sales as b', 'a.sales_id=b.id_sales', 'left' );
        //first
        $this->db->join( 'customer as c', 'b.customer_id = c.id_customer', 'left' );
        //second
        $this->db->join( 'market as d', 'c.market_id = d.id_market', 'left' );
        //ext
        $this->db->join( 'product as e', 'a.product_id = e.id_product', 'left' );
        //ext
        $do = $this->db->get( 'sales_detail as a', $s_row, $uri );
        return $do;
    }

    public function get_delivery_order_sum( $s_row = '', $uri, $s_mar = '', $s_pro = '', $s_sls = '' ) {

        if ( !empty( $s_mar ) ) {
            $this->db->where( 'd.id_market', $s_mar );
        }
        if ( !empty( $s_pro ) ) {
            $this->db->where( 'e.id_product', $s_pro );
        }
        if ( !empty( $s_sls ) ) {
            $this->db->where( 'b.sales_date', date( 'Y-m-d', strtotime( $s_sls ) ) );
        }
        $this->db->select( 'd.market_name,e.product_name,sum(a.qty) as tot_qty,b.sales_date' );
        $this->db->where( 'a.is_return', 0 );
        $this->db->join( 'sales as b', 'a.sales_id=b.id_sales', 'left' );
        //first
        $this->db->join( 'customer as c', 'b.customer_id = c.id_customer', 'left' );
        //second
        $this->db->join( 'market as d', 'c.market_id = d.id_market', 'left' );
        //ext
        $this->db->join( 'product as e', 'a.product_id = e.id_product', 'left' );
        //ext
        $this->db->group_by( 'a.product_id' );
        $this->db->group_by( 'd.id_market' );
        $do = $this->db->get( 'sales_detail as a', $s_row, $uri );
        return $do;
    }

    public function get_stock( $s_row = '', $uri, $s_war = '', $s_pro = '', $s_qty = '' ) {

        if ( !empty( $s_war ) ) {
            $this->db->where( 'a.warehouse_id', $s_war );
        }

        if ( !empty( $s_pro ) ) {
            $this->db->where( 'c.id_product', $s_pro );
        }
        if ( !empty( $s_qty ) ) {
            $this->db->where( 'a.stock', $s_qty );
        }

        $this->db->where( 'c.is_delete', 0 );
        $this->db->join( 'warehouse as b', 'a.warehouse_id = b.id_warehouse', 'left' );
        //ext
        $this->db->join( 'product as c', 'a.product_id = c.id_product', 'left' );
        //ext
        $do = $this->db->get( 'stock as a', $s_row, $uri );
        return $do;
    }

    public function get_in_stock( $param = '' ) {
        $this->db->select( '*,SUM(qty) as in_stock' );
        $this->db->group_by( 'product_id' );
        $this->db->where( 'product_id', $param );
        $this->db->where( 'status_pd', 1 );
        $in = $this->db->get( 'purchase_detail' );
        return $in;
    }

    public function get_out_stock( $param = '' ) {
        $this->db->select( '*,SUM(qty) as out_stock' );
        $this->db->group_by( 'product_id' );
        $this->db->where( 'product_id', $param );
        $this->db->where( 'is_return', 0 );
        $out = $this->db->get( 'sales_detail' );
        return $out;
    }

    public function get_sales_report( $s_row = '', $uri, $s_fak = '', $s_cus = '', $s_from = '', $s_end = '' ) {

        if ( !empty( $s_fak ) ) {
            $this->db->like( 'a.sales_faktur', $s_fak );
        }

        if ( !empty( $s_cus ) ) {
            $this->db->like( 'b.customer_name', $s_cus );
        }
        if ( !empty( $s_from ) ) {
            $this->db->where( 'a.sales_date >=', date( 'Y-m-d', strtotime( $s_from ) ) );
        }
        if ( !empty( $s_end ) ) {
            $this->db->where( 'a.sales_date <=', date( 'Y-m-d', strtotime( $s_end ) ) );
        }

        $this->db->where( 'a.is_delete', 0 );
        $this->db->join( 'customer as b', 'a.customer_id = b.id_customer', 'left' );
        //ext
        $sls = $this->db->get( 'sales as a', $s_row, $uri );
        return $sls;
    }

    public function get_piutang_report( $s_row = '', $uri, $s_fak = '', $s_cus = '', $s_from = '', $s_end = '' ) {

        if ( !empty( $s_fak ) ) {
            $this->db->like( 'a.sales_faktur', $s_fak );
        }

        if ( !empty( $s_cus ) ) {
            $this->db->like( 'b.customer_name', $s_cus );
        }
        if ( !empty( $s_from ) ) {
            $this->db->where( 'a.due_date >=', date( 'Y-m-d', strtotime( $s_from ) ) );
        }
        if ( !empty( $s_end ) ) {
            $this->db->where( 'a.due_date <=', date( 'Y-m-d', strtotime( $s_end ) ) );
        }

        $this->db->where( 'a.is_delete', 0 );
        $this->db->where( 'a.sales_status', 0 );
        $this->db->join( 'customer as b', 'a.customer_id = b.id_customer', 'left' );
        //ext
        $sls = $this->db->get( 'sales as a', $s_row, $uri );
        return $sls;
    }

    // Dashboard

    public function get_sum_stock() {
        $this->db->select_sum( 'stock', 'all_stock' );
        $qry = $this->db->get( 'stock' );
        return $qry;
    }

    public function get_sum_sales() {
        $this->db->select_sum( 'total_payment', 'all_sales' );
        $this->db->where( 'sales_status', 1 );
        $qry = $this->db->get( 'sales' );
        return $qry;
    }

    public function get_sum_sales_outstanding() {
        $this->db->select_sum( 'total_payment', 'all_sales_outstanding' );
        $this->db->where( 'sales_status', 0 );
        $this->db->where( 'is_delete', 0 );
        $qry = $this->db->get( 'sales' );
        return $qry;
    }

    public function get_sum_cashout() {
        $this->db->select_sum( 'total_payment', 'all_cashout' );
        $this->db->where( 'is_delete', 0 );
        $qry = $this->db->get( 'purchase' );
        return $qry;
    }

    // CONTENT

    public function get_introduce( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'introduce' );
        return $qry;
    }

    public function get_aboutus( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'about_us' );
        return $qry;
    }

    // public function get_product( $id = '' ) {
    //     if ( !empty( $id ) ) {
    //         $this->db->where( 'id', $id );
    //     }
    //     $this->db->order_by( 'id', 'asc' );
    //     $this->db->where( 'delete_date', null );
    //     $qry = $this->db->get( 'product' );
    //     return $qry;
    // }

    public function get_clients( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'clients' );
        return $qry;
    }

    public function get_clients_header( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'client_head' );
        return $qry;
    }

    public function get_partners( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'partners' );
        return $qry;
    }

    public function get_social( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'social_information' );
        return $qry;
    }

    public function get_system( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'system' );
        return $qry;
    }

    public function get_team( $id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'id', $id );
        }
        $this->db->order_by( 'id', 'asc' );
        $this->db->where( 'delete_date', null );
        $qry = $this->db->get( 'team' );
        return $qry;
    }

    // ajax

    public function getchain_department( $param2 = '' ) {
        $this->db->where( 'branch_id', $param2 );
        $this->db->where( 'deleted_at', null );
        $query = $this->db->get( 'work_unit' );
        return $query->result();
    }

    public function getchain_position( $param2 = '' ) {
        $this->db->where( 'department_id', $param2 );
        $this->db->where( 'deleted_at', null );
        $query = $this->db->get( 'roles' );
        return $query->result();
    }

    //procurement

    public function get_po( $po_id = '' ) {
        if ( !empty( $po_id ) ) {
            $this->db->where( 'id', $po_id );
        }
        $this->db->order_by( 'id', 'asc' );
        $qry = $this->db->get( 'purchase_order' );
        return $qry;
    }

    // supplier

    public function get_supplier( $param = '' ) {
        if ( !empty( $param ) ) {
            $this->db->where( 'id', $param );
        }
        $this->db->order_by( 'id', 'asc' );
        // $this->db->where( 'status', 1 );
        $qry = $this->db->get( 'suppliers' );
        return $qry;
    }

    //unit

    public function get_unit( $id_unit = '' ) {
        if ( !empty( $id_unit ) ) {
            $this->db->where( 'id', $id_unit );
        }
        $this->db->order_by( 'id', 'asc' );
        // $this->db->where( 'status', 1 );
        $qry = $this->db->get( 'units' );
        return $qry;
    }

    //product

    public function get_product( $id_product = '' ) {
        if ( !empty( $id_product ) ) {
            $this->db->where( 'a.id', $id_product );
        }
        $this->db->select( 'a.*,b.supplier_name' );
        $this->db->order_by( 'a.id', 'asc' );
        $this->db->join( 'suppliers as b', 'a.supplier_id=b.id', 'left' );
        $qry = $this->db->get( 'products as a' );
        return $qry;
    }

    public function get_product_unit( $id = '', $product_id = '' ) {
        if ( !empty( $id ) ) {
            $this->db->where( 'a.id', $id );
        }
        if ( !empty( $product_id ) ) {
            $this->db->where( 'a.product_id', $product_id );
        }

        $this->db->select( 'a.*,main.unit_name as main_name,sub.unit_name as sub_name,b.id as product_id, b.part_name ,b.part_no' );
        $this->db->order_by( 'a.id', 'asc' );
        $this->db->join( 'units as main', 'a.unit_id=main.id', 'left' );
        $this->db->join( 'units as sub', 'a.sub_unit_id=sub.id', 'left' );
        $this->db->join( 'products as b', 'a.product_id=b.id', 'left' );
        $qry = $this->db->get( 'product_unit as a' );
        return $qry;
    }

    public function get_ajx_product_unit( $id = '', $product_id = '' ) {

        $this->db->where( 'a.id', $id );

        if ( !empty( $product_id ) ) {
            $this->db->where( 'a.product_id', $product_id );
        }

        $this->db->select( 'a.*,main.unit_name as main_name,sub.unit_name as sub_name,b.id as product_id, b.part_name ,b.part_no' );
        $this->db->order_by( 'a.id', 'asc' );
        $this->db->join( 'units as main', 'a.unit_id=main.id', 'left' );
        $this->db->join( 'units as sub', 'a.sub_unit_id=sub.id', 'left' );
        $this->db->join( 'products as b', 'a.product_id=b.id', 'left' );
        $qry = $this->db->get( 'product_unit as a' );
        return $qry;
    }

    public function get_product_unit_list( $product_id = '' ) {
        if ( !empty( $product_id ) ) {
            $this->db->where( 'a.product_id', $product_id );
        }

        $this->db->select( 'a.*,b.id as product_id, b.part_name ,b.part_no' );
        $this->db->order_by( 'a.id', 'asc' );
        $this->db->join( 'products as b', 'a.product_id=b.id', 'left' );

        $qry = $this->db->get( 'product_unit as a' );
        return $qry;
    }

    public function get_purchase_detail( $po_no = '' ) {
        if ( !empty( $po_no ) ) {
            $this->db->where( 'b.po_no', $po_no );
        }

        $this->db->select( 'a.*,b.po_no,d.product_code,d.part_name,d.part_no,e.unit_name,c.sub_qty,c.sub_unit_id' );
        $this->db->order_by( 'a.id', 'asc' );
        $this->db->join( 'purchase_order as b', 'a.po_id=b.id', 'left' );
        $this->db->join( 'product_unit as c', 'a.product_unit_id=c.id', 'left' );
        $this->db->join( 'products as d', 'c.product_id=d.id', 'left' );
        $this->db->join( 'units as e', 'a.unit_id=e.id', 'left' );

        $qry = $this->db->get( 'purchase_details as a' );
        return $qry;
    }

}