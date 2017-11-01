<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Account_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function logout()
	{
		$sess_array = array(
		    'dus_id' 		=> '',
		    'dus_usuario' 	=> '',          	
		);

		$this->session->unset_userdata($sess_array);
	   	$this->session->sess_destroy();
	}

	public function read()
	{			    
	    $user_uid = $this->session->userdata('user_uid');
	    $query = $this->db->get_where('users', array('user_uid' => $user_uid));	    

	    if($query->num_rows() > 0){	      
	      	return $query->row_array();
	    }else{
	      	return false;
	    }
	}

	public function update()
	{
		# registro
		$user_uid = $this->input->post('user_uid');   	
	   	$user_email = $this->input->post('user_email');	   	
	   
	   	$data = array(
			'user_email' => $user_email,  
		);

		$this->db->where('user_uid', $user_uid);
		$this->db->update('users', $data);

		$data['success'] = 
			array( 
				'Usuario Actualizado',				
			);

		return $data;
	}

	public function check_email()
	{
		$user_uid = $this->input->post('user_uid');
		$user_email = $this->input->post('user_email');
		$query = $this->db->where('user_email',$user_email);
		$query = $this->db->where('user_uid !=',$user_uid);
		$query = $this->db->get('users');
	    if($query->num_rows() > 0){
	    	return false;
	    }else{
	    	return true;
	    }
	}

	public function password()
	{
		# registro
		$user_uid = $this->input->post('user_uid');
	    $user_password = hash('sha512', $this->input->post('user_password'));   
	   	   	
	   	$data = array(
			'user_password' => $user_password,	    
		);

		$this->db->where('user_uid', $user_uid);
		$this->db->update('users', $data);

		$data['success'] = 
			array( 
				'Clave Actualizada',				
			);

		return $data;
	}
}