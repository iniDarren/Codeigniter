<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('customer_m');
		$this->load->library('form_validation');
	}
	
	public function loadview($view, $data)
	{
		
		$this->load->view('template/header',$data);
		$this->load->view($view, $data);
		$this->load->view('template/footer');

	}

	public function index()
	{
		$data['judul'] = 'Data Customer';
		$cdata['row'] = $this->customer_m->get();
		$this->loadview('customer/customer_data',array_merge($data, $cdata));
	}

	public function add_customer()
	{
		$data['judul'] = 'Form Add';
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->phone = null;
		$customer->address = null;
		$cdata = array (
			'page' => 'add',
			'row' => $customer
		);
		$this->loadview('customer/customer_form',array_merge($data, $cdata));
	}

	public function edit($id) 
	{
		$data['judul'] = 'Form Edit';
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0) {
			$customer = $query->row();
			$cdata = array(
				'page' => 'edit',
				'row' => $customer
			);
			$this->loadview('customer/customer_form',array_merge($data, $cdata));
		} else {
			echo "<script> Data Tidak Ditemukan'); </script>";
			echo "<script> window.location = '".site_url('customer')."'; </script>";
		}

	}
	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->customer_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->customer_m->edit($post);
		}

		if($this->db->affected_rows()>0) {
			$this->session->set_flashdata('success', 'Data Berhasil disimpan');
		 } 
		 redirect('customer');
		
	}

	public function del($id)
	{
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('customer');
	}
	
}