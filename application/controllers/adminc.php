<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('adminm');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');

		if(!$this->session->la_userid){
			redirect(base_url('loginca'));
		}
	}


	// admin login

public function index(){

}

	// New admin Registration

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
						redirect(base_url('adminc'));
					}
			}		
		}
		$this->load->view('admin_pages/register');
	}
	
	public function lEmpty(){
		$this->load->view('admin_pages/head');
		$this->load->view('admin_pages/header');
		$this->load->view('admin_pages/sidebar');
		$this->load->view('admin_pages/empty');
	}


	// user table operations 


	public function udelete($userid){
		$this->adminm->udelete($userid);
  		redirect(base_url('adminc/displayt'));
	}

	public function user_status_toggle($userid){
		$row=$this->adminm->user_search($userid);
		echo $row['userid'];
		if($row['status']==0){
			$this->adminm->user_status_toggle($userid,1);
		}
		else{
			$this->adminm->user_status_toggle($userid,0);
		}
		 redirect(base_url('adminc/displayt'));
    }

	public function displayt($page=0){

		$config['base_url'] = base_url('adminc/displayt/');
		$config['per_page'] = 5;
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['reuse_query_string'] = TRUE;
		$config['attributes'] = array('class' => 'page-link');
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$data['s_msg']='';
		//if(count($this->input->	get())>0){
			$count=0;
			$str=$this->input->get('search');
			$rows=$this->adminm->user_search1($str,$page,$config['per_page']);
			$data['rows'] =$rows;
			$config['total_rows'] = $this->adminm->user_search_count($str);
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			if($str){
			$data['s_msg']= "Search Results for '".$str."'";
			}	
		// }
		// else{
		// 	$config['total_rows'] = $this->adminm->getAllEntriesCount();
		// 	$data['rows'] = $this->adminm->getAllEntries($page,$config['per_page']);
		// 	$this->pagination->initialize($config);
		// 	$data['pagination'] = $this->pagination->create_links();
		// }
		
		$this->load->view('admin_pages/head');
		$this->load->view('admin_pages/header');
		$this->load->view('admin_pages/sidebar');
		$this->load->view('admin_pages/display',$data);
		
	}
	// 
	// 
	// products table oprations
	// 
	// 
	// 

	public function addItem(){
		
		$this->load->view('admin_pages/head');
		$this->load->view('admin_pages/header');
		$this->load->view('admin_pages/sidebar');
		
		$data['emsg']=$data['smsg']='';

		if(count($this->input->post())>0){
			$name=$this->input->post('name');
			$category=$this->input->post('category');
			$unit=$this->input->post('unit');
			
				$row=array(
							'name'=>$this->input->post('name'),
							'category'=>$this->input->post('category'),
							'price'=>$this->input->post('price'),
							'tax'=>$this->input->post('tax'),
							'unit'=>$this->input->post('unit'),
							'stock'=>$this->input->post('stock')
						);
			$s_row=$this->adminm->item_Search($name);
			if($s_row){
				$data['emsg']='An item with this name already exists';
			}else{
				$this->adminm->additem($row);
				$data['smsg']='Item added';
			}

		}
			$this->load->view('admin_pages/additem',$data);
	}
	public function show_Items($page=0){
		
		// if(count($this->input->post())>0){
		// 	echo "reached";
		// }


		$config['base_url'] = base_url('adminc/show_items/');
		$config['total_rows'] = $this->adminm->getAllProductEntriesCount();
		$config['per_page'] = 5;

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$data['rows'] = $this->adminm->getAllProductEntries($page,$config['per_page']);
		$this->load->view('admin_pages/head');
		$this->load->view('admin_pages/header');
		$this->load->view('admin_pages/sidebar');
		$this->load->view('admin_pages/addeditems',$data);

	}

	public function product_delete($id){
		$this->adminm->product_delete($id);
		redirect(base_url('adminc/show_items')); 		
	}
	public function user_search_auto(){
		echo json_encode($this->adminm->user_search_auto($this->input->get('term')));
	}

}