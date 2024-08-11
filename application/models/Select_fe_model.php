<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_fe_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    public function get_introduce()
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('introduce');
        return $qry;
    }
    public function get_aboutus()
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('about_us');
        return $qry;
    }
    public function get_products()
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('product');
        return $qry;
    }
    public function get_client_head()
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('client_head');
        return $qry;
    }
    public function get_clients()
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit(8);
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('clients');
        return $qry;
    }
    public function get_social()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $this->db->where('delete_date', null);
        $qry = $this->db->get('social_information');
        return $qry;
    }
    public function get_system()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('delete_date', null);
        $qry = $this->db->get('system');
        return $qry;
    }
    public function get_team()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('delete_date', null);
        $qry = $this->db->get('team');
        return $qry;
    }
}
