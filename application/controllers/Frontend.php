<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'google_translate'));
        $this->load->model('Select_fe_model', 'select_fe_model');
        // is_logged_in();
    }
    public function index()
    {
        $data['get_introduce'] = $this->select_fe_model->get_introduce();
        $data['get_aboutus'] = $this->select_fe_model->get_aboutus();
        $data['get_products'] = $this->select_fe_model->get_products();
        $data['get_client_head'] = $this->select_fe_model->get_client_head();
        $data['get_clients'] = $this->select_fe_model->get_clients();
        $data['get_social'] = $this->select_fe_model->get_social();
        $data['get_system'] = $this->select_fe_model->get_system();
        $data['get_team'] = $this->select_fe_model->get_team();
        $chkLang =  $this->session->userdata('language') == null ? 'en' : $this->session->userdata('language');
        $data['lang'] = $chkLang;
        $this->load->view('templates/fe-headers');
        $this->load->view('frontend/index', $data);
        $this->load->view('templates/fe-footers');
    }

    public function languages()
    {
        extract($_POST);
        $id = $this->input->post('det');
        $this->session->set_userdata('language', $dlang);
        echo "<meta http-equiv='refresh' content='0; url=" . site_url() . "'>";
    }
}
