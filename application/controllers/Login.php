<?php

    class Login extends CI_Controller {
       
       
        function __construct()
        {
            return parent :: __construct();
        }

        function index () {
            $this->load->view('v_login');
        }
    }


