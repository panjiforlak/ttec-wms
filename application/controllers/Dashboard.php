<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ecommerce/Select_model', 'select_model');
        is_logged_in();
    }
    public function index($param1 = "", $param2 = "")
    {

        $data['title'] = 'Dashboard';
        $data['breadcrumb1'] = 'Dashboard';
        $data['breadcrumblink1'] = '';
        $data['breadcrumb2'] = '';
        $data['breadcrumblink2'] = '';
        $data['breadcrumb3'] = '';
        $data['breadcrumblink3'] = '';
        $data['page_name'] = 'dashboard/summary';
        $data['get_menu'] = $this->select->get_menu();
        $this->load->view('templates/index', $data);
    }
}
