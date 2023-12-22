<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sales_m');
	}
	
	public function loadview($view, $data)
	{
		
		$this->load->view('template/header',$data);
		$this->load->view($view, $data);
		$this->load->view('template/footer');

	}
	public function index()
	{
		$data['judul'] = 'Data Sales';
		$sdata['row'] = $this->sales_m->get();
		$this->loadview('sales/vsales',array_merge($data, $sdata));
	}
	

	public function form()
	{
		$data['judul'] = 'Form Add';
		$this->load->model('customer_m');
		$this->load->model('user_m');
		$this->load->model('service_m');
		$customer = $this->customer_m->get()->result();
		$employee = $this->user_m->get()->result();
		$service = $this->service_m->get()->result();
		$sdata = array (
			'customer' => $customer,
			'invoice_num' =>$this->sales_m->invoice_no(),
			'employee' => $employee,
			'service' => $service,
			
		);
		$this->loadview('sales/sales_data',array_merge($data, $sdata));
	}

	public function add_sales()
	{
		$customer_id = $this->input->post('customer');
		$employee_id = $this->input->post('employee');
		$service_id = $this->input->post('service');
		$invoice_num = $this->input->post('invoice_num');
		$invoice_date = $this->input->post('invoice_date');
		$discount = $this->input->post('discount');
		$sub_total = $this->input->post('sub_total');
		$total_price = $this->input->post('total_price');
		$cash= $this->input->post('cash');
		$changed = $this->input->post('changed');
		$note = $this->input->post('note');
		$created_by = $this->fungsi->user_login()->employee_id;

		
		$this->sales_m->add(
			$customer_id,
			$employee_id,
			$service_id,
			$invoice_num,
			$invoice_date,
			$discount,
			$total_price,
			$cash,
			$changed,
			$created_by,
			$sub_total,
			$note

		);
		redirect('sales');
	}



	public function get_price($service_id) {
		
		$this->load->model('service_m');
		$servicedata = $this->service_m->get_service_price($service_id);
		$sdata = array (
			'sub_total' => $servicedata,
			
		);
		$page = $this->load->view('sales/sales_view_cart', $sdata);
		echo json_encode($page);
	}
	
	public function sales_add()
	{
		$this->sales_m->add_sales();
		if ($this->db->affected_rows() > 0) {
			$result = ['success' => true];
		} else {
			$result = ['success' => false];
		}

		echo json_encode($result) ;
		
		 
	}
	public function del($id)
	{
		$this->sales_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('sales');
	}

	
}