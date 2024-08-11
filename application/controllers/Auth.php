<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library( 'form_validation' );
    }

    public function index() {
        $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email', [ 'required' => '*' ] );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required', [ 'required' => '*' ] );

        if ( $this->form_validation->run() == false ) {
            $data[ 'title' ] = 'TTEC WMS Login';
            $this->load->view( 'templates/header', $data );
            $this->load->view( 'auth/login' );
            $this->load->view( 'templates/footer' );
        } else {
            //validasinya sukses
            $this->_login();
        }
    }

    private function _login() {
        //variabel $email & $password diambil dari name yang ada di method post = view/auth/login
        $email = $this->input->post( 'email' );
        $password = $this->input->post( 'password' );

        //untuk menyesuaikan variabel $email dengan field email yang ada di tabel user
        $user = $this->db->get_where( 'users', [ 'email' => $email ] )->row_array();
        $rolename = $this->db->get_where( 'roles', [ 'id' => $user[ 'role_id' ] ] )->row_array();

        //jika usernya ada
        if ( $user ) {
            //cek jika usernya ada tapi jika usernya aktif
            if ( $user[ 'is_active' ] == 1 ) {
                //cek password menggunakan fungsi yang ada di php yaitu password_verify
                if ( password_verify( $password, $user[ 'password' ] ) ) {
                    $data = [
                        'id_user' => $user[ 'id' ],
                        'full_name' => $user[ 'full_name' ],
                        'email' => $user[ 'email' ],
                        'role_id' => $user[ 'role_id' ],
                        'branch_id' => $user[ 'branch_id' ],
                        'role_name'=>$rolename[ 'role_name' ]

                    ];
                    //jika sudah $data disimpan ke dalam session
                    $this->session->set_userdata( $data );
                    //lalu arahkan ke controller ke admin jika role_id = 1
                    if ( $user[ 'role_id' ] == 1 ) {
                        $this->session->set_flashdata( 'success', 'Welcome to Toyota Auto Body Tokai Extrusion management system!<br> You are logged in as : '.$rolename[ 'role_name' ] );
                        redirect( 'dashboard' );
                    } else {
                        // Admin, Sales, dll
                        $this->session->set_flashdata( 'success', 'Welcome to Toyota Auto Body Tokai Extrusion management system!<br> You are logged in as : '.$rolename[ 'role_name' ] );
                        redirect( 'dashboard' );
                    }
                } else {
                    // jika passwordnya salah muncul pesan error ini
                    $this->session->set_flashdata( 'error_login', ' Wrong Password !' );
                    //arahkan ke controller auth
                    redirect( 'auth' );
                }
            } else {
                // jika belum aktif muncul pesan error ini
                $this->session->set_flashdata( 'error_login', ' Your account is not active, <br>Please contact support.' );
                redirect( 'auth' );
            }
        } else {
            // jika usernya belum ada muncul pesan error ini
            $this->session->set_flashdata( 'error_login', ' Email, is not Registered !' );
            redirect( 'auth' );
        }
    }

    public function register() {
        $this->form_validation->set_rules( 'role', 'Role', 'required' );
        $this->form_validation->set_rules( 'name', 'Full Name', 'required|trim' );
        $this->form_validation->set_rules( 'email', 'Email', 'required|trim|valid_email|is_unique[ users.email ]', [
            'is_unique' => 'This email has already registered !'
        ] );
        $this->form_validation->set_rules( 'password1', 'Password', 'required|trim|min_length[ 6 ]|matches[ password2 ]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password min 6 char!'
        ] );
        $this->form_validation->set_rules( 'password2', 'Password', 'required|trim|matches[ password1 ]' );

        if ( $this->form_validation->run() == false ) {
            //error
            //$data[ 'title' ] = 'Project Registration';
            $this->load->view( 'templates/header' );
            $this->load->view( 'auth/register' );
            $this->load->view( 'templates/footer' );
        } else {
            // success
            date_default_timezone_set( 'Asia/Jakarta' );
            $data = [
                'role_id' => $this->input->post( 'role_id' ),
                'full_name' => ucwords( htmlspecialchars( $this->input->post( 'name', true ) ) ),
                'email' => htmlspecialchars( $this->input->post( 'email', true ) ),
                'password' => password_hash( $this->input->post( 'password1' ), PASSWORD_DEFAULT ),
                'cabang_id' => $this->input->post( 'branch_id' ),
                'work_unit_id' => $this->input->post( 'work_unit_id' ),
                'position_id' => $this->input->post( 'position_id' ),
                'is_active' => $this->input->post( 'is_active' ),
                'create_by' => $this->session->userdata( 'id_user' ),
                'create_date' => date( 'Y-m-d H:i:s' )
            ];
            // var_dump( $data );
            die;
            // insert table yang berurutan fieldnya diatas
            $this->db->insert( 'users', $data );
            // alert flashdata dibawah ini dikirim ke file login
            $this->session->set_flashdata( 'success_login', 'Registration Successful' );
            redirect( 'auth' );
        }
    }

    public function logout() {
        $this->session->unset_userdata( 'full_name' );
        $this->session->unset_userdata( 'email' );
        $this->session->unset_userdata( 'role_id' );

        $this->session->set_flashdata( 'success_login', 'Successfully logged out' );
        redirect( 'auth' );
    }

    public function forbidden() {
        $this->load->view( 'errors/403' );
    }

    public function notfound() {
        $this->load->view( 'errors/404' );
    }
}