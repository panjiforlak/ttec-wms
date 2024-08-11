<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Modal extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function standart( $page_folder = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '' ) {
        $logged_in_user_role         = strtolower( $this->session->userdata( 'role' ) );
        $page_data[ 'param2' ]        =    $param2;
        $page_data[ 'param3' ]        =    $param3;
        $page_data[ 'param4' ]        =    $param4;
        $page_data[ 'param5' ]        =    $param5;
        $page_data[ 'param6' ]        =    $param6;
        $page_data[ 'param7' ]        =    $param7;
        // $this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php', $page_data );
        $this->load->view( 'backend/master/' . $page_folder . '/' . $page_name . '.php', $page_data );
    }

    function standartSettings( $page_folder = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '' ) {
        $logged_in_user_role         = strtolower( $this->session->userdata( 'role' ) );
        $page_data[ 'param2' ]        =    $param2;
        $page_data[ 'param3' ]        =    $param3;
        $page_data[ 'param4' ]        =    $param4;
        $page_data[ 'param5' ]        =    $param5;
        $page_data[ 'param6' ]        =    $param6;
        $page_data[ 'param7' ]        =    $param7;
        // $this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php', $page_data );
        $this->load->view( 'backend/settings/' . $page_folder . '/' . $page_name . '.php', $page_data );
    }

    function standartContent( $page_folder = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '' ) {
        $logged_in_user_role         = strtolower( $this->session->userdata( 'role' ) );
        $page_data[ 'param2' ]        =    $param2;
        $page_data[ 'param3' ]        =    $param3;
        $page_data[ 'param4' ]        =    $param4;
        $page_data[ 'param5' ]        =    $param5;
        $page_data[ 'param6' ]        =    $param6;
        $page_data[ 'param7' ]        =    $param7;
        // $this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php', $page_data );
        $this->load->view( 'backend/content/' . $page_folder . '/' . $page_name . '.php', $page_data );
    }

    function transaction( $page_folder = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '' ) {
        $logged_in_user_role         = strtolower( $this->session->userdata( 'role' ) );
        $page_data[ 'param2' ]        =    $param2;
        $page_data[ 'param3' ]        =    $param3;
        $page_data[ 'param4' ]        =    $param4;
        $page_data[ 'param5' ]        =    $param5;
        $page_data[ 'param6' ]        =    $param6;
        $page_data[ 'param7' ]        =    $param7;
        // $this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php', $page_data );
        $this->load->view( 'backend/' . $page_folder . '/' . $page_name . '.php', $page_data );
    }

    function trans( $page_folder = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '' ) {
        $logged_in_user_role         = strtolower( $this->session->userdata( 'role' ) );
        $page_data[ 'param2' ]        =    $param2;
        $page_data[ 'param3' ]        =    $param3;
        $page_data[ 'param4' ]        =    $param4;
        $page_data[ 'param5' ]        =    $param5;
        $page_data[ 'param6' ]        =    $param6;
        $page_data[ 'param7' ]        =    $param7;
        // $this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php', $page_data );
        $this->load->view( 'backend/' . $page_folder . '/' . $page_name . '.php', $page_data );
    }
}