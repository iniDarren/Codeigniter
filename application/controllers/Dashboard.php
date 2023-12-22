<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function loadview($view, $data)
	{
		
		$this->load->view('template/header',$data);
		$this->load->view($view, $data);
		$this->load->view('template/footer');

	}

	public function index()
	{
		check_not_login();
		$data['judul'] = 'Halaman Dashboard';
		$this->loadview('v_dashboard',$data);
	}

	
}
