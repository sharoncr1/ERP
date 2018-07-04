<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('DB_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('form_validation');

		if(!$this->session->l_userid){
			redirect(base_url('loginc'));
		}
	}
	public function index()
	{	

	}
	public function lRegister(){
		$this->session->set_flashdata('emsg','');
		$this->session->set_flashdata('tname','');
		$this->session->set_flashdata('tuserid','');
		if(count($this->input->post())>0){
			$name=$this->input->post('name');
			$userid=$this->input->post('userid');
			$this->session->set_flashdata('tname', $name);
			$this->session->set_flashdata('tuserid', $userid);
			$password=$this->input->post('password');
			$password1=$this->input->post('password2');
			if($password!=$password1){
				$this->session->set_flashdata('emsg', 'Passwords do not match');
			}
			else{
					$erow=$this->DB_model->u_Login($userid);
					if($erow){
						$this->session->set_flashdata('emsg', 'The User Id already exists');
						$this->session->set_flashdata('tuserid','');
					}
					else{
						$row=array(
							'userid'=>$userid,
							'password'=>$password,
							'name'=>$name
						);
						$this->DB_model->add_User($row);
					//	$this->session->set_flashdata('emsg','Successfully Registered. Now Login with the Registered details');
						redirect(base_url());
					}
			}		
		}
		$this->load->view('pages/register');
	}
	public function lEmpty($page=0){

		$config['base_url'] = base_url('welcome/lEmpty/');
		$config['per_page'] = 5;
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['reuse_query_string'] = TRUE;
		$config['attributes'] = array('class' => 'page-link');
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$data['s_msg']='';

			$count=0;
			$str=$this->input->get('search');
			$rows=$this->DB_model->product_search1($str,$page,$config['per_page']);
			$data['rows'] =$rows;
			$config['total_rows'] = $this->DB_model->product_search_count($str);
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			if($str){
			$data['s_msg']= "Search Results for '".$str."'";
			}	
		
		$this->load->view('pages/head');
		$this->load->view('pages/header');
		$this->load->view('pages/sidebar');
		$this->load->view('pages/empty',$data);
		
	}
	public function product_search_auto(){
		echo json_encode($this->DB_model->product_search_auto($this->input->get('term')));
	}

	public function add_to_cart(){
		$itemcode=$this->input->post('item');
		$data['userid']=$this->session->l_userid;
		$data['item_code']=$itemcode;
		$result=$this->DB_model->add_to_cart($data);
		echo $result;
	}
	public function show_cart(){
		$data['rows']=$this->DB_model->cart_items($this->session->l_userid);
		$this->load->view('pages/head');
		$this->load->view('pages/header');
		$this->load->view('pages/sidebar');
		$this->load->view('pages/cart',$data);
	}
	public function remove_from_cart($item_code){
		$data['userid']=$this->session->l_userid;
		$data['item_code']=$item_code;
		$this->DB_model->remove_from_cart($data);
		redirect(base_url('welcome/show_cart'));
	}

}
