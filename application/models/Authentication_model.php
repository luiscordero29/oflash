<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Authentication_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function check_email()
	{
		$user_email = $this->input->post('user_email');
		$query = $this->db->get_where('users', array('user_email' => $user_email));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function check_password()
	{
		$user_email = $this->input->post('user_email');
		$user_password = hash('sha512', $this->input->post('user_password'));
		$query = $this->db->get_where('users', array('user_email' => $user_email,'user_password' => $user_password));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function check_authentication()
	{
		$user_email = $this->input->post('user_email');
		$query = $this->db->get_where('users', array('user_email' => $user_email, 'user_status' => 'yes'));
	    if($query->num_rows() > 0){
	    	$r = $query->row_array();
	    	$sess_array = array(
		        'user_uid' 		=> $r['user_uid'],
		        'user_email' 	=> $r['user_email'],		          	          	
		    );
	        $this->session->set_userdata($sess_array);
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function register()
	{
		# register	   	
	   	$user_uid 			= $this->uuid->v5(uniqid());	   	
	   	$user_email 		= $this->input->post('user_email');	   	
	    $user_password 		= hash('sha512', $this->input->post('user_password'));
	    $user_status 		= 'no';
	    $user_validated 	= 'no';
	    $user_route 		= $this->uuid->v5(uniqid());   
	   	   	
	   	$data = array(
			'user_uid' 			=> $user_uid,
			'user_email' 		=> $user_email,	  
			'user_password' 	=> $user_password,	  
			'user_status' 		=> $user_status,	  
			'user_validated' 	=> $user_validated,	  
			'user_route' 		=> $user_route,	  
		);

		$this->db->insert('users', $data);

		$data['alert']['success'] = 
			array( 
				'Usuario Registrado',				
			);

		# email
		$to = $user_email;
		$from = 'info@oflash.com.ve';
		$data['title'] = 'Registro de Usuario';
		$data['content']  = '<p>Bienvenido al Sistema Integral de Salud, a continuación le enviamos sus datos de acceso</p>';
		$data['content'] .= '<p><b>E-MAIL:</b> '.$user_email.'</p>';
		$data['content'] .= '<p><b>CLAVE:</b> '.$this->input->post('user_password').'</p>';
		$data['content'] .= '<p><b>LINK DE VALIDACION:</b> <a href="'.site_url('authentication/validation/'.$user_route).'">Enlace de Validar Cuenta</a></p>';
		$data['content'] .= '<p><b>Antes de ingresar debes validar la cuenta haciendo clic en el enlace anterior</b></p>';
		$subject = $data['title'];
		$message = $this->load->view('authentication/email', $data, TRUE);
		$this->email->send($to,$from,$subject,$message);

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