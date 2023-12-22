<?php

Class Fungsi { 

    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_m');
        $employee_id = $this->ci->session->userdata('employeeid');
        $user_data = $this->ci->user_m->get($employee_id)->row();
        return $user_data;
    }


    public function count_customer() {
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
        
    }
    public function count_service() {
        $this->ci->load->model('service_m');
        return $this->ci->service_m->get()->num_rows();
        
    }
    public function count_employee() {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
        
    }
    public function count_sales() {
        $this->ci->load->model('sales_m');
        return $this->ci->sales_m->get()->num_rows();
        
    }
}