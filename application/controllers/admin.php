<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('Yale_model');
	
	}
	public function index()
	{
			$data['chinua'] = $this->Yale_model->display();
			$this->load->view('admin',$data);
	
	}
	public function add()
	{
		$this->load->view('add');
	}

	public function adding(){
		$this->Yale_model->adding();
		redirect('admin');
	}
	public function del($id){
		$this->Yale_model->del($id);
		redirect('admin');
	}

	public function edit($id){
		$data['yale'] = $this->Yale_model->edit($id);
		$this->load->view('edit',$data);
	}
	public function editing(){
		$this->Yale_model->editing();
		redirect('admin');
	}
		
	
	
	}
	
