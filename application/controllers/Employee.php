<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
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
		
		$this->load->model('user_m');
		$userdata ['row'] = $this->user_m->get();
		$data['judul'] = 'Data Employee';
		$this->loadview('user/user_data',array_merge($data, $userdata));
	}

	public function add_employee()
	{
		
		$data['judul'] = 'Form Add';

		$this->form_validation->set_rules('name', 'Username', 'required|is_unique[employee.name]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches'=> '%s tidak sesuai dengan password')
			);
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_lenght', '(field) minimal 8 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, silahkan diganti ');
		$this->form_validation->set_error_delimiters('<span class= "help-block">', '</span>');	
		if ($this->form_validation->run() == FALSE)
        {
			$this->loadview('user/user_form_add', $data);
        } else {
             $post = $this->input->post(null, TRUE);
			 $this->user_m->add($post);
			 if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('employee');
        }
		
	}

	public function del()
	{
		$id = $this->input->post('employee_id');
		$this->user_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('employee');
	}

	public function edit($id)
	{
		
		$data['judul'] = 'Edit';
		$this->form_validation->set_rules('name', 'Username', 'required|callback_username_check');
		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[8]');
		}
		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
					array('matches'=> '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		if($this->input->post('address')) {
			$this->form_validation->set_rules('level', 'Level', 'required');
		}
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_lenght', '(field) minimal 8 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, silahkan diganti ');
		$this->form_validation->set_error_delimiters('<span class= "help-block">', '</span>');	
		if ($this->form_validation->run() == FALSE)
        {
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$userdata['row'] = $query->row();
				$this->loadview('user/user_form_edit', array_merge($data, $userdata));
			} else {
				echo "<script> Data Tidak Ditemukan'); </script>";
				echo "<script> window.location = '".site_url('employee')."'; </script>";
			}
			
        } else {
             $post = $this->input->post(null, TRUE);
			 $this->user_m->edit($post);
			 if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success','Data berhasil dihapus');
		 } 
		 redirect('employee');
        }
		
	}

	function username_check() 
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM employee WHERE name = '$post[name]' AND employee_id != '$post[employee_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s ini sudah dipakai, silahkan diganti ');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
}