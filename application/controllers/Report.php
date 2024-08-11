<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //menjaga agar controller ini tidak bisa di akses dengan url tanpa session/login
        is_logged_in();
    }
    public function sales($param1 = "")
    {
        // search
        $s_row = NULL; // baris
        $s_fak = NULL; // faktur
        $s_cus = NULL; // product
        $s_from = NULL; // sales date 
        $s_end = NULL; // sales date 

        if (isset($_GET['s_row']) && !empty($_GET['s_row'] && $_GET['s_row'] != "all")) {
            $s_row = $_GET['s_row'];
        }
        if (isset($_GET['s_fak']) && !empty($_GET['s_fak'])) {
            $s_fak = $_GET['s_fak'];
        }
        if (isset($_GET['s_cus']) && !empty($_GET['s_cus'])) {
            $s_cus = $_GET['s_cus'];
        }
        if (isset($_GET['s_from']) && !empty($_GET['s_from'])) {
            $s_from = $_GET['s_from'];
        }
        if (isset($_GET['s_end']) && !empty($_GET['s_end'])) {
            $s_end = $_GET['s_end'];
        }

        $data['s_row'] = $s_row;
        $data['s_fak'] = $s_fak;
        $data['s_cus'] = $s_cus;
        $data['s_from'] = $s_from;
        $data['s_end'] = $s_end;

        if ($param1 == 'generate') {

            $data['param'] = 'generate';
            $data['get_sales'] = $this->select_model->get_sales_report($s_row, NULL,  $s_fak, $s_cus, $s_from, $s_end);
        } elseif ($param1 == '') {
            $data['param'] = '';
        }

        // endsearch

        $data['title'] = 'Sales';
        $data['page_name'] = 'report/sales';
        $this->load->view('templates/index', $data);
    }
    public function do($param1 = "")
    {
        // search
        $s_row = NULL; // baris
        $s_mar = NULL; // market
        $s_pro = NULL; // product
        $s_sls = NULL; // sales date 

        if (isset($_GET['s_row']) && !empty($_GET['s_row'] && $_GET['s_row'] != "all")) {
            $s_row = $_GET['s_row'];
        }
        if (isset($_GET['s_mar']) && !empty($_GET['s_mar'] && $_GET['s_mar'] != "all")) {
            $s_mar = $_GET['s_mar'];
        }
        if (isset($_GET['s_pro']) && !empty($_GET['s_pro'] && $_GET['s_pro'] != "all")) {
            $s_pro = $_GET['s_pro'];
        }
        if (isset($_GET['s_sls']) && !empty($_GET['s_sls'])) {
            $s_sls = $_GET['s_sls'];
        }

        $data['s_row'] = $s_row;
        $data['s_mar'] = $s_mar;
        $data['s_pro'] = $s_pro;
        $data['s_sls'] = $s_sls;

        if ($param1 == 'generate') {

            $data['param'] = 'generate';
            $data['get_do'] = $this->select_model->get_delivery_order($s_row, NULL,  $s_mar, $s_pro, $s_sls);
            $data['get_do_sum'] = $this->select_model->get_delivery_order_sum($s_row, NULL,  $s_mar, $s_pro, $s_sls);
        } elseif ($param1 == '') {
            $data['param'] = '';
        }

        // endsearch
        $data['get_market'] = $this->select_model->get_market()->result_array();
        $data['get_product'] = $this->select_model->get_product()->result_array();

        $data['title'] = 'Delivery Order';
        $data['page_name'] = 'report/delivery_order';
        $this->load->view('templates/index', $data);
    }
    public function stock($param1 = "")
    {
        // search
        $s_row = NULL; // baris
        $s_war = NULL; // product
        $s_pro = NULL; // product
        $s_qty = NULL; // quantity


        if (isset($_GET['s_row']) && !empty($_GET['s_row'] && $_GET['s_row'] != "all")) {
            $s_row = $_GET['s_row'];
        }
        if (isset($_GET['s_war']) && !empty($_GET['s_war'] && $_GET['s_war'] != "all")) {
            $s_war = $_GET['s_war'];
        }
        if (isset($_GET['s_pro']) && !empty($_GET['s_pro'] && $_GET['s_pro'] != "all")) {
            $s_pro = $_GET['s_pro'];
        }
        if (isset($_GET['s_qty']) && !empty($_GET['s_qty'])) {
            $s_qty = $_GET['s_qty'];
        }

        $data['s_row'] = $s_row;
        $data['s_war'] = $s_war;
        $data['s_pro'] = $s_pro;
        $data['s_qty'] = $s_qty;

        if ($param1 == 'generate') {

            $data['param'] = 'generate';
            $data['get_stock'] = $this->select_model->get_stock($s_row, NULL, $s_war, $s_pro, $s_qty);
        } elseif ($param1 == '') {
            $data['param'] = '';
        }

        // endsearch
        // Requirment page
        $data['get_market'] = $this->select_model->get_market()->result_array();
        $data['get_warehouse'] = $this->select_model->get_warehouse()->result_array();
        $data['get_product'] = $this->select_model->get_product()->result_array();

        $data['title'] = 'Stock';
        $data['page_name'] = 'report/stock';
        $this->load->view('templates/index', $data);
    }
    public function piutang($param1 = "")
    {
        // search
        $s_row = NULL; // baris
        $s_fak = NULL; // faktur
        $s_cus = NULL; // product
        $s_from = NULL; // sales date 
        $s_end = NULL; // sales date 

        if (isset($_GET['s_row']) && !empty($_GET['s_row'] && $_GET['s_row'] != "all")) {
            $s_row = $_GET['s_row'];
        }
        if (isset($_GET['s_fak']) && !empty($_GET['s_fak'])) {
            $s_fak = $_GET['s_fak'];
        }
        if (isset($_GET['s_cus']) && !empty($_GET['s_cus'])) {
            $s_cus = $_GET['s_cus'];
        }
        if (isset($_GET['s_from']) && !empty($_GET['s_from'])) {
            $s_from = $_GET['s_from'];
        }
        if (isset($_GET['s_end']) && !empty($_GET['s_end'])) {
            $s_end = $_GET['s_end'];
        }

        $data['s_row'] = $s_row;
        $data['s_fak'] = $s_fak;
        $data['s_cus'] = $s_cus;
        $data['s_from'] = $s_from;
        $data['s_end'] = $s_end;

        if ($param1 == 'generate') {

            $data['param'] = 'generate';
            $data['get_sales'] = $this->select_model->get_piutang_report($s_row, NULL,  $s_fak, $s_cus, $s_from, $s_end);
        } elseif ($param1 == '') {
            $data['param'] = '';
        }

        // endsearch

        $data['title'] = 'Piutang';
        $data['page_name'] = 'report/piutang';
        $this->load->view('templates/index', $data);
    }
}
