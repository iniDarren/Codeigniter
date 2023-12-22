<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sales_m');
		$this->load->model('m_laporan');
	}
	
	public function loadview($view, $data)
	{
		
		$this->load->view('template/header',$data);
		$this->load->view($view, $data);
		$this->load->view('template/footer');

	}
	public function index()
	{
		$data['judul'] = 'Buat Laporan';
    	 $data['employees'] = $this->m_laporan->get()->result();
    	$this->loadview('laporan/form_report', array_merge($data));
	}

	public function lap_tgl()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data = array(
			'judul' => 'Laporan Penjualan Bulanan',
			'dari' => $dari,
			'sampai' => $sampai,
			'laporan'=> $this->m_laporan->lap_tgl($dari, $sampai),
		);
		$this->loadview('laporan/report',array_merge($data));
	}

	public function lap_barber()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $barber_id = $this->input->post('barber_id');

        $data = array(
            'judul' => 'Laporan Penjualan Bulanan Barber',
            'dari' => $dari,
            'sampai' => $sampai,
            'barber_id' => $barber_id,
            'laporan' => $this->m_laporan->lap_barber($dari, $sampai, $barber_id),
        );
        $this->loadview('laporan/report', $data);
    }
}
