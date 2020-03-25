<?php
class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('masuk') != true) {
            redirect('login');
        };
		$this->load->model('m_pengunjung');
	}
	function index(){
		// $this->load->view('v_dashboard');
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$this->load->view('v_dashboard',$x);
		}else{
			redirect('login');
		}
	}
	
	function logout() {
		$data = $this->session->all_userdata();

		foreach($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect('login');
	}
}