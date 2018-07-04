<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginca extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('adminm');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index()
	{	
		$this->session->set_flashdata('emsg', '');

		if(count($this->input->post())>0){
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			$row=$this->adminm->u_Login($userid);
			if($row){
				if($row['password']==$password){
					$this->session->set_userdata('la_userid', $row['userid']);
					$this->session->set_userdata('la_name', $row['name']);
					
					 redirect(base_url('adminc/lEmpty'));
				}
				else{
					$this->session->set_flashdata('emsg', 'The password you entered is wrong');
				}
			}
			else{
			$this->session->set_flashdata('emsg', 'The user-id you entered does not exist');
			}
		}

		$this->load->view('admin_pages/login');
	}
		function logout()
	{
		session_destroy();
		redirect(base_url('loginca'));
	}
}