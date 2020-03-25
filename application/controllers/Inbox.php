<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_kontak');
	}

	function index(){
		$this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_all_inbox();
		$this->load->view('v_inbox',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('inbox');
	}
}