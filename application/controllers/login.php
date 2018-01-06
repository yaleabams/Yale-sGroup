<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('Yale_model');
	
	}
	public function index()
	{
			$data['chinua'] = $this->Yale_model->display();
			$this->load->view('login',$data);
	
	}
	public function login_registered(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	    $data['nicole'] =  $this->Yale_model->login_registered($username,$password);
	    print_r($data['nicole']);
	   	if($data['nicole'] == false){
	 		redirect('login');
	   	}
	   	else{
	   		redirect('admin');
	   	}
	}
		
	}
