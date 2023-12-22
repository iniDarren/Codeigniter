<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('service_m');
	}
	
	public function loadview($view, $data)
	{
		
		$this->load->view('template/header',$data);
		$this->load->view($view, $data);
		$this->load->view('template/footer');

	}

	public function index()
	{
		$data['judul'] = 'Data Service';
		$sdata['row'] = $this->service_m->get();
		$this->loadview('service/service_data',array_merge($data, $sdata));
	}

	public function add_service()
	{
		$data['judul'] = 'Form Add';
		$service = new stdClass();
		$service ->service_id = null;
		$service->name = null;
		$service ->price = null;
		$sdata = array (
			'page' => 'add',
			'row' => $service
		);
		$this->loadview('service/service_form',array_merge($data, $sdata));
	}

	public function edit($id) 
	{
		$data['judul'] = 'Form Edit';
		$query = $this->service_m->get($id);
		if($query->num_rows() > 0) {
			$service = $query->row();
			$sdata = array(
				'page' => 'edit',
				'row' => $service
			);
			$this->loadview('service/service_form',array_merge($data, $sdata));
		} else {
			echo "<script> Data Tidak Ditemukan'); </script>";
			echo "<script> window.location = '".site_url('service')."'; </script>";
		}

	}
	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->service_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->service_m->edit($post);
		}

		if($this->db->affected_rows()>0) {
			$this->session->set_flashdata('success', 'Data Berhasil disimpan');
		 } 
		 redirect('service');
		
	}

	public function del($id)
	{
		 $this->service_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('service');
	}


}