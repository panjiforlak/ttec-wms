<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ecommerce/Select_model', 'select_model');
        $this->load->model('ecommerce/Insert_model', 'insert_model');
        $this->load->model('ecommerce/Update_model', 'update_model');
        $this->load->model('ecommerce/Delete_model', 'delete_model');

        is_logged_in();
    }
    // 
    public function introduce($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_introduce();
            redirect(site_url('content/introduce/introduce'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_introduce($param2);
            redirect(site_url('content/introduce/introduce'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_introduce($param2);
            redirect(site_url('content/introduce/introduce'));
        }
        $data['get_introduce'] = $this->select_model->get_introduce();

        $data['title'] = 'Introduce';
        $data['page_name'] = 'content/introduce/introduce';
        $this->load->view('templates/index', $data);
    }

    public function about_us($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_aboutus();
            redirect(site_url('content/about_us'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_aboutus($param2);
            redirect(site_url('content/about_us'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_aboutus($param2);
            redirect(site_url('content/about_us'));
        }
        $data['get_aboutus'] = $this->select_model->get_aboutus();

        $data['title'] = 'About Us';
        $data['page_name'] = 'content/about_us/about_us';
        $this->load->view('templates/index', $data);
    }

    public function product($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_product();
            redirect(site_url('content/product'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_product($param2);
            redirect(site_url('content/product'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_product($param2);
            redirect(site_url('content/product'));
        }
        $data['get_product'] = $this->select_model->get_product();

        $data['title'] = 'Products';
        $data['page_name'] = 'content/product/product';
        $this->load->view('templates/index', $data);
    }

    public function clients($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_clients();
            redirect(site_url('content/clients'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_clients($param2);
            redirect(site_url('content/clients'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_clients($param2);
            redirect(site_url('content/clients'));
        } elseif ($param1 == "add_header") {
            $this->insert_model->add_clients_header();
            redirect(site_url('content/clients'));
        } elseif ($param1 == "edit_header") {
            $this->update_model->edit_clients_header($param2);
            redirect(site_url('content/clients'));
        } elseif ($param1 == "delete_header") {
            $this->delete_model->del_clients_header($param2);
            redirect(site_url('content/clients'));
        }
        $data['get_clients'] = $this->select_model->get_clients();
        $data['get_clients_header'] = $this->select_model->get_clients_header();

        $data['title'] = 'Clients';
        $data['page_name'] = 'content/clients/clients';
        $this->load->view('templates/index', $data);
    }

    public function partners($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_partners();
            redirect(site_url('content/partners'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_partners($param2);
            redirect(site_url('content/partners'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_partners($param2);
            redirect(site_url('content/partners'));
        }

        $data['get_partners'] = $this->select_model->get_partners();

        $data['title'] = 'Partners';
        $data['page_name'] = 'content/partners/partners';
        $this->load->view('templates/index', $data);
    }

    public function social($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_social();
            redirect(site_url('content/social'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_social($param2);
            redirect(site_url('content/social'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_social($param2);
            redirect(site_url('content/social'));
        }

        $data['get_social'] = $this->select_model->get_social();

        $data['title'] = 'social';
        $data['page_name'] = 'content/social/social';
        $this->load->view('templates/index', $data);
    }
    public function team($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $this->insert_model->add_team();
            redirect(site_url('content/team'));
        } elseif ($param1 == "edit") {
            $this->update_model->edit_team($param2);
            redirect(site_url('content/team'));
        } elseif ($param1 == "delete") {
            $this->delete_model->del_team($param2);
            redirect(site_url('content/team'));
        }

        $data['get_team'] = $this->select_model->get_team();

        $data['title'] = 'team';
        $data['page_name'] = 'content/team/team';
        $this->load->view('templates/index', $data);
    }
}
