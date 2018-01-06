<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yale_model extends CI_Controller 
{

	public function display()
	{		
			$query = $this->db->query("SELECT * from tbluser where status = 1");
			return $query->result();
	}
	public function adding(){
		$data =array(
			'username' => $this->input->post('username'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
		$this->db->insert('tbluser',$data);
	}
	public function del($id){
		$data = array('status'=> 0);
		$this->db->where('userid',$id);
		$this->db->update('tbluser',$data);			
	}		

	public function edit($id){
		$query = $this->db->query("SELECT * from tbluser where userid = $id");
		return $query->result();

	}
	public function editing(){
		$id = $this->input->post('userid');
			$data =array(
			'username' => $this->input->post('username'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
		$this->db->where('userid',$id);
		$this->db->update('tbluser',$data);	
	}


	public function login_registered($username , $password)
	{
		$this->db->select('userid , username , password');
		$this->db->from('tbluser');		
		$this->db->where('username' , $username);
		$this->db->where('password' ,$password);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{

			return $query->result();
		}
		else
		{
	
			return false;
		}
		
	}


	}

