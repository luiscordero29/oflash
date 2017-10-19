<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Authentication_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function check_usuario()
	{
		$dus_usuario = $this->input->post('dus_usuario');
		$query = $this->db->get_where('usuarios', array('dus_usuario' => $dus_usuario));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function check_clave()
	{
		$dus_usuario = $this->input->post('dus_usuario');
		$dus_clave = hash('sha512', $this->input->post('dus_clave'));
		$query = $this->db->get_where('usuarios', array('dus_usuario' => $dus_usuario,'dus_clave' => $dus_clave));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function check_authentication()
	{
		$dus_usuario = $this->input->post('dus_usuario');
		$query = $this->db->get_where('usuarios', array('dus_usuario' => $dus_usuario, 'dus_estatus' => 'SI'));
	    if($query->num_rows() > 0){
	    	$r = $query->row_array();
	    	$sess_array = array(
		        'dus_id' 		=> $r['dus_id'],
		        'dus_usuario' 	=> $r['dus_usuario'],		          	
		        'dus_email' 	=> $r['dus_email'],		          	
		        'dus_apellidos' => $r['dus_apellidos'],		          	
		        'dus_nombres' 	=> $r['dus_nombres'],		          	
		    );
	        $this->session->set_userdata($sess_array);
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function register()
	{
		# registro
		$dus_identidad 		= $this->input->post('dus_identidad');
	    $dus_apellidos 		= $this->input->post('dus_apellidos');
	   	$dus_nombres 		= $this->input->post('dus_nombres');
	   	$dus_telefono 		= $this->input->post('dus_telefono');
	   	$dus_direccion 		= $this->input->post('dus_direccion');	   	
	   	$dus_usuario 		= $this->input->post('dus_usuario');	   	
	   	$dus_email 			= $this->input->post('dus_email');	   	
	    $dus_clave 			= hash('sha512', $this->input->post('dus_clave'));
	    $dus_estatus 		= 'NO';
	    $dus_ruta 			= hash('sha512', $this->input->post('dus_email'));	   
	   	   	
	   	$data = array(
			'dus_identidad' 	=> $dus_identidad,
			'dus_apellidos' 	=> $dus_apellidos,
			'dus_nombres' 		=> $dus_nombres,
			'dus_telefono' 		=> $dus_telefono,
			'dus_direccion' 	=> $dus_direccion,
			'dus_usuario' 		=> $dus_usuario,
			'dus_email' 		=> $dus_email,
			'dus_clave' 		=> $dus_clave,	  
			'dus_estatus' 		=> $dus_estatus,	  
			'dus_ruta' 			=> $dus_ruta,	  
		);

		$this->db->insert('usuarios', $data);

		$data['alert']['success'] = 
			array( 
				'Usuario Registrado',				
			);

		# email
		$to = $dus_email;
		$from = 'informatica@dirsaludbarinas.gob.ve';
		$subject = 'Registro de Usuario - Sistema Integral de Salud';
		$message  = '<p>Bienvenido al Sistema Integral de Salud, a continuación le enviamos sus datos de acceso</p>';
		$message .= '<p><b>USUARIO:</b> '.$dus_usuario.'</p>';
		$message .= '<p><b>CLAVE:</b> '.$this->input->post('dus_clave').'</p>';
		$message .= '<p><b>LINK DE VALIDACION:</b> <a href="'.site_url('authentication/validation/'.$dus_ruta).'">Enlace de Validar Cuenta</a></p>';
		$message .= '<p><b>Antes de ingresar debes validar la cuenta haciendo clic en el enlace anterior</b></p>';

		$this->load->model('Email_model');
		$this->Email_model->send($to,$from,$subject,$message);

		$data['alert']['info'] = 
			array( 
				'Ingrese a su correo y valide su cuenta',				
			);

		return $data;
	}

	public function check_passwordrecovery()
	{
		$dus_email = $this->input->post('dus_email');
		$query = $this->db->get_where('usuarios', array('dus_email' => $dus_email));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}


	public function passwordrecovery()
	{
		$dus_email = $this->input->post('dus_email');
		$query = $this->db->get_where('usuarios', array('dus_email' => $dus_email));
	    if($query->num_rows() > 0){
	    	
	    	$row = $query->row_array();

	    	$dus_usuario		= $row['dus_usuario'];
	    	$dus_email			= $row['dus_email'];
	    	$pass 				= rand(1000, 9999);
	    	$dus_clave 			= hash('sha512', $pass);
	    	$dus_estatus 		= 'NO';
	    	$dus_ruta 			= hash('sha512', $dus_email);	

	    	$data = array(
				'dus_clave' 		=> $dus_clave,	  
				'dus_estatus' 		=> $dus_estatus,	  
				'dus_ruta' 			=> $dus_ruta,	  
			);

			$this->db->where('dus_email', $dus_email);
			$this->db->update('usuarios', $data);

			$data['alert']['success'] = 
				array( 
					'Su Clave fue cambiada',				
				);

			# email
			$to = $dus_email;
			$from = 'informatica@dirsaludbarinas.gob.ve';
			$subject = 'Recuperar Clave - Sistema Integral de Salud';
			$message  = '<p>Bienvenido al Sistema Integral de Salud, su datos de acceso es el siguiente</p>';
			$message .= '<p><b>USUARIO:</b> '.$dus_usuario.'</p>';
			$message .= '<p><b>CLAVE:</b> '.$pass.'</p>';
			$message .= '<p><b>LINK DE VALIDACION:</b> <a href="'.site_url('authentication/validation/'.$dus_ruta).'">Enlace de Validar Cuenta</a></p>';
			$message .= '<p><b>Antes de ingresar debes validar la cuenta haciendo clic en el enlace anterior</b></p>';

			$this->load->model('Email_model');
			$this->Email_model->send($to,$from,$subject,$message);

			$data['alert']['info'] = 
			array( 
				'Ingrese a su correo y valide su cuenta',				
			);
			
	    }else{
	    	$data['alert']['danger'] = 
				array( 
					'Esta cuenta no existe!',				
				);
	    }
	    return $data;
	}

	public function validation($dus_ruta)
	{
		$query = $this->db->get_where('usuarios', array('dus_ruta' => $dus_ruta));
	    if($query->num_rows() > 0){

	    	$data = array(
				'dus_estatus' 		=> 'SI',	    
			);

			$this->db->where('dus_ruta', $dus_ruta);
			$this->db->update('usuarios', $data);

	    	$data['alert']['success'] = 
				array( 
					'Cuenta Validad correctamente',				
				);
	    }else{
	    	$data['alert']['danger'] = 
				array( 
					'Esta cuenta no existe!',				
				);
	    }
	    return $data;
	}
}