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
	    $dus_id = $this->session->userdata('dus_id');
	    $query = $this->db->get_where('usuarios', array('dus_id' => $dus_id));	    

	    if($query->num_rows() > 0){	      
	      	return $query->row_array();
	    }else{
	      	return false;
	    }
	}

	public function update()
	{
		# registro
		$dus_id 			= $this->input->post('dus_id');
	    $dus_apellidos 		= $this->input->post('dus_apellidos');
	   	$dus_nombres 		= $this->input->post('dus_nombres');
	   	$dus_telefono 		= $this->input->post('dus_telefono');
	   	$dus_direccion 		= $this->input->post('dus_direccion');	   	
	   	$dus_email 			= $this->input->post('dus_email');	   	
	   
	   	$data = array(
			'dus_apellidos' 	=> $dus_apellidos,
			'dus_nombres' 		=> $dus_nombres,
			'dus_telefono' 		=> $dus_telefono,
			'dus_direccion' 	=> $dus_direccion,
			'dus_email' 		=> $dus_email,  
		);

		$this->db->where('dus_id', $dus_id);
		$this->db->update('usuarios', $data);

		$data['success'] = 
			array( 
				'Usuario Actualizado',				
			);

		return $data;
	}

	public function check_email()
	{
		$dus_id = $this->input->post('dus_id');
		$dus_email = $this->input->post('dus_email');
		$query = $this->db->where('dus_email',$dus_email);
		$query = $this->db->where('dus_id !=',$dus_id);
		$query = $this->db->get('usuarios');
	    if($query->num_rows() > 0){
	    	return false;
	    }else{
	    	return true;
	    }
	}

	public function password()
	{
		# registro
		$dus_id 			= $this->input->post('dus_id');
	    $dus_clave 			= hash('sha512', $this->input->post('dus_clave'));   
	   	   	
	   	$data = array(
			'dus_clave' 		=> $dus_clave,	    
		);

		$this->db->where('dus_id', $dus_id);
		$this->db->update('usuarios', $data);

		$data['success'] = 
			array( 
				'Clave Actualizada',				
			);

		return $data;
	}
}