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
	   	$user_firstname 	= $this->input->post('user_firstname');	   	
	   	$user_lastname 		= $this->input->post('user_lastname');	   	
	   	$user_email 		= $this->input->post('user_email');	   	
	    $user_password 		= hash('sha512', $this->input->post('user_password'));
	    $user_activated 	= 'no';
	    $user_validated 	= 'no';
	    $user_route 		= $this->uuid->v5(uniqid());   
	    $user_status 		= 'yes';
	    $user_created 		= date('Y-m-d H:i:s');
	    $user_update 		= date('Y-m-d H:i:s');
	    $user_deleted 		= date('Y-m-d H:i:s');
	   	   	
	   	$data = array(
			'user_uid' 			=> $user_uid,
			'user_firstname' 	=> $user_firstname,	  
			'user_lastname' 	=> $user_lastname,	  
			'user_email' 		=> $user_email,	  
			'user_password' 	=> $user_password,	  
			'user_activated' 	=> $user_activated,	  
			'user_validated' 	=> $user_validated,	  
			'user_route' 		=> $user_route,	  
			'user_status' 		=> $user_status,	  
			'user_created' 		=> $user_created,	  
			'user_update' 		=> $user_update,	  
			'user_deleted' 		=> $user_deleted,	  
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
		$data['content']  = '<p>Bienvenido al Content Manager System, a continuación le enviamos sus datos de acceso</p>';
		$data['content'] .= '<p><b>NOMBRES:</b> '.$user_firstname.'</p>';
		$data['content'] .= '<p><b>APELLIDOS:</b> '.$user_lastname.'</p>';
		$data['content'] .= '<p><b>E-MAIL:</b> '.$user_email.'</p>';
		$data['content'] .= '<p><b>CLAVE:</b> '.$this->input->post('user_password').'</p>';
		$data['content'] .= '<p><b>LINK DE VALIDACION:</b> <a href="'.site_url('authentication/validation/'.$user_route).'">Enlace de Validar Cuenta</a></p>';
		$data['content'] .= '<p><b>Antes de ingresar debes validar la cuenta haciendo clic en el enlace anterior</b></p>';
		$subject = $data['title'];
		$message = $this->load->view('authentication/email', $data, true);
		# send mail
		$this->email->from($from, 'OFLASH.com.ve | En Tus Mejores Momentos');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

		$data['alert']['info'] = 
			array( 
				'Ingrese a su correo y valide su cuenta',				
			);

		return $data;
	}

	public function check_password_recovery()
	{
		$user_email = $this->input->post('user_email');
		$query = $this->db->get_where('users', array('user_email' => $user_email));
	    if($query->num_rows() > 0){
	    	return true;
	    }else{
	    	return false;
	    }
	}


	public function password_recovery()
	{
		$user_email = $this->input->post('user_email');
		$query = $this->db->get_where('users', array('user_email' => $user_email));
	    if($query->num_rows() > 0){
	    	
	    	$row = $query->row_array();

	    	$password 		= rand(1000, 9999);
	    	$user_password 	= hash('sha512', $password);
	    	$user_validated = 'no';
	    	$user_route 	= $this->uuid->v5(uniqid());
	    	$user_update 	= date('Y-m-d H:i:s');


	    	$data = array(
				'user_password' 		=> $user_password,	  
				'user_validated' 		=> $user_validated,	  
				'user_route' 			=> $user_route,	  
				'user_update' 			=> $user_update,	  
			);

			$this->db->where('user_email', $user_email);
			$this->db->update('users', $data);

			$data['alert']['success'] = 
				array( 
					'Su Clave fue cambiada',				
				);

			# email
			$to = $user_email;
			$from = 'info@oflash.com.ve';
			$data['title'] = 'Recuperar Clave';
			$data['content']  = '<p>Bienvenido al Content Manager System, a continuación le enviamos sus datos de acceso</p>';
			$data['content'] .= '<p><b>E-MAIL:</b> '.$user_email.'</p>';
			$data['content'] .= '<p><b>CLAVE:</b> '.$password.'</p>';
			$data['content'] .= '<p><b>LINK DE VALIDACION:</b> <a href="'.site_url('authentication/validation/'.$user_route).'">Enlace de Validar Cuenta</a></p>';
			$data['content'] .= '<p><b>Antes de ingresar debes validar la cuenta haciendo clic en el enlace anterior</b></p>';
			$subject = $data['title'];
			$message = $this->load->view('authentication/email', $data, true);
			# send mail
			$this->email->from($from, 'OFLASH.com.ve | En Tus Mejores Momentos');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();

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

	public function validation($user_route)
	{
		$query = $this->db->get_where('users', array('user_route' => $user_route));
	    if($query->num_rows() > 0){

	    	$data = array(
				'user_validated' => 'yes',	    
			);

			$this->db->where('user_route', $user_route);
			$this->db->update('users', $data);

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